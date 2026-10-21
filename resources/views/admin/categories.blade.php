@extends('layouts.admin')

@section('title', 'Manage Categories | DailyPack Admin')
@section('page_title', 'Categories Management')

@section('admin_content')
<!-- Top Bar with Search & Add Category Button -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">
    <div class="relative w-full sm:w-80">
        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
        <input type="text" id="adminCategorySearch" onkeyup="renderAdminCategoriesPage()" placeholder="Search categories..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/10">
    </div>

    <button onclick="openAddCategoryModal()" class="w-full sm:w-auto bg-pw-gold hover:bg-pw-goldHover text-white font-extrabold text-xs px-5 py-3 rounded-xl border-none cursor-pointer transition-all shadow-md shadow-orange-500/20 inline-flex items-center justify-center gap-2">
        <i class="fa-solid fa-folder-plus text-sm"></i> Add New Category
    </button>
</div>

<!-- Categories Cards Grid Container (Identical to Storefront 3-Column Horizontal Grid) -->
<div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mb-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 -mr-[1px] -mb-[1px]" id="adminCategoriesGrid">
        <!-- Dynamic Cards -->
    </div>
</div>

<!-- Add / Edit Category Modal -->
<div id="categoryModal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto p-6 shadow-2xl border border-slate-200 relative">
        <div class="flex items-center justify-between pb-4 mb-4 border-b border-slate-200">
            <h3 id="categoryModalTitle" class="text-lg font-black text-slate-900">Add New Category</h3>
            <button onclick="closeCategoryModal()" class="w-8 h-8 rounded-full bg-slate-100 border-none text-slate-500 hover:text-slate-900 cursor-pointer flex items-center justify-center">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="categoryForm" onsubmit="saveCategory(event)" class="space-y-4">
            <input type="hidden" id="editCategoryId">

            <div>
                <label class="block text-xs font-bold text-slate-800 mb-1">Category Title *</label>
                <input type="text" id="catName" required placeholder="e.g. Plastic food packaging containers" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-800 mb-1">Image Source Type</label>
                <select id="catImageType" onchange="toggleCatImageType()" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold bg-white">
                    <option value="upload">Upload File from Device 📁</option>
                    <option value="url">External Image URL 🔗</option>
                </select>
            </div>

            <!-- Image File Upload Input -->
            <div id="catFileUploadContainer">
                <label class="block text-xs font-bold text-slate-800 mb-1">Upload Category Cover Image</label>
                <input type="file" id="catImageFile" accept="image/*" onchange="previewCatImage(event)" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-pw-gold hover:file:bg-orange-100 cursor-pointer">
            </div>

            <!-- Image URL Input -->
            <div id="catUrlUploadContainer" class="hidden">
                <label class="block text-xs font-bold text-slate-800 mb-1">Image URL</label>
                <input type="url" id="catImageUrl" placeholder="https://images.unsplash.com/..." class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold">
            </div>

            <!-- Image Preview Box -->
            <div>
                <label class="block text-xs font-bold text-slate-800 mb-1">Image Preview</label>
                <div class="w-24 h-24 rounded-xl border border-slate-200 bg-slate-50 overflow-hidden flex items-center justify-center">
                    <img id="catImagePreview" src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-800 mb-1">Description Content</label>
                <textarea id="catDescription" rows="3" placeholder="Enter short category description..." class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold"></textarea>
            </div>

            <button type="submit" class="w-full py-3.5 bg-pw-gold hover:bg-pw-goldHover text-white font-extrabold text-xs rounded-xl border-none cursor-pointer transition-all shadow-md shadow-orange-500/20">
                Save Category
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let currentCatBase64 = '';

    function renderAdminCategoriesPage() {
        const grid = document.getElementById('adminCategoriesGrid');
        if (!grid) return;
        const q = (document.getElementById('adminCategorySearch').value || '').toLowerCase().trim();

        grid.innerHTML = '';
        const filtered = adminCategories.filter(c => !q || c.name.toLowerCase().includes(q));

        if (filtered.length === 0) {
            grid.innerHTML = `<div class="col-span-full py-12 text-center text-slate-400 font-medium">No categories found matching "${q}"</div>`;
            return;
        }

        filtered.forEach(c => {
            const prodCount = adminProducts.filter(p => p.category_id == c.id).length;
            const card = document.createElement('div');
            card.className = 'group flex bg-white border-b border-r border-slate-200 overflow-hidden relative min-h-[140px] hover:bg-slate-50/80 transition-colors';
            card.innerHTML = `
                <div class="w-1/3 min-w-[110px] max-w-[135px] bg-slate-50/80 overflow-hidden relative border-r border-slate-100 shrink-0 flex items-center justify-center p-2.5">
                    <img src="${c.image || 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80'}" alt="${c.name}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" loading="lazy">
                </div>
                <div class="w-2/3 p-4 flex flex-col justify-between flex-grow">
                    <div>
                        <h3 class="text-sm font-extrabold text-slate-900 group-hover:text-orange-600 transition-colors line-clamp-1 mb-1">${c.name}</h3>
                        <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed mb-3">${c.description || 'Premium food packaging.'}</p>
                    </div>
                    <div class="flex items-center justify-between pt-2 border-t border-slate-100 mt-auto">
                        <span class="text-[10px] font-extrabold text-sky-600 tracking-wider uppercase">${prodCount} PRODUCTS</span>
                        <div class="flex items-center gap-1.5">
                            <button onclick="editCategory(${c.id})" class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 hover:bg-slate-200 flex items-center justify-center border border-slate-200 cursor-pointer shadow-xs transition-colors" title="Edit Category"><i class="fa-solid fa-pen text-xs"></i></button>
                            <button onclick="deleteCategory(${c.id})" class="w-8 h-8 rounded-full bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center border border-red-200 cursor-pointer shadow-xs transition-colors" title="Delete Category"><i class="fa-solid fa-trash-can text-xs"></i></button>
                        </div>
                    </div>
                </div>
            `;
            grid.appendChild(card);
        });
    }

    function toggleCatImageType() {
        const type = document.getElementById('catImageType').value;
        if (type === 'upload') {
            document.getElementById('catFileUploadContainer').classList.remove('hidden');
            document.getElementById('catUrlUploadContainer').classList.add('hidden');
        } else {
            document.getElementById('catFileUploadContainer').classList.add('hidden');
            document.getElementById('catUrlUploadContainer').classList.remove('hidden');
        }
    }

    function previewCatImage(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                currentCatBase64 = evt.target.result;
                document.getElementById('catImagePreview').src = currentCatBase64;
            };
            reader.readAsDataURL(file);
        }
    }

    function openAddCategoryModal() {
        document.getElementById('categoryModalTitle').innerText = 'Add New Category';
        document.getElementById('editCategoryId').value = '';
        document.getElementById('categoryForm').reset();
        currentCatBase64 = '';
        document.getElementById('catImagePreview').src = 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80';
        document.getElementById('categoryModal').classList.remove('hidden');
    }

    function editCategory(id) {
        const c = adminCategories.find(item => item.id == id);
        if (!c) return;
        document.getElementById('categoryModalTitle').innerText = 'Edit Category';
        document.getElementById('editCategoryId').value = c.id;
        document.getElementById('catName').value = c.name;
        document.getElementById('catDescription').value = c.description || '';
        
        currentCatBase64 = c.image || '';
        document.getElementById('catImagePreview').src = c.image || 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80';

        document.getElementById('categoryModal').classList.remove('hidden');
    }

    function closeCategoryModal() {
        document.getElementById('categoryModal').classList.add('hidden');
    }

    function saveCategory(e) {
        e.preventDefault();
        const editId = document.getElementById('editCategoryId').value;
        const name = document.getElementById('catName').value;
        const desc = document.getElementById('catDescription').value || '';
        
        const type = document.getElementById('catImageType').value;
        let imageSrc = currentCatBase64;
        if (type === 'url') {
            imageSrc = document.getElementById('catImageUrl').value || currentCatBase64;
        }
        if (!imageSrc) imageSrc = 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80';

        if (editId) {
            // Update existing
            const idx = adminCategories.findIndex(c => c.id == editId);
            if (idx !== -1) {
                adminCategories[idx] = {
                    ...adminCategories[idx],
                    name,
                    description: desc,
                    image: imageSrc
                };
            }
        } else {
            // Add new
            const newId = Date.now();
            adminCategories.unshift({
                id: newId,
                name,
                description: desc,
                image: imageSrc
            });
        }

        saveAdminState();
        closeCategoryModal();
        renderAdminCategoriesPage();
    }

    function deleteCategory(id) {
        if (confirm('Are you sure you want to delete this category?')) {
            adminCategories = adminCategories.filter(c => c.id != id);
            saveAdminState();
            renderAdminCategoriesPage();
        }
    }

    document.addEventListener('DOMContentLoaded', renderAdminCategoriesPage);
</script>
@endpush
