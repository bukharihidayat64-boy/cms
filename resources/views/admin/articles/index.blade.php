@extends('admin.layouts.main')
@section('title', 'Artikel')

@section('content')
<div class="w-full space-y-6 animate-fade-in">
    
    {{-- Header --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20"></div>
        <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="space-y-2">
                <div class="flex items-center gap-3">
                    <div class="p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                        <span class="material-symbols-outlined text-3xl">article</span>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold tracking-tight">Artikel</h1>
                        <p class="text-white/80 text-sm mt-1">Kelola konten edukasi pendakian Gunung Rinjani</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.articles.create') }}" class="group inline-flex items-center gap-2 bg-white text-secondary px-6 py-3 rounded-xl font-semibold hover:bg-secondary-fixed transition-all duration-300 shadow-lg hover:shadow-2xl hover:scale-105 active:scale-95">
                <span class="material-symbols-outlined group-hover:rotate-90 transition-transform duration-300">add</span>
                Tambah Artikel
            </a>
        </div>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
    <div class="animate-slide-in-right bg-gradient-to-r from-green-500/10 to-emerald-500/10 border-l-4 border-green-500 p-5 rounded-xl shadow-lg backdrop-blur-sm">
        <div class="flex items-start gap-3">
            <div class="p-2 bg-green-500 rounded-lg animate-bounce-slow">
                <span class="material-symbols-outlined text-green-600 text-xl">check_circle</span>
            </div>
            <div class="flex-1">
                <h4 class="font-semibold text-green-800">Berhasil!</h4>
                <p class="text-green-700 text-sm mt-1">{{ session('success') }}</p>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="text-green-600 hover:text-green-800 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    </div>
    @endif

    {{-- Search Card --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-shadow duration-300">
        <form method="GET" action="{{ route('admin.articles.index') }}" class="space-y-4">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative group">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Pencarian</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors duration-300 text-xl">search</span>
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Cari judul artikel..." 
                               class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all duration-300 placeholder-gray-400">
                    </div>
                </div>
                <div class="flex items-end gap-3">
                    <button type="submit" class="bg-secondary text-white px-8 py-3.5 rounded-xl font-semibold hover:bg-secondary-container hover:shadow-lg hover:scale-105 active:scale-95 transition-all duration-300 flex items-center gap-2">
                        <span class="material-symbols-outlined">search</span>
                        Cari
                    </button>
                    <a href="{{ route('admin.articles.index') }}" class="px-6 py-3.5 rounded-xl font-semibold text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-all duration-300 border-2 border-gray-200 hover:border-gray-300">
                        Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    {{-- Table Card --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300">
        {{-- Table Header Stats --}}
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-secondary/10 rounded-lg">
                        <span class="material-symbols-outlined text-secondary text-xl">article</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Daftar Artikel</h3>
                        <p class="text-sm text-gray-500">{{ $articles->count() }} artikel tersedia</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-200">
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-20">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Artikel</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-40">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-32">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-40">Tanggal</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($articles as $article)
                    <tr class="group hover:bg-gradient-to-r hover:from-secondary/5 hover:to-transparent transition-all duration-300 animate-fade-in-up" style="animation-delay: {{ $loop->index * 50 }}ms">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-secondary/20 to-secondary/10 flex items-center justify-center font-bold text-secondary text-sm group-hover:scale-110 transition-transform duration-300">
                                {{ $loop->iteration }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0 ring-2 ring-gray-100 group-hover:ring-secondary/30 transition-all duration-300">
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-secondary to-secondary-container flex items-center justify-center">
                                            <span class="material-symbols-outlined text-white text-xl">article</span>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 group-hover:text-secondary transition-colors duration-300">{{ Str::limit($article->title, 50) }}</p>
                                    <p class="text-xs text-gray-500 mt-0.5">{{ Str::limit($article->excerpt, 60) ?? 'Tidak ada deskripsi' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $categoryColors = [
                                    'tips' => 'bg-gradient-to-r from-green-400 to-emerald-400',
                                    'news' => 'bg-gradient-to-r from-blue-400 to-indigo-400',
                                    'guide' => 'bg-gradient-to-r from-purple-400 to-pink-400',
                                    'conservation' => 'bg-gradient-to-r from-teal-400 to-cyan-400',
                                    'general' => 'bg-gradient-to-r from-gray-400 to-gray-500',
                                ];
                                $category = strtolower($article->category ?? 'general');
                            @endphp
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-xs font-bold text-white {{ $categoryColors[$category] ?? $categoryColors['general'] }} shadow-lg hover:scale-110 transition-transform duration-300 cursor-default">
                                {{ ucfirst($article->category ?? 'General') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($article->is_published)
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold bg-gradient-to-r from-green-400 to-emerald-400 text-white shadow-lg shadow-green-500/30 hover:scale-110 transition-transform duration-300 cursor-default">
                                <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                                Published
                            </span>
                            @else
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-xs font-bold bg-gray-200 text-gray-600 hover:scale-110 transition-transform duration-300 cursor-default">
                                Draft
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-2 text-gray-600">
                                <span class="material-symbols-outlined text-gray-400 text-sm">calendar_today</span>
                                <span class="font-medium text-sm">{{ $article->created_at->format('d M Y') }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                
                                <a href="{{ route('admin.articles.edit', $article) }}" 
                                   class="group/btn inline-flex items-center gap-1.5 px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 hover:scale-105 active:scale-95 font-medium text-sm">
                                    <span class="material-symbols-outlined text-lg group-hover/btn:rotate-12 transition-transform duration-300">edit</span>
                                    <span class="hidden xl:inline">Edit</span>
                                </a>
                                
                                {{-- TOMBOL DELETE --}}
                                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="group/btn inline-flex items-center gap-1.5 px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 shadow-lg shadow-red-500/30 hover:shadow-xl hover:shadow-red-500/40 hover:scale-105 active:scale-95 font-medium text-sm">
                                        <span class="material-symbols-outlined text-lg group-hover/btn:rotate-12 transition-transform duration-300">delete</span>
                                        <span class="hidden xl:inline">Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-400 animate-fade-in">
                                <div class="w-24 h-24 rounded-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center mb-6 animate-bounce-slow">
                                    <span class="material-symbols-outlined text-5xl text-gray-400">article</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-600 mb-2">Belum Ada Artikel</h3>
                                <p class="text-gray-500 mb-8 max-w-md">Mulai buat artikel pertama Anda untuk berbagi informasi tentang pendakian Gunung Rinjani</p>
                                <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center gap-3 bg-gradient-to-r from-secondary to-secondary-container text-white px-8 py-4 rounded-xl font-semibold hover:shadow-2xl hover:scale-105 active:scale-95 transition-all duration-300 shadow-xl">
                                    <span class="material-symbols-outlined text-xl">add_circle</span>
                                    Tambah Artikel Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if(method_exists($articles, 'links'))
        <div class="px-6 py-4 border-t border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-600">
                    Menampilkan <span class="font-bold text-secondary">{{ $articles->firstItem() }}</span> - <span class="font-bold text-secondary">{{ $articles->lastItem() }}</span> dari <span class="font-bold text-secondary">{{ $articles->total() }}</span> artikel
                </p>
                <div class="flex items-center gap-2">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    @keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }
    @keyframes fade-in-up { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes slide-in-right { from { opacity: 0; transform: translateX(100%); } to { opacity: 1; transform: translateX(0); } }
    @keyframes bounce-slow { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
    
    .animate-fade-in { animation: fade-in 0.6s ease-out; }
    .animate-fade-in-up { animation: fade-in-up 0.5s ease-out forwards; opacity: 0; }
    .animate-slide-in-right { animation: slide-in-right 0.5s ease-out; }
    .animate-bounce-slow { animation: bounce-slow 3s ease-in-out infinite; }
</style>
@endpush
@endsection