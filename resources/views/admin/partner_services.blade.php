@extends('admin.layouts.main')
@section('title', 'Mitra Lokal')

@section('content')
<div class="w-full space-y-6">
    <div class="flex flex-col gap-4 rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl lg:flex-row lg:items-center lg:justify-between">
        <div>
            <h1 class="text-3xl font-bold">Mitra Lokal</h1>
            <p class="mt-1 text-white/80">Kelola data mitra dari tabel Oracle PARTNERS</p>
        </div>
        <a href="{{ route('admin.partners.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 font-semibold text-secondary shadow-lg transition hover:scale-[1.02]">
            <span class="material-symbols-outlined">add_business</span>
            Tambah Mitra
        </a>
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

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-lg">
        <form method="GET" action="{{ route('admin.partners.index') }}" class="grid grid-cols-1 gap-4 lg:grid-cols-4">
            <div class="lg:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-gray-700">Cari Mitra</label>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama, kategori, kontak, lokasi..."
                    class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none"
                >
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-700">Kategori</label>
                <select name="category" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">
                    <option value="all">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-700">Status</label>
                <select name="status" class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 focus:border-secondary focus:bg-white focus:outline-none">
                    <option value="">Semua Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="flex gap-3 lg:col-span-4">
                <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-secondary px-5 py-3 font-semibold text-white transition hover:opacity-90">
                    <span class="material-symbols-outlined">search</span>
                    Filter
                </button>
                <a href="{{ route('admin.partners.index') }}" class="inline-flex items-center gap-2 rounded-xl border-2 border-gray-200 px-5 py-3 font-semibold text-gray-600 transition hover:bg-gray-100">
                    <span class="material-symbols-outlined">refresh</span>
                    Reset
                </a>
            </div>
        </form>
    </div>

    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">Mitra</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">Kontak</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">Lokasi</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($partners as $partner)
                        @php
                            $partnerId = $partner->ID ?? $partner->id ?? null;
                        @endphp

                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 align-top">
                                <div class="flex items-start gap-3">
                                    @if ($partner->image_url)
                                        <img src="{{ $partner->image_url }}" alt="{{ $partner->name }}" class="h-14 w-14 rounded-xl object-cover">
                                    @else
                                        <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gray-100 text-gray-500">
                                            <span class="material-symbols-outlined">store</span>
                                        </div>
                                    @endif

                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $partner->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $partner->owner ?: '-' }}</p>
                                        <p class="mt-1 text-xs text-gray-400">{{ $partner->slug_text ?: '-' }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 align-top text-sm text-gray-700">
                                {{ $partner->category_text ?: '-' }}

                                @if ($partner->is_featured_flag)
                                    <div class="mt-2 inline-flex rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                        Unggulan
                                    </div>
                                @endif
                            </td>

                            <td class="px-6 py-4 align-top text-sm text-gray-700">
                                <div>{{ $partner->phone ?: '-' }}</div>
                                <div class="text-gray-500">{{ $partner->email ?: '-' }}</div>
                            </td>

                            <td class="px-6 py-4 align-top text-sm text-gray-700">
                                {{ $partner->location_text ?: '-' }}
                            </td>

                            <td class="px-6 py-4 align-top">
                                @if ($partner->is_active_flag)
                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 align-top">
                                @if ($partnerId)
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.partners.edit', ['partner' => $partnerId]) }}" class="inline-flex items-center rounded-lg border border-blue-200 bg-blue-50 px-3 py-2 text-sm font-semibold text-blue-600 hover:bg-blue-100">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.partners.destroy', ['partner' => $partnerId]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mitra ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm font-semibold text-red-600 hover:bg-red-100">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-sm text-red-500">ID tidak ditemukan</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                Belum ada data mitra.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-gray-100 px-6 py-4">
            {{ $partners->links() }}
        </div>
    </div>
</div>
@endsection