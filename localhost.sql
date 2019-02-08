-- phpMyAdmin SQL Dump
-- version 4.1.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2018 at 04:01 AM
-- Server version: 5.1.62
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbNgnl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbTempo`
--

CREATE TABLE IF NOT EXISTS `tbTempo` (
  `codTempo` int(11) NOT NULL AUTO_INCREMENT,
  `penalidade` int(11) NOT NULL DEFAULT '0',
  `fimPenalidade` date DEFAULT NULL,
  `xp` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `xpProxLevel` int(11) NOT NULL,
  PRIMARY KEY (`codTempo`),
  UNIQUE KEY `codTempo` (`codTempo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbTempo`
--

INSERT INTO `tbTempo` (`codTempo`, `penalidade`, `fimPenalidade`, `xp`, `level`, `xpProxLevel`) VALUES
(1, 0, NULL, 0, 1, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
