<!-- Product Image Lightbox & Zoom Modal -->
<div id="productZoomModal" class="fixed inset-0 w-screen h-screen bg-slate-950/90 backdrop-blur-md z-50 flex items-center justify-center p-3 sm:p-6 transition-all duration-300 invisible opacity-0">
    <!-- Main Modal Container -->
    <div class="bg-white rounded-2xl sm:rounded-3xl w-full max-w-5xl max-h-[92vh] flex flex-col overflow-hidden shadow-2xl border border-slate-200/80 relative">
        
        <!-- Modal Top Bar -->
        <div class="px-5 py-3.5 border-b border-slate-200 flex items-center justify-between bg-slate-50/90 sticky top-0 z-20 shrink-0">
            <div class="flex items-center gap-3">
                <span class="bg-orange-500/10 text-pw-gold text-[11px] font-black uppercase tracking-wider px-2.5 py-1 rounded-full border border-orange-500/20" id="zoomModalCategoryTag">Category</span>
                <span class="text-xs text-slate-500 font-bold" id="zoomModalCounter">Product 1 of 10</span>
            </div>

            <!-- Image Zoom Controls & Close Cut Button -->
            <div class="flex items-center gap-2 sm:gap-3">
                <div class="flex items-center bg-white border border-slate-200 rounded-xl p-0.5 shadow-xs">
                    <button onclick="zoomProductImage(-0.25)" class="w-8 h-8 rounded-lg text-slate-700 hover:bg-slate-100 border-none cursor-pointer flex items-center justify-center text-xs font-bold transition-colors" title="Zoom Out (-)">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                    <span id="zoomLevelText" class="px-2 text-xs font-bold text-slate-700 min-w-[45px] text-center">100%</span>
                    <button onclick="zoomProductImage(0.25)" class="w-8 h-8 rounded-lg text-slate-700 hover:bg-slate-100 border-none cursor-pointer flex items-center justify-center text-xs font-bold transition-colors" title="Zoom In (+)">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <button onclick="resetProductImageZoom()" class="px-2.5 py-1 text-[11px] font-extrabold text-pw-gold hover:bg-orange-50 rounded-lg border-none cursor-pointer transition-colors" title="Reset Zoom">
                        Reset
                    </button>
                </div>

                <!-- Close / Cut Button -->
                <button onclick="closeProductZoomModal()" class="w-9 h-9 rounded-full bg-slate-200/80 hover:bg-red-500 hover:text-white border-none text-slate-700 cursor-pointer flex items-center justify-center transition-colors text-sm shadow-xs" title="Close (Esc)">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <!-- Body Grid: Left Image Viewer with Prev/Next Navigation, Right Details -->
        <div class="flex-1 grid grid-cols-1 lg:grid-cols-12 min-h-0 overflow-y-auto">
            
            <!-- Left: Image Viewer Box with Prev & Next Arrows -->
            <div class="lg:col-span-8 bg-slate-950 flex items-center justify-center relative p-4 sm:p-8 min-h-[350px] sm:min-h-[480px] overflow-hidden select-none group">
                
                <!-- Previous Button (<) -->
                <button onclick="prevZoomProduct()" class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-slate-900/80 text-white hover:bg-pw-gold hover:scale-110 border border-slate-700 cursor-pointer flex items-center justify-center text-base sm:text-lg transition-all shadow-xl backdrop-blur-sm" title="Previous Product (Left Arrow)">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <!-- Next Button (>) -->
                <button onclick="nextZoomProduct()" class="absolute right-3 sm:right-5 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-slate-900/80 text-white hover:bg-pw-gold hover:scale-110 border border-slate-700 cursor-pointer flex items-center justify-center text-base sm:text-lg transition-all shadow-xl backdrop-blur-sm" title="Next Product (Right Arrow)">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>

                <!-- Zoomable Image Container -->
                <div class="w-full h-full flex items-center justify-center overflow-auto cursor-zoom-in" id="zoomImageWrapper" onclick="toggleProductImageZoomClick()">
                    <img id="zoomModalImg" src="" alt="Product Detail View" class="max-w-full max-h-[70vh] object-contain transition-transform duration-300 ease-out shadow-2xl rounded-xl">
                </div>

                <!-- Zoom Indicator Helper Overlay -->
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 z-10 bg-slate-900/80 text-white text-[11px] font-bold px-3 py-1.5 rounded-full border border-slate-700 backdrop-blur-sm flex items-center gap-1.5 opacity-80 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-magnifying-glass-plus text-pw-gold"></i> Click image or use +/- buttons to Zoom
                </div>
            </div>

            <!-- Right: Product Details & Inquiry CTA -->
            <div class="lg:col-span-4 p-6 sm:p-7 bg-white flex flex-col justify-between border-t lg:border-t-0 lg:border-l border-slate-200 overflow-y-auto">
                <div class="space-y-4">
                    <div>
                        <span class="text-xs font-extrabold text-slate-400 uppercase tracking-wider block mb-1" id="zoomModalSubCategory">Packaging Category</span>
                        <h2 class="text-xl sm:text-2xl font-black text-slate-900 leading-tight" id="zoomModalTitle">Product Name</h2>
                    </div>

                    <!-- Price & MOQ Box -->
                    <div class="bg-orange-50/60 rounded-2xl p-4 border border-orange-200/80 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Wholesale Price:</span>
                            <span class="text-lg font-black text-orange-600" id="zoomModalPrice">₹4.50 - ₹7.00 / pc</span>
                        </div>
                        <div class="flex items-center justify-between pt-2 border-t border-orange-200/60">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">MOQ (Min Order):</span>
                            <span class="text-xs font-extrabold text-slate-900" id="zoomModalMoq">500 Pcs</span>
                        </div>
                    </div>

                    <!-- Product Description -->
                    <div>
                        <h4 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider mb-1.5">Specifications & Features:</h4>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed" id="zoomModalDesc">
                            Food-grade, microwavable, leak-proof packaging container designed for delivery and takeaway.
                        </p>
                    </div>
                </div>

                <!-- CTA Inquire Buttons -->
                <div class="pt-6 mt-6 border-t border-slate-100 space-y-2.5">
                    <button onclick="inquireFromZoomModal()" class="w-full py-3.5 px-4 bg-pw-gold hover:bg-pw-goldHover text-white font-extrabold text-sm rounded-xl border-none cursor-pointer flex items-center justify-center gap-2 transition-all shadow-md shadow-orange-500/20">
                        <i class="fa-brands fa-whatsapp text-lg"></i> Get Quote for this Product
                    </button>
                    <button onclick="closeProductZoomModal()" class="w-full py-2.5 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl border-none cursor-pointer transition-colors">
                        Continue Browsing
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
