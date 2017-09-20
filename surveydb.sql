-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 20, 2017 at 11:20 AM
-- Server version: 10.0.31-MariaDB
-- PHP Version: 7.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `ID` bigint(20) NOT NULL,
  `AREA` float(20,5) DEFAULT NULL,
  `PRICE` float(20,5) DEFAULT NULL,
  `DEPOSIT` float(30,5) DEFAULT NULL,
  `LEASE_PERIOD` int(11) DEFAULT NULL,
  `Lid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`ID`, `AREA`, `PRICE`, `DEPOSIT`, `LEASE_PERIOD`, `Lid`) VALUES
(1, 20000.00000, 47.00000, 6755.00000, 766, 1),
(2, 6756.00000, 8987.00000, 979.00000, 8, 2),
(3, 5445.00000, 675.00000, 656.00000, 5, 1),
(4, 6756.00000, 8987.00000, 979.00000, 8, 1),
(5, 5445.00000, 675.00000, 656.00000, 5, 2),
(6, 6475.00000, 56578.00000, 7868.00000, 868, 2),
(7, 6756.00000, 65757.00000, 6575.00000, 6756, 2);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) NOT NULL,
  `location` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `location`) VALUES
(1, 'Kalyan Nagar'),
(2, 'HSR Layout'),
(4, 'BTM Layout'),
(5, 'Indiranagar'),
(6, 'RT Nagar'),
(7, 'KR pate'),
(8, 'HAL');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `location` varchar(500) DEFAULT NULL,
  `area` float(20,5) DEFAULT NULL,
  `price` float(20,5) DEFAULT NULL,
  `deposit` float(20,5) DEFAULT NULL,
  `lease_period` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `location`, `area`, `price`, `deposit`, `lease_period`) VALUES
(37, 'hsr', 23.00000, 5.34783, 3345.00000, 23),
(38, 'kalyan nagar', 23.00000, 34.30435, 456.00000, 44),
(39, 'hsr', 45.00000, 1.48889, 89.00000, 67),
(40, 'dfhf', 398.00000, 0.02261, 999.00000, 6767),
(41, 'btm', 9979.00000, 0.89979, 87987.00000, 8787),
(42, 'hsr kdjaf', 395637.00000, 22.21149, 89798.00000, 87987),
(43, 'BTM', 983563.00000, 1.00098, 8988988.00000, 6),
(44, 'btm', 567.00000, 0.80423, 34.00000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
