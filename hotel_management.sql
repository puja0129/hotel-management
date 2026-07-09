-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2026 at 11:48 AM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE IF NOT EXISTS `amenities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('food','gym','sports','games','spa','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'other',
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 0xF09F8FA8,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `timings` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int NOT NULL,
  `children` int NOT NULL DEFAULT '0',
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `stripe_session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_payment_intent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_user_id_foreign` (`user_id`),
  KEY `bookings_room_id_foreign` (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `room_id`, `check_in`, `check_out`, `adults`, `children`, `total_price`, `payment_status`, `stripe_session_id`, `stripe_payment_intent`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '2026-03-26', '2026-03-28', 2, 2, 398.00, 'paid', 'DUMMY-AFCXYSMWM6ZOQRB1', 'DUMMY-INTENT-0WGTAJZQHCAS', 'confirmed', '2026-03-19 01:35:57', '2026-03-19 01:37:52'),
(2, 4, 4, '2026-03-24', '2026-03-31', 1, 0, 2793.00, 'paid', 'DUMMY-JLA7SQDTMXDS3RWF', 'DUMMY-INTENT-HCE6W1SNC7JH', 'confirmed', '2026-03-24 01:13:13', '2026-03-24 01:14:03'),
(3, 5, 4, '2026-03-26', '2026-04-01', 1, 0, 2394.00, 'paid', 'DUMMY-TQ8QXFNZPEUNWHHK', 'DUMMY-INTENT-BXKZ3FU2Y5ZW', 'cancelled', '2026-03-25 00:12:44', '2026-03-25 00:35:26'),
(4, 5, 5, '2026-03-26', '2026-03-31', 1, 0, 1245.00, 'unpaid', NULL, NULL, 'pending', '2026-03-25 00:14:44', '2026-03-25 04:00:20'),
(5, 6, 1, '2026-04-01', '2026-04-05', 1, 0, 396.00, 'paid', 'DUMMY-ZBSKD3HREF00NNHM', 'DUMMY-INTENT-1JNNI7UBJDNH', 'confirmed', '2026-03-25 03:10:59', '2026-03-25 03:23:57'),
(6, 6, 5, '2026-03-27', '2026-04-03', 1, 0, 1743.00, 'unpaid', 'DUMMY-MBLE2PHFPXJQE7K1', NULL, 'pending', '2026-03-25 03:25:12', '2026-03-25 03:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-lakumpooja808@gmail.com|::1:timer', 'i:1774417635;', 1774417635),
('laravel-cache-lakumpooja808@gmail.com|::1', 'i:1;', 1774417635),
('laravel-cache-admin@hotailer.com|127.0.0.1:timer', 'i:1774437260;', 1774437260),
('laravel-cache-admin@hotailer.com|127.0.0.1', 'i:2;', 1774437260),
('laravel-cache-admin@hoteiler.com|127.0.0.1:timer', 'i:1774437279;', 1774437279),
('laravel-cache-admin@hoteiler.com|127.0.0.1', 'i:1;', 1774437279);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

DROP TABLE IF EXISTS `carousels`;
CREATE TABLE IF NOT EXISTS `carousels` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button1_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button1_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button2_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button2_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'hii', 'hii@gmail.com', 'hello', 'hii', '2026-03-25 00:11:28', '2026-03-25 00:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_services`
--

DROP TABLE IF EXISTS `hotel_services`;
CREATE TABLE IF NOT EXISTS `hotel_services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_services`
--

INSERT INTO `hotel_services` (`id`, `icon`, `title`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 'fa-hotel', 'Rooms & Apartments', 'Luxurious rooms and apartments with world-class amenities and breathtaking views for every type of traveler.', '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(2, 'fa-utensils', 'Food & Restaurant', 'Savor award-winning cuisine at our in-house restaurant featuring international and local dishes prepared by top chefs.', '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(3, 'fa-dumbbell', 'GYM & Yoga', 'Stay fit with our modern gym and yoga sessions led by certified instructors. Open 24/7 for hotel guests.', '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(4, 'fa-swimming-pool', 'Sports & Gaming', 'Enjoy a wide range of sports facilities including tennis, basketball, swimming pool, and an indoor gaming zone.', '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(5, 'fa-glass-cheers', 'Events & Parties', 'Host unforgettable events, weddings, and corporate meetings in our versatile banquet halls and event spaces.', '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(6, 'fa-spa', 'Spa & Fitness', 'Rejuvenate body and mind at our premium spa with massage therapies, facial treatments, and a fully equipped fitness center.', '2026-03-18 07:53:32', '2026-03-18 07:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_available_at_index` (`queue`,`reserved_at`,`available_at`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2024_01_01_000001_create_services_table', 1),
(4, '2024_01_01_000002_create_service_details_tables', 1),
(5, '2026_03_13_083809_create_rooms_table', 1),
(6, '2026_03_13_083818_create_bookings_table', 1),
(7, '2026_03_13_083825_create_hotel_services_table', 1),
(8, '2026_03_13_083834_create_contacts_table', 1),
(9, '2026_03_13_103440_add_payment_fields_to_bookings_table', 1),
(10, '2026_03_13_103448_create_team_members_table', 1),
(11, '2026_03_13_103840_add_is_admin_to_users_table', 1),
(12, '2026_03_13_131912_create_carousels_table', 1),
(13, '2026_03_13_131912_create_testimonials_table', 1),
(14, '2026_03_13_131913_create_settings_table', 1),
(15, '2026_03_16_073122_create_jobs_table', 1),
(16, '2026_03_16_084741_create_amenities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stars` int NOT NULL DEFAULT '5',
  `bed_count` int NOT NULL,
  `bath_count` int NOT NULL,
  `wifi` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `image`, `price`, `stars`, `bed_count`, `bath_count`, `wifi`, `description`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'Junior Suite', 'rooms/ZuyVOaMCm3KxsGNVtHZapIM1HSVGPByyADahpLkr.png', 1000.00, 4, 1, 1, 1, 'A comfortable and elegant junior suite with modern amenities, perfect for solo travelers or couples. Features a king-size bed, flat-screen TV, and a beautiful city view.', 1, '2026-03-18 07:53:32', '2026-03-25 04:01:19'),
(2, 'Executive Suite', 'room-executive.jpg', 149.00, 5, 2, 1, 1, 'Our executive suite offers a spacious living area, premium furnishings, and breathtaking views. Ideal for business travelers who demand the best in comfort and style.', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(3, 'Super Deluxe', 'room-deluxe.jpg', 199.00, 5, 2, 2, 1, 'The Super Deluxe room provides an extraordinary experience with its lavish décor, premium bedding, and state-of-the-art entertainment system. Perfect for a luxurious stay.', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(4, 'Presidential Suite', 'room-presidential.jpg', 399.00, 5, 3, 3, 1, 'Our flagship Presidential Suite offers unmatched luxury with a private butler service, panoramic views, private dining room, and world-class interior designed by renowned architects.', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(5, 'Honeymoon Suite', 'room-honeymoon.jpg', 249.00, 5, 1, 2, 1, 'Specially designed for couples, this romantic suite features a jacuzzi bath, private balcony, rose petal turndown service, and complimentary champagne upon arrival.', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(6, 'Family Room', 'room-family.jpg', 179.00, 4, 3, 2, 1, 'Perfect for families, this spacious room features multiple beds, a kids\' corner, and a comfortable sitting area. Located near the pool and playground for maximum family fun.', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(7, 'Junior Suite', 'room-junior.jpg', 99.00, 4, 1, 1, 1, 'A comfortable and elegant junior suite with modern amenities, perfect for solo travelers or couples. Features a king-size bed, flat-screen TV, and a beautiful city view.', 1, '2026-04-06 06:16:30', '2026-04-06 06:16:30'),
(8, 'Executive Suite', 'room-executive.jpg', 149.00, 5, 2, 1, 1, 'Our executive suite offers a spacious living area, premium furnishings, and breathtaking views. Ideal for business travelers who demand the best in comfort and style.', 1, '2026-04-06 06:16:30', '2026-04-06 06:16:30'),
(9, 'Super Deluxe', 'room-deluxe.jpg', 199.00, 5, 2, 2, 1, 'The Super Deluxe room provides an extraordinary experience with its lavish décor, premium bedding, and state-of-the-art entertainment system. Perfect for a luxurious stay.', 1, '2026-04-06 06:16:30', '2026-04-06 06:16:30'),
(10, 'Presidential Suite', 'room-presidential.jpg', 399.00, 5, 3, 3, 1, 'Our flagship Presidential Suite offers unmatched luxury with a private butler service, panoramic views, private dining room, and world-class interior designed by renowned architects.', 1, '2026-04-06 06:16:30', '2026-04-06 06:16:30'),
(11, 'Honeymoon Suite', 'room-honeymoon.jpg', 249.00, 5, 1, 2, 1, 'Specially designed for couples, this romantic suite features a jacuzzi bath, private balcony, rose petal turndown service, and complimentary champagne upon arrival.', 1, '2026-04-06 06:16:30', '2026-04-06 06:16:30'),
(12, 'Family Room', 'room-family.jpg', 179.00, 4, 3, 2, 1, 'Perfect for families, this spacious room features multiple beds, a kids\' corner, and a comfortable sitting area. Located near the pool and playground for maximum family fun.', 1, '2026-04-06 06:16:30', '2026-04-06 06:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_svg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `tag`, `tagline`, `hero_image`, `icon_svg`, `card_image`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Rooms & Apartments', 'rooms', 'Luxury Accommodation', 'Luxurious rooms and apartments with world-class amenities and breathtaking views for every type of traveler — from solo adventurers to families and business guests.', 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=1200&q=85', NULL, 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=600&q=80', 1, 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(2, 'Food & Restaurant', 'food', 'Award-Winning Dining', 'Savor award-winning cuisine at our in-house restaurant featuring international and local dishes prepared by top chefs with the finest ingredients sourced daily.', 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1200&q=85', NULL, 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600&q=80', 1, 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(3, 'Spa & Fitness', 'spa', 'Premium Wellness', 'Rejuvenate body and mind at our premium spa with massage therapies, facial treatments, and a fully equipped fitness center run by certified wellness experts.', 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=1200&q=85', NULL, 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=600&q=80', 1, 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(4, 'Sports & Gaming', 'sports', 'Recreation & Fun', 'Enjoy a wide range of sports facilities including tennis, basketball, swimming pool, and an indoor gaming zone — perfect for guests of all ages.', 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=1200&q=85', NULL, 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=600&q=80', 1, 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(5, 'Events & Parties', 'events', 'Celebrations & Conferences', 'Host unforgettable events, weddings, and corporate meetings in our versatile banquet halls and event spaces equipped with state-of-the-art AV and décor support.', 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=1200&q=85', NULL, 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=600&q=80', 1, 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(6, 'GYM & Yoga', 'gym', 'Health & Wellness', 'Stay fit with our modern gym and yoga sessions led by certified instructors. Open 24/7 for all hotel guests with premium equipment and personalised training plans.', 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1200&q=85', NULL, 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=600&q=80', 1, 6, '2026-03-18 07:53:32', '2026-03-18 07:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `service_footers`
--

DROP TABLE IF EXISTS `service_footers`;
CREATE TABLE IF NOT EXISTS `service_footers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cta_label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cta_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_footers_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_footers`
--

INSERT INTO `service_footers` (`id`, `service_id`, `text`, `price`, `cta_label`, `cta_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Book your perfect room today and enjoy exclusive member discounts.', 'Starting ₹4,999/night', 'Book Now', '/book', '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(2, 2, 'Reserve your table and enjoy a complimentary dessert on us.', 'Avg ₹800/person', 'Reserve Table', '/reserve', '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(3, 3, 'Book a spa session and unwind with our signature therapies.', 'From ₹1,500/session', 'Book Session', '/spa-booking', '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(4, 4, 'All sports facilities are complimentary for hotel guests.', 'Free for guests', 'Enquire Now', '/contact', '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(5, 5, 'Let us make your special occasion truly unforgettable.', 'From ₹50,000', 'Get a Quote', '/event-enquiry', '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(6, 6, 'Start your fitness journey with a complimentary trainer session.', 'Free for hotel guests', 'Book a Trainer', '/gym-booking', '2026-03-18 07:53:32', '2026-03-18 07:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `service_galleries`
--

DROP TABLE IF EXISTS `service_galleries`;
CREATE TABLE IF NOT EXISTS `service_galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint UNSIGNED NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_galleries_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_galleries`
--

INSERT INTO `service_galleries` (`id`, `service_id`, `image_url`, `caption`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=600&q=80', 'Deluxe Room', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(2, 1, 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=600&q=80', 'Premium Suite', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(3, 1, 'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?w=600&q=80', 'Luxury Bathroom', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(4, 1, 'https://images.unsplash.com/photo-1564078516393-cf04bd966897?w=600&q=80', 'City View', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(5, 1, 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=600&q=80', 'Family Room', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(6, 1, 'https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?w=600&q=80', 'Studio Apartment', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(7, 2, 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600&q=80', 'Chef Specials', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(8, 2, 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&q=80', 'Restaurant Interior', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(9, 2, 'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=600&q=80', 'Fresh Ingredients', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(10, 2, 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?w=600&q=80', 'Gourmet Dishes', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(11, 2, 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=600&q=80', 'Pizza Station', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(12, 2, 'https://images.unsplash.com/photo-1482049016688-2d3e1b311543?w=600&q=80', 'Breakfast Spread', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(13, 3, 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?w=600&q=80', 'Spa Room', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(14, 3, 'https://images.unsplash.com/photo-1519823551278-64ac92734fb1?w=600&q=80', 'Massage Therapy', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(15, 3, 'https://images.unsplash.com/photo-1600334129128-685c5582fd35?w=600&q=80', 'Facial Treatment', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(16, 3, 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=600&q=80', 'Relaxation Pool', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(17, 3, 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=600&q=80', 'Hot Stone', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(18, 3, 'https://images.unsplash.com/photo-1491555103944-7c647fd857e6?w=600&q=80', 'Steam Room', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(19, 4, 'https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?w=600&q=80', 'Swimming Pool', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(20, 4, 'https://images.unsplash.com/photo-1622279457486-62dcc4a431d6?w=600&q=80', 'Tennis Court', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(21, 4, 'https://images.unsplash.com/photo-1603988363607-e1e4a66962c6?w=600&q=80', 'Basketball', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(22, 4, 'https://images.unsplash.com/photo-1547347298-4074fc3086f0?w=600&q=80', 'Badminton', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(23, 4, 'https://images.unsplash.com/photo-1529900748604-07564a03e7a6?w=600&q=80', 'Kids Pool', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(24, 4, 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80', 'Gaming Zone', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(25, 5, 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=600&q=80', 'Grand Ballroom', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(26, 5, 'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=600&q=80', 'Wedding Setup', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(27, 5, 'https://images.unsplash.com/photo-1525268323446-0505b6fe7778?w=600&q=80', 'Corporate Event', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(28, 5, 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?w=600&q=80', 'Conference Hall', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(29, 5, 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&q=80', 'Gala Dinner', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(30, 5, 'https://images.unsplash.com/photo-1478147427282-58a87a433b2e?w=600&q=80', 'Birthday Party', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(31, 6, 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=600&q=80', 'Gym Floor', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(32, 6, 'https://images.unsplash.com/photo-1599058945522-28d584b6f0ff?w=600&q=80', 'Free Weights', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(33, 6, 'https://images.unsplash.com/photo-1506629082955-511b1aa562c8?w=600&q=80', 'Yoga Studio', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(34, 6, 'https://images.unsplash.com/photo-1575052814086-f385e2e2ad1b?w=600&q=80', 'Cardio Zone', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(35, 6, 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=600&q=80', 'Yoga Stretch', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(36, 6, 'https://images.unsplash.com/photo-1548690312-e3b507d8c110?w=600&q=80', 'Personal Training', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `service_highlights`
--

DROP TABLE IF EXISTS `service_highlights`;
CREATE TABLE IF NOT EXISTS `service_highlights` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint UNSIGNED NOT NULL,
  `highlight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_highlights_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_highlights`
--

INSERT INTO `service_highlights` (`id`, `service_id`, `highlight`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Free WiFi', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(2, 1, 'Breakfast Included', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(3, 1, 'Daily Housekeeping', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(4, 1, 'Concierge Service', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(5, 1, 'Airport Transfer', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(6, 1, 'Late Checkout Available', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(7, 2, 'Vegetarian Options', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(8, 2, 'Jain Menu Available', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(9, 2, 'Live Music Fridays', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(10, 2, 'Chef\'s Special Daily', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(11, 2, 'Outdoor Seating', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(12, 2, 'Private Dining Room', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(13, 3, 'Organic Products Used', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(14, 3, 'Private Treatment Rooms', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(15, 3, 'Steam & Sauna', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(16, 3, 'Qualified Therapists', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(17, 3, 'Pre-booking Required', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(18, 3, 'Couple Packages', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(19, 4, 'Free for Hotel Guests', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(20, 4, 'Equipment on Loan', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(21, 4, 'Kids Play Area', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(22, 4, 'Coaching Available', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(23, 4, 'Night-lit Courts', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(24, 4, 'Tournaments Monthly', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(25, 5, 'In-house Event Planner', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(26, 5, 'Custom Décor', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(27, 5, 'Catering Packages', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(28, 5, 'Valet Parking', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(29, 5, 'Bridal Suite', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(30, 5, 'Live Entertainment', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(31, 6, 'Open 24/7', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(32, 6, 'Certified Trainers', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(33, 6, 'Free for Guests', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(34, 6, 'Yoga Mats Provided', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(35, 6, 'Protein Bar', 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(36, 6, 'Body Composition Analysis', 5, '2026-03-18 07:53:32', '2026-03-18 07:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `service_sections`
--

DROP TABLE IF EXISTS `service_sections`;
CREATE TABLE IF NOT EXISTS `service_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` json NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_sections_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_sections`
--

INSERT INTO `service_sections` (`id`, `service_id`, `title`, `items`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Room Types', '[\"Deluxe Room\", \"Premium Suite\", \"Family Apartment\", \"Presidential Suite\", \"Studio Room\"]', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(2, 1, 'Amenities', '[\"King/Queen Beds\", \"Smart TV & WiFi\", \"Mini Bar & Fridge\", \"Air Conditioning\", \"Room Service 24/7\"]', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(3, 1, 'Views Available', '[\"Ocean View\", \"City Skyline\", \"Garden View\", \"Pool View\"]', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(4, 1, 'Policies', '[\"Check-in: 2:00 PM\", \"Check-out: 11:00 AM\", \"Pet Friendly Rooms\", \"Non-smoking Floors\"]', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(5, 2, 'Cuisines', '[\"North Indian\", \"Continental\", \"Chinese\", \"Mediterranean\", \"Mughlai\"]', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(6, 2, 'Dining Options', '[\"All-Day Dining\", \"Rooftop Restaurant\", \"Poolside Café\", \"Private Dining\", \"Buffet Breakfast\"]', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(7, 2, 'Specialties', '[\"Live Grills\", \"Chef\'s Table\", \"Sunday Brunch\", \"Seasonal Menu\"]', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(8, 2, 'Beverages', '[\"Mocktails & Juices\", \"Signature Cocktails\", \"Premium Wines\", \"Coffee & Tea Bar\"]', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(9, 3, 'Spa Therapies', '[\"Swedish Massage\", \"Deep Tissue Massage\", \"Hot Stone Therapy\", \"Aromatherapy\", \"Couple\'s Spa\"]', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(10, 3, 'Facial Treatments', '[\"Anti-Aging Facial\", \"Hydration Therapy\", \"Gold Facial\", \"Skin Brightening\"]', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(11, 3, 'Fitness Center', '[\"Cardio Machines\", \"Free Weights\", \"Personal Trainer\", \"Sauna & Steam\"]', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(12, 3, 'Wellness Packages', '[\"Day Spa Package\", \"Weekend Retreat\", \"Bridal Package\", \"Detox Programme\"]', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(13, 4, 'Outdoor Sports', '[\"Tennis Court\", \"Basketball Court\", \"Badminton\", \"Cricket Net\", \"Jogging Track\"]', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(14, 4, 'Water Activities', '[\"Swimming Pool\", \"Kids Pool\", \"Aqua Aerobics\", \"Pool Volleyball\"]', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(15, 4, 'Indoor Gaming', '[\"Billiards/Snooker\", \"Table Tennis\", \"Foosball\", \"Video Gaming Zone\"]', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(16, 4, 'Equipment', '[\"Sports Gear Available\", \"Coaching on Request\", \"Tournament Events\", \"Sports Shop\"]', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(17, 5, 'Event Types', '[\"Weddings & Receptions\", \"Corporate Meetings\", \"Birthday Parties\", \"Anniversaries\", \"Product Launches\"]', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(18, 5, 'Venues', '[\"Grand Ballroom (500 pax)\", \"Conference Hall (100 pax)\", \"Rooftop Terrace\", \"Garden Lawn\", \"Board Room (20 pax)\"]', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(19, 5, 'Catering Options', '[\"Customized Menu\", \"Live Counters\", \"Dessert Stations\", \"Cocktail Packages\"]', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(20, 5, 'Add-ons', '[\"Décor & Florals\", \"DJ & Sound Setup\", \"Photography\", \"AV Equipment\", \"Event Planner\"]', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(21, 6, 'Gym Equipment', '[\"Treadmills & Cycles\", \"Cross Trainers\", \"Free Weights (up to 50kg)\", \"Cable Machines\", \"Smith Machine\"]', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(22, 6, 'Yoga Classes', '[\"Hatha Yoga\", \"Power Yoga\", \"Meditation Sessions\", \"Breathing & Pranayama\", \"Prenatal Yoga\"]', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(23, 6, 'Trainers', '[\"Personal Training\", \"Nutritional Advice\", \"Body Assessment\", \"Custom Workout Plan\"]', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(24, 6, 'Facilities', '[\"Steam Room\", \"Changing Rooms\", \"Towel Service\", \"Protein Bar Counter\"]', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `service_timings`
--

DROP TABLE IF EXISTS `service_timings`;
CREATE TABLE IF NOT EXISTS `service_timings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_timings_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_timings`
--

INSERT INTO `service_timings` (`id`, `service_id`, `label`, `value`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Check-in', '2:00 PM', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(2, 1, 'Check-out', '11:00 AM', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(3, 1, 'Room Service', '24/7', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(4, 1, 'From', '₹4,999/night', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(5, 2, 'Breakfast', '7–11 AM', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(6, 2, 'Lunch', '12–3 PM', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(7, 2, 'Dinner', '7–11 PM', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(8, 2, 'Avg. Cost', '₹800/person', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(9, 3, 'Spa Hours', '6 AM–10 PM', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(10, 3, 'Session', '60–120 min', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(11, 3, 'Gym', '24/7', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(12, 3, 'From', '₹1,500', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(13, 4, 'Pool', '6 AM–9 PM', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(14, 4, 'Courts', '6 AM–10 PM', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(15, 4, 'Gaming Zone', '10 AM–11 PM', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(16, 4, 'Access', 'Free for guests', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(17, 5, 'Enquiry', '9 AM–6 PM', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(18, 5, 'Capacity', 'Up to 500', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(19, 5, 'Advance Book', '2–4 weeks', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(20, 5, 'From', '₹50,000', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(21, 6, 'Gym', 'Open 24/7', 0, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(22, 6, 'Yoga Batch 1', '6–7 AM', 1, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(23, 6, 'Yoga Batch 2', '6–7 PM', 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(24, 6, 'Access', 'Free for guests', 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('QUKiiCLy5g3FseeMHG9EIIuQgM298h5UOkI9euFU', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiam9RdUlKTlFJeWpSVTRSOWZrS3hPcEVrSldzMVpKMndQSDRHQkJOQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774605234),
('jSqt87GZlfg0C2FDQIq8sOKhFrtMvfYSJbpzPn6N', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTRSRXNCU0ZHYjVsQW42Z0pMZU5qeEZzMVJheTF3aGwyN2IxTmUwZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774599074),
('daqcLjDe29x0bNzl2cduIUZFsVvlgDIyJwN7tF4C', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXExT3F4QmtkU0VtMjhPZGZ6a2tvVVZGM2VJR1I0WVJBYkNlVGp4RiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774604657),
('DC3p8rTRm8LtAPEcJocjniLbyw046Il3LRTLGAPp', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHJudmVGRW5wYlVrSmxQUTFrcmE1ZGo3dmtONE9aczQwV1ZlTTFRciI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774605145),
('nQcx7tFTXTwTsuQP7coo3h2Nk2lrvFPcsb5C7oC8', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia1BTcVRTbDFqanhXaWZ2NEIxMGhmeGpPWmZBRjZOTEFtY2FMcDJVaSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1NjoiaHR0cDovL2xvY2FsaG9zdC9ob3RlbC1tYW5hZ2VtZW50L3B1YmxpYy9hZG1pbi9hbWVuaXRpZXMiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo1MDoiaHR0cDovL2xvY2FsaG9zdC9ob3RlbC1tYW5hZ2VtZW50L3B1YmxpYy9zZXJ2aWNlLzUiO3M6NToicm91dGUiO3M6MTQ6InNlcnZpY2UuZGV0YWlsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774594165),
('KUKlyNgzHCSV9uENyz3ClH8eMshuna2J0tRXhbPv', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTG9nSUFwSzdvTUZnRjNuSjYzUzJ4QVBtOGtmYUlQdjdxR2RIWGhBSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774440554),
('2UJEVl282EUHXk5bwXcQtbbxLdnRG7ZUsp9EwIp9', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0ZRblFneVBPOGxwb0I3bWtMZTNoUzNjWllpSEJhV3lmVkRHZmNocyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774440160),
('Q1659xBsGixsNOUZyBJJw8XRkTBpeUUF0S2DEwzP', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQUpsdHBVb1l4Rm9LRmMweDBQN1hxVnVUNDl0RHhTQjV1Z2RUWmJ2ciI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDEvYWRtaW4vYW1lbml0aWVzIjtzOjU6InJvdXRlIjtzOjIxOiJhZG1pbi5hbWVuaXRpZXMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1774439120),
('c0AzizQINbrCONRcfZCm8zul9tODiGJKVwCGfvJj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRDY4VjBoQjU2NFk0OU9qTmRvZXI4YUdzd1BicW51a3pvZUVXVGd2bSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1774437882),
('mefLiY388TSIMVOMkKJtVdrnBe16o6jD2y2aCBhq', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWW9PclZvZDFRd2toZUJZSkhmVGNoMFlFYkhzTnFDZ2c4MGxqWHhnbCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774439778),
('s8rtgzhaXTBRPFuKHcgfBTRyA8WIKXBUvhpnXbgH', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTWoyS3ZseDlkZUYzWHpONjgwNjR2NkFGclhuUnVpN0t4STc3VnNDbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6ODt9', 1774437499),
('jmYrbtPhP1wsdIDz7AvdPxyjbC4gnwp4CdmnHxS3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWkh1d2dPQVk4U2V5cDYydks4aUJLT0xIRkNuWEQza0daTmE1RjFpRCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774437754),
('HRfHJ6MIVCAlvYIquFD5Md9T5cwW8M6PTvzRWWam', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUZKRUF5c29vOTE5Y1BEUDlGdzNzMkxTTUkwZTBWRUpMNjZZaTFvUSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774437077),
('ROJ0kFViRB1HozdZqMrzyElIx3816870289IVcvO', 7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSEUxaTU5anVXbDQ1Vmt3NjVER0V1dzhqdW5MWDRpbTltRGNTMXlQZCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjUwOiJodHRwOi8vbG9jYWxob3N0L2hvdGVsLW1hbmFnZW1lbnQvcHVibGljL2Rhc2hib2FyZCI7czo1OiJyb3V0ZSI7czo5OiJkYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1774436260),
('eD9u0eCgXlQTAMhxkaO6TLriTuxB5ic0NMnqsW97', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjhsV21nYlFndjFsaXlLaDVxUXBYZUM0MHAwMFk1blRxZTFQck02eCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774433818),
('QUPnyYIenrbtHpVfbsT0t2rce0yeFVlB7ssbXpKl', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTW1mdG9SbDZSYlZyeWtUQWdUWUpNVVVGODhwZm4wNmhGTkhHY0ZFdCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774431564),
('qvhfuW3JDfOjrJMNgRSsk1De7seaagEuZ3mc9r9W', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0FZbGFPT0hKODBGbmpEU3pxTUxUR0JOblJkZllvbHp0ZkNsOEJYTiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774432852),
('130nXI4oHVxvpT7PlwhLYwhHXws9i4UKHO7q8fLm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGN0THJrR0YyaVpZV0tlOXpQbkNIenpYWUlnMUNOaGxBcmw2MzE3dCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774436984),
('d5ATqOx80L2TYnsQcKrC8qq9cv74nOSnwje4GDij', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFpZVzg3RmRlRTl2dlJwOEZQUWpGcTBWc1VJZVhHTmhkTVJXNlBPVyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774436666),
('TNU361gOK96VuV3dDMoJ5ufMGFlrlPallMIZEkr9', 6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib2twUm5ieFY3MVpDYXRSOWEyUjRhUzlGSHdyVkI1eGVmYnRIUWdFMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMvcGF5bWVudC9jaGVja291dC82IjtzOjU6InJvdXRlIjtzOjE2OiJwYXltZW50LmNoZWNrb3V0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1774428923),
('BwrhroKjuwvFjyt7tDhsqj7MvsZTDylMeMK6Cuu5', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidlo1dVRuMmxMYUxFY2dPT3RTUUc0UHZSb0RmNnBuYWFtbTgxbVdwYiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMvYWRtaW4vcm9vbXMvMS9lZGl0IjtzOjU6InJvdXRlIjtzOjE2OiJhZG1pbi5yb29tcy5lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1774431089),
('GNB6EcxkDlpW4a99Zm32bzJSHE30yAs83tlLA3Xv', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaVN1TjRROWtjb2Z0TnpHdDl2YktqemxaRVVpUU9BN0p5U2R3OVJmWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMvbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1774430583),
('KqO6vqhl0FxiNYid8cJfS7oCnbmh3TdrRIWOkO9F', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR3l1eDgwTWF5aEpUbnluNkw5OVJsTm9HU2ZCd1NRZUYyUVE0UGc1MCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1NjoiaHR0cDovL2xvY2FsaG9zdC9ob3RlbC1tYW5hZ2VtZW50L3B1YmxpYy9hZG1pbi9kYXNoYm9hcmQiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0NjoiaHR0cDovL2xvY2FsaG9zdC9ob3RlbC1tYW5hZ2VtZW50L3B1YmxpYy9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774845799),
('Rti8gNBGFS7s3R8id21B0Jme9CUCx3sNBA4eyw9X', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkdXaXNZR251aDJkSFlvcVVhZlFIMzREckhTODhqcjRwMENubjMwUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774855414),
('u7juyAhHLkv3Ov3SouE4Orkp8EHcD3Sfh7fnVAid', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibEJGNFM1YkJvbkI2YWx6SkEyMjN6d3NGeDVHcnd0NlMxUFhIRkJteCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMvbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1774933506),
('RBInyuLeUwXmuPExRslMOhg1hAmiOtUiyQ8JrDVI', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnpST29aZEdVRVRyc0JSVVFqNExPUXZqR0JoRXNJUFhWRGZlRjJjbyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1775456345),
('bpCmThthvTsDctfRTKU83Q43WsuL5boWBGhbEW2c', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQW9zUGtCZ2xVeG02OVZ1T2tXN01FMEh4dWpDWDdNbnA5dkQ4elNLUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvaG90ZWwtbWFuYWdlbWVudC9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1775460329);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `created_at`, `updated_at`) VALUES
(1, 'contact_address', '123 Luxury Lane, Ahmedabad', 'contact', '2026-04-06 06:16:29', '2026-04-06 06:16:29'),
(2, 'contact_phone', '+91 79 1234 5678', 'contact', '2026-04-06 06:16:29', '2026-04-06 06:16:29'),
(3, 'contact_email', 'info@grandhotel.com', 'contact', '2026-04-06 06:16:29', '2026-04-06 06:16:29'),
(4, 'social_twitter', '', 'social', '2026-04-06 06:16:29', '2026-04-06 06:16:29'),
(5, 'social_facebook', '', 'social', '2026-04-06 06:16:29', '2026-04-06 06:16:29'),
(6, 'social_youtube', '', 'social', '2026-04-06 06:16:29', '2026-04-06 06:16:29'),
(7, 'social_linkedin', '', 'social', '2026-04-06 06:16:29', '2026-04-06 06:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
CREATE TABLE IF NOT EXISTS `team_members` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'team-1.jpg',
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `designation`, `image`, `twitter`, `facebook`, `instagram`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'William James', 'General Manager', 'team-1.jpg', NULL, NULL, NULL, 4, '2026-03-18 07:53:32', '2026-03-25 00:37:08'),
(2, 'Victoria Stone', 'Head of Hospitality', 'team-2.jpg', NULL, NULL, NULL, 2, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(3, 'Alexander Green', 'Executive Chef', 'team-3.jpg', NULL, NULL, NULL, 3, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(4, 'Sophia Carter', 'Spa Director', 'team-4.jpg', NULL, NULL, NULL, 4, '2026-03-18 07:53:32', '2026-03-18 07:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$1npv0rul0PFF1Mz9dd7w/eiHlYON110cfO13dS0bcrbvvCcgxsPcK', 1, NULL, '2026-03-18 07:53:31', '2026-03-25 05:47:01'),
(2, 'John Doe', 'user@hotelier.com', NULL, '$2y$12$FnigF8vEJ96QkT6.SlZSIOQpiM0KeDzcIenm8TP4Z6xcjuei43btu', 0, NULL, '2026-03-18 07:53:32', '2026-03-18 07:53:32'),
(3, 'harsh', 'harsh@gmail.com', NULL, '$2y$12$PKjrHzwXuw/NvEzvEMAu0OJ7l/ydwLEJarbOSkqSr9Bosg43s7aTa', 0, NULL, '2026-03-19 01:35:14', '2026-03-19 01:35:14'),
(4, 'Nishita', 'joshinishita01@gmail.com', NULL, '$2y$12$483yZYDdfsRcrLxk2ClSKOK6I/eS7H0xG703rcXr9J7w2NQ.6ocDq', 0, NULL, '2026-03-24 01:12:35', '2026-03-24 01:12:35'),
(5, 'hii', 'hii@gmail.com', NULL, '$2y$12$TrKZXMh400EPGKY8Y8993etYFDpEfzsB0t9lUrjz9YryO5CA5Uaty', 0, NULL, '2026-03-25 00:07:23', '2026-03-25 00:07:23'),
(6, 'QA Test User', 'testuser_123@example.com', NULL, '$2y$12$ERU77k1U3hO3Vfwlqc847uCRbff2ZhgJCCTks9K/qdz/740dEmNtC', 0, NULL, '2026-03-25 02:03:25', '2026-03-25 02:03:25'),
(7, 'dhruv', 'd43735795@gmail.com', NULL, '$2y$12$H/ywTadMYExxW3DJFUQ0r.hYxlbZkWuuuRGTtZdK7yozNVlOc0dTy', 0, NULL, '2026-03-25 05:27:30', '2026-03-25 05:27:30'),
(8, 'Jasmin Multani', 'jasmin.vibetech05@gmail.com', NULL, '$2y$12$56dARB12auSRTQMSoGsqZefXsab3A3pxwERZ2sgh5xMPZ02sUoasu', 0, NULL, '2026-03-25 05:48:15', '2026-03-25 05:48:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
