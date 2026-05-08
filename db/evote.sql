-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 01:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evote`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `election_id` int(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `votes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `user_id`, `election_id`, `photo`, `position`, `added_by`, `votes`) VALUES
(1, 4, 1, '6808b30947e5a.png', 'Guild President', 1, 0),
(2, 5, 1, '6808b37a2554d.png', 'Guild President', 1, 0),
(3, 6, 1, '6808b44e9d6c8.png', 'GRC Faculty of Science', 2, 0),
(4, 7, 1, '6808b59c739da.png', 'GRC Faculty of Science', 2, 0),
(5, 8, 1, '6808b6657f438.png', 'Guild President', 1, 0),
(6, 9, 1, '6808b717cb11a.jpg', 'GRC Faculty of Science', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` int(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `added_by` int(20) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `title`, `status`, `date`, `added_by`, `add_date`) VALUES
(1, '2025 KYU Elections', 0, '2025-04-30', 1, '2025-04-21 09:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(2, 'GRC Faculty of Science'),
(1, 'Guild President');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('voter','candidate','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`) VALUES
(1, 'Namagga Aminah', 'namagga.aminah@stud.umu.ac.ug', '$2y$10$JvI/Orxy3/itA8NawmVTQOHIyCqOqjF4d7FOc4hIanGDkT64bUt2S', 'admin'),
(2, 'Ssali Jovan', '2300812579@std.kyu.ac.ug', '$2y$10$OpW1iLwgCzsIZNRfOFsnEeFDCKktJQikDFKDMICEykIJlt38XqQ4a', 'admin'),
(4, 'Okema Kenneth Oket', '2300811821@std.kyu.ac.ug', '$2y$10$wxoV3zbxNqXJ2pGaNG7AjuHnKnqX07obzqCV9n.Pfay7FOkwyYQDK', 'candidate'),
(5, 'Lubega Peter Patel', '2300807633@std.kyu.ac.ug', '$2y$10$osd/AWuzAIwVDaK87uuGK.fuwK8kaKsb696LpEPyduWk14/99vy/a', 'candidate'),
(6, 'Asiimwe Eldad', '2300804406@std.kyu.ac.ug', '$2y$10$ktsWUNIwIcR6JizQQyQNTOvFuAyhPluFrSc20PhWqGAjpuO0WBIL2', 'candidate'),
(7, 'Nakyomu Mercy', '2300812340@std.kyu.ac.ug', '$2y$10$/1lFWjvqRfCzyqiMVccmruttPn..5CxDN7BZTbkS3cZapiTyC4wyW', 'candidate'),
(8, 'Tumugonza Gloria', '2300812341@std.kyu.ac.ug', '$2y$10$yLb/oilYUzlz8Fdnev882.Z2itjIlmVERz4wJKJG/TM2j7GWcExXG', 'candidate'),
(9, 'Okello Enock', '2300814845@std.kyu.ac.ug', '$2y$10$q0CTDUpir1PgBgbQzWY9GugUHzShZmpf06V/kFkeXbgIfxn05uj4O', 'candidate'),
(10, 'Mugambwa Robert', '2300815378@std.kyu.ac.ug', '$2y$10$Ae3T9wl3KhT2krpNBg6jsu/qnb.U6Ke.Vu0DtBZb2zfWV3E2Ex7F6', 'voter'),
(12, 'Omara Francis Wokorac', '2300812002@std.kyu.ac.ug', '$2y$10$wDHRH7wh1LT.oecpVMlCAe9xLLg6VUmNEKmDhszkax.tH0zG2VOCW', 'voter'),
(14, 'Nantale Leticia', 'nantale.leticia@stud.umu.ac.ug', '$2y$10$3LV1gjArgqbVGswR6e/QyuZqnkj4k7wDI7gcaL6ifsgym2yaYXMba', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `voted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_vote` (`user_id`,`position`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
