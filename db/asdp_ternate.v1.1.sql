-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2023 pada 13.54
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asdp_ternate`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_air_tawar`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_air_tawar`
--

INSERT INTO `tbl_air_tawar` (`id`, `id_user`, `id_kapal`, `id_dermaga`, `shift`, `tgl`, `waktu`, `debit_air`, `total_air_tawar`, `status`) VALUES
(1, 2, 1, 1, 1, '2022-11-13', '09:36:55', 12000, 600000, 'Lunas'),
(2, 2, 1, 2, 1, '2022-11-13', '09:37:30', 15000, 750000, 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dermaga`
--

CREATE TABLE `tbl_dermaga` (
  `id` int(11) NOT NULL,
  `dermaga` varchar(255) NOT NULL,
  `tarif` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_dermaga`
--

INSERT INTO `tbl_dermaga` (`id`, `dermaga`, `tarif`) VALUES
(1, 'Dermaga 1', 150),
(2, 'Dermaga 2', 85);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokumen`
--

CREATE TABLE `tbl_dokumen` (
  `id` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `id_jenis_dokumen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_dokumen`
--

INSERT INTO `tbl_dokumen` (`id`, `id_kapal`, `id_jenis_dokumen`, `id_user`, `tgl_berlaku`) VALUES
(1, 1, 3, 2, '2023-01-14'),
(2, 1, 2, 2, '2022-12-07'),
(3, 1, 7, 2, '2022-12-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_history_tanki`
--

CREATE TABLE `tbl_history_tanki` (
  `id` int(11) NOT NULL,
  `id_tanki` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `tgl` date NOT NULL,
  `liter` float NOT NULL,
  `tinggi_bbm` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_history_tanki`
--

INSERT INTO `tbl_history_tanki` (`id`, `id_tanki`, `id_user`, `waktu`, `tgl`, `liter`, `tinggi_bbm`) VALUES
(1, 3, 2, '21:29:22', '2022-11-13', 45, 30),
(2, 4, 2, '21:29:47', '2022-11-13', 45, 30),
(3, 2, 2, '21:30:15', '2022-11-13', 45, 30),
(4, 2, 2, '21:30:45', '2022-11-13', 45, 30),
(5, 1, 2, '21:31:40', '2022-11-13', 45, 30),
(6, 1, 2, '14:39:06', '2022-11-14', 42, 28),
(7, 2, 2, '14:39:43', '2022-11-14', 37.5, 25),
(8, 4, 2, '14:42:36', '2022-11-14', 33, 22),
(9, 3, 2, '14:42:59', '2022-11-14', 39, 26),
(10, 1, 2, '16:13:22', '2022-11-23', 36, 24),
(11, 1, 2, '17:06:49', '2022-11-25', 30, 20),
(12, 2, 2, '17:11:49', '2022-11-25', 33, 22),
(13, 1, 2, '17:16:10', '2022-11-25', 36, 24),
(14, 1, 2, '15:23:40', '2022-12-15', 30, 20),
(15, 1, 2, '17:33:10', '2022-12-15', 30, 20),
(16, 7, 2, '14:12:58', '2023-01-11', 3875, 15.5),
(17, 8, 2, '14:15:41', '2023-01-11', 2.5, 0.01),
(18, 5, 2, '14:17:00', '2023-01-11', 1200, 80),
(19, 6, 2, '14:17:38', '2023-01-11', 1200, 80),
(20, 9, 2, '18:36:02', '2023-01-11', 2864.58, 55),
(21, 10, 2, '18:37:10', '2023-01-11', 2604.17, 50),
(22, 12, 2, '18:38:20', '2023-01-11', 210.843, 70),
(23, 11, 2, '18:38:52', '2023-01-11', 210, 70),
(24, 13, 2, '00:26:57', '2023-01-12', 10500, 30),
(25, 15, 2, '00:27:45', '2023-01-12', 1002.94, 55),
(26, 14, 2, '00:28:36', '2023-01-12', 1202.42, 62),
(27, 16, 2, '00:29:11', '2023-01-12', 636.464, 60),
(28, 13, 2, '10:46:53', '2023-01-12', 8750, 25),
(29, 13, 2, '11:09:53', '2023-01-12', 8981, 25.66),
(30, 15, 2, '12:00:36', '2023-01-12', 1174.35, 64.4),
(31, 14, 2, '12:02:45', '2023-01-12', 1478.38, 76.6),
(32, 16, 2, '12:03:38', '2023-01-12', 498.564, 47),
(33, 15, 2, '12:07:54', '2023-01-12', 1173.99, 64.38),
(34, 17, 2, '13:13:38', '2023-01-12', 12650.2, 34.86),
(35, 18, 2, '13:15:13', '2023-01-12', 1500.04, 82.26),
(36, 19, 2, '13:25:55', '2023-01-12', 1499.98, 79.296),
(37, 20, 2, '13:30:03', '2023-01-12', 716.04, 119.34),
(38, 9, 2, '13:32:18', '2023-01-12', 2600, 50),
(39, 10, 2, '13:32:55', '2023-01-12', 2340, 45),
(40, 12, 2, '13:33:50', '2023-01-12', 210.843, 70),
(41, 11, 2, '13:34:26', '2023-01-12', 210.843, 70),
(42, 11, 2, '13:46:39', '2023-01-12', 210.084, 70),
(43, 12, 2, '13:47:16', '2023-01-12', 210.084, 70),
(44, 17, 2, '17:29:49', '2023-01-12', 11612.4, 32),
(45, 17, 2, '17:36:02', '2023-01-12', 11541, 32),
(46, 18, 2, '17:49:07', '2023-01-12', 1499.98, 82.41),
(47, 19, 2, '17:50:20', '2023-01-12', 1500.01, 79.36),
(48, 20, 2, '17:51:28', '2023-01-12', 891, 148.5),
(49, 17, 2, '17:56:59', '2023-01-12', 11540, 31.9974),
(50, 8, 2, '18:00:37', '2023-01-12', 25, 0.1),
(51, 8, 2, '18:01:40', '2023-01-12', 0.025, 0.0001),
(52, 7, 2, '18:03:53', '2023-01-12', 3877, 15.508),
(53, 21, 2, '12:30:09', '2023-01-13', 3024.39, 77.5),
(54, 22, 2, '12:30:37', '2023-01-13', 3024.39, 77.5),
(55, 25, 2, '12:37:49', '2023-01-13', 438, 73),
(56, 25, 2, '12:39:15', '2023-01-13', 439.8, 73.3),
(57, 25, 2, '12:40:45', '2023-01-13', 439.02, 73.17),
(58, 26, 2, '12:56:44', '2023-01-13', 2062.04, 29.55),
(59, 27, 2, '12:57:12', '2023-01-13', 700, 182),
(60, 28, 2, '12:57:36', '2023-01-13', 700, 182),
(61, 9, 2, '13:08:44', '2023-01-13', 2288, 44),
(62, 10, 2, '13:09:10', '2023-01-13', 2080, 40),
(63, 29, 2, '16:28:03', '2023-01-13', 550.125, 4.99),
(64, 30, 2, '16:32:31', '2023-01-13', 6460.03, 19.0505),
(65, 31, 2, '16:36:17', '2023-01-13', 2830.04, 7.021),
(66, 32, 2, '16:38:31', '2023-01-13', 1730.04, 109.779),
(67, 33, 2, '16:41:17', '2023-01-13', 1732.05, 115.008),
(68, 32, 2, '16:47:32', '2023-01-13', 1732.04, 109.906),
(69, 33, 2, '16:54:06', '2023-01-13', 1732, 115.005),
(70, 29, 2, '16:58:18', '2023-01-13', 550.014, 4.989),
(71, 32, 2, '18:07:49', '2023-01-13', 4499.98, 110.454),
(72, 17, 2, '18:21:44', '2023-01-13', 7740.03, 21.461),
(73, 20, 2, '18:24:50', '2023-01-13', 691.02, 115.17),
(74, 9, 2, '18:31:52', '2023-01-13', 2288, 44),
(75, 10, 2, '18:32:36', '2023-01-13', 2080, 40),
(76, 12, 2, '18:33:10', '2023-01-13', 210.084, 70),
(77, 11, 2, '18:33:52', '2023-01-13', 210.084, 70),
(78, 1, 2, '19:47:13', '2023-01-13', 814.465, 37),
(79, 2, 2, '19:47:51', '2023-01-13', 854.015, 39),
(80, 3, 2, '19:48:46', '2023-01-13', 1.5, 1),
(81, 4, 2, '19:49:28', '2023-01-13', 0.15, 0.1),
(82, 3, 2, '19:50:04', '2023-01-13', 0.15, 0.1),
(83, 1, 2, '19:53:11', '2023-01-13', 1534.28, 69.7),
(84, 2, 2, '19:55:42', '2023-01-13', 1572.26, 71.8),
(85, 1, 2, '19:57:34', '2023-01-13', 814.025, 36.98),
(86, 2, 2, '19:59:22', '2023-01-13', 852.044, 38.91),
(87, 3, 2, '20:07:23', '2023-01-13', 720.043, 3.0036),
(88, 4, 2, '20:08:19', '2023-01-13', 720.043, 3.0036),
(89, 34, 2, '22:33:13', '2023-01-13', 2500, 27.931),
(90, 35, 2, '22:35:06', '2023-01-13', 2500, 27.931),
(91, 36, 2, '22:36:43', '2023-01-13', 1465, 146.5),
(92, 37, 2, '22:37:27', '2023-01-13', 1470, 147),
(93, 38, 2, '22:39:28', '2023-01-13', 225, 62.1),
(94, 40, 2, '10:37:20', '2023-01-14', 880, 10.516),
(95, 39, 2, '10:38:11', '2023-01-14', 0.083682, 0.001),
(96, 41, 2, '10:40:25', '2023-01-14', 1499.98, 121.95),
(97, 42, 2, '10:41:40', '2023-01-14', 1499.98, 121.95),
(98, 43, 2, '11:17:29', '2023-01-14', 2040, 70.89),
(99, 44, 2, '11:18:31', '2023-01-14', 2040, 70.89),
(100, 45, 2, '11:19:53', '2023-01-14', 549.983, 72.22),
(101, 46, 2, '11:20:38', '2023-01-14', 100, 67),
(102, 47, 2, '11:38:18', '2023-01-14', 282.989, 15.91),
(103, 48, 2, '11:39:13', '2023-01-14', 265.025, 14.9),
(104, 49, 2, '11:41:28', '2023-01-14', 468.982, 42.99),
(105, 21, 2, '11:50:11', '2023-01-14', 5650.97, 144.806),
(106, 21, 2, '11:53:05', '2023-01-14', 2829.27, 72.5),
(107, 22, 2, '11:57:11', '2023-01-14', 2825.37, 72.4),
(108, 21, 2, '11:58:21', '2023-01-14', 2825.37, 72.4),
(109, 25, 2, '11:59:32', '2023-01-14', 438, 73),
(110, 9, 2, '12:25:36', '2023-01-14', 1976, 38),
(111, 10, 2, '12:26:36', '2023-01-14', 1820, 35),
(112, 12, 2, '12:32:12', '2023-01-14', 210.084, 70),
(113, 11, 2, '12:32:38', '2023-01-14', 210.084, 70),
(114, 1, 2, '12:52:38', '2023-01-14', 814.025, 36.98),
(115, 2, 2, '12:53:41', '2023-01-14', 852.044, 38.91),
(116, 4, 2, '12:56:08', '2023-01-14', 719.9, 3.003),
(117, 3, 2, '12:56:35', '2023-01-14', 719.9, 3.003),
(118, 51, 2, '19:36:39', '2023-01-14', 3263.03, 59.73),
(119, 50, 2, '19:37:23', '2023-01-14', 3263.03, 59.73),
(120, 52, 2, '19:38:28', '2023-01-14', 2039.1, 113),
(121, 53, 2, '19:39:24', '2023-01-14', 50, 33.5),
(122, 52, 2, '19:43:25', '2023-01-14', 2034.05, 112.72),
(123, 52, 2, '19:44:31', '2023-01-14', 2034.05, 112.72),
(124, 39, 2, '19:53:28', '2023-01-14', 2000, 23.9),
(125, 40, 2, '19:56:59', '2023-01-14', 1960, 23.422),
(126, 30, 2, '20:12:08', '2023-01-14', 12280, 36.2134),
(127, 31, 2, '20:13:37', '2023-01-14', 0.00403082, 0.00001),
(128, 32, 2, '20:16:26', '2023-01-14', 4092, 100.44),
(129, 33, 2, '20:18:29', '2023-01-14', 1800, 119.52),
(130, 54, 2, '21:15:25', '2023-01-14', 7380, 27),
(131, 55, 2, '21:17:31', '2023-01-14', 6159.99, 76.936),
(132, 56, 2, '21:18:54', '2023-01-14', 1840.97, 118.58),
(133, 57, 2, '21:20:34', '2023-01-14', 300, 42),
(134, 58, 2, '21:24:23', '2023-01-14', 600, 75),
(135, 59, 2, '22:18:51', '2023-01-14', 10797.1, 54.062),
(136, 60, 2, '22:20:19', '2023-01-14', 1575.01, 117.41),
(137, 61, 2, '22:21:48', '2023-01-14', 832.007, 36.81),
(138, 62, 2, '22:22:11', '2023-01-14', 160, 32),
(139, 63, 2, '22:51:37', '2023-01-14', 1591, 20.982),
(140, 64, 2, '22:52:12', '2023-01-14', 1591, 20.982),
(141, 65, 2, '22:53:12', '2023-01-14', 499.043, 42.55),
(142, 66, 2, '22:54:21', '2023-01-14', 499.043, 42.55),
(143, 34, 2, '09:15:31', '2023-01-15', 2000.02, 22.345),
(144, 35, 2, '09:16:46', '2023-01-15', 2000.02, 22.345),
(145, 17, 2, '21:25:54', '2023-01-15', 5420.04, 15.0283),
(146, 18, 2, '21:27:16', '2023-01-15', 1499.98, 82.41),
(147, 19, 2, '21:28:49', '2023-01-15', 1500.01, 79.36),
(148, 20, 2, '21:30:39', '2023-01-15', 646.02, 107.67),
(149, 1, 2, '21:37:55', '2023-01-15', 814.025, 36.98),
(150, 2, 2, '21:39:16', '2023-01-15', 852.044, 38.91),
(151, 4, 2, '21:39:49', '2023-01-15', 719.18, 3),
(152, 4, 2, '21:40:45', '2023-01-15', 719.18, 3),
(153, 3, 2, '21:41:18', '2023-01-15', 719.18, 3),
(154, 9, 2, '21:43:55', '2023-01-15', 1716, 33),
(155, 10, 2, '21:44:28', '2023-01-15', 1560, 30),
(156, 12, 2, '21:45:13', '2023-01-15', 210.084, 70),
(157, 11, 2, '21:46:14', '2023-01-15', 210.084, 70),
(158, 13, 2, '21:50:01', '2023-01-15', 14356, 41.017),
(159, 14, 2, '21:52:56', '2023-01-15', 1500.04, 77.346),
(160, 15, 2, '21:55:30', '2023-01-15', 1440.95, 79.02),
(161, 16, 2, '21:57:20', '2023-01-15', 636.04, 59.96),
(162, 25, 2, '22:03:33', '2023-01-15', 451.02, 75.17),
(163, 22, 2, '22:08:50', '2023-01-15', 2626.5, 67.304),
(164, 21, 2, '22:09:32', '2023-01-15', 2626.5, 67.304),
(165, 26, 2, '22:15:52', '2023-01-15', 5531.99, 79.276),
(166, 28, 2, '22:16:37', '2023-01-15', 700, 182),
(167, 27, 2, '22:17:05', '2023-01-15', 700, 182),
(168, 29, 2, '22:18:19', '2023-01-15', 551.227, 5),
(169, 30, 2, '22:21:50', '2023-01-15', 11359.9, 33.5),
(170, 32, 2, '22:27:32', '2023-01-15', 4344.02, 106.626),
(171, 33, 2, '22:29:34', '2023-01-15', 1676.2, 111.3),
(172, 31, 2, '22:30:47', '2023-01-15', 0.0403082, 0.0001),
(173, 36, 2, '22:36:46', '2023-01-15', 1125, 112.5),
(174, 37, 2, '22:37:33', '2023-01-15', 1125, 112.5),
(175, 38, 2, '22:39:39', '2023-01-15', 235, 64.86),
(176, 54, 2, '22:42:49', '2023-01-15', 4701.33, 17.2),
(177, 55, 2, '22:44:43', '2023-01-15', 6400.03, 79.934),
(178, 56, 2, '22:46:47', '2023-01-15', 3255.77, 209.71),
(179, 57, 2, '22:48:09', '2023-01-15', 300.021, 42.003),
(180, 58, 2, '22:50:07', '2023-01-15', 600, 71.25),
(181, 39, 2, '09:00:59', '2023-01-16', 1000, 11.95),
(182, 40, 2, '09:03:57', '2023-01-16', 960, 11.472),
(183, 41, 2, '09:05:20', '2023-01-16', 1499.98, 121.95),
(184, 42, 2, '09:06:23', '2023-01-16', 1499.98, 121.95),
(185, 13, 2, '11:27:20', '2023-01-16', 7800.1, 22.286),
(186, 15, 2, '11:31:04', '2023-01-16', 1277.02, 70.03),
(187, 14, 2, '11:34:02', '2023-01-16', 1324.99, 68.32),
(188, 16, 2, '11:35:23', '2023-01-16', 550.966, 51.94),
(189, 26, 2, '11:43:49', '2023-01-16', 5292.01, 75.837),
(190, 27, 2, '11:44:47', '2023-01-16', 700, 182),
(191, 28, 2, '11:45:15', '2023-01-16', 700, 182),
(192, 21, 2, '11:52:18', '2023-01-16', 2427.04, 62.193),
(193, 21, 2, '11:55:20', '2023-01-16', 2427.51, 62.205),
(194, 22, 2, '11:56:06', '2023-01-16', 2427.51, 62.205),
(195, 25, 2, '11:58:29', '2023-01-16', 456.96, 76.16),
(196, 43, 2, '12:01:27', '2023-01-16', 1000, 34.75),
(197, 44, 2, '12:02:22', '2023-01-16', 1000, 34.75),
(198, 45, 2, '12:04:33', '2023-01-16', 660.025, 86.67),
(199, 46, 2, '12:04:57', '2023-01-16', 100, 67),
(200, 29, 2, '14:37:59', '2023-01-16', 551.227, 5),
(201, 30, 2, '14:41:30', '2023-01-16', 8749.98, 25.8035),
(202, 32, 2, '14:43:55', '2023-01-16', 4226.04, 103.73),
(203, 33, 2, '14:45:59', '2023-01-16', 1800, 119.52),
(204, 9, 2, '14:49:50', '2023-01-16', 1404, 27),
(205, 10, 2, '14:50:15', '2023-01-16', 1300, 25),
(206, 67, 2, '15:19:12', '2023-01-16', 3000, 150),
(207, 68, 2, '15:19:40', '2023-01-16', 3016, 150.8),
(208, 69, 2, '15:20:14', '2023-01-16', 100, 20),
(209, 70, 2, '16:00:01', '2023-01-16', 8000.01, 50.088),
(210, 71, 2, '16:01:31', '2023-01-16', 4175.98, 34.959),
(211, 72, 2, '16:02:05', '2023-01-16', 3300, 75),
(212, 73, 2, '16:03:29', '2023-01-16', 4599.97, 76.945),
(213, 74, 2, '16:06:28', '2023-01-16', 1710.04, 48.814),
(214, 75, 2, '16:08:42', '2023-01-16', 1629.03, 45.909),
(215, 34, 2, '18:06:11', '2023-01-16', 1200.01, 13.407),
(216, 35, 2, '18:08:09', '2023-01-16', 999.963, 11.172),
(217, 36, 2, '18:08:45', '2023-01-16', 1180, 118),
(218, 37, 2, '18:09:14', '2023-01-16', 1200, 120),
(219, 38, 2, '18:10:54', '2023-01-16', 130.036, 35.89),
(220, 63, 2, '18:15:26', '2023-01-16', 957.012, 12.621),
(221, 64, 2, '18:17:00', '2023-01-16', 957.012, 12.621),
(222, 65, 2, '18:19:19', '2023-01-16', 353.025, 30.1),
(223, 66, 2, '18:19:55', '2023-01-16', 353.025, 30.1),
(224, 29, 2, '18:22:53', '2023-01-16', 551.227, 5),
(225, 30, 2, '18:25:32', '2023-01-16', 10470.1, 30.876),
(226, 31, 2, '18:26:47', '2023-01-16', 0.00403082, 0.00001),
(227, 32, 2, '18:29:02', '2023-01-16', 4094.04, 100.49),
(228, 33, 2, '18:31:08', '2023-01-16', 1700, 112.88),
(229, 29, 2, '18:32:21', '2023-01-16', 550.014, 4.989),
(230, 76, 2, '19:16:32', '2023-01-16', 2576.04, 7.0173),
(231, 77, 2, '19:18:07', '2023-01-16', 2652.96, 110.283),
(232, 78, 2, '19:19:10', '2023-01-16', 56.0465, 24.1),
(233, 79, 2, '19:26:37', '2023-01-16', 86.0465, 37),
(234, 80, 2, '19:27:02', '2023-01-16', 100, 43),
(235, 81, 2, '19:28:44', '2023-01-16', 3150, 149.92),
(236, 77, 2, '19:55:21', '2023-01-16', 551.964, 22.945),
(237, 78, 2, '19:56:49', '2023-01-16', 109.029, 47.7),
(238, 79, 2, '19:57:27', '2023-01-16', 112, 49),
(239, 80, 2, '19:58:56', '2023-01-16', 100.005, 43.04),
(240, 81, 2, '20:00:51', '2023-01-16', 561, 26.7),
(241, 82, 2, '20:31:20', '2023-01-16', 2749.96, 48.23),
(242, 83, 2, '20:32:14', '2023-01-16', 2600, 45.6),
(243, 84, 2, '20:33:53', '2023-01-16', 568.988, 78.71),
(244, 85, 2, '20:34:33', '2023-01-16', 200, 25),
(245, 86, 2, '20:36:09', '2023-01-16', 49.9839, 30.99),
(246, 87, 2, '20:36:36', '2023-01-16', 150, 38),
(247, 26, 2, '10:45:28', '2023-01-17', 4045.02, 57.967),
(248, 28, 2, '10:46:11', '2023-01-17', 700, 182),
(249, 27, 2, '10:48:04', '2023-01-17', 700, 182),
(250, 76, 2, '10:56:14', '2023-01-17', 2576.04, 7.0173),
(251, 77, 2, '10:58:47', '2023-01-17', 552.012, 22.947),
(252, 78, 2, '10:59:58', '2023-01-17', 109.029, 47.7),
(253, 79, 2, '11:01:10', '2023-01-17', 85.9657, 37.61),
(254, 80, 2, '11:03:10', '2023-01-17', 77.025, 33.15),
(255, 81, 2, '11:05:49', '2023-01-17', 500.992, 23.844),
(256, 21, 2, '11:13:57', '2023-01-17', 2228.29, 57.1),
(257, 22, 2, '11:15:09', '2023-01-17', 2228.29, 57.1),
(258, 25, 2, '11:15:39', '2023-01-17', 456, 76),
(259, 82, 2, '12:25:48', '2023-01-17', 2160, 37.883),
(260, 83, 2, '12:32:31', '2023-01-17', 2049.95, 35.953),
(261, 84, 2, '12:34:31', '2023-01-17', 567.036, 78.44),
(262, 85, 2, '12:35:22', '2023-01-17', 200, 25),
(263, 86, 2, '12:35:59', '2023-01-17', 50, 31),
(264, 87, 2, '12:36:23', '2023-01-17', 150, 38),
(265, 88, 2, '12:49:21', '2023-01-17', 6328.05, 50.012),
(266, 90, 2, '12:50:59', '2023-01-17', 1045, 69.35),
(267, 91, 2, '13:10:43', '2023-01-17', 2599.95, 34.666),
(268, 92, 2, '13:14:25', '2023-01-17', 1620, 21.6),
(269, 93, 2, '13:15:33', '2023-01-17', 646.013, 55.27),
(270, 94, 2, '13:16:43', '2023-01-17', 549.968, 57.93),
(271, 95, 2, '13:28:24', '2023-01-17', 660, 100.32),
(272, 96, 2, '13:30:28', '2023-01-17', 505, 76.76),
(273, 47, 2, '13:47:28', '2023-01-17', 2526, 101.04),
(274, 48, 2, '13:49:36', '2023-01-17', 2434, 97.36),
(275, 49, 2, '13:51:46', '2023-01-17', 565.091, 51.8),
(276, 34, 2, '14:01:15', '2023-01-17', 1200.01, 13.407),
(277, 35, 2, '14:03:51', '2023-01-17', 999.963, 11.172),
(278, 36, 2, '14:04:19', '2023-01-17', 1100, 110),
(279, 37, 2, '14:04:47', '2023-01-17', 1200, 120),
(280, 38, 2, '14:06:17', '2023-01-17', 140.036, 38.65),
(281, 97, 2, '18:17:45', '2023-01-17', 3230.03, 35.029),
(282, 98, 2, '18:18:38', '2023-01-17', 800.036, 74.67),
(283, 99, 2, '18:20:30', '2023-01-17', 714.964, 66.73),
(284, 100, 2, '18:48:49', '2023-01-17', 5599.99, 62.926),
(285, 101, 2, '18:50:48', '2023-01-17', 9200.05, 92.278),
(286, 102, 2, '18:51:53', '2023-01-17', 865.038, 99.96),
(287, 103, 2, '18:53:12', '2023-01-17', 870.034, 92.54),
(288, 104, 2, '18:54:06', '2023-01-17', 798, 79.8),
(289, 104, 2, '18:55:20', '2023-01-17', 796, 79.6),
(290, 39, 2, '19:42:37', '2023-01-17', 910.042, 10.875),
(291, 40, 2, '19:45:12', '2023-01-17', 865.021, 10.337),
(292, 41, 2, '19:46:56', '2023-01-17', 1499.98, 121.95),
(293, 42, 2, '19:47:37', '2023-01-17', 1499.98, 121.95),
(294, 54, 2, '19:58:15', '2023-01-17', 9999.96, 36.5852),
(295, 55, 2, '20:00:46', '2023-01-17', 8759.99, 109.409),
(296, 56, 2, '20:02:33', '2023-01-17', 3066.02, 197.488),
(297, 57, 2, '20:04:04', '2023-01-17', 350, 49),
(298, 58, 2, '20:06:07', '2023-01-17', 600, 71.25),
(299, 7, 2, '20:13:12', '2023-01-17', 3877, 15.508),
(300, 8, 2, '20:13:56', '2023-01-17', 0.0025, 0.00001),
(301, 6, 2, '20:14:21', '2023-01-17', 1200, 80),
(302, 6, 2, '20:14:39', '2023-01-17', 1200, 80),
(303, 5, 2, '20:15:18', '2023-01-17', 1170, 78),
(304, 6, 2, '20:15:44', '2023-01-17', 1170, 78),
(305, 9, 2, '20:19:48', '2023-01-17', 1144, 22),
(306, 10, 2, '20:20:26', '2023-01-17', 1040, 20),
(307, 11, 2, '20:20:53', '2023-01-17', 210.084, 70),
(308, 11, 2, '20:21:33', '2023-01-17', 210.084, 70),
(309, 13, 2, '20:28:46', '2023-01-17', 7800.03, 22.2858),
(310, 14, 2, '20:31:02', '2023-01-17', 1023.03, 52.75),
(311, 15, 2, '20:34:41', '2023-01-17', 996.012, 54.62),
(312, 15, 2, '20:38:05', '2023-01-17', 1023, 56.1),
(313, 14, 2, '20:39:36', '2023-01-17', 994.909, 51.3),
(314, 14, 2, '20:40:57', '2023-01-17', 996.034, 51.358),
(315, 16, 2, '20:42:32', '2023-01-17', 451.041, 42.52),
(316, 91, 2, '18:36:49', '2023-01-18', 2352, 31.36),
(317, 92, 2, '18:38:18', '2023-01-18', 1620, 21.6),
(318, 93, 2, '18:40:10', '2023-01-18', 515.04, 42.92),
(319, 94, 2, '18:41:39', '2023-01-18', 515.032, 54.25),
(320, 94, 2, '18:50:12', '2023-01-18', 510, 53.72);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_dokumen`
--

CREATE TABLE `tbl_jenis_dokumen` (
  `id` int(11) NOT NULL,
  `jenis_dokumen` varchar(50) NOT NULL,
  `warna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_jenis_dokumen`
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
-- Struktur dari tabel `tbl_jenis_kelamin`
--

CREATE TABLE `tbl_jenis_kelamin` (
  `id` int(11) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_jenis_kelamin`
--

INSERT INTO `tbl_jenis_kelamin` (`id`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_tanki`
--

CREATE TABLE `tbl_jenis_tanki` (
  `id` int(11) NOT NULL,
  `jenis_tanki` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_jenis_tanki`
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
-- Struktur dari tabel `tbl_kabid`
--

CREATE TABLE `tbl_kabid` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_kabid`
--

INSERT INTO `tbl_kabid` (`id`, `id_user`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kapal`
--

CREATE TABLE `tbl_kapal` (
  `id` int(11) NOT NULL,
  `nama_kapal` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `gt` float DEFAULT NULL,
  `pajak` varchar(10) DEFAULT NULL,
  `kamera` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_kapal`
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
-- Struktur dari tabel `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_level`
--

INSERT INTO `tbl_level` (`id`, `level`) VALUES
(1, 'Admin'),
(2, 'Master Monitoring'),
(3, 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `id_level`, `username`, `password`, `token`) VALUES
(1, 1, 'admin', '$2y$10$jBIgUkAzaeWJ1d/05MXLG.Dy6sBwvnYrUujKCMii1yvPaP6TiTFnq', '$2y$10$bHJ/54aEDZDhZobkA6ZZaujU.M/2cckYHlwMTCk0p04q744VjI4Ei'),
(2, 3, 'petugas_test', '$2y$10$kHkbdIZMohk.XXPIHcEaDOuuduBFaTkOxyDvzHn5hX8zNlW11A9Pq', '$2y$10$ba2AnOiECdSmeZu0eULJsuzmhIt90RwOdK9TvMEvSazrO1hojZUfa'),
(3, 2, 'master_monitor', '$2y$10$UVN6xIYrkZXLRv7a0IO7Neb8PiwSYNHdjcNj/ZORP1izBQBrX.a/q', '$2y$10$S9rnBcPPsEess98lef6BmegAmUs4tgkVzn19HGpWd7boIZ2IZIal.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id`, `id_user`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sandar`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_sandar`
--

INSERT INTO `tbl_sandar` (`id`, `id_user`, `id_kapal`, `id_dermaga`, `tgl`, `waktu_awal`, `waktu_akhir`, `akumulasi_menit`, `total_call`, `total_sandar`, `shift`, `status`) VALUES
(1, 2, 1, 1, '2022-11-13', '19:34:28', '19:34:34', '00:00:06', 1, 73500, 1, 'Lunas'),
(2, 2, 4, 2, '2022-11-13', '19:34:59', '19:35:14', '00:00:16', 1, 43815.8, 1, 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tanki`
--

CREATE TABLE `tbl_tanki` (
  `id` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `id_jenis_tanki` int(11) NOT NULL,
  `tinggi` float NOT NULL,
  `liter` float NOT NULL,
  `tinggi_maksimum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_tanki`
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
(39, 82, 3, 239, 20000, 239),
(40, 82, 4, 239, 20000, 239),
(41, 82, 2, 160, 1968, 160),
(42, 82, 1, 160, 1968, 160),
(43, 83, 3, 278, 8000, 278),
(44, 83, 4, 278, 8000, 278),
(45, 83, 11, 130, 990, 130),
(46, 83, 18, 67, 100, 67),
(47, 84, 3, 434, 10850, 434),
(48, 84, 4, 434, 10850, 434),
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
(90, 94, 10, 102, 1642, 102),
(91, 95, 4, 80, 6000, 80),
(92, 95, 3, 80, 6000, 80),
(93, 95, 10, 75, 900, 75),
(94, 95, 8, 79, 750, 79),
(95, 96, 2, 152, 1000, 152),
(96, 96, 1, 152, 1000, 152),
(97, 97, 23, 276, 25450, 276),
(98, 97, 35, 70, 900, 70),
(99, 97, 34, 70, 900, 70),
(100, 98, 26, 149, 13260, 149),
(101, 98, 27, 133, 13260, 133),
(102, 98, 16, 104, 900, 104),
(103, 98, 17, 103, 1051, 103),
(104, 98, 43, 102, 1109, 102);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_jenis_kelamin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `regu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_login`, `id_jenis_kelamin`, `nama`, `regu`) VALUES
(1, 1, 1, 'Yulianto', '0'),
(2, 2, 1, 'YULIANTO', '1'),
(3, 3, 1, 'YULIANTO', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_air_tawar`
--
ALTER TABLE `tbl_air_tawar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kapal` (`id_kapal`);

--
-- Indeks untuk tabel `tbl_dermaga`
--
ALTER TABLE `tbl_dermaga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_dokumen` (`id_jenis_dokumen`),
  ADD KEY `id_kapal` (`id_kapal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_history_tanki`
--
ALTER TABLE `tbl_history_tanki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_history_tanki_ibfk_2` (`id_user`),
  ADD KEY `tbl_history_tanki_ibfk_1` (`id_tanki`);

--
-- Indeks untuk tabel `tbl_jenis_dokumen`
--
ALTER TABLE `tbl_jenis_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jenis_kelamin`
--
ALTER TABLE `tbl_jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jenis_tanki`
--
ALTER TABLE `tbl_jenis_tanki`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kabid`
--
ALTER TABLE `tbl_kabid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User Kabid` (`id_user`);

--
-- Indeks untuk tabel `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `Level` (`id_level`);

--
-- Indeks untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User Petugas` (`id_user`);

--
-- Indeks untuk tabel `tbl_sandar`
--
ALTER TABLE `tbl_sandar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_tanki`
--
ALTER TABLE `tbl_tanki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_tanki_ibfk_1` (`id_kapal`),
  ADD KEY `tbl_tanki_ibfk_2` (`id_jenis_tanki`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User Login` (`id_login`),
  ADD KEY `User Jenis Kelamin` (`id_jenis_kelamin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_air_tawar`
--
ALTER TABLE `tbl_air_tawar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_dermaga`
--
ALTER TABLE `tbl_dermaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_history_tanki`
--
ALTER TABLE `tbl_history_tanki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_dokumen`
--
ALTER TABLE `tbl_jenis_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_kelamin`
--
ALTER TABLE `tbl_jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_tanki`
--
ALTER TABLE `tbl_jenis_tanki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tbl_kabid`
--
ALTER TABLE `tbl_kabid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_sandar`
--
ALTER TABLE `tbl_sandar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_tanki`
--
ALTER TABLE `tbl_tanki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_air_tawar`
--
ALTER TABLE `tbl_air_tawar`
  ADD CONSTRAINT `tbl_air_tawar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_air_tawar_ibfk_2` FOREIGN KEY (`id_kapal`) REFERENCES `tbl_kapal` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD CONSTRAINT `tbl_dokumen_ibfk_1` FOREIGN KEY (`id_jenis_dokumen`) REFERENCES `tbl_jenis_dokumen` (`id`),
  ADD CONSTRAINT `tbl_dokumen_ibfk_2` FOREIGN KEY (`id_kapal`) REFERENCES `tbl_kapal` (`id`),
  ADD CONSTRAINT `tbl_dokumen_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbl_history_tanki`
--
ALTER TABLE `tbl_history_tanki`
  ADD CONSTRAINT `tbl_history_tanki_ibfk_1` FOREIGN KEY (`id_tanki`) REFERENCES `tbl_tanki` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_history_tanki_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kabid`
--
ALTER TABLE `tbl_kabid`
  ADD CONSTRAINT `User Kabid` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `Level` FOREIGN KEY (`id_level`) REFERENCES `tbl_level` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD CONSTRAINT `User Petugas` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sandar`
--
ALTER TABLE `tbl_sandar`
  ADD CONSTRAINT `tbl_sandar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_tanki`
--
ALTER TABLE `tbl_tanki`
  ADD CONSTRAINT `tbl_tanki_ibfk_1` FOREIGN KEY (`id_kapal`) REFERENCES `tbl_kapal` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tanki_ibfk_2` FOREIGN KEY (`id_jenis_tanki`) REFERENCES `tbl_jenis_tanki` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `User Jenis Kelamin` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `tbl_jenis_kelamin` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `User Login` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
