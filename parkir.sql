-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2023 at 01:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir_adam`
--

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE `blok` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(400) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'G6H', 'hh', '2020-08-21 00:21:49', '2020-08-21 00:21:49'),
(7, 'H9', 'ok ok', '2020-08-20 16:49:28', '2020-08-20 16:49:28'),
(8, 'bru', 'hoi x', '2020-08-20 17:14:58', '2020-08-20 17:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `lantai`
--

CREATE TABLE `lantai` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(400) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lantai`
--

INSERT INTO `lantai` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'xxx', 'xxx cccz', '2020-08-25 15:26:32', '2020-08-25 15:26:32'),
(3, 'dd', '...', '2020-08-22 02:02:01', '2020-08-22 02:02:01'),
(4, 'T9', 'fg', '2020-08-22 02:03:11', '2020-08-22 02:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_parkir`
--

CREATE TABLE `lokasi_parkir` (
  `id` int(11) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `id_blok` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_parkir`
--

INSERT INTO `lokasi_parkir` (`id`, `id_lantai`, `id_blok`, `nomor`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 7, 10, 0, '2020-08-25 14:58:22', '2020-09-06 08:08:56'),
(5, 3, 2, 78, 0, '2020-08-25 15:47:42', '2020-09-02 05:05:35'),
(6, 1, 7, 87, 0, '2020-08-25 17:00:20', '2020-09-02 11:48:26'),
(10, 1, 2, 68, 0, '2020-08-26 02:40:16', '2020-09-02 12:20:52'),
(11, 1, 7, 1, 0, '2020-09-06 04:16:06', '2020-12-13 07:05:15'),
(12, 3, 7, 3, 0, '2020-11-12 14:05:40', '2020-11-12 14:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `akses` tinyint(1) DEFAULT NULL COMMENT '0 master, 1 admin, 2 pimpinan',
  `nama` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `tlp` varchar(14) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `akses`, `nama`, `mail`, `tlp`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'indrace', '123', 0, 'indra cahyae edytya', 'inc@gm.com', '0987 777', NULL, '2020-08-25 05:29:13', '2020-11-15 13:41:56'),
(3, 'biand', '333', 2, 'biand ayuuu', 'biand@gm.com', '777', NULL, '2020-08-25 04:32:13', '2020-08-25 04:32:13'),
(4, 'dwi', '989', 1, 'oki ayu', 'xxx@x.co', '9789', NULL, '2020-08-23 09:54:39', '2020-08-25 15:29:06'),
(5, 'tami', '555', 1, 'iMac', 'biand@gm.com', '567', NULL, '2020-08-25 04:41:01', '2020-08-25 04:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `batas_jam` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `keterangan` varchar(400) DEFAULT '-',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `batas_jam`, `biaya`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 8, 15000, '-', '2020-09-02 05:11:09', '2020-09-02 05:11:09'),
(5, 12, 20000, '-', '2020-09-02 05:11:48', '2020-09-02 05:11:48'),
(6, 4, 10000, '-', '2020-09-02 05:10:51', '2020-09-02 05:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_parkir`
--

CREATE TABLE `transaksi_parkir` (
  `id` int(11) NOT NULL,
  `nota` varchar(200) DEFAULT NULL,
  `plat_nomor` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0 masuk, 1 keluar, 2 paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `durasi` time DEFAULT NULL,
  `id_tarif` int(11) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `waktu_masuk` timestamp NULL DEFAULT NULL,
  `waktu_keluar` timestamp NULL DEFAULT NULL,
  `petugas_masuk` int(11) DEFAULT NULL,
  `petugas_keluar` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_parkir`
--

INSERT INTO `transaksi_parkir` (`id`, `nota`, `plat_nomor`, `status`, `created_at`, `updated_at`, `durasi`, `id_tarif`, `id_lokasi`, `waktu_masuk`, `waktu_keluar`, `petugas_masuk`, `petugas_keluar`, `biaya`) VALUES
(22, 'S 3333 SS/0209/1156', 'S 3333 SS', 2, '2020-09-02 04:56:22', '2020-09-02 11:48:26', '06:44:00', 1, 6, '2020-09-02 04:56:22', '2020-09-02 11:40:50', 1, 1, 15000),
(23, 'A 2345 DD/0209/1849', 'A 2345 DD', 2, '2020-09-02 11:49:03', '2020-09-02 11:54:39', '00:01:00', 6, 1, '2020-09-01 11:49:03', '2020-09-02 11:50:41', 1, 1, 10000),
(28, 'PP 8787 GG/0209/1914', 'PP 8787 GG', 2, '2020-09-02 12:14:34', '2020-09-02 12:18:32', '00:00:00', NULL, 1, '2020-09-01 02:14:34', '2020-09-02 12:15:51', 1, 1, 250000),
(29, 'AA 4356 YY/0209/1917', 'AA 4356 YY', 2, '2020-09-02 12:17:54', '2020-09-02 12:20:52', '10:03:00', 5, 10, '2020-09-02 02:17:54', '2020-09-02 12:20:41', 1, 1, 20000),
(30, 'PP 87878 GG/0209/1921', 'PP 87878 GG', 2, '2020-09-02 12:21:27', '2020-09-02 12:23:13', '35:00:00', NULL, 1, '2020-09-01 01:21:27', '2020-09-02 12:21:57', 1, 1, 250000),
(31, 'w 6799 cx/0609/1130', 'w 6799 cx', 2, '2020-09-06 04:30:43', '2020-09-06 04:34:40', '72:04:00', NULL, 11, '2020-09-03 04:30:43', '2020-09-06 04:34:25', 1, 1, 630000),
(32, 'L 123 JJ/0609/1131', 'L 123 JJ', 2, '2020-09-06 04:31:48', '2020-09-06 08:08:56', '03:37:00', 6, 1, '2020-09-06 04:31:48', '2020-09-06 08:08:54', 1, 1, 10000),
(33, 'S 3333 SS/0609/1404', 'S 3333 SS', 2, '2020-09-06 07:04:14', '2020-09-06 07:04:32', '00:00:00', 6, 11, '2020-09-06 07:04:14', '2020-09-06 07:04:30', 1, 1, 10000),
(34, 'L1234PP/1211/2118', 'L1234PP', 2, '2020-11-11 14:18:24', '2020-11-12 14:37:06', '24:03:00', NULL, 11, '2020-11-11 14:18:24', '2020-11-12 14:21:54', 1, 1, 150000),
(35, 'W0987K/1211/2119', 'W0987K', 2, '2020-11-12 14:19:55', '2020-11-12 14:41:45', '00:22:00', 6, 12, '2020-11-12 14:19:55', '2020-11-12 14:41:43', 1, 1, 10000),
(36, 'U8888T/1211/2144', 'U8888T', 2, '2020-11-12 14:44:16', '2020-11-12 14:47:04', '00:02:00', 6, 11, '2020-11-12 14:44:16', '2020-11-12 14:46:34', 1, 1, 10000),
(37, 'G4567K/1211/2148', 'G4567K', 2, '2020-11-12 14:48:11', '2020-11-12 14:58:32', '00:10:00', 6, 11, '2020-11-12 14:48:11', '2020-11-12 14:58:16', 1, 1, 10000),
(39, 'GG4344W/1611/1818', 'GG4344W', 0, '2020-11-16 11:18:54', '2020-11-16 11:18:54', NULL, NULL, 11, '2020-11-16 11:18:54', NULL, 1, NULL, NULL),
(40, 'w125xx/1312/1401', 'w125xx', 2, '2020-12-13 07:01:57', '2020-12-13 07:05:15', '00:03:00', 6, 11, '2020-12-13 07:01:57', '2020-12-13 07:04:44', 1, 1, 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_parkir`
--
ALTER TABLE `lokasi_parkir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lokasi_to_lantai` (`id_lantai`),
  ADD KEY `lokasi_to_blok` (`id_blok`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_parkir`
--
ALTER TABLE `transaksi_parkir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_to_tarif` (`id_tarif`),
  ADD KEY `transaksi_to_lokasi` (`id_lokasi`),
  ADD KEY `transaksi_to_petugasmasuk` (`petugas_masuk`),
  ADD KEY `transaksi_to_petugaskeluar` (`petugas_keluar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokasi_parkir`
--
ALTER TABLE `lokasi_parkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi_parkir`
--
ALTER TABLE `transaksi_parkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lokasi_parkir`
--
ALTER TABLE `lokasi_parkir`
  ADD CONSTRAINT `lokasi_to_blok` FOREIGN KEY (`id_blok`) REFERENCES `blok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lokasi_to_lantai` FOREIGN KEY (`id_lantai`) REFERENCES `lantai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_parkir`
--
ALTER TABLE `transaksi_parkir`
  ADD CONSTRAINT `transaksi_to_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_parkir` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_to_petugaskeluar` FOREIGN KEY (`petugas_keluar`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_to_petugasmasuk` FOREIGN KEY (`petugas_masuk`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_to_tarif` FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
