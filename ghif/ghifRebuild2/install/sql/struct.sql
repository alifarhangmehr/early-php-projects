CREATE TABLE IF NOT EXISTS `accounts` (
  `accountId` int(20) NOT NULL,
  `oaId` int(20) NOT NULL,
  `employeId` int(20) NOT NULL,
  `factorId` int(20) NOT NULL,
  `checkGroup` int(20) NOT NULL,
  `price` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `payment` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `date` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `accountSerial` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `comments` varchar(2500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`accountId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `accounts`
--


-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE IF NOT EXISTS `backup` (
  `backupId` int(20) NOT NULL,
  `employeId` int(20) NOT NULL,
  `date` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `comments` varchar(2500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`backupId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `backup`
--


-- --------------------------------------------------------

--
-- Table structure for table `bestsalereport`
--

CREATE TABLE IF NOT EXISTS `bestsalereport` (
  `goodId` int(20) NOT NULL,
  `count` double NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`goodId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `bestsalereport`
--


-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE IF NOT EXISTS `cash` (
  `cashId` int(20) NOT NULL,
  `cashListId` int(20) NOT NULL,
  `reciverEmployeId` int(20) NOT NULL,
  `cashierEmployeId` int(20) NOT NULL,
  `dateFrom` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `dateTo` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `cashPrice` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `cardPrice` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `comments` varchar(2500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`cashId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `cash`
--


-- --------------------------------------------------------

--
-- Table structure for table `cashlist`
--

CREATE TABLE IF NOT EXISTS `cashlist` (
  `cashListId` int(20) NOT NULL DEFAULT '0',
  `cashName` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`cashListId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `cashlist`
--

INSERT INTO `cashlist` (`cashListId`, `cashName`) VALUES
(1, '????? ????');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `to` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `message` text COLLATE utf8_persian_ci NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chat`
--


-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE IF NOT EXISTS `checks` (
  `checkId` int(20) NOT NULL,
  `accountId` int(20) NOT NULL,
  `checkAccountOwner` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `bankName` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `bankBranch` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `accountNumber` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `checkSerial` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `checkMood` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `exportDate` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `deadlineDate` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `checkStatus` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `price` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`checkId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `checks`
--


-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerId` int(20) NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `membershipNo` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `sex` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `mobile1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `mobile2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `tel1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `tel2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `birthday` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `membershipDate` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `membershipDuration` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `comments` varchar(2500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `customers`
--


-- --------------------------------------------------------

--
-- Table structure for table `detailsalereport`
--

CREATE TABLE IF NOT EXISTS `detailsalereport` (
  `goodId` int(20) NOT NULL,
  `count` double NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`goodId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `detailsalereport`
--


-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `documentId` int(20) NOT NULL,
  `docTypeId` int(20) NOT NULL,
  `date` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `discribtion` varchar(2500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`documentId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `documents`
--


-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE IF NOT EXISTS `employes` (
  `employeId` int(20) NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `user` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `tel` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `birthday` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `sAcLevel` longtext COLLATE utf8_persian_ci NOT NULL,
  `grade` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `salary` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `comments` varchar(2500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`employeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `employes`
--


-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

CREATE TABLE IF NOT EXISTS `factor` (
  `factorId` int(20) NOT NULL,
  `factorTypeId` int(20) NOT NULL,
  `cashListId` int(20) NOT NULL,
  `oaId` int(20) NOT NULL,
  `factorNo` int(200) NOT NULL,
  `date` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `cash` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `card` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `discount` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `barcode` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `clear` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `canceled` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`factorId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `factor`
--


-- --------------------------------------------------------

--
-- Table structure for table `factorextra`
--

CREATE TABLE IF NOT EXISTS `factorextra` (
  `factorExtraId` int(20) NOT NULL,
  `factorExtraName` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `priceType` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `price` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `default` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`factorExtraId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `factorextra`
--


-- --------------------------------------------------------

--
-- Table structure for table `factorextracost`
--

CREATE TABLE IF NOT EXISTS `factorextracost` (
  `factorExtraCostId` int(20) NOT NULL,
  `factorExtraId` int(20) NOT NULL,
  `factorId` int(20) NOT NULL,
  `factorExtraCost` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`factorExtraCostId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `factorextracost`
--


-- --------------------------------------------------------

--
-- Table structure for table `goodfields`
--

CREATE TABLE IF NOT EXISTS `goodfields` (
  `goodFieldId` int(20) NOT NULL,
  `goodFieldName` varchar(200) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`goodFieldId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `goodfields`
--


-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `goodId` int(20) NOT NULL AUTO_INCREMENT,
  `goodName` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `barcode` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `sellPrice` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `purchasePrice` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`goodId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `goods`
--


-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inventoryId` int(20) NOT NULL,
  `goodId` int(20) NOT NULL,
  `employeId` int(20) NOT NULL,
  `factorId` int(20) NOT NULL,
  `storeId` int(20) NOT NULL,
  `stock` int(20) NOT NULL,
  `sellPrice` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `purchasePrice` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `date` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `comments` varchar(2500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`inventoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `inventory`
--


-- --------------------------------------------------------

--
-- Table structure for table `oa`
--

CREATE TABLE IF NOT EXISTS `oa` (
  `oaId` int(20) NOT NULL,
  `bankAccountId` int(20) NOT NULL,
  `type` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `company` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `tel` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `comments` varchar(2500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`oaId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `oa`
--


-- --------------------------------------------------------

--
-- Table structure for table `outgo`
--

CREATE TABLE IF NOT EXISTS `outgo` (
  `outgoId` int(20) NOT NULL,
  `cashListId` int(20) NOT NULL,
  `employeId` int(20) NOT NULL,
  `date` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `factorSerial` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `price` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `comments` varchar(2500) COLLATE utf8_persian_ci NOT NULL,
  `clear` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`outgoId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `outgo`
--


-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchaseId` int(20) NOT NULL,
  `factorId` int(20) NOT NULL,
  `goodId` int(20) NOT NULL,
  `storeId` int(20) NOT NULL,
  `count` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `price` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `payable` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `discount` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `print` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`purchaseId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `purchase`
--


-- --------------------------------------------------------

--
-- Table structure for table `reportdate`
--

CREATE TABLE IF NOT EXISTS `reportdate` (
  `reportType` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `date` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`reportType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `reportdate`
--


-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `settingId` int(20) NOT NULL,
  `companyName` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `whatToDo` varchar(2000) COLLATE utf8_persian_ci NOT NULL,
  `guild` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `logoImage` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `address1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `address2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `tel1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `tel2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `mob1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `mob2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `sms1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `sms2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `fax1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `fax2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `site1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `site2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `email1` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `email2` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `theme` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `language` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`settingId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `storeId` int(20) NOT NULL,
  `storeName` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `defaultStore` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`storeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `stores`
--

