-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 02:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kota_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nip`, `nama`, `kota_lahir`, `tgl_lahir`, `gender`, `no_hp`, `status`, `password`) VALUES
(1, '11121413', 'Admin', 'Jakarta', '2024-11-30', 'PRIA', '082212345678', 'AKTIF', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `detail_materi`
--

CREATE TABLE `detail_materi` (
  `id_detail` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `nama_berkas` text NOT NULL,
  `jenis_materi` varchar(5) NOT NULL,
  `path_materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `detail_materi`
--

INSERT INTO `detail_materi` (`id_detail`, `id_materi`, `nama_berkas`, `jenis_materi`, `path_materi`) VALUES
(13, 5, 'Kisi-kisi', 'PDF', 'idfx07a-Kisi-Kisi Statistika.pdf'),
(14, 5, 'Kisi-kisi juga', 'VIDEO', 'https://www.youtube.com/watch?v=kLfjhSmvFjM');

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `id_diskusi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` varchar(250) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kota_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `kota_lahir`, `tgl_lahir`, `gender`, `no_hp`, `status`, `password`, `id_admin`) VALUES
(1, '123456', 'Sifa', 'Jakarta', '1997-11-07', 'WANITA', '081212201554', 'AKTIF', 'e10adc3949ba59abbe56e057f20f883e', 1),
(6, '102030', 'Test', 'Jakarta', '2023-01-01', 'WANITA', '081200000000', 'AKTIF', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `benar` int(11) NOT NULL,
  `salah` int(11) NOT NULL,
  `kosong` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `status` varchar(15) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `tanggal`, `benar`, `salah`, `kosong`, `nilai`, `grade`, `status`, `id_materi`, `id_siswa`) VALUES
(19, '2025-01-07', 1, 0, 0, 100, 'A', 'LULUS', 5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `tingkat` varchar(2) NOT NULL,
  `nama_kelas` varchar(5) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tingkat`, `nama_kelas`, `id_admin`) VALUES
(9, 'XI', 'Test ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `detail` varchar(250) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_matpel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `tanggal`, `detail`, `judul`, `id_matpel`, `id_guru`) VALUES
(5, '2025-01-07', 'Oke gas', 'Jadi gini Cuy', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `id_matpel` int(11) NOT NULL,
  `nama_matpel` varchar(50) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`id_matpel`, `nama_matpel`, `id_guru`, `id_admin`) VALUES
(5, 'Perekayasaan Sistem Kontrol', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kota_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nama_wali` varchar(25) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `kota_lahir`, `tgl_lahir`, `gender`, `nama_wali`, `no_hp`, `id_kelas`, `status`, `password`, `id_admin`) VALUES
(12, '11121413', 'Satrio', 'Jakarta', '2025-01-07', 'PRIA', 'Sifa', '082249599996', 9, 'AKTIF', 'e10adc3949ba59abbe56e057f20f883e', 1),
(13, '123456', 'Alfi', 'Kajarta', '2025-01-07', 'PRIA', 'Sifa', '0822222222', 9, 'AKTIF', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `soal` varchar(250) NOT NULL,
  `pg_a` varchar(100) NOT NULL,
  `pg_b` varchar(100) NOT NULL,
  `pg_c` varchar(100) NOT NULL,
  `pg_d` varchar(100) NOT NULL,
  `kunci_jawaban` varchar(1) NOT NULL,
  `status` varchar(6) NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `tanggal`, `soal`, `pg_a`, `pg_b`, `pg_c`, `pg_d`, `kunci_jawaban`, `status`, `id_materi`) VALUES
(10, '2025-01-07', 'Oke gak', 'gas', 'gass', 'gasss', 'gassss', 'B', 'TERBIT', 5);

-- --------------------------------------------------------

--
-- Table structure for table `status_materi`
--

CREATE TABLE `status_materi` (
  `id_status` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `status_materi`
--

INSERT INTO `status_materi` (`id_status`, `id_detail`, `id_siswa`) VALUES
(26, 13, 12),
(27, 14, 12);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_wali` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id_wali`, `id_guru`, `id_kelas`, `id_admin`) VALUES
(9, 1, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `no_hp` (`no_hp`);

--
-- Indexes for table `detail_materi`
--
ALTER TABLE `detail_materi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`id_diskusi`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_matpel` (`id_matpel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`id_matpel`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `status_materi`
--
ALTER TABLE `status_materi`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_wali`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_materi`
--
ALTER TABLE `detail_materi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status_materi`
--
ALTER TABLE `status_materi`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD CONSTRAINT `diskusi_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`),
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_matpel`) REFERENCES `matpel` (`id_matpel`),
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`);

--
-- Constraints for table `matpel`
--
ALTER TABLE `matpel`
  ADD CONSTRAINT `matpel_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `matpel_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`);

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `wali_kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `wali_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `wali_kelas_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
