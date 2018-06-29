-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 04:24 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_erakomp`
--

-- --------------------------------------------------------

--
-- Table structure for table `lwd_article`
--

CREATE TABLE `lwd_article` (
  `article_id` int(11) NOT NULL,
  `article_cat_id` int(11) NOT NULL,
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

INSERT INTO `lwd_article` (`article_id`, `article_cat_id`, `article_tag`, `article_title`, `article_title_en`, `article_review`, `article_review_en`, `article_desc`, `article_desc_en`, `article_date`, `article_pub`, `article_image`, `article_alt`, `article_link`) VALUES
(17, 8, 'App', 'a', '', '', '', '<p>a</p>\r\n', '', '2017-03-17 00:00:00', '88', '', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_article_cat`
--

CREATE TABLE `lwd_article_cat` (
  `article_cat_id` int(11) NOT NULL,
  `article_cat_name` varchar(255) NOT NULL,
  `article_cat_name_en` varchar(255) NOT NULL,
  `article_cat_pub` enum('88','99') NOT NULL DEFAULT '88'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_article_cat`
--

INSERT INTO `lwd_article_cat` (`article_cat_id`, `article_cat_name`, `article_cat_name_en`, `article_cat_pub`) VALUES
(8, 'Acers', '', '88');

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
(14, 'BCA', 'Muhamad Syarif SyaBana', '20011041244', '99', '1257-bca-bca.jpg'),
(15, 'Mandiri Syari''ah', 'Syarif SyaBana', '9500125411', '99', '2985-mandiri-mandiri.jpg');

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
(1, 'slide', '#', 'erakomp', '99', 'kylie-lip-kit-brown-sugar-8854.jpg'),
(5, 'slide', '#', 'erakomp', '99', 'erakomp-2329.jpg'),
(6, 'slide', '#', 'erakomp', '99', 'erakomp-5842.jpg'),
(7, 'banner', '#', 'erakomp', '99', 'erakomp-115.jpg'),
(8, 'banner', '#', 'erakomp', '99', 'erakomp-1469.jpg'),
(9, 'banner', '#', 'erakomp', '99', 'erakomp-4622.jpg'),
(10, 'banner', '#', 'erakomp', '99', 'erakomp-5173.jpg'),
(11, 'banner', '#', 'erakomp', '99', 'erakomp-6375.jpg'),
(12, 'banner', '#', 'erakomp', '99', 'erakomp-7445.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_brand`
--

CREATE TABLE `lwd_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_link` varchar(255) NOT NULL,
  `brand_pub` enum('88','99') NOT NULL DEFAULT '88'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_brand`
--

INSERT INTO `lwd_brand` (`brand_id`, `brand_name`, `brand_link`, `brand_pub`) VALUES
(1, 'Asus', 'asus', '99'),
(3, 'Acer', 'acer', '99'),
(4, 'Lenovo', 'lenovo', '99'),
(5, 'Epson', 'epson', '99'),
(6, 'HP', 'hp', '99'),
(7, 'Logitech', 'logitech', '99'),
(8, 'Samsung', 'samsung', '99'),
(9, 'Nikon', 'nikon', '99'),
(10, 'Canon', 'canon', '99'),
(11, 'IBM', 'ibm', '99'),
(12, 'LG', 'lg', '99'),
(13, 'Zyrex', 'zyrex', '99'),
(14, 'Apple', 'apple', '99');

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
(9, 'Server', '', '', '', '', 0, '99', '', 'server'),
(10, 'Komputer', '', '', '', '', 0, '99', '', 'komputer'),
(11, 'Notebook', '', '', '', '', 0, '99', '', 'notebook'),
(12, 'UPS', '', '', '', '', 0, '99', '', 'ups'),
(13, 'Printer', '', '', '', '', 0, '99', '', 'printer'),
(14, 'Software', '', '', '', '', 0, '99', '', 'software'),
(15, 'Mouse', '', '', '', '', 0, '99', '', 'mouse');

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
-- Table structure for table `lwd_contact`
--

CREATE TABLE `lwd_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_fax` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_address` text NOT NULL,
  `contact_maps` text NOT NULL,
  `contact_fb` varchar(255) NOT NULL,
  `contact_tw` varchar(255) NOT NULL,
  `contact_ig` varchar(255) NOT NULL,
  `contact_in` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_contact`
--

INSERT INTO `lwd_contact` (`contact_id`, `contact_phone`, `contact_fax`, `contact_email`, `contact_address`, `contact_maps`, `contact_fb`, `contact_tw`, `contact_ig`, `contact_in`) VALUES
(1, '0812-5222-2252', '021-554-3330', 'info@erakomp.com', 'Lorem ipsum dolor sit amet, \r\nconsectetur adipiscing elit.', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7525098568462!2d106.81402831418737!3d-6.163889995537388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f677cce67d73%3A0x8aac357702faa9cf!2sErakomp+Infonusa.+PT!5e0!3m2!1sen!2sid!4v1490612844468" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'http://facebook.com', 'http://twitter.com', 'http://instagram.com', '');

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
(133, 87, 'product', 'product-industry-2-9322.jpg', 0),
(134, 87, 'product', 'product-industry-2-7753.png', 1),
(135, 87, 'product', 'product-industry-2-7754.png', 2),
(136, 87, 'product', 'product-industry-2-7755.jpg', 3),
(137, 87, 'product', 'product-industry-2-53.jpg', 4),
(138, 87, 'product', 'product-industry-2-8339.png', 5),
(139, 88, 'product', 'sand-making-machine-8916.png', 0),
(140, 88, 'product', 'sand-making-machine-3019.png', 1),
(141, 88, 'product', 'sand-making-machine-3020.png', 2),
(142, 88, 'product', 'sand-making-machine-2615.png', 3),
(143, 88, 'product', 'sand-making-machine-3022.png', 4),
(144, 88, 'product', 'sand-making-machine-2617.png', 5),
(149, 89, 'product', '1-4944.png', 0),
(150, 89, 'product', '', 1),
(151, 89, 'product', '', 2),
(152, 89, 'product', '', 3),
(153, 89, 'product', '', 4),
(154, 89, 'product', '', 5),
(155, 6, 'article', 'term-and-conditions-3848.png', 0),
(162, 90, 'product', 'epson-printer-lx-310-6908.jpg', 0),
(163, 90, 'product', '', 1),
(164, 90, 'product', '', 2),
(165, 90, 'product', '', 3),
(166, 90, 'product', '', 4),
(167, 90, 'product', '', 5),
(168, 91, 'product', 'logitect-m1-wirless-grey-7235.jpg', 0),
(169, 91, 'product', '', 1),
(170, 91, 'product', '', 2),
(171, 91, 'product', '', 3),
(172, 91, 'product', '', 4),
(173, 91, 'product', '', 5),
(174, 92, 'product', 'asus-bu201la-core-i7-os-pro-9496.jpg', 0),
(175, 92, 'product', '', 1),
(176, 92, 'product', '', 2),
(177, 92, 'product', '', 3),
(178, 92, 'product', '', 4),
(179, 92, 'product', '', 5),
(180, 93, 'product', 'printer-hp-deskjet-gt5820-8863.jpg', 0),
(181, 93, 'product', '', 1),
(182, 93, 'product', '', 2),
(183, 93, 'product', '', 3),
(184, 93, 'product', '', 4),
(185, 93, 'product', '', 5),
(186, 94, 'product', 'pc-hp-aio-pro-one-400-g1-9762.jpg', 0),
(187, 94, 'product', '', 1),
(188, 94, 'product', '', 2),
(189, 94, 'product', '', 3),
(190, 94, 'product', '', 4),
(191, 94, 'product', '', 5),
(192, 95, 'product', 'hp-pro-one-400-g2-free-dos-850.jpg', 0),
(193, 95, 'product', '', 1),
(194, 95, 'product', '', 2),
(195, 95, 'product', '', 3),
(196, 95, 'product', '', 4),
(197, 95, 'product', '', 5),
(198, 96, 'product', 'lenovo-ideacentre-b40-30-yid-black-1232.jpg', 0),
(199, 96, 'product', '', 1),
(200, 96, 'product', '', 2),
(201, 96, 'product', '', 3),
(202, 96, 'product', '', 4),
(203, 96, 'product', '', 5),
(204, 97, 'product', 'pc-hp-280-g1-mt-5431.jpg', 0),
(205, 97, 'product', '', 1),
(206, 97, 'product', '', 2),
(207, 97, 'product', '', 3),
(208, 97, 'product', '', 4),
(209, 97, 'product', '', 5),
(210, 13, 'article', 'a-8035.jpg', 0),
(214, 17, 'article', 'a-4282.jpg', 0);

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
(56, '30176', 96, '8525000', 1, '8525000', 1200, '2017-03-15 18:26:01'),
(57, '82144', 93, '1600000', 1, '1600000', 2400, '2017-03-29 16:33:14'),
(58, '88677', 90, '2200000', 1, '2200000', 3500, '2017-05-23 11:39:27');

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

--
-- Dumping data for table `lwd_payment`
--

INSERT INTO `lwd_payment` (`payment_id`, `transaction_id`, `bank_id`, `payment_account`, `payment_no`, `payment_bank`, `payment_total`, `payment_date`, `payment_confirm_date`, `payment_status`) VALUES
(1, 2, 14, 'Muhamad Syarif SyaBana', '0121012462', 'BCA', '11256000', '2017-03-15', '2017-03-20 15:31:54', '99'),
(2, 3, 14, 'Syarif Syabana', '72501017', 'BCA', '8932000', '2017-03-20', '2017-03-20 15:31:54', '99'),
(3, 6, 14, 'Syarif Syabana', '7525252410', 'BCA', '27534000', '2017-03-20', '2017-03-20 15:31:54', '99'),
(4, 10, 15, 'Fulan', '7525252410', 'BCA', '8539000', '2017-03-20', '2017-03-20 15:31:54', '99'),
(5, 4, 14, 'Muhamad Syarif SyaBana', '7525252410', 'BCA', '3205000', '2017-03-21', '2017-03-21 14:17:47', '88'),
(6, 5, 14, 'Muhamad Syarif SyaBana', '7525252410', 'BCA', '8139000', '2017-03-21', '2017-03-21 14:39:24', '88'),
(7, 27, 14, 'Muhamad Syarif SyaBana an', '7525252410', 'BCA', '19177000', '2017-03-22', '2017-03-22 18:59:20', '99');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_product`
--

CREATE TABLE `lwd_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `statusprd_id` varchar(50) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_name_en` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_desc_en` text NOT NULL,
  `product_alt` varchar(255) NOT NULL COMMENT 'alt untuk gambar',
  `product_price` decimal(10,0) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_price_strip` decimal(10,0) NOT NULL,
  `product_weight` float NOT NULL,
  `product_dimension` varchar(50) NOT NULL,
  `product_pub` enum('88','99') NOT NULL COMMENT '99 = publish',
  `product_seq` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_product`
--

INSERT INTO `lwd_product` (`product_id`, `category_id`, `subcat_id`, `brand_id`, `statusprd_id`, `product_code`, `product_name`, `product_name_en`, `product_desc`, `product_desc_en`, `product_alt`, `product_price`, `product_stock`, `product_price_strip`, `product_weight`, `product_dimension`, `product_pub`, `product_seq`, `product_image`, `product_link`) VALUES
(90, 13, 0, 5, ',2,,1,', 'epslx310', 'EPSON Printer LX-310', '', '<table cellpadding="3" cellspacing="0">\r\n <tbody>\r\n  <tr>\r\n   <td><strong>Printing Method</strong></td>\r\n   <td>Impact dot matrix </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Pixel Resolutions Max.</strong></td>\r\n   <td>9 pin, 160 columns max, up to 240 x 216 dpi </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Print Speed Black</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>High Speed Draft10/12/15 cpi : 347 / 357 / 390 cps  </li>\r\n    <li>High Speed Draft Condensed17/20 cpi : 383 / 298 cps  </li>\r\n    <li>Draft10/12/15 cpi : 260 / 312 / 223 cps  </li>\r\n    <li>Draft Condensed17/20 cpi : 222 / 260 cps  </li>\r\n    <li>Draft Emphasized10 cpi : 130 cps  </li>\r\n    <li>NLQ10/12/15/17/20 cpi : 65 / 78 / 55 / 47 / 56 cps  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Antarmuka / Interface</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>USB 2.0 Full-Speed  </li>\r\n    <li>Bi-directional parallel interface (IEEE-1284 nibble mode supported)  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Ink Catridge Black</strong></td>\r\n   <td>Fabric Ribbon Cartridge (Black) </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>O/S Compatibility</strong></td>\r\n   <td>Microsoft® Windows® 2000 / XP / 7, Microsoft® Windows Vista® </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Ukuran Kertas</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Cut Sheet (Single Sheet)\r\n    <ul>\r\n     <li>Length : 100 - 364mm  </li>\r\n     <li>Width : 100 - 257mm  </li>\r\n     <li>Thickness : 0.065 - 0.14mm  </li>\r\n    </ul>\r\n    </li>\r\n    <li>Cut Sheet (Multi Part)\r\n    <ul>\r\n     <li>Length : 100 - 364mm  </li>\r\n     <li>Width : 100 - 257mm  </li>\r\n     <li>Thickness : 0.12 - 0.39mm  </li>\r\n    </ul>\r\n    </li>\r\n    <li>Envelope (No.6)\r\n    <ul>\r\n     <li>Length : 92mm  </li>\r\n     <li>Width : 165mm  </li>\r\n     <li>Thickness : 0.16 - 0.52mm  </li>\r\n    </ul>\r\n    </li>\r\n    <li>Envelope (No.10)\r\n    <ul>\r\n     <li>Length : 105mm  </li>\r\n     <li>Width : 241mm  </li>\r\n     <li>Thickness : 0.16 - 0.52mm  </li>\r\n    </ul>\r\n    </li>\r\n    <li>Continuous Paper (Single Sheet an Multi part)\r\n    <ul>\r\n     <li>Length : 101.6 - 558.8mm  </li>\r\n     <li>Width : 101.6 - 254.0mm  </li>\r\n     <li>Thickness : 0.065 - 0.39mm  </li>\r\n    </ul>\r\n    </li>\r\n    <li>Roll Paper\r\n    <ul>\r\n     <li>Width : 216mm  </li>\r\n     <li>Thickness : 0.07 - 0.09mm  </li>\r\n    </ul>\r\n    </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Konsumsi Daya</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Operating : Approx. 27W (ISO/IEC 10561 Letter pattern),(ENERGY STAR compliant)  </li>\r\n    <li>Sleep Mode : Approx. 1.1W  </li>\r\n    <li>Auto Off Mode : Approx. 0.2W (120V), Approx. 0.3W (230V)  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Voltase</strong></td>\r\n   <td>AC 120V / AC 220 - 240V </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n', '', 'EPSON Printer LX-310', '2200000', 24, '0', 3500, '35, 25, 20', '99', 0, '', 'epson-printer-lx-310'),
(91, 15, 0, 7, ',2,,1,', 'lm1g', 'Logitect M1 Wirless Grey', '', '<p>Nikmati kualitas suara yang kaya, desain yang bagus dan pengoperasian yang sangat mudah. Logitech S-150 tidak memerlukan baterai, karena pengoperasiannya cukup hanya dengan kabel USB baik untuk power dan suara. Fitur-fitur tadilah yang membuat Logitech S-150 sangat cocok menemani notebook Anda.<br>\r\n<br>\r\nSpeaker dengan kualitas digital, karena menggunakan USB 2.0 untuk tenaga dan sound input  <br>\r\nKualitas suara yang digital yang jernih  <br>\r\nRingan dan memiliki ukuran yang compact      <br>\r\nTidak membutuhkan baterai dan hanya membutuhkan sebuah kabel USb untuk listrik dan input audio  <br>\r\nDidesain dengan desain yang sederhana dan sangat mudah dioperasikan bahkan tanpa memerlukan buku manual  <br>\r\n<br>\r\n<br>\r\nDetail Specifications<br>\r\n      <br>\r\nFrequency Response    USB 2.0<br>\r\nPower Supply    90 Hz–20 kHz<br>\r\nAccessories    USB cable (4-foot)</p>\r\n', '', 'Logitect M1 Wirless Grey', '130000', 0, '0', 200, '10, 7, 5', '99', 0, '', 'logitect-m1-wirless-grey'),
(92, 11, 0, 1, ',2,,1,', 'abu201la', 'Asus BU201LA Core-i7 OS PRO', '', '<p>Processor Intel® Core™ I7-4650U Processor (4M Cache, 1.70 GHz, up to 2.90 GHz)</p>\r\n\r\n<p>System Memory DRAM DDR3 4GB</p>\r\n\r\n<p>Storage SATA 500GB 5400RPM 2.5&#39; Hybrid HDD + 8G SSD</p>\r\n\r\n<p>Video Graphics Intel HD Graphics 4400</p>\r\n\r\n<p>Optical Drive N/A</p>\r\n\r\n<p>Operating System Preload Windows 7 64 bit Professional (as a downgrade from Windows 8.1 64bit Professional)</p>\r\n\r\n<p>Display 12.5”//LED Back-lit//Slim 400nits//FHD 1920x1080 16:9//AG//NTSC:50%//WV</p>\r\n\r\n<p>Color & Decoration Dark Grey</p>\r\n\r\n<p>Warranty 3 Years Global Warranty</p>\r\n\r\n<p>Weight 1.2 KG (with 2 cell battery)</p>\r\n', '', 'Asus BU201LA Core-i7 OS PRO', '19000000', 26, '0', 1700, '30, 20, 10', '99', 0, '', 'asus-bu201la-core-i7-os-pro'),
(93, 13, 0, 6, ',2,,1,', 'hpgt5820', 'Printer HP Deskjet GT5820', '', '<table cellpadding="3" cellspacing="0">\r\n <tbody>\r\n  <tr>\r\n   <td><strong>Platform</strong></td>\r\n   <td>Multifunction </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Metode Cetak</strong></td>\r\n   <td>Thermal Inkjet </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Teknologi Cetak</strong></td>\r\n   <td>HP Thermal Inkjet </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Maks. Besaran Kertas</strong></td>\r\n   <td>A4 </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Maks. Resolusi</strong></td>\r\n   <td>4800 </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Kecepatan Cetak B/W</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Up to 7.5 ppm  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Kecepatan Cetak Warna</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Up to 4.5 ppm  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Konektivitas</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>1 Hi-Speed USB 2.0  </li>\r\n    <li>Wireless  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Kesesuaian Sistem Operasi</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Windows® 8.1, Windows® 8, Windows® 7, Windows Vista®, Windows® XP SP3 (32-bit)  </li>\r\n    <li>OS X v10.8 Mountain Lion, OS X v10.9 Mavericks, OS X v10.10 Yosemite  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Memori Standar</strong></td>\r\n   <td>Integrated </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Maks. Memori</strong></td>\r\n   <td>Integrated </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Bahasa</strong></td>\r\n   <td>HP PCL 3 GUI </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Input Tray #1</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Paper handling input, standard: 60-sheet input tray  </li>\r\n    <li>Paper handling output, standard: 25-sheet output tray  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Media</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Plain paper, Photo paper, Brochure paper  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Compatible Media Sizes</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Media sizes supported: A4, B5, A6, DL Envelope  </li>\r\n    <li>Media sizes custom: 76.2 x 127 to 215 x 355 mm  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Duplex Printing</strong></td>\r\n   <td>Manual </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Copier Function</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Copy resolution (black text): Up to 600 x 300 dpi  </li>\r\n    <li>Copy resolution (color text and graphics): Up to 600 x 300 dpi  </li>\r\n    <li>Copies, maximum: Up to 9 copies  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Scanner Function</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Scanner type: Flatbed  </li>\r\n    <li>Scan file format: JPEG, TIFF, PDF, BMP, PNG  </li>\r\n    <li>Scan resolution, optical: Up to 1200 dpi  </li>\r\n    <li>Bit depth: 24-bit  </li>\r\n    <li>Scan size (flatbed), maximum: Scan size (flatbed), maximum  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Power Consumption</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>10 watts maximum, 0.07 watts (Off), 2.1 watts (Standby), 0.88 watt (Sleep)  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>AC Adapter</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Input voltage 100 to 240 VAC (+/- 10%), 50/60 Hz (+/- 3 Hz). High voltage: Input voltage 200 to 240 VAC (+/- 10%), 50/60 Hz (+/- 3Hz)  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Dimensi</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Minimum dimensions : 525 x 310 x 158 mm  </li>\r\n    <li>Maximum dimensions : 525 x 553.5 x 256.6 mm  </li>\r\n    <li><strong>Dimensi Kemasan</strong> : 525 x 310 x 158 mm  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Berat</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>4.67 kg  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Consumables</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>HP GT51 Black Original Ink Bottle  </li>\r\n    <li>HP GT52 Cyan Original Ink Bottle  </li>\r\n    <li>HP GT52 Magenta Original Ink Bottle  </li>\r\n    <li>HP GT52 Yellow Original Ink Bottle  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n', '', 'Printer HP Deskjet GT5820', '1600000', 29, '0', 2400, '40, 20, 10', '99', 0, '', 'printer-hp-deskjet-gt5820'),
(95, 10, 0, 6, '', 'hppo400g2', 'HP Pro One 400 G2 Free DOS', '', '<p>HP ProOne 400 G2 </p>\r\n\r\n<p>Intel Core i3-6100 3.7GHz  *Non-Touch</p>\r\n\r\n<p>4GB DDR4 Memory</p>\r\n\r\n<p>500GB 7200 RPM SATA </p>\r\n\r\n<p>Slim SuperMulti DVDRW</p>\r\n\r\n<p>Intel HD Graphics 530</p>\r\n\r\n<p>Broadcom 802.11 a/b/g/n</p>\r\n\r\n<p>HP USB SlimKeyboard & Mouse</p>\r\n\r\n<p>Serial Port PS/2</p>\r\n\r\n<p>3/3/3 Years HP Warranty</p>\r\n\r\n<p>FreeDOS</p>\r\n', '', 'HP Pro One 400 G2 Free DOS', '8000000', 15, '0', 1600, '50, 40, 50', '99', 0, '', 'hp-pro-one-400-g2-free-dos'),
(96, 10, 0, 4, ',2,,1,', 'icb4030yid', 'LENOVO IdeaCentre B40-30 YID - Black', '', '<table cellpadding="3" cellspacing="0">\r\n <tbody>\r\n  <tr>\r\n   <td><strong>Platform</strong></td>\r\n   <td>Desktop PC </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Tipe Prosesor</strong></td>\r\n   <td>Intel Core i3 </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Processor Onboard</strong></td>\r\n   <td>Intel® Core™ i3-4160T Processor (3.10 GHz, 3M Cache) </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Memori Standar</strong></td>\r\n   <td>4GB DDR3 </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Tipe Grafis</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>NVIDIA Geforce 820A 2GB  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Audio</strong></td>\r\n   <td>Integrated </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Speaker</strong></td>\r\n   <td>Integrated </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Hard Drive</strong></td>\r\n   <td>1TB </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Optical Drive</strong></td>\r\n   <td>DVD±RW </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Networking</strong></td>\r\n   <td>Integrated </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Keyboard</strong></td>\r\n   <td>Wireless Keyboard </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Ragam Input Device</strong></td>\r\n   <td>Wireless mouse </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Antarmuka / Interface</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>2 x USB 3.0  </li>\r\n    <li>3 x USB 2.0  </li>\r\n    <li>HDMI-out  </li>\r\n    <li>Port LAN  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Sistem Operasi</strong></td>\r\n   <td>Windows 8.1 </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Monitor</strong></td>\r\n   <td>21.5 Inch\r\n   <ul>\r\n    <li>Touchscreen  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Chassis Form Factor</strong></td>\r\n   <td>All in one design </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Dimensi</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>20.9" x 8.1" x 17.2"  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Lain-lain</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>Wireless: 802.11 b/g/n  </li>\r\n    <li>Bluetooth 4.0  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n', '', 'LENOVO IdeaCentre B40-30 YID - Black', '8525000', 36, '0', 1200, '30, 25, 10', '99', 0, '', 'lenovo-ideacentre-b40-30-yid-black'),
(97, 10, 0, 6, '1', 'hp280g1mt', 'PC HP 280 G1 MT', '', '<table cellpadding="3" cellspacing="0">\r\n <tbody>\r\n  <tr>\r\n   <td><strong>Platform</strong></td>\r\n   <td>Desktop PC </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Tipe Prosesor</strong></td>\r\n   <td>Intel Core I3-4170 </td>\r\n  </tr>\r\n  <tr>\r\n   <td> </td>\r\n   <td> </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Memori Standar</strong></td>\r\n   <td>2GB DDR3 </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Memori Slot</strong></td>\r\n   <td>2 </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Tipe Grafis</strong></td>\r\n   <td>Intel® HD Graphics </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Audio</strong></td>\r\n   <td>Integrated </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Hard Drive</strong></td>\r\n   <td>500GB </td>\r\n  </tr>\r\n  <tr>\r\n   <td> </td>\r\n   <td> </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Networking</strong></td>\r\n   <td>Integrated </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Kecepatan Jaringan</strong></td>\r\n   <td>10 / 100 / 1000 Mbps </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Keyboard</strong></td>\r\n   <td>USB Keyboard </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Ragam Input Device</strong></td>\r\n   <td>USB Optical Mouse </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Ragam Slot</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>1x PCIe x1  </li>\r\n    <li>1x PCIe x16  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Antarmuka / Interface</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>2x USB 3.0  </li>\r\n    <li>USB 2.0  </li>\r\n    <li>1x audio line in  </li>\r\n    <li>1x audio line out  </li>\r\n    <li>1x DVI-D  </li>\r\n    <li>1x VGA  </li>\r\n    <li>1x RJ-45  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Sistem Operasi</strong></td>\r\n   <td>DOS </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Monitor</strong></td>\r\n   <td>Include\r\n   <ul>\r\n    <li>HP V193b - 18.5"</li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Chassis Form Factor</strong></td>\r\n   <td>Micro Tower ATX </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Dimensi</strong></td>\r\n   <td>16.5 x 35.5 x 35.88 cm </td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Berat</strong></td>\r\n   <td>\r\n   <ul>\r\n    <li>7.05 kg  </li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n', '', 'PC HP 280 G1 MT', '5200000', 17, '0', 1700, '35, 15, 40', '99', 0, '', 'pc-hp-280-g1-mt');

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
-- Table structure for table `lwd_statusprd`
--

CREATE TABLE `lwd_statusprd` (
  `statusprd_id` int(11) NOT NULL,
  `statusprd_name` varchar(255) NOT NULL COMMENT 'status produk (best seller, sale dll)',
  `statusprd_name_en` varchar(255) NOT NULL,
  `statusprd_pub` enum('88','99') NOT NULL COMMENT '99 = publish'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_statusprd`
--

INSERT INTO `lwd_statusprd` (`statusprd_id`, `statusprd_name`, `statusprd_name_en`, `statusprd_pub`) VALUES
(1, 'best seller', '', '99'),
(2, 'popular', '', '99');

-- --------------------------------------------------------

--
-- Table structure for table `lwd_subcat`
--

CREATE TABLE `lwd_subcat` (
  `subcat_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `subcat_name_en` varchar(255) NOT NULL,
  `subcat_desc` text NOT NULL,
  `subcat_desc_en` text NOT NULL,
  `subcat_alt` varchar(255) NOT NULL,
  `subcat_seq` int(11) NOT NULL,
  `subcat_pub` enum('88','99') NOT NULL,
  `subcat_image` varchar(255) NOT NULL,
  `subcat_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lwd_subcat`
--

INSERT INTO `lwd_subcat` (`subcat_id`, `category_id`, `subcat_name`, `subcat_name_en`, `subcat_desc`, `subcat_desc_en`, `subcat_alt`, `subcat_seq`, `subcat_pub`, `subcat_image`, `subcat_link`) VALUES
(2, 3, 'sub category 21', '', 'sub category 21 desc', '', '', 0, '88', 'mastercard.png', 'sub-category-1'),
(4, 4, 'sub category 31', '', 'sub category 31', '', '', 0, '88', 'visa.png', 'sub-category-31'),
(5, 3, 'sub category 22', '', 'sub category 22', '', '', 0, '88', 'american-express.png', 'sub-category-22'),
(6, 3, 'sub category 23', '', 'sub category 23', '', '', 0, '88', 'cirrus.png', 'sub-category-23'),
(7, 4, 'sub category 32', '', 'sub category 32', '', '', 0, '88', 'paypal2.png', 'sub-category-32'),
(8, 7, 'Product Industry 1', '', 'Product Industry 2', '', 'Product Industry 2', 0, '88', '2307-product-industry-2-cirrus.png', 'product-industry-2'),
(9, 8, 'Product Industry 2', '', 'Sub Product 2', '', 'Sub Product 2', 0, '88', 'sub-product-2-8220.png', 'sub-product-2');

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
-- Table structure for table `lwd_transaction`
--

CREATE TABLE `lwd_transaction` (
  `transaction_id` int(11) NOT NULL,
  `order_no` varchar(100) NOT NULL,
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

--
-- Dumping data for table `lwd_transaction`
--

INSERT INTO `lwd_transaction` (`transaction_id`, `order_no`, `member_id`, `province_id`, `city_id`, `district_id`, `trans_status_id`, `transaction_cancel`, `transaction_hide`, `transaction_no`, `transaction_date`, `transaction_name`, `transaction_email`, `transaction_phone`, `transaction_address`, `transaction_shipping`, `transaction_shipping_cost`, `transaction_cost`, `transaction_weight`, `transaction_total`, `transaction_shipping_date`, `transaction_shipping_no`, `transaction_note`, `transaction_receive_note`, `transaction_receive_date`, `transaction_close_date`) VALUES
(2, '171492', 8, 3, 456, 6308, 4, '88', '88', '171492/2/erakomp/13/03/2017', '2017-03-13 15:39:06', 'Muhamad Syarif SyaBana', 'syarif@gmail.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (SDS) SAMEDAY SERVICE', '156000', '11100000', 10, '11256000', '2017-03-20', '7100213250015232360', 'note', '', '2017-03-20', '0000-00-00 00:00:00'),
(3, '19796', 8, 5, 501, 6987, 4, '88', '88', '19796/3/erakomp/13/03/2017', '2017-03-13 16:52:22', 'Muhamad Syarif SyaBana', 'syarif@gmail.com', '02155740759', 'Kraton dalem', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '17000', '8915000', 1203, '8932000', '0000-00-00', '', 'Note', 'pertahankan dan jangan kecewakan pembeli :)', '2017-03-20', '0000-00-00 00:00:00'),
(4, '176700', 8, 6, 151, 2092, 2, '88', '88', '176700/4/erakomp/15/03/2017', '2017-03-15 14:31:43', 'Muhamad Syarif SyaBana', 'syarif@gmail.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (ECO) ECONOMY SERVICE', '5000', '3200000', 8, '3205000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(5, '30016', 8, 6, 151, 2092, 2, '88', '88', '30016/5/erakomp/15/03/2017', '2017-03-15 14:35:43', 'Muhamad Syarif SyaBana', 'syarif@gmail.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '9000', '8130000', 7, '8139000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(6, '18312', 8, 6, 151, 2092, 4, '88', '88', '18312/6/erakomp/15/03/2017', '2017-03-15 14:39:17', 'Muhamad Syarif SyaBana', 'syarif@gmail.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '9000', '27525000', 1203, '27534000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(7, '45150', 8, 6, 151, 2092, 1, '99', '88', '45150/7/erakomp/15/03/2017', '2017-03-15 15:24:24', 'Muhamad Syarif SyaBana', 'syarif@gmail.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '27000', '13855000', 3100, '13882000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(8, '48048', 8, 6, 151, 2092, 1, '88', '88', '48048/8/erakomp/15/03/2017', '2017-03-15 15:27:27', 'Muhamad Syarif SyaBana', 'syarif@gmail.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '54000', '3770000', 5800, '3824000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(9, '54320', 8, 6, 151, 2092, 1, '99', '88', '54320/9/erakomp/15/03/2017', '2017-03-15 15:47:14', 'Muhamad Syarif SyaBana', 'syarif@gmail.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '414000', '56610000', 45700, '57024000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(10, '52574', 0, 9, 22, 319, 3, '88', '88', '52574/10/erakomp/17/03/2017', '2017-03-17 11:10:03', 'Fulan', 'fulan@gmail.com', '081666785412', 'Jl Raya Gunung Slamet, RT 003/01, No. 1A, Kel. Barangan Siang', 'Jalur Nugraha Ekakurir (JNE) | (REG) Layanan Reguler', '14000', '8525000', 1200, '8539000', '0000-00-00', '', 'Note', '', '0000-00-00', '0000-00-00 00:00:00'),
(11, '17200', 8, 3, 455, 6270, 1, '88', '88', '17200/11/erakomp/20/03/2017', '2017-03-20 13:07:17', 'Muhamad Syarif SyaBana', 'syarif@gmail.com', '02155740759', 'Kebon nanas', 'Jalur Nugraha Ekakurir (JNE) | (REG) Layanan Reguler', '18000', '19000000', 1700, '19018000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(13, '11280', 8, 3, 456, 6308, 1, '88', '88', '11280/13/erakomp/21/03/2017', '2017-03-21 15:04:46', 'Muhamad Syarif SyaBana', 'syarif@lawavedesign.com', '02155740759', 'Kebon nanas', 'Jalur Nugraha Ekakurir (JNE) | (REG) Layanan Reguler', '9000', '8525000', 1200, '8534000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(14, '35639', 8, 3, 456, 6308, 1, '88', '88', '35639/14/erakomp/21/03/2017', '2017-03-21 15:10:56', 'Muhamad Syarif SyaBana', 'syarif@lawavedesign.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (ECO) ECONOMY SERVICE', '12000', '5200000', 1700, '5212000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(15, '83286', 8, 3, 456, 6304, 1, '88', '88', '83286/15/erakomp/21/03/2017', '2017-03-21 15:32:38', 'Muhamad Syarif SyaBana', 'syariflwd@gmail.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '36000', '20600000', 4100, '20636000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(16, '69361', 8, 3, 456, 6308, 1, '88', '88', '69361/16/erakomp/21/03/2017', '2017-03-21 16:03:30', 'Muhamad Syarif SyaBana', 'syarif@lawavedesign.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '18000', '8000000', 1600, '8018000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(17, '26656', 8, 3, 456, 6308, 1, '88', '88', '26656/17/erakomp/21/03/2017', '2017-03-21 16:05:40', 'Muhamad Syarif SyaBana', 'syarifsyabana8@gmail.com', '02155740759', 'Kebon nanas', 'Jalur Nugraha Ekakurir (JNE) | (REG) Layanan Reguler', '9000', '8525000', 1200, '8534000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(18, '38266', 0, 6, 152, 2098, 1, '88', '88', '38266/18/erakomp/22/03/2017', '2017-03-22 12:58:52', 'Lawave', 'syarifsyabana8@gmail.com', '081906096810', 'testestes', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '18000', '8000000', 1600, '8018000', '0000-00-00', '', 'tesnote', '', '0000-00-00', '0000-00-00 00:00:00'),
(19, '38266', 0, 6, 153, 2108, 1, '88', '88', '38266/19/erakomp/22/03/2017', '2017-03-22 13:01:43', 'Fulan', 'syarifsyabana8@gmail.com', '02155740759', 'asd', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '18000', '5200000', 1700, '5218000', '0000-00-00', '', 'asd', '', '0000-00-00', '0000-00-00 00:00:00'),
(20, '47770', 0, 6, 152, 2098, 1, '88', '88', '47770/20/erakomp/22/03/2017', '2017-03-22 14:20:02', 'Muhamad Syarif SyaBana', 'syarifsyabana8@gmail.com', '081906096810', 'tes', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '18000', '19000000', 1700, '19018000', '0000-00-00', '', 'tes', '', '0000-00-00', '0000-00-00 00:00:00'),
(21, '107256', 0, 3, 403, 5572, 1, '88', '88', '107256/21/erakomp/22/03/2017', '2017-03-22 14:30:31', 'Dede', 'syarifsyabana8@gmail.com', '081906096810', 'tes', 'Jalur Nugraha Ekakurir (JNE) | (REG) Layanan Reguler', '30000', '1600000', 2400, '1630000', '0000-00-00', '', 'tes', '', '0000-00-00', '0000-00-00 00:00:00'),
(22, '9900', 0, 6, 152, 2098, 1, '88', '88', '9900/22/erakomp/22/03/2017', '2017-03-22 14:32:51', 'ADE', 'syarifsyabana8@gmail.com', '02155740759', 'tes', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '9000', '8525000', 1200, '8534000', '0000-00-00', '', 'tes', '', '0000-00-00', '0000-00-00 00:00:00'),
(23, '30304', 0, 6, 152, 2098, 1, '88', '88', '30304/23/erakomp/22/03/2017', '2017-03-22 14:39:33', 'dese', 'syarifsyabana8@gmail.com', '081906096810', 'tes', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '18000', '8000000', 1600, '8018000', '0000-00-00', '', 'tes', '', '0000-00-00', '0000-00-00 00:00:00'),
(24, '30240', 8, 3, 456, 6308, 1, '88', '88', '30240/24/erakomp/22/03/2017', '2017-03-22 15:11:12', 'Muhamad Syarif SyaBana', 'syarifsyabana8@gmail.com', '02155740759', 'Kebon nanas', 'Jalur Nugraha Ekakurir (JNE) | (REG) Layanan Reguler', '27000', '1600000', 2400, '1627000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(25, '122555', 8, 3, 456, 6308, 1, '88', '88', '122555/25/erakomp/22/03/2017', '2017-03-22 18:12:00', 'Muhamad Syarif SyaBana', 'syarifsyabana8@gmail.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (REG) REGULAR SERVICE', '18000', '8000000', 1600, '8018000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(26, '71242', 0, 3, 456, 6304, 1, '88', '88', '71242/26/erakomp/22/03/2017', '2017-03-22 18:16:36', 'Syarif Syabana', 'syarifsyabana8@gmail.com', '081906096810', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (SDS) SAMEDAY SERVICE', '177000', '19000000', 1700, '19177000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(27, '61620', 8, 3, 456, 6308, 3, '88', '88', '61620/27/erakomp/22/03/2017', '2017-03-22 18:17:32', 'Muhamad Syarif SyaBana', 'syarifsyabana8@gmail.com', '02155740759', 'Kebon nanas', 'Citra Van Titipan Kilat (TIKI) | (SDS) SAMEDAY SERVICE', '177000', '19000000', 1700, '19177000', '2017-03-23', '7100213250015232360', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(28, '51360', 9, 3, 456, 6304, 1, '88', '88', '51360/28/erakomp/23/03/2017', '2017-03-23 17:42:49', 'Syarif Lwd', 'syarif@lawavedesign.com', '081906096810', 'Tes', 'Jalur Nugraha Ekakurir (JNE) | (SPS) Super Speed', '66000', '8000000', 1600, '8066000', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00 00:00:00');

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
(7, '171492', 94, '7900000', 1, '7900000', 2),
(8, '171492', 93, '1600000', 2, '3200000', 4),
(9, '19796', 96, '8525000', 1, '8525000', 1200),
(10, '19796', 91, '130000', 3, '390000', 1),
(11, '176700', 93, '1600000', 2, '3200000', 4),
(12, '30016', 95, '8000000', 1, '8000000', 6),
(13, '30016', 91, '130000', 1, '130000', 1),
(14, '18312', 96, '8525000', 1, '8525000', 1200),
(15, '18312', 92, '19000000', 1, '19000000', 3),
(16, '45150', 96, '8525000', 1, '8525000', 1200),
(17, '45150', 97, '5200000', 1, '5200000', 1700),
(18, '45150', 91, '130000', 1, '130000', 200),
(19, '48048', 91, '130000', 29, '3770000', 200),
(20, '54320', 96, '8525000', 6, '51150000', 7200),
(21, '54320', 97, '5200000', 1, '5200000', 1700),
(22, '54320', 91, '130000', 2, '260000', 400),
(23, '52574', 96, '8525000', 1, '8525000', 1200),
(24, '17200', 92, '19000000', 1, '19000000', 1700),
(25, '11280', 96, '8525000', 1, '8525000', 1200),
(27, '35639', 97, '5200000', 1, '5200000', 1700),
(28, '83286', 92, '19000000', 1, '19000000', 1700),
(29, '83286', 93, '1600000', 1, '1600000', 2400),
(30, '69361', 95, '8000000', 1, '8000000', 1600),
(31, '26656', 96, '8525000', 1, '8525000', 1200),
(32, '38266', 95, '8000000', 1, '8000000', 1600),
(33, '38266', 97, '5200000', 1, '5200000', 1700),
(34, '47770', 92, '19000000', 1, '19000000', 1700),
(35, '107256', 93, '1600000', 1, '1600000', 2400),
(36, '9900', 96, '8525000', 1, '8525000', 1200),
(37, '30304', 95, '8000000', 1, '8000000', 1600),
(38, '30240', 93, '1600000', 1, '1600000', 2400),
(39, '122555', 95, '8000000', 1, '8000000', 1600),
(40, '71242', 92, '19000000', 1, '19000000', 1700),
(41, '61620', 92, '19000000', 1, '19000000', 1700),
(42, '51360', 95, '8000000', 1, '8000000', 1600);

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
(1, 'syarifsyabana', 'e6980d3379562a6b464ada71870793acb0d6b629', 'Syarif Syabana', 'muhamadsyarif8@gmail.com', 'owner', 'active', '', 'e6980d3379562a6b464ada71870793acb0d6b629');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lwd_article`
--
ALTER TABLE `lwd_article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `article_cat_id` (`article_cat_id`),
  ADD KEY `article_id_2` (`article_id`);

--
-- Indexes for table `lwd_article_cat`
--
ALTER TABLE `lwd_article_cat`
  ADD PRIMARY KEY (`article_cat_id`),
  ADD KEY `article_cat_id` (`article_cat_id`);

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
  ADD KEY `brand_id` (`brand_id`);

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
-- Indexes for table `lwd_statusprd`
--
ALTER TABLE `lwd_statusprd`
  ADD PRIMARY KEY (`statusprd_id`);

--
-- Indexes for table `lwd_subcat`
--
ALTER TABLE `lwd_subcat`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `category_id_2` (`category_id`);

--
-- Indexes for table `lwd_tag`
--
ALTER TABLE `lwd_tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `lwd_transaction`
--
ALTER TABLE `lwd_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `trans_status_id` (`trans_status_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lwd_article`
--
ALTER TABLE `lwd_article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `lwd_article_cat`
--
ALTER TABLE `lwd_article_cat`
  MODIFY `article_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `lwd_bank`
--
ALTER TABLE `lwd_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `lwd_banner`
--
ALTER TABLE `lwd_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lwd_brand`
--
ALTER TABLE `lwd_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `lwd_category`
--
ALTER TABLE `lwd_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
-- AUTO_INCREMENT for table `lwd_contact`
--
ALTER TABLE `lwd_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lwd_image`
--
ALTER TABLE `lwd_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
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
-- AUTO_INCREMENT for table `lwd_order`
--
ALTER TABLE `lwd_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `lwd_payment`
--
ALTER TABLE `lwd_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lwd_product`
--
ALTER TABLE `lwd_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
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
-- AUTO_INCREMENT for table `lwd_statusprd`
--
ALTER TABLE `lwd_statusprd`
  MODIFY `statusprd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lwd_subcat`
--
ALTER TABLE `lwd_subcat`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `lwd_tag`
--
ALTER TABLE `lwd_tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lwd_transaction`
--
ALTER TABLE `lwd_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `lwd_transaction_item`
--
ALTER TABLE `lwd_transaction_item`
  MODIFY `transaction_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
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
-- Constraints for dumped tables
--

--
-- Constraints for table `lwd_article`
--
ALTER TABLE `lwd_article`
  ADD CONSTRAINT `lwd_article_ibfk_1` FOREIGN KEY (`article_cat_id`) REFERENCES `lwd_article_cat` (`article_cat_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `lwd_product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `lwd_brand` (`brand_id`) ON UPDATE CASCADE;

--
-- Constraints for table `lwd_transaction`
--
ALTER TABLE `lwd_transaction`
  ADD CONSTRAINT `lwd_transaction_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `lwd_member` (`member_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lwd_transaction_ibfk_2` FOREIGN KEY (`trans_status_id`) REFERENCES `lwd_trans_status` (`trans_status_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
