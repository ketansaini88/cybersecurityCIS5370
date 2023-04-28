-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2023 at 08:35 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

--SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
--START TRANSACTION;
--SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybersecurity`
--
--CREATE DATABASE IF NOT EXISTS `cybersecurity` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
--USE `cybersecurity`;

-- --------------------------------------------------------

--
-- Table structure for table `login_users`
--

DROP TABLE IF EXISTS `login_users`;
CREATE TABLE IF NOT EXISTS `login_users` (
  `username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_users`
--

INSERT INTO `login_users` (`username`, `password`, `role`) VALUES
('student', 'student', 'student'),
('teacher', 'teacher', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `person_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `person_id` int NOT NULL,
  `person_phone` int NOT NULL,
  `person_class` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `person_gpa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `person_name`, `person_id`, `person_phone`, `person_class`, `person_gpa`, `role`) VALUES
(1, 'Student 1', 1001, 11111111, 'MS Computer Science', '3.1', 'student'),
(2, 'Teacher 1', 1002, 22222222, 'Principle Of CyberSecurity', '', 'teacher'),
(3, 'Student 2', 1003, 33333333, 'MS Network Security', '3.3', 'student'),
(4, 'Teacher 2', 1004, 44444444, 'Operating Systems', '', 'teacher');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
