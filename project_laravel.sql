-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2016 at 10:23 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.6.23-1+deprecated+dontuse+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cates`
--

CREATE TABLE IF NOT EXISTS `cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cates_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `cates`
--

INSERT INTO `cates` (`id`, `name`, `alias`, `order`, `parent_id`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(24, 'Cate 1', 'cate-1', 123456789, 0, 'Cate 1', 'Cate 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Cate 2', 'cate-2', 123456789, 0, 'Cate 2', 'Cate 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Cate 2.1', 'cate-2.1', 123456789, 25, 'Cate 2.1', 'Cate 2.1\r\n            ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Cate 1.1', 'cate-1.1', 123456789, 24, 'Cate 1.1.1', 'Cate 1.1 update\r\n            \r\n            \r\n            \r\n            ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Cate 3', 'cate-3', 123456789, 0, 'Cate 3', 'Cate 3\r\n            ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Cate 3.1', 'cate-3.1', 123456789, 28, 'Cate 3.1', 'Cate 3.1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Cate 3.2', 'cate-3.2', 123456789, 28, 'Cate 3.2', 'Cate 3.2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Cate 3.3', 'cate-3.3', 123456789, 28, 'Cate 3.3', 'Cate 3.3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Áo', 'áo', 123, 0, 'Áo đẹp', 'Áo đẹp', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Áo phông', 'áo-phong', 123456789, 32, 'Áo phông đẹp', 'Áo phông đẹp\r\n            \r\n            ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_18_023710_create_cates_table', 2),
('2016_06_18_024845_create_table_cates', 3),
('2016_06_18_025044_create_products_table', 4),
('2016_06_18_030032_create_product_images_table', 5),
('2016_07_13_152037_create_abouts_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `intro` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `cate_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  KEY `products_user_id_foreign` (`user_id`),
  KEY `products_cate_id_foreign` (`cate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `intro`, `content`, `image`, `keywords`, `description`, `user_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(17, 'Quần Jean 1 new', 'quan-jean-1-new', 150, '<p>Quần Jean 1</p>\r\n', '<p>Quần Jean 1</p>\r\n', 'jean8.jpeg', 'Quần Jean 1', '                                                Quần Jean 1\r\n            \r\n            \r\n            ', 4, 24, '2016-06-25 23:41:26', '2016-07-01 23:41:49'),
(18, 'Quần Jean 3', 'quan-jean-3', 155, '<p>Quần Jean 3</p>\r\n', '<p>Quần Jean 3</p>\r\n', 'jean.jpeg', 'Quần Jean 3', '                Quần Jean 3\r\n            ', 4, 29, '2016-07-01 23:27:39', '2016-07-01 23:41:56'),
(19, 'Quần Jean 2', 'quan-jean-2', 160, '<p>Quần Jean 2</p>\r\n', '<p>Quần Jean 2</p>\r\n', 'jean2.jpeg', 'Quần Jean 2', '                Quần Jean 2\r\n            ', 4, 26, '2016-07-01 23:28:37', '2016-07-01 23:42:05'),
(20, 'Quần Jean 1', 'quan-jean-1', 165, '<p>Quần Jean 1</p>\r\n', '<p>Quần Jean 1</p>\r\n', 'jean3.jpg', 'Quần Jean 1', '                                Quần Jean 1\r\n            \r\n            ', 4, 27, '2016-07-01 23:29:19', '2016-07-01 23:42:11'),
(21, 'Quần Jean 1.1 đẹp', 'quan-jean-1.1-dep', 180, '<p>Quần Jean 1.1 đẹp</p>\r\n', '<p>Quần Jean 1.1 đẹp</p>\r\n', 'jean4.jpeg', 'Quần Jean 1.1 đẹp', 'Quần Jean 1.1 đẹp', 4, 27, '2016-07-02 02:33:45', '2016-07-02 02:33:45'),
(22, 'Quần Jean 1.1.2 đẹp', 'quan-jean-1.1.2-dep', 180, '<p>Quần Jean 1.1.2 đẹp</p>\r\n', '<p>Quần Jean 1.1.2 đẹp</p>\r\n', 'jean5.jpeg', 'Quần Jean 1.1.2 đẹp', 'Quần Jean 1.1.2 đẹp', 4, 27, '2016-07-02 02:34:11', '2016-07-02 02:34:11'),
(23, 'Quần Jean 1.1.3 đẹp', 'quan-jean-1.1.3-dep', 185, '<p>Quần Jean 1.1.3 đẹp</p>\r\n', '<p>Quần Jean 1.1.3 đẹp</p>\r\n', 'jean6.jpeg', '', 'Quần Jean 1.1.3 đẹp', 4, 27, '2016-07-02 02:34:57', '2016-07-02 02:34:57'),
(24, 'Quần Jean 1.1.4 đẹp', 'quan-jean-1.1.4-dep', 185, '<p>Quần Jean 1.1.4 đẹp</p>\r\n', '<p>Quần Jean 1.1.4 đẹp</p>\r\n', 'jean7.jpg', 'Quần Jean 1.1.4 đẹp', 'Quần Jean 1.1.4 đẹp', 4, 27, '2016-07-02 02:35:17', '2016-07-02 02:35:17'),
(25, 'Áo phông Bò Sữa', 'áo-phong-bo-sua', 200, '<p style="text-align:center">&Aacute;o ph&ocirc;ng B&ograve; Sữa</p>\r\n', '<p><strong>&Aacute;o ph&ocirc;ng B&ograve; Sữa</strong></p>\r\n', 'ao1.jpeg', 'Áo phông Bò Sữa', '                                                Áo phông Bò Sữa new\r\n            \r\n            \r\n            ', 10, 33, '2016-07-04 01:38:42', '2016-07-04 01:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(40, 'ijean5.jpg', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'ijean6.jpg', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'ijean7.jpg', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'ijean1.jpg', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'ijean2.jpg', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'ijean3.jpg', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'ijean4.jpg', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'iao2.jpg', 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'iao6.jpg', 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'adminVIP@gmail.com', '$2y$10$K8rmJ9wR6TW0VOx04Ag1TuKAylojWM.H95sxJ4VM8SYtQ4MfqXqC.', 1, 'EwULvWSNL2Mi0YXL8yx6gM0sQ7Izw3WcoTfwgv2GrQ5FVbUyJ9qDCfOQY85O', '0000-00-00 00:00:00', '2016-06-25 20:24:29'),
(4, 'admin5', 'admin5.1000@gmail.com', '$2y$10$im2yySD4MbEaItlIlgEP1uhGZYQprVvQq1TACHKTM4Vk4Yl.TFIvS', 1, 'NThJVBFY8G5nfhzWeXMatFx8mVYApYzniAKxLbcIg4Fl3RASO1TrACkkJnWR', '2016-06-24 23:11:40', '2016-07-04 01:35:04'),
(8, 'member3', 'member3.556@gmail.com', '$2y$10$lca2AyB4lvgxK/XelQnVsOhzCOz/WXLr6L6L1UcciRGilzzpCED5S', 2, 'QbxL3G3bg6DoYU19NMkXm6Ms8zBBcRHbjgsNvHOa', '2016-06-25 08:39:33', '2016-06-25 20:23:58'),
(9, 'member4', 'member4@gmail.com', '$2y$10$HtvelZ/gKA5Yv/ATYvybk.otNvlGhGUQjr8TlBZycxxzN6K.wgn9m', 1, 'm4AZHCTpuGLaw2hAJIqQIdcORTDOtuTNBZbZSQU8', '2016-06-25 20:23:23', '2016-07-04 01:34:55'),
(10, 'admin6', 'admin6@gmail.com', '$2y$10$bXSB/7ETZZ56.O9cGG8z0OIVB.14ljwO.8/WmK8u441JDTBJ29uLq', 1, 'QYYoJZWltoLNJfqgvoEKvYdxw8dAPajq0Fbi0JCuTzrNn1n4V5Bp399x6lEi', '2016-07-04 01:34:25', '2016-07-13 08:04:42');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
