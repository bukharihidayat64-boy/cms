<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | RinjaniTrail.id</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Hanken+Grotesk:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "on-surface-variant": "#41484a",
                        "secondary": "#3b6470",
                        "surface": "#faf9f9",
                        "primary-container": "#002229",
                        "secondary-fixed": "#beeaf8",
                        "surface-container-low": "#f4f3f3",
                    }
                },
            },
        }
    </script>
    
    <style>
        /* ===== BASE RESET ===== */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { 
            font-family: 'Inter', sans-serif;
            background: #faf9f9;
            overflow-x: hidden;
        }
        
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
            user-select: none;
        }
        
        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background: linear-gradient(180deg, #002229 0%, #001a1f 100%);
            color: white;
            overflow-y: auto;
            z-index: 50;
        }
        
        /* ===== MAIN WRAPPER (FIXED) ===== */
        .main-wrapper {
            margin-left: 280px;
            width: calc(100% - 280px); /* PENTING: Batasi lebar agar tidak overflow */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* ===== TOPBAR ===== */
        .topbar {
            position: sticky;
            top: 0;
            z-index: 40;
            background: #002229;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            width: 100%;
        }
        
        /* ===== MAIN CONTENT ===== */
        main {
            flex: 1;
            width: 100%; /* Pastikan konten penuh */
            padding: 32px;
            background: #faf9f9;
        }
        
        @media (min-width: 768px) {
            main { padding: 48px; }
        }
        
        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); transition: transform 0.3s; }
            .sidebar.show { transform: translateX(0); }
            .main-wrapper { margin-left: 0; width: 100%; }
        }
        
        /* ===== ANIMATIONS ===== */
        .fade-in-up { animation: fadeInUp 0.5s ease-out; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        
        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f4f3f3; }
        ::-webkit-scrollbar-thumb { background: linear-gradient(180deg, #3b6470, #002229); border-radius: 4px; }
        
        /* ===== LOGO STYLES ===== */
        .logo-glow { box-shadow: 0 0 20px rgba(190, 234, 248, 0.3); }
        .logo-glow:hover { box-shadow: 0 0 30px rgba(190, 234, 248, 0.5); }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-2px); } }
        .logo-icon-wrapper { animation: float 3s ease-in-out infinite; }
    </style>
    
    @stack('styles')
</head>
<body>

<div class="flex h-screen">
    
    <!-- SIDEBAR -->
    <aside id="sidebar" class="sidebar">
        <!-- Logo -->
        <div class="p-6 border-b border-white/10">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-secondary-fixed to-secondary rounded-xl blur-lg opacity-50 group-hover:opacity-75 transition-opacity"></div>
                    <div class="relative w-10 h-10 rounded-xl bg-gradient-to-br from-secondary-fixed to-secondary flex items-center justify-center shadow-lg group-hover:shadow-xl transition-shadow logo-glow">
                        <span class="material-symbols-outlined text-white text-xl">landscape</span>
                    </div>
                    <span class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-[#002229] animate-pulse"></span>
                </div>
                <div class="flex flex-col min-w-0">
                    <div class="flex items-baseline gap-0.5">
                        <h1 class="font-headline-md text-white font-bold tracking-tight truncate" style="font-size: 17px;">Rinjani<span class="text-secondary-fixed">Trail</span></h1>
                        <span class="text-xs text-secondary-fixed font-bold">.id</span>
                    </div>
                    <p class="text-[10px] text-white/50 font-medium tracking-wide uppercase">Admin Panel</p>
                </div>
            </a>
        </div>
        
        <!-- Menu -->
        <nav class="py-4 px-2">
            <div class="px-4 py-2 text-xs font-bold text-white/50 uppercase tracking-wider">Menu Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-white/90 hover:bg-white/10 rounded-lg mx-2 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-white/15' : '' }}">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-medium text-sm">Dashboard</span>
            </a>
            
            <div class="px-4 py-2 text-xs font-bold text-white/50 uppercase tracking-wider mt-4">Kelola Konten</div>
            <a href="{{ route('admin.routes.index') }}" class="flex items-center gap-3 px-4 py-3 text-white/90 hover:bg-white/10 rounded-lg mx-2 transition-colors">
                <span class="material-symbols-outlined">terrain</span>
                <span class="font-medium text-sm">Rute Pendakian</span>
            </a>
            <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-3 px-4 py-3 text-white/90 hover:bg-white/10 rounded-lg mx-2 transition-colors">
                <span class="material-symbols-outlined">article</span>
                <span class="font-medium text-sm">Artikel</span>
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="flex items-center gap-3 px-4 py-3 text-white/90 hover:bg-white/10 rounded-lg mx-2 transition-colors">
                <span class="material-symbols-outlined">photo_library</span>
                <span class="font-medium text-sm">Galeri</span>
            </a>
            <a href="{{ route('admin.partners.index') }}" class="flex items-center gap-3 px-4 py-3 text-white/90 hover:bg-white/10 rounded-lg mx-2 transition-colors">
                <span class="material-symbols-outlined">store</span>
                <span class="font-medium text-sm">Mitra Lokal</span>
            </a>
            <a href="{{ route('admin.faq.index') }}" class="flex items-center gap-3 px-4 py-3 text-white/90 hover:bg-white/10 rounded-lg mx-2 transition-colors">
                <span class="material-symbols-outlined">help</span>
                <span class="font-medium text-sm">FAQ</span>
            </a>
            
            <div class="px-4 py-2 text-xs font-bold text-white/50 uppercase tracking-wider mt-4">Sistem</div>
            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-3 text-white/90 hover:bg-white/10 rounded-lg mx-2 transition-colors">
                <span class="material-symbols-outlined">people</span>
                <span class="font-medium text-sm">User Management</span>
            </a>
            <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-4 py-3 text-white/90 hover:bg-white/10 rounded-lg mx-2 transition-colors">
                <span class="material-symbols-outlined">settings</span>
                <span class="font-medium text-sm">Pengaturan</span>
            </a>
        </nav>
    </aside>
    
    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        
        <!-- TOPBAR -->
        <header class="topbar">
            <nav class="bg-primary-container text-white px-6 py-4">
                <div class="flex items-center justify-between gap-4">
                    <!-- Left: Search -->
                    <div class="flex items-center gap-4 flex-1">
                        <button id="menuToggle" class="md:hidden p-2 hover:bg-white/10 rounded-lg transition-colors">
                            <span class="material-symbols-outlined">menu</span>
                        </button>
                        
                        <form action="{{ route('admin.search') }}" method="GET" class="flex-1 max-w-xl hidden md:block">
                            <div class="relative">
                                <input type="text" name="q" placeholder="Cari artikel, user, rute..." 
                                       class="w-full pl-12 pr-4 py-2.5 rounded-lg bg-white/10 text-white placeholder-white/50 border border-white/20 focus:bg-white/20 focus:outline-none focus:border-white/40 transition-all text-sm">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-white/50 text-lg">search</span>
                            </div>
                        </form>
                    </div>

                    <!-- Right: Actions -->
                    <div class="flex items-center gap-2">
                        <!-- Notifications -->
                        <a href="{{ route('admin.notifications') }}" class="relative p-2 hover:bg-white/10 rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-xl">notifications</span>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-[#002229]"></span>
                        </a>

                        <!-- Quick Add -->
                        <div class="relative" id="quickAddDropdown">
                            <button onclick="toggleQuickAdd()" class="bg-white text-[#002229] px-5 py-2.5 rounded-lg font-semibold flex items-center gap-2 hover:scale-105 active:scale-95 transition-all shadow-lg">
                                <span class="material-symbols-outlined text-lg">add</span>
                                <span class="hidden sm:inline font-label-md">Tambah</span>
                            </button>
                            
                            <div id="quickAddMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl py-2 z-50 border border-gray-100">
                                <a href="{{ route('admin.articles.create') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 transition-colors">
                                    <span class="material-symbols-outlined text-blue-600">article</span>
                                    <span class="text-sm font-medium text-gray-700">Artikel Baru</span>
                                </a>
                                <a href="{{ route('admin.routes.create') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 transition-colors">
                                    <span class="material-symbols-outlined text-green-600">terrain</span>
                                    <span class="text-sm font-medium text-gray-700">Rute Baru</span>
                                </a>
                                <a href="{{ route('admin.partners.create') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 transition-colors">
                                    <span class="material-symbols-outlined text-purple-600">people</span>
                                    <span class="text-sm font-medium text-gray-700">Mitra Baru</span>
                                </a>
                            </div>
                        </div>

                        <!-- Profile -->
                        <div class="relative" id="profileDropdown">
                            <button onclick="toggleProfile()" class="flex items-center gap-2 p-1 hover:bg-white/10 rounded-lg transition-colors">
                                @if(Auth::guard('admin')->user() && Auth::guard('admin')->user()->photo)
                                    <img src="{{ asset('storage/' . Auth::guard('admin')->user()->photo) }}" class="w-9 h-9 rounded-full object-cover border-2 border-white/30">
                                @else
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-secondary-fixed to-secondary flex items-center justify-center border-2 border-white/30">
                                        <span class="material-symbols-outlined text-white text-base">person</span>
                                    </div>
                                @endif
                            </button>
                            
                            <div id="profileMenu" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-xl shadow-xl py-2 z-50 border border-gray-100">
                                <div class="px-4 py-3 border-b border-gray-100">
                                    <p class="font-semibold text-gray-800 text-sm">{{ Auth::guard('admin')->user()->name ?? 'Administrator' }}</p>
                                    <p class="text-xs text-gray-500 mt-0.5">{{ Auth::guard('admin')->user()->email ?? 'admin@rinjanitrail.id' }}</p>
                                </div>
                                <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 transition-colors">
                                    <span class="material-symbols-outlined text-[#3b6470] text-sm">person</span>
                                    <span class="text-sm font-medium text-gray-700">Profile</span>
                                </a>
                                <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 transition-colors">
                                    <span class="material-symbols-outlined text-[#3b6470] text-sm">settings</span>
                                    <span class="text-sm font-medium text-gray-700">Pengaturan</span>
                                </a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 hover:bg-red-50 transition-colors text-red-600">
                                        <span class="material-symbols-outlined text-sm">logout</span>
                                        <span class="text-sm font-medium">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        
        <!-- PAGE CONTENT -->
        <main>
            @yield('content')
        </main>
        
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.getElementById('menuToggle');
    
    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });
    }
    
    document.addEventListener('click', (e) => {
        if (window.innerWidth < 768 && sidebar && menuToggle) {
            if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        }
    });
    
    function toggleQuickAdd() {
        document.getElementById('quickAddMenu').classList.toggle('hidden');
        document.getElementById('profileMenu').classList.add('hidden');
    }
    
    function toggleProfile() {
        document.getElementById('profileMenu').classList.toggle('hidden');
        document.getElementById('quickAddMenu').classList.add('hidden');
    }
    
    document.addEventListener('click', function(e) {
        if (!e.target.closest('#quickAddDropdown')) {
            document.getElementById('quickAddMenu').classList.add('hidden');
        }
        if (!e.target.closest('#profileDropdown')) {
            document.getElementById('profileMenu').classList.add('hidden');
        }
    });
    
    document.addEventListener('DOMContentLoaded', () => {
        if (window.innerWidth < 768 && sidebar) {
            sidebar.classList.remove('show');
        }
    });
</script>

@stack('scripts')

</body>
</html>