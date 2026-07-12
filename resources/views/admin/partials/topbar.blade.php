<nav class="bg-primary-container text-white px-4 py-3 w-full">
    <div class="flex items-center justify-between">
        
        <!-- Left: Search & Title -->
        <div class="flex items-center gap-4 flex-1">
            <!-- Mobile Menu Button -->
            <button id="menuToggle" class="md:hidden p-2 hover:bg-white/10 rounded-lg">
                <span class="material-symbols-outlined">menu</span>
            </button>
            
            <!-- Search Bar -->
            <form action="{{ route('admin.search') }}" method="GET" class="hidden md:block flex-1 max-w-md">
                <div class="relative">
                    <input type="text" name="q" placeholder="Cari..." 
                           class="w-full pl-4 pr-10 py-2 rounded-lg bg-white/10 text-white placeholder-white/60 border border-white/20 focus:bg-white/20 focus:outline-none transition-colors">
                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-white/60 text-sm">search</span>
                </div>
            </form>
        </div>

        <!-- Right: Actions -->
        <div class="flex items-center gap-2">
            
            <!-- Notifications -->
            <a href="{{ route('admin.notifications') }}" class="relative p-2 hover:bg-white/10 rounded-lg transition-colors">
                <span class="material-symbols-outlined text-lg">notifications</span>
                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
            </a>

            <!-- Quick Add -->
            <div class="relative" id="quickAddDropdown">
                <button onclick="toggleQuickAdd()" class="bg-white text-primary-container px-4 py-2 rounded-lg font-medium flex items-center gap-2 hover:scale-105 transition-transform shadow-md">
                    <span class="material-symbols-outlined text-lg">add</span>
                    <span class="hidden sm:inline">Tambah</span>
                </button>
                
                <div id="quickAddMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 z-50">
                    <a href="{{ route('admin.articles.create') }}" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50">
                        <span class="material-symbols-outlined text-blue-600">article</span>
                        <span class="text-sm text-gray-700">Artikel</span>
                    </a>
                    <a href="{{ route('admin.routes.create') }}" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50">
                        <span class="material-symbols-outlined text-green-600">terrain</span>
                        <span class="text-sm text-gray-700">Rute</span>
                    </a>
                    <a href="{{ route('admin.partners.create') }}" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50">
                        <span class="material-symbols-outlined text-purple-600">people</span>
                        <span class="text-sm text-gray-700">Mitra</span>
                    </a>
                </div>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative" id="profileDropdown">
                <button onclick="toggleProfile()" class="flex items-center gap-2 p-1 hover:bg-white/10 rounded-lg transition-colors">
                    @if(Auth::guard('admin')->user() && Auth::guard('admin')->user()->photo)
                        <img src="{{ asset('storage/' . Auth::guard('admin')->user()->photo) }}" 
                             class="w-8 h-8 rounded-full object-cover border-2 border-white/30">
                    @else
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-secondary-fixed to-secondary flex items-center justify-center border-2 border-white/30">
                            <span class="material-symbols-outlined text-white text-sm">person</span>
                        </div>
                    @endif
                    <span class="material-symbols-outlined text-sm hidden sm:inline">expand_more</span>
                </button>
                
                <div id="profileMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg py-2 z-50">
                    <div class="px-4 py-3 border-b border-gray-200">
                        <p class="font-medium text-gray-800 text-sm">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::guard('admin')->user()->email ?? '' }}</p>
                    </div>
                    <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50">
                        <span class="material-symbols-outlined text-secondary text-sm">person</span>
                        <span class="text-sm text-gray-700">Profile</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50">
                        <span class="material-symbols-outlined text-secondary text-sm">settings</span>
                        <span class="text-sm text-gray-700">Pengaturan</span>
                    </a>
                    <div class="border-t border-gray-200 my-2"></div>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 hover:bg-red-50 text-red-600">
                            <span class="material-symbols-outlined text-sm">logout</span>
                            <span class="text-sm">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
function toggleQuickAdd() {
    const menu = document.getElementById('quickAddMenu');
    const profile = document.getElementById('profileMenu');
    if (menu) menu.classList.toggle('hidden');
    if (profile) profile.classList.add('hidden');
}

function toggleProfile() {
    const menu = document.getElementById('profileMenu');
    const quick = document.getElementById('quickAddMenu');
    if (menu) menu.classList.toggle('hidden');
    if (quick) quick.classList.add('hidden');
}

document.addEventListener('click', function(e) {
    const quick = document.getElementById('quickAddMenu');
    const profile = document.getElementById('profileMenu');
    
    if (quick && !e.target.closest('#quickAddDropdown')) {
        quick.classList.add('hidden');
    }
    if (profile && !e.target.closest('#profileDropdown')) {
        profile.classList.add('hidden');
    }
});
</script>