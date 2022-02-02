-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 02:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absenonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `absen_id` int(225) NOT NULL,
  `NRNP` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `jam_datang` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`absen_id`, `NRNP`, `nama`, `bagian`, `jam_datang`, `jam_pulang`, `tanggal`) VALUES
(7, '99912345611', 'Henny', 'Keuangan', '16:13:36', '20:47:26', '2021-06-15'),
(13, '99912345611', 'Henny', 'Keuangan', '12:53:22', '20:47:26', '2021-06-17'),
(14, '99912345611', 'Henny', 'Keuangan', '13:10:04', '20:47:26', '2021-06-16'),
(15, '99912345669', 'Ryoumei Sukuna', 'Keuangan', '09:53:54', '01:59:09', '2021-06-17'),
(16, '99912345601', 'Daimyou', 'Keuangan', '23:04:31', '23:04:47', '2021-06-18'),
(17, '99912345645', 'Aufha Bagaskara', 'Keuangan', '21:54:34', '19:23:27', '2021-06-20'),
(18, '99912345669', 'Ryoumei Sukuna', 'Keuangan', '22:01:25', '01:59:09', '2021-06-20'),
(19, '99912345611', 'Henny', 'Keuangan', '22:01:57', '20:47:26', '2021-06-20'),
(20, '99912345611', 'Henny', 'Keuangan', '01:57:28', '20:47:26', '2021-06-21'),
(21, '99912345669', 'Ryoumei Sukuna', 'Keuangan', '01:59:07', '01:59:09', '2021-06-21'),
(22, '99912345600', 'Mikey', 'Keuangan', '20:17:23', '20:17:32', '2021-06-21'),
(23, '99912345611', 'Henny', 'Keuangan', '20:47:24', '20:47:26', '2021-07-10'),
(24, '3931502008', 'R.A Pramitha Lauranda', 'Keuangan', '11:21:01', '19:21:51', '2021-07-11'),
(25, '99912345645', 'Aufha Bagaskara', 'Keuangan', '19:23:26', '19:23:27', '2021-07-11'),
(26, '99912345611', 'Henny', 'Keuangan', '11:51:21', NULL, '2021-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `username`, `password`) VALUES
(1, 'Master', 'MasterKing123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bendahara`
--

CREATE TABLE `tb_bendahara` (
  `bendahara_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bendahara`
--

INSERT INTO `tb_bendahara` (`bendahara_id`, `username`, `password`) VALUES
(1, 'bendahara', 'MoneyKing123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `gaji_id` int(100) NOT NULL,
  `NRNP` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `jumlah_lembur` int(40) NOT NULL,
  `total_jam_lembur` int(11) NOT NULL,
  `bonus` int(100) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`gaji_id`, `NRNP`, `nama`, `bagian`, `jumlah_lembur`, `total_jam_lembur`, `bonus`, `bulan`, `tahun`) VALUES
(2, '99912345669', 'Ryoumei Sukuna', 'Keuangan', 4, 20, 400000, '06', '2021'),
(9, '99912345611', 'Henny', 'Keuangan', 2, 10, 200000, '06', '2021'),
(10, '99912345600', 'Mikey', 'Keuangan', 1, 5, 100000, '07', '2021'),
(11, '3931502008', 'R.A Pramitha Lauranda', 'Keuangan', 1, 5, 100000, '07', '2021'),
(12, '99912345645', 'Aufha Bagaskara', 'Keuangan', 1, 5, 100000, '07', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `karyawan_id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `NRNP` varchar(50) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `bagian` varchar(40) NOT NULL,
  `gender` enum('laki-laki','perempuan','','') NOT NULL,
  `tahun_masuk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`karyawan_id`, `nama`, `NRNP`, `agama`, `bagian`, `gender`, `tahun_masuk`) VALUES
(1, 'Henny', '99912345611', 'Islam', 'Keuangan', 'perempuan', '2020'),
(3, 'Ryomei Sukuna', '99912345669', 'Buddha', 'Keuangan', 'laki-laki', '2019'),
(4, 'Daimyou', '99912345601', 'Kristen', 'Keuangan', 'laki-laki', '2019'),
(5, 'Aufha Bagaskara', '99912345645', 'Islam', 'Keuangan', 'laki-laki', '2010'),
(6, 'Mikey', '99912345600', 'Kristen', 'Keuangan', 'laki-laki', '2017'),
(7, 'R.A Pramitha Lauranda', '3931502008', 'Islam', 'Keuangan', 'perempuan', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lembur`
--

CREATE TABLE `tb_lembur` (
  `lembur_id` int(100) NOT NULL,
  `NRNP` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alasan` text NOT NULL,
  `status` enum('menunggu','disetujui','tidak disetujui') NOT NULL DEFAULT 'menunggu',
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lembur`
--

INSERT INTO `tb_lembur` (`lembur_id`, `NRNP`, `nama`, `alasan`, `status`, `tanggal`) VALUES
(3, '99912345611', 'Henny', 'Saya ingin gaji lebih besar', 'disetujui', '2021-06-16 00:00:00'),
(5, '99912345669', 'Ryoumei Sukuna', 'Menyelesaikan tugas karena Deadline', 'disetujui', '2021-06-17 00:00:00'),
(6, '99912345669', 'Ryoumei Sukuna', 'Ingin memperbaiki peralatan', 'disetujui', '2021-06-17 00:00:00'),
(8, '99912345669', 'Ryoumei Sukuna', 'Ingin menyelesaikan pekerjaan', 'disetujui', '2021-06-19 00:00:00'),
(9, '99912345645', 'Aufha Bagaskara', 'Saya ingin menyelesaikan deadline', 'disetujui', '2021-06-20 00:00:00'),
(10, '99912345611', 'Henny', 'Saya ingin menyelesaikan laporan', 'tidak disetujui', '2021-06-21 00:00:00'),
(18, '99912345669', 'Ryoumei Sukuna', 'Ingin menyelesaikan desain', 'disetujui', '2021-06-21 00:00:00'),
(25, '99912345611', 'Henny', 'saya ingin menyelesaikan rekap', 'disetujui', '2021-06-21 00:00:00'),
(26, '99912345600', 'Mikey', 'Saya ingin menyelesaikan laporan keuangan', 'disetujui', '2021-06-21 00:00:00'),
(28, '3931502008', 'R.A Pramitha Lauranda', 'Menyelesaikan Laporan', 'disetujui', '2021-07-11 00:00:00'),
(29, '99912345645', 'Aufha Bagaskara', 'Ingin Menyelesaikan tugas', 'disetujui', '2021-07-11 00:00:00'),
(30, '99912345611', 'Henny', 'Menyelesaikan laporan utang', 'tidak disetujui', '2021-07-15 00:00:00'),
(31, '99912345611', 'Henny', 'Syalala', 'menunggu', '2021-08-24 01:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(100) NOT NULL,
  `NRNP` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `NRNP`, `nama`, `password`) VALUES
(5, '99912345633', 'Kurokawa Nagisa', '$2y$10$0LIpBPGA8ZXaQ.ZZgUMQ2.jtW2Ie88woe'),
(9, '99912345611', 'Henny', '$2y$10$F6msBxMcxTKnbdIPW5ddtemdFSVBkQkQ7NXRXLztFxNAAZ8TX4k8W'),
(10, '99912345669', 'Ryoumei Sukuna', '$2y$10$HnrSJFahqcNj2wl6yl7.defEqB4uz9YptMjsSau56YD3sJY5gFqwW'),
(11, '99912345601', 'Daimyou', '$2y$10$lIZO.FGM5PS6Hulma1UIrupzrI4E9/fYV8FCpS5iPYsU2P3n61c72'),
(12, '99912345645', 'Aufha Bagaskara', '$2y$10$APzIU/q5sV6ig/Gbix9OnOGmE2WbQpxKvN90duJBH/ZZiS2ivi02C'),
(13, '99912345600', 'Mikey', '$2y$10$Fp6fZh5/2H.YccggtmGnR.YBPdD2ial2w.w8M/DGeUH2E9i9UO8le'),
(14, '3931502008', 'R.A Pramitha Lauranda', '$2y$10$PpSd.MIzN5IGrzMfGIWA3esPnqalxKCo2iR.BNTr5.4lWlWqdDuK6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`absen_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_bendahara`
--
ALTER TABLE `tb_bendahara`
  ADD PRIMARY KEY (`bendahara_id`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`gaji_id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indexes for table `tb_lembur`
--
ALTER TABLE `tb_lembur`
  ADD PRIMARY KEY (`lembur_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `absen_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bendahara`
--
ALTER TABLE `tb_bendahara`
  MODIFY `bendahara_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `gaji_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `karyawan_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_lembur`
--
ALTER TABLE `tb_lembur`
  MODIFY `lembur_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
