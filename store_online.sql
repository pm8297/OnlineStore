-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 03:46 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(1, 'ULTRABOOTS', 'Adidas-Ultra-Boost-4-0.jpg'),
(2, 'NMD', 'Adidas-NMD-R1-red.jpg'),
(3, 'EQT', 'Adidas-EQT-BOA-white.jpg'),
(4, 'ALPHA', 'Adidas-Alphaboots-blue.jpg'),
(5, 'SENSEBOOTS', 'Adidas-Senseboots-yellow.jpg'),
(6, 'Footlball', ''),
(7, 'Training', ''),
(8, 'Basketball', ''),
(9, 'Tennis', ''),
(10, 'Originals', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comm_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `comm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_date` datetime NOT NULL,
  `comm_details` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comm_id`, `prd_id`, `comm_name`, `comm_mail`, `comm_date`, `comm_details`) VALUES
(1, 6, 'Mỹ', 'pm8297@gmail.com', '2019-12-12 15:47:41', 'perfect shoes ever !!!'),
(2, 6, 'Phạm Anh Mỹ', 'ha@gmail.com', '2019-12-12 15:48:10', '123123'),
(3, 6, 'phạm anh mỹ', 'admin@gmail.com', '2019-12-12 15:48:51', 'nice shoes'),
(4, 11, 'phạm anh mỹ', 'pam12@gmail.com', '2019-12-13 17:45:54', 'So nice perfect !!');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prd_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_price` int(11) UNSIGNED NOT NULL,
  `prd_warranty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_accessories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_new` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_promotion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_status` int(1) NOT NULL,
  `prd_featured` int(1) NOT NULL,
  `prd_details` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `cat_id`, `prd_name`, `prd_image`, `prd_price`, `prd_warranty`, `prd_accessories`, `prd_new`, `prd_promotion`, `prd_status`, `prd_featured`, `prd_details`) VALUES
(1, 1, 'ULTRABOOTS S&L SHOES', 'Adidas-Ultra-Boost-4-0.jpg', 180, '3 days', 'Fullbox', 'New', 'Discount 30%', 1, 1, 'Updating...'),
(2, 1, 'ULTRABOOTS S&L SHOES', 'Adidas-Ultra-Boost-Triple-Black.jpg', 180, '3 days', 'Fullbox', 'NEW', 'Discount 30%', 1, 1, 'Updating'),
(3, 1, 'ULTRABOOTS 19 BLACK SHOES', 'Adidas-Ultra-Boots-19-black.jpg', 180, '3 days', 'Fullbox', 'NEW', 'Discount 30%', 1, 1, 'Updating'),
(4, 1, 'ULTRABOOTS 19 BLUE SHOES', 'Adidas-Ultra-Boots-19-blue.jpg', 180, '3 days', 'Fullbox', 'NEW', 'Discount 30%', 1, 0, 'Updating'),
(5, 1, 'ULTRABOOTS 19 GREY SHOES', 'Adidas-Ultra-Boots-19-grey.jpg', 180, '3 days', 'Fullbox', 'NEW', 'Discount 30%', 1, 0, 'Updating'),
(6, 1, 'ULTRABOOTS MTL SHOES', 'Adidas-Ultra-Boots-MTL-black.jpg', 180, '3 days', 'Fullbox', 'NEW', 'Discount 30%', 1, 1, 'Updating...'),
(7, 1, 'ULTRABOOTS MTL SHOES', 'Adidas-Ultra-Boots-MTL-grey.jpg', 180, '3 days', 'Fullbox', 'NEW', 'Discount 30%', 1, 0, 'Updating...'),
(8, 1, 'ULTRABOOTS SHOES', 'Adidas-Ultra-Boots-Shoes-black.jpg', 180, '3 days', 'Fullbox', 'NEW', 'Discount 30%', 2, 1, 'Updating...'),
(9, 1, 'ULTRABOOTS SHOES', 'Adidas-Ultra-Boots-Shoes-blue.jpg', 180, '3 days', 'Fullbox', 'NEW', 'Discount 30%', 1, 0, 'Updating...'),
(10, 2, 'NMD R1 SHOES', 'Adidas-NMD-R1-black.jpg', 130, '3 days', 'Fullbox', 'NEW', 'Discount 20%', 1, 1, 'Updating...'),
(11, 2, 'NMD R1 SHOES', 'Adidas-NMD-R1-pink.jpg', 130, '3 days', 'Fullbox', 'NEW', 'Discount 20%', 1, 1, 'Updating...'),
(12, 2, 'NMD R1 SHOES', 'Adidas-NMD-R1-red.jpg', 130, '3 days', 'Fullbox', 'NEW', 'Discount 20%', 2, 1, 'Updating...'),
(13, 2, 'NMD R1 SHOES', 'Adidas-NMD-R1-white.jpg', 130, '3 days', 'Fullbox', 'NEW', 'Discount 20%', 1, 1, 'Updating...'),
(14, 2, 'NMD CS1 PRIMEKNIT SHOES', 'Adidas-NMD-Primeknit-black.jpg', 220, '3 days', 'Fullbox', 'NEW', 'Discount 20%', 1, 1, 'Updating...'),
(15, 2, 'NMD CS1 PRIMEKNIT SHOES', 'Adidas-NMD-Primeknit-white.jpg', 220, '3 days', 'Fullbox', 'NEW', 'Discount 20%', 1, 1, 'Updating...'),
(16, 3, 'EQT PRIMEKNIT SHOES', 'Adidas-EQT-Primeknit-black.jpg', 160, '3 days', 'Fullbox', 'NEW', 'Discount 15%', 1, 1, 'Updating...'),
(17, 3, 'TOUR360 EQT BOA SHOES', 'Adidas-EQT-BOA-black.jpg', 230, '3 days', 'Fullbox', 'NEW', 'Discount 15%', 1, 1, 'Updating...'),
(18, 3, 'TOUR360 EQT BOA SHOES', 'Adidas-EQT-BOA-blue.jpg', 230, '3 days', 'Fullbox', 'NEW', 'Discount 15%', 1, 0, 'Updating...'),
(19, 3, 'TOUR360 EQT BOA SHOES', 'Adidas-EQT-BOA-white.jpg', 230, '3 days', 'Fullbox', 'NEW', 'Discount 15%', 0, 0, 'Updating...'),
(20, 4, 'ALPHABOOTS SHOES', 'Adidas-Alphaboots-black.jpg', 120, '3 days', 'Fullbox', 'NEW', 'Discount 10%', 1, 1, 'Updating...'),
(21, 4, 'ALPHABOOTS SHOES', 'Adidas-Alphaboots-blue.jpg', 120, '3 days', 'Fullbox', 'NEW', 'Discount 10%', 1, 0, 'Updating...'),
(22, 4, 'ALPHABOOTS SHOES', 'Adidas-Alphaboots-grey.jpg', 120, '3 days', 'Fullbox', 'NEW', 'Discount 10%', 1, 0, 'Updating...'),
(23, 4, 'ALPHABOOTS SHOES', 'Adidas-Alphaboots-white.jpg', 120, '3 days', 'Fullbox', 'NEW', 'Discount 10%', 0, 1, 'Updating...'),
(24, 4, 'ALPHABOUNCE RC 2.0 SHOES', 'Adidas-AlphaBounce-blue.jpg', 80, '3 days', 'Fullbox', 'NEW', 'Discount 10%', 0, 1, 'Updating...'),
(25, 4, 'ALPHABOUNCE RC 2.0 SHOES', 'Adidas-AlphaBounce-white.jpg', 80, '3 days', 'Fullbox', 'NEW', 'Discount 10%', 1, 1, 'Updating...'),
(26, 4, 'ALPHABOUNCE CC SHOES', 'Adidas-AlphaBounce-CC-black.jpg', 120, '3 days', 'Fullbox', 'NEW', 'Discount 10%', 1, 1, 'Updating...'),
(27, 4, 'ALPHABOUNCE CC SHOES', 'Adidas-AlphaBounce-CC-bluegrey.jpg', 120, '3 days', 'Fullbox', 'NEW', 'Discount 10%', 1, 0, 'Updating...'),
(28, 5, 'SENSEBOOTS GO SHOES', 'Adidas-Senseboots-grey.jpg', 120, '3 days', 'Fullbox', 'NEW', 'Discount 10%', 1, 0, 'Updating...'),
(29, 5, 'SENSEBOOTS GO SHOES', 'Adidas-Senseboots-white.jpg', 120, '3 days', 'Fullbox', 'NEW', 'Discount 5%', 1, 0, 'Updating...'),
(30, 5, 'SENSEBOOTS GO SHOES', 'Adidas-Senseboots-yellow.jpg', 120, '3 days', 'Fullbox', 'NEW', 'Discount 5%', 1, 1, 'Updating...'),
(38, 4, 'Adidas Alphabounce White', 'Adidas-AlphaBounce-white.jpg', 120, '3 days', 'Fullbox', 'New 100%', 'Discount 5%', 2, 1, 'ádsad'),
(39, 4, 'Adidas Alphabounce White BLack', 'Adidas-AlphaBounce-CC-bluegrey.jpg', 120, '3 days', 'Fullbox', 'New', '50%', 1, 0, 'ĐẸP');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `slider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `cat_id`, `slider_name`, `slider_image`, `slider_description`) VALUES
(1, 2, 'slide 1', 'slide-1.png', 'Chương trinh khuyến mãi Samsung'),
(2, 2, 'slide 2', 'slide-2.png', 'Chương trinh khuyến mãi Samsung'),
(3, 2, 'slide 3', 'slide-3.png', 'Chương trình khuyến mãi Samsung'),
(4, 1, 'slide 4', 'slide-4.png', 'Chương trinh khuyến mãi Iphone'),
(5, 7, 'slide 5', 'slide-5.png', 'Chương trình khuyến mãi Oppo'),
(31, 7, 'slide ewe', 'slide-8.png', 'gaming121212');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_full`, `user_mail`, `user_pass`, `user_level`) VALUES
(1, 'Administrator', 'admin@gmail.com', '123456', 1),
(2, 'Alex', 'alex@gmail.com', '123456', 0),
(3, 'Tony', 'tony@gmail.com', '123456', 0),
(5, 'phạm anh mỹ', 'pam@gmail.com', '111', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
