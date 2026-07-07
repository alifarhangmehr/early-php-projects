-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2011 at 10:15 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `welfare`
--
CREATE DATABASE `welfare` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci;
USE `welfare`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `pass`) VALUES
('admin', '123321');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patientId` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `fatherName` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `birthday` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `nationalCode` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `disabilityCode` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `disabilityType` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `disabilityStartDate` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `caseNumber` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `homeAdress1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `homeAdress2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `phone1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `phone2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `mobile1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `mobile2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `photo1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `photoSource` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `behavioralStatus` longtext COLLATE utf8_persian_ci NOT NULL,
  `educationalStatus` longtext COLLATE utf8_persian_ci NOT NULL,
  `ActionsTaken` longtext COLLATE utf8_persian_ci NOT NULL,
  `economicSituation` longtext COLLATE utf8_persian_ci NOT NULL,
  `StatusOfHomeVisits` longtext COLLATE utf8_persian_ci NOT NULL,
  `comments1` longtext COLLATE utf8_persian_ci NOT NULL,
  `comments2` longtext COLLATE utf8_persian_ci NOT NULL,
  `comments3` longtext COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`patientId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientId`, `name`, `family`, `fatherName`, `birthday`, `nationalCode`, `disabilityCode`, `disabilityType`, `disabilityStartDate`, `caseNumber`, `homeAdress1`, `homeAdress2`, `phone1`, `phone2`, `mobile1`, `mobile2`, `photo1`, `photoSource`, `behavioralStatus`, `educationalStatus`, `ActionsTaken`, `economicSituation`, `StatusOfHomeVisits`, `comments1`, `comments2`, `comments3`) VALUES
('3', 'حسن', 'حسنی', 'محمد', '3/2/1375', '09123456790', '333', 'ذهنی', '1376', '33213', 'کرج مهرشهر فاز 32', 'کرج مهرشهر فاز 32', '02162265245', '', '09123456789', '', '../upload/thumb3.jpg', '../upload/source3.jpg', '', '', '', '', '', '', '', ''),
('2', 'مریم ', 'محمدی', 'محمد', '21/01/1292', '1234567890', '111', 'ذهنی', '21/05/1382', '110', 'کرج-خیابان فردوسی', 'تهران-خیابان شریعتی', '121211111121', '2222222222222', '092.12153135', '091116454', '../upload/thumb2.jpg', '../upload/source2.jpg', 'مناسب\r\nشسمنب شسبنمتشا سیب شسینبتتا شمسنیبش منباشمنسبا شسنیبتاشسنمیباشستنمبا شمسیبشبشب شسمبنتاشسبا شسنتبا شتنبا شمسنتیباشمسنیتبا شمسنیتبا شمنبنمکابعهشساب.شسدیبتناشس یمبانشتسیبامشنسیبا شس ب ب اشسی بنا شنمسیتبا شنمسیاب منشسیاب مشسنیبا مشنیساب نمشسیاب شسینابن شتسیاب نمتشسایبشبناشسیمب اشسینب شاس با ا ا نشسمیاب شنسیاب نشسیاب نتشیا بتنیا بنیتاب  مشنسیتاب مسنیبتا شسیمنبا', 'ضعیف', 'هیچی', 'خوب', 'بد', 'کممممممممممممم', 'زیاددددددددددددددد', 'بددددددددددددددددددددد'),
('4', 'مهیار', 'ترابی', 'مهدی', '01/2/1380', '5465656565', '5464565', 'ذهنی', '02/05/1371', '4444', 'شسبشسیب شمسیبم شسیب شمسیتب نشتسیب ت', '', '456546546', '456456', '456546546546', '456456546546546', '../upload/thumb4.jpg', '../upload/source4.jpg', '', '', '', '', '', '', '', ''),
('5', 'حسین', 'محمدی', 'صمد', '2/5/185', '02145455', '4545455', 'ذهنی', '1356', '01236665546', 'نسیتنمستیب س تیلتسی تلم', 'کمسیبن ل سی/ب لن سیبل نم', '354545456', '654545646546', '6545645644', '56564564', '../upload/thumb5.jpg', '../upload/source5.jpg', '', '', '', '', '', '', '', ''),
('6', 'فرید', 'مخبر', 'حمید', '3/5/1384', '0123456789', '45546', 'ذهنی', '3/5/1386', '56446', 'سیبلیس لسی بل سیبل', 'س یبل سیل سیبل بی', '6555464646556', '564544646', '654564564', '645644', '../upload/thumb6.jpg', '../upload/source6.jpg', '', '', '', '', 'شسینمب شیبدشسی بشسیدب شسیبتنشاسینب تنشاسیتناشتمسیبا تشیساب شسینبا ش.سیبام نشسیاب بردظطزئورذظ طزر ظطرذظئطزرذ ظت.سیبان شسینتب شستنیارظطدروذظطبنترنظذر ظطزتر دظئوطر وئظطز روظطدزردظطئوزر ظطذرئودطاتزرذ ظطئورد ظرظطزر طزردذ دطنبیالظزبلتنایب', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
