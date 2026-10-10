<?php
require_once __DIR__ . '/config.php';
$page_title = 'Aqua Water 🌊💦 | Premium Bottled Water Delivery & Route Supply';
$page_desc = 'Pure drinking water for homes, offices, restaurants and businesses across Rawalpindi & Islamabad. 9-step purification, route delivery, and custom B2B labeling.';
require_once __DIR__ . '/includes/header.php';
?>

<!-- ==========================================
     HERO SECTION
     ========================================== -->
<section id="home" class="relative flex min-h-[82vh] w-full items-center overflow-hidden sm:min-h-[90vh] xl:min-h-screen">
    <!-- Responsive Hero Media Background -->
    <div class="absolute inset-0 z-0 overflow-hidden">
        <picture class="block h-full w-full">
            <source type="image/webp" media="(min-width: 768px)" srcset="/public/images/optimized/hero-desktop.webp">
            <source media="(min-width: 768px)" srcset="/public/images/laptop_version_hero_section.png">
            <img src="/public/images/mobile_version_hero_section.png" alt="Aqua Water Home Banner" class="h-full w-full object-cover object-center md:object-[58%_center] lg:object-[61%_center] xl:object-[63%_center] 2xl:object-[60%_center]" fetchpriority="high" loading="eager" decoding="async">
        </picture>
    </div>

    <!-- Hero Multi-layer Gradient Overlays matching original site -->
    <div class="pointer-events-none absolute inset-0 z-10 bg-[linear-gradient(90deg,rgba(255,255,255,0.92)_0%,rgba(242,248,253,0.86)_22%,rgba(220,235,247,0.58)_44%,rgba(255,255,255,0.08)_100%)]"></div>
    <div class="pointer-events-none absolute inset-0 z-10 bg-[linear-gradient(180deg,rgba(255,255,255,0.1)_0%,rgba(255,255,255,0.04)_34%,rgba(1,56,106,0)_58%,rgba(1,56,106,0.22)_100%)]"></div>
    <div class="pointer-events-none absolute inset-y-0 right-0 z-10 hidden w-[16%] bg-[linear-gradient(270deg,rgba(1,56,106,0.22),transparent)] lg:block"></div>
    <div class="pointer-events-none absolute inset-x-0 bottom-0 z-10 h-24 bg-gradient-to-b from-transparent to-[#01386A] sm:h-28 lg:h-32"></div>

    <!-- Hero Content Container -->
    <div class="relative z-20 mx-auto w-full max-w-7xl px-4 pt-28 pb-14 sm:px-6 sm:pt-32 sm:pb-20 lg:px-8 lg:pt-36">
        <div class="section-fade max-w-2xl sm:max-w-[42rem]">
            <div class="fade-up space-y-6">
                
                <!-- Hero Glassmorphism Card -->
                <div class="px-0 py-0 sm:rounded-[2.2rem] sm:border sm:border-white/58 sm:bg-[linear-gradient(180deg,rgba(255,255,255,0.86),rgba(244,249,253,0.75))] sm:px-7 sm:py-8 sm:shadow-[0_34px_70px_-40px_rgba(1,56,106,0.34)] sm:backdrop-blur-sm lg:px-8 lg:py-9">
                    
                    <!-- Pill Badge -->
                    <span class="inline-flex items-center gap-2 rounded-full border border-white/70 bg-white/88 px-3.5 py-1.5 text-xs font-semibold tracking-wide text-[#01386A] sm:bg-white shadow-sm">
                        <i class="fa-solid fa-circle-check text-cyan-600 text-sm"></i>
                        <span>Trusted Mineral Water Distribution</span>
                    </span>

                    <!-- Main Heading & Paragraph -->
                    <div class="mt-5 space-y-4">
                        <h1 class="max-w-2xl text-4xl leading-tight font-black text-balance text-[#071C33] sm:text-5xl lg:text-[3.75rem]">
                            Premium Hydration for Homes, Offices and Businesses.
                        </h1>
                        <p class="max-w-xl text-base leading-relaxed text-[#38506A] sm:text-lg">
                            <?= APP_NAME ?> combines quality control, route reliability and premium service standards to keep your daily water operations smooth and professional.
                        </p>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="<?= get_whatsapp_order_url() ?>" target="_blank" rel="noopener noreferrer" class="cta-glow inline-flex items-center gap-2 rounded-xl bg-[#01386A] px-5 py-3 text-sm font-bold text-white transition duration-200 hover:bg-[#0b4c86]">
                            <i class="fa-brands fa-whatsapp text-lg text-emerald-400"></i>
                            <span>WhatsApp Order</span>
                        </a>

                        <a href="#products" class="cta-outline inline-flex items-center gap-2 rounded-xl border border-[#a9cce8]/70 bg-white/84 px-5 py-3 text-sm font-bold text-[#01386A] transition hover:bg-[#f6fbff] sm:bg-white">
                            <span>Explore Products</span>
                            <i class="fa-solid fa-arrow-down text-xs"></i>
                        </a>

                        <button onclick="openOrderModal()" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-cyan-600 to-[#0284c7] px-5 py-3 text-sm font-bold text-white transition hover:shadow-lg">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span>Instant Order</span>
                        </button>
                    </div>

                    <!-- 3 Feature Quick Cards -->
                    <div class="mt-7 grid max-w-3xl gap-3 sm:grid-cols-3">
                        <div class="rounded-2xl border border-white/60 bg-white/60 p-4 text-slate-900 shadow-[0_18px_34px_-26px_rgba(1,56,106,0.3)] backdrop-blur-sm">
                            <div class="flex items-center gap-2 text-[#01386A]">
                                <i class="fa-solid fa-flask-vial text-sm text-cyan-600"></i>
                                <span class="text-xs font-semibold tracking-wider uppercase text-slate-700">Quality Control</span>
                            </div>
                            <p class="mt-1.5 text-xs leading-relaxed text-[#5f7489]">
                                Consistent purification and safe handling checks on every batch.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-white/60 bg-white/60 p-4 text-slate-900 shadow-[0_18px_34px_-26px_rgba(1,56,106,0.3)] backdrop-blur-sm">
                            <div class="flex items-center gap-2 text-[#01386A]">
                                <i class="fa-solid fa-truck text-sm text-cyan-600"></i>
                                <span class="text-xs font-semibold tracking-wider uppercase text-slate-700">Route Delivery</span>
                            </div>
                            <p class="mt-1.5 text-xs leading-relaxed text-[#5f7489]">
                                Planned logistics for dependable daily fulfillment across key areas.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-white/60 bg-white/60 p-4 text-slate-900 shadow-[0_18px_34px_-26px_rgba(1,56,106,0.3)] backdrop-blur-sm">
                            <div class="flex items-center gap-2 text-[#01386A]">
                                <i class="fa-solid fa-location-dot text-sm text-cyan-600"></i>
                                <span class="text-xs font-semibold tracking-wider uppercase text-slate-700">Service Footprint</span>
                            </div>
                            <p class="mt-1.5 text-xs leading-relaxed text-[#5f7489]">
                                Rawalpindi & Islamabad — reliable support for homes, offices, and commercial supply.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>


<!-- ==========================================
     PRODUCT RANGE SECTION (#products)
     ========================================== -->
<section id="products" class="relative overflow-hidden bg-[radial-gradient(circle_at_top,#f8fbfe_0%,#edf5fb_100%)] py-16 sm:py-24">
    <!-- Subtle Water Drop Accent Lights -->
    <div class="pointer-events-none absolute -top-24 right-0 h-96 w-96 rounded-full bg-cyan-200/30 blur-3xl"></div>
    <div class="pointer-events-none absolute bottom-0 left-0 h-96 w-96 rounded-full bg-blue-200/20 blur-3xl"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="mx-auto max-w-2xl text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-[#d7ebf6] bg-white/90 px-4 py-1.5 text-xs font-bold tracking-[0.24em] text-[#0a4e80] uppercase shadow-sm">
                <i class="fa-solid fa-bottle-water text-cyan-600"></i> PRODUCT RANGE
            </span>
            <h2 class="mt-4 text-3xl font-black text-[#071C33] sm:text-4xl lg:text-5xl">
                Choose the right <?= APP_NAME ?> bottle size for every use case.
            </h2>
            <p class="mt-4 text-base leading-relaxed text-[#5f7489]">
                From quick-serve bottles to full dispenser supply, explore the full range below.
            </p>
        </div>

        <!-- 5 Interactive 3D Product Cards Grid -->
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
            <?php foreach ($products as $index => $prod): ?>
            <div class="product-card group relative block h-full overflow-hidden rounded-[2rem] border border-[#d4e4f2] bg-white p-4 shadow-[0_24px_50px_-32px_rgba(1,56,106,0.18)] transition-all duration-500 hover:-translate-y-2 hover:border-[#7eb0d8] hover:shadow-[0_30px_60px_-34px_rgba(1,56,106,0.28)] flex flex-col justify-between">
                
                <!-- Top Brand Ribbon -->
                <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-[#01386A] via-[#0b4c86] to-[#84b7df]"></div>
                <!-- Ambient corner orb -->
                <div class="absolute -top-10 -right-10 h-28 w-28 rounded-full bg-[#d8ecfb] opacity-0 blur-2xl transition duration-300 group-hover:opacity-100"></div>

                <div>
                    <!-- 3D Perspective Stage Container -->
                    <div class="product-stage relative isolate mt-2 overflow-hidden rounded-[1.35rem] bg-[linear-gradient(180deg,#f8fbff_0%,#e6f0f8_100%)] px-4 pt-5 pb-2">
                        <div class="product-stage__shadow pointer-events-none absolute inset-x-6 bottom-3 h-16 rounded-full bg-[#01386A]/12 blur-xl"></div>
                        <div class="product-stage__orb pointer-events-none absolute top-5 right-5 h-20 w-20 rounded-full bg-white/80 blur-2xl"></div>
                        <div class="product-stage__glow pointer-events-none absolute inset-0"></div>
                        
                        <img src="<?= $prod['image'] ?>" alt="<?= htmlspecialchars($prod['name']) ?> Aqua Water Bottle" class="product-stage__image relative z-10 mx-auto h-52 w-full object-contain object-bottom sm:h-56" loading="lazy" decoding="async">
                    </div>

                    <!-- Card Body -->
                    <div class="mt-4 space-y-1.5 px-1">
                        <div class="flex items-center justify-between">
                            <span class="text-[11px] font-bold tracking-widest text-[#0b4c86] uppercase"><?= htmlspecialchars($prod['use']) ?></span>
                            <span class="text-xs font-black text-cyan-800 bg-cyan-50 px-2 py-0.5 rounded-md border border-cyan-100">Rs. <?= $prod['price'] ?></span>
                        </div>
                        <h3 class="text-lg font-black text-[#071C33]"><?= htmlspecialchars($prod['name']) ?></h3>
                        <p class="text-xs leading-relaxed text-[#5f7489] line-clamp-2"><?= htmlspecialchars($prod['desc']) ?></p>
                    </div>
                </div>

                <!-- Bottom Order Triggers -->
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
                    <button onclick="openOrderModal('<?= $prod['id'] ?>')" class="flex-1 rounded-xl bg-[#01386A] py-2 text-xs font-bold text-white transition hover:bg-[#0b4c86] flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-cart-plus text-xs"></i> Order
                    </button>
                    <a href="<?= get_whatsapp_order_url("Hello Aqua Water 🌊💦, I am interested in ordering the {$prod['name']}.") ?>" target="_blank" class="flex h-8 w-8 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200 transition hover:bg-emerald-500 hover:text-white" title="Order via WhatsApp">
                        <i class="fa-brands fa-whatsapp text-sm"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Bottle Comparison Banner -->
        <div class="mt-10 rounded-2xl border border-white/60 bg-white/80 p-5 shadow-sm text-center max-w-3xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-left">
                <h4 class="text-sm font-bold text-[#071C33]">Need recurring route delivery for your business or home?</h4>
                <p class="text-xs text-slate-500">Scheduled route slots with automated weekly refills and clean billing.</p>
            </div>
            <a href="<?= get_whatsapp_order_url("Hello Aqua Water 🌊💦, I would like to schedule a weekly delivery route plan.") ?>" target="_blank" class="shrink-0 inline-flex items-center gap-2 rounded-xl bg-[#01386A] px-4 py-2 text-xs font-bold text-white hover:bg-[#0b4c86]">
                <i class="fa-solid fa-calendar-check text-cyan-300"></i> Schedule Route
            </a>
        </div>
    </div>
</section>


<!-- ==========================================
     B2B CUSTOM LABELING SECTION (#brands)
     ========================================== -->
<section id="brands" class="bg-[linear-gradient(180deg,#01386A_0%,#022B52_100%)] py-16 sm:py-20 text-white">
    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <div class="relative overflow-hidden rounded-[2.2rem] border border-white/16 bg-[linear-gradient(135deg,rgba(255,255,255,0.12),rgba(255,255,255,0.045))] p-5 shadow-[0_32px_72px_-42px_rgba(1,56,106,0.72)] sm:p-7 lg:p-8 backdrop-blur-sm">
            <!-- Top Gradient Bar -->
            <div class="absolute top-0 left-0 h-1.5 w-full bg-gradient-to-r from-[#d7e9f8] via-[#7fb2da] to-[#3b76ab]"></div>
            <div class="pointer-events-none absolute -top-24 -right-20 h-80 w-80 rounded-full bg-[rgba(207,228,245,0.12)] blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-28 left-8 h-72 w-72 rounded-full bg-[rgba(255,255,255,0.08)] blur-3xl"></div>

            <div class="relative z-10 grid gap-8 lg:grid-cols-[0.92fr_1.08fr] lg:items-center">
                <!-- Text Details -->
                <div>
                    <p class="text-xs font-semibold tracking-[0.24em] text-[#d5e7f6] uppercase">
                        B2B Custom Labeling
                    </p>
                    <h2 class="mt-3 max-w-xl text-3xl font-black text-white sm:text-5xl font-heading leading-tight">
                        Your Brand on Every Bottle.
                    </h2>
                    <p class="mt-4 max-w-xl text-sm leading-relaxed font-medium text-slate-300 sm:text-base">
                        Turn daily hydration into a premium brand impression with professionally labeled bottles for restaurants, offices, hospitality partners, schools and clinics.
                    </p>
                    
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="<?= get_whatsapp_order_url("Hello Aqua Water 🌊💦, I am interested in B2B Custom Label Water for my organization.") ?>" target="_blank" class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-[#01386A] shadow-lg shadow-[rgba(1,56,106,0.24)] transition hover:-translate-y-0.5 hover:bg-[#edf4fb]">
                            <span>Inquire Custom Labels</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                        <span class="inline-flex items-center rounded-xl border border-white/16 bg-white/8 px-5 py-3 text-sm font-bold text-[#d5e7f6]">
                            Custom labels for B2B partners
                        </span>
                    </div>
                </div>

                <!-- Main Showcase Image -->
                <div class="relative overflow-hidden rounded-[1.85rem] border border-white/14 bg-white/10 p-3 shadow-[inset_0_1px_0_rgba(255,255,255,0.12)] sm:p-4">
                    <div class="absolute inset-x-10 bottom-4 h-20 rounded-full bg-[#01386A]/28 blur-2xl"></div>
                    <img src="/public/images/optimized/your-brand-main.webp" alt="Custom branded Aqua Water bottle" class="relative z-10 mx-auto aspect-[3/2] w-full rounded-[1.45rem] object-contain shadow-[0_26px_56px_-34px_rgba(1,56,106,0.54)]" loading="lazy" decoding="async">
                </div>
            </div>

            <!-- 4 Sub-sectors Grid -->
            <div class="relative z-10 mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <?php foreach ($custom_brand_categories as $cat): ?>
                <article class="group overflow-hidden rounded-[1.5rem] border border-white/12 bg-white/7 p-3 shadow-[0_20px_42px_-32px_rgba(1,56,106,0.5)] transition duration-300 hover:-translate-y-1 hover:border-[#d3e6f6]/38">
                    <div class="relative isolate overflow-hidden rounded-[1.1rem] bg-[linear-gradient(180deg,rgba(244,249,253,0.98),rgba(214,232,246,0.95))]">
                        <div class="pointer-events-none absolute inset-x-6 bottom-3 h-16 rounded-full bg-[#01386A]/14 blur-xl"></div>
                        <img src="<?= $cat['image'] ?>" alt="<?= htmlspecialchars($cat['title']) ?>" class="relative z-10 aspect-square h-auto w-full object-cover transition duration-500 group-hover:scale-[1.035]" loading="lazy" decoding="async">
                    </div>
                    <div class="px-2 pt-4 pb-2">
                        <p class="mb-1.5 text-[10px] font-bold tracking-[0.22em] text-[#cfe4f5] uppercase">Custom Label</p>
                        <h3 class="text-base font-black text-white"><?= htmlspecialchars($cat['title']) ?></h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-slate-200/86"><?= htmlspecialchars($cat['desc']) ?></p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>

        </div>

    </div>
</section>


<!-- ==========================================
     HOW WE WORK SECTION (#process)
     ========================================== -->
<section id="process" class="relative overflow-hidden border-y border-[#d7e7f3] bg-[radial-gradient(circle_at_15%_20%,rgba(1,56,106,0.08),transparent_28%),radial-gradient(circle_at_85%_75%,rgba(91,148,197,0.12),transparent_30%),linear-gradient(180deg,#ffffff_0%,#f3f8fd_100%)] py-16 text-slate-900 sm:py-20">
    <div class="pointer-events-none absolute -top-24 -left-24 h-72 w-72 rounded-full bg-[#d8ecfb]/60 blur-3xl"></div>
    <div class="pointer-events-none absolute -right-20 bottom-0 h-80 w-80 rounded-full bg-[#b9d9f0]/40 blur-3xl"></div>

    <div class="relative mx-auto w-full max-w-6xl px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mx-auto mb-12 max-w-2xl text-center">
            <p class="text-xs font-bold tracking-[0.28em] text-[#01386A] uppercase">
                How We Work
            </p>
            <h2 class="mt-3 text-3xl font-black text-[#10263c] sm:text-4xl font-heading">
                Simple, Professional Process
            </h2>
            <p class="mt-4 text-sm leading-7 text-[#5f7489] sm:text-base">
                From requirement to regular delivery, <?= APP_NAME ?> makes clean water supply simple, reliable and professionally managed.
            </p>
        </div>

        <div class="relative">
            <!-- Connecting line for desktop -->
            <div class="pointer-events-none absolute top-12 left-0 hidden h-[2px] w-full bg-gradient-to-r from-transparent via-[#5b94c5]/50 to-transparent xl:block"></div>

            <!-- 4 Step Cards -->
            <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($process_steps as $step): ?>
                <article class="group relative overflow-hidden rounded-[2rem] border border-white/70 bg-white/82 p-6 shadow-[0_24px_60px_-35px_rgba(1,56,106,0.22)] transition duration-300 hover:-translate-y-2 hover:border-[#8bbce0] hover:bg-white hover:shadow-[0_30px_70px_-38px_rgba(1,56,106,0.3)]">
                    <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-[#01386A] via-[#5b94c5] to-[#bfe3fb]"></div>
                    <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#d8ecfb] opacity-0 blur-2xl transition duration-300 group-hover:opacity-100"></div>

                    <div class="relative z-10 flex items-center justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-[#d7e7f3] bg-[#edf4fb] text-[#01386A] transition duration-300 group-hover:scale-110 group-hover:bg-[#01386A] group-hover:text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="<?= $step['icon'] ?>" />
                            </svg>
                        </div>
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-[#d7e7f3] bg-white text-sm font-black text-[#01386A] shadow-sm transition duration-300 group-hover:bg-[#01386A] group-hover:text-white">
                            <?= $step['step'] ?>
                        </span>
                    </div>

                    <h3 class="relative z-10 mt-6 text-lg font-black text-[#10263c]"><?= htmlspecialchars($step['title']) ?></h3>
                    <p class="relative z-10 mt-3 text-sm leading-7 text-[#5f7489]"><?= htmlspecialchars($step['detail']) ?></p>

                    <div class="absolute right-0 bottom-0 left-0 h-12 translate-y-7 rounded-t-[100%] bg-gradient-to-r from-[#edf7ff] via-[#d6ebfb] to-[#edf7ff] opacity-80 transition duration-300 group-hover:translate-y-5"></div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>


<!-- ==========================================
     OUR 9-STEP PURIFICATION PROCESS SECTION (#purification)
     ========================================== -->
<section id="purification" class="relative overflow-hidden bg-[radial-gradient(circle_at_15%_18%,#05345B_0%,#012344_100%)] py-16 text-white sm:py-24">
    <!-- Radial ambient glows -->
    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_10%_15%,rgba(34,211,238,0.18),transparent_34%),radial-gradient(circle_at_88%_18%,rgba(96,165,250,0.14),transparent_32%),radial-gradient(circle_at_52%_90%,rgba(250,204,21,0.08),transparent_28%)]"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between border-b border-white/10 pb-8">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full border border-cyan-400/30 bg-cyan-400/10 px-3.5 py-1 text-xs font-bold tracking-wider text-cyan-300 uppercase">
                    <i class="fa-solid fa-atom text-xs"></i> Quality Engineering
                </div>
                <h2 id="purification-heading" class="mt-3 text-3xl font-black text-white sm:text-4xl lg:text-5xl font-heading">
                    Our 9-Step Purification Process
                </h2>
            </div>
            <p class="max-w-md text-xs leading-relaxed text-cyan-100/90 sm:text-sm md:text-right">
                At <?= APP_NAME ?>, every bottle goes through careful purification, food-grade storage, mineral balancing, disinfection and quality checking to deliver clean, safe and refreshing drinking water.
            </p>
        </div>

        <!-- FLUID FLOW DIAGRAM: JOURNEY BOARD (Desktop) -->
        <div class="mt-10 rounded-[1.6rem] border border-white/15 bg-white/5 p-4 sm:p-6 shadow-2xl backdrop-blur-md">
            <div class="mb-4 flex items-center justify-between">
                <p class="text-[11px] font-bold tracking-[0.24em] text-cyan-300 uppercase flex items-center gap-1.5">
                    <i class="fa-solid fa-water text-xs"></i> Continuous Fluid Flow Diagram
                </p>
                <div class="rounded-full border border-cyan-200/20 bg-cyan-300/10 px-3 py-1 text-[10px] font-bold tracking-wider text-cyan-100">
                    <?= APP_NAME ?> 🌊💦
                </div>
            </div>

            <!-- Desktop SVG Journey Board Container -->
            <div class="hidden md:block">
                <div class="journey-board">
                    <div class="ambient-glow ambient-a"></div>
                    <div class="ambient-glow ambient-b"></div>

                    <!-- Flow SVG path connecting Row 1 (L->R), Row 2 (R->L), Row 3 (L->R) -->
                    <svg class="journey-svg" viewBox="0 0 900 370" preserveAspectRatio="none" aria-hidden="true">
                        <path class="journey-path-base" d="M109 55 H791 M791 55 V185 M791 185 H109 M109 185 V315 M109 315 H791"></path>
                        <path class="journey-path-glow" d="M109 55 H791 M791 55 V185 M791 185 H109 M109 185 V315 M109 315 H791"></path>
                    </svg>

                    <!-- Traveling Water Drop Element with Keyframe Animation -->
                    <div class="travel-layer" aria-hidden="true">
                        <div class="water-drop">
                            <span class="water-drop-core"></span>
                            <span class="water-drop-ring"></span>
                            <span class="water-drop-trail"></span>
                        </div>
                    </div>

                    <!-- Row 1 Nodes (01, 02, 03) -->
                    <div class="journey-node row-1 col-1">
                        <div class="journey-node-badge">01</div>
                        <div class="journey-node-short">Collection</div>
                    </div>
                    <div class="journey-node row-1 col-2">
                        <div class="journey-node-badge">02</div>
                        <div class="journey-node-short">Pre-Filter</div>
                    </div>
                    <div class="journey-node row-1 col-3">
                        <div class="journey-node-badge">03</div>
                        <div class="journey-node-short">Carbon</div>
                    </div>

                    <!-- Row 2 Nodes (06, 05, 04 - in reverse direction) -->
                    <div class="journey-node row-2 col-3">
                        <div class="journey-node-badge">04</div>
                        <div class="journey-node-short">Reduction</div>
                    </div>
                    <div class="journey-node row-2 col-2 journey-node-highlight">
                        <div class="journey-node-badge bg-cyan-400 text-slate-900">05</div>
                        <div class="journey-node-short text-cyan-200">RO Purification</div>
                    </div>
                    <div class="journey-node row-2 col-1">
                        <div class="journey-node-badge">06</div>
                        <div class="journey-node-short">Storage</div>
                    </div>

                    <!-- Row 3 Nodes (07, 08, 09) -->
                    <div class="journey-node row-3 col-1 journey-node-highlight">
                        <div class="journey-node-badge bg-cyan-400 text-slate-900">07</div>
                        <div class="journey-node-short text-cyan-200">Minerals</div>
                    </div>
                    <div class="journey-node row-3 col-2 journey-node-highlight">
                        <div class="journey-node-badge bg-cyan-400 text-slate-900">08</div>
                        <div class="journey-node-short text-cyan-200">UV + Ozone</div>
                    </div>
                    <div class="journey-node row-3 col-3">
                        <div class="journey-node-badge">09</div>
                        <div class="journey-node-short">Bottling</div>
                    </div>

                    <div class="journey-side-label journey-start">Source Intake</div>
                    <div class="journey-side-label journey-end">Final Bottling</div>
                </div>
            </div>

            <!-- Mobile Vertical Journey Layout -->
            <div class="block md:hidden">
                <div class="mobile-journey">
                    <div class="mobile-journey-line"></div>
                    <div class="mobile-travel-layer" aria-hidden="true">
                        <div class="mobile-water-drop">
                            <span class="mobile-water-drop-core"></span>
                        </div>
                    </div>
                    <div>
                        <?php foreach ($purification_steps as $step): ?>
                        <div class="mobile-node <?= $step['highlight'] ? 'mobile-node-highlight' : '' ?>">
                            <div class="mobile-node-badge <?= $step['highlight'] ? 'mobile-node-badge-highlight' : '' ?>">
                                <?= $step['id'] ?>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-white"><?= htmlspecialchars($step['title']) ?></p>
                                <p class="text-[10px] text-slate-300"><?= htmlspecialchars($step['short']) ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Footer summary bar inside purification -->
            <div class="mt-6 flex flex-col items-center justify-between gap-3 border-t border-cyan-200/20 pt-4 sm:flex-row">
                <div class="flex items-center gap-3 text-xs text-cyan-100">
                    <i class="fa-solid fa-shield-halved text-cyan-400"></i>
                    <span>TDS & Mineral balanced adhering to PSQCA & WHO Standards</span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="tel:<?= APP_PHONE_RAW ?>" class="inline-flex items-center gap-1.5 rounded-lg bg-gradient-to-r from-[#f6d77a] to-[#eec95d] px-3.5 py-1.5 text-xs font-black tracking-wider text-[#10263b] uppercase shadow-md transition hover:scale-105">
                        <i class="fa-solid fa-phone text-xs"></i> Call <?= APP_PHONE_RAW ?>
                    </a>
                    <a href="/lab-report.php" class="inline-flex items-center gap-1 text-xs font-semibold text-cyan-300 hover:text-white underline">
                        View Lab Test Reports →
                    </a>
                </div>
            </div>

        </div>

        <!-- 9 Detailed Step Cards Grid -->
        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($purification_steps as $step): ?>
            <article class="group rounded-2xl border <?= $step['highlight'] ? 'border-cyan-400/40 bg-gradient-to-br from-cyan-950/40 to-slate-900/60' : 'border-white/10 bg-white/5' ?> p-5 transition duration-300 hover:-translate-y-1 hover:border-cyan-300/50">
                <div class="flex items-center justify-between">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl <?= $step['highlight'] ? 'bg-cyan-400 text-slate-900' : 'bg-white/10 text-cyan-300' ?> text-sm font-black">
                        <?= $step['id'] ?>
                    </span>
                    <span class="text-[10px] font-bold tracking-widest uppercase text-cyan-200/80">
                        <?= htmlspecialchars($step['short']) ?>
                    </span>
                </div>
                <h3 class="mt-4 text-base font-black text-white"><?= htmlspecialchars($step['title']) ?></h3>
                <p class="mt-2 text-xs leading-relaxed text-slate-300"><?= htmlspecialchars($step['detail']) ?></p>
            </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<!-- ==========================================
     WHERE WE SERVE / TRUSTED SECTION (#trusted)
     ========================================== -->
<section id="trusted" class="relative overflow-hidden border-y border-[#dcecf7] bg-[radial-gradient(circle_at_14%_18%,rgba(183,228,249,0.28),transparent_24%),radial-gradient(circle_at_88%_16%,rgba(208,241,255,0.24),transparent_22%),linear-gradient(180deg,#fafdff_0%,#eef7fd_100%)] py-14 text-slate-900 sm:py-16">
    <div class="relative mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-[#d7ebf6] bg-white/90 px-4 py-2 text-xs font-bold tracking-[0.24em] text-[#0a4e80] uppercase shadow-sm">
                    <i class="fa-solid fa-shield-halved text-cyan-600"></i> Where We Serve
                </div>
                <h2 class="mt-4 text-3xl font-black tracking-tight text-[#10263c] sm:text-4xl font-heading">
                    Reliable Water Delivery for Homes, Offices and Businesses
                </h2>
                <p class="mt-4 max-w-xl text-sm leading-7 text-[#5f7489] sm:text-base">
                    <?= APP_NAME ?> delivers clean, refreshing bottled water for homes, offices, restaurants and businesses across Rawalpindi and Islamabad — with reliable service and scheduled delivery.
                </p>
            </div>
        </div>

        <!-- 3 Sector Cards -->
        <div class="grid gap-6 lg:grid-cols-3">
            <?php foreach ($delivery_sectors as $sector): ?>
            <article class="group overflow-hidden rounded-[2rem] border border-[#d4e4f2] bg-white shadow-[0_24px_50px_-32px_rgba(1,56,106,0.14)] transition duration-300 hover:-translate-y-1 hover:border-[#7eb0d8]">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <img src="<?= $sector['image'] ?>" alt="<?= htmlspecialchars($sector['title']) ?>" class="h-full w-full object-cover object-center transition duration-500 group-hover:scale-[1.04]" loading="lazy" decoding="async">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#032847]/92 via-[#032847]/44 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-5">
                        <span class="inline-flex rounded-full border border-white/14 bg-white/10 px-2.5 py-1 text-[10px] font-bold tracking-[0.18em] text-[#d5e7f6] uppercase">
                            <?= htmlspecialchars($sector['label']) ?>
                        </span>
                        <h3 class="mt-2 text-xl font-black text-white"><?= htmlspecialchars($sector['title']) ?></h3>
                        <p class="mt-1 text-xs leading-relaxed text-slate-200"><?= htmlspecialchars($sector['detail']) ?></p>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <!-- 3 Service Pillars Strip -->
        <div class="mt-8 rounded-[1.9rem] border border-[#0b4c86]/12 bg-[linear-gradient(180deg,#05345B_0%,#0a4e80_100%)] p-5 text-white shadow-[0_30px_60px_-34px_rgba(1,56,106,0.34)] sm:p-6">
            <div class="grid gap-4 md:grid-cols-3">
                <article class="flex items-start gap-3 rounded-[1.35rem] border border-white/10 bg-white/8 p-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl border border-white/10 bg-white/10 text-[#d5e7f6]">
                        <i class="fa-solid fa-calendar-check text-base text-cyan-300"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-black text-white">Planned Route Windows</h4>
                        <p class="mt-1 text-xs leading-6 text-slate-200">Scheduled delivery windows keep repeat supply on track without interruption.</p>
                    </div>
                </article>

                <article class="flex items-start gap-3 rounded-[1.35rem] border border-white/10 bg-white/8 p-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl border border-white/10 bg-white/10 text-[#d5e7f6]">
                        <i class="fa-solid fa-file-invoice text-base text-cyan-300"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-black text-white">Clean Billing Trail</h4>
                        <p class="mt-1 text-xs leading-6 text-slate-200">Orders, receipts and account records stay transparent and easy to reconcile.</p>
                    </div>
                </article>

                <article class="flex items-start gap-3 rounded-[1.35rem] border border-white/10 bg-white/8 p-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl border border-white/10 bg-white/10 text-[#d5e7f6]">
                        <i class="fa-solid fa-handshake text-base text-cyan-300"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-black text-white">Reliable Account Handling</h4>
                        <p class="mt-1 text-xs leading-6 text-slate-200">Recurring clients receive direct coordination and dependable follow-through.</p>
                    </div>
                </article>
            </div>
        </div>

    </div>
</section>


<!-- ==========================================
     OUR TEAM SECTION (#team)
     ========================================== -->
<section id="team" class="relative overflow-hidden bg-[radial-gradient(circle_at_12%_18%,rgba(125,177,217,0.18),transparent_24%),radial-gradient(circle_at_88%_78%,rgba(255,255,255,0.08),transparent_24%),linear-gradient(180deg,#012f5b_0%,#02274b_100%)] py-14 sm:py-16 text-white">
    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10 flex flex-col gap-3 max-w-2xl">
            <p class="text-xs font-semibold tracking-[0.24em] text-[#d5e7f6] uppercase">
                Our Team
            </p>
            <h2 class="text-3xl font-black text-white sm:text-4xl font-heading">
                The people carrying <?= APP_NAME ?> every day.
            </h2>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <?php foreach ($team_members as $index => $member): 
                $initials = implode('', array_slice(array_map(fn($w) => $w[0] ?? '', explode(' ', $member['name'])), 0, 2));
            ?>
            <article class="group relative overflow-hidden rounded-[1.9rem] border border-white/12 bg-[linear-gradient(180deg,rgba(255,255,255,0.08),rgba(255,255,255,0.04))] p-5 shadow-[0_24px_48px_-32px_rgba(1,56,106,0.5)] transition duration-300 hover:-translate-y-1 hover:border-[#d4e5f4]/36">
                <!-- Top strip -->
                <div class="absolute top-0 left-0 h-1.5 w-full bg-gradient-to-r from-[#d7e9f8] via-[#7db1d9] to-[#2f6fa8]"></div>

                <div class="relative z-10 flex items-start justify-between gap-3">
                    <span class="rounded-full border border-white/12 bg-white/8 px-3 py-1 text-[10px] font-bold tracking-[0.18em] text-[#d5e7f6] uppercase">
                        <?= htmlspecialchars($member['badge']) ?>
                    </span>
                    <span class="text-[10px] font-bold tracking-[0.3em] text-[#d5e7f6]/44 uppercase">
                        0<?= $index + 1 ?>
                    </span>
                </div>

                <div class="relative z-10 mt-6 grid h-20 w-20 place-items-center rounded-[1.5rem] bg-[linear-gradient(145deg,#7eb0d8_0%,#1f6fae_42%,#0a2947_100%)] shadow-[0_22px_40px_-28px_rgba(0,0,0,0.85)]">
                    <span class="text-2xl font-black tracking-[0.08em] text-white"><?= $initials ?></span>
                </div>

                <h3 class="relative z-10 mt-5 text-lg font-black text-white"><?= htmlspecialchars($member['name']) ?></h3>
                <p class="relative z-10 mt-1 text-[11px] font-bold tracking-[0.14em] text-[#d5e7f6] uppercase"><?= htmlspecialchars($member['role']) ?></p>
                <p class="relative z-10 mt-3 text-xs leading-relaxed text-slate-300"><?= htmlspecialchars($member['desc']) ?></p>
            </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<!-- ==========================================
     BLOG SECTION (#blog)
     ========================================== -->
<section id="blog" class="relative overflow-hidden border-y border-[#dcecf7] bg-[radial-gradient(circle_at_14%_18%,rgba(183,228,249,0.24),transparent_24%),radial-gradient(circle_at_88%_16%,rgba(208,241,255,0.2),transparent_22%),linear-gradient(180deg,#fafdff_0%,#eef7fd_100%)] py-14 text-slate-900 sm:py-16">
    <div class="relative mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10">
            <span class="inline-flex items-center gap-2 rounded-full border border-[#d7ebf6] bg-white/90 px-4 py-2 text-xs font-bold tracking-[0.24em] text-[#0a4e80] uppercase shadow-sm">
                <i class="fa-solid fa-newspaper text-cyan-600"></i> Blogs & Insights
            </span>
            <h2 class="mt-4 text-3xl font-black text-[#10263c] sm:text-4xl font-heading">
                Clean Water Knowledge & Updates
            </h2>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($homepage_blogs as $blog): ?>
            <article class="group relative overflow-hidden rounded-[2rem] border border-[#d4e4f2] bg-white shadow-[0_24px_50px_-32px_rgba(1,56,106,0.14)] transition duration-300 hover:-translate-y-1 hover:border-[#7eb0d8] flex flex-col justify-between">
                <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-[#01386A] via-[#0b4c86] to-[#84b7df]"></div>

                <div class="relative aspect-[4/3] overflow-hidden bg-[radial-gradient(circle_at_top,#f8fbff_0%,#e6eff7_100%)]">
                    <?php if (!empty($blog['image'])): ?>
                    <img src="<?= $blog['image'] ?>" alt="<?= htmlspecialchars($blog['title']) ?>" class="h-full w-full object-cover object-center transition duration-500 group-hover:scale-[1.03]" loading="lazy">
                    <?php endif; ?>
                    <div class="absolute inset-x-0 top-0 flex items-start justify-between p-4">
                        <span class="rounded-full border border-white/70 bg-white/92 px-2.5 py-1 text-[10px] font-bold tracking-[0.18em] text-[#0b4c86] uppercase">Featured Read</span>
                    </div>
                </div>

                <div class="p-6">
                    <div class="flex items-center justify-between text-xs text-slate-400 mb-3">
                        <span class="text-xs text-slate-400"><?= $blog['date'] ?></span>
                        <span><?= $blog['read_time'] ?></span>
                    </div>

                    <h3 class="text-lg font-black text-[#10263c] transition-colors group-hover:text-[#01386A] leading-snug">
                        <?= htmlspecialchars($blog['title']) ?>
                    </h3>

                    <p class="mt-3 text-xs leading-relaxed text-[#5f7489]">
                        <?= htmlspecialchars($blog['excerpt']) ?>
                    </p>

                    <div class="mt-4 flex flex-wrap gap-1.5">
                        <?php foreach ($blog['tags'] as $tag): ?>
                        <span class="rounded-full border border-[#d7e7f3] bg-[#f7fbff] px-2.5 py-1 text-[10px] font-bold tracking-wide text-[#35516d]">
                            <?= htmlspecialchars($tag) ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="p-6 pt-0 border-t border-slate-50 mt-4 flex items-center justify-between">
                    <span class="text-xs text-slate-400"><?= $blog['date'] ?></span>
                    <a href="/about-us.php" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#01386A] group-hover:text-cyan-600">
                        <span>Read Article</span>
                        <i class="fa-solid fa-arrow-right text-[10px] transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<!-- ==========================================
     CONTACT & DIRECT INQUIRY SECTION (#contact)
     ========================================== -->
<section id="contact" class="py-16 bg-white sm:py-20 border-t border-slate-100">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
            <!-- Left Info Column -->
            <div>
                <span class="inline-flex items-center gap-2 rounded-full border border-[#d7ebf6] bg-cyan-50 px-4 py-1.5 text-xs font-bold tracking-[0.24em] text-[#0a4e80] uppercase">
                    <i class="fa-solid fa-headset text-cyan-600"></i> Get In Touch
                </span>
                
                <h2 class="mt-4 text-3xl font-black text-[#071C33] sm:text-4xl font-heading leading-tight">
                    Start Your Fresh Hydration Supply Today.
                </h2>
                
                <p class="mt-4 text-sm leading-relaxed text-slate-600 sm:text-base">
                    Whether you need scheduled weekly delivery of 19L dispenser bottles for your office or custom-branded water bottles for your restaurant, our team is ready to serve you.
                </p>

                <div class="mt-8 space-y-4">
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#01386A] text-white">
                            <i class="fa-solid fa-phone text-lg"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Direct Helpline</p>
                            <p class="text-base font-bold text-slate-900"><?= APP_PHONE ?></p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-emerald-50 border border-emerald-100">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600 text-white">
                            <i class="fa-brands fa-whatsapp text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-emerald-700 uppercase tracking-wider">Fast WhatsApp Channel</p>
                            <p class="text-base font-bold text-emerald-950">Instant order confirmation & tracking</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#01386A] text-white">
                            <i class="fa-solid fa-map-location-dot text-lg"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Operational Areas</p>
                            <p class="text-base font-bold text-slate-900"><?= APP_LOCATION ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Form Column -->
            <div class="rounded-[2.2rem] border border-[#d4e4f2] bg-[linear-gradient(180deg,#fcfdff_0%,#f4f8fc_100%)] p-6 shadow-xl sm:p-8">
                <h3 class="text-xl font-black text-[#071C33] font-heading">
                    Send Us an Inquiry
                </h3>
                <p class="mt-1 text-xs text-slate-500">
                    Fill the form below and we will respond within 30 minutes during work hours.
                </p>

                <form id="contact-form" onsubmit="handleContactSubmit(event)" class="mt-6 space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Your Name</label>
                        <input type="text" name="name" required placeholder="John Doe / Business Name" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:outline-none">
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Phone Number</label>
                            <input type="tel" name="phone" required placeholder="03xx xxxxxxx" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email Address</label>
                            <input type="email" name="email" placeholder="name@company.com" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Subject / Requirement</label>
                        <select name="subject" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:outline-none">
                            <option value="Home Delivery">Home Water Delivery (19L)</option>
                            <option value="Corporate Office">Corporate Office Regular Supply</option>
                            <option value="B2B Custom Labeling">B2B Custom Labeling Inquiry</option>
                            <option value="Retail Distribution">Retail Store Stocking</option>
                            <option value="General Query">General Question</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Message / Daily Volume</label>
                        <textarea name="message" rows="3" required placeholder="Tell us your location, required bottle sizes, and frequency..." class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="w-full rounded-xl bg-[#01386A] py-3 text-sm font-bold text-white shadow-lg transition duration-200 hover:bg-[#0b4c86]">
                        <i class="fa-solid fa-paper-plane mr-2"></i> Submit Inquiry
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
