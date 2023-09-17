-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2023 at 03:15 PM
-- Server version: 5.7.33
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flc_dev_system_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kas_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `signed_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id`, `kas_id`, `name`, `description`, `amount`, `date`, `signed_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Anggaran Mei 2017', 'Anggaran Mei 2017', 8500000, '2017-05-01', 2, '2023-09-17 08:02:20', '2023-09-17 08:02:20');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kas_masjid`
--

CREATE TABLE `kas_masjid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kas_masjid`
--

INSERT INTO `kas_masjid` (`id`, `title`, `description`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Kas Mushola Mei 2017', 'Kas Mei 2017', 3870000, '2017-06-05', '2023-09-17 07:46:39', '2023-09-17 07:50:22'),
(2, 'Selama Puasa', 'Kas Selama Puasa', 3910000, '2017-06-01', '2023-09-17 07:47:48', '2023-09-17 07:47:48'),
(3, 'Jakat Mal', 'Jakat Mal', 840000, '2017-06-07', '2023-09-17 07:48:42', '2023-09-17 07:48:42'),
(4, 'Infaq', 'Infaq', 1000000, '2017-06-15', '2023-09-17 07:49:12', '2023-09-17 07:49:12'),
(5, 'Kotak Amal Halal Bihalal', 'Kotak Amal Halal Bihalal', 295000, '2017-06-22', '2023-09-17 07:50:00', '2023-09-17 07:50:00'),
(6, 'Kas Juli 2017', 'Sumbangan Bu Maman', 50000, '2017-06-08', '2023-09-17 07:51:28', '2023-09-17 07:51:28'),
(7, 'Kas Juli 2017', 'Sumbangan Bu Sartono', 50000, '2017-06-23', '2023-09-17 07:52:15', '2023-09-17 07:52:15'),
(8, 'Kas Juli 2017', 'Sumbangan Jemaah', 412000, '2017-06-28', '2023-09-17 07:52:54', '2023-09-17 07:52:54'),
(9, 'Kas Agustus 2017', 'Sumbangan Bu Anis', 100000, '2017-08-22', '2023-09-17 07:53:54', '2023-09-17 07:53:54'),
(10, 'Kas Agustus 2017', 'Sumbangan Jemaah', 517000, '2023-07-01', '2023-09-17 07:54:36', '2023-09-17 07:54:50'),
(11, 'Kas September 2017', 'Sumbangan Jemaah', 786000, '2017-09-25', '2023-09-17 07:55:32', '2023-09-17 07:55:32'),
(12, 'Kas September 2017', 'Sumbangan Pak Hasan Basri', 120000, '2017-09-13', '2023-09-17 07:56:19', '2023-09-17 07:56:19'),
(13, 'Kas Oktober 2017', 'Sumbangan Bu Anis', 100000, '2017-10-18', '2023-09-17 07:57:04', '2023-09-17 07:57:04'),
(14, 'Kas Oktober 2017', 'Sumbangan Bu Mujimin', 150000, '2017-10-28', '2023-09-17 07:57:45', '2023-09-17 07:57:45'),
(15, 'Kas Oktober 2017', 'Sumbanan Ust. Latif', 350000, '2017-10-31', '2023-09-17 07:58:35', '2023-09-17 07:58:35'),
(16, 'Kas November 2017', 'Sumbangan Anis Hartono', 200000, '2017-11-01', '2023-09-17 07:59:21', '2023-09-17 07:59:21'),
(17, 'Kas November 2017', 'Sumbangan Ust. Muharom', 345000, '2017-11-17', '2023-09-17 08:00:18', '2023-09-17 08:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembangunan_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `pembangunan_id`, `code`, `name`, `description`, `unit`, `unit_price`, `amount`, `total`, `order_date`, `created_at`, `updated_at`) VALUES
(1, 2, 'BRG6606', 'Galian', 'Galian', 'M3', 85000, 28, 2380000, '2023-07-01', '2023-09-17 08:05:21', '2023-09-17 08:06:12'),
(2, 2, 'BRG1293', 'Pek Beton Pile Cap 120 x 120', 'Pek Beton Pile Cap 120 x 120', 'M3', 310000, 6, 1860000, '2017-05-01', '2023-09-17 08:07:16', '2023-09-17 08:07:16'),
(3, 2, 'BRG6252', 'Pek Beton Sloof 20 x 30', 'Pek Beton Sloof 20 x 30', 'M3', 310000, 5, 1550000, '2023-09-17', '2023-09-17 08:08:14', '2023-09-17 08:08:14'),
(4, 2, 'BRG3665', 'Pek Rabat Beton', 'Pek Rabat Beton', 'M3', 14000, 4, 56000, '2023-09-17', '2023-09-17 08:09:04', '2023-09-17 08:09:04'),
(5, 2, 'BRG3705', 'Pas Batu Kali', 'Pas Batu Kali', 'M3', 650000, 1, 650000, '2023-09-17', '2023-09-17 08:09:45', '2023-09-17 08:09:45'),
(6, 2, 'BRG8172', 'Pek Balon Beton', 'Pek Balon Beton', 'M3', 425000, 13, 5525000, '2023-09-12', '2023-09-17 08:10:24', '2023-09-17 08:10:24'),
(7, 2, 'BRG2407', 'Konstruksi Atap Baja', 'Konstruksi Atap Baja', 'M3', 360000, 1, 360000, '2023-08-29', '2023-09-17 08:11:05', '2023-09-17 08:11:05'),
(8, 2, 'BRG2757', 'Pek Kolom', 'Pek Kolom', 'M3', 425000, 14, 5950000, '2023-08-08', '2023-09-17 08:12:02', '2023-09-17 08:12:02'),
(9, 2, 'BRG9092', 'Wiremesh rabat beton', 'Wiremesh rabat beton', 'M3', 140000, 4, 560000, '2023-08-29', '2023-09-17 08:13:18', '2023-09-17 08:13:18');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_22_155738_create_kas_masjid_table', 1),
(6, '2023_07_22_155756_create_anggaran_table', 1),
(7, '2023_07_22_155824_create_pembangunan_table', 1),
(8, '2023_07_22_155834_create_material_table', 1),
(9, '2023_07_22_155847_create_pengeluaran_table', 1),
(10, '2023_07_22_161741_add_field_signed_by_to_anggaran_table', 1),
(11, '2023_07_24_062505_create_user_login_logs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembangunan`
--

CREATE TABLE `pembangunan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggaran_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembangunan`
--

INSERT INTO `pembangunan` (`id`, `anggaran_id`, `name`, `description`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(2, 1, 'Pembangunan Teras Masjid', 'Pembangunan Teras Masjid', 4000000, '2017-05-17', '2023-09-17 08:04:26', '2023-09-17 08:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `type`, `total`, `date`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Dana Pembangunan', 4000000, '2017-05-17', 1, '2023-09-17 08:04:26', '2023-09-17 08:04:26'),
(2, 'Belanja Material', 2380000, '2017-05-09', 1, '2023-09-17 08:05:21', '2023-09-17 08:05:21'),
(3, 'Belanja Material', 1860000, '2017-05-01', 1, '2023-09-17 08:07:16', '2023-09-17 08:07:16'),
(4, 'Belanja Material', 1550000, '2023-09-17', 1, '2023-09-17 08:08:14', '2023-09-17 08:08:14'),
(5, 'Belanja Material', 56000, '2023-09-17', 1, '2023-09-17 08:09:04', '2023-09-17 08:09:04'),
(6, 'Belanja Material', 650000, '2023-09-17', 1, '2023-09-17 08:09:45', '2023-09-17 08:09:45'),
(7, 'Belanja Material', 5525000, '2023-09-12', 1, '2023-09-17 08:10:25', '2023-09-17 08:10:25'),
(8, 'Belanja Material', 360000, '2023-08-29', 1, '2023-09-17 08:11:05', '2023-09-17 08:11:05'),
(9, 'Belanja Material', 5950000, '2023-08-08', 1, '2023-09-17 08:12:02', '2023-09-17 08:12:02'),
(10, 'Belanja Material', 560000, '2023-08-29', 1, '2023-09-17 08:13:18', '2023-09-17 08:13:18');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', '$2y$10$fPRoxEyn..PArUVsm4wlFex3rQj4NJMZfa1ebNDdiUGikoWzmy9c6', 'administrator', NULL, '2023-09-17 07:45:04', '2023-09-17 07:45:04'),
(2, 'Ketua', 'ketua@mail.com', '$2y$10$8wwcqQ5DFNTJ/wVehsf2h.Rpb276MHrNCcxFHC1PA3DQv7wmpHkiC', 'ketua', NULL, '2023-09-17 07:45:04', '2023-09-17 07:45:04'),
(3, 'Bendahara', 'bendahara@mail.com', '$2y$10$zIQkZidTWR0QOfSmceKmHeWA/iOcaSpHIKf380jzaMgGPbFRkjKz.', 'bendahara', NULL, '2023-09-17 07:45:04', '2023-09-17 07:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_logs`
--

CREATE TABLE `user_login_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_login_logs`
--

INSERT INTO `user_login_logs` (`id`, `user_id`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', '2023-09-17 07:45:14', '2023-09-17 07:45:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggaran_kas_id_foreign` (`kas_id`),
  ADD KEY `anggaran_signed_by_foreign` (`signed_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_pembangunan_id_foreign` (`pembangunan_id`);

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
-- Indexes for table `pembangunan`
--
ALTER TABLE `pembangunan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembangunan_anggaran_id_foreign` (`anggaran_id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengeluaran_created_by_foreign` (`created_by`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_login_logs`
--
ALTER TABLE `user_login_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_login_logs_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembangunan`
--
ALTER TABLE `pembangunan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_login_logs`
--
ALTER TABLE `user_login_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD CONSTRAINT `anggaran_kas_id_foreign` FOREIGN KEY (`kas_id`) REFERENCES `kas_masjid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggaran_signed_by_foreign` FOREIGN KEY (`signed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_pembangunan_id_foreign` FOREIGN KEY (`pembangunan_id`) REFERENCES `pembangunan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembangunan`
--
ALTER TABLE `pembangunan`
  ADD CONSTRAINT `pembangunan_anggaran_id_foreign` FOREIGN KEY (`anggaran_id`) REFERENCES `anggaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_login_logs`
--
ALTER TABLE `user_login_logs`
  ADD CONSTRAINT `user_login_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
