@extends('frontend.layouts.main')

@section('title', 'Trip Gallery | RinjaniTrail.id - Alpine Expedition Visuals')

@push('styles')
<style>
    .glass-panel {
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
    .masonry-grid {
        column-count: 1;
        column-gap: 1.5rem;
    }
    @media (min-width: 640px) { .masonry-grid { column-count: 2; } }
    @media (min-width: 1024px) { .masonry-grid { column-count: 3; } }
    @media (min-width: 1280px) { .masonry-grid { column-count: 4; } }
    .masonry-item {
        break-inside: avoid;
        margin-bottom: 1.5rem;
    }
    .parallax-hero {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    .float-animation {
        animation: float 6s ease-in-out infinite;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    .photo-overlay {
        background: linear-gradient(to top, rgba(0, 34, 41, 0.95) 0%, rgba(0, 34, 41, 0.5) 40%, transparent 100%);
    }
    .filter-btn.active {
        background-color: #002229;
        color: #faf9f9;
    }
    .photo-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .photo-card:hover {
        transform: translateY(-8px);
    }
    .counter {
        display: inline-block;
    }
    .testimonial-card {
        transition: all 0.3s ease;
    }
    .testimonial-card:hover {
        transform: scale(1.02);
    }
</style>
@endpush

@section('content')
<main class="pt-20">
    
    <!-- Hero Section with Parallax -->
    <section class="relative h-[90vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 parallax-hero" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAr7bvuNyoYerIHABIHOcU6VxvDObwBWXVY3uGxoEOm0n_dzVbYyF014zLIpoO-EXylRefS3vQcAd6io8RL3amORq6eycynGhmvzXE_h-WtTcu7iXmRC4maO3vy9PMnnhFWCD8Qdks7LhOhmuxPcmm5-PDQLHKdOMrZThGu-l0eX160zpz9WpFd3PakH4Uh8FH9IWNhRabEluwBFEE__6bU_ZvS7jdtPFg1u8G2aKc7b6UJSJnWUZfNRzhBdB4MQ6dP_rdX9IUPYWEh')">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-primary-container/60 via-primary-container/30 to-background"></div>
        
        <div class="relative z-10 text-center px-md max-w-5xl fade-in-up">
            <span class="inline-block bg-secondary-container text-on-secondary-container px-md py-base rounded-full font-label-md text-label-md uppercase tracking-widest mb-md">
                <span class="material-symbols-outlined align-middle mr-1">photo_camera</span>
                Official Expedition Gallery
            </span>
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md drop-shadow-2xl">
                Visual Stories from the Summit
            </h1>
            <p class="font-body-lg text-body-lg text-surface/90 max-w-3xl mx-auto mb-lg">
                Witness the raw majesty of Mount Rinjani through the lenses of our professional photographers and trekkers. Every frame tells a story of adventure, perseverance, and natural wonder.
            </p>
            <div class="flex flex-wrap gap-md justify-center">
                <a href="#gallery" class="bg-surface text-primary-container px-lg py-md rounded-lg font-headline-sm hover:scale-105 transition-all shadow-xl flex items-center gap-xs">
                    <span class="material-symbols-outlined">collections</span>
                    Explore Gallery
                </a>
                <a href="#submit" class="border-2 border-surface text-surface px-lg py-md rounded-lg font-headline-sm hover:bg-surface hover:text-primary-container transition-all flex items-center gap-xs">
                    <span class="material-symbols-outlined">upload</span>
                    Submit Your Photos
                </a>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-md left-1/2 -translate-x-1/2 float-animation">
            <span class="material-symbols-outlined text-surface text-4xl">keyboard_arrow_down</span>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="bg-surface-container-low py-xl border-b border-outline-variant/20">
        <div class="max-w-container-max mx-auto px-md">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-lg text-center">
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-secondary text-4xl mb-sm">photo_library</span>
                    <span class="font-display-lg text-display-lg text-primary-container counter" data-target="2500">0</span>
                    <span class="font-label-md text-on-surface-variant uppercase tracking-wider">Photos Captured</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-secondary text-4xl mb-sm">groups</span>
                    <span class="font-display-lg text-display-lg text-primary-container counter" data-target="350">0</span>
                    <span class="font-label-md text-on-surface-variant uppercase tracking-wider">Photographers</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-secondary text-4xl mb-sm">landscape</span>
                    <span class="font-display-lg text-display-lg text-primary-container counter" data-target="48">0</span>
                    <span class="font-label-md text-on-surface-variant uppercase tracking-wider">Expeditions</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-secondary text-4xl mb-sm">award</span>
                    <span class="font-display-lg text-display-lg text-primary-container counter" data-target="12">0</span>
                    <span class="font-label-md text-on-surface-variant uppercase tracking-wider">Awards Won</span>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Gallery Section with Filters -->
    <section class="py-xl max-w-container-max mx-auto px-md" id="gallery">
        <div class="mb-lg text-center">
            <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Curated Collection</span>
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md">Expedition Visuals</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">
                From the volcanic caldera to the first light hitting the summit, explore our curated collection of expedition photography.
            </p>
        </div>
        
        <!-- Filter Buttons - Dynamic dari Database -->
        <div class="flex flex-wrap gap-sm justify-center mb-xl">
            <a href="{{ route('trip_gallery') }}"
               class="filter-btn px-md py-base rounded-full font-label-md whitespace-nowrap transition-all {{ !request('category') ? 'bg-primary text-on-primary active' : 'bg-surface-container-high text-on-surface-variant hover:text-primary' }}">
                All Photos
            </a>
            @foreach($categories as $key => $label)
            <a href="{{ route('trip_gallery', ['category' => $key]) }}"
               class="filter-btn px-md py-base rounded-full font-label-md whitespace-nowrap transition-all {{ request('category') == $key ? 'bg-primary text-on-primary active' : 'bg-surface-container-high text-on-surface-variant hover:text-primary' }}">
                {{ $label }}
            </a>
            @endforeach
        </div>
        
        <!-- Masonry Gallery - Dynamic dari Database -->
        <div class="masonry-grid" id="galleryGrid">
            @forelse($galleries as $gallery)
            <div class="masonry-item photo-card group cursor-pointer overflow-hidden rounded-xl bg-surface-container shadow-sm hover:shadow-2xl" data-category="{{ $gallery->category }}" onclick="openLightbox(this)">
                <div class="relative overflow-hidden">
                    <img class="w-full h-auto object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="{{ $gallery->title }}"
                         src="{{ asset('storage/' . $gallery->image) }}">
                    <div class="absolute inset-0 photo-overlay opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-md">
                        @if($gallery->tags)
                        <span class="text-secondary-fixed font-label-sm mb-xs">{{ $gallery->tags }}</span>
                        @endif
                        <h3 class="text-surface font-headline-sm">{{ $gallery->title }}</h3>
                        @if($gallery->photographer)
                        <p class="text-surface/80 font-label-sm mt-xs">By {{ $gallery->photographer }}{{ $gallery->location ? ' • ' . $gallery->location : '' }}</p>
                        @endif
                    </div>
                    @if($gallery->is_featured)
                    <div class="absolute top-sm left-sm">
                        <span class="bg-secondary-fixed text-primary-container text-xs px-xs py-1 rounded font-bold">⭐ Featured</span>
                    </div>
                    @endif
                </div>
                <div class="p-md bg-white">
                    <span class="text-label-sm font-label-sm bg-secondary-container text-on-secondary-container px-xs py-1 rounded-full uppercase tracking-wider">{{ $gallery->category_label }}</span>
                    <h3 class="mt-xs font-headline-sm text-headline-sm text-primary-container">{{ $gallery->title }}</h3>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-xl">
                <span class="material-symbols-outlined text-outline-variant text-6xl mb-md block">photo_library</span>
                <h3 class="font-headline-sm text-on-surface-variant mb-sm">Belum Ada Foto di Galeri</h3>
                <p class="text-on-surface-variant">Foto akan tampil setelah admin mengunggah konten.</p>
            </div>
            @endforelse
        </div>
        
        @if($galleries->count() > 0)
        <!-- Info Footer -->
        <div class="mt-xl text-center">
            <p class="text-on-surface-variant font-body-md">Menampilkan {{ $galleries->count() }} foto dari koleksi kami</p>
        </div>
        @endif
    </section>
    
 <!-- Featured Photographer Section -->
<section class="bg-primary-container py-xl">
    <div class="max-w-container-max mx-auto px-md">
        <div class="text-center mb-xl">
            <span class="text-secondary-fixed font-label-sm tracking-widest uppercase mb-xs block">Spotlight</span>
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md">Featured Photographer</h2>
            <p class="font-body-lg text-surface/80 max-w-2xl mx-auto">Meet the talented artists who capture the essence of Mount Rinjani through their lenses.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
            <!-- Photographer 1 -->
            <div class="bg-surface/10 backdrop-blur-md border border-white/20 rounded-xl p-lg text-center hover:bg-surface/20 transition-all">
                <div class="w-32 h-32 rounded-full overflow-hidden mx-auto mb-md border-4 border-secondary-fixed">
                    <img class="w-full h-full object-cover object-top" 
                         alt="Boss Muda" 
                         src="{{ asset('image/boy_1.jpeg') }}">
                </div>
                <h3 class="font-headline-sm text-surface mb-xs">Boss Muda</h3>
                <p class="font-label-sm text-secondary-fixed mb-md">Summit Specialist</p>
                <p class="font-body-md text-surface/80 mb-md">15+ years of Rinjani expeditions. Certified in Advanced Wilderness First Aid and Alpine Rescue.</p>
                <div class="flex justify-center gap-md text-surface">
                    <span class="flex items-center gap-xs font-label-sm">
                        <span class="material-symbols-outlined text-sm">photo_camera</span> 248 Photos
                    </span>
                    <span class="flex items-center gap-xs font-label-sm">
                        <span class="material-symbols-outlined text-sm">star</span> 4.9 Rating
                    </span>
                </div>
            </div>
            
            <!-- Photographer 2 -->
            <div class="bg-surface/10 backdrop-blur-md border border-white/20 rounded-xl p-lg text-center hover:bg-surface/20 transition-all">
                <div class="w-32 h-32 rounded-full overflow-hidden mx-auto mb-md border-4 border-secondary-fixed">
                    <img class="w-full h-full object-cover object-top" 
                         alt="Boy" 
                         src="{{ asset('image/boy_2.jpeg') }}">
                </div>
                <h3 class="font-headline-sm text-surface mb-xs">Boy</h3>
                <p class="font-label-sm text-secondary-fixed mb-md">Logistics Director</p>
                <p class="font-body-md text-surface/80 mb-md">Specializes in sustainable supply chain management and ensuring high-end campsite standards.</p>
                <div class="flex justify-center gap-md text-surface">
                    <span class="flex items-center gap-xs font-label-sm">
                        <span class="material-symbols-outlined text-sm">photo_camera</span> 186 Photos
                    </span>
                    <span class="flex items-center gap-xs font-label-sm">
                        <span class="material-symbols-outlined text-sm">star</span> 4.8 Rating
                    </span>
                </div>
            </div>
            
            <!-- Photographer 3 -->
            <div class="bg-surface/10 backdrop-blur-md border border-white/20 rounded-xl p-lg text-center hover:bg-surface/20 transition-all">
                <div class="w-32 h-32 rounded-full overflow-hidden mx-auto mb-md border-4 border-secondary-fixed">
                    <img class="w-full h-full object-cover object-top" 
                         alt="Bukhari Hidayat" 
                         src="{{ asset('image/boy_3.jpeg') }}">
                </div>
                <h3 class="font-headline-sm text-surface mb-xs">Bukhari Hidayat</h3>
                <p class="font-label-sm text-secondary-fixed mb-md">Environmental Officer</p>
                <p class="font-body-md text-surface/80 mb-md">Leads our 'Zero Waste' initiatives and community education programs for trail preservation.</p>
                <div class="flex justify-center gap-md text-surface">
                    <span class="flex items-center gap-xs font-label-sm">
                        <span class="material-symbols-outlined text-sm">photo_camera</span> 312 Photos
                    </span>
                    <span class="flex items-center gap-xs font-label-sm">
                        <span class="material-symbols-outlined text-sm">star</span> 5.0 Rating
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
    
    <!-- Behind the Scenes Section -->
    <section class="py-xl max-w-container-max mx-auto px-md">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-xl items-center">
            <div>
                <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Behind the Lens</span>
                <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md">Stories Behind the Frames</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-lg leading-relaxed">
                    Every photograph in our gallery tells a unique story. From the pre-dawn preparations to the triumphant summit moments, our photographers capture not just images, but emotions, challenges, and the raw beauty of Mount Rinjani.
                </p>
                
                <div class="space-y-md">
                    <div class="flex gap-md">
                        <div class="w-12 h-12 rounded-lg bg-secondary-container flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-on-secondary-container">wb_twilight</span>
                        </div>
                        <div>
                            <h4 class="font-headline-sm text-primary-container mb-xs">The 2 AM Summit Push</h4>
                            <p class="font-body-md text-on-surface-variant">Our photographers brave the cold darkness to capture the first light hitting the summit, creating breathtaking sunrise panoramas.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-md">
                        <div class="w-12 h-12 rounded-lg bg-secondary-container flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-on-secondary-container">terrain</span>
                        </div>
                        <div>
                            <h4 class="font-headline-sm text-primary-container mb-xs">Technical Challenges</h4>
                            <p class="font-body-md text-on-surface-variant">Shooting at 3,726m requires specialized equipment and techniques to handle extreme cold, wind, and altitude.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-md">
                        <div class="w-12 h-12 rounded-lg bg-secondary-container flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-on-secondary-container">groups</span>
                        </div>
                        <div>
                            <h4 class="font-headline-sm text-primary-container mb-xs">Human Connection</h4>
                            <p class="font-body-md text-on-surface-variant">Beyond landscapes, we capture the bonds formed between trekkers, guides, and porters on the mountain.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="grid grid-cols-2 gap-md">
                    <div class="rounded-xl overflow-hidden shadow-xl transform translate-y-8">
                        <img class="w-full h-64 object-cover" 
                             alt="Behind the Scenes 1" 
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuAfcnJpXuUp3xZT0IqJFjA843tWUn3ttOpPVAA4o0AMcnZNI79sC2UuS7vFj8Q9C0Cyhru4F9nW1Ri3v8jkw6cYQFe1puaC39e-N6nhYde_CFxKh7_3UJ1DeTEE5P7G-Qxt2a96dOUo-d3aWsYts8hAHvMzbVKJuW7B1sNn0BU-DWrP78OAgNxQCVNlq4m55HK69s4qmTWeeRXUpdGCZOugHaGMvQw_UnvT-3Cx_DWo6rchQBJ2ylpVMDonnPfOxexKlkfy0sDSGdPX">
                    </div>
                    <div class="rounded-xl overflow-hidden shadow-xl">
                        <img class="w-full h-64 object-cover" 
                             alt="Behind the Scenes 2" 
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYpmZlBKShYhhtKIgjZvPJsDt8l9QdJKRJECLKm_gds1vJVYUiEdj9eoltupIRWZx_5Xqv2hGrqiebmk0-E5ne-aM5Ihee0DbG8r3Jz9z6HRi_IjjcTfaQHWxcl33hCt3oPp84nXlQ1yyx2anCaZuRfLIS_555eHh0ffxpxow3P1MuThZgHOih1WjKnMVQzmxZ_HIgEmJCcwQgYicEzETZDmntTcgzn7gTRVsSmu3GiJTOqOMXrLCxYmppItfE2Hpev5FUoPaZ-wYb">
                    </div>
                    <div class="rounded-xl overflow-hidden shadow-xl">
                        <img class="w-full h-64 object-cover" 
                             alt="Behind the Scenes 3" 
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmwnWJj5WTbsrOxe9jX4UxhIV67dcTLdYqBVZK84SvO_BwuFE4CaYuYtsTnVgQtY2_ZmVk-oGs5_rq0FcMrjqDZ5MmNMiw_XayExiYZ9iHvgVQNjKzwWbBeNwnEjs0pooz7c6T5FCgt71ef1K4JzVa3wGjUrHZ0fsGJ6Nb07Zrpek3W4SDRQLpTzglHPVy97-jQKfI5fMh6K_vLoSg2l7yK-1of7t1tRHzlpDUrpoUE7SERyuQwqYYu7HQHChye9AqOTUx5T6MJwdY">
                    </div>
                    <div class="rounded-xl overflow-hidden shadow-xl transform translate-y-8">
                        <img class="w-full h-64 object-cover" 
                             alt="Behind the Scenes 4" 
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuToBxqNuCIOzz_OgKM54wiKvcuXMtKRHtB2T2fDJf9GccbUi8OPr_Sv19B-5BKYoJ3k54zUV2eWVEE84EVJXQNFR9Ve68MWpGlSJoCqEWw9W_qSyy2fmdEqu8msc0MnLQl1CM4z6upabj6JBLyP57CReH9RGO5UFx63hb_tbAwoBRdXnV95KNaNKvsjsXAuaKNotD7YGB_FpU7w8hSGGpv__7Ai9xiJdFiHgwXkM-aJ4exegknkdRcE29CHg-l0b8Ocm00-ePgNt0">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Photography Tips Section -->
    <section class="bg-surface-container-low py-xl">
        <div class="max-w-container-max mx-auto px-md">
            <div class="text-center mb-xl">
                <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Pro Tips</span>
                <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md">Photography at High Altitude</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Expert advice from our professional photographers for capturing stunning images on Mount Rinjani.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-lg">
                <div class="bg-white rounded-xl p-lg shadow-md hover:shadow-xl transition-all">
                    <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mb-md">
                        <span class="material-symbols-outlined text-on-secondary-container text-3xl">camera</span>
                    </div>
                    <h3 class="font-headline-sm text-primary-container mb-sm">Golden Hour Magic</h3>
                    <p class="font-body-md text-on-surface-variant text-sm">Shoot during sunrise (5:30-7:00 AM) and sunset (5:30-6:30 PM) for the most dramatic lighting on the volcanic landscape.</p>
                </div>
                
                <div class="bg-white rounded-xl p-lg shadow-md hover:shadow-xl transition-all">
                    <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mb-md">
                        <span class="material-symbols-outlined text-on-secondary-container text-3xl">thermostat</span>
                    </div>
                    <h3 class="font-headline-sm text-primary-container mb-sm">Cold Weather Gear</h3>
                    <p class="font-body-md text-on-surface-variant text-sm">Bring extra batteries and keep them warm. Cold temperatures drain batteries quickly at high altitude.</p>
                </div>
                
                <div class="bg-white rounded-xl p-lg shadow-md hover:shadow-xl transition-all">
                    <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mb-md">
                        <span class="material-symbols-outlined text-on-secondary-container text-3xl">filter_hdr</span>
                    </div>
                    <h3 class="font-headline-sm text-primary-container mb-sm">Wide Angle Lenses</h3>
                    <p class="font-body-md text-on-surface-variant text-sm">A 16-35mm lens is ideal for capturing the vast caldera views and expansive savanna landscapes.</p>
                </div>
                
                <div class="bg-white rounded-xl p-lg shadow-md hover:shadow-xl transition-all">
                    <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mb-md">
                        <span class="material-symbols-outlined text-on-secondary-container text-3xl">shutter_speed</span>
                    </div>
                    <h3 class="font-headline-sm text-primary-container mb-sm">Sturdy Tripod</h3>
                    <p class="font-body-md text-on-surface-variant text-sm">Essential for night sky photography and long exposures. Choose a lightweight carbon fiber model for trekking.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Video Expedition Preview -->
    <section class="py-xl max-w-container-max mx-auto px-md">
        <div class="relative rounded-3xl overflow-hidden shadow-2xl group cursor-pointer">
            <img class="w-full h-[500px] object-cover group-hover:scale-105 transition-transform duration-700" 
                 alt="Expedition Video" 
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcvC-jmtD6K6rSZszMxOTOhYQX7rcHKZGmte_J06M9B8QoMhn5VN5JaDj4cyLYm78QnfvA9U0yuWSzLIaG7KV4_Vevx4Di9WN2_8xnsA-gJUY8Wn7hexkOVYUuMzOyWukrE_kzUyWlhXaoZ-5H0HU13W-_tlW35LLX0GOD5M0zjWXjgvCJuC27LaCgQIUvrqJSD_EtCOKuqdhEq9YmY24xtQXWj8NnB3fMzFqA9hSu_mFXdu8bOQzhol64y6FgzS2sKrUdetypI0eU">
            <div class="absolute inset-0 bg-primary-container/40 group-hover:bg-primary-container/60 transition-colors"></div>
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-md">
                <div class="w-24 h-24 rounded-full bg-surface/90 flex items-center justify-center mb-md group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-primary-container text-5xl">play_circle</span>
                </div>
                <h3 class="font-display-lg text-surface mb-sm">Expedition Documentary</h3>
                <p class="font-body-lg text-surface/90 max-w-2xl">Watch the full 15-minute documentary about our latest expedition to the summit of Mount Rinjani.</p>
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <section class="bg-primary-container py-xl">
        <div class="max-w-container-max mx-auto px-md">
            <div class="text-center mb-xl">
                <span class="text-secondary-fixed font-label-sm tracking-widest uppercase mb-xs block">What They Say</span>
                <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md">Photographer Testimonials</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                <div class="testimonial-card bg-surface/10 backdrop-blur-md border border-white/20 rounded-xl p-lg">
                    <div class="flex gap-xs mb-md text-secondary-fixed">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    </div>
                    <p class="font-body-lg text-surface/90 mb-lg italic">"The support from RinjaniTrail.id was exceptional. They understood exactly what I needed as a photographer and helped me capture shots I never thought possible."</p>
                    <div class="flex items-center gap-md">
                        <div class="w-12 h-12 rounded-full overflow-hidden">
                            <img class="w-full h-full object-cover" alt="Photographer" alt="Boss Muda" src="{{ asset('image/boy_1.jpeg') }}">
                        </div>
                        <div>
                            <h4 class="font-headline-sm text-surface">Boss Muda</h4>
                            <p class="font-label-sm text-secondary-fixed">National Geographic</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card bg-surface/10 backdrop-blur-md border border-white/20 rounded-xl p-lg">
                    <div class="flex gap-xs mb-md text-secondary-fixed">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    </div>
                    <p class="font-body-lg text-surface/90 mb-lg italic">"As a wildlife photographer, I was amazed by the biodiversity we encountered. The guides knew exactly where to find the rarest species. Unforgettable experience!"</p>
                    <div class="flex items-center gap-md">
                        <div class="w-12 h-12 rounded-full overflow-hidden">
                            <img class="w-full h-full object-cover" alt="Photographer" alt="Boy" src="{{ asset('image/boy_2.jpeg') }}">
                        </div>
                        <div>
                            <h4 class="font-headline-sm text-surface">Boy</h4>
                            <p class="font-label-sm text-secondary-fixed">Wildlife Photographer</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card bg-surface/10 backdrop-blur-md border border-white/20 rounded-xl p-lg">
                    <div class="flex gap-xs mb-md text-secondary-fixed">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    </div>
                    <p class="font-body-lg text-surface/90 mb-lg italic">"The cultural immersion was the highlight for me. photographing the Sasak communities around Rinjani gave me a deeper appreciation for this sacred mountain."</p>
                    <div class="flex items-center gap-md">
                        <div class="w-12 h-12 rounded-full overflow-hidden">
                            <img class="w-full h-full object-cover" alt="Photographer" alt="Bukhari Hidayat" src="{{ asset('image/boy_3.jpeg') }}">
                        </div>
                        <div>
                            <h4 class="font-headline-sm text-surface">Bukhari Hidayat</h4>
                            <p class="font-label-sm text-secondary-fixed">Documentary Filmmaker</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Submit Your Photos CTA -->
    <section class="py-xl max-w-container-max mx-auto px-md" id="submit">
        <div class="bg-gradient-to-br from-primary-container to-secondary rounded-3xl p-xl text-center relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-32 translate-x-32"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/5 rounded-full translate-y-48 -translate-x-48"></div>
            
            <div class="relative z-10">
                <span class="material-symbols-outlined text-secondary-fixed text-6xl mb-md">upload_file</span>
                <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md">Share Your Rinjani Story</h2>
                <p class="font-body-lg text-body-lg text-surface/90 max-w-2xl mx-auto mb-lg">
                    Are you a photographer who has captured the beauty of Mount Rinjani? Submit your best shots to be featured in our official gallery and join our community of alpine visual storytellers.
                </p>
                
                <div class="flex flex-wrap gap-md justify-center mb-lg">
                    <div class="flex items-center gap-xs bg-surface/10 backdrop-blur-md px-md py-base rounded-full text-surface">
                        <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                        <span class="font-label-md">Professional Exposure</span>
                    </div>
                    <div class="flex items-center gap-xs bg-surface/10 backdrop-blur-md px-md py-base rounded-full text-surface">
                        <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                        <span class="font-label-md">Feature in Publications</span>
                    </div>
                    <div class="flex items-center gap-xs bg-surface/10 backdrop-blur-md px-md py-base rounded-full text-surface">
                        <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                        <span class="font-label-md">Community Recognition</span>
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-md justify-center">
                    <button class="bg-surface text-primary-container px-lg py-md rounded-lg font-headline-sm hover:scale-105 transition-all shadow-xl flex items-center gap-xs">
                        <span class="material-symbols-outlined">upload</span>
                        Submit Photos
                    </button>
                    <button class="border-2 border-surface text-surface px-lg py-md rounded-lg font-headline-sm hover:bg-surface hover:text-primary-container transition-all flex items-center gap-xs">
                        <span class="material-symbols-outlined">info</span>
                        Submission Guidelines
                    </button>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Awards & Recognition -->
    <section class="bg-surface-container-low py-xl">
        <div class="max-w-container-max mx-auto px-md">
            <div class="text-center mb-xl">
                <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Recognition</span>
                <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md">Awards & Features</h2>
            </div>
            
            <div class="flex flex-wrap justify-center items-center gap-xl grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-primary-container text-5xl mb-sm">workspace_premium</span>
                    <span class="font-label-md text-on-surface-variant text-center">National<br>Geographic</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-primary-container text-5xl mb-sm">award</span>
                    <span class="font-label-md text-on-surface-variant text-center">Wildlife<br>Photographer</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-primary-container text-5xl mb-sm">military_tech</span>
                    <span class="font-label-md text-on-surface-variant text-center">Sony World<br>Photo Awards</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-primary-container text-5xl mb-sm">emoji_events</span>
                    <span class="font-label-md text-on-surface-variant text-center">Indonesia<br>Tourism Awards</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-primary-container text-5xl mb-sm">stars</span>
                    <span class="font-label-md text-on-surface-variant text-center">Lonely Planet<br>Featured</span>
                </div>
            </div>
        </div>
    </section>
    
</main>

<!-- Lightbox Modal -->
<div class="fixed inset-0 z-[100] bg-black/95 backdrop-blur-xl hidden flex-col items-center justify-center p-md" id="lightbox">
    <button class="absolute top-md right-md text-surface text-4xl hover:text-secondary-fixed transition-colors" onclick="closeLightbox()">
        <span class="material-symbols-outlined">close</span>
    </button>
    <button class="absolute top-1/2 left-md -translate-y-1/2 text-surface text-4xl hover:text-secondary-fixed transition-colors" onclick="prevPhoto()">
        <span class="material-symbols-outlined">chevron_left</span>
    </button>
    <button class="absolute top-1/2 right-md -translate-y-1/2 text-surface text-4xl hover:text-secondary-fixed transition-colors" onclick="nextPhoto()">
        <span class="material-symbols-outlined">chevron_right</span>
    </button>
    
    <div class="max-w-6xl w-full">
        <img class="max-w-full max-h-[70vh] object-contain rounded-lg mx-auto" id="lightbox-img" src="">
        <div class="mt-md text-center">
            <h3 class="font-headline-sm text-surface mb-xs" id="lightbox-caption"></h3>
            <p class="font-label-sm text-surface/70" id="lightbox-author"></p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Filter Gallery
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('#galleryGrid .masonry-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active button
            filterBtns.forEach(b => {
                b.classList.remove('active', 'bg-primary', 'text-on-primary');
                b.classList.add('bg-surface-container-high', 'text-on-surface-variant');
            });
            btn.classList.add('active', 'bg-primary', 'text-on-primary');
            btn.classList.remove('bg-surface-container-high', 'text-on-surface-variant');
            
            // Filter items
            const filter = btn.dataset.filter;
            galleryItems.forEach(item => {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeInUp 0.5s ease-out';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
    
    // Lightbox
    let currentPhotos = [];
    let currentIndex = 0;
    
    function openLightbox(element) {
        const img = element.querySelector('img');
        const title = element.querySelector('h3').innerText;
        const author = element.querySelector('.photo-overlay p').innerText;
        
        // Collect all visible photos
        currentPhotos = [];
        galleryItems.forEach(item => {
            if (item.style.display !== 'none') {
                currentPhotos.push({
                    src: item.querySelector('img').src,
                    title: item.querySelector('h3').innerText,
                    author: item.querySelector('.photo-overlay p').innerText
                });
            }
        });
        
        // Find current index
        currentIndex = currentPhotos.findIndex(p => p.src === img.src);
        
        // Show lightbox
        document.getElementById('lightbox-img').src = img.src;
        document.getElementById('lightbox-caption').innerText = title;
        document.getElementById('lightbox-author').innerText = author;
        document.getElementById('lightbox').classList.remove('hidden');
        document.getElementById('lightbox').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
        document.getElementById('lightbox').classList.add('hidden');
        document.getElementById('lightbox').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
    
    function prevPhoto() {
        currentIndex = (currentIndex - 1 + currentPhotos.length) % currentPhotos.length;
        updateLightbox();
    }
    
    function nextPhoto() {
        currentIndex = (currentIndex + 1) % currentPhotos.length;
        updateLightbox();
    }
    
    function updateLightbox() {
        const photo = currentPhotos[currentIndex];
        document.getElementById('lightbox-img').src = photo.src;
        document.getElementById('lightbox-caption').innerText = photo.title;
        document.getElementById('lightbox-author').innerText = photo.author;
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (!document.getElementById('lightbox').classList.contains('hidden')) {
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') prevPhoto();
            if (e.key === 'ArrowRight') nextPhoto();
        }
    });
    
    // Counter Animation
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                element.textContent = target.toLocaleString();
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current).toLocaleString();
            }
        }, 16);
    }
    
    // Intersection Observer for counters
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    document.querySelectorAll('.counter').forEach(counter => {
        counterObserver.observe(counter);
    });
</script>
@endpush