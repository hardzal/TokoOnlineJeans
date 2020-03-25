-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 25, 2020 at 03:17 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_jeans`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

DROP TABLE IF EXISTS `catalogs`;
CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `permalink` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `description`, `permalink`, `created_at`, `updated_at`) VALUES
(4, 'Jeans Pria', 'Jeans untuk Pria', 'jeans-pria', '2020-03-09 10:32:36', NULL),
(3, 'Female Jeans', 'Jeans untuk Wanita', 'jeans-wanita', '2020-02-14 09:41:19', '2020-02-24 02:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
CREATE TABLE IF NOT EXISTS `collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `catalog_id` (`catalog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `catalog_id`, `code`, `name`, `img`, `description`, `price`, `stock`, `type`, `permalink`, `created_at`, `updated_at`) VALUES
(18, 4, 'zFqPLV', 'Jeans Laki Laki Terbaik', 'jeans-1585058365.jfif', 'Celana cowok!', 3000000, 25, 1, 'Jeans-Laki-Laki-Terbaik', '2020-03-24 06:59:25', NULL),
(17, 3, 'JrYYL9', 'Jeans Acak Kadut', 'tngeorgia_jeans_in_mid_wash_denim-1585058289.jpg', 'Model acak kadut eii', 30000, 63, 0, 'Jeans-Acak-Kadut', '2020-03-24 06:58:09', NULL);

--
-- Triggers `collections`
--
DROP TRIGGER IF EXISTS `trigger_collection_sizes`;
DELIMITER $$
CREATE TRIGGER `trigger_collection_sizes` AFTER DELETE ON `collections` FOR EACH ROW DELETE FROM collection_sizes WHERE collection_id = OLD.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `collection_sizes`
--

DROP TABLE IF EXISTS `collection_sizes`;
CREATE TABLE IF NOT EXISTS `collection_sizes` (
  `collection_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  KEY `fk_collectionsizes` (`collection_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection_sizes`
--

INSERT INTO `collection_sizes` (`collection_id`, `size_id`, `stock`) VALUES
(18, 5, 2),
(18, 4, 4),
(18, 3, 9),
(18, 2, 7),
(18, 1, 3),
(17, 1, 5),
(17, 2, 10),
(17, 3, 35),
(17, 4, 10),
(17, 5, 3);

--
-- Triggers `collection_sizes`
--
DROP TRIGGER IF EXISTS `update_stock`;
DELIMITER $$
CREATE TRIGGER `update_stock` AFTER UPDATE ON `collection_sizes` FOR EACH ROW UPDATE collections SET stock = stock - NEW.stock WHERE collections.id = NEW.collection_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `collection_tags`
--

DROP TABLE IF EXISTS `collection_tags`;
CREATE TABLE IF NOT EXISTS `collection_tags` (
  `collection_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(3, 'Apakah besok hari senin?', 'Iya, kenapa? Pasti bisa kan', NULL, '2020-02-26 08:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collection_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `collection_id` (`collection_id`),
  KEY `user_id` (`user_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `address` text,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethods`
--

DROP TABLE IF EXISTS `paymentmethods`;
CREATE TABLE IF NOT EXISTS `paymentmethods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `paymentMethod_id` int(11) NOT NULL,
  `paymentCode` varchar(255) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `picture` text,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paymentMethod_id` (`paymentMethod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@denim.com', '$2y$10$T4wgNRL./nADK9CQZ7Tj9e/4ctg9PNv3oe3V8GGI062CzQBjG7EsK', '2020-02-06 15:35:19', NULL),
(2, 2, 'customer', 'customer@gmail.com', '$2y$10$61Zv0lgFlE9sN8vMLigvZeMC2sKpAAikBshCclshoNNNXrOBsHe3K', '2020-02-06 15:35:19', NULL),
(5, 2, 'rahmat', 'rahmat@gmail.com', '$2y$10$Wuu9H/FloP5BNh.5iSW4wephLDx2JsfXxgLT0AUhJw0kDkc/u1u7q', '2020-02-10 08:31:03', '2020-02-25 00:25:07'),
(6, 2, 'first_customer', 'first_customer@gmail.com', '$2y$10$2i77gKt7wllhTCACeAUKdeq2hqVO4/y.qkjmlozBHSHwdp.fk0pr2', '2020-02-24 07:20:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `picture`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `telp`) VALUES
(2, 5, 'default.jpg', 'Rahmat Zumarli', 'L', 'jalan catur tunggal', '023191031212'),
(3, 6, 'default.jpg', 'First Customer', 'L', 'Jalan KH Agus Salim', '08781389321');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-02-06 15:32:48', NULL),
(2, 'customer', '2020-02-06 15:32:48', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
