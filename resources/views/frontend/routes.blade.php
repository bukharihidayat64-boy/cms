@extends('frontend.layouts.main')
@section('title', 'Hiking Routes | RinjaniTrail.id')

@section('content')
<main class="pt-28 pb-xl px-md md:px-lg max-w-container-max mx-auto">
    <!-- Header -->
    <div class="text-center mb-xl">
        <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-sm">Pendakian Gunung Rinjani</h1>
        <p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto">Pilih jalur pendakian yang sesuai dengan kemampuan dan preferensi Anda.</p>
    </div>

    <!-- Filter (Opsional - bisa ditambah nanti) -->
    <div class="flex flex-wrap gap-sm mb-lg justify-center">
        <button class="px-md py-sm rounded-lg bg-secondary-container text-on-secondary-container font-label-md">Semua Rute</button>
        <button class="px-md py-sm rounded-lg text-on-surface-variant hover:bg-surface-container font-label-md">Via Sembalun</button>
        <button class="px-md py-sm rounded-lg text-on-surface-variant hover:bg-surface-container font-label-md">Via Senaru</button>
    </div>

    <!-- Routes Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
        @forelse($routes as $route)
        <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all group">
            <!-- Image -->
            <div class="aspect-video relative overflow-hidden">
                @if($route->image)
                <img src="{{ asset('storage/' . $route->image) }}" 
                     alt="{{ $route->name }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                <div class="w-full h-full bg-gradient-to-br from-secondary-container to-primary-fixed flex items-center justify-center">
                    <span class="material-symbols-outlined text-[64px] text-white/50">terrain</span>
                </div>
                @endif
                
                @if($route->is_featured)
                <div class="absolute top-md left-md">
                    <span class="bg-secondary-fixed text-primary-container px-sm py-1 rounded-full text-label-sm font-bold">
                        POPULAR
                    </span>
                </div>
                @endif
            </div>

            <!-- Content -->
            <div class="p-md">
                <h3 class="font-headline-md text-primary-container mb-sm">{{ $route->name }}</h3>
                
                @if($route->start_point)
                <p class="text-on-surface-variant text-label-sm mb-md flex items-center gap-xs">
                    <span class="material-symbols-outlined text-[16px]">location_on</span>
                    {{ $route->start_point }}
                </p>
                @endif

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-sm mb-md">
                    <div class="text-center p-sm bg-surface-container-low rounded-lg">
                        <p class="text-xs text-on-surface-variant uppercase">Durasi</p>
                        <p class="font-label-md text-on-surface font-bold">{{ $route->duration }}</p>
                    </div>
                    <div class="text-center p-sm bg-surface-container-low rounded-lg">
                        <p class="text-xs text-on-surface-variant uppercase">Ketinggian</p>
                        <p class="font-label-md text-on-surface font-bold">{{ $route->elevation_gain ?? '-' }} m</p>
                    </div>
                    <div class="text-center p-sm bg-surface-container-low rounded-lg">
                        <p class="text-xs text-on-surface-variant uppercase">Tingkat</p>
                        <p class="font-label-md font-bold {{ 
                            strtolower($route->difficulty) === 'easy' ? 'text-green-600' :
                            (strtolower($route->difficulty) === 'moderate' ? 'text-blue-600' :
                            (strtolower($route->difficulty) === 'hard' ? 'text-orange-600' : 'text-red-600'))
                        }}">{{ $route->difficulty }}</p>
                    </div>
                </div>

                <!-- Description Preview -->
                @if($route->description)
                <p class="text-on-surface-variant text-sm line-clamp-3 mb-md">
                    {{ Str::limit($route->description, 120) }}
                </p>
                @endif

                <!-- Button -->
                <a href="{{ route('routes.show', $route->slug) }}" 
                   class="block w-full text-center bg-primary-container text-surface py-sm rounded-lg font-label-md hover:scale-105 transition-transform">
                    Lihat Detail Rute
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-xl">
            <span class="material-symbols-outlined text-[64px] text-outline-variant mb-md">terrain</span>
            <h3 class="font-headline-sm text-primary-container mb-sm">Belum ada rute tersedia</h3>
            <p class="text-on-surface-variant">Rute pendakian akan segera ditambahkan.</p>
        </div>
        @endforelse
    </div>
</main>
@endsection