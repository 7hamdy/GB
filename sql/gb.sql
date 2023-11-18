-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 01:55 PM
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
-- Database: `gb`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `content` text NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `title`, `content`, `name`, `email`) VALUES
(1, 'iphone 13', 'the product is very good', 'Mohamed', 'mohamedhamdy357@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `desc` text NOT NULL,
  `img` varchar(150) NOT NULL,
  `available` tinyint(4) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `desc`, `img`, `available`, `user_id`, `price`) VALUES
(2, 'iphone 14', 'iPhone 13 Full Specs and price. A15 Bionic is Up to 50% faster CPU & Up to 30% faster graphics than the competition. Dual 12MP camera system with new Wide ...', '207f88018f72237565570f8a9e5ca2401698306195og__smc3haxsdn2q_specs.png', 1, 1, 40000),
(3, 'Laptop Mac ', 'Our most powerful laptops, supercharged by M1 and M2 chips. Featuring Magic Keyboard, Touch Bar, Touch ID, and brilliant Retina display.\r\n', 'e205ee2a5de471a70c1fd1b46033a75f1698306245macbook-pro-13-og-202005.jpg', 1, 1, 150000),
(4, 'iphone 12', 'iPhone 12 Full Specs and price. A15 Bionic is Up to 50% faster CPU & Up to 30% faster graphics than the competition. Dual 12MP camera system with new Wide ...	', '0004d0b59e19461ff126e3a08a814c331698306277og__smc3haxsdn2q_specs.png', 1, 1, 30000),
(5, 'labtop', 'Our most powerful laptops, supercharged by M1 and M2 chips. Featuring Magic Keyboard, Touch Bar, Touch ID, and brilliant Retina display.	', '6d9c547cf146054a5a720606a76944671698306305macbook-pro-13-og-202005.jpg', 1, 1, 14444),
(6, 'iphone 11', 'iPhone 11 Full Specs and price. A15 Bionic is Up to 50% faster CPU & Up to 30% faster graphics than the competition. Dual 12MP camera system with new Wide .', 'e8c0653fea13f91bf3c48159f7c24f781698306366og__smc3haxsdn2q_specs.png', 1, 1, 140000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `pass`, `email`) VALUES
(1, 'admin', '123', 'mohamedhamdy357@gmail.com'),
(2, 'ali', '123', 'ali6898@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userData_idx` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `userData` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
