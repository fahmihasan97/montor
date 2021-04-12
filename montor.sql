-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 06:51 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `montor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `level`, `log`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '2018-03-30 02:51:21'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', 'user', '2018-04-02 18:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `krisis`
--

CREATE TABLE `krisis` (
  `id_krisis` int(11) NOT NULL,
  `upt` varchar(100) NOT NULL,
  `ultg` varchar(100) NOT NULL,
  `penghantar` varchar(100) NOT NULL,
  `kv` int(50) NOT NULL,
  `tower` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `update` date NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `kkp` varchar(100) NOT NULL,
  `kelling` varchar(100) DEFAULT NULL,
  `kelpo` varchar(100) DEFAULT NULL,
  `kelfo` varchar(100) DEFAULT NULL,
  `skoli` varchar(50) NOT NULL,
  `skopo` varchar(50) NOT NULL,
  `skohu` varchar(20) NOT NULL,
  `klali` int(2) NOT NULL COMMENT 'aman = 1, waspada = 2, kritis = 3, belum diasesmen = 0',
  `klapo` int(2) NOT NULL COMMENT 'aman = 1, waspada = 2, kritis = 3',
  `klahu` int(2) NOT NULL COMMENT 'atas normal = 1',
  `anomali` varchar(100) NOT NULL,
  `tautan` varchar(50) NOT NULL,
  `penanganan` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `risiko` varchar(100) NOT NULL,
  `mitigasi` varchar(100) NOT NULL,
  `foto1` varchar(50) DEFAULT NULL,
  `foto2` varchar(50) DEFAULT NULL,
  `foto3` varchar(50) DEFAULT NULL,
  `foto4` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krisis`
--

INSERT INTO `krisis` (`id_krisis`, `upt`, `ultg`, `penghantar`, `kv`, `tower`, `tgl`, `update`, `jenis`, `kkp`, `kelling`, `kelpo`, `kelfo`, `skoli`, `skopo`, `skohu`, `klali`, `klapo`, `klahu`, `anomali`, `tautan`, `penanganan`, `keterangan`, `risiko`, `mitigasi`, `foto1`, `foto2`, `foto3`, `foto4`) VALUES
(1, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '5', '2021-01-27', '2021-01-27', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 2, 2, 1, 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sekarputih-Siman-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(2, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '9', '2021-01-27', '2021-01-27', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 2, 2, 1, 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sekarputih-Siman-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(3, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '15', '2021-01-11', '2021-01-11', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '29', '70', '161', 2, 3, 1, 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(4, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '12', '2021-01-27', '2021-01-27', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 2, 2, 1, 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(5, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '13', '2021-01-27', '2021-01-27', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '70', '161', 2, 3, 1, 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(6, 'UPT Malang', 'ULTG Krian', 'Driyorejo - Babadan', 150, '26', '2021-02-09', '2021-02-09', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '82', '5', '161', 3, 1, 1, 'Aliran sungai', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(7, 'UPT Malang', 'ULTG Mojokerto', 'Grati - Krian', 500, '185', '2021-02-17', '2021-02-17', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '29', '5', '162', 2, 1, 1, 'pondasi retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(8, 'UPT Malang', 'ULTG Krian', 'Gresik - Krian', 500, '8', '2021-02-05', '2021-02-05', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '54', '0', '150', 3, 1, 1, '', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sengkaling-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(9, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sengguruh', 70, '53', '2021-01-20', '2021-01-20', 'D.Barata', 'NOK', 'NOK', 'NOK', 'NOK', 'NOK', 'NOK', '169', 3, 3, 1, 'Tower miring', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(10, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sengguruh', 70, '56', '2021-02-17', '2021-02-17', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '5', '169', 2, 1, 1, 'Tower defleksi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(11, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sutami', 150, '19', '2021-02-17', '2021-02-17', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '15', '55', '169', 2, 2, 1, 'kaki tower bunckling (leg B)', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(12, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sutami', 150, '66', '2021-02-17', '2021-02-17', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '13', '5', '169', 2, 1, 1, 'Tower miring (Isolator line 2 miring kedalam)', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(13, 'UPT Malang', 'ULTG Krian', 'Ngimbang - Krian', 500, '520', '2021-03-09', '2021-03-09', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '68', '0', '151', 3, 1, 1, 'ancaman galian air pada pondasi tower', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Siman-Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(14, 'UPT Malang', 'ULTG Krian', 'Ngimbang - Krian', 500, '505', '2021-03-09', '2021-03-09', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '81', '0', '152', 3, 1, 1, 'Potensi longsoran dari aliran sungai', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Siman-Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(15, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Mojoagung', 150, '37', '2021-02-05', '2021-02-05', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '54', '0', '165', 3, 1, 1, 'Potensi longsoran', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(16, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 150, '1', '2021-02-17', '2021-02-17', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '13', '25', '161', 2, 1, 1, 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(17, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 150, '2', '2021-02-17', '2021-02-17', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '17', '40', '161', 2, 2, 1, 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 150kV Surabaya Barat-Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(18, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 150, '3', '2021-02-17', '2021-02-17', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '20', '30', '161', 2, 1, 1, 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(19, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '8A', '2021-02-05', '2021-02-05', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '41', '75', '161', 2, 3, 1, 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(20, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '67A', '2021-02-05', '2021-02-05', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '38', '30', '161', 2, 1, 1, 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 150kV Surabaya Barat-Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(21, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '70A', '2021-02-05', '2021-02-05', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '68', '30', '161', 3, 1, 1, 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(22, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '5', '2021-03-09', '2021-03-09', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '71', '65', '161', 3, 3, 1, 'chimney terpendam tanah', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(23, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '5A', '2021-02-05', '2021-02-05', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '45', '35', '161', 2, 2, 1, 'chimney terpendam tanah', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 150kV Surabaya Barat-Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(24, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '35', '2021-02-05', '2021-02-05', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '15', '35', '161', 2, 2, 1, 'chimney terpendam tanah', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `ms_group`
--

CREATE TABLE `ms_group` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_aktif` int(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_group`
--

INSERT INTO `ms_group` (`group_id`, `group_name`, `group_aktif`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Admin', 1, '2021-04-02 22:07:08', 1, '2021-04-02 22:07:08', 1),
(2, 'User', 1, '2021-04-02 22:07:08', 1, '2021-04-03 00:10:05', 2),
(3, 'Root', 1, '2021-04-10 00:00:00', NULL, '2021-04-10 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_group_menu`
--

CREATE TABLE `ms_group_menu` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_group_menu`
--

INSERT INTO `ms_group_menu` (`group_id`, `menu_id`, `created_at`, `created_by`) VALUES
(1, 1, '2021-04-02 22:07:09', 1),
(1, 2, '2021-04-02 22:07:09', 1),
(1, 3, '2021-04-02 22:07:09', 1),
(1, 4, '2021-04-02 22:07:09', 1),
(1, 14, '2021-04-10 15:45:47', NULL),
(2, 14, '2021-04-10 15:45:55', NULL),
(1, 15, '2021-04-10 15:49:03', NULL),
(1, 16, '2021-04-10 15:49:05', NULL),
(3, 1, '2021-04-10 15:52:25', NULL),
(3, 2, '2021-04-10 15:52:25', NULL),
(3, 3, '2021-04-10 15:52:25', NULL),
(3, 4, '2021-04-10 15:52:26', NULL),
(3, 14, '2021-04-10 15:52:26', NULL),
(3, 15, '2021-04-10 15:52:26', NULL),
(3, 16, '2021-04-10 15:52:26', NULL),
(3, 0, '2021-04-10 15:52:27', NULL),
(3, 0, '2021-04-10 15:52:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_menu`
--

CREATE TABLE `ms_menu` (
  `menu_id` int(10) UNSIGNED NOT NULL,
  `menu_kode` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_link` varchar(255) DEFAULT NULL,
  `menu_icon` varchar(255) DEFAULT NULL,
  `menu_aktif` int(2) DEFAULT NULL,
  `menu_level` int(11) DEFAULT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `menu_parent_kode` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_menu`
--

INSERT INTO `ms_menu` (`menu_id`, `menu_kode`, `menu_name`, `menu_link`, `menu_icon`, `menu_aktif`, `menu_level`, `menu_parent_id`, `menu_parent_kode`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '01', 'Admin System', '#', 'fa fa-gears', 1, 1, 0, '', '2021-04-02 22:07:08', 1, '2021-04-10 00:00:00', 1),
(2, '01.1', 'Master User', 'ms_user', '', 1, 2, 1, '01', '2021-04-02 22:07:08', 1, '2021-04-02 22:07:08', 1),
(3, '01.2', 'Master Group', 'ms_group', '', 1, 2, 1, '01', '2021-04-02 22:07:08', 1, '2021-04-02 22:07:08', 1),
(4, '01.3', 'Master Menu', 'ms_menu', '', 1, 2, 1, '01', '2021-04-02 22:07:08', 1, '2021-04-02 22:07:08', 1),
(14, '02', 'Dashboard', 'dashboard', '', 1, 1, 0, '', '2021-04-10 00:00:00', NULL, '2021-04-12 00:00:00', NULL),
(15, '03', 'Admin Data', '#', '', 1, 1, 0, '', '2021-04-10 00:00:00', NULL, '2021-04-10 00:00:00', NULL),
(16, '03.1', 'Data Krisis', 'krisis', '', 1, 2, 15, '03', '2021-04-10 00:00:00', NULL, '2021-04-11 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE `ms_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_aktif` int(2) DEFAULT NULL,
  `is_superuser` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`user_id`, `username`, `user_fullname`, `email`, `group_id`, `password`, `user_aktif`, `is_superuser`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin', 'Administrator', NULL, 1, '21232f297a57a5a743894a0e4a801fc3', 1, 1, NULL, NULL, NULL, NULL),
(3, 'tadin', 'Muhammad Iqbal Muhtadin', NULL, 2, '7b410ed61b0a43480cf6d1fbcfa73d63', 1, 0, '2021-04-10 00:00:00', NULL, '2021-04-10 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `krisis`
--
ALTER TABLE `krisis`
  ADD PRIMARY KEY (`id_krisis`);

--
-- Indexes for table `ms_group`
--
ALTER TABLE `ms_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `ms_menu`
--
ALTER TABLE `ms_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `krisis`
--
ALTER TABLE `krisis`
  MODIFY `id_krisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ms_group`
--
ALTER TABLE `ms_group`
  MODIFY `group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ms_menu`
--
ALTER TABLE `ms_menu`
  MODIFY `menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ms_user`
--
ALTER TABLE `ms_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
