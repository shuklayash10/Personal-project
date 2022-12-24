-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 05:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l&t`
--

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `id` int(50) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`id`, `uid`, `title`, `text`, `date`) VALUES
(1, 'test1@email.com', 'Diary 1', 'Diary 1 data.', '2020-09-20 10:38:09'),
(2, 'test3@email.com', 'Diary 1 ', 'Diary 1 data ', '2020-09-25 09:07:48'),
(3, 'test4@email.com', 'diary 01', 'diary data 1', '2020-09-25 09:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `rol_num` varchar(100) NOT NULL,
  `date_of_joining` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `state_officer` varchar(100) NOT NULL,
  `function` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `sub_category` varchar(100) NOT NULL,
  `lic_e_code` varchar(100) NOT NULL,
  `lic_name` varchar(100) NOT NULL,
  `lic_designation` varchar(100) NOT NULL,
  `lic_location` varchar(100) NOT NULL,
  `lic_email` varchar(100) NOT NULL,
  `date_of_discharge` date NOT NULL,
  `regional_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `contact_no` int(200) NOT NULL,
  `mentor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `uid`, `rol_num`, `date_of_joining`, `location`, `state_officer`, `function`, `designation`, `sub_category`, `lic_e_code`, `lic_name`, `lic_designation`, `lic_location`, `lic_email`, `date_of_discharge`, `regional_no`, `name`, `gender`, `dob`, `age`, `state`, `district`, `pincode`, `contact_no`, `mentor`) VALUES
(1, 'test1@email.com', '1', '2020-09-20', 'Ahmedabad', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test1@email.com', '2020-09-30', '', '', '', '', 0, '', '', '', 0, ''),
(2, 'test2@email.com', '2', '2020-09-22', 'Ahmedabad', 'Test', 'test', 'test', 'test', 'test', 'test', 'test', 'Ahmedabad', 'test@email.com', '2020-11-22', '', '', '', '', 0, '', '', '', 0, ''),
(3, 'test3@email.com', '3', '2020-09-24', 'Ahmedabad', 'abc', 'function 1', 'defg', 'test', '4523', 'Test3', 'Test3', 'Test3', 'razinshaikh8732@gmail.com', '2020-11-24', '5454', 'Test3', 'Male', '2000-07-07', 20, 'Gujarat', 'Sarkhej', '380055', 2147483647, ''),
(4, 'test4@email.com', '4', '2020-09-25', 'Ahmedabad', 'Gujarat', 'test', 'test', 'test', '4523', 'test', 'demo', 'Ahmedabad', 'razinshaikh8732@gmail.com', '2020-10-25', '567', 'tet4', 'Male', '2020-09-16', 20, 'Gujarat', 'Sarkhej', '380055', 2147483647, ''),
(5, 'nnnn@email.com', 'razinshaikh8732@gmail.com', '2014-10-28', 'ahmedabad', 'Gujarat', 'test', 'test', 'test', 'test', 'test', 'test', 'Ahmedabad', 'razinshaikh8732@gmail.com', '2021-02-03', '3543', 'Razin Shaikh', 'Male', '2006-06-05', 55, 'Gujarat', 'Sarkhej', '380055', 345464654, 'admin@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(50) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `term` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `answer`, `opt1`, `opt2`, `opt3`, `opt4`, `term`, `subject`, `create_at`) VALUES
(1, 'Question 1', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-19 10:39:51'),
(2, 'Question 2', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', '', '', '2020-09-19 10:40:44'),
(3, 'Question 3', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-19 10:41:34'),
(4, 'Question 4', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', '', '', '2020-09-19 10:41:48'),
(5, 'Question 5', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-19 10:42:05'),
(6, 'Question 6', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', '', '', '2020-09-19 10:42:21'),
(7, 'Question 7', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-19 10:42:38'),
(8, 'Question 8', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', '', '', '2020-09-19 10:42:47'),
(9, 'Question 9', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-19 10:42:56'),
(10, 'Question 10', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', '', '', '2020-09-19 10:43:04'),
(11, 'Question 11', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-19 10:45:15'),
(12, 'Question 12', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', '', '', '2020-09-19 10:45:25'),
(13, 'Question 13', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-19 10:45:39'),
(14, 'Question 14', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', '', '', '2020-09-19 10:45:50'),
(15, 'Question 15', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-19 10:46:01'),
(16, 'Question 16', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-19 10:46:11'),
(17, 'Question 17', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', '', '', '2020-09-19 10:46:30'),
(18, 'Question 18', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-19 10:46:46'),
(19, 'Question 19', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', '', '', '2020-09-19 10:47:00'),
(20, 'Question 20', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', '', '', '2020-09-19 10:47:07'),
(21, 'Question 21', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', '', '', '2020-09-19 13:45:00'),
(22, 'you can add question here', 'opt 1', 'opt 1', 'opt 2', 'opt 3', 'opt 4', '', '', '2020-09-20 09:48:16'),
(23, 'you can add question here', 'opt2', 'opt1', 'opt2', 'opt3', 'opt4', '', '', '2020-09-20 09:56:00'),
(25, 'Question 23', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-24 10:26:12'),
(26, 'Question 25', 'Option 1', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'MidTerm', 'LPG', '2020-09-25 09:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `score` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `uid`, `score`, `date`) VALUES
(1, 'test1@email.com', '8', '2020-09-20 10:37:45'),
(2, 'test1@email.com', '10', '2020-09-24 10:51:00'),
(3, 'test1@email.com', '6', '2020-09-24 10:51:21'),
(4, 'test3@email.com', '7', '2020-09-25 09:08:28'),
(5, 'test4@email.com', '7', '2020-09-25 09:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `user_mail` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_mail`, `password`, `type`, `date`) VALUES
(1, 'admin@email.com', 'admin', 'admin', '2020-09-20 10:35:42'),
(2, 'test1@email.com', 'test1', 'employee', '2020-09-20 10:37:19'),
(3, 'test2@email.com', 'test2', 'employee', '2020-09-22 05:01:25'),
(4, 'test3@email.com', 'test3', 'employee', '2020-09-24 09:21:41'),
(5, 'test4@email.com', 'test4', 'employee', '2020-09-25 09:14:59'),
(6, 'sakil@123.com', 'sakil123', 'admin', '2020-09-25 14:42:37'),
(7, 'demo@123.com', 'demo123', 'employee', '2020-09-25 14:46:04'),
(8, 'pqr@test.com', 'pqr123', 'employee', '2020-09-25 14:50:07'),
(9, 'dvdfvbubu@mail.com', 'asdf', 'employee', '2020-09-25 14:51:37'),
(10, 'mnb@123.com', 'mnb123', 'employee', '2020-09-25 14:55:02'),
(11, 'mmmm@email.com', 'mmmmm', 'employee', '2020-09-25 15:02:39'),
(12, 'nnnn@email.com', 'nnnnn', 'employee', '2020-09-25 15:05:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
