@php
    // Fungsi untuk cek halaman aktif (sama seperti di navbar)
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

<footer class="bg-primary-container dark:bg-primary-container text-on-primary-fixed border-t border-white/5 w-full relative overflow-hidden">
    <div class="flex flex-col md:flex-row justify-between items-start px-lg py-xl max-w-container-max mx-auto gap-lg">
        <div class="max-w-xs">
            <div class="font-headline-sm text-headline-sm font-bold text-surface mb-md">RinjaniTrail.id</div>
            <p class="font-body-md text-on-primary-container mb-md">Pusat informasi pendakian Rinjani yang menghubungkan pendaki dengan rute, edukasi keselamatan, dan kontak mitra lokal terpercaya.</p>
            <div class="flex gap-md">
                <span class="material-symbols-outlined text-surface cursor-pointer hover:text-secondary-fixed transition-colors">face_nod</span>
                <span class="material-symbols-outlined text-surface cursor-pointer hover:text-secondary-fixed transition-colors">public</span>
                <span class="material-symbols-outlined text-surface cursor-pointer hover:text-secondary-fixed transition-colors">video_library</span>
            </div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 gap-lg">
            <!-- Quick Access Column -->
            <div>
                <h5 class="font-label-sm text-label-sm font-bold uppercase tracking-wider mb-md text-surface">Quick Access</h5>
                <ul class="space-y-sm">
                    <li>
                        <a class="font-label-sm text-label-sm {{ $isActive('about') ? 'text-on-primary font-bold' : 'text-on-primary-container hover:text-on-primary' }} hover:underline transition-all" 
                           href="{{ route('about') }}">
                            About
                        </a>
                    </li>
                    <li>
                        <a class="font-label-sm text-label-sm {{ $isActive('routes') ? 'text-on-primary font-bold' : 'text-on-primary-container hover:text-on-primary' }} hover:underline transition-all" 
                           href="{{ route('routes') }}">
                            Routes
                        </a>
                    </li>
                    <li>
                        <a class="font-label-sm text-label-sm {{ $isActive('local_services') ? 'text-on-primary font-bold' : 'text-on-primary-container hover:text-on-primary' }} hover:underline transition-all" 
                           href="{{ route('local_services') }}">
                            Services
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Support Column -->
            <div>
                <h5 class="font-label-sm text-label-sm font-bold uppercase tracking-wider mb-md text-surface">Support</h5>
                <ul class="space-y-sm">
                    <li>
                        <a class="font-label-sm text-label-sm {{ $isActive('faq') ? 'text-on-primary font-bold' : 'text-on-primary-container hover:text-on-primary' }} hover:underline transition-all" 
                           href="{{ route('faq') }}">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a class="font-label-sm text-label-sm {{ $isActive('articles') ? 'text-on-primary font-bold' : 'text-on-primary-container hover:text-on-primary' }} hover:underline transition-all" 
                           href="{{ route('articles') }}">
                            Articles
                        </a>
                    </li>
                    <li>
                        <a class="font-label-sm text-label-sm {{ $isActive('faq') ? 'text-on-primary font-bold' : 'text-on-primary-container hover:text-on-primary' }} hover:underline transition-all" 
                           href="{{ route('faq') }}">
                            Safety FAQ
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Accreditation Column -->
            <div class="col-span-2 md:col-span-1">
                <h5 class="font-label-sm text-label-sm font-bold uppercase tracking-wider mb-md text-surface">Accreditation</h5>
                <div class="flex gap-sm">
                    <div class="w-12 h-12 bg-white/10 rounded flex items-center justify-center border border-white/5">
                        <span class="material-symbols-outlined text-surface">verified_user</span>
                    </div>
                    <div class="w-12 h-12 bg-white/10 rounded flex items-center justify-center border border-white/5">
                        <span class="material-symbols-outlined text-surface">eco</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="max-w-container-max mx-auto px-lg py-md border-t border-white/5">
        <p class="font-label-sm text-label-sm text-on-primary-container/60 text-center md:text-left">© 2024 RinjaniTrail.id. Pusat informasi pendakian dan direktori mitra lokal.</p>
    </div>
</footer>