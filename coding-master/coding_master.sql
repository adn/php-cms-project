-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 04:14 PM
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
-- Database: `coding_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `about_image` varchar(200) NOT NULL,
  `no_students` int(11) NOT NULL,
  `no_courses` int(11) NOT NULL,
  `no_trainers` int(11) NOT NULL,
  `no_events` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `about_image`, `no_students`, `no_courses`, `no_trainers`, `no_events`) VALUES
(12, 'This is About CODING MASTER11', '        1111                                                                                               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\n Ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n Duis aute irure dolor in reprehenderit in voluptate velit.\r\n Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.\r\nUllamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate                                                                                                                                                                    ', 'Chrysanthemum.jpg', 200, 30, 40, 200);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `course_fee` int(11) NOT NULL,
  `course_image` varchar(250) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `description`, `course_fee`, `course_image`, `trainer_id`) VALUES
(4, 'PHP step by step Updated', '                                                                                                \r\n           PHP       updated                                            \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                  \r\n           PHP                                                                          ', 10000, 'Penguins.jpg', 1),
(8, 'Python step step(2020)', '                                                                                                                                                                                                                                                                                                \r\n                         python    this is complete course                                                                                                                                                                                                                                 ', 13000, 'Tulips.jpg', 3),
(9, 'Master Javascript', '                                                     Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                                                                                          Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                                                                                          Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                                                                                          Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                                                                                          Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                                                                                          Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                                                                                          Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                                                                                          Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                              Javascript                                     ', 9000, 'Koala.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `about_trainer` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `tainer_image` varchar(200) NOT NULL,
  `domain` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `about_trainer`, `course_id`, `tainer_image`, `domain`) VALUES
(1, 'john', 'php Trainer 12yrs. experience', 0, '', 'php'),
(2, 'Smith', 'php Trainer', 0, '', 'php'),
(3, 'Albert', 'python Trainer 10 yr. experience', 0, '', 'python');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT '1' COMMENT '1=guest, 2=registered, 9=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '9'),
(2, 'guest ', 'guest@gmail.com', '35675e68f4b5af7b995d9205ad0fc43842f16450', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
