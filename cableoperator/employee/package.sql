-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2014 at 10:06 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cable_operator`
--

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pkg_name` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `all_ch` varchar(255) NOT NULL,
  `service_tax` varchar(255) NOT NULL,
  `tax_amount` varchar(100) NOT NULL,
  `service_chrg` varchar(100) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `pkg_name`, `desc`, `all_ch`, `service_tax`, `tax_amount`, `service_chrg`, `price`) VALUES
(1, 'Platinum**Monthly', 'All', '500', '16', '80', '30', '610'),
(2, 'Platinum**Semi Annually', 'All', '3000', '16', '480', '180', '3660'),
(3, 'Platinum**Annually', 'All', '6000', '16', '960', '360', '7320'),
(4, 'Gold**Monthly', 'All', '400', '16', '64', '20', '484'),
(5, 'Gold**Semi Annually', 'All', '2400', '16', '384', '120', '2904');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
