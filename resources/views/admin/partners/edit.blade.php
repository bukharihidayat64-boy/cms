@extends('admin.layouts.main')
@section('title', 'Edit Mitra')

@section('content')
@php
    $partnerId = $partner->id ?? null;
@endphp

<div class="w-full space-y-6">
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="relative z-10">
            <a href="{{ route('admin.partners.index') }}" class="mb-4 inline-flex items-center gap-2 text-white/80 transition-colors hover:text-white">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali
            </a>

            <div class="flex items-center gap-3">
                <div class="rounded-xl bg-white/10 p-3 backdrop-blur-sm">
                    <span class="material-symbols-outlined text-3xl">edit</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Edit Mitra</h1>
                    <p class="mt-1 text-sm text-white/80">Perbarui data mitra</p>
                </div>
            </div>
        </div>
    </div>

    @if (!$partnerId)
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
            ID partner tidak ditemukan.
        </div>
    @endif

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

    @if ($partnerId)
        <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg">
            <form action="{{ route('admin.partners.update', $partnerId) }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                    <div class="space-y-5">
                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Nama Mitra</label>
                            <input type="text" name="name" value="{{ old('name', $partner->name) }}" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Jenis Layanan</label>
                            <select name="service_type" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">
                                @foreach ($serviceOptions as $option)
                                    <option value="{{ $option }}" {{ old('service_type', $partner->category) === $option ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Nomor WhatsApp</label>
                            <input type="text" name="phone" value="{{ old('phone', $partner->contact_wa) }}" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Email Kontak</label>
                            <input type="email" name="email" value="{{ old('email', $partner->contact_email) }}" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Nama Pemilik / PIC</label>
                            <input type="text" name="owner" value="{{ old('owner', $partner->owner) }}" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Alamat / Lokasi</label>
                            <textarea name="address" rows="3" class="w-full resize-none rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">{{ old('address', $partner->location_area) }}</textarea>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Deskripsi</label>
                            <textarea name="description" rows="4" class="w-full resize-none rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">{{ old('description', $partner->description_text) }}</textarea>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Info Harga</label>
                            <input type="text" name="pricing_info" value="{{ old('pricing_info', $partner->pricing_info) }}" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Ganti Gambar</label>
                            <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">

                            @if($partner->image)
                                <div class="mt-3">
                                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                                    <img src="{{ asset($partner->image) }}" alt="{{ $partner->name }}" class="h-28 w-40 rounded-xl object-cover shadow">
                                </div>
                            @endif
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Ganti Password Login <span class="text-xs text-gray-500 font-normal">(Kosongkan jika tidak ingin mengganti)</span></label>
                            <input type="password" name="password" placeholder="Masukkan password baru" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Status Verifikasi <span class="text-red-500">*</span></label>
                                <div class="flex gap-3">
                                    <label class="flex-1 cursor-pointer">
                                        <input type="radio" name="is_verified" value="1" {{ old('is_verified', $partner->is_active ? '1' : '0') === '1' ? 'checked' : '' }} class="peer sr-only">
                                        <div class="rounded-xl border-2 border-gray-200 py-3 text-center transition-all peer-checked:border-green-500 peer-checked:bg-green-50">
                                            <span class="text-sm font-semibold text-gray-700">Aktif</span>
                                        </div>
                                    </label>
                                    <label class="flex-1 cursor-pointer">
                                        <input type="radio" name="is_verified" value="0" {{ old('is_verified', $partner->is_active ? '1' : '0') === '0' ? 'checked' : '' }} class="peer sr-only">
                                        <div class="rounded-xl border-2 border-gray-200 py-3 text-center transition-all peer-checked:border-gray-400 peer-checked:bg-gray-50">
                                            <span class="text-sm font-semibold text-gray-700">Nonaktif</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-bold uppercase tracking-wider text-gray-700">Mitra Unggulan</label>
                                <div class="flex gap-3">
                                    <label class="flex-1 cursor-pointer">
                                        <input type="radio" name="is_featured" value="1" {{ old('is_featured', $partner->is_featured ? '1' : '0') === '1' ? 'checked' : '' }} class="peer sr-only">
                                        <div class="rounded-xl border-2 border-gray-200 py-3 text-center transition-all peer-checked:border-amber-500 peer-checked:bg-amber-50">
                                            <span class="text-sm font-semibold text-gray-700">Ya</span>
                                        </div>
                                    </label>
                                    <label class="flex-1 cursor-pointer">
                                        <input type="radio" name="is_featured" value="0" {{ old('is_featured', $partner->is_featured ? '1' : '0') === '0' ? 'checked' : '' }} class="peer sr-only">
                                        <div class="rounded-xl border-2 border-gray-200 py-3 text-center transition-all peer-checked:border-gray-400 peer-checked:bg-gray-50">
                                            <span class="text-sm font-semibold text-gray-700">Tidak</span>
                                        </div>
                                    </label>
                                </div>
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
                        Update Mitra
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
@endsection