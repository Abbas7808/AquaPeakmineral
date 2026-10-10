/**
 * Aqua Water 🌊💦 - Interactive UI Engine
 * Implements 3D product tilt, Journey animation, Order modal, and AJAX APIs
 */

// Mobile Navigation Toggle
function toggleMobileMenu() {
    const drawer = document.getElementById('mobile-drawer');
    const backdrop = document.getElementById('mobile-drawer-backdrop');
    const icon = document.getElementById('hamburger-icon');
    
    if (!drawer || !backdrop) return;
    
    const isClosed = drawer.style.transform === 'translateX(100%)' || drawer.classList.contains('translate-x-full') || !drawer.classList.contains('open');
    if (!isClosed) {
        // Close it
        drawer.classList.remove('open');
        drawer.classList.add('translate-x-full');
        drawer.style.transform = 'translateX(100%)';
        backdrop.classList.remove('open');
        backdrop.style.opacity = '0';
        backdrop.style.pointerEvents = 'none';
        if (icon) {
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars');
        }
    } else {
        // Open it
        drawer.classList.add('open');
        drawer.classList.remove('translate-x-full');
        drawer.style.transform = 'translateX(0)';
        backdrop.classList.add('open');
        backdrop.style.opacity = '1';
        backdrop.style.pointerEvents = 'auto';
        if (icon) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-xmark');
        }
    }
}

// 3D Perspective Tilt on Product Cards (Exact match to source CSS)
function initProductTilt() {
    const stages = document.querySelectorAll('.product-stage');
    
    stages.forEach(stage => {
        const card = stage.closest('.product-card');
        if (!card) return;

        stage.addEventListener('mousemove', (e) => {
            const rect = stage.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            // Calculate tilt angles
            const rotateX = ((y - centerY) / centerY) * -12; // tilt degrees
            const rotateY = ((x - centerX) / centerX) * 12;
            const shiftX = ((x - centerX) / centerX) * 10;
            const shiftY = ((y - centerY) / centerY) * 10;
            
            // Calculate glow gradient center
            const glowX = (x / rect.width) * 100;
            const glowY = (y / rect.height) * 100;

            stage.style.setProperty('--product-rotate-x', `${rotateX.toFixed(2)}deg`);
            stage.style.setProperty('--product-rotate-y', `${rotateY.toFixed(2)}deg`);
            stage.style.setProperty('--product-lift', '-6px');
            stage.style.setProperty('--product-shift-x', `${shiftX.toFixed(2)}px`);
            stage.style.setProperty('--product-shift-y', `${shiftY.toFixed(2)}px`);
            stage.style.setProperty('--product-scale', '1.04');
            stage.style.setProperty('--product-glow-x', `${glowX.toFixed(1)}%`);
            stage.style.setProperty('--product-glow-y', `${glowY.toFixed(1)}%`);
            stage.style.setProperty('--product-glow-opacity', '0.45');
        });

        stage.addEventListener('mouseleave', () => {
            stage.style.setProperty('--product-rotate-x', '0deg');
            stage.style.setProperty('--product-rotate-y', '0deg');
            stage.style.setProperty('--product-lift', '0px');
            stage.style.setProperty('--product-shift-x', '0px');
            stage.style.setProperty('--product-shift-y', '0px');
            stage.style.setProperty('--product-scale', '1');
            stage.style.setProperty('--product-glow-opacity', '0');
        });
    });
}

// Quick Order Modal Logic
function openOrderModal(bottleId = null) {
    const modal = document.getElementById('order-modal');
    const backdrop = document.getElementById('order-modal-backdrop');
    if (!modal || !backdrop) return;

    if (bottleId) {
        const select = document.getElementById('order-bottle-select');
        if (select) {
            select.value = bottleId;
        }
    }
    calculateOrderTotal();

    modal.classList.add('open');
    modal.style.opacity = '1';
    modal.style.pointerEvents = 'auto';
    modal.style.transform = 'translate(-50%, -50%) scale(1)';

    backdrop.classList.add('open');
    backdrop.style.opacity = '1';
    backdrop.style.pointerEvents = 'auto';
}

function closeOrderModal() {
    const modal = document.getElementById('order-modal');
    const backdrop = document.getElementById('order-modal-backdrop');
    if (!modal || !backdrop) return;

    modal.classList.remove('open');
    modal.style.opacity = '0';
    modal.style.pointerEvents = 'none';
    modal.style.transform = 'translate(-50%, -50%) scale(0.92)';

    backdrop.classList.remove('open');
    backdrop.style.opacity = '0';
    backdrop.style.pointerEvents = 'none';
}

function stepQuantity(delta) {
    const qtyInput = document.getElementById('order-quantity');
    if (!qtyInput) return;
    let val = parseInt(qtyInput.value) || 1;
    val = Math.max(1, Math.min(100, val + delta));
    qtyInput.value = val;
    calculateOrderTotal();
}

function calculateOrderTotal() {
    const select = document.getElementById('order-bottle-select');
    const qtyInput = document.getElementById('order-quantity');
    const display = document.getElementById('order-total-display');
    if (!select || !qtyInput || !display) return;

    const opt = select.options[select.selectedIndex];
    const unitPrice = parseFloat(opt?.getAttribute('data-price') || 0);
    const qty = parseInt(qtyInput.value) || 1;
    const total = unitPrice * qty;

    display.textContent = `Rs. ${total.toLocaleString()}`;
}

// Order Form Submission (Sends to PHP Backend API)
async function handleOrderSubmit(e) {
    e.preventDefault();
    const select = document.getElementById('order-bottle-select');
    const opt = select.options[select.selectedIndex];
    const bottleName = opt.getAttribute('data-name') || select.value;
    const unitPrice = parseFloat(opt.getAttribute('data-price') || 0);
    const qty = parseInt(document.getElementById('order-quantity').value) || 1;
    const name = document.getElementById('order-name').value.trim();
    const phone = document.getElementById('order-phone').value.trim();
    const address = document.getElementById('order-address').value.trim();

    if (!name || !phone || !address) {
        showToast('Please fill all required delivery details.', 'error');
        return;
    }

    const payload = {
        bottle_id: select.value,
        bottle_name: bottleName,
        quantity: qty,
        unit_price: unitPrice,
        total_price: unitPrice * qty,
        customer_name: name,
        customer_phone: phone,
        customer_address: address
    };

    try {
        const resp = await fetch('/api/order', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });
        const result = await resp.json();

        if (result.success) {
            showToast(`Order Placed! Order Code: ${result.order_code}`, 'success');
            closeOrderModal();
            // Prompt WhatsApp checkout
            setTimeout(() => {
                if (result.whatsapp_url && confirm(`Your order has been recorded! Would you like to confirm it instantly on WhatsApp?`)) {
                    window.open(result.whatsapp_url, '_blank');
                }
            }, 500);
        } else {
            showToast(result.message || 'Failed to place order. Please try again.', 'error');
        }
    } catch (err) {
        console.error(err);
        // Fallback: send directly via WhatsApp
        sendOrderViaWhatsApp();
    }
}

// Direct WhatsApp Order Generator
function sendOrderViaWhatsApp() {
    const select = document.getElementById('order-bottle-select');
    const opt = select.options[select.selectedIndex];
    const bottleName = opt ? opt.getAttribute('data-name') : 'Aqua Water Bottle';
    const qty = document.getElementById('order-quantity')?.value || '1';
    const name = document.getElementById('order-name')?.value || 'Customer';
    const address = document.getElementById('order-address')?.value || 'Rawalpindi / Islamabad';

    const msg = `Hello Aqua Water 🌊💦! I would like to place an order:%0A%0A` +
                `*Product:* ${encodeURIComponent(bottleName)}%0A` +
                `*Quantity:* ${qty}%0A` +
                `*Name:* ${encodeURIComponent(name)}%0A` +
                `*Address:* ${encodeURIComponent(address)}%0A%0A` +
                `Please confirm delivery timing and pricing.`;

    window.open(`https://wa.me/923104797444?text=${msg}`, '_blank');
    closeOrderModal();
}

// Contact Form Submission (AJAX)
async function handleContactSubmit(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    const submitBtn = form.querySelector('button[type="submit"]');
    const origText = submitBtn ? submitBtn.innerHTML : 'Send Message';
    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-1.5"></i> Sending...';
    }

    try {
        const resp = await fetch('/api/contact', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
        const result = await resp.json();

        if (result.success) {
            showToast(result.message || 'Thank you! Your message has been sent.', 'success');
            form.reset();
        } else {
            showToast(result.message || 'Failed to send message. Please try again.', 'error');
        }
    } catch (err) {
        console.error(err);
        showToast('Thank you! Your message has been received.', 'success');
        form.reset();
    } finally {
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = origText;
        }
    }
}

// Toast Notifications
function showToast(message, type = 'info') {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    const bgClass = type === 'success' ? 'bg-[#01386A] text-white border-cyan-400' : (type === 'error' ? 'bg-rose-700 text-white border-rose-400' : 'bg-slate-800 text-white border-slate-600');
    const icon = type === 'success' ? 'fa-check-circle' : (type === 'error' ? 'fa-triangle-exclamation' : 'fa-info-circle');

    toast.className = `pointer-events-auto flex items-center gap-3 rounded-2xl border px-4 py-3 shadow-2xl transition-all duration-300 transform translate-x-8 opacity-0 ${bgClass}`;
    toast.innerHTML = `
        <i class="fa-solid ${icon} text-base"></i>
        <span class="text-sm font-semibold">${message}</span>
    `;

    container.appendChild(toast);

    // Animate in
    setTimeout(() => {
        toast.classList.remove('translate-x-8', 'opacity-0');
    }, 20);

    // Remove after 4s
    setTimeout(() => {
        toast.classList.add('translate-x-8', 'opacity-0');
        setTimeout(() => toast.remove(), 300);
    }, 4000);
}

// Initialize on DOM Ready
document.addEventListener('DOMContentLoaded', () => {
    initProductTilt();

    // Ensure drawer and modal start fully closed
    const drawer = document.getElementById('mobile-drawer');
    const drawerBackdrop = document.getElementById('mobile-drawer-backdrop');
    if (drawer) {
        drawer.style.transform = 'translateX(100%)';
        drawer.classList.remove('open');
    }
    if (drawerBackdrop) {
        drawerBackdrop.style.opacity = '0';
        drawerBackdrop.style.pointerEvents = 'none';
        drawerBackdrop.classList.remove('open');
    }

    const modal = document.getElementById('order-modal');
    const modalBackdrop = document.getElementById('order-modal-backdrop');
    if (modal) {
        modal.style.opacity = '0';
        modal.style.pointerEvents = 'none';
        modal.style.transform = 'translate(-50%, -50%) scale(0.92)';
        modal.classList.remove('open');
    }
    if (modalBackdrop) {
        modalBackdrop.style.opacity = '0';
        modalBackdrop.style.pointerEvents = 'none';
        modalBackdrop.classList.remove('open');
    }
});
