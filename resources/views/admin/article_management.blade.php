@extends('admin.layouts.main')
@section('title', 'Article Management')

@section('content')
<div class="space-y-lg">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-display-lg text-display-lg text-primary-container">Article Management</h1>
            <p class="text-on-surface-variant mt-sm">Kelola artikel dan konten</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" class="bg-gradient-to-r from-secondary-fixed to-secondary text-primary-container px-lg py-md rounded-lg font-label-md flex items-center gap-xs hover:scale-105 transition-transform shadow-md">
            <span class="material-symbols-outlined">add</span> Tulis Artikel
        </a>
    </div>

    @if(session('success'))
    <div class="p-md bg-green-500/10 border border-green-500/30 rounded-xl flex items-start gap-sm">
        <span class="material-symbols-outlined text-green-500">check_circle</span>
        <p class="text-green-700">{{ session('success') }}</p>
    </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-md">
        <div class="bg-white rounded-xl p-md shadow-sm">
            <div class="flex items-center gap-sm">
                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                    <span class="material-symbols-outlined text-blue-600">article</span>
                </div>
                <div>
                    <p class="text-2xl font-bold text-primary-container">{{ $articles->total() }}</p>
                    <p class="text-xs text-on-surface-variant">Total Articles</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-md shadow-sm">
            <div class="flex items-center gap-sm">
                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                    <span class="material-symbols-outlined text-green-600">check_circle</span>
                </div>
                <div>
                    <p class="text-2xl font-bold text-primary-container">{{ $articles->where('is_published', true)->count() }}</p>
                    <p class="text-xs text-on-surface-variant">Published</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-md shadow-sm">
            <div class="flex items-center gap-sm">
                <div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center">
                    <span class="material-symbols-outlined text-orange-600">draft</span>
                </div>
                <div>
                    <p class="text-2xl font-bold text-primary-container">{{ $articles->where('is_published', false)->count() }}</p>
                    <p class="text-xs text-on-surface-variant">Draft</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Articles Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="p-md border-b border-outline-variant/20 flex items-center justify-between">
            <input type="text" id="searchArticle" placeholder="Cari artikel..." 
                   class="px-md py-sm border border-outline-variant rounded-lg outline-none focus:border-secondary w-64">
            <div class="flex gap-sm">
                <select class="px-md py-sm border border-outline-variant rounded-lg outline-none focus:border-secondary">
                    <option value="">Semua Kategori</option>
                    <option value="news">News</option>
                    <option value="guide">Guide</option>
                    <option value="tips">Tips</option>
                </select>
                <button class="px-md py-sm border border-outline-variant rounded-lg hover:bg-surface-container-low">
                    <span class="material-symbols-outlined text-[18px]">filter_list</span>
                </button>
            </div>
        </div>

        <table class="w-full">
            <thead class="bg-surface-container text-on-surface-variant text-left">
                <tr>
                    <th class="px-md py-sm">Article</th>
                    <th class="px-md py-sm">Category</th>
                    <th class="px-md py-sm">Author</th>
                    <th class="px-md py-sm">Status</th>
                    <th class="px-md py-sm">Published</th>
                    <th class="px-md py-sm text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant/20">
                @forelse($articles as $article)
                <tr class="hover:bg-surface-container-low">
                    <td class="px-md py-sm">
                        <div class="flex items-center gap-sm">
                            @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" 
                                 class="w-16 h-12 object-cover rounded-lg">
                            @else
                            <div class="w-16 h-12 rounded-lg bg-surface-container flex items-center justify-center">
                                <span class="material-symbols-outlined text-outline-variant">image</span>
                            </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <h4 class="font-label-md text-on-surface truncate">{{ $article->title }}</h4>
                                <p class="text-xs text-on-surface-variant truncate">{{ Str::limit($article->excerpt, 60) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-md py-sm">
                        <span class="px-sm py-1 rounded text-xs font-bold uppercase bg-blue-100 text-blue-800">
                            {{ $article->category }}
                        </span>
                    </td>
                    <td class="px-md py-sm text-on-surface-variant text-sm">
                        {{ $article->author->name ?? 'N/A' }}
                    </td>
                    <td class="px-md py-sm">
                        @if($article->is_published)
                        <span class="inline-flex items-center gap-xs px-sm py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>
                            Published
                        </span>
                        @else
                        <span class="inline-flex items-center gap-xs px-sm py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                            <span class="w-1.5 h-1.5 rounded-full bg-orange-600"></span>
                            Draft
                        </span>
                        @endif
                    </td>
                    <td class="px-md py-sm text-on-surface-variant text-sm">
                        {{ $article->published_at ? $article->published_at->format('d M Y') : '-' }}
                    </td>
                    <td class="px-md py-sm text-right">
                        <div class="flex items-center justify-end gap-xs">
                            <a href="{{ route('articles.show', $article->slug) }}" target="_blank" 
                               class="p-2 text-green-600 hover:bg-green-50 rounded-lg" title="View">
                                <span class="material-symbols-outlined">visibility</span>
                            </a>
                            <a href="{{ route('admin.articles.edit', $article) }}" 
                               class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" 
                                  onsubmit="return confirm('Hapus artikel ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg" title="Delete">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-md py-lg text-center text-on-surface-variant">
                        <span class="material-symbols-outlined text-[48px] text-outline-variant">article</span>
                        <p class="mt-sm">Belum ada artikel</p>
                        <a href="{{ route('admin.articles.create') }}" class="text-secondary hover:underline mt-sm inline-block">
                            Tulis artikel pertama
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-md py-sm border-t border-outline-variant/20">
            {{ $articles->links() }}
        </div>
    </div>
</div>

<script>
// Search functionality
document.getElementById('searchArticle').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});
</script>
@endsection