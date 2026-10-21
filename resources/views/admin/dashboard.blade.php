@extends('layouts.admin')

@section('title', 'Admin Overview | DailyPack Solution')
@section('page_title', 'Dashboard Overview')

@section('admin_content')
<!-- Metric Summary Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Products Card -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Total Products</div>
            <div class="text-3xl font-black text-slate-900" id="dashTotalProducts">0</div>
            <div class="text-[11px] font-semibold text-emerald-600 mt-1"><i class="fa-solid fa-arrow-up text-[10px]"></i> Live on Storefront</div>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-orange-500/10 text-pw-gold flex items-center justify-center text-xl shrink-0">
            <i class="fa-solid fa-box-archive"></i>
        </div>
    </div>

    <!-- Total Categories Card -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Active Categories</div>
            <div class="text-3xl font-black text-slate-900" id="dashTotalCategories">0</div>
            <div class="text-[11px] font-semibold text-blue-600 mt-1"><i class="fa-solid fa-check text-[10px]"></i> Food Packaging Types</div>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-blue-500/10 text-blue-600 flex items-center justify-center text-xl shrink-0">
            <i class="fa-solid fa-layer-group"></i>
        </div>
    </div>

    <!-- Customer Inquiries Card -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Customer Inquiries</div>
            <div class="text-3xl font-black text-slate-900" id="dashTotalInquiries">0</div>
            <div class="text-[11px] font-semibold text-orange-600 mt-1"><i class="fa-solid fa-whatsapp text-[10px]"></i> Direct WhatsApp Queries</div>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center text-xl shrink-0">
            <i class="fa-solid fa-comments"></i>
        </div>
    </div>

    <!-- System Status Card -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Platform Status</div>
            <div class="text-lg font-black text-emerald-600">Active & Syncing</div>
            <div class="text-[11px] font-semibold text-slate-400 mt-1">Real-time Local Storage</div>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-purple-500/10 text-purple-600 flex items-center justify-center text-xl shrink-0">
            <i class="fa-solid fa-server"></i>
        </div>
    </div>
</div>

<!-- Quick Action Banner -->
<div class="bg-slate-900 text-white rounded-2xl p-6 md:p-8 mb-8 flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl relative overflow-hidden">
    <div class="relative z-10 max-w-xl">
        <span class="inline-block bg-pw-gold text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full mb-3">Quick Management</span>
        <h3 class="text-2xl font-black text-white mb-2">Manage Products & Categories Dynamically</h3>
        <p class="text-xs sm:text-sm text-slate-300 font-medium">Add new food containers, paper cups, pizza boxes or edit descriptions & upload images directly from the admin panel.</p>
    </div>
    <div class="flex items-center gap-3 shrink-0 relative z-10">
        <a href="/admin/products" class="bg-pw-gold hover:bg-pw-goldHover text-white font-extrabold text-xs px-5 py-3 rounded-xl transition-all shadow-md shadow-orange-500/20 text-decoration-none">
            <i class="fa-solid fa-plus mr-1"></i> Add Product
        </a>
        <a href="/admin/categories" class="bg-slate-800 hover:bg-slate-700 text-white font-extrabold text-xs px-5 py-3 rounded-xl transition-all border border-slate-700 text-decoration-none">
            <i class="fa-solid fa-folder-plus mr-1"></i> Add Category
        </a>
    </div>
</div>

<!-- Recent Inquiries & Catalog Quick Preview -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    <!-- Left: Recent Inquiries Table -->
    <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-base font-extrabold text-slate-900">Recent Customer Inquiries</h3>
            <a href="/admin/inquiries" class="text-xs font-bold text-pw-gold hover:underline">View All →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-slate-200 text-slate-500 uppercase tracking-wider font-bold">
                        <th class="pb-3">Date</th>
                        <th class="pb-3">Customer</th>
                        <th class="pb-3">Product</th>
                        <th class="pb-3">Qty</th>
                    </tr>
                </thead>
                <tbody id="dashInquiriesTableBody" class="divide-y divide-slate-100">
                    <!-- Dynamic Rows -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right: Inventory Overview -->
    <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-base font-extrabold text-slate-900">Latest Products</h3>
            <a href="/admin/products" class="text-xs font-bold text-pw-gold hover:underline">Manage Products →</a>
        </div>
        <div id="dashProductsList" class="space-y-3">
            <!-- Dynamic Items -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function loadDashboardData() {
        document.getElementById('dashTotalProducts').innerText = adminProducts.length;
        document.getElementById('dashTotalCategories').innerText = adminCategories.length;
        document.getElementById('dashTotalInquiries').innerText = adminInquiries.length;

        // Render recent inquiries
        const inqBody = document.getElementById('dashInquiriesTableBody');
        if (inqBody) {
            inqBody.innerHTML = '';
            if (adminInquiries.length === 0) {
                inqBody.innerHTML = `<tr><td colspan="4" class="py-6 text-center text-slate-400 font-medium">No inquiries received yet.</td></tr>`;
            } else {
                adminInquiries.slice(0, 5).forEach(inq => {
                    const tr = document.createElement('tr');
                    tr.className = 'hover:bg-slate-50';
                    tr.innerHTML = `
                        <td class="py-3 text-slate-500 font-medium">${new Date(inq.created_at || Date.now()).toLocaleDateString()}</td>
                        <td class="py-3 font-bold text-slate-800">${inq.customer_name}</td>
                        <td class="py-3 font-semibold text-slate-700">${inq.product_name}</td>
                        <td class="py-3"><span class="bg-orange-50 text-orange-600 font-bold px-2 py-0.5 rounded text-[11px]">${inq.quantity}</span></td>
                    `;
                    inqBody.appendChild(tr);
                });
            }
        }

        // Render latest products list
        const prodList = document.getElementById('dashProductsList');
        if (prodList) {
            prodList.innerHTML = '';
            adminProducts.slice(0, 5).forEach(p => {
                const item = document.createElement('div');
                item.className = 'flex items-center gap-3 p-2.5 rounded-xl border border-slate-100 hover:bg-slate-50 transition-colors';
                item.innerHTML = `
                    <img src="${p.image}" class="w-10 h-10 rounded-lg object-cover bg-slate-100 shrink-0">
                    <div class="flex-1 min-w-0">
                        <div class="text-xs font-extrabold text-slate-900 truncate">${p.name}</div>
                        <div class="text-[11px] text-slate-500 font-medium">${formatProductPrice(p.price_range)}</div>
                    </div>
                `;
                prodList.appendChild(item);
            });
        }
    }

    document.addEventListener('DOMContentLoaded', loadDashboardData);
</script>
@endpush
