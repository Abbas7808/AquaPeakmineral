<?php
if (!defined('APP_NAME')) {
    require_once __DIR__ . '/../config.php';
}
$current_page = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>
<!DOCTYPE html>
<html lang="en" class="light scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($page_title ?? APP_NAME . ' | ' . APP_TAGLINE) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_desc ?? 'Aqua Water provides pure drinking water and premium route delivery for homes, offices, restaurants, and businesses.') ?>">
    <link rel="icon" href="/public/images/aqua_water_logo.svg" type="image/svg+xml">
    
    <!-- Fonts matching source site: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome & Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Master Tailwind & Custom Theme CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/public/css/style.css">

    <style>
        :root {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        h1, h2, h3, h4, .font-heading {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="font-sans antialiased bg-white text-slate-900 selection:bg-[#01386A] selection:text-white">

<!-- Floating Glassmorphic Header Bar -->
<header class="fixed inset-x-0 top-0 z-50 px-3 pt-3 sm:px-6 lg:px-8">
    <div class="mx-auto flex w-full max-w-7xl items-center justify-between rounded-[1.6rem] border border-white/12 bg-[rgba(3,31,56,0.92)] px-4 py-3 shadow-[0_24px_52px_-30px_rgba(0,0,0,0.45)] backdrop-blur-md sm:px-6">
        
        <!-- Brand Logo & Wordmark -->
        <a href="/index.php" class="flex shrink-0 items-center gap-2.5 sm:gap-3 group">
            <img src="/public/images/aqua_water_logo.svg" alt="Aqua Water" class="h-9 w-9 rounded-xl border border-white/25 bg-white/95 object-contain p-0.5 shadow-sm sm:h-10 sm:w-10 transition duration-300 group-hover:scale-105">
            <div class="hidden sm:block text-left">
                <p class="text-[11px] font-bold tracking-[0.22em] text-[#cfe4f5] uppercase flex items-center gap-1.5">
                    Aqua Water <span class="text-xs">🌊</span>
                </p>
                <p class="text-sm font-semibold text-white">
                    Premium Water Supply
                </p>
            </div>
            <div class="block sm:hidden text-left">
                <p class="text-[13px] font-bold tracking-wide text-white flex items-center gap-1">
                    Aqua Water <span>🌊</span>
                </p>
            </div>
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="hidden items-center gap-1 rounded-full border border-white/10 bg-white/6 px-3 py-1.5 text-sm font-medium text-slate-200/90 lg:flex">
            <a href="/index.php" class="rounded-full px-3.5 py-1.5 transition hover:bg-white/10 hover:text-white <?= $current_page === 'index.php' ? 'text-white bg-white/10 font-semibold' : '' ?>">Home</a>
            <a href="/index.php#products" class="rounded-full px-3.5 py-1.5 transition hover:bg-white/10 hover:text-white">Products</a>
            <a href="/index.php#process" class="rounded-full px-3.5 py-1.5 transition hover:bg-white/10 hover:text-white">Process</a>
            <a href="/purification-process.php" class="rounded-full px-3.5 py-1.5 transition hover:bg-white/10 hover:text-white <?= $current_page === 'purification-process.php' ? 'text-white bg-white/10 font-semibold' : '' ?>">Purification</a>
            <a href="/about-us.php" class="rounded-full px-3.5 py-1.5 transition hover:bg-white/10 hover:text-white <?= $current_page === 'about-us.php' ? 'text-white bg-white/10 font-semibold' : '' ?>">About Us</a>
            <a href="/lab-report.php" class="rounded-full px-3.5 py-1.5 transition hover:bg-white/10 hover:text-white <?= $current_page === 'lab-report.php' ? 'text-white bg-white/10 font-semibold' : '' ?>">Lab Reports</a>
            <a href="/contact-us.php" class="rounded-full px-3.5 py-1.5 transition hover:bg-white/10 hover:text-white <?= $current_page === 'contact-us.php' ? 'text-white bg-white/10 font-semibold' : '' ?>">Contact</a>
        </nav>

        <!-- Right Action Controls -->
        <div class="flex shrink-0 items-center gap-2 sm:gap-3">
            <!-- Quick Order Button -->
            <button onclick="openOrderModal()" class="hidden items-center gap-2 rounded-xl bg-gradient-to-r from-cyan-500 to-[#0284c7] px-3.5 py-2 text-xs font-bold text-white shadow-md shadow-cyan-900/40 transition duration-200 hover:-translate-y-0.5 hover:shadow-cyan-500/30 sm:inline-flex">
                <i class="fa-solid fa-cart-shopping text-xs"></i>
                <span>Quick Order</span>
            </button>

            <!-- WhatsApp Direct Button -->
            <a href="<?= get_whatsapp_order_url() ?>" target="_blank" rel="noopener noreferrer" class="hidden items-center gap-1.5 rounded-xl border border-white/18 bg-white/8 px-3.5 py-2 text-xs font-semibold text-white transition hover:-translate-y-0.5 hover:bg-white/14 md:inline-flex" title="WhatsApp Us">
                <i class="fa-brands fa-whatsapp text-emerald-400 text-sm"></i>
                <span>WhatsApp</span>
            </a>

            <!-- Customer Login Button -->
            <a href="/login.php" class="hidden rounded-xl bg-white px-3.5 py-2 text-xs font-bold text-[#01386A] shadow-[0_18px_38px_-24px_rgba(255,255,255,0.45)] transition hover:-translate-y-0.5 hover:bg-[#e9f2f9] sm:inline-flex">
                <span>Login</span>
            </a>

            <!-- Mobile Hamburger Menu Button -->
            <button type="button" onclick="toggleMobileMenu()" class="flex h-9 w-9 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-white transition hover:bg-white/10 lg:hidden" aria-label="Toggle menu">
                <i id="hamburger-icon" class="fa-solid fa-bars text-base"></i>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Slide-out Drawer Navigation -->
<div id="mobile-drawer-backdrop" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden" style="opacity: 0; pointer-events: none;" onclick="toggleMobileMenu()"></div>

<div id="mobile-drawer" class="fixed inset-y-0 right-0 z-50 w-[85vw] max-w-[360px] translate-x-full bg-[linear-gradient(180deg,#01386A_0%,#022B52_100%)] text-white shadow-2xl transition-transform duration-300 ease-out flex flex-col overflow-y-auto lg:hidden" style="transform: translateX(100%);" aria-hidden="true">
    <!-- Drawer Header -->
    <div class="border-b border-white/10 p-5 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <img src="/public/images/aqua_water_logo.svg" alt="Aqua Water" class="h-9 w-9 rounded-xl bg-white/95 p-1">
            <div class="flex flex-col text-left">
                <span class="text-[10px] tracking-widest text-[#cfe4f5] uppercase font-bold">Aqua Water 🌊💦</span>
                <span class="text-sm font-bold text-white">Menu & Navigation</span>
            </div>
        </div>
        <button onclick="toggleMobileMenu()" class="h-8 w-8 rounded-lg bg-white/10 flex items-center justify-center text-slate-200 hover:text-white" aria-label="Close menu">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <!-- Drawer Navigation Links -->
    <div class="flex flex-col gap-1 p-4">
        <a href="/index.php" onclick="toggleMobileMenu()" class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-200 transition hover:bg-white/8 hover:text-white">
            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10 text-[#d5e7f6]"><i class="fa-solid fa-house text-xs"></i></span>
            <span class="font-semibold text-sm">Home</span>
        </a>
        <a href="/index.php#products" onclick="toggleMobileMenu()" class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-200 transition hover:bg-white/8 hover:text-white">
            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10 text-[#d5e7f6]"><i class="fa-solid fa-bottle-water text-xs"></i></span>
            <span class="font-semibold text-sm">Bottle Range</span>
        </a>
        <a href="/index.php#process" onclick="toggleMobileMenu()" class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-200 transition hover:bg-white/8 hover:text-white">
            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10 text-[#d5e7f6]"><i class="fa-solid fa-arrows-spin text-xs"></i></span>
            <span class="font-semibold text-sm">How We Work</span>
        </a>
        <a href="/purification-process.php" onclick="toggleMobileMenu()" class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-200 transition hover:bg-white/8 hover:text-white">
            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10 text-[#d5e7f6]"><i class="fa-solid fa-filter text-xs"></i></span>
            <span class="font-semibold text-sm">9-Step Purification</span>
        </a>
        <a href="/about-us.php" onclick="toggleMobileMenu()" class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-200 transition hover:bg-white/8 hover:text-white">
            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10 text-[#d5e7f6]"><i class="fa-solid fa-users text-xs"></i></span>
            <span class="font-semibold text-sm">About Us</span>
        </a>
        <a href="/lab-report.php" onclick="toggleMobileMenu()" class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-200 transition hover:bg-white/8 hover:text-white">
            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10 text-[#d5e7f6]"><i class="fa-solid fa-flask-vial text-xs"></i></span>
            <span class="font-semibold text-sm">Lab Test Reports</span>
        </a>
        <a href="/contact-us.php" onclick="toggleMobileMenu()" class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-200 transition hover:bg-white/8 hover:text-white">
            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10 text-[#d5e7f6]"><i class="fa-solid fa-phone text-xs"></i></span>
            <span class="font-semibold text-sm">Contact Us</span>
        </a>
    </div>

    <!-- Drawer Footer Actions -->
    <div class="mt-auto border-t border-white/10 p-5 space-y-3">
        <button onclick="toggleMobileMenu(); openOrderModal();" class="w-full flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-cyan-400 to-[#0284c7] px-4 py-3 text-sm font-bold text-white shadow-lg">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Place Bottle Order</span>
        </button>

        <a href="<?= get_whatsapp_order_url() ?>" target="_blank" rel="noopener noreferrer" class="w-full flex items-center justify-center gap-2 rounded-xl border border-white/15 bg-white/10 px-4 py-3 text-sm font-semibold text-white hover:bg-white/15">
            <i class="fa-brands fa-whatsapp text-emerald-400 text-base"></i>
            <span>WhatsApp Us Now</span>
        </a>

        <a href="/login.php" class="w-full flex items-center justify-center gap-2 rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-[#01386A]">
            <i class="fa-solid fa-user-lock"></i>
            <span>Customer Portal Login</span>
        </a>
    </div>
</div>
