-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 09:43 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(2, 'dat', 'dat@gmail.com', 'datadmin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Degrey'),
(2, 'Swe'),
(3, 'Dirtycoin'),
(6, 'Bobui');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `getsize` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`, `getsize`) VALUES
(54, 1, '9efskmp63uk3khf3cf1fudo504', 'sp1', '130000', 1, '6012bb35ce.jpg', ''),
(55, 1, '9efskmp63uk3khf3cf1fudo504', 'sp1', '130000', 1, '6012bb35ce.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(2, 'Ão thun'),
(3, 'Ã¡o khoÃ¡c'),
(4, 'quáº§n jeans'),
(5, 'quáº§n kaki'),
(6, 'Ã¡o sweater'),
(15, 'degrey'),
(9, 'Ão thun'),
(10, 'Ã¡o khoÃ¡c'),
(11, 'quáº§n jeans'),
(12, 'quáº§n kaki'),
(13, 'Ã¡o sweater'),
(14, 'Ão thun');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(1, 'dat', 'njiohcsf943', 'hcm', 'hn', '700000', '0968573521', 'dat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'hoang', '294/fasoi', 'hcm', 'dn', '700000', '0483274958', 'hoang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(33, 2, 'sp2', 2, 1, '130000', 'b1e974e727.jpg', 0, '2020-12-22 04:25:10'),
(32, 2, 'sp2', 2, 1, '130000', 'b1e974e727.jpg', 0, '2020-12-22 04:22:40'),
(31, 5, 'sp4', 2, 1, '200000', 'cd6b599f4f.jpg', 0, '2020-12-22 04:22:40'),
(30, 1, 'sp1', 2, 4, '520000', '6012bb35ce.jpg', 0, '2020-12-22 04:21:28'),
(29, 2, 'sp2', 2, 2, '260000', 'b1e974e727.jpg', 0, '2020-12-22 04:21:28'),
(28, 1, 'sp1', 2, 1, '130000', '6012bb35ce.jpg', 0, '2020-12-22 04:18:39'),
(27, 1, 'sp1', 2, 1, '130000', '6012bb35ce.jpg', 0, '2020-12-22 04:18:22'),
(34, 7, 'pants', 2, 1, '100000', 'bbf04246ee.jpg', 0, '2020-12-22 04:27:54'),
(35, 1, 'sp1', 2, 1, '130000', '6012bb35ce.jpg', 0, '2020-12-22 04:36:38'),
(36, 2, 'sp2', 2, 2, '260000', 'b1e974e727.jpg', 0, '2020-12-22 04:38:52'),
(37, 2, 'sp2', 2, 1, '130000', 'b1e974e727.jpg', 0, '2020-12-22 04:54:30'),
(38, 1, 'sp1', 2, 3, '390000', '6012bb35ce.jpg', 0, '2020-12-22 04:54:30'),
(39, 2, 'sp2', 2, 1, '130000', 'b1e974e727.jpg', 0, '2020-12-22 04:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(1, 'sp1\'', 14, 3, '<p>rtryunjttgjioefeferjvbodiguvberjkbfewlhfcoihewroiufrgwergoherio</p>', 0, '130000', '6012bb35ce.jpg'),
(2, 'sp2', 14, 3, '<p>wdfghmj,gmhngbfvd</p>', 0, '130000', 'b1e974e727.jpg'),
(4, 'sp3', 14, 1, '<p>dfgfhgjhthgfdgves</p>', 1, '230000', '06a9dfcc72.jpg'),
(5, 'sp4', 14, 3, '<p>fififipodsoospods</p>', 0, '200000', 'cd6b599f4f.jpg'),
(6, 'sp4', 14, 2, '<p>fkfkfoso9sfyv7vifor</p>', 1, '400000', '5607aba20e.jpg'),
(7, 'pants', 12, 2, '<p>fidqwkjlopvuvdsfjk</p>', 0, '100000', 'bbf04246ee.jpg'),
(8, 'sp4', 14, 3, '<p>&egrave;ihoigdcower4</p>', 0, '333333333', '26e04a1ed6.jpg'),
(10, 'sp5', 14, 6, '<p>áº¡khveiá»³pocdvnfbvl&igrave;e</p>', 0, '500000', '622d1968bb.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
