@php
    $isActive = function($routeName) {
        // Untuk routes, aktifkan juga di halaman detail
        if ($routeName === 'routes') {
            return request()->routeIs('routes') || 
                   request()->routeIs('detail_rute_sembalun') || 
                   request()->routeIs('detail_rute_senaru');
        }
        return request()->routeIs($routeName);
    };
@endphp

<nav class="fixed top-0 w-full z-50 bg-primary-container/80 backdrop-blur-md dark:bg-primary-container/90 border-b border-white/10 shadow-lg transition-all duration-300">
    <div class="flex justify-between items-center px-lg py-md max-w-container-max mx-auto">
        
        <!-- Logo -->
        <a href="{{ route('home') }}" class="font-headline-md text-headline-md font-bold text-surface tracking-tight">
            RinjaniTrail.id
        </a>
        
        <!-- Menu Desktop -->
        <div class="hidden lg:flex items-center gap-md">
            <a class="font-label-md text-label-md {{ $isActive('home') ? 'text-on-primary border-b-2 border-secondary-fixed pb-1' : 'text-on-primary-container hover:text-on-primary' }} transition-colors duration-200" 
               href="{{ route('home') }}">
                Home
            </a>
            
            <a class="font-label-md text-label-md {{ $isActive('routes') ? 'text-on-primary border-b-2 border-secondary-fixed pb-1' : 'text-on-primary-container hover:text-on-primary' }} transition-colors duration-200" 
               href="{{ route('routes') }}">
                Routes
            </a>
            
            <a class="font-label-md text-label-md {{ $isActive('local_services') ? 'text-on-primary border-b-2 border-secondary-fixed pb-1' : 'text-on-primary-container hover:text-on-primary' }} transition-colors duration-200" 
               href="{{ route('local_services') }}">
                Local Services
            </a>
            
            <a class="font-label-md text-label-md {{ $isActive('articles') ? 'text-on-primary border-b-2 border-secondary-fixed pb-1' : 'text-on-primary-container hover:text-on-primary' }} transition-colors duration-200" 
               href="{{ route('articles') }}">
                Articles
            </a>
            
            <a class="font-label-md text-label-md {{ $isActive('trip_gallery') ? 'text-on-primary border-b-2 border-secondary-fixed pb-1' : 'text-on-primary-container hover:text-on-primary' }} transition-colors duration-200" 
               href="{{ route('trip_gallery') }}">
                Trip Gallery
            </a>
            
            <a class="font-label-md text-label-md {{ $isActive('faq') ? 'text-on-primary border-b-2 border-secondary-fixed pb-1' : 'text-on-primary-container hover:text-on-primary' }} transition-colors duration-200" 
               href="{{ route('faq') }}">
                FAQ
            </a>
            
            <a class="font-label-md text-label-md {{ $isActive('about') ? 'text-on-primary border-b-2 border-secondary-fixed pb-1' : 'text-on-primary-container hover:text-on-primary' }} transition-colors duration-200" 
               href="{{ route('about') }}">
                About
            </a>
        </div>
        
        <!-- Auth Section (Desktop) -->
        <div class="hidden lg:flex items-center gap-sm">
            @auth
                <!-- User sudah login -->
                <a href="{{ route('user.profile') }}" class="flex items-center gap-xs hover:bg-white/10 rounded-lg p-1 transition-colors">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-secondary-fixed to-secondary flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-[20px]">person</span>
                    </div>
                    <span class="font-label-md text-surface">{{ Auth::user()->name }}</span>
                </a>
                
                <!-- Logout Button -->
                <form action="{{ route('user.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-surface hover:text-secondary transition-colors p-2" title="Logout">
                        <span class="material-symbols-outlined text-[20px]">logout</span>
                    </button>
                </form>
            @else
                <!-- User belum login -->
                <a href="{{ route('user.login') }}" class="font-label-md text-surface hover:text-secondary transition-colors px-md py-sm">
                    Login
                </a>
                <a href="{{ route('user.register') }}" class="bg-surface text-primary-container px-lg py-sm rounded-lg font-label-md hover:scale-105 transition-transform">
                    Register
                </a>
            @endauth
        </div>
        
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="lg:hidden text-surface hover:text-secondary-fixed transition-colors p-2">
            <span class="material-symbols-outlined text-[28px]">menu</span>
        </button>
        
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden bg-primary-container border-t border-white/10">
        <div class="px-lg py-md space-y-sm">
            <a href="{{ route('home') }}" class="block font-label-md text-surface hover:text-secondary-fixed py-2">Home</a>
            <a href="{{ route('routes') }}" class="block font-label-md text-surface hover:text-secondary-fixed py-2">Routes</a>
            <a href="{{ route('local_services') }}" class="block font-label-md text-surface hover:text-secondary-fixed py-2">Local Services</a>
            <a href="{{ route('articles') }}" class="block font-label-md text-surface hover:text-secondary-fixed py-2">Articles</a>
            <a href="{{ route('trip_gallery') }}" class="block font-label-md text-surface hover:text-secondary-fixed py-2">Trip Gallery</a>
            <a href="{{ route('faq') }}" class="block font-label-md text-surface hover:text-secondary-fixed py-2">FAQ</a>
            <a href="{{ route('about') }}" class="block font-label-md text-surface hover:text-secondary-fixed py-2">About</a>
            
            <div class="pt-md border-t border-white/10">
                @auth
                    <a href="{{ route('user.profile') }}" class="flex items-center gap-xs text-surface py-2">
                        <span class="material-symbols-outlined text-[20px]">person</span>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <form action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center gap-xs text-red-400 hover:text-red-300 py-2 w-full text-left">
                            <span class="material-symbols-outlined text-[20px]">logout</span>
                            <span>Logout</span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('user.login') }}" class="block font-label-md text-surface hover:text-secondary-fixed py-2">Login</a>
                    <a href="{{ route('user.register') }}" class="bg-surface text-primary-container px-lg py-sm rounded-lg font-label-md hover:scale-105 transition-transform">
                       Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<script>
// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            
            // Toggle icon
            const icon = menuBtn.querySelector('.material-symbols-outlined');
            if (mobileMenu.classList.contains('hidden')) {
                icon.textContent = 'menu';
            } else {
                icon.textContent = 'close';
            }
        });
    }
});
</script>