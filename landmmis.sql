-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 10:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landmmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `acquisition`
--

CREATE TABLE `acquisition` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acquisition`
--

INSERT INTO `acquisition` (`id`, `name`) VALUES
(1, 'By Acquistion'),
(2, 'By Purchase'),
(3, 'By Lease');

-- --------------------------------------------------------

--
-- Table structure for table `application_status`
--

CREATE TABLE `application_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_status`
--

INSERT INTO `application_status` (`id`, `name`) VALUES
(1, 'Initiated'),
(2, 'Submitted'),
(3, 'Surveyor Assigned'),
(4, 'Approved'),
(5, 'Rejected'),
(6, 'Pending Approval'),
(7, 'Registered');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `surname` varchar(191) NOT NULL,
  `other_name` varchar(191) NOT NULL,
  `identification_type` int(10) NOT NULL,
  `identification_no` varchar(15) NOT NULL,
  `phone_no` char(10) NOT NULL DEFAULT '0000000000',
  `address` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `account_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated-at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `surname`, `other_name`, `identification_type`, `identification_no`, `phone_no`, `address`, `email`, `password`, `account_status`, `created_at`, `updated-at`) VALUES
(1, 'Raphael', 'Adinkrah', '', 2, '0', '0509228314', 'P.O. BOX HP 1128\r\nVH-0523-0520', 'sefakorhom2012@gmail.com', '$2y$10$DWCIWQZjjXPliDZp8Ya3qegqHzrfw3HeN3zqhYJ/R4RiPDEC/NJeW', 1, '2020-07-06 18:54:22', NULL),
(2, 'Raphael', 'Adinkrah', 'Borbodzi', 1, '0', '0509228314', 'P.O. BOX HP 1128\r\nVH-0523-0520', 'sefakorhom2012@gmail.com', '$2y$10$5CAnWXrpxLb/QdBKVpA7recIiHfdPXof2Cva11.aSWv2x1k0GRYGi', 1, '2020-07-06 18:59:14', NULL),
(3, 'Raphael', 'Adinkrah', '', 2, '0', '0509228314', 'P.O. BOX HP 1128\r\nVH-0523-0520', 'sefakorhom2012@gmail.com', '$2y$10$RCrRHpGM28JOtlAPnaSLluGSaRXFECsP4TFuDqkFt..a/5LNgCDBa', 1, '2020-07-06 19:01:33', NULL),
(4, 'Kasu', 'Worlanyo', 'Kofi', 1, '0', '8854573358', '6th Avenue', 'kofi@me.com', '$2y$10$sh/S2h.r08mm72MRI.t37O6pfPhEPiU1DURl1gdWGI3BuNsLdmOIa', 1, '2020-07-07 08:19:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `client_id`, `name`, `file`, `description`, `status_id`, `created_at`) VALUES
(1, 1, 'Bhadcasts', 'EMPLOYMENT OFFER.pdf', 'pload all the neccesary documents fot the registration of the land', 1, '2020-07-07 06:58:50'),
(2, 1, 'Bsc Information Technology ', 'screencapture-localhost-karistech-qrcode2-2020-07-02-21_29_54.pdf', 'dafdffdfdffd', 1, '2020-07-07 07:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `identification_type`
--

CREATE TABLE `identification_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identification_type`
--

INSERT INTO `identification_type` (`id`, `name`) VALUES
(1, 'National ID'),
(2, 'Voters ID'),
(3, 'Driving License'),
(4, 'National Health Insurance');

-- --------------------------------------------------------

--
-- Table structure for table `land_applications`
--

CREATE TABLE `land_applications` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `land_location` varchar(191) NOT NULL,
  `name_of_owner` varchar(191) NOT NULL,
  `means_of_acquisition` int(11) NOT NULL,
  `surveyor` varchar(191) NOT NULL,
  `surveyor_license_id` varchar(8) NOT NULL,
  `witness` varchar(191) NOT NULL,
  `witness_phone` char(10) NOT NULL DEFAULT '0000000000',
  `officer_id` int(11) DEFAULT NULL,
  `application_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `land_applications`
--

INSERT INTO `land_applications` (`id`, `client_id`, `land_location`, `name_of_owner`, `means_of_acquisition`, `surveyor`, `surveyor_license_id`, `witness`, `witness_phone`, `officer_id`, `application_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ho Bankoe', 'Raphael Yao  ', 2, 'Seth megbetor', '56674887', 'Kasu Ben', '8854573358', 2, 7, '2020-07-07 01:03:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `land_location`
--

CREATE TABLE `land_location` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `perimeter` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `land_location`
--

INSERT INTO `land_location` (`id`, `client_id`, `perimeter`, `longitude`, `latitude`, `status`, `created_at`) VALUES
(1, 1, '6.611944, 0.470278', '688477', '688477', 1, '2020-07-07 06:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `momo_number` char(10) NOT NULL DEFAULT '0000000000',
  `account_name` varchar(191) NOT NULL,
  `amount` float NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `application_id`, `client_id`, `momo_number`, `account_name`, `amount`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0509228314', 'MOTTEY SHINE', 100, 2, '2020-07-07 23:23:00', '2020-07-08 01:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `name`) VALUES
(1, 'Pending Approval'),
(2, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `read_status`
--

CREATE TABLE `read_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_role` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `other_name` varchar(50) NOT NULL,
  `phone_no` char(10) NOT NULL DEFAULT '0000000000',
  `address` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `account_status` int(11) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role`, `first_name`, `surname`, `other_name`, `phone_no`, `address`, `email`, `account_status`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Setri', 'Fugar', 'Borbodzi', '0509228314', 'P.O. BOX HP 11', 'setri@me.com', 1, '$2y$10$nyK2gZ4VsAK3NTjbuGBdcOyL9oYPEDfoH1XJ2lMkWOtSn/SHKq4pS', '2020-07-06 13:31:46', NULL),
(2, 2, 'Wallas', 'Kasu', '', '0509228314', 'P.O. BOX HP 28', 'kasu@me.com', 2, '$2y$10$qesMHBz/AtLpK5Cus2KSauDdLbDqEgp2VdrKL4iHmNCiPp/a3hI8.', '2020-07-06 16:59:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Surveyor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acquisition`
--
ALTER TABLE `acquisition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_status`
--
ALTER TABLE `application_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identification_type`
--
ALTER TABLE `identification_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_applications`
--
ALTER TABLE `land_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_location`
--
ALTER TABLE `land_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `read_status`
--
ALTER TABLE `read_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acquisition`
--
ALTER TABLE `acquisition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `application_status`
--
ALTER TABLE `application_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `identification_type`
--
ALTER TABLE `identification_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `land_applications`
--
ALTER TABLE `land_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `land_location`
--
ALTER TABLE `land_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `read_status`
--
ALTER TABLE `read_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
