-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2018 at 04:41 AM
-- Server version: 5.6.35
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drivesafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `point_table`
--

CREATE TABLE IF NOT EXISTS `point_table` (
  `type_id` int(255) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `point` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point_table`
--

INSERT INTO `point_table` (`type_id`, `type_name`, `point`) VALUES
(1, 'General Fine', 20),
(2, 'Using Hydraulic Horn', 10),
(3, 'Disobey Police Order, Refuse to Cooperate', 50),
(4, 'Disobeying Red Signal', 50),
(5, 'Careless Driving', 30),
(6, 'Accident Related Fine', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `point_table`
--
ALTER TABLE `point_table`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `point_table`
--
ALTER TABLE `point_table`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
