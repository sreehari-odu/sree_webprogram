-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 01:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs518`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `document_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `claim` varchar(256) NOT NULL,
  `can_reproduce` varchar(10) DEFAULT NULL,
  `source_code` varchar(256) DEFAULT NULL,
  `datasets` varchar(256) DEFAULT NULL,
  `experiments_and_results` text DEFAULT NULL,
  `claim_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`document_id`, `user_id`, `claim`, `can_reproduce`, `source_code`, `datasets`, `experiments_and_results`, `claim_date`) VALUES
(23159, 'sthir004', 'This is a sample claim', 'Yes', 'https://stackoverflow.com/', 'CDC Dataset', 'Some experiments and results go here', '2021-04-07 16:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `uname` varchar(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `used` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uname` varchar(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uname`, `fname`, `lname`, `email`, `password`, `created_date`) VALUES
('jdoe', 'John', 'Doe', 'jdoe@odu.edu', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-03-03 19:18:48'),
('sree', 'SREEHARI', 'THIRIVEEDHI', 'sreeharithiriveedhi03@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-23 10:41:58'),
('sreehari', 'Hari', 'Thiriveedhi', 'sreeharithiriveedhi04@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-03-03 19:19:30'),
('sreeharithiriveedhi', 'Sreehari', 'Thiriveedhi', 'sreeharithiriveedhi95@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-03-03 19:20:17'),
('sthir004', 'Sree Hari', 'Thiriveedhi', 'sthir004@odu.edu', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-03-03 19:17:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
