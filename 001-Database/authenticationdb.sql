-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2024 at 08:54 AM
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
-- Database: `authenticationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `last_failed` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `contact`, `password`, `salt`, `last_failed`, `created_at`, `updated_at`) VALUES
(1, 'Michael', 'Choi', 'mc@gmail.com', '123213', 'c8027d2f38cbeb5965be1534e382bae8', '4dd8e86cd77f6b8201a818da7286cae695fb0827b726', '2024-02-16 16:47:17', '2024-02-16 13:27:51', '2024-02-16 13:27:51'),
(2, 'Karen', 'Igcasan', 'karen@gmail.com', '09123456789', '700c4ace2fc3931fe4f55a1835167093', '65452e86b15d6773d789b5a7639ce3e9e84a334e2bd6', '0000-00-00 00:00:00', '2024-02-16 14:23:50', '2024-02-16 14:23:50'),
(3, 'Karen', 'Maganda', 'maganda@gmail.com', '09997777777', 'ec81d89a9036162c38902f193ba3ec7e', 'b74a90f0c57bbdd82e5b6cb1b08232046b2e193a538f', '2024-02-16 16:20:35', '2024-02-16 14:26:42', '2024-02-16 14:26:42'),
(4, 'Edward', 'Andrade', 'a@gmail.com', '09888888888', '868894bf8e51e0105910ab61e812c3d5', '8011be2cc6e281c88e8a1a9012cf58b483f270269672', NULL, '2024-02-16 16:38:40', '2024-02-16 16:38:40'),
(5, 'stephen', 'curry', 'curry@gmail.com', '09123456781', '1144805bb008284b10e51710124a885c', '981492d86efd50aafba54ef5a796ebe21f7ecf654d5f', '2024-02-16 16:40:45', '2024-02-16 16:39:53', '2024-02-16 16:39:53'),
(6, 'wendell', 'ahead', 'wendell@gmail.com', '09888887775', '945666be0c12ae20f03166ee37d01d53', 'c660189821105248bf5bfefff9ee57ce025cfc470056', NULL, '2024-02-16 16:52:00', '2024-02-16 16:52:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
