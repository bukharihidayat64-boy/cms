@extends('frontend.layouts.main')

@section('title', 'Senaru Crater Lake Loop | RinjaniTrail.id')

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
                 alt="Senaru Forest" 
                  src="{{ asset('image/background_senaru.jpg') }}">
        </div>
        
        <div class="relative z-10 h-full flex flex-col justify-end px-md pb-xl max-w-container-max mx-auto">
            <div class="flex flex-wrap gap-xs mb-md">
                <span class="bg-secondary-container text-on-secondary-container font-label-sm text-label-sm px-sm py-1 rounded-full backdrop-blur-md font-bold">SCENIC ROUTE</span>
                <span class="bg-primary-container text-white font-label-sm text-label-sm px-sm py-1 rounded-full backdrop-blur-md">TROPICAL FOREST</span>
            </div>
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-xs drop-shadow-2xl">Senaru Crater Lake Loop</h1>
            <p class="font-body-lg text-body-lg text-surface/90 max-w-2xl">A lush journey through tropical rainforests leading to the rim of the spectacular Segara Anak crater lake.</p>
        </div>
    </section>
    
    <!-- Quick Stats Bar -->
    <section class="max-w-container-max mx-auto px-md -mt-16 relative z-20">
        <div class="glass-panel rounded-xl shadow-xl p-md grid grid-cols-2 md:grid-cols-5 gap-md">
            <div class="text-center">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">schedule</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Duration</p>
                <p class="font-bold text-primary-container text-lg">2D / 1N</p>
            </div>
            <div class="text-center border-x border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">altitude</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Max Elevation</p>
                <p class="font-bold text-primary-container text-lg">2,641 m</p>
            </div>
            <div class="text-center border-r border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">distance</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Distance</p>
                <p class="font-bold text-primary-container text-lg">14.5 km</p>
            </div>
            <div class="text-center border-r border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">trending_up</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Difficulty</p>
                <p class="font-bold text-secondary text-lg">Moderate</p>
            </div>
            <div class="text-center">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">location_on</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Start Point</p>
                <p class="font-bold text-primary-container text-lg">North Entrance</p>
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
                    <h2 class="font-display-lg text-display-lg text-primary-container mb-md">The Northern Gateway Through the Rainforest</h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-md">
                        The Senaru route is the perfect choice for nature lovers seeking a more moderate trekking experience. Starting from the lush village of Senaru at 601m, the trail winds through dense tropical rainforest, past hidden waterfalls, and ancient trees draped in moss before reaching the legendary Crater Rim at 2,641m.
                    </p>
                    <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                        Unlike the Sembalun route, Senaru offers constant shade from the forest canopy, making it cooler and more comfortable during the day. The highlight of this route is the breathtaking view of Segara Anak crater lake and the active volcano Barujari from the Crater Rim, especially during sunset. This route is ideal for those who want to experience the beauty of Rinjani without the extreme summit push.
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
                            <div class="elevation-bar flex-1 bg-secondary/20 h-[15%] cursor-pointer group rounded-t-sm relative">
                                <div class="hidden group-hover:block absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white text-xs p-1 rounded whitespace-nowrap">601m</div>
                            </div>
                            <div class="elevation-bar flex-1 bg-secondary/30 h-[22%] cursor-pointer group rounded-t-sm"></div>
                            <div class="elevation-bar flex-1 bg-secondary/40 h-[30%] cursor-pointer group rounded-t-sm"></div>
                            <div class="elevation-bar flex-1 bg-secondary/50 h-[38%] cursor-pointer group rounded-t-sm relative">
                                <div class="hidden group-hover:block absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white text-xs p-1 rounded whitespace-nowrap">Pos 1: 912m</div>
                            </div>
                            <div class="elevation-bar flex-1 bg-secondary/60 h-[45%] cursor-pointer group rounded-t-sm"></div>
                            <div class="elevation-bar flex-1 bg-secondary/70 h-[55%] cursor-pointer group rounded-t-sm"></div>
                            <div class="elevation-bar flex-1 bg-secondary/80 h-[62%] cursor-pointer group rounded-t-sm relative">
                                <div class="hidden group-hover:block absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white text-xs p-1 rounded whitespace-nowrap">Pos 2: 1,500m</div>
                            </div>
                            <div class="elevation-bar flex-1 bg-tertiary h-[75%] cursor-pointer group rounded-t-sm"></div>
                            <div class="elevation-bar flex-1 bg-tertiary h-[85%] cursor-pointer group rounded-t-sm"></div>
                            <div class="elevation-bar flex-1 bg-primary h-full cursor-pointer group rounded-t-sm relative">
                                <div class="hidden group-hover:block absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white text-xs p-1 rounded whitespace-nowrap">Rim: 2,641m</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-between text-label-sm text-outline px-2 mt-md">
                        <span>Senaru Village</span>
                        <span>Pos 1</span>
                        <span>Pos 2</span>
                        <span>Crater Rim</span>
                    </div>
                </div>
                
                <!-- Expedition Timeline -->
                <div class="bg-white rounded-xl shadow-md p-lg">
                    <div class="flex items-center gap-xs text-secondary mb-xs">
                        <span class="material-symbols-outlined">timeline</span>
                        <span class="font-label-md text-label-md uppercase tracking-widest font-bold">Itinerary</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-primary-container mb-lg">2-Day Expedition Timeline</h3>
                    
                    <div class="space-y-lg relative before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-0.5 timeline-line">
                        <!-- Day 1 -->
                        <div class="relative pl-lg">
                            <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-primary-container border-4 border-white shadow-sm z-10"></div>
                            <div class="flex justify-between items-start mb-xs">
                                <h4 class="font-headline-sm text-headline-sm text-primary-container">Day 1: Forest Ascent to Crater Rim</h4>
                                <span class="bg-surface-container-highest px-sm py-1 rounded font-label-sm text-label-sm font-bold">8 HOURS</span>
                            </div>
                            <p class="text-on-surface-variant mb-sm">Trek from Senaru village (601m) through dense tropical rainforest to the Crater Rim campsite (2,641m). Pass through Pos 1 and Pos 2, with lunch break at Pos 2. Experience the rich biodiversity of the mountain forest.</p>
                            <div class="flex gap-sm flex-wrap">
                                <span class="text-secondary font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">trending_up</span> +2,040m
                                </span>
                                <span class="text-on-surface-variant font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">restaurant</span> 3 Meals Included
                                </span>
                                <span class="text-on-surface-variant font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">tent</span> Crater Rim Camping
                                </span>
                            </div>
                        </div>
                        
                        <!-- Day 2 -->
                        <div class="relative pl-lg">
                            <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-secondary border-4 border-white shadow-sm z-10"></div>
                            <div class="flex justify-between items-start mb-xs">
                                <h4 class="font-headline-sm text-headline-sm text-primary-container">Day 2: Sunrise & Descent</h4>
                                <span class="bg-surface-container-highest px-sm py-1 rounded font-label-sm text-label-sm font-bold">6 HOURS</span>
                            </div>
                            <p class="text-on-surface-variant mb-sm">Wake up early to witness the spectacular sunrise over Segara Anak lake from the Crater Rim. After breakfast, descend back to Senaru village via the same route. The descent is easier and faster, taking about 4-5 hours.</p>
                            <div class="flex gap-sm flex-wrap">
                                <span class="text-secondary font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">wb_twilight</span> Sunrise at Crater Rim
                                </span>
                                <span class="text-on-surface-variant font-label-sm text-label-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[16px]">trending_down</span> -2,040m
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
                                 alt="Tropical Forest" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuCZ3Fo-IWTZc1mq1cJFaVtfRrQvyO_BgZvAkaxLQOdJYGnwQnYlpxuGxDfoivjyvMWC5SeiaHEKly8IrNVCne5px801CzBTB2N9mskHXbOLV4DnubEQrePjEIo58f0NX2u0SKvjO0VjuI5l56MlBl6xRyDnE_gBL1T5YpBaBflNiXji4z2k2QRcINANSrezqfZfpMTnzoQLs2cyfa1ZsX8rIgNvqv-laLQ2w7-fb_U625AXPO9_jRbvUmciVHZq5DBDPifIdBJNbFaa">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden group cursor-pointer">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                 alt="Segara Anak Lake" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuCo_4zr9IcmIeQkxa2BJ4-RkYhX_3OR8_nn4wAljqrI71pJcjAfRENKzluN5lCVH4VvEiTvsZnsF-BV-KMVxHjk2dj5c8Tmp3I-byNR0E6tinKEmoaPR-6s3uuBPuFwusA7L-MU6oerhbFZJ7H_kbi-OVo6T7ExUao2KRy6vTccINTp8Y6zo63Th4qVUWi0xfkT1k3JrRnmY_eu4RLPyPgpyeb7Vn-uSKnM-Q626l_Um5CaWQmwvw9Ys0EDB9BZC-FCHDx7GfCND8_9">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden group cursor-pointer">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                 alt="Crater Rim Sunset" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuBKekPia9LDiD-fQTj6hUApB_1pgisr4RNrgjZ18FaonSB4cRjdJtQAzaa8gniEysfv8YpnUIC9TyzRX9WP8ed9SFGWxZwU3IYiBSomgRqAL88dZ0jmbjTdGGhb6vtpj4Y07UZ659uSOt1gvCpD6GQ_Z0ADkWWaOS5ONFvJ0hnF1EtlFRaciLAjUIahtgBeY-fxq5EJG_vNgtgXoEbJIQjq-YtzMxre-fMk2Z0EwKVf9B8dT9okyU-MMFCN6EfXPl0_zU5j2d3-pT55">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden group cursor-pointer col-span-2">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                 alt="Rainforest Trail" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlNCD1z-TXOJGTBAQL591_ydXX1WJBSnwBrevnCyRep7L8DmBDiG1OA_sFj5biZDCpfjYjq56BWG2a20MeRKrbx7wddmbpj3xUWnmVH_uSS6kIFqHR5ffx4aUsXp7LLh6Dumn56HZr_LmCPuo9kTubfg0sf55GqrtoOxyA1NjfSkCI7zvf_-tW4arCZXRyn45nXfj_apI2lsuZD2HUvJT0p1KLmf5-i2F7B3NXZiGEWzTGvrCsDcYItmUB-9agin5zi6YUxfHtK-qr">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden group cursor-pointer">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                 alt="Campsite" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFVHzUn5NQC96ToqMLfFGJTynlVqs-MJsVTT5PUBekhbdRe5GYp-xRR_LfCVQs5AqRpg71viZW1DI9kOMhYKruE0ZRDmW4WCsdDbgtXzcisSgoQIqxzZ52N3juDs4lV6M3HUFtOS1qgy11yhIsUmjJHbFZZyeTi_y1W77VMrvBqivyYkPO9yCQtiz4MhKApOC2iKT1tSEyqZfuVc8uLlmWp-boVeeJ57-6p7WP7p9TO9OqixlJ_A1PKOJi76oFGoHvFzLIZ3wPxqiO">
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
                        <h4 class="font-display-lg text-display-lg">$189 <span class="text-headline-sm font-normal">/ person</span></h4>
                        <p class="font-label-sm text-label-sm text-surface/70">2 Days / 1 Night All-Inclusive</p>
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
                            <span class="font-body-md text-body-md">Completion certificate</span>
                        </li>
                    </ul>
                    
                    <div class="p-md bg-white/5 rounded-lg border border-white/10 mb-lg">
                        <div class="flex items-center gap-sm mb-xs">
                            <span class="material-symbols-outlined text-error">info</span>
                            <span class="font-label-md text-label-md font-bold text-secondary-fixed">Perfect For</span>
                        </div>
                        <p class="font-label-sm text-label-sm text-surface/70">Moderate fitness level required. Ideal for nature lovers, photographers, and those who prefer a shorter trek with stunning views.</p>
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
                            <span class="text-display-lg text-display-lg-mobile font-bold text-secondary">18°C</span>
                            <span class="font-label-sm text-label-sm text-on-surface-variant">Rim Temp</span>
                        </div>
                        <div class="text-right">
                            <span class="bg-green-100 text-green-800 px-sm py-1 rounded-full font-label-sm text-label-sm font-bold">TRAIL OPEN</span>
                            <p class="font-label-sm text-label-sm text-on-surface-variant mt-xs">Visibility: 12km</p>
                        </div>
                    </div>
                </div>
                
                <!-- Related Routes -->
                <div class="bg-white rounded-xl shadow-md p-md border border-outline-variant/30">
                    <h4 class="font-label-md text-label-md font-bold text-primary-container mb-md flex items-center gap-xs">
                        <span class="material-symbols-outlined text-[20px]">route</span> Other Routes
                    </h4>
                    <div class="space-y-sm">
                        <a href="{{ route('detail_rute_sembalun') }}" class="flex gap-sm p-sm rounded-lg hover:bg-surface-container-low transition-colors group">
                            <img class="w-16 h-16 rounded-lg object-cover" 
                                 alt="Sembalun Route" 
                                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuDLV5qC1acjzbE25yZ6lAPI9UDO-NnxtQUipNRCgipVtLDZdulsOeumgf3i6NIAAwHL0UFOMpEuptM14CMhZP_v_5wtu_wS2ANA-6-OS0Njzitrya6Az1tXtfx1PHtHGSz6gNGEPqceuOLShC2HVCJ-7NfmEfoilA7PgtKMbvxSzjeE7VdcI9MDFbbLYbwH6nQJoelVHgu5bTQaGV067GVwG1yk98r59ruaToFpvg5XzjSY_sMGu0KSZY0jdItM2b4ULnOMLTT0m8Ls">
                            <div class="flex-1">
                                <h5 class="font-label-md text-label-md font-bold text-primary-container group-hover:text-secondary transition-colors">Sembalun Ridge Ascent</h5>
                                <p class="font-label-sm text-label-sm text-on-surface-variant">3D / 2N • Advanced • 3,726m</p>
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
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto mt-sm">Even for moderate routes, proper preparation ensures a safe and enjoyable experience. Review this checklist before your journey.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                <div class="glass-panel rounded-xl p-lg shadow-premium hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-secondary text-4xl mb-md" style="font-variation-settings: 'FILL' 1;">fitness_center</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Physical Fitness</h3>
                    <p class="text-on-surface-variant font-body-md">Moderate fitness level required. Regular cardio exercise and hiking practice recommended 1 month before the trek.</p>
                </div>
                <div class="glass-panel rounded-xl p-lg shadow-premium hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-tertiary text-4xl mb-md" style="font-variation-settings: 'FILL' 1;">medical_services</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Medical Requirements</h3>
                    <p class="text-on-surface-variant font-body-md">Basic health check recommended. Bring personal medications. Inform guides of any medical conditions before departure.</p>
                </div>
                <div class="glass-panel rounded-xl p-lg shadow-premium hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-primary-fixed text-4xl mb-md" style="font-variation-settings: 'FILL' 1;">backpack</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Essential Gear</h3>
                    <p class="text-on-surface-variant font-body-md">Hiking boots, rain jacket, warm layers for night, headlamp, water bottle (2L), and daypack for personal items.</p>
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
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md">Ready to Explore the Crater Rim?</h2>
            <p class="font-body-lg text-surface-variant/80 max-w-2xl mx-auto mb-lg">Experience the beauty of Segara Anak lake and the tropical rainforest with our expert guides. Limited slots available per season.</p>
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