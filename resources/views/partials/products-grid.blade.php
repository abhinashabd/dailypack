<!-- Products Showcase Section (Tailwind CSS) -->
<section class="max-w-[1380px] mx-auto my-8 px-6 sm:px-8 py-12 bg-white rounded-2xl border border-slate-200 shadow-sm" id="productsSection">
    <div class="text-center max-w-2xl mx-auto mb-9">
        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-3 tracking-tight">Featured Packaging Inventory</h2>
        <p class="text-slate-600 text-base">Click any product to submit an instant inquiry directly to our admin panel and WhatsApp line.</p>
    </div>

    <!-- Filter Pills -->
    <div class="flex justify-center gap-2.5 flex-wrap mb-9" id="categoryFilterBar">
        <button class="px-4 py-2 rounded-full border border-slate-900 bg-slate-900 text-white text-xs font-semibold shadow cursor-pointer" onclick="filterByCategory('all')">All Products</button>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="productsGrid">
        <!-- Rendered dynamically via JavaScript -->
    </div>

    <!-- Pagination Bar Container (12 Items / Page) -->
    <div id="productsPagination" class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-10 pt-6 border-t border-slate-200">
        <!-- Rendered dynamically via JavaScript -->
    </div>
</section>
