-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2021 at 02:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zeta_cholera-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cholera_alert`
--

CREATE TABLE `cholera_alert` (
  `id` int(11) NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_cases` int(10) NOT NULL,
  `below_5` int(10) NOT NULL,
  `above_5` int(10) NOT NULL,
  `adults` int(10) NOT NULL,
  `total_deaths` int(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_reported` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cholera_alert`
--

INSERT INTO `cholera_alert` (`id`, `region`, `district`, `village`, `total_cases`, `below_5`, `above_5`, `adults`, `total_deaths`, `date_created`, `date_reported`, `status`, `created_by`) VALUES
(11, 'Nairobi', 'Gucha', 'Bomagena', 12, 63, 6, 36, 3, '2021-04-12 10:05:00', '2021-04-12 00:00:00', 1, 2),
(12, 'Western', '4', '6', 6, 6, 6, 6, 6, '2021-04-12 11:51:00', '2021-04-12 00:00:00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `report_status`
--

CREATE TABLE `report_status` (
  `id` int(11) NOT NULL,
  `stat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_status`
--

INSERT INTO `report_status` (`id`, `stat`) VALUES
(1, 'Awaiting approval'),
(2, 'Approved\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `zeta_users`
--

CREATE TABLE `zeta_users` (
  `user_id` int(11) NOT NULL,
  `Firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zeta_users`
--

INSERT INTO `zeta_users` (`user_id`, `Firstname`, `Lastname`, `Email`, `Password`, `user_type`) VALUES
(1, 'Rabin', 'Nyaundi', 'test@gmail.com', '123456', 0),
(2, 'Nyaundi', 'Rabin', 'test2@gmail.com', '123456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cholera_alert`
--
ALTER TABLE `cholera_alert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`created_by`),
  ADD KEY `status_id` (`status`);

--
-- Indexes for table `report_status`
--
ALTER TABLE `report_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zeta_users`
--
ALTER TABLE `zeta_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Lastname` (`Lastname`),
  ADD UNIQUE KEY `Lastname_2` (`Lastname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cholera_alert`
--
ALTER TABLE `cholera_alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `report_status`
--
ALTER TABLE `report_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zeta_users`
--
ALTER TABLE `zeta_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cholera_alert`
--
ALTER TABLE `cholera_alert`
  ADD CONSTRAINT `status_id` FOREIGN KEY (`status`) REFERENCES `report_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
