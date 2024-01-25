-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 12:28 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_barang`
--
ALTER TABLE `dt_barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_barang`
--
ALTER TABLE `dt_barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
