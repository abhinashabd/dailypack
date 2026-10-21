<!-- Packworkz Inspired Blue Glow Footer (Tailwind CSS - 100% Mobile Responsive) -->
<footer class="bg-footer-glow text-slate-400 pt-10 sm:pt-14 pb-8 px-4 sm:px-6 mt-12 sm:mt-16 border-t border-white/10 relative">
    <!-- Top Row: Logo, Social Icons & CTA Button -->
    <div class="max-w-[1380px] mx-auto flex flex-col sm:flex-row items-center justify-between gap-6 pb-8 mb-10 border-b border-white/10 text-center sm:text-left">
        <!-- Brand Logo -->
        <a href="/" class="flex items-center gap-3 text-decoration-none shrink-0 justify-center">
            <img src="/images/logo-footer.svg" alt="DailyPack Solution Pvt Ltd Logo" class="h-16 sm:h-20 md:h-24 w-auto max-w-[260px] sm:max-w-[300px] object-contain block" onerror="this.onerror=null; this.src='/images/logo.svg';">
        </a>

        <!-- Social Icons & Start Order Button Box -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">
            <div class="flex items-center justify-center gap-3">
                <a href="https://www.instagram.com/dailypacksolutionspvtltd" target="_blank" class="w-9 h-9 rounded-lg bg-white/10 text-slate-200 flex items-center justify-center text-sm border border-white/10 hover:bg-pw-gold hover:text-white hover:border-pw-gold transition-all" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.facebook.com/share/1GVKZaaYqX/" target="_blank" class="w-9 h-9 rounded-lg bg-white/10 text-slate-200 flex items-center justify-center text-sm border border-white/10 hover:bg-pw-gold hover:text-white hover:border-pw-gold transition-all" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://wa.me/917303911622" target="_blank" class="w-9 h-9 rounded-lg bg-white/10 text-slate-200 flex items-center justify-center text-sm border border-white/10 hover:bg-pw-gold hover:text-white hover:border-pw-gold transition-all" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
            </div>

            <button class="w-full sm:w-auto bg-pw-gold hover:bg-pw-goldHover text-white font-bold px-6 py-3 rounded-xl text-xs sm:text-sm inline-flex items-center justify-center gap-2 transition-all shadow-md shadow-orange-500/20 cursor-pointer whitespace-nowrap" onclick="openInquiryModalDirect()">
                START YOUR ORDER <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </div>

    <!-- 4 Columns Main Content Grid -->
    <div class="max-w-[1380px] mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-10 mb-10">
        <!-- Col 1: QUICK LINKS (Direct from Header) -->
        <div>
            <h4 class="text-white text-xs font-extrabold tracking-widest uppercase mb-4 sm:mb-5">QUICK LINKS</h4>
            <ul class="space-y-2.5 list-none p-0 m-0 text-sm font-medium">
                <li><a href="/" class="text-slate-400 hover:text-pw-gold transition-colors inline-flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-pw-gold"></i> Home</a></li>
                <li><a href="/about" class="text-slate-400 hover:text-pw-gold transition-colors inline-flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-pw-gold"></i> About Us</a></li>
                <li><a href="/categories" class="text-slate-400 hover:text-pw-gold transition-colors inline-flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-pw-gold"></i> Categories</a></li>
                <li><a href="/products" class="text-slate-400 hover:text-pw-gold transition-colors inline-flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-pw-gold"></i> All Products</a></li>
                <li><a href="/contact" class="text-slate-400 hover:text-pw-gold transition-colors inline-flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-pw-gold"></i> Contact Us</a></li>
            </ul>
        </div>

        <!-- Col 2: PACKAGING PRODUCTS (Clean & Reduced) -->
        <div>
            <h4 class="text-white text-xs font-extrabold tracking-widest uppercase mb-4 sm:mb-5">PACKAGING</h4>
            <ul class="space-y-2.5 list-none p-0 m-0 text-sm font-medium">
                <li><a href="/products" class="text-slate-400 hover:text-white transition-colors">Plastic Containers</a></li>
                <li><a href="/products" class="text-slate-400 hover:text-white transition-colors">Paper Bowls & Lunch Boxes</a></li>
                <li><a href="/products" class="text-slate-400 hover:text-white transition-colors">Multi-Compartment Meal Trays</a></li>
                <li><a href="/products" class="text-slate-400 hover:text-white transition-colors">PET Bottles & Glass Jars</a></li>
            </ul>
        </div>

        <!-- Col 3: INDUSTRIES SERVED (Clean & Reduced) -->
        <div>
            <h4 class="text-white text-xs font-extrabold tracking-widest uppercase mb-4 sm:mb-5">INDUSTRIES</h4>
            <ul class="space-y-2.5 list-none p-0 m-0 text-sm font-medium">
                <li><a href="/categories" class="text-slate-400 hover:text-white transition-colors">Cloud Kitchens & QSRs</a></li>
                <li><a href="/categories" class="text-slate-400 hover:text-white transition-colors">Restaurants & Cafes</a></li>
                <li><a href="/categories" class="text-slate-400 hover:text-white transition-colors">Bakeries & Confectioneries</a></li>
                <li><a href="/categories" class="text-slate-400 hover:text-white transition-colors">Catering & Food Services</a></li>
            </ul>
        </div>

        <!-- Col 4: NEWSLETTER & HELPLINE (Header Info) -->
        <div>
            <h4 class="text-white text-xs font-extrabold tracking-widest uppercase mb-4 sm:mb-5">STAY CONNECTED</h4>
            <form class="flex flex-col gap-2.5 mb-5" onsubmit="event.preventDefault(); showToast('Subscribed to DailyPack newsletter!'); this.reset();">
                <input type="email" class="w-full px-3.5 py-2.5 rounded-lg bg-slate-950/70 border border-white/15 text-white text-xs outline-none focus:border-pw-gold placeholder:text-slate-500" placeholder="Your Email Address" required>
                <button type="submit" class="w-full py-2.5 rounded-lg bg-white text-slate-900 font-extrabold text-xs border-none cursor-pointer hover:bg-pw-gold hover:text-white transition-colors">Subscribe</button>
            </form>
            <div class="pt-3 border-t border-white/10 space-y-1.5 text-xs text-slate-400">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-phone text-pw-gold text-[11px]"></i>
                    <a href="tel:7303911622" class="text-slate-300 hover:text-pw-gold transition-colors font-medium">+91 73039 11622</a>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-brands fa-whatsapp text-emerald-400 text-[12px]"></i>
                    <a href="https://wa.me/917303911622" target="_blank" class="text-slate-300 hover:text-emerald-400 transition-colors font-medium">Instant WhatsApp Line</a>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-envelope text-pw-gold text-[11px]"></i>
                    <a href="mailto:dailypacksolutions@gmail.com" class="text-slate-300 hover:text-pw-gold transition-colors font-medium break-all">dailypacksolutions@gmail.com</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Bar -->
    <div class="max-w-[1380px] mx-auto pt-6 border-t border-white/10 text-center text-xs text-slate-500 font-medium">
        © {{ date('Y') }} DailyPack Solution Pvt Ltd. All rights reserved. Managed Food Packaging Platform.
    </div>
</footer>
