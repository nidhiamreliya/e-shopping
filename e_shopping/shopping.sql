-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2016 at 06:44 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(5) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(4, 'rings'),
(5, 'nacklaces'),
(6, 'bangles'),
(10, 'earings'),
(12, 'watches');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `shipping_cost` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `category_id` int(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `product_price` int(5) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category_id`, `description`, `product_price`, `product_img`) VALUES
(25, 'ring123', 4, 'diomand ring with 18 carret gold', 2000, '25.png'),
(26, 'ring124', 4, 'diomand ring', 2500, '26.jpg'),
(27, 'ring125', 4, 'blue diomand ring', 3000, '27.jpg'),
(28, 'ring127', 4, 'ring with real dimond', 5000, '28.jpg'),
(29, 'nacklace110', 5, '18 carret gold', 10000, '29.png'),
(30, 'nacklace111', 5, '18 carret gold with diomands', 50000, '30.jpg'),
(31, 'nacklace112', 5, '18 carret diomands', 50000, '31.jpg'),
(32, 'nacklace113', 5, 'jfhfjfjf', 50000, '32.jpg'),
(33, 'bangle147', 6, 'gold bangles', 10000, '33.jpg'),
(34, 'bangle148', 6, '18 carret gold', 20000, '34.jpg'),
(35, 'bangle149', 6, '18 carret gold with pink dimonds', 40000, '35.jpg'),
(36, 'earing110', 10, 'diomand', 2000, '36.jpg'),
(37, 'earing115', 10, 'real diomands', 3000, '37.jpg'),
(38, 'earing118', 10, 'diomand with blue', 3000, '38.jpg'),
(39, 'goldwatch', 12, '12 carret gold watch', 50000, '39.jpg'),
(40, 'watche555', 12, 'gold with diomand', 60000, '40.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `privilege` int(2) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_id` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contect_no` bigint(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` bigint(6) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_id` (`email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `privilege`, `first_name`, `last_name`, `email_id`, `password`, `contect_no`, `address`, `city`, `zip_code`, `state`, `country`) VALUES
(1, 2, 'Admin', 'admin', 'admin@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 1234567890, '-', 'rajkot', 360789, 'gujrat', 'india'),
(2, 1, 'nidhi', 'amreliya', 'nidhi@gmail.com', 'd97b4583f619f9ab521aafd2d6f98e87', 1478520963, 'add1', 'rajkot', 250070, 'gujarat', 'india'),
(3, 1, 'nirali', 'rayani', 'nirali@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 4561230987, 'rajkot', 'rajkot', 360008, 'gujrat', 'india'),
(4, 1, 'mehul', 'limbasiya', 'mehul@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 7894125630, 'address', 'rajkot', 350008, 'gujrat', 'india'),
(5, 1, 'namrata', 'dobariya', 'namrata@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 1478523690, 'blanck', 'rajkot', 360005, 'GUJRAT', 'india');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
