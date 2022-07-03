-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 01:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_hotel`
--

CREATE TABLE `data_hotel` (
  `id_hotel` int(11) NOT NULL,
  `name_hotel` varchar(255) NOT NULL,
  `price_hotel` int(11) NOT NULL,
  `class_hotel` int(11) NOT NULL,
  `location_hotel` varchar(255) NOT NULL,
  `price_angka` int(11) NOT NULL,
  `class_angka` int(11) NOT NULL,
  `location_angka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_hotel`
--

INSERT INTO `data_hotel` (`id_hotel`, `name_hotel`, `price_hotel`, `class_hotel`, `location_hotel`, `price_angka`, `class_angka`, `location_angka`) VALUES
(1, 'OYO 1293 Dei Residence Arjosari', 98999, 1, 'Suburban', 5, 1, 1),
(2, 'HARRIS Hotel & Convention Malang', 1008000, 3, 'Downtown', 4, 3, 4),
(3, 'Grand Cakra Hotel Malang', 443623, 4, 'Downtown', 5, 4, 4),
(4, 'Hotel Nugraha', 300000, 3, 'Near Downtown', 5, 3, 3),
(5, 'OYO Flagship 90502 Holistay Malang New', 118055, 1, 'Near Downtown', 5, 1, 3),
(6, 'OYO Life 2760 Kost Simpang Borobudur', 149999, 1, 'Suburban', 5, 1, 1),
(7, 'Simple Room at Simpang HomeStay', 125000, 2, 'Suburban', 5, 2, 1),
(8, 'Emy Guesthouse', 247500, 2, 'Suburban', 5, 2, 1),
(9, 'Omah Blimbing', 332500, 2, 'Near Downtown', 5, 2, 3),
(10, 'SPOT ON 90739 Kost Kalasan 39', 90000, 1, 'Near Downtown', 5, 1, 3),
(11, 'Liberta Hub Singosari ', 304200, 1, 'Suburban', 5, 1, 1),
(12, 'Djoglo Luxury Bungalow', 1995000, 4, 'Suburban', 4, 4, 1),
(13, 'Bali Graha Dewata Agung', 1500000, 4, 'Suburban', 4, 4, 1),
(14, 'Kontena Hotel', 500000, 3, 'Near Mall and Supermarket', 5, 3, 2),
(15, 'Villa Wijaya', 2000000, 3, 'Near Downtown', 4, 3, 3),
(16, 'Permata Villa D11', 5500000, 3, 'Near Downtown', 1, 3, 3),
(17, 'Villa Mulyono', 2800000, 3, 'Near Downtown', 3, 3, 3),
(18, 'Azcarya Villa Type Harry', 4500000, 5, 'Near Downtown', 2, 5, 3),
(19, 'Jambuluwuk Resort ', 3214874, 5, 'Near Downtown', 2, 5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_hotel`
--
ALTER TABLE `data_hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_hotel`
--
ALTER TABLE `data_hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
