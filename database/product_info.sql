-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2022 at 05:54 AM
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
-- Table structure for table `product_info`
--

DROP TABLE IF EXISTS `product_info`;
CREATE TABLE IF NOT EXISTS `product_info` (
  `proID` int(30) NOT NULL AUTO_INCREMENT,
  `proName` varchar(255) NOT NULL,
  `proType` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `piece` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`proID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`proID`, `proName`, `proType`, `price`, `piece`, `image`) VALUES
(1, 'Gajra Set', 'Indian', 1250, 7, '1646580042_gajra set.jpg'),
(2, 'German Silver Set', 'German', 500, 10, '1646580780_german silver set.jpg'),
(3, 'Chokar', 'Bangladeshi', 230, 5, '1646590317_chokar.jpg'),
(4, 'Payel', 'Indian', 120, 6, '1646593121_payel.jpg'),
(5, 'Black Polish Afgani Set', 'Afgani', 330, 10, '1646977947_afgani.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
