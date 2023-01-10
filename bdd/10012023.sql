-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 07:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checkin`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `date`, `status`) VALUES
(1, 1, '2023-01-10 18:08:57', 1),
(2, 2, '2023-01-10 18:09:11', 1),
(3, 1, '2023-01-10 18:14:16', 1),
(4, 1, '2023-01-10 18:14:17', 1),
(5, 1, '2023-01-10 18:14:19', 1),
(6, 1, '2023-01-10 18:17:15', 0),
(7, 1, '2023-01-10 18:17:16', 1),
(8, 1, '2023-01-10 18:17:17', 0),
(9, 1, '2023-01-10 18:17:18', 1),
(10, 1, '2023-01-10 18:17:19', 0),
(11, 2, '2023-01-10 18:17:27', 0),
(12, 2, '2023-01-10 18:17:28', 1),
(13, 2, '2023-01-10 18:17:29', 0),
(14, 2, '2023-01-10 18:17:30', 1),
(15, 2, '2023-01-10 18:17:30', 0),
(16, 2, '2023-01-10 18:30:08', 1),
(17, 2, '2023-01-10 18:30:15', 0),
(18, 2, '2023-01-10 18:30:17', 1),
(19, 2, '2023-01-10 18:30:18', 0),
(20, 2, '2023-01-10 18:30:19', 1),
(21, 2, '2023-01-10 18:30:20', 0),
(22, 2, '2023-01-10 18:30:22', 1),
(23, 2, '2023-01-10 18:30:23', 0),
(24, 1, '2023-01-10 18:46:46', 1),
(25, 1, '2023-01-10 19:07:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `phone` int(11) NOT NULL,
  `actif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `date`, `phone`, `actif`) VALUES
(1, 'alaa', '2023-01-10 18:10:30', 123456789, 1),
(2, 'imad', '2023-01-10 18:10:30', 987654321, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
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
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
