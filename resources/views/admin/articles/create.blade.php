@extends('admin.layouts.main')
@section('title', 'Tambah Artikel')

@section('content')
<div class="w-full space-y-6 animate-fade-in">
    
    {{-- Header --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20"></div>
        <div class="relative z-10">
            <a href="{{ route('admin.articles.index') }}" class="inline-flex items-center gap-2 text-white/80 hover:text-white mb-4 transition-colors duration-300 group">
                <span class="material-symbols-outlined group-hover:-translate-x-1 transition-transform duration-300">arrow_back</span>
                Kembali
            </a>
            <div class="flex items-center gap-3">
                <div class="p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                    <span class="material-symbols-outlined text-3xl">add_circle</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Tambah Artikel Baru</h1>
                    <p class="text-white/80 text-sm mt-1">Buat konten edukasi pendakian Gunung Rinjani</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            
            {{-- Grid Layout --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                {{-- Main Content (2 columns) --}}
                <div class="lg:col-span-2 space-y-6">
                    
                    {{-- Judul Artikel --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                            Judul Artikel <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors duration-300 text-xl">title</span>
                            <input type="text" name="title" value="{{ old('title') }}" required
                                   placeholder="Masukkan judul artikel..."
                                   class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all duration-300 @error('title') border-red-500 @enderror">
                        </div>
                        @error('title')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Excerpt --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                            Ringkasan Singkat
                        </label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-4 top-4 text-gray-400 group-focus-within:text-secondary transition-colors duration-300 text-xl">subject</span>
                            <textarea name="excerpt" rows="3"
                                      placeholder="Tulis ringkasan singkat artikel..."
                                      class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all duration-300 resize-none @error('excerpt') border-red-500 @enderror">{{ old('excerpt') }}</textarea>
                        </div>
                        @error('excerpt')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Konten --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                            Konten Artikel <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-4 top-4 text-gray-400 group-focus-within:text-secondary transition-colors duration-300 text-xl">newspaper</span>
                            <textarea name="content" rows="12" required
                                      placeholder="Tulis konten artikel lengkap di sini..."
                                      class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all duration-300 resize-none @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                        </div>
                        @error('content')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                </div>

                {{-- Sidebar (1 column) --}}
                <div class="space-y-6">
                    
                    {{-- Featured Image --}}
                    <div class="bg-gray-50 rounded-xl p-6 border-2 border-gray-200">
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-3">
                            Gambar Utama
                        </label>
                        <div class="relative group">
                            <input type="file" name="image" accept="image/*" 
                                   class="hidden" id="image"
                                   onchange="previewImage(this)">
                            <label for="image" 
                                   class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:border-secondary hover:bg-secondary/5 transition-all duration-300">
                                <div id="image_preview" class="hidden w-full h-full rounded-lg overflow-hidden">
                                    <img src="" alt="Preview" class="w-full h-full object-cover">
                                </div>
                                <div id="upload_placeholder" class="flex flex-col items-center justify-center">
                                    <span class="material-symbols-outlined text-4xl text-gray-400 mb-2">add_photo_alternate</span>
                                    <span class="text-sm text-gray-500 text-center">Klik untuk upload gambar</span>
                                </div>
                            </label>
                        </div>
                        @error('image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors duration-300 text-xl">category</span>
                            <select name="category" required
                                    class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all duration-300 appearance-none cursor-pointer @error('category') border-red-500 @enderror">
                                <option value="">Pilih Kategori</option>
                                <option value="tips" {{ old('category') == 'tips' ? 'selected' : '' }}>Tips Pendakian</option>
                                <option value="news" {{ old('category') == 'news' ? 'selected' : '' }}>Berita</option>
                                <option value="guide" {{ old('category') == 'guide' ? 'selected' : '' }}>Panduan</option>
                                <option value="conservation" {{ old('category') == 'conservation' ? 'selected' : '' }}>Konservasi</option>
                                <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>Umum</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">expand_more</span>
                        </div>
                        @error('category')
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
                        <div class="flex gap-3">
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="is_published" value="1" {{ old('is_published', false) ? 'checked' : '' }}
                                       class="peer sr-only">
                                <div class="text-center py-3 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-gray-300 transition-all duration-300">
                                    <span class="material-symbols-outlined text-green-600 text-xl mb-1 block">check_circle</span>
                                    <span class="font-semibold text-gray-700 peer-checked:text-green-700 text-sm">Published</span>
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="is_published" value="0" {{ old('is_published', true) !== '1' ? 'checked' : '' }}
                                       class="peer sr-only">
                                <div class="text-center py-3 border-2 border-gray-200 rounded-xl peer-checked:border-gray-400 peer-checked:bg-gray-50 hover:border-gray-300 transition-all duration-300">
                                    <span class="material-symbols-outlined text-gray-400 text-xl mb-1 block">draft</span>
                                    <span class="font-semibold text-gray-700 peer-checked:text-gray-600 text-sm">Draft</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- Tags --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">
                            Tags
                        </label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-secondary transition-colors duration-300 text-xl">sell</span>
                            <input type="text" name="tags" value="{{ old('tags') }}"
                                   placeholder="rinjani, pendakian, tips (pisahkan dengan koma)"
                                   class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white focus:ring-4 focus:ring-secondary/10 transition-all duration-300 @error('tags') border-red-500 @enderror">
                        </div>
                        @error('tags')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- Form Actions --}}
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.articles.index') }}" 
                   class="px-8 py-4 rounded-xl font-semibold text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-all duration-300 border-2 border-gray-200 hover:border-gray-300">
                    Batal
                </a>
                
                {{-- TOMBOL SIMPAN SUDAH BIRU TERANG --}}
                <button type="submit" 
                        class="group inline-flex items-center gap-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-2xl hover:scale-105 active:scale-95 transition-all duration-300 shadow-xl">
                    <span class="material-symbols-outlined group-hover:rotate-90 transition-transform duration-300">save</span>
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>
    @keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }
    .animate-fade-in { animation: fade-in 0.6s ease-out; }
</style>
@endpush

@push('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image_preview').querySelector('img').src = e.target.result;
                document.getElementById('image_preview').classList.remove('hidden');
                document.getElementById('upload_placeholder').classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
@endsection