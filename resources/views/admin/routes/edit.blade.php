@extends('admin.layouts.main')
@section('title', 'Edit Rute')

@section('content')
<div class="w-full space-y-6 animate-fade-in">
    
    {{-- Header --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20"></div>
        <div class="relative z-10">
            <a href="{{ route('admin.routes.index') }}" class="inline-flex items-center gap-2 text-white/80 hover:text-white mb-4 transition-colors duration-300 group">
                <span class="material-symbols-outlined group-hover:-translate-x-1 transition-transform duration-300">arrow_back</span>
                Kembali
            </a>
            <div class="flex items-center gap-3">
                <div class="p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                    <span class="material-symbols-outlined text-3xl">edit</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Edit Rute</h1>
                    <p class="text-white/80 text-sm mt-1">Perbarui informasi jalur pendakian</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300">
        <form action="{{ route('admin.routes.update', $route) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            @method('PUT')
            
            {{-- Grid Layout --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                {{-- Nama Rute --}}
                <div class="lg:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Nama Rute <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors duration-300 text-xl">terrain</span>
                        <input type="text" name="name" value="{{ old('name', $route->name) }}" required
                               placeholder="Contoh: Via Sembalun"
                               class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all duration-300 @error('name') border-red-500 @enderror">
                    </div>
                    @error('name')
                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">error</span>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Tingkat Kesulitan --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Tingkat Kesulitan <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors duration-300 text-xl">auto_awesome</span>
                        <select name="difficulty" required
                                class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all duration-300 appearance-none cursor-pointer @error('difficulty') border-red-500 @enderror">
                            <option value="">Pilih Tingkat</option>
                            <option value="Easy" {{ old('difficulty', $route->difficulty) == 'Easy' ? 'selected' : '' }}>Easy (Mudah)</option>
                            <option value="Medium" {{ old('difficulty', $route->difficulty) == 'Medium' ? 'selected' : '' }}>Medium (Sedang)</option>
                            <option value="Hard" {{ old('difficulty', $route->difficulty) == 'Hard' ? 'selected' : '' }}>Hard (Sulit)</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">expand_more</span>
                    </div>
                    @error('difficulty')
                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">error</span>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Durasi --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Durasi <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors duration-300 text-xl">schedule</span>
                        <input type="text" name="duration" value="{{ old('duration', $route->duration) }}" required
                               placeholder="Contoh: 3 hari 2 malam"
                               class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all duration-300 @error('duration') border-red-500 @enderror">
                    </div>
                    @error('duration')
                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">error</span>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Ketinggian --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Ketinggian (mdpl)
                    </label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors duration-300 text-xl">altitude</span>
                        <input type="number" name="elevation_gain" value="{{ old('elevation_gain', $route->elevation_gain) }}"
                               placeholder="Contoh: 3726"
                               class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all duration-300 @error('elevation_gain') border-red-500 @enderror">
                    </div>
                    @error('elevation_gain')
                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">error</span>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="is_active" value="1" {{ old('is_active', $route->is_active) ? 'checked' : '' }}
                                   class="peer sr-only">
                            <div class="text-center py-4 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-gray-300 transition-all duration-300">
                                <span class="material-symbols-outlined text-green-600 text-2xl mb-1 block">check_circle</span>
                                <span class="font-semibold text-gray-700 peer-checked:text-green-700">Aktif</span>
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="is_active" value="0" {{ old('is_active', $route->is_active) ? '' : 'checked' }}
                                   class="peer sr-only">
                            <div class="text-center py-4 border-2 border-gray-200 rounded-xl peer-checked:border-gray-400 peer-checked:bg-gray-50 hover:border-gray-300 transition-all duration-300">
                                <span class="material-symbols-outlined text-gray-400 text-2xl mb-1 block">cancel</span>
                                <span class="font-semibold text-gray-700 peer-checked:text-gray-600">Nonaktif</span>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- Unggulan --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Rute Populer/Unggulan <span class="text-red-500">*</span>
                    </label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="is_featured" value="1" {{ old('is_featured', $route->is_featured) ? 'checked' : '' }}
                                   class="peer sr-only">
                            <div class="text-center py-4 border-2 border-gray-200 rounded-xl peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-gray-300 transition-all duration-300">
                                <span class="material-symbols-outlined text-blue-600 text-2xl mb-1 block">star</span>
                                <span class="font-semibold text-gray-700 peer-checked:text-blue-700">Ya</span>
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="is_featured" value="0" {{ old('is_featured', $route->is_featured) ? '' : 'checked' }}
                                   class="peer sr-only">
                            <div class="text-center py-4 border-2 border-gray-200 rounded-xl peer-checked:border-gray-400 peer-checked:bg-gray-50 hover:border-gray-300 transition-all duration-300">
                                <span class="material-symbols-outlined text-gray-400 text-2xl mb-1 block">star_outline</span>
                                <span class="font-semibold text-gray-700 peer-checked:text-gray-600">Tidak</span>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- Foto Rute --}}
                <div class="lg:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Foto Rute
                    </label>
                    <div class="relative group">
                        <input type="file" name="image" accept="image/*" 
                               class="hidden" id="route_image"
                               onchange="previewRouteImage(this)">
                        <label for="route_image" 
                               class="flex flex-col items-center justify-center w-full h-56 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:border-secondary hover:bg-secondary/5 transition-all duration-300 bg-gray-50">
                            <div id="route_image_preview" class="{{ $route->image ? '' : 'hidden' }} w-full h-full rounded-lg overflow-hidden">
                                <img src="{{ $route->image ? asset('storage/' . $route->image) : '' }}" alt="Preview" class="w-full h-full object-cover">
                            </div>
                            <div id="route_upload_placeholder" class="{{ $route->image ? 'hidden' : '' }} flex flex-col items-center justify-center">
                                <span class="material-symbols-outlined text-5xl text-gray-400 mb-3">add_photo_alternate</span>
                                <span class="text-sm font-semibold text-gray-600">Klik untuk upload foto rute</span>
                                <span class="text-xs text-gray-400 mt-1">Format: JPG, PNG, WebP (Maks. 2MB)</span>
                            </div>
                        </label>
                    </div>
                    @if($route->image)
                    <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">info</span>
                        Foto saat ini sudah ada. Upload foto baru untuk mengganti.
                    </p>
                    @endif
                    @error('image') <p class="text-red-500 text-sm mt-2 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> {{ $message }}</p> @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="lg:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Deskripsi Rute
                    </label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-4 text-gray-400 group-focus-within:text-secondary transition-colors duration-300 text-xl">description</span>
                        <textarea name="description" rows="5"
                                  placeholder="Deskripsikan jalur pendakian ini..."
                                  class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all duration-300 resize-none @error('description') border-red-500 @enderror">{{ old('description', $route->description) }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">error</span>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

            </div>

            {{-- Form Actions --}}
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.routes.index') }}" 
                   class="px-8 py-4 rounded-xl font-semibold text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-all duration-300 border-2 border-gray-200 hover:border-gray-300">
                    Batal
                </a>
                <button type="submit" 
                        class="group inline-flex items-center gap-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-2xl hover:scale-105 active:scale-95 transition-all duration-300 shadow-xl">
                    <span class="material-symbols-outlined group-hover:rotate-12 transition-transform duration-300">save</span>
                    Perbarui Rute
                </button>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>
    @keyframes fade-in {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .animate-fade-in {
        animation: fade-in 0.6s ease-out;
    }
</style>
@endpush

@push('scripts')
<script>
    function previewRouteImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('route_image_preview').querySelector('img').src = e.target.result;
                document.getElementById('route_image_preview').classList.remove('hidden');
                document.getElementById('route_upload_placeholder').classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
@endsection