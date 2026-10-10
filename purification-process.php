<?php
require_once __DIR__ . '/config.php';
$page_title = 'Our 9-Step Purification Process | ' . APP_NAME . ' 🌊💦';
$page_desc = 'Learn about our rigorous 9-step water purification process: sediment filtration, carbon beds, advanced RO, mineral balancing, UV sterilization, and ozone disinfection.';
require_once __DIR__ . '/includes/header.php';
?>

<main class="pt-28 pb-20 bg-white">
    <!-- Top Hero Banner -->
    <div class="bg-[linear-gradient(180deg,#01386A_0%,#022B52_100%)] text-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-cyan-400/30 bg-cyan-400/10 px-4 py-1.5 text-xs font-bold tracking-wider text-cyan-300 uppercase">
                <i class="fa-solid fa-atom text-xs"></i> Advanced Multi-Barrier Purification
            </span>
            <h1 class="mt-4 text-4xl font-black text-white sm:text-5xl lg:text-6xl font-heading">
                Our 9-Step Purification Process
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-sm sm:text-base text-cyan-100/90 leading-relaxed">
                At <?= APP_NAME ?>, quality isn't an afterthought. Every single drop passes through 9 controlled purification, disinfection, and mineral-enrichment stages before bottling.
            </p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
        <!-- 9 Steps Grid -->
        <div class="space-y-8">
            <?php foreach ($purification_steps as $step): ?>
            <div class="rounded-[2rem] border <?= $step['highlight'] ? 'border-cyan-400/60 bg-[linear-gradient(180deg,#f4faff_0%,#e8f4fc_100%)]' : 'border-slate-200 bg-white' ?> p-6 sm:p-8 shadow-md flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="flex items-start gap-5">
                    <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl <?= $step['highlight'] ? 'bg-cyan-600 text-white shadow-lg shadow-cyan-600/30' : 'bg-[#01386A] text-white' ?> text-xl font-black font-heading">
                        <?= $step['id'] ?>
                    </span>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-[11px] font-bold tracking-widest uppercase text-cyan-700"><?= htmlspecialchars($step['short']) ?> Stage</span>
                            <?php if ($step['highlight']): ?>
                            <span class="rounded-full bg-cyan-100 border border-cyan-300 px-2 py-0.5 text-[9px] font-bold text-cyan-900 uppercase">Crucial Quality Barrier</span>
                            <?php endif; ?>
                        </div>
                        <h2 class="text-2xl font-black text-[#071C33] mt-1 font-heading"><?= htmlspecialchars($step['title']) ?></h2>
                        <p class="mt-2 text-sm text-[#5f7489] leading-relaxed max-w-3xl"><?= htmlspecialchars($step['detail']) ?></p>
                    </div>
                </div>

                <div class="shrink-0 w-full md:w-auto flex md:flex-col items-center justify-end gap-2 border-t md:border-t-0 md:border-l border-slate-100 pt-4 md:pt-0 md:pl-6">
                    <span class="text-xs font-semibold text-slate-500">PSQCA / WHO Standard</span>
                    <span class="inline-flex items-center gap-1 text-xs font-bold text-emerald-600">
                        <i class="fa-solid fa-circle-check"></i> Verified Stage
                    </span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Call to Action Banner -->
        <div class="mt-16 rounded-[2.2rem] bg-[linear-gradient(180deg,#01386A_0%,#022B52_100%)] p-8 sm:p-12 text-white text-center">
            <h3 class="text-3xl font-black font-heading">Experience the Difference in Every Drop</h3>
            <p class="mt-3 max-w-xl mx-auto text-sm text-cyan-100">
                Order fresh Aqua Water for your office or home today and taste true purity.
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                <button onclick="openOrderModal()" class="rounded-xl bg-white px-6 py-3 text-xs font-bold text-[#01386A] transition hover:bg-slate-100">
                    <i class="fa-solid fa-cart-shopping mr-1.5"></i> Order Bottles Now
                </button>
                <a href="<?= get_whatsapp_order_url() ?>" target="_blank" class="rounded-xl border border-white/20 bg-white/10 px-6 py-3 text-xs font-bold text-white transition hover:bg-white/20">
                    <i class="fa-brands fa-whatsapp text-emerald-400 mr-1.5"></i> WhatsApp Order Line
                </a>
            </div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
