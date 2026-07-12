@extends('admin.layouts.main')
@section('title', 'Mitra Lokal')

@section('content')
<div class="w-full space-y-6 animate-fade-in">
    
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20"></div>
        <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                    <span class="material-symbols-outlined text-3xl">store</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Mitra Lokal</h1>
                    <p class="text-white/80 text-sm mt-1">Kelola informasi guide, porter, dan layanan lokal</p>
                </div>
            </div>
            <a href="{{ route('admin.partners.create') }}" class="group inline-flex items-center gap-2 bg-white text-secondary px-6 py-3 rounded-xl font-semibold hover:bg-secondary-fixed transition-all shadow-lg hover:shadow-2xl hover:scale-105 active:scale-95">
                <span class="material-symbols-outlined group-hover:rotate-90 transition-transform">add</span>
                Tambah Mitra
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="animate-slide-in-right bg-gradient-to-r from-green-500/10 to-emerald-500/10 border-l-4 border-green-500 p-5 rounded-xl shadow-lg">
        <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-green-600 text-xl bg-green-100 p-1.5 rounded-lg">check_circle</span>
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <form method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">search</span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama mitra atau layanan..." 
                       class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all">
            </div>
            <button type="submit" class="bg-secondary text-white px-6 py-3 rounded-xl font-semibold hover:bg-secondary-container transition-all shadow-md hover:scale-105 active:scale-95">Cari</button>
            <a href="{{ route('admin.partners.index') }}" class="px-6 py-3 rounded-xl font-semibold text-gray-600 hover:bg-gray-100 border-2 border-gray-200 transition-all">Reset</a>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-16">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Layanan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-40">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-40">Pemilik</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-32">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($services as $partner)
                    <tr class="group hover:bg-secondary/5 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-500">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-16 h-16 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0 ring-2 ring-gray-100">
                                    @if($partner->image)
                                        <img src="{{ asset($partner->image) }}" alt="{{ $partner->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-secondary to-secondary-container text-white font-bold text-xl">
                                            {{ strtoupper(substr($partner->name ?? 'M', 0, 1)) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <p class="font-semibold text-gray-900 truncate group-hover:text-secondary transition-colors">{{ $partner->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ Str::limit($partner->description ?? $partner->location_area, 40) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700">
                                {{ $partner->category ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 text-gray-600">
                                <span class="material-symbols-outlined text-gray-400 text-sm">person</span>
                                <span class="font-medium text-sm">{{ $partner->owner ?? 'User Admin' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($partner->is_active == '1' || $partner->is_active)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-600">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.partners.edit', $partner->id) }}" class="inline-flex items-center gap-1.5 px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all shadow-sm hover:scale-105 active:scale-95 text-sm font-medium">
                                    <span class="material-symbols-outlined text-lg">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Hapus mitra ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 transition-all shadow-sm hover:scale-105 active:scale-95 text-sm font-medium">
                                        <span class="material-symbols-outlined text-lg">delete</span> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <span class="material-symbols-outlined text-5xl text-gray-300 mb-3 block">store</span>
                            <p class="text-gray-500 font-medium">Belum ada data mitra</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($services, 'links'))
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex justify-between items-center">
            <p class="text-sm text-gray-600">Menampilkan <span class="font-bold text-secondary">{{ $services->firstItem() }}</span> - <span class="font-bold text-secondary">{{ $services->lastItem() }}</span> dari <span class="font-bold text-secondary">{{ $services->total() }}</span></p>
            {{ $services->links() }}
        </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    .animate-fade-in { animation: fadeIn 0.4s ease-out; }
    .animate-slide-in-right { animation: slideRight 0.4s ease-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes slideRight { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }
</style>
@endpush
@endsection