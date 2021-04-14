-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2021 at 11:44 AM
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
-- Table structure for table `zeta_users`
--

CREATE TABLE `zeta_users` (
  `user_id` int(11) NOT NULL,
  `Firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zeta_users`
--

INSERT INTO `zeta_users` (`user_id`, `Firstname`, `Lastname`, `Email`, `Password`) VALUES
(1, 'Rabin', 'Nyaundi', 'test@gmail.com', '123456'),
(2, 'Nyaundi', 'Rabin', 'test2@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cholera_alert`
--
ALTER TABLE `cholera_alert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`created_by`);

--
-- Indexes for table `zeta_users`
--
ALTER TABLE `zeta_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cholera_alert`
--
ALTER TABLE `cholera_alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

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
  ADD CONSTRAINT `user_id` FOREIGN KEY (`created_by`) REFERENCES `zeta_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
