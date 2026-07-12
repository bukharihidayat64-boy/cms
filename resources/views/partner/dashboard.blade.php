@extends('partner.layouts.main')
@section('title', 'Dashboard Mitra')

@section('content')
<div class="space-y-6">
    <!-- Header Welcome -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-primary via-primary/95 to-dark p-8 md:p-10 text-white shadow-xl">
        <!-- Decoration background -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20 pointer-events-none"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white text-3xl">
                    <span class="material-symbols-outlined text-4xl">store</span>
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">Selamat Datang, {{ $partner->name }}!</h2>
                    <p class="text-sm text-white/80 mt-1">Kelola informasi layanan mitra Anda secara real-time</p>
                </div>
            </div>
            <div>
                <a href="{{ route('partner.profile') }}" class="inline-flex items-center gap-2 bg-secondary text-white font-semibold px-5 py-3 rounded-xl hover:bg-secondary/90 transition-all shadow-lg hover:shadow-secondary/20 hover:scale-[1.02] active:scale-[0.98] text-sm">
                    <span class="material-symbols-outlined text-lg">edit</span>
                    Kelola Profil
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Status Verifikasi -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100/80 flex items-center justify-between">
            <div class="space-y-1">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Status Verifikasi</p>
                <div class="flex items-center gap-1.5 mt-2">
                    @if($partner->is_active)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-50 border border-green-200 text-green-700">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span> Terverifikasi & Aktif
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-gray-50 border border-gray-200 text-gray-600">
                            <span class="w-2 h-2 rounded-full bg-gray-400"></span> Nonaktif
                        </span>
                    @endif
                </div>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-green-50 border border-green-100 flex items-center justify-center text-green-600">
                <span class="material-symbols-outlined">verified</span>
            </div>
        </div>

        <!-- Unggulan -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100/80 flex items-center justify-between">
            <div class="space-y-1">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan Unggulan</p>
                <div class="flex items-center gap-1.5 mt-2">
                    @if($partner->is_featured)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 border border-amber-200 text-amber-700">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span> Ya, Unggulan
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-gray-50 border border-gray-200 text-gray-600">
                            Tidak
                        </span>
                    @endif
                </div>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600">
                <span class="material-symbols-outlined">star</span>
            </div>
        </div>

        <!-- Kategori Layanan -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100/80 flex items-center justify-between">
            <div class="space-y-1">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Kategori Layanan</p>
                <h3 class="text-lg font-bold text-gray-900 mt-2 capitalize">{{ $partner->category ?? 'Layanan' }}</h3>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600">
                <span class="material-symbols-outlined">category</span>
            </div>
        </div>
    </div>

    <!-- Partner Details Card / Preview -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-gray-50/50">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">visibility</span>
                <h3 class="font-bold text-gray-900 text-sm">Pratinjau Informasi Publik</h3>
            </div>
            <span class="text-xs text-gray-500 font-medium">Tampilan yang dilihat oleh pengunjung website</span>
        </div>

        <div class="p-6 md:p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Profile Image & Contact -->
                <div class="space-y-6">
                    <div class="aspect-video w-full rounded-2xl overflow-hidden bg-gray-100 border border-gray-100 relative group">
                        @if($partner->image)
                            <img src="{{ asset($partner->image) }}" alt="{{ $partner->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-4xl text-primary/30">store</span>
                            </div>
                        @endif
                        <span class="absolute top-4 left-4 bg-primary/95 text-white text-xs font-bold px-3 py-1 rounded-full capitalize">
                            {{ $partner->category ?? 'Layanan' }}
                        </span>
                    </div>

                    <!-- Contact Details -->
                    <div class="space-y-3 bg-gray-50 p-5 rounded-2xl border border-gray-100">
                        <h4 class="font-bold text-xs text-gray-900 uppercase tracking-wider mb-2">Kontak Utama</h4>
                        
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span class="material-symbols-outlined text-gray-400 text-lg">person</span>
                            <span>PIC: <strong class="text-gray-900 font-semibold">{{ $partner->owner ?? '-' }}</strong></span>
                        </div>

                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span class="material-symbols-outlined text-gray-400 text-lg">chat</span>
                            <span>WhatsApp: <strong class="text-gray-900 font-semibold">{{ $partner->contact_wa ?? '-' }}</strong></span>
                        </div>

                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span class="material-symbols-outlined text-gray-400 text-lg">mail</span>
                            <span>Email: <strong class="text-gray-900 font-semibold">{{ $partner->contact_email ?? '-' }}</strong></span>
                        </div>
                    </div>
                </div>

                <!-- Info & Pricing / Location -->
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $partner->name }}</h2>
                        <div class="flex flex-wrap gap-4 text-xs font-semibold text-gray-500 mb-4">
                            @if($partner->pricing_info)
                                <div class="flex items-center gap-1 text-secondary">
                                    <span class="material-symbols-outlined text-[16px]">payments</span>
                                    <span>{{ $partner->pricing_info }}</span>
                                </div>
                            @endif
                            @if($partner->location_area)
                                <div class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[16px]">location_on</span>
                                    <span>{{ $partner->location_area }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="prose prose-sm text-gray-600 max-w-none border-t border-gray-100 pt-6">
                        <h4 class="font-bold text-xs text-gray-900 uppercase tracking-wider mb-2">Deskripsi Layanan</h4>
                        <p class="whitespace-pre-line leading-relaxed text-sm">
                            {{ $partner->description_text ?? 'Belum ada deskripsi yang ditambahkan untuk mitra ini.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
