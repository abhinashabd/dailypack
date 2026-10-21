<!-- Customer Inquiry Modal (Tailwind CSS) -->
<div class="fixed inset-0 w-screen h-screen bg-slate-950/75 backdrop-blur-md z-50 flex items-center justify-center p-4 sm:p-5 transition-all duration-300 invisible opacity-0" id="inquiryModal">
    <div class="bg-white rounded-2xl sm:rounded-3xl w-full max-w-2xl max-h-[90vh] overflow-y-auto relative shadow-2xl border border-slate-200">
        <!-- Header -->
        <div class="px-6 py-4.5 border-b border-slate-200 flex items-center justify-between sticky top-0 bg-white z-10">
            <div>
                <h3 class="text-lg font-black text-slate-900 m-0">Packaging Quote & Sample Inquiry</h3>
                <p class="text-xs text-slate-500 font-medium mt-0.5">Type your custom product requirement or choose from categories</p>
            </div>
            <button class="bg-slate-100 border-none w-8 h-8 rounded-full flex items-center justify-center cursor-pointer text-slate-500 hover:bg-slate-200 hover:text-slate-900 transition-colors" onclick="closeInquiryModal()"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <div class="p-6">
            <form id="inquiryForm" onsubmit="handleInquirySubmit(event)" class="space-y-4">
                <input type="hidden" id="inquiryProductId">
                <input type="hidden" id="inquiryProductNameInput">
                <input type="hidden" id="inquiryCategoryNameInput">

                <!-- Category & Product Selector Cards Grid -->
                <div class="bg-slate-50 p-4 sm:p-5 rounded-2xl border border-slate-200/80 space-y-4">
                    <!-- Category Dropdown -->
                    <div>
                        <label class="block text-xs font-extrabold text-slate-800 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                            <i class="fa-solid fa-layer-group text-pw-gold"></i> Packaging Category (Optional)
                        </label>
                        <select id="inquiryCategorySelect" onchange="onInquiryCategoryChange()" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-xs sm:text-sm font-semibold outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/10 bg-white text-slate-900 cursor-pointer">
                            <option value="">-- Select Category (e.g. Plastic Containers, Paper Bowls...) --</option>
                        </select>
                    </div>

                    <!-- Custom Type Product Field (Primary Input) -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="block text-xs font-extrabold text-slate-800 uppercase tracking-wider flex items-center gap-1.5">
                                <i class="fa-solid fa-pen-to-square text-pw-gold"></i> Product / Item Name (Custom Type) *
                            </label>
                            <span class="text-[11px] text-pw-gold font-bold">Type any product freely</span>
                        </div>
                        
                        <div class="space-y-2">
                            <!-- Custom Text Input Box -->
                            <div class="relative">
                                <i class="fa-solid fa-box-open absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                                <input type="text" id="customProductNameInput" oninput="onCustomProductInput()" class="w-full pl-10 pr-4 py-3 border-2 border-orange-200 focus:border-pw-gold rounded-xl text-xs sm:text-sm font-semibold outline-none focus:ring-4 focus:ring-orange-500/10 bg-white text-slate-900 placeholder:text-slate-400 placeholder:font-normal shadow-xs" placeholder="e.g. 500ml container with logo print, 9 inch pizza box..." required>
                            </div>

                            <!-- Product Dropdown (Filtered by Category) -->
                            <div>
                                <select id="inquiryProductSelect" onchange="onInquiryProductChange()" class="w-full px-3.5 py-2 border border-slate-300 rounded-xl text-xs sm:text-sm font-medium outline-none focus:border-pw-gold bg-slate-50 text-slate-700 cursor-pointer">
                                    <option value="">-- Or Select from Popular Products List --</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Selected Product Details Preview Box -->
                    <div id="inquiryProductPreviewBox" class="hidden flex items-center gap-4 bg-white p-3.5 rounded-xl border border-slate-200/80 shadow-xs">
                        <img src="" id="inquiryProductImg" class="w-14 h-14 rounded-lg object-cover border border-slate-100 shrink-0" alt="Product Preview">
                        <div class="min-w-0 flex-1">
                            <div class="text-[11px] font-extrabold text-pw-gold uppercase tracking-wider" id="inquiryProductCategory">Category</div>
                            <h4 class="text-sm font-black text-slate-900 m-0 truncate" id="inquiryProductName">Product Name</h4>
                            <div class="text-xs text-slate-500 font-medium mt-0.5" id="inquiryProductPrice">Wholesale: On Request</div>
                        </div>
                    </div>
                </div>

                <!-- Customer Contact Details -->
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1.5">Your Name *</label>
                    <input type="text" id="customerName" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/10 font-semibold" placeholder="Enter your full name" required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1.5">WhatsApp / Phone *</label>
                        <input type="tel" id="customerPhone" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/10 font-semibold" placeholder="e.g. 9876543210" required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1.5">Email Address</label>
                        <input type="email" id="customerEmail" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/10 font-semibold" placeholder="name@company.com">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1.5">Required Quantity *</label>
                    <input type="text" id="orderQuantity" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/10 font-semibold" placeholder="e.g. 500 Pcs, 2000 Pcs, Sample Box" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1.5">Custom Notes / Specifications</label>
                    <textarea id="customerMessage" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/10 font-medium" rows="3" placeholder="Mention logo printing, custom sizes or delivery location..."></textarea>
                </div>

                <button type="submit" class="w-full py-3.5 px-4 bg-pw-gold text-white font-extrabold text-sm rounded-xl border-none cursor-pointer flex items-center justify-center gap-2 hover:bg-pw-goldHover transition-all shadow-md shadow-orange-500/20 mt-2">
                    <i class="fa-brands fa-whatsapp text-lg"></i> Submit Inquiry & Send to WhatsApp (73039 11622)
                </button>
            </form>
        </div>
    </div>
</div>
