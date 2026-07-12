@extends('admin.layouts.main')
@section('title', 'Profile Admin')

@section('content')
<div class="w-full space-y-6 animate-fade-in">
    
    {{-- Header Gradient --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20"></div>
        <div class="relative z-10">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                    <span class="material-symbols-outlined text-3xl">person</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Profile Admin</h1>
                    <p class="text-white/80 text-sm mt-1">Kelola informasi pribadi dan foto profil</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Alert Messages --}}
    @if(session('success'))
    <div class="animate-slide-in-right bg-gradient-to-r from-green-500/10 to-emerald-500/10 border-l-4 border-green-500 p-5 rounded-xl shadow-lg">
        <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-green-600 text-xl bg-green-100 p-1.5 rounded-lg">check_circle</span>
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="animate-slide-in-right bg-gradient-to-r from-red-500/10 to-rose-500/10 border-l-4 border-red-500 p-5 rounded-xl shadow-lg">
        <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-red-600 text-xl bg-red-100 p-1.5 rounded-lg">error</span>
            <p class="text-red-800 font-medium">{{ session('error') }}</p>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="animate-slide-in-right bg-gradient-to-r from-red-500/10 to-rose-500/10 border-l-4 border-red-500 p-5 rounded-xl shadow-lg">
        <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-red-600 text-xl bg-red-100 p-1.5 rounded-lg">error</span>
            <ul class="list-disc list-inside text-red-800 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- Profile Photo Card (1/3) --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <span class="material-symbols-outlined text-purple-600 text-xl">photo_camera</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">Foto Profil</h3>
                            <p class="text-xs text-gray-500">Upload foto admin</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 flex flex-col items-center">
                    {{-- Avatar Preview --}}
                    <div class="relative group mb-6">
                        <div class="w-40 h-40 rounded-full overflow-hidden bg-gradient-to-br from-secondary to-secondary-container shadow-2xl ring-4 ring-white">
                            @if(Auth::guard('admin')->user()->photo)
                                <img id="avatar_preview" src="{{ asset('storage/' . Auth::guard('admin')->user()->photo) }}" 
                                     alt="Profile Photo" class="w-full h-full object-cover">
                            @else
                                <div id="avatar_fallback" class="w-full h-full flex items-center justify-center text-white text-6xl font-bold">
                                    {{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1)) }}
                                </div>
                                <img id="avatar_preview" src="" alt="Profile Photo" class="w-full h-full object-cover hidden">
                            @endif
                        </div>
                        
                        {{-- Upload Button Overlay --}}
                        <label for="photo_upload" 
                               class="absolute bottom-2 right-2 w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center cursor-pointer shadow-lg hover:scale-110 active:scale-95 transition-all ring-4 ring-white">
                            <span class="material-symbols-outlined text-white text-xl">add_a_photo</span>
                        </label>
                        
                        {{-- File input dengan name="photo" --}}
                        <input type="file" id="photo_upload" name="photo" accept="image/*" class="hidden" onchange="previewPhoto(this)">
                    </div>

                    <p class="text-sm text-gray-500 text-center mb-1 font-semibold">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-purple-100 text-purple-700 mb-4">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-600"></span>
                        Administrator
                    </span>

                    {{-- Info Preview --}}
                    <div id="photo_info" class="hidden w-full mb-4 p-3 bg-blue-50 border border-blue-200 rounded-lg text-center">
                        <p class="text-xs text-blue-700 font-semibold">
                            <span class="material-symbols-outlined text-sm align-middle">check_circle</span>
                            Foto baru siap diupload
                        </p>
                        <p class="text-xs text-blue-600 mt-1" id="photo_filename"></p>
                    </div>

                    @if(Auth::guard('admin')->user()->photo)
                    <div class="w-full p-3 bg-gray-50 rounded-lg text-center mb-2">
                        <p class="text-xs text-gray-600">
                            <span class="material-symbols-outlined text-sm align-middle">image</span>
                            Foto saat ini akan dipertahankan
                        </p>
                    </div>
                    @endif

                    <p class="text-xs text-gray-400 text-center mt-4">
                        Format: JPG, PNG, WEBP<br>
                        Maksimal: 2MB<br>
                        <span class="text-blue-600 font-semibold">Pilih foto lalu klik "Simpan Perubahan"</span>
                    </p>
                </div>
            </div>

            {{-- Edit Profile Form (2/3) --}}
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <span class="material-symbols-outlined text-blue-600 text-xl">edit</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">Edit Profile</h3>
                            <p class="text-xs text-gray-500">Perbarui informasi pribadi Anda</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        {{-- Nama Lengkap --}}
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors text-xl">person</span>
                                <input type="text" name="name" value="{{ old('name', Auth::guard('admin')->user()->name) }}" required
                                       placeholder="Masukkan nama lengkap"
                                       class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all @error('name') border-red-500 @enderror">
                            </div>
                            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors text-xl">mail</span>
                                <input type="email" name="email" value="{{ old('email', Auth::guard('admin')->user()->email) }}" required
                                       placeholder="email@rinjanitrail.id"
                                       class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all @error('email') border-red-500 @enderror">
                            </div>
                            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Nomor Telepon --}}
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                                Nomor Telepon
                            </label>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors text-xl">phone</span>
                                <input type="tel" name="phone" value="{{ old('phone', Auth::guard('admin')->user()->phone) }}"
                                       placeholder="+62 812-3456-7890"
                                       class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all @error('phone') border-red-500 @enderror">
                            </div>
                            @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Tanggal Bergabung (Read Only) --}}
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                                Bergabung Sejak
                            </label>
                            <div class="relative group">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl">calendar_today</span>
                                <input type="text" readonly
                                       value="{{ Auth::guard('admin')->user()->created_at?->format('d M Y') ?? '-' }}"
                                       class="w-full pl-12 pr-4 py-3 bg-gray-100 border-2 border-gray-200 rounded-xl text-gray-600 cursor-not-allowed">
                            </div>
                        </div>
                    </div>

                    {{-- Bio Singkat --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                            Bio Singkat
                        </label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-4 top-4 text-gray-400 group-focus-within:text-secondary transition-colors text-xl">edit_note</span>
                            <textarea name="bio" rows="4"
                                      placeholder="Ceritakan sedikit tentang diri Anda..."
                                      class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all resize-none @error('bio') border-red-500 @enderror">{{ old('bio', Auth::guard('admin')->user()->bio) }}</textarea>
                        </div>
                        @error('bio') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        <p class="text-xs text-gray-400 mt-1">Maksimal 500 karakter</p>
                    </div>

                    {{-- Form Actions --}}
                    <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 rounded-xl font-semibold text-gray-600 hover:bg-gray-100 border-2 border-gray-200 transition-all">
                            Batal
                        </a>
                        <button type="submit" class="group inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:scale-[1.02] active:scale-95 transition-all shadow-blue-500/30">
                            <span class="material-symbols-outlined group-hover:rotate-12 transition-transform">save</span>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
<style>
    .animate-fade-in { animation: fadeIn 0.4s ease-out; }
    .animate-slide-in-right { animation: slideRight 0.4s ease-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes slideRight { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }
</style>
@endpush

@push('scripts')
<script>
    function previewPhoto(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            
            // Validasi ukuran file (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file maksimal 2MB!');
                input.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                // Update preview gambar
                const img = document.getElementById('avatar_preview');
                const fallback = document.getElementById('avatar_fallback');
                const info = document.getElementById('photo_info');
                const filename = document.getElementById('photo_filename');
                
                img.src = e.target.result;
                img.classList.remove('hidden');
                if (fallback) fallback.classList.add('hidden');
                
                // Tampilkan info file
                info.classList.remove('hidden');
                filename.textContent = file.name + ' (' + (file.size / 1024).toFixed(1) + ' KB)';
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
@endsection