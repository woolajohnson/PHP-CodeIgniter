-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 18, 2024 at 04:54 PM
-- Server version: 8.2.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportsplayersdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

DROP TABLE IF EXISTS `sports`;
CREATE TABLE IF NOT EXISTS `sports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sport_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `sport_name`, `created_at`, `updated_at`) VALUES
(1, 'Basketball', '2024-02-18 20:54:09', '2024-02-18 20:54:09'),
(2, 'Volleyball', '2024-02-18 20:54:09', '2024-02-18 20:54:09'),
(3, 'Baseball', '2024-02-18 20:54:09', '2024-02-18 20:54:09'),
(4, 'Soccer', '2024-02-18 20:54:09', '2024-02-18 20:54:09'),
(5, 'Football', '2024-02-18 20:54:09', '2024-02-18 20:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Emma Johnson', 'female', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(2, 'Liam Jackson', 'male', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(3, 'Noah Harris', 'male', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(4, 'Olivia Miller', 'female', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(5, 'Ava White', 'female', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(6, 'Ethan Wilson', 'male', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(7, 'Mason Cooper', 'male', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(8, 'Mia Brown', 'female', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(9, 'Sophia Davis', 'female', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(10, 'Isabella Martinez', 'female', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(11, 'Lucas Martinez', 'male', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(12, 'Harper Taylor', 'female', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(13, 'Amelia Smith', 'female', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(14, 'Oliver Thompson', 'male', '2024-02-18 20:20:03', '2024-02-18 20:20:03'),
(15, 'Evelyn Anderson', 'female', '2024-02-18 20:21:34', '2024-02-18 20:21:34'),
(16, 'Elijah Clark', 'male', '2024-02-18 20:21:34', '2024-02-18 20:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_sports`
--

DROP TABLE IF EXISTS `user_sports`;
CREATE TABLE IF NOT EXISTS `user_sports` (
  `user_id` int NOT NULL,
  `sport_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_sports`
--

INSERT INTO `user_sports` (`user_id`, `sport_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 2),
(3, 5),
(4, 1),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 5),
(7, 2),
(7, 3),
(8, 4),
(8, 5),
(9, 1),
(9, 3),
(10, 3),
(10, 4),
(11, 1),
(11, 2),
(11, 5),
(12, 2),
(12, 4),
(13, 3),
(13, 5),
(14, 1),
(15, 4),
(15, 5),
(16, 1),
(16, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
