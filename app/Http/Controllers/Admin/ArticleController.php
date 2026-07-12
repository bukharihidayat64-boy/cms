<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    /**
     * Helper: Dapatkan author_id yang valid (TANPA is_active karena kolom tidak ada di Oracle)
     */
    private function getValidAuthorId()
    {
        // Layer 1: Coba ambil dari guard admin
        if (Auth::guard('admin')->check()) {
            $id = Auth::guard('admin')->id();
            if ($id && User::find($id)) {
                Log::info('Author ID from admin guard: ' . $id);
                return $id;
            }
        }
        
        // Layer 2: Query database untuk admin (TANPA is_active)
        $admin = User::where('role', 'admin')
                     ->orderBy('id', 'asc')
                     ->first();
        
        if ($admin) {
            Log::info('Author ID from database fallback: ' . $admin->id);
            return $admin->id;
        }
        
        // Layer 3: Fallback ke user pertama (last resort)
        $fallback = User::first();
        if ($fallback) {
            Log::warning('Using fallback user as author: ' . $fallback->id);
            return $fallback->id;
        }
        
        Log::error('Cannot determine valid author_id - no users found');
        return null;
    }

    public function index()
    {
        $articles = Article::with('author')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        // Debug logging
        Log::info('=== ARTICLE STORE ATTEMPT ===', [
            'admin_guard_check' => Auth::guard('admin')->check(),
            'admin_guard_id' => Auth::guard('admin')->id(),
            'admin_guard_user_id' => Auth::guard('admin')->user()?->id ?? null,
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255|min:5',
            'slug' => 'nullable|string|max:255|unique:articles,slug',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string|min:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'category' => ['required', Rule::in(['tips', 'news', 'guide', 'conservation', 'general'])],
            'tags' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        // Enforce: jika dipublish (is_published=true) maka published_at harus terisi
        if ($request->boolean('is_published')) {
            $validated['published_at'] = $validated['published_at'] ?? now();
        } else {
            $validated['published_at'] = null;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        // Dapatkan author_id yang valid
        $authorId = $this->getValidAuthorId();
        
        if (!$authorId) {
            Log::error('Failed to create article: cannot determine valid author_id');
            return back()->withErrors(['error' => 'Tidak dapat menentukan author. Pastikan ada user di database.'])
                        ->withInput();
        }

        // Buat artikel baru
        $article = Article::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'] ?? Str::slug($validated['title']),
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'image' => $imagePath,
            'image_alt' => $validated['image_alt'] ?? null,
            'category' => $validated['category'],
            'tags' => $validated['tags'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->boolean('is_published'),
            'author_id' => $authorId,
            'published_at' => $validated['published_at'],
        ]);

        Log::info('Article created successfully', [
            'article_id' => $article->id,
            'title' => $article->title,
            'author_id' => $authorId
        ]);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel "' . $article->title . '" berhasil diterbitkan!');
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|min:5',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('articles', 'slug')->ignore($article->id)],
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string|min:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'category' => ['required', Rule::in(['tips', 'news', 'guide', 'conservation', 'general'])],
            'tags' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }

        if (empty($validated['slug']) && $request->has('title')) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Enforce: jika dipublish (is_published=true) maka published_at wajib terisi
        if ($request->boolean('is_published')) {
            $validated['published_at'] = $validated['published_at'] ?? now();
        } else {
            $validated['published_at'] = null;
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_published'] = $request->boolean('is_published');

        // Jangan update author_id saat edit (biarkan tetap author asli)
        $article->update($validated);

        Log::info('Article updated successfully', [
            'article_id' => $article->id,
            'title' => $article->title
        ]);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $title = $article->title;
        $article->delete();

        Log::info('Article deleted', ['title' => $title, 'id' => $article->id ?? 'deleted']);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel "' . $title . '" berhasil dihapus!');
    }
}