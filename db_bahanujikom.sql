-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 01:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bahanujikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_barang`
--

CREATE TABLE `dt_barang` (
  `id` int(10) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kategori_id` int(5) DEFAULT NULL,
  `harga_satuan` float DEFAULT NULL,
  `harga_jual` float DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_produksi` date DEFAULT NULL,
  `tgl_expired` date DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_us` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_us` int(5) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_barang`
--

INSERT INTO `dt_barang` (`id`, `kode`, `nama`, `kategori_id`, `harga_satuan`, `harga_jual`, `img`, `deskripsi`, `tgl_produksi`, `tgl_expired`, `satuan`, `status`, `created_us`, `created_at`, `updated_us`, `updated_at`) VALUES
(1, '00001', 'Teh Botol Sosro', 1, 4000, 6000, '20240116225015-65a6a5b79345a.jpg', 'test', '2024-01-01', '2025-01-01', 'botol', 1, 1, '2024-01-16 22:50:15', 1, '2024-01-17 10:12:34'),
(2, '00002', 'Teh Pucuk', 1, 3000, 4000, '20240117102103-65a7479f832c0.jpg', NULL, '2024-01-01', '2025-01-01', 'botol', 1, 1, '2024-01-17 10:12:34', 1, '2024-01-17 10:21:03'),
(3, '00003', 'Indomie Goreng Rasa Ayam Bawang', 2, 1500, 2500, '20240117161732-65a79b2c274e0.jpg', 'oke', '2023-01-17', '2024-01-17', 'bungkus', 1, 1, '2024-01-17 16:17:32', 1, '2024-01-17 16:55:19');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `tm_kategoribarang`
--

CREATE TABLE `tm_kategoribarang` (
  `id` int(5) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_kategoribarang`
--

INSERT INTO `tm_kategoribarang` (`id`, `nama`) VALUES
(1, 'Minuman'),
(2, 'Jajanan dan Makanan Ringan'),
(3, 'Peralatan Mandi dan Mencuci'),
(4, 'Sembako');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `isrole` tinyint(4) DEFAULT 1,
  `namerole` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `isrole`, `namerole`) VALUES
(1, 'Luis Tarihoran M.Kom.', 'malik.pudjiastuti@example.org', '2024-01-16 05:27:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SmqqhDZIKWbjkpWqI5Nt3NsS5IzZjoku8HDLVyrI2qxGPcJz2FdQYc5xPn34', '2024-01-16 05:27:46', '2024-01-16 05:27:46', 1, 'administrator'),
(2, 'Humaira Usamah', 'cakrabuana.dongoran@example.com', '2024-01-16 05:27:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LiJHSjgvhYAnEc5lxnE1WtnEXiL8uEgvqZkD0fLyJDX5BMRXL4QiPY5nUGI2', '2024-01-16 05:27:46', '2024-01-16 05:27:46', 2, 'operator'),
(3, 'Jamil Nashiruddin', 'unarpati@example.org', '2024-01-16 05:27:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4hMdRwZIJ8', '2024-01-16 05:27:46', '2024-01-16 05:27:46', 2, 'operator'),
(4, 'Raharja Cawisadi Manullang M.Kom.', 'rika.fujiati@example.net', '2024-01-16 05:27:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'naTX4GIDMd', '2024-01-16 05:27:46', '2024-01-16 05:27:46', 2, 'operator'),
(5, 'Eka Silvia Farida', 'iswahyudi.candra@example.org', '2024-01-16 05:27:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ehx7xsJBrH', '2024-01-16 05:27:46', '2024-01-16 05:27:46', 2, 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_barang`
--
ALTER TABLE `dt_barang`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tm_kategoribarang`
--
ALTER TABLE `tm_kategoribarang`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `dt_barang`
--
ALTER TABLE `dt_barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_kategoribarang`
--
ALTER TABLE `tm_kategoribarang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
