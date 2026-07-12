@extends('partner.layouts.main')
@section('title', 'Profil Saya')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-primary via-primary/95 to-dark p-8 text-white shadow-xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20 pointer-events-none"></div>
        <div class="relative z-10 flex items-center gap-3">
            <div class="p-3 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20">
                <span class="material-symbols-outlined text-3xl">person</span>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight">Pengaturan Profil</h1>
                <p class="text-white/80 text-sm mt-1">Perbarui informasi dan kredensial akun layanan mitra Anda</p>
            </div>
        </div>
    </div>

    <!-- Alert Notifications -->
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl text-sm flex items-center gap-2 shadow-sm">
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            <span class="font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl text-sm shadow-sm">
            <div class="flex items-center gap-2 mb-2 font-bold">
                <span class="material-symbols-outlined text-red-600">error</span>
                <span>Terdapat kesalahan input:</span>
            </div>
            <ul class="list-disc list-inside space-y-1 text-xs">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Profile Edit Form -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100/80 overflow-hidden">
        <form action="{{ route('partner.profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8 space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Left Side: Basic Info -->
                <div class="space-y-6">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-50 pb-2">Informasi Layanan</h3>

                    <!-- Name -->
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Nama Layanan / Mitra <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $partner->name) }}" required placeholder="Contoh: Rinjani Summit Guide" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm">
                    </div>

                    <!-- Service Type / Category -->
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Jenis Layanan / Kategori <span class="text-red-500">*</span></label>
                        <select name="service_type" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm appearance-none">
                            <option value="">Pilih Kategori</option>
                            @foreach ($serviceOptions as $option)
                                <option value="{{ $option }}" {{ old('service_type', $partner->category) === $option ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Owner / PIC -->
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Nama Pemilik / Penanggung Jawab (PIC)</label>
                        <input type="text" name="owner" value="{{ old('owner', $partner->owner) }}" placeholder="Contoh: John Doe" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm">
                    </div>

                    <!-- Phone / WA -->
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Nomor WhatsApp <span class="text-xs text-gray-400 font-normal">(Format: 6281xxxxxx)</span></label>
                        <input type="text" name="phone" value="{{ old('phone', $partner->contact_wa) }}" placeholder="6281xxxxxxxx" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm">
                    </div>

                    <!-- Info Harga -->
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Informasi Harga</label>
                        <input type="text" name="pricing_info" value="{{ old('pricing_info', $partner->pricing_info) }}" placeholder="Contoh: Mulai dari Rp 250.000 / hari" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm">
                    </div>
                </div>

                <!-- Right Side: Location, Description & Profile Image -->
                <div class="space-y-6">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-50 pb-2">Detail Layanan & Media</h3>

                    <!-- Address -->
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Alamat / Wilayah Lokasi</label>
                        <textarea name="address" rows="3" placeholder="Contoh: Sembalun, Lombok Timur" class="w-full resize-none px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm">{{ old('address', $partner->location_area) }}</textarea>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Deskripsi Lengkap</label>
                        <textarea name="description" rows="4" placeholder="Jelaskan mengenai penawaran, keunggulan, dan profil singkat layanan Anda..." class="w-full resize-none px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm">{{ old('description', $partner->description_text) }}</textarea>
                    </div>

                    <!-- Image / Logo -->
                    <div class="space-y-3">
                        <label class="text-sm font-bold text-gray-700">Ganti Foto Profil / Logo</label>
                        <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                        
                        @if($partner->image)
                            <div class="flex items-center gap-4 bg-gray-50 p-4 rounded-xl border border-gray-100">
                                <img src="{{ asset($partner->image) }}" alt="Mitra" class="h-16 w-24 rounded-lg object-cover border border-gray-200 shadow-sm">
                                <div class="text-xs text-gray-500">
                                    <p>Foto saat ini digunakan.</p>
                                    <p>Unggah file baru untuk menggantinya.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Password Update Section -->
            <div class="border-t border-gray-100 pt-8 mt-4 space-y-6">
                <div class="max-w-xl">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Kredensial Keamanan</h3>
                    <p class="text-xs text-gray-500 mb-6">Kosongkan kolom password di bawah ini jika Anda tidak berniat mengganti password login.</p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Password Baru</label>
                            <input type="password" name="password" placeholder="Minimal 6 karakter" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" placeholder="Ketik ulang password baru" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-4 border-t border-gray-100 pt-6">
                <a href="{{ route('partner.dashboard') }}" class="px-6 py-3 rounded-xl border-2 border-gray-200 font-semibold text-gray-600 transition-all hover:bg-gray-50 text-sm">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-r from-primary to-dark text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:scale-[1.01] active:scale-[0.99] transition-all text-sm shadow-primary/10">
                    <span class="material-symbols-outlined text-lg">save</span>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
