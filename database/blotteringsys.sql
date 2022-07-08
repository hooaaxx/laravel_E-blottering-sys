-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 07:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blotteringsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `blotters`
--

CREATE TABLE `blotters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `case_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complainant_img` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complainant_firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complainant_lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complainant_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complainant_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `respondent_img` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respondent_firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respondent_lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respondent_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respondent_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `when` date NOT NULL,
  `where` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `what` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blotters`
--

INSERT INTO `blotters` (`id`, `user_id`, `case_number`, `pass_to`, `approval`, `municipal`, `barangay`, `complainant_img`, `complainant_firstname`, `complainant_lastname`, `complainant_number`, `complainant_address`, `respondent_img`, `respondent_firstname`, `respondent_lastname`, `respondent_number`, `respondent_address`, `when`, `where`, `what`, `created_at`, `updated_at`) VALUES
(1, 2, '9526123382', 'municipal', 'passed', 'Calasiao', 'Malabago', '/storage/complainant_images/complainantDefault.jpg', 'Michel jou', 'Bonganay', '09388440860', 'bagong silang', '/storage/respondent_images/respondentDefault.png', 'testing', 'testing', '09123456789', 'test address', '2022-07-11', 'test', 'testing', '2022-07-06 02:50:59', '2022-07-06 18:30:50'),
(2, 2, '9877569135', 'municipal', 'passed', 'testmunicipal', 'testbrgy', '/storage/complainant_images/complainantDefault.jpg', 'Michel jou', 'Bonganay', '09388440860', 'bagong silang', '/storage/respondent_images/respondentDefault.png', 'testing', 'testing', '09123456789', 'test address', '2022-07-14', 'test', 'test', '2022-07-06 02:59:16', '2022-07-06 18:36:48'),
(3, 2, '9978389603', 'provincial', 'passed_to_provincial', 'Calasiao', 'Nalsiao', '/storage/complainant_images/complainantDefault.jpg', 'test', 'Bonganay', '09388440860', 'bagong silang', '/storage/respondent_images/respondentDefault.png', 'testing', 'testing', '09123456789', 'test address', '2022-07-10', 'test', 'testing', '2022-07-06 03:03:52', '2022-07-06 20:39:02'),
(6, 3, '6178969865', 'brgy', 'approved', 'Calasiao', 'Malabago', '/storage/complainant_images/1657166906gojo.jpg', 'Michel jou', 'Bonganay', '09388440860', 'bagong silang', '/storage/respondent_images/respondentDefault.png', 'testing', 'testing', '09123456789', 'test address', '2022-07-10', 'test', 'test', '2022-07-06 20:08:26', '2022-07-06 20:08:26'),
(7, 3, '3660831013', 'brgy', 'approved', 'Calasiao', 'Malabago', '/storage/complainant_images/complainantDefault.jpg', 'test', 'Bonganay', '09388440860', 'bagong silang', '/storage/respondent_images/1657166930gojo.jpg', 'testing', 'testing', '09123456789', 'test address', '2022-07-10', 'test', 'test', '2022-07-06 20:08:50', '2022-07-06 20:19:28'),
(8, 6, '4172722906', 'provincial', 'passed_to_provincial', 'Calasiao', 'Malabago', '/storage/complainant_images/1657168507gojo.jpg', 'Michel jou', 'Bonganay', '09388440860', 'bagong silang', '/storage/respondent_images/respondentDefault.png', 'testing', 'testing', '09123456789', 'test address', '2022-07-12', 'test', 'test', '2022-07-06 20:35:07', '2022-07-06 20:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_02_112837_create_permission_tables', 1),
(6, '2022_06_21_060152_create_blotters_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(5, 'App\\Models\\User', 8),
(6, 'App\\Models\\User', 9),
(7, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 6),
(5, 'App\\Models\\User', 6),
(5, 'App\\Models\\User', 7),
(6, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Malabago', 'web', '2022-07-06 02:01:50', '2022-07-06 02:01:50'),
(2, 'Nalsiao', 'web', '2022-07-06 02:01:57', '2022-07-06 02:01:57'),
(3, 'San miguel', 'web', '2022-07-06 02:02:10', '2022-07-06 02:02:10'),
(4, 'Calasiao', 'web', '2022-07-06 02:03:16', '2022-07-06 02:03:16'),
(5, 'testbrgy', 'web', '2022-07-06 02:51:48', '2022-07-06 02:51:48'),
(6, 'testbrgy2', 'web', '2022-07-06 02:51:52', '2022-07-06 02:51:52'),
(7, 'testmunicipal', 'web', '2022-07-06 02:52:37', '2022-07-06 02:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-07-06 01:53:14', '2022-07-06 01:53:14'),
(2, 'brgy', 'web', '2022-07-06 01:53:14', '2022-07-06 01:53:14'),
(3, 'user', 'web', '2022-07-06 01:53:14', '2022-07-06 01:53:14'),
(4, 'Calasiao', 'web', '2022-07-06 02:01:14', '2022-07-06 02:01:14'),
(5, 'municipal', 'web', '2022-07-06 02:01:24', '2022-07-06 02:01:24'),
(6, 'testmunicipal', 'web', '2022-07-06 02:51:41', '2022-07-06 02:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 4),
(2, 2),
(2, 4),
(3, 2),
(3, 4),
(4, 5),
(5, 2),
(5, 6),
(6, 2),
(6, 6),
(7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '2022-07-06 01:53:14', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2022-07-06 01:53:14', '2022-07-06 01:53:14'),
(2, 'testing', 'mikel062795@gmail.com', '2022-07-06 02:00:18', '$2y$10$/NxzYrPS5IIPEh6uxOpblO3uljVcB8xEMMRpq/U7AfYxeNs1QxD4u', NULL, '2022-07-06 02:00:03', '2022-07-06 02:00:18'),
(3, 'Malabago', 'Malabago@Malabago.com', '2022-07-06 10:05:01', '$2y$10$4kiMtlHZScJOqNB7ErQBGeJi3GueKJbuvMytBfjRktQUBgAYzBJW.', NULL, '2022-07-06 02:04:50', '2022-07-06 02:04:50'),
(4, 'Nalsiao', 'Nalsiao@Nalsiao.com', '2022-07-06 10:13:12', '$2y$10$UhjoVDwmJJnu1MOvCGAJpOApPcVEw.xQbyXnIFSHiFvi3qgboz/rK', NULL, '2022-07-06 02:10:54', '2022-07-06 02:10:54'),
(5, 'San miguel', 'sanmiguel@sanmiguel.com', '2022-07-06 10:15:47', '$2y$10$pYZCmnuymVZVhdIN7L88fOVQlBbNyP34J7b//xTrVm12.kVLfgowa', NULL, '2022-07-06 02:13:47', '2022-07-06 02:13:47'),
(6, 'Calasiao', 'calasiao@municipal.com', '2022-07-06 10:15:51', '$2y$10$sVNdWF8kSWU9LR3EjfLBmuSMFYecBAYNtDMf7Ihm0p0.g.mDUCLTi', NULL, '2022-07-06 02:14:58', '2022-07-06 02:14:58'),
(7, 'testmunicipal', 'municipal2@municipal2.com', NULL, '$2y$10$BrxrVmYIVTnFuamB4cAf2etAowZRscbFt5E67vLAm0PMg81.EYy6C', NULL, '2022-07-06 02:54:36', '2022-07-06 02:54:36'),
(8, 'testbrgy', 'testbrgy@testbrgy.com', NULL, '$2y$10$fBz40iGFanxLHQ7gZffDu.ERkzaDD0WcriYsjYanNRK.SFGa.4EFy', NULL, '2022-07-06 02:54:59', '2022-07-06 02:54:59'),
(9, 'testbrgy2', 'testbrgy2@testbrgy2.com', NULL, '$2y$10$jsK6ag2zLtzkKQkP9iZhA.mXTjBeN.LWXhNIoN0bVktQXi3tDkpsi', NULL, '2022-07-06 02:55:17', '2022-07-06 02:55:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blotters`
--
ALTER TABLE `blotters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blotters_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `blotters`
--
ALTER TABLE `blotters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blotters`
--
ALTER TABLE `blotters`
  ADD CONSTRAINT `blotters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
