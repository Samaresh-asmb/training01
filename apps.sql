-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2015 at 03:11 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `time_logs`
--

CREATE TABLE IF NOT EXISTS `time_logs` (
  `sl_no` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `time_logs`
--

INSERT INTO `time_logs` (`sl_no`, `user_id`, `dates`, `start_time`, `end_time`) VALUES
(14, 1, '2015-06-15', '10:12:25 am', ' '),
(15, 1, '2015-06-15', '10:19:48 am', '10:21:02 am'),
(16, 2, '2015-06-15', '10:22:40 am', '11:32:17 am'),
(17, 1, '2015-06-15', '11:32:24 am', ' '),
(18, 1, '2015-06-15', '11:58:44 am', ' '),
(19, 2, '2015-06-15', '12:13:12 pm', ' '),
(20, 1, '2015-06-15', '12:26:47 pm', ' '),
(21, 2, '2015-06-15', '12:29:04 pm', '01:08:06 pm'),
(22, 2, '2015-06-15', '01:08:13 pm', '03:48:08 pm'),
(23, 2, '2015-06-15', '03:48:22 pm', '04:28:06 pm'),
(24, 2, '2015-06-15', '04:28:19 pm', '04:37:25 pm'),
(25, 1, '2015-06-15', '04:40:30 pm', '04:44:48 pm'),
(26, 1, '2015-06-15', '04:46:24 pm', '04:51:31 pm'),
(27, 2, '2015-06-15', '04:50 PM', '05:00 PM'),
(28, 2, '2015-06-15', '04:52:22 pm', '04:54:38 pm'),
(29, 2, '2015-06-15', '04:52:14 PM', '05:10:45 PM'),
(30, 2, '2015-06-15', '05:48:20 pm', '05:50:04 pm'),
(31, 2, '2015-06-15', '04:52:14 PM', '05:10:45 PM'),
(32, 1, '2015-06-15', '11:07:18 pm', '11:08:35 pm'),
(33, 1, '2015-06-15', '11:18:49 pm', '11:20:05 pm'),
(34, 1, '2015-06-16', '12:37:00 pm', '03:29:12 pm'),
(35, 3, '2015-06-16', '04:00:41 pm', '04:01:01 pm'),
(36, 3, '2015-06-16', '04:02:08 pm', '04:19:57 pm'),
(37, 3, '2015-06-16', '05:15:24 pm', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `user_name`, `password`, `mobile`) VALUES
(1, 'Samaresh Patra', 'admin', '123', '8147942136'),
(2, 'Sam', 'emp1', '1234', '2147483647'),
(3, 'Puneet Kumar', 'emp2', '111', '8147');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
