-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2016 at 07:20 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelCMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `laravelCMSProducts`
--

CREATE TABLE `laravelCMSProducts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `column_5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `laravelCMSUser`
--

CREATE TABLE `laravelCMSUser` (
  `uId` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `isLoggedIn` bit(1) NOT NULL,
  `isMember` bit(1) DEFAULT NULL,
  `tokenPass` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Users Tabel';

--
-- Dumping data for table `laravelCMSUser`
--

INSERT INTO `laravelCMSUser` (`uId`, `userName`, `fName`, `lName`, `country`, `city`, `address`, `email`, `createdAt`, `isLoggedIn`, `isMember`, `tokenPass`, `password`) VALUES
(3, 'ilanvac', 'ilan', 'vachtel', 'israel', 'holon', 'givat', 'ilanvac@gmail.com', '2016-06-26 21:08:49', b'0', b'1', ')w„‚èk¥?\ré;¯HyÐ,@ü“‚ƒQŽuyoñeÈ@', '00f67e48bccd1c89aa10f14fae0938e3e29e0072');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laravelCMSProducts`
--
ALTER TABLE `laravelCMSProducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelCMSUser`
--
ALTER TABLE `laravelCMSUser`
  ADD PRIMARY KEY (`uId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laravelCMSProducts`
--
ALTER TABLE `laravelCMSProducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laravelCMSUser`
--
ALTER TABLE `laravelCMSUser`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
