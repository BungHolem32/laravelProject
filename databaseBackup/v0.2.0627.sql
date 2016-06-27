-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2016 at 07:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelCrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `laravelCrmUser`
--

CREATE TABLE `laravelCrmUser` (
  `uId` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `isMember` bit(1) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Users Tabel';

--
-- Dumping data for table `laravelCrmUser`
--

INSERT INTO `laravelCrmUser` (`uId`, `userName`, `fName`, `lName`, `country`, `city`, `address`, `email`, `createdAt`, `isMember`, `password`) VALUES
(3, 'ilanvac', 'ilan', 'vachtel', 'israel', 'holon', 'givat', 'ilanvac@gmail.com', '2016-06-26 21:08:49', b'1', '00f67e48bccd1c89aa10f14fae0938e3e29e0072'),
(4, 'ilanvac', 'ilan', 'vachtel', 'israel', 'holon', 'givat', 'ilanvac@gmail.com', '2016-06-26 21:09:33', b'1', '00f67e48bccd1c89aa10f14fae0938e3e29e0072');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laravelCrmUser`
--
ALTER TABLE `laravelCrmUser`
  ADD PRIMARY KEY (`uId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laravelCrmUser`
--
ALTER TABLE `laravelCrmUser`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
