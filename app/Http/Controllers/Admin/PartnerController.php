<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $query = Partner::orderBy('id', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $services = $query->get();

        return view('admin.partners.index', compact('services'));
    }

    public function create()
    {
        $serviceOptions = ['Guide', 'Porter', 'Accommodation', 'Equipment Rental', 'Transportation', 'Restaurant'];
        $users = User::orderBy('name')->get();

        return view('admin.partners.create', compact('serviceOptions', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'service_type' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'owner' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'pricing_info' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_verified' => 'nullable|in:0,1',
            'is_featured' => 'nullable|in:0,1',
            'password' => 'nullable|string|min:6',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $imagePath = 'image/' . $imageName;
        }

        $description = Partner::composeDescription($validated['owner'] ?? null, $validated['description'] ?? null);

        $password = isset($validated['password']) && !empty($validated['password']) 
            ? bcrypt($validated['password']) 
            : bcrypt('mitra123'); // Default password if not specified

        Partner::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']) . '-' . rand(1000, 9999),
            'category' => $validated['service_type'],
            'contact_wa' => $validated['phone'],
            'contact_email' => $validated['email'],
            'description' => $description,
            'pricing_info' => $validated['pricing_info'],
            'location_area' => $validated['address'],
            'image' => $imagePath,
            'is_active' => isset($validated['is_verified']) ? (int)$validated['is_verified'] : 1,
            'is_featured' => isset($validated['is_featured']) ? (int)$validated['is_featured'] : 0,
            'password' => $password,
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Mitra lokal berhasil ditambahkan!');
    }

    public function edit(Partner $partner)
    {
        $serviceOptions = ['Guide', 'Porter', 'Accommodation', 'Equipment Rental', 'Transportation', 'Restaurant'];
        $users = User::orderBy('name')->get();

        return view('admin.partners.edit', compact('partner', 'serviceOptions', 'users'));
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'service_type' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'owner' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'pricing_info' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_verified' => 'nullable|in:0,1',
            'is_featured' => 'nullable|in:0,1',
            'password' => 'nullable|string|min:6',
        ]);

        $data = [
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category' => $validated['service_type'],
            'contact_wa' => $validated['phone'],
            'contact_email' => $validated['email'],
            'pricing_info' => $validated['pricing_info'],
            'location_area' => $validated['address'],
        ];

        $description = Partner::composeDescription($validated['owner'] ?? null, $validated['description'] ?? null);
        $data['description'] = $description;

        if ($request->hasFile('image')) {
            if ($partner->image && file_exists(public_path($partner->image))) {
                unlink(public_path($partner->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $data['image'] = 'image/' . $imageName;
        }

        $data['is_active'] = isset($validated['is_verified']) ? (int)$validated['is_verified'] : 1;
        $data['is_featured'] = isset($validated['is_featured']) ? (int)$validated['is_featured'] : 0;

        if (isset($validated['password']) && !empty($validated['password'])) {
            $data['password'] = bcrypt($validated['password']);
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Mitra lokal berhasil diperbarui!');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->image && file_exists(public_path($partner->image))) {
            unlink(public_path($partner->image));
        }
        
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Mitra lokal berhasil dihapus!');
    }
}