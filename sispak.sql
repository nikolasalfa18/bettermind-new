-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 03:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_diagnosa`
--

CREATE TABLE `tb_data_diagnosa` (
  `id_diagnosa` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `hasil_diagnosa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_data_diagnosa`
--

INSERT INTO `tb_data_diagnosa` (`id_diagnosa`, `nama_user`, `hasil_diagnosa`) VALUES
(1, 'Rama', 'Panic Attack'),
(2, 'Jaka', 'OCD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kesimpulan`
--

CREATE TABLE `tb_kesimpulan` (
  `kode_kesimpulan` int(11) NOT NULL,
  `solusi` varchar(50) NOT NULL,
  `fakta` varchar(100) NOT NULL,
  `oleh` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kesimpulan`
--

INSERT INTO `tb_kesimpulan` (`kode_kesimpulan`, `solusi`, `fakta`, `oleh`, `status`) VALUES
(1, 'Depresi', 'Merasa down untuk beberapa waktu yang cukup lama\r\n', 'pakar', 'setuju'),
(2, 'Depresi', 'Kehilangan energi & minat akan sesuatu', 'pakar', 'setuju'),
(3, 'Distimia', 'Merasa Down untuk beberapa waktu yang cukup lama', 'pakar', 'setuju'),
(4, 'Distimia', 'Disaat down, kamu masih dapat beraktivitas seperti biasanya\r\n', 'pakar', 'setuju'),
(5, 'Hypomania/Mania', 'Pernah mengalami suatu kondisi dimana kamu merasa benar-benar bahagia', 'pakar', 'setuju'),
(6, 'Hypomania/Mania', 'Mempunyai energi yang tinggi dan tidak butuh istirahat/tidur untuk beberapa waktu', 'pakar', 'setuju'),
(7, 'Generalized Anxiety Disorder', 'Memiliki kekhawatiran yang kronis', 'pakar', 'setuju'),
(8, 'Generalized Anxiety Disorder', 'Khawatir akan segala hal', 'pakar', 'setuju'),
(9, 'Generalized Anxiety Disorder', 'Kekhawatiran menghambat aktivitasmu', 'pakar', 'setuju'),
(10, 'Obsessive Compulsive Disorder ', 'Punya pemikiran konyol yang berulang tetapi tidak bisa dihentikan', 'Pakar', 'setuju'),
(153, 'Obsessive Compulsive Disorder ', 'Melakukan kebiasaan yang berulang-ulang', 'pakar', 'setuju'),
(154, 'Obsessive Compulsive Personality Disorder ', 'Melakukan kebiasaan yang berulang-ulang', 'pakar', 'setuju'),
(155, 'Obsessive Compulsive Personality Disorder ', 'punya pemikiran konyol yang berulang tetapi tidak bisa dihentikan', 'pakar', 'setuju'),
(156, 'Obsessive Compulsive Personality Disorder ', 'Merasa harus ada pengecekan dan pengaturan yang terus-menerus', 'pakar', 'setuju'),
(157, 'Obsessive Compulsive Personality Disorder ', 'Merasa semua hal harus simetris', 'pakar', 'setuju'),
(158, 'Obsessive Compulsive Personality Disorder ', 'Menyimpan barang-barang yang tidak perlu tapi tidak ingin dibuang', 'pakar', 'setuju'),
(159, 'Panic Attack', 'Mudah panik dan saat panik diikuti dengan gejala fisik seperti mual, pusing, atau sesak nafas', 'pakar', 'setuju'),
(160, 'Post-Traumatic Stress Disorder', 'Sulit melupakan suatu kejadian buruk yang telah terjadi di hidupmu', 'pakar', 'setuju'),
(161, 'Post-Traumatic Stress Disorder', 'Mengalami mimpi buruk tentang kejadian traumatis', 'pakar', 'setuju'),
(162, 'Post-Traumatic Stress Disorder', 'Mudah tertrigger dengan sesuatu yang mengingatkan akan kejadian traumatis', 'pakar', 'setuju'),
(163, 'Post-Traumatic Stress Disorder', 'Sulit tidur dan mudah terkejut', 'pakar', 'setuju'),
(164, 'Social Phobia', 'Sulit menghadiri acara sosial dan bertemu dengan orang-orang baru', 'pakar', 'setuju'),
(165, 'Social Phobia', 'Takut dan sulit berbicara di depan umum dengan percaya diri', 'pakar', 'setuju'),
(166, 'Social Phobia', 'takut untuk bersosialisasi', 'pakar', 'setuju');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `kode_pertanyaan` varchar(50) NOT NULL,
  `isi_pertanyaan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pertanyaan`
--

INSERT INTO `tb_pertanyaan` (`kode_pertanyaan`, `isi_pertanyaan`) VALUES
('G001', 'Apakah ada periode dimana kamu merasa down untuk waktu yang cukup lama?'),
('G001-a', 'Apakah kamu merasa tidak punya energi, tidak punya ketertarikan, dan secara keseluruhan sulit melakukan sesuatu?'),
('G002', 'Apakah kamu pernah merasa benar-benar bahagia atau benar-benar sedih tetapi tidak wajar?'),
('G002-a', 'Apakah kamu pernah merasa tidak butuh waktu istirahat dan mengalami energi yang sangat tinggi dalam waktu yang lama? '),
('G003', 'Apakah kamu pernah merasa down tetapi masih dapat beraktivitas dengan normal?'),
('G004', 'Apakah kamu memiliki kekhawatiran yang parah & selalu khawatir akan segala hal?'),
('G004-a', 'Apakah kamu memikirkan segala hal secara berlebih? Bukan hanya 1 atau 2 hal saja?'),
('G004-b', 'Apakah kekhawatiranmu menghambat aktivitasmu?'),
('G005', 'Apakah kamu punya pemikiran konyol yang berulang tetapi tidak bisa dihentikan? (Seperti ketakutan tertular virus)'),
('G005-a', 'Apakah kamu melakukan kebiasaan yang berulang? Misalnya fidgeting atau semua benda harus genap?'),
('G006', 'Apakah kamu merasa harus ada pengecekan dan pengaturan yang terus-menerus?'),
('G006-a', 'Apakah kamu merasa semua hal harus simetris?'),
('G006-b', 'Apakah kamu menyimpan barang-barang yang tidak perlu tapi tidak ingin dibuang?'),
('G007', 'Apakah kamu mudah panik dan saat panik diikuti dengan gejala fisik seperti mual, pusing, atau sesak nafas?'),
('G008', 'Apakah kamu sulit melupakan suatu kejadian buruk yang telah terjadi di hidupmu?'),
('G008-a', 'Apakah kamu mengalami mimpi buruk tentang kejadian tersebut?'),
('G008-b', 'Ketika sesuatu mengingatkanmu akan kejadian itu, apakah hal tersebut memicu respon yang besar dari dirimu?'),
('G008-c', 'Secara umum, apakah setelah kejadian tersebut kamu mengalami kesulitan untuk tidur atau jadi mudah terkejut?'),
('G009', 'Apakah kamu bisa menghadiri acara sosial dan bertemu dengan orang-orang baru?'),
('G009-a', 'Apakah kamu bisa berbicara di depan umum dengan percaya diri dan tidak takut?'),
('G009-b', 'Apakah ketakutan bersosialisasi menghambat aktivitasmu?'),
('G010', 'Lapar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rules`
--

CREATE TABLE `tb_rules` (
  `kode_rule` varchar(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `ya` varchar(8) NOT NULL,
  `tidak` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rules`
--

INSERT INTO `tb_rules` (`kode_rule`, `pertanyaan`, `ya`, `tidak`) VALUES
('1', 'Apakah ada periode dimana kamu merasa down untuk waktu yang cukup lama?', 'G001-a', 'G002'),
('2', 'Apakah kamu merasa tidak punya energi, tidak punya ketertarikan, dan secara keseluruhan sulit melakukan sesuatu?', 'D1', 'G003'),
('3', 'Apakah kamu pernah merasa benar-benar bahagia atau benar-benar sedih tetapi tidak wajar? ', 'G002-a', 'G004'),
('4', 'Apakah kamu memiliki kekhawatiran yang parah & selalu khawatir akan segala hal? ', 'G004-a', 'G005'),
('5', 'Apakah kamu memikirkan segala hal secara berlebih? Bukan hanya 1 atau 2 hal saja?', 'G004-b', 'G005'),
('6', 'Apakah kekhawatiranmu menghambat aktivitasmu? ', 'D4', 'G005'),
('7', 'Apakah kamu pernah merasa down tetapi masih dapat beraktivitas dengan normal? ', 'D3', 'G002'),
('8', 'Apakah kamu punya pemikiran konyol yang berulang tetapi tidak bisa dihentikan? (Seperti ketakutan tertular virus)', 'G005-a', 'G007'),
('9', 'Apakah kamu melakukan kebiasaan yang berulang? Misalnya fidgeting atau semua benda harus genap? ', 'G006', 'G007'),
('10', 'Apakah kamu merasa harus ada pengecekan dan pengaturan yang terus-menerus? ', 'G006-a', 'D5'),
('11', 'Apakah kamu merasa semua hal harus simetris? ', 'G006-b', 'G007'),
('12', 'Apakah kamu menyimpan barang-barang yang tidak perlu tapi tidak ingin dibuang? ', 'D6', 'G007'),
('13', 'Apakah kamu mudah panik dan saat panik diikuti dengan gejala fisik seperti mual, pusing, atau sesak nafas? ', 'D7', 'G008'),
('14', 'Apakah kamu sulit melupakan suatu kejadian buruk yang telah terjadi di hidupmu?', 'G008-a', 'G009'),
('15', 'Apakah kamu mengalami mimpi buruk tentang kejadian tersebut? ', 'G008-b', 'G009'),
('16', 'Ketika sesuatu mengingatkanmu akan kejadian itu, apakah hal tersebut memicu respon yang besar dari dirimu? ', 'G008-c', 'G009'),
('17', ' Secara umum, apakah setelah kejadian tersebut kamu mengalami kesulitan untuk tidur atau jadi mudah terkejut? ', 'D8', 'G009'),
('18', 'Apakah kamu bisa menghadiri acara sosial dan bertemu dengan orang-orang baru? ', 'X', 'G009-a'),
('19', 'Apakah kamu bisa berbicara di depan umum dengan percaya diri dan tidak takut?', 'X', 'G009-b'),
('20', 'Apakah ketakutan bersosialisasi menghambat aktivitasmu? ', 'D9', 'X');

-- --------------------------------------------------------

--
-- Table structure for table `tb_solusi`
--

CREATE TABLE `tb_solusi` (
  `kode_solusi` varchar(50) NOT NULL,
  `isi_solusi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_solusi`
--

INSERT INTO `tb_solusi` (`kode_solusi`, `isi_solusi`) VALUES
('D1', 'Depresi'),
('D2', 'Hypomania/Mania	\r\n	\r\n'),
('D3', 'Distimia'),
('D4', 'Generalized Anxiety Disorder'),
('D5', 'Obsessive Compulsive Disorder'),
('D6', 'Obsessive Compulsive Personality Disorder'),
('D7', 'Panic Attack	'),
('D8', 'PTSD'),
('D9', 'Social Phobia'),
('X', 'Belum ada diagnosa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_data_diagnosa`
--
ALTER TABLE `tb_data_diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `tb_kesimpulan`
--
ALTER TABLE `tb_kesimpulan`
  ADD PRIMARY KEY (`kode_kesimpulan`);

--
-- Indexes for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`kode_pertanyaan`);

--
-- Indexes for table `tb_solusi`
--
ALTER TABLE `tb_solusi`
  ADD PRIMARY KEY (`kode_solusi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_data_diagnosa`
--
ALTER TABLE `tb_data_diagnosa`
  MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kesimpulan`
--
ALTER TABLE `tb_kesimpulan`
  MODIFY `kode_kesimpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
