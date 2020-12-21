-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 08:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_metadata_value`
--

CREATE TABLE `catalog_metadata_value` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `metadata_id` bigint(20) UNSIGNED NOT NULL,
  `metadata_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DIPLOMA PROGRAMME PRACTICE REPORT', 'Koleksi Laporan Praktek Kerja Program Diploma', NULL, NULL, NULL),
(2, 'UNDERGRADUATE THESES', 'Koleksi Skripsi Program Sarjana', NULL, NULL, NULL),
(3, 'THESES', 'Koleksi Tesis Program Magister', NULL, NULL, NULL),
(4, 'DISSERTATION', 'Koleksi Disertasi Program Doktoraa', NULL, NULL, NULL),
(5, 'e-Journa', 'Koleksi Penelitian yang tidak dipublikasikan pada jurnal ilmiah', NULL, NULL, NULL),
(6, 'e-Books', 'e-book terbitan STMA Trisakti', NULL, NULL, NULL),
(7, 'COMMUNITY SERVICES REPORT(LPM)', 'Laporan Hasil Pengabdian Pada Masyarakat', NULL, NULL, NULL),
(8, 'STUDENT CREATIVITY PROGRAMME REPORT', 'gram Kreatifitas Mahasiswa', NULL, NULL, NULL),
(9, 'INSURANCE NEWS', 'Berita seputar asuransi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `katalog_metadata`
--

CREATE TABLE `katalog_metadata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `metadata_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

CREATE TABLE `metadata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metadata`
--

INSERT INTO `metadata` (`id`, `key`, `value`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'title', 'Title', 'text', NULL, NULL, NULL),
(2, 'abstrak', 'Abstrak', 'textarea', NULL, NULL, NULL),
(3, 'url', 'URL', 'text', NULL, NULL, NULL),
(4, 'date', 'Date', 'text', NULL, NULL, NULL),
(5, 'author', 'Author', 'text', NULL, NULL, NULL);

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
(4, '2019_10_13_045354_create_roles_table', 1),
(5, '2019_10_13_051433_create_user_roles_table', 1),
(6, '2019_10_13_054419_add_username_level_on_table_users', 1),
(7, '2020_09_08_025016_create_categories_table', 1),
(8, '2020_09_08_040136_create_metadata_table', 1),
(9, '2020_09_08_054849_katalog_metadata_tables', 1),
(10, '2020_09_08_083048_create_catalogs_table', 1),
(11, '2020_09_08_124437_add_type_input_to_metadata_table', 1),
(12, '2020_09_08_130902_create_catalog_metadata_value_table', 1),
(13, '2020_09_09_095556_add_status_on_catalogs_table', 1);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', 'Role Administrator', NULL, NULL, NULL),
(2, 'Dosen', 'Role Dosen', NULL, NULL, NULL),
(3, 'Mahasiswa', 'Role Mahasiswa', NULL, NULL, NULL),
(4, 'User', 'Role User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `username`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', 1, 'admin@dwijonarko.my.id', '2020-09-08 08:08:40', '$2y$10$tBN4cYUfarsvR6Q1JjoF3e57WN4c9AYw7/01Sgc7xDhjwx52jHBeq', NULL, NULL, NULL),
(2, 'Dosen', 'dosen', 2, 'dosen@dwijonarko.my.id', '2020-09-08 08:08:40', '$2y$10$WWRao74NAfoBbenfze1kpu6Z7YbVklFM5JoPLwD4WgONpefYkgIh2', NULL, NULL, NULL),
(3, 'Mahasiswa', 'mahasiswa', 3, 'mahasiswa@dwijonarko.my.id', '2020-09-08 08:08:40', '$2y$10$emYbUdQtNvfVxsc5nx1lC.F2tuEdChafe0RrsIWFkZ2L0n3vyVJp2', NULL, NULL, NULL),
(4, 'User', 'registered', 4, 'user@dwijonarko.my.id', '2020-09-08 08:08:40', '$2y$10$oFGZFAocie2CkcEixuc0au4NVCVTynp4AuKrfhzNad/prKVFEQBem', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalogs_user_id_foreign` (`user_id`),
  ADD KEY `catalogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `catalog_metadata_value`
--
ALTER TABLE `catalog_metadata_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_metadata_value_catalog_id_foreign` (`catalog_id`),
  ADD KEY `catalog_metadata_value_metadata_id_foreign` (`metadata_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katalog_metadata`
--
ALTER TABLE `katalog_metadata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `katalog_metadata_category_id_foreign` (`category_id`),
  ADD KEY `katalog_metadata_metadata_id_foreign` (`metadata_id`);

--
-- Indexes for table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalog_metadata_value`
--
ALTER TABLE `catalog_metadata_value`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `katalog_metadata`
--
ALTER TABLE `katalog_metadata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD CONSTRAINT `catalogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `catalogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `catalog_metadata_value`
--
ALTER TABLE `catalog_metadata_value`
  ADD CONSTRAINT `catalog_metadata_value_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  ADD CONSTRAINT `catalog_metadata_value_metadata_id_foreign` FOREIGN KEY (`metadata_id`) REFERENCES `metadata` (`id`);

--
-- Constraints for table `katalog_metadata`
--
ALTER TABLE `katalog_metadata`
  ADD CONSTRAINT `katalog_metadata_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `katalog_metadata_metadata_id_foreign` FOREIGN KEY (`metadata_id`) REFERENCES `metadata` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
