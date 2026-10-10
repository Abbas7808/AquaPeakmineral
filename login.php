<?php
require_once __DIR__ . '/config.php';
$page_title = 'Customer Portal Login | ' . APP_NAME . ' 🌊💦';
$page_desc = 'Login or register for your Aqua Water customer account to manage bottle deliveries, view route schedules, and track invoices.';
require_once __DIR__ . '/includes/header.php';
?>

<main class="min-h-screen pt-32 pb-20 bg-[radial-gradient(circle_at_top,#f8fbfe_0%,#edf5fb_100%)] flex items-center justify-center px-4">
    <div class="w-full max-w-md rounded-[2.2rem] border border-[#d4e4f2] bg-white p-8 shadow-2xl">
        <!-- Logo & Header -->
        <div class="text-center">
            <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-cyan-50 border border-cyan-100 p-2 shadow-sm">
                <img src="/public/images/aqua_water_logo.svg" alt="Aqua Water" class="h-full w-full object-contain">
            </div>
            <h1 class="mt-4 text-2xl font-black text-[#071C33] font-heading">
                Customer Portal
            </h1>
            <p class="mt-1 text-xs text-slate-500">
                Log in to manage your <?= APP_NAME ?> route deliveries & invoices
            </p>
        </div>

        <!-- Tab Toggle -->
        <div class="mt-6 flex rounded-xl bg-slate-100 p-1 text-xs font-bold text-slate-600">
            <button type="button" id="tab-login-btn" onclick="switchAuthTab('login')" class="flex-1 rounded-lg bg-white py-2 text-[#01386A] shadow-xs">
                Login
            </button>
            <button type="button" id="tab-register-btn" onclick="switchAuthTab('register')" class="flex-1 rounded-lg py-2 hover:text-[#01386A]">
                New Account
            </button>
        </div>

        <!-- Login Form -->
        <form id="auth-login-form" onsubmit="event.preventDefault(); showToast('Demo Portal: Authenticated successfully!', 'success');" class="mt-6 space-y-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Phone Number or Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                        <i class="fa-solid fa-user text-xs"></i>
                    </span>
                    <input type="text" required placeholder="03xx xxxxxxx or user@email.com" class="w-full rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-4 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Password</label>
                    <a href="#" onclick="showToast('Password reset link will be sent to your registered phone.', 'info')" class="text-[11px] font-semibold text-cyan-700 hover:underline">Forgot?</a>
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                        <i class="fa-solid fa-lock text-xs"></i>
                    </span>
                    <input type="password" required placeholder="••••••••" class="w-full rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-4 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
                </div>
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="remember-me" class="rounded border-slate-300 text-[#01386A] focus:ring-[#01386A]">
                <label for="remember-me" class="ml-2 text-xs text-slate-600">Remember my session</label>
            </div>

            <button type="submit" class="w-full rounded-xl bg-[#01386A] py-3 text-sm font-bold text-white shadow-lg transition duration-200 hover:bg-[#0b4c86]">
                <i class="fa-solid fa-right-to-bracket mr-1.5"></i> Sign In to Portal
            </button>
        </form>

        <!-- Register Form (Hidden by default) -->
        <form id="auth-register-form" onsubmit="event.preventDefault(); showToast('Account created! Welcome to Aqua Water.', 'success'); switchAuthTab('login');" class="mt-6 space-y-4 hidden">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Full Name</label>
                <input type="text" required placeholder="Your Name" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">WhatsApp / Phone Number</label>
                <input type="tel" required placeholder="03xx xxxxxxx" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Delivery Address & Sector</label>
                <input type="text" required placeholder="House / Office, Sector / Phase, City" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Create Password</label>
                <input type="password" required placeholder="At least 6 characters" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#01386A] focus:bg-white focus:outline-none">
            </div>

            <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-cyan-600 to-[#01386A] py-3 text-sm font-bold text-white shadow-lg transition duration-200 hover:shadow-cyan-500/25">
                <i class="fa-solid fa-user-plus mr-1.5"></i> Register Account
            </button>
        </form>

        <div class="mt-6 border-t border-slate-100 pt-4 text-center">
            <p class="text-xs text-slate-500">
                Need instant route delivery without registering?
            </p>
            <a href="<?= get_whatsapp_order_url() ?>" target="_blank" class="mt-1 inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 hover:text-emerald-700">
                <i class="fa-brands fa-whatsapp text-sm"></i> Order Directly via WhatsApp
            </a>
        </div>
    </div>
</main>

<script>
function switchAuthTab(tab) {
    const loginForm = document.getElementById('auth-login-form');
    const registerForm = document.getElementById('auth-register-form');
    const loginBtn = document.getElementById('tab-login-btn');
    const registerBtn = document.getElementById('tab-register-btn');

    if (tab === 'login') {
        loginForm.classList.remove('hidden');
        registerForm.classList.add('hidden');
        loginBtn.className = 'flex-1 rounded-lg bg-white py-2 text-[#01386A] shadow-xs font-bold';
        registerBtn.className = 'flex-1 rounded-lg py-2 hover:text-[#01386A] font-medium text-slate-600';
    } else {
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');
        registerBtn.className = 'flex-1 rounded-lg bg-white py-2 text-[#01386A] shadow-xs font-bold';
        loginBtn.className = 'flex-1 rounded-lg py-2 hover:text-[#01386A] font-medium text-slate-600';
    }
}
</script>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
