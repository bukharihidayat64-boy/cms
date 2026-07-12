@extends('frontend.layouts.main')

@section('title', 'FAQ & Support | RinjaniTrail.id')

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
    .faq-item {
        transition: all 0.3s ease;
    }
    .faq-item:hover {
        transform: translateX(4px);
    }
    .faq-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease-out;
    }
    .faq-item.active .faq-content {
        max-height: 500px;
    }
    .faq-item.active .faq-icon {
        transform: rotate(180deg);
    }
    .faq-item.active {
        border-color: #3b6470;
        box-shadow: 0 4px 12px rgba(0, 63, 75, 0.08);
    }
    .tab-btn.active {
        background-color: #002229;
        color: #faf9f9;
    }
    .contact-card {
        transition: all 0.3s ease;
    }
    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 63, 75, 0.15);
    }
    .emergency-pulse {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    .search-highlight {
        background-color: #beeaf8;
        padding: 2px 4px;
        border-radius: 4px;
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
<section class="relative flex items-center justify-center overflow-hidden" style="min-height: 500px;">
    <div class="absolute inset-0">
        <img class="w-full h-full object-cover" 
             alt="Rinjani Support" 
             src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3WcJ9JsV6GnRdWncnvTzZZwlhvNTytOHJeXADFbCH5NUWedFetBDRbQDD4D31dAImYw-MtlWeRfkSby8Y-G1Jw9lHePU4kqPP8LO8S9E5zvTLFBGTkyQcH1_hS637gPcNIafQz2yTa9TtDeATA0vmcwLTgPcokK7EB0OD_mFlX0JNZV88hrFkUC9scCawmySCZw3EbYVqGCwobnG96qDhfR21ql_3RDjn42LCyFM0W-JSjH9KfHUAZVriBhbxk0pnFEMuER56GoOc">
        <div class="absolute inset-0 bg-gradient-to-b from-primary-container/80 via-primary-container/60 to-primary-container/40"></div>
    </div>
    
    <div class="relative z-10 text-center px-md max-w-4xl w-full pt-24 pb-40">
        <span class="inline-block bg-secondary-container text-on-secondary-container px-md py-base rounded-full font-label-md text-label-md uppercase tracking-widest mb-md">
            <span class="material-symbols-outlined align-middle mr-1">support_agent</span>
            Support Center
        </span>
        <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md drop-shadow-2xl">
            How Can We Help You?
        </h1>
        <p class="font-body-lg text-body-lg text-surface/90 max-w-2xl mx-auto mb-lg">
            Find answers to common questions about permits, safety, and route logistics, or get in touch with our expert mountain guides.
        </p>
        
        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                <input id="faqSearch" 
                       class="w-full pl-12 pr-4 py-4 bg-surface border border-outline-variant rounded-xl focus:ring-2 focus:ring-secondary focus:border-transparent outline-none transition-all shadow-lg text-on-surface" 
                       placeholder="Search for answers... (e.g., permits, safety, gear)" 
                       type="text">
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section class="relative z-20 -mt-20 mb-xl">
    <div class="max-w-container-max mx-auto px-md">
        <div class="glass-panel rounded-xl shadow-xl p-md grid grid-cols-2 md:grid-cols-4 gap-md">
            <div class="text-center">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">question_answer</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">FAQ Answered</p>
                <p class="font-bold text-primary-container text-lg">500+</p>
            </div>
            <div class="text-center border-x border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">support</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Support Hours</p>
                <p class="font-bold text-primary-container text-lg">24/7</p>
            </div>
            <div class="text-center border-r border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">verified</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Expert Guides</p>
                <p class="font-bold text-primary-container text-lg">120+</p>
            </div>
            <div class="text-center">
                <span class="material-symbols-outlined text-secondary text-3xl mb-xs">star</span>
                <p class="text-outline font-label-sm text-label-sm uppercase">Satisfaction</p>
                <p class="font-bold text-primary-container text-lg">4.9/5</p>
            </div>
        </div>
    </div>
</section>

    <!-- FAQ Section with Categories -->
    <section class="max-w-container-max mx-auto px-md py-xl" id="faq">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">
            
            <!-- Left Column: FAQ -->
            <div class="lg:col-span-8">
                <div class="flex items-center gap-xs text-secondary mb-xs">
                    <span class="material-symbols-outlined">help_center</span>
                    <span class="font-label-md text-label-md uppercase tracking-widest font-bold">Frequently Asked Questions</span>
                </div>
                <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-lg">Everything You Need to Know</h2>
                
                <!-- Category Tabs - Dynamic dari Database -->
                <div class="flex flex-wrap gap-sm mb-lg border-b border-outline-variant/30 pb-md">
                    <a href="{{ route('faq') }}"
                       class="tab-btn px-md py-base rounded-full font-label-md whitespace-nowrap transition-all {{ !request('category') ? 'bg-primary text-on-primary active' : 'bg-surface-container-high text-on-surface-variant hover:text-primary' }}">
                        All Questions
                    </a>
                    @foreach($categories as $key => $label)
                    <a href="{{ route('faq', ['category' => $key]) }}"
                       class="tab-btn px-md py-base rounded-full font-label-md whitespace-nowrap transition-all {{ request('category') == $key ? 'bg-primary text-on-primary active' : 'bg-surface-container-high text-on-surface-variant hover:text-primary' }}">
                        {{ $label }}
                    </a>
                    @endforeach
                </div>
                
                <!-- FAQ Items - Dynamic dari Database -->
                <div class="space-y-sm" id="faqContainer">
                    @forelse($faqs as $catKey => $categoryFaqs)
                        @foreach($categoryFaqs as $faq)
                        <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="{{ $faq->category }}">
                            <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                                <span class="flex items-center gap-sm">
                                    <span class="material-symbols-outlined text-secondary">help</span>
                                    <span class="font-headline-sm text-headline-sm text-primary-container">{{ $faq->question }}</span>
                                </span>
                                <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                            </button>
                            <div class="faq-content">
                                <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @empty
                    <div class="text-center py-xl">
                        <span class="material-symbols-outlined text-outline text-6xl mb-md block">help_center</span>
                        <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Belum Ada FAQ</h3>
                        <p class="text-on-surface-variant">FAQ akan ditampilkan setelah admin menambahkan konten.</p>
                    </div>
                    @endforelse
                </div>
                
                <!-- No Results Message -->
                <div id="noResults" class="hidden text-center py-xl">
                    <span class="material-symbols-outlined text-outline text-6xl mb-md">search_off</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">No matching questions found</h3>
                    <p class="text-on-surface-variant">Try a different search term or browse our categories above.</p>
                </div>
                <div class="flex flex-wrap gap-sm mb-lg border-b border-outline-variant/30 pb-md">
                    <button class="tab-btn active bg-primary text-on-primary px-md py-base rounded-full font-label-md whitespace-nowrap transition-all" data-category="all">
                        All Questions
                    </button>
                    <button class="tab-btn bg-surface-container-high text-on-surface-variant hover:text-primary px-md py-base rounded-full font-label-md whitespace-nowrap transition-all" data-category="booking">
                        Perizinan & Kontak Mitra
                    </button>
                    <button class="tab-btn bg-surface-container-high text-on-surface-variant hover:text-primary px-md py-base rounded-full font-label-md whitespace-nowrap transition-all" data-category="safety">
                        Safety & Health
                    </button>
                    <button class="tab-btn bg-surface-container-high text-on-surface-variant hover:text-primary px-md py-base rounded-full font-label-md whitespace-nowrap transition-all" data-category="gear">
                        Gear & Equipment
                    </button>
                    <button class="tab-btn bg-surface-container-high text-on-surface-variant hover:text-primary px-md py-base rounded-full font-label-md whitespace-nowrap transition-all" data-category="routes">
                        Routes & Difficulty
                    </button>
                </div>
                
                <!-- FAQ Items -->
                <div class="space-y-sm" id="faqContainer">
                    
                    <!-- FAQ 1: Permits -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="booking">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">description</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">Apakah izin pendakian perlu disiapkan sebelum berangkat?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm">Ya, izin pendakian resmi melalui e-Rinjani bersifat <strong>wajib</strong> dan kuotanya terbatas sesuai kebijakan pengelola. Sebaiknya pendaki menyiapkan informasi izin dan jadwal sejak jauh hari, terutama pada musim ramai.</p>
                                <p>RinjaniTrail.id menyediakan informasi rute dan direktori mitra lokal. Untuk bantuan teknis seperti guide, porter, atau pengurusan kebutuhan lapangan, silakan hubungi mitra lokal secara langsung melalui kontak yang tersedia.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 2: Routes -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="routes">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">map</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">Which route is best for beginners?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm">The <strong>Senaru route</strong> is often preferred for its lush forest canopy and more gradual ascent, though it is longer. The <strong>Sembalun route</strong> starts at a higher elevation in open grasslands, making the first day easier, but the summit push is more direct.</p>
                                <p>We recommend the <strong>3D/2N Senaru-Sembalun traverse</strong> for the most balanced experience, combining the best of both routes.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 3: Emergency -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="safety">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">health_and_safety</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">What happens in case of an emergency?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm">Every guide carries a <strong>satellite communication device</strong> and a <strong>first-aid kit</strong>. In the event of injury or severe altitude sickness, our team coordinates with the <strong>Rinjani Search and Rescue (SAR)</strong> and local helicopter evacuation services if necessary.</p>
                                <p>We maintain a strict <strong>"Safety First" protocol</strong> on all climbs, with regular check-ins and emergency evacuation plans in place.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 4: Food -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="gear">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">restaurant</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">What kind of food is provided during the trek?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm">We provide <strong>three fresh, hot meals daily</strong> prepared by our porters. Menus include local specialties like Nasi Goreng, Gado-Gado, and fresh fruit, alongside high-energy snacks and biscuits.</p>
                                <p>We can accommodate <strong>vegetarian, vegan, and gluten-free diets</strong> if notified during booking. Please inform us of any food allergies or special dietary requirements.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 5: Fitness -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="safety">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">fitness_center</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">How fit do I need to be for the trek?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm">For the <strong>Sembalun summit route</strong>, you need advanced fitness with regular cardio training for at least 2 months prior. For the <strong>Senaru crater rim route</strong>, moderate fitness is sufficient.</p>
                                <p>We recommend stair climbing, hiking with weighted backpack, and leg strengthening exercises. A <strong>medical certificate</strong> is mandatory for all trekkers.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 6: Weather -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="gear">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">cloud</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">What's the best time of year to trek?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm">The <strong>dry season (April-October)</strong> is ideal for trekking, with clear skies and minimal rainfall. <strong>July-August</strong> is peak season with the best weather but also the most crowded.</p>
                                <p>The <strong>rainy season (November-March)</strong> offers fewer crowds but challenging conditions with slippery trails and limited visibility. The park may close during extreme weather.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 7: Gear -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="gear">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">backpack</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">What gear do I need to bring?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm"><strong>Essential gear includes:</strong> Grade 4 hiking boots, thermal layers, waterproof jacket, headlamp with extra batteries, 3L hydration system, trekking poles, sun protection, and personal medications.</p>
                                <p>We provide camping equipment (tents, sleeping bags, mattresses) and can rent additional gear if needed. See our complete gear checklist on the route detail pages.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 8: Porter -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="booking">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">hiking</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">How many porters will accompany us?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm">We provide <strong>1 porter for every 2 hikers</strong> to carry camping equipment, food, and cooking supplies. Each porter can carry up to 20kg.</p>
                                <p>You'll only need to carry a <strong>daypack (5-8kg)</strong> with personal items, water, camera, and extra layers. All porters are local community members paid fair wages.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 9: Altitude -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="safety">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">altitude</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">How do I prevent altitude sickness?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm"><strong>Key prevention tips:</strong> Ascend gradually, stay hydrated (3-4L water daily), avoid alcohol, eat light meals, and get adequate rest. Our guides monitor everyone for symptoms.</p>
                                <p>If symptoms occur (headache, nausea, dizziness), we descend immediately. Diamox medication is available but consult your doctor first. Never ignore symptoms of AMS.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 10: Conservation -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="routes">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">eco</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">How do you support conservation efforts?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm">We operate on a <strong>"Leave No Trace" mandate</strong>. For every trekker, we commit funds to the Rinjani Reforestation Initiative and organize bi-weekly waste collection expeditions.</p>
                                <p>We enforce a <strong>zero single-use plastic policy</strong>, support 12 local villages with sustainable income projects, and use solar-powered basecamps with low-impact camping protocols.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 11: Payment / Direct Partner Contact -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="booking">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">handshake</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">Apakah pembayaran dilakukan melalui RinjaniTrail.id?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm"><strong>Tidak.</strong> RinjaniTrail.id tidak menerima pembayaran, deposit, checkout, atau transaksi apa pun di dalam website.</p>
                                <p>Website ini hanya menjadi pusat informasi dan penghubung antara pendaki dengan mitra lokal. Semua komunikasi lanjutan, kesepakatan harga, jadwal, dan pembayaran dilakukan langsung antara pendaki dan pihak mitra lokal yang dihubungi.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 12: Solo -->
                    <div class="faq-item bg-surface border border-outline-variant rounded-lg overflow-hidden" data-category="safety">
                        <button class="w-full flex justify-between items-center p-md text-left transition-colors hover:bg-surface-container-high" onclick="toggleFaq(this)">
                            <span class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">person</span>
                                <span class="font-headline-sm text-headline-sm text-primary-container">Can I trek solo without a guide?</span>
                            </span>
                            <span class="material-symbols-outlined faq-icon transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="faq-content">
                            <div class="p-md pt-0 text-on-surface-variant font-body-md border-t border-outline-variant/30">
                                <p class="mb-sm"><strong>No, solo trekking is prohibited</strong> by Rinjani National Park regulations. All trekkers must be accompanied by a certified TNGR guide and licensed porters for safety reasons.</p>
                                <p>This policy ensures your safety, supports local employment, and helps maintain trail conditions. Our guides are trained in wilderness first aid and mountain rescue.</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- No Results Message -->
                <div id="noResults" class="hidden text-center py-xl">
                    <span class="material-symbols-outlined text-outline text-6xl mb-md">search_off</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">No matching questions found</h3>
                    <p class="text-on-surface-variant">Try a different search term or browse our categories above.</p>
                </div>
            </div>
            
            <!-- Right Column: Contact Form (Sticky) -->
            <div class="lg:col-span-4">
                <div class="sticky top-24 space-y-md">
                    
                    <!-- Contact Form -->
                    <div class="bg-white rounded-xl shadow-lg border border-outline-variant/20 p-lg">
                        <h3 class="font-headline-sm text-headline-sm text-primary-container mb-md flex items-center gap-xs">
                            <span class="material-symbols-outlined text-secondary">mail</span>
                            Still Have Questions?
                        </h3>
                        <p class="text-on-surface-variant font-body-md mb-md">Send us a message and our team will get back to you within 24 hours.</p>
                        
                        <form id="contactForm" class="space-y-sm">
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-xs">Full Name</label>
                                <input class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" 
                                       placeholder="Your Name" 
                                       type="text" 
                                       required>
                            </div>
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-xs">Email Address</label>
                                <input class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" 
                                       placeholder="email@example.com" 
                                       type="email" 
                                       required>
                            </div>
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-xs">Subject</label>
                                <select class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all appearance-none">
                                    <option>Booking Inquiry</option>
                                    <option>Route Consultation</option>
                                    <option>Custom Trekking Package</option>
                                    <option>Feedback & Reviews</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface-variant mb-xs">Message</label>
                                <textarea class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" 
                                          placeholder="How can we help?" 
                                          rows="4" 
                                          required></textarea>
                            </div>
                            <button class="w-full bg-primary text-on-primary font-headline-sm text-headline-sm py-3 rounded-lg hover:bg-primary-container transition-colors shadow-md active:scale-[0.98]" 
                                    type="submit">
                                Send Message
                            </button>
                        </form>
                    </div>
                    
                    <!-- Emergency Contact -->
                    <div class="bg-error-container p-md rounded-xl border border-error/20">
                        <div class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-error text-3xl emergency-pulse">emergency</span>
                            <div class="flex-1">
                                <h4 class="font-headline-sm text-headline-sm text-on-error-container mb-xs">24/7 Emergency Hotline</h4>
                                <p class="text-on-error-container/80 font-body-md text-sm mb-sm">For immediate rescue assistance while on the mountain.</p>
                                <a class="text-error font-bold font-label-md hover:underline block" href="tel:+628123456789">
                                    <span class="material-symbols-outlined text-sm align-middle">phone</span>
                                    +62 812 3456 789
                                </a>
                                <span class="text-on-error-container font-label-sm text-label-sm mt-xs block">Satellite ID: RJ-9942</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Links -->
                    <div class="bg-surface-container-low rounded-xl p-md border border-outline-variant/20">
                        <h4 class="font-headline-sm text-headline-sm text-primary-container mb-md flex items-center gap-xs">
                            <span class="material-symbols-outlined text-secondary">link</span>
                            Quick Links
                        </h4>
                        <ul class="space-y-sm">
                            <li>
                                <a href="{{ route('routes') }}" class="flex items-center gap-sm text-on-surface-variant hover:text-primary transition-colors group">
                                    <span class="material-symbols-outlined text-sm">route</span>
                                    <span class="font-body-md group-hover:translate-x-1 transition-transform">View All Routes</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('local_services') }}" class="flex items-center gap-sm text-on-surface-variant hover:text-primary transition-colors group">
                                    <span class="material-symbols-outlined text-sm">groups</span>
                                    <span class="font-body-md group-hover:translate-x-1 transition-transform">Find Local Guides</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('articles') }}" class="flex items-center gap-sm text-on-surface-variant hover:text-primary transition-colors group">
                                    <span class="material-symbols-outlined text-sm">article</span>
                                    <span class="font-body-md group-hover:translate-x-1 transition-transform">Read Safety Articles</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-sm text-on-surface-variant hover:text-primary transition-colors group">
                                    <span class="material-symbols-outlined text-sm">download</span>
                                    <span class="font-body-md group-hover:translate-x-1 transition-transform">Download Gear Checklist</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Info Cards -->
    <section class="py-xl bg-surface-container-low border-t border-outline-variant/30">
        <div class="max-w-container-max mx-auto px-md">
            <div class="text-center mb-xl">
                <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Get In Touch</span>
                <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md">Contact Information</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Reach out to us through any of these channels. Our team is ready to assist you.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                <!-- Office Card -->
                <div class="contact-card bg-white p-lg rounded-2xl border border-outline-variant/20 text-center">
                    <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mx-auto mb-md">
                        <span class="material-symbols-outlined text-on-secondary-container text-3xl">location_on</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Basecamp Office</h3>
                    <p class="text-on-surface-variant font-body-md mb-md">Jalan Pariwisata Senaru, Bayan, North Lombok, West Nusa Tenggara 83354, Indonesia</p>
                    <a href="#" class="text-secondary font-label-md hover:underline inline-flex items-center gap-xs">
                        <span class="material-symbols-outlined text-sm">map</span>
                        Get Directions
                    </a>
                </div>
                
                <!-- Email Card -->
                <div class="contact-card bg-white p-lg rounded-2xl border border-outline-variant/20 text-center">
                <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mx-auto mb-md">
                    <span class="material-symbols-outlined text-on-secondary-container text-3xl">mail</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">Email Support</h3>
                <p class="text-on-surface-variant font-body-md mb-xs">General Inquiries:</p>
                <a href="mailto:hello@RinjaniTrail.com" class="text-secondary font-label-md hover:underline block mb-sm">hello@RinjaniTrail.com</a>
                <p class="text-on-surface-variant font-body-md mb-xs">Group Bookings:</p>
                <a href="mailto:groups@RinjaniTrail.com" class="text-secondary font-label-md hover:underline block">groups@RinjaniTrail.com</a>
           </div>
                
                <!-- Phone Card -->
<div class="contact-card bg-white p-lg rounded-2xl border border-outline-variant/20 text-center">
    <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mx-auto mb-md">
        <span class="material-symbols-outlined text-on-secondary-container text-3xl">call</span>
    </div>
    <h3 class="font-headline-sm text-headline-sm text-primary-container mb-sm">WhatsApp / Phone</h3>
    <a href="tel:+6283106385222" class="text-secondary font-headline-sm hover:underline block mb-sm">+62 831 0638 5222</a>
    <p class="text-on-surface-variant font-body-md mb-md">Mon-Sun, 6 AM - 9 PM WITA</p>
    <a href="https://wa.me/6283106385222" target="_blank" class="text-secondary font-label-md hover:underline inline-flex items-center gap-xs">
        <span class="material-symbols-outlined text-sm">chat</span>
        Chat on WhatsApp
    </a>
</div>
            </div>
        </div>
    </section>
    
    <!-- Map Section -->
    <section class="py-xl max-w-container-max mx-auto px-md">
        <div class="text-center mb-xl">
            <span class="text-secondary font-label-sm tracking-widest uppercase mb-xs block">Find Us</span>
            <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary-container mb-md">Our Location</h2>
        </div>
        
        <div class="rounded-3xl overflow-hidden shadow-xl border-4 border-white h-[500px] relative group">
            <div class="absolute inset-0 bg-black/5 group-hover:bg-transparent transition-colors z-10 pointer-events-none"></div>
            <img class="w-full h-full object-cover grayscale-[20%] group-hover:grayscale-0 transition-all duration-700" 
                 alt="Map Lombok" 
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuAhyW_7pO8wjpqETibECX7s1bnCZqkjW0sLDlxK2UdABIcX6lCFEfUEICCSvca0euDDOyurCde1rYXsMHeEDKeGrEeidog_m62s7Me3XNpgPQ7-ojMdlJWVA7XMzKKeoZyNkbjQ2_iZTv7YTQ3sQKNBVaSxZoFJJ35WT4K9JZBNrzZ7TlWfp5jiT3FXML00Z7mrsYMIk1SFCVUeZpEZA4EEtNGAXiywqiBzor_iDQNXsmzphAW9edmN2raUIYKGiGoW3xCywGdzh1V9">
            <div class="absolute bottom-md left-md z-20 bg-white/90 backdrop-blur px-md py-4 rounded-xl shadow-lg border border-primary/10">
                <div class="flex items-center gap-sm">
                    <div class="w-3 h-3 bg-tertiary rounded-full emergency-pulse"></div>
                    <span class="font-headline-sm text-headline-sm text-primary-container">Main Staging Point: Senaru</span>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Newsletter Section -->
    <section class="bg-primary-container py-xl">
        <div class="max-w-container-max mx-auto px-md">
            <div class="rounded-3xl p-xl bg-surface/10 backdrop-blur-md border border-white/20 relative overflow-hidden">
                <!-- Floating Shapes -->
                <div class="floating-shape w-64 h-64 -top-32 -right-32"></div>
                <div class="floating-shape w-96 h-96 -bottom-48 -left-48" style="animation-delay: 5s;"></div>
                
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-xl items-center">
                    <div>
                        <span class="text-secondary-fixed font-label-sm tracking-widest uppercase mb-xs block">Stay Updated</span>
                        <h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-surface mb-md">Join Our Expedition Circle</h2>
                        <p class="font-body-lg text-body-lg text-surface/80 mb-md">Get exclusive trekking guides, local insights, weather alerts, and early access to expedition slots delivered to your inbox.</p>
                        <div class="flex flex-wrap gap-md text-surface/80">
                            <span class="flex items-center gap-xs font-label-md">
                                <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                                Weekly Updates
                            </span>
                            <span class="flex items-center gap-xs font-label-md">
                                <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                                Exclusive Tips
                            </span>
                            <span class="flex items-center gap-xs font-label-md">
                                <span class="material-symbols-outlined text-secondary-fixed">check_circle</span>
                                No Spam
                            </span>
                        </div>
                    </div>
                    
                    <div>
                        <form class="space-y-sm">
                            <input class="w-full bg-white/10 border border-white/20 rounded-lg px-md py-4 focus:ring-2 focus:ring-secondary-fixed focus:border-transparent outline-none transition-all text-surface placeholder:text-surface/50" 
                                   placeholder="Enter your email address" 
                                   type="email" 
                                   required>
                            <button class="w-full bg-surface text-primary-container py-4 rounded-lg font-headline-sm text-headline-sm hover:scale-105 transition-all shadow-lg flex items-center justify-center gap-xs">
                                <span class="material-symbols-outlined">send</span>
                                Subscribe Now
                            </button>
                            <p class="font-label-sm text-label-sm text-surface/60 text-center">We respect your privacy. Unsubscribe at any time.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</main>
@endsection

@push('scripts')
<script>
    // Toggle FAQ Accordion
    function toggleFaq(button) {
        const faqItem = button.closest('.faq-item');
        const isActive = faqItem.classList.contains('active');
        
        // Close all other items
        document.querySelectorAll('.faq-item').forEach(item => {
            item.classList.remove('active');
        });
        
        // Toggle current item
        if (!isActive) {
            faqItem.classList.add('active');
        }
    }
    
    // Category Filter
    const tabBtns = document.querySelectorAll('.tab-btn');
    const faqItems = document.querySelectorAll('#faqContainer .faq-item');
    const noResults = document.getElementById('noResults');
    
    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active tab
            tabBtns.forEach(b => {
                b.classList.remove('active', 'bg-primary', 'text-on-primary');
                b.classList.add('bg-surface-container-high', 'text-on-surface-variant');
            });
            btn.classList.add('active', 'bg-primary', 'text-on-primary');
            btn.classList.remove('bg-surface-container-high', 'text-on-surface-variant');
            
            // Filter FAQ items
            const category = btn.dataset.category;
            let visibleCount = 0;
            
            faqItems.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });
    });
    
    // Search Functionality
    const searchInput = document.getElementById('faqSearch');
    
    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        let visibleCount = 0;
        
        faqItems.forEach(item => {
            const question = item.querySelector('.font-headline-sm').textContent.toLowerCase();
            const answer = item.querySelector('.faq-content').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        // Show/hide no results message
        if (visibleCount === 0 && searchTerm !== '') {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    });
    
    // Contact Form Submission
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const btn = e.target.querySelector('button');
        const originalText = btn.innerHTML;
        
        btn.innerHTML = '<span class="material-symbols-outlined animate-spin inline-block align-middle">sync</span> Sending...';
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = '<span class="material-symbols-outlined inline-block align-middle">check_circle</span> Message Sent!';
            btn.classList.replace('bg-primary', 'bg-secondary');
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.classList.replace('bg-secondary', 'bg-primary');
                btn.disabled = false;
                e.target.reset();
            }, 3000);
        }, 1500);
    });
    
    // Open first FAQ by default
    document.addEventListener('DOMContentLoaded', () => {
        const firstFaq = document.querySelector('.faq-item');
        if (firstFaq) {
            firstFaq.classList.add('active');
        }
    });
</script>
@endpush