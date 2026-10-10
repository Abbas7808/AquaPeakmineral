<?php
require_once __DIR__ . '/config.php';
$page_title = 'About Us | ' . APP_NAME . ' 🌊💦';
$page_desc = 'Learn about Aqua Water, our history, state-of-the-art purification plant, commitment to pure hydration, and our dedicated team in Rawalpindi & Islamabad.';
require_once __DIR__ . '/includes/header.php';
?>

<main class="pt-28 pb-20 bg-slate-50">
    <!-- Header Banner -->
    <div class="bg-[linear-gradient(180deg,#01386A_0%,#022B52_100%)] text-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-cyan-400/30 bg-cyan-400/10 px-4 py-1.5 text-xs font-bold tracking-wider text-cyan-300 uppercase">
                <i class="fa-solid fa-droplet text-xs"></i> Our Mission & Heritage
            </span>
            <h1 class="mt-4 text-4xl font-black text-white sm:text-5xl lg:text-6xl font-heading">
                About <?= APP_NAME ?> 🌊💦
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-sm sm:text-base text-cyan-100/90 leading-relaxed">
                Dedicated to providing reliable, safe, and mineral-balanced drinking water for families, corporate workplaces, and commercial partners across Rawalpindi and Islamabad.
            </p>
        </div>
    </div>

    <!-- Company Story & Values -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
            <div>
                <span class="text-xs font-bold tracking-widest uppercase text-[#01386A]">Pure Quality Since Day One</span>
                <h2 class="mt-2 text-3xl font-black text-[#071C33] sm:text-4xl font-heading">
                    Setting the Highest Standard for Clean Drinking Water
                </h2>
                <p class="mt-4 text-sm leading-relaxed text-[#5f7489]">
                    <?= APP_NAME ?> was founded on a simple principle: everyone deserves access to completely safe, refreshing, and high-standard drinking water delivered with clockwork punctuality.
                </p>
                <p class="mt-3 text-sm leading-relaxed text-[#5f7489]">
                    Our state-of-the-art bottling facility utilizes 9 distinct stages of purification — including multi-media filtration, activated carbon absorption, industrial Reverse Osmosis membranes, remineralization, and dual ultraviolet/ozone disinfection. Every bottle is washed, sanitized, filled, and sealed automatically in a clean-room environment.
                </p>

                <div class="mt-8 grid grid-cols-2 gap-4">
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                        <span class="text-3xl font-black text-[#01386A]">100%</span>
                        <p class="text-xs font-bold text-slate-700 mt-1">Food-Grade Packaging</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">BPA-free bottles sanitized before each fill</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                        <span class="text-3xl font-black text-[#01386A]">Daily</span>
                        <p class="text-xs font-bold text-slate-700 mt-1">Route Delivery</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Reliable dispatch across twin cities</p>
                    </div>
                </div>
            </div>

            <!-- Visual Showcase -->
            <div class="relative overflow-hidden rounded-[2.2rem] border border-slate-200 bg-white p-4 shadow-xl">
                <img src="/public/images/optimized/hero-desktop.webp" alt="Aqua Water Operations" class="rounded-2xl object-cover w-full h-80 sm:h-96">
                <div class="mt-4 p-2 text-center">
                    <p class="text-xs font-bold text-[#01386A]">Rawalpindi & Islamabad Production & Delivery Network</p>
                    <p class="text-[11px] text-slate-500">Serving residential towers, corporate headquarters, and restaurants.</p>
                </div>
            </div>
        </div>

        <!-- Leadership Team Showcase -->
        <div class="mt-20">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold tracking-widest uppercase text-[#01386A]">Our Leadership</span>
                <h2 class="mt-2 text-3xl font-black text-[#071C33] sm:text-4xl font-heading">
                    The People Behind <?= APP_NAME ?>
                </h2>
                <p class="mt-2 text-xs sm:text-sm text-slate-500">
                    Experienced professionals committed to operational excellence, purity standards, and customer happiness.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($team_members as $index => $member): 
                    $initials = implode('', array_slice(array_map(fn($w) => $w[0] ?? '', explode(' ', $member['name'])), 0, 2));
                ?>
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-md text-center hover:shadow-lg transition">
                    <div class="mx-auto grid h-20 w-20 place-items-center rounded-2xl bg-[linear-gradient(145deg,#7eb0d8_0%,#1f6fae_42%,#0a2947_100%)] text-white shadow-md">
                        <span class="text-2xl font-black"><?= $initials ?></span>
                    </div>
                    <span class="inline-block mt-4 rounded-full bg-cyan-50 border border-cyan-200 px-3 py-0.5 text-[10px] font-bold text-cyan-900 uppercase">
                        <?= htmlspecialchars($member['badge']) ?>
                    </span>
                    <h3 class="mt-2 text-lg font-black text-[#071C33]"><?= htmlspecialchars($member['name']) ?></h3>
                    <p class="text-xs font-bold text-cyan-700 uppercase tracking-wide"><?= htmlspecialchars($member['role']) ?></p>
                    <p class="mt-3 text-xs text-slate-500 leading-relaxed"><?= htmlspecialchars($member['desc']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
