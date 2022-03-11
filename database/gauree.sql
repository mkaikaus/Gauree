-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2022 at 05:30 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gauree`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `admin_id` int(30) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `adminName`, `email`, `Password`) VALUES
(1, 'Monisa Saha Sumi', 'monisasaha077@gmail.com', 'admin321');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

DROP TABLE IF EXISTS `customer_info`;
CREATE TABLE IF NOT EXISTS `customer_info` (
  `CustomerID` int(100) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `PhoneNumber` varchar(14) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`CustomerID`, `CustomerName`, `Email`, `Password`, `Address`, `PhoneNumber`) VALUES
(1, 'Subhanjana Dhar', 'subhanjana@gnail.com', '333', 'Jahangirnagar University,Savar,Dhaka', '+8801731916325'),
(2, 'ridhi ', 'ridhi@yahoo.com', '1234', 'Savar,Dhaka', '+8801731916879'),
(3, 'Risha', 'risha@gmail.com', 'risha12345', 'rangpur', '+8801928374566'),
(4, 'Bithi', 'bithi@gmail.com', 'bithi12345', 'Dhaka', '+8801836488383'),
(6, 'Amit', 'Amit@gmail.com', 'ahsl1234', 'Dhaka', '+8801928374566');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

DROP TABLE IF EXISTS `product_info`;
CREATE TABLE IF NOT EXISTS `product_info` (
  `proID` int(30) NOT NULL AUTO_INCREMENT,
  `proName` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `piece` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`proID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`proID`, `proName`, `price`, `piece`, `image`) VALUES
(1, 'Gajra Set', 1250, 7, '1646580042_gajra set.jpg'),
(2, 'German Silver Set', 500, 10, '1646580780_german silver set.jpg'),
(3, 'Chokar', 230, 5, '1646590317_chokar.jpg'),
(4, 'Payel', 120, 6, '1646593121_payel.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
