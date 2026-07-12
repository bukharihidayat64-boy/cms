@extends('frontend.layouts.main')
@section('title', 'Articles & Guides | RinjaniTrail.id')

@section('content')
<main class="pt-28 pb-xl px-md md:px-lg max-w-container-max mx-auto">
    <!-- Header -->
    <div class="text-center mb-xl">
        <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-sm">Educational Articles</h1>
        <p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto">Tips, guides, dan insight konservasi untuk pendakian Gunung Rinjani yang aman.</p>
    </div>

    <!-- Filter & Search -->
    <form method="GET" action="{{ route('articles') }}" class="flex flex-col md:flex-row justify-between items-center gap-md mb-lg bg-white p-md rounded-xl shadow-sm">
        <div class="flex flex-wrap gap-sm">
            <a href="{{ route('articles') }}" class="px-md py-sm rounded-lg font-label-md {{ !request('category') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container' }}">All</a>
            @foreach(['tips' => 'Tips', 'guide' => 'Guide', 'news' => 'News', 'conservation' => 'Konservasi'] as $key => $label)
                <a href="{{ route('articles', ['category' => $key] + request()->except('page')) }}" class="px-md py-sm rounded-lg font-label-md {{ request('category') == $key ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container' }}">{{ $label }}</a>
            @endforeach
        </div>
        <div class="relative w-full md:w-72">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel..." class="w-full pl-10 pr-md py-sm rounded-lg border border-outline-variant outline-none focus:border-secondary">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline-variant">search</span>
        </div>
    </form>

    <!-- Grid Artikel -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-lg">
        @forelse($articles as $article)
        <a href="{{ route('articles.show', $article->slug) }}" class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all group">
            <div class="aspect-video relative overflow-hidden">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->image_alt ?? $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    {{-- Fallback jika tidak ada gambar --}}
                    <div class="w-full h-full bg-gradient-to-br from-secondary/20 to-secondary-container/20 flex items-center justify-center">
                        <span class="material-symbols-outlined text-6xl text-secondary/40">article</span>
                    </div>
                @endif
                <div class="absolute top-md left-md">
                    <span class="bg-primary/90 text-on-primary px-sm py-1 rounded-full text-label-sm capitalize">{{ $article->category }}</span>
                </div>
            </div>
            <div class="p-md">
                <div class="flex items-center gap-xs text-on-surface-variant text-label-sm mb-xs">
                    <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                    {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                </div>
                <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm group-hover:text-secondary transition-colors line-clamp-2">{{ $article->title }}</h3>
                <p class="font-body-md text-on-surface-variant text-sm line-clamp-3 mb-md">{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-xs">
                        <div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center text-primary-container font-bold text-xs">{{ strtoupper(substr($article->author->name ?? 'A', 0, 1)) }}</div>
                        <span class="text-label-sm text-on-surface-variant">{{ $article->author->name ?? 'Admin' }}</span>
                    </div>
                    <span class="text-secondary font-label-sm flex items-center gap-xs group-hover:gap-md transition-all">Baca <span class="material-symbols-outlined text-[16px]">arrow_forward</span></span>
                </div>
            </div>
        </a>
        @empty
        <div class="col-span-full text-center py-xl">
            <span class="material-symbols-outlined text-[64px] text-outline-variant mb-md">search_off</span>
            <h3 class="font-headline-sm text-primary-container mb-sm">Tidak ada artikel ditemukan</h3>
            <p class="text-on-surface-variant">Coba ubah filter atau kata kunci pencarian Anda.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-xl flex justify-center">
        {{ $articles->appends(request()->query())->links() }}
    </div>
</main>
@endsection