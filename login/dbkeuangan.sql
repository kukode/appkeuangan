-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2018 at 08:19 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkeuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_data`
--

CREATE TABLE `tm_data` (
  `id_data` int(5) NOT NULL,
  `bagian` varchar(125) DEFAULT NULL,
  `asisten` varchar(125) DEFAULT NULL,
  `uraian` varchar(512) DEFAULT NULL,
  `anggaran` varchar(64) DEFAULT NULL,
  `realisasi` varchar(64) DEFAULT NULL,
  `persen` varchar(64) DEFAULT NULL,
  `sisa_anggaran` varchar(64) DEFAULT NULL,
  `tgl_sistem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_data`
--

INSERT INTO `tm_data` (`id_data`, `bagian`, `asisten`, `uraian`, `anggaran`, `realisasi`, `persen`, `sisa_anggaran`, `tgl_sistem`) VALUES
(10, '1', '2', 'perjalanan', '18400000', '2400000', '13.04347826087', '16000000', '2018-05-16 04:56:23'),
(11, '1', '1', 'asasa', '5100000', '2530000', '49.607843137255', '2570000', '2018-05-14 08:34:09'),
(12, '3', '3', 'kerjasama', '5000', '635', '12.7', '4365', '2018-05-16 04:56:03'),
(13, '2', '2', 'pembelian atk', '1300000', '1000000', '76.923076923077', '300000', '2018-05-16 05:42:19'),
(14, '7', '1', 'belanja', '1000', '500', '50', '500', '2018-05-17 03:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `tm_detail_pegawai`
--

CREATE TABLE `tm_detail_pegawai` (
  `id_detail_pegawai` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `anggaran` varchar(64) NOT NULL,
  `realisasi` varchar(64) NOT NULL,
  `persen` varchar(12) NOT NULL,
  `sisa_anggaran` varchar(64) NOT NULL,
  `tgl_sistem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_detail_pegawai`
--

INSERT INTO `tm_detail_pegawai` (`id_detail_pegawai`, `id_pegawai`, `anggaran`, `realisasi`, `persen`, `sisa_anggaran`, `tgl_sistem`) VALUES
(1, 3, '12000000', 'beli komputer all in one', '10%', '30000000', '2018-05-09 07:51:12'),
(2, 3, '5000000', 'belanja mouse', '9%', '22000000', '2018-05-09 07:55:55'),
(3, 2, '90000', 'transport', '1%', '100000', '2018-05-09 09:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `tm_level`
--

CREATE TABLE `tm_level` (
  `id_level` int(3) UNSIGNED ZEROFILL NOT NULL,
  `keterangan` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tm_level`
--

INSERT INTO `tm_level` (`id_level`, `keterangan`) VALUES
(001, 'admin'),
(002, 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `tm_pegawai`
--

CREATE TABLE `tm_pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `tgl_update` date DEFAULT NULL,
  `nama_anggaran` varchar(256) DEFAULT NULL,
  `total_anggaran` varchar(64) NOT NULL,
  `tgl_sistem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_pegawai`
--

INSERT INTO `tm_pegawai` (`id_pegawai`, `tgl_update`, `nama_anggaran`, `total_anggaran`, `tgl_sistem`) VALUES
(2, '2018-05-09', 'belanja keperluan pegawai', '2000000', '2018-05-09 07:42:50'),
(3, '2018-05-10', 'belanja komputer', '40000000', '2018-05-09 07:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `tm_user`
--

CREATE TABLE `tm_user` (
  `id_user` int(3) UNSIGNED ZEROFILL NOT NULL,
  `id_level` int(3) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tm_user`
--

INSERT INTO `tm_user` (`id_user`, `id_level`, `nama`, `username`, `password`, `last_login`) VALUES
(003, 001, 'jono susanto', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2017-03-29 13:25:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_data`
--
ALTER TABLE `tm_data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `tm_detail_pegawai`
--
ALTER TABLE `tm_detail_pegawai`
  ADD PRIMARY KEY (`id_detail_pegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tm_level`
--
ALTER TABLE `tm_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tm_pegawai`
--
ALTER TABLE `tm_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tm_user`
--
ALTER TABLE `tm_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_data`
--
ALTER TABLE `tm_data`
  MODIFY `id_data` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tm_detail_pegawai`
--
ALTER TABLE `tm_detail_pegawai`
  MODIFY `id_detail_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_level`
--
ALTER TABLE `tm_level`
  MODIFY `id_level` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tm_pegawai`
--
ALTER TABLE `tm_pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_user`
--
ALTER TABLE `tm_user`
  MODIFY `id_user` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tm_detail_pegawai`
--
ALTER TABLE `tm_detail_pegawai`
  ADD CONSTRAINT `tm_detail_pegawai_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tm_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
