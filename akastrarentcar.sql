-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 06:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akastrarentcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(55) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `username_admin` varchar(30) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id_admin`, `nama_admin`, `email_admin`, `username_admin`, `password_admin`) VALUES
(4, 'Daffa Almaas', 'almaasd393@gmail.com', 'dalmaas123_', '$2y$10$zRxsZimGSoQ27//S3OVel.j6d8.32P7TBWKCpeDP.T/t6vbZz4VQW');

-- --------------------------------------------------------

--
-- Table structure for table `list_kendaraan_3_tahun`
--

CREATE TABLE `list_kendaraan_3_tahun` (
  `id_kendaraan` int(11) NOT NULL,
  `merk_mobil` varchar(100) NOT NULL,
  `jenis_mobil` varchar(100) NOT NULL,
  `gambar_mobil` varchar(255) DEFAULT NULL,
  `harga_sewa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bahan_bakar` varchar(50) DEFAULT NULL,
  `transmisi` varchar(50) DEFAULT NULL,
  `kapasitas_mesin` int(11) DEFAULT NULL,
  `jumlah_bangku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_kendaraan_3_tahun`
--

INSERT INTO `list_kendaraan_3_tahun` (`id_kendaraan`, `merk_mobil`, `jenis_mobil`, `gambar_mobil`, `harga_sewa`, `created_at`, `updated_at`, `bahan_bakar`, `transmisi`, `kapasitas_mesin`, `jumlah_bangku`) VALUES
(21, 'MITSUBISHI PAJERO DAKAR ULTIMATE 4X4 AT BRAND NEW', 'SUV', 'uploads/1736223210_1 - 6.jpg', '30.688.000', '2025-01-07 04:13:30', '2025-01-07 04:14:25', 'diesel', 'otomatis', 2442, 8),
(22, 'MITSUBISHI PAJERO DAKAR ULTIMATE 4X2 AT BRAND NEW', 'SUV', 'uploads/1736223243_1 - 6.jpg', '28.244.000', '2025-01-07 04:14:03', '2025-01-07 04:14:32', 'bensin', 'otomatis', 2442, 8),
(23, 'MITSUBISHI PAJERO DAKAR SUNROOF 4X2 AT BRAND NEW', 'SUV', 'uploads/1736223306_1 - 6.jpg', '26.148.000', '2025-01-07 04:15:06', '2025-01-07 04:15:06', 'bensin', 'otomatis', 2442, 8),
(24, 'MITSUBISHI PAJERO EXCEED 4X2 AT BRAND NEW', 'SUV', 'uploads/1736223508_1 - 6.jpg', '23.412.000', '2025-01-07 04:18:28', '2025-01-07 04:18:28', 'diesel', 'otomatis', 2477, 8),
(25, 'MITSUBISHI PAJERO EXCEED 4X2 MT BRAND NEW', 'SUV', 'uploads/1736223575_1 - 6.jpg', '22.804.000', '2025-01-07 04:19:35', '2025-01-07 04:19:35', 'diesel', 'manual', 2477, 8),
(26, 'MITSUBISHI PAJERO GLX 4X4 MT BRAND NEW', 'SUV', 'uploads/1736223655_1 - 6.jpg', '23.844.000', '2025-01-07 04:20:55', '2025-01-07 04:20:55', 'diesel', 'otomatis', 2477, 8);

-- --------------------------------------------------------

--
-- Table structure for table `list_kendaraan_4_tahun`
--

CREATE TABLE `list_kendaraan_4_tahun` (
  `id_kendaraan` int(11) NOT NULL,
  `merk_mobil` varchar(100) NOT NULL,
  `jenis_mobil` varchar(100) NOT NULL,
  `gambar_mobil` varchar(255) DEFAULT NULL,
  `harga_sewa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bahan_bakar` varchar(50) DEFAULT NULL,
  `transmisi` varchar(50) DEFAULT NULL,
  `kapasitas_mesin` int(11) DEFAULT NULL,
  `jumlah_bangku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_kendaraan_4_tahun`
--

INSERT INTO `list_kendaraan_4_tahun` (`id_kendaraan`, `merk_mobil`, `jenis_mobil`, `gambar_mobil`, `harga_sewa`, `created_at`, `updated_at`, `bahan_bakar`, `transmisi`, `kapasitas_mesin`, `jumlah_bangku`) VALUES
(12, 'MITSUBISHI PAJERO DAKAR ULTIMATE 4X4 AT BRAND NEW', 'SUV', 'uploads/1736223809_1 - 6.jpg', '28.386.400', '2025-01-07 04:23:29', '2025-01-07 04:23:29', 'diesel', 'otomatis', 2442, 8),
(13, 'MITSUBISHI PAJERO DAKAR ULTIMATE 4X2 AT BRAND NEW', 'SUV', 'uploads/1736223906_1 - 6.jpg', '26.125.700', '2025-01-07 04:25:06', '2025-01-07 04:25:06', 'bensin', 'otomatis', 2442, 8);

-- --------------------------------------------------------

--
-- Table structure for table `list_kendaraan_bulanan`
--

CREATE TABLE `list_kendaraan_bulanan` (
  `id_kendaraan` int(11) NOT NULL,
  `merk_mobil` varchar(100) NOT NULL,
  `jenis_mobil` varchar(100) NOT NULL,
  `gambar_mobil` varchar(255) DEFAULT NULL,
  `harga_sewa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bahan_bakar` varchar(50) DEFAULT NULL,
  `transmisi` varchar(50) DEFAULT NULL,
  `kapasitas_mesin` int(11) DEFAULT NULL,
  `jumlah_bangku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_kendaraan_bulanan`
--

INSERT INTO `list_kendaraan_bulanan` (`id_kendaraan`, `merk_mobil`, `jenis_mobil`, `gambar_mobil`, `harga_sewa`, `created_at`, `updated_at`, `bahan_bakar`, `transmisi`, `kapasitas_mesin`, `jumlah_bangku`) VALUES
(11, 'Toyota Avanza A/T Tahun 2023', 'MPV', 'uploads/1736224099_1-avanza-purplish-silver.png', '7.750.000', '2025-01-07 04:28:19', '2025-01-07 04:28:40', 'bensin', 'otomatis', 1496, 8),
(12, 'Toyota Avanza M/T Tahun 2021/2022', 'MPV', 'uploads/1736224223_avanza2022.png', '6.750.000', '2025-01-07 04:30:23', '2025-01-07 04:30:23', 'bensin', 'manual', 1496, 8),
(13, 'Toyota Rush A/T Tahun 2022', 'SUV', 'uploads/1736224391_rush2022.png', '8.500.000', '2025-01-07 04:33:11', '2025-01-07 04:33:11', 'bensin', 'otomatis', 1496, 8);

-- --------------------------------------------------------

--
-- Table structure for table `list_kendaraan_harian`
--

CREATE TABLE `list_kendaraan_harian` (
  `id_kendaraan` int(11) NOT NULL,
  `merk_mobil` varchar(100) NOT NULL,
  `jenis_mobil` varchar(100) NOT NULL,
  `gambar_mobil` varchar(255) DEFAULT NULL,
  `harga_sewa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bahan_bakar` varchar(50) DEFAULT NULL,
  `transmisi` varchar(50) DEFAULT NULL,
  `kapasitas_mesin` int(11) DEFAULT NULL,
  `jumlah_bangku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_kendaraan_harian`
--

INSERT INTO `list_kendaraan_harian` (`id_kendaraan`, `merk_mobil`, `jenis_mobil`, `gambar_mobil`, `harga_sewa`, `created_at`, `updated_at`, `bahan_bakar`, `transmisi`, `kapasitas_mesin`, `jumlah_bangku`) VALUES
(10, 'Toyota Innova Reborn A/T Tahun 2017', 'MPV', 'uploads/1736224642_innova2017.jpg', '750.000', '2025-01-07 04:37:22', '2025-01-07 04:37:22', 'bensin', 'otomatis', 2000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `durasi` enum('harian','bulanan','3_tahun','4_tahun') DEFAULT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `merk_mobil` varchar(255) NOT NULL,
  `waktu_reservasi` datetime DEFAULT current_timestamp(),
  `company_name` varchar(255) DEFAULT NULL,
  `status` enum('NULL','disetujui','dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservation`, `id_user`, `durasi`, `id_kendaraan`, `merk_mobil`, `waktu_reservasi`, `company_name`, `status`) VALUES
(66, 9, '3_tahun', 25, 'MITSUBISHI PAJERO EXCEED 4X2 MT BRAND NEW', '2025-01-07 11:54:17', 'PT.ALKINDO', 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `isi_testimoni` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_user`, `isi_testimoni`) VALUES
(9, 9, 'kendaraan berkualitas baik dan harga murah.');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(55) NOT NULL,
  `no_telp_user` varchar(12) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `username_user` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id_user`, `nama_user`, `no_telp_user`, `email_user`, `password_user`, `username_user`, `created_at`) VALUES
(9, 'Daffa Almaas Syakbana', '085694737918', 'daffaalmaas74@gmail.com', '$2y$10$Ottnvpx4Gruu1o5ImOhjiOOSyQgD2GWYisIhyiKp36icD.SmfYJOG', 'daffaalmaas', '2025-01-07 04:06:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email_admin` (`email_admin`),
  ADD UNIQUE KEY `username_admin` (`username_admin`);

--
-- Indexes for table `list_kendaraan_3_tahun`
--
ALTER TABLE `list_kendaraan_3_tahun`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `list_kendaraan_4_tahun`
--
ALTER TABLE `list_kendaraan_4_tahun`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `list_kendaraan_bulanan`
--
ALTER TABLE `list_kendaraan_bulanan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `list_kendaraan_harian`
--
ALTER TABLE `list_kendaraan_harian`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `list_kendaraan_3_tahun`
--
ALTER TABLE `list_kendaraan_3_tahun`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `list_kendaraan_4_tahun`
--
ALTER TABLE `list_kendaraan_4_tahun`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `list_kendaraan_bulanan`
--
ALTER TABLE `list_kendaraan_bulanan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `list_kendaraan_harian`
--
ALTER TABLE `list_kendaraan_harian`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_account` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_account` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
