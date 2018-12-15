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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
