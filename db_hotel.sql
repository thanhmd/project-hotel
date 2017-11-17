-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2017 at 11:00 PM
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
  `date_sign` date NOT NULL,
  `date_expiry` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `name`, `hotel_id`, `date_sign`, `date_expiry`) VALUES
(2, 'HỢP ĐỒNG ĐĂNG TIN KHÁCH SẠN TRÊN HỆ THỐNG WEBSITE', 47, '2017-11-16', '2017-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `detail_hotel_service`
--

CREATE TABLE IF NOT EXISTS `detail_hotel_service` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_hotel_service`
--

INSERT INTO `detail_hotel_service` (`id`, `service_id`, `hotel_id`, `price`) VALUES
(1, 3, 47, 3000),
(2, 3, 49, 40000),
(3, 4, 47, 5000),
(4, 4, 49, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_hotel_typeroom`
--

CREATE TABLE IF NOT EXISTS `detail_hotel_typeroom` (
  `id` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_typeroom` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_hotel_typeroom`
--

INSERT INTO `detail_hotel_typeroom` (`id`, `id_hotel`, `id_typeroom`, `price`) VALUES
(1, 47, 2, 10000),
(2, 47, 3, 20000),
(3, 47, 4, 30000);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `District`
--

INSERT INTO `District` (`id`, `name`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'Quận 1', 11, '2017-11-15 11:01:57', '2017-11-15 11:01:57'),
(2, 'Quận 2', 11, '2017-11-15 11:02:15', '2017-11-15 11:02:15'),
(3, 'Quận 3', 11, '2017-11-15 11:02:26', '2017-11-15 11:02:26'),
(4, 'Quận 4', 11, '2017-11-15 11:02:37', '2017-11-15 11:02:37'),
(5, 'Xuyên Lộc', 6, '2017-11-16 02:12:30', '0000-00-00 00:00:00');

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
  `image` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `listservice` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_owner` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `listtyperoom` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `sale` int(11) NOT NULL,
  `date_begin_sale` date NOT NULL,
  `date_finish_sale` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `start`, `province_id`, `address_detail`, `updated_at`, `created_at`, `image`, `description`, `listservice`, `id_owner`, `district_id`, `listtyperoom`, `status`, `sale`, `date_begin_sale`, `date_finish_sale`) VALUES
(47, 'The Grand Hồ Tràm Strip', 3, 6, 'Phước Thuận', '2017-11-16 07:49:09', '2017-11-17 04:52:12', 'the-grand-ho-tram-strip-0.jpg', 'The Grand Hồ Tràm Strip là một khu nghỉ dưỡng phức hợp sang trọng nhiều loại hình dịch vụ: hoạt động giải trí nghỉ dưỡng, hệ thống nhà hàng cao cấp, trung tâm spa và các tiện nghi trò chơi có thưởng hiện đại. \r\nThe Grand Hồ Tràm Strip với 541 phòng được trang bị tiện nghi đẳng cấp thế giới trong giai đoạn một, trung tâm hội nghị và khu vực trò chơi có thưởng được trang bị 500 máy chơi điện tử và 90 bàn trò chơi dành cho người nước ngoài cùng các tiện nghi VIP biệt lập.', '3', 38, 5, '2,3,4,5', 1, 40, '2017-11-17', '2017-11-30'),
(49, 'Alma Oasis Long Hải Resort - Miễn phí Spa', 5, 6, 'ỉnh lộ 44', '2017-11-16 08:59:23', '2017-11-17 07:05:58', 'alma-oasis-long-hai-resort-mien-phi-spa-38.jpg', 'Alma Oasis Long Hải Resort – Miễn phí Spa là resort được xây mới hoàn toàn trên nền đất của resort Vũng Tàu Kỳ Vân và được khai trương vào tháng 1 năm 2015, resort thuộc tập đoàn Fusion Resorts. Khu nghỉ dưỡng còn được du khách mệnh danh là ốc đảo xanh ở Bà Rịa - Vũng Tàu.\r\n\r\nAlma Oasis Long Hải sở hữu lối kiến trúc hiện đại, tinh tế với hệ thống phòng ốc và biệt thự khang trang với các phòng khách sạn hướng biển.', '5,7', 37, 3, '3', 1, 50, '2017-11-17', '2017-11-18'),
(50, 'Oceanami Villas & Beach Club', 3, 6, 'Tỉnh lộ 44, Thị trấn Phước Hải', '2017-11-17 07:04:55', '2017-11-17 07:04:55', 'hhhhhh-171341.jpg', 'Oceanami Villas & Beach Club với 347 căn biệt thự nghỉ dưỡng gồm: gồm biệt thự 03 phòng ngủ, 04 phòng ngủ và biệt thự mặt biển. Cung cấp 01 số các tiện ích như: 02 sân tenis, phòng tập gym, hồ bơi, quán bar, cafe, club house, dịch vụ spa, nhà hàng Á – Âu, thư viện\r\n\r\nOceanami Villas & Beach Club dự kiến khai trương khoảng tháng 15.12.2017\r\n', '3', 37, 5, NULL, 1, 30, '2017-11-17', '2017-11-20'),
(51, 'Lan Rừng Resort & Spa', 5, 6, '3 - 6 Hạ Long', NULL, '2017-11-17 07:09:14', 'lan-rung-resort-spa.jpg', 'Lan Rừng Resort & Spa thuộc bãi trước. Resort theo phong cách kiến trúc độc đáo, với những pho tượng cổ kính thấp thoáng trong khu vườn nhiệt đới, những chiếc cột xây theo phong cách Hy Lạp được trang hoàng bằng hình ảnh của các thiên thần, các bức tường được chạm trổ cầu kỳ.\r\n\r\nLan Rừng là tổng hòa giữa vẻ đẹp của một tác phẩm kiến trúc cổ điển, tiện nghi hiện đại và dịch vụ khách hàng tận tình. Vì thế, nơi đây là lựa chọn lý tưởng khi quý khách muốn trải nghiệm một kỳ nghỉ thư giãn bên người thân, tổ chức một sự kiện đặc biệt quan trọng hay đơn giản là muốn thưởng thức một bữa tối lãng mạn bên bờ biển.\r\n\r\nBên cạnh vị trí thuận lợi cho di chuyển và tham quan, Lan Rừng Resort & Spa còn thu hút du khách bởi nét giao hòa giữa nghệ thuật kiến trúc vừa cổ điển vừa hiện đại của Châu Âu.\r\n\r\nHai khu chính là Seaside (bên biển) và Hillside (bên đồi) nằm đối diện nhau với tổng cộng 80 phòng nghỉ dưỡng từ Deluxe đến Suite và nhiều hạng phòng khác nhau với giá cả phù hợp.', '5,7', 37, 5, '4', 1, 25, '2017-11-17', '2017-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_imagelist`
--

CREATE TABLE IF NOT EXISTS `hotel_imagelist` (
  `id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_imagelist`
--

INSERT INTO `hotel_imagelist` (`id`, `image`, `hotel_id`) VALUES
(11, 'the-grand-ho-tram-strip-1.jpg', 47),
(13, 'the-grand-ho-tram-strip-4.jpg', 47),
(14, 'the-grand-ho-tram-strip-0.jpg', 47),
(15, 'alma-oasis-long-hai-resort-mien-phi-spa-55.jpg', 49),
(16, 'alma-oasis-long-hai-resort-mien-phi-spa-0.jpg', 49),
(17, 'alma-oasis-long-hai-resort-mien-phi-spa-1.jpg', 49),
(18, 'alma-oasis-long-hai-resort-mien-phi-spa-3.jpg', 49),
(19, 'lobby-1532407.jpg', 50),
(20, 'roommm-5-1514274.jpg', 50),
(21, 'roommm-7-1514419.jpg', 50),
(22, 'sanh-le-tan-11-133897.jpg', 51),
(23, 'sanh-le-tan-4-1338322.jpg', 51);

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
(6, 'Vũng Tàu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vung-tau.jpg', 'Vũng Tàu là điểm đến ngắn ngày quen thuộc của du khách từ Sài Gòn. Khi du lịch Vũng Tàu, du khách thường lựa chọn khách sạn Vũng Tàu Bãi Sau bởi vị trí thuận tiện tắm biển. Những năm gần đây, các khu vực lân cận như Long Hải, Hồ Tràm cũng đang trở thành sự lựa chọn phổ biến của du khách. Mặc dù khách sạn Vũng Tàu đáp ứng được đa dạng ngân sách của du khách từ bình dân tới cao cấp nhưng giá phòng khách sạn Vũng Tàu có thể giao động nhiều tùy thuộc vào giai đoạn lưu trú. Tới Vũng Tàu vào các ngày trong tuần, bạn luôn có thể đặt phòng khách sạn với mức giá cực kì ưu đãi, ngược lại cuối tuần luôn là thời gian cao điểm du lịch Vũng Tàu, vì vậy nếu bạn dự tính đi Vũng Tàu vào dịp cuối tuần thì nên đặt phòng trước vài tuần để chọn được khách sạn ưng ý với mức giá tốt. Dưới đây là danh sách khách sạn tại Vũng Tàu và một số khu vực lân cận. Nếu bạn cần thêm sự tư vấn khi đặt phòng thì hãy liên hệ ngay vớ'),
(9, 'Phan Thiết', NULL, NULL, 'phan-thiet.jpg', NULL),
(10, 'Đà Nẵng', NULL, NULL, 'da-nang.jpg', 'Nhiều khách sạn Đà Nẵng 5 sao, 4 sao tới 3 sao trở xuống đã ra đời trong những năm qua nhằm đáp ứng nhu cầu nghỉ dưỡng ngày càng cao và phong phú của du khách. Du lịch Đà Nẵng, không khó để tìm được một khách sạn hay resort Đà Nẵng ưng ý, phù hợp ngân sách. Đà Nẵng quy tụ từ những tên tuổi nghỉ dưỡng hàng đầu thế giới như Intercontinental, Hyatt, Accor, Furama...tới những thương hiệu danh tiếng trong nước như Fusion, Vinpearl, Naman... Nếu bạn muốn trải nghiệm biển thì bãi biển Bắc Mỹ Khê, Mỹ An, Non Nước hay bán đảo Sơn Trà là những lựa chọn hàng đầu. Nếu bạn muốn tận hưởng cảnh quan vùng núi hùng vĩ thì hãy chọn khách sạn núi Bà Nà. Còn để trải nghiệm thành phố Đà Nẵng, thì bạn có thể lựa chọn các khách sạn gần sông Hàn, trung tâm thành phố. Nếu cần được tư vấn thêm khi đặt phòng khách sạn Đà Nẵng thì hãy gọi ngay cho chúng tôi qua số điện thoại 24354 hoặc email : tranthihonghue19it@gmail.com'),
(11, 'TP Hồ Chí Minh', NULL, NULL, 'ho-chi-minh.jpg', 'Sài Gòn là tên gọi thân thuộc của Tp Hồ Chí Minh, một trong hai thành phố lớn nhất của cả nước. Nhịp sống năng động, trẻ trung, con người ấm áp, thân thiện, văn hóa ẩm thực phong phú là điểm nhấn nổi bật của thành phố này. Sự phát triển kinh tế mạnh mẽ mang tới sự ra đời của hàng loạt khách sạn Sài Gòn từ khách sạn cao cấp tới khách sạn bình dân đáp ứng nhu cầu lưu trú của khách du lịch và khách công tác. Bên cạnh các khách sạn trong thành phố, thì những khu nghỉ dưỡng quanh Sài Gòn, các quận ngoại ô cũng đang là điểm đến hấp dẫn của người Sài Gòn vào các dịp cuối tuần. Hãy tham khảo dưới đây danh sách khách sạn Sài Gòn (Tp Hồ Chí Minh). Nếu cần thêm tư vấn khi đặt phòng tại Sài Gòn, thì bạn hãy liên hệ ngay Chudu24 nhé.'),
(12, 'Hà Nội', NULL, NULL, 'hanoi.jpg', 'Tùy thuộc theo nhu cầu thăm quan hay công tác mà du khách tới Hà Nội sẽ lựa chọn Khách sạn Hà Nội theo khu vực phù hợp. Khách tới thăm quan Hà Nội thường lựa chọn nghỉ tại Khách sạn phố Cổ hoặc khách sạn gần hồ Hoàn Kiếm, khách sạn gần Hồ Tây. Còn du khách công tác, hội nghị thì lại thường lựa chọn các khách sạn Hà Nội 5 sao tới 3 sao ở trung tâm thành phố. Nếu lựa chọn Hà Nội là điểm chung chuyển để đi tới các tỉnh thành khác thì du khách thường chọn khách sạn Hà Nội gần sân bay hoạch gần Ga Hà Nội. '),
(13, 'Nha Trang', NULL, NULL, 'nha-trang.jpg', 'Nhắc tới Nha Trang là nhắc tới du lịch biển. Khách sạn Nha Trang gần biển luôn là tìm kiếm hàng đầu của du khách tới Nha Trang. Khách sạn đường Trần Phú đã trở thành sự lựa chọn quen thuộc của phần lớn du khách lần đầu tới Nha Trang bởi vị trí vừa gần phố, vừa gần biển, quy tụ rất nhiều khách sạn Nha Trang 5 sao, 4 sao tới 3 sao trở xuống. Trong khi đó, Vịnh Ninh Vân hay Bãi Dài lại là lựa chọn phổ biến của du khách muốn tìm kiếm trải nghiệm nghỉ dưỡng riêng tư và cao cấp với hầu hết khách sạn, resort 5 sao hạng sang. Còn nếu bạn muốn tận hưởng kì nghỉ sôi động thì đảo Hòn Tre với cụm công viên giải trí, khách sạn, resort Vinpearl nổi tiếng sẽ là lựa chọn hàng đầu'),
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `typeservice_id`, `updated_at`, `created_at`) VALUES
(3, 'Dịch Vụ Ăn Sáng', 1, '2017-11-11 10:45:57', '0000-00-00 00:00:00'),
(4, 'Dịch Vụ Ăn Trưa', 1, '2017-11-11 10:45:57', '0000-00-00 00:00:00'),
(5, 'Dịch Vụ Ăn tối', 1, '2017-11-12 19:28:20', '0000-00-00 00:00:00'),
(7, 'Dịch Vụ Ăn khuya', 1, '2017-11-12 19:28:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `type_room`
--

CREATE TABLE IF NOT EXISTS `type_room` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `maxpeople` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_room`
--

INSERT INTO `type_room` (`id`, `name`, `image`, `hotel_id`, `maxpeople`) VALUES
(2, 'Phòng 1 giường 1 khách', 'medium_kbc1492699981_khach_san_phuong_huy_1.jpg', 20, 1),
(3, 'Phòng 1 Giường 2 khách', 'medium_sht1492701033_khach_san_phuong_huy_1_da_lat.jpg', 20, 2),
(4, 'Phòng 2 Giường 4 khách', 'medium_s9u1492701186_khach_san_phuong_huy_1_da_lat.jpg', 20, 3),
(5, 'Phòng 3 Giường 6 khách', 'medium_7yh1492701346_khach_san_phuong_huy_1_da_lat.jpg', 20, 6);

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
(37, 'tuantuan@gmail.com', '$2y$10$OSTJb3M4Wik8jJHk.wYVTeHW73sWmb0ItUxxm3xL8XNy3BdLAN2Ai', 1, 'Trần Văn Tuân Tèo', '2017-11-11 11:00:52', '2017-11-11 04:00:52', NULL, NULL, '12423546', 457697890, 'Phu Nhuan', 'qDL0-21151194_1997208403848325_7705792957530574691_n.jpg', 0),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `detail_hotel_service`
--
ALTER TABLE `detail_hotel_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `detail_hotel_typeroom`
--
ALTER TABLE `detail_hotel_typeroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_typeroom` (`id_typeroom`),
  ADD KEY `id_hotel` (`id_hotel`);

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
  ADD KEY `province_id` (`province_id`),
  ADD KEY `id_owner` (`id_owner`),
  ADD KEY `id_owner_2` (`id_owner`),
  ADD KEY `id_owner_3` (`id_owner`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `hotel_imagelist`
--
ALTER TABLE `hotel_imagelist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_hotel_service`
--
ALTER TABLE `detail_hotel_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detail_hotel_typeroom`
--
ALTER TABLE `detail_hotel_typeroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `District`
--
ALTER TABLE `District`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `hotel_imagelist`
--
ALTER TABLE `hotel_imagelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);

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
  ADD CONSTRAINT `detail_hotel_typeroom_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id`),
  ADD CONSTRAINT `detail_hotel_typeroom_ibfk_2` FOREIGN KEY (`id_typeroom`) REFERENCES `type_room` (`id`);

--
-- Constraints for table `District`
--
ALTER TABLE `District`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `Province` (`id`);

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `Province` (`id`),
  ADD CONSTRAINT `hotel_ibfk_3` FOREIGN KEY (`id_owner`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `hotel_ibfk_4` FOREIGN KEY (`district_id`) REFERENCES `District` (`id`);

--
-- Constraints for table `hotel_imagelist`
--
ALTER TABLE `hotel_imagelist`
  ADD CONSTRAINT `hotel_imagelist_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);

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
