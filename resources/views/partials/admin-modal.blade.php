<!-- Admin Modal (Tailwind CSS) -->
<div class="fixed inset-0 w-screen h-screen bg-slate-950/75 backdrop-blur-md z-50 flex items-center justify-center p-5 transition-all duration-300 invisible opacity-0" id="adminModal">
    <div class="bg-white rounded-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto relative shadow-2xl border border-slate-200">
        <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-lg font-extrabold text-slate-900 m-0" id="adminModalTitle">Admin Login</h3>
            <button class="bg-slate-100 border-none w-8 h-8 rounded-full flex items-center justify-center cursor-pointer text-slate-500 hover:bg-slate-200 hover:text-slate-900 transition-colors" onclick="closeAdminModal()"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="p-6">
            
            <!-- Login View -->
            <div id="adminLoginView" class="max-w-md mx-auto my-5">
                <form id="adminLoginForm" onsubmit="handleAdminLogin(event)" class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1.5">Admin Email / Username</label>
                        <input type="text" id="adminEmail" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-lg text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-amber-500/10" value="admin@dailypack.com" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1.5">Admin Password</label>
                        <div class="relative">
                            <input type="password" id="adminPassword" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-lg text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-amber-500/10 pr-10" value="admin123" required>
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 bg-none border-none cursor-pointer text-slate-500 text-sm" onclick="togglePasswordVisibility()">
                                <i class="fa-solid fa-eye" id="passwordEyeIcon"></i>
                            </button>
                        </div>
                        <span class="text-[11px] text-slate-500 mt-1 block">Click eye icon to verify typed password. (Default: <b>admin123</b>)</span>
                    </div>

                    <button type="submit" class="w-full py-3 px-4 bg-pw-gold text-slate-900 font-extrabold text-sm rounded-lg border-none cursor-pointer flex items-center justify-center hover:bg-pw-goldHover transition-all shadow-md shadow-amber-500/20 mt-2">
                        Login to Admin Panel
                    </button>
                </form>
            </div>

            <!-- Admin Panel Dashboard View -->
            <div id="adminPanelView" class="hidden">
                <div class="flex justify-between items-center mb-5 bg-slate-50 p-3.5 rounded-xl border border-slate-200">
                    <span class="text-sm text-slate-700">Logged in as: <b class="text-slate-900">Admin (dailypack DB)</b></span>
                    <button class="px-3.5 py-1.5 text-xs font-bold text-slate-900 bg-white border border-slate-300 rounded-lg hover:bg-slate-100 transition-colors" onclick="adminLogout()">Logout</button>
                </div>

                <div class="flex gap-2.5 mb-5 border-b border-slate-200">
                    <button class="px-4 py-2 rounded-t-lg bg-slate-900 text-white text-xs font-bold border-none cursor-pointer" onclick="switchAdminTab('productsTab', this)">Products</button>
                    <button class="px-4 py-2 rounded-t-lg bg-slate-100 text-slate-700 hover:bg-slate-200 text-xs font-bold border-none cursor-pointer" onclick="switchAdminTab('categoriesTab', this)">Categories</button>
                    <button class="px-4 py-2 rounded-t-lg bg-slate-100 text-slate-700 hover:bg-slate-200 text-xs font-bold border-none cursor-pointer" onclick="switchAdminTab('inquiriesTab', this)">Customer Inquiries</button>
                </div>

                <div id="productsTab" class="admin-tab-content">
                    <div class="flex justify-between items-center mb-3.5">
                        <h4 class="text-base font-extrabold text-slate-900 m-0">Products Inventory</h4>
                        <button class="px-3 py-1.5 bg-pw-gold text-slate-900 text-xs font-bold rounded-lg hover:bg-pw-goldHover transition-colors border-none cursor-pointer" onclick="openAddProductModal()">+ Add Product</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-slate-100 text-slate-700 border-b border-slate-200">
                                    <th class="p-2.5">Image</th>
                                    <th class="p-2.5">Product Name</th>
                                    <th class="p-2.5">Category ID</th>
                                    <th class="p-2.5">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="adminProductsTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <div id="categoriesTab" class="admin-tab-content hidden">
                    <div class="flex justify-between items-center mb-3.5">
                        <h4 class="text-base font-extrabold text-slate-900 m-0">Categories</h4>
                        <button class="px-3 py-1.5 bg-pw-gold text-slate-900 text-xs font-bold rounded-lg hover:bg-pw-goldHover transition-colors border-none cursor-pointer" onclick="openAddCategoryModal()">+ Add Category</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-slate-100 text-slate-700 border-b border-slate-200">
                                    <th class="p-2.5">Icon</th>
                                    <th class="p-2.5">Category Name</th>
                                    <th class="p-2.5">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="adminCategoriesTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <div id="inquiriesTab" class="admin-tab-content hidden">
                    <h4 class="text-base font-extrabold text-slate-900 mb-3.5">Inquiries Received</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-slate-100 text-slate-700 border-b border-slate-200">
                                    <th class="p-2.5">Date</th>
                                    <th class="p-2.5">Product</th>
                                    <th class="p-2.5">Customer</th>
                                    <th class="p-2.5">Phone</th>
                                    <th class="p-2.5">Qty</th>
                                </tr>
                            </thead>
                            <tbody id="adminInquiriesTableBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
