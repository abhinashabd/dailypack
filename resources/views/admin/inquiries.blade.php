@extends('layouts.admin')

@section('title', 'Manage Customer Inquiries | DailyPack Admin')
@section('page_title', 'Customer Inquiries Log')

@section('admin_content')
<!-- Top Action Bar -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">
    <div class="relative w-full sm:w-80">
        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
        <input type="text" id="adminInquirySearch" onkeyup="renderAdminInquiriesPage()" placeholder="Search customer name, phone, product..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-300 rounded-xl text-xs font-semibold outline-none focus:border-pw-gold focus:ring-4 focus:ring-orange-500/10">
    </div>

    <button onclick="clearAllInquiries()" class="w-full sm:w-auto bg-slate-200 hover:bg-slate-300 text-slate-700 font-extrabold text-xs px-5 py-3 rounded-xl border-none cursor-pointer transition-all">
        <i class="fa-solid fa-trash-can mr-1"></i> Clear Log History
    </button>
</div>

<!-- Inquiries Table Card -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 uppercase tracking-wider font-bold">
                <tr>
                    <th class="py-4 px-6">Date</th>
                    <th class="py-4 px-6">Customer Details</th>
                    <th class="py-4 px-6">Product Inquired</th>
                    <th class="py-4 px-6">Quantity</th>
                    <th class="py-4 px-6">Notes</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody id="adminInquiriesTable" class="divide-y divide-slate-100 font-medium text-slate-700">
                <!-- Dynamic Content -->
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function renderAdminInquiriesPage() {
        const tbody = document.getElementById('adminInquiriesTable');
        if (!tbody) return;
        const q = (document.getElementById('adminInquirySearch').value || '').toLowerCase().trim();

        tbody.innerHTML = '';
        const filtered = adminInquiries.filter(inq => {
            if (!q) return true;
            return (inq.customer_name || '').toLowerCase().includes(q) ||
                   (inq.customer_phone || '').toLowerCase().includes(q) ||
                   (inq.product_name || '').toLowerCase().includes(q);
        });

        if (filtered.length === 0) {
            tbody.innerHTML = `<tr><td colspan="6" class="py-12 text-center text-slate-400 font-medium">No customer inquiries recorded yet.</td></tr>`;
            return;
        }

        filtered.forEach((inq, idx) => {
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-slate-50 transition-colors';
            
            const waText = `Hello ${inq.customer_name}, thank you for inquiring about ${inq.product_name} on DailyPack. We are ready to process your quote for ${inq.quantity}.`;
            const waUrl = `https://wa.me/91${(inq.customer_phone || '').replace(/\D/g,'')}?text=${encodeURIComponent(waText)}`;

            tr.innerHTML = `
                <td class="py-4 px-6 text-slate-500 font-semibold">${new Date(inq.created_at || Date.now()).toLocaleDateString()}</td>
                <td class="py-4 px-6">
                    <div class="font-extrabold text-slate-900">${inq.customer_name}</div>
                    <div class="text-slate-500 text-[11px] font-medium">${inq.customer_phone} ${inq.customer_email ? '• ' + inq.customer_email : ''}</div>
                </td>
                <td class="py-4 px-6 font-bold text-slate-800">${inq.product_name}</td>
                <td class="py-4 px-6"><span class="bg-orange-50 text-orange-600 font-extrabold px-2.5 py-1 rounded-full text-[11px]">${inq.quantity}</span></td>
                <td class="py-4 px-6 text-slate-500 max-w-xs truncate">${inq.message || 'No additional note'}</td>
                <td class="py-4 px-6 text-right space-x-2 whitespace-nowrap">
                    <a href="${waUrl}" target="_blank" class="px-3 py-1.5 bg-emerald-50 text-emerald-700 hover:bg-emerald-100 font-bold text-xs rounded-lg border border-emerald-200 inline-flex items-center gap-1.5 text-decoration-none">
                        <i class="fa-brands fa-whatsapp text-sm"></i> Chat
                    </a>
                    <button onclick="deleteInquiry(${idx})" class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 font-bold text-xs rounded-lg border border-red-200 cursor-pointer">Delete</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    function deleteInquiry(idx) {
        if (confirm('Delete this inquiry record?')) {
            adminInquiries.splice(idx, 1);
            saveAdminState();
            renderAdminInquiriesPage();
        }
    }

    function clearAllInquiries() {
        if (confirm('Are you sure you want to clear all inquiry logs?')) {
            adminInquiries = [];
            saveAdminState();
            renderAdminInquiriesPage();
        }
    }

    document.addEventListener('DOMContentLoaded', renderAdminInquiriesPage);
</script>
@endpush
