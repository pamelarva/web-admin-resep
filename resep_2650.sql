-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 12:11 AM
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
-- Database: `resep_2650`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cara`
--

CREATE TABLE `cara` (
  `id_resep` int(11) NOT NULL,
  `id_jenis` varchar(5) NOT NULL,
  `nama_roti` varchar(50) NOT NULL,
  `bahan` varchar(800) NOT NULL,
  `langkah` varchar(800) NOT NULL,
  `gambar_roti` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cara`
--

INSERT INTO `cara` (`id_resep`, `id_jenis`, `nama_roti`, `bahan`, `langkah`, `gambar_roti`) VALUES
(5, 'K00', 'Egg Tart', '300 gram butter (mix butter dan margarin), 125 gram gula pasir halus, 3 kuning telur, 400 gram tepung terigu, 100 gram tepung maizena, 40 gram susu bubuk full cream, 100 gram keju cheddar atau edam, gula halus secukupnya.', 'Langkah pertama adalah kocok butter, gula pasir halus, dan kuning telur dengan menggunakan mixer kecepatan rendah. Campur semua bahan sampai rata. Masukan keju parut. Aduk merata, kemudian tuang terigu, maizena, dan susu bubuk. Aduk merata, gilas adonan dan cetak dengan cetakan bulan sabit atau yang lainnya. Letakan adonan yang sudah dicetak ke atas loyang dengan rapi. Sebelumnya, loyang harus diolesi oleh margarin tipis-tipis, kemudian panggang di oven dengan suhu 140° C hingga matang atau berwarna kecoklatan. Pastikan tekstur kue sudah kokoh dan kering. Lalu ketukan loyang perlahan sampai semua kue putri salju terlepas. Selagi hangat bisa balur kue putri salju dengan gula halus secara rata. Terakhir tinggal tata kue putri salju di dalam toples.', 'eggtart.jpg'),
(6, 'B00', 'Red Velvet Cheesecake', '6 butir telur , 4 butir kuning telur, 150 gr gula pasir, 1/2 sdt SP, 150 gr tepung terigu, 20 gr bubuk susu full cream, 10 gr maizena, 20 gr bubuk cocoa, 1/2 sdt bubuk warna merah, 150 gr margarin/butter, 400 gr whipcream cair, 100 gr cream cheese, 100 gr gula halus', 'Siapkan loyang 20x20x7cm, alasi baking paper, sisihkan. Panaskan oven suhu 180 derajat celcius. Lelehkan margarin atau butter, sisihkan. Mixer telur, gula, dan SP sampai kental berjejak, lalu matikan mixer, aduk tepung pakai spatula lalu masukkan margarin, aduk balik sampai tercampur rata, beri pasta, tuang ke loyang dan panggang suhu 180 derajat celcius api atas bawah 35-40 menit.', 'redvelvet.jpg'),
(7, 'B00', 'Cinnamon Butter Rolls', 'Untuk bahan ada 300 gr terigu cakra, 15 gr susu bubuk (opsional) , 40 gr gula pasir , 210 gr 2 kuning telur dan susu cair dingin, 3 gr garam, 4 gr ragi instan, 50 gr butter. Untuk toppingnya ada, butter atau margarin untuk olesan, 3 sdm gula pasir, 3 sdm gula palem, 2 sdm kayu manis bubuk, almond slice (opsional). Eggwash menggunakan bahan 1 telur dan 1 sdm susu cair.', ' Campur terigu, susu bubuk, gula pasir, ragi, dan campuran susu dan telur. Uleni hingga setengah kalis.  Masukkan butter dan garam, uleni hingga elastis, istirahatkan 45-60 menit. Kempiskan, gilas membentuk persegi panjang, olesi butter atau margarin di permukaannya. Taburi campuran gula dan kayu manis bubuk sesuai selera. Gulung memanjang, potong jadi 9 bagian, tata di loyang persegi 22 cm. Beroles margarin dan beri alas baking paper atau kertas roti. Tata dengan diberi jarak untuk mengembang. Diamkan 1 jam atau hingga mengembang dua kali lipat. Olesi dengan eggwash, taburi almond. Panggang di oven yang sudah dipanasi sebelumnya, di suhu 180-190 derajat celcius selama 25-30 menit sampai kuning kecokelatan.', 'cinnamon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(5) NOT NULL,
  `jenis_roti` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis_roti`) VALUES
('B00', 'Kue Basah'),
('K00', 'Kue Kering');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cara`
--
ALTER TABLE `cara`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cara`
--
ALTER TABLE `cara`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cara`
--
ALTER TABLE `cara`
  ADD CONSTRAINT `cara_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
