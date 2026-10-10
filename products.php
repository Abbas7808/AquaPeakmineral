<?php
require_once __DIR__ . '/config.php';
$page_title = 'Products & Bottle Range | ' . APP_NAME . ' 🌊💦';
$page_desc = 'Explore our full bottled water range: 500ml, 1500ml, 6L, 12L, and 19L dispenser bottles. Premium purified water delivered across Rawalpindi & Islamabad.';
require_once __DIR__ . '/includes/header.php';
?>

<main class="pt-28 pb-20 bg-[radial-gradient(circle_at_top,#f8fbfe_0%,#edf5fb_100%)]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb & Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-flex items-center gap-2 rounded-full border border-[#d7ebf6] bg-white px-4 py-1.5 text-xs font-bold tracking-[0.24em] text-[#0a4e80] uppercase shadow-sm">
                <i class="fa-solid fa-bottle-water text-cyan-600"></i> COMPLETE RANGE
            </span>
            <h1 class="mt-4 text-4xl font-black text-[#071C33] sm:text-5xl font-heading">
                Bottled Water for Every Hydration Need
            </h1>
            <p class="mt-4 text-base text-[#5f7489] leading-relaxed">
                From handheld bottles for meetings and active days to large-capacity bottles for homes and offices, choose the perfect size below.
            </p>
        </div>

        <!-- Products Detailed Showcase -->
        <div class="space-y-12">
            <?php foreach ($products as $index => $prod): 
                $is_even = $index % 2 === 1;
            ?>
            <div id="<?= $prod['id'] ?>" class="scroll-mt-32 rounded-[2.2rem] border border-[#d4e4f2] bg-white p-6 shadow-xl transition-all duration-300 hover:shadow-2xl sm:p-10">
                <div class="grid gap-8 lg:grid-cols-12 lg:items-center">
                    
                    <!-- Bottle Visual Stage -->
                    <div class="lg:col-span-5 <?= $is_even ? 'lg:order-2' : '' ?>">
                        <div class="product-stage relative isolate overflow-hidden rounded-[1.8rem] bg-[linear-gradient(180deg,#f8fbff_0%,#e6f0f8_100%)] p-8">
                            <div class="product-stage__shadow pointer-events-none absolute inset-x-8 bottom-4 h-20 rounded-full bg-[#01386A]/14 blur-xl"></div>
                            <div class="product-stage__orb pointer-events-none absolute top-6 right-6 h-28 w-28 rounded-full bg-white/80 blur-2xl"></div>
                            
                            <img src="<?= $prod['image'] ?>" alt="<?= htmlspecialchars($prod['name']) ?>" class="product-stage__image relative z-10 mx-auto h-72 w-full object-contain object-bottom sm:h-80" loading="lazy">
                        </div>
                    </div>

                    <!-- Bottle Details & Specifications -->
                    <div class="lg:col-span-7 <?= $is_even ? 'lg:order-1' : '' ?> space-y-5">
                        <div class="flex items-center justify-between">
                            <span class="rounded-full bg-cyan-100/70 border border-cyan-200 px-3.5 py-1 text-xs font-bold text-cyan-900 uppercase tracking-widest">
                                <?= htmlspecialchars($prod['use']) ?>
                            </span>
                            <span class="text-2xl font-black text-[#01386A]">
                                Rs. <?= $prod['price'] ?>
                            </span>
                        </div>

                        <h2 class="text-3xl font-black text-[#071C33] font-heading">
                            <?= htmlspecialchars($prod['name']) ?>
                        </h2>

                        <p class="text-sm leading-relaxed text-[#5f7489]">
                            <?= htmlspecialchars($prod['desc']) ?>
                        </p>

                        <!-- Tech Specs Grid -->
                        <div class="grid grid-cols-2 gap-3 sm:grid-cols-4 pt-2">
                            <div class="rounded-xl bg-slate-50 border border-slate-100 p-3">
                                <span class="text-[10px] uppercase font-bold text-slate-400">Packaging</span>
                                <p class="text-xs font-bold text-slate-800 mt-0.5"><?= htmlspecialchars($prod['pack_size']) ?></p>
                            </div>
                            <div class="rounded-xl bg-slate-50 border border-slate-100 p-3">
                                <span class="text-[10px] uppercase font-bold text-slate-400">Total TDS</span>
                                <p class="text-xs font-bold text-slate-800 mt-0.5"><?= htmlspecialchars($prod['spec_tds']) ?></p>
                            </div>
                            <div class="rounded-xl bg-slate-50 border border-slate-100 p-3">
                                <span class="text-[10px] uppercase font-bold text-slate-400">pH Level</span>
                                <p class="text-xs font-bold text-slate-800 mt-0.5"><?= htmlspecialchars($prod['spec_ph']) ?></p>
                            </div>
                            <div class="rounded-xl bg-slate-50 border border-slate-100 p-3">
                                <span class="text-[10px] uppercase font-bold text-slate-400">Delivery</span>
                                <p class="text-xs font-bold text-slate-800 mt-0.5">Route & Direct</p>
                            </div>
                        </div>

                        <!-- Recommendations -->
                        <div class="rounded-xl bg-[#edf5fc] p-3.5 text-xs text-slate-700 flex items-start gap-2.5">
                            <i class="fa-solid fa-lightbulb text-cyan-700 mt-0.5"></i>
                            <div>
                                <span class="font-bold text-[#01386A]">Best Suited For:</span>
                                <span><?= htmlspecialchars($prod['ideal_for']) ?></span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap gap-3 pt-2">
                            <button onclick="openOrderModal('<?= $prod['id'] ?>')" class="rounded-xl bg-[#01386A] px-6 py-3 text-xs font-bold text-white transition hover:bg-[#0b4c86] shadow-md flex items-center gap-2">
                                <i class="fa-solid fa-cart-shopping"></i> Order This Bottle
                            </button>
                            <a href="<?= get_whatsapp_order_url("Hello Aqua Water 🌊💦, I want to order {$prod['name']}.") ?>" target="_blank" class="rounded-xl border border-emerald-500/30 bg-emerald-50 px-5 py-3 text-xs font-bold text-emerald-700 transition hover:bg-emerald-100 flex items-center gap-2">
                                <i class="fa-brands fa-whatsapp text-emerald-600 text-sm"></i> Order via WhatsApp
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</main>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
