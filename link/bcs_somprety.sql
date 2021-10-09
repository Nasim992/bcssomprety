-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 06:12 AM
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
  `register_student` int(255) DEFAULT 0,
  `created_exams` int(255) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_course`
--

INSERT INTO `create_course` (`id`, `user_id`, `course_name`, `payment_status`, `payment_amount`, `register_student`, `created_exams`, `created_at`) VALUES
(1, 0, 'free courses', 1, NULL, 0, 17, '2021-07-12 10:21:34'),
(18, 13, 'Created Courses', 0, 120, 1, 0, '2021-07-29 04:42:27'),
(19, 24, 'New Courses', 1, NULL, 0, 2, '2021-08-06 09:45:33'),
(20, 26, 'New Courses', 0, 120, 1, 0, '2021-08-21 16:23:08');

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
  `duration` int(11) NOT NULL,
  `model_set` varchar(100) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `pinned` int(11) DEFAULT NULL,
  `secure_pin` varchar(100) DEFAULT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `image_type` varchar(100) DEFAULT NULL,
  `participants` int(11) DEFAULT NULL,
  `finished` int(11) DEFAULT NULL,
  `total_questions` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `banner_payment_amount` varchar(100) DEFAULT NULL,
  `banner_medium` varchar(100) DEFAULT NULL,
  `banner_action` tinyint(1) NOT NULL DEFAULT 0,
  `banner_payment_number` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model_test`
--

INSERT INTO `model_test` (`id`, `user_id`, `model_test_name`, `model_test_examiner_name`, `positive_mark`, `negative_mark`, `model_test_date`, `duration`, `model_set`, `course_id`, `payment`, `pinned`, `secure_pin`, `image_name`, `image_type`, `participants`, `finished`, `total_questions`, `created_at`, `banner_payment_amount`, `banner_medium`, `banner_action`, `banner_payment_number`) VALUES
(16, 12, 'Model Test ', 'Examiner Model Test ', 1, 0, '2021-07-14 06:07 PM', 10, '', 1, 1, NULL, '', '', '', NULL, NULL, 4, '2021-07-14 12:44:30', NULL, NULL, 0, NULL),
(19, 22, 'New Question Added ', 'Nasim Hossain ', 1, 0, '2021-07-16 03:07 PM', 10, '', 1, 1, NULL, '', '', '', NULL, NULL, 1, '2021-07-15 09:12:21', NULL, NULL, 0, NULL),
(39, 13, 'New Model Test Created', 'Md. Nasim HOssain ', 1, 0, '2021-08-01 09:08 AM', 10, '', 1, 1, NULL, '', '', '', NULL, NULL, 2, '2021-08-01 04:35:57', NULL, NULL, 0, NULL),
(40, 24, 'Model Test Name ', 'Examiner name', 1.54, 0.43, '2021-08-07 10:50 PM', 10, '', 1, 1, NULL, '', '', '', NULL, NULL, 1, '2021-08-06 09:59:05', NULL, NULL, 0, NULL),
(41, 24, 'New Course Model Test ', 'Examiner Name ', 1.34, 0.9, '2021-09-06 04:45 PM', 10, '', 19, 1, NULL, '', '', '', NULL, NULL, NULL, '2021-08-06 10:00:55', NULL, NULL, 0, NULL),
(42, 24, 'MOdel Ydhsgds', 's', 1.54, 0.67, '2021-07-16 10:50 PM', 10, '', 19, 1, NULL, '', '', '', NULL, NULL, NULL, '2021-08-06 10:02:27', NULL, NULL, 0, NULL),
(43, 26, 'Nasim9  Model Test ', 'Examiner Name ', 1, 0, '2021-08-22 12:10 PM', 10, '', 1, 1, NULL, '', '', '', NULL, NULL, 2, '2021-08-22 06:09:32', NULL, NULL, 0, NULL),
(44, 26, 'MOdel Test Name ', 'Examiner NAme ', 1, 0, '2021-09-15 12:12 AM', 10, 'er', 1, 1, NULL, '', '', '', NULL, 1, 3, '2021-09-09 05:33:30', NULL, NULL, 0, NULL),
(45, 26, 'New Model TEst Created ', 'Examiner Name ', 1, 0, '2021-09-15 11:38 AM', 10, '', 1, 1, NULL, '', '', '', NULL, 1, 2, '2021-09-15 05:38:00', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice` varchar(255) NOT NULL,
  `notice_file_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice`, `notice_file_name`, `created_at`, `updated_at`) VALUES
(11, 'New Notiec ', '1631677423Model Test _result.pdf', '2021-09-15 03:43:42', '2021-09-15 03:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) NOT NULL,
  `model_test_id` bigint(20) NOT NULL,
  `questions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`questions`)),
  `option_A` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`option_A`)),
  `option_B` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`option_B`)),
  `option_C` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`option_C`)),
  `option_D` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`option_D`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `model_test_id`, `questions`, `option_A`, `option_B`, `option_C`, `option_D`, `created_at`) VALUES
(17, 16, '{\"question_statement\":\"                 Model Test Created \",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"C\",\"question_answer_description\":\"huyu\"}', '{\"option_A\":\"Ooif\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"sdff\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"sdffs\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"sfff\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-07-14 12:44:54'),
(19, 16, '{\"question_statement\":\"                 Questions No 34\",\"question_image\":\"1626281070PHPMailer_Configuration.PNG\",\"question_image_type\":\"image\\/png\",\"correct_answer\":\"C\",\"question_answer_description\":\"wewewewewe\"}', '{\"option_A\":\"fdggghh\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"wrwrw\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"wwew\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"wewewe\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-07-14 16:44:29'),
(21, 16, '{\"question_statement\":\"                 234\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"C\",\"question_answer_description\":\"sdsdsd\"}', '{\"option_A\":\"sdsds\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"sdsdsd\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"sdsd\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"sdsd\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-07-14 16:45:52'),
(22, 16, '{\"question_statement\":\"                 rere\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"C\",\"question_answer_description\":\"erer\"}', '{\"option_A\":\"erere\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"erere\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"erer\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"erere\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-07-14 16:46:51'),
(23, 19, '{\"question_statement\":\"                 Fredsf Questions Added\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"C\",\"question_answer_description\":\"ssdsd\"}', '{\"option_A\":\"Added Again \",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"Agged \",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"sfggg\",\"option_C_image\":\"1626340370hr.PNG\",\"option_C_image_type\":\"image\\/png\"}', '{\"option_D\":\"erer\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-07-15 09:12:50'),
(24, 23, '{\"question_statement\":\"                 hsfjgfsdf\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"B\",\"question_answer_description\":\"sdfsdf\"}', '{\"option_A\":\"sdfdsf\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"sfsdf\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"sfsfs\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"sfss\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-07-15 10:22:31'),
(25, 23, '{\"question_statement\":\"                 hsfjgfsdf\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"B\",\"question_answer_description\":\"sdfsdf\"}', '{\"option_A\":\"sdfdsf\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"sfsdf\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"sfsfs\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"sfss\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-07-15 10:22:31'),
(26, 32, '{\"question_statement\":\"                 fdfd\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"C\",\"question_answer_description\":\"dfdf\"}', '{\"option_A\":\"dfdf\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"dfdf\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"dfdf\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"dfdf\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-07-15 17:00:06'),
(35, 39, '{\"question_statement\":\"                 New Question Added \",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"C\",\"question_answer_description\":\"Because \"}', '{\"option_A\":\"Option A\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"Option B\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"Option C\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"Option D\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-08-01 04:36:24'),
(36, 39, '{\"question_statement\":\"                 Question Number 2\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"C\",\"question_answer_description\":\"Because \"}', '{\"option_A\":\"Option A\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"Option V\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"Option D\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"Option B\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-08-01 04:36:55'),
(37, 40, '{\"question_statement\":\"                 New Courses\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"B\",\"question_answer_description\":\"sdsd\",\"question_answer_image\":\"\"}', '{\"option_A\":\"sd\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"sd\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"sd\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"sd\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-08-06 09:59:21'),
(44, 44, '{\"question_statement\":\"                 New Question Added                                                   \",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"B\",\"question_answer_description\":\"df\",\"question_answer_image\":\"\"}', '{\"option_A\":\"Hellow Everyone\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"efgd\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"fdf\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"dffsds\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-09-15 01:54:09'),
(46, 44, '{\"question_statement\":\"                 @nd Wkj\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"C\",\"question_answer_description\":\"dfdfd\",\"question_answer_image\":\"\"}', '{\"option_A\":\"dfdf\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"dfdfd\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"dfdf\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"ddfd\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-09-15 04:08:49'),
(47, 44, '{\"question_statement\":\"                 dffgfgf\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"D\",\"question_answer_description\":\"dfdfdf\",\"question_answer_image\":\"\"}', '{\"option_A\":\"dfdfdf\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"dfdfdf\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"dfdfdf\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"dfdfd\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-09-15 04:09:01'),
(48, 45, '{\"question_statement\":\"                 hsjgd\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"B\",\"question_answer_description\":\"sdfsdf\",\"question_answer_image\":\"\"}', '{\"option_A\":\"sdfdf\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"sdfsdf\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"sfdds\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"sdfsd\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-09-15 05:38:11'),
(49, 45, '{\"question_statement\":\"                 sasdf\",\"question_image\":\"\",\"question_image_type\":\"\",\"correct_answer\":\"C\",\"question_answer_description\":\"sdfsdf\",\"question_answer_image\":\"\"}', '{\"option_A\":\"sdfsdf\",\"option_A_image\":\"\",\"option_A_image_type\":\"\"}', '{\"option_B\":\"sdfdsf\",\"option_B_image\":\"\",\"option_B_image_type\":\"\"}', '{\"option_C\":\"sdfsdf\",\"option_C_image\":\"\",\"option_C_image_type\":\"\"}', '{\"option_D\":\"sdfsdf\",\"option_D_image\":null,\"option_D_image_type\":\"\"}', '2021-09-15 05:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `model_test_id` bigint(20) NOT NULL,
  `skipped` float NOT NULL DEFAULT 0,
  `correct_answer` float NOT NULL DEFAULT 0,
  `wrong_answer` float NOT NULL DEFAULT 0,
  `total_mark` float NOT NULL DEFAULT 0,
  `positive_mark` float NOT NULL DEFAULT 0,
  `negative_mark` float NOT NULL DEFAULT 0,
  `all_answer` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`id`, `user_id`, `model_test_id`, `skipped`, `correct_answer`, `wrong_answer`, `total_mark`, `positive_mark`, `negative_mark`, `all_answer`, `created_at`) VALUES
(20, 14, 16, 0, 2, 2, 9, 10.5, 1.5, '17,D,19,C,21,B,22,C', '2021-07-18 15:41:12'),
(21, 13, 16, 0, 2, 2, 2, 2, 0, '17,B,19,C,21,C,22,B', '2021-08-01 09:28:16'),
(22, 26, 16, 0, 2, 2, 2, 2, 0, '17,B,19,C,21,B,22,C', '2021-08-20 09:46:39'),
(23, 13, 43, 0, 1, 1, 1, 1, 0, '38,C,39,C', '2021-08-22 06:11:51'),
(24, 0, 44, 3, 0, 0, 0, 0, 0, '44,S,46,S,47,S', '2021-09-15 04:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `course_id`, `transaction_id`, `status`, `payment_method`, `mobile_number`, `created_at`) VALUES
(1, 14, 11, '77835', 1, 'bkash', '0009923', '2021-07-14 14:40:48'),
(2, 12, 12, '3555', 2, 'nogod', 'Course theke transaction ', '2021-07-14 16:03:34'),
(3, 22, 11, '3555', 2, 'nogod', 'Paid Test ', '2021-07-15 08:55:33'),
(4, 22, 12, 'sdfsdfsf', 1, 'nogod', 'sdhgs', '2021-07-15 10:46:01'),
(5, 14, 18, '7384738434', 1, 'nogod', '8878434', '2021-07-29 04:43:49'),
(6, 13, 20, 'adfg', 1, 'rocket', '982932', '2021-08-21 16:23:41');

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
  `registrationtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `remaining_courses` int(11) DEFAULT NULL,
  `subscribed_courses` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `validation_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `institute`, `password`, `registrationtime`, `remaining_courses`, `subscribed_courses`, `type`, `validation_code`) VALUES
(13, 'Nasim Hossain ', '24345', 'mdnasim6416@gmail.com1', 'mdnasim6416@gmail.com', '5fb6e2a60c9da41e0a94fe6157ddb93f', '2021-07-14 13:56:26', 2, NULL, 'user', '30c47097e92d8991227d1701b7b44bdd'),
(23, 'Md. Nasim Hossain ', '01845832673', 'mdnasim6416@gmail.com', 'IUBAT', '5fb6e2a60c9da41e0a94fe6157ddb93f', '2021-08-01 12:49:49', NULL, NULL, 'admin', '6afe5f60b77ea3f5ded6ef126ec71981'),
(24, 'NAsim', '01987732', '17203056@iubat.edu', 'IUBAT', '5fb6e2a60c9da41e0a94fe6157ddb93f', '2021-08-06 09:44:41', 4, NULL, 'user', NULL),
(25, '1s', 's', 'sdfsf@gmail.comaa', 's', '03c7c0ace395d80182db07ae2c30f034', '2021-08-10 08:30:16', NULL, NULL, 'user', NULL),
(26, 'Nasim Hossain', '882918', 'mdnasim6416@gmail.com9', 'IUBAT', '5fb6e2a60c9da41e0a94fe6157ddb93f', '2021-08-10 08:43:14', 6, NULL, 'user', NULL),
(27, 'mdnasim6416@gmail.com10', '098283', 'mdnasim6416@gmail.com10', 'IUBAT', '5fb6e2a60c9da41e0a94fe6157ddb93f', '2021-09-15 04:14:15', NULL, NULL, 'user', NULL);

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
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `model_test`
--
ALTER TABLE `model_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
