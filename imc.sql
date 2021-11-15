-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 06:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imc`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `merk_barang` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `kode_jenis` varchar(30) NOT NULL,
  `kode_satuan` varchar(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`merk_barang`, `id`, `nama_barang`, `stok`, `kode_jenis`, `kode_satuan`, `tanggal`) VALUES
('aqua', 1, 'air', 32, '2A', '01', '2021-10-14 01:36:56'),
('alfa', 2, 'alfa_botol', 5, '2A', '01', '2021-10-14 02:17:42'),
('kfc', 3, 'ayam', 0, '2A', '01', '2021-10-22 01:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `barang_io`
--

CREATE TABLE `barang_io` (
  `id_barang` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tipe` enum('masuk','keluar') NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `no_po` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_io`
--

INSERT INTO `barang_io` (`id_barang`, `id`, `stok`, `tipe`, `tanggal`, `harga`, `no_po`) VALUES
(1, 6, 10, 'masuk', '2021-10-13', NULL, NULL),
(1, 7, 2, 'keluar', '2021-10-14', NULL, NULL),
(1, 8, 10, 'masuk', '2021-10-14', NULL, NULL),
(1, 9, 10, 'masuk', '2021-10-14', NULL, NULL),
(1, 10, 2, 'masuk', '2021-10-21', NULL, NULL),
(1, 11, 10, 'keluar', '2021-10-21', NULL, NULL),
(1, 12, 2, 'masuk', '2021-10-25', NULL, NULL),
(1, 15, 2, 'masuk', '2021-10-25', 143000, '1'),
(1, 18, 4, 'masuk', '2021-10-27', 14000, '3');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `kode_jenis` varchar(30) NOT NULL,
  `jenis_barang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`kode_jenis`, `jenis_barang`) VALUES
('2A', 'sda'),
('3B', 'sda');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `kode_satuan` varchar(10) NOT NULL,
  `satuan_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`kode_satuan`, `satuan_barang`) VALUES
('01', 'g'),
('02', 'kg'),
('04', 'l'),
('05', 'mm'),
('06', 'mg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `no_hp`, `password`, `role`, `jabatan`) VALUES
(1, 'a', 'a@gmail.com', '099', 'loremipsum', 'Admin', 'Boss'),
(6, 'loremipsum', 'Akbart40867@gmail.com', '8888', 'loremipsum', 'karyawan', 'karyawan'),
(1002, 'Samsudin Jailani', 'jailani@gmail.com', '089518231932', 'a', 'Admin', 'CEO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_io`
--
ALTER TABLE `barang_io`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`kode_satuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_io`
--
ALTER TABLE `barang_io`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_io`
--
ALTER TABLE `barang_io`
  ADD CONSTRAINT `barang_io_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
