<?php
require_once __DIR__ . '/config.php';
$page_title = 'Contact Us | ' . APP_NAME . ' 🌊💦';
$page_desc = 'Contact Aqua Water for bottled water delivery, corporate refills, B2B custom branding, and distribution inquiries across Rawalpindi & Islamabad.';
require_once __DIR__ . '/includes/header.php';
?>

<main class="pt-28 pb-20 bg-slate-50">
    <!-- Header Banner -->
    <div class="bg-[linear-gradient(180deg,#01386A_0%,#022B52_100%)] text-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-cyan-400/30 bg-cyan-400/10 px-4 py-1.5 text-xs font-bold tracking-wider text-cyan-300 uppercase">
                <i class="fa-solid fa-headset text-xs"></i> 24/7 Customer Support & Ordering
            </span>
            <h1 class="mt-4 text-4xl font-black text-white sm:text-5xl lg:text-6xl font-heading">
                Contact <?= APP_NAME ?> 🌊💦
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-sm sm:text-base text-cyan-100/90 leading-relaxed">
                We are always available to help setup your home refills, corporate office schedule, or custom labeling requirements.
            </p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid gap-12 lg:grid-cols-12">
            
            <!-- Left Contact Info (5 Cols) -->
            <div class="lg:col-span-5 space-y-6">
                <div>
                    <h2 class="text-2xl font-black text-[#071C33] font-heading">Get in Touch Directly</h2>
                    <p class="mt-2 text-sm text-[#5f7489]">Call, message on WhatsApp, or send an inquiry below.</p>
                </div>

                <div class="space-y-4">
                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#01386A] text-white">
                            <i class="fa-solid fa-phone text-lg text-cyan-300"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold uppercase text-slate-400">Direct Phone Helpline</span>
                            <p class="text-base font-bold text-slate-900 mt-0.5"><?= APP_PHONE ?></p>
                            <p class="text-xs text-slate-500 mt-1">Available 8:00 AM - 8:00 PM</p>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl bg-emerald-50 border border-emerald-200 shadow-sm flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white">
                            <i class="fa-brands fa-whatsapp text-2xl"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold uppercase text-emerald-700">Official WhatsApp Service</span>
                            <p class="text-base font-bold text-emerald-950 mt-0.5"><?= APP_PHONE ?></p>
                            <a href="<?= get_whatsapp_order_url() ?>" target="_blank" class="inline-block mt-1 text-xs font-bold text-emerald-700 underline">
                                Click to Chat on WhatsApp →
                            </a>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#01386A] text-white">
                            <i class="fa-solid fa-envelope text-lg text-cyan-300"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold uppercase text-slate-400">Email Address</span>
                            <p class="text-base font-bold text-slate-900 mt-0.5"><?= APP_EMAIL ?></p>
                            <p class="text-xs text-slate-500 mt-1">Corporate & B2B procurement queries</p>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#01386A] text-white">
                            <i class="fa-solid fa-map-pin text-lg text-cyan-300"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold uppercase text-slate-400">Head Office & Plant Logistics</span>
                            <p class="text-base font-bold text-slate-900 mt-0.5"><?= APP_LOCATION ?></p>
                            <p class="text-xs text-slate-500 mt-1">Dedicated fleet operating across twin cities</p>
                        </div>
                    </div>
                </div>

                <!-- Coverage Areas Pill Box -->
                <div class="p-5 rounded-2xl bg-cyan-50/70 border border-cyan-200">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-cyan-900 mb-2">Delivery Route Coverage</h3>
                    <div class="flex flex-wrap gap-1.5 text-[11px] text-cyan-950">
                        <span class="rounded-lg bg-white px-2 py-1 shadow-xs border border-cyan-100">Bahria Town (1-8)</span>
                        <span class="rounded-lg bg-white px-2 py-1 shadow-xs border border-cyan-100">DHA Rawalpindi & Islamabad</span>
                        <span class="rounded-lg bg-white px-2 py-1 shadow-xs border border-cyan-100">Blue Area</span>
                        <span class="rounded-lg bg-white px-2 py-1 shadow-xs border border-cyan-100">F-Sectors & E-Sectors</span>
                        <span class="rounded-lg bg-white px-2 py-1 shadow-xs border border-cyan-100">G & I Sectors</span>
                        <span class="rounded-lg bg-white px-2 py-1 shadow-xs border border-cyan-100">Saddar & Westridge</span>
                        <span class="rounded-lg bg-white px-2 py-1 shadow-xs border border-cyan-100">Chaklala Scheme 3</span>
                    </div>
                </div>
            </div>

            <!-- Right Contact Form (7 Cols) -->
            <div class="lg:col-span-7">
                <div class="rounded-[2.2rem] border border-[#d4e4f2] bg-white p-8 shadow-xl">
                    <h3 class="text-2xl font-black text-[#071C33] font-heading">Send Us an Inquiry</h3>
                    <p class="mt-1 text-xs text-slate-500">
                        We respond to all orders and service queries promptly.
                    </p>

                    <form id="contact-page-form" onsubmit="handleContactSubmit(event)" class="mt-6 space-y-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Your Full Name</label>
                                <input type="text" name="name" required placeholder="John Doe" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Phone / WhatsApp</label>
                                <input type="tel" name="phone" required placeholder="03xx xxxxxxx" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email Address (Optional)</label>
                                <input type="email" name="email" placeholder="name@company.com" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Inquiry Type</label>
                                <select name="subject" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
                                    <option value="Home Delivery Refills">Home 19L Refill Delivery</option>
                                    <option value="Corporate Office Supply">Corporate Office Regular Supply</option>
                                    <option value="Custom Label Bottle Inquiry">B2B Custom Label Bottles</option>
                                    <option value="Retail Store Stocking">Retail Distribution / Reselling</option>
                                    <option value="Feedback / Quality">Quality or General Inquiries</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Address / Delivery Area</label>
                            <input type="text" name="address" placeholder="Sector / Street / City" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Message Details</label>
                            <textarea name="message" rows="4" required placeholder="Specify your desired bottles, quantities, frequency, and any specific requirements..." class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none"></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full rounded-xl bg-[#01386A] py-3.5 text-sm font-bold text-white shadow-lg transition duration-200 hover:bg-[#0b4c86] flex items-center justify-center gap-2">
                                <i class="fa-solid fa-paper-plane"></i>
                                <span>Send Inquiry</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
