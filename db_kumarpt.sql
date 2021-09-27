-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2017 at 05:42 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kumarpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(4) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_input_id` varchar(20) NOT NULL,
  `customer_registration_date` varchar(11) NOT NULL,
  `customer_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repair`
--

CREATE TABLE `tbl_repair` (
  `repair_id` int(4) NOT NULL,
  `customer_id` int(4) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `problem` varchar(30) NOT NULL,
  `imei` varchar(20) NOT NULL,
  `battery_provide` varchar(3) NOT NULL,
  `total_price` float(5,2) NOT NULL,
  `paid_amount` float(5,2) NOT NULL,
  `receive_date` varchar(11) NOT NULL,
  `customer_mobile` varchar(20) NOT NULL,
  `model_no` varchar(20) NOT NULL,
  `extra_problem` varchar(50) NOT NULL,
  `delivery_date` varchar(11) NOT NULL,
  `remark` int(30) NOT NULL,
  `balance_amount` float(5,2) NOT NULL,
  `delivery_status` tinyint(1) NOT NULL DEFAULT '0',
  `from_where` varchar(50) NOT NULL,
  `how_much` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `sales_id` int(5) NOT NULL,
  `sales_date` varchar(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `first_item` varchar(50) DEFAULT NULL,
  `second_item` varchar(50) DEFAULT NULL,
  `third_item` varchar(50) DEFAULT NULL,
  `total_price` float(5,2) NOT NULL,
  `paid_amount` float(5,2) NOT NULL,
  `warranty_end_date` varchar(11) NOT NULL,
  `customer_mobile` varchar(20) NOT NULL,
  `first_price` float(5,2) DEFAULT NULL,
  `second_price` float(5,2) DEFAULT NULL,
  `third_price` float(5,2) DEFAULT NULL,
  `balance_amount` float(5,2) NOT NULL,
  `remark` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(2) NOT NULL,
  `shop_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `shop_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `email`, `password`, `shop_status`) VALUES
(1, 'Admin', 'admin@evis.com', '111111', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_repair`
--
ALTER TABLE `tbl_repair`
  ADD PRIMARY KEY (`repair_id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_repair`
--
ALTER TABLE `tbl_repair`
  MODIFY `repair_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `sales_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
