-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 11:55 AM
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
-- Database: `adhdj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$10$6HqW7CPm69n.6rrUSRxOWOgriiQCXc.4NJKcPbA.JM97jsV78SoWW', 'admin@example.com', '2024-11-18 16:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `class`, `email`, `created_at`) VALUES
(1, 'Alice Johnson', 'Class 1A', 'alice@example.com', '2024-11-18 16:59:06'),
(2, 'Bob Smith', 'Class 1B', 'bob@example.com', '2024-11-18 16:59:06'),
(3, 'Charlie Brown', 'Class 2A', 'charlie@example.com', '2024-11-18 16:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'wyujwi', 'ajsish@gmail.com', '$2y$10$5k22v5Pl.8ydrEfDVkpNMOiS/WLoEzv4XzGF/Wd.z.5YmyTz5WKNO', '2024-11-18 16:31:05'),
(2, 'alot', 'email@gmail.com', '$2y$10$GFZXt6oQyeWr0j0IX6pIpO7M1J97OknwBvdzqAiC5QwrNVP.60ue2', '2024-11-18 16:33:05'),
(3, 'alots', 'sksh@gmail.com', '$2y$10$XBiHxoZ12kS8KsNEfqNuCOVnN1sV290aTeBau2ODMrYpFcwjMGjwK', '2024-11-18 16:35:03'),
(5, 'alotsw', 'sjgk@gmail.com', '$2y$10$jWwWOH0svpLjdv0Slb7DK.ISaHD2x.dlNuMmRJxzYTHyMNAUmEpuW', '2024-11-18 16:36:37'),
(6, 'kjefywu', 'kndfgfub@gmail', '$2y$10$DlZydrt44syuhga23xwdXuN3WCG.3IP7cZ5BeiZ0fkYMHNW21.1lW', '2024-11-18 16:39:11'),
(7, 'fugdvsih', 'iodhfiovwuf@gmail.com', '$2y$10$/SBsUlBfkmTms0roQGSSpu6wQSd/hE3q7LftRuYneELR.5Uxx5Ece', '2024-11-18 16:52:39'),
(8, 'eeheue', 'chuxshdh@gmai9l.com', '$2y$10$NPC.dR9zoReF5ve9XphL4OZ.JxouPC6ud7ZegzoeZG2lqaChmtnh6', '2024-11-18 17:20:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
