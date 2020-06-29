-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 01:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graduates`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) NOT NULL,
  `courseName` varchar(70) NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courseName`) VALUES
(1, 'Bsc Commerce'),
(2, 'Bsc Civil Engineering'),
(3, 'Bsc Business Administration'),
(4, 'Bsc Purchasing And Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) NOT NULL,
  `Name` varchar(70) NOT NULL DEFAULT ' ',
  `regNo` varchar(70) NOT NULL DEFAULT ' ',
  `nationalId` varchar(10) NOT NULL DEFAULT ' ',
  `isActive` bit(1) NOT NULL DEFAULT b'0',
  `course` varchar(70) NOT NULL DEFAULT '',
  `amount` decimal(18,2) NOT NULL DEFAULT '0.00',
  `status` varchar(20) NOT NULL DEFAULT '',
  `isGownIssued` bit(1) NOT NULL DEFAULT b'0',
  `isGownReturned` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Name`, `regNo`, `nationalId`, `isActive`, `course`, `amount`, `status`, `isGownIssued`, `isGownReturned`) VALUES
(1, 'Mark Odhiambo', 'tuk00001', '32908786', b'1', 'Bsc Commerce', '0.00', 'Cleared', b'0', b'1'),
(2, 'Lucy Njeri', 'tuk00002', '33408786', b'1', 'Bsc Civil Engineering', '5000.00', 'Not Cleared', b'0', b'0'),
(3, 'Moses Kamau', 'tuk00003', '32908787', b'1', 'Bsc Business Administration', '7000.00', 'Not Cleared', b'1', b'0'),
(4, 'Cynthia Ndanu', 'tuk00004', '32907587', b'1', 'Bsc Purchasing AND Supplies', '5000.00', 'Not Cleared', b'1', b'0'),
(5, 'Moses Musyoka', 'tuk00006', '37281929', b'1', 'Bsc Civil Engineering', '2000.00', 'Not Cleared', b'1', b'0'),
(6, 'MICHAEL OTIENO', 'tuk00008', '37281931', b'1', 'Bsc Civil Engineering', '0.00', 'Cleared', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `systemusers`
--

CREATE TABLE `systemusers` (
  `id` bigint(20) NOT NULL,
  `UserName` varchar(70) NOT NULL DEFAULT ' ',
  `userPassword` varchar(70) NOT NULL DEFAULT ' ',
  `userId` varchar(10) NOT NULL DEFAULT ' ',
  `isActive` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systemusers`
--

INSERT INTO `systemusers` (`id`, `UserName`, `userPassword`, `userId`, `isActive`) VALUES
(1, 'SA', '123456', '0001', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemusers`
--
ALTER TABLE `systemusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `systemusers`
--
ALTER TABLE `systemusers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
