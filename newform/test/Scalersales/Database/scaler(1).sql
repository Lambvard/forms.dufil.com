-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 27, 2019 at 01:38 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scaler`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminprofile`
--

DROP TABLE IF EXISTS `adminprofile`;
CREATE TABLE IF NOT EXISTS `adminprofile` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminprofile`
--

INSERT INTO `adminprofile` (`sid`, `email`, `password`) VALUES
(1, 'admin@dufil.com', 'admin'),
(2, 'admin@dufil.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brokendry`
--

DROP TABLE IF EXISTS `brokendry`;
CREATE TABLE IF NOT EXISTS `brokendry` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `SuperID` varchar(100) NOT NULL,
  `materials` varchar(100) NOT NULL,
  `Lines` varchar(100) NOT NULL,
  `Shift` varchar(100) NOT NULL,
  `Dater` varchar(100) NOT NULL,
  `Timer` varchar(100) NOT NULL,
  `readingvalues` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drytriming`
--

DROP TABLE IF EXISTS `drytriming`;
CREATE TABLE IF NOT EXISTS `drytriming` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `SuperID` varchar(100) NOT NULL,
  `materials` varchar(100) NOT NULL,
  `Lines` varchar(100) NOT NULL,
  `Shift` varchar(100) NOT NULL,
  `Dater` varchar(100) NOT NULL,
  `Timer` varchar(100) NOT NULL,
  `readingvalues` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drytriming`
--

INSERT INTO `drytriming` (`sid`, `SuperID`, `materials`, `Lines`, `Shift`, `Dater`, `Timer`, `readingvalues`) VALUES
(7, 'Dufil/Super/1', 'Dry Trimming', 'Line 1', 'Shift 1', '26-02-19', '04:06:39pm', '+000.000');

-- --------------------------------------------------------

--
-- Table structure for table `line1`
--

DROP TABLE IF EXISTS `line1`;
CREATE TABLE IF NOT EXISTS `line1` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `SuperID` varchar(20) DEFAULT NULL,
  `Shift` varchar(100) NOT NULL,
  `Wet` varchar(250) NOT NULL,
  `Dry` varchar(100) NOT NULL,
  `Triming` varchar(100) NOT NULL,
  `Broken` varchar(100) NOT NULL,
  `dates` varchar(100) NOT NULL,
  `timer` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temptable`
--

DROP TABLE IF EXISTS `temptable`;
CREATE TABLE IF NOT EXISTS `temptable` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `scalevale` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temptable`
--

INSERT INTO `temptable` (`sid`, `scalevale`) VALUES
(6, '0.000'),
(7, '0.180'),
(8, '0.050');

-- --------------------------------------------------------

--
-- Table structure for table `trimmingoil`
--

DROP TABLE IF EXISTS `trimmingoil`;
CREATE TABLE IF NOT EXISTS `trimmingoil` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `SuperID` varchar(100) NOT NULL,
  `materials` varchar(100) NOT NULL,
  `Lines` varchar(100) NOT NULL,
  `Shift` varchar(100) NOT NULL,
  `Dater` varchar(100) NOT NULL,
  `Timer` varchar(100) NOT NULL,
  `readingvalues` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

DROP TABLE IF EXISTS `userprofile`;
CREATE TABLE IF NOT EXISTS `userprofile` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `numbers` varchar(20) NOT NULL,
  `role` varchar(100) NOT NULL,
  `dates` varchar(100) NOT NULL,
  `timer` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `superID` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`sid`, `firstname`, `lastname`, `email`, `password`, `numbers`, `role`, `dates`, `timer`, `status`, `superID`) VALUES
(29, 'Ibukun', 'Fowler', 'folly@yahoo.com', 'btuytr', '09076543218', 'Supervisor', '16-02-19', '01:22:02pm', 'ON', 'Dufil/Super/29'),
(28, 'Rotimi', 'Nana', 'Nana.rotimi@rotexy.com', 'Lagos', '08065656565', 'Supervisor', '16-02-19', '01:21:23pm', 'ON', 'Dufil/Super/28'),
(27, 'Babatunde', 'Fowler', 'Babatunde.Fowler@dufil.com', 'Mathematics', '08065656565', 'Cordinator', '16-02-19', '01:19:47pm', 'ON', 'Dufil/Super/1');

-- --------------------------------------------------------

--
-- Table structure for table `wetnoodlles`
--

DROP TABLE IF EXISTS `wetnoodlles`;
CREATE TABLE IF NOT EXISTS `wetnoodlles` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `SuperID` varchar(100) NOT NULL,
  `materials` varchar(100) NOT NULL,
  `Lines` varchar(100) NOT NULL,
  `Shift` varchar(100) NOT NULL,
  `Dater` varchar(100) NOT NULL,
  `Timer` varchar(100) NOT NULL,
  `readingvalues` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
