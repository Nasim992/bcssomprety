-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 09:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcs_somprety`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_course`
--

CREATE TABLE `create_course` (
  `id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `payment_amount` int(255) DEFAULT NULL,
  `register_student` int(255) DEFAULT NULL,
  `created_exams` int(255) DEFAULT NULL,
  `remaining_courses` int(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_course`
--

INSERT INTO `create_course` (`id`, `user_id`, `course_name`, `payment_status`, `payment_amount`, `register_student`, `created_exams`, `remaining_courses`, `created_at`) VALUES
(1, 5, 'Paid Course ekhon theke ', 1, 120, NULL, NULL, 1, '2021-07-01 07:31:42'),
(2, 5, 'বাংলা পেইড কোর্স করি', 1, 120, NULL, NULL, 1, '2021-07-01 08:01:02'),
(3, 5, 'Paid', 0, 120, NULL, NULL, 1, '2021-07-01 08:04:08'),
(4, 5, 'number', 1, 1, NULL, NULL, NULL, '2021-07-01 08:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `model_test`
--

CREATE TABLE `model_test` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `model_test_name` varchar(100) NOT NULL,
  `model_test_examiner_name` varchar(100) NOT NULL,
  `positive_mark` float NOT NULL,
  `negative_mark` float NOT NULL,
  `model_test_date` varchar(100) NOT NULL,
  `model_test_time` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `mode_set` varchar(100) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `pinned` int(11) DEFAULT NULL,
  `secure_pin` int(11) DEFAULT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `image_type` varchar(100) DEFAULT NULL,
  `participants` int(11) DEFAULT NULL,
  `finished` int(11) DEFAULT NULL,
  `total_questions` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registrationtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `institute`, `password`, `registrationtime`) VALUES
(5, 'Md. Nasim Hossain', '123', 'mdnasim6416@gmail.com', 'IUBAT', '202cb962ac59075b964b07152d234b70', '2021-06-28 11:00:41'),
(9, 'New ', '01726274092', '17203056@iubat.edu', 'IUBAT', '202cb962ac59075b964b07152d234b70', '2021-07-01 17:27:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_course`
--
ALTER TABLE `create_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_test`
--
ALTER TABLE `model_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_course`
--
ALTER TABLE `create_course`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `model_test`
--
ALTER TABLE `model_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
