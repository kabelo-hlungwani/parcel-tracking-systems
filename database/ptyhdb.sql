-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 06:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptyhdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `id_number`, `gender`, `phone_number`, `email`, `password`) VALUES
(1, 'genaro', 'david', '88010696082', 'Male', '0727780123', 'admin@gmail.com', '12eaab111b446b732cc93aa6ba43cf80');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `c_id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`c_id`, `shipper_id`, `customer_id`, `message`, `date`) VALUES
(1, 0, 1, 'fuck you', '2022-06-25 20:38:27'),
(2, 1, 0, 'helo fffff', '2022-06-25 21:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `id_number`, `gender`, `phone_number`, `email`, `password`, `account_status`) VALUES
(1, 'Jabu', 'Hlungwani', '0412315696082', 'Male', '0727780521', 'mighty@gmail.com', '12eaab111b446b732cc93aa6ba43cf80', '0');

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `parcel_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `parcel_name` varchar(255) NOT NULL,
  `parcel_image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `location_link` varchar(255) NOT NULL,
  `track_key` varchar(255) NOT NULL,
  `dod` date NOT NULL,
  `time` time NOT NULL,
  `delivered` varchar(1) NOT NULL,
  `notification_read` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`parcel_id`, `customer_id`, `shipper_id`, `parcel_name`, `parcel_image`, `description`, `origin`, `destination`, `location_link`, `track_key`, `dod`, `time`, `delivered`, `notification_read`) VALUES
(1, 1, 1, 'Milk', 'IMG-20220613-WA0019-removebg-preview.png', '6 pack of milk 1kg each', 'bloed+street+mall+pretoria', 'crosing+mall+soshanguve', 'https://www.google.com/maps/embed/v1/directions?key=AIzaSyCrTCu8FVMX4YQQSGFA3xhfgs8pDwA12q8&amp;origin=bloed+street+mall+pretoria&amp;destination=crosing+mall+soshanguve&amp;zoom=10', 'https://maps.app.goo.gl/@-26.2122884,28.0303184,15z/data=!3m1!4b1!4m2!7m1!2e1', '2022-06-25', '23:55:44', '1', '0'),
(2, 1, 0, 'Milk', '—Pngtree—vector football_3561832.png', 'milk 6 pack', 'bloed+street+mall+pretoria', 'crosing+mall+soshanguve', 'https://www.google.com/maps/embed/v1/directions?key=AIzaSyCrTCu8FVMX4YQQSGFA3xhfgs8pDwA12q8&amp;origin=bloed+street+mall+pretoria&amp;destination=crosing+mall+soshanguve&amp;zoom=10', 'https://maps.app.goo.gl/u9iy2g4Q5ZFWXu8WA', '0000-00-00', '00:00:00', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `shipper_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipper`
--

INSERT INTO `shipper` (`shipper_id`, `firstname`, `lastname`, `id_number`, `gender`, `phone_number`, `email`, `password`, `account_status`) VALUES
(1, 'lebo', 'Santi', '0412315696082', 'Male', '0727780666', 'lebo.santi@gmail.com', '12eaab111b446b732cc93aa6ba43cf80', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`parcel_id`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`shipper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `parcel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `shipper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
