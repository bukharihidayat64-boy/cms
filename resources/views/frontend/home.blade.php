@extends('frontend.layouts.main')

@section('title', 'RinjaniTrail.id | Explore Mount Rinjani Safely')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center overflow-hidden opacity-0 animate-fade-up">
    <div class="absolute inset-0 z-0 parallax-bg" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDg8lW6wdwv3vsl40QQH3v6tqN1JCZipJ4VdCniHd9b6XJpQrnfttxLkQ1_gt018cum9L2KLpxhIQxPOhMHAvbB2rSRIBYRa3X7BleiiWURJos-0thMrE3iwwN8Xz-a7rEMfiWqLVO2crw8XKJyMvKBe8DCNGMcQ4eg4Wrutgexkbxe_ty13GdWFPMUK7GZaDBTN-lfXHAFgcJVAIk7cWr-iRMnMJG3LqNqe7Bx_BZopmWP5cP3veZmMtXO14AaxH9rMAyK0Q0HW5JN')">
        <div class="absolute inset-0 bg-gradient-to-b from-primary-container/40 via-transparent to-primary-container/80"></div>
    </div>
    
    <!-- Animated Clouds -->
    <div class="absolute inset-0 z-10 opacity-30 cloud-container">
        <div class="floating-clouds w-[200%] h-full flex items-start justify-around">
            <span class="material-symbols-outlined text-[300px] text-white/50">cloud</span>
            <span class="material-symbols-outlined text-[200px] text-white/30">cloud</span>
            <span class="material-symbols-outlined text-[400px] text-white/40">cloud</span>
        </div>
    </div>
    
    <div class="relative z-20 text-center px-md max-w-4xl">
        <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md animate-fade-up">Explore Mount Rinjani Safely and Responsibly</h1>
        <p class="font-body-lg text-body-lg text-surface-variant/90 mb-lg animate-fade-up [animation-delay:200ms]">Platform informasi pendakian Rinjani terlengkap untuk petualangan yang terencana, aman, dan berkesan bagi setiap pendaki.</p>
        <div class="flex flex-col md:flex-row gap-md justify-center items-center animate-fade-up [animation-delay:400ms]">
            <a href="{{ route('routes') }}" class="bg-primary text-on-primary px-lg py-md rounded-lg font-label-md flex items-center gap-xs hover:shadow-xl transition-all hover:scale-105">
                Lihat Rute
                <span class="material-symbols-outlined">explore</span>
            </a>
            <a href="{{ route('local_services') }}" class="border-2 border-surface text-surface px-lg py-md rounded-lg font-label-md hover:bg-surface hover:text-primary-container transition-all">
                Cari Mitra Lokal
            </a>
        </div>
    </div>
</section>

<!-- Quick Access Bento Grid -->
<section class="py-xl max-w-container-max mx-auto px-md -mt-24 relative z-30 opacity-0 animate-fade-up">
    <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-md">
        <!-- Route Card -->
        <a href="{{ route('routes') }}" class="glass-card p-md rounded-xl shadow-lg flex flex-col gap-sm group cursor-pointer hover:-translate-y-2 transition-all">
            <div class="bg-secondary-container w-12 h-12 rounded-lg flex items-center justify-center text-on-secondary-container">
                <span class="material-symbols-outlined">terrain</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-primary-container">Informasi Rute</h3>
            <p class="font-body-md text-on-surface-variant">Panduan rute Sembalun, Senaru, dan jalur lain sebagai referensi sebelum pendakian.</p>
            <div class="mt-auto flex items-center gap-xs text-secondary font-label-sm group-hover:gap-md transition-all">
                Lihat Semua <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </div>
        </a>
        
        <!-- Guides Card -->
        <a href="{{ route('local_services') }}" class="glass-card p-md rounded-xl shadow-lg flex flex-col gap-sm group cursor-pointer hover:-translate-y-2 transition-all">
            <div class="bg-secondary-container w-12 h-12 rounded-lg flex items-center justify-center text-on-secondary-container">
                <span class="material-symbols-outlined">hiking</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-primary-container">Local Guide</h3>
            <p class="font-body-md text-on-surface-variant">Verified expert guides for your safety journey.</p>
            <div class="mt-auto flex items-center gap-xs text-secondary font-label-sm">
                Book Guide <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </div>
        </a>
        
        <!-- Porter Card -->
        <a href="{{ route('local_services') }}" class="glass-card p-md rounded-xl shadow-lg flex flex-col gap-sm group cursor-pointer hover:-translate-y-2 transition-all">
            <div class="bg-secondary-container w-12 h-12 rounded-lg flex items-center justify-center text-on-secondary-container">
                <span class="material-symbols-outlined">backpack</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-primary-container">Porter Service</h3>
            <p class="font-body-md text-on-surface-variant">Professional porters to assist your heavy loads.</p>
            <div class="mt-auto flex items-center gap-xs text-secondary font-label-sm">
                Hire Porter <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </div>
        </a>
        
        <!-- Safety Card -->
        <a href="{{ route('faq') }}" class="glass-card p-md rounded-xl shadow-lg flex flex-col gap-sm group cursor-pointer hover:-translate-y-2 transition-all">
            <div class="bg-secondary-container w-12 h-12 rounded-lg flex items-center justify-center text-on-secondary-container">
                <span class="material-symbols-outlined">health_and_safety</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-primary-container">Safety Edu</h3>
            <p class="font-body-md text-on-surface-variant">Essential safety tips and conservation rules.</p>
            <div class="mt-auto flex items-center gap-xs text-secondary font-label-sm">
                Learn More <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </div>
        </a>
        
        <!-- Inspiration Card -->
        <a href="{{ route('trip_gallery') }}" class="glass-card p-md rounded-xl shadow-lg flex flex-col gap-sm group cursor-pointer hover:-translate-y-2 transition-all">
            <div class="bg-secondary-container w-12 h-12 rounded-lg flex items-center justify-center text-on-secondary-container">
                <span class="material-symbols-outlined">auto_awesome</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-primary-container">Travel Inspiration</h3>
            <p class="font-body-md text-on-surface-variant">Stories and galleries from fellow climbers.</p>
            <div class="mt-auto flex items-center gap-xs text-secondary font-label-sm">
                Get Inspired <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </div>
        </a>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-xl bg-surface-container-low opacity-0 animate-fade-up">
    <div class="max-w-container-max mx-auto px-md grid grid-cols-2 md:grid-cols-4 gap-lg text-center">
        <div class="flex flex-col">
            <span class="font-display-lg text-display-lg text-primary-container">10k+</span>
            <span class="font-label-md text-on-surface-variant">Certified Hikers</span>
        </div>
        <div class="flex flex-col">
            <span class="font-display-lg text-display-lg text-primary-container">50+</span>
            <span class="font-label-md text-on-surface-variant">Verified Partners</span>
        </div>
        <div class="flex flex-col">
            <span class="font-display-lg text-display-lg text-primary-container">3.7k</span>
            <span class="font-label-md text-on-surface-variant">Summit Elevations (m)</span>
        </div>
        <div class="flex flex-col">
            <span class="font-display-lg text-display-lg text-primary-container">100%</span>
            <span class="font-label-md text-on-surface-variant">Conservation Focused</span>
        </div>
    </div>
</section>

<!-- Featured Routes -->
<section class="py-xl max-w-container-max mx-auto px-md opacity-0 animate-fade-up">
    <div class="flex justify-between items-end mb-lg">
        <div>
            <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Choose Your Path</span>
            <h2 class="font-headline-md text-headline-md text-primary-container">Featured Trekking Routes</h2>
        </div>
        <a href="{{ route('routes') }}" class="text-primary font-label-md flex items-center gap-xs hover:gap-sm transition-all border-b-2 border-primary">
            View All Routes <span class="material-symbols-outlined">chevron_right</span>
        </a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
        @forelse($featuredRoutes as $route)
        <div class="group relative bg-white rounded-xl overflow-hidden shadow-lg border border-surface-variant">
            <div class="aspect-video relative overflow-hidden">
                @if($route->image)
                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
                     alt="{{ $route->name }}" 
                     src="{{ asset('storage/' . $route->image) }}">
                @else
                <div class="w-full h-full bg-gradient-to-br from-secondary-container to-primary-fixed flex items-center justify-center">
                    <span class="material-symbols-outlined text-[64px] text-white/50">terrain</span>
                </div>
                @endif
                <div class="absolute top-md left-md flex gap-xs">
                    <span class="bg-primary/90 text-on-primary px-sm py-1 rounded-full text-label-sm capitalize">{{ $route->difficulty }}</span>
                    @if($route->is_featured)
                    <span class="bg-secondary-container/90 text-on-secondary-container px-sm py-1 rounded-full text-label-sm">Popular</span>
                    @endif
                </div>
            </div>
            <div class="p-lg">
                <div class="flex justify-between items-start mb-sm">
                    <h3 class="font-headline-sm text-headline-sm text-primary-container">{{ $route->name }}</h3>
                    <div class="flex items-center text-secondary">
                        <span class="material-symbols-outlined text-sm">schedule</span>
                        <span class="font-label-md ml-1">{{ $route->duration }}</span>
                    </div>
                </div>
                <p class="font-body-md text-on-surface-variant mb-md">{{ $route->description ? Str::limit($route->description, 140) : 'Jelajahi rute pendakian menakjubkan ini bersama RinjaniTrail.id.' }}</p>
                <div class="flex justify-between items-center">
                    <div class="flex gap-md">
                        <div class="flex flex-col">
                            <span class="font-label-sm text-on-surface-variant">Difficulty</span>
                            <span class="font-label-md text-primary-container capitalize">{{ $route->difficulty }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-label-sm text-on-surface-variant">Status</span>
                            <span class="font-label-md {{ $route->is_active ? 'text-secondary' : 'text-error' }}">
                                {{ $route->is_active ? 'Open' : 'Closed' }}
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('routes.show', $route->slug) }}" class="bg-primary-container text-surface px-md py-xs rounded-lg font-label-md hover:bg-primary transition-colors">Route Details</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-xl">
            <span class="material-symbols-outlined text-[64px] text-outline-variant mb-md">terrain</span>
            <h3 class="font-headline-sm text-primary-container mb-sm">Belum ada rute unggulan</h3>
            <p class="text-on-surface-variant">Rute pendakian akan segera ditambahkan.</p>
        </div>
        @endforelse
    </div>
</section>

<!-- Safety & Conservation Section -->
<section class="py-xl bg-primary-container text-surface overflow-hidden relative opacity-0 animate-fade-up">
    <div class="absolute top-0 right-0 w-1/3 h-full opacity-10 pointer-events-none">
        <span class="material-symbols-outlined text-[600px]">eco</span>
    </div>
    <div class="max-w-container-max mx-auto px-md grid grid-cols-1 md:grid-cols-2 gap-xl items-center">
        <div class="space-y-md">
            <span class="text-secondary-fixed font-label-sm tracking-widest uppercase">Our Commitment</span>
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg">Safe Peaks, Clean Trails</h2>
            <p class="font-body-lg text-surface-variant/80">We believe that adventure should never come at the cost of nature or safety. Our platform strictly enforces TNGR regulations and promotes the "Leave No Trace" principle.</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-md pt-md">
                <div class="flex gap-sm">
                    <span class="material-symbols-outlined text-secondary-fixed">fact_check</span>
                    <div>
                        <h4 class="font-label-md text-surface">Strict Regulations</h4>
                        <p class="text-label-sm text-surface-variant/70">Official permit assistance and TNGR rule compliance.</p>
                    </div>
                </div>
                <div class="flex gap-sm">
                    <span class="material-symbols-outlined text-secondary-fixed">recycling</span>
                    <div>
                        <h4 class="font-label-md text-surface">Waste Management</h4>
                        <p class="text-label-sm text-surface-variant/70">Trash deposit systems for all porters and guides.</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('faq') }}" class="border border-surface/30 px-lg py-md rounded-lg font-label-md hover:bg-surface hover:text-primary-container transition-all inline-block">Read Safety Guidelines</a>
        </div>
        <div class="relative group">
            <div class="aspect-square rounded-2xl overflow-hidden border border-white/10">
                <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" 
                     alt="Local Guide" 
                     src="{{ asset('image/boy_4.jpeg') }}">
            </div>
            <div class="absolute -bottom-md -left-md bg-secondary text-on-primary p-md rounded-xl shadow-xl max-w-xs">
                <p class="font-label-md italic">"Every stone we step on is a witness to our respect for the mountain. Let's keep it pristine."</p>
                <p class="font-label-sm mt-2 font-bold">— Local Guide Association</p>
            </div>
        </div>
    </div>
</section>

<!-- Partners & Community -->
<section class="py-xl max-w-container-max mx-auto px-md opacity-0 animate-fade-up">
    <h2 class="font-headline-md text-headline-md text-primary-container text-center mb-xl">Mitra Lokal Terdaftar</h2>
    <div class="flex flex-wrap justify-center gap-lg">
        @forelse($featuredPartners as $partner)
        <a href="{{ route('local_services') }}" class="flex items-center gap-xs font-headline-sm text-primary-container font-bold hover:text-secondary transition-colors">
            @if($partner->image)
            <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" class="w-8 h-8 object-contain">
            @else
            <span class="material-symbols-outlined">verified</span>
            @endif
            {{ $partner->name }}
        </a>
        @empty
        <p class="text-on-surface-variant">Mitra lokal terverifikasi akan segera ditambahkan.</p>
        @endforelse
    </div>
</section>

<!-- Articles & Trip Gallery Preview -->
<section class="py-xl bg-surface-container opacity-0 animate-fade-up">
    <div class="max-w-container-max mx-auto px-md">
        <div class="flex justify-between items-center mb-lg">
            <h2 class="font-headline-md text-headline-md text-primary-container">Latest from the Trail</h2>
            <div class="flex gap-sm">
                <button class="w-12 h-12 rounded-full border border-outline/30 flex items-center justify-center hover:bg-primary-container hover:text-surface transition-all">
                    <span class="material-symbols-outlined">arrow_back</span>
                </button>
                <button class="w-12 h-12 rounded-full border border-outline/30 flex items-center justify-center hover:bg-primary-container hover:text-surface transition-all">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
            @forelse($latestArticles as $article)
            <a href="{{ route('articles.show', $article->slug) }}" class="bg-white rounded-xl overflow-hidden group cursor-pointer shadow-sm hover:shadow-lg transition-all">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                         alt="{{ $article->image_alt ?? $article->title }}" 
                         src="{{ $article->image_url }}">
                </div>
                <div class="p-md">
                    <span class="text-secondary font-label-sm mb-xs block capitalize">{{ $article->category }}</span>
                    <h4 class="font-label-md text-primary-container font-bold mb-sm line-clamp-2">{{ $article->title }}</h4>
                    <p class="text-label-sm text-on-surface-variant line-clamp-2">{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}</p>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-xl">
                <span class="material-symbols-outlined text-[64px] text-outline-variant mb-md">article</span>
                <h3 class="font-headline-sm text-primary-container mb-sm">Belum ada artikel</h3>
                <p class="text-on-surface-variant">Artikel edukasi akan segera ditambahkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-xl relative overflow-hidden bg-primary-container opacity-0 animate-fade-up">
    <div class="relative z-10 max-w-container-max mx-auto px-md text-center">
        <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md">Start Your Rinjani Adventure Today</h2>
        <p class="font-body-lg text-surface-variant/80 max-w-2xl mx-auto mb-lg">Join thousands of adventurers who have safely reached the summit with our professional network of guides and resources.</p>
        <a href="{{ route('routes') }}" class="bg-surface text-primary-container px-lg py-md rounded-lg font-headline-sm hover:scale-105 hover:shadow-2xl transition-all inline-block">Plan Your Trek</a>
    </div>
</section>
@endsection