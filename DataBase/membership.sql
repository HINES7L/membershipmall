-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2025 at 02:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `membership`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 2),
(7, '2025_05_25_075614_create_point_exchanges_table', 2),
(8, '2025_05_25_095551_create_rewards_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_exchanges`
--

CREATE TABLE `point_exchanges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reward` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `point_exchanges`
--

INSERT INTO `point_exchanges` (`id`, `user_id`, `reward`, `amount`, `points`, `created_at`, `updated_at`) VALUES
(45, 1, 'digital-coupon', 100000, 1, '2025-06-01 06:18:31', '2025-06-01 06:18:31'),
(46, 1, 'digital-coupon', 100000, 1, '2025-06-01 13:39:28', '2025-06-01 13:39:28'),
(47, 1, 'digital-coupon', 0, 1, '2025-06-01 13:41:39', '2025-06-01 13:41:39'),
(48, 1, 'digital-coupon', 200000, 2, '2025-06-01 13:47:12', '2025-06-01 13:47:12'),
(49, 1, 'digital-coupon', 0, 1, '2025-06-01 13:48:47', '2025-06-01 13:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `redeem_details`
--

CREATE TABLE `redeem_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `point_exchange_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reward` varchar(255) NOT NULL,
  `point_cost` int(11) NOT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redeem_details`
--

INSERT INTO `redeem_details` (`id`, `point_exchange_id`, `user_id`, `reward`, `point_cost`, `coupon_code`, `full_name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(3, 47, 1, 'digital-coupon', 1, NULL, 'steven', 'tiban', '082285658989', '2025-06-01 13:41:39', '2025-06-01 13:41:39'),
(4, 49, 1, 'digital-coupon', 1, NULL, 'steven', 'tiban ksb', '082285658989', '2025-06-01 13:48:47', '2025-06-01 13:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `point_cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('rZmXJXir4gr6yEG95u893OKBub7wMR2paBytfbO5', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieUNjSUJMbTBMclZ4WWJFaGdhV2wwSkFWMWZHRHVSeElhWG1ORDdMciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1748811033);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `points`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'steven', 's7nes@gmail.com', '2024-03-22 17:01:14', '$2y$12$VwVMXD2qqmW91kXip1o/Se02vJljireo6nIR.9PcugwQvqiMqINzm', 2, 'QweiNeikmKTq32W5lNk8wnqhdR6IBalRwkz7SQ4cIgX5GivEucKfcdy1x6kd', '2025-05-21 09:20:52', '2025-06-01 13:48:47'),
(3, 'wendy', 'wendy@gmail.com', NULL, '$2y$12$wPnzti9VwnRUBNtGSeUEBucHukdMj.KHGkOxRQHd.rkrnxqBAt5k6', 0, NULL, '2025-05-21 12:31:35', '2025-06-01 07:48:36'),
(4, 'jesen', 'json@gmail.com', NULL, '$2y$12$1H3Qi9WaB3wxglBseAt0xOP39Y.I9J.URT0r.ptnQ1HrG/HlGCmMW', 0, NULL, '2025-05-21 18:51:34', '2025-05-21 18:51:34'),
(5, 'steven ses', 'ses@gmail.com', NULL, '$2y$12$qF..sp41a9cFy7Dickj.9.kcFOnc6NHaiQW5UAaOd09HUWjc341kK', 0, NULL, '2025-05-21 20:47:51', '2025-05-24 23:51:32'),
(6, 'rpl 11', 'rpl@gmail.com', NULL, '$2y$12$QpOs.ng2mhLXNS1bJNgoLuOYmR2n33o3mdZ4lC6mveo9O28Erks.e', 0, NULL, '2025-05-21 20:58:03', '2025-05-21 20:58:03'),
(10, 'Yuma Soerianto', 'yuma@gmail.com', '2017-05-01 16:53:04', '$2y$12$2RdHOPKBC0uONieG3oIZ9.HQhonrbQ7f0BwUl/6kqXz/MszzgdIqa', 0, NULL, '2025-05-25 03:12:05', '2025-05-25 03:12:05'),
(11, 'kevin yap', 'kevin@gmail.com', NULL, '$2y$12$MqF4BWZ0Q6earq4KIaU7K.Vrv12S8QKZIBFd1yeB41VGHjTb5gjS.', 0, NULL, '2025-05-25 03:13:07', '2025-05-25 03:13:07'),
(12, 'derius', 'der@gmail.com', NULL, '$2y$12$vNByTyGjRpc9Vo4HFb.ZU.JBzkjXM0qVlZzacEOnjycGObSUYjqz6', 0, NULL, '2025-05-25 03:13:34', '2025-05-25 03:13:34');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `point_exchanges`
--
ALTER TABLE `point_exchanges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `redeem_details`
--
ALTER TABLE `redeem_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_redeem_point_exchange` (`point_exchange_id`),
  ADD KEY `fk_redeem_user` (`user_id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `point_exchanges`
--
ALTER TABLE `point_exchanges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `redeem_details`
--
ALTER TABLE `redeem_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `point_exchanges`
--
ALTER TABLE `point_exchanges`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redeem_details`
--
ALTER TABLE `redeem_details`
  ADD CONSTRAINT `fk_redeem_point_exchange` FOREIGN KEY (`point_exchange_id`) REFERENCES `point_exchanges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_redeem_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
