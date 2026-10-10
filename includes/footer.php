<?php
if (!defined('APP_NAME')) {
    require_once __DIR__ . '/../config.php';
}
?>

<!-- Deep Navy Master Footer -->
<footer class="relative overflow-hidden bg-[linear-gradient(180deg,#012b50_0%,#01172e_100%)] text-white pt-16 pb-12 border-t border-white/10">
    <!-- Subtle Water Gradient Background Orbs -->
    <div class="pointer-events-none absolute -top-32 -left-32 h-96 w-96 rounded-full bg-cyan-500/10 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-32 -right-32 h-96 w-96 rounded-full bg-blue-600/10 blur-3xl"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
            
            <!-- Column 1: Brand Info -->
            <div class="lg:col-span-2 text-left">
                <div class="flex items-center gap-3">
                    <img src="/public/images/aqua_water_logo.svg" alt="Aqua Water" class="h-10 w-10 rounded-xl bg-white/95 p-1 shadow-sm">
                    <div>
                        <p class="text-[11px] font-bold tracking-[0.28em] text-[#cfe4f5] uppercase">
                            Aqua Water 🌊💦
                        </p>
                        <span class="text-xs text-cyan-300 font-semibold">Premium Bottled Water Delivery</span>
                    </div>
                </div>

                <h3 class="mt-4 text-2xl font-black text-white max-w-md font-heading leading-snug">
                    Pure drinking water, delivered with care.
                </h3>
                
                <p class="mt-3.5 max-w-md text-sm leading-relaxed text-slate-300">
                    We provide reliable bottled water delivery for homes, offices, restaurants, clinics and businesses across Rawalpindi and Islamabad with scheduled route fulfillment and strict quality testing.
                </p>

                <!-- Quick highlights pills -->
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-slate-200">
                        <i class="fa-solid fa-check text-cyan-400 text-xs"></i> 9-Stage RO & UV
                    </span>
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-slate-200">
                        <i class="fa-solid fa-truck-fast text-cyan-400 text-xs"></i> Daily Delivery Routes
                    </span>
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-slate-200">
                        <i class="fa-solid fa-stamp text-cyan-400 text-xs"></i> B2B Custom Labeling
                    </span>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="text-left">
                <p class="text-[11px] font-bold tracking-[0.22em] text-[#cfe4f5] uppercase">
                    Quick Navigation
                </p>
                <ul class="mt-4 space-y-2.5 text-sm text-slate-300 font-medium">
                    <li><a href="/index.php" class="transition hover:text-white hover:translate-x-1 inline-flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-cyan-400"></i> Home</a></li>
                    <li><a href="/index.php#products" class="transition hover:text-white hover:translate-x-1 inline-flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-cyan-400"></i> Products & Range</a></li>
                    <li><a href="/purification-process.php" class="transition hover:text-white hover:translate-x-1 inline-flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-cyan-400"></i> 9-Step Purification</a></li>
                    <li><a href="/index.php#process" class="transition hover:text-white hover:translate-x-1 inline-flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-cyan-400"></i> How We Work</a></li>
                    <li><a href="/about-us.php" class="transition hover:text-white hover:translate-x-1 inline-flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-cyan-400"></i> About Our Company</a></li>
                    <li><a href="/lab-report.php" class="transition hover:text-white hover:translate-x-1 inline-flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-cyan-400"></i> Water Quality Reports</a></li>
                    <li><a href="/contact-us.php" class="transition hover:text-white hover:translate-x-1 inline-flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-cyan-400"></i> Contact & Support</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact & Customer Access -->
            <div class="text-left">
                <p class="text-[11px] font-bold tracking-[0.22em] text-[#cfe4f5] uppercase">
                    Direct Contact
                </p>
                <div class="mt-4 space-y-3.5 text-sm text-slate-300">
                    <p class="flex items-center gap-2.5">
                        <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-white/10 text-cyan-300"><i class="fa-solid fa-phone text-xs"></i></span>
                        <span><?= APP_PHONE ?></span>
                    </p>
                    <p class="flex items-center gap-2.5">
                        <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-emerald-500/20 text-emerald-400"><i class="fa-brands fa-whatsapp text-sm"></i></span>
                        <a href="<?= get_whatsapp_order_url() ?>" target="_blank" class="hover:text-emerald-300 underline underline-offset-4 decoration-emerald-500/40">WhatsApp Orders</a>
                    </p>
                    <p class="flex items-start gap-2.5">
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-white/10 text-cyan-300"><i class="fa-solid fa-location-dot text-xs"></i></span>
                        <span><?= APP_LOCATION ?></span>
                    </p>
                    
                    <div class="pt-3 flex flex-wrap gap-2">
                        <a href="/login.php" class="inline-flex items-center gap-2 rounded-xl border border-white/14 bg-white/6 px-4 py-2.5 text-xs font-semibold text-white transition duration-200 hover:bg-white/12 hover:border-white/25">
                            <i class="fa-solid fa-lock text-cyan-300"></i>
                            <span>Customer Login</span>
                        </a>
                        <a href="/admin/login.php" class="inline-flex items-center gap-2 rounded-xl border border-cyan-400/30 bg-cyan-950/40 px-3.5 py-2.5 text-xs font-bold text-cyan-300 transition duration-200 hover:bg-cyan-900/50">
                            <i class="fa-solid fa-user-shield text-cyan-400"></i>
                            <span>Admin Panel</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Bottom Bar -->
        <div class="mt-12 border-t border-white/8 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
            <p>© 2026 <?= APP_NAME ?> 🌊💦. Premium hydration solutions for homes and businesses.</p>
            <p class="flex items-center gap-4">
                <span>Rawalpindi & Islamabad Supply</span>
                <span>•</span>
                <a href="/contact-us.php" class="hover:text-slate-200">Privacy & Terms</a>
            </p>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Action Button -->
<a href="<?= get_whatsapp_order_url() ?>" target="_blank" rel="noopener noreferrer" class="fixed bottom-6 right-6 z-40 flex h-14 w-14 items-center justify-center rounded-full bg-emerald-500 text-white shadow-[0_10px_25px_-5px_rgba(16,185,129,0.5)] transition duration-300 hover:scale-110 hover:bg-emerald-600 focus:outline-none animate-bounce" title="Chat on WhatsApp">
    <i class="fa-brands fa-whatsapp text-2xl"></i>
    <span class="absolute -top-1 -right-1 flex h-4 w-4">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-300 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-4 w-4 bg-emerald-400"></span>
    </span>
</a>

<!-- Interactive Quick Order Modal -->
<div id="order-modal-backdrop" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300" style="opacity: 0; pointer-events: none;" onclick="closeOrderModal()"></div>

<div id="order-modal" class="fixed inset-x-4 top-[50%] z-50 mx-auto max-w-lg -translate-y-[50%] scale-95 opacity-0 pointer-events-none rounded-[2rem] border border-white/20 bg-white p-6 shadow-2xl transition-all duration-300 sm:p-8" style="opacity: 0; pointer-events: none; transform: translate(-50%, -50%) scale(0.92);" aria-hidden="true">
    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-50 text-cyan-600">
                <i class="fa-solid fa-droplet text-lg"></i>
            </div>
            <div>
                <h3 class="text-xl font-black text-[#071C33] font-heading">Place Bottle Order</h3>
                <p class="text-xs text-slate-500">Fast delivery across Rawalpindi & Islamabad</p>
            </div>
        </div>
        <button onclick="closeOrderModal()" class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-600" aria-label="Close modal">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>
    </div>

    <form id="quick-order-form" onsubmit="handleOrderSubmit(event)" class="mt-5 space-y-4">
        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Select Bottle Size</label>
            <select id="order-bottle-select" onchange="calculateOrderTotal()" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 text-sm font-semibold text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
                <?php foreach ($products as $p): ?>
                <option value="<?= $p['id'] ?>" data-price="<?= $p['price'] ?>" data-name="<?= htmlspecialchars($p['name']) ?>">
                    <?= htmlspecialchars($p['name']) ?> - <?= htmlspecialchars($p['use']) ?> (Rs. <?= $p['price'] ?>)
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Quantity</label>
                <div class="flex items-center rounded-xl border border-slate-200 bg-slate-50 overflow-hidden">
                    <button type="button" onclick="stepQuantity(-1)" class="px-3 py-2 text-slate-600 hover:bg-slate-200"><i class="fa-solid fa-minus text-xs"></i></button>
                    <input type="number" id="order-quantity" value="1" min="1" max="100" onchange="calculateOrderTotal()" class="w-full text-center bg-transparent py-2 text-sm font-bold text-slate-800 focus:outline-none">
                    <button type="button" onclick="stepQuantity(1)" class="px-3 py-2 text-slate-600 hover:bg-slate-200"><i class="fa-solid fa-plus text-xs"></i></button>
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Estimated Total</label>
                <div class="flex h-10 items-center justify-center rounded-xl bg-cyan-50 px-3 text-sm font-black text-[#01386A]" id="order-total-display">
                    Rs. 50
                </div>
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Full Name</label>
            <input type="text" id="order-name" required placeholder="Your Name or Business" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Phone / WhatsApp Number</label>
            <input type="tel" id="order-phone" required placeholder="03xx xxxxxxx" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Delivery Address & Area</label>
            <input type="text" id="order-address" required placeholder="Street / Sector, Rawalpindi / Islamabad" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
        </div>

        <div class="pt-2 flex flex-col sm:flex-row gap-2.5">
            <button type="submit" class="flex-1 rounded-xl bg-[#01386A] py-3 text-sm font-bold text-white shadow-lg transition duration-200 hover:bg-[#0b4c86]">
                <i class="fa-solid fa-truck-ramp-box mr-1.5"></i> Confirm Order
            </button>
            <button type="button" onclick="sendOrderViaWhatsApp()" class="rounded-xl border border-emerald-500/30 bg-emerald-50 py-3 px-4 text-sm font-bold text-emerald-700 transition duration-200 hover:bg-emerald-100 flex items-center justify-center gap-1.5">
                <i class="fa-brands fa-whatsapp text-emerald-600"></i> WhatsApp
            </button>
        </div>
    </form>
</div>

<!-- Floating Toast Container -->
<div id="toast-container" class="fixed top-20 right-4 z-50 flex flex-col gap-2 pointer-events-none"></div>

<!-- Client-side Interactive Script -->
<script src="/public/js/main.js"></script>

</body>
</html>
