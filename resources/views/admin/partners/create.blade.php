@extends('admin.layouts.main')
@section('title', 'Tambah Mitra')

@section('content')
<div class="w-full space-y-6">
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="relative z-10">
            <a href="{{ route('admin.partners.index') }}" class="mb-4 inline-flex items-center gap-2 text-white/80 transition-colors hover:text-white">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali
            </a>
            <div class="flex items-center gap-3">
                <div class="rounded-xl bg-white/10 p-3 backdrop-blur-sm">
                    <span class="material-symbols-outlined text-3xl">store</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Tambah Mitra Baru</h1>
                    <p class="mt-1 text-sm text-white/80">Daftarkan pemandu atau usaha lokal baru</p>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
            <p class="mb-2 font-semibold">Periksa kembali input berikut:</p>
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg">
        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                <div class="space-y-5">
                    <div>
                        <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                            Nama Mitra <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            placeholder="Contoh: Summit Rinjani"
                            class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 transition-all focus:border-secondary focus:bg-white focus:outline-none @error('name') border-red-500 @enderror"
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                            Jenis Layanan <span class="text-red-500">*</span>
                        </label>
                        <select
                            name="service_type"
                            class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 transition-all focus:border-secondary focus:bg-white focus:outline-none @error('service_type') border-red-500 @enderror"
                            required
                        >
                            <option value="">Pilih layanan</option>
                            @foreach ($serviceOptions as $option)
                                <option value="{{ $option }}" {{ old('service_type') === $option ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_type')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                            Nomor WhatsApp
                        </label>
                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="0812xxxxxxxx"
                            class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 transition-all focus:border-secondary focus:bg-white focus:outline-none @error('phone') border-red-500 @enderror"
                        >
                        @error('phone')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                            Email Kontak
                        </label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="email@contoh.com"
                            class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 transition-all focus:border-secondary focus:bg-white focus:outline-none @error('email') border-red-500 @enderror"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                            Nama Pemilik / PIC
                        </label>
                        <input
                            type="text"
                            name="owner"
                            value="{{ old('owner') }}"
                            placeholder="Nama penanggung jawab"
                            class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 transition-all focus:border-secondary focus:bg-white focus:outline-none @error('owner') border-red-500 @enderror"
                        >
                        @error('owner')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                            Alamat / Lokasi
                        </label>
                        <textarea
                            name="address"
                            rows="3"
                            placeholder="Lokasi mitra..."
                            class="w-full resize-none rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 transition-all focus:border-secondary focus:bg-white focus:outline-none @error('address') border-red-500 @enderror"
                        >{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                            Deskripsi
                        </label>
                        <textarea
                            name="description"
                            rows="4"
                            placeholder="Keterangan tambahan tentang mitra"
                            class="w-full resize-none rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 transition-all focus:border-secondary focus:bg-white focus:outline-none @error('description') border-red-500 @enderror"
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                            Info Harga
                        </label>
                        <input
                            type="text"
                            name="pricing_info"
                            value="{{ old('pricing_info') }}"
                            placeholder="Contoh: Mulai dari Rp150.000"
                            class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 transition-all focus:border-secondary focus:bg-white focus:outline-none @error('pricing_info') border-red-500 @enderror"
                        >
                        @error('pricing_info')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                            Gambar
                        </label>
                        <input
                            type="file"
                            name="image"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 transition-all focus:border-secondary focus:bg-white focus:outline-none @error('image') border-red-500 @enderror"
                        >
                        @error('image')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                            Password Login <span class="text-xs text-gray-500 font-normal">(Default: mitra123 jika dikosongkan)</span>
                        </label>
                        <input
                            type="password"
                            name="password"
                            placeholder="Masukkan password untuk login mitra"
                            class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 transition-all focus:border-secondary focus:bg-white focus:outline-none @error('password') border-red-500 @enderror"
                        >
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                                Status Verifikasi <span class="text-red-500">*</span>
                            </label>
                            <div class="flex gap-3">
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="is_verified" value="1" {{ old('is_verified', '1') === '1' ? 'checked' : '' }} class="peer sr-only">
                                    <div class="rounded-xl border-2 border-gray-200 py-3 text-center transition-all peer-checked:border-green-500 peer-checked:bg-green-50">
                                        <span class="text-sm font-semibold text-gray-700">Aktif</span>
                                    </div>
                                </label>
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="is_verified" value="0" {{ old('is_verified') === '0' ? 'checked' : '' }} class="peer sr-only">
                                    <div class="rounded-xl border-2 border-gray-200 py-3 text-center transition-all peer-checked:border-gray-400 peer-checked:bg-gray-50">
                                        <span class="text-sm font-semibold text-gray-700">Nonaktif</span>
                                    </div>
                                </label>
                            </div>
                            @error('is_verified')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">
                                Mitra Unggulan
                            </label>
                            <div class="flex gap-3">
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="is_featured" value="1" {{ old('is_featured') === '1' ? 'checked' : '' }} class="peer sr-only">
                                    <div class="rounded-xl border-2 border-gray-200 py-3 text-center transition-all peer-checked:border-amber-500 peer-checked:bg-amber-50">
                                        <span class="text-sm font-semibold text-gray-700">Ya</span>
                                    </div>
                                </label>
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="is_featured" value="0" {{ old('is_featured', '0') === '0' ? 'checked' : '' }} class="peer sr-only">
                                    <div class="rounded-xl border-2 border-gray-200 py-3 text-center transition-all peer-checked:border-gray-400 peer-checked:bg-gray-50">
                                        <span class="text-sm font-semibold text-gray-700">Tidak</span>
                                    </div>
                                </label>
                            </div>
                            @error('is_featured')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end gap-4 border-t border-gray-200 pt-6">
                <a href="{{ route('admin.partners.index') }}" class="rounded-xl border-2 border-gray-200 px-6 py-3 font-semibold text-gray-600 transition-all hover:bg-gray-100">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-3 font-semibold text-white transition-all hover:scale-[1.02] hover:shadow-lg active:scale-95">
                    <span class="material-symbols-outlined">save</span>
                    Simpan Mitra
                </button>
            </div>
        </form>
    </div>
</div>
@endsection