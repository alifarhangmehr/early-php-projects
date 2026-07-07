-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2011 at 04:00 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lichir_portal`
--
CREATE DATABASE `lichir_portal` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci;
USE `lichir_portal`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `accessLevel` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `name`, `family`, `pass`, `email`, `accessLevel`) VALUES
('admin', 'علی', 'فرهنگ مهر', 'a1b2c3', 'ali.farhangmehr@gmail.com', 'fullAccess');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `newsId` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `cUser` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `cBody` varchar(5000) COLLATE utf8_persian_ci DEFAULT NULL,
  `cWebPage` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `cEmail` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `cReallEmail` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `cConfirm` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `cId` int(10) NOT NULL AUTO_INCREMENT,
  `fullDate` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `dateEN` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `dateFA` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `cTime` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `confirmDateEN` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `confirmDateFA` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `confirmTime` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`cId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `family` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `time` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `fullDate` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `dateEN` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `dateFA` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `msgTitle` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `msgText` longtext COLLATE utf8_persian_ci,
  `adminAwnser` longtext COLLATE utf8_persian_ci,
  `aFullDate` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `aDateEN` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `aDateFA` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `aTime` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `unRead` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `message`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `newsId` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `fullDate` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `dateEN` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `dateFA` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `newsTime` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `accessLevel` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `newsGroup` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `newsTitle` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `brief` text COLLATE utf8_persian_ci NOT NULL,
  `newsBody` longtext COLLATE utf8_persian_ci NOT NULL,
  `lastDateModified` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `lastDateENModified` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `lastDateFAModified` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `lastTimeModified` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `lastOneModified` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `photo1` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `photoSource` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=64 ;

--
-- Dumping data for table `news`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(50) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `studentNumber` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `user` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `pass` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `groupName` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `name` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `family` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `pName` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `pFamily` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `certificateName` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `father` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `state` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `nationalCode` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `single` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `birthday` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `birthPlace` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `education` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `interest` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `brief` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `registerDate` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `registerDateFA` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `graduateDate` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile1` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile2` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `homeAddress` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `workAddress` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `photo1` varchar(250) COLLATE utf8_persian_ci DEFAULT NULL,
  `photoSource` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `homePage` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `accessLevel` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--


-- --------------------------------------------------------

--
-- Table structure for table `usersboard`
--

CREATE TABLE IF NOT EXISTS `usersboard` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `newsId` int(20) NOT NULL,
  `fullDate` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `dateEN` varchar(100) CHARACTER SET utf8 NOT NULL,
  `dateFA` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `newsTime` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `accessLevel` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `newsGroup` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `newsTitle` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `brief` text COLLATE utf8_persian_ci NOT NULL,
  `newsBody` longtext COLLATE utf8_persian_ci NOT NULL,
  `lastDateModified` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `lastDateENModified` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `lastDateFAModified` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `lastTimeModified` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `lastOneModified` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `usersboard`
--


-- --------------------------------------------------------

--
-- Table structure for table `usersboardcomments`
--

CREATE TABLE IF NOT EXISTS `usersboardcomments` (
  `newsId` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `cUser` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `cBody` varchar(5000) COLLATE utf8_persian_ci DEFAULT NULL,
  `cWebPage` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `cEmail` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `cReallEmail` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `cConfirm` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `cId` int(10) NOT NULL AUTO_INCREMENT,
  `fullDate` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `dateEN` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `dateFA` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `cTime` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `confirmDateEN` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `confirmDateFA` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `confirmTime` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`cId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=134 ;

--
-- Dumping data for table `usersboardcomments`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
