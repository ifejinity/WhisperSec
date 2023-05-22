-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2023 at 05:30 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whispesecdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `replyid` int NOT NULL AUTO_INCREMENT,
  `postid` int NOT NULL,
  `sender` varchar(50) NOT NULL,
  `reciever` varchar(50) NOT NULL,
  `message` varchar(2000) NOT NULL,
  PRIMARY KEY (`replyid`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`replyid`, `postid`, `sender`, `reciever`, `message`) VALUES
(52, 90, 'mrlonzanida', 'mrlonzanida08', 'dfgdfg'),
(48, 90, 'mrlonzanida', 'mrlonzanida08', 'asd'),
(49, 90, 'mrlonzanida', 'mrlonzanida08', 'asd'),
(50, 90, 'mrlonzanida', 'mrlonzanida08', 'adsadasd'),
(51, 90, 'mrlonzanida', 'mrlonzanida08', 'asdasd'),
(47, 90, 'mrlonzanida', 'mrlonzanida08', 'asda'),
(46, 90, 'mrlonzanida', 'mrlonzanida08', 'asda'),
(45, 90, 'mrlonzanida', 'mrlonzanida08', 'asdas'),
(44, 90, 'mrlonzanida', 'mrlonzanida08', 'asda'),
(43, 90, 'mrlonzanida', 'mrlonzanida08', 'ada'),
(42, 90, 'mrlonzanida', 'mrlonzanida08', 'asda'),
(41, 90, 'mrlonzanida', 'mrlonzanida08', 'asda'),
(40, 90, 'mrlonzanida', 'mrlonzanida08', 'asd'),
(39, 90, 'mrlonzanida', 'mrlonzanida08', 'asdasd'),
(38, 90, 'mrlonzanida', 'mrlonzanida08', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `postid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `post` varchar(2000) NOT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `username`, `post`) VALUES
(89, 'mrlonzanida08', 'sadas'),
(90, 'mrlonzanida08', 'fgfghfghfghfgh'),
(94, 'mrlonzanida', 'Hi mga lods');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `fullname`, `username`, `password`) VALUES
(9, 'Jeffrey Lonzanida', 'mrlonzanida08', '102518'),
(8, 'Jeffrey Lonzanida', 'mrlonzanida', '102518');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
