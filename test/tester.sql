-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 04:23 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tester`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_data`
--

CREATE TABLE `tm_data` (
  `id_data` int(11) NOT NULL,
  `data_masuk` int(11) DEFAULT NULL,
  `data_sisa` int(11) NOT NULL,
  `deskipsi` text,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_data`
--

INSERT INTO `tm_data` (`id_data`, `data_masuk`, `data_sisa`, `deskipsi`, `tgl_masuk`) VALUES
(1, 1000000, 500000, 'tester', '2019-01-05 02:17:32'),
(2, 2500000, 2300000, 'Tester2', '2019-01-05 02:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `tm_detail_data`
--

CREATE TABLE `tm_detail_data` (
  `id_detail_data` int(5) NOT NULL,
  `id_data` int(5) NOT NULL,
  `tgl_uraian` date DEFAULT NULL,
  `kode_rek_uraian` varchar(64) DEFAULT NULL,
  `uraian` varchar(512) DEFAULT NULL,
  `realisasi` varchar(64) NOT NULL,
  `persen` float(10,6) NOT NULL,
  `sisa_anggaran` varchar(64) NOT NULL,
  `tgl_sistem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_detail_data`
--

INSERT INTO `tm_detail_data` (`id_detail_data`, `id_data`, `tgl_uraian`, `kode_rek_uraian`, `uraian`, `realisasi`, `persen`, `sisa_anggaran`, `tgl_sistem`) VALUES
(73, 2, '2019-01-05', '123', 'TEster', '100000', 0.000000, '2400000', '2019-01-05 02:59:05'),
(74, 2, '2019-01-05', '100000', 'TEster', '100000', 4.000000, '2300000', '2019-01-05 03:01:06'),
(75, 1, '2019-01-05', '123', '11111', '500000', 50.000000, '500000', '2019-01-05 03:13:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_data`
--
ALTER TABLE `tm_data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `tm_detail_data`
--
ALTER TABLE `tm_detail_data`
  ADD PRIMARY KEY (`id_detail_data`),
  ADD KEY `id_pegawai` (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_data`
--
ALTER TABLE `tm_data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tm_detail_data`
--
ALTER TABLE `tm_detail_data`
  MODIFY `id_detail_data` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
