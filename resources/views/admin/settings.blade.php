@extends('admin.layouts.main')
@section('title', 'Pengaturan')

@section('content')
<div class="w-full space-y-6 animate-fade-in">
    
    {{-- Header Gradient --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20"></div>
        <div class="relative z-10">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                    <span class="material-symbols-outlined text-3xl">settings</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Pengaturan</h1>
                    <p class="text-white/80 text-sm mt-1">Kelola pengaturan sistem dan keamanan akun</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
    <div class="animate-slide-in-right bg-gradient-to-r from-green-500/10 to-emerald-500/10 border-l-4 border-green-500 p-5 rounded-xl shadow-lg">
        <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-green-600 text-xl bg-green-100 p-1.5 rounded-lg">check_circle</span>
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    {{-- Alert Error --}}
    @if(session('error'))
    <div class="animate-slide-in-right bg-gradient-to-r from-red-500/10 to-rose-500/10 border-l-4 border-red-500 p-5 rounded-xl shadow-lg">
        <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-red-600 text-xl bg-red-100 p-1.5 rounded-lg">error</span>
            <p class="text-red-800 font-medium">{{ session('error') }}</p>
        </div>
    </div>
    @endif

    {{-- Grid Layout --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        {{-- Ubah Password --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <span class="material-symbols-outlined text-blue-600 text-xl">lock</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Ubah Password</h3>
                        <p class="text-xs text-gray-500">Perbarui password akun administrator</p>
                    </div>
                </div>
            </div>
            
            <form action="{{ route('admin.settings.update') }}" method="POST" class="p-6 space-y-5">
                @csrf
                @method('PUT')
                
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Password Saat Ini <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors text-xl">lock</span>
                        <input type="password" name="current_password" required
                               placeholder="Masukkan password saat ini"
                               class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all @error('current_password') border-red-500 @enderror">
                    </div>
                    @error('current_password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Password Baru <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors text-xl">lock_reset</span>
                        <input type="password" name="new_password" required minlength="8"
                               placeholder="Minimal 8 karakter"
                               class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all @error('new_password') border-red-500 @enderror">
                    </div>
                    @error('new_password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Konfirmasi Password Baru <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors text-xl">lock_clock</span>
                        <input type="password" name="new_password_confirmation" required
                               placeholder="Ulangi password baru"
                               class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all">
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="reset" class="px-6 py-3 rounded-xl font-semibold text-gray-600 hover:bg-gray-100 border-2 border-gray-200 transition-all">
                        Reset
                    </button>
                    <button type="submit" class="group inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:scale-[1.02] active:scale-95 transition-all shadow-blue-500/30">
                        <span class="material-symbols-outlined group-hover:rotate-12 transition-transform">save</span>
                        Ubah Password
                    </button>
                </div>
            </form>
        </div>

        {{-- Informasi Akun --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-purple-100 rounded-lg">
                        <span class="material-symbols-outlined text-purple-600 text-xl">person</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Informasi Akun</h3>
                        <p class="text-xs text-gray-500">Detail akun administrator</p>
                    </div>
                </div>
            </div>
            
            <div class="p-6 space-y-4">
                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                    @if(Auth::guard('admin')->user()->photo)
                        <img src="{{ asset('storage/' . Auth::guard('admin')->user()->photo) }}" 
                             alt="Profile Photo" 
                             class="w-16 h-16 rounded-full object-cover shadow-lg ring-2 ring-white">
                    @else
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-secondary to-secondary-container flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                            {{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1)) }}
                        </div>
                    @endif
                    <div class="flex-1">
                        <p class="font-bold text-gray-900 text-lg">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                        <p class="text-sm text-gray-500">{{ Auth::guard('admin')->user()->email ?? 'admin@rinjanitrail.id' }}</p>
                        <span class="inline-flex items-center gap-1 mt-1 px-2 py-0.5 rounded-full text-xs font-bold bg-purple-100 text-purple-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-600"></span>
                            Administrator
                        </span>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center gap-2 text-gray-600">
                            <span class="material-symbols-outlined text-gray-400">calendar_today</span>
                            <span class="text-sm">Terdaftar Sejak</span>
                        </div>
                        <span class="font-semibold text-gray-900 text-sm">
                            {{ Auth::guard('admin')->user()->created_at?->format('d M Y') ?? '-' }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center gap-2 text-gray-600">
                            <span class="material-symbols-outlined text-gray-400">update</span>
                            <span class="text-sm">Terakhir Update</span>
                        </div>
                        <span class="font-semibold text-gray-900 text-sm">
                            {{ Auth::guard('admin')->user()->updated_at?->format('d M Y') ?? '-' }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center gap-2 text-gray-600">
                            <span class="material-symbols-outlined text-gray-400">verified</span>
                            <span class="text-sm">Status Akun</span>
                        </div>
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>
                            Aktif
                        </span>
                    </div>
                </div>

                <a href="{{ route('admin.profile') }}" class="block w-full text-center px-6 py-3 rounded-xl font-semibold text-secondary hover:bg-secondary/5 border-2 border-secondary/20 transition-all">
                    <span class="inline-flex items-center gap-2">
                        <span class="material-symbols-outlined text-xl">edit</span>
                        Edit Profil
                    </span>
                </a>
            </div>
        </div>
    </div>

    {{-- Pengaturan Sistem --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-orange-100 rounded-lg">
                    <span class="material-symbols-outlined text-orange-600 text-xl">tune</span>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Pengaturan Sistem</h3>
                    <p class="text-xs text-gray-500">Informasi sistem dan aplikasi</p>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-4 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-xl border border-blue-200">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined text-blue-600">code</span>
                        <span class="text-xs font-bold text-blue-700 uppercase">Laravel Version</span>
                    </div>
                    <p class="font-bold text-gray-900">10.50.2</p>
                </div>

                <div class="p-4 bg-gradient-to-br from-green-50 to-green-100/50 rounded-xl border border-green-200">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined text-green-600">php</span>
                        <span class="text-xs font-bold text-green-700 uppercase">PHP Version</span>
                    </div>
                    <p class="font-bold text-gray-900">8.2.12</p>
                </div>

                <div class="p-4 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-xl border border-purple-200">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined text-purple-600">database</span>
                        <span class="text-xs font-bold text-purple-700 uppercase">Database</span>
                    </div>
                    <p class="font-bold text-gray-900">Oracle</p>
                </div>
            </div>
        </div>
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