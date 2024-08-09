-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 05:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_famiecare_doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `item_count` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `id` int(11) NOT NULL,
  `category_name` varchar(128) NOT NULL,
  `active` int(11) NOT NULL,
  `doi` timestamp NOT NULL DEFAULT current_timestamp(),
  `dou` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_pic` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`id`, `category_name`, `active`, `doi`, `dou`, `category_pic`) VALUES
(1, 'beverages', 1, '2023-03-16 08:21:21', '2023-03-16 08:21:21', 'assets/images/categories_images/fruit.png'),
(2, 'cleaning', 1, '2023-03-16 08:21:37', '2023-03-16 08:21:37', 'assets/images/categories_images/oil.png'),
(3, 'dairy', 1, '2023-03-16 08:21:45', '2023-03-16 08:21:45', 'assets/images/categories_images/bakery.png'),
(4, 'foodgrains', 1, '2023-03-16 08:21:54', '2023-03-16 08:21:54', 'assets/images/categories_images/dairy.png'),
(5, 'milk', 1, '2023-03-16 08:22:01', '2023-03-16 08:22:01', 'assets/images/categories_images/fruit.png'),
(6, 'personal', 1, '2023-03-16 08:22:10', '2023-03-16 08:22:10', 'assets/images/categories_images/fruit.png'),
(7, 'hh', 0, '2023-04-10 03:06:28', '2023-04-10 03:06:28', NULL),
(8, 'hh1', 0, '2023-04-10 03:06:39', '2023-04-10 03:06:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_table`
--

CREATE TABLE `complaint_table` (
  `id` int(11) NOT NULL,
  `complaint` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `doi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dou` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complaint_table`
--

INSERT INTO `complaint_table` (`id`, `complaint`, `user_id`, `active`, `doi`, `dou`) VALUES
(1, 'Bad product', 1, 0, '2023-02-15 16:13:43', '2023-02-15 16:13:43'),
(2, 'Bad product 2', 1, 1, '2023-02-15 16:13:43', '2023-02-15 16:13:43'),
(4, 'gfcfhf', 1, 1, '2023-04-03 13:23:52', '2023-04-03 13:23:52'),
(5, 'cgjhg', 4, 1, '2023-04-05 13:30:39', '2023-04-05 13:30:39'),
(6, 'ewrwe', 1, 1, '2023-04-07 09:24:04', '2023-04-07 09:24:04'),
(7, 'ssa', 4, 1, '2023-04-10 03:32:56', '2023-04-10 03:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_table`
--

CREATE TABLE `feedback_table` (
  `id` int(11) NOT NULL,
  `feedback` longtext NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `doi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dou` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback_table`
--

INSERT INTO `feedback_table` (`id`, `feedback`, `active`, `user_id`, `doi`, `dou`) VALUES
(1, 'Nice product.', 1, 1, '2023-02-15 16:05:58', '2023-02-15 16:05:58'),
(2, 'Nice product 2', 1, 1, '2023-02-15 16:05:58', '2023-02-15 16:05:58'),
(3, 'Nice product 3', 1, 1, '2023-02-15 16:05:58', '2023-02-15 16:05:58'),
(4, 'asaasa', 1, 1, '2023-04-03 09:02:43', '2023-04-03 09:02:43'),
(5, 'fgbfgbdsgfg', 1, 1, '2023-04-03 09:04:10', '2023-04-03 09:04:10'),
(6, 'csswecw', 1, 1, '2023-04-03 09:07:36', '2023-04-03 09:07:36'),
(7, 'sdsd', 1, 1, '2023-04-03 09:08:21', '2023-04-03 09:08:21'),
(8, 'cscsc', 1, 1, '2023-04-03 09:15:09', '2023-04-03 09:15:09'),
(9, 'cwcwe', 1, 1, '2023-04-03 09:15:57', '2023-04-03 09:15:57'),
(10, 'dsdsd', 1, 1, '2023-04-03 09:33:53', '2023-04-03 09:33:53'),
(11, 'aman', 1, 1, '2023-04-03 13:07:17', '2023-04-03 13:07:17'),
(12, 'amana', 1, 1, '2023-04-03 13:07:36', '2023-04-03 13:07:36'),
(13, 'asasa', 1, 1, '2023-04-03 13:08:26', '2023-04-03 13:08:26'),
(14, 'ce', 1, 1, '2023-04-03 13:09:49', '2023-04-03 13:09:49'),
(15, 'dvcsedv', 1, 1, '2023-04-03 13:16:45', '2023-04-03 13:16:45'),
(16, 'abc', 1, 1, '2023-04-04 05:40:20', '2023-04-04 05:40:20'),
(17, 'brxfc', 1, 1, '2023-04-04 05:41:40', '2023-04-04 05:41:40'),
(18, 'ffb gb', 1, 1, '2023-04-04 05:42:41', '2023-04-04 05:42:41'),
(19, 'vxdxd', 1, 1, '2023-04-04 05:51:54', '2023-04-04 05:51:54'),
(20, '', 1, 1, '2023-04-04 10:00:04', '2023-04-04 10:00:04'),
(21, '', 1, 1, '2023-04-05 13:24:01', '2023-04-05 13:24:01'),
(22, 'qwd', 1, 4, '2023-04-05 13:26:47', '2023-04-05 13:26:47'),
(23, 'gyyg', 1, 4, '2023-04-05 13:27:35', '2023-04-05 13:27:35'),
(24, 'ererte', 1, 1, '2023-04-07 09:23:57', '2023-04-07 09:23:57'),
(25, 'ewdqw', 1, 1, '2023-04-07 09:24:08', '2023-04-07 09:24:08'),
(26, 'this is message ', 1, 1, '2023-04-07 12:43:09', '2023-04-07 12:43:09'),
(27, 'sdfsdsddsfd', 1, 1, '2023-04-07 12:49:23', '2023-04-07 12:49:23'),
(28, 'dfgfdgdfgd', 1, 1, '2023-04-07 12:50:21', '2023-04-07 12:50:21'),
(29, 'fghfgfg', 1, 1, '2023-04-07 12:51:16', '2023-04-07 12:51:16'),
(30, 'sffgdfgdf', 1, 1, '2023-04-07 12:53:03', '2023-04-07 12:53:03'),
(31, 'sdfsfsdf', 1, 1, '2023-04-07 12:56:03', '2023-04-07 12:56:03'),
(32, '', 1, 1, '2023-04-09 13:22:06', '2023-04-09 13:22:06'),
(33, 'DADASDDSA', 1, 4, '2023-04-10 03:32:51', '2023-04-10 03:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `doi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `user_id`, `product_id`, `category_id`, `subcategory_id`, `active`, `doi`, `dou`) VALUES
(1, 1, 1, 1, 1, 1, '2023-02-19 04:48:04', '2023-02-19 04:48:04'),
(2, 1, 1, 1, 1, 1, '2023-02-19 05:44:11', '2023-02-19 05:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE `payment_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `doi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dou` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_table`
--

INSERT INTO `payment_table` (`id`, `user_id`, `order_id`, `product_name`, `amount`, `active`, `status`, `doi`, `dou`) VALUES
(1, 1, 1, 'milk', 500, 1, 0, '2023-04-08 10:39:06', '2023-02-19 04:44:49'),
(2, 1, 2, 'khari', 1000, 1, 1, '2023-04-06 04:30:58', '2023-02-19 04:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_pic` varchar(256) DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `doi` timestamp NOT NULL DEFAULT current_timestamp(),
  `dou` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`id`, `product_name`, `product_pic`, `product_price`, `active`, `category_id`, `subcategory_id`, `doi`, `dou`, `product_description`) VALUES
(1, 'coolberge', 'img/upload/products/pic/1681037015coolberge.jpg', 200, 1, 1, 1, '2023-03-16 08:27:04', '2023-03-16 08:27:04', 'soft drink '),
(2, 'herbalife_energydrink', 'img/upload/products/pic/1680938260herbalife_energydrink.jpg', 250, 1, 1, 2, '2023-03-16 08:47:27', '2023-03-16 08:47:27', 'energy drink'),
(3, 'hurricane_drink', 'img/upload/products/pic/1680945783hurricane_drink.jpg', 50, 1, 1, 2, '2023-03-16 08:50:14', '2023-03-16 08:50:14', 'soft drink'),
(4, 'maza', 'img/upload/products/pic/1681037039maza.jpg', 50, 1, 1, 1, '2023-03-16 08:53:27', '2023-03-16 08:53:27', 'rasile carry ka maza maaza bole,,,'),
(5, 'red_bull', 'img/upload/products/pic/1681037054red_bull.jpg', 200, 1, 1, 1, '2023-03-16 08:54:15', '2023-03-16 08:54:15', 'energy drink '),
(6, 'sepoy', 'img/upload/products/pic/1681037066sepoy.jpg', 100, 1, 1, 1, '2023-03-16 08:54:58', '2023-03-16 08:54:58', 'soft drink'),
(7, 'thumbs_up', 'img/upload/products/pic/1681037079thumbs_up.jpg', 40, 1, 1, 1, '2023-03-16 08:55:30', '2023-03-16 08:55:30', 'tuffani'),
(8, 'dabur_tea1', 'img/upload/products/pic/1681037103dabur_tea1.jpg', 150, 1, 1, 2, '2023-03-16 08:56:16', '2023-03-16 08:56:16', 'dabur tea'),
(9, 'nestea_icedtea', 'img/upload/products/pic/1681037115nestea_icedtea.jpg', 250, 1, 1, 2, '2023-03-16 08:56:52', '2023-03-16 08:56:52', 'special tea'),
(10, 'redlabel_tea', 'img/upload/products/pic/1681037130redlabel_tea.jpg', 350, 1, 1, 2, '2023-03-16 08:57:30', '2023-03-16 08:57:30', 'tea'),
(11, 'tajmahal_tea', 'img/upload/products/pic/1681037150tajmahal_tea.jpg', 450, 1, 1, 2, '2023-03-16 08:58:10', '2023-03-16 08:58:10', 'waah taj'),
(12, 'tata_agnitea', 'img/upload/products/pic/1681037165tata_agnitea.jpg', 100, 1, 1, 2, '2023-03-16 08:58:43', '2023-03-16 08:58:43', 'tata agni'),
(13, 'fan_cleaning', 'img/upload/products/pic/1681037201fan_cleaning.jpg', 800, 1, 2, 3, '2023-03-16 08:59:27', '2023-03-16 08:59:27', 'fan cleaning'),
(14, 'floor_cleaning', 'img/upload/products/pic/1681037219floor_cleaning.jpg', 150, 1, 2, 3, '2023-03-16 09:00:05', '2023-03-16 09:00:05', 'floor cleaning'),
(15, 'kitchen_cleaning', 'img/upload/products/pic/1681037235kitchen_cleaning.jpg', 350, 1, 2, 3, '2023-03-16 09:00:36', '2023-03-16 09:00:36', 'kitchen cleaning'),
(16, 'mop', 'img/upload/products/pic/1681037250mop.jpg', 900, 1, 2, 3, '2023-03-16 09:01:00', '2023-03-16 09:01:00', 'mop'),
(17, 'wiper', 'img/upload/products/pic/1681037267wiper.jpg', 200, 1, 2, 3, '2023-03-16 09:01:35', '2023-03-16 09:01:35', 'water cleaning'),
(18, 'active_white', 'img/upload/products/pic/1681037286active_white.jpg', 30, 1, 2, 4, '2023-03-16 09:02:40', '2023-03-16 09:02:40', 'cloth cleaner'),
(19, 'ariel', 'img/upload/products/pic/1681037298ariel.jpg', 60, 1, 2, 4, '2023-03-16 09:03:06', '2023-03-16 09:03:06', 'cloth cleaner'),
(20, 'ezee', 'img/upload/products/pic/1681037314ezee.jpg', 90, 1, 2, 3, '2023-03-16 09:03:38', '2023-03-16 09:03:38', 'cloth cleaner'),
(21, 'ghadi_detergent', 'img/upload/products/pic/1681037327ghadi_detergent.jpg', 25, 1, 2, 4, '2023-03-16 09:04:17', '2023-03-16 09:04:17', 'cloth cleaner'),
(22, 'rin', 'img/upload/products/pic/1681037353rin.jpg', 40, 1, 2, 4, '2023-03-16 09:04:45', '2023-03-16 09:04:45', 'cloth cleaner'),
(23, 'amul_butter', 'img/upload/products/pic/1681037373amul_butter.jpg', 40, 1, 3, 5, '2023-03-16 09:05:27', '2023-03-16 09:05:27', 'amul butter'),
(24, 'amul_cheese', 'img/upload/products/pic/1681037389amul_cheese.jpg', 150, 1, 3, 5, '2023-03-16 09:06:03', '2023-03-16 09:06:03', 'amul cheese'),
(25, 'go_pizza_cheese', 'img/upload/products/pic/1681037407go_pizza_cheese.jpg', 125, 1, 3, 5, '2023-03-16 09:06:45', '2023-03-16 09:06:45', 'pizza cheese'),
(26, 'milky_mist', 'img/upload/products/pic/1681037425milky_mist.jpg', 200, 1, 3, 5, '2023-03-16 09:16:50', '2023-03-16 09:16:50', 'milky mist'),
(27, 'amul_chcocolatecookies', 'img/upload/products/pic/1681037446amul_chcocolatecookies.jpg', 220, 1, 3, 6, '2023-03-16 09:17:37', '2023-03-16 09:17:37', 'amul chocolate cookies'),
(28, 'blue_train_butter_khaari', 'img/upload/products/pic/1681037460blue_train_butter_khaari.jpg', 70, 1, 3, 6, '2023-03-16 09:18:12', '2023-03-16 09:18:12', 'khari'),
(29, 'cadbury_cookies', 'img/upload/products/pic/1681037473cadbury_cookies.jpg', 320, 1, 3, 6, '2023-03-16 09:18:57', '2023-03-16 09:18:57', 'cadbury cookies'),
(30, 'dark_fantasy', 'img/upload/products/pic/1681037488dark_fantasy.jpg', 100, 1, 3, 6, '2023-03-16 09:21:43', '2023-03-16 09:21:43', 'dark fantasy'),
(31, 'oreo_buscuites', 'img/upload/products/pic/1679723098oreo.jpg', 40, 1, 3, 6, '2023-03-16 09:22:29', '2023-03-16 09:22:29', 'oreo buscuits'),
(32, 'polka_khaari', 'img/upload/products/pic/1681037505polka_khaari.jpg', 150, 1, 3, 6, '2023-03-16 09:26:46', '2023-03-16 09:26:46', 'polka khari'),
(33, '24_mantra_organic', 'img/upload/products/pic/168103753124_mantra_organic.jpg', 600, 1, 4, 7, '2023-03-16 09:28:20', '2023-03-16 09:28:20', 'organic atta'),
(34, 'aashrivaad_organic_atta', 'img/upload/products/pic/1681037547aashrivaad_organic_atta.jpg', 500, 1, 4, 7, '2023-03-16 09:28:55', '2023-03-16 09:28:55', 'aashirvad organic atta'),
(35, 'fortune_chakkifresh_atta', 'img/upload/products/pic/1681037563fortune_chakkifresh_atta.jpg', 750, 1, 4, 7, '2023-03-16 09:29:33', '2023-03-16 09:29:33', 'chakkifresh atta'),
(36, 'safe_harvest_atta', 'img/upload/products/pic/1681037581safe_harvest_atta.jpg', 200, 1, 4, 7, '2023-03-16 09:31:22', '2023-03-16 09:31:22', 'safe harvest atta'),
(37, 'ankur_oil', 'img/upload/products/pic/1681037596ankur_oil.jpg', 2800, 1, 4, 8, '2023-03-16 09:32:03', '2023-03-16 09:32:03', 'ankur oil'),
(38, 'gulab_gold_oil', 'img/upload/products/pic/1681037615gulab_gold_oil.jpg', 3500, 1, 4, 8, '2023-03-16 09:32:34', '2023-03-16 09:32:34', 'gulab oil'),
(39, 'parachute_coconut_oil', 'img/upload/products/pic/1681037637parachute_coconut_oil.jpg', 1500, 1, 4, 8, '2023-03-16 09:33:12', '2023-03-16 09:33:12', 'parachute coconute oil'),
(40, 'saffola_gold_oil', 'img/upload/products/pic/1681037658saffola_gold_oil.jpg', 4500, 1, 4, 8, '2023-03-16 09:34:26', '2023-03-16 09:34:26', 'saffola gold '),
(41, 'a+_nestle_milk', 'img/upload/products/pic/1681037678a+_nestle_milk.jpg', 200, 1, 5, 9, '2023-03-16 09:35:33', '2023-03-16 09:35:33', 'nestle milk'),
(42, 'almond_milk', 'img/upload/products/pic/1681037692almond_milk.jpg', 100, 1, 5, 9, '2023-03-16 09:36:08', '2023-03-16 09:36:08', 'almond milk '),
(43, 'amul_gold', 'img/upload/products/pic/1681037708amul_gold.jpg', 30, 1, 5, 9, '2023-03-16 09:36:44', '2023-03-16 09:36:44', 'amul gold'),
(44, 'amul_taaza', 'img/upload/products/pic/1681037724amul_taaza.jpg', 25, 1, 5, 9, '2023-03-16 09:37:35', '2023-03-16 09:37:35', 'amul taaaza'),
(45, 'courtyyard_goatmilk', 'img/upload/products/pic/1681037741courtyyard_goatmilk.jpg', 150, 1, 5, 9, '2023-03-16 09:39:26', '2023-03-16 09:39:26', 'courtyyard goat milk'),
(46, 'everyday_dairy_milkpowder', 'img/upload/products/pic/1681037772everyday_dairy_milkpowder.jpg', 300, 1, 5, 10, '2023-03-16 09:40:15', '2023-03-16 09:40:15', 'everyday milk powder'),
(47, 'gavyratan_milk_powder', 'img/upload/products/pic/1681037786gavyratan_milk_powder.jpg', 500, 1, 5, 10, '2023-03-16 09:40:50', '2023-03-16 09:40:50', 'milk powder'),
(48, 'monch_milkpowder', 'img/upload/products/pic/1681037797monch_milkpowder.jpg', 200, 1, 5, 10, '2023-03-16 09:41:23', '2023-03-16 09:41:23', 'milk powder'),
(49, 'patangali_milkpowder', 'img/upload/products/pic/1681037810patangali_milkpowder.jpg', 150, 1, 5, 10, '2023-03-16 09:41:58', '2023-03-16 09:41:58', 'patanjali milk powder'),
(50, 'aer_spray_room', 'img/upload/products/pic/1681037833aer_spray_room.jpg', 450, 1, 6, 11, '2023-03-16 09:42:57', '2023-03-16 09:42:57', 'aer spray '),
(51, 'axe_deodrant', 'img/upload/products/pic/1681037859axe_deodrant.jpg', 200, 1, 6, 11, '2023-03-16 09:43:43', '2023-03-16 09:43:43', 'axe '),
(52, 'denver_deo', 'img/upload/products/pic/1681037872denver_deo.jpg', 0, 1, 6, 11, '2023-03-16 09:44:37', '2023-03-16 09:44:37', 'denver '),
(53, 'fogg_deo', 'img/upload/products/pic/1681037889fogg_deo.jpg', 450, 1, 6, 11, '2023-03-16 09:45:04', '2023-03-16 09:45:04', 'fogg deo'),
(54, 'menjwell_musky_chandan', 'img/upload/products/pic/1681037907menjwell_musky_chandan.jpg', 177, 1, 6, 11, '2023-03-16 09:45:45', '2023-03-16 09:45:45', 'chandan agarbatti'),
(55, 'miniso_scent', 'img/upload/products/pic/1681037924miniso_scent.jpg', 300, 1, 6, 11, '2023-03-16 09:46:38', '2023-03-16 09:46:38', 'scent'),
(56, 'parag_dhoop', 'img/upload/products/pic/1681037940parag_dhoop.jpg', 200, 1, 6, 11, '2023-03-16 09:47:15', '2023-03-16 09:47:15', 'dhoop '),
(57, 'bajaj_almond_hairoil', 'img/upload/products/pic/1681037958bajaj_almond_hairoil.jpg', 155, 1, 6, 12, '2023-03-16 09:47:55', '2023-03-16 09:47:55', 'bajaj oil'),
(58, 'beardo_shampoo', 'img/upload/products/pic/1681037971beardo_shampoo.jpg', 275, 1, 6, 12, '2023-03-16 09:48:34', '2023-03-16 09:48:34', 'beardo shampoo'),
(59, 'clinic_plus_shampoo', 'img/upload/products/pic/1681037988clinic_plus_shampoo.jpg', 125, 1, 6, 12, '2023-03-16 09:49:15', '2023-03-16 09:49:15', 'clinic plus shampoo'),
(60, 'indulekha_hairoil', 'img/upload/products/pic/1681038002indulekha_hairoil.jpg', 240, 1, 6, 12, '2023-03-16 09:49:59', '2023-03-16 09:49:59', 'indulekha hair oil'),
(61, 'navratna_oil', 'img/upload/products/pic/1681038018navratna_oil.jpg', 110, 1, 6, 12, '2023-03-16 09:50:32', '2023-03-16 09:50:32', 'navratna oil'),
(62, 'acv', 'img/upload/products/pic/1680615763key.png', 123, 1, 1, 1, '2023-04-04 13:42:43', '2023-04-04 13:42:43', 'dvdfvvfv'),
(63, 'qq1', 'img/upload/products/pic/1681096206beardo_shampoo.jpg', 123, 0, 8, 14, '2023-04-10 03:08:49', '2023-04-10 03:08:49', 'ssddsadd');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_table`
--

CREATE TABLE `subcategory_table` (
  `id` int(11) NOT NULL,
  `subcategory_name` varchar(256) NOT NULL,
  `category_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `doi` timestamp NOT NULL DEFAULT current_timestamp(),
  `dou` timestamp NOT NULL DEFAULT current_timestamp(),
  `subcategory_pic` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subcategory_table`
--

INSERT INTO `subcategory_table` (`id`, `subcategory_name`, `category_id`, `active`, `doi`, `dou`, `subcategory_pic`) VALUES
(1, 'soft drinks', 1, 1, '2023-03-16 08:22:54', '2023-03-16 08:22:54', 'assets/images/categories_images/fruit.png'),
(2, 'tea', 1, 1, '2023-03-16 08:23:06', '2023-03-16 08:23:06', 'assets/images/categories_images/fruit.png'),
(3, 'bathroomware', 2, 1, '2023-03-16 08:23:20', '2023-03-16 08:23:20', 'assets/images/categories_images/fruit.png'),
(4, 'detergent', 2, 1, '2023-03-16 08:23:32', '2023-03-16 08:23:32', 'assets/images/categories_images/fruit.png'),
(5, 'buttter cheese', 3, 1, '2023-03-16 08:23:52', '2023-03-16 08:23:52', 'assets/images/categories_images/fruit.png'),
(6, 'cookies khari', 3, 1, '2023-03-16 08:24:07', '2023-03-16 08:24:07', 'assets/images/categories_images/fruit.png'),
(7, 'atta', 4, 1, '2023-03-16 08:24:19', '2023-03-16 08:24:19', 'assets/images/categories_images/fruit.png'),
(8, 'oil', 4, 1, '2023-03-16 08:24:27', '2023-03-16 08:24:27', 'assets/images/categories_images/fruit.png'),
(9, 'amul milk', 5, 1, '2023-03-16 08:24:42', '2023-03-16 08:24:42', 'assets/images/categories_images/fruit.png'),
(10, 'milk powder', 5, 1, '2023-03-16 08:24:54', '2023-03-16 08:24:54', 'assets/images/categories_images/fruit.png'),
(11, 'fregnance deos', 6, 1, '2023-03-16 08:25:16', '2023-03-16 08:25:16', 'assets/images/categories_images/fruit.png'),
(12, 'hair care', 6, 1, '2023-03-16 08:25:26', '2023-03-16 08:25:26', 'assets/images/categories_images/fruit.png'),
(13, 'gg1', 8, 0, '2023-04-10 03:07:08', '2023-04-10 03:07:08', NULL),
(14, 'gg1', 8, 0, '2023-04-10 03:07:59', '2023-04-10 03:07:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `gender` int(11) NOT NULL,
  `address` longtext NOT NULL,
  `doi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dou` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile_no`, `gender`, `address`, `doi`, `dou`, `active`, `user_type`) VALUES
(1, 'mohil', 'patel1', 'pmohil138@gmail.com', 'bW8jaWxAMTM4', '', 1, 'dfgfd', '2023-04-10 03:14:06', '2023-02-04 03:40:56', 1, 1),
(2, 'mohil', 'patel1', 'pmohil1381@gmail.com', '12', '81602973487', 1, '', '2023-04-09 13:10:04', '2023-02-04 03:40:56', 0, 1),
(3, 'Aman', 'Sheth', 'amansheth@gmail.com', 'aman', '9265446175', 1, '', '2023-04-09 13:10:37', '2023-02-15 15:42:25', 1, 1),
(4, 'a', 'w', 'a@a.c', '123', '69', 0, '', '2023-04-09 13:10:43', '2023-04-05 11:54:17', 0, 3),
(5, 'gg', 'hh', 'var@gmail.com', '69', '96', 0, 'trrr errewfffdsfreefwdasaddasdasdads', '2023-04-10 03:06:10', '2023-04-10 03:06:10', 1, 1),
(63, '1', '1', 'a@A.A', '1', '1', 0, '1', '2023-04-10 03:35:01', '2023-04-10 03:35:01', 0, 2),
(64, '1', '1', 'a@A.CAAAAAAAAA', '22334', '11111111', 0, '1', '2023-04-10 03:35:46', '2023-04-10 03:35:46', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertype_table`
--

CREATE TABLE `usertype_table` (
  `id` int(5) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usertype_table`
--

INSERT INTO `usertype_table` (`id`, `type_name`, `isactive`) VALUES
(1, 'admin', 1),
(2, 'customer', 1),
(3, 'delivery person', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_table`
--
ALTER TABLE `complaint_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_table`
--
ALTER TABLE `feedback_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory_table`
--
ALTER TABLE `subcategory_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype_table`
--
ALTER TABLE `usertype_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complaint_table`
--
ALTER TABLE `complaint_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback_table`
--
ALTER TABLE `feedback_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_table`
--
ALTER TABLE `payment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `subcategory_table`
--
ALTER TABLE `subcategory_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `usertype_table`
--
ALTER TABLE `usertype_table`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
