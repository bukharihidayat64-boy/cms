@extends('admin.layouts.main')
@section('title', 'Dashboard')

@section('content')
<div class="w-full space-y-6 animate-fade-in">
    
    {{-- Header Gradient --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20"></div>
        <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                    <span class="material-symbols-outlined text-3xl">dashboard</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Dashboard</h1>
                    <p class="text-white/80 text-sm mt-1">Selamat datang kembali, {{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Cards Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
        {{-- Total Artikel --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-100 rounded-xl">
                    <span class="material-symbols-outlined text-blue-600 text-2xl">article</span>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalArticles }}</h3>
            <p class="text-sm text-gray-500">Total Artikel</p>
        </div>

        {{-- Rute Pendakian --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-green-100 rounded-xl">
                    <span class="material-symbols-outlined text-green-600 text-2xl">terrain</span>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalRoutes }}</h3>
            <p class="text-sm text-gray-500">Rute Pendakian</p>
        </div>

        {{-- Mitra Lokal --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-100 rounded-xl">
                    <span class="material-symbols-outlined text-purple-600 text-2xl">store</span>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalPartners }}</h3>
            <p class="text-sm text-gray-500">Mitra Lokal</p>
        </div>

        {{-- Foto Galeri --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-pink-100 rounded-xl">
                    <span class="material-symbols-outlined text-pink-600 text-2xl">photo_library</span>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalGalleries }}</h3>
            <p class="text-sm text-gray-500">Foto Galeri</p>
        </div>

        {{-- FAQ --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-orange-100 rounded-xl">
                    <span class="material-symbols-outlined text-orange-600 text-2xl">help</span>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalFaqs }}</h3>
            <p class="text-sm text-gray-500">Total FAQ</p>
        </div>
    </div>

    {{-- Main Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Aktivitas Terbaru (2/3 width) --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-secondary/10 rounded-lg">
                        <span class="material-symbols-outlined text-secondary text-xl">history</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Aktivitas Terbaru</h3>
                        <p class="text-xs text-gray-500">Update konten terkini</p>
                    </div>
                </div>
            </div>
            
            <div class="divide-y divide-gray-100 max-h-96 overflow-y-auto">
                @forelse($activities as $activity)
                <div class="px-6 py-4 hover:bg-gray-50 transition-colors flex items-start gap-4">
                    <div class="p-2 bg-{{ $activity['color'] }}-100 rounded-lg flex-shrink-0">
                        <span class="material-symbols-outlined text-{{ $activity['color'] }}-600">{{ $activity['icon'] }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between gap-2 mb-1">
                            <p class="font-semibold text-gray-900 text-sm">{{ $activity['description'] }}</p>
                            <span class="text-xs bg-{{ $activity['color'] }}-100 text-{{ $activity['color'] }}-700 px-2 py-0.5 rounded-full font-medium capitalize">{{ $activity['type'] }}</span>
                        </div>
                        <p class="text-sm text-gray-600 truncate">{{ $activity['title'] }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $activity['created_at']->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <div class="px-6 py-12 text-center text-gray-500">
                    <span class="material-symbols-outlined text-5xl text-gray-300 mb-3 block">inbox</span>
                    <p>Belum ada aktivitas</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Quick Actions (1/3 width) --}}
        <div class="space-y-6">
            {{-- Aksi Cepat --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-secondary/10 rounded-lg">
                            <span class="material-symbols-outlined text-secondary text-xl">bolt</span>
                        </div>
                        <h3 class="font-bold text-gray-800">Aksi Cepat</h3>
                    </div>
                </div>
                
                <div class="p-4 space-y-2">
                    <a href="{{ route('admin.articles.create') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-secondary/5 transition-colors group">
                        <div class="p-2 bg-blue-100 rounded-lg group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-blue-600 text-xl">add</span>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-900 text-sm">Tambah Artikel Baru</p>
                            <p class="text-xs text-gray-500">Tulis konten edukasi</p>
                        </div>
                        <span class="material-symbols-outlined text-gray-400">chevron_right</span>
                    </a>

                    <a href="{{ route('admin.routes.create') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-secondary/5 transition-colors group">
                        <div class="p-2 bg-green-100 rounded-lg group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-green-600 text-xl">terrain</span>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-900 text-sm">Tambah Rute</p>
                            <p class="text-xs text-gray-500">Update jalur pendakian</p>
                        </div>
                        <span class="material-symbols-outlined text-gray-400">chevron_right</span>
                    </a>

                    <a href="{{ route('admin.partners.create') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-secondary/5 transition-colors group">
                        <div class="p-2 bg-purple-100 rounded-lg group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-purple-600 text-xl">add</span>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-900 text-sm">Tambah Mitra</p>
                            <p class="text-xs text-gray-500">Daftar mitra baru</p>
                        </div>
                        <span class="material-symbols-outlined text-gray-400">chevron_right</span>
                    </a>

                    <a href="{{ route('admin.gallery.create') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-secondary/5 transition-colors group">
                        <div class="p-2 bg-pink-100 rounded-lg group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-pink-600 text-xl">add_photo_alternate</span>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-900 text-sm">Upload Foto</p>
                            <p class="text-xs text-gray-500">Perkaya galeri</p>
                        </div>
                        <span class="material-symbols-outlined text-gray-400">chevron_right</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Grid: Rute Populer & Artikel Terbaru --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        {{-- Rute Populer --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-green-100 rounded-lg">
                        <span class="material-symbols-outlined text-green-600 text-xl">local_fire_department</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Rute Terbaru</h3>
                        <p class="text-xs text-gray-500">Jalur pendakian terbaru</p>
                    </div>
                </div>
                <a href="{{ route('admin.routes.index') }}" class="text-sm text-secondary font-semibold hover:underline">Lihat Semua</a>
            </div>
            
            <div class="divide-y divide-gray-100">
                @forelse($popularRoutes as $route)
                <div class="px-6 py-4 hover:bg-gray-50 transition-colors flex items-center gap-4">
                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center flex-shrink-0 shadow-lg">
                        <span class="material-symbols-outlined text-white text-2xl">terrain</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-900">{{ $route->name ?? $route->title }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $route->difficulty ?? 'Moderate' }} • {{ $route->duration ?? '-' }}</p>
                        <div class="flex items-center gap-1 mt-1 text-xs text-gray-400">
                            <span class="material-symbols-outlined text-sm">schedule</span>
                            <span>{{ $route->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="px-6 py-8 text-center text-gray-500">
                    <p>Belum ada rute</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Artikel Terbaru --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <span class="material-symbols-outlined text-blue-600 text-xl">article</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Artikel Terbaru</h3>
                        <p class="text-xs text-gray-500">Konten edukasi terkini</p>
                    </div>
                </div>
                <a href="{{ route('admin.articles.index') }}" class="text-sm text-secondary font-semibold hover:underline">Lihat Semua</a>
            </div>
            
            <div class="divide-y divide-gray-100">
                @forelse($recentArticles as $article)
                <div class="px-6 py-4 hover:bg-gray-50 transition-colors flex items-start gap-4">
                    <div class="p-2 bg-green-100 rounded-lg flex-shrink-0 mt-1">
                        <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-900">{{ $article->title }}</p>
                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit($article->excerpt, 80) }}</p>
                        <p class="text-xs text-gray-400 mt-2">{{ $article->created_at->format('d M Y') }}</p>
                    </div>
                </div>
                @empty
                <div class="px-6 py-8 text-center text-gray-500">
                    <p>Belum ada artikel</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .animate-fade-in { animation: fadeIn 0.4s ease-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
</style>
@endpush
@endsection