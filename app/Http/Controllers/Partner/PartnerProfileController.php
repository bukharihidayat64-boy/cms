<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PartnerProfileController extends Controller
{
    public function index()
    {
        $partner = Auth::guard('partner')->user();
        $serviceOptions = ['Guide', 'Porter', 'Accommodation', 'Equipment Rental', 'Transportation', 'Restaurant'];
        return view('partner.profile', compact('partner', 'serviceOptions'));
    }

    public function update(Request $request)
    {
        $partner = Auth::guard('partner')->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'service_type' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'owner' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'pricing_info' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $data = [
            'name' => $validated['name'],
            'category' => $validated['service_type'],
            'contact_wa' => $validated['phone'],
            'pricing_info' => $validated['pricing_info'],
            'location_area' => $validated['address'],
        ];

        if ($partner->name !== $validated['name']) {
            $data['slug'] = Str::slug($validated['name']) . '-' . rand(1000, 9999);
        }

        $description = \App\Models\Partner::composeDescription($validated['owner'] ?? null, $validated['description'] ?? null);
        $data['description'] = $description;

        if ($request->hasFile('image')) {
            if ($partner->image && file_exists(public_path($partner->image))) {
                unlink(public_path($partner->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $data['image'] = 'image/' . $imageName;
        }

        if (isset($validated['password']) && !empty($validated['password'])) {
            $data['password'] = bcrypt($validated['password']);
        }

        $partner->update($data);

        return redirect()->route('partner.profile')->with('success', 'Profil Anda berhasil diperbarui!');
    }
}
