-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2017 at 05:03 PM
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
-- Table structure for table `detail_hotel_service`
--

CREATE TABLE IF NOT EXISTS `detail_hotel_service` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `price` double NOT NULL
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `start` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `address_detail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `start`, `province_id`, `address_detail`, `updated_at`, `created_at`, `image`) VALUES
(18, 'InterContinental Danang Sun Peninsula Resort', 5, 10, 'Bãi Bắc, bán đảo Sơn Trà, Đà Nẵng', '0000-00-00 00:00:00', '2017-11-10 08:33:27', ''),
(20, 'Furama Resort Đà Nẵng', 5, 10, 'Đường Võ Nguyên Giáp, Phường Khuê Mỹ, Quận Ngũ Hành ', NULL, '2017-11-10 08:34:55', ''),
(21, 'Hyatt Regency Danang Resort & Spa', 5, 10, 'Phường Hòa Hải, Ngũ Hành Sơn, Đà Nẵng  ', NULL, '2017-11-10 08:35:19', ''),
(22, 'Naman Retreat Resort Đà Nẵng - Miễn phí Spa', 5, 10, 'Đường Trường Sa, quận Ngũ Hành Sơn, Đà Nẵng, Đà Nẵng', NULL, '2017-11-10 08:35:45', ''),
(23, 'Khách sạn À La Carte Đà Nẵng', 5, 10, '200 Võ Nguyên Giáp, Phường Phước Mỹ, Quận Sơn Trà, Đà Nẵng', NULL, '2017-11-10 08:36:10', ''),
(24, 'Risemount Resort Đà Nẵng - Miễn phí đưa đón sân bay', 4, 10, '120 Nguyễn Văn Thoại, Mỹ An, Ngũ Hành Sơn, Đà Nẵng   ', NULL, '2017-11-10 08:36:35', ''),
(25, 'Khách sạn Novotel Danang Premier Han River', 5, 10, '36 Bạch Đằng, Quận Hải Châu, Đà Nẵng ', NULL, '2017-11-10 08:37:02', ''),
(26, '\r\nKhách sạn Mường Thanh Luxury Đà Nẵng', 4, 10, '270 Võ Nguyên Giáp, Phường Mỹ An, Quận Ngũ Hành ', NULL, '2017-11-10 08:37:37', ''),
(27, 'Premier Village Danang Resort Managed by Accor', 4, 10, 'Đường Võ Nguyên Giáp, Quận Ngũ Hành Sơn, Đà Nẵng', NULL, '2017-11-10 08:38:14', ''),
(28, 'Khách sạn Fusion Suites Đà Nẵng - Miễn phí Massage chân', 5, 10, 'Đường Võ Nguyên Giáp, Quận Sơn Trà, Đà Nẵng, Đà Nẵng ', NULL, '2017-11-10 08:38:44', ''),
(29, 'The Grand Hồ Tràm Strip', 5, 6, 'Phước Thuận, Xuyên Mộc, Vũng Tàu', NULL, '2017-11-10 10:11:57', ''),
(30, 'Khách sạn Imperial Vũng Tàu', 4, 6, '159 Thùy Vân, Vũng Tàu', NULL, '2017-11-10 10:12:47', ''),
(31, 'Alma Oasis Long Hải Resort - Miễn phí Spa', 4, 6, 'Alma Oasis Long Hải Resort - Miễn phí Spa', NULL, '2017-11-10 10:12:47', ''),
(32, 'Khách sạn The Reverie Saigon', 0, 11, '22-36 Nguyễn Huệ, Quận 1, Hồ Chí Minh (Sài Gòn)', NULL, '2017-11-10 12:18:41', 'khach-san-the-reverie-saigon-45 .jpg'),
(33, 'Khách sạn The Reverie Saigon', 5, 11, '22-36 Nguyễn Huệ, Quận 1, Hồ Chí Minh (Sài Gòn)', NULL, '2017-11-10 12:19:07', 'khach-san-the-reverie-saigon-45 .jpg'),
(34, 'Khách sạn Sheraton Saigon', 4, 11, '88 Đồng Khởi, Quận 1, Hồ Chí Minh (Sài Gòn)', NULL, '2017-11-10 12:19:39', 'Selection_2141.jpg'),
(35, 'Khách sạn Rex Sài Gòn', 5, 11, '141 đại lộ Nguyễn Huệ , Quận 1, Hồ Chí Minh (Sài Gòn)', NULL, '2017-11-10 12:20:12', 'ks.45.khach-san-rex-sai-gon.html'),
(36, 'Khách sạn Novotel Saigon Centre', 5, 11, '165 - 167 Hai Bà Trưng, Quận 3, Hồ Chí Minh (Sài Gòn) ', NULL, '2017-11-10 12:20:49', 'khach-san-novotel-saigon-centre-9.jpg'),
(37, 'Khách sạn Sofitel Saigon Plaza', 5, 11, '17 Lê Duẩn, Quận 1, Hồ Chí Minh (Sài Gòn) ', NULL, '2017-11-10 12:21:16', 'khach-san-sofitel-saigon-plaza-0.jpg'),
(38, 'Khách sạn Le Meridien Sài Gòn', 4, 11, '3C Tôn Đức Thắng, Quận 1, Hồ Chí Minh (Sài Gòn) ', NULL, '2017-11-10 12:21:47', 'khach-san-le-meridien-sai-gon-5.jpg'),
(39, 'Khách sạn Pullman Saigon Centre', 5, 11, '148 Trần Hưng Đạo, Hồ Chí Minh (Sài Gòn) ', NULL, '2017-11-10 12:22:17', 'khach-san-pullman-saigon-centre-28.jpg'),
(40, 'Khách sạn Park Hyatt Saigon', 4, 11, 'Số 2, Công trường Lam Sơn, Quận 1, Hồ Chí Minh (Sài Gòn) ', NULL, '2017-11-10 12:22:46', 'khach-san-park-hyatt-saigon-0.jpg'),
(41, 'Anantara Mũi Né Resort & Spa', 2, 9, 'Km10, Hàm Tiến, Mũi Né, Phan Thiế', NULL, '2017-11-10 16:59:30', 'Canh-quan.jpg'),
(42, 'The Cliff Resort & Residences', 3, 9, 'Khu Phố 5, phường Phú Hài, Mũi Né, Phan Thiết', NULL, '2017-11-10 17:00:03', 'the-cliff-resort-residences-7.jpg'),
(43, 'Princess D''Annam Resort & Spa', 4, 9, 'Khu Hòn Lan, Xã Tân Thành, Huyện Hàm Thuận Nam, Phan Thiết ', NULL, '2017-11-10 17:00:39', 'Canh-quan-0.jpg'),
(44, 'Khu căn hộ Ocean Vista Sea Links', 1, 9, 'Khu SeaLinks City, Km9, đường Nguyễn Thông, Phú Hài, Phan Thiết ', NULL, '2017-11-10 17:01:12', 'khu-can-ho-ocean-vista-sea-links-0.jpg'),
(45, 'Yêu thích	\r\nMuine Bay Resort', 1, 9, 'Khu phố 14, Mũi Né, Phan Thiết', NULL, '2017-11-10 17:01:55', 'muine-bay-resort-59.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Province`
--

CREATE TABLE IF NOT EXISTS `Province` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Province`
--

INSERT INTO `Province` (`id`, `name`, `created_at`, `updated_at`, `image`, `description`) VALUES
(6, 'Vũng Tàu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vung-tau.jpg', NULL),
(9, 'Phan Thiết', NULL, NULL, 'phan-thiet.jpg', NULL),
(10, 'Đà Nẵng', NULL, NULL, 'da-nang.jpg', 'Nhiều khách sạn Đà Nẵng 5 sao, 4 sao tới 3 sao trở xuống đã ra đời trong những năm qua nhằm đáp ứng nhu cầu nghỉ dưỡng ngày càng cao và phong phú của du khách. Du lịch Đà Nẵng, không khó để tìm được một khách sạn hay resort Đà Nẵng ưng ý, phù hợp ngân sách. Đà Nẵng quy tụ từ những tên tuổi nghỉ dưỡng hàng đầu thế giới như Intercontinental, Hyatt, Accor, Furama...tới những thương hiệu danh tiếng trong nước như Fusion, Vinpearl, Naman... Nếu bạn muốn trải nghiệm biển thì bãi biển Bắc Mỹ Khê, Mỹ An, Non Nước hay bán đảo Sơn Trà là những lựa chọn hàng đầu. Nếu bạn muốn tận hưởng cảnh quan vùng núi hùng vĩ thì hãy chọn khách sạn núi Bà Nà. Còn để trải nghiệm thành phố Đà Nẵng, thì bạn có thể lựa chọn các khách sạn gần sông Hàn, trung tâm thành phố. Nếu cần được tư vấn thêm khi đặt phòng khách sạn Đà Nẵng thì hãy gọi ngay cho chúng tôi qua số điện thoại 24354 hoặc email : tranthihonghue19it@gmail.com'),
(11, 'TP Hồ Chí Minh', NULL, NULL, 'ho-chi-minh.jpg', NULL),
(12, 'Hà Nội', NULL, NULL, 'hanoi.jpg', NULL),
(13, 'Nha Trang', NULL, NULL, 'nha-trang.jpg', NULL),
(14, 'Phú Quốc', NULL, NULL, 'phu-quoc.jpg', NULL),
(15, 'Đà Lạt', NULL, NULL, 'dalat.jpg', NULL);

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
  `typeservice_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
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
  `service` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_service`
--

INSERT INTO `type_service` (`id`, `service`, `created_at`, `updated_at`) VALUES
(1, 'Dịch Vụ Ăn Uống', '2017-11-05 19:54:10', '0000-00-00 00:00:00'),
(2, 'Dịch Vụ Làm Đẹp', '2017-11-05 19:54:10', '0000-00-00 00:00:00'),
(3, 'Dịch Vụ InterNet', '2017-11-05 12:54:52', '2017-11-05 12:54:52');

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
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `email`, `password`, `level`, `name`, `created_at`, `updated_at`, `img`, `gioitinh`, `sdt`, `cmnd_passport`, `address`, `image`, `status`) VALUES
(37, 'tuantuan@gmail.com', '$2y$10$Xp3jkKdtLdiFf9Ub4QgOIuXYKngqFIAF.JFp5BII1vS2KFn.7T5mi', 1, 'Trần Văn Tuân', '2017-11-06 02:54:23', '2017-11-05 19:54:23', NULL, NULL, '12423546', 457697890, 'Gò Vấp', '1ccv-21463005_2004049626497536_5543897742146031095_n.jpg', 0),
(38, 'cam@gmail.com', '$2y$10$.0XQl0cO3Npe9F9eLfGbEed7dTm23vbX9druVYEbp0p3umTB58fS.', 1, 'Tran Thi Hong Cam', '2017-11-05 13:53:28', '2017-11-05 06:53:28', NULL, NULL, '3534534', 43535, 'Ho Chi Minh', 'JM90-21463005_2004049626497536_5543897742146031095_n.jpg', 1),
(39, 'khoa@gmail.com', '$2y$10$WEZ1xpAGK471afZ3Nb47Deh99abv.didHZxsqNzEFxLTETLKqh7tq', 1, 'Vương Anh Khoa', '2017-11-06 03:17:26', '2017-11-05 20:17:26', NULL, NULL, '3264756876987', 645769789, 'Quận 4', 'gIM1-21728303_1985498035041422_4297042259853684095_n.jpg', 1);

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
-- Indexes for table `detail_hotel_service`
--
ALTER TABLE `detail_hotel_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `District`
--
ALTER TABLE `District`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

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
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `typeservice_id` (`typeservice_id`);

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
-- AUTO_INCREMENT for table `detail_hotel_service`
--
ALTER TABLE `detail_hotel_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `District`
--
ALTER TABLE `District`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `Province`
--
ALTER TABLE `Province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_hotel_service`
--
ALTER TABLE `detail_hotel_service`
  ADD CONSTRAINT `detail_hotel_service_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `detail_hotel_service_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);

--
-- Constraints for table `District`
--
ALTER TABLE `District`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `Province` (`id`);

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `Province` (`id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_group` FOREIGN KEY (`typeroom_id`) REFERENCES `type_room` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`typeservice_id`) REFERENCES `type_service` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
