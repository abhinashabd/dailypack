<!-- Navigation Header (Tailwind CSS - 100% Mobile Responsive) -->
<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm">
    <div class="max-w-[1380px] mx-auto px-4 sm:px-6 py-2 sm:py-2.5 flex items-center justify-between gap-3 sm:gap-5">
        <!-- Logo Box -->
        <a href="/" class="flex items-center gap-3 text-decoration-none shrink-0">
            <img src="/images/logo.svg" alt="DailyPack Solution Pvt Ltd Logo" class="h-11 sm:h-[50px] md:h-[54px] w-auto object-contain block" onerror="this.onerror=null; this.src='/images/logo.svg'">
        </a>

        <!-- Desktop Search Box -->
        <div class="relative flex-1 max-w-md hidden md:block">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
            <input type="text" id="liveSearchInput" class="w-full pl-10 pr-4 py-2.5 rounded-full border border-slate-300 bg-slate-100 text-sm outline-none transition-all focus:bg-white focus:border-pw-gold focus:ring-4 focus:ring-orange-500/20" placeholder="Search packaging items (e.g. 500ml container, pizza box)..." onkeyup="filterProducts()">
        </div>

        <!-- Desktop Navigation Links -->
        <ul class="hidden lg:flex items-center gap-7 list-none m-0 p-0">
            <li><a href="/" class="text-sm font-semibold text-slate-800 hover:text-pw-gold transition-colors py-1 relative {{ Request::is('/') ? 'text-pw-gold after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-pw-gold after:rounded-full' : '' }}">Home</a></li>
            <li><a href="/about" class="text-sm font-semibold text-slate-800 hover:text-pw-gold transition-colors py-1 relative {{ Request::is('about') ? 'text-pw-gold after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-pw-gold after:rounded-full' : '' }}">About Us</a></li>
            <li><a href="/categories" class="text-sm font-semibold text-slate-800 hover:text-pw-gold transition-colors py-1 relative {{ Request::is('categories') ? 'text-pw-gold after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-pw-gold after:rounded-full' : '' }}">Categories</a></li>
            <li><a href="/products" class="text-sm font-semibold text-slate-800 hover:text-pw-gold transition-colors py-1 relative {{ Request::is('products') ? 'text-pw-gold after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-pw-gold after:rounded-full' : '' }}">All Products</a></li>
            <li><a href="/contact" class="text-sm font-semibold text-slate-800 hover:text-pw-gold transition-colors py-1 relative {{ Request::is('contact') ? 'text-pw-gold after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-pw-gold after:rounded-full' : '' }}">Contact Us</a></li>
        </ul>

        <!-- Right Action Buttons & Mobile Hamburger Button -->
        <div class="flex items-center gap-2 sm:gap-3">
            <button class="bg-pw-gold hover:bg-pw-goldHover text-white font-bold px-3 sm:px-4 py-2 sm:py-2.5 rounded-lg text-xs sm:text-sm inline-flex items-center gap-1.5 sm:gap-2 transition-all shadow-sm cursor-pointer whitespace-nowrap" onclick="openInquiryModalDirect()">
                <i class="fa-brands fa-whatsapp text-sm sm:text-base"></i> <span class="hidden xs:inline">Direct</span> Quote
            </button>

            <!-- Mobile Menu Toggle Button (Hamburger) -->
            <button onclick="toggleMobileMenu()" class="lg:hidden w-10 h-10 rounded-lg bg-slate-100 border border-slate-200 text-slate-800 flex items-center justify-center cursor-pointer hover:bg-slate-200 transition-colors" title="Toggle Navigation Menu">
                <i class="fa-solid fa-bars text-lg" id="mobileMenuIcon"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobileMenuDrawer" class="hidden lg:hidden bg-white border-t border-slate-200 px-5 py-4 space-y-4 shadow-lg">
        <!-- Mobile Search Field -->
        <div class="relative w-full md:hidden">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
            <input type="text" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 bg-slate-50 text-xs outline-none focus:border-pw-gold" placeholder="Search products..." onkeyup="filterProducts(); if(event.key === 'Enter') toggleMobileMenu();">
        </div>

        <nav class="flex flex-col space-y-2">
            <a href="/" class="px-3 py-2.5 rounded-lg text-sm font-bold text-slate-800 hover:bg-slate-100 flex items-center gap-3">
                <i class="fa-solid fa-house text-pw-gold w-5"></i> Home
            </a>
            <a href="/about" class="px-3 py-2.5 rounded-lg text-sm font-bold text-slate-800 hover:bg-slate-100 flex items-center gap-3">
                <i class="fa-solid fa-circle-info text-pw-gold w-5"></i> About Us
            </a>
            <a href="/categories" class="px-3 py-2.5 rounded-lg text-sm font-bold text-slate-800 hover:bg-slate-100 flex items-center gap-3">
                <i class="fa-solid fa-layer-group text-pw-gold w-5"></i> Categories
            </a>
            <a href="/products" class="px-3 py-2.5 rounded-lg text-sm font-bold text-slate-800 hover:bg-slate-100 flex items-center gap-3">
                <i class="fa-solid fa-box-archive text-pw-gold w-5"></i> All Products
            </a>
            <a href="/contact" class="px-3 py-2.5 rounded-lg text-sm font-bold text-slate-800 hover:bg-slate-100 flex items-center gap-3">
                <i class="fa-solid fa-headset text-pw-gold w-5"></i> Contact Us
            </a>
        </nav>
    </div>
</header>

<script>
    function toggleMobileMenu() {
        const drawer = document.getElementById('mobileMenuDrawer');
        const icon = document.getElementById('mobileMenuIcon');
        if (drawer) {
            drawer.classList.toggle('hidden');
            if (drawer.classList.contains('hidden')) {
                icon.className = 'fa-solid fa-bars text-lg';
            } else {
                icon.className = 'fa-solid fa-xmark text-lg';
            }
        }
    }
</script>
