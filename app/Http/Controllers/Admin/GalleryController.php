<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::orderBy('created_at', 'desc');

        // Filter by Category
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('photographer', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $galleries = $query->get();
        $categories = Gallery::categories();

        return view('admin.gallery.index', compact('galleries', 'categories'));
    }

    public function create()
    {
        $categories = Gallery::categories();
        return view('admin.gallery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255|min:3',
            'category'     => 'required|string|in:' . implode(',', array_keys(Gallery::categories())),
            'image'        => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
            'description'  => 'nullable|string|max:500',
            'photographer' => 'nullable|string|max:100',
            'location'     => 'nullable|string|max:150',
            'tags'         => 'nullable|string|max:255',
            'is_featured'  => 'nullable|boolean',
            'is_active'    => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');
        }

        Gallery::create([
            'title'        => $validated['title'],
            'category'     => $validated['category'],
            'image'        => $imagePath,
            'description'  => $validated['description'] ?? null,
            'photographer' => $validated['photographer'] ?? null,
            'location'     => $validated['location'] ?? null,
            'tags'         => $validated['tags'] ?? null,
            'is_featured'  => $request->boolean('is_featured'),
            'is_active'    => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil ditambahkan ke galeri!');
    }

    public function edit(Gallery $gallery)
    {
        $categories = Gallery::categories();
        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255|min:3',
            'category'     => 'required|string|in:' . implode(',', array_keys(Gallery::categories())),
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'description'  => 'nullable|string|max:500',
            'photographer' => 'nullable|string|max:100',
            'location'     => 'nullable|string|max:150',
            'tags'         => 'nullable|string|max:255',
            'is_featured'  => 'nullable|boolean',
            'is_active'    => 'nullable|boolean',
        ]);

        $data = [
            'title'        => $validated['title'],
            'category'     => $validated['category'],
            'description'  => $validated['description'] ?? null,
            'photographer' => $validated['photographer'] ?? null,
            'location'     => $validated['location'] ?? null,
            'tags'         => $validated['tags'] ?? null,
            'is_featured'  => $request->boolean('is_featured'),
            'is_active'    => $request->boolean('is_active', true),
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto galeri berhasil diperbarui!');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Foto galeri berhasil dihapus!');
    }
}
