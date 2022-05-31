-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2022 at 10:51 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19007564_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`) VALUES
(1, 5, 'withinsoul', 500, 3),
(7, 7, 'withinsoul', 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `pay_meth` varchar(200) NOT NULL,
  `ship_meth` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `postal` varchar(200) NOT NULL,
  `total_products` varchar(200) NOT NULL,
  `total_price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `number`, `pay_meth`, `ship_meth`, `address`, `postal`, `total_products`, `total_price`) VALUES
(5, 6, 'Pol', 'Podhhe', 'credit card', 'kerry', 'Ufirnjfid', 'Urifhbifhfk', 'withinsoul (1) ', 500),
(6, 4, 'Spol', 'jgh', 'cash on delivery', 'ems', 'jhgjdgy', 'jtyjytdj', 'withinsoul (4) ', 2000),
(7, 7, 'Korawit', '0959519971', 'cash on delivery', 'ems', '1259/30', '10510', 'withinsoul (1) ', 500),
(8, 7, 'd', '0959519971', 'credit card', 'ems', 'l', '10510', 'withinsoul (1) ', 500),
(9, 9, 'Spol', '1265456', 'credit card', 'kerry', 'yewrty', 'ygerthfsrgdh', 'withinsoul (5) ', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1, 'withinsoul', 500);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`) VALUES
(4, 'Spol', 'pon@cbs.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 'sorn', 'SSS@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'Polll', 'pol@cbs.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'minmin2001', 'korawitmin@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(8, 'Usertest', 'User@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(9, 'James', 'James@cbs.chula.ac.th', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
