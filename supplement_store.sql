-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2025 at 07:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supplement_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_energy_boosters`
--

CREATE TABLE `all_energy_boosters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_energy_boosters`
--

INSERT INTO `all_energy_boosters` (`id`, `name`, `description`, `price`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'POWER CREATINE SUPREME', 'The ultimate strength amplifier engineered for maximum power output. Pure micronized creatine monohydrate delivers explosive strength gains, enhanced muscle power, and lightning-fast recovery for unstoppable performance.', 24.99, 'https://shop.biotechusa.com/cdn/shop/products/100CreatineMonohydrate_Unflav_500g_1l.png?v=1623392653', '2025-08-24 02:23:32', '2025-08-24 02:23:32'),
(2, 'BRUTAL IGNITION', 'The ultimate pre-workout formula engineered for athletes who demand maximum performance. Experience explosive energy, razor-sharp focus, and skin-splitting pumps that last your entire workout.', 49.99, 'https://ca.tc-nutrition.com/cdn/shop/files/1188EB7D-6A3D-4426-AC42-E49702C08F6C_1024x1024.png?v=1746540678', '2025-08-24 02:23:32', '2025-08-24 02:23:32'),
(3, 'MASS DESTROYER X', 'The ultimate muscle-building protein engineered for serious athletes. Pure whey isolate delivers 30g of premium protein per serving with lightning-fast absorption for maximum anabolic response and explosive muscle growth.', 39.99, 'https://shop.biotechusa.com/cdn/shop/files/izek_packshot_HQ2024_100PW_1000x1000_coconut_choco_c_1.png?v=1740072447', '2025-08-24 02:23:32', '2025-09-03 21:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-1c0bab7e9ed38450d09f62f669a24392', 'i:1;', 1756217900),
('laravel-cache-1c0bab7e9ed38450d09f62f669a24392:timer', 'i:1756217900;', 1756217900),
('laravel-cache-22faaf0786814bd08d0391b836ab2893', 'i:1;', 1756908947),
('laravel-cache-22faaf0786814bd08d0391b836ab2893:timer', 'i:1756908947;', 1756908947),
('laravel-cache-2e56b50af10da855d7c70c361d9a8c44', 'i:1;', 1756953386),
('laravel-cache-2e56b50af10da855d7c70c361d9a8c44:timer', 'i:1756953386;', 1756953386),
('laravel-cache-ef478b66cecb0985b05e200c3cebbbf1', 'i:1;', 1756531934),
('laravel-cache-ef478b66cecb0985b05e200c3cebbbf1:timer', 'i:1756531934;', 1756531934),
('laravel-cache-miyulasbandara@gmail.com|127.0.0.1', 'i:1;', 1756908949),
('laravel-cache-miyulasbandara@gmail.com|127.0.0.1:timer', 'i:1756908949;', 1756908949);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_type` varchar(255) NOT NULL DEFAULT 'all_energy_boosters',
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `creatines`
--

CREATE TABLE `creatines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creatines`
--

INSERT INTO `creatines` (`id`, `name`, `description`, `price`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'POWER CREATINE SUPREME', 'The ultimate strength amplifier engineered for maximum power output. Pure micronized creatine monohydrate delivers explosive strength gains, enhanced muscle power, and lightning-fast recovery for unstoppable performance.', 24.99, 'https://shop.biotechusa.com/cdn/shop/products/100CreatineMonohydrate_Unflav_500g_1l.png?v=1623392653', '2025-08-24 02:42:38', '2025-08-24 02:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_07_31_150325_create_creatines_table', 1),
(4, '2025_07_31_150351_create_protein_table', 1),
(5, '2025_07_31_150400_create_preworkout_table', 1),
(6, '2025_08_14_092335_create_all_energy_boosters', 1),
(7, '2025_08_17_091539_create_personal_access_tokens_table', 1),
(8, '2025_08_24_035314_create_user_table', 1),
(9, '2025_08_24_035643_create_sessions_table', 1),
(10, '2025_08_24_040853_add_beast_fields_to_users', 1),
(11, '2025_08_23_144649_add_profile_fields_to_users_table', 2),
(12, '2025_08_24_104923_create_newsletter_subscribers_table', 2),
(13, '2025_08_25_014923_create_cart_items_table', 3),
(14, '2025_09_04_012516_admin__dashboard', 4);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `status`, `subscribed_at`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 'miyulasbandara@gmail.com', 'active', '2025-08-24 06:04:06', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '2025-08-24 06:04:06', '2025-08-24 06:04:06'),
(2, 'miyulasinduwara2@gmail.com', 'active', '2025-08-24 06:15:59', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '2025-08-24 06:15:59', '2025-08-24 06:15:59'),
(3, 'triplomax34567@gmail.com', 'active', '2025-08-24 21:28:08', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '2025-08-24 21:28:08', '2025-08-24 21:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preworkouts`
--

CREATE TABLE `preworkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `preworkouts`
--

INSERT INTO `preworkouts` (`id`, `name`, `description`, `price`, `image_url`, `created_at`, `updated_at`) VALUES
(1, '  BRUTAL IGNITION', ' The ultimate pre-workout formula engineered for athletes who demand maximum performance. \n                                Experience explosive energy, razor-sharp focus, and skin-splitting pumps that last your entire workout.', 49.99, 'https://ca.tc-nutrition.com/cdn/shop/files/1188EB7D-6A3D-4426-AC42-E49702C08F6C_1024x1024.png?v=1746540678', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proteins`
--

CREATE TABLE `proteins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proteins`
--

INSERT INTO `proteins` (`id`, `name`, `description`, `price`, `image_url`, `created_at`, `updated_at`) VALUES
(1, ' MASS DESTROYER', '  The ultimate muscle-building protein engineered for serious athletes. \n                                Pure whey isolate delivers 30g of premium protein per serving with lightning-fast absorption \n                                for maximum anabolic response and explosive muscle growth.', 39.99, 'https://shop.biotechusa.com/cdn/shop/files/izek_packshot_HQ2024_100PW_1000x1000_coconut_choco_c_1.png?v=1740072447', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5A9Poo4PzjaHcZWGSI9t1GOX6qfw0ebYDHgEDAvx', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTHFydmNTdVBCZEZNc1FHZ1lDaEszdDRHYTZTOXVqRVozVnFoQ2lKbyI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvaG9tZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkcTU1bFA4MUpNL3R6RWgzOXZiYlVwLnRmeFAweTdpc2U3dXptdm8zdkdxTVRrcFZraldqUWEiO30=', 1756909013),
('RDBLWc8eYbEwxbcc0D4mlTYmtDyfWhEUBpaiTOrx', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSWI5UWQxdjFtVUhDQzJRY2Y0NWhvVlRXbWlNdDdHV2NjNHY3OE1zOSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkREdPZURyaXZ3dzA5Ry9iY3IvenEzdXYvTklmU1JLcGQvT2E4TzJ4R1A1S1pKM29TZDNrLzIiO30=', 1756960715);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `admin_since` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` varchar(255) DEFAULT NULL,
  `two_factor_enabled` tinyint(1) NOT NULL DEFAULT 0,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `beast_goals` enum('Muscle Domination','Fat Destruction','Strength Maximization','Endurance Evolution') DEFAULT NULL,
  `workout_intensity` enum('BEAST','SAVAGE','LEGEND') DEFAULT NULL,
  `supplement_focus` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`supplement_focus`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `admin_since`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_enabled`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `beast_goals`, `workout_intensity`, `supplement_focus`, `created_at`, `updated_at`) VALUES
(3, 'Alexa', 'alex@gmail.com', 1, '2025-09-03 20:21:36', '2025-09-03 20:21:36', '$2y$12$DGOeDrivww09G/bcr/zq3uv/NIfSRKpd/Oa8O2xGP5KZJ3oSd3k/2', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-03 20:21:37', '2025-09-03 21:52:39'),
(4, 'John Beast', 'john@example.com', 0, NULL, '2025-09-03 20:21:38', '$2y$12$4o1Wde9fyclSXXjVvIx8q.zbENPTF3Ha7yQNK957toxI0aR6cX76S', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Muscle Domination', 'BEAST', NULL, '2025-09-03 20:21:38', '2025-09-03 20:21:38'),
(5, 'Sarah Savage', 'sarah@example.com', 0, NULL, '2025-09-03 20:21:38', '$2y$12$d/vLS68MOOwSPSW467EVFengRCssDp65tbVESsWcXhBI8Oe67tTxa', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Fat Destruction', 'SAVAGE', NULL, '2025-09-03 20:21:38', '2025-09-03 20:21:38'),
(6, 'Mike Legend', 'mike@example.com', 0, NULL, '2025-09-03 20:21:38', '$2y$12$mNMfOJFQnc.3OE0r0Ju4hO3uaeG0wbGTOP9Pkr8zl6/Chq1HviVa2', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Strength Maximization', 'LEGEND', NULL, '2025-09-03 20:21:38', '2025-09-03 20:21:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_energy_boosters`
--
ALTER TABLE `all_energy_boosters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`),
  ADD KEY `cart_items_session_id_user_id_index` (`session_id`,`user_id`);

--
-- Indexes for table `creatines`
--
ALTER TABLE `creatines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_subscribers_email_unique` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `preworkouts`
--
ALTER TABLE `preworkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proteins`
--
ALTER TABLE `proteins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_energy_boosters`
--
ALTER TABLE `all_energy_boosters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `creatines`
--
ALTER TABLE `creatines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preworkouts`
--
ALTER TABLE `preworkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proteins`
--
ALTER TABLE `proteins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `all_energy_boosters` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
