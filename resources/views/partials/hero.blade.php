<!-- HERO SECTION (ORIGINAL DESKTOP LOOK + MOBILE TEXT FIRST & IMAGE BELOW) -->
<section class="pt-6 pb-12 md:pt-8 md:pb-16 px-6 relative overflow-hidden border-b border-slate-200 bg-no-repeat transition-all bg-[#F5F3EF] lg:bg-transparent">
    <div class="max-w-[1380px] mx-auto relative z-10">
        <!-- Text & Actions Content -->
        <div class="max-w-2xl relative z-10">
            <div class="inline-flex items-center gap-2 text-[11px] font-extrabold tracking-widest text-slate-600 uppercase mb-3">
                <span class="w-6 h-0.5 bg-slate-600 inline-block"></span>
                PREMIER MANAGED FOOD PACKAGING PLATFORM
            </div>

            <!-- EXACT 2-LINE HEADLINE -->
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black leading-[1.05] tracking-tight text-slate-900 mb-4">
                Your packaging.<br>
                Sorted. <span class="text-pw-gold">Forever.</span>
            </h1>

            <div class="mb-4">
                <p class="text-lg font-bold text-slate-900 mb-1">Design. Manufacture. Source. QC. Deliver.</p>
                <p class="text-base font-medium text-slate-700 leading-relaxed">One partner from first prototype to scaled production.</p>
            </div>

            <p class="text-xs sm:text-sm text-slate-600 mb-6 font-medium">
                Supplying food packaging for <b class="text-slate-900 font-bold">Cloud Kitchens, Restaurants, Bakeries & Beverage Brands</b> across India.
            </p>

            <!-- Action Buttons -->
            <div class="flex items-start flex-wrap gap-4 sm:gap-5 mb-6 w-full">
                <div class="flex flex-col gap-1.5 w-full sm:w-auto">
                    <button class="btn-gold" onclick="openInquiryModalDirect()">
                        Get Wholesale Quote <i class="fa-solid fa-arrow-right"></i>
                    </button>
                    <span class="text-[11px] text-slate-600 font-semibold">11 main categories · instant WhatsApp quote</span>
                </div>
                <div class="flex flex-col gap-1.5 w-full sm:w-auto">
                    <a href="/products" class="btn-outline-dark text-decoration-none">
                        DailyPack Enterprise <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <span class="text-[11px] text-slate-600 font-semibold">For high-volume & multi-SKU procurement</span>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-slate-300/80 text-xs text-slate-700 leading-snug font-medium">
                <i class="fa-regular fa-handshake text-xl text-slate-900 shrink-0"></i>
                <span>Backed by DailyPack Solution Pvt Ltd's manufacturing expertise and extended through our managed supplier network.</span>
            </div>
        </div>

        <!-- Mobile-only image container (Centering packaging items focus on mobile) -->
        <div class="mt-8 lg:hidden block w-full max-w-lg mx-auto rounded-2xl overflow-hidden shadow-xl border border-slate-200/80 bg-[#FAF6F2] relative">
            <img src="/images/herodaily.png" alt="DailyPack Food Packaging Solutions" class="w-full h-56 sm:h-72 object-cover object-[85%_center] block scale-105" onerror="this.onerror=null; this.src='/images/ctaimage.png'">
            <div class="absolute bottom-2.5 left-2.5 right-2.5 bg-slate-900/85 backdrop-blur-md text-white p-2.5 rounded-xl border border-slate-700/80 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-boxes-packing text-pw-gold text-sm"></i>
                    <div class="text-[11px] font-bold">500+ Food Packaging Products</div>
                </div>
                <span class="bg-pw-gold text-white text-[9px] font-black uppercase tracking-wider px-2 py-0.5 rounded">Live Catalog</span>
            </div>
        </div>
    </div>
</section>

<style>
    @media (min-width: 1024px) {
        section.bg-no-repeat {
            background-image: linear-gradient(90deg, #F5F3EF 0%, rgba(245, 243, 239, 0.92) 32%, rgba(250, 249, 245, 0.20) 65%, rgba(250, 249, 245, 0.05) 100%), url('/images/herodaily.png') !important;
            background-position: right 5% center !important;
            background-size: contain !important;
        }
    }
</style>
