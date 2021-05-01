-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 11:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shatat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_fullname`) VALUES
(1, 'salameh@gmail.com', '123456', 'salameh yaseeeeen'),
(2, 'abood@gmail.com', '123456789', 'Abdelrahman');

-- --------------------------------------------------------

--
-- Table structure for table `resturants`
--

CREATE TABLE `resturants` (
  `rest_id` int(3) NOT NULL,
  `rest_email` varchar(50) NOT NULL,
  `rest_password` varchar(50) NOT NULL,
  `rest_name` varchar(50) NOT NULL,
  `rest_address` varchar(50) NOT NULL,
  `rest_mobile` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resturants`
--

INSERT INTO `resturants` (`rest_id`, `rest_email`, `rest_password`, `rest_name`, `rest_address`, `rest_mobile`) VALUES
(1, 'borak@gmail.com', '123456', 'Borak Bem', 'Dubai - UAE', '0096612478952');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `resturants`
--
ALTER TABLE `resturants`
  ADD PRIMARY KEY (`rest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resturants`
--
ALTER TABLE `resturants`
  MODIFY `rest_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
