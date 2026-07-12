@extends('frontend.layouts.main')

@section('title', 'About Us | RinjaniTrail.id - Pusat Informasi Pendakian Rinjani')

@push('styles')
<style>
    .glass-panel {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .team-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .team-card:hover {
        transform: translateY(-12px);
    }
    .value-card {
        transition: all 0.3s ease;
    }
    .value-card:hover {
        transform: scale(1.03);
    }
    .counter {
        display: inline-block;
    }
    .timeline-item {
        position: relative;
        padding-left: 3rem;
        padding-bottom: 2rem;
        border-left: 2px solid #beeaf8;
    }
    .timeline-item:last-child {
        border-left-color: transparent;
    }
    .timeline-dot {
        position: absolute;
        left: -8px;
        top: 0;
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background: #3b6470;
        border: 3px solid #faf9f9;
    }
    .floating-shape {
        position: absolute;
        border-radius: 50%;
        background: linear-gradient(45deg, rgba(190, 234, 248, 0.3), rgba(163, 205, 219, 0.3));
        animation: float 20s infinite ease-in-out;
    }
    @keyframes float {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(30px, -30px) rotate(120deg); }
        66% { transform: translate(-20px, 20px) rotate(240deg); }
    }
</style>
@endpush

@section('content')
<main class="pt-20">
    
    <!-- Hero Section -->
    <section class="relative h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover" 
                 alt="Rinjani Heritage" 
                 src="{{ asset('image/Slamet.jpeg') }}">
            <div class="absolute inset-0 bg-gradient-to-b from-primary-container/70 via-primary-container/50 to-background"></div>
        </div>
        
        <div class="relative z-10 text-center px-md max-w-4xl">
            <span class="inline-block bg-secondary-container text-on-secondary-container px-md py-base rounded-full font-label-md text-label-md uppercase tracking-widest mb-md">
                <span class="material-symbols-outlined align-middle mr-1">account_balance</span>
                About Us
            </span>
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md drop-shadow-2xl">
                Pusat Informasi Pendakian Rinjani
            </h1>
            <p class="font-body-lg text-body-lg text-surface/90 max-w-3xl mx-auto mb-lg">
                Menghubungkan pendaki dengan informasi rute, edukasi keselamatan, dan kontak mitra lokal agar perjalanan ke Rinjani lebih terencana dan bertanggung jawab.
            </p>
            <div class="flex flex-wrap gap-md justify-center">
                <a href="{{ route('routes') }}" class="bg-surface text-primary-container px-lg py-md rounded-lg font-headline-sm hover:scale-105 transition-all shadow-xl flex items-center gap-xs">
                    <span class="material-symbols-outlined">route</span>
                    Explore Routes
                </a>
                <a href="{{ route('local_services') }}" class="border-2 border-surface text-surface px-lg py-md rounded-lg font-headline-sm hover:bg-surface hover:text-primary-container transition-all flex items-center gap-xs">
                    <span class="material-symbols-outlined">groups</span>
                    Cari Mitra Lokal
                </a>
            </div>
        </div>
    </section>
    
    <!-- Quick Stats -->
    <section class="max-w-container-max mx-auto px-md -mt-16 relative z-20">
        <div class="glass-panel rounded-xl shadow-xl p-md grid grid-cols-2 md:grid-cols-4 gap-md">
            <div class="text-center">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">groups</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Happy Trekkers</p>
                <p class="font-bold text-primary-container text-lg counter" data-target="15000">0</p>
            </div>
            <div class="text-center border-x border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">hiking</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Expert Guides</p>
                <p class="font-bold text-primary-container text-lg counter" data-target="120">0</p>
            </div>
            <div class="text-center border-r border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">flag</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Summits Reached</p>
                <p class="font-bold text-primary-container text-lg counter" data-target="8500">0</p>
            </div>
            <div class="text-center">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">award</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Years Experience</p>
                <p class="font-bold text-primary-container text-lg counter" data-target="12">0</p>
            </div>
        </div>
    </section>
    
    <!-- Our Story Section -->
    <section class="py-xl max-w-container-max mx-auto px-md">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-xl items-center">
            <div>
                <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Tentang Platform</span>
                <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md">Informasi Terpusat & Pemberdayaan Lokal</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-md leading-relaxed">
                    RinjaniTrail.id dibangun sebagai jembatan informasi antara pendaki dan ekosistem lokal di sekitar Gunung Rinjani. Kami bukan penyedia pembayaran atau agen checkout, melainkan platform yang membantu pendaki menemukan informasi rute, persiapan, dan kontak mitra lokal secara terpusat.
                </p>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-lg leading-relaxed">
                    Kami percaya pendakian yang baik dimulai dari informasi yang jelas. Karena itu, website ini menekankan keselamatan, prinsip Leave No Trace, kepatuhan aturan TNGR, dan kemudahan menghubungi mitra lokal untuk konsultasi langsung.
                </p>
                
                <div class="grid grid-cols-2 gap-md">
                    <div class="border-l-4 border-secondary pl-md">
                        <h4 class="font-headline-sm text-headline-sm text-primary-container">100%</h4>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Local Guides & Staff</p>
                    </div>
                    <div class="border-l-4 border-secondary pl-md">
                        <h4 class="font-headline-sm text-headline-sm text-primary-container">0%</h4>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Trace Policy on Trails</p>
                    </div>
                    <div class="border-l-4 border-secondary pl-md">
                        <h4 class="font-headline-sm text-headline-sm text-primary-container">24/7</h4>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Safety Support</p>
                    </div>
                    <div class="border-l-4 border-secondary pl-md">
                        <h4 class="font-headline-sm text-headline-sm text-primary-container">4.9/5</h4>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Customer Rating</p>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img class="w-full h-auto object-cover" 
                         alt="Local Team" 
                         src="{{ asset('image/summit.jpeg') }}">
                    <div class="absolute bottom-md left-md text-white">
                        <p class="font-headline-sm text-headline-sm italic">"The mountain is our home; you are our guest."</p>
                        <p class="font-label-sm mt-sm">— Local Guide Association</p>
                    </div>
                </div>
                <!-- Decorative Element -->
                <div class="absolute -bottom-md -right-md w-48 h-48 bg-secondary-container rounded-2xl -z-10 opacity-50"></div>
            </div>
        </div>
    </section>
    
    <!-- Mission & Vision Section -->
    <section class="bg-surface-container-low py-xl">
        <div class="max-w-container-max mx-auto px-md">
            <div class="text-center mb-xl">
                <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Our Purpose</span>
                <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md">Mission & Vision</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
                <!-- Mission -->
                <div class="bg-white rounded-2xl p-lg shadow-lg border border-outline-variant/20">
                    <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mb-md">
                        <span class="material-symbols-outlined text-on-secondary-container text-4xl">target</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-primary-container mb-md">Our Mission</h3>
                    <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-md">
                        To democratize access to high-altitude exploration through professional safety standards, local expertise, and a radical commitment to environmental restoration.
                    </p>
                    <ul class="space-y-sm">
                        <li class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-secondary text-sm mt-xs">check_circle</span>
                            <span class="font-body-md text-on-surface-variant">Provide world-class trekking experiences with certified guides</span>
                        </li>
                        <li class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-secondary text-sm mt-xs">check_circle</span>
                            <span class="font-body-md text-on-surface-variant">Support local communities through sustainable employment</span>
                        </li>
                        <li class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-secondary text-sm mt-xs">check_circle</span>
                            <span class="font-body-md text-on-surface-variant">Preserve Mount Rinjani's ecosystem for future generations</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Vision -->
                <div class="bg-white rounded-2xl p-lg shadow-lg border border-outline-variant/20">
                    <div class="w-16 h-16 rounded-full bg-tertiary-container flex items-center justify-center mb-md">
                        <span class="material-symbols-outlined text-on-tertiary text-4xl">visibility</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-primary-container mb-md">Our Vision</h3>
                    <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-md">
                        To be the global benchmark for sustainable high-altitude tourism, proving that adventure and conservation can thrive in harmony.
                    </p>
                    <ul class="space-y-sm">
                        <li class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-tertiary text-sm mt-xs">check_circle</span>
                            <span class="font-body-md text-on-surface-variant">Set international standards for eco-tourism in Indonesia</span>
                        </li>
                        <li class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-tertiary text-sm mt-xs">check_circle</span>
                            <span class="font-body-md text-on-surface-variant">Create a model for community-based conservation</span>
                        </li>
                        <li class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-tertiary text-sm mt-xs">check_circle</span>
                            <span class="font-body-md text-on-surface-variant">Inspire responsible adventure travel worldwide</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Why Choose Us Section -->
    <section class="py-xl max-w-container-max mx-auto px-md">
        <div class="text-center mb-xl">
            <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Our Advantages</span>
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md">Why Choose RinjaniTrail.id?</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">We combine local expertise with international safety standards to deliver an unforgettable expedition experience.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-lg">
            <!-- Value 1 -->
            <div class="value-card bg-white rounded-xl p-lg shadow-md border border-outline-variant/20">
                <div class="w-14 h-14 rounded-lg bg-secondary-container flex items-center justify-center mb-md">
                    <span class="material-symbols-outlined text-on-secondary-container text-3xl">verified_user</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Certified Professionals</h3>
                <p class="font-body-md text-on-surface-variant">All guides are TNGR-certified with advanced wilderness first aid and mountain rescue training.</p>
            </div>
            
            <!-- Value 2 -->
            <div class="value-card bg-white rounded-xl p-lg shadow-md border border-outline-variant/20">
                <div class="w-14 h-14 rounded-lg bg-secondary-container flex items-center justify-center mb-md">
                    <span class="material-symbols-outlined text-on-secondary-container text-3xl">shield</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Safety First</h3>
                <p class="font-body-md text-on-surface-variant">Satellite communication, emergency evacuation plans, and 24/7 support throughout your expedition.</p>
            </div>
            
            <!-- Value 3 -->
            <div class="value-card bg-white rounded-xl p-lg shadow-md border border-outline-variant/20">
                <div class="w-14 h-14 rounded-lg bg-secondary-container flex items-center justify-center mb-md">
                    <span class="material-symbols-outlined text-on-secondary-container text-3xl">eco</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Sustainable Practices</h3>
                <p class="font-body-md text-on-surface-variant">Zero single-use plastic, carbon-offset treks, and active participation in reforestation programs.</p>
            </div>
            
            <!-- Value 4 -->
            <div class="value-card bg-white rounded-xl p-lg shadow-md border border-outline-variant/20">
                <div class="w-14 h-14 rounded-lg bg-secondary-container flex items-center justify-center mb-md">
                    <span class="material-symbols-outlined text-on-secondary-container text-3xl">people</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Local Community</h3>
                <p class="font-body-md text-on-surface-variant">100% local staff from Senaru and Sembalun villages, ensuring authentic cultural experiences.</p>
            </div>
            
            <!-- Value 5 -->
            <div class="value-card bg-white rounded-xl p-lg shadow-md border border-outline-variant/20">
                <div class="w-14 h-14 rounded-lg bg-secondary-container flex items-center justify-center mb-md">
                    <span class="material-symbols-outlined text-on-secondary-container text-3xl">premium</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Premium Equipment</h3>
                <p class="font-body-md text-on-surface-variant">High-quality camping gear, professional-grade tents, and well-maintained safety equipment.</p>
            </div>
            
            <!-- Value 6 -->
            <div class="value-card bg-white rounded-xl p-lg shadow-md border border-outline-variant/20">
                <div class="w-14 h-14 rounded-lg bg-secondary-container flex items-center justify-center mb-md">
                    <span class="material-symbols-outlined text-on-secondary-container text-3xl">star</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Proven Track Record</h3>
                <p class="font-body-md text-on-surface-variant">15,000+ successful summits with a 4.9/5 customer satisfaction rating over 12 years.</p>
            </div>
        </div>
    </section>
    
    <!-- Team Section -->
    <section class="bg-surface-container-low py-xl">
        <div class="max-w-container-max mx-auto px-md">
            <div class="text-center mb-xl">
                <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Our Team</span>
                <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md">The People Behind the Journey</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Meet the expert guides and staff who make your Rinjani expedition safe, memorable, and transformative.</p>
            </div>
            
    <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
    <!-- Team Member 1 -->
    <div class="team-card bg-white rounded-2xl overflow-hidden shadow-lg border border-outline-variant/20">
        <div class="h-96 bg-gradient-to-b from-surface-container-low to-white overflow-hidden flex items-center justify-center p-4">
            <img class="max-w-full max-h-full object-contain rounded-lg" 
                 alt="Boss Muda - Founder" 
                 src="{{ asset('image/boy_1.jpeg') }}">
        </div>
        <div class="p-lg">
            <h3 class="font-headline-sm text-headline-sm text-primary-container mb-xs">Boss Muda</h3>
            <p class="font-label-sm text-label-sm text-secondary mb-sm uppercase">Founder & Head Guide</p>
            <p class="font-body-md text-on-surface-variant mb-md">15+ years of Rinjani expeditions. Certified in Advanced Wilderness First Aid and Alpine Rescue.</p>
            <div class="flex gap-sm">
                <a href="mailto:bukhari@rinjanitrail.id" class="material-symbols-outlined text-secondary text-sm hover:text-primary transition-colors">mail</a>
                <a href="https://wa.me/6283106385222" class="material-symbols-outlined text-secondary text-sm hover:text-primary transition-colors">phone</a>
                <a href="#" class="material-symbols-outlined text-secondary text-sm hover:text-primary transition-colors">linkedin</a>
            </div>
        </div>
    </div>
    
    <!-- Team Member 2 -->
    <div class="team-card bg-white rounded-2xl overflow-hidden shadow-lg border border-outline-variant/20">
        <div class="h-96 bg-gradient-to-b from-surface-container-low to-white overflow-hidden flex items-center justify-center p-4">
            <img class="max-w-full max-h-full object-contain rounded-lg" 
                 alt="Boy - Operations" 
                 src="{{ asset('image/boy_2.jpeg') }}">
        </div>
        <div class="p-lg">
            <h3 class="font-headline-sm text-headline-sm text-primary-container mb-xs">Boy</h3>
            <p class="font-label-sm text-label-sm text-secondary mb-sm uppercase">Logistics Director</p>
            <p class="font-body-md text-on-surface-variant mb-md">Specializes in sustainable supply chain management and ensuring high-end campsite standards.</p>
            <div class="flex gap-sm">
                <a href="mailto:bukhari@rinjanitrail.id" class="material-symbols-outlined text-secondary text-sm hover:text-primary transition-colors">mail</a>
                <a href="https://wa.me/6283106385222" class="material-symbols-outlined text-secondary text-sm hover:text-primary transition-colors">phone</a>
                <a href="#" class="material-symbols-outlined text-secondary text-sm hover:text-primary transition-colors">linkedin</a>
            </div>
        </div>
    </div>
    
    <!-- Team Member 3 -->
    <div class="team-card bg-white rounded-2xl overflow-hidden shadow-lg border border-outline-variant/20">
        <div class="h-96 bg-gradient-to-b from-surface-container-low to-white overflow-hidden flex items-center justify-center p-4">
            <img class="max-w-full max-h-full object-contain rounded-lg" 
                 alt="Bukhari Hidayat - Environmental" 
                 src="{{ asset('image/boy_3.jpeg') }}">
        </div>
        <div class="p-lg">
            <h3 class="font-headline-sm text-headline-sm text-primary-container mb-xs">Bukhari Hidayat</h3>
            <p class="font-label-sm text-label-sm text-secondary mb-sm uppercase">Environmental Officer</p>
            <p class="font-body-md text-on-surface-variant mb-md">Leads our 'Zero Waste' initiatives and community education programs for trail preservation.</p>
            <div class="flex gap-sm">
                <a href="mailto:bukhari@rinjanitrail.id" class="material-symbols-outlined text-secondary text-sm hover:text-primary transition-colors">mail</a>
                <a href="https://wa.me/6283106385222" class="material-symbols-outlined text-secondary text-sm hover:text-primary transition-colors">phone</a>
                <a href="#" class="material-symbols-outlined text-secondary text-sm hover:text-primary transition-colors">linkedin</a>
            </div>
        </div>
    </div>
</div>          
            <div class="text-center mt-lg">
                <button class="bg-primary text-on-primary px-lg py-md rounded-lg font-headline-sm hover:scale-105 transition-all shadow-lg">
                    View Full Team
                </button>
            </div>
        </div>
    </section>
    
    <!-- Awards & Partners Section -->
    <section class="py-xl max-w-container-max mx-auto px-md">
        <div class="text-center mb-xl">
            <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Recognition</span>
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md">Awards & Partnerships</h2>
        </div>
        
        <div class="flex flex-wrap justify-center items-center gap-xl grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all">
            <div class="flex flex-col items-center">
                <span class="material-symbols-outlined text-primary-container text-5xl mb-sm">workspace_premium</span>
                <span class="font-label-md text-on-surface-variant text-center">National<br>Geographic</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="material-symbols-outlined text-primary-container text-5xl mb-sm">award</span>
                <span class="font-label-md text-on-surface-variant text-center">Indonesia<br>Tourism Awards</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="material-symbols-outlined text-primary-container text-5xl mb-sm">verified</span>
                <span class="font-label-md text-on-surface-variant text-center">TNGR<br>Certified</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="material-symbols-outlined text-primary-container text-5xl mb-sm">eco</span>
                <span class="font-label-md text-on-surface-variant text-center">Eco-Tourism<br>Indonesia</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="material-symbols-outlined text-primary-container text-5xl mb-sm">stars</span>
                <span class="font-label-md text-on-surface-variant text-center">Lonely Planet<br>Featured</span>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="relative bg-primary-container py-xl overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white via-transparent to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-container-max mx-auto px-md text-center">
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md">Siap Merencanakan Pendakian?</h2>
            <p class="font-body-lg text-body-lg text-surface/80 max-w-2xl mx-auto mb-lg">Mulai dari informasi rute, persiapan keselamatan, sampai kontak mitra lokal. Semua tersedia terpusat agar pendaki bisa mengambil keputusan dengan lebih baik.</p>
            <div class="flex flex-wrap gap-md justify-center">
                <a href="{{ route('routes') }}" class="bg-surface text-primary-container px-lg py-md rounded-lg font-headline-sm hover:scale-105 hover:shadow-2xl transition-all">Lihat Informasi Rute</a>
                <a href="{{ route('local_services') }}" class="border border-surface/30 text-surface px-lg py-md rounded-lg font-headline-sm hover:bg-surface hover:text-primary-container transition-all">Cari Kontak Mitra Lokal</a>
            </div>
        </div>
    </section>
    
</main>
@endsection

@push('scripts')
<script>
    // Counter Animation
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                element.textContent = target.toLocaleString();
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current).toLocaleString();
            }
        }, 16);
    }
    
    // Intersection Observer for counters
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    document.querySelectorAll('.counter').forEach(counter => {
        counterObserver.observe(counter);
    });
</script>
@endpush