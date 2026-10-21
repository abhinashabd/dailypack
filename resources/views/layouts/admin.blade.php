<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DailyPack Admin Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- DailyPack Favicon Icon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS v3 CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pw: {
                            dark: '#0F172A',
                            darkSub: '#1E293B',
                            gold: '#F26522',
                            goldHover: '#D94E15',
                            bgLight: '#F8FAFC',
                            cardBorder: '#E2E8F0',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <script>
        (function() {
            var isLoggedIn = localStorage.getItem('dailypack_admin_logged_in') === 'true';
            if (isLoggedIn) {
                document.documentElement.classList.add('admin-authed');
            } else {
                document.documentElement.classList.add('admin-unauthed');
            }
        })();
    </script>
    <style>
        html.admin-authed #adminAuthOverlay { display: none !important; }
        html.admin-authed #adminMainApp { display: flex !important; }
        html.admin-unauthed #adminAuthOverlay { display: flex !important; }
        html.admin-unauthed #adminMainApp { display: none !important; }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-100 text-slate-900 font-sans antialiased min-h-screen flex flex-col">

    <!-- Admin Standalone Authentication Screen (Responsive View with Scrollbar Support) -->
    <div id="adminAuthOverlay" class="fixed inset-0 z-50 bg-[#070D1B] flex items-center justify-center p-4 sm:p-6 overflow-y-auto min-h-screen w-screen">
        <!-- Ambient Luxury Dark Glow Background Overlays -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-orange-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#1E293B_1px,transparent_1px)] [background-size:24px_24px] opacity-30 pointer-events-none"></div>

        <!-- Dedicated Enterprise Login Card -->
        <div class="bg-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 max-w-md w-full shadow-2xl border border-slate-200/80 relative z-10 my-auto">
            <!-- Brand Badge & Centered Logo Header -->
            <div class="flex flex-col items-center justify-center text-center mb-6 sm:mb-7">
                <a href="/" class="flex items-center justify-center mb-3 hover:opacity-90 transition-opacity">
                    <img src="/images/logo.svg" alt="DailyPack Solution Pvt Ltd Logo" class="h-16 sm:h-20 w-auto object-contain block mx-auto" onerror="this.onerror=null; this.src='/images/logo.svg'">
                </a>
                
                <div class="inline-flex items-center justify-center gap-2 px-3 py-1 rounded-full bg-orange-500/10 text-pw-gold text-[11px] font-black uppercase tracking-wider mb-2 border border-orange-500/20">
                    <span class="w-2 h-2 rounded-full bg-pw-gold animate-pulse"></span> Admin Operations Portal
                </div>

                <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Sign In to Account</h2>
                <p class="text-xs text-slate-500 font-medium mt-1">Manage catalog, products, categories & inquiries</p>
            </div>

            <!-- Login Form -->
            <form onsubmit="handleAdminLoginSubmit(event)" class="space-y-4 sm:space-y-4.5">
                <div>
                    <label class="block text-[11px] sm:text-xs font-bold text-slate-800 mb-1.5 uppercase tracking-wider">Admin Email</label>
                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                        <input type="text" id="adminAuthEmail" value="admin@dailypack.com" class="w-full pl-10 pr-4 py-2.5 sm:py-3 border border-slate-300 rounded-xl text-xs sm:text-sm font-semibold outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/15 transition-all text-slate-900" placeholder="admin@dailypack.com" required>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-[11px] sm:text-xs font-bold text-slate-800 uppercase tracking-wider">Password</label>
                    </div>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                        <input type="password" id="adminAuthPassword" value="admin123" class="w-full pl-10 pr-11 py-2.5 sm:py-3 border border-slate-300 rounded-xl text-xs sm:text-sm font-semibold outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/15 transition-all text-slate-900" placeholder="••••••••" required>
                        <button type="button" onclick="toggleAdminPasswordVisibility()" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 bg-transparent border-none cursor-pointer p-1">
                            <i class="fa-solid fa-eye" id="adminAuthEye"></i>
                        </button>
                    </div>
                </div>

                <!-- Slightly Smaller & Compact Responsive Button -->
                <button type="submit" class="w-full py-3 px-5 bg-pw-gold hover:bg-pw-goldHover text-white font-extrabold text-xs sm:text-sm rounded-xl border-none cursor-pointer transition-all shadow-md shadow-orange-500/20 hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2 mt-2">
                    Log In to Dashboard <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>

            <!-- Storefront Return Link -->
            <div class="mt-5 pt-3.5 border-t border-slate-100 text-center">
                <a href="/" class="text-xs font-bold text-slate-500 hover:text-slate-900 transition-colors inline-flex items-center gap-1.5">
                    <i class="fa-solid fa-arrow-left text-[11px]"></i> Return to Live Storefront
                </a>
            </div>
        </div>
    </div>

    <!-- Main Admin Container -->
    <div id="adminMainApp" class="flex min-h-screen w-full">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col shrink-0 border-r border-slate-800">
            <!-- Brand Box with Real Logo -->
            <div class="p-5 border-b border-slate-800 flex items-center justify-between">
                <a href="/" target="_blank" class="flex items-center gap-2 text-decoration-none">
                    <img src="/images/logo-footer.svg" alt="DailyPack Logo" class="h-12 w-auto max-w-[185px] object-contain block" onerror="this.onerror=null; this.src='/images/logo.svg';">
                </a>
                <span class="bg-orange-500/20 text-orange-400 text-[10px] font-black uppercase tracking-wider px-2 py-0.5 rounded-full border border-orange-500/30">Admin</span>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1 flex-1">
                <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-extrabold transition-colors {{ Request::is('admin') || Request::is('admin/dashboard') ? 'bg-pw-gold text-white shadow-md shadow-orange-500/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-chart-line text-base w-5"></i> Dashboard
                </a>

                <a href="/admin/products" class="flex items-center justify-between px-4 py-3 rounded-xl text-sm font-extrabold transition-colors {{ Request::is('admin/products') ? 'bg-pw-gold text-white shadow-md shadow-orange-500/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-box-archive text-base w-5"></i> Products
                    </div>
                    <span id="sidebarProductBadge" class="bg-slate-800 text-slate-300 text-xs px-2 py-0.5 rounded-full font-bold">0</span>
                </a>

                <a href="/admin/categories" class="flex items-center justify-between px-4 py-3 rounded-xl text-sm font-extrabold transition-colors {{ Request::is('admin/categories') ? 'bg-pw-gold text-white shadow-md shadow-orange-500/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-layer-group text-base w-5"></i> Categories
                    </div>
                    <span id="sidebarCategoryBadge" class="bg-slate-800 text-slate-300 text-xs px-2 py-0.5 rounded-full font-bold">0</span>
                </a>

                <a href="/admin/inquiries" class="flex items-center justify-between px-4 py-3 rounded-xl text-sm font-extrabold transition-colors {{ Request::is('admin/inquiries') ? 'bg-pw-gold text-white shadow-md shadow-orange-500/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-comments text-base w-5"></i> Inquiries
                    </div>
                    <span id="sidebarInquiryBadge" class="bg-orange-500/20 text-orange-400 text-xs px-2 py-0.5 rounded-full font-bold">0</span>
                </a>
            </nav>

            <!-- Storefront Quick Link & Logout -->
            <div class="p-4 border-t border-slate-800 space-y-2">
                <a href="/" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-bold text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                    <i class="fa-solid fa-arrow-up-right-from-square text-sm"></i> View Live Storefront
                </a>
                <button onclick="handleAdminLogout()" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-bold text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-colors bg-transparent border-none cursor-pointer">
                    <i class="fa-solid fa-right-from-bracket text-sm"></i> Sign Out
                </button>
            </div>
        </aside>

        <!-- Main Content View -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
            <!-- Top Appbar -->
            <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between sticky top-0 z-30 shadow-xs">
                <div>
                    <h1 class="text-xl font-black text-slate-900 leading-tight">@yield('page_title', 'Dashboard')</h1>
                    <p class="text-xs text-slate-500 font-medium">DailyPack Managed Catalog & Operations</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3 bg-slate-100 px-3.5 py-1.5 rounded-full border border-slate-200">
                        <div class="w-7 h-7 rounded-full bg-slate-900 text-white font-black text-xs flex items-center justify-center">
                            A
                        </div>
                        <span class="text-xs font-extrabold text-slate-800">Admin Manager</span>
                    </div>
                </div>
            </header>

            <!-- Page Body -->
            <main class="p-6 md:p-8 flex-1">
                @yield('admin_content')
            </main>
        </div>
    </div>

    <!-- Admin Global Shared JS Engine -->
    <script>
        const INITIAL_CATEGORIES = [
            { id: 1, name: "Plastic food packaging containers", icon: "📦", image: "https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80", description: "Microwavable, leak-proof, food-grade clear & black plastic containers." },
            { id: 2, name: "Paper food packaging containers", icon: "📄", image: "https://images.unsplash.com/photo-1572449043416-55f4685c9bb7?auto=format&fit=crop&w=400&q=80", description: "Eco-friendly kraft and white paper bowls with PE/PLA lining." },
            { id: 3, name: "Meal trays", icon: "🍱", image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=400&q=80", description: "Multi-compartment plastic and sugarcane meal trays for thali boxes." },
            { id: 4, name: "Cake & brownie box", icon: "🎂", image: "https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=400&q=80", description: "Window and non-window sturdy paperboard boxes for pastries." },
            { id: 5, name: "Pizza box", icon: "🍕", image: "https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=400&q=80", description: "Corrugated B-flute thermal retention pizza boxes." },
            { id: 6, name: "Paper lunch box", icon: "🥪", image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=400&q=80", description: "Foldable bio paper lunch boxes with built-in lid." },
            { id: 7, name: "Sugarcane plates, containers,bowls,meal trays", icon: "🌱", image: "https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80", description: "100% Bagasse sugarcane fiber compostable tableware." },
            { id: 8, name: "Hot coffee cups", icon: "☕", image: "https://images.unsplash.com/photo-1517256064527-09c73fc73e38?auto=format&fit=crop&w=400&q=80", description: "Single wall & double wall ripple paper cups with sip lids." },
            { id: 9, name: "Cold coffee glass and sipper", icon: "🥤", image: "https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=400&q=80", description: "Ultra clear PET & PP glasses with dome and strawless sipper lids." },
            { id: 10, name: "Pet bottle and jars", icon: "🧴", image: "https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=400&q=80", description: "Food grade PET bottles and wide mouth transparent storage jars." },
            { id: 11, name: "Glass bottle and jars", icon: "🫙", image: "https://images.unsplash.com/photo-1589301760014-d929f3979dbc?auto=format&fit=crop&w=400&q=80", description: "Premium thick flint glass bottles & airtight lug cap jars." }
        ];

        const INITIAL_PRODUCTS = [
            { id: 101, category_id: 1, name: "500ml Round Clear Container with Lid", image: "https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80", price_range: "₹4.50 - ₹7.00 / pc", moq: "500 Pcs", description: "Microwavable 500ml round container for curries & gravies." },
            { id: 102, category_id: 1, name: "750ml Rectangular Black Meal Box", image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80", price_range: "₹6.50 - ₹9.50 / pc", moq: "500 Pcs", description: "Heavy duty leakproof black container with clear lid." },
            { id: 103, category_id: 2, name: "500ml Kraft Paper Soup Bowl", image: "https://images.unsplash.com/photo-1572449043416-55f4685c9bb7?auto=format&fit=crop&w=600&q=80", price_range: "₹5.50 - ₹8.50 / pc", moq: "1000 Pcs", description: "Eco-friendly brown kraft paper bowl for soups and noodles." },
            { id: 104, category_id: 3, name: "4 Compartment Meal Tray with Lid", image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80", price_range: "₹9.00 - ₹14.00 / pc", moq: "500 Pcs", description: "4-section thali packaging tray for combo meals." },
            { id: 105, category_id: 4, name: "1/2 Kg Transparent Window Cake Box", image: "https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=600&q=80", price_range: "₹12.00 - ₹18.00 / pc", moq: "250 Pcs", description: "Sturdy cake box with clear PVC window top." },
            { id: 106, category_id: 5, name: "9 Inch Medium Corrugated Pizza Box", image: "https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=600&q=80", price_range: "₹7.50 - ₹11.00 / pc", moq: "500 Pcs", description: "Corrugated B-flute pizza delivery box." },
            { id: 107, category_id: 7, name: "10 Inch 3-Compartment Sugarcane Plate", image: "https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80", price_range: "₹3.50 - ₹5.80 / pc", moq: "1000 Pcs", description: "100% biodegradable bagasse sugarcane thali plate." },
            { id: 108, category_id: 8, name: "250ml Ripple Wall Kraft Coffee Cup", image: "https://images.unsplash.com/photo-1517256064527-09c73fc73e38?auto=format&fit=crop&w=600&q=80", price_range: "₹2.80 - ₹4.50 / pc", moq: "1000 Pcs", description: "Insulated triple-layer ripple hot beverage cup." },
            { id: 109, category_id: 9, name: "350ml Clear PET Cold Glass with Sipper Lid", image: "https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=600&q=80", price_range: "₹3.20 - ₹5.50 / pc", moq: "1000 Pcs", description: "Ultra clear PET cup for boba, iced coffees & shakes." },
            { id: 110, category_id: 10, name: "300ml Square PET Juice Bottle with Cap", image: "https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=600&q=80", price_range: "₹5.00 - ₹8.00 / pc", moq: "500 Pcs", description: "Airtight PET bottle for fresh juices and cold brews." },
            { id: 111, category_id: 11, name: "200ml Glass Matka Jar with Golden Lid", image: "https://images.unsplash.com/photo-1589301760014-d929f3979dbc?auto=format&fit=crop&w=600&q=80", price_range: "₹12.00 - ₹18.00 / pc", moq: "300 Pcs", description: "Premium flint glass jar for ghee, jams & pickles." }
        ];

        let adminCategories = JSON.parse(localStorage.getItem('dailypack_categories')) || INITIAL_CATEGORIES;
        let adminProducts = JSON.parse(localStorage.getItem('dailypack_products')) || INITIAL_PRODUCTS;
        let adminInquiries = JSON.parse(localStorage.getItem('dailypack_inquiries')) || [];

        function formatProductPrice(val) {
            if (!val || !val.trim()) return 'Quote on Request';
            let str = val.trim();

            if (/quote|request/i.test(str)) {
                return str;
            }

            // Replace common variations of per piece / unit
            str = str.replace(/\/pec\b/gi, '/ pc')
                     .replace(/\/piece\b/gi, '/ pc')
                     .replace(/\/pcs\b/gi, '/ pc');

            // Remove existing ₹ or Rs/RS/rs prefixes for clean parsing
            let clean = str.replace(/₹/g, '').replace(/\bRs\.?\s*/gi, '').trim();

            // Extract unit part (e.g. / pc) if present
            let unit = '/ pc';
            if (clean.includes('/')) {
                let parts = clean.split('/');
                clean = parts[0].trim();
                let u = parts[1].trim();
                if (u) unit = '/' + u;
            }

            // Check if range with dash (-)
            let rangeParts = clean.split('-');
            if (rangeParts.length === 2) {
                let n1 = rangeParts[0].trim();
                let n2 = rangeParts[1].trim();
                if (n1 && n2) {
                    return `₹${n1} - ₹${n2} ${unit}`;
                }
            } else if (rangeParts.length === 1 && clean) {
                return `₹${clean} ${unit}`;
            }

            return str.includes('₹') ? str : `₹${str}`;
        }

        function saveAdminState() {
            localStorage.setItem('dailypack_categories', JSON.stringify(adminCategories));
            localStorage.setItem('dailypack_products', JSON.stringify(adminProducts));
            localStorage.setItem('dailypack_inquiries', JSON.stringify(adminInquiries));
            updateSidebarBadges();
        }

        function updateSidebarBadges() {
            const pB = document.getElementById('sidebarProductBadge');
            const cB = document.getElementById('sidebarCategoryBadge');
            const iB = document.getElementById('sidebarInquiryBadge');
            if (pB) pB.innerText = adminProducts.length;
            if (cB) cB.innerText = adminCategories.length;
            if (iB) iB.innerText = adminInquiries.length;
        }

        function checkAuth() {
            const isLoggedIn = localStorage.getItem('dailypack_admin_logged_in') === 'true';
            if (isLoggedIn) {
                document.documentElement.classList.add('admin-authed');
                document.documentElement.classList.remove('admin-unauthed');
            } else {
                document.documentElement.classList.add('admin-unauthed');
                document.documentElement.classList.remove('admin-authed');
            }
        }

        function fillAdminDemoCredentials() {
            const emailInput = document.getElementById('adminAuthEmail');
            const passInput = document.getElementById('adminAuthPassword');
            if (emailInput) emailInput.value = 'admin@dailypack.com';
            if (passInput) passInput.value = 'admin123';
        }

        function handleAdminLoginSubmit(e) {
            e.preventDefault();
            const email = document.getElementById('adminAuthEmail').value;
            const pass = document.getElementById('adminAuthPassword').value;
            if ((email === 'admin@dailypack.com' || email === 'admin') && pass === 'admin123') {
                localStorage.setItem('dailypack_admin_logged_in', 'true');
                checkAuth();
                if (typeof onAdminAuthSuccess === 'function') onAdminAuthSuccess();
            } else {
                alert('Invalid Credentials. Please use admin@dailypack.com / admin123');
            }
        }

        function toggleAdminPasswordVisibility() {
            const p = document.getElementById('adminAuthPassword');
            const eye = document.getElementById('adminAuthEye');
            if (p.type === 'password') {
                p.type = 'text';
                eye.className = 'fa-solid fa-eye-slash';
            } else {
                p.type = 'password';
                eye.className = 'fa-solid fa-eye';
            }
        }

        function handleAdminLogout() {
            localStorage.setItem('dailypack_admin_logged_in', 'false');
            checkAuth();
        }

        document.addEventListener('DOMContentLoaded', () => {
            saveAdminState();
            checkAuth();
        });
    </script>
    @stack('scripts')
</body>
</html>
