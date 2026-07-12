<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    /**
     * Update profile + photo dalam 1 method
     */
    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Validasi data profile + foto
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Update data profile
        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        $admin->phone = $validated['phone'] ?? null;
        $admin->bio = $validated['bio'] ?? null;

        // Jika ada foto baru, upload dan update
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($admin->photo && Storage::disk('public')->exists($admin->photo)) {
                Storage::disk('public')->delete($admin->photo);
            }

            // Simpan foto baru
            $path = $request->file('photo')->store('admin-photos', 'public');
            $admin->photo = $path;
        }

        $admin->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Update photo saja (method terpisah jika diperlukan)
     */
    public function updatePhoto(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($admin->photo && Storage::disk('public')->exists($admin->photo)) {
            Storage::disk('public')->delete($admin->photo);
        }

        $path = $request->file('photo')->store('admin-photos', 'public');
        $admin->update(['photo' => $path]);

        return back()->with('success', 'Foto profil berhasil diubah.');
    }

    /**
     * Delete profile photo
     */
    public function deletePhoto()
    {
        $admin = Auth::guard('admin')->user();

        if ($admin->photo && Storage::disk('public')->exists($admin->photo)) {
            Storage::disk('public')->delete($admin->photo);
            $admin->update(['photo' => null]);
        }

        return back()->with('success', 'Foto profil berhasil dihapus!');
    }
}