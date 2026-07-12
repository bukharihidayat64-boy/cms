<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register - RinjaniTrail.id</title>
    
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        .fade-in-up {
            animation: fadeInUp 0.5s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#002229] via-[#003d4a] to-[#beeaf8] py-12 px-4 sm:px-6 lg:px-8">
    
    <div class="max-w-md w-full space-y-8 bg-white rounded-2xl shadow-2xl p-8 fade-in-up">
        
        <!-- Header -->
        <div class="text-center">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#beeaf8] to-[#3b6470] flex items-center justify-center shadow-lg">
                    <span class="material-symbols-outlined text-white text-3xl">admin_panel_settings</span>
                </div>
            </div>
            <h2 class="text-3xl font-bold text-[#002229]">
                Admin Register
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Buat akun administrator baru
            </p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="p-4 bg-green-500/10 border border-green-500/30 rounded-xl flex items-start gap-2">
            <span class="material-symbols-outlined text-green-500 text-[20px]">check_circle</span>
            <p class="text-green-700 text-sm">{{ session('success') }}</p>
        </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
        <div class="p-4 bg-red-500/10 border border-red-500/30 rounded-xl space-y-2">
            @foreach($errors->all() as $error)
            <div class="flex items-start gap-2">
                <span class="material-symbols-outlined text-red-500 text-[18px]">error</span>
                <p class="text-red-700 text-sm">{{ $error }}</p>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Registration Form -->
        <form class="mt-8 space-y-6" method="POST" action="{{ route('admin.register') }}">
            @csrf
            
            <div class="space-y-4">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        <span class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px] text-[#3b6470]">person</span>
                            Nama Lengkap
                        </span>
                    </label>
                    <input id="name" name="name" type="text" required 
                           value="{{ old('name') }}"
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#3b6470] focus:border-transparent transition-all" 
                           placeholder="Masukkan nama lengkap">
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        <span class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px] text-[#3b6470]">email</span>
                            Email Address
                        </span>
                    </label>
                    <input id="email" name="email" type="email" required 
                           value="{{ old('email') }}"
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#3b6470] focus:border-transparent transition-all" 
                           placeholder="admin@example.com">
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        <span class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px] text-[#3b6470]">lock</span>
                            Password
                        </span>
                    </label>
                    <input id="password" name="password" type="password" required 
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#3b6470] focus:border-transparent transition-all" 
                           placeholder="Minimal 8 karakter">
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                        <span class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px] text-[#3b6470]">lock_clock</span>
                            Konfirmasi Password
                        </span>
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#3b6470] focus:border-transparent transition-all" 
                           placeholder="Ulangi password">
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium text-white bg-gradient-to-r from-[#beeaf8] to-[#3b6470] hover:from-[#3b6470] hover:to-[#45636b] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3b6470] rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-[1.02]">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <span class="material-symbols-outlined text-[#002229] group-hover:text-white transition-colors">admin_panel_settings</span>
                    </span>
                    DAFTAR SEBAGAI ADMIN
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Sudah punya akun admin? 
                    <a href="{{ route('admin.login') }}" class="font-medium text-[#3b6470] hover:text-[#45636b] transition-colors hover:underline">
                        Login di sini
                    </a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>