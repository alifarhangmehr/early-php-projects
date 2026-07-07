-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 22, 2010 at 07:47 Þ.Ù
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `serial` int(20) NOT NULL,
  `fullDate` date NOT NULL,
  `dateEN` varchar(100) CHARACTER SET utf8 NOT NULL,
  `dateFA` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `accessLevel` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `newsGroup` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `newsTitle` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `brief` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `newsBody` longtext COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `news`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
