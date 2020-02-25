-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 04:00 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `save`
--

CREATE TABLE `save` (
  `saveId` int(11) NOT NULL,
  `saveDate` date NOT NULL,
  `start` int(11) NOT NULL,
  `deposit` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `trackerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trackers`
--

CREATE TABLE `trackers` (
  `trackerId` int(11) NOT NULL,
  `trackerName` varchar(50) NOT NULL,
  `trackerType` varchar(10) NOT NULL,
  `trackerCategory` varchar(50) NOT NULL,
  `interest` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `goal` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trackers`
--

INSERT INTO `trackers` (`trackerId`, `trackerName`, `trackerType`, `trackerCategory`, `interest`, `term`, `goal`, `userId`) VALUES
(2, 'Wish List', 'save', 'Cruise', 5, 60, 100000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `userId` int(11) NOT NULL,
  `userFirstName` varchar(50) NOT NULL,
  `userLastName` varchar(50) NOT NULL,
  `userEmail` varchar(75) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userLevel` enum('1','2','3') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`userId`, `userFirstName`, `userLastName`, `userEmail`, `userPassword`, `userLevel`) VALUES
(3, 'Captain', 'America', 'Captain@avengers.com', '$2y$10$fxY07ZE.zBN9sS4w0lnAkuPRn5FhN9Htx9fnBJ1gSE8rf.wkH5omW', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `save`
--
ALTER TABLE `save`
  ADD PRIMARY KEY (`saveId`),
  ADD KEY `FK_trackerId` (`trackerId`);

--
-- Indexes for table `trackers`
--
ALTER TABLE `trackers`
  ADD PRIMARY KEY (`trackerId`),
  ADD KEY `FK_userId` (`userId`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `save`
--
ALTER TABLE `save`
  MODIFY `saveId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trackers`
--
ALTER TABLE `trackers`
  MODIFY `trackerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `save`
--
ALTER TABLE `save`
  ADD CONSTRAINT `FK_trackerId` FOREIGN KEY (`trackerId`) REFERENCES `trackers` (`trackerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trackers`
--
ALTER TABLE `trackers`
  ADD CONSTRAINT `FK_userId` FOREIGN KEY (`userId`) REFERENCES `user_data` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
