@extends('frontend.layouts.main')

{{-- SEO & Social Share Meta Tags --}}
@section('meta')
    <meta name="description" content="Jalur pendakian {{ $route->name }} di Gunung Rinjani. {{ $route->difficulty }} difficulty, durasi {{ $route->duration }}.">
    <meta property="og:title" content="{{ $route->name }}">
    <meta property="og:description" content="Info lengkap jalur pendakian {{ $route->name }} di RinjaniTrail.id">
    <meta property="og:image" content="{{ $route->image ? asset('storage/' . $route->image) : asset('default-image.jpg') }}">
    <meta property="og:type" content="website">
@endsection

@section('title', $route->name . ' | RinjaniTrail.id')

@section('content')
<main class="pt-28 pb-xl px-md md:px-lg">
    <article class="max-w-5xl mx-auto">
        
        <!-- Back Button -->
        <div class="mb-md">
            <a href="{{ route('routes') }}" class="inline-flex items-center gap-xs text-secondary hover:underline font-label-md">
                <span class="material-symbols-outlined">arrow_back</span> Kembali ke Daftar Rute
            </a>
        </div>

        <!-- Header & Stats -->
        <header class="mb-lg">
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-sm leading-tight">
                {{ $route->name }}
            </h1>
            
            <div class="flex flex-wrap items-center gap-md mb-md">
                <!-- Difficulty Badge -->
                <span class="px-sm py-1 rounded text-xs font-bold uppercase border {{ $route->difficulty_color }}">
                    {{ $route->difficulty }}
                </span>
                <span class="text-on-surface-variant flex items-center gap-xs text-label-sm">
                    <span class="material-symbols-outlined text-[16px]">schedule</span> {{ $route->duration }}
                </span>
                @if($route->elevation_gain)
                <span class="text-on-surface-variant flex items-center gap-xs text-label-sm">
                    <span class="material-symbols-outlined text-[16px]">height</span> {{ $route->elevation_gain }} mdpl
                </span>
                @endif
                @if($route->start_point)
                <span class="text-on-surface-variant flex items-center gap-xs text-label-sm">
                    <span class="material-symbols-outlined text-[16px]">location_on</span> {{ $route->start_point }}
                </span>
                @endif
            </div>

            <!-- Status Badge -->
            @if($route->is_active)
            <div class="inline-flex items-center gap-xs bg-green-500/10 text-green-700 border border-green-500/30 px-md py-sm rounded-lg font-label-md mb-md">
                <span class="material-symbols-outlined">check_circle</span> Rute Aktif & Terbuka
            </div>
            @else
            <div class="inline-flex items-center gap-xs bg-red-500/10 text-red-700 border border-red-500/30 px-md py-sm rounded-lg font-label-md mb-md">
                <span class="material-symbols-outlined">cancel</span> Rute Ditutup Sementara
            </div>
            @endif
        </header>

        <!-- Image & Description Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-lg mb-xl">
            <!-- Image -->
            <div class="rounded-2xl overflow-hidden shadow-lg h-full min-h-[300px] bg-surface-container-low">
                @if($route->image)
                <img src="{{ asset('storage/' . $route->image) }}" 
                     alt="{{ $route->name }}" 
                     class="w-full h-full object-cover">
                @else
                <div class="w-full h-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-[80px] text-outline-variant">terrain</span>
                </div>
                @endif
            </div>

            <!-- Description -->
            <div class="flex flex-col justify-center">
                <h2 class="font-headline-md text-primary-container mb-sm">Deskripsi Rute</h2>
                <div class="bg-surface-container-low rounded-xl p-md">
                    <p class="text-on-surface text-body-lg leading-relaxed whitespace-pre-line">
                        {{ $route->description }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Share Buttons (TWEAK: Tambahan Baru) -->
        <div class="mb-lg pt-md border-t border-outline-variant/30 flex flex-col md:flex-row items-center justify-between gap-sm">
            <p class="text-label-sm text-on-surface-variant font-bold">Bagikan rute ini:</p>
            <div class="flex gap-sm">
                <a href="https://wa.me/?text={{ urlencode('Cek rute ' . $route->name . ': ' . url()->current()) }}" 
                   target="_blank"
                   class="flex items-center gap-1 p-2 bg-[#25D366] text-white rounded-lg hover:scale-105 transition-transform shadow-sm" title="Share ke WA">
                    <span class="material-symbols-outlined text-[18px]">share</span> WhatsApp
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                   target="_blank"
                   class="flex items-center gap-1 p-2 bg-[#1877F2] text-white rounded-lg hover:scale-105 transition-transform shadow-sm" title="Share ke FB">
                    <span class="material-symbols-outlined text-[18px]">share</span> Facebook
                </a>
            </div>
        </div>

        <!-- CTA / Next Step -->
        <div class="bg-gradient-to-r from-primary-container to-secondary p-lg rounded-2xl text-center shadow-md">
            <h3 class="font-headline-md text-white mb-sm">Butuh Panduan atau Porter?</h3>
            <p class="text-white/80 mb-md">Hubungi mitra lokal terpercaya untuk pendakian yang aman dan nyaman.</p>
            <a href="{{ route('local_services') }}" 
               class="inline-block bg-white text-primary-container px-lg py-sm rounded-lg font-label-md hover:scale-105 transition-transform shadow-md">
                Cari Guide & Porter
            </a>
        </div>

    </article>
</main>
@endsection