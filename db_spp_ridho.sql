-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2026 at 09:03 AM
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
-- Database: `db_spp_ridho`
--
CREATE DATABASE IF NOT EXISTS `db_spp_ridho` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `db_spp_ridho`;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` varchar(5) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
('K01', 'X RPL 1', 'Rekayasa Perangkat Lunak'),
('K02', 'X RPL 2', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `no_bayar` varchar(11) DEFAULT NULL,
  `id_petugas` varchar(5) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `bulan_tagihan` varchar(12) DEFAULT NULL,
  `tahun_tagihan` int(4) DEFAULT NULL,
  `id_spp` varchar(5) DEFAULT NULL,
  `keterangan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `no_bayar`, `id_petugas`, `nisn`, `tgl_pembayaran`, `bulan_tagihan`, `tahun_tagihan`, `id_spp`, `keterangan`) VALUES
(13, '2608290003', 'A01', 'SIS006', '2026-08-29', 'Juli', 2026, 'SPP4', 'LUNAS'),
(14, '2608290002', 'A01', 'SIS006', '2026-08-29', 'Agustus', 2026, 'SPP4', 'LUNAS'),
(15, '2608290001', 'A01', 'SIS006', '2026-08-29', 'September', 2026, 'SPP4', 'LUNAS'),
(16, '2609040001', 'A01', 'SIS006', '2026-09-04', 'Oktober', 2026, 'SPP4', 'LUNAS'),
(17, NULL, NULL, 'SIS006', NULL, 'November', 2026, 'SPP4', NULL),
(18, NULL, NULL, 'SIS006', NULL, 'Desember', 2026, 'SPP4', NULL),
(19, NULL, NULL, 'SIS006', NULL, 'Januari', 2027, 'SPP4', NULL),
(20, NULL, NULL, 'SIS006', NULL, 'Februari', 2027, 'SPP4', NULL),
(21, NULL, NULL, 'SIS006', NULL, 'Maret', 2027, 'SPP4', NULL),
(22, NULL, NULL, 'SIS006', NULL, 'April', 2027, 'SPP4', NULL),
(23, NULL, NULL, 'SIS006', NULL, 'Mei', 2027, 'SPP4', NULL),
(24, NULL, NULL, 'SIS006', NULL, 'Juni', 2027, 'SPP4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id_petugas` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas',',') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
('A01', 'admin', '0192023a7bbd73250516f069df18b500', 'Andi', 'admin'),
('A02', 'Petugas1', 'Petugas123', 'Budi', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_spp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('SIS001', 'NIS001', 'Andy', 'K01', 'Banjarbaru', '085387567756', 'SPP2'),
('SIS003', '76477', 'Zozo', 'K02', 'Jl. Kemerdekaan', '085387567756', 'SPP1'),
('SIS004', 'NIS004', 'Alicia', 'K02', 'Banjarbaru', '085787542833', 'SPP1'),
('SIS006', 'NIS006', 'Elia', 'K01', 'Sungai Besar', '085354092854', 'SPP4');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

DROP TABLE IF EXISTS `spp`;
CREATE TABLE `spp` (
  `id_spp` varchar(5) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
('SPP1', 2015, 75000),
('SPP2', 2020, 80000),
('SPP3', 2010, 75000),
('SPP4', 2026, 80000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_ibfk_1` (`id_petugas`),
  ADD KEY `pembayaran_ibfk_2` (`nisn`),
  ADD KEY `pembayaran_ibfk3` (`id_spp`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk3` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
