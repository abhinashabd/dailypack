<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DailyPack Solution Pvt Ltd | Managed Food Packaging Platform')</title>
    <meta name="description" content="@yield('meta_description', 'DailyPack Solution Pvt Ltd - Your packaging. Sorted. Forever. Plastic Containers, Paper Bowls, Meal Trays, Pizza Boxes, Coffee Cups, PET Bottles & Glass Jars.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- DailyPack Favicon Icon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
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
                            bgLight: '#F5F3EF',
                            cardBorder: '#E2E8F0',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'sans-serif'],
                        display: ['Outfit', '"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Custom Tailwind Layer Extensions & Typography Settings -->
    <style type="text/tailwindcss">
        @layer base {
            html {
                font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                text-rendering: optimizeLegibility;
            }
            h1, h2, h3, h4 {
                font-family: 'Plus Jakarta Sans', sans-serif;
                letter-spacing: -0.035em;
            }
        }
        @layer utilities {
            .bg-footer-glow {
                background: radial-gradient(ellipse at 50% 0%, #163B73 0%, #0A1C38 35%, #040E1E 70%, #020712 100%);
            }
            .bg-hero-light {
                background: linear-gradient(180deg, #F5F3EF 0%, #FAF9F5 100%);
            }
            .btn-gold {
                @apply bg-pw-gold text-white font-bold px-6 py-3 rounded-lg hover:bg-pw-goldHover hover:-translate-y-0.5 transition-all shadow-md shadow-orange-500/20 inline-flex items-center gap-2 whitespace-nowrap cursor-pointer;
            }
            .btn-outline-dark {
                @apply bg-transparent text-slate-900 font-bold px-6 py-3 rounded-lg border border-slate-900 hover:bg-slate-900/5 hover:-translate-y-0.5 transition-all inline-flex items-center gap-2 whitespace-nowrap cursor-pointer;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen flex flex-col overflow-x-hidden">

    <!-- Top Announcement Bar -->
    @include('partials.top-bar')

    <!-- Navigation Header -->
    @include('partials.header')

    <!-- Main Content Body -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Partisan -->
    @include('partials.footer')

    <!-- Inquiry & Admin Modals Partisans -->
    @include('partials.inquiry-modal')
    @include('partials.admin-modal')
    @include('partials.product-zoom-modal')

    <!-- Floating Sample Button (Hidden on Mobile, Desktop Only) -->
    <div class="hidden sm:flex fixed bottom-5 right-5 z-50 bg-slate-900 text-white px-5 py-3 rounded-2xl items-center gap-3.5 shadow-2xl hover:-translate-y-1 hover:bg-slate-800 cursor-pointer transition-all border border-slate-700/80" onclick="openInquiryModalDirect()" title="Get Samples on WhatsApp">
        <i class="fa-solid fa-box-open text-xl text-pw-gold shrink-0"></i>
        <div>
            <div class="text-xs font-bold text-white">Get samples</div>
            <div class="text-[11px] text-slate-400">Direct WhatsApp (73039 11622)</div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="fixed bottom-8 right-8 bg-slate-900 text-white px-6 py-3.5 rounded-lg z-50 translate-y-24 opacity-0 transition-all duration-300 border-l-4 border-pw-gold shadow-2xl" id="toast">
        <span id="toastMsg" class="text-sm font-semibold">Action completed successfully!</span>
    </div>

    <!-- Core App JS Logic -->
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
            { id: 101, category_id: 1, name: "500ml Round Clear Container with Lid", image: "https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80", price_range: "₹4.50 - ₹7.00 / pc", moq: "500 Pcs" },
            { id: 102, category_id: 1, name: "750ml Rectangular Black Meal Box", image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80", price_range: "₹6.50 - ₹9.50 / pc", moq: "500 Pcs" },
            { id: 103, category_id: 2, name: "500ml Kraft Paper Soup Bowl", image: "https://images.unsplash.com/photo-1572449043416-55f4685c9bb7?auto=format&fit=crop&w=600&q=80", price_range: "₹5.50 - ₹8.50 / pc", moq: "1000 Pcs" },
            { id: 104, category_id: 3, name: "4 Compartment Meal Tray with Lid", image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80", price_range: "₹9.00 - ₹14.00 / pc", moq: "500 Pcs" },
            { id: 105, category_id: 4, name: "1/2 Kg Transparent Window Cake Box", image: "https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=600&q=80", price_range: "₹12.00 - ₹18.00 / pc", moq: "250 Pcs" },
            { id: 106, category_id: 5, name: "9 Inch Medium Corrugated Pizza Box", image: "https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=600&q=80", price_range: "₹7.50 - ₹11.00 / pc", moq: "500 Pcs" },
            { id: 107, category_id: 7, name: "10 Inch 3-Compartment Sugarcane Plate", image: "https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80", price_range: "₹3.50 - ₹5.80 / pc", moq: "1000 Pcs" },
            { id: 108, category_id: 8, name: "250ml Ripple Wall Kraft Coffee Cup", image: "https://images.unsplash.com/photo-1517256064527-09c73fc73e38?auto=format&fit=crop&w=600&q=80", price_range: "₹2.80 - ₹4.50 / pc", moq: "1000 Pcs" },
            { id: 109, category_id: 9, name: "350ml Clear PET Cold Glass with Sipper Lid", image: "https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=600&q=80", price_range: "₹3.20 - ₹5.50 / pc", moq: "1000 Pcs" },
            { id: 110, category_id: 10, name: "300ml Square PET Juice Bottle with Cap", image: "https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=600&q=80", price_range: "₹5.00 - ₹8.00 / pc", moq: "500 Pcs" },
            { id: 111, category_id: 11, name: "200ml Glass Matka Jar with Golden Lid", image: "https://images.unsplash.com/photo-1589301760014-d929f3979dbc?auto=format&fit=crop&w=600&q=80", price_range: "₹12.00 - ₹18.00 / pc", moq: "300 Pcs" }
        ];

        let categories = JSON.parse(localStorage.getItem('dailypack_categories')) || INITIAL_CATEGORIES;
        let products = JSON.parse(localStorage.getItem('dailypack_products')) || INITIAL_PRODUCTS;
        let inquiries = JSON.parse(localStorage.getItem('dailypack_inquiries')) || [];
        let isAdminLoggedIn = localStorage.getItem('dailypack_admin_logged_in') === 'true';
        let currentActiveCategory = 'all';

        function renderCategories() {
            const grid = document.getElementById('categoriesGrid');
            if (!grid) return;
            grid.innerHTML = '';
            categories.forEach(cat => {
                const prodCount = products.filter(p => p.category_id == cat.id || p.category?.id == cat.id).length;
                const card = document.createElement('div');
                card.className = 'group flex bg-white border-b border-r border-slate-200 overflow-hidden cursor-pointer hover:bg-slate-50/80 transition-colors relative min-h-[135px]';
                card.onclick = () => filterByCategory(cat.id);
                
                const catImg = cat.image || 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80';
                
                card.innerHTML = `
                    <div class="w-1/3 min-w-[110px] max-w-[135px] bg-slate-50/80 overflow-hidden relative border-r border-slate-100 shrink-0 flex items-center justify-center p-2.5">
                        <img src="${catImg}" alt="${cat.name}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" loading="lazy">
                    </div>
                    <div class="w-2/3 p-4 sm:p-5 flex flex-col justify-between flex-grow">
                        <div>
                            <h3 class="text-sm sm:text-base font-extrabold text-slate-900 group-hover:text-orange-600 transition-colors line-clamp-1 mb-1">${cat.name}</h3>
                            <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed mb-3">${cat.description || 'Premium food packaging.'}</p>
                        </div>
                        <div class="flex items-center justify-between pt-2 border-t border-slate-100 mt-auto">
                            <span class="text-[11px] font-extrabold text-sky-600 tracking-wider uppercase">${prodCount} PRODUCT FAMILIES</span>
                            <i class="fa-solid fa-arrow-right text-xs text-sky-600 group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </div>
                `;
                grid.appendChild(card);
            });
        }

        function renderFilterPills() {
            const bar = document.getElementById('categoryFilterBar');
            if (!bar) return;
            bar.innerHTML = `<button class="px-4 py-2 rounded-full border border-slate-200 text-xs font-semibold cursor-pointer transition-all ${currentActiveCategory === 'all' ? 'bg-slate-900 text-white border-slate-900 shadow' : 'bg-white text-slate-600 hover:bg-slate-100'}" onclick="filterByCategory('all')">All Products</button>`;
            categories.forEach(cat => {
                const btn = document.createElement('button');
                btn.className = `px-4 py-2 rounded-full border text-xs font-semibold cursor-pointer transition-all ${currentActiveCategory == cat.id ? 'bg-slate-900 text-white border-slate-900 shadow' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-100'}`;
                btn.innerText = cat.name;
                btn.onclick = () => filterByCategory(cat.id);
                bar.appendChild(btn);
            });
        }

        const ITEMS_PER_PAGE = 12;
        let currentPage = 1;

        function filterByCategory(catId) {
            currentActiveCategory = catId;
            currentPage = 1;
            renderFilterPills();
            renderProducts();
            const el = document.getElementById('productsSection');
            if (el) el.scrollIntoView({ behavior: 'smooth' });
            else window.location.href = '/products?cat=' + catId;
        }

        function filterProducts() {
            currentPage = 1;
            renderProducts();
        }

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

        let currentZoomIndex = 0;
        let currentZoomScale = 1;

        function renderProducts() {
            const grid = document.getElementById('productsGrid');
            if (!grid) return;
            grid.innerHTML = '';
            const searchInput = document.getElementById('liveSearchInput');
            const searchVal = searchInput ? searchInput.value.toLowerCase().trim() : '';

            const filtered = products.filter(p => {
                const matchesCat = (currentActiveCategory === 'all') || (p.category_id == currentActiveCategory) || (p.category && p.category.id == currentActiveCategory);
                const matchesSearch = !searchVal || p.name.toLowerCase().includes(searchVal);
                return matchesCat && matchesSearch;
            });

            const totalPages = Math.ceil(filtered.length / ITEMS_PER_PAGE) || 1;
            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
            const paginatedItems = filtered.slice(startIndex, startIndex + ITEMS_PER_PAGE);

            if (paginatedItems.length === 0) {
                grid.innerHTML = `<div class="col-span-full py-12 text-center text-slate-400 font-bold text-base">No products found matching your search.</div>`;
            } else {
                paginatedItems.forEach(prod => {
                    const catObj = categories.find(c => c.id == prod.category_id) || prod.category || { name: 'Packaging' };
                    const formattedPrice = formatProductPrice(prod.price_range);
                    const card = document.createElement('div');
                    card.className = 'bg-white border border-slate-200 rounded-xl overflow-hidden transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-slate-200/60 flex flex-col group';
                    card.innerHTML = `
                        <div class="relative h-52 bg-slate-50 overflow-hidden cursor-pointer" onclick="openProductZoomModal(${prod.id})">
                            <img src="${prod.image}" alt="${prod.name}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <span class="absolute top-3 left-3 bg-slate-900/85 text-white text-[11px] font-bold px-2.5 py-1 rounded-full backdrop-blur-sm">${catObj.name}</span>
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-base font-bold text-slate-900 mb-2 line-clamp-1 hover:text-pw-gold cursor-pointer transition-colors" onclick="openProductZoomModal(${prod.id})">${prod.name}</h3>
                            <div class="flex items-center justify-between mt-auto pt-3 border-t border-slate-100">
                                <span class="text-sm font-extrabold text-orange-600">${formattedPrice}</span>
                                <span class="text-xs text-slate-500 font-medium">MOQ: ${prod.moq || '500 Pcs'}</span>
                            </div>
                            <button class="w-full mt-3.5 py-2.5 px-4 rounded-lg bg-pw-gold text-white text-xs font-bold border-none cursor-pointer flex items-center justify-center gap-2 hover:bg-pw-goldHover transition-colors shadow-sm" onclick="openInquiryModal(${prod.id})">
                                <i class="fa-brands fa-whatsapp text-sm"></i> Inquire Now (Send Query)
                            </button>
                        </div>
                    `;
                    grid.appendChild(card);
                });
            }

            renderPaginationBar(filtered.length, totalPages, startIndex, paginatedItems.length);
        }

        function renderPaginationBar(totalItems, totalPages, startIndex, countOnPage) {
            const container = document.getElementById('productsPagination');
            if (!container) return;
            if (totalItems <= ITEMS_PER_PAGE) {
                container.innerHTML = `
                    <div class="text-xs font-semibold text-slate-500">Showing all ${totalItems} products</div>
                `;
                return;
            }

            const fromNum = totalItems > 0 ? startIndex + 1 : 0;
            const toNum = startIndex + countOnPage;

            let pageButtonsHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                if (i === currentPage) {
                    pageButtonsHTML += `<button class="w-9 h-9 rounded-xl bg-pw-gold text-white text-xs font-extrabold shadow-md border-none cursor-default">${i}</button>`;
                } else {
                    pageButtonsHTML += `<button onclick="changePage(${i})" class="w-9 h-9 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 text-xs font-extrabold border border-slate-200 cursor-pointer transition-colors">${i}</button>`;
                }
            }

            container.innerHTML = `
                <div class="text-xs font-bold text-slate-600">
                    Showing <span class="text-slate-900 font-black">${fromNum}-${toNum}</span> of <span class="text-slate-900 font-black">${totalItems}</span> products
                </div>

                <div class="flex items-center gap-2">
                    <button onclick="changePage(${currentPage - 1})" class="px-3.5 py-2 rounded-xl text-xs font-extrabold border transition-all ${currentPage === 1 ? 'bg-slate-100 text-slate-400 border-slate-200 cursor-not-allowed' : 'bg-white text-slate-800 border-slate-300 hover:bg-slate-100 cursor-pointer shadow-xs'}" ${currentPage === 1 ? 'disabled' : ''}>
                        <i class="fa-solid fa-chevron-left text-[10px] mr-1"></i> Prev
                    </button>

                    <div class="flex items-center gap-1.5">${pageButtonsHTML}</div>

                    <button onclick="changePage(${currentPage + 1})" class="px-3.5 py-2 rounded-xl text-xs font-extrabold border transition-all ${currentPage === totalPages ? 'bg-slate-100 text-slate-400 border-slate-200 cursor-not-allowed' : 'bg-white text-slate-800 border-slate-300 hover:bg-slate-100 cursor-pointer shadow-xs'}" ${currentPage === totalPages ? 'disabled' : ''}>
                        Next <i class="fa-solid fa-chevron-right text-[10px] ml-1"></i>
                    </button>
                </div>
            `;
        }

        function changePage(page) {
            currentPage = page;
            renderProducts();
            const el = document.getElementById('productsSection');
            if (el) el.scrollIntoView({ behavior: 'smooth' });
        }

        function openProductZoomModal(productId) {
            if (!products || products.length === 0) return;
            const idx = products.findIndex(p => p.id == productId);
            currentZoomIndex = idx !== -1 ? idx : 0;
            updateZoomModalContent();

            const modal = document.getElementById('productZoomModal');
            if (modal) {
                modal.classList.remove('invisible', 'opacity-0');
                modal.classList.add('visible', 'opacity-100');
            }
        }

        function closeProductZoomModal() {
            const modal = document.getElementById('productZoomModal');
            if (modal) {
                modal.classList.remove('visible', 'opacity-100');
                modal.classList.add('invisible', 'opacity-0');
            }
            resetProductImageZoom();
        }

        function updateZoomModalContent() {
            if (!products || products.length === 0) return;
            const p = products[currentZoomIndex];
            if (!p) return;

            const catObj = categories.find(c => c.id == p.category_id) || p.category || { name: 'Packaging' };

            const imgEl = document.getElementById('zoomModalImg');
            if (imgEl) imgEl.src = p.image || '/images/logo.svg';

            const titleEl = document.getElementById('zoomModalTitle');
            if (titleEl) titleEl.innerText = p.name;

            const priceEl = document.getElementById('zoomModalPrice');
            if (priceEl) priceEl.innerText = formatProductPrice(p.price_range);

            const moqEl = document.getElementById('zoomModalMoq');
            if (moqEl) moqEl.innerText = p.moq || '500 Pcs';

            const descEl = document.getElementById('zoomModalDesc');
            if (descEl) descEl.innerText = p.description || 'Food-grade, microwavable, leak-proof packaging container designed for delivery and takeaway.';

            const tagEl = document.getElementById('zoomModalCategoryTag');
            if (tagEl) tagEl.innerText = catObj.name;

            const subTagEl = document.getElementById('zoomModalSubCategory');
            if (subTagEl) subTagEl.innerText = catObj.name;

            const counterEl = document.getElementById('zoomModalCounter');
            if (counterEl) counterEl.innerText = `Product ${currentZoomIndex + 1} of ${products.length}`;

            resetProductImageZoom();
        }

        function nextZoomProduct() {
            if (!products || products.length === 0) return;
            currentZoomIndex = (currentZoomIndex + 1) % products.length;
            updateZoomModalContent();
        }

        function prevZoomProduct() {
            if (!products || products.length === 0) return;
            currentZoomIndex = (currentZoomIndex - 1 + products.length) % products.length;
            updateZoomModalContent();
        }

        function zoomProductImage(delta) {
            currentZoomScale = Math.min(Math.max(0.75, currentZoomScale + delta), 3.0);
            applyZoomScale();
        }

        function toggleProductImageZoomClick() {
            if (currentZoomScale > 1) {
                resetProductImageZoom();
            } else {
                currentZoomScale = 1.75;
                applyZoomScale();
            }
        }

        function resetProductImageZoom() {
            currentZoomScale = 1;
            applyZoomScale();
        }

        function applyZoomScale() {
            const imgEl = document.getElementById('zoomModalImg');
            const wrapperEl = document.getElementById('zoomImageWrapper');
            const levelText = document.getElementById('zoomLevelText');
            if (imgEl) {
                imgEl.style.transform = `scale(${currentZoomScale})`;
            }
            if (wrapperEl) {
                wrapperEl.className = `w-full h-full flex items-center justify-center overflow-auto ${currentZoomScale > 1 ? 'cursor-zoom-out' : 'cursor-zoom-in'}`;
            }
            if (levelText) {
                levelText.innerText = `${Math.round(currentZoomScale * 100)}%`;
            }
        }

        function inquireFromZoomModal() {
            if (!products || products.length === 0) return;
            const p = products[currentZoomIndex];
            closeProductZoomModal();
            if (p) openInquiryModal(p.id);
        }

        document.addEventListener('keydown', (e) => {
            const modal = document.getElementById('productZoomModal');
            if (!modal || modal.classList.contains('invisible')) return;

            if (e.key === 'ArrowRight') {
                nextZoomProduct();
            } else if (e.key === 'ArrowLeft') {
                prevZoomProduct();
            } else if (e.key === 'Escape') {
                closeProductZoomModal();
            }
        });

        function filterProducts() {
            renderProducts();
        }

        function populateInquiryCategorySelect() {
            const select = document.getElementById('inquiryCategorySelect');
            if (!select) return;
            select.innerHTML = '<option value="">-- Choose Category (e.g. Plastic Containers, Paper Bowls...) --</option>';
            categories.forEach(c => {
                const opt = document.createElement('option');
                opt.value = c.id;
                opt.textContent = `${c.icon || '📦'} ${c.name}`;
                select.appendChild(opt);
            });
        }

        function onInquiryCategoryChange() {
            const catId = document.getElementById('inquiryCategorySelect').value;
            const prodSelect = document.getElementById('inquiryProductSelect');
            const customInput = document.getElementById('customProductNameInput');
            const previewBox = document.getElementById('inquiryProductPreviewBox');
            if (!prodSelect) return;

            const catObj = categories.find(c => c.id == catId);
            document.getElementById('inquiryCategoryNameInput').value = catObj ? catObj.name : '';

            prodSelect.innerHTML = '<option value="">-- Or Select from Popular Products List --</option>';
            
            if (catId) {
                const filteredProds = products.filter(p => p.category_id == catId || p.category?.id == catId);
                filteredProds.forEach(p => {
                    const opt = document.createElement('option');
                    opt.value = p.id;
                    opt.textContent = p.name;
                    prodSelect.appendChild(opt);
                });
            }

            document.getElementById('inquiryProductId').value = '';
            document.getElementById('inquiryProductNameInput').value = customInput ? customInput.value : (catObj ? catObj.name : '');
            if (previewBox) previewBox.classList.add('hidden');
        }

        function onInquiryProductChange() {
            const prodId = document.getElementById('inquiryProductSelect').value;
            const customInput = document.getElementById('customProductNameInput');
            const previewBox = document.getElementById('inquiryProductPreviewBox');
            const catId = document.getElementById('inquiryCategorySelect').value;
            const catObj = categories.find(c => c.id == catId) || { name: 'Packaging' };

            if (prodId) {
                const prod = products.find(p => p.id == prodId);
                if (prod) {
                    document.getElementById('inquiryProductId').value = prod.id;
                    if (customInput) customInput.value = prod.name;
                    document.getElementById('inquiryProductNameInput').value = prod.name;
                    document.getElementById('inquiryProductName').innerText = prod.name;
                    document.getElementById('inquiryProductCategory').innerText = catObj.name;
                    document.getElementById('inquiryProductPrice').innerText = `Wholesale: ${formatProductPrice(prod.price_range)} | MOQ: ${prod.moq || '500 Pcs'}`;
                    document.getElementById('inquiryProductImg').src = prod.image || '/images/logo.svg';
                    if (previewBox) previewBox.classList.remove('hidden');
                    return;
                }
            }

            document.getElementById('inquiryProductId').value = '';
            document.getElementById('inquiryProductNameInput').value = customInput ? customInput.value : (catObj.name ? `Category: ${catObj.name}` : 'General Inquiry');
            if (previewBox) previewBox.classList.add('hidden');
        }

        function onCustomProductInput() {
            const customInput = document.getElementById('customProductNameInput');
            if (customInput) {
                document.getElementById('inquiryProductNameInput').value = customInput.value;
            }
            document.getElementById('inquiryProductId').value = '';
            const prodSelect = document.getElementById('inquiryProductSelect');
            if (prodSelect) prodSelect.value = '';
            const previewBox = document.getElementById('inquiryProductPreviewBox');
            if (previewBox) previewBox.classList.add('hidden');
        }

        function openInquiryModalDirect() {
            populateInquiryCategorySelect();
            document.getElementById('inquiryCategorySelect').value = '';
            const customInput = document.getElementById('customProductNameInput');
            if (customInput) customInput.value = '';
            onInquiryCategoryChange();

            const modal = document.getElementById('inquiryModal');
            modal.classList.remove('invisible', 'opacity-0');
            modal.classList.add('visible', 'opacity-100');
        }

        function openInquiryModal(productId) {
            populateInquiryCategorySelect();
            const prod = products.find(p => p.id == productId);
            const customInput = document.getElementById('customProductNameInput');
            if (prod) {
                const catId = prod.category_id || (prod.category ? prod.category.id : '');
                document.getElementById('inquiryCategorySelect').value = catId;
                onInquiryCategoryChange();
                document.getElementById('inquiryProductSelect').value = prod.id;
                if (customInput) customInput.value = prod.name;
                onInquiryProductChange();
            } else {
                openInquiryModalDirect();
            }

            const modal = document.getElementById('inquiryModal');
            modal.classList.remove('invisible', 'opacity-0');
            modal.classList.add('visible', 'opacity-100');
        }

        function closeInquiryModal() {
            const modal = document.getElementById('inquiryModal');
            modal.classList.remove('visible', 'opacity-100');
            modal.classList.add('invisible', 'opacity-0');
        }

        function handleInquirySubmit(event) {
            event.preventDefault();

            const catSelect = document.getElementById('inquiryCategorySelect');
            const selectedCatText = catSelect && catSelect.selectedIndex > 0 ? catSelect.options[catSelect.selectedIndex].text : '';
            const customInput = document.getElementById('customProductNameInput');
            const prodName = (customInput && customInput.value.trim()) ? customInput.value.trim() : (document.getElementById('inquiryProductNameInput').value || 'Custom Packaging Item');
            const name = document.getElementById('customerName').value;
            const phone = document.getElementById('customerPhone').value;
            const email = document.getElementById('customerEmail') ? document.getElementById('customerEmail').value : '';
            const qty = document.getElementById('orderQuantity').value;
            const msg = document.getElementById('customerMessage') ? document.getElementById('customerMessage').value : '';

            const displayTitle = selectedCatText ? `${selectedCatText} - ${prodName}` : prodName;

            const inquiryData = {
                product_name: displayTitle,
                customer_name: name,
                customer_phone: phone,
                customer_email: email,
                quantity: qty,
                message: msg,
                created_at: new Date().toISOString()
            };

            inquiries.unshift(inquiryData);
            localStorage.setItem('dailypack_inquiries', JSON.stringify(inquiries));

            let text = `*New Inquiry - DailyPack Solution*\n\n`;
            if (selectedCatText) text += `*Category:* ${selectedCatText}\n`;
            text += `*Item / Custom Requirement:* ${prodName}\n` +
                    `*Customer Name:* ${name}\n` +
                    `*Phone:* ${phone}\n` +
                    (email ? `*Email:* ${email}\n` : '') +
                    `*Quantity:* ${qty}\n` +
                    `*Note:* ${msg || 'None'}`;

            const waUrl = `https://wa.me/917303911622?text=${encodeURIComponent(text)}`;

            closeInquiryModal();
            showToast("Inquiry logged! Opening WhatsApp...");
            setTimeout(() => { window.open(waUrl, '_blank'); }, 500);
        }

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('adminPassword');
            const eyeIcon = document.getElementById('passwordEyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.className = 'fa-solid fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                eyeIcon.className = 'fa-solid fa-eye';
            }
        }

        function openAdminModal() {
            const modal = document.getElementById('adminModal');
            modal.classList.remove('invisible', 'opacity-0');
            modal.classList.add('visible', 'opacity-100');
            checkAdminAuthState();
        }
        function closeAdminModal() {
            const modal = document.getElementById('adminModal');
            modal.classList.remove('visible', 'opacity-100');
            modal.classList.add('invisible', 'opacity-0');
        }
        function checkAdminAuthState() {
            if (isAdminLoggedIn) {
                document.getElementById('adminLoginView').style.display = 'none';
                document.getElementById('adminPanelView').style.display = 'block';
                loadAdminData();
            } else {
                document.getElementById('adminLoginView').style.display = 'block';
                document.getElementById('adminPanelView').style.display = 'none';
            }
        }
        function handleAdminLogin(e) {
            e.preventDefault();
            const email = document.getElementById('adminEmail').value;
            const pass = document.getElementById('adminPassword').value;
            if ((email === 'admin@dailypack.com' || email === 'admin') && pass === 'admin123') {
                isAdminLoggedIn = true;
                localStorage.setItem('dailypack_admin_logged_in', 'true');
                showToast("Admin Login Successful!");
                checkAdminAuthState();
            } else {
                alert("Invalid Admin Credentials.");
            }
        }
        function adminLogout() {
            isAdminLoggedIn = false;
            localStorage.setItem('dailypack_admin_logged_in', 'false');
            checkAdminAuthState();
        }

        function loadAdminData() {
            renderAdminProducts();
            renderAdminCategories();
            renderAdminInquiries();
        }

        function renderAdminProducts() {
            const tbody = document.getElementById('adminProductsTableBody');
            if (!tbody) return;
            tbody.innerHTML = '';
            products.forEach(p => {
                const tr = document.createElement('tr');
                tr.className = 'border-b border-slate-100 hover:bg-slate-50';
                tr.innerHTML = `<td class="p-2"><img src="${p.image}" class="w-9 h-9 rounded object-cover"></td><td class="p-2 font-bold text-slate-800">${p.name}</td><td class="p-2 text-slate-500">${p.category_id}</td><td class="p-2"><button class="px-2.5 py-1 text-xs bg-red-50 text-red-600 rounded hover:bg-red-100 font-semibold border border-red-200" onclick="deleteProduct(${p.id})">Delete</button></td>`;
                tbody.appendChild(tr);
            });
        }
        function renderAdminCategories() {
            const tbody = document.getElementById('adminCategoriesTableBody');
            if (!tbody) return;
            tbody.innerHTML = '';
            categories.forEach(c => {
                const tr = document.createElement('tr');
                tr.className = 'border-b border-slate-100 hover:bg-slate-50';
                tr.innerHTML = `<td class="p-2 text-xl">${c.icon}</td><td class="p-2 font-bold text-slate-800">${c.name}</td><td class="p-2"><button class="px-2.5 py-1 text-xs bg-red-50 text-red-600 rounded hover:bg-red-100 font-semibold border border-red-200" onclick="deleteCategory(${c.id})">Delete</button></td>`;
                tbody.appendChild(tr);
            });
        }
        function renderAdminInquiries() {
            const tbody = document.getElementById('adminInquiriesTableBody');
            if (!tbody) return;
            tbody.innerHTML = '';
            inquiries.forEach(inq => {
                const tr = document.createElement('tr');
                tr.className = 'border-b border-slate-100 hover:bg-slate-50';
                tr.innerHTML = `<td class="p-2 text-slate-500">${new Date(inq.created_at).toLocaleDateString()}</td><td class="p-2 font-bold text-slate-800">${inq.product_name}</td><td class="p-2 text-slate-700">${inq.customer_name}</td><td class="p-2 text-slate-600">${inq.customer_phone}</td><td class="p-2 text-amber-600 font-semibold">${inq.quantity}</td>`;
                tbody.appendChild(tr);
            });
        }
        function deleteProduct(id) {
            products = products.filter(p => p.id != id);
            localStorage.setItem('dailypack_products', JSON.stringify(products));
            renderProducts();
            renderAdminProducts();
        }
        function deleteCategory(id) {
            categories = categories.filter(c => c.id != id);
            localStorage.setItem('dailypack_categories', JSON.stringify(categories));
            renderCategories();
            renderAdminCategories();
        }

        function switchAdminTab(tabId, btnEl) {
            document.querySelectorAll('.admin-tab-content').forEach(el => el.style.display = 'none');
            document.getElementById(tabId).style.display = 'block';
        }

        function showToast(msg) {
            const t = document.getElementById('toast');
            if (!t) return;
            document.getElementById('toastMsg').innerText = msg;
            t.classList.remove('translate-y-24', 'opacity-0');
            t.classList.add('translate-y-0', 'opacity-100');
            setTimeout(() => {
                t.classList.remove('translate-y-0', 'opacity-100');
                t.classList.add('translate-y-24', 'opacity-0');
            }, 3000);
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderCategories();
            renderProducts();
            renderFilterPills();
        });
    </script>
    @stack('scripts')
</body>
</html>
