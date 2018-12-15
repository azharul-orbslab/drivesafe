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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
