-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 10:56 PM
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
-- Database: `laravel_security_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `mappings`
--

CREATE TABLE `mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_model` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_model` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mappings`
--

INSERT INTO `mappings` (`id`, `from_model`, `from_id`, `to_model`, `to_id`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Employee', 1, 'Department', 1, 0, NULL, NULL),
(2, 'Employee', 1, 'Department', 6, 0, NULL, NULL),
(3, 'Employee', 2, 'Department', 2, 0, NULL, NULL),
(4, 'Employee', 2, 'Department', 5, 0, NULL, NULL),
(5, 'Building', 1, 'Department', 1, 0, NULL, NULL),
(6, 'Building', 1, 'Department', 2, 0, NULL, NULL),
(7, 'Building', 2, 'Department', 3, 0, NULL, NULL),
(8, 'Building', 2, 'Department', 4, 0, NULL, NULL),
(9, 'Building', 3, 'Department', 5, 0, NULL, NULL),
(10, 'Building', 4, 'Department', 1, 0, NULL, NULL),
(11, 'Building', 4, 'Department', 4, 0, NULL, NULL),
(12, 'Building', 5, 'Department', 1, 0, NULL, NULL),
(13, 'Building', 5, 'Department', 4, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mappings`
--
ALTER TABLE `mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mappings_from_model_from_id_to_model_to_id_deleted_index` (`from_model`,`from_id`,`to_model`,`to_id`,`deleted`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mappings`
--
ALTER TABLE `mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
