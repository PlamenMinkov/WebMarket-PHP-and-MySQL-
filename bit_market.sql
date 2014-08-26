-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2014 at 10:36 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bit_market`
--
CREATE DATABASE IF NOT EXISTS `bit_market` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bit_market`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_name` varchar(30) NOT NULL,
  `product_price` float NOT NULL,
  `data` datetime NOT NULL,
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type` varchar(30) NOT NULL,
  `product_stock` varchar(30) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_stock` (`product_stock`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_name`, `product_price`, `data`, `product_id`, `product_type`, `product_stock`) VALUES
('Лак за нокти', 10, '2014-03-09 10:40:17', 26, 'Други', 'false'),
('Лак за нокти', 12, '2014-03-09 14:49:39', 28, 'Други', 'false'),
('Simens C25', 20, '2014-03-09 15:17:12', 29, 'Други', 'false'),
('Simens C25', 25, '2014-03-09 16:53:21', 30, 'Други', 'false'),
('Motorola T30', 20, '2014-03-10 06:28:50', 34, 'Други', 'false'),
('Simens C25', 30, '2014-03-10 13:24:11', 35, 'Храна', 'false'),
('Домашна рибка', 5, '2014-03-10 13:43:22', 38, 'Други', 'false'),
('Храна по домовете', 8, '2014-03-10 13:44:40', 39, 'Храна', 'false'),
('vdg', 54, '2014-03-13 07:49:13', 42, 'Храна', 'true'),
('frfr', 67, '2014-03-13 07:49:23', 43, 'Храна', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE IF NOT EXISTS `users_data` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(30) NOT NULL,
  `data_registered` datetime NOT NULL,
  `user/admin` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`user_id`, `user_name`, `user_pass`, `data_registered`, `user/admin`) VALUES
(18, 'Ivan', 'qwerty', '0000-00-00 00:00:00', 'user'),
(19, 'Ivan', 'qwerty', '0000-00-00 00:00:00', 'admin'),
(21, 'Jane', 'qwerty', '0000-00-00 00:00:00', 'user'),
(22, 'Яна', 'qwerty', '0000-00-00 00:00:00', 'user'),
(23, 'Tomas', 'qwerty', '0000-00-00 00:00:00', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE IF NOT EXISTS `user_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `user_products`
--

INSERT INTO `user_products` (`product_id`, `user_id`) VALUES
(26, 18),
(28, 18),
(30, 18),
(34, 18),
(35, 18),
(38, 18),
(39, 18),
(29, 23);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
