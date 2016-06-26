-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2016 at 11:17 PM
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
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Users Tabel';

--
-- Dumping data for table `laravelCrmUser`
--

INSERT INTO `laravelCrmUser` (`id`, `email`, `password`) VALUES
(1, 'ilanvac@gmail.com', 'ilanvac'),
(2, 'haimvac@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `laravelCrmUserInfo`
--

CREATE TABLE `laravelCrmUserInfo` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='USer Info';

--
-- Dumping data for table `laravelCrmUserInfo`
--

INSERT INTO `laravelCrmUserInfo` (`id`, `userId`, `firstName`, `lastName`, `address`, `country`) VALUES
(1, 1, 'Ilan', 'Vachtel', 'Givhat hatachmoset 8', 'Israel'),
(2, 2, 'Haim', 'Vachtel', 'Hilazon 4', 'Israel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laravelCrmUser`
--
ALTER TABLE `laravelCrmUser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelCrmUserInfo`
--
ALTER TABLE `laravelCrmUserInfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laravelCrmUser`
--
ALTER TABLE `laravelCrmUser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `laravelCrmUserInfo`
--
ALTER TABLE `laravelCrmUserInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `laravelCrmUserInfo`
--
ALTER TABLE `laravelCrmUserInfo`
  ADD CONSTRAINT `laravelCrmUserInfo_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `laravelCrmUser` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
