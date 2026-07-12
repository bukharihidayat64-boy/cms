<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route; // Import Model Route
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.routes.index', compact('routes'));
    }

    public function create()
    {
        return view('admin.routes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:routes,slug',
            'difficulty' => 'required|in:Easy,Moderate,Hard,Extreme',
            'duration' => 'required|string|max:100',
            'elevation_gain' => 'nullable|integer',
            'start_point' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('routes', 'public');
        }

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active') ? (bool)$request->is_active : true;
        $validated['is_featured'] = $request->has('is_featured') ? (bool)$request->is_featured : false;

        Route::create($validated);

        return redirect()->route('admin.routes.index')->with('success', 'Rute berhasil ditambahkan!');
    }

    public function edit(Route $route)
    {
        return view('admin.routes.edit', compact('route'));
    }

    public function update(Request $request, Route $route)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:routes,slug,' . $route->id,
            'difficulty' => 'required|in:Easy,Moderate,Hard,Extreme',
            'duration' => 'required|string|max:100',
            'elevation_gain' => 'nullable|integer',
            'start_point' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($route->image) Storage::disk('public')->delete($route->image);
            $validated['image'] = $request->file('image')->store('routes', 'public');
        }

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active') ? (bool)$request->is_active : true;
        $validated['is_featured'] = $request->has('is_featured') ? (bool)$request->is_featured : false;

        $route->update($validated);

        return redirect()->route('admin.routes.index')->with('success', 'Rute berhasil diupdate!');
    }

    public function destroy(Route $route)
    {
        if ($route->image) Storage::disk('public')->delete($route->image);
        $route->delete();
        return redirect()->route('admin.routes.index')->with('success', 'Rute berhasil dihapus!');
    }
}