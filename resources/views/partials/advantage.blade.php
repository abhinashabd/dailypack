<!-- THE DAILYPACK ADVANTAGE SECTION (Tailwind CSS - 3-Line Headline on Left, Feature Badges on Right) -->
<section class="max-w-[1380px] mx-auto px-6 py-16 md:py-20 border-t border-slate-200">
    <!-- Top Split Layout: Left Headline & Right Feature Badges Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-stretch">
        
        <!-- Left Column: 3-Line Headline & CTAs (Flex column to align bottom with right side grid) -->
        <div class="lg:col-span-5 max-w-xl flex flex-col justify-between">
            <div>
                <div class="inline-flex items-center gap-2 text-[11px] font-extrabold tracking-widest text-slate-500 uppercase mb-5">
                    <span class="w-6 h-0.5 bg-pw-gold inline-block"></span>
                    THE DAILYPACK ADVANTAGE
                </div>

                <!-- STRICT 3-LINE HEADLINE WITH ENHANCED GAP FOR PERFECT ALIGNMENT -->
                <h2 class="text-3xl sm:text-4xl lg:text-[44px] xl:text-[48px] font-black leading-[1.22] tracking-tight text-slate-900 mb-6 space-y-2 sm:space-y-3 lg:space-y-3.5">
                    <span class="block sm:whitespace-nowrap">Why brands choose</span>
                    <span class="block sm:whitespace-nowrap"><span class="text-pw-gold">DailyPack</span> over</span>
                    <span class="block sm:whitespace-nowrap">multiple vendors.</span>
                </h2>

                <p class="text-base text-slate-600 leading-relaxed font-medium mb-8">
                    One partner for sourcing, production, quality, compliance and delivery — so you can move faster, with less complexity.
                </p>
            </div>

            <div class="flex items-center flex-wrap gap-5 pt-2">
                <button class="btn-gold" onclick="openInquiryModalDirect()">
                    Price my packaging <i class="fa-solid fa-arrow-right"></i>
                </button>

                <button class="text-slate-900 font-bold text-sm inline-flex items-center gap-2 underline underline-offset-8 decoration-2 hover:text-pw-gold transition-colors cursor-pointer bg-transparent border-none p-0" onclick="openInquiryModalDirect()">
                    Talk to our team <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Right Column: 6 Feature Cards Grid (Placed on the Right Side) -->
        <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 sm:gap-5">
            <!-- Feature 1 -->
            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 hover:bg-white hover:shadow-md transition-all flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-full bg-orange-500/15 flex items-center justify-center text-orange-600 text-base mb-3">
                        <i class="fa-solid fa-coins"></i>
                    </div>
                    <h3 class="text-sm sm:text-base font-extrabold text-slate-900 mb-1">Better rates at every scale</h3>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">The right production route for your order size, from hundreds to millions.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 hover:bg-white hover:shadow-md transition-all flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-full bg-orange-500/15 flex items-center justify-center text-orange-600 text-base mb-3">
                        <i class="fa-solid fa-network-wired"></i>
                    </div>
                    <h3 class="text-sm sm:text-base font-extrabold text-slate-900 mb-1">Backup sourcing built in</h3>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">Alternative suppliers planned before production to reduce risk and support on-time delivery.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 hover:bg-white hover:shadow-md transition-all flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-full bg-orange-500/15 flex items-center justify-center text-orange-600 text-base mb-3">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3 class="text-sm sm:text-base font-extrabold text-slate-900 mb-1">3-stage quality control</h3>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">Pre-production approval, in-production checks and pre-dispatch verification.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 hover:bg-white hover:shadow-md transition-all flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-full bg-orange-500/15 flex items-center justify-center text-orange-600 text-base mb-3">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </div>
                    <h3 class="text-sm sm:text-base font-extrabold text-slate-900 mb-1">Global compliance support</h3>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">Documentation aligned to your format, factory and destination requirements.</p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 hover:bg-white hover:shadow-md transition-all flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-full bg-orange-500/15 flex items-center justify-center text-orange-600 text-base mb-3">
                        <i class="fa-solid fa-indian-rupee-sign"></i>
                    </div>
                    <h3 class="text-sm sm:text-base font-extrabold text-slate-900 mb-1">Clear commercials</h3>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">Pricing, terms and approvals visible before production — no surprises later.</p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-slate-50/70 p-5 rounded-2xl border border-slate-200/80 hover:bg-white hover:shadow-md transition-all flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-full bg-orange-500/15 flex items-center justify-center text-orange-600 text-base mb-3">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <h3 class="text-sm sm:text-base font-extrabold text-slate-900 mb-1">Managed logistics</h3>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed">Production and dispatch tracked in one order record, with updates to your team.</p>
            </div>
        </div>

    </div>
</section>
