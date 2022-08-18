-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 29, 2022 at 06:10 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corner`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE IF NOT EXISTS `admin_table` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(6, 'krishna', 'krishnamenan007@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_title`) VALUES
(22, 'UNIVERSAL'),
(21, 'ROYAL ENFIELD'),
(20, 'HONDA'),
(19, 'YAMAHA'),
(18, 'BAJAJ'),
(17, 'TVS');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

DROP TABLE IF EXISTS `cart_details`;
CREATE TABLE IF NOT EXISTS `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(9, 'Honda Dio Head light cowl stickers (Both side)', 'Original Sticker. Print Material: High Quality 3M Vinyl. Surface Finish:Gloss. Product Quality: Aftermarket Premium Brand. Screen Printed With Japanese Inks And Curated With UV coating treatment.', 'Honda,Dio,Stickers,headlight', 20, 'Web capture_28-7-2022_13121_www.daraz.lk.jpeg', 'Web capture_28-7-2022_13158_www.daraz.lk.jpeg', 'Web capture_28-7-2022_1311_www.daraz.lk.jpeg', '710', '2022-07-28 07:35:42', 'true'),
(10, 'CBR Turn Signal light Indicator Dark Smoke Gray Fit For CBR250 MC 22 CBR400 NC29 ', 'Material: ABS Plastic. Lens Color: Dark Smoke Gray. For CBR250 MC 22 CBR400 NC29 NSR250 NC21 NC28 CBR250 MC22 CBR 400 250 NSR 250', 'signal,CBR250,CBR400,honda', 20, 'Web capture_28-7-2022_13635_www.daraz.lk.jpeg', 'Web capture_28-7-2022_13712_www.daraz.lk.jpeg', 'Web capture_28-7-2022_13659_www.daraz.lk.jpeg', '3200', '2022-07-28 07:51:08', 'true'),
(11, 'PCX Handle Grips for your Honda Dio Handle Bar', 'Genuine Handle Grips. Honda PCX Handle Grips  125cc/ 150cc. Old Model year 2010-2013  One Pair. Easy Installation. Flexible and more soft to your Controlling and gripping', 'pair,honda,handle,grips', 20, 'Web capture_28-7-2022_201629_www.daraz.lk.jpeg', 'Web capture_28-7-2022_201642_www.daraz.lk.jpeg', 'Web capture_28-7-2022_201656_www.daraz.lk.jpeg', '1100', '2022-07-28 14:48:30', 'true'),
(12, 'Honda Dio Bike Belt', 'Good quality ,Best quality ,Best price Genuine belt. High performance and longer durability. One year guranteened protection for your engine.', 'belt,dio,honda', 20, 'Web capture_28-7-2022_202013_www.daraz.lk.jpeg', 'Web capture_28-7-2022_20227_www.daraz.lk.jpeg', 'Web capture_28-7-2022_202154_www.daraz.lk.jpeg', '5200', '2022-07-28 14:53:33', 'true'),
(13, 'Fireflys Wheel Valve Cap for Motorcycle', 'Brand new and high quality. Tire valve cap lights screw onto the valve stem of your motorcycle. Universal fitment and easy to install no special wires, can be easily installed and removed.', 'valve,cap', 22, 'Web capture_28-7-2022_20262_www.daraz.lk.jpeg', 'Web capture_28-7-2022_202621_www.daraz.lk.jpeg', 'Web capture_28-7-2022_202638_www.daraz.lk.jpeg', '480', '2022-07-28 14:58:10', 'true'),
(14, 'Unbreakable Windscreen/Wind Deflector Yamaha ', 'Brand New Small Bubble visor fit ALL BIKES. Easy To install Without Instruction. Not a direct fit product, some alterations required. High quality ABS plastic to ensure its sturdy and durable nature.', 'windscreen', 19, 'Web capture_28-7-2022_202911_www.daraz.lk.jpeg', 'Web capture_28-7-2022_202924_www.daraz.lk.jpeg', 'Web capture_28-7-2022_202942_www.daraz.lk.jpeg', '1700', '2022-07-28 15:01:08', 'true'),
(15, 'New Motorcycle Rear View Mirror Fit For All Bikes ', ' rear view mirrors are life saver of all the times are those main components of your bike through which a clear 180 degree view is achieved.  also saves your bike in traffic.', 'mirror,rear view', 22, 'Web capture_28-7-2022_203225_www.daraz.lk.jpeg', 'Web capture_28-7-2022_203237_www.daraz.lk.jpeg', 'Web capture_28-7-2022_203252_www.daraz.lk.jpeg', '1350', '2022-07-28 15:04:29', 'true'),
(16, 'Universal Adjustable Aluminum Alloy Motorcycle Balance Cross Handlebar', 'Strengthen handle more firmly. With thickening aluminium alloy and anodizing coloring. The length can be adjusted easily, convenient to install.', 'handlebar', 22, 'Web capture_28-7-2022_203456_www.daraz.lk.jpeg', 'Web capture_28-7-2022_203510_www.daraz.lk.jpeg', 'Web capture_28-7-2022_203524_www.daraz.lk.jpeg', '990', '2022-07-28 15:06:24', 'true'),
(17, 'Bike Motor bike Half Glove Nuckle Kawasaki Black free size', 'Ergonomic design with protective hard shell. 3D breathable mesh fabric, comfortable to wear. Curved finger design, fits your hands much more perfectly', 'gloves', 22, 'Web capture_20-7-2022_194835_www.daraz.lk.jpeg', 'Web capture_20-7-2022_194857_www.daraz.lk.jpeg', 'Web capture_20-7-2022_194920_www.daraz.lk.jpeg', '1567', '2022-07-28 15:08:23', 'true'),
(18, 'Break & Clutch Lever Set', 'Products can be installed and use without modification, easy to install, no installation instructions. Anodizing, not easy to fade and will not rust. The appearance of the fashion design, excellent technology is more suitable for your bike.', 'lever,clutch', 19, 'Web capture_20-7-2022_195253_www.daraz.lk.jpeg', 'Web capture_20-7-2022_19537_www.daraz.lk.jpeg', 'Web capture_20-7-2022_195321_www.daraz.lk.jpeg', '1780', '2022-07-28 15:10:32', 'true'),
(19, 'ROYAL ENFIELD CD 125 CM 125 CLASSIC BIKE STICKER', 'Slowly removed the paper backing making sure that your decal remains stuck to the clear transfer tape. If part of your decal lifts up with the backing, press the paper backing back down against it until it stays stuck to the transfer tape.', 'sticker,RE', 21, 'Web capture_28-7-2022_204154_www.daraz.lk.jpeg', 'Web capture_28-7-2022_204211_www.daraz.lk.jpeg', 'Web capture_28-7-2022_204138_www.daraz.lk.jpeg', '1750', '2022-07-28 15:13:04', 'true'),
(20, 'Black Rear Wheel Damper for Royal Enfield', 'Extend the life of your chain and sprockets.Fit for Honda VT750 DC C CD Easy installation. 100% Brand New with High Quality Perfect match for the original equipment. Color: Black Material: Rubber', 'sprocket,rubber', 21, 'Web capture_28-7-2022_204752_www.daraz.lk.jpeg', 'Web capture_28-7-2022_204816_www.daraz.lk.jpeg', 'Web capture_28-7-2022_20483_www.daraz.lk.jpeg', '5800', '2022-07-28 15:21:30', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_ip`, `user_address`, `user_mobile`) VALUES
(13, 'krish', 'krishnamenan@gmail.com', '1111', '::1', 'sanguvely,jaffna', '0778864273');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
