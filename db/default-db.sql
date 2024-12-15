-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 15, 2024 at 10:23 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asdp-2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_air_tawar`
--

CREATE TABLE `tbl_air_tawar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `id_dermaga` int(11) NOT NULL,
  `shift` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `debit_air` double NOT NULL,
  `total_air_tawar` double NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dermaga`
--

CREATE TABLE `tbl_dermaga` (
  `id` int(11) NOT NULL,
  `dermaga` varchar(255) NOT NULL,
  `tarif` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dermaga`
--

INSERT INTO `tbl_dermaga` (`id`, `dermaga`, `tarif`) VALUES
(1, 'Dermaga 1', 150),
(2, 'Dermaga 2', 85);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen`
--

CREATE TABLE `tbl_dokumen` (
  `id` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `id_jenis_dokumen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history_tanki`
--

CREATE TABLE `tbl_history_tanki` (
  `id` int(11) NOT NULL,
  `id_tanki` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `tgl` date NOT NULL,
  `liter` float NOT NULL,
  `tinggi_bbm` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_dokumen`
--

CREATE TABLE `tbl_jenis_dokumen` (
  `id` int(11) NOT NULL,
  `jenis_dokumen` varchar(50) NOT NULL,
  `warna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis_dokumen`
--

INSERT INTO `tbl_jenis_dokumen` (`id`, `jenis_dokumen`, `warna`) VALUES
(2, 'SERTIFIKAT KESELAMATAN KAPAL PENUMPANG', '#ff286c'),
(3, 'IJIN STASUIN RADIO KAPAL', '#b2f92a'),
(7, 'SERTIFIKAT NASIONAL PENCEGAHAN PENCEMARAN KAPAL', '#23fca9'),
(8, 'SERTIFIKAT SISTEM ANTI TRITIP', '#fdcd21'),
(9, 'SERTIFIKAT KLASIFIKASI LAMBUNG', '#4521fd'),
(10, 'SERTIFIKAT KLASIFIKASI MESIN', '#576b63'),
(11, 'SERTIFIKAT GARIS MUAT', '#4d5653'),
(12, 'SERTIFIKAT DOC', '#897897'),
(13, 'SERTIFIKAT SMC', '#23fca9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_kelamin`
--

CREATE TABLE `tbl_jenis_kelamin` (
  `id` int(11) NOT NULL,
  `jenis_kelamin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jenis_kelamin`
--

INSERT INTO `tbl_jenis_kelamin` (`id`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_tanki`
--

CREATE TABLE `tbl_jenis_tanki` (
  `id` int(11) NOT NULL,
  `jenis_tanki` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis_tanki`
--

INSERT INTO `tbl_jenis_tanki` (`id`, `jenis_tanki`) VALUES
(1, 'Tanki Harian Kiri'),
(2, 'Tanki Harian Kanan'),
(3, 'Tanki Induk Kanan'),
(4, 'Tanki Induk Kiri'),
(6, 'Tangki Harian ME Kiri'),
(7, 'Tangki Harian ME Kanan'),
(8, 'Tangki Harian AE 1'),
(9, 'Tangki Harian AE II'),
(10, 'Tangki Harian ME '),
(11, 'Tangki Harian'),
(12, 'Tangki Induk Tengah'),
(13, 'Tangki 1 P'),
(14, 'Tangki 2 S'),
(15, 'Tangki 2 P'),
(16, 'Tangki Service ME '),
(17, 'Tangki Service AE'),
(18, 'Tangki Emergency Fire Pump'),
(19, 'Tangki setling ME'),
(20, 'TANGKI HFO NO 2 (P)'),
(21, 'TANGKI HARIAN AE III'),
(22, 'TANGKI HARIAN AE IV'),
(23, 'Tangki Dasar'),
(24, 'Tangki Harian Genset Labuh'),
(25, 'Tangki Harian AE I dan AE II'),
(26, 'Tangki Induk ( S )'),
(27, 'Tangki Induk ( P )'),
(28, 'Tangki Harian ME / AE ( S )'),
(29, 'Tangki Harian ME / AE ( P )'),
(30, 'Tangki Harian Kanan ME / AE'),
(31, 'Tangki Harian Kiri ME &amp; AE'),
(32, 'Tangki FOT No.6 ( P )'),
(33, 'Tangki Center ( C )'),
(34, 'Tangki Service ( S )'),
(35, 'Tangki Service ( P )'),
(36, 'Tangki Service Genset'),
(37, 'Tangki Induk No 3 ( P )'),
(38, 'Tangki Induk No 3 ( S )'),
(39, 'Tangki Setling AE 1'),
(40, 'Tangki Setling AE II'),
(41, 'Tangki Harian ME 1 / 2'),
(42, 'Tangki BT'),
(43, 'Tangki Settling');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kabid`
--

CREATE TABLE `tbl_kabid` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kabid`
--

INSERT INTO `tbl_kabid` (`id`, `id_user`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kapal`
--

CREATE TABLE `tbl_kapal` (
  `id` int(11) NOT NULL,
  `nama_kapal` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `gt` float DEFAULT NULL,
  `pajak` varchar(10) DEFAULT NULL,
  `kamera` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kapal`
--

INSERT INTO `tbl_kapal` (`id`, `nama_kapal`, `perusahaan`, `gt`, `pajak`, `kamera`) VALUES
(1, 'KMP. PANORAMA NUSANTARA', 'PT. JEMBATAN NUSANTARA', 7965, '-', ''),
(74, 'KMP. PELANGI NUSANTARA', 'PT. JEMBATAN NUSANTARA', 1001, '-', ''),
(75, 'KMP. MAHAKAM RAYA', 'PT. JEMBATAN NUSANTARA', 600, '-', ''),
(76, 'KMP. TITIAN MURNI', 'PT. JEMBATAN NUSANTARA', 3614, '-', ''),
(77, 'KMP. MABUAY NUSANTARA', 'PT. JEMBATAN NUSANTARA', 5035, '-', ''),
(78, 'KMP. JEMBATAN MUSI II', 'PT. JEMBAATAN NUSANTARA', 159, '-', ''),
(79, 'KMP. PERSADA NUSNTARA', 'PT. JEMBATAN NUSANTARA', 640, '-', ''),
(80, 'KMP. MITRA NUSANTARA', 'PT. JEMBATAN NUSANTARA', 5813, '-', ''),
(81, 'KMP. MARINA SEGUNDA', 'PT. JEMBATAN NUSANTARA', 862, '-', ''),
(82, 'KMP. MARINA PRIMERA', 'PT. JEMBATAN NUSANTARA', 824, '-', ''),
(83, 'KMP. SWARNA NALINI', 'PT. JEMBATAN NUSANTARA', 323, '-', ''),
(84, 'KMP. SRIKANDI NUSANTARA', 'PT. JEMBATAN NUSANTARA', 476, '-', ''),
(85, 'KMP. SWARNA CAKRA', 'PT. JEMBATAN NUSANTARA', 799, '-', ''),
(87, 'KMP. ROYAL NUSANTARA', 'PT. JEMBATAN NUSANTARA', 6034, '-', ''),
(88, 'KMP. ANDIKA NUSANTARA', 'PT. JEMBATAN NUSANTARA', 1229, '-', ''),
(89, 'KMP. MARINA QUINTA', 'PT. JEMBATAN NUSANTARA', 821, '-', ''),
(90, 'KMP. LASKAR PELANGI', 'PT. JEMBATAN NUSANTARA', 1001, '-', ''),
(91, 'KMP. SAFIRA NUSANTARA', 'PT. JEMBATAN NUSANTARA', 6345, '-', ''),
(92, 'KMP. PERMATA NUSANTARA', 'PT. JEMBATAN NUSANTARA', 1373, '-', ''),
(93, 'KMP. JEMBATAN MUSI I', 'PT. JEMBATAN NUSANTARA', 406, '-', ''),
(94, 'KMP. MANDALA NUSANTARA', 'PT. JEMBATAN NUSANTARA', 1333, '-', ''),
(95, 'KMP. SATRIA NUSANTARA', 'PT. JEMBATAN NUSANTARA', 656, '-', ''),
(96, 'KMP. RENNY II', 'PT. JEMBATAN NUSANTARA', 456, '-', ''),
(97, 'KMP. SWARNA PUTRI', 'PT. JEMBATAN NUSANTARA', 516, '-', ''),
(98, 'KMP. CITRA NUSANTARA', 'PT. JEMBATAN NUSANTARA', 1007, '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id`, `level`) VALUES
(1, 'Admin'),
(2, 'Master Monitoring'),
(3, 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `id_level`, `username`, `password`, `token`) VALUES
(1, 1, 'admin', '$2y$10$jBIgUkAzaeWJ1d/05MXLG.Dy6sBwvnYrUujKCMii1yvPaP6TiTFnq', '$2y$10$bHJ/54aEDZDhZobkA6ZZaujU.M/2cckYHlwMTCk0p04q744VjI4Ei'),
(2, 3, 'petugas_test', '$2y$10$kHkbdIZMohk.XXPIHcEaDOuuduBFaTkOxyDvzHn5hX8zNlW11A9Pq', '$2y$10$ba2AnOiECdSmeZu0eULJsuzmhIt90RwOdK9TvMEvSazrO1hojZUfa'),
(3, 2, 'master_monitor', '$2y$10$UVN6xIYrkZXLRv7a0IO7Neb8PiwSYNHdjcNj/ZORP1izBQBrX.a/q', '$2y$10$S9rnBcPPsEess98lef6BmegAmUs4tgkVzn19HGpWd7boIZ2IZIal.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id`, `id_user`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sandar`
--

CREATE TABLE `tbl_sandar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `id_dermaga` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu_awal` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `akumulasi_menit` varchar(50) NOT NULL,
  `total_call` float NOT NULL,
  `total_sandar` double NOT NULL,
  `shift` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanki`
--

CREATE TABLE `tbl_tanki` (
  `id` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `id_jenis_tanki` int(11) NOT NULL,
  `tinggi` float NOT NULL,
  `liter` float NOT NULL,
  `tinggi_maksimum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tanki`
--

INSERT INTO `tbl_tanki` (`id`, `id_kapal`, `id_jenis_tanki`, `tinggi`, `liter`, `tinggi_maksimum`) VALUES
(1, 1, 1, 159, 3500, 159),
(2, 1, 2, 137, 3000, 137),
(3, 1, 3, 183, 43870, 183),
(4, 1, 4, 183, 43870, 183),
(5, 74, 1, 80, 1200, 80),
(6, 74, 2, 80, 1200, 80),
(7, 74, 3, 80, 20000, 80),
(8, 74, 4, 80, 20000, 80),
(9, 75, 3, 1, 52, 144),
(10, 75, 4, 1, 52, 144),
(11, 75, 1, 83.3, 250, 83.3),
(12, 75, 2, 83.3, 250, 83.3),
(13, 76, 4, 88, 30800, 88),
(14, 76, 7, 99, 1920, 99),
(15, 76, 6, 102, 1860, 102),
(16, 76, 8, 181, 1920, 181),
(17, 77, 4, 97.6, 35200, 97.6),
(18, 77, 6, 102.19, 1860, 102.19),
(19, 77, 7, 101.58, 1920, 101.58),
(20, 77, 8, 320, 1920, 320),
(21, 78, 3, 205, 8000, 205),
(22, 78, 4, 205, 8000, 205),
(25, 78, 11, 120, 720, 120),
(26, 79, 12, 183, 12770, 183),
(27, 79, 1, 182, 700, 182),
(28, 79, 2, 182, 700, 182),
(29, 80, 13, 163, 17970, 163),
(30, 80, 14, 189, 64090, 189),
(31, 80, 15, 159, 64090, 159),
(32, 80, 16, 135, 5500, 135),
(33, 80, 17, 166, 2500, 166),
(34, 81, 3, 324, 29000, 324),
(35, 81, 4, 324, 29000, 324),
(36, 81, 7, 290, 2900, 290),
(37, 81, 6, 290, 2900, 290),
(38, 81, 8, 69, 250, 69),
(39, 82, 3, 220, 20000, 220),
(40, 82, 4, 220, 20000, 220),
(41, 82, 2, 122, 1500, 122),
(42, 82, 1, 122, 1500, 122),
(43, 83, 3, 278, 8000, 278),
(44, 83, 4, 278, 8000, 278),
(45, 83, 11, 130, 990, 130),
(46, 83, 18, 67, 100, 67),
(47, 84, 3, 380.76, 10850, 380.76),
(48, 84, 4, 380.76, 10850, 380.76),
(49, 84, 2, 55, 600, 55),
(50, 85, 19, 108, 5900, 108),
(51, 85, 16, 108, 5900, 108),
(52, 85, 17, 133, 2400, 133),
(53, 85, 18, 67, 100, 67),
(54, 87, 20, 630, 172200, 630),
(55, 87, 10, 301, 24100, 301),
(56, 87, 8, 219, 3400, 219),
(57, 87, 21, 49, 350, 49),
(58, 87, 22, 95, 800, 95),
(59, 88, 23, 353, 70500, 353),
(60, 88, 10, 123, 1650, 123),
(61, 88, 25, 73, 1650, 73),
(62, 88, 24, 48, 240, 48),
(63, 89, 26, 393, 29800, 393),
(64, 89, 27, 393, 29800, 393),
(65, 89, 28, 158, 1900, 158),
(66, 89, 29, 158, 1900, 158),
(67, 90, 34, 250, 5000, 250),
(68, 90, 35, 250, 5000, 250),
(69, 90, 36, 100, 500, 100),
(70, 91, 37, 178, 28430, 178),
(71, 91, 38, 238, 28430, 238),
(72, 91, 16, 250, 11000, 250),
(73, 91, 19, 184, 11000, 184),
(74, 91, 39, 157, 5500, 157),
(75, 91, 40, 155, 5500, 155),
(76, 92, 23, 222, 81496, 222),
(77, 92, 25, 130, 3120, 130),
(78, 92, 8, 49, 112, 49),
(79, 92, 9, 49, 112, 49),
(80, 92, 21, 68, 158, 68),
(81, 92, 41, 180, 3780, 180),
(82, 93, 3, 114, 6500, 114),
(83, 93, 1, 114, 6500, 114),
(84, 93, 11, 83, 600, 83),
(85, 93, 42, 25, 200, 25),
(86, 93, 18, 31, 50, 31),
(87, 93, 36, 38, 150, 38),
(88, 94, 3, 147, 18600, 147),
(89, 94, 4, 147, 18600, 147),
(90, 94, 10, 100, 1500, 100),
(91, 95, 4, 80, 6000, 80),
(92, 95, 3, 80, 6000, 80),
(93, 95, 10, 75, 900, 75),
(94, 95, 8, 79, 750, 79),
(95, 96, 2, 152, 1000, 152),
(96, 96, 1, 152, 1000, 152),
(97, 97, 23, 276, 25450, 276),
(98, 97, 35, 90, 1200, 90),
(99, 97, 34, 90, 1200, 90),
(100, 98, 26, 149, 13260, 149),
(101, 98, 27, 133, 13260, 133),
(102, 98, 16, 104, 900, 104),
(103, 98, 17, 103, 1051, 103),
(104, 98, 43, 102, 1109, 102),
(105, 85, 14, 261, 52100, 261);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_jenis_kelamin` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_login`, `id_jenis_kelamin`, `nama`, `regu`) VALUES
(1, 1, 1, 'Yulianto', '0'),
(2, 2, 1, 'SASKIA', '1'),
(3, 3, 1, 'YULIANTO', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_air_tawar`
--
ALTER TABLE `tbl_air_tawar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kapal` (`id_kapal`);

--
-- Indexes for table `tbl_dermaga`
--
ALTER TABLE `tbl_dermaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_dokumen` (`id_jenis_dokumen`),
  ADD KEY `id_kapal` (`id_kapal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_history_tanki`
--
ALTER TABLE `tbl_history_tanki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_history_tanki_ibfk_2` (`id_user`),
  ADD KEY `tbl_history_tanki_ibfk_1` (`id_tanki`);

--
-- Indexes for table `tbl_jenis_dokumen`
--
ALTER TABLE `tbl_jenis_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_kelamin`
--
ALTER TABLE `tbl_jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_tanki`
--
ALTER TABLE `tbl_jenis_tanki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kabid`
--
ALTER TABLE `tbl_kabid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User Kabid` (`id_user`);

--
-- Indexes for table `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `Level` (`id_level`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User Petugas` (`id_user`);

--
-- Indexes for table `tbl_sandar`
--
ALTER TABLE `tbl_sandar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_tanki`
--
ALTER TABLE `tbl_tanki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_tanki_ibfk_1` (`id_kapal`),
  ADD KEY `tbl_tanki_ibfk_2` (`id_jenis_tanki`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User Login` (`id_login`),
  ADD KEY `User Jenis Kelamin` (`id_jenis_kelamin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_air_tawar`
--
ALTER TABLE `tbl_air_tawar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dermaga`
--
ALTER TABLE `tbl_dermaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_history_tanki`
--
ALTER TABLE `tbl_history_tanki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jenis_dokumen`
--
ALTER TABLE `tbl_jenis_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_jenis_kelamin`
--
ALTER TABLE `tbl_jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jenis_tanki`
--
ALTER TABLE `tbl_jenis_tanki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_kabid`
--
ALTER TABLE `tbl_kabid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sandar`
--
ALTER TABLE `tbl_sandar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tanki`
--
ALTER TABLE `tbl_tanki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_air_tawar`
--
ALTER TABLE `tbl_air_tawar`
  ADD CONSTRAINT `tbl_air_tawar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_air_tawar_ibfk_2` FOREIGN KEY (`id_kapal`) REFERENCES `tbl_kapal` (`id`);

--
-- Constraints for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD CONSTRAINT `tbl_dokumen_ibfk_1` FOREIGN KEY (`id_jenis_dokumen`) REFERENCES `tbl_jenis_dokumen` (`id`),
  ADD CONSTRAINT `tbl_dokumen_ibfk_2` FOREIGN KEY (`id_kapal`) REFERENCES `tbl_kapal` (`id`),
  ADD CONSTRAINT `tbl_dokumen_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_history_tanki`
--
ALTER TABLE `tbl_history_tanki`
  ADD CONSTRAINT `tbl_history_tanki_ibfk_1` FOREIGN KEY (`id_tanki`) REFERENCES `tbl_tanki` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_history_tanki_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kabid`
--
ALTER TABLE `tbl_kabid`
  ADD CONSTRAINT `User Kabid` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `Level` FOREIGN KEY (`id_level`) REFERENCES `tbl_level` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD CONSTRAINT `User Petugas` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sandar`
--
ALTER TABLE `tbl_sandar`
  ADD CONSTRAINT `tbl_sandar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tanki`
--
ALTER TABLE `tbl_tanki`
  ADD CONSTRAINT `tbl_tanki_ibfk_1` FOREIGN KEY (`id_kapal`) REFERENCES `tbl_kapal` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tanki_ibfk_2` FOREIGN KEY (`id_jenis_tanki`) REFERENCES `tbl_jenis_tanki` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `User Jenis Kelamin` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `tbl_jenis_kelamin` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `User Login` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
