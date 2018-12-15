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
-- Table structure for table `administration`
--

CREATE TABLE IF NOT EXISTS `administration` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_num` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `owner_mob_num` varchar(255) NOT NULL,
  `vehicles_num` varchar(255) NOT NULL,
  `licence_num` varchar(255) NOT NULL,
  `points` int(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `mobile_num`, `password`, `owner_mob_num`, `vehicles_num`, `licence_num`, `points`, `status`) VALUES
(1, 'Abdul Karim', '8801730898278', '12345', '8801670756941', 'DHK-GHA 11-2512', 'DK-007156A2264', 500, 0),
(2, 'Rahim Mia', '123123123635', '1f32aa4c9a1d2ea010adcf2348166a04', '321321321321', 'SYL-KA 11-5162', 'DK-123654A8921', 300, 0),
(3, 'Saidur Rahman', '8801534893513', '12345', '8801670756941', 'SYL-GHA 15-0506', 'DK-125LC320420629', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE IF NOT EXISTS `incident` (
  `id` int(255) NOT NULL,
  `vehicles_num` varchar(255) NOT NULL,
  `driver_lic_num` varchar(255) NOT NULL,
  `incident_type_id` int(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `reporter_id` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`id`, `vehicles_num`, `driver_lic_num`, `incident_type_id`, `place`, `summary`, `time`, `date`, `reporter_id`) VALUES
(1, 'SYL-KA 11-5162', '', 1, 'Sylhet', 'Enter In Wrong Side of the Road', '03:48:30', '2018-12-11', 1),
(2, 'DHK-GHA 11-2512', 'DK-007156A2264', 1, 'Sylhet', 'Wrong Side', '08:35:02', '2018-12-11', 1),
(3, 'DHK-GHA 11-2512', 'DK-007156A2264', 1, 'Sylhet', 'Helll', '08:42:27', '2018-12-11', 1),
(4, 'DHK-GHA 11-2512', 'DK-007156A2264', 4, 'Sylhet', 'yuyuyu', '10:16:26', '2018-12-11', 1),
(5, 'DHK-GHA 11-2512', 'DK-007156A2264', 5, 'Sylhet', 'erwvs sss', '10:22:44', '2018-12-11', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `reporters`
--

CREATE TABLE IF NOT EXISTS `reporters` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reporters`
--

INSERT INTO `reporters` (`id`, `name`, `username`, `password`, `place`) VALUES
(1, 'Azharul Islam', 'azharul', '12345', 'Sylhet, BD'),
(2, 'Foysol Ahmed', 'foysol', '12345', 'Sylhet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_table`
--
ALTER TABLE `point_table`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `reporters`
--
ALTER TABLE `reporters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `point_table`
--
ALTER TABLE `point_table`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reporters`
--
ALTER TABLE `reporters`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
