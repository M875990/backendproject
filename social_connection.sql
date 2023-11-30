-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2023 at 11:57 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_connection`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts_table`
--

DROP TABLE IF EXISTS `posts_table`;
CREATE TABLE IF NOT EXISTS `posts_table` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `id` int DEFAULT NULL,
  `post_text` varchar(200) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts_table`
--

INSERT INTO `posts_table` (`post_id`, `id`, `post_text`, `timestamp`) VALUES
(1, 0, 'jhsbkjsdbv', '2023-11-30 10:50:57'),
(2, 0, 'jhsbkjsdbv', '2023-11-30 10:50:58'),
(3, 0, 'madhu', '2023-11-30 10:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(3, 'Msm875990@gmail.com', 'msm875990', '$2y$10$38Jp80EBi3aXPR1q8kQ8.eQNVazXorvdl.xDUppsb/k6yig99.z/G'),
(2, 'mpkeerthana6@gmail.com', 'root1', '$2y$10$TYrhW95E1YE69G0wueosTeYA5jM5yYMvTmrLfLLa8FT2yBAI6zK0G'),
(4, 'bargav95@gmail.com', 'msm87599', '$2y$10$0/kXH1oYQ3.SAU8lIK5o/uaDOnd7WmCtFpqSBz7thq427u9rSQEM6'),
(5, 'ven875990@gmail.com', 'root5', '$2y$10$Ka171dfQNFSpn/GQx4tz1.jAw/9t8srNlE0YHJ.R2Obvgq6oU3IW.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
