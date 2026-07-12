@extends('frontend.layouts.main')

@section('title', 'Sembalun Ridge Ascent | RinjaniTrail.id')

@push('styles')
<style>
    .glass-panel {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .dark-glass {
        background: rgba(0, 34, 41, 0.85);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .elevation-bar {
        transition: all 0.3s ease;
    }
    .elevation-bar:hover {
        transform: scaleY(1.05);
    }
    .timeline-line {
        background: linear-gradient(to bottom, #beeaf8, #3b6470, #002229);
    }
</style>
@endpush

@section('content')
<main>
    <!-- Hero Section -->
    <section class="relative h-[70vh] overflow-hidden">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover" 
                 alt="Sembalun Savanna" 
                 src="{{ asset('image/background_sembalun.jpg') }}">
            <div class="absolute inset-0 bg-gradient-to-b from-primary-container/40 via-transparent to-background"></div>
        </div>
        
        <div class="relative z-10 h-full flex flex-col justify-end px-md pb-xl max-w-container-max mx-auto">
            <div class="flex flex-wrap gap-xs mb-md">
                <span class="bg-secondary-fixed text-on-secondary-fixed-variant font-label-sm text-label-sm px-sm py-1 rounded-full backdrop-blur-md font-bold">EXPERT CHOICE</span>
                <span class="bg-secondary-container text-on-secondary-container font-label-sm text-label-sm px-sm py-1 rounded-full backdrop-blur-md">HIGH ALTITUDE</span>
            </div>
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-xs drop-shadow-2xl">Sembalun Ridge Ascent</h1>
            <p class="font-body-lg text-body-lg text-surface/90 max-w-2xl">The most popular route for summit attempts, offering breathtaking savanna views and a dramatic ridge walk above the clouds.</p>
        </div>
    </section>
    
    <!-- Quick Stats Bar -->
    <section class="max-w-container-max mx-auto px-md -mt-16 relative z-20">
        <div class="glass-panel rounded-xl shadow-xl p-md grid grid-cols-2 md:grid-cols-5 gap-md">
            <div class="text-center">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">schedule</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Duration</p>
                <p class="font-bold text-primary-container text-lg">3D / 2N</p>
            </div>
            <div class="text-center border-x border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">altitude</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Max Elevation</p>
                <p class="font-bold text-primary-container text-lg">3,726 m</p>
            </div>
            <div class="text-center border-r border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">distance</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Distance</p>
                <p class="font-bold text-primary-container text-lg">24.5 km</p>
            </div>
            <div class="text-center border-r border-outline-variant/30">
                <span class="material-symbols-outlined text-error text-3xl mb-xs">trending_up</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Difficulty</p>
                <p class="font-bold text-error text-lg">Advanced</p>
            </div>
            <div class="text-center">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">location_on</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Start Point</p>
                <p class="font-bold text-primary-container text-lg">East Entrance</p>
            </div>
        </div>
    </section>
    
    <!-- Route Overview -->
    <section class="max-w-container-max mx-auto px-md py-xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-lg">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-lg">
                <!-- Description -->
                <div class="bg-white rounded-xl shadow-md p-lg">
                    <div class="flex items-center gap-xs text-secondary mb-xs">
                        <span class="material-symbols-outlined">info</span>
                        <span class="font-label-md text-label-md uppercase tracking-widest font-bold">Route Overview</span>
                    </div>
                    <h2 class="font-display-lg text-display-lg text-primary-container mb-md">The Eastern Gateway to the Summit</h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-md">
                        The Sembalun route is the preferred choice for serious mountaineers aiming for the highest peak of Mount Rinjani. Starting from the picturesque village of Sembalun at 1,156m, the trail gradually ascends through golden savannas before transitioning into steep ridge climbs that culminate at the spectacular 3,726m summit.
                    </p>
                    <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                        This route offers unparalleled panoramic views of the Segara Anak crater lake, the active volcano Barujari, and on clear days, the distant peaks of Bali's Mount Agung. The final summit push, typically starting at 2:00 AM, is a test of endurance and resolve that rewards climbers with one of Indonesia's most breathtaking sunrises.
                    </p>
                </div>
                
                <!-- Elevation Profile -->
                <div class="bg-white rounded-xl shadow-md p-lg">
                    <div class="flex items-center gap-xs text-secondary mb-xs">
                        <span class="material-symbols-outlined">show_chart</span>
                        <span class="font-label-md text-label-md uppercase tracking-widest font-bold">Elevation Profile</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-primary-container mb-lg">Altitude Visualization</h3>
                    
                    <div class="bg-surface-container-low rounded-lg p-md h-64 relative overflow-hidden">
                        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#72787a 0.5px, transparent 0.5px); background-size: 20px 20px;"></div>
                        
                        <div class="w-full h-full flex items-end gap-1 relative z-10">
                            <div class="elevation-bar flex-1 bg-secondary/20 h-[20%] cursor-pointer group rounded-t-sm relative">
                                <div class="hidden group-hover:block absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white text-xs p-1 rounded whitespace-nowrap">1,156m</div>
                            </div>
                            <div class="elevation-bar flex-1 bg-secondary/30 h-[28%] cursor-pointer group rounded-t-sm"></div>
                            <div class="elevation-bar flex-1 bg-secondary/40 h-[38%] cursor-pointer group rounded-t-sm"></div>
                            <div class="elevation-bar flex-1 bg-secondary/50 h-[48%] cursor-pointer group rounded-t-sm relative">
                                <div class="hidden group-hover:block absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white text-xs p-1 rounded whitespace-nowrap">Pos 2: 1,800m</div>
                            </div>
                            <div class="elevation-bar flex-1 bg-secondary/60 h-[58%] cursor-pointer group rounded-t-sm"></div>
                            <div class="elevation-bar flex-1 bg-secondary/70 h-[68%] cursor-pointer group rounded-t-sm relative">
                                <div class="hidden group-hover:block absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white text-xs p-1 rounded whitespace-nowrap">Crater Rim</div>
                            </div>
                            <div class="elevation-bar flex-1 bg-tertiary h-[78%] cursor-pointer group rounded-t-sm"></div>
                            <div class="elevation-bar flex-1 bg-tertiary h-[88%] cursor-pointer group rounded-t-sm"></div>
                            <div class="elevation-bar flex-1 bg-primary h-[95%] cursor-pointer group rounded-t-sm relative">
                                <div class="hidden group-hover:block absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white text-xs p-1 rounded whitespace-nowrap">Summit: 3,726m</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-between text-label-sm text-outline px-2 mt-md">
                        <span>Sembalun Village</span>
                        <span>Pos 2</span>
                        <span>Crater Rim</span>
                        <span>Summit</span>
                    </div>
                </div>
                
                <!-- Expedition Timeline -->
                <div class="bg-white rounded-xl shadow-md p-lg">
                    <div class="flex items-center gap-xs text-secondary mb-xs">
                        <span class="material-symbols-outlined">timeline</span>
                        <span class="font-label-md text-label-md uppercase tracking-widest font-bold">Itinerary</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-primary-container mb-lg">3-Day Expedition Timeline</h3>
                    
                    <div class="space-y-lg relative before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-0.5 timeline-line">
                        <!-- Day 1 -->
                        <div class="relative pl-lg">
                            <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-primary-container border-4 border-white shadow-sm z-10"></div>
                            <div class="flex justify-between items-start mb-xs">
                                <h4 class="font-headline-sm text-headline-sm text-primary-container">Day 1: Savanna Ascent</h4>
                                <span class="bg-surface-container-highest px-sm py-1 rounded font-label-sm text-label-sm font-bold">6 HOURS</span>
                            </div>
                            <p class="text-on-surface-variant mb-sm">Trek from Sembalun village (1,156m) through golden savannas to Pos 3 campsite (1,800m). Experience the vast open landscapes and spot local wildlife.</p>
                            <div class="flex gap-sm flex-wrap">
                                <span class="text-secondary font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">trending_up</span> +644m
                                </span>
                                <span class="text-on-surface-variant font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">restaurant</span> 3 Meals Included
                                </span>
                                <span class="text-on-surface-variant font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">tent</span> Camping at Pos 3
                                </span>
                            </div>
                        </div>
                        
                        <!-- Day 2 -->
                        <div class="relative pl-lg">
                            <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-secondary border-4 border-white shadow-sm z-10"></div>
                            <div class="flex justify-between items-start mb-xs">
                                <h4 class="font-headline-sm text-headline-sm text-primary-container">Day 2: Summit Push & Crater Rim</h4>
                                <span class="bg-surface-container-highest px-sm py-1 rounded font-label-sm text-label-sm font-bold">14 HOURS</span>
                            </div>
                            <p class="text-on-surface-variant mb-sm">Early morning summit push (02:00 AM) to reach the 3,726m peak at sunrise. Descend to Sembalun Crater Rim (2,639m) for overnight camping with spectacular caldera views.</p>
                            <div class="flex gap-sm flex-wrap">
                                <span class="text-secondary font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">engineering</span> Summit Peak 3,726m
                                </span>
                                <span class="text-on-surface-variant font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">wb_twilight</span> Sunrise at Summit
                                </span>
                                <span class="text-on-surface-variant font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">tent</span> Crater Rim Camp
                                </span>
                            </div>
                        </div>
                        
                        <!-- Day 3 -->
                        <div class="relative pl-lg">
                            <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-tertiary border-4 border-white shadow-sm z-10"></div>
                            <div class="flex justify-between items-start mb-xs">
                                <h4 class="font-headline-sm text-headline-sm text-primary-container">Day 3: Descent to Sembalun</h4>
                                <span class="bg-surface-container-highest px-sm py-1 rounded font-label-sm text-label-sm font-bold">7 HOURS</span>
                            </div>
                            <p class="text-on-surface-variant mb-sm">Descend back to Sembalun village via the same route. Navigate the challenging scree slopes carefully before reaching the welcoming village below.</p>
                            <div class="flex gap-sm flex-wrap">
                                <span class="text-secondary font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">trending_down</span> -1,483m
                                </span>
                                <span class="text-on-surface-variant font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">celebration</span> Certificate Award
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Gallery -->
                <div class="bg-white rounded-xl shadow-md p-lg">
                    <div class="flex items-center gap-xs text-secondary mb-xs">
                        <span class="material-symbols-outlined">photo_library</span>
                        <span class="font-label-md text-label-md uppercase tracking-widest font-bold">Gallery</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-primary-container mb-lg">Route Highlights</h3>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-sm">
                        <div class="aspect-square rounded-lg overflow-hidden group cursor-pointer">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                 alt="Savanna View" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuDLV5qC1acjzbE25yZ6lAPI9UDO-NnxtQUipNRCgipVtLDZdulsOeumgf3i6NIAAwHL0UFOMpEuptM14CMhZP_v_5wtu_wS2ANA-6-OS0Njzitrya6Az1tXtfx1PHtHGSz6gNGEPqceuOLShC2HVCJ-7NfmEfoilA7PgtKMbvxSzjeE7VdcI9MDFbbLYbwH6nQJoelVHgu5bTQaGV067GVwG1yk98r59ruaToFpvg5XzjSY_sMGu0KSZY0jdItM2b4ULnOMLTT0m8Ls">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden group cursor-pointer">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                 alt="Summit Sunrise" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuAR-TwKVKMrb4zB4km1FuZ7BhvluXe0UsCp1EUyHzhTDr6YaPecSdX5b8ZIEzcS1_jx7x9BkJ3XtBIDMFEAuMGIY3U0Fg4UJBewEm0GncxgCtW82wu0jZ22T9jX48QCPHzHftQVvUeYoChZEudtC-RErYh1TWIjek62LOORhkLutcarT7RZvGX7YfGKTJp-mk68nG7AP9W1XVdDSAG0sJPMP9iUZFajBHNWn9nI1ilZ3ezZ-eG9x9GSioGTiawvLtn777J9KK_y9NqC">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden group cursor-pointer">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                 alt="Crater Lake" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFRdUkeVcfr-t73KSVB59GmY-GIAT-IYsuTfOAScB3yqY62j1B74uO1kcHp7i8G7nNxV6q9E3sjpDDE0CMmwxglW3-2cDzJo6sfJ4Hlp8zp4RjhdSJvD-BG3cYCO8qD1irjhP8vQZAWsk2qmDdRAO1HsSiQ66cq636nGAYCvFP-BLQSrUN_N1LtnW7ZtH7Gvfsb1SbV9LS1KpqQI9Uq4fpW9ocLHe5-UbWKfy1YBH1Mnv8eNdLoQnUuGGaQ1HMmBv4IuBFT3Inzhfu">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden group cursor-pointer col-span-2">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                 alt="Ridge Walk" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuCX0a0syGUg9mnQUi9_kKjVXH6OJvYln1PBiG3qPegrKBhBZ_QIcvWDFAsTvQJgr8sZJVg1c5judk7-isJ7cSB17635g6p2BUf1lZS_-5m4EyZ0jq1rNpUE96u1ZdsF6nZtR8-Z8ckkxac7M8hKv5eko79ejyPJQ_f9oS68qB8EM6jN3SlVHxT1qlrHQvanFm-gqav_e-gVYB45NY-u1j5T2GooBcbW5NJx6672CCaIo1ShAMF8zrTxnKK0EaRcmdCg50ECFAPh_ESx">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden group cursor-pointer">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                 alt="Campsite" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuAlXOxnPsILpFrDg8J2hlnEOnnF8GOFspQUQzPqoN6L62rjVDiNNeEEFUGy5uUwRUjkW6Qh0_wVra7jedEEQR6tnHZWNTcHvwCJSHAYgKp6X1UHojYLAy6W0RVCzp-iPDpRSTDHcMYKTfOsjzir1nTZh_q7yy-5qp6Q50pAFok7KujVMXE0K8KthB9Dn_TEHmQLngkIXoJVtzncI3g_QgRuogQS-ohG0zinci6khO8eY8LNcR4Z33oJ7_EQVsp51T3jChE5nVEnDefE">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-md">
                <!-- Booking Card -->
                <div class="bg-primary-container rounded-xl shadow-xl p-lg text-white sticky top-24">
                    <div class="text-center mb-md pb-md border-b border-white/20">
                        <p class="font-label-sm text-label-sm text-surface/70 uppercase tracking-widest">Starting From</p>
                        <h4 class="font-display-lg text-display-lg">$249 <span class="text-headline-sm font-normal">/ person</span></h4>
                        <p class="font-label-sm text-label-sm text-surface/70">3 Days / 2 Nights All-Inclusive</p>
                    </div>
                    
                    <h3 class="font-headline-sm text-headline-sm mb-md">What's Included</h3>
                    <ul class="space-y-sm mb-lg">
                        <li class="flex items-center gap-sm">
                            <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                            <span class="font-body-md text-body-md">Certified mountain guide</span>
                        </li>
                        <li class="flex items-center gap-sm">
                            <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                            <span class="font-body-md text-body-md">All meals (3x daily)</span>
                        </li>
                        <li class="flex items-center gap-sm">
                            <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                            <span class="font-body-md text-body-md">Camping equipment & tents</span>
                        </li>
                        <li class="flex items-center gap-sm">
                            <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                            <span class="font-body-md text-body-md">Porter service (1 per 2 hikers)</span>
                        </li>
                        <li class="flex items-center gap-sm">
                            <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                            <span class="font-body-md text-body-md">National park permit</span>
                        </li>
                        <li class="flex items-center gap-sm">
                            <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                            <span class="font-body-md text-body-md">Summit certificate</span>
                        </li>
                    </ul>
                    
                    <div class="p-md bg-white/5 rounded-lg border border-white/10 mb-lg">
                        <div class="flex items-center gap-sm mb-xs">
                            <span class="material-symbols-outlined text-error">warning</span>
                            <span class="font-label-md text-label-md font-bold text-error">Important Notice</span>
                        </div>
                        <p class="font-label-sm text-label-sm text-surface/70">Advanced fitness level required. Medical certificate mandatory. Not recommended for those with heart or respiratory conditions.</p>
                    </div>
                    
                    <button class="w-full bg-secondary-fixed text-on-secondary-fixed-variant py-md rounded-lg font-headline-sm text-headline-sm font-bold hover:scale-105 active:scale-95 transition-all shadow-lg mb-sm">
                        Book This Expedition
                    </button>
                    <a href="{{ route('local_services') }}" class="w-full block text-center border border-white/30 text-white py-md rounded-lg font-label-md text-label-md font-bold hover:bg-white/10 transition-all">
                        Contact Local Guide
                    </a>
                </div>
                
                <!-- Weather Card -->
                <div class="bg-white rounded-xl shadow-md p-md border border-outline-variant/30">
                    <h4 class="font-label-md text-label-md font-bold text-primary-container mb-sm flex items-center gap-xs">
                        <span class="material-symbols-outlined text-[20px]">thermostat</span> Current Conditions
                    </h4>
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <span class="text-display-lg text-display-lg-mobile font-bold text-secondary">14°C</span>
                            <span class="font-label-sm text-label-sm text-on-surface-variant">Summit Temp</span>
                        </div>
                        <div class="text-right">
                            <span class="bg-green-100 text-green-800 px-sm py-1 rounded-full font-label-sm text-label-sm font-bold">TRAIL OPEN</span>
                            <p class="font-label-sm text-label-sm text-on-surface-variant mt-xs">Visibility: 10km</p>
                        </div>
                    </div>
                </div>
                
                <!-- Related Routes -->
                <div class="bg-white rounded-xl shadow-md p-md border border-outline-variant/30">
                    <h4 class="font-label-md text-label-md font-bold text-primary-container mb-md flex items-center gap-xs">
                        <span class="material-symbols-outlined text-[20px]">route</span> Other Routes
                    </h4>
                    <div class="space-y-sm">
                        <a href="{{ route('detail_rute_senaru') }}" class="flex gap-sm p-sm rounded-lg hover:bg-surface-container-low transition-colors group">
                            <img class="w-16 h-16 rounded-lg object-cover" 
                                 alt="Senaru Route" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuCZ3Fo-IWTZc1mq1cJFaVtfRrQvyO_BgZvAkaxLQOdJYGnwQnYlpxuGxDfoivjyvMWC5SeiaHEKly8IrNVCne5px801CzBTB2N9mskHXbOLV4DnubEQrePjEIo58f0NX2u0SKvjO0VjuI5l56MlBl6xRyDnE_gBL1T5YpBaBflNiXji4z2k2QRcINANSrezqfZfpMTnzoQLs2cyfa1ZsX8rIgNvqv-laLQ2w7-fb_U625AXPO9_jRbvUmciVHZq5DBDPifIdBJNbFaa">
                            <div class="flex-1">
                                <h5 class="font-label-md text-label-md font-bold text-primary-container group-hover:text-secondary transition-colors">Senaru Crater Lake Loop</h5>
                                <p class="font-label-sm text-label-sm text-on-surface-variant">2D / 1N • Moderate • 2,641m</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Safety & Equipment Section -->
    <section class="bg-surface-container-low py-xl border-t border-outline-variant/30">
        <div class="max-w-container-max mx-auto px-md">
            <div class="text-center mb-xl">
                <span class="text-secondary font-label-sm tracking-widest uppercase">Safety First</span>
                <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mt-xs">Essential Preparation</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto mt-sm">Proper preparation is key to a successful and safe expedition. Review this checklist carefully before your journey.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                <div class="glass-panel rounded-xl p-lg shadow-premium hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-secondary text-4xl mb-md" style="font-variation-settings: 'FILL' 1;">fitness_center</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Physical Fitness</h3>
                    <p class="text-on-surface-variant font-body-md">Begin cardio training 2 months prior. Focus on stair climbing, hiking with weighted backpack, and leg strengthening exercises.</p>
                </div>
                <div class="glass-panel rounded-xl p-lg shadow-premium hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-tertiary text-4xl mb-md" style="font-variation-settings: 'FILL' 1;">medical_services</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Medical Requirements</h3>
                    <p class="text-on-surface-variant font-body-md">Medical certificate required. Discuss altitude sickness prevention with your doctor. Bring personal medications and first-aid supplies.</p>
                </div>
                <div class="glass-panel rounded-xl p-lg shadow-premium hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-primary-fixed text-4xl mb-md" style="font-variation-settings: 'FILL' 1;">backpack</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Essential Gear</h3>
                    <p class="text-on-surface-variant font-body-md">Grade 4 hiking boots, thermal layers, headlamp, 3L hydration system, trekking poles, and weather-proof outer layer mandatory.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="relative bg-primary-container py-xl overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white via-transparent to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-container-max mx-auto px-md text-center">
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md">Ready for the Summit Challenge?</h2>
            <p class="font-body-lg text-surface-variant/80 max-w-2xl mx-auto mb-lg">Join our expert guides for an unforgettable expedition to the highest peak of Lombok. Limited slots available per season.</p>
            <div class="flex flex-col md:flex-row gap-md justify-center">
                <button class="bg-surface text-primary-container px-lg py-md rounded-lg font-headline-sm hover:scale-105 hover:shadow-2xl transition-all">Book Your Expedition</button>
                <a href="{{ route('routes') }}" class="border border-surface/30 text-surface px-lg py-md rounded-lg font-headline-sm hover:bg-surface hover:text-primary-container transition-all">View All Routes</a>
            </div>
        </div>
    </section>
</main>

<!-- FAB for quick booking (mobile only) -->
<div class="fixed bottom-md right-md md:hidden z-40">
    <button class="bg-secondary text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center active:scale-90 transition-transform">
        <span class="material-symbols-outlined">shopping_cart</span>
    </button>
</div>
@endsection