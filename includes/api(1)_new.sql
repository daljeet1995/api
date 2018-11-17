-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2018 at 12:05 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dolly_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `mobile`, `password`) VALUES
(1, 'daljeet', 'daljeet@technokriti.in', '9876543212', 'ZGFsamVldEAxMjM='),
(2, 'daljeet', 'ds025272@gmail.com', '9876543212', 'MTIzNDU2'),
(3, 'daljeet', 'daljeet@technokriti.in', '9876543212', 'ZGFsamVldA==');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `location` text NOT NULL,
  `pickup_pincode` text NOT NULL,
  `parking_facility` enum('0','1') DEFAULT '0',
  `BHK_Status` varchar(100) NOT NULL,
  `floor` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pickup_address` text NOT NULL,
  `drop_location_address` text NOT NULL,
  `drop_pincode` text NOT NULL,
  `drop_floor` int(10) NOT NULL,
  `drop_parking` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `rating` int(10) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `lat`, `lng`, `location`, `pickup_pincode`, `parking_facility`, `BHK_Status`, `floor`, `date`, `pickup_address`, `drop_location_address`, `drop_pincode`, `drop_floor`, `drop_parking`, `name`, `rating`, `description`) VALUES
(1, 28.7041, 77.1025, 'East Delhi', '110053', '1', '2 BHK', 2, '2018-11-15 09:58:20', 'south delhi', 'west delhi', '110092', 2, '0', 'Karan Kapoor', 4, 'Lorem Ipsum is simply dummy text of the printing'),
(46, 28.6433, 77.3382, '', '', '0', '', 0, '2018-11-15 12:40:05', '', '', '', 0, '0', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE `deal` (
  `id` bigint(20) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `professional` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal`
--

INSERT INTO `deal` (`id`, `business_name`, `introduction`, `experience`, `professional`, `description`) VALUES
(1, 'Karan Kapoor', 'Lorem  Ipsum  is  simply  dummy  text of  the  printing  and  typesetting industry.', '6 Years', 'Firm', 'Lorem  Ipsum  is  simply  dummy  text of  the  printing  and  typesetting industry.Lorem  Ipsum  is  simply dummy  text  of  the  printing  and typesetting industry.Lorem Ipsum is simply  dummy  text  of  the  printing and typesetting industry.  '),
(2, 'daljeet singh', 'This is for Testing purpose. ', 'demo', 'web ', 'this is for deal for the package and movers');

-- --------------------------------------------------------

--
-- Table structure for table `deal_img`
--

CREATE TABLE `deal_img` (
  `id` bigint(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal_img`
--

INSERT INTO `deal_img` (`id`, `image`) VALUES
(1, 'images/one.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `my_booking`
--

CREATE TABLE `my_booking` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_booking`
--

INSERT INTO `my_booking` (`id`, `name`, `rating`, `description`, `image`, `timestamp`) VALUES
(1, 'Karan Kapoor', 4, 'Lorem Ipsum is simply dummy text of the printing', '', '2018-11-08 10:15:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal_img`
--
ALTER TABLE `deal_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_booking`
--
ALTER TABLE `my_booking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deal_img`
--
ALTER TABLE `deal_img`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `my_booking`
--
ALTER TABLE `my_booking`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
