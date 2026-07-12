<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Portal Mitra RinjaniTrail.id</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
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
    <style>
        .sidebar-item.active {
            background-color: rgba(214, 140, 69, 0.1);
            color: #D68C45;
            border-left: 4px solid #D68C45;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .sidebar-item.active .material-symbols-outlined {
            font-variation-settings: 'FILL' 1, 'wght' 500, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen flex flex-col">

    <!-- Mobile Menu Button -->
    <div class="md:hidden flex items-center justify-between p-4 bg-white border-b border-gray-100 z-50 sticky top-0">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center text-white">
                <span class="material-symbols-outlined text-lg">handshake</span>
            </div>
            <span class="font-bold text-gray-900">Portal Mitra</span>
        </div>
        <button id="mobile-menu-toggle" class="p-2 text-gray-600 hover:text-gray-900 focus:outline-none">
            <span class="material-symbols-outlined text-2xl">menu</span>
        </button>
    </div>

    <div class="flex flex-1 relative">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed top-0 bottom-0 left-0 w-64 bg-white border-r border-gray-100 z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-300 md:sticky md:h-screen flex flex-col">
            <!-- Brand -->
            <div class="p-6 border-b border-gray-50 hidden md:block">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-dark flex items-center justify-center text-white shadow-md">
                        <span class="material-symbols-outlined">handshake</span>
                    </div>
                    <div>
                        <h1 class="font-bold text-gray-900 leading-none">RinjaniTrail</h1>
                        <span class="text-[10px] text-gray-500 font-medium tracking-wide uppercase">Portal Mitra</span>
                    </div>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 p-4 space-y-2 mt-4">
                <a href="{{ route('partner.dashboard') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all font-semibold text-sm {{ request()->routeIs('partner.dashboard') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('partner.profile') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all font-semibold text-sm {{ request()->routeIs('partner.profile') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">person</span>
                    <span>Profil Saya</span>
                </a>

                <a href="{{ route('local_services') }}" target="_blank" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all font-semibold text-sm">
                    <span class="material-symbols-outlined">open_in_new</span>
                    <span>Halaman User</span>
                </a>
            </nav>

            <!-- Bottom User Profile -->
            <div class="p-4 border-t border-gray-50 bg-gray-50/50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0">
                        @if(Auth::guard('partner')->user()->image)
                            <img src="{{ asset(Auth::guard('partner')->user()->image) }}" alt="Mitra" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-primary text-white flex items-center justify-center font-bold text-lg">
                                {{ strtoupper(substr(Auth::guard('partner')->user()->name ?? 'M', 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-bold text-gray-900 truncate">{{ Auth::guard('partner')->user()->name }}</p>
                        <p class="text-[10px] text-gray-500 truncate">{{ Auth::guard('partner')->user()->contact_email }}</p>
                    </div>
                    <form action="{{ route('partner.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Keluar">
                            <span class="material-symbols-outlined text-lg">logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 min-w-0 p-6 md:p-8 overflow-y-auto">
            @yield('content')
        </main>
    </div>

    <!-- Script to toggle mobile sidebar -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');

        mobileMenuToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            sidebar.classList.toggle('-translate-x-full');
        });

        // Close sidebar on clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 768 && !sidebar.contains(e.target) && e.target !== mobileMenuToggle) {
                sidebar.add('-translate-x-full');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
