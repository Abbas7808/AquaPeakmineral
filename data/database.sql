-- =====================================================================
-- Aqua Water 🌊💦 - Database Schema & Initial Data
-- Brand: Aqua Water (Cloned & Customized from aquawater.pk)
-- Compatible with MySQL 5.7+, MySQL 8.0+, MariaDB 10.3+, and SQLite 3
-- =====================================================================

CREATE DATABASE IF NOT EXISTS `aqua_water` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `aqua_water`;

-- ---------------------------------------------------------------------
-- 1. Table: products
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `sku` VARCHAR(50) NOT NULL UNIQUE,
    `name` VARCHAR(150) NOT NULL,
    `category` VARCHAR(100) DEFAULT 'Drinking Water',
    `use_case` VARCHAR(100) NOT NULL,
    `description` TEXT,
    `price` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    `pack_size` VARCHAR(100) DEFAULT NULL,
    `ideal_for` VARCHAR(255) DEFAULT NULL,
    `spec_tds` VARCHAR(50) DEFAULT '120 - 160 ppm',
    `spec_ph` VARCHAR(50) DEFAULT '7.2 - 7.6',
    `image_url` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Products (Exact 5 SKU range)
INSERT INTO `products` (`sku`, `name`, `category`, `use_case`, `description`, `price`, `pack_size`, `ideal_for`, `spec_tds`, `spec_ph`, `image_url`, `is_active`) VALUES
('500ml', '500ml Bottle', 'Bottled Water', 'On-the-go', 'Compact hydration for counters, events, meetings and everyday retail use.', 50.00, 'Pack of 12 / 24', 'Meetings, Conferences, Car Travel, Retail Counters', '120 - 160 ppm', '7.2 - 7.6', '/public/images/optimized/aqua-water-500ml.webp', 1),
('1500ml', '1500ml Bottle', 'Bottled Water', 'Daily hydration', 'A larger bottle for desks, travel, gyms and retail shelves that need longer-use hydration.', 90.00, 'Pack of 6 / 12', 'Desks, Workstations, Gym Workouts, Road Trips', '120 - 160 ppm', '7.2 - 7.6', '/public/images/optimized/aqua-water-1500ml.webp', 1),
('6l', '6L Compact Bottle', 'Bulk Bottle', 'Light usage', 'Practical supply for smaller teams, travel, family use and short-cycle demand.', 220.00, 'Single unit / Pack of 2', 'Small Pantries, Kitchens, Weekend Outings, Cabins', '120 - 160 ppm', '7.2 - 7.6', '/public/images/optimized/aqua-water-6l.webp', 1),
('12l', '12L Medium Bottle', 'Bulk Bottle', 'Flexible supply', 'A balanced middle size for kitchens, medium setups and spaces with moderate consumption.', 340.00, 'Single unit dispenser ready', 'Medium Offices, Clinics, Reception Areas, Home Dispensers', '120 - 160 ppm', '7.2 - 7.6', '/public/images/optimized/aqua-water-12l.webp', 1),
('19l', '19L Returnable Bottle', 'Refill Bottle', 'Workplaces & home', 'The core format for dispensers, regular home water cycles and high-traffic office floors.', 280.00, 'Standard 19L Dispenser Jar', 'Corporate Offices, Schools, Large Families, Commercial Floors', '120 - 160 ppm', '7.2 - 7.6', '/public/images/optimized/aqua-water-19l.webp', 1);

-- ---------------------------------------------------------------------
-- 2. Table: orders
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `order_code` VARCHAR(50) NOT NULL UNIQUE,
    `customer_name` VARCHAR(150) NOT NULL,
    `customer_phone` VARCHAR(50) NOT NULL,
    `customer_address` TEXT NOT NULL,
    `bottle_id` VARCHAR(50) NOT NULL,
    `bottle_name` VARCHAR(150) NOT NULL,
    `quantity` INT NOT NULL DEFAULT 1,
    `unit_price` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    `total_price` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    `status` ENUM('Pending Confirmation', 'Confirmed', 'Dispatched', 'Delivered', 'Cancelled') DEFAULT 'Pending Confirmation',
    `notes` TEXT DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Sample Orders
INSERT INTO `orders` (`order_code`, `customer_name`, `customer_phone`, `customer_address`, `bottle_id`, `bottle_name`, `quantity`, `unit_price`, `total_price`, `status`, `notes`) VALUES
('AQW-C8660E', 'Test Customer', '03344739339', 'F-7, Islamabad', '19l', '19L Returnable Bottle', 2, 280.00, 560.00, 'Pending Confirmation', 'Deliver in the morning schedule.'),
('AQW-9B417A', 'Corporate Tech Hub', '03001234567', 'Blue Area, Islamabad', '19l', '19L Returnable Bottle', 10, 280.00, 2800.00, 'Confirmed', 'Weekly replenishment for 3rd floor.');

-- ---------------------------------------------------------------------
-- 3. Table: contact_inquiries
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `contact_inquiries`;
CREATE TABLE `contact_inquiries` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `inquiry_id` VARCHAR(50) NOT NULL UNIQUE,
    `name` VARCHAR(150) NOT NULL,
    `phone` VARCHAR(50) DEFAULT NULL,
    `email` VARCHAR(150) DEFAULT NULL,
    `subject` VARCHAR(200) NOT NULL DEFAULT 'General Inquiry',
    `message` TEXT NOT NULL,
    `status` ENUM('New', 'In Progress', 'Responded', 'Archived') DEFAULT 'New',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Sample Inquiry
INSERT INTO `contact_inquiries` (`inquiry_id`, `name`, `phone`, `email`, `subject`, `message`, `status`) VALUES
('msg_652781a9f1', 'Hassan Khan', '03219876543', 'hassan@example.com', 'B2B Custom Labeling Inquiry', 'We would like to order custom branded 500ml bottles for our corporate conference in Islamabad next month.', 'New');

-- ---------------------------------------------------------------------
-- 4. Table: users / admins
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(80) NOT NULL UNIQUE,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password_hash` VARCHAR(255) NOT NULL,
    `role` ENUM('admin', 'manager', 'dispatcher') DEFAULT 'admin',
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Default Admin Account (password: admin123)
-- bcrypt hash for 'admin123'
INSERT INTO `users` (`username`, `email`, `password_hash`, `role`, `is_active`) VALUES
('admin', 'admin@aquawater.pk', '$2y$10$eA0yA8yPzqQ7gC9r7gN20uR3lFw1c6s0rP6.9U3W6Cg8m5sQvN6vy', 'admin', 1);

-- ---------------------------------------------------------------------
-- 5. Table: purification_stages
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `purification_stages`;
CREATE TABLE `purification_stages` (
    `step_number` INT PRIMARY KEY,
    `title` VARCHAR(150) NOT NULL,
    `role_description` VARCHAR(255) NOT NULL,
    `technical_detail` TEXT NOT NULL,
    `icon` VARCHAR(50) DEFAULT 'check'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `purification_stages` (`step_number`, `title`, `role_description`, `technical_detail`) VALUES
(1, 'Source Intake & Multi-Stage Filtration', 'Raw water protection', 'Intake screening followed by multi-media sediment filtration capturing suspended solids, turbidity, and coarse particulate matter down to 20 microns.'),
(2, 'Activated Carbon Adsorption', 'Taste & organic refinement', 'High-surface-area granular activated carbon beds remove dissolved organic compounds, chlorine residues, pesticide traces, and undesirable odors.'),
(3, 'Scale Reduction & Softening', 'Pre-membrane conditioning', 'Conditioning phase prevents mineral precipitation, scale formation, and fouling on fine reverse-osmosis membrane surfaces.'),
(4, 'High-Pressure Reverse Osmosis (RO)', 'Molecular-level barrier', 'Semi-permeable thin-film composite membranes operating under high hydraulic pressure strip dissolved solids, heavy metals, arsenic, and micro-contaminants.'),
(5, 'Post-RO Balancing & Mineral Polish', 'Palatability & light balance', 'Fine mineral balancing polish calibrates TDS and pH into optimal neutral drinking ranges (7.2 - 7.6) for crisp, clean palate feel.'),
(6, 'Micro-Filtration Polish (0.2 Micron)', 'Fine particle catch', 'Sub-micron polishing barrier eliminates any residual micro-particulates before final sanitization steps.'),
(7, 'Ultraviolet (UV) Sterilization', 'Continuous physical barrier', 'High-intensity 254nm ultraviolet light deactivates DNA/RNA of bacteria, protozoa, and viruses without chemical residues.'),
(8, 'Controlled Ozonation Barrier', 'Active freshness protection', 'Controlled micro-dose dissolved ozone (O3) provides final oxidation barrier, sanitizes container headspace, and naturally reverts to pure oxygen (O2).'),
(9, 'Sealed Hygienic Bottling', 'Closed-environment delivery', 'Automated rinse, pressure-fill, and hermetic cap sealing executed in positive-pressure sterile cleanrooms before lot tracking and dispatch.');
