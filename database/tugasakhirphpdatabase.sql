-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 05:06 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhirphpdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_tingkat`
--

CREATE TABLE `daftar_tingkat` (
  `id` int(11) NOT NULL,
  `no_anggota` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_tingkat`
--

INSERT INTO `daftar_tingkat` (`id`, `no_anggota`, `id_tingkat`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_anggota`
--

CREATE TABLE `data_anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_anggota`
--

INSERT INTO `data_anggota` (`id`, `nama`, `handphone`, `umur`, `pekerjaan`, `asal`, `foto`) VALUES
(1, 'Fadhfayi Athallah', '08134851419', '18', 'pelajarr', 'bekasi', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_tingkat`
--

CREATE TABLE `data_tingkat` (
  `id` int(11) NOT NULL,
  `tingkat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_tingkat`
--

INSERT INTO `data_tingkat` (`id`, `tingkat`) VALUES
(1, 'Tingkat 1'),
(2, 'Tingkat 2'),
(3, 'Tingkat 3');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `status`) VALUES
(1, 'fida', 'fida', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_tingkat`
--
ALTER TABLE `daftar_tingkat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_tingkat_ibfk_1` (`id_tingkat`),
  ADD KEY `daftar_tingkat_ibfk_2` (`no_anggota`);

--
-- Indexes for table `data_anggota`
--
ALTER TABLE `data_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tingkat`
--
ALTER TABLE `data_tingkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_tingkat`
--
ALTER TABLE `daftar_tingkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_anggota`
--
ALTER TABLE `data_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_tingkat`
--
ALTER TABLE `data_tingkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_tingkat`
--
ALTER TABLE `daftar_tingkat`
  ADD CONSTRAINT `daftar_tingkat_ibfk_1` FOREIGN KEY (`id_tingkat`) REFERENCES `data_tingkat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daftar_tingkat_ibfk_2` FOREIGN KEY (`no_anggota`) REFERENCES `data_anggota` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
