@extends('frontend.layouts.main')

@section('title', 'My Profile | RinjaniTrail.id')

@push('styles')
<style>
    .glass-panel {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .sidebar-active {
        background: linear-gradient(135deg, #002229 0%, #3b6470 100%);
        color: white;
    }
    
    .sidebar-item {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .sidebar-item:hover {
        background: rgba(190, 234, 248, 0.1);
        transform: translateX(4px);
    }
    
    .card-hover {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 34, 41, 0.15);
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .fade-in-up {
        animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        opacity: 0;
    }
    
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    
    .stat-card {
        background: linear-gradient(135deg, #faf9f9 0%, #f4f3f3 100%);
        border-left: 4px solid;
    }
    
    .stat-card-1 { border-image: linear-gradient(135deg, #beeaf8, #3b6470) 1; }
    .stat-card-2 { border-image: linear-gradient(135deg, #ffdbca, #a57e69) 1; }
    .stat-card-3 { border-image: linear-gradient(135deg, #c8e8f1, #45636b) 1; }
    .stat-card-4 { border-image: linear-gradient(135deg, #ebbda5, #311809) 1; }
    
    .timeline-item {
        position: relative;
        padding-left: 2rem;
        padding-bottom: 2rem;
        border-left: 2px solid #beeaf8;
    }
    
    .timeline-item:last-child {
        border-left-color: transparent;
        padding-bottom: 0;
    }
    
    .timeline-dot {
        position: absolute;
        left: -7px;
        top: 0;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #3b6470;
        border: 3px solid #faf9f9;
    }
    
    .input-field {
        transition: all 0.3s ease;
    }
    
    .input-field:focus {
        border-color: #3b6470;
        box-shadow: 0 0 0 3px rgba(59, 100, 112, 0.1);
    }
</style>
@endpush

@section('content')
<main class="pt-24 pb-xl px-md md:px-lg max-w-container-max mx-auto">
    
    <!-- Page Header -->
    <div class="mb-lg fade-in-up">
        <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-sm">My Profile</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant">Manage your account and track your adventures</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-12 gap-lg">
        
        <!-- Left Sidebar Navigation -->
        <aside class="md:col-span-3 fade-in-up delay-100">
            <div class="glass-panel rounded-xl p-md sticky top-24">
                
                <!-- User Info -->
                <div class="flex items-center gap-sm pb-md border-b border-outline-variant/30 mb-md">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-secondary-fixed to-secondary flex items-center justify-center text-white font-bold text-xl">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h2 class="font-headline-sm text-on-surface truncate">{{ $user->name }}</h2>
                        <p class="font-label-sm text-secondary truncate">{{ $user->email }}</p>
                    </div>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="space-y-1">
                    <button class="sidebar-active w-full text-left px-md py-sm rounded-lg flex items-center gap-sm font-label-md">
                        <span class="material-symbols-outlined text-[20px]">dashboard</span>
                        <span>Profile Overview</span>
                    </button>
                    <button class="sidebar-item w-full text-left px-md py-sm rounded-lg flex items-center gap-sm text-on-surface-variant font-label-md">
                        <span class="material-symbols-outlined text-[20px]">person</span>
                        <span>Personal Information</span>
                    </button>
                    <button class="sidebar-item w-full text-left px-md py-sm rounded-lg flex items-center gap-sm text-on-surface-variant font-label-md">
                        <span class="material-symbols-outlined text-[20px]">hiking</span>
                        <span>Hiking Profile</span>
                    </button>
                    <button class="sidebar-item w-full text-left px-md py-sm rounded-lg flex items-center gap-sm text-on-surface-variant font-label-md">
                        <span class="material-symbols-outlined text-[20px]">bookmark</span>
                        <span>Saved Articles</span>
                    </button>
                    <button class="sidebar-item w-full text-left px-md py-sm rounded-lg flex items-center gap-sm text-on-surface-variant font-label-md">
                        <span class="material-symbols-outlined text-[20px]">history</span>
                        <span>Trip History</span>
                    </button>
                    
                    <div class="pt-md border-t border-outline-variant/30 mt-md">
                        <form action="{{ route('user.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-md py-sm rounded-lg flex items-center gap-sm text-error hover:bg-error-container transition-all font-label-md">
                                <span class="material-symbols-outlined text-[20px]">logout</span>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </nav>
                
            </div>
        </aside>
        
        <!-- Right Content Area -->
        <section class="md:col-span-9 space-y-lg">
            
            <!-- User Stats Bento Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-md fade-in-up delay-200">
                <div class="stat-card stat-card-1 bg-white p-md rounded-xl card-hover">
                    <span class="material-symbols-outlined text-secondary text-[32px] mb-xs">elevation</span>
                    <div class="text-on-surface font-headline-sm">{{ $stats['total_elevation'] }}</div>
                    <div class="text-on-surface-variant font-label-sm uppercase tracking-wider text-xs">Total Elevation</div>
                </div>
                <div class="stat-card stat-card-2 bg-white p-md rounded-xl card-hover">
                    <span class="material-symbols-outlined text-tertiary-container text-[32px] mb-xs">flag</span>
                    <div class="text-on-surface font-headline-sm">{{ $stats['summits_reached'] }}</div>
                    <div class="text-on-surface-variant font-label-sm uppercase tracking-wider text-xs">Summits Reached</div>
                </div>
                <div class="stat-card stat-card-3 bg-white p-md rounded-xl card-hover">
                    <span class="material-symbols-outlined text-secondary text-[32px] mb-xs">schedule</span>
                    <div class="text-on-surface font-headline-sm">{{ $stats['trail_time'] }}</div>
                    <div class="text-on-surface-variant font-label-sm uppercase tracking-wider text-xs">Trail Time</div>
                </div>
                <div class="stat-card stat-card-4 bg-white p-md rounded-xl card-hover">
                    <span class="material-symbols-outlined text-tertiary-container text-[32px] mb-xs">check_circle</span>
                    <div class="text-on-surface font-headline-sm">{{ $stats['trips_completed'] }}</div>
                    <div class="text-on-surface-variant font-label-sm uppercase tracking-wider text-xs">Trips Completed</div>
                </div>
            </div>
            
            <!-- Favorite Routes -->
            <div class="fade-in-up delay-300">
                <div class="flex justify-between items-center mb-md">
                    <h3 class="font-headline-sm text-primary-container">Favorite Routes</h3>
                    <a href="{{ route('routes') }}" class="text-secondary font-label-md hover:underline flex items-center gap-xs">
                        View All
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                    @foreach($favoriteRoutes as $route)
                    <div class="card-hover bg-white rounded-xl overflow-hidden flex">
                        <div class="w-1/3 relative">
                            <img src="{{ $route['image'] }}" alt="{{ $route['name'] }}" class="absolute inset-0 w-full h-full object-cover">
                        </div>
                        <div class="p-md flex-1">
                            <div class="flex justify-between items-start mb-xs">
                                <span class="bg-secondary-container text-on-secondary-container px-2 py-1 rounded text-[10px] font-bold uppercase">{{ $route['difficulty'] }}</span>
                                <button class="text-error hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">favorite</span>
                                </button>
                            </div>
                            <h4 class="font-headline-sm text-on-surface text-sm">{{ $route['name'] }}</h4>
                            <p class="text-on-surface-variant font-label-sm text-xs">{{ $route['duration'] }} • {{ $route['distance'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Trip History Timeline -->
            <div class="fade-in-up delay-300">
                <h3 class="font-headline-sm text-primary-container mb-md">Recent Expeditions</h3>
                <div class="bg-white rounded-xl p-md">
                    @foreach($tripHistory as $trip)
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="flex justify-between items-start mb-xs">
                            <h5 class="font-headline-sm text-on-surface">{{ $trip['title'] }}</h5>
                            <span class="text-label-sm text-on-surface-variant text-xs">{{ $trip['date'] }}</span>
                        </div>
                        <p class="font-body-md text-on-surface-variant text-sm mb-sm">{{ $trip['description'] }}</p>
                        <div class="flex gap-xs">
                            @foreach($trip['tags'] as $tag)
                            <span class="bg-surface-container-low text-on-primary-container px-3 py-1 rounded-full text-[11px]">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Edit Profile Form -->
            <div class="fade-in-up delay-300">
                <h3 class="font-headline-sm text-primary-container mb-md">Edit Profile</h3>
                <div class="bg-white rounded-xl p-md">
                    
                    @if(session('success'))
                    <div class="mb-md p-md bg-green-50 border border-green-200 rounded-lg flex items-start gap-sm">
                        <span class="material-symbols-outlined text-green-600">check_circle</span>
                        <p class="text-green-800 text-sm">{{ session('success') }}</p>
                    </div>
                    @endif
                    
                    <form action="{{ route('user.profile.update') }}" method="POST" class="space-y-md">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                            <div>
                                <label class="block font-label-sm text-on-surface-variant mb-xs">Full Name</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                                       class="input-field w-full px-md py-sm border border-outline-variant rounded-lg outline-none" required>
                            </div>
                            <div>
                                <label class="block font-label-sm text-on-surface-variant mb-xs">Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                                       class="input-field w-full px-md py-sm border border-outline-variant rounded-lg outline-none" required>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block font-label-sm text-on-surface-variant mb-xs">Phone Number</label>
                            <input type="tel" name="phone" value="{{ old('phone', $user->phone ?? '') }}" 
                                   class="input-field w-full px-md py-sm border border-outline-variant rounded-lg outline-none" placeholder="+62...">
                        </div>
                        
                        <div>
                            <label class="block font-label-sm text-on-surface-variant mb-xs">Bio</label>
                            <textarea name="bio" rows="4" 
                                      class="input-field w-full px-md py-sm border border-outline-variant rounded-lg outline-none resize-none" 
                                      placeholder="Tell us about your hiking experience...">{{ old('bio', $user->bio ?? '') }}</textarea>
                        </div>
                        
                        <button type="submit" class="bg-gradient-to-r from-primary-container to-secondary text-white px-lg py-sm rounded-lg font-label-md hover:scale-105 transition-transform shadow-md">
                            Save Changes
                        </button>
                    </form>
                    
                </div>
            </div>
            
            <!-- Change Password -->
            <div class="fade-in-up delay-300">
                <h3 class="font-headline-sm text-primary-container mb-md">Change Password</h3>
                <div class="bg-white rounded-xl p-md">
                    <form action="{{ route('user.profile.password') }}" method="POST" class="space-y-md">
                        @csrf
                        @method('PUT')
                        
                        @if($errors->any())
                        <div class="mb-md p-md bg-red-50 border border-red-200 rounded-lg">
                            <ul class="text-red-800 text-sm space-y-1">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <div>
                            <label class="block font-label-sm text-on-surface-variant mb-xs">Current Password</label>
                            <input type="password" name="current_password" 
                                   class="input-field w-full px-md py-sm border border-outline-variant rounded-lg outline-none" required>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                            <div>
                                <label class="block font-label-sm text-on-surface-variant mb-xs">New Password</label>
                                <input type="password" name="new_password" 
                                       class="input-field w-full px-md py-sm border border-outline-variant rounded-lg outline-none" required>
                            </div>
                            <div>
                                <label class="block font-label-sm text-on-surface-variant mb-xs">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" 
                                       class="input-field w-full px-md py-sm border border-outline-variant rounded-lg outline-none" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="bg-gradient-to-r from-primary-container to-secondary text-white px-lg py-sm rounded-lg font-label-md hover:scale-105 transition-transform shadow-md">
                            Update Password
                        </button>
                    </form>
                </div>
            </div>
            
        </section>
    </div>
    
</main>
@endsection