<?php
/**
 * Aqua Water - Configuration & Data Store
 * Branding: Aqua Water 🌊💦
 * Matching design, color theory, and layout of aquawater.pk
 */

define('APP_NAME', 'Aqua Water');
define('APP_TAGLINE', 'Premium Hydration for Homes, Offices and Businesses');
define('APP_SLOGAN', 'Pure drinking water, delivered with care.');
define('APP_PHONE', '+92 310 4797444');
define('APP_PHONE_RAW', '03104797444');
define('APP_WHATSAPP', '923104797444');
define('APP_LOCATION', 'Rawalpindi & Islamabad, Pakistan');
define('APP_EMAIL', 'info@aquawater.pk');
define('APP_CURRENCY', 'PKR');

// WhatsApp Order URL Generator
function get_whatsapp_order_url($message = null) {
    if (!$message) {
        $message = "Hello Aqua Water 🌊💦, I want to place an order.";
    }
    return "https://wa.me/" . APP_WHATSAPP . "?text=" . urlencode($message);
}

// Product Catalog (Exact 5 bottles from source)
$products = [
    [
        'id' => '500ml',
        'name' => '500ml Bottle',
        'use' => 'On-the-go',
        'desc' => 'Compact hydration for counters, events, meetings and everyday retail use.',
        'image' => '/public/images/optimized/aqua-water-500ml.webp',
        'price' => 50,
        'pack_size' => 'Pack of 12 / 24',
        'ideal_for' => 'Meetings, Conferences, Car Travel, Retail Counters',
        'spec_tds' => '120 - 160 ppm',
        'spec_ph' => '7.2 - 7.6',
        'href' => '/products.php#500ml'
    ],
    [
        'id' => '1500ml',
        'name' => '1500ml Bottle',
        'use' => 'Daily hydration',
        'desc' => 'A larger bottle for desks, travel, gyms and retail shelves that need longer-use hydration.',
        'image' => '/public/images/optimized/aqua-water-1500ml.webp',
        'price' => 90,
        'pack_size' => 'Pack of 6 / 12',
        'ideal_for' => 'Desks, Workstations, Gym Workouts, Road Trips',
        'spec_tds' => '120 - 160 ppm',
        'spec_ph' => '7.2 - 7.6',
        'href' => '/products.php#1500ml'
    ],
    [
        'id' => '6l',
        'name' => '6L Compact Bottle',
        'use' => 'Light usage',
        'desc' => 'Practical supply for smaller teams, travel, family use and short-cycle demand.',
        'image' => '/public/images/optimized/aqua-water-6l.webp',
        'price' => 220,
        'pack_size' => 'Single Handle Bottle',
        'ideal_for' => 'Small Offices, Family Kitchens, Weekend Outings',
        'spec_tds' => '120 - 160 ppm',
        'spec_ph' => '7.2 - 7.6',
        'href' => '/products.php#6l'
    ],
    [
        'id' => '12l',
        'name' => '12L Mid-Size Bottle',
        'use' => 'Family scale',
        'desc' => 'Balanced capacity for homes, offices and medium-volume daily hydration needs.',
        'image' => '/public/images/optimized/aqua-water-12l.webp',
        'price' => 320,
        'pack_size' => 'Dispenser Compatible',
        'ideal_for' => 'Homes, Clinics, Mid-size Office Teams',
        'spec_tds' => '120 - 160 ppm',
        'spec_ph' => '7.2 - 7.6',
        'href' => '/products.php#12l'
    ],
    [
        'id' => '19l',
        'name' => '19L Returnable Bottle',
        'use' => 'High volume',
        'desc' => 'Primary supply for homes, workplaces and recurring route delivery plans.',
        'image' => '/public/images/optimized/aqua-water-19l.webp',
        'price' => 280,
        'pack_size' => 'Standard 19-Liter Water Cooler / Dispenser Bottle',
        'ideal_for' => 'Corporate Offices, Residences, Industrial Sites, Schools',
        'spec_tds' => '120 - 160 ppm',
        'spec_ph' => '7.2 - 7.6',
        'href' => '/products.php#19l'
    ]
];

// 4-Step Process (How We Work)
$process_steps = [
    [
        'step' => '01',
        'title' => 'Tell Us Your Need',
        'detail' => 'Share your required bottle sizes, daily volume and delivery frequency.',
        'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.5L17 7.5V19a2 2 0 01-2 2z'
    ],
    [
        'step' => '02',
        'title' => 'We Set Everything',
        'detail' => 'We configure your profile, pricing plan and delivery schedule.',
        'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'
    ],
    [
        'step' => '03',
        'title' => 'On-Time Dispatch',
        'detail' => 'Fresh Aqua Water is delivered reliably to your home, office or business.',
        'icon' => 'M9 17a2 2 0 11-4 0 2 2 0 014 0z M19 17a2 2 0 11-4 0 2 2 0 014 0z M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10h2m8 0H9m4 0h2m4 0h2v-5l-3-4h-5'
    ],
    [
        'step' => '04',
        'title' => 'Scale Anytime',
        'detail' => 'Increase, reduce or adjust your supply anytime as your demand changes.',
        'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'
    ]
];

// 9-Step Purification Process
$purification_steps = [
    [
        'id' => '01',
        'short' => 'Collection',
        'title' => 'Careful Water Collection',
        'detail' => 'Protected-source water moves through hygienic pipelines into the purification system.',
        'icon' => 'droplets',
        'highlight' => false
    ],
    [
        'id' => '02',
        'short' => 'Pre-Filter',
        'title' => 'Pre-Filtration',
        'detail' => 'Sediment and sand filtration remove dust, sand, mud and visible impurities.',
        'icon' => 'shield',
        'highlight' => false
    ],
    [
        'id' => '03',
        'short' => 'Carbon',
        'title' => 'Carbon Filtration',
        'detail' => 'Activated carbon improves smell, color and taste before advanced purification.',
        'icon' => 'sparkles',
        'highlight' => false
    ],
    [
        'id' => '04',
        'short' => 'Reduction',
        'title' => 'Contaminant Reduction',
        'detail' => 'Dedicated stages help reduce iron, manganese and other physical contaminants.',
        'icon' => 'shield',
        'highlight' => false
    ],
    [
        'id' => '05',
        'short' => 'RO',
        'title' => 'Reverse Osmosis Purification',
        'detail' => 'Advanced RO helps reduce dissolved salts, heavy impurities and unwanted contaminants.',
        'icon' => 'droplets',
        'highlight' => true
    ],
    [
        'id' => '06',
        'short' => 'Storage',
        'title' => 'Food-Grade Water Storage',
        'detail' => 'Purified water is stored in sanitized food-grade tanks to maintain hygiene and safety.',
        'icon' => 'shield',
        'highlight' => false
    ],
    [
        'id' => '07',
        'short' => 'Minerals',
        'title' => 'Mineral Balancing',
        'detail' => 'Essential minerals are balanced to improve taste, freshness and drinking quality.',
        'icon' => 'sparkles',
        'highlight' => true
    ],
    [
        'id' => '08',
        'short' => 'UV + Ozone',
        'title' => 'UV & Ozone Disinfection',
        'detail' => 'UV sterilization and ozonation help eliminate harmful microorganisms before bottling.',
        'icon' => 'shield',
        'highlight' => true
    ],
    [
        'id' => '09',
        'short' => 'Bottling',
        'title' => 'Hygienic Bottling & Quality Check',
        'detail' => 'Every bottle is filled, sealed, labelled and checked under safe drinking water practices.',
        'icon' => 'droplets',
        'highlight' => false
    ]
];

// B2B Custom Labeling Categories
$custom_brand_categories = [
    [
        'title' => 'Restaurants & Fast Food',
        'desc' => 'Table service, takeaways and high-recall customer touchpoints.',
        'image' => '/public/images/optimized/your-brand-restaurant-fastfood.webp'
    ],
    [
        'title' => 'Corporate Offices',
        'desc' => 'Boardrooms, reception areas and internal team hydration.',
        'image' => '/public/images/optimized/your-brand-offices.webp'
    ],
    [
        'title' => 'Hotels & Events',
        'desc' => 'Premium guest experience for events, hospitality and suites.',
        'image' => '/public/images/optimized/your-brand-hotel-event-hospital.webp'
    ],
    [
        'title' => 'Schools & Clinics',
        'desc' => 'Clean branded supply for waiting areas, staff and visitors.',
        'image' => '/public/images/optimized/your-brand-school-clinic.webp'
    ]
];

// Delivery Sectors
$delivery_sectors = [
    [
        'title' => 'Corporate Offices',
        'detail' => 'Executive floors, meeting rooms and front-desk hydration.',
        'label' => 'Workspaces',
        'image' => '/public/images/optimized/weserve-office.webp'
    ],
    [
        'title' => 'Hospitality & Events',
        'detail' => 'Refined bottled water service for guests, tables and counters.',
        'label' => 'Hospitality',
        'image' => '/public/images/optimized/weserve-events.webp'
    ],
    [
        'title' => 'Retail & Distribution',
        'detail' => 'Shelf-ready stock for stores, resellers and repeat movement.',
        'label' => 'Retail',
        'image' => '/public/images/optimized/weserve-retail.webp'
    ]
];

// Team
$team_members = [
    [
        'name' => 'Ahsan Iqbal',
        'role' => 'CEO & Founder',
        'desc' => 'Leads company vision and growth direction.',
        'badge' => 'Vision'
    ],
    [
        'name' => 'Raja Faheed',
        'role' => 'Marketing & Distribution Manager',
        'desc' => 'Handles market outreach and delivery distribution planning.',
        'badge' => 'Growth'
    ],
    [
        'name' => 'Mohsin Iqbal',
        'role' => 'Co-Founder & Operation Manager',
        'desc' => 'Oversees operations and daily execution.',
        'badge' => 'Operations'
    ],
    [
        'name' => 'Shayan',
        'role' => 'Plant Operator',
        'desc' => 'Runs daily plant and production handling.',
        'badge' => 'Plant'
    ]
];

// Blogs
$homepage_blogs = [
    [
        'id' => 3,
        'title' => 'Bottled Water for Offices, Restaurants and Events: Choosing the Right Bottle Size',
        'slug' => 'bottled-water-for-offices-restaurants-and-events-choosing-the-right-bottle-size',
        'excerpt' => 'Different places need different water bottle sizes. Learn when to choose 500ml, 1500ml and 19L bottles to balance convenience and cost.',
        'image' => '/media/blogs/AGG4l50D7gMLiFIuQJcmZhCNRtzIjrw6zRt0xqdk.png',
        'tags' => ['Bottle Size Guide', 'Office & Events'],
        'read_time' => '4 min read',
        'date' => 'October 2026'
    ],
    [
        'id' => 2,
        'title' => '19L Water Bottle for Home and Office: Why It Is a Practical Choice',
        'slug' => '19l-water-bottle-for-home-and-office-why-it-is-a-practical-choice',
        'excerpt' => 'A 19L water bottle is one of the most convenient options for daily drinking water. Learn why homes and businesses rely on route refills.',
        'image' => '/media/blogs/2ADxgzcgUtxN0ODnlzRYf6FxMGaJ2CILjrtYcE02.png',
        'tags' => ['Dispenser Supply', 'Daily Hydration'],
        'read_time' => '3 min read',
        'date' => 'October 2026'
    ],
    [
        'id' => 1,
        'title' => 'Clean Drinking Water Delivery in Rawalpindi & Islamabad: What Customers Should Know',
        'slug' => 'clean-drinking-water-delivery-in-rawalpindi-islamabad-what-customers-should-know',
        'excerpt' => 'Choosing the right drinking water service is important for your home, office or business. Learn what quality standards to look for.',
        'image' => '/media/blogs/nw6hqQrichmB86qCrAIuTIKNnmDCMkdHXYd8sKi7.png',
        'tags' => ['Water Quality', 'Route Logistics'],
        'read_time' => '3 min read',
        'date' => 'October 2026'
    ]
];
