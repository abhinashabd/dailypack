<!-- PACKAGING SORTED. FOREVER. CTA BANNER SECTION (Tailwind CSS) -->
<section class="max-w-[1380px] mx-auto px-6 py-10 my-10">
    <div class="relative bg-slate-950 rounded-3xl overflow-hidden shadow-2xl border border-slate-800 py-20 px-6 sm:px-12 lg:px-20 text-center">
        <!-- Background Layer with Gradient & Packaging Roll Image Overlay -->
        <div class="absolute inset-0 z-0 bg-cover bg-center opacity-100" 
             style="background-image: url('/images/ctaimage.png');"></div>

        <!-- Top Dark Overlay to hide top logo on image -->
        <div class="absolute top-0 inset-x-0 h-48 bg-gradient-to-b from-slate-950 via-slate-950/90 to-transparent z-0 pointer-events-none"></div>

        <!-- Content Box -->
        <div class="relative z-10 max-w-4xl mx-auto flex flex-col items-center">
            
            <!-- Large Main Headline -->
            <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight text-center">
                Packaging sorted.
                <span class="block mt-2 sm:mt-3 text-pw-gold bg-gradient-to-r from-orange-500 via-amber-500 to-pw-gold bg-clip-text text-transparent">Forever.</span>
            </h2>

            <!-- Subtitle Description -->
            <p class="text-slate-300 text-sm sm:text-base md:text-lg font-medium max-w-2xl mx-auto mt-6 sm:mt-8 leading-relaxed">
                From your first sample to repeat production, manage food packaging through one accountable partner.
            </p>

            <!-- Call to Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6 mt-8 sm:mt-10 w-full sm:w-auto">
                <a href="/products" class="w-full sm:w-auto bg-pw-gold hover:bg-pw-goldHover text-white font-extrabold px-8 py-4 rounded-xl text-sm sm:text-base inline-flex items-center justify-center gap-3 transition-all duration-300 shadow-xl shadow-orange-500/25 hover:scale-105 cursor-pointer text-decoration-none border-none">
                    Browse packaging <i class="fa-solid fa-arrow-right text-sm"></i>
                </a>

                <button onclick="openInquiryModalDirect()" class="w-full sm:w-auto bg-slate-900/90 hover:bg-slate-800 text-white font-extrabold px-8 py-4 rounded-xl border border-slate-700 hover:border-slate-500 text-sm sm:text-base inline-flex items-center justify-center gap-2 transition-all cursor-pointer backdrop-blur-md shadow-md">
                    Talk to our team
                </button>
            </div>

            <!-- Bottom Stats / Features Bar -->
            <div class="w-full max-w-3xl border-t border-slate-800/80 pt-8 sm:pt-10 mt-10 sm:mt-16 grid grid-cols-1 sm:grid-cols-3 gap-3.5 sm:gap-8 items-center justify-center">
                <!-- Stat 1 -->
                <div class="flex items-center justify-start gap-3.5 bg-slate-900/70 sm:bg-transparent p-3.5 sm:p-0 rounded-2xl border border-slate-800/80 sm:border-0 w-full">
                    <div class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 text-pw-gold flex items-center justify-center shrink-0 shadow-xs">
                        <i class="fa-solid fa-industry text-base sm:text-lg"></i>
                    </div>
                    <div class="text-left">
                        <div class="text-sm font-black text-white leading-tight">33+ years</div>
                        <div class="text-xs text-slate-400 font-semibold">manufacturing heritage</div>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="flex items-center justify-start gap-3.5 bg-slate-900/70 sm:bg-transparent p-3.5 sm:p-0 rounded-2xl border border-slate-800/80 sm:border-0 sm:border-x sm:border-slate-800/80 sm:px-6 w-full">
                    <div class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 text-pw-gold flex items-center justify-center shrink-0 shadow-xs">
                        <i class="fa-solid fa-diagram-project text-base sm:text-lg"></i>
                    </div>
                    <div class="text-left">
                        <div class="text-sm font-black text-white leading-tight">Managed</div>
                        <div class="text-xs text-slate-400 font-semibold">supplier network</div>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="flex items-center justify-start gap-3.5 bg-slate-900/70 sm:bg-transparent p-3.5 sm:p-0 rounded-2xl border border-slate-800/80 sm:border-0 w-full">
                    <div class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 text-pw-gold flex items-center justify-center shrink-0 shadow-xs">
                        <i class="fa-solid fa-earth-americas text-base sm:text-lg"></i>
                    </div>
                    <div class="text-left">
                        <div class="text-sm font-black text-white leading-tight">Pan-India</div>
                        <div class="text-xs text-slate-400 font-semibold">delivery network</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
