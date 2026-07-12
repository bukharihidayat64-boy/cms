@php
    $currentRoute = request()->route()->getName();
@endphp

<aside id="sidebar" class="sidebar fixed top-0 left-0 h-full w-64 z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-300">
    
    <!-- Logo & Brand -->
    <div class="p-md border-b border-white/10">
        <div class="flex items-center gap-sm">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-secondary-fixed to-secondary flex items-center justify-center shadow-lg">
                <span class="material-symbols-outlined text-white text-2xl">terrain</span>
            </div>
            <div>
                <h1 class="font-headline text-lg text-white font-bold">RinjaniTrail</h1>
                <p class="text-xs text-secondary-fixed">Admin Panel</p>
            </div>
        </div>
    </div>
    
    <!-- Navigation Menu -->
    <nav class="p-md space-y-lg overflow-y-auto h-[calc(100vh-180px)]">
        
        <!-- Main Menu -->
        <div>
            <p class="text-xs text-secondary-fixed uppercase tracking-widest font-bold mb-sm px-md">Menu Utama</p>
            <div class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" 
                   class="sidebar-item flex items-center gap-sm px-md py-sm rounded-lg text-white/80 hover:text-white {{ $currentRoute === 'admin.dashboard' ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">dashboard</span>
                    <span class="font-label-md">Dashboard</span>
                    @if($currentRoute === 'admin.dashboard')
                        <span class="ml-auto w-2 h-2 rounded-full bg-secondary-fixed"></span>
                    @endif
                </a>
            </div>
        </div>
        
        <!-- Content Management -->
        <div>
            <p class="text-xs text-secondary-fixed uppercase tracking-widest font-bold mb-sm px-md">Kelola Konten</p>
            <div class="space-y-1">
                
                <a href="{{ route('admin.routes.index') }}"
                   class="sidebar-item flex items-center gap-sm px-md py-sm rounded-lg text-white/80 hover:text-white {{ request()->routeIs('admin.routes.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">terrain</span>
                    <span class="font-label-md">Rute Pendakian</span>
                    @if(request()->routeIs('admin.routes.*'))
                        <span class="ml-auto w-2 h-2 rounded-full bg-secondary-fixed"></span>
                    @endif
                </a>

                <!-- Artikel -->
                <a href="{{ route('admin.articles.index') }}"
                   class="sidebar-item flex items-center gap-sm px-md py-sm rounded-lg text-white/80 hover:text-white {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">article</span>
                    <span class="font-label-md">Artikel</span>
                    @if(request()->routeIs('admin.articles.*'))
                        <span class="ml-auto w-2 h-2 rounded-full bg-secondary-fixed"></span>
                    @endif
                </a>

                <!-- Galeri -->
                <a href="{{ route('admin.gallery.index') }}"
                   class="sidebar-item flex items-center gap-sm px-md py-sm rounded-lg text-white/80 hover:text-white {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">photo_library</span>
                    <span class="font-label-md">Galeri</span>
                    @if(request()->routeIs('admin.gallery.*'))
                        <span class="ml-auto w-2 h-2 rounded-full bg-secondary-fixed"></span>
                    @endif
                </a>

                <!-- Mitra Lokal -->
                <a href="{{ route('admin.partners.index') }}"
                   class="sidebar-item flex items-center gap-sm px-md py-sm rounded-lg text-white/80 hover:text-white {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">handshake</span>
                    <span class="font-label-md">Mitra Lokal</span>
                    @if(request()->routeIs('admin.partners.*'))
                        <span class="ml-auto w-2 h-2 rounded-full bg-secondary-fixed"></span>
                    @endif
                </a>

                <!-- FAQ -->
                <a href="{{ route('admin.faq.index') }}"
                   class="sidebar-item flex items-center gap-sm px-md py-sm rounded-lg text-white/80 hover:text-white {{ request()->routeIs('admin.faq.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">help_center</span>
                    <span class="font-label-md">FAQ</span>
                    @if(request()->routeIs('admin.faq.*'))
                        <span class="ml-auto w-2 h-2 rounded-full bg-secondary-fixed"></span>
                    @endif
                </a>
            </div>
        </div>
        
<!-- Menu Sistem -->
<div class="py-2 border-t border-white/10 mt-2">
    <div class="px-md py-sm text-xs font-bold text-white/60 uppercase">Sistem</div>
    
    <!-- User Management -->
    <a href="{{ route('admin.users.index') }}" 
       class="sidebar-item flex items-center gap-sm px-md py-sm text-white/90 hover:text-white rounded-lg mx-sm">
        <span class="material-symbols-outlined">people</span>
        <span class="font-label-md">User Management</span>
    </a>

    <!-- Pengaturan/Settings -->
    <a href="{{ route('admin.settings') }}" 
       class="sidebar-item flex items-center gap-sm px-md py-sm text-white/90 hover:text-white rounded-lg mx-sm {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
        <span class="material-symbols-outlined">settings</span>
        <span class="font-label-md">Pengaturan</span>
    </a>
</div>
        </div>
        
    </nav>
    
    <!-- User Profile at Bottom -->
    <div class="absolute bottom-0 left-0 right-0 p-md border-t border-white/10 bg-black/20">
        <div class="flex items-center gap-sm">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-secondary-fixed to-secondary flex items-center justify-center">
                <span class="material-symbols-outlined text-white">person</span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-white font-label-md truncate">Administrator</p>
                <p class="text-secondary-fixed text-xs truncate">admin@rinjanitrail.id</p>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-white/60 hover:text-white transition-colors" title="Logout">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                </button>
            </form>
        </div>
    </div>
    
</aside>