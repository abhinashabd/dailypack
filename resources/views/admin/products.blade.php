@extends('layouts.admin')

@section('title', 'Manage Products | DailyPack Admin')
@section('page_title', 'Products Management')

@section('admin_content')
<!-- Top Bar with Search & Add Product Button -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">
    <div class="relative w-full sm:w-80">
        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
        <input type="text" id="adminProductSearch" onkeyup="renderAdminProductsPage()" placeholder="Search products..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/10">
    </div>

    <button onclick="openAddProductModal()" class="w-full sm:w-auto bg-pw-gold hover:bg-pw-goldHover text-white font-extrabold text-xs px-5 py-3 rounded-xl border-none cursor-pointer transition-all shadow-md shadow-orange-500/20 inline-flex items-center justify-center gap-2">
        <i class="fa-solid fa-plus text-sm"></i> Add New Product
    </button>
</div>

<!-- Products Table Card -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 uppercase tracking-wider font-bold">
                <tr>
                    <th class="py-4 px-6">Image</th>
                    <th class="py-4 px-6">Product Title</th>
                    <th class="py-4 px-6">Category</th>
                    <th class="py-4 px-6">Price Range</th>
                    <th class="py-4 px-6">MOQ</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody id="adminProductsTable" class="divide-y divide-slate-100 font-medium text-slate-700">
                <!-- Dynamic Content -->
            </tbody>
        </table>
    </div>
</div>

<!-- Add / Edit Product Modal -->
<div id="productModal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl max-w-xl w-full max-h-[90vh] overflow-y-auto p-6 shadow-2xl border border-slate-200 relative">
        <div class="flex items-center justify-between pb-4 mb-4 border-b border-slate-200">
            <h3 id="productModalTitle" class="text-lg font-black text-slate-900">Add New Product</h3>
            <button onclick="closeProductModal()" class="w-8 h-8 rounded-full bg-slate-100 border-none text-slate-500 hover:text-slate-900 cursor-pointer flex items-center justify-center">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="productForm" onsubmit="saveProduct(event)" class="space-y-4">
            <input type="hidden" id="editProductId">

            <div>
                <label class="block text-xs font-bold text-slate-800 mb-1">Product Title *</label>
                <input type="text" id="prodName" required placeholder="e.g. 500ml Round Clear Container with Lid" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1">Category *</label>
                    <select id="prodCategory" required class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold bg-white">
                        <!-- Populated dynamically -->
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1">Price Range (Auto ₹ Symbol)</label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-pw-gold font-extrabold text-sm select-none">₹</span>
                        <input type="text" id="prodPrice" placeholder="e.g. 4.50 - 7.00 / pc (Just type numbers)" class="w-full pl-9 pr-3.5 py-2.5 border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/10">
                    </div>
                    <span class="text-[10px] text-slate-500 font-medium mt-1 block">Just type numbers (e.g. <code class="bg-slate-100 text-orange-600 px-1 py-0.5 rounded font-bold">4.50-7.00</code>), ₹ symbol is added automatically!</span>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1">Minimum Order Quantity (MOQ)</label>
                    <input type="text" id="prodMoq" placeholder="e.g. 500 Pcs" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1">Image Source Type</label>
                    <select id="imageInputType" onchange="toggleImageType()" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold bg-white">
                        <option value="upload">Upload File from Device 📁</option>
                        <option value="url">External Image URL 🔗</option>
                    </select>
                </div>
            </div>

            <!-- Image File Upload Input -->
            <div id="fileUploadContainer">
                <label class="block text-xs font-bold text-slate-800 mb-1">Upload Product Image</label>
                <input type="file" id="prodImageFile" accept="image/*" onchange="previewUploadedImage(event)" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-pw-gold hover:file:bg-orange-100 cursor-pointer">
            </div>

            <!-- Image URL Input (Fallback option) -->
            <div id="urlUploadContainer" class="hidden">
                <label class="block text-xs font-bold text-slate-800 mb-1">Image URL</label>
                <input type="url" id="prodImageUrl" placeholder="https://images.unsplash.com/..." class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold">
            </div>

            <!-- Image Preview Box -->
            <div>
                <label class="block text-xs font-bold text-slate-800 mb-1">Image Preview</label>
                <div class="w-24 h-24 rounded-xl border border-slate-200 bg-slate-50 overflow-hidden flex items-center justify-center">
                    <img id="imagePreview" src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-800 mb-1">Description Content</label>
                <textarea id="prodDescription" rows="3" placeholder="Enter details about material, capacity, microwavable specs..." class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold"></textarea>
            </div>

            <button type="submit" class="w-full py-3.5 bg-pw-gold hover:bg-pw-goldHover text-white font-extrabold text-xs rounded-xl border-none cursor-pointer transition-all shadow-md shadow-orange-500/20">
                Save Product
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let currentBase64Image = '';

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

    function renderAdminProductsPage() {
        const tbody = document.getElementById('adminProductsTable');
        if (!tbody) return;
        const q = (document.getElementById('adminProductSearch').value || '').toLowerCase().trim();

        tbody.innerHTML = '';
        const filtered = adminProducts.filter(p => !q || p.name.toLowerCase().includes(q));

        if (filtered.length === 0) {
            tbody.innerHTML = `<tr><td colspan="6" class="py-8 text-center text-slate-400 font-medium">No products found matching "${q}"</td></tr>`;
            return;
        }

        filtered.forEach(p => {
            const cat = adminCategories.find(c => c.id == p.category_id) || { name: 'Packaging' };
            const formattedPrice = formatProductPrice(p.price_range);
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-slate-50 transition-colors';
            tr.innerHTML = `
                <td class="py-3 px-6"><img src="${p.image}" class="w-10 h-10 rounded-lg object-cover bg-slate-100 border border-slate-200"></td>
                <td class="py-3 px-6 font-bold text-slate-900">${p.name}</td>
                <td class="py-3 px-6"><span class="bg-slate-100 text-slate-700 px-2.5 py-1 rounded-full text-[11px] font-bold">${cat.name}</span></td>
                <td class="py-3 px-6 text-orange-600 font-bold">${formattedPrice}</td>
                <td class="py-3 px-6 font-semibold">${p.moq || '500 Pcs'}</td>
                <td class="py-3 px-6 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <button onclick="editProduct(${p.id})" class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 hover:bg-slate-200 flex items-center justify-center border border-slate-200 cursor-pointer shadow-xs transition-colors" title="Edit Product"><i class="fa-solid fa-pen text-xs"></i></button>
                        <button onclick="deleteProduct(${p.id})" class="w-8 h-8 rounded-full bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center border border-red-200 cursor-pointer shadow-xs transition-colors" title="Delete Product"><i class="fa-solid fa-trash-can text-xs"></i></button>
                    </div>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    function populateCategoryOptions() {
        const select = document.getElementById('prodCategory');
        if (!select) return;
        select.innerHTML = '';
        adminCategories.forEach(c => {
            const opt = document.createElement('option');
            opt.value = c.id;
            opt.innerText = c.name;
            select.appendChild(opt);
        });
    }

    function toggleImageType() {
        const type = document.getElementById('imageInputType').value;
        if (type === 'upload') {
            document.getElementById('fileUploadContainer').classList.remove('hidden');
            document.getElementById('urlUploadContainer').classList.add('hidden');
        } else {
            document.getElementById('fileUploadContainer').classList.add('hidden');
            document.getElementById('urlUploadContainer').classList.remove('hidden');
        }
    }

    function previewUploadedImage(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                currentBase64Image = evt.target.result;
                document.getElementById('imagePreview').src = currentBase64Image;
            };
            reader.readAsDataURL(file);
        }
    }

    function openAddProductModal() {
        document.getElementById('productModalTitle').innerText = 'Add New Product';
        document.getElementById('editProductId').value = '';
        document.getElementById('productForm').reset();
        currentBase64Image = '';
        document.getElementById('imagePreview').src = 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80';
        populateCategoryOptions();
        document.getElementById('productModal').classList.remove('hidden');
    }

    function editProduct(id) {
        const p = adminProducts.find(item => item.id == id);
        if (!p) return;
        document.getElementById('productModalTitle').innerText = 'Edit Product';
        document.getElementById('editProductId').value = p.id;
        document.getElementById('prodName').value = p.name;
        populateCategoryOptions();
        document.getElementById('prodCategory').value = p.category_id;
        
        // Strip ₹ so user sees clean editable numbers in field with ₹ badge
        let cleanPrice = (p.price_range || '').replace(/₹/g, '').replace(/\bRs\.?\s*/gi, '').trim();
        document.getElementById('prodPrice').value = cleanPrice;
        document.getElementById('prodMoq').value = p.moq || '';
        document.getElementById('prodDescription').value = p.description || '';
        
        currentBase64Image = p.image || '';
        document.getElementById('imagePreview').src = p.image || 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80';

        document.getElementById('productModal').classList.remove('hidden');
    }

    function closeProductModal() {
        document.getElementById('productModal').classList.add('hidden');
    }

    function saveProduct(e) {
        e.preventDefault();
        const editId = document.getElementById('editProductId').value;
        const name = document.getElementById('prodName').value;
        const catId = parseInt(document.getElementById('prodCategory').value);
        
        // Auto format price with ₹ symbol
        const rawPrice = document.getElementById('prodPrice').value;
        const price = formatProductPrice(rawPrice);
        const moq = document.getElementById('prodMoq').value || '500 Pcs';
        const desc = document.getElementById('prodDescription').value || '';
        
        const type = document.getElementById('imageInputType').value;
        let imageSrc = currentBase64Image;
        if (type === 'url') {
            imageSrc = document.getElementById('prodImageUrl').value || currentBase64Image;
        }
        if (!imageSrc) imageSrc = 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80';

        if (editId) {
            // Update existing
            const idx = adminProducts.findIndex(p => p.id == editId);
            if (idx !== -1) {
                adminProducts[idx] = {
                    ...adminProducts[idx],
                    name,
                    category_id: catId,
                    price_range: price,
                    moq,
                    description: desc,
                    image: imageSrc
                };
            }
        } else {
            // Add new
            const newId = Date.now();
            adminProducts.unshift({
                id: newId,
                name,
                category_id: catId,
                price_range: price,
                moq,
                description: desc,
                image: imageSrc
            });
        }

        saveAdminState();
        closeProductModal();
        renderAdminProductsPage();
    }

    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            adminProducts = adminProducts.filter(p => p.id != id);
            saveAdminState();
            renderAdminProductsPage();
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        populateCategoryOptions();
        renderAdminProductsPage();
    });
</script>
@endpush
