<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mitra | RinjaniTrail.id</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        primary: '#004B49',
                        secondary: '#D68C45',
                        dark: '#1C2E24',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#F8F9FA] text-[#212529] font-sans antialiased min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    
    <!-- Background Elements -->
    <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] rounded-full bg-primary/5 blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-[-20%] right-[-10%] w-[50%] h-[50%] rounded-full bg-secondary/5 blur-[120px] pointer-events-none"></div>

    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-10 relative z-10">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-primary to-dark text-white shadow-lg mb-4">
                <span class="material-symbols-outlined text-3xl">handshake</span>
            </div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">Portal Mitra Lokal</h1>
            <p class="text-sm text-gray-500 mt-1">Silakan login untuk mengelola profil layanan Anda</p>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm flex items-center gap-2">
                <span class="material-symbols-outlined text-green-600">check_circle</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">
                <div class="flex items-center gap-2 mb-1 font-semibold">
                    <span class="material-symbols-outlined text-red-600">error</span>
                    <span>Gagal Login</span>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('partner.login.process') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email -->
            <div class="space-y-2">
                <label for="contact_email" class="text-sm font-semibold text-gray-700">Email Kontak</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">mail</span>
                    <input 
                        type="email" 
                        name="contact_email" 
                        id="contact_email" 
                        value="{{ old('contact_email') }}" 
                        required 
                        placeholder="nama@email.com"
                        class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm"
                    >
                </div>
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <label for="password" class="text-sm font-semibold text-gray-700">Password</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">lock</span>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        placeholder="••••••••"
                        class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition-all text-sm"
                    >
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer select-none">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary">
                    <span class="text-xs text-gray-600">Ingat Saya</span>
                </label>
            </div>

            <!-- Submit -->
            <button 
                type="submit" 
                class="w-full bg-gradient-to-r from-primary to-dark text-white py-3 px-4 rounded-xl font-semibold hover:shadow-lg hover:scale-[1.01] active:scale-[0.99] transition-all flex items-center justify-center gap-2 text-sm mt-4 shadow-primary/20"
            >
                <span>Masuk Sekarang</span>
                <span class="material-symbols-outlined text-lg">login</span>
            </button>
        </form>

        <!-- Footer -->
        <div class="text-center mt-8 pt-6 border-t border-gray-100">
            <p class="text-xs text-gray-500">
                Bukan Mitra? <a href="{{ route('home') }}" class="text-primary font-semibold hover:underline">Kembali ke Beranda</a>
            </p>
        </div>
    </div>

</body>
</html>
