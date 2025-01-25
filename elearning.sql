-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2025 at 01:42 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
  `id_admin` int NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kota_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_detail` int NOT NULL,
  `id_materi` int NOT NULL,
  `nama_berkas` text NOT NULL,
  `jenis_materi` varchar(5) NOT NULL,
  `path_materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_materi`
--

INSERT INTO `detail_materi` (`id_detail`, `id_materi`, `nama_berkas`, `jenis_materi`, `path_materi`) VALUES
(11, 4, 'Materi Statistika', 'PDF', 'idj4nia-Kisi-Kisi Statistika.pdf'),
(12, 4, 'Video Statistika', 'VIDEO', 'https://www.youtube.com/watch?v=ty2iRuXKyaQ&t=1s'),
(13, 5, 'Test', 'PDF', 'idqiadj-Buku Panduan untuk Admin.pdf'),
(14, 5, 'Test', 'VIDEO', 'https://www.youtube.com/watch?v=LvjfaNcmoik');

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `id_diskusi` int NOT NULL,
  `tanggal` date NOT NULL,
  `isi` varchar(250) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `id_materi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kota_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `kota_lahir`, `tgl_lahir`, `gender`, `no_hp`, `status`, `password`, `id_admin`) VALUES
(1, '123456', 'Sifa', 'Jakarta', '2025-01-01', 'WANITA', '0812345678', 'AKTIF', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int NOT NULL,
  `tanggal` date NOT NULL,
  `benar` int NOT NULL,
  `salah` int NOT NULL,
  `kosong` int NOT NULL,
  `nilai` int NOT NULL,
  `grade` varchar(1) NOT NULL,
  `status` varchar(15) NOT NULL,
  `id_materi` int NOT NULL,
  `id_siswa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `tanggal`, `benar`, `salah`, `kosong`, `nilai`, `grade`, `status`, `id_materi`, `id_siswa`) VALUES
(16, '2025-01-15', 1, 0, 0, 100, 'A', 'LULUS', 4, 4),
(17, '2025-01-17', 1, 0, 0, 50, 'D', 'TIDAK LULUS', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `tingkat` varchar(2) NOT NULL,
  `nama_kelas` varchar(5) NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tingkat`, `nama_kelas`, `id_admin`) VALUES
(9, 'XI', 'RPL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int NOT NULL,
  `tanggal` date NOT NULL,
  `detail` varchar(250) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_matpel` int NOT NULL,
  `id_guru` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `tanggal`, `detail`, `judul`, `id_matpel`, `id_guru`) VALUES
(4, '2025-01-15', 'Ini materi Statistika', 'Statistika', 1, 1),
(5, '2025-01-17', 'Test Dulu', 'Test Dulu', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `id_matpel` int NOT NULL,
  `nama_matpel` varchar(50) NOT NULL,
  `id_guru` int NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`id_matpel`, `nama_matpel`, `id_guru`, `id_admin`) VALUES
(1, 'Perekayasaan Sistem Kontrol', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kota_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nama_wali` varchar(25) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_kelas` int NOT NULL,
  `status` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `kota_lahir`, `tgl_lahir`, `gender`, `nama_wali`, `no_hp`, `id_kelas`, `status`, `password`, `id_admin`) VALUES
(4, '11121413', 'Satrio RR', 'Jakarta', '2024-11-29', 'PRIA', 'Sifa', '0812345678', 9, 'AKTIF', '21a62fe115a92f177f0ae7b5e78161bc', 1),
(5, '123456', 'Alfi', 'Jakarta', '2025-01-01', 'PRIA', 'Sri', '08122222222', 9, 'AKTIF', 'e10adc3949ba59abbe56e057f20f883e', 1),
(6, '0987654', 'Fachrudin', 'Jakarta', '2025-01-17', 'PRIA', 'Ampatukam', '0811223344', 9, 'AKTIF', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int NOT NULL,
  `tanggal` date NOT NULL,
  `soal` varchar(250) NOT NULL,
  `pg_a` varchar(100) NOT NULL,
  `pg_b` varchar(100) NOT NULL,
  `pg_c` varchar(100) NOT NULL,
  `pg_d` varchar(100) NOT NULL,
  `kunci_jawaban` varchar(1) NOT NULL,
  `status` varchar(6) NOT NULL,
  `id_materi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `tanggal`, `soal`, `pg_a`, `pg_b`, `pg_c`, `pg_d`, `kunci_jawaban`, `status`, `id_materi`) VALUES
(8, '2025-01-15', 'Apa itu Statistika?', 'A', 'B', 'C', 'D', 'A', 'TERBIT', 4),
(9, '2025-01-17', 'test', 'a', 'b', 'c', 'd', 'A', 'DRAFT', 5);

-- --------------------------------------------------------

--
-- Table structure for table `status_materi`
--

CREATE TABLE `status_materi` (
  `id_status` int NOT NULL,
  `id_detail` int NOT NULL,
  `id_siswa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_materi`
--

INSERT INTO `status_materi` (`id_status`, `id_detail`, `id_siswa`) VALUES
(11, 11, 4),
(12, 12, 4),
(13, 13, 4),
(14, 14, 4),
(15, 13, 5),
(16, 14, 5),
(17, 11, 5),
(18, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_wali` int NOT NULL,
  `id_guru` int NOT NULL,
  `id_kelas` int NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_materi`
--
ALTER TABLE `detail_materi`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `id_diskusi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id_matpel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status_materi`
--
ALTER TABLE `status_materi`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_wali` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
