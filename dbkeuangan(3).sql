-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2018 at 10:49 AM
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
  `subbelanja` varchar(3) DEFAULT NULL,
  `bagian` varchar(4) DEFAULT NULL,
  `asisten` varchar(4) NOT NULL,
  `tgl_update` date DEFAULT NULL,
  `id_program` int(5) NOT NULL,
  `id_kegiatan` int(5) NOT NULL,
  `total_anggaran` varchar(64) DEFAULT NULL,
  `tgl_sistem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_data`
--

INSERT INTO `tm_data` (`id_data`, `subbelanja`, `bagian`, `asisten`, `tgl_update`, `id_program`, `id_kegiatan`, `total_anggaran`, `tgl_sistem`) VALUES
(31, '1', '1', '1', '2018-06-14', 1, 1, '1000000', '2018-06-14 06:39:20'),
(32, '1', '1', '1', '2018-06-15', 1, 1, '2000000', '2018-06-14 06:39:24'),
(33, '1', '1', '1', '2018-06-15', 1, 1, '2000000', '2018-06-14 07:36:09'),
(34, '2', '1', '1', '2018-06-15', 1, 1, '2000000', '2018-06-14 07:51:31');

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
(66, 31, '2018-06-14', '1234', 'beli pulpen', '100000', 10.000000, '900000.00', '2018-06-14 06:18:10'),
(67, 31, '2018-06-14', '1234', 'beli pulpen', '200000', 20.000000, '800000.00', '2018-06-14 06:18:47'),
(68, 32, '2018-06-16', '23', 'Aa', '200000', 10.000000, '1800000.00', '2018-06-14 06:22:51'),
(69, 31, '2018-06-15', '4', 'dddd', '400000', 40.000000, '600000.00', '2018-06-14 06:40:18'),
(70, 32, '2018-06-15', '1234', 'beli pulpen', '100000', 5.000000, '1900000.00', '2018-06-14 06:41:04'),
(71, 34, '2018-06-14', '1234', 'beli pulpen', '200000', 10.000000, '1800000.00', '2018-06-14 08:31:01'),
(72, 34, '2018-06-15', '43', 'Aa', '300000', 15.000000, '1700000.00', '2018-06-14 08:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `tm_kegiatan`
--

CREATE TABLE `tm_kegiatan` (
  `id_kegiatan` int(5) NOT NULL,
  `nama_kegiatan` varchar(512) DEFAULT NULL,
  `tgl_sistem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_kegiatan`
--

INSERT INTO `tm_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `tgl_sistem`) VALUES
(1, '4.00.00.03.01.0018 - RAPAT-RAPAT KOORDINASI DAN KONSULTASI KE DALAM DAN LUAR DAERAH', '2018-06-04 05:23:50'),
(2, '4.00.00.03.01.0019 - PENYEDIAAN JASA TENAGA PENDUKUNG ADMINISTRASI/TEKNIS PERKANTORAN', '2018-06-04 05:26:24'),
(3, '4.00.00.03.06.0001 - PENYUSUNAN LAPORAN CAPAIAN KINERJA DAN IKHTISAR REALISASI KINERJA SKPD', '2018-06-04 05:32:46'),
(4, '4.00.00.03.06.0002 - PENYUSUNAN PELAPORAN KEUANGAN SEMESTERAN', '2018-06-04 05:34:16'),
(5, '4.00.00.03.06.0004 - PENYUSUNAN PELAPORAN AKHIR TAHUN', '2018-06-04 05:36:32'),
(6, '4.00.00.03.06.0005 - PENYUSUNAN PERENCANAAN ANGGARAN', '2018-06-04 05:37:31'),
(7, '4.00.00.03.06.0014 - PENYUSUNAN RENJA SKPD', '2018-06-04 05:38:20'),
(8, '4.00.00.03.06.0018 - DOKUMENTASI DAN PENATAAN ARSIP KEUANGAN SETDA', '2018-06-04 05:40:03'),
(9, '4.00.00.03.06.0019 - PENGELOLAAN ADM KEUANGAN SEKRETARIAT DAERAH', '2018-06-04 05:41:21');

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
-- Table structure for table `tm_program`
--

CREATE TABLE `tm_program` (
  `id_program` int(5) NOT NULL,
  `nama_program` varchar(512) DEFAULT NULL,
  `tgl_sistem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_program`
--

INSERT INTO `tm_program` (`id_program`, `nama_program`, `tgl_sistem`) VALUES
(1, '4.00.00.03.01 - PROGRAM PELAYANAN ADMINISTRASI PERKANTORAN', '2018-06-04 05:15:11'),
(2, '4.00.00.03.06 - PROGRAM PENINGKATAN PENGEMBANGAN SISTEM PELAPORAN CAPAIAN KINERJA DAN KEUANGAN', '2018-06-04 05:21:05'),
(3, '4.00.00.03.16 - PROGRAM PENINGKATAN PELAYANAN KEDINASAN KEPALA DAERAH/WAKIL KEPALA DAERAH', '2018-06-04 05:45:17');

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

-- --------------------------------------------------------

--
-- Table structure for table `users_score`
--

CREATE TABLE `users_score` (
  `user_id` int(5) NOT NULL,
  `score` int(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_score`
--

INSERT INTO `users_score` (`user_id`, `score`) VALUES
(6, 1000),
(7, 2000),
(8, 3000),
(9, 10000),
(10, 50000),
(11, 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_data`
--
ALTER TABLE `tm_data`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `tm_detail_data`
--
ALTER TABLE `tm_detail_data`
  ADD PRIMARY KEY (`id_detail_data`),
  ADD KEY `id_pegawai` (`id_data`);

--
-- Indexes for table `tm_kegiatan`
--
ALTER TABLE `tm_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tm_level`
--
ALTER TABLE `tm_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tm_program`
--
ALTER TABLE `tm_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `tm_user`
--
ALTER TABLE `tm_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `users_score`
--
ALTER TABLE `users_score`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_data`
--
ALTER TABLE `tm_data`
  MODIFY `id_data` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tm_detail_data`
--
ALTER TABLE `tm_detail_data`
  MODIFY `id_detail_data` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tm_kegiatan`
--
ALTER TABLE `tm_kegiatan`
  MODIFY `id_kegiatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tm_level`
--
ALTER TABLE `tm_level`
  MODIFY `id_level` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tm_program`
--
ALTER TABLE `tm_program`
  MODIFY `id_program` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_user`
--
ALTER TABLE `tm_user`
  MODIFY `id_user` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_score`
--
ALTER TABLE `users_score`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tm_data`
--
ALTER TABLE `tm_data`
  ADD CONSTRAINT `id_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `tm_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_program` FOREIGN KEY (`id_program`) REFERENCES `tm_program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tm_detail_data`
--
ALTER TABLE `tm_detail_data`
  ADD CONSTRAINT `tm_detail_data_ibfk_1` FOREIGN KEY (`id_data`) REFERENCES `tm_data` (`id_data`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
