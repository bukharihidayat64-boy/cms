@extends('admin.layouts.main')
@section('title', 'Edit Foto')

@section('content')
<div class="w-full space-y-6 animate-fade-in">
    {{-- Header --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20"></div>
        <div class="relative z-10">
            <a href="{{ route('admin.gallery.index') }}" class="inline-flex items-center gap-2 text-white/80 hover:text-white mb-4 transition-colors group">
                <span class="material-symbols-outlined group-hover:-translate-x-1 transition-transform">arrow_back</span> Kembali
            </a>
            <div class="flex items-center gap-3">
                <div class="p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                    <span class="material-symbols-outlined text-3xl">edit</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Edit Foto</h1>
                    <p class="text-white/80 text-sm mt-1">Perbarui informasi dokumentasi</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Upload Area --}}
                <div class="lg:col-span-1">
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-3">Ganti Foto (Opsional)</label>
                    <div class="relative group">
                        <input type="file" name="image" id="imageInput" accept="image/*" class="hidden" onchange="previewFile(this)">
                        <label for="imageInput" class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:border-secondary hover:bg-secondary/5 transition-all overflow-hidden">
                            @if($gallery->image)
                                <img src="{{ asset('storage/' . $gallery->image) }}" id="preview" class="w-full h-full object-cover">
                            @else
                                <img id="preview" class="hidden w-full h-full object-cover">
                            @endif
                            <div id="placeholder" class="{{ $gallery->image ? 'hidden' : '' }} absolute inset-0 flex flex-col items-center justify-center text-center bg-black/40 text-white opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="material-symbols-outlined text-3xl mb-1">photo_camera</span>
                                <span class="text-sm font-medium">Klik untuk ganti foto</span>
                            </div>
                        </label>
                    </div>
                    @error('image') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
                </div>

                {{-- Form Fields --}}
                <div class="lg:col-span-2 space-y-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Judul Foto <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $gallery->title) }}" required placeholder="Contoh: Sunrise di Plawangan" 
                               class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all @error('title') border-red-500 @enderror">
                        @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Kategori <span class="text-red-500">*</span></label>
                            <select name="category" required
                                    class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white appearance-none @error('category') border-red-500 @enderror">
                                <option value="summit" {{ old('category', $gallery->category) == 'summit' ? 'selected' : '' }}>Summit</option>
                                <option value="basecamp" {{ old('category', $gallery->category) == 'basecamp' ? 'selected' : '' }}>Basecamp</option>
                                <option value="flora_fauna" {{ old('category', $gallery->category) == 'flora_fauna' ? 'selected' : '' }}>Flora & Fauna</option>
                                <option value="tim_ekspedisi" {{ old('category', $gallery->category) == 'tim_ekspedisi' ? 'selected' : '' }}>Tim Ekspedisi</option>
                                <option value="lainnya" {{ old('category', $gallery->category) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('category') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Status <span class="text-red-500">*</span></label>
                            <div class="flex gap-3">
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="is_active" value="1" {{ old('is_active', $gallery->is_active) == 1 ? 'checked' : '' }} class="peer sr-only">
                                    <div class="text-center py-3 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 transition-all">
                                        <span class="font-semibold text-gray-700 peer-checked:text-green-700 text-sm">Aktif</span>
                                    </div>
                                </label>
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="is_active" value="0" {{ old('is_active', $gallery->is_active) == 0 ? 'checked' : '' }} class="peer sr-only">
                                    <div class="text-center py-3 border-2 border-gray-200 rounded-xl peer-checked:border-gray-400 peer-checked:bg-gray-50 transition-all">
                                        <span class="font-semibold text-gray-700 peer-checked:text-gray-600 text-sm">Draft</span>
                                    </div>
                                </label>
                            </div>
                            @error('is_active') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Fotografer</label>
                        <input type="text" name="photographer" value="{{ old('photographer', $gallery->photographer) }}" placeholder="Nama fotografer" 
                               class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all @error('photographer') border-red-500 @enderror">
                        @error('photographer') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Lokasi</label>
                        <input type="text" name="location" value="{{ old('location', $gallery->location) }}" placeholder="Lokasi foto" 
                               class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all @error('location') border-red-500 @enderror">
                        @error('location') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Deskripsi / Caption</label>
                        <textarea name="description" rows="4" placeholder="Tambahkan deskripsi singkat..." maxlength="500"
                                  class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all resize-none @error('description') border-red-500 @enderror">{{ old('description', $gallery->description ?? $gallery->caption) }}</textarea>
                        @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Tags</label>
                        <input type="text" name="tags" value="{{ old('tags', $gallery->tags) }}" placeholder="Contoh: sunrise, rinjani (pisahkan dengan koma)" 
                               class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all @error('tags') border-red-500 @enderror">
                        @error('tags') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Foto Unggulan</label>
                        <div class="flex gap-3">
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="is_featured" value="1" {{ old('is_featured', $gallery->is_featured) == 1 ? 'checked' : '' }} class="peer sr-only">
                                <div class="text-center py-3 border-2 border-gray-200 rounded-xl peer-checked:border-amber-500 peer-checked:bg-amber-50 transition-all">
                                    <span class="font-semibold text-gray-700 peer-checked:text-amber-700 text-sm">Ya</span>
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="is_featured" value="0" {{ old('is_featured', $gallery->is_featured) == 0 ? 'checked' : '' }} class="peer sr-only">
                                <div class="text-center py-3 border-2 border-gray-200 rounded-xl peer-checked:border-gray-400 peer-checked:bg-gray-50 transition-all">
                                    <span class="font-semibold text-gray-700 peer-checked:text-gray-600 text-sm">Tidak</span>
                                </div>
                            </label>
                        </div>
                        @error('is_featured') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200 mt-6">
                <a href="{{ route('admin.gallery.index') }}" class="px-6 py-3 rounded-xl font-semibold text-gray-600 hover:bg-gray-100 border-2 border-gray-200 transition-all">Batal</a>
                <button type="submit" class="group inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:scale-[1.02] active:scale-95 transition-all shadow-blue-500/30">
                    <span class="material-symbols-outlined group-hover:rotate-12 transition-transform">save</span> Perbarui Foto
                </button>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>.animate-fade-in { animation: fadeIn 0.4s ease-out; } @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }</style>
@endpush
@push('scripts')
<script>
    function previewFile(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => document.getElementById('preview').src = e.target.result;
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
@endsection