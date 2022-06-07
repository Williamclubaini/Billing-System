-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 12:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
CREATE DATABASE `billing_system`;
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total_cost` double(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `paid_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer_id`, `product`, `quantity`, `price`, `total_cost`, `status`, `created_date`, `paid_date`) VALUES
(1, 3, 'Sweet Potato Marguerite', 7, 4000.00, 28000.00, 'unpaid', NULL, 'NULL'),
(2, 3, 'Antibiotics Chickens', 7, 15000.00, 105000.00, 'paid', NULL, 'Saturday, April 30, 2022'),
(3, 3, 'Hintergrund Maissamen', 10, 10000.00, 100000.00, 'paid', NULL, 'Sunday, May 01, 2022'),
(4, 3, 'Cassava Stakes', 6, 6000.00, 36000.00, 'paid', NULL, 'Sunday, May 01, 2022'),
(5, 3, 'Hintergrund Maissamen', 3, 10000.00, 30000.00, 'unpaid', NULL, 'NULL'),
(6, 3, 'Hintergrund Maissamen', 5, 10000.00, 50000.00, 'unpaid', NULL, 'NULL'),
(7, 3, 'Sweet Potato Marguerite', 5, 4000.00, 20000.00, 'unpaid', NULL, 'NULL'),
(8, 3, 'Sweet Potato Marguerite', 11, 4000.00, 44000.00, 'unpaid', NULL, 'NULL'),
(9, 3, 'Cassava Stakes', 5, 6000.00, 30000.00, 'unpaid', NULL, 'NULL'),
(10, 3, 'Cassava Stakes', 2, 6000.00, 12000.00, 'unpaid', NULL, 'NULL'),
(11, 3, 'Cow', 6, 75000.00, 450000.00, 'unpaid', NULL, 'NULL'),
(12, 3, 'Antibiotics Chickens', 3, 15000.00, 45000.00, 'unpaid', NULL, 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_request`
--

CREATE TABLE `invoice_request` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_request`
--

INSERT INTO `invoice_request` (`id`, `order_id`) VALUES
(1, 7),
(2, 8),
(3, 13),
(4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(25) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total_cost` double(10,2) NOT NULL,
  `status` varchar(50) NOT NULL COMMENT 'delivered;shipped;cancelled;pending;',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ac_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product`, `price`, `quantity`, `total_cost`, `status`, `order_date`, `ac_date`) VALUES
(1, 3, 'Sweet Potato Marguerite', 4000.00, 7, 28000.00, 'approved', '2022-04-29 22:46:22', 'Saturday, April 30, 2022'),
(2, 3, 'Cassava Stakes', 6000.00, 5, 30000.00, 'approved', '2022-04-29 22:47:47', '2022-05-01 03:09:33'),
(3, 3, 'Antibiotics Chickens', 15000.00, 7, 105000.00, 'approved', '2022-04-29 22:48:02', 'Saturday, April 30, 2022'),
(4, 3, 'Hintergrund Maissamen', 10000.00, 10, 100000.00, 'approved', '2022-04-30 22:17:38', '2022-05-01 00:17:38'),
(5, 3, 'Cassava Stakes', 6000.00, 6, 36000.00, 'approved', '2022-04-30 21:52:29', '2022-05-01 00:22:28'),
(6, 3, 'Sweet Potato Marguerite', 4000.00, 11, 44000.00, 'approved', '2022-04-30 22:13:31', '2022-05-01 03:09:19'),
(7, 3, 'Cow', 75000.00, 6, 450000.00, 'approved', '2022-04-30 22:13:45', '2022-05-01 23:53:57'),
(8, 3, 'Antibiotics Chickens', 15000.00, 3, 45000.00, 'approved', '2022-05-01 00:41:29', '2022-05-01 23:54:28'),
(9, 3, 'Hintergrund Maissamen', 10000.00, 5, 50000.00, 'approved', '2022-05-01 00:43:52', '2022-05-01 03:08:46'),
(10, 3, 'Sweet Potato Marguerite', 4000.00, 5, 20000.00, 'approved', '2022-05-01 00:44:07', '2022-05-01 03:09:02'),
(11, 3, 'Hintergrund Maissamen', 10000.00, 3, 30000.00, 'pending', '2022-05-01 00:48:51', NULL),
(12, 3, 'Hintergrund Maissamen', 10000.00, 3, 30000.00, 'approved', '2022-05-01 00:50:07', '2022-05-01 03:08:30'),
(13, 3, 'Sweet Potato Marguerite', 4000.00, 6, 24000.00, 'pending', '2022-05-01 00:51:38', NULL),
(14, 3, 'Cassava Stakes', 6000.00, 2, 12000.00, 'approved', '2022-05-01 00:52:13', '2022-05-01 13:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `invoice_id` int(50) NOT NULL,
  `account` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `customer_id`, `payment_method`, `invoice_id`, `account`, `date`) VALUES
(1, 3, 'Airtel Money', 1, 2147483647, '2022-04-29 05:14:58'),
(2, 3, 'Airtel Money', 2, 2147483647, '2022-04-29 22:55:04'),
(3, 3, 'Credit Card', 3, 2147483647, '2022-05-01 01:05:21'),
(4, 3, 'TNM Mpamba', 4, 2147483647, '2022-05-01 01:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `price`, `quantity`, `status`) VALUES
(1, 'Antibiotics_Chickens_1500x900.jpg', 'Antibiotics Chickens', 15000.00, NULL, 'Latest'),
(2, '81625405-hintergrund-von-getrockneten-maissamen-landwirtschaftliches-produkt.jpg', 'Hintergrund Maissamen', 10000.00, NULL, NULL),
(3, 'BabyCarobTrees.jpg', 'Carob Trees', 7000.00, NULL, 'Latest'),
(4, 'cassava_stakes.jpg', 'Cassava Stakes', 6000.00, NULL, NULL),
(5, 'sweet-potato-marguerite-500.jpg', 'Sweet Potato Marguerite', 4000.00, NULL, 'Latest'),
(6, 'images.jpg', 'Cow', 75000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `location` varchar(50) NOT NULL,
  `userType` int(5) NOT NULL COMMENT '0 = administrator; 1 = customer;',
  `password` varchar(255) NOT NULL,
  `signindate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `email`, `phone`, `location`, `userType`, `password`, `signindate`) VALUES
(1, 'Wongani Harry', 'Mkandawire', 'wonganiharry@gmail.com', '0992166825', 'Area 25', 0, '8fb94b2d0886944db4e446bd535cf767', '2022-04-24 22:52:02'),
(3, 'William', 'Lubaini', 'lubaini@gmail.com', '09987654321', 'Biwi', 1, 'f3ee53c4fe3243488e29e0d35083351d', '2022-04-29 05:06:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_request`
--
ALTER TABLE `invoice_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoice_request`
--
ALTER TABLE `invoice_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
