@extends('admin.layouts.main')
@section('title', 'Edit User')

@section('content')
<div class="w-full space-y-6 animate-fade-in">
    
    {{-- Header --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-secondary via-secondary-container to-primary-container p-8 text-white shadow-2xl">
        <div class="relative z-10">
            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-white/80 hover:text-white mb-4 transition-colors group">
                <span class="material-symbols-outlined group-hover:-translate-x-1 transition-transform">arrow_back</span> Kembali
            </a>
            <div class="flex items-center gap-3">
                <div class="p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                    <span class="material-symbols-outlined text-3xl">person</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold tracking-tight">Edit User</h1>
                    <p class="text-white/80 text-sm mt-1">Perbarui informasi pengguna</p>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="animate-slide-in-right bg-gradient-to-r from-green-500/10 to-emerald-500/10 border-l-4 border-green-500 p-5 rounded-xl shadow-lg">
        <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-green-600 text-xl bg-green-100 p-1.5 rounded-lg">check_circle</span>
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    {{-- Form --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="p-8">
            @csrf @method('PUT')

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Kolom Kiri --}}
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Nama <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                               class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all @error('name') border-red-500 @enderror">
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                               class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all @error('email') border-red-500 @enderror">
                        @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">No. Telepon</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                               class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all">
                    </div>
                </div>

                {{-- Kolom Kanan --}}
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Role <span class="text-red-500">*</span></label>
                        <select name="role" required class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white appearance-none">
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Status</label>
                        <div class="flex gap-3">
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="is_active" value="1" {{ old('is_active', $user->is_active ?? true) ? 'checked' : '' }} class="peer sr-only">
                                <div class="text-center py-3 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 transition-all">
                                    <span class="font-semibold text-gray-700 peer-checked:text-green-700 text-sm">Active</span>
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="is_active" value="0" {{ !(old('is_active', $user->is_active ?? true)) ? 'checked' : '' }} class="peer sr-only">
                                <div class="text-center py-3 border-2 border-gray-200 rounded-xl peer-checked:border-gray-400 peer-checked:bg-gray-50 transition-all">
                                    <span class="font-semibold text-gray-700 peer-checked:text-gray-600 text-sm">Inactive</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Password Baru (Opsional)</label>
                        <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah"
                               class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all mb-3 @error('password') border-red-500 @enderror">
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi password baru"
                               class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-secondary focus:bg-white transition-all">
                        @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200 mt-6">
                <a href="{{ route('admin.users.index') }}" class="px-6 py-3 rounded-xl font-semibold text-gray-600 hover:bg-gray-100 border-2 border-gray-200 transition-all">Batal</a>
                <button type="submit" class="group inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:scale-[1.02] active:scale-95 transition-all shadow-blue-500/30">
                    <span class="material-symbols-outlined group-hover:rotate-12 transition-transform">save</span> Perbarui User
                </button>
            </div>
        </form>
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