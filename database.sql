-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 28, 2022 at 08:03 AM
-- Server version: 5.7.34
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_2022_asdp_ternate`
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
(1, 'Tanki Harian'),
(2, 'Tanki Induk Kiri'),
(3, 'Tanki Induk Kanan');

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
(1, 'LOMPA', '-', 500, '-', ''),
(2, 'ARIWANGAN', '-', 157, '-', ''),
(3, 'BANDENG', '-', 401, '-', ''),
(4, 'BARONANG', '-', 526, '-', ''),
(5, 'KERAPU II', '-', 335, '-', ''),
(6, 'PULAU SAGORI', '-', 380, '-', ''),
(7, 'TUNA', '-', 718, '-', ''),
(8, 'BOBARA', '-', 475, '-', ''),
(9, 'GORANGO', '-', 617, '-', ''),
(10, 'NGAFI', '-', 380, '-', ''),
(11, 'MAMING', '-', 598, '-', ''),
(12, 'PORTLINK VIII', '-', 2125, '-', '');

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
(3, 2, 'master_monitor', '$2y$10$UVN6xIYrkZXLRv7a0IO7Neb8PiwSYNHdjcNj/ZORP1izBQBrX.a/q', '$2y$10$S9rnBcPPsEess98lef6BmegAmUs4tgkVzn19HGpWd7boIZ2IZIal.'),
(7, 3, 'ipank', '$2y$10$nhGeI0iZw.JsvUGHx3Q0U.3/PhDYNPbCWjtABVwCqtWzZwj1sS/Au', '$2y$10$t.pL5kHovNfIVy/Hbe7gN.kDgRmvgs0Jl88snpQ9ksb7fBxBHQ5fu');

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
(1, 2),
(3, 5);

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
(27, 1, 1, 1, 100, 300),
(28, 1, 2, 1, 150, 400),
(29, 1, 3, 1, 150, 400),
(30, 2, 1, 1.4, 0.6, 30),
(32, 2, 2, 1.4, 0.6, 30),
(33, 2, 3, 1.4, 0.6, 30),
(34, 3, 1, 1.4, 0.6, 30),
(35, 3, 3, 1.4, 0.6, 30),
(36, 3, 2, 1.4, 0.6, 30);

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
(1, 1, 1, 'Administrator', '0'),
(2, 2, 1, 'M. Ikbal', '1'),
(3, 3, 1, 'Pimpinan ASDP', '0'),
(5, 7, 1, 'Rivaldi', '1');

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
-- Indexes for table `tbl_history_tanki`
--
ALTER TABLE `tbl_history_tanki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_history_tanki_ibfk_2` (`id_user`),
  ADD KEY `tbl_history_tanki_ibfk_1` (`id_tanki`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_history_tanki`
--
ALTER TABLE `tbl_history_tanki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jenis_kelamin`
--
ALTER TABLE `tbl_jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jenis_tanki`
--
ALTER TABLE `tbl_jenis_tanki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kabid`
--
ALTER TABLE `tbl_kabid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
