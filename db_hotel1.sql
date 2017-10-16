-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2017 at 03:59 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `full_name`, `level`, `created_at`, `updated_at`) VALUES
(1, 'langkidoanhit@gmail.com', '123456', 'Lăng Kỳ Doanh', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'tranthihonghue19it@gmail.com', '123456', 'Trần Thị Hồng Huệ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'tranthihonghue13bs@gmail.com', '123456', 'Trần Thị Hồng Cẩm', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'teonguyen@gmail.com', '123456', 'Nguyễn Văn Tèo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'duongminhthanh@gmail.com', '$2y$10$TM94Zx6DJ6/5QHKqwa4ML.7CfLr.ZxkmYYtRf0hzbXX4DY.vuKNy2', 'Dương Minh Thành', 1, '2017-10-13 19:19:24', '2017-10-13 19:19:24'),
(6, 'ninh@gmail.com', '$2y$10$qVL85N4IhZroKON3E/VKj.f3X5E459sJxFK5JEHgjcoe3K1tTuzFC', 'Nguyễn Thị Ninh', 1, '2017-10-13 19:24:43', '2017-10-13 19:24:43'),
(7, 'canhtran@gmail.com', '$2y$10$eu6jFpUQGxD02CYhOWpK9uoBosaMHs2lvFpVy1UEsnmtZly/JuprK', 'Trần Cảnh', 1, '2017-10-13 19:25:54', '2017-10-13 19:25:54'),
(8, 'trinhnguyen408@gmail.com', '$2y$10$E.a3496FYbajCI.YdehWuerlDoA3XuV1K/xHM.Z271pCkXxmR8N9W', 'Trinh Nguyễn', 1, '2017-10-13 19:26:17', '2017-10-13 19:26:17'),
(9, 'tungnui@gmail.com', '$2y$10$npw6QBOWX.w3beurPJNJOeiipxQKeWuR1Jdm6mK1mb7HNgcgDB9RS', 'Sơn Tùng', 1, '2017-10-14 02:21:21', '2017-10-14 02:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `District`
--

CREATE TABLE IF NOT EXISTS `District` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `District`
--

INSERT INTO `District` (`id`, `name`, `province_id`) VALUES
(3, 'Quận 1', 1),
(4, 'Quận 2', 1),
(5, 'Quận 3', 1),
(6, 'Quận 4', 1),
(7, 'Quận 5', 1),
(8, 'Quận 6', 1),
(9, 'Quận 7', 1),
(10, 'Quận 8', 1),
(11, 'Quận 9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Province`
--

CREATE TABLE IF NOT EXISTS `Province` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Province`
--

INSERT INTO `Province` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Chí Minh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Hà Nội', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Quảng Ngãi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Quảng Bình', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Đồng Nai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Lâm Đồng', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Nghệ An', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Hà Tĩnh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Đà Lạt', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Bình Định', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Huế', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Đà Nẵng', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Yên Bái', '2017-10-13 20:18:49', '2017-10-13 20:18:49'),
(14, 'Long An', '2017-10-13 20:19:28', '2017-10-13 20:19:28'),
(15, 'Tiền Giang', '2017-10-13 20:20:05', '2017-10-13 20:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Bơi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Xông Hơi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Cà phê sáng', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Máy Lạnh', '2017-10-13 20:35:14', '2017-10-13 20:35:14'),
(5, 'Mát sa', '2017-10-13 20:35:23', '2017-10-13 20:35:23'),
(6, 'Gym', '2017-10-14 02:57:22', '2017-10-14 02:57:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `District`
--
ALTER TABLE `District`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `Province`
--
ALTER TABLE `Province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `District`
--
ALTER TABLE `District`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Province`
--
ALTER TABLE `Province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `District`
--
ALTER TABLE `District`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `Province` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
