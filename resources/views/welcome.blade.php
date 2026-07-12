<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | RinjaniTrail.id</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Hanken+Grotesk:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#000608',
                        'primary-container': '#002229',
                        secondary: '#3b6470',
                        'secondary-container': '#beeaf8',
                        surface: '#faf9f9',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        headline: ['Hanken Grotesk', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        
        .mountain-bg {
            background: linear-gradient(135deg, #001a1f 0%, #002229 50%, #003340 100%);
            position: relative;
            overflow: hidden;
        }
        
        .mountain-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(190, 234, 248, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(59, 100, 112, 0.3) 0%, transparent 50%);
            animation: gradientShift 15s ease infinite;
            background-size: 200% 200%;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="mountain-bg min-h-screen flex items-center justify-center p-6">

    <div class="max-w-4xl w-full fade-in">
        
        {{-- Logo & Header --}}
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-secondary-container to-secondary mb-6 shadow-2xl">
                <svg class="w-12 h-12 text-primary-container" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L2 22h20L12 2zm0 4l7 14H5l7-14z"/>
                </svg>
            </div>
            <h1 class="font-headline text-4xl md:text-5xl font-bold text-white mb-4">
                Selamat Datang di RinjaniTrail.id
            </h1>
            <p class="text-secondary-container text-lg md:text-xl max-w-2xl mx-auto">
                Mulai petualangan mendaki Gunung Rinjani bersama kami
            </p>
        </div>

        {{-- Pilihan Card --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            
            {{-- Card Login --}}
            <a href="{{ route('user.login') }}" 
               class="card-hover bg-white/10 backdrop-blur-lg border-2 border-white/20 rounded-3xl p-8 text-center group">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-green-400 to-emerald-500 flex items-center justify-center shadow-xl group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-white text-5xl">login</span>
                </div>
                <h2 class="font-headline text-2xl font-bold text-white mb-3">Sudah Punya Akun?</h2>
                <p class="text-gray-300 mb-6">Login untuk melanjutkan petualangan Anda</p>
                <div class="inline-flex items-center gap-2 bg-white/20 text-white px-6 py-3 rounded-xl font-semibold group-hover:bg-white/30 transition-all">
                    <span>Login Sekarang</span>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </div>
            </a>

            {{-- Card Register --}}
            <a href="{{ route('user.register') }}" 
               class="card-hover bg-gradient-to-br from-secondary-container/20 to-secondary/20 backdrop-blur-lg border-2 border-secondary-container/30 rounded-3xl p-8 text-center group">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-secondary-container to-secondary flex items-center justify-center shadow-xl group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-primary-container text-5xl">person_add</span>
                </div>
                <h2 class="font-headline text-2xl font-bold text-white mb-3">Pengguna Baru?</h2>
                <p class="text-gray-300 mb-6">Daftar dan mulai perjalanan Anda</p>
                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-secondary-container to-secondary text-primary-container px-6 py-3 rounded-xl font-semibold group-hover:shadow-lg transition-all">
                    <span>Daftar Gratis</span>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </div>
            </a>
        </div>

        {{-- Info Tambahan --}}
        <div class="text-center">
            <div class="inline-flex items-center gap-6 bg-white/5 backdrop-blur-sm rounded-2xl px-8 py-4">
                <div class="flex items-center gap-2 text-gray-300 text-sm">
                    <span class="material-symbols-outlined text-secondary-container">verified</span>
                    <span>Gratis Daftar</span>
                </div>
                <div class="w-px h-4 bg-gray-600"></div>
                <div class="flex items-center gap-2 text-gray-300 text-sm">
                    <span class="material-symbols-outlined text-secondary-container">security</span>
                    <span>Aman & Terpercaya</span>
                </div>
                <div class="w-px h-4 bg-gray-600"></div>
                <div class="flex items-center gap-2 text-gray-300 text-sm">
                    <span class="material-symbols-outlined text-secondary-container">support</span>
                    <span>24/7 Support</span>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="text-center mt-12">
            <p class="text-gray-400 text-sm">
                © 2024 RinjaniTrail.id • Start Your Adventure Today
            </p>
        </div>
    </div>

</body>
</html>