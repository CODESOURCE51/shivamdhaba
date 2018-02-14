-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2015 at 02:32 PM
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
-- Table structure for table `addons_channels`
--

DROP TABLE IF EXISTS `addons_channels`;
CREATE TABLE IF NOT EXISTS `addons_channels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_name` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `price` varchar(100) NOT NULL,
  `serv_tax` varchar(100) NOT NULL,
  `tax_amt` varchar(100) NOT NULL,
  `total_amt` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `addons_channels`
--

INSERT INTO `addons_channels` (`id`, `channel_name`, `desc`, `price`, `serv_tax`, `tax_amt`, `total_amt`) VALUES
(1, 'Zee Bangla', 'bengali cimema', '10', '12.5', '1.25', '11'),
(2, '10 Sports', 'sports', '15', '12.5', '1.875', '17'),
(3, 'neo sports', 'sports', '12', '12.5', '1.5', '14'),
(4, 'tamil tv', 'tamil channel', '8', '12.36', '0.9888', '9'),
(5, 'discovery', 'entertainment channel', '10', '12.36', '1.236', '11');

-- --------------------------------------------------------

--
-- Table structure for table `addons_payment`
--

DROP TABLE IF EXISTS `addons_payment`;
CREATE TABLE IF NOT EXISTS `addons_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `addons_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `duartion` int(11) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `pay_date` date NOT NULL,
  `to_date` date NOT NULL,
  `track_code` varchar(255) NOT NULL,
  `c_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `addons_payment`
--

INSERT INTO `addons_payment` (`id`, `addons_id`, `amount`, `duartion`, `total_amount`, `pay_date`, `to_date`, `track_code`, `c_id`) VALUES
(1, '1', '11', 30, '11', '2014-08-21', '2014-09-20', 'code-2114', 'Kishor-63682'),
(2, '4', '9', 30, '9', '2014-12-05', '2015-01-04', 'code-9849', '01762637718'),
(3, '1', '11', 30, '11', '2015-02-24', '2015-03-26', 'code-5211', 'Shubha-54714'),
(4, '2', '17', 30, '17', '2015-02-24', '2015-03-26', 'code-5211', 'Shubha-54714'),
(5, '3', '14', 30, '14', '2015-02-24', '2015-03-26', 'code-5211', 'Shubha-54714'),
(6, '4', '9', 30, '9', '2015-02-24', '2015-03-26', 'code-5211', 'Shubha-54714'),
(7, '5', '11', 30, '11', '2015-02-24', '2015-03-26', 'code-5211', 'Shubha-54714'),
(8, '2', '17', 30, '17', '2015-03-17', '2015-04-16', 'code-3230', 'fernandez-25636'),
(9, '3', '14', 30, '14', '2015-03-17', '2015-04-16', 'code-3230', 'fernandez-25636'),
(10, '5', '11', 30, '11', '2015-03-17', '2015-04-16', 'code-3230', 'fernandez-25636');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `last_login_date` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usr` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `user_ip`, `last_login_date`) VALUES
(2, 'admin', 'admin12', 'Projukti10-PC', '17/03/2015 10:33:53 am');

-- --------------------------------------------------------

--
-- Table structure for table `client_entry`
--

DROP TABLE IF EXISTS `client_entry`;
CREATE TABLE IF NOT EXISTS `client_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) NOT NULL,
  `c_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscription_date` date NOT NULL,
  `box_no` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `last_login_date` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `client_entry`
--

INSERT INTO `client_entry` (`id`, `c_name`, `c_id`, `email`, `subscription_date`, `box_no`, `zone`, `area`, `address`, `dob`, `phone`, `image`, `username`, `password`, `user_ip`, `last_login_date`) VALUES
(2, 'Rajesh prasad', 'Rajesh-49429', 'raj@gmail.com', '2014-11-01', '', 'south', 'Behala', 'p-34', '1980-11-07', '1234567890', '', 'Rajesh-49429', 'Rajesh-49429-49429', '', ''),
(3, 'Rana Naskar', 'Rana-46136', 'rana.projukti@gmail.com', '2015-01-22', '', 'south', 'Budge Budge', 'budge budge', '1996-01-01', '9836784568', '', 'Rana-46136', 'Rana-46136-46136', '', ''),
(4, 'Shubha Das', 'Shubha-54714', 's@gmail.com', '2015-01-01', '', 'south', 'Behala', 'Behala chourasta', '1986-01-24', '8899005678', '', 'Shubha-54714', 'Shubha-54714-54714', '', ''),
(5, 'fernandez fer', 'fernandez-25636', 'f@g.com', '2015-03-17', 'vvr4567', 'south', 'Budge Budge', 'rt567', '2015-03-03', '1234567890', '', 'fernandez-25636', 'fernandez-25636-25636', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_login`
--

DROP TABLE IF EXISTS `emp_login`;
CREATE TABLE IF NOT EXISTS `emp_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(255) NOT NULL,
  `empId` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `last_login_date` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `emp_login`
--

INSERT INTO `emp_login` (`id`, `emp_name`, `empId`, `address`, `blood_group`, `contact`, `photo`, `area`, `salary`, `email`, `username`, `password`, `user_ip`, `last_login_date`) VALUES
(1, 'Debu ', 'EMP-7149', 'parkcircus', 'B', '9772123540', '', 'tiljola', '15000', 'projuktiwebservice@gmail.com', 'EMP-7149', '123', '115.187.61.193', '04/12/2014 10:43:55 pm'),
(2, 'Biswajit Das', 'EMP-5920', 'garia', 'B+', '1234567890', '', 'bosepukur', '', 'abc@gmail.com', 'EMP-5920', '1234', 'host_bb.wishnetkolkata.com', '05/12/2014 02:52:19 am'),
(3, 'Debanjan', 'EMP-3002', 'parkcircus kolkata', 'AB', '9945678900', '', 'kolkata', '20000', 'd@gmail.com', 'EMP-3002', 'debu123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `zone`, `area`) VALUES
(1, 'south', 'Budge Budge'),
(2, 'North', 'DumDum'),
(3, 'south', 'Behala');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pkg` varchar(255) NOT NULL,
  `pkg_mode` varchar(255) NOT NULL,
  `pkg_name` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `all_ch` varchar(255) NOT NULL,
  `service_tax` varchar(255) NOT NULL,
  `tax_amount` varchar(100) NOT NULL,
  `service_chrg` varchar(100) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `pkg`, `pkg_mode`, `pkg_name`, `desc`, `all_ch`, `service_tax`, `tax_amount`, `service_chrg`, `price`) VALUES
(3, 'Popular', 'Monthly', 'Popular**Monthly', '175 Channel', '180', '12.36', '22.247999999999998', '10', '212'),
(4, 'Grant', 'Monthly', 'Grant**Monthly', '235 Channel', '230', '12.36', '28.427999999999997', '10', '268'),
(5, 'Jonata', 'Monthly', 'Jonata**Monthly', '100 channel', '100', '12.36', '12.36', '10', '122'),
(6, 'Primium', 'Monthly', 'Primium**Monthly', '475 channel', '280', '12.36', '34.608', '10', '325'),
(7, 'Monthlysports', 'Monthly', 'Monthlysports**Monthly', 'sports channel only', '500', '12.36', '61.8', '0', '562');

-- --------------------------------------------------------

--
-- Table structure for table `pkg_assign`
--

DROP TABLE IF EXISTS `pkg_assign`;
CREATE TABLE IF NOT EXISTS `pkg_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` varchar(100) NOT NULL,
  `box_no` varchar(255) NOT NULL,
  `pkg_name` varchar(255) NOT NULL,
  `activ_status` int(11) NOT NULL DEFAULT '0',
  `renew_status` int(11) NOT NULL DEFAULT '0',
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `track_code` varchar(255) NOT NULL,
  `pkg_duration` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pkg_assign`
--

INSERT INTO `pkg_assign` (`id`, `c_id`, `box_no`, `pkg_name`, `activ_status`, `renew_status`, `from_date`, `to_date`, `track_code`, `pkg_duration`, `status`) VALUES
(1, 'Kishor-63682', '', 'package1**Monthly', 1, 1, '2014-07-01', '2014-07-31', 'code-2114', 'Monthly', 0),
(2, '01762637718', '', 'Grant**Monthly', 3, 1, '2014-11-01', '2014-11-30', 'code-9849', 'Monthly', 1),
(3, 'Kishor-63682', '', 'Grant**Monthly', 1, 1, '2014-12-01', '2014-12-31', 'code-3558', 'Monthly', 1),
(4, 'Rana-46136', '', 'Popular**Monthly', 1, 1, '2015-01-22', '2015-02-21', 'code-8514', 'Monthly', 1),
(5, 'Shubha-54714', '', 'Monthlysports**Monthly', 1, 1, '2015-01-01', '2015-02-01', 'code-5211', 'Monthly', 1),
(6, 'fernandez-25636', 'vvr4567', 'Grant**Monthly', 1, 1, '2015-03-01', '2015-03-30', 'code-3230', 'Monthly', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pkg_payment`
--

DROP TABLE IF EXISTS `pkg_payment`;
CREATE TABLE IF NOT EXISTS `pkg_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` varchar(250) NOT NULL,
  `box_no` varchar(255) NOT NULL,
  `pkg_name` varchar(250) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `track_code` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `ded_chnl` longtext NOT NULL,
  `ded_amt` varchar(250) NOT NULL,
  `late_fine` varchar(255) NOT NULL,
  `tot_payed` varchar(250) NOT NULL,
  `approval` int(11) NOT NULL DEFAULT '0',
  `pay-date` date NOT NULL,
  `pkg_duration` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pkg_payment`
--

INSERT INTO `pkg_payment` (`id`, `c_id`, `box_no`, `pkg_name`, `from_date`, `to_date`, `track_code`, `amount`, `ded_chnl`, `ded_amt`, `late_fine`, `tot_payed`, `approval`, `pay-date`, `pkg_duration`) VALUES
(1, 'Kishor-63682', '', 'package1**Monthly', '2014-07-01', '2014-07-31', 'code-2114', 179, '', '0', '0', '179', 1, '2014-08-21', 'Monthly'),
(2, '01762637718', '', 'Grant**Monthly', '2014-11-01', '2014-11-30', 'code-9849', 268, '', '0', '0', '268', 1, '2014-12-05', 'Monthly'),
(3, 'Kishor-63682', '', 'Grant**Monthly', '2014-12-01', '2014-12-31', 'code-3558', 268, '', '0', '0', '268', 1, '2014-12-05', 'Monthly'),
(4, 'Rana-46136', '', 'Popular**Monthly', '2015-01-22', '2015-02-21', 'code-8514', 212, '', '0', '0', '212', 1, '2015-02-18', 'Monthly'),
(5, 'Shubha-54714', '', 'Monthlysports**Monthly', '2015-01-01', '2015-02-01', 'code-5211', 562, '', '0', '0', '562', 1, '2015-02-24', 'Monthly'),
(6, 'fernandez-25636', 'vvr4567', 'Grant**Monthly', '2015-03-01', '2015-03-30', 'code-3230', 268, '', '0', '0', '268', 1, '2015-03-17', 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `service_tax`
--

DROP TABLE IF EXISTS `service_tax`;
CREATE TABLE IF NOT EXISTS `service_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tax` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `service_tax`
--

INSERT INTO `service_tax` (`id`, `tax`) VALUES
(1, '12.36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
