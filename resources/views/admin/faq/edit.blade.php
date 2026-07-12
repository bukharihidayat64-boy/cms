@extends('admin.layouts.main')
@section('title', 'Edit FAQ')

@section('content')
<div class="w-full space-y-6 animate-fade-in">
    
    {{-- Header --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20"></div>
        <div class="relative z-10">
            <a href="{{ route('admin.faq.index') }}" class="inline-flex items-center gap-2 text-white/80 hover:text-white mb-4 transition-colors group">
                <span class="material-symbols-outlined group-hover:-translate-x-1 transition-transform">arrow_back</span> Kembali
            </a>
            <div class="flex items-center gap-3">
                <div class="p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                    <span class="material-symbols-outlined text-3xl">edit</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Edit FAQ</h1>
                    <p class="text-white/80 text-sm mt-1">Perbarui pertanyaan dan jawaban</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.faq.update', $faq) }}" method="POST" class="p-8">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Kolom Kiri --}}
                <div class="lg:col-span-2 space-y-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Pertanyaan <span class="text-red-500">*</span></label>
                        <textarea name="question" rows="3" required placeholder="Contoh: Bagaimana cara mendaftar pendakian?" 
                                  class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all resize-none @error('question') border-red-500 @enderror">{{ old('question', $faq->question) }}</textarea>
                        @error('question') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Jawaban <span class="text-red-500">*</span></label>
                        <textarea name="answer" rows="6" required placeholder="Tuliskan jawaban lengkap di sini..." 
                                  class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all resize-none @error('answer') border-red-500 @enderror">{{ old('answer', $faq->answer) }}</textarea>
                        @error('answer') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Kolom Kanan --}}
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Kategori</label>
                        <select name="category" class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white appearance-none">
                            <option value="Umum" {{ old('category', $faq->category) == 'Umum' ? 'selected' : '' }}>Umum</option>
                            <option value="Pendaftaran" {{ old('category', $faq->category) == 'Pendaftaran' ? 'selected' : '' }}>Pendaftaran</option>
                            <option value="Peraturan" {{ old('category', $faq->category) == 'Peraturan' ? 'selected' : '' }}>Peraturan</option>
                            <option value="Fasilitas" {{ old('category', $faq->category) == 'Fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                            <option value="Harga" {{ old('category', $faq->category) == 'Harga' ? 'selected' : '' }}>Harga</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Urutan</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $faq->sort_order ?? 0) }}" min="0" 
                               placeholder="0" 
                               class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all">
                        <p class="text-xs text-gray-500 mt-1">Urutan tampilan (semakin kecil semakin atas)</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Status</label>
                        <div class="flex gap-3">
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="is_active" value="1" {{ old('is_active', $faq->is_active) ? 'checked' : '' }} class="peer sr-only">
                                <div class="text-center py-3 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 transition-all">
                                    <span class="font-semibold text-gray-700 peer-checked:text-green-700 text-sm">Aktif</span>
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="is_active" value="0" {{ !old('is_active', $faq->is_active) ? 'checked' : '' }} class="peer sr-only">
                                <div class="text-center py-3 border-2 border-gray-200 rounded-xl peer-checked:border-gray-400 peer-checked:bg-gray-50 transition-all">
                                    <span class="font-semibold text-gray-700 peer-checked:text-gray-600 text-sm">Nonaktif</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200 mt-6">
                <a href="{{ route('admin.faq.index') }}" class="px-6 py-3 rounded-xl font-semibold text-gray-600 hover:bg-gray-100 border-2 border-gray-200 transition-all">Batal</a>
                <button type="submit" class="group inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:scale-[1.02] active:scale-95 transition-all shadow-blue-500/30">
                    <span class="material-symbols-outlined group-hover:rotate-12 transition-transform">save</span> Perbarui FAQ
                </button>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>.animate-fade-in { animation: fadeIn 0.4s ease-out; } @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }</style>
@endpush
@endsection