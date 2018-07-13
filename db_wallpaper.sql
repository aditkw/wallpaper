-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 12:51 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wallpaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `lwd_article`
--

CREATE TABLE `lwd_article` (
  `article_id` int(11) NOT NULL,
  `article_tag` varchar(100) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_title_en` varchar(255) NOT NULL,
  `article_review` text NOT NULL,
  `article_review_en` text NOT NULL,
  `article_desc` text NOT NULL,
  `article_desc_en` text NOT NULL,
  `article_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_pub` enum('88','99') NOT NULL DEFAULT '88',
  `article_image` varchar(255) NOT NULL,
  `article_alt` varchar(255) NOT NULL,
  `article_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_article`
--

INSERT INTO `lwd_article` (`article_id`, `article_tag`, `article_title`, `article_title_en`, `article_review`, `article_review_en`, `article_desc`, `article_desc_en`, `article_date`, `article_pub`, `article_image`, `article_alt`, `article_link`) VALUES
(1, 'Notebook', 'testy', '', '', '', '<p>qwew</p>\r\n', '', '2018-07-09 00:00:00', '99', '', 'testy', 'testy');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_bank`
--

CREATE TABLE `lwd_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_account` varchar(255) NOT NULL,
  `bank_no` varchar(100) NOT NULL,
  `bank_pub` enum('88','99') NOT NULL DEFAULT '88',
  `bank_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_bank`
--

INSERT INTO `lwd_bank` (`bank_id`, `bank_name`, `bank_account`, `bank_no`, `bank_pub`, `bank_image`) VALUES
(14, 'BCA', 'Adit Walihadi', '20011041244', '99', '1257-bca-bca.jpg'),
(15, 'Mandiri Syari\'ah', 'Adit Walihadi', '9500125411', '99', '2985-mandiri-mandiri.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_banner`
--

CREATE TABLE `lwd_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_type` enum('banner','slide') NOT NULL DEFAULT 'slide',
  `banner_link` varchar(255) NOT NULL,
  `banner_alt` varchar(255) NOT NULL,
  `banner_pub` enum('88','99') NOT NULL DEFAULT '88',
  `banner_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_banner`
--

INSERT INTO `lwd_banner` (`banner_id`, `banner_type`, `banner_link`, `banner_alt`, `banner_pub`, `banner_image`) VALUES
(7, 'banner', '#', 'erakomp', '99', 'erakomp-115.jpg'),
(8, 'banner', '#', 'erakomp', '99', 'erakomp-1469.jpg'),
(9, 'banner', '#', 'erakomp', '99', 'erakomp-4622.jpg'),
(10, 'banner', '#', 'erakomp', '99', 'erakomp-5173.jpg'),
(11, 'banner', '#', 'erakomp', '99', 'erakomp-6375.jpg'),
(12, 'banner', '#', 'erakomp', '99', 'erakomp-7445.jpg'),
(13, 'slide', '#', '#', '99', '-6528.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_brand`
--

CREATE TABLE `lwd_brand` (
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `motif_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_price` decimal(10,0) NOT NULL,
  `brand_price_strip` decimal(10,0) NOT NULL,
  `brand_discount` int(3) NOT NULL,
  `brand_size` varchar(255) NOT NULL,
  `brand_weight` varchar(255) NOT NULL,
  `brand_launch` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `brand_link` varchar(255) NOT NULL,
  `brand_pub` enum('88','99') NOT NULL DEFAULT '88'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_brand`
--

INSERT INTO `lwd_brand` (`brand_id`, `category_id`, `motif_id`, `brand_name`, `brand_price`, `brand_price_strip`, `brand_discount`, `brand_size`, `brand_weight`, `brand_launch`, `brand_image`, `brand_link`, `brand_pub`) VALUES
(15, 16, 3, 'Avenue', '1075000', '2000000', 10, '1,06m x 15,6m = 15,6m2', '5,5 Kg', '2017', '-2055.jpg', 'avenue', '99'),
(16, 16, 3, 'Floral', '125000', '225000', 25, '1,06m x 15,6m = 15,6m2', '6,7 Kg', '2014', '-8205.jpg', 'floral', '99'),
(17, 16, 4, 'Stella By Seoul', '1240000', '2240000', 60, '1,06m x 15,6m = 15,6m2', '2,5 Kg', '2015', '-7883.jpg', 'stella-by-seoul', '99'),
(18, 16, 5, 'Selection', '1250000', '2250000', 35, '1,06m x 15,6m = 15,6m2', '5,5 Kg', '2016', '-3093.jpg', 'selection', '99'),
(19, 16, 4, 'Feliz', '1275000', '2275000', 20, '1,06m x 15,6m = 15,6m2', '5,5 Kg', '2016', '-1533.jpg', 'feliz', '99'),
(20, 16, 4, 'Remember', '123500', '223500', 50, '1,06m x 15,6m = 15,6m2', '4,3 Kg', '2012', '-7911.jpg', 'remember', '99');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_category`
--

CREATE TABLE `lwd_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_name_en` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_desc_en` text NOT NULL,
  `category_alt` varchar(255) NOT NULL,
  `category_seq` int(11) NOT NULL COMMENT 'sequence / urutan',
  `category_pub` enum('88','99') NOT NULL DEFAULT '88' COMMENT '99 = publis',
  `category_image` varchar(255) NOT NULL,
  `category_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_category`
--

INSERT INTO `lwd_category` (`category_id`, `category_name`, `category_name_en`, `category_desc`, `category_desc_en`, `category_alt`, `category_seq`, `category_pub`, `category_image`, `category_link`) VALUES
(16, 'Wallpaper', '', '', '', '', 0, '99', '', 'wallpaper'),
(17, 'Vinyl', '', '', '', '', 0, '99', '', 'vinyl'),
(18, 'Carpet Tile', '', '', '', '', 0, '99', '', 'carpet-tile'),
(19, 'Lem Wallpaper', '', '', '', '', 0, '99', '', 'lem-wallpaper');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_catinfo`
--

CREATE TABLE `lwd_catinfo` (
  `catinfo_id` int(11) NOT NULL,
  `catinfo_name` varchar(255) NOT NULL,
  `catinfo_pub` enum('88','99') NOT NULL DEFAULT '88' COMMENT '99 = publis'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_catinfo`
--

INSERT INTO `lwd_catinfo` (`catinfo_id`, `catinfo_name`, `catinfo_pub`) VALUES
(1, 'about', '99'),
(2, 'term and condition', '99'),
(3, 'faq', '99'),
(4, 'how to buy', '99');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_city`
--

CREATE TABLE `lwd_city` (
  `city_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_city`
--

INSERT INTO `lwd_city` (`city_id`, `province_id`, `city_name`) VALUES
(1, 21, 'Kabupaten Aceh Barat'),
(2, 21, 'Kabupaten Aceh Barat Daya'),
(3, 21, 'Kabupaten Aceh Besar'),
(4, 21, 'Kabupaten Aceh Jaya'),
(5, 21, 'Kabupaten Aceh Selatan'),
(6, 21, 'Kabupaten Aceh Singkil'),
(7, 21, 'Kabupaten Aceh Tamiang'),
(8, 21, 'Kabupaten Aceh Tengah'),
(9, 21, 'Kabupaten Aceh Tenggara'),
(10, 21, 'Kabupaten Aceh Timur'),
(11, 21, 'Kabupaten Aceh Utara'),
(12, 32, 'Kabupaten Agam'),
(13, 23, 'Kabupaten Alor'),
(14, 19, 'Kota Ambon'),
(15, 34, 'Kabupaten Asahan'),
(16, 24, 'Kabupaten Asmat'),
(17, 1, 'Kabupaten Badung'),
(18, 13, 'Kabupaten Balangan'),
(19, 15, 'Kota Balikpapan'),
(20, 21, 'Kota Banda Aceh'),
(21, 18, 'Kota Bandar Lampung'),
(22, 9, 'Kabupaten Bandung'),
(23, 9, 'Kota Bandung'),
(24, 9, 'Kabupaten Bandung Barat'),
(25, 29, 'Kabupaten Banggai'),
(26, 29, 'Kabupaten Banggai Kepulauan'),
(27, 2, 'Kabupaten Bangka'),
(28, 2, 'Kabupaten Bangka Barat'),
(29, 2, 'Kabupaten Bangka Selatan'),
(30, 2, 'Kabupaten Bangka Tengah'),
(31, 11, 'Kabupaten Bangkalan'),
(32, 1, 'Kabupaten Bangli'),
(33, 13, 'Kabupaten Banjar'),
(34, 9, 'Kota Banjar'),
(35, 13, 'Kota Banjarbaru'),
(36, 13, 'Kota Banjarmasin'),
(37, 10, 'Kabupaten Banjarnegara'),
(38, 28, 'Kabupaten Bantaeng'),
(39, 5, 'Kabupaten Bantul'),
(40, 33, 'Kabupaten Banyuasin'),
(41, 10, 'Kabupaten Banyumas'),
(42, 11, 'Kabupaten Banyuwangi'),
(43, 13, 'Kabupaten Barito Kuala'),
(44, 14, 'Kabupaten Barito Selatan'),
(45, 14, 'Kabupaten Barito Timur'),
(46, 14, 'Kabupaten Barito Utara'),
(47, 28, 'Kabupaten Barru'),
(48, 17, 'Kota Batam'),
(49, 10, 'Kabupaten Batang'),
(50, 8, 'Kabupaten Batang Hari'),
(51, 11, 'Kota Batu'),
(52, 34, 'Kabupaten Batu Bara'),
(53, 30, 'Kota Bau-Bau'),
(54, 9, 'Kabupaten Bekasi'),
(55, 9, 'Kota Bekasi'),
(56, 2, 'Kabupaten Belitung'),
(57, 2, 'Kabupaten Belitung Timur'),
(58, 23, 'Kabupaten Belu'),
(59, 21, 'Kabupaten Bener Meriah'),
(60, 26, 'Kabupaten Bengkalis'),
(61, 12, 'Kabupaten Bengkayang'),
(62, 4, 'Kota Bengkulu'),
(63, 4, 'Kabupaten Bengkulu Selatan'),
(64, 4, 'Kabupaten Bengkulu Tengah'),
(65, 4, 'Kabupaten Bengkulu Utara'),
(66, 15, 'Kabupaten Berau'),
(67, 24, 'Kabupaten Biak Numfor'),
(68, 22, 'Kabupaten Bima'),
(69, 22, 'Kota Bima'),
(70, 34, 'Kota Binjai'),
(71, 17, 'Kabupaten Bintan'),
(72, 21, 'Kabupaten Bireuen'),
(73, 31, 'Kota Bitung'),
(74, 11, 'Kabupaten Blitar'),
(75, 11, 'Kota Blitar'),
(76, 10, 'Kabupaten Blora'),
(77, 7, 'Kabupaten Boalemo'),
(78, 9, 'Kabupaten Bogor'),
(79, 9, 'Kota Bogor'),
(80, 11, 'Kabupaten Bojonegoro'),
(81, 31, 'Kabupaten Bolaang Mongondow (Bolmong)'),
(82, 31, 'Kabupaten Bolaang Mongondow Selatan'),
(83, 31, 'Kabupaten Bolaang Mongondow Timur'),
(84, 31, 'Kabupaten Bolaang Mongondow Utara'),
(85, 30, 'Kabupaten Bombana'),
(86, 11, 'Kabupaten Bondowoso'),
(87, 28, 'Kabupaten Bone'),
(88, 7, 'Kabupaten Bone Bolango'),
(89, 15, 'Kota Bontang'),
(90, 24, 'Kabupaten Boven Digoel'),
(91, 10, 'Kabupaten Boyolali'),
(92, 10, 'Kabupaten Brebes'),
(93, 32, 'Kota Bukittinggi'),
(94, 1, 'Kabupaten Buleleng'),
(95, 28, 'Kabupaten Bulukumba'),
(96, 16, 'Kabupaten Bulungan (Bulongan)'),
(97, 8, 'Kabupaten Bungo'),
(98, 29, 'Kabupaten Buol'),
(99, 19, 'Kabupaten Buru'),
(100, 19, 'Kabupaten Buru Selatan'),
(101, 30, 'Kabupaten Buton'),
(102, 30, 'Kabupaten Buton Utara'),
(103, 9, 'Kabupaten Ciamis'),
(104, 9, 'Kabupaten Cianjur'),
(105, 10, 'Kabupaten Cilacap'),
(106, 3, 'Kota Cilegon'),
(107, 9, 'Kota Cimahi'),
(108, 9, 'Kabupaten Cirebon'),
(109, 9, 'Kota Cirebon'),
(110, 34, 'Kabupaten Dairi'),
(111, 24, 'Kabupaten Deiyai (Deliyai)'),
(112, 34, 'Kabupaten Deli Serdang'),
(113, 10, 'Kabupaten Demak'),
(114, 1, 'Kota Denpasar'),
(115, 9, 'Kota Depok'),
(116, 32, 'Kabupaten Dharmasraya'),
(117, 24, 'Kabupaten Dogiyai'),
(118, 22, 'Kabupaten Dompu'),
(119, 29, 'Kabupaten Donggala'),
(120, 26, 'Kota Dumai'),
(121, 33, 'Kabupaten Empat Lawang'),
(122, 23, 'Kabupaten Ende'),
(123, 28, 'Kabupaten Enrekang'),
(124, 25, 'Kabupaten Fakfak'),
(125, 23, 'Kabupaten Flores Timur'),
(126, 9, 'Kabupaten Garut'),
(127, 21, 'Kabupaten Gayo Lues'),
(128, 1, 'Kabupaten Gianyar'),
(129, 7, 'Kabupaten Gorontalo'),
(130, 7, 'Kota Gorontalo'),
(131, 7, 'Kabupaten Gorontalo Utara'),
(132, 28, 'Kabupaten Gowa'),
(133, 11, 'Kabupaten Gresik'),
(134, 10, 'Kabupaten Grobogan'),
(135, 5, 'Kabupaten Gunung Kidul'),
(136, 14, 'Kabupaten Gunung Mas'),
(137, 34, 'Kota Gunungsitoli'),
(138, 20, 'Kabupaten Halmahera Barat'),
(139, 20, 'Kabupaten Halmahera Selatan'),
(140, 20, 'Kabupaten Halmahera Tengah'),
(141, 20, 'Kabupaten Halmahera Timur'),
(142, 20, 'Kabupaten Halmahera Utara'),
(143, 13, 'Kabupaten Hulu Sungai Selatan'),
(144, 13, 'Kabupaten Hulu Sungai Tengah'),
(145, 13, 'Kabupaten Hulu Sungai Utara'),
(146, 34, 'Kabupaten Humbang Hasundutan'),
(147, 26, 'Kabupaten Indragiri Hilir'),
(148, 26, 'Kabupaten Indragiri Hulu'),
(149, 9, 'Kabupaten Indramayu'),
(150, 24, 'Kabupaten Intan Jaya'),
(151, 6, 'Kota Jakarta Barat'),
(152, 6, 'Kota Jakarta Pusat'),
(153, 6, 'Kota Jakarta Selatan'),
(154, 6, 'Kota Jakarta Timur'),
(155, 6, 'Kota Jakarta Utara'),
(156, 8, 'Kota Jambi'),
(157, 24, 'Kabupaten Jayapura'),
(158, 24, 'Kota Jayapura'),
(159, 24, 'Kabupaten Jayawijaya'),
(160, 11, 'Kabupaten Jember'),
(161, 1, 'Kabupaten Jembrana'),
(162, 28, 'Kabupaten Jeneponto'),
(163, 10, 'Kabupaten Jepara'),
(164, 11, 'Kabupaten Jombang'),
(165, 25, 'Kabupaten Kaimana'),
(166, 26, 'Kabupaten Kampar'),
(167, 14, 'Kabupaten Kapuas'),
(168, 12, 'Kabupaten Kapuas Hulu'),
(169, 10, 'Kabupaten Karanganyar'),
(170, 1, 'Kabupaten Karangasem'),
(171, 9, 'Kabupaten Karawang'),
(172, 17, 'Kabupaten Karimun'),
(173, 34, 'Kabupaten Karo'),
(174, 14, 'Kabupaten Katingan'),
(175, 4, 'Kabupaten Kaur'),
(176, 12, 'Kabupaten Kayong Utara'),
(177, 10, 'Kabupaten Kebumen'),
(178, 11, 'Kabupaten Kediri'),
(179, 11, 'Kota Kediri'),
(180, 24, 'Kabupaten Keerom'),
(181, 10, 'Kabupaten Kendal'),
(182, 30, 'Kota Kendari'),
(183, 4, 'Kabupaten Kepahiang'),
(184, 17, 'Kabupaten Kepulauan Anambas'),
(185, 19, 'Kabupaten Kepulauan Aru'),
(186, 32, 'Kabupaten Kepulauan Mentawai'),
(187, 26, 'Kabupaten Kepulauan Meranti'),
(188, 31, 'Kabupaten Kepulauan Sangihe'),
(189, 6, 'Kabupaten Kepulauan Seribu'),
(190, 31, 'Kabupaten Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(191, 20, 'Kabupaten Kepulauan Sula'),
(192, 31, 'Kabupaten Kepulauan Talaud'),
(193, 24, 'Kabupaten Kepulauan Yapen (Yapen Waropen)'),
(194, 8, 'Kabupaten Kerinci'),
(195, 12, 'Kabupaten Ketapang'),
(196, 10, 'Kabupaten Klaten'),
(197, 1, 'Kabupaten Klungkung'),
(198, 30, 'Kabupaten Kolaka'),
(199, 30, 'Kabupaten Kolaka Utara'),
(200, 30, 'Kabupaten Konawe'),
(201, 30, 'Kabupaten Konawe Selatan'),
(202, 30, 'Kabupaten Konawe Utara'),
(203, 13, 'Kabupaten Kotabaru'),
(204, 31, 'Kota Kotamobagu'),
(205, 14, 'Kabupaten Kotawaringin Barat'),
(206, 14, 'Kabupaten Kotawaringin Timur'),
(207, 26, 'Kabupaten Kuantan Singingi'),
(208, 12, 'Kabupaten Kubu Raya'),
(209, 10, 'Kabupaten Kudus'),
(210, 5, 'Kabupaten Kulon Progo'),
(211, 9, 'Kabupaten Kuningan'),
(212, 23, 'Kabupaten Kupang'),
(213, 23, 'Kota Kupang'),
(214, 15, 'Kabupaten Kutai Barat'),
(215, 15, 'Kabupaten Kutai Kartanegara'),
(216, 15, 'Kabupaten Kutai Timur'),
(217, 34, 'Kabupaten Labuhan Batu'),
(218, 34, 'Kabupaten Labuhan Batu Selatan'),
(219, 34, 'Kabupaten Labuhan Batu Utara'),
(220, 33, 'Kabupaten Lahat'),
(221, 14, 'Kabupaten Lamandau'),
(222, 11, 'Kabupaten Lamongan'),
(223, 18, 'Kabupaten Lampung Barat'),
(224, 18, 'Kabupaten Lampung Selatan'),
(225, 18, 'Kabupaten Lampung Tengah'),
(226, 18, 'Kabupaten Lampung Timur'),
(227, 18, 'Kabupaten Lampung Utara'),
(228, 12, 'Kabupaten Landak'),
(229, 34, 'Kabupaten Langkat'),
(230, 21, 'Kota Langsa'),
(231, 24, 'Kabupaten Lanny Jaya'),
(232, 3, 'Kabupaten Lebak'),
(233, 4, 'Kabupaten Lebong'),
(234, 23, 'Kabupaten Lembata'),
(235, 21, 'Kota Lhokseumawe'),
(236, 32, 'Kabupaten Lima Puluh Koto/Kota'),
(237, 17, 'Kabupaten Lingga'),
(238, 22, 'Kabupaten Lombok Barat'),
(239, 22, 'Kabupaten Lombok Tengah'),
(240, 22, 'Kabupaten Lombok Timur'),
(241, 22, 'Kabupaten Lombok Utara'),
(242, 33, 'Kota Lubuk Linggau'),
(243, 11, 'Kabupaten Lumajang'),
(244, 28, 'Kabupaten Luwu'),
(245, 28, 'Kabupaten Luwu Timur'),
(246, 28, 'Kabupaten Luwu Utara'),
(247, 11, 'Kabupaten Madiun'),
(248, 11, 'Kota Madiun'),
(249, 10, 'Kabupaten Magelang'),
(250, 10, 'Kota Magelang'),
(251, 11, 'Kabupaten Magetan'),
(252, 9, 'Kabupaten Majalengka'),
(253, 27, 'Kabupaten Majene'),
(254, 28, 'Kota Makassar'),
(255, 11, 'Kabupaten Malang'),
(256, 11, 'Kota Malang'),
(257, 16, 'Kabupaten Malinau'),
(258, 19, 'Kabupaten Maluku Barat Daya'),
(259, 19, 'Kabupaten Maluku Tengah'),
(260, 19, 'Kabupaten Maluku Tenggara'),
(261, 19, 'Kabupaten Maluku Tenggara Barat'),
(262, 27, 'Kabupaten Mamasa'),
(263, 24, 'Kabupaten Mamberamo Raya'),
(264, 24, 'Kabupaten Mamberamo Tengah'),
(265, 27, 'Kabupaten Mamuju'),
(266, 27, 'Kabupaten Mamuju Utara'),
(267, 31, 'Kota Manado'),
(268, 34, 'Kabupaten Mandailing Natal'),
(269, 23, 'Kabupaten Manggarai'),
(270, 23, 'Kabupaten Manggarai Barat'),
(271, 23, 'Kabupaten Manggarai Timur'),
(272, 25, 'Kabupaten Manokwari'),
(273, 25, 'Kabupaten Manokwari Selatan'),
(274, 24, 'Kabupaten Mappi'),
(275, 28, 'Kabupaten Maros'),
(276, 22, 'Kota Mataram'),
(277, 25, 'Kabupaten Maybrat'),
(278, 34, 'Kota Medan'),
(279, 12, 'Kabupaten Melawi'),
(280, 8, 'Kabupaten Merangin'),
(281, 24, 'Kabupaten Merauke'),
(282, 18, 'Kabupaten Mesuji'),
(283, 18, 'Kota Metro'),
(284, 24, 'Kabupaten Mimika'),
(285, 31, 'Kabupaten Minahasa'),
(286, 31, 'Kabupaten Minahasa Selatan'),
(287, 31, 'Kabupaten Minahasa Tenggara'),
(288, 31, 'Kabupaten Minahasa Utara'),
(289, 11, 'Kabupaten Mojokerto'),
(290, 11, 'Kota Mojokerto'),
(291, 29, 'Kabupaten Morowali'),
(292, 33, 'Kabupaten Muara Enim'),
(293, 8, 'Kabupaten Muaro Jambi'),
(294, 4, 'Kabupaten Muko Muko'),
(295, 30, 'Kabupaten Muna'),
(296, 14, 'Kabupaten Murung Raya'),
(297, 33, 'Kabupaten Musi Banyuasin'),
(298, 33, 'Kabupaten Musi Rawas'),
(299, 24, 'Kabupaten Nabire'),
(300, 21, 'Kabupaten Nagan Raya'),
(301, 23, 'Kabupaten Nagekeo'),
(302, 17, 'Kabupaten Natuna'),
(303, 24, 'Kabupaten Nduga'),
(304, 23, 'Kabupaten Ngada'),
(305, 11, 'Kabupaten Nganjuk'),
(306, 11, 'Kabupaten Ngawi'),
(307, 34, 'Kabupaten Nias'),
(308, 34, 'Kabupaten Nias Barat'),
(309, 34, 'Kabupaten Nias Selatan'),
(310, 34, 'Kabupaten Nias Utara'),
(311, 16, 'Kabupaten Nunukan'),
(312, 33, 'Kabupaten Ogan Ilir'),
(313, 33, 'Kabupaten Ogan Komering Ilir'),
(314, 33, 'Kabupaten Ogan Komering Ulu'),
(315, 33, 'Kabupaten Ogan Komering Ulu Selatan'),
(316, 33, 'Kabupaten Ogan Komering Ulu Timur'),
(317, 11, 'Kabupaten Pacitan'),
(318, 32, 'Kota Padang'),
(319, 34, 'Kabupaten Padang Lawas'),
(320, 34, 'Kabupaten Padang Lawas Utara'),
(321, 32, 'Kota Padang Panjang'),
(322, 32, 'Kabupaten Padang Pariaman'),
(323, 34, 'Kota Padang Sidempuan'),
(324, 33, 'Kota Pagar Alam'),
(325, 34, 'Kabupaten Pakpak Bharat'),
(326, 14, 'Kota Palangka Raya'),
(327, 33, 'Kota Palembang'),
(328, 28, 'Kota Palopo'),
(329, 29, 'Kota Palu'),
(330, 11, 'Kabupaten Pamekasan'),
(331, 3, 'Kabupaten Pandeglang'),
(332, 9, 'Kabupaten Pangandaran'),
(333, 28, 'Kabupaten Pangkajene Kepulauan'),
(334, 2, 'Kota Pangkal Pinang'),
(335, 24, 'Kabupaten Paniai'),
(336, 28, 'Kota Parepare'),
(337, 32, 'Kota Pariaman'),
(338, 29, 'Kabupaten Parigi Moutong'),
(339, 32, 'Kabupaten Pasaman'),
(340, 32, 'Kabupaten Pasaman Barat'),
(341, 15, 'Kabupaten Paser'),
(342, 11, 'Kabupaten Pasuruan'),
(343, 11, 'Kota Pasuruan'),
(344, 10, 'Kabupaten Pati'),
(345, 32, 'Kota Payakumbuh'),
(346, 25, 'Kabupaten Pegunungan Arfak'),
(347, 24, 'Kabupaten Pegunungan Bintang'),
(348, 10, 'Kabupaten Pekalongan'),
(349, 10, 'Kota Pekalongan'),
(350, 26, 'Kota Pekanbaru'),
(351, 26, 'Kabupaten Pelalawan'),
(352, 10, 'Kabupaten Pemalang'),
(353, 34, 'Kota Pematang Siantar'),
(354, 15, 'Kabupaten Penajam Paser Utara'),
(355, 18, 'Kabupaten Pesawaran'),
(356, 18, 'Kabupaten Pesisir Barat'),
(357, 32, 'Kabupaten Pesisir Selatan'),
(358, 21, 'Kabupaten Pidie'),
(359, 21, 'Kabupaten Pidie Jaya'),
(360, 28, 'Kabupaten Pinrang'),
(361, 7, 'Kabupaten Pohuwato'),
(362, 27, 'Kabupaten Polewali Mandar'),
(363, 11, 'Kabupaten Ponorogo'),
(364, 12, 'Kabupaten Pontianak'),
(365, 12, 'Kota Pontianak'),
(366, 29, 'Kabupaten Poso'),
(367, 33, 'Kota Prabumulih'),
(368, 18, 'Kabupaten Pringsewu'),
(369, 11, 'Kabupaten Probolinggo'),
(370, 11, 'Kota Probolinggo'),
(371, 14, 'Kabupaten Pulang Pisau'),
(372, 20, 'Kabupaten Pulau Morotai'),
(373, 24, 'Kabupaten Puncak'),
(374, 24, 'Kabupaten Puncak Jaya'),
(375, 10, 'Kabupaten Purbalingga'),
(376, 9, 'Kabupaten Purwakarta'),
(377, 10, 'Kabupaten Purworejo'),
(378, 25, 'Kabupaten Raja Ampat'),
(379, 4, 'Kabupaten Rejang Lebong'),
(380, 10, 'Kabupaten Rembang'),
(381, 26, 'Kabupaten Rokan Hilir'),
(382, 26, 'Kabupaten Rokan Hulu'),
(383, 23, 'Kabupaten Rote Ndao'),
(384, 21, 'Kota Sabang'),
(385, 23, 'Kabupaten Sabu Raijua'),
(386, 10, 'Kota Salatiga'),
(387, 15, 'Kota Samarinda'),
(388, 12, 'Kabupaten Sambas'),
(389, 34, 'Kabupaten Samosir'),
(390, 11, 'Kabupaten Sampang'),
(391, 12, 'Kabupaten Sanggau'),
(392, 24, 'Kabupaten Sarmi'),
(393, 8, 'Kabupaten Sarolangun'),
(394, 32, 'Kota Sawah Lunto'),
(395, 12, 'Kabupaten Sekadau'),
(396, 28, 'Kabupaten Selayar (Kepulauan Selayar)'),
(397, 4, 'Kabupaten Seluma'),
(398, 10, 'Kabupaten Semarang'),
(399, 10, 'Kota Semarang'),
(400, 19, 'Kabupaten Seram Bagian Barat'),
(401, 19, 'Kabupaten Seram Bagian Timur'),
(402, 3, 'Kabupaten Serang'),
(403, 3, 'Kota Serang'),
(404, 34, 'Kabupaten Serdang Bedagai'),
(405, 14, 'Kabupaten Seruyan'),
(406, 26, 'Kabupaten Siak'),
(407, 34, 'Kota Sibolga'),
(408, 28, 'Kabupaten Sidenreng Rappang/Rapang'),
(409, 11, 'Kabupaten Sidoarjo'),
(410, 29, 'Kabupaten Sigi'),
(411, 32, 'Kabupaten Sijunjung (Sawah Lunto Sijunjung)'),
(412, 23, 'Kabupaten Sikka'),
(413, 34, 'Kabupaten Simalungun'),
(414, 21, 'Kabupaten Simeulue'),
(415, 12, 'Kota Singkawang'),
(416, 28, 'Kabupaten Sinjai'),
(417, 12, 'Kabupaten Sintang'),
(418, 11, 'Kabupaten Situbondo'),
(419, 5, 'Kabupaten Sleman'),
(420, 32, 'Kabupaten Solok'),
(421, 32, 'Kota Solok'),
(422, 32, 'Kabupaten Solok Selatan'),
(423, 28, 'Kabupaten Soppeng'),
(424, 25, 'Kabupaten Sorong'),
(425, 25, 'Kota Sorong'),
(426, 25, 'Kabupaten Sorong Selatan'),
(427, 10, 'Kabupaten Sragen'),
(428, 9, 'Kabupaten Subang'),
(429, 21, 'Kota Subulussalam'),
(430, 9, 'Kabupaten Sukabumi'),
(431, 9, 'Kota Sukabumi'),
(432, 14, 'Kabupaten Sukamara'),
(433, 10, 'Kabupaten Sukoharjo'),
(434, 23, 'Kabupaten Sumba Barat'),
(435, 23, 'Kabupaten Sumba Barat Daya'),
(436, 23, 'Kabupaten Sumba Tengah'),
(437, 23, 'Kabupaten Sumba Timur'),
(438, 22, 'Kabupaten Sumbawa'),
(439, 22, 'Kabupaten Sumbawa Barat'),
(440, 9, 'Kabupaten Sumedang'),
(441, 11, 'Kabupaten Sumenep'),
(442, 8, 'Kota Sungaipenuh'),
(443, 24, 'Kabupaten Supiori'),
(444, 11, 'Kota Surabaya'),
(445, 10, 'Kota Surakarta (Solo)'),
(446, 13, 'Kabupaten Tabalong'),
(447, 1, 'Kabupaten Tabanan'),
(448, 28, 'Kabupaten Takalar'),
(449, 25, 'Kabupaten Tambrauw'),
(450, 16, 'Kabupaten Tana Tidung'),
(451, 28, 'Kabupaten Tana Toraja'),
(452, 13, 'Kabupaten Tanah Bumbu'),
(453, 32, 'Kabupaten Tanah Datar'),
(454, 13, 'Kabupaten Tanah Laut'),
(455, 3, 'Kabupaten Tangerang'),
(456, 3, 'Kota Tangerang'),
(457, 3, 'Kota Tangerang Selatan'),
(458, 18, 'Kabupaten Tanggamus'),
(459, 34, 'Kota Tanjung Balai'),
(460, 8, 'Kabupaten Tanjung Jabung Barat'),
(461, 8, 'Kabupaten Tanjung Jabung Timur'),
(462, 17, 'Kota Tanjung Pinang'),
(463, 34, 'Kabupaten Tapanuli Selatan'),
(464, 34, 'Kabupaten Tapanuli Tengah'),
(465, 34, 'Kabupaten Tapanuli Utara'),
(466, 13, 'Kabupaten Tapin'),
(467, 16, 'Kota Tarakan'),
(468, 9, 'Kabupaten Tasikmalaya'),
(469, 9, 'Kota Tasikmalaya'),
(470, 34, 'Kota Tebing Tinggi'),
(471, 8, 'Kabupaten Tebo'),
(472, 10, 'Kabupaten Tegal'),
(473, 10, 'Kota Tegal'),
(474, 25, 'Kabupaten Teluk Bintuni'),
(475, 25, 'Kabupaten Teluk Wondama'),
(476, 10, 'Kabupaten Temanggung'),
(477, 20, 'Kota Ternate'),
(478, 20, 'Kota Tidore Kepulauan'),
(479, 23, 'Kabupaten Timor Tengah Selatan'),
(480, 23, 'Kabupaten Timor Tengah Utara'),
(481, 34, 'Kabupaten Toba Samosir'),
(482, 29, 'Kabupaten Tojo Una-Una'),
(483, 29, 'Kabupaten Toli-Toli'),
(484, 24, 'Kabupaten Tolikara'),
(485, 31, 'Kota Tomohon'),
(486, 28, 'Kabupaten Toraja Utara'),
(487, 11, 'Kabupaten Trenggalek'),
(488, 19, 'Kota Tual'),
(489, 11, 'Kabupaten Tuban'),
(490, 18, 'Kabupaten Tulang Bawang'),
(491, 18, 'Kabupaten Tulang Bawang Barat'),
(492, 11, 'Kabupaten Tulungagung'),
(493, 28, 'Kabupaten Wajo'),
(494, 30, 'Kabupaten Wakatobi'),
(495, 24, 'Kabupaten Waropen'),
(496, 18, 'Kabupaten Way Kanan'),
(497, 10, 'Kabupaten Wonogiri'),
(498, 10, 'Kabupaten Wonosobo'),
(499, 24, 'Kabupaten Yahukimo'),
(500, 24, 'Kabupaten Yalimo'),
(501, 5, 'Kota Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_color`
--

CREATE TABLE `lwd_color` (
  `color_id` int(8) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_pub` enum('88','99') NOT NULL,
  `color_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_color`
--

INSERT INTO `lwd_color` (`color_id`, `color_name`, `color_pub`, `color_link`) VALUES
(1, 'Merah', '99', 'merah'),
(2, 'Kuning', '99', 'kuning'),
(3, 'Hijau', '99', 'hijau'),
(4, 'Jingga', '99', 'jingga');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_contact`
--

CREATE TABLE `lwd_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_wa` varchar(255) NOT NULL,
  `contact_cs` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_address` text NOT NULL,
  `contact_maps` text NOT NULL,
  `contact_fb` varchar(255) NOT NULL,
  `contact_tw` varchar(255) NOT NULL,
  `contact_yt` varchar(255) NOT NULL,
  `contact_in` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_contact`
--

INSERT INTO `lwd_contact` (`contact_id`, `contact_phone`, `contact_wa`, `contact_cs`, `contact_email`, `contact_address`, `contact_maps`, `contact_fb`, `contact_tw`, `contact_yt`, `contact_in`) VALUES
(1, '0812-5222-2252', '021-29471924', '021-554-3330', 'info@your-website.com', 'Lorem ipsum dolor sit amet, \r\nconsectetur adipiscing elit.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7525098568462!2d106.81402831418737!3d-6.163889995537388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f677cce67d73%3A0x8aac357702faa9cf!2sErakomp+Infonusa.+PT!5e0!3m2!1sen!2sid!4v1490612844468\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'http://facebook.com', 'http://twitter.com', 'http://youtube.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_image`
--

CREATE TABLE `lwd_image` (
  `image_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `image_parent_name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_seq` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_image`
--

INSERT INTO `lwd_image` (`image_id`, `parent_id`, `image_parent_name`, `image_name`, `image_seq`) VALUES
(255, 1, 'article', 'testy-7050.JPG', 0),
(256, 104, 'product', 'alt-5962.jpg', 0),
(257, 104, 'product', 'alt-5963.png', 1),
(258, 104, 'product', 'alt-5964.jpg', 2),
(259, 104, 'product', 'alt-5965.jpg', 3),
(260, 104, 'product', 'alt-5966.jpg', 4),
(261, 104, 'product', 'alt-5967.jpg', 5),
(262, 104, 'product', 'alt-5968.jpg', 6),
(263, 105, 'product', 'tada-9718.jpg', 0),
(264, 105, 'product', 'tada-9719.png', 1),
(265, 105, 'product', 'tada-9720.jpg', 2),
(266, 105, 'product', 'tada-9721.jpg', 3),
(267, 105, 'product', 'tada-9722.jpg', 4),
(268, 105, 'product', 'tada-9723.jpg', 5),
(269, 105, 'product', 'tada-9724.jpg', 6),
(270, 106, 'product', 'wat-1319.jpg', 0),
(271, 106, 'product', 'wat-1320.png', 1),
(272, 106, 'product', 'wat-1321.jpg', 2),
(273, 106, 'product', 'wat-1322.jpg', 3),
(274, 106, 'product', 'wat-1323.jpg', 4),
(275, 106, 'product', 'wat-1324.jpg', 5),
(276, 106, 'product', 'wat-1325.jpg', 6),
(277, 107, 'product', 'attr-7901.jpg', 0),
(278, 107, 'product', 'attr-7902.png', 1),
(279, 107, 'product', 'attr-7903.jpg', 2),
(280, 107, 'product', 'attr-7904.jpg', 3),
(281, 107, 'product', 'attr-7905.jpg', 4),
(282, 107, 'product', 'attr-7906.jpg', 5),
(283, 107, 'product', 'attr-7907.jpg', 6),
(284, 108, 'product', 'asd-5520.jpg', 0),
(285, 108, 'product', 'asd-5521.png', 1),
(286, 108, 'product', 'asd-5522.jpg', 2),
(287, 108, 'product', 'asd-5523.jpg', 3),
(288, 108, 'product', 'asd-5524.jpg', 4),
(289, 108, 'product', 'asd-5525.jpg', 5),
(290, 108, 'product', 'asd-5526.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `lwd_info`
--

CREATE TABLE `lwd_info` (
  `info_id` int(11) NOT NULL,
  `catinfo_id` int(11) NOT NULL,
  `info_name` varchar(255) NOT NULL,
  `info_name_en` varchar(255) NOT NULL,
  `info_desc` text NOT NULL,
  `info_desc_en` text NOT NULL,
  `info_pub` enum('88','99') NOT NULL DEFAULT '88' COMMENT '99 = publish',
  `info_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_info`
--

INSERT INTO `lwd_info` (`info_id`, `catinfo_id`, `info_name`, `info_name_en`, `info_desc`, `info_desc_en`, `info_pub`, `info_image`) VALUES
(1, 1, 'Lorem ipsum.', 'info name', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in est non diam congue dignissim. Sed ac purus ac mauris feugiat efficitur. Donec luctus nibh sit amet massa ornare interdum. Nunc id elit tempor, luctus nibh vel, viverra leo. Donec non ante vehicula nisl sodales ultrices. Integer viverra lacinia turpis vehicula convallis. Quisque commodo, neque eget feugiat pharetra, leo nibh consectetur tortor, eget tempus felis tortor non dolor. In hac habitasse platea dictumst. Donec vestibulum felis eget quam elementum, non bibendum lacus elementum. Nulla facilisi. Aliquam vitae magna leo. Aenean a enim sed elit rhoncus facilisis. Suspendisse in lorem blandit, convallis eros non, venenatis augue.</p>\r\n', 'info description', '88', '3263-lorem-ipsum-imgre3s.png'),
(3, 2, 'Term and Conditions', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sem velit, rhoncus quis venenatis et, iaculis id nunc. Nulla ut quam suscipit, molestie velit at, interdum tortor. Praesent vel tortor sed sapien facilisis accumsan maximus ut eros. Nulla pellentesque augue nisl, non rutrum ante imperdiet eu. Morbi porttitor volutpat justo, vitae suscipit enim euismod vel. Sed quis est non urna tincidunt finibus. Donec eget ullamcorper ipsum.</p>\r\n\r\n<p>In elit lorem, molestie non vestibulum vitae, consectetur ut diam. Sed eu nisi diam. Donec arcu tellus, pulvinar ac consectetur vel, auctor posuere elit.</p>\r\n', '', '88', ''),
(5, 3, 'd', '', 'ddd', '', '88', ''),
(6, 4, 'Cari Barang', '', '<p>Kamu dapat mencari barang yang kamu inginkan dengan fitur <strong>Search</strong> atau berdasarkan kategori.</p>\r\n', '', '99', ''),
(7, 4, 'Klik Beli', '', '<p>Pilih barang yang kamu inginkan kemudian klik <strong>Beli</strong>.</p>\r\n', '', '99', ''),
(8, 4, 'Shopping Review', '', '<p>Kamu wajib melengkapi alamat pengiriman barang pada halaman shopping review.</p>\r\n', '', '99', ''),
(9, 4, 'Pembayaran', '', '<p>Kamu dapat melakukan pembayaran ke rekening Bukalapak melalui <strong>BukaDompet</strong>, <strong>Mandiri ClickPay</strong>, <strong>BCA KlikPay</strong>, <strong>CIMB Clicks</strong> , <strong>Kartu Visa/Mastercard</strong> atau <strong>Transfer</strong></p>\r\n', '', '99', ''),
(10, 4, 'Konfirmasi Terima Barang', '', '<p>Setelah barang sampai, lakukan konfirmasi dengan menekan <strong>Konfirmasi Terima Barang</strong> pada halaman <strong>Detail Transaksi</strong>.<br> Transaksi akan dianggap selesai setelah kamu memberikan konfirmasi terima barang kepada pelapak yang bersangkutan.</p>\r\n', '', '99', '');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_member`
--

CREATE TABLE `lwd_member` (
  `member_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `reason_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_phone` varchar(255) NOT NULL,
  `member_address` text NOT NULL,
  `member_postcode` varchar(10) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_status` enum('verified','unverified') NOT NULL DEFAULT 'unverified',
  `member_block` enum('active','block') NOT NULL DEFAULT 'active',
  `member_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_member`
--

INSERT INTO `lwd_member` (`member_id`, `province_id`, `city_id`, `district_id`, `reason_id`, `member_name`, `member_email`, `member_phone`, `member_address`, `member_postcode`, `member_password`, `member_status`, `member_block`, `member_image`) VALUES
(0, 0, 0, 0, 0, 'the buyer is not a member', '', '', '', '', '', 'verified', 'active', ''),
(7, 0, 0, 0, 1, 'Syarif Syabana', 'syarif@gmail.com', '081906096810', '', '', 'e6980d3379562a6b464ada71870793acb0d6b629', 'unverified', 'active', ''),
(8, 3, 456, 6308, 3, 'Muhamad Syarif SyaBana', 'syariflwd@gmail.com', '02155740759', 'Kebon nanas', '', 'e6980d3379562a6b464ada71870793acb0d6b629', 'verified', 'active', ''),
(9, 6, 152, 2096, 0, 'Syarif Lwd', 'syarif@lawavedesign.com', '081906096810', 'Kebon Nanas RT 006/02, No B96 Kel Panunggangan Utara', '', 'e6980d3379562a6b464ada71870793acb0d6b629', 'verified', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_motif`
--

CREATE TABLE `lwd_motif` (
  `motif_id` int(11) NOT NULL,
  `motif_name` varchar(255) NOT NULL,
  `motif_pub` enum('88','99') NOT NULL,
  `motif_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_motif`
--

INSERT INTO `lwd_motif` (`motif_id`, `motif_name`, `motif_pub`, `motif_link`) VALUES
(2, 'Lucu', '99', 'lucu'),
(3, 'Bunga', '99', 'bunga'),
(4, 'Korea', '99', 'korea'),
(5, 'Polos', '99', 'polos');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_order`
--

CREATE TABLE `lwd_order` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_price` decimal(10,0) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_subtotal` decimal(10,0) NOT NULL,
  `order_weight` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_order`
--

INSERT INTO `lwd_order` (`order_id`, `order_no`, `product_id`, `order_price`, `order_qty`, `order_subtotal`, `order_weight`, `order_date`) VALUES
(5, '39694', 104, '250000', 2, '500000', 2, '2018-07-13 14:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_payment`
--

CREATE TABLE `lwd_payment` (
  `payment_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `payment_account` varchar(255) NOT NULL,
  `payment_no` varchar(100) NOT NULL,
  `payment_bank` varchar(100) NOT NULL,
  `payment_total` decimal(10,0) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_confirm_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` enum('88','99') NOT NULL DEFAULT '88'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lwd_product`
--

CREATE TABLE `lwd_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `color_id` int(8) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_alt` varchar(255) NOT NULL COMMENT 'alt untuk gambar',
  `product_price` decimal(10,0) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_price_strip` decimal(10,0) NOT NULL,
  `product_weight` float NOT NULL,
  `product_dimension` varchar(50) NOT NULL,
  `product_pub` enum('88','99') NOT NULL COMMENT '99 = publish',
  `product_seq` int(11) NOT NULL,
  `product_link` varchar(255) NOT NULL,
  `product_discount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_product`
--

INSERT INTO `lwd_product` (`product_id`, `category_id`, `color_id`, `brand_id`, `product_code`, `product_name`, `product_alt`, `product_price`, `product_stock`, `product_price_strip`, `product_weight`, `product_dimension`, `product_pub`, `product_seq`, `product_link`, `product_discount`) VALUES
(104, 16, 1, 15, '102-345', 'Wallpaper Example 102-3', 'alt', '250000', 23, '500000', 2, '150, 300', '99', 1, 'wallpaper-example-102-3', 10),
(105, 16, 3, 16, '202-356', 'Wallpaper Example 202', 'tada', '300000', 26, '400000', 2, '340, 400', '99', 2, 'wallpaper-example-202', 10),
(106, 16, 4, 20, '302-354', 'Wallpaper Example 302-3', 'wat', '400000', 50, '550000', 23, '240, 300', '99', 3, 'wallpaper-example-302-3', 50),
(107, 16, 4, 20, '402-334', 'Wallpaper Example 402-334', 'attr', '450000', 42, '600000', 4, '450, 500', '99', 4, 'wallpaper-example-402-334', 35),
(108, 16, 4, 16, '121241ff', 'qweqwe', 'asd', '123123', 21, '123123', 12, '21, 21', '99', 2, 'qweqwe', 12);

-- --------------------------------------------------------

--
-- Table structure for table `lwd_province`
--

CREATE TABLE `lwd_province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_province`
--

INSERT INTO `lwd_province` (`province_id`, `province_name`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_reason`
--

CREATE TABLE `lwd_reason` (
  `reason_id` int(11) NOT NULL,
  `reason_name` varchar(255) NOT NULL,
  `reason_name_en` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_reason`
--

INSERT INTO `lwd_reason` (`reason_id`, `reason_name`, `reason_name_en`) VALUES
(0, '', ''),
(1, 'blacklist', ''),
(2, 'often cancel the purchase', ''),
(3, 'dangerous', '');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_seo`
--

CREATE TABLE `lwd_seo` (
  `seo_id` int(11) NOT NULL,
  `seo_page` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_seo`
--

INSERT INTO `lwd_seo` (`seo_id`, `seo_page`, `seo_title`, `seo_keyword`, `seo_desc`) VALUES
(1, 'produk', 'Produk', 'Produk', 'Produk'),
(2, 'berita', 'Berita', 'Berita', 'Berita');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_shipment`
--

CREATE TABLE `lwd_shipment` (
  `shipment_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `shipment_name` varchar(255) NOT NULL,
  `shipment_web` text NOT NULL,
  `shipment_pub` enum('88','99') NOT NULL DEFAULT '88',
  `shipment_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_shipment`
--

INSERT INTO `lwd_shipment` (`shipment_id`, `area_id`, `shipment_name`, `shipment_web`, `shipment_pub`, `shipment_image`) VALUES
(1, 0, 'JNE', 'http://www.jne.co.id', '99', '4810-jne-jne.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_site`
--

CREATE TABLE `lwd_site` (
  `site_id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_desc` text NOT NULL,
  `site_keyword` text NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_site`
--

INSERT INTO `lwd_site` (`site_id`, `site_name`, `site_title`, `site_desc`, `site_keyword`, `site_favicon`, `site_logo`, `site_email`) VALUES
(1, 'LaWave Design', 'LaWave Design - lawavedesign.com', 'Kami adalah perusahaan yang bergerak di bidang Web Development atau Jasa pembuatan website. Web Design dan Web Sistem adalah 2 hal yang berbeda, kewajiban kami untuk menyelaraskannya. Dengan pengalaman kami yang sudah lama dalam bidang ini ( 2007 ) sebagai  web deloper jakarta, kami siap membangun sebuah website dengan standart yang tinggi serta dapat menciptakan identitas visual dan pemasaran online dari perusahaan atau bisnis Anda.', 'Web Developer Jakarta,jasa pembuatan website,jasa pembuatan toko online, jasa web desain, web design, web development, web design jakarta-Halaman Utama', 'lawave-design-103.png', 'lawave-design-3636.png', 'syarif@lawavedesign.com');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_tag`
--

CREATE TABLE `lwd_tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `tag_name_en` varchar(255) NOT NULL,
  `tag_pub` enum('88','99') NOT NULL DEFAULT '88',
  `tag_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_tag`
--

INSERT INTO `lwd_tag` (`tag_id`, `tag_name`, `tag_name_en`, `tag_pub`, `tag_link`) VALUES
(2, 'Smartphone', '', '99', 'smartphone'),
(3, 'Notebook', '', '99', 'notebook'),
(4, 'App', '', '99', 'app'),
(5, 'OS', '', '99', 'os'),
(6, 'Android', '', '99', 'android');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_testi`
--

CREATE TABLE `lwd_testi` (
  `testi_id` int(8) NOT NULL,
  `testi_name` varchar(255) NOT NULL,
  `testi_desc` varchar(255) NOT NULL,
  `testi_job` varchar(255) NOT NULL,
  `testi_pub` enum('88','99') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_testi`
--

INSERT INTO `lwd_testi` (`testi_id`, `testi_name`, `testi_desc`, `testi_job`, `testi_pub`) VALUES
(1, 'Adit Walihadi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 'Web Developer', '99'),
(3, 'Elsa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 'Designer', '99'),
(4, 'Yuli', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 'Apoteker', '99');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_transaction`
--

CREATE TABLE `lwd_transaction` (
  `transaction_id` int(11) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `voucher_id` int(8) NOT NULL,
  `member_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `trans_status_id` int(11) NOT NULL,
  `transaction_cancel` enum('99','88') NOT NULL DEFAULT '88',
  `transaction_hide` enum('99','88') NOT NULL DEFAULT '88',
  `transaction_no` varchar(100) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_name` varchar(255) NOT NULL,
  `transaction_email` varchar(255) NOT NULL,
  `transaction_phone` varchar(255) NOT NULL,
  `transaction_address` text NOT NULL,
  `transaction_shipping` varchar(255) NOT NULL,
  `transaction_shipping_cost` decimal(10,0) NOT NULL,
  `transaction_cost` decimal(10,0) NOT NULL,
  `transaction_weight` int(11) NOT NULL,
  `transaction_total` decimal(10,0) NOT NULL,
  `transaction_shipping_date` date NOT NULL,
  `transaction_shipping_no` varchar(255) NOT NULL,
  `transaction_note` text NOT NULL,
  `transaction_receive_note` text NOT NULL,
  `transaction_receive_date` date NOT NULL,
  `transaction_close_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lwd_transaction_item`
--

CREATE TABLE `lwd_transaction_item` (
  `transaction_item_id` int(11) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `transaction_item_price` decimal(10,0) NOT NULL,
  `transaction_item_qty` int(11) NOT NULL,
  `transaction_item_subtotal` decimal(10,0) NOT NULL,
  `transaction_item_weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_transaction_item`
--

INSERT INTO `lwd_transaction_item` (`transaction_item_id`, `order_no`, `product_id`, `transaction_item_price`, `transaction_item_qty`, `transaction_item_subtotal`, `transaction_item_weight`) VALUES
(1, '39694', 104, '250000', 2, '500000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `lwd_trans_status`
--

CREATE TABLE `lwd_trans_status` (
  `trans_status_id` int(11) NOT NULL,
  `trans_status_name` varchar(100) NOT NULL,
  `trans_status_name_en` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_trans_status`
--

INSERT INTO `lwd_trans_status` (`trans_status_id`, `trans_status_name`, `trans_status_name_en`) VALUES
(1, 'Unpaid Order', ''),
(2, 'Transaction Confirmed', ''),
(3, 'On Delivery', ''),
(4, 'Transaction Complete', '');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_user`
--

CREATE TABLE `lwd_user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_level` enum('owner','admin','user') NOT NULL DEFAULT 'owner',
  `user_status` enum('active','block') NOT NULL DEFAULT 'active',
  `user_image` varchar(255) NOT NULL,
  `user_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_user`
--

INSERT INTO `lwd_user` (`user_id`, `user_username`, `user_password`, `user_name`, `user_email`, `user_level`, `user_status`, `user_image`, `user_session`) VALUES
(1, 'admin', '074c0845506eb57dfbc3ef6dfdf3a3d48251871c', 'admin', 'admin', 'owner', 'active', '', 'e6980d3379562a6b464ada71870793acb0d6b629');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_voucher`
--

CREATE TABLE `lwd_voucher` (
  `voucher_id` int(8) NOT NULL,
  `voucher_code` varchar(255) NOT NULL,
  `voucher_discount` int(11) NOT NULL,
  `voucher_expired` date NOT NULL,
  `voucher_limit` int(8) NOT NULL,
  `voucher_pub` enum('88','99') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_voucher`
--

INSERT INTO `lwd_voucher` (`voucher_id`, `voucher_code`, `voucher_discount`, `voucher_expired`, `voucher_limit`, `voucher_pub`) VALUES
(0, 'novoucher', 0, '9999-12-31', 99, '99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lwd_article`
--
ALTER TABLE `lwd_article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `article_id_2` (`article_id`);

--
-- Indexes for table `lwd_bank`
--
ALTER TABLE `lwd_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `lwd_banner`
--
ALTER TABLE `lwd_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `lwd_brand`
--
ALTER TABLE `lwd_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `lwd_category`
--
ALTER TABLE `lwd_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `lwd_catinfo`
--
ALTER TABLE `lwd_catinfo`
  ADD PRIMARY KEY (`catinfo_id`);

--
-- Indexes for table `lwd_city`
--
ALTER TABLE `lwd_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `lwd_color`
--
ALTER TABLE `lwd_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `lwd_contact`
--
ALTER TABLE `lwd_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `lwd_image`
--
ALTER TABLE `lwd_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `lwd_info`
--
ALTER TABLE `lwd_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `lwd_member`
--
ALTER TABLE `lwd_member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `reason_id` (`reason_id`);

--
-- Indexes for table `lwd_motif`
--
ALTER TABLE `lwd_motif`
  ADD PRIMARY KEY (`motif_id`);

--
-- Indexes for table `lwd_order`
--
ALTER TABLE `lwd_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `lwd_payment`
--
ALTER TABLE `lwd_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `lwd_product`
--
ALTER TABLE `lwd_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indexes for table `lwd_province`
--
ALTER TABLE `lwd_province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `lwd_reason`
--
ALTER TABLE `lwd_reason`
  ADD PRIMARY KEY (`reason_id`);

--
-- Indexes for table `lwd_seo`
--
ALTER TABLE `lwd_seo`
  ADD PRIMARY KEY (`seo_id`);

--
-- Indexes for table `lwd_shipment`
--
ALTER TABLE `lwd_shipment`
  ADD PRIMARY KEY (`shipment_id`);

--
-- Indexes for table `lwd_site`
--
ALTER TABLE `lwd_site`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `lwd_tag`
--
ALTER TABLE `lwd_tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `lwd_testi`
--
ALTER TABLE `lwd_testi`
  ADD PRIMARY KEY (`testi_id`);

--
-- Indexes for table `lwd_transaction`
--
ALTER TABLE `lwd_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `trans_status_id` (`trans_status_id`),
  ADD KEY `voucher_id` (`voucher_id`);

--
-- Indexes for table `lwd_transaction_item`
--
ALTER TABLE `lwd_transaction_item`
  ADD PRIMARY KEY (`transaction_item_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `lwd_trans_status`
--
ALTER TABLE `lwd_trans_status`
  ADD PRIMARY KEY (`trans_status_id`);

--
-- Indexes for table `lwd_user`
--
ALTER TABLE `lwd_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `lwd_voucher`
--
ALTER TABLE `lwd_voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lwd_article`
--
ALTER TABLE `lwd_article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lwd_bank`
--
ALTER TABLE `lwd_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lwd_banner`
--
ALTER TABLE `lwd_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lwd_brand`
--
ALTER TABLE `lwd_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `lwd_category`
--
ALTER TABLE `lwd_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lwd_catinfo`
--
ALTER TABLE `lwd_catinfo`
  MODIFY `catinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lwd_city`
--
ALTER TABLE `lwd_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `lwd_color`
--
ALTER TABLE `lwd_color`
  MODIFY `color_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lwd_contact`
--
ALTER TABLE `lwd_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lwd_image`
--
ALTER TABLE `lwd_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `lwd_info`
--
ALTER TABLE `lwd_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lwd_member`
--
ALTER TABLE `lwd_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lwd_motif`
--
ALTER TABLE `lwd_motif`
  MODIFY `motif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lwd_order`
--
ALTER TABLE `lwd_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lwd_payment`
--
ALTER TABLE `lwd_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lwd_product`
--
ALTER TABLE `lwd_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `lwd_province`
--
ALTER TABLE `lwd_province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `lwd_reason`
--
ALTER TABLE `lwd_reason`
  MODIFY `reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lwd_seo`
--
ALTER TABLE `lwd_seo`
  MODIFY `seo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lwd_shipment`
--
ALTER TABLE `lwd_shipment`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lwd_tag`
--
ALTER TABLE `lwd_tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lwd_testi`
--
ALTER TABLE `lwd_testi`
  MODIFY `testi_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lwd_transaction`
--
ALTER TABLE `lwd_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lwd_transaction_item`
--
ALTER TABLE `lwd_transaction_item`
  MODIFY `transaction_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lwd_trans_status`
--
ALTER TABLE `lwd_trans_status`
  MODIFY `trans_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lwd_user`
--
ALTER TABLE `lwd_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lwd_voucher`
--
ALTER TABLE `lwd_voucher`
  MODIFY `voucher_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lwd_member`
--
ALTER TABLE `lwd_member`
  ADD CONSTRAINT `lwd_member_ibfk_1` FOREIGN KEY (`reason_id`) REFERENCES `lwd_reason` (`reason_id`) ON UPDATE CASCADE;

--
-- Constraints for table `lwd_order`
--
ALTER TABLE `lwd_order`
  ADD CONSTRAINT `lwd_order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `lwd_product` (`product_id`) ON UPDATE CASCADE;

--
-- Constraints for table `lwd_payment`
--
ALTER TABLE `lwd_payment`
  ADD CONSTRAINT `lwd_payment_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `lwd_transaction` (`transaction_id`),
  ADD CONSTRAINT `lwd_payment_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `lwd_bank` (`bank_id`);

--
-- Constraints for table `lwd_product`
--
ALTER TABLE `lwd_product`
  ADD CONSTRAINT `lwd_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `lwd_category` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lwd_product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `lwd_brand` (`brand_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lwd_product_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `lwd_color` (`color_id`) ON UPDATE CASCADE;

--
-- Constraints for table `lwd_transaction`
--
ALTER TABLE `lwd_transaction`
  ADD CONSTRAINT `lwd_transaction_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `lwd_member` (`member_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lwd_transaction_ibfk_2` FOREIGN KEY (`trans_status_id`) REFERENCES `lwd_trans_status` (`trans_status_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lwd_transaction_ibfk_3` FOREIGN KEY (`voucher_id`) REFERENCES `lwd_voucher` (`voucher_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
