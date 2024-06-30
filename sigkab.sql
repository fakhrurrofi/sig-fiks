-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 09:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigkab`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `kode_kabupaten` varchar(100) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  `koordinat` varchar(100) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `luas_wilayah` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `kode_kabupaten`, `nama_kabupaten`, `koordinat`, `jumlah_penduduk`, `luas_wilayah`) VALUES
(1, '3302', 'Banyumas', '-7.362274826893668, 109.10943969842893', 82317924, 17083020.00);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kode_kecamatan` varchar(100) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `luas_wilayah` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kode_kecamatan`, `id_kabupaten`, `nama_kecamatan`, `jumlah_penduduk`, `luas_wilayah`) VALUES
('3302010', 1, 'LUMBIR', 50546, 10266.00),
('3302020', 1, 'WANGON', 84755, 6078.00),
('3302710', 1, 'PURWOKERTO SELATAN', 74305, 13705.00),
('3302730', 1, 'PURWOKERTO TIMUR', 58451, 8402.00),
('3302740', 1, 'PURWOKERTO UTARA', 48264, 90139.00);

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `no_universitas` int(11) NOT NULL,
  `kode_kecamatan` varchar(100) NOT NULL,
  `nama_universitas` varchar(100) NOT NULL,
  `alamat_universitas` varchar(100) NOT NULL,
  `koordinat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`no_universitas`, `kode_kecamatan`, `nama_universitas`, `alamat_universitas`, `koordinat`) VALUES
(623321, '3302740', 'Universitas Amikom Purwokerto', 'Jl. Letjend Pol. Soemarto No.127, Watumas, Purwanegara, Kec. Purwokerto Utara', '-7.4007407,109.2288476');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kode_kecamatan`),
  ADD KEY `kecamatan_ibfk_1` (`id_kabupaten`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`no_universitas`),
  ADD KEY `kode_kecamatan` (`kode_kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_2` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id_kabupaten`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `universitas`
--
ALTER TABLE `universitas`
  ADD CONSTRAINT `universitas_ibfk_2` FOREIGN KEY (`kode_kecamatan`) REFERENCES `kecamatan` (`kode_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
