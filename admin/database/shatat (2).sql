-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 09:17 PM
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
-- Table structure for table `ask_help`
--

CREATE TABLE `ask_help` (
  `help_id` int(3) NOT NULL,
  `rest_id` int(3) NOT NULL,
  `table_id` int(3) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_image` varchar(50) NOT NULL,
  `rest_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `rest_id`) VALUES
(2, 'Salad', 'salad.jfif', 2),
(3, 'Sea Food', 'seafood.jpg', 2),
(4, 'Chicken', 'chicken.jpg', 2),
(5, 'Fresh Juices', 'download.jfif', 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(3) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `item_desc` varchar(50) NOT NULL,
  `item_image` varchar(50) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `rest_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_price`, `item_desc`, `item_image`, `cat_id`, `rest_id`) VALUES
(2, 'Orange Juice ', '2.5', 'Fresh Orange Juice', 'pexels-jeshoots-3642-1.jpg', 5, 2),
(3, 'Chicken Brest', '5.5', 'fresh chicken brest with rice and ', 'chicken brest.jpg', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) NOT NULL,
  `order_date` date NOT NULL,
  `rest_id` int(3) NOT NULL,
  `table_id` int(3) NOT NULL DEFAULT 1,
  `order_status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `rest_id`, `table_id`, `order_status`) VALUES
(10, '2021-06-18', 2, 2, 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(3) NOT NULL,
  `order_id` int(3) NOT NULL,
  `item_id` int(3) NOT NULL,
  `qty` int(3) NOT NULL,
  `total` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `item_id`, `qty`, `total`) VALUES
(7, 10, 3, 2, '0');

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
(2, 'ahmad@gmail.com', '123456', 'ahmad', 'Qatar', '079996633'),
(3, 'abed2@gmail.com', '123456', 'abed', 'abed', '0787877444');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(3) NOT NULL,
  `rest_id` int(3) NOT NULL,
  `device_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `rest_id`, `device_number`) VALUES
(3, 2, 'S123456'),
(4, 2, 'S2222'),
(5, 2, 'S3333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ask_help`
--
ALTER TABLE `ask_help`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `resturants`
--
ALTER TABLE `resturants`
  ADD PRIMARY KEY (`rest_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ask_help`
--
ALTER TABLE `ask_help`
  MODIFY `help_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resturants`
--
ALTER TABLE `resturants`
  MODIFY `rest_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
