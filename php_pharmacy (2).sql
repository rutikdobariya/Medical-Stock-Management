-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 04:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `customer_name` varchar(512) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `item` int(255) NOT NULL,
  `amount` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_contact`, `customer_email`, `item`, `amount`) VALUES
(1, 'Dharmik1', '5214562145', 'dharmik@gmail.com', 0, 0),
(2, 'Rutik', '9979004452', 'rutu.rmd2020@gmail.com', 0, 0),
(3, 'Rutik', '9979004452', 'rutu.rmd2020@gmail.com', 0, 0),
(4, 'Rutik', '75245', 'rutu.rmd2020@gmail.com', 1, 374),
(5, 'Rutik', '5646', 'rutu.rmd2020@gmail.com', 2, 8878),
(6, 'Rutik', '9854761020', 'rutu.rmd2020@gmail.com', 2, 1481);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(255) NOT NULL,
  `medicine_code` int(255) NOT NULL,
  `medicine_name` varchar(512) NOT NULL,
  `medicine_price` bigint(255) NOT NULL,
  `medicine_quantity` bigint(255) NOT NULL,
  `company_name` varchar(512) NOT NULL,
  `category` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `medicine_code`, `medicine_name`, `medicine_price`, `medicine_quantity`, `company_name`, `category`) VALUES
(1, 1017, 'Fasigym', 35, 5, 'Pfizer Ltd.', 'Capsule'),
(2, 1001, 'Metasine', 15, 23, 'Metasine', 'Tablet'),
(4, 1002, 'perasitamol', 89, 85, 'perasitamol', 'Capsule'),
(5, 1016, 'Acem', 56, 57, 'Emcure Pharm Ltd.', 'Syrup'),
(6, 1005, 'ORX', 15, 15, 'Pharma', 'Syrup'),
(7, 1006, 'Taibitol', 50, 150, 'PCI', 'Tablet'),
(8, 1007, 'Trip', 35, 70, 'Pfizer Ltd.', 'Capsule'),
(10, 1008, 'Pronil', 10, 25, 'PIL Pharmacia India Ltd.', 'Capsule'),
(12, 1009, 'Dan', 15, 20, 'Unison Pharm.', 'Syrup'),
(13, 1010, 'Eltroxin', 15, 21, 'Noartis', 'Syrup');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(255) NOT NULL,
  `medicine_id` int(255) NOT NULL,
  `company_name` varchar(512) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `alternate_contact_no` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `medicine_id`, `company_name`, `email`, `contact_no`, `alternate_contact_no`, `company_address`) VALUES
(1, 2, 'Infar', 'pujanmevawala@gmail.com', '9856748954', '1568745996', '98, Britan Commpaney'),
(2, 6, 'PCI', 'rutu.rmd2020@gmail.com', '9979004452', '9979904452', '94, Santiniketan Society'),
(3, 12, 'DWN Pharm.', 'jenil@gmail.com', '9874856895', '8965748591', '90, Hello'),
(4, 10, 'Novarits', 'dharmik@gmail.com', '8957489658', '9874859784', '90, Saligram'),
(5, 1, 'Aarpik Remedies', 'sagar@gmail.com', '9257462105', '9847630257', '97, Santiniketan'),
(6, 4, 'Infar', 'dhruv@gmail.com', '8957489657', '9658748596', '90, Shomeshwer'),
(7, 5, 'Glaxo Smithkline', 'nitin@gmail.com', '8954789657', '8954789657', '56, Jivandhara'),
(8, 12, 'Targotf Pure Drugs Ltd.', 'manish@gmail.com', '8547458547', '8547458547', '86, Navkar'),
(12, 7, 'Placentia', 'plant@gmail.com', '9587456899', '8547896325', '243, NavKar'),
(13, 8, 'Osper', 'osper@gmail.com', '9563214785', '8965478120', 'Glaxio Street, Near Infer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `email`, `mobile_number`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(65, 'user', 'Rutik Dobariya', 'rutu.rmd2020@gmail.com', '9979004452', '94, Santiniketan Society                            ', NULL, 'rutu.rmd2020@gmail.com', NULL, NULL, NULL),
(66, 'admin', 'Pujan', 'pujanmevawala@gmail.com', '9089078967', '793, Alaknanda                             ', NULL, 'pujanmevawala@gmail.com', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `1` (`medicine_code`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_id` (`medicine_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
