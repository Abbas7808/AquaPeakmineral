<?php
require_once __DIR__ . '/config.php';
$page_title = 'Water Quality & Lab Test Reports | ' . APP_NAME . ' 🌊💦';
$page_desc = 'Independent laboratory test analysis and certified chemical & microbiological composition of Aqua Water bottled drinking water.';
require_once __DIR__ . '/includes/header.php';

$parameters = [
    ['param' => 'pH Level', 'unit' => '-', 'result' => '7.4', 'who_standard' => '6.5 - 8.5', 'status' => 'Optimal'],
    ['param' => 'Total Dissolved Solids (TDS)', 'unit' => 'mg/L (ppm)', 'result' => '142', 'who_standard' => '< 1000', 'status' => 'Balanced'],
    ['param' => 'Calcium (Ca)', 'unit' => 'mg/L', 'result' => '22', 'who_standard' => '< 75', 'status' => 'Compliant'],
    ['param' => 'Magnesium (Mg)', 'unit' => 'mg/L', 'result' => '12', 'who_standard' => '< 50', 'status' => 'Compliant'],
    ['param' => 'Sodium (Na)', 'unit' => 'mg/L', 'result' => '16', 'who_standard' => '< 200', 'status' => 'Low Sodium'],
    ['param' => 'Potassium (K)', 'unit' => 'mg/L', 'result' => '4', 'who_standard' => '< 12', 'status' => 'Compliant'],
    ['param' => 'Chloride (Cl)', 'unit' => 'mg/L', 'result' => '28', 'who_standard' => '< 250', 'status' => 'Compliant'],
    ['param' => 'Sulfate (SO4)', 'unit' => 'mg/L', 'result' => '18', 'who_standard' => '< 250', 'status' => 'Compliant'],
    ['param' => 'Bicarbonate (HCO3)', 'unit' => 'mg/L', 'result' => '85', 'who_standard' => '< 500', 'status' => 'Compliant'],
    ['param' => 'Turbidity', 'unit' => 'NTU', 'result' => '< 0.2', 'who_standard' => '< 5.0', 'status' => 'Crystal Clear'],
    ['param' => 'Coliform Bacteria', 'unit' => 'CFU/100ml', 'result' => '0 (Nil)', 'who_standard' => '0 (Nil)', 'status' => 'Sterile / Safe'],
    ['param' => 'E. Coli', 'unit' => 'CFU/100ml', 'result' => '0 (Nil)', 'who_standard' => '0 (Nil)', 'status' => 'Sterile / Safe']
];
?>

<main class="pt-28 pb-20 bg-slate-50">
    <!-- Header Banner -->
    <div class="bg-[linear-gradient(180deg,#01386A_0%,#022B52_100%)] text-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-cyan-400/30 bg-cyan-400/10 px-4 py-1.5 text-xs font-bold tracking-wider text-cyan-300 uppercase">
                <i class="fa-solid fa-flask-vial text-xs"></i> Certified Chemical & Microbiological Analysis
            </span>
            <h1 class="mt-4 text-4xl font-black text-white sm:text-5xl lg:text-6xl font-heading">
                Water Quality Lab Test Reports
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-sm sm:text-base text-cyan-100/90 leading-relaxed">
                Transparency and safety in every drop. <?= APP_NAME ?> is routinely evaluated by certified third-party testing laboratories in strict adherence to PSQCA and WHO potable water guidelines.
            </p>
        </div>
    </div>

    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-16">
        
        <!-- Summary Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-10">
            <div class="p-5 rounded-2xl bg-white border border-slate-200 text-center shadow-sm">
                <span class="text-xs font-bold text-slate-400 uppercase">pH Balance</span>
                <p class="text-3xl font-black text-[#01386A] mt-1">7.4</p>
                <span class="text-[10px] text-emerald-600 font-bold">Optimal Alkaline</span>
            </div>
            <div class="p-5 rounded-2xl bg-white border border-slate-200 text-center shadow-sm">
                <span class="text-xs font-bold text-slate-400 uppercase">TDS Content</span>
                <p class="text-3xl font-black text-[#01386A] mt-1">142</p>
                <span class="text-[10px] text-cyan-600 font-bold">ppm (Ideal Refreshing)</span>
            </div>
            <div class="p-5 rounded-2xl bg-white border border-slate-200 text-center shadow-sm">
                <span class="text-xs font-bold text-slate-400 uppercase">Pathogen Test</span>
                <p class="text-3xl font-black text-emerald-600 mt-1">0</p>
                <span class="text-[10px] text-emerald-600 font-bold">Zero Bacteria (UV/O3)</span>
            </div>
            <div class="p-5 rounded-2xl bg-white border border-slate-200 text-center shadow-sm">
                <span class="text-xs font-bold text-slate-400 uppercase">Packaging</span>
                <p class="text-3xl font-black text-[#01386A] mt-1">100%</p>
                <span class="text-[10px] text-cyan-600 font-bold">Food-Grade BPA-Free</span>
            </div>
        </div>

        <!-- Comprehensive Lab Table -->
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-md">
            <div class="border-b border-slate-100 p-5 bg-slate-50 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-black text-[#071C33] font-heading">Complete Mineral Profile & Safety Benchmarks</h3>
                    <p class="text-xs text-slate-500">Tested under Standard Methods for Examination of Water and Wastewater</p>
                </div>
                <span class="hidden sm:inline-flex items-center gap-1.5 rounded-full bg-emerald-50 border border-emerald-200 px-3 py-1 text-xs font-bold text-emerald-700">
                    <i class="fa-solid fa-circle-check text-emerald-500"></i> All Parameters Passed
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-700">
                    <thead class="bg-slate-100 text-xs font-bold uppercase text-slate-600">
                        <tr>
                            <th class="px-6 py-4">Parameter</th>
                            <th class="px-6 py-4">Unit</th>
                            <th class="px-6 py-4">Aqua Water Result</th>
                            <th class="px-6 py-4">WHO / PSQCA Standard</th>
                            <th class="px-6 py-4">Evaluation</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php foreach ($parameters as $row): ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-3.5 font-bold text-slate-900"><?= htmlspecialchars($row['param']) ?></td>
                            <td class="px-6 py-3.5 text-slate-500 font-mono text-xs"><?= htmlspecialchars($row['unit']) ?></td>
                            <td class="px-6 py-3.5 font-black text-[#01386A]"><?= htmlspecialchars($row['result']) ?></td>
                            <td class="px-6 py-3.5 text-slate-600 font-mono text-xs"><?= htmlspecialchars($row['who_standard']) ?></td>
                            <td class="px-6 py-3.5">
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-bold text-emerald-700">
                                    <i class="fa-solid fa-check text-[10px]"></i> <?= htmlspecialchars($row['status']) ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Lab Certification Seal Box -->
        <div class="mt-10 rounded-2xl bg-[#edf5fc] border border-cyan-200 p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-[#01386A] text-white">
                    <i class="fa-solid fa-certificate text-2xl text-cyan-300"></i>
                </div>
                <div>
                    <h4 class="text-base font-black text-[#071C33]">Certificate of Quality Assurance Available</h4>
                    <p class="text-xs text-slate-600 mt-0.5">Need institutional quality documentation or corporate supply compliance files? We provide stamped batch reports.</p>
                </div>
            </div>
            <a href="<?= get_whatsapp_order_url("Hello Aqua Water 🌊💦, please provide the latest batch laboratory quality certificate.") ?>" target="_blank" class="shrink-0 rounded-xl bg-[#01386A] px-5 py-3 text-xs font-bold text-white hover:bg-[#0b4c86] flex items-center gap-2">
                <i class="fa-solid fa-download"></i> Request Official Report
            </a>
        </div>

    </div>
</main>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
