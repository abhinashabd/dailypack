@extends('layouts.app')

@section('title', 'Contact Us & Store Location | DailyPack Solution Pvt Ltd')
@section('meta_description', 'Visit DailyPack Solution Pvt Ltd in Sector-118 Noida, FNG Expressway. Best rates on food containers, boxes and tableware. Store open 10 AM to 7 PM (Mon-Sat).')

@section('content')
<div class="bg-slate-900 text-white py-14 px-6 text-center relative overflow-hidden">
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-pw-gold/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-3xl mx-auto relative z-10">
        <div class="inline-flex items-center gap-2 text-[11px] font-extrabold tracking-widest text-pw-gold uppercase mb-3">
            <span class="w-6 h-0.5 bg-pw-gold inline-block"></span>
            STORE LOCATION & INQUIRIES
        </div>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black mb-3 text-white">Contact Us & Visit Our Store</h1>
        <p class="text-slate-400 text-sm sm:text-base">Reach out directly to our packaging specialists for sample kits, custom logo printing, or visit our Noida warehouse store.</p>
    </div>
</div>

<section class="max-w-6xl mx-auto my-12 px-4 sm:px-6 space-y-10">
    <!-- Top Grid: Details on Left & Quick Inquiry on Right -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Column: Address, Timing, Phone, WhatsApp & Email -->
        <div class="lg:col-span-6 bg-white p-6 sm:p-8 rounded-2xl border border-slate-200 shadow-sm space-y-6">
            <div>
                <h2 class="text-2xl font-black text-slate-900 mb-2">Get In Touch</h2>
                <p class="text-slate-600 text-sm leading-relaxed">Our team is ready to help you source, design, and deliver high quality food packaging for your brand.</p>
            </div>

            <!-- Store Visit Highlight Box -->
            <div class="bg-gradient-to-r from-orange-50 to-amber-50/70 border border-orange-200/80 rounded-2xl p-4 sm:p-5">
                <div class="flex items-start gap-3.5">
                    <div class="w-10 h-10 rounded-xl bg-pw-gold text-white flex items-center justify-center text-lg shrink-0 shadow-sm shadow-orange-500/20">
                        <i class="fa-solid fa-tags"></i>
                    </div>
                    <div>
                        <div class="text-sm font-black text-slate-900 mb-0.5">Visit Our Store for the Best Wholesale Rates!</div>
                        <p class="text-xs text-slate-600 leading-relaxed font-medium">Inspect physical packaging samples, discuss volume discounts, and explore our live ready inventory.</p>
                    </div>
                </div>
            </div>

            <!-- Contact List Items -->
            <div class="space-y-4">
                <!-- Address Card -->
                <div class="flex items-start gap-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                    <div class="w-11 h-11 rounded-xl bg-pw-gold/15 text-pw-gold flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="flex-1">
                        <div class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">Store & Warehouse Address</div>
                        <div class="text-sm font-extrabold text-slate-900 leading-snug">
                            SK-06, Sector-118 Noida, FNG Expressway, Noida.
                        </div>
                        <div class="text-xs text-slate-600 font-medium mt-1 flex items-center gap-1.5">
                            <i class="fa-solid fa-compass text-pw-gold"></i>
                            <span><b>Landmark:</b> Near The Riders Hub (Bike Service Centre)</span>
                        </div>
                    </div>
                </div>

                <!-- Timing Card -->
                <div class="flex items-start gap-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                    <div class="w-11 h-11 rounded-xl bg-blue-500/15 text-blue-600 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-1">Store Timings</div>
                        <div class="text-sm font-extrabold text-slate-900">
                            10:00 AM to 7:00 PM
                        </div>
                        <div class="text-xs text-slate-600 font-medium mt-0.5">
                            Monday to Saturday <span class="text-rose-600 font-bold">(Sunday Off)</span>
                        </div>
                    </div>
                </div>

                <!-- Phone Line -->
                <div class="flex items-center gap-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                    <div class="w-11 h-11 rounded-xl bg-amber-500/15 text-pw-gold flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500 font-bold uppercase tracking-wider">Direct Phone Line</div>
                        <a href="tel:7303911622" class="text-base font-extrabold text-slate-900 hover:text-pw-gold transition-colors">+91 73039 11622</a>
                    </div>
                </div>

                <!-- WhatsApp Support -->
                <div class="flex items-center gap-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                    <div class="w-11 h-11 rounded-xl bg-emerald-500/15 text-emerald-600 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500 font-bold uppercase tracking-wider">WhatsApp Support</div>
                        <a href="https://wa.me/917303911622" target="_blank" class="text-base font-extrabold text-slate-900 hover:text-emerald-600 transition-colors">+91 73039 11622</a>
                    </div>
                </div>

                <!-- Email Address -->
                <div class="flex items-center gap-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                    <div class="w-11 h-11 rounded-xl bg-purple-500/15 text-purple-600 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <div class="text-xs text-slate-500 font-bold uppercase tracking-wider">Official Email</div>
                        <a href="mailto:dailypacksolutions@gmail.com" class="text-sm sm:text-base font-extrabold text-slate-900 hover:text-pw-gold transition-colors break-all">dailypacksolutions@gmail.com</a>
                    </div>
                </div>
            </div>

            <!-- Direct Maps Button -->
            <div class="pt-2">
                <a href="https://maps.app.goo.gl/DYM4XZAa8hbxAocS8?g_st=iwb" target="_blank" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 px-5 rounded-xl inline-flex items-center justify-center gap-2.5 transition-all shadow-md text-sm text-decoration-none">
                    <i class="fa-solid fa-map-location-dot text-pw-gold text-base"></i> Open Location in Google Maps <i class="fa-solid fa-arrow-up-right-from-square text-xs text-slate-400"></i>
                </a>
            </div>
        </div>

        <!-- Right Column: Quick Inquiry Form -->
        <div class="lg:col-span-6 bg-white p-6 sm:p-8 rounded-2xl border border-slate-200 shadow-sm">
            <div class="mb-5">
                <h3 class="text-2xl font-black text-slate-900 mb-1">Send Quick Inquiry</h3>
                <p class="text-slate-500 text-xs sm:text-sm">Submit your food packaging requirements and our executive will respond promptly on WhatsApp.</p>
            </div>

            <form onsubmit="handleInquirySubmit(event)" class="space-y-4">
                <input type="hidden" id="inquiryProductId" value="101">
                <input type="hidden" id="inquiryProductNameInput" value="General Store & Contact Inquiry">
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1.5">Your Name *</label>
                    <input type="text" id="customerName" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-lg text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-amber-500/10" placeholder="e.g. Rahul Sharma" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1.5">Phone / WhatsApp Number *</label>
                    <input type="tel" id="customerPhone" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-lg text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-amber-500/10" placeholder="e.g. 9876543210" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1.5">Email Address</label>
                    <input type="email" id="customerEmail" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-lg text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-amber-500/10" placeholder="email@domain.com">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1.5">Required Products & Quantity *</label>
                    <input type="text" id="orderQuantity" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-lg text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-amber-500/10" placeholder="e.g. 1000 Pcs 500ml container with lids" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1.5">Message / Requirement Details</label>
                    <textarea id="customerMessage" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-lg text-sm outline-none focus:border-pw-gold focus:ring-4 focus:ring-amber-500/10" rows="3" placeholder="Tell us about your requirements or plan to visit store..."></textarea>
                </div>
                <button type="submit" class="w-full py-3 px-4 bg-pw-gold text-white font-extrabold text-sm rounded-xl border-none cursor-pointer flex items-center justify-center gap-2 hover:bg-pw-goldHover transition-all shadow-md shadow-orange-500/25">
                    <i class="fa-brands fa-whatsapp text-lg"></i> Send Direct Inquiry to WhatsApp
                </button>
            </form>
        </div>
    </div>

    <!-- Google Maps Interactive Embed Section -->
    <div class="bg-white p-5 sm:p-7 rounded-2xl border border-slate-200 shadow-sm">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5 pb-4 border-b border-slate-100">
            <div>
                <div class="inline-flex items-center gap-2 text-[11px] font-extrabold tracking-widest text-pw-gold uppercase mb-1">
                    <i class="fa-solid fa-map-pin"></i> GOOGLE MAPS ROUTE
                </div>
                <h3 class="text-xl sm:text-2xl font-black text-slate-900">Find DailyPack On Google Maps</h3>
                <p class="text-xs sm:text-sm text-slate-500 font-medium">SK-06, Sector-118 Noida, FNG Expressway (Near The Riders Hub Bike Service Centre)</p>
            </div>
            <a href="https://maps.app.goo.gl/DYM4XZAa8hbxAocS8?g_st=iwb" target="_blank" class="inline-flex items-center justify-center gap-2 bg-pw-gold hover:bg-pw-goldHover text-white font-bold px-5 py-2.5 rounded-xl text-xs sm:text-sm transition-all shadow-sm shrink-0 text-decoration-none">
                <i class="fa-solid fa-diamond-turn-right"></i> Get Directions <i class="fa-solid fa-arrow-up-right-from-square text-[11px]"></i>
            </a>
        </div>

        <!-- Responsive Map Frame -->
        <div class="rounded-xl overflow-hidden border border-slate-200 shadow-inner bg-slate-100 relative">
            <iframe 
                src="https://maps.google.com/maps?q=SK-06,+Sector-118+Noida,+FNG+Expressway,+Noida&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                width="100%" 
                height="420" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade" 
                title="DailyPack Solution Pvt Ltd Location Map">
            </iframe>
        </div>
    </div>
</section>
@endsection

