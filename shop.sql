-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 10:21 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminID` varchar(70) NOT NULL,
  `sellerID` varchar(70) NOT NULL,
  `adminName` varchar(70) NOT NULL,
  `userType` varchar(70) NOT NULL,
  `accountType` varchar(70) NOT NULL,
  `adminPassword` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminID`, `sellerID`, `adminName`, `userType`, `accountType`, `adminPassword`, `date`) VALUES
(1, 'ad61a35bcbbf9f1', '61a35b27c3a99adm21', 'admin', 'seller', 'main_admin', '8cb2237d0679ca88db6464eac60da96345513964', '2021-11-28 10:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userID` varchar(70) NOT NULL,
  `sellerID` varchar(70) NOT NULL,
  `productID` varchar(70) NOT NULL,
  `productImg` text NOT NULL,
  `productName` varchar(70) NOT NULL,
  `productPrice` varchar(70) NOT NULL,
  `productQty` varchar(70) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `productID` varchar(70) NOT NULL,
  `productImg` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `productID`, `productImg`, `date`) VALUES
(1, 'wom61a36323033f5', 'img-pro-02.jpg', '2021-11-28 11:08:19'),
(2, 'wom61a36323033f5', 'product-image2.jpg', '2021-11-28 11:08:19'),
(3, 'wom61a36323033f5', 'product-image4-1.jpg', '2021-11-28 11:08:19'),
(4, 'men61a363e37b533', 'img-pro-01.jpg', '2021-11-28 11:11:31'),
(5, 'men61a363e37b533', 'product-image6.jpg', '2021-11-28 11:11:31'),
(6, 'mac61a365804490c', 'g_img3.jpg', '2021-11-28 11:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `productproperties`
--

CREATE TABLE `productproperties` (
  `id` int(11) NOT NULL,
  `productID` varchar(70) NOT NULL,
  `pant1` varchar(70) NOT NULL,
  `pant2` varchar(70) NOT NULL,
  `pant3` varchar(70) NOT NULL,
  `pant4` varchar(70) NOT NULL,
  `shirt1` varchar(70) NOT NULL,
  `shirt2` varchar(70) NOT NULL,
  `shirt3` varchar(70) NOT NULL,
  `shirt4` varchar(70) NOT NULL,
  `shoe1` varchar(70) NOT NULL,
  `shoe2` varchar(70) NOT NULL,
  `shoe3` varchar(70) NOT NULL,
  `shoe4` varchar(70) NOT NULL,
  `storage1` varchar(70) NOT NULL,
  `storage2` varchar(70) NOT NULL,
  `storage3` varchar(70) NOT NULL,
  `storage4` varchar(70) NOT NULL,
  `color1` varchar(70) NOT NULL,
  `color2` varchar(70) NOT NULL,
  `color3` varchar(70) NOT NULL,
  `color4` varchar(70) NOT NULL,
  `RAM` varchar(70) NOT NULL,
  `screen` varchar(70) NOT NULL,
  `processorType` varchar(70) NOT NULL,
  `storageType` varchar(70) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productproperties`
--

INSERT INTO `productproperties` (`id`, `productID`, `pant1`, `pant2`, `pant3`, `pant4`, `shirt1`, `shirt2`, `shirt3`, `shirt4`, `shoe1`, `shoe2`, `shoe3`, `shoe4`, `storage1`, `storage2`, `storage3`, `storage4`, `color1`, `color2`, `color3`, `color4`, `RAM`, `screen`, `processorType`, `storageType`, `date`) VALUES
(1, 'wom61a36323033f5', '', '', '', '', 'm', 's', '', '', '', '', '', '', '', '', '', '', 'black', 'white', 'orange', '', '', '', '', '', '2021-11-28 11:08:19'),
(2, 'men61a363e37b533', '', '', '', '', 'm', 'l', '', '', '', '', '', '', '', '', '', '', 'white', 'black', '', '', '', '', '', '', '2021-11-28 11:11:31'),
(3, 'mac61a365804490c', '', '', '', '', '', '', '', '', '', '', '', '', '1000', '', '', '', 'black', 'silver', '', '', '24', '14', 'core i3', 'SSD', '2021-11-28 11:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sellerID` varchar(70) NOT NULL,
  `productID` varchar(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` varchar(100) NOT NULL,
  `productQty` varchar(100) NOT NULL,
  `productUser` varchar(100) NOT NULL,
  `productCat` varchar(100) NOT NULL,
  `productType` varchar(100) NOT NULL,
  `productBrand` varchar(100) NOT NULL,
  `new` varchar(100) NOT NULL,
  `feature` varchar(100) NOT NULL,
  `productDesc` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sellerID`, `productID`, `productName`, `productPrice`, `productQty`, `productUser`, `productCat`, `productType`, `productBrand`, `new`, `feature`, `productDesc`, `date`) VALUES
(1, '61a35b27c3a99adm21', 'wom61a36323033f5', 'women party wear', '500', '45', 'female', 'cloths', 'shirts', 'gucci', 'new', 'no', 'dfsafnsaclksafjefncslkcnwljncsa;lkcklfnewfksab;ewjfew\r\nwjflehflsnjf;pqhfeihdpwfhwpifhewf\r\nwjdeofhrewogiwhef', '2021-11-28 11:08:19'),
(2, '61a2214504984alh21', 'men61a363e37b533', 'men suit', '400', '25', 'male', 'cloths', 'suits', 'gucci', 'no', 'featured', 'saflsahffoihasofheifladhgiuiuewgfliudshfewiheugfqwurgeryuge\r\nfejeigiuwgfiurgfiuegiurgiequgfyiugefdjhgfuewgowegriuew', '2021-11-28 11:11:31'),
(3, '61a2214504984alh21', 'mac61a365804490c', 'mac book pro', '80000', '54', '', 'computer', 'laptops', 'apple', 'no', 'no', 'dsfdsgfhwaiuhisudagirghewigruwegrwuryegrer\r\nwqhrefwfjdsbccviwruhgfbds vkdhfiurewhuef\r\nfewohiehfkhvoewigiewehfirohgoehorhor', '2021-11-28 11:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `userID` varchar(70) NOT NULL,
  `firstName` varchar(70) NOT NULL,
  `lastName` varchar(70) NOT NULL,
  `phoneNumber` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `resAddress` text NOT NULL,
  `city` varchar(70) NOT NULL,
  `country` varchar(70) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `userID`, `firstName`, `lastName`, `phoneNumber`, `email`, `resAddress`, `city`, `country`, `date`) VALUES
(1, 'al21ab61b60fa9d3e28', 'alhassan', 'abdul-rahim', '0248823752', 'alhassan@gmail.com', 'bilpela 513 maligu street tamale', 'tamale', 'ghana', '2021-12-12 23:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `userorders`
--

CREATE TABLE `userorders` (
  `id` int(11) NOT NULL,
  `userID` varchar(70) NOT NULL,
  `firstName` varchar(70) NOT NULL,
  `lastName` varchar(70) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userAddress` varchar(70) NOT NULL,
  `userPhone` varchar(70) NOT NULL,
  `city` varchar(70) NOT NULL,
  `country` varchar(70) NOT NULL,
  `sellerID` varchar(70) NOT NULL,
  `transactionID` varchar(70) NOT NULL,
  `productID` varchar(70) NOT NULL,
  `productImg` varchar(100) NOT NULL,
  `productName` varchar(70) NOT NULL,
  `productPrice` varchar(70) NOT NULL,
  `productQuantity` varchar(70) NOT NULL,
  `totalPrice` varchar(70) NOT NULL,
  `transactionStatus` varchar(70) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userorders`
--

INSERT INTO `userorders` (`id`, `userID`, `firstName`, `lastName`, `userEmail`, `userAddress`, `userPhone`, `city`, `country`, `sellerID`, `transactionID`, `productID`, `productImg`, `productName`, `productPrice`, `productQuantity`, `totalPrice`, `transactionStatus`, `date`) VALUES
(1, 'al21ab61b60fa9d3e28', '', '', '', '', '', '', '', '', '', 'wom61a36323033f5', 'img-pro-02.jpg', 'women party wear', '500', '4', '2000', '', '2021-12-18 10:03:07'),
(2, 'al21ab61b60fa9d3e28', '', '', '', '', '', '', '', '', '', 'men61a363e37b533', 'img-pro-01.jpg', 'men suit', '400', '4', '1600', '', '2021-12-18 10:03:07'),
(3, 'al21ab61b60fa9d3e28', '', '', '', '', '', '', '', '', '', 'mac61a365804490c', 'g_img3.jpg', 'mac book pro', '80000', '6', '480000', '', '2021-12-18 10:03:07'),
(4, 'al21ab61b60fa9d3e28', '', '', '', '', '', '', '', '', '', 'wom61a36323033f5', 'img-pro-02.jpg', 'women party wear', '500', '4', '2000', '', '2021-12-18 10:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userID` varchar(70) NOT NULL,
  `sellerID` varchar(70) NOT NULL,
  `firstName` varchar(70) NOT NULL,
  `lastName` varchar(70) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `gender` varchar(70) NOT NULL,
  `userType` varchar(70) NOT NULL,
  `sellerStatus` varchar(70) NOT NULL,
  `userPhone` varchar(70) NOT NULL,
  `country` varchar(70) NOT NULL,
  `userPassword` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userID`, `sellerID`, `firstName`, `lastName`, `userEmail`, `gender`, `userType`, `sellerStatus`, `userPhone`, `country`, `userPassword`, `date`) VALUES
(1, 'al21ab61b60fa9d3e28', '', 'alhassan', 'abdul-rahim', 'alhassan@gmail.com', 'male', 'customer', 'inactive', '0248823752', 'ghana', '8cb2237d0679ca88db6464eac60da96345513964', '2021-12-12 15:05:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productproperties`
--
ALTER TABLE `productproperties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userorders`
--
ALTER TABLE `userorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productproperties`
--
ALTER TABLE `productproperties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userorders`
--
ALTER TABLE `userorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
