@extends('layouts.app')

@section('title', 'About Us | DailyPack Solution Pvt Ltd - Managed Food Packaging Platform')
@section('meta_description', 'Learn about DailyPack Solution Pvt Ltd - India\'s premier managed food packaging platform with 15+ years of manufacturing heritage, serving cloud kitchens, restaurants and bakeries nationwide.')

@section('content')
<!-- Page Header / Hero Section -->
<div class="relative bg-slate-900 text-white py-14 sm:py-20 px-4 sm:px-6 overflow-hidden">
    <!-- Subtle Gradient Background Accents -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-pw-gold/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-[1380px] mx-auto relative z-10 text-center">
        <div class="inline-flex items-center justify-center gap-2 text-[11px] font-extrabold tracking-widest text-pw-gold uppercase mb-3 block">
            <span class="w-6 h-0.5 bg-pw-gold inline-block align-middle"></span>
            ABOUT DAILYPACK SOLUTION PVT LTD
            <span class="w-6 h-0.5 bg-pw-gold inline-block align-middle"></span>
        </div>

        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight max-w-4xl mx-auto leading-tight mb-5">
            Empowering India's Food Brands With <span class="text-pw-gold">Managed Packaging</span> Solutions
        </h1>

        <p class="text-slate-300 text-sm sm:text-base md:text-lg max-w-3xl mx-auto leading-relaxed font-medium">
            We bridge the gap between world-class packaging manufacturing and fast-paced F&B operations — delivering certified food-grade packaging, transparent factory pricing, and zero supply disruptions.
        </p>
    </div>
</div>

<!-- Floating Key Highlights Bar (Fully Mobile Responsive) -->
<div class="max-w-[1380px] mx-auto px-4 sm:px-6 -mt-8 relative z-20">
    <div class="bg-white rounded-2xl shadow-xl border border-slate-200/80 p-4 sm:p-6 lg:p-7 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-0 items-center">
        <!-- Stat 1 -->
        <div class="flex items-center gap-3.5 pb-3.5 sm:pb-4 lg:pb-0 border-b sm:border-r sm:pr-5 lg:pr-4 border-slate-100">
            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-orange-500/10 text-pw-gold flex items-center justify-center text-lg sm:text-xl shrink-0">
                <i class="fa-solid fa-industry"></i>
            </div>
            <div class="min-w-0">
                <div class="text-xl sm:text-2xl font-black text-slate-900 leading-none">15+ Years</div>
                <div class="text-xs text-slate-500 font-semibold mt-1">Manufacturing Heritage</div>
            </div>
        </div>

        <!-- Stat 2 -->
        <div class="flex items-center gap-3.5 py-3.5 sm:py-0 sm:pb-4 lg:pb-0 border-b sm:pl-5 lg:px-4 lg:border-r border-slate-100">
            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center text-lg sm:text-xl shrink-0">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
            <div class="min-w-0">
                <div class="text-xl sm:text-2xl font-black text-slate-900 leading-none">500+ SKUs</div>
                <div class="text-xs text-slate-500 font-semibold mt-1">Food-Grade Packaging</div>
            </div>
        </div>

        <!-- Stat 3 -->
        <div class="flex items-center gap-3.5 py-3.5 sm:py-0 sm:pt-4 lg:pt-0 border-b sm:border-b-0 sm:border-r sm:pr-5 lg:px-4 border-slate-100">
            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center text-lg sm:text-xl shrink-0">
                <i class="fa-solid fa-store"></i>
            </div>
            <div class="min-w-0">
                <div class="text-xl sm:text-2xl font-black text-slate-900 leading-none">1,200+</div>
                <div class="text-xs text-slate-500 font-semibold mt-1">Food Brands Served</div>
            </div>
        </div>

        <!-- Stat 4 -->
        <div class="flex items-center gap-3.5 pt-3.5 sm:pt-4 lg:pt-0 sm:pl-5 lg:pl-4">
            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center text-lg sm:text-xl shrink-0">
                <i class="fa-solid fa-truck-fast"></i>
            </div>
            <div class="min-w-0">
                <div class="text-xl sm:text-2xl font-black text-slate-900 leading-none">Pan-India</div>
                <div class="text-xs text-slate-500 font-semibold mt-1">Prompt Doorstep Delivery</div>
            </div>
        </div>
    </div>
</div>

<!-- Our Story & Capabilities Section -->
<section class="max-w-[1380px] mx-auto px-4 sm:px-6 py-16 sm:py-20">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
        <!-- Narrative Text Column -->
        <div class="lg:col-span-7 space-y-6">
            <div class="inline-flex items-center gap-2 text-[11px] font-extrabold tracking-widest text-slate-500 uppercase">
                <span class="w-6 h-0.5 bg-pw-gold inline-block"></span>
                OUR STORY & MISSION
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-black text-slate-900 leading-tight tracking-tight">
                Built to solve the chaos of <span class="text-pw-gold">packaging procurement</span> in India.
            </h2>

            <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-medium">
                For years, restaurants, cloud kitchens, and emerging food brands had to juggle multiple disconnected vendors: one for plastic containers, another for paper boxes, a third for drinkware, and a separate agency for logo printing. The result? Fluctuating material thickness, leaking lids, delivery delays during peak festival rushes, and unpredictable pricing.
            </p>

            <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-medium">
                <b class="text-slate-900 font-bold">DailyPack Solution Pvt Ltd</b> was established to bring order, accountability, and technology-driven efficiency to food packaging. Combining over <b class="text-slate-900">15 years of manufacturing heritage</b> with an extensive managed supplier network of 50+ vetted partner units across India, we give you a single accountable partner for all your packaging requirements.
            </p>

            <!-- Key Feature Badges Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 pt-2">
                <div class="flex items-start gap-3 p-3.5 rounded-xl bg-slate-100/80 border border-slate-200">
                    <i class="fa-solid fa-circle-check text-pw-gold text-lg shrink-0 mt-0.5"></i>
                    <div>
                        <div class="text-xs font-bold text-slate-900">100% Virgin Food-Grade</div>
                        <div class="text-[11px] text-slate-500 font-medium">BPA-free, microwave & freezer tested</div>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-3.5 rounded-xl bg-slate-100/80 border border-slate-200">
                    <i class="fa-solid fa-circle-check text-pw-gold text-lg shrink-0 mt-0.5"></i>
                    <div>
                        <div class="text-xs font-bold text-slate-900">Custom Logo Printing</div>
                        <div class="text-[11px] text-slate-500 font-medium">Free artwork assistance & sample proofing</div>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-3.5 rounded-xl bg-slate-100/80 border border-slate-200">
                    <i class="fa-solid fa-circle-check text-pw-gold text-lg shrink-0 mt-0.5"></i>
                    <div>
                        <div class="text-xs font-bold text-slate-900">Reliable Backup Sourcing</div>
                        <div class="text-[11px] text-slate-500 font-medium">No stockouts even during peak season</div>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-3.5 rounded-xl bg-slate-100/80 border border-slate-200">
                    <i class="fa-solid fa-circle-check text-pw-gold text-lg shrink-0 mt-0.5"></i>
                    <div>
                        <div class="text-xs font-bold text-slate-900">Direct Factory Pricing</div>
                        <div class="text-[11px] text-slate-500 font-medium">Transparent tiered rates from 500+ pcs</div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center flex-wrap gap-4 pt-3">
                <button class="btn-gold" onclick="openInquiryModalDirect()">
                    Get Samples On WhatsApp <i class="fa-brands fa-whatsapp text-lg"></i>
                </button>
                <a href="/products" class="btn-outline-dark text-decoration-none">
                    Explore Product Catalog <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Visual Showcase Column -->
        <div class="lg:col-span-5">
            <div class="relative">
                <!-- Main Image Card -->
                <div class="rounded-3xl overflow-hidden shadow-2xl border border-slate-200 bg-slate-900 relative group">
                    <img src="/images/packaging-manufacturing.jpg" alt="DailyPack Food Packaging Manufacturing Process Line" class="w-full h-80 sm:h-96 md:h-[430px] object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1200&q=80'">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-950/35 to-transparent"></div>

                    <!-- Overlay Details Box -->
                    <div class="absolute bottom-5 left-5 right-5 text-white">
                        <span class="inline-block bg-pw-gold text-white text-[10px] font-extrabold uppercase tracking-wider px-2.5 py-1 rounded-md mb-2 shadow-sm">
                            <i class="fa-solid fa-gears mr-1"></i> Live Manufacturing Line
                        </span>
                        <div class="text-base sm:text-lg font-black text-white">Automated Thermoforming & Container Molding</div>
                        <p class="text-xs text-slate-300 font-medium mt-1">High-speed automated production line manufacturing certified food-grade containers, meal trays, and bowls in a dust-free cleanroom environment.</p>
                    </div>
                </div>

                <!-- Floating Badge 1 (Top Right) -->
                <div class="hidden sm:flex absolute -top-5 -right-5 bg-white p-3.5 rounded-2xl shadow-xl border border-slate-200 items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/15 text-emerald-600 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div>
                        <div class="text-xs font-black text-slate-900">3-Stage QC Checked</div>
                        <div class="text-[10px] text-slate-500 font-medium">Leak & heat tested</div>
                    </div>
                </div>

                <!-- Floating Badge 2 (Bottom Left) -->
                <div class="hidden sm:flex absolute -bottom-5 -left-5 bg-slate-900 text-white p-3.5 rounded-2xl shadow-xl border border-slate-800 items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-orange-500/20 text-pw-gold flex items-center justify-center text-lg">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <div>
                        <div class="text-xs font-black text-white">100% Quality Assurance</div>
                        <div class="text-[10px] text-slate-400 font-medium">Zero-defect dispatch guarantee</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission, Vision & Values Section -->
<section class="bg-white py-16 sm:py-20 border-y border-slate-200">
    <div class="max-w-[1380px] mx-auto px-4 sm:px-6">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <div class="inline-flex items-center gap-2 text-[11px] font-extrabold tracking-widest text-slate-500 uppercase mb-3">
                <span class="w-6 h-0.5 bg-pw-gold inline-block"></span>
                GUIDING PRINCIPLES
            </div>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                Our Mission, Vision & Guiding Values
            </h2>
            <p class="text-slate-600 text-sm sm:text-base font-medium mt-3">
                Every carton leaving our facility is driven by a deep commitment to hygiene, brand aesthetics, and seamless commercial execution.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
            <!-- Card 1: Mission -->
            <div class="bg-slate-50 rounded-2xl p-7 sm:p-8 border border-slate-200 hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-orange-500/10 text-pw-gold flex items-center justify-center text-2xl mb-6 group-hover:bg-pw-gold group-hover:text-white transition-colors">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Our Mission</h3>
                    <p class="text-sm text-slate-600 leading-relaxed font-medium">
                        To simplify and democratize packaging procurement for food businesses of all sizes — from single-location cloud kitchens to national F&B franchises — providing reliable quality, transparent pricing, and zero supply interruptions.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-200/80 text-xs font-bold text-pw-gold flex items-center gap-2">
                    <span>Reliable Supply On Demand</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </div>
            </div>

            <!-- Card 2: Vision -->
            <div class="bg-slate-50 rounded-2xl p-7 sm:p-8 border border-slate-200 hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-blue-500/10 text-blue-600 flex items-center justify-center text-2xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-earth-americas"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Our Vision</h3>
                    <p class="text-sm text-slate-600 leading-relaxed font-medium">
                        To become India's most trusted and sustainable managed packaging platform, pioneering eco-conscious materials, biodegradable sugarcane bagasse, and circular economy packaging standards across the hospitality industry.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-200/80 text-xs font-bold text-blue-600 flex items-center gap-2">
                    <span>Sustainable Future Ahead</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </div>
            </div>

            <!-- Card 3: Core Values -->
            <div class="bg-slate-50 rounded-2xl p-7 sm:p-8 border border-slate-200 hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center text-2xl mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-shield-heart"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Core Values</h3>
                    <p class="text-sm text-slate-600 leading-relaxed font-medium">
                        Zero tolerance for defective containers, absolute honesty in commercial pricing, speed of response, and treating every client's delivery deadline as our personal brand reputation.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-200/80 text-xs font-bold text-emerald-600 flex items-center gap-2">
                    <span>Trust, Quality & Integrity</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How DailyPack Works (4-Step Process) -->
<section class="max-w-[1380px] mx-auto px-4 sm:px-6 py-16 sm:py-20">
    <div class="text-center max-w-3xl mx-auto mb-14">
        <div class="inline-flex items-center gap-2 text-[11px] font-extrabold tracking-widest text-slate-500 uppercase mb-3">
            <span class="w-6 h-0.5 bg-pw-gold inline-block"></span>
            THE DAILYPACK PROCESS
        </div>
        <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
            How We Manage Your Packaging from Prototype to Delivery
        </h2>
        <p class="text-slate-600 text-sm sm:text-base font-medium mt-3">
            A seamless 4-step workflow that ensures your kitchen never runs out of boxes or containers.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Step 1 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-pw-gold transition-colors relative">
            <div class="w-10 h-10 rounded-xl bg-orange-500/10 text-pw-gold font-black text-base flex items-center justify-center mb-4">
                01
            </div>
            <h4 class="text-base font-extrabold text-slate-900 mb-2">Requirement & Samples</h4>
            <p class="text-xs text-slate-500 leading-relaxed font-medium">
                Browse our 500+ SKU catalog or send custom dimensions. We dispatch physical sample kits to your kitchen within 24 to 48 hours for food fitment testing.
            </p>
        </div>

        <!-- Step 2 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-pw-gold transition-colors relative">
            <div class="w-10 h-10 rounded-xl bg-orange-500/10 text-pw-gold font-black text-base flex items-center justify-center mb-4">
                02
            </div>
            <h4 class="text-base font-extrabold text-slate-900 mb-2">Branding & Proofing</h4>
            <p class="text-xs text-slate-500 leading-relaxed font-medium">
                Our in-house design team optimizes your logo, handles color calibrations, and generates 3D digital proofings prior to bulk print runs.
            </p>
        </div>

        <!-- Step 3 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-pw-gold transition-colors relative">
            <div class="w-10 h-10 rounded-xl bg-orange-500/10 text-pw-gold font-black text-base flex items-center justify-center mb-4">
                03
            </div>
            <h4 class="text-base font-extrabold text-slate-900 mb-2">3-Stage Quality Check</h4>
            <p class="text-xs text-slate-500 leading-relaxed font-medium">
                Every batch undergoes raw material purity checks, in-line leak tests, and pre-dispatch carton drop tests to prevent damages during transport.
            </p>
        </div>

        <!-- Step 4 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-pw-gold transition-colors relative">
            <div class="w-10 h-10 rounded-xl bg-orange-500/10 text-pw-gold font-black text-base flex items-center justify-center mb-4">
                04
            </div>
            <h4 class="text-base font-extrabold text-slate-900 mb-2">Scheduled Delivery</h4>
            <p class="text-xs text-slate-500 leading-relaxed font-medium">
                Express shipping across India with live consignment tracking, emergency backup inventory hubs, and dedicated WhatsApp account support.
            </p>
        </div>
    </div>
</section>

<!-- Industries We Serve Section -->
<section class="bg-slate-900 text-white py-16 sm:py-20">
    <div class="max-w-[1380px] mx-auto px-4 sm:px-6">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <div class="inline-flex items-center gap-2 text-[11px] font-extrabold tracking-widest text-pw-gold uppercase mb-3">
                <span class="w-6 h-0.5 bg-pw-gold inline-block"></span>
                SECTOR EXPERTISE
            </div>
            <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight">
                Tailored Packaging For Every Food Sector
            </h2>
            <p class="text-slate-400 text-sm sm:text-base font-medium mt-3">
                Whatever your cuisine or delivery format, DailyPack delivers precision-fit packaging designed to retain food temperature, aroma, and presentation.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Industry 1 -->
            <div class="bg-slate-950/80 p-6 rounded-2xl border border-slate-800 hover:border-pw-gold/60 transition-all">
                <div class="w-12 h-12 rounded-xl bg-orange-500/10 text-pw-gold flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-cloud"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Cloud Kitchens & QSRs</h3>
                <p class="text-xs text-slate-400 leading-relaxed font-medium">
                    Spill-proof round containers (250ml to 1000ml), tamper-evident meal boxes, and biryani handis built for high-speed Zomato/Swiggy dispatches.
                </p>
            </div>

            <!-- Industry 2 -->
            <div class="bg-slate-950/80 p-6 rounded-2xl border border-slate-800 hover:border-pw-gold/60 transition-all">
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-cake-candles"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Bakeries & Confectioneries</h3>
                <p class="text-xs text-slate-400 leading-relaxed font-medium">
                    Window cake boxes, greaseproof pastry containers, macaron boxes, and custom embossed metallic paper boards for sweet shops.
                </p>
            </div>

            <!-- Industry 3 -->
            <div class="bg-slate-950/80 p-6 rounded-2xl border border-slate-800 hover:border-pw-gold/60 transition-all">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Eco-Conscious Dining</h3>
                <p class="text-xs text-slate-400 leading-relaxed font-medium">
                    100% biodegradable sugarcane bagasse tableware, multi-compartment thali trays, and compostable birchwood cutlery sets.
                </p>
            </div>

            <!-- Industry 4 -->
            <div class="bg-slate-950/80 p-6 rounded-2xl border border-slate-800 hover:border-pw-gold/60 transition-all">
                <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-bottle-water"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Beverage & Dairy Brands</h3>
                <p class="text-xs text-slate-400 leading-relaxed font-medium">
                    Crystal clear PET bottles (200ml to 1000ml), cold brew glass bottles, ripple-insulated coffee cups, and leak-proof bobal lids.
                </p>
            </div>

            <!-- Industry 5 -->
            <div class="bg-slate-950/80 p-6 rounded-2xl border border-slate-800 hover:border-pw-gold/60 transition-all">
                <div class="w-12 h-12 rounded-xl bg-purple-500/10 text-purple-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-pizza-slice"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Pizzerias & Burger Joints</h3>
                <p class="text-xs text-slate-400 leading-relaxed font-medium">
                    E-flute and B-flute micro-corrugated steam-vented pizza boxes, burger clamshells, and oil-proof greaseproof burger wrapping paper.
                </p>
            </div>

            <!-- Industry 6 -->
            <div class="bg-slate-950/80 p-6 rounded-2xl border border-slate-800 hover:border-pw-gold/60 transition-all">
                <div class="w-12 h-12 rounded-xl bg-rose-500/10 text-rose-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-utensils"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Institutional & Catering</h3>
                <p class="text-xs text-slate-400 leading-relaxed font-medium">
                    Bulk meal packing trays, 5-compartment CPET microwaveable trays, aluminum food containers, and heavy-duty delivery carry bags.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- WORK WITH US / READY TO FIX YOUR PACKAGING CTA SECTION -->
<section class="max-w-[1380px] mx-auto px-4 sm:px-6 py-10 my-8">
    <div class="relative bg-[#08101E] rounded-3xl overflow-hidden shadow-2xl border border-slate-800 py-16 sm:py-24 px-6 sm:px-12 text-center">
        <!-- Background Concentric Rings & Radial Gradient for Depth -->
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none overflow-hidden">
            <div class="w-[340px] h-[340px] sm:w-[500px] sm:h-[500px] rounded-full border border-slate-800/80 opacity-70"></div>
            <div class="absolute w-[560px] h-[560px] sm:w-[780px] sm:h-[780px] rounded-full border border-slate-800/50 opacity-50"></div>
            <div class="absolute w-[780px] h-[780px] sm:w-[1080px] sm:h-[1080px] rounded-full border border-slate-800/30 opacity-30"></div>
            <div class="absolute inset-0 bg-radial from-slate-900/30 via-transparent to-[#08101E]/90"></div>
            <!-- Subtle Orange Light Beam Accent -->
            <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl pointer-events-none"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto flex flex-col items-center">
            <!-- Top Tagline -->
            <div class="inline-flex items-center justify-center gap-3 text-xs sm:text-sm font-extrabold tracking-[0.25em] text-slate-400 uppercase mb-4 sm:mb-5">
                <span class="w-7 h-[1.5px] bg-slate-500 inline-block"></span>
                WORK WITH US
            </div>

            <!-- Headline -->
            <h2 class="text-3xl sm:text-5xl md:text-6xl font-black text-white tracking-tight leading-[1.1] mb-5">
                Ready to fix <span class="text-pw-gold">your packaging?</span>
            </h2>

            <!-- Subtitle Description -->
            <p class="text-slate-300 text-sm sm:text-base md:text-lg font-normal max-w-2xl mx-auto leading-relaxed mb-8 sm:mb-10 text-slate-300/90">
                Talk to our team. Get a detailed quote with delivery and payment schedules in 4 business hours during India working hours.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-5 w-full sm:w-auto">
                <button onclick="openInquiryModalDirect()" class="w-full sm:w-auto bg-pw-gold hover:bg-pw-goldHover text-white font-extrabold px-8 py-3.5 sm:py-4 rounded-xl text-sm sm:text-base inline-flex items-center justify-center gap-2.5 transition-all duration-200 shadow-xl shadow-orange-500/25 hover:scale-105 cursor-pointer border-none">
                    Get a quote <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>

                <a href="https://wa.me/917303911622" target="_blank" class="w-full sm:w-auto bg-[#101C33] hover:bg-[#162544] text-white font-bold px-8 py-3.5 sm:py-4 rounded-xl border border-slate-700/80 hover:border-slate-500 text-sm sm:text-base inline-flex items-center justify-center gap-2.5 transition-all duration-200 text-decoration-none shadow-md cursor-pointer">
                    <i class="fa-brands fa-whatsapp text-emerald-400 text-base"></i> WhatsApp us
                </a>
            </div>

            <!-- Bottom Subtext -->
            <div class="mt-8 sm:mt-10 text-xs sm:text-sm text-slate-400/80 font-medium tracking-wide">
                MOQs from 25 units on selected formats · enterprise volumes supported
            </div>
        </div>
    </div>
</section>
@endsection
