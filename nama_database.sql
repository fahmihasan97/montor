-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 05:14 AM
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
-- Database: `nama_database`
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
  `tgl` varchar(20) NOT NULL,
  `update` varchar(20) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `kkp` varchar(100) NOT NULL,
  `kelling` varchar(100) NOT NULL,
  `kelpo` varchar(100) NOT NULL,
  `kelfo` varchar(100) NOT NULL,
  `skoli` varchar(50) NOT NULL,
  `skopo` varchar(50) NOT NULL,
  `skohu` varchar(20) NOT NULL,
  `klali` varchar(50) NOT NULL,
  `klapo` varchar(100) NOT NULL,
  `klahu` varchar(50) NOT NULL,
  `anomali` varchar(100) NOT NULL,
  `tautan` varchar(50) NOT NULL,
  `penanganan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `risiko` varchar(100) NOT NULL,
  `mitigasi` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `foto1` varchar(50) NOT NULL,
  `foto2` varchar(50) NOT NULL,
  `foto3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krisis`
--

INSERT INTO `krisis` (`id_krisis`, `upt`, `ultg`, `penghantar`, `kv`, `tower`, `tgl`, `update`, `jenis`, `kkp`, `kelling`, `kelpo`, `kelfo`, `skoli`, `skopo`, `skohu`, `klali`, `klapo`, `klahu`, `anomali`, `tautan`, `penanganan`, `keterangan`, `risiko`, `mitigasi`, `foto`, `foto1`, `foto2`, `foto3`) VALUES
(23, 'UPT Malang', 'ULTG Babat', 'Antosari - Negara', 70, '8', '2021-04-07', '2021-04-05', 'D.Barata', 'NOK', 'NIHIL', 'NIHIL', 'NOK', '80', '70', '80', 'AMAN', 'AMAN', 'ATAS NORMAL', 'Sungai longsor (pemantauan periodik)', 'https://drive.google.com/drive/my-drive', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'foto_1617427619.JPG', 'foto_16174276011.jpg', 'foto_16174276012.jpg', 'foto_1617427634.JPG'),
(29, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '5', '11/1/2021', '11/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sekarputih-Siman-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(30, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '9', '27/1/2021', '27/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sekarputih-Siman-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(31, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '15', '27/1/2021', '27/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '29', '70', '161', 'WASPADA', 'KRITIS', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(32, 'UPT Malang', 'ULTG Krian', 'Driyorejo - Babadan', 150, '12', '9/2/2021', '9/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(33, 'UPT Malang', 'ULTG Mojokerto', 'Grati - Krian', 150, '13', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '70', '161', 'WASPADA', 'KRITIS', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(34, 'UPT Malang', 'ULTG Krian', 'Gresik - Krian', 150, '26', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '82', '5', '161', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'Aliran sungai', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(35, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sengguruh', 500, '185', '20/1/2021', '20/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '29', '5', '162', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'pondasi retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(36, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sengguruh', 500, '8', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '54', '0', '150', 'KRITIS', 'AMAN', 'ATAS NORMAL', '', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sengkaling-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(37, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sutami', 70, '53', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'NOK', 'NOK', 'NOK', 'NOK', 'NOK', '169', 'KRITIS', 'KRITIS', 'ATAS NORMAL', 'Tower miring', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(38, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sutami', 70, '56', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '5', '169', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'Tower defleksi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(39, 'UPT Malang', 'ULTG Krian', 'Ngimbang - Krian', 150, '19', '9/3/2021', '9/3/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '15', '55', '169', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'kaki tower bunckling (leg B)', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(40, 'UPT Malang', 'ULTG Krian', 'Ngimbang - Krian', 150, '66', '9/3/2021', '9/3/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '13', '5', '169', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'Tower miring (Isolator line 2 miring kedalam)', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(41, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Mojoagung', 500, '520', '5/2/2021', '5/2/2021', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '68', '0', '151', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'ancaman galian air pada pondasi tower', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Siman-Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(42, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 500, '505', '17/2/2021', '17/2/2021', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '81', '0', '152', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'Potensi longsoran dari aliran sungai', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Siman-Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(43, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 150, '37', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '54', '0', '165', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'Potensi longsoran', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(44, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 150, '1', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '13', '25', '161', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(45, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 150, '2', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '17', '40', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 150kV Surabaya Barat-Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(46, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 150, '3', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '20', '30', '161', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(47, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '8A', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '41', '75', '161', 'WASPADA', 'KRITIS', 'ATAS NORMAL', 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(48, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '67A', '9/3/2021', '9/3/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '38', '30', '161', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 150kV Surabaya Barat-Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(49, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '70A', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '68', '30', '161', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(50, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '5', '5/2/2021', '5/2/2021', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '71', '65', '161', 'KRITIS', 'KRITIS', 'ATAS NORMAL', 'chimney terpendam tanah', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(53, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '5', '27/1/2021', '27/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sekarputih-Siman-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(54, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '9', '27/1/2021', '27/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sekarputih-Siman-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(55, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '15', '11/1/2021', '11/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '29', '70', '161', 'WASPADA', 'KRITIS', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(56, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '12', '27/1/2021', '27/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(57, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '13', '27/1/2021', '27/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '70', '161', 'WASPADA', 'KRITIS', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(58, 'UPT Malang', 'ULTG Krian', 'Driyorejo - Babadan', 150, '26', '9/2/2021', '9/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '82', '5', '161', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'Aliran sungai', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(59, 'UPT Malang', 'ULTG Mojokerto', 'Grati - Krian', 500, '185', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '29', '5', '162', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'pondasi retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(60, 'UPT Malang', 'ULTG Krian', 'Gresik - Krian', 500, '8', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '54', '0', '150', 'KRITIS', 'AMAN', 'ATAS NORMAL', '', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sengkaling-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(61, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sengguruh', 70, '53', '20/1/2021', '20/1/2021', 'D.Barata', 'NOK', 'NOK', 'NOK', 'NOK', 'NOK', 'NOK', '169', 'KRITIS', 'KRITIS', 'ATAS NORMAL', 'Tower miring', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(62, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sengguruh', 70, '56', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '5', '169', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'Tower defleksi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(63, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sutami', 150, '19', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '15', '55', '169', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'kaki tower bunckling (leg B)', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(64, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sutami', 150, '66', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '13', '5', '169', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'Tower miring (Isolator line 2 miring kedalam)', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(65, 'UPT Malang', 'ULTG Krian', 'Ngimbang - Krian', 500, '520', '9/3/2021', '9/3/2021', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '68', '0', '151', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'ancaman galian air pada pondasi tower', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Siman-Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(66, 'UPT Malang', 'ULTG Krian', 'Ngimbang - Krian', 500, '505', '9/3/2021', '9/3/2021', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '81', '0', '152', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'Potensi longsoran dari aliran sungai', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Siman-Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(67, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Mojoagung', 150, '37', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '54', '0', '165', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'Potensi longsoran', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(68, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 150, '1', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '13', '25', '161', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(69, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 150, '2', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '17', '40', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 150kV Surabaya Barat-Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(70, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 150, '3', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '20', '30', '161', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(71, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '8A', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '41', '75', '161', 'WASPADA', 'KRITIS', 'ATAS NORMAL', 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(72, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '67A', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '38', '30', '161', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 150kV Surabaya Barat-Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(73, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '70A', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '68', '30', '161', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(74, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '5', '9/3/2021', '9/3/2021', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '71', '65', '161', 'KRITIS', 'KRITIS', 'ATAS NORMAL', 'chimney terpendam tanah', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(75, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '5A', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '45', '35', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'chimney terpendam tanah', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 150kV Surabaya Barat-Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(76, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '35', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '15', '35', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'chimney terpendam tanah', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(77, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '5', '27/1/2021', '27/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sekarputih-Siman-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(78, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '9', '27/1/2021', '27/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sekarputih-Siman-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(79, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '15', '11/1/2021', '11/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '29', '70', '161', 'WASPADA', 'KRITIS', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(80, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '12', '27/1/2021', '27/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '60', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(81, 'UPT Malang', 'ULTG Mojokerto', 'Balongbendo - Sekarputih', 150, '13', '27/1/2021', '27/1/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '70', '161', 'WASPADA', 'KRITIS', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(82, 'UPT Malang', 'ULTG Krian', 'Driyorejo - Babadan', 150, '26', '9/2/2021', '9/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '82', '5', '161', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'Aliran sungai', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(83, 'UPT Malang', 'ULTG Mojokerto', 'Grati - Krian', 500, '185', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '29', '5', '162', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'pondasi retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Sekarputih- Tarik', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(84, 'UPT Malang', 'ULTG Krian', 'Gresik - Krian', 500, '8', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '54', '0', '150', 'KRITIS', 'AMAN', 'ATAS NORMAL', '', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Sengkaling-Mendalan', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(85, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sengguruh', 70, '53', '20/1/2021', '20/1/2021', 'D.Barata', 'NOK', 'NOK', 'NOK', 'NOK', 'NOK', 'NOK', '169', 'KRITIS', 'KRITIS', 'ATAS NORMAL', 'Tower miring', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(86, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sengguruh', 70, '56', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '16', '5', '169', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'Tower defleksi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(87, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sutami', 150, '19', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '15', '55', '169', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'kaki tower bunckling (leg B)', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(88, 'UPT Malang', 'ULTG Malang', 'Kebonagung - Sutami', 150, '66', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '13', '5', '169', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'Tower miring (Isolator line 2 miring kedalam)', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(89, 'UPT Malang', 'ULTG Krian', 'Ngimbang - Krian', 500, '520', '9/3/2021', '9/3/2021', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '68', '0', '151', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'ancaman galian air pada pondasi tower', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Siman-Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(90, 'UPT Malang', 'ULTG Krian', 'Ngimbang - Krian', 500, '505', '9/3/2021', '9/3/2021', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '81', '0', '152', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'Potensi longsoran dari aliran sungai', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 70kV Siman-Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(91, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Mojoagung', 150, '37', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '54', '0', '165', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'Potensi longsoran', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 70kV Siman- Mendalan + Sekarputih', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(92, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 150, '1', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '13', '25', '161', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(93, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 150, '2', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '17', '40', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 150kV Surabaya Barat-Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(94, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Ngoro', 150, '3', '17/2/2021', '17/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '20', '30', '161', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'stub korosi', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(95, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '8A', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '41', '75', '161', 'WASPADA', 'KRITIS', 'ATAS NORMAL', 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(96, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '67A', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '38', '30', '161', 'WASPADA', 'AMAN', 'ATAS NORMAL', 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 150kV Surabaya Barat-Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(97, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '70A', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '68', '30', '161', 'KRITIS', 'AMAN', 'ATAS NORMAL', 'tapak retak', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(98, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '5', '9/3/2021', '9/3/2021', 'D.Barata', 'OK', 'OK', 'OK', 'OK', '71', '65', '161', 'KRITIS', 'KRITIS', 'ATAS NORMAL', 'chimney terpendam tanah', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(99, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '5A', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '45', '35', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'chimney terpendam tanah', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTT 150kV Surabaya Barat-Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong'),
(100, 'UPT Malang', 'ULTG Mojokerto', 'Sekarputih - Siman - Mendalan', 70, '35', '5/2/2021', '5/2/2021', 'D.Barata', 'NOK', 'OK', 'OK', 'OK', '15', '35', '161', 'WASPADA', 'WASPADA', 'ATAS NORMAL', 'chimney terpendam tanah', '-', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'perlu pengerukan saja', 'Gangguan SUTET 150kV Surabaya Barat- Balongbendo', 'Gangguan SUTET 150kV Balongbendo- Sekarputih', 'Kosong', 'Kosong', 'kosong', 'kosong');

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
  MODIFY `id_krisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
