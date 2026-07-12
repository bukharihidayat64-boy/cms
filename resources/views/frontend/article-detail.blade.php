@extends('frontend.layouts.main')

@section('title', $article->title . ' | RinjaniTrail.id')

@section('meta')
    {{-- SEO & Social Share Meta Tags --}}
    <meta name="description" content="{{ $article->excerpt ?? 'Artikel edukasi tentang pendakian Gunung Rinjani di RinjaniTrail.id' }}">
    <meta name="keywords" content="Rinjani, Trekking, Lombok, {{ $article->category }}, {{ $article->tags }}">
    
    <!-- Facebook Open Graph -->
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ $article->excerpt }}">
    <meta property="og:image" content="{{ $article->image ? asset('storage/' . $article->image) : asset('default-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $article->title }}">
    <meta name="twitter:description" content="{{ $article->excerpt }}">
    <meta name="twitter:image" content="{{ $article->image ? asset('storage/' . $article->image) : asset('default-image.jpg') }}">
@endsection

@section('content')
<main class="pt-28 pb-xl px-md md:px-lg">
    
    <!-- Reading Progress Bar -->
    <div id="reading-progress" class="fixed top-0 left-0 w-0 h-1 bg-gradient-to-r from-secondary-fixed to-secondary z-50 transition-all duration-100"></div>
    
    <article class="max-w-4xl mx-auto">
        
        <!-- Back Button -->
        <div class="mb-md">
            <a href="{{ route('articles') }}" class="inline-flex items-center gap-xs text-secondary hover:underline font-label-md">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali ke Artikel
            </a>
        </div>

        <!-- Header Article -->
        <header class="mb-lg">
            <!-- Category & Meta -->
            <div class="flex flex-wrap items-center gap-md mb-sm">
                <span class="bg-secondary-container text-on-secondary-container px-sm py-1 rounded-full text-label-sm font-bold uppercase">
                    {{ $article->category }}
                </span>
                <span class="text-on-surface-variant text-label-sm flex items-center gap-xs">
                    <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                    {{ $article->published_at->format('F d, Y') }}
                </span>
                <span class="text-on-surface-variant text-label-sm flex items-center gap-xs">
                    <span class="material-symbols-outlined text-[16px]">visibility</span>
                    {{ $article->views }} views
                </span>
                <span class="text-on-surface-variant text-label-sm flex items-center gap-xs">
                    <span class="material-symbols-outlined text-[16px]">schedule</span>
                    {{ ceil(str_word_count($article->content) / 200) }} min read
                </span>
            </div>

            <!-- Title -->
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md leading-tight">
                {{ $article->title }}
            </h1>

            <!-- Author Info -->
            <div class="flex items-center gap-sm p-sm bg-surface-container-low rounded-lg">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-secondary to-secondary-container flex items-center justify-center text-white font-bold text-lg">
                    {{ strtoupper(substr($article->author->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-label-md text-on-surface font-bold">{{ $article->author->name }}</p>
                    <p class="text-label-sm text-on-surface-variant">Penulis • {{ $article->author->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        @if($article->image)
        <div class="mb-lg rounded-2xl overflow-hidden shadow-lg">
            <img src="{{ $article->image_url }}" 
                 alt="{{ $article->image_alt ?? $article->title }}" 
                 class="w-full h-auto object-cover">
        </div>
        @endif

        <!-- Excerpt -->
        @if($article->excerpt)
        <div class="mb-lg p-md bg-gradient-to-r from-secondary-container/30 to-primary-fixed/20 rounded-xl border-l-4 border-secondary">
            <p class="font-body-lg text-on-surface italic leading-relaxed">
                {{ $article->excerpt }}
            </p>
        </div>
        @endif

        <!-- Content -->
        <div class="prose prose-lg max-w-none mb-xl text-on-surface">
            <div class="leading-relaxed space-y-4 text-lg">
                {!! nl2br(e($article->content)) !!}
            </div>
        </div>

        <!-- Tags -->
        @if($article->tags)
        <div class="mt-xl pt-md border-t border-outline-variant/30">
            <p class="text-label-sm text-on-surface-variant mb-sm font-bold">Tags:</p>
            <div class="flex flex-wrap gap-xs">
                @foreach($article->tags_array as $tag)
                <a href="{{ route('articles', ['search' => $tag]) }}" 
                   class="px-sm py-1 bg-surface-container text-on-surface-variant rounded-lg text-xs hover:bg-secondary-container hover:text-on-secondary-container transition-colors">
                    #{{ $tag }}
                </a>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Share Buttons (UPDATED - Sekarang Bisa Diklik!) -->
        <div class="mt-lg pt-md border-t border-outline-variant/30">
            <p class="text-label-sm text-on-surface-variant mb-sm font-bold">Bagikan artikel ini:</p>
            <div class="flex gap-sm">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                   target="_blank"
                   class="p-2 bg-[#1877F2] text-white rounded-lg hover:scale-105 transition-transform" 
                   title="Share to Facebook">
                    <span class="material-symbols-outlined">share</span>
                </a>
                
                <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" 
                   target="_blank"
                   class="p-2 bg-[#25D366] text-white rounded-lg hover:scale-105 transition-transform" 
                   title="Share to WhatsApp">
                    <span class="material-symbols-outlined">share</span>
                </a>
                
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(url()->current()) }}" 
                   target="_blank"
                   class="p-2 bg-[#1DA1F2] text-white rounded-lg hover:scale-105 transition-transform" 
                   title="Share to Twitter">
                    <span class="material-symbols-outlined">share</span>
                </a>
            </div>
        </div>

    </article>

    <!-- Related Articles -->
    @if($relatedArticles->count() > 0)
    <section class="max-w-container-max mx-auto mt-2xl pt-xl border-t border-outline-variant/30">
        <h2 class="font-headline-md text-primary-container mb-md">Artikel Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
            @foreach($relatedArticles as $related)
            <a href="{{ route('articles.show', $related->slug) }}" class="group">
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all">
                    <div class="aspect-video relative overflow-hidden">
                        <img src="{{ $related->image_url }}" 
                             alt="{{ $related->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-md left-md">
                            <span class="bg-primary/90 text-on-primary px-sm py-1 rounded-full text-label-sm capitalize">
                                {{ $related->category }}
                            </span>
                        </div>
                    </div>
                    <div class="p-md">
                        <h3 class="font-label-md text-on-surface group-hover:text-secondary line-clamp-2 mb-sm">
                            {{ $related->title }}
                        </h3>
                        <div class="flex items-center gap-xs text-on-surface-variant text-label-sm">
                            <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                            {{ $related->published_at->format('M d, Y') }}
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    @endif

</main>

<style>
/* Prose styling untuk konten artikel */
.prose h2 { font-size: 1.5rem; font-weight: 700; margin-top: 2rem; margin-bottom: 1rem; color: #002229; }
.prose h3 { font-size: 1.25rem; font-weight: 600; margin-top: 1.5rem; margin-bottom: 0.75rem; color: #002229; }
.prose p { margin-bottom: 1rem; line-height: 1.8; }
.prose ul, .prose ol { margin-bottom: 1rem; padding-left: 1.5rem; }
.prose li { margin-bottom: 0.5rem; }
.prose strong { font-weight: 700; color: #002229; }
.prose a { color: #3b6470; text-decoration: underline; }
.prose blockquote { border-left: 4px solid #beeaf8; padding-left: 1rem; font-style: italic; color: #45636b; }
</style>

@push('scripts')
<script>
    // Reading Progress Bar Logic
    window.onscroll = function() {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (winScroll / height) * 100;
        document.getElementById("reading-progress").style.width = scrolled + "%";
    };
</script>
@endpush
@endsection