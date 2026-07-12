@extends('frontend.layouts.main')
@section('title', 'Mitra Lokal | RinjaniTrail.id')

@section('content')
<main class="pt-28 pb-xl px-md md:px-lg max-w-container-max mx-auto">
    <div class="text-center mb-xl">
        <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-sm">Layanan Mitra Lokal</h1>
        <p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto">Temukan guide, porter, akomodasi, dan tempat rental terbaik untuk pendakian Gunung Rinjani Anda.</p>
    </div>

    <form method="GET" action="{{ route('local_services') }}" class="flex flex-col md:flex-row justify-between items-center gap-md mb-lg bg-white p-md rounded-xl shadow-sm">
        <div class="flex flex-wrap gap-sm">
            <a href="{{ route('local_services') }}" class="px-md py-sm rounded-lg font-label-md {{ !request('category') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container' }}">Semua</a>
            @foreach($categories as $cat)
                @php
                    $catName = is_object($cat) ? ($cat->category ?? $cat->name ?? '') : (is_array($cat) ? ($cat['category'] ?? $cat['name'] ?? '') : $cat);
                @endphp
                @if(!empty($catName))
                    <a href="{{ route('local_services', ['category' => $catName] + request()->except('page')) }}" class="px-md py-sm rounded-lg font-label-md {{ request('category') == $catName ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container' }}">{{ $catName }}</a>
                @endif
            @endforeach
        </div>
        <div class="relative w-full md:w-72">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari guide, porter, atau layanan..." class="w-full pl-10 pr-md py-sm rounded-lg border border-outline-variant outline-none focus:border-secondary">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline-variant">search</span>
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-lg">
        @forelse($services as $partner)
        <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all group">
            <div class="aspect-video relative overflow-hidden bg-gray-100">
                @if(!empty($partner->image))
                    <img src="{{ asset($partner->image) }}" alt="{{ $partner->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-secondary/20 to-secondary-container/20 flex items-center justify-center">
                        <span class="material-symbols-outlined text-6xl text-secondary/40">store</span>
                    </div>
                @endif
                
                <span class="absolute top-md left-md bg-primary/90 text-on-primary px-sm py-1 rounded-full text-label-sm capitalize">
                    {{ $partner->category ?? 'Layanan' }}
                </span>
            </div>

            <div class="p-md">
                <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm line-clamp-1">{{ $partner->name }}</h3>
                <p class="font-body-md text-on-surface-variant text-sm line-clamp-3 mb-md">{{ Str::limit($partner->description_text, 120) }}</p>
                
                <div class="space-y-2 text-label-sm text-on-surface-variant border-t border-outline-variant/30 pt-md mb-md">
                    @if(!empty($partner->pricing_info))
                    <div class="flex items-center gap-xs text-secondary font-semibold">
                        <span class="material-symbols-outlined text-[16px]">payments</span>
                        <span>{{ $partner->pricing_info }}</span>
                    </div>
                    @endif
                    
                    @if(!empty($partner->owner))
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-[16px]">person</span>
                        <span>PIC: {{ $partner->owner }}</span>
                    </div>
                    @endif

                    @if(!empty($partner->location_area))
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-[16px]">location_on</span>
                        <span>{{ Str::limit($partner->location_area, 40) }}</span>
                    </div>
                    @endif
                </div>

                <div class="flex gap-sm">
                    @php
                        $phoneNo = '6281234567890';
                        if (!empty($partner->contact_wa)) {
                            $phoneNo = preg_replace('/[^0-9]/', '', $partner->contact_wa);
                        }
                    @endphp
                    <a href="https://wa.me/{{ $phoneNo }}" target="_blank" rel="noopener noreferrer" class="flex-1 inline-flex items-center justify-center gap-xs bg-secondary text-white px-md py-sm rounded-xl font-label-sm font-semibold hover:shadow-lg transition-all">
                        <span class="material-symbols-outlined text-[18px]">chat</span> Hubungi
                    </a>
                    @if(!empty($partner->contact_email))
                    <a href="mailto:{{ $partner->contact_email }}" class="flex-1 inline-flex items-center justify-center gap-xs bg-secondary-container text-primary-container px-md py-sm rounded-xl font-label-sm font-semibold hover:shadow-lg transition-all">
                        <span class="material-symbols-outlined text-[18px]">mail</span> Email
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-xl">
            <span class="material-symbols-outlined text-[64px] text-outline-variant mb-md">search_off</span>
            <h3 class="font-headline-sm text-primary-container mb-sm">Belum ada layanan mitra lokal yang aktif</h3>
            <p class="text-on-surface-variant">Silakan hubungi admin untuk informasi lebih lanjut.</p>
        </div>
        @endforelse
    </div>
</main>
@endsection