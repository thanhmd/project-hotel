-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2017 at 12:53 PM
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
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `full_name`, `level`, `created_at`, `updated_at`) VALUES
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
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `date_effective` date NOT NULL,
  `out_date_effective` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `District`
--

CREATE TABLE IF NOT EXISTS `District` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `District`
--

INSERT INTO `District` (`id`, `name`, `province_id`, `created_at`, `updated_at`) VALUES
(3, 'Quận 6', 1, '2017-10-23 06:16:16', '2017-10-22 23:16:16'),
(7, 'Quận 5', 1, '2017-10-23 05:43:59', '0000-00-00 00:00:00'),
(12, 'Hà Tây1', 2, '2017-10-23 06:16:31', '2017-10-22 23:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `hotel-system`
--

CREATE TABLE IF NOT EXISTS `hotel-system` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `website` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel-system`
--

INSERT INTO `hotel-system` (`id`, `name`, `address`, `website`) VALUES
(1, 'Saigon Prince Hotel', '63 Nguyen Hue Blvd, District 1, Ho Chi Minh City, Nguyễn Huệ, Bến Nghé, Quận 1, Hồ Chí Minh', 'wwww.google.vn'),
(2, 'Khách Sạn Vissai SaiGon', '144 Nguyễn Văn Trỗi, phường 8, Phú Nhuận, Hồ Chí Minh', 'wwww.google.vn');

-- --------------------------------------------------------

--
-- Table structure for table `hotel-system-detail`
--

CREATE TABLE IF NOT EXISTS `hotel-system-detail` (
  `contact-name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `star-number` int(11) NOT NULL,
  `number-of-room` int(11) NOT NULL,
  `district-id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `hotel-system-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel-system-detail`
--

INSERT INTO `hotel-system-detail` (`contact-name`, `phone`, `star-number`, `number-of-room`, `district-id`, `country`, `city`, `hotel-system-id`) VALUES
('a.hung', '0999999999', 3, 10, 3, 'VN', 'HCM', 1),
('A.THANH', '0999999999', 5, 20, 7, 'VN', 'TPHCM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Province`
--

CREATE TABLE IF NOT EXISTS `Province` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Province`
--

INSERT INTO `Province` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Chí Minh', '0000-00-00 00:00:00', '2017-10-22 17:32:43'),
(2, 'Hà Nội', '2017-10-23 05:37:33', '2017-10-23 05:37:44'),
(3, 'Long An', '2017-10-23 08:33:31', '2017-10-23 08:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `typeroom_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `price`, `typeroom_id`, `status`) VALUES
(3, 'Phòng 3', 30000, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `typeservice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_room`
--

CREATE TABLE IF NOT EXISTS `type_room` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_room`
--

INSERT INTO `type_room` (`id`, `name`) VALUES
(2, 'Superior'),
(3, 'Deluxe'),
(4, 'Suite');

-- --------------------------------------------------------

--
-- Table structure for table `type_service`
--

CREATE TABLE IF NOT EXISTS `type_service` (
  `id` int(11) NOT NULL,
  `service` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioitinh` int(11) DEFAULT NULL,
  `sdt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cmnd_passport` int(20) DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `email`, `password`, `level`, `name`, `created_at`, `updated_at`, `img`, `gioitinh`, `sdt`, `cmnd_passport`, `address`, `image`) VALUES
(22, 'cuong@gmail.com', '1234567', 1, 'Cường Trần', '2017-11-03 12:09:43', '2017-11-03 05:09:43', NULL, NULL, '123456', 12345678, 'Gò Vấp', 'CKgX-20992612_1994465510789281_5661697735635033214_n.jpg'),
(23, 'quan@gmail.com', '$2y$10$aH8I/Xe02rml0.nEx5BtGeezw7rH8xn3WWGn9T1KJ4rw2/owkXFOu', 1, 'Quan Nguyen', '2017-11-03 02:32:29', '2017-11-03 02:32:29', NULL, NULL, '123', 98765, 'Gò Vấp', NULL),
(24, 'huehong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Hồng Huệ', '2017-11-03 02:51:09', '2017-11-03 02:51:09', NULL, NULL, '23243543', 54756876, 'Gò Vấp', NULL),
(25, 'tuan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Tuấn Nguyễn', '2017-11-03 02:54:08', '2017-11-03 02:54:08', NULL, NULL, '12423543', 645756876, 'Gò Vấp', NULL),
(26, 'betran@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Trần Thị Bé', '2017-11-03 02:56:26', '2017-11-03 02:56:26', NULL, NULL, '76876', 346345634, 'Gò Vấp', NULL),
(27, 'hoahue@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Nguyễn Thị Hoa', '2017-11-03 03:06:28', '2017-11-03 03:06:28', NULL, NULL, '768769', 987089089, 'Gò Vấp', NULL),
(28, 'ta@gmail.com', '$2y$10$A6UvqU54Jw/YwKFeFH6u4OS1dxZtQtThc9La.W1syDj2WiKZi10lC', 1, 'ta nguyen', '2017-11-03 11:41:40', '2017-11-03 04:41:40', NULL, NULL, '645768', 97809909, 'Gò Vấp', 'Ba6S-hue1.jpg'),
(29, 'teo@gmail.com', '$2y$10$766ppWoiIcd4lXaWhB81t.fu6zNMkZD0EZmUN4Y3tD9M24JJe8yTK', 1, 'Nguyễn Văn Tèo', '2017-11-03 12:27:27', '2017-11-03 05:27:27', NULL, NULL, '46457568', 567568, 'Gò Vấp', 'fUaO-20992612_1994465510789281_5661697735635033214_n.jpg'),
(30, 'doanh@gmail.com', '$2y$10$CadJmhfQ8aNFoB2MWMupd.pzSgv1G6Rbjt5K6Ed0NsvyKaN1JPb4K', 1, 'Lăng Kỳ Doanh', '2017-11-03 12:39:43', '2017-11-03 05:39:43', NULL, NULL, '326475', 56457568, 'Hồ Chí Minh', 'IfnG-21765175_1617270015024134_8324302426733873053_n.jpg'),
(31, 'tun@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'tun nguyen', '2017-11-03 05:51:37', '2017-11-03 05:51:37', NULL, NULL, '123456', 547568769, 'Hồ Chí Minh', NULL),
(32, 'ha@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Hồ Ngọc Hà', '2017-11-03 05:55:45', '2017-11-03 05:55:45', NULL, NULL, '56768', 54645768, 'Hồ Chí Minh', NULL),
(33, 'btran@gmail.com', '$2y$10$2eWA30v/LUZk4/Hc3utYsOuaUay696CZnhCJp2vG0jvaxSE73mW0.', 1, 'Nguyễn Văn B', '2017-11-03 13:00:07', '2017-11-03 06:00:07', NULL, NULL, '645756', 56574889, 'Hồ Chí Minh', 'kqFJ-20992612_1994465510789281_5661697735635033214_n.jpg'),
(34, 'c@gmail.com', '$2y$10$sL/lOdqAteghOhCVTtfJi.jTOTchgdrFOIBsiRIH0wIbsh00Az6q2', 1, 'Nguyễn Thị C', '2017-11-03 19:01:17', '2017-11-03 19:01:17', NULL, NULL, '23545764', 235436, 'Hồ Chí Minh', NULL),
(35, 'd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'sdsfdgfds', '2017-11-03 20:42:27', '2017-11-03 20:42:27', NULL, NULL, '436456', 5676876, 'Hồ Chí Minh', NULL),
(36, 'tunnguyen@gmail.com', '123456', 1, 'Nguyễn Văn Tũn', '2017-11-04 12:01:03', '2017-11-04 05:01:03', NULL, NULL, '5346', 47567856, 'Gò Vấp', '2o8e-21151194_1997208403848325_7705792957530574691_n.jpg'),
(37, 'tuantuan@gmail.com', '$2y$10$DM/l6UWKanZanz7Kf37Y.edGZN5FIvgtuUgAGfQm6/yYRowiFZpbe', 1, 'Trần Văn Tuân', '2017-11-04 12:32:22', '2017-11-04 05:32:22', NULL, NULL, '12423546', 457697890, 'Gò Vấp', 'jl7S-z769693331549_b4084e3ccea9b1e697a7b372950714ce.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `District`
--
ALTER TABLE `District`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `hotel-system`
--
ALTER TABLE `hotel-system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel-system-detail`
--
ALTER TABLE `hotel-system-detail`
  ADD KEY `hotel-system-id` (`hotel-system-id`),
  ADD KEY `district-id` (`district-id`);

--
-- Indexes for table `Province`
--
ALTER TABLE `Province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeroom_id` (`typeroom_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `type_room`
--
ALTER TABLE `type_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_service`
--
ALTER TABLE `type_service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `service` (`service`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `District`
--
ALTER TABLE `District`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hotel-system`
--
ALTER TABLE `hotel-system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Province`
--
ALTER TABLE `Province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_room`
--
ALTER TABLE `type_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_service`
--
ALTER TABLE `type_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `District`
--
ALTER TABLE `District`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `Province` (`id`);

--
-- Constraints for table `hotel-system-detail`
--
ALTER TABLE `hotel-system-detail`
  ADD CONSTRAINT `hotel-system-detail_ibfk_1` FOREIGN KEY (`hotel-system-id`) REFERENCES `hotel-system` (`id`),
  ADD CONSTRAINT `hotel-system-detail_ibfk_2` FOREIGN KEY (`district-id`) REFERENCES `District` (`id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_group` FOREIGN KEY (`typeroom_id`) REFERENCES `type_room` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
