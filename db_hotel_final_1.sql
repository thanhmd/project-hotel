-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2017 at 10:42 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

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
-- Table structure for table `booking_invoice`
--

CREATE TABLE IF NOT EXISTS `booking_invoice` (
  `ID` int(11) NOT NULL,
  `IDCustomer` int(11) NOT NULL,
  `IDDetailHotelTypeRoom` int(11) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `IDAdmin` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_invoice`
--

INSERT INTO `booking_invoice` (`ID`, `IDCustomer`, `IDDetailHotelTypeRoom`, `check_in_date`, `check_out_date`, `IDAdmin`, `updated_at`, `created_at`) VALUES
(1, 52, 18, '2011-01-01', '2011-01-01', NULL, '2017-12-10 14:27:21', '2017-12-10 14:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `date_effective` date NOT NULL,
  `out_date_effective` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ContractStatus`
--

CREATE TABLE IF NOT EXISTS `ContractStatus` (
  `ID` int(11) NOT NULL,
  `StatusName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `detail_hotel_room_util`
--

CREATE TABLE IF NOT EXISTS `detail_hotel_room_util` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `util_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_hotel_service`
--

CREATE TABLE IF NOT EXISTS `detail_hotel_service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_hotel_service`
--

INSERT INTO `detail_hotel_service` (`id`, `name`, `service_id`, `hotel_id`, `price`, `updated_at`, `created_at`) VALUES
(6, 'as', 3, 5, 30000, '2017-12-10 06:08:19', '2017-12-10 06:08:19'),
(7, 'at', 4, 5, 100000, '2017-12-10 06:08:19', '2017-12-10 06:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `detail_hotel_typeroom`
--

CREATE TABLE IF NOT EXISTS `detail_hotel_typeroom` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_id` int(11) NOT NULL,
  `typeroom_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `maxpeople` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_hotel_typeroom`
--

INSERT INTO `detail_hotel_typeroom` (`id`, `name`, `hotel_id`, `typeroom_id`, `price`, `maxpeople`, `status`, `image`, `updated_at`, `created_at`) VALUES
(15, 'v1', 5, 2, 100000, 2, 0, NULL, '2017-12-10 06:08:19', '2017-12-10 06:08:19'),
(16, 'v1', 5, 2, 100000, 2, 1, NULL, '2017-12-10 13:39:39', '2017-12-10 06:08:19'),
(17, 'v1', 5, 2, 100000, 2, 0, NULL, '2017-12-10 06:08:19', '2017-12-10 06:08:19'),
(18, 'v2', 5, 3, 200000, 2, 0, NULL, '2017-12-10 06:08:19', '2017-12-10 06:08:19'),
(19, 'v2', 5, 3, 200000, 2, 0, NULL, '2017-12-10 06:08:20', '2017-12-10 06:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `isPopular` tinyint(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `province_id`, `isPopular`, `created_at`, `updated_at`) VALUES
(2, 'Quận 1', 11, NULL, '2017-11-15 21:43:09', '2017-11-15 21:43:09'),
(3, 'Quận 2', 11, NULL, '2017-11-20 01:57:22', '0000-00-00 00:00:00'),
(6, 'Quận 3', 11, NULL, '2017-12-06 21:30:24', '2017-12-06 21:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_owner` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `address_detail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `listservice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listtyperoom` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listimage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `date_begin_sale` date DEFAULT NULL,
  `date_finish_sale` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `id_owner`, `star`, `province_id`, `district_id`, `address_detail`, `image`, `description`, `listservice`, `listtyperoom`, `listimage`, `updated_at`, `created_at`, `status`, `sale`, `date_begin_sale`, `date_finish_sale`) VALUES
(5, 'Khach San Thanh', 48, 5, 11, 2, '123 duong 3/2', 'eZVO-Canh-quan-0.jpg', 'moo ta', NULL, NULL, NULL, '2017-12-10 13:08:49', '2017-12-10 13:08:49', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_imagelist`
--

CREATE TABLE IF NOT EXISTS `hotel_imagelist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hotel_imagelist`
--

INSERT INTO `hotel_imagelist` (`id`, `name`, `hotel_id`, `updated_at`, `created_at`) VALUES
(11, 'SLgL-Canh-quan.jpg', 5, '2017-12-10 06:08:19', '2017-12-10 06:08:19'),
(12, '3vql-Canh-quan-0.jpg', 5, '2017-12-10 06:08:19', '2017-12-10 06:08:19'),
(13, 'Cs19-khach-san-pullman-saigon-centre-28.jpg', 5, '2017-12-10 06:08:19', '2017-12-10 06:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `Province`
--

CREATE TABLE IF NOT EXISTS `Province` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `isPopular` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `Province`
--

INSERT INTO `Province` (`id`, `name`, `image`, `description`, `isPopular`, `created_at`, `updated_at`) VALUES
(10, 'Đà Nẵng1', 'da-nang.jpg', 'Nhiều khách sạn Đà Nẵng 5 sao, 4 sao tới 3 sao trở xuống đã ra đời trong những năm qua nhằm đáp ứng nhu cầu nghỉ dưỡng ngày càng cao và phong phú của du khách. Du lịch Đà Nẵng, không khó để tìm được một khách sạn hay resort Đà Nẵng ưng ý, phù hợp ngân sách. Đà Nẵng quy tụ từ những tên tuổi nghỉ dưỡng hàng đầu thế giới như Intercontinental, Hyatt, Accor, Furama...tới những thương hiệu danh tiếng trong nước như Fusion, Vinpearl, Naman... Nếu bạn muốn trải nghiệm biển thì bãi biển Bắc Mỹ Khê, Mỹ An, Non Nước hay bán đảo Sơn Trà là những lựa chọn hàng đầu. Nếu bạn muốn tận hưởng cảnh quan vùng núi hùng vĩ thì hãy chọn khách sạn núi Bà Nà. Còn để trải nghiệm thành phố Đà Nẵng, thì bạn có thể lựa chọn các khách sạn gần sông Hàn, trung tâm thành phố. Nếu cần được tư vấn thêm khi đặt phòng khách sạn Đà Nẵng thì hãy gọi ngay cho chúng tôi qua số điện thoại 24354 hoặc email : tranthihonghue19it@gmail.com2', NULL, NULL, '2017-12-05 17:50:35'),
(11, 'TP Hồ Chí Minh', 'ho-chi-minh.jpg', 'Sài Gòn là tên gọi thân thuộc của Tp Hồ Chí Minh, một trong hai thành phố lớn nhất của cả nước. Nhịp sống năng động, trẻ trung, con người ấm áp, thân thiện, văn hóa ẩm thực phong phú là điểm nhấn nổi bật của thành phố này. Sự phát triển kinh tế mạnh mẽ mang tới sự ra đời của hàng loạt khách sạn Sài Gòn từ khách sạn cao cấp tới khách sạn bình dân đáp ứng nhu cầu lưu trú của khách du lịch và khách công tác. Bên cạnh các khách sạn trong thành phố, thì những khu nghỉ dưỡng quanh Sài Gòn, các quận ngoại ô cũng đang là điểm đến hấp dẫn của người Sài Gòn vào các dịp cuối tuần. Hãy tham khảo dưới đây danh sách khách sạn Sài Gòn (Tp Hồ Chí Minh)', NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `typeservice_id`, `updated_at`, `created_at`) VALUES
(3, 'Dịch Vụ Ăn Sáng', 1, '2017-11-11 10:45:57', '0000-00-00 00:00:00'),
(4, 'Dịch Vụ Ăn Trưa', 1, '2017-11-11 10:45:57', '0000-00-00 00:00:00'),
(5, 'Dịch Vụ Ăn tối', 3, '2017-12-06 22:03:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `type_room`
--

CREATE TABLE IF NOT EXISTS `type_room` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `maxpeople` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `type_room`
--

INSERT INTO `type_room` (`id`, `name`, `image`, `maxpeople`, `updated_at`, `created_at`) VALUES
(2, 'Vip 1', 'medium_kbc1492699981_khach_san_phuong_huy_1.jpg', 1, '2017-12-07 04:54:28', '0000-00-00 00:00:00'),
(3, 'Vip 2', 'medium_sht1492701033_khach_san_phuong_huy_1_da_lat.jpg', 2, '2017-12-07 04:54:28', '0000-00-00 00:00:00'),
(4, 'Vip 3', 'medium_s9u1492701186_khach_san_phuong_huy_1_da_lat.jpg', 3, '2017-12-07 04:54:28', '0000-00-00 00:00:00'),
(5, 'Vip 4', 'medium_7yh1492701346_khach_san_phuong_huy_1_da_lat.jpg', 4, '2017-12-07 04:54:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `type_service`
--

CREATE TABLE IF NOT EXISTS `type_service` (
  `id` int(11) NOT NULL,
  `service` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `type_service`
--

INSERT INTO `type_service` (`id`, `service`, `created_at`, `updated_at`) VALUES
(1, 'Dịch Vụ Ăn Uống', '2017-11-05 19:54:10', '0000-00-00 00:00:00'),
(2, 'Dịch Vụ Làm Đẹp', '2017-11-05 19:54:10', '0000-00-00 00:00:00'),
(3, 'Dịch Vụ InterNet', '2017-12-07 05:00:49', '2017-12-06 22:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioitinh` int(11) DEFAULT NULL,
  `sdt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cmnd_passport` int(20) DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remember_token` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `email`, `password`, `level`, `name`, `created_at`, `updated_at`, `img`, `gioitinh`, `sdt`, `cmnd_passport`, `address`, `image`, `status`, `remember_token`) VALUES
(37, 'tuantuan@gmail.com', '$2y$10$OSTJb3M4Wik8jJHk.wYVTeHW73sWmb0ItUxxm3xL8XNy3BdLAN2Ai', 1, 'Trần Văn Tuân Tèo', '2017-11-11 11:00:52', '2017-11-11 04:00:52', NULL, NULL, '12423546', 457697890, 'Phu Nhuan', 'qDL0-21151194_1997208403848325_7705792957530574691_n.jpg', 0, NULL),
(38, 'cam@gmail.com', '$2y$10$.0XQl0cO3Npe9F9eLfGbEed7dTm23vbX9druVYEbp0p3umTB58fS.', 1, 'Tran Thi Hong Cam', '2017-11-05 13:53:28', '2017-11-05 06:53:28', NULL, NULL, '3534534', 43535, 'Ho Chi Minh', 'JM90-21463005_2004049626497536_5543897742146031095_n.jpg', 1, NULL),
(39, 'khoa@gmail.com', '$2y$10$WEZ1xpAGK471afZ3Nb47Deh99abv.didHZxsqNzEFxLTETLKqh7tq', 1, 'Vương Anh Khoa', '2017-11-06 03:17:26', '2017-11-05 20:17:26', NULL, NULL, '3264756876987', 645769789, 'Quận 4', 'gIM1-21728303_1985498035041422_4297042259853684095_n.jpg', 1, NULL),
(48, 'dmt2426@gmail.com', '$2y$10$QznmMwVSKHkkxNg8dk/Bre5EueqOr/pvA/tHhwi8/UEgEFJaVHOoW', 1, 'Thanh Minh', '2017-11-17 07:07:00', '2017-11-17 00:07:00', NULL, NULL, '0909090909', 123, 'abc', 'bm1Y-th.jpg', NULL, NULL),
(49, 'dmt@gmail.com', '$2y$10$odlfWZ19BsMC..ognQ8tweUyGVUv70eQ1gFCnhA/MoKBWAVN2A4ya', 1, 'abcde', '2017-11-17 11:06:41', '2017-11-17 11:06:41', NULL, NULL, '0909090909', 1234, 'aabbcc', NULL, 1, NULL),
(50, 'minhtr@gmail.com', NULL, NULL, 'Thanh Minh', '2017-12-10 14:06:09', '2017-12-10 14:06:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'dmt123@gmail.com', NULL, NULL, 'dd', '2017-12-10 14:25:41', '2017-12-10 14:25:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'dmt3444@gmail.com', NULL, NULL, 'dddd', '2017-12-10 14:27:21', '2017-12-10 14:27:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `util_room`
--

CREATE TABLE IF NOT EXISTS `util_room` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `booking_invoice`
--
ALTER TABLE `booking_invoice`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDDetailHotelTypeRoom` (`IDDetailHotelTypeRoom`),
  ADD KEY `IDAdmin` (`IDAdmin`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `hotel_id` (`hotel_id`) USING BTREE,
  ADD KEY `id_status` (`id_status`) USING BTREE;

--
-- Indexes for table `ContractStatus`
--
ALTER TABLE `ContractStatus`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `detail_hotel_room_util`
--
ALTER TABLE `detail_hotel_room_util`
  ADD PRIMARY KEY (`id`),
  ADD KEY `util_id` (`util_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `detail_hotel_service`
--
ALTER TABLE `detail_hotel_service`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `service_id` (`service_id`) USING BTREE,
  ADD KEY `hotel_id` (`hotel_id`) USING BTREE;

--
-- Indexes for table `detail_hotel_typeroom`
--
ALTER TABLE `detail_hotel_typeroom`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `typeroom_id` (`typeroom_id`) USING BTREE,
  ADD KEY `hotel_id` (`hotel_id`) USING BTREE;

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `province_id` (`province_id`) USING BTREE;

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `province_id` (`province_id`) USING BTREE,
  ADD KEY `id_owner` (`id_owner`) USING BTREE,
  ADD KEY `district_id` (`district_id`) USING BTREE;

--
-- Indexes for table `hotel_imagelist`
--
ALTER TABLE `hotel_imagelist`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_hotel` (`hotel_id`) USING BTREE;

--
-- Indexes for table `Province`
--
ALTER TABLE `Province`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `typeservice_id` (`typeservice_id`) USING BTREE;

--
-- Indexes for table `type_room`
--
ALTER TABLE `type_room`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `type_service`
--
ALTER TABLE `type_service`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD UNIQUE KEY `service` (`service`) USING BTREE;

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `util_room`
--
ALTER TABLE `util_room`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `booking_invoice`
--
ALTER TABLE `booking_invoice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_hotel_service`
--
ALTER TABLE `detail_hotel_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_hotel_typeroom`
--
ALTER TABLE `detail_hotel_typeroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hotel_imagelist`
--
ALTER TABLE `hotel_imagelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Province`
--
ALTER TABLE `Province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type_room`
--
ALTER TABLE `type_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type_service`
--
ALTER TABLE `type_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_invoice`
--
ALTER TABLE `booking_invoice`
  ADD CONSTRAINT `booking_invoice_ibfk_1` FOREIGN KEY (`IDDetailHotelTypeRoom`) REFERENCES `detail_hotel_typeroom` (`id`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `ContractStatus` (`ID`);

--
-- Constraints for table `detail_hotel_room_util`
--
ALTER TABLE `detail_hotel_room_util`
  ADD CONSTRAINT `detail_hotel_room_util_ibfk_1` FOREIGN KEY (`util_id`) REFERENCES `util_room` (`ID`),
  ADD CONSTRAINT `detail_hotel_room_util_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `detail_hotel_typeroom` (`id`);

--
-- Constraints for table `detail_hotel_service`
--
ALTER TABLE `detail_hotel_service`
  ADD CONSTRAINT `detail_hotel_service_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `detail_hotel_service_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);

--
-- Constraints for table `detail_hotel_typeroom`
--
ALTER TABLE `detail_hotel_typeroom`
  ADD CONSTRAINT `detail_hotel_typeroom_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`),
  ADD CONSTRAINT `detail_hotel_typeroom_ibfk_2` FOREIGN KEY (`typeroom_id`) REFERENCES `type_room` (`id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `Province` (`id`);

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_3` FOREIGN KEY (`id_owner`) REFERENCES `Users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hotel_ibfk_4` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hotel_ibfk_5` FOREIGN KEY (`province_id`) REFERENCES `Province` (`id`);

--
-- Constraints for table `hotel_imagelist`
--
ALTER TABLE `hotel_imagelist`
  ADD CONSTRAINT `hotel_imagelist_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`typeservice_id`) REFERENCES `type_service` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
