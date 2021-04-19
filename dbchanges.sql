-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 11:08 AM
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
  `claim_id` int(11) NOT NULL,
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

INSERT INTO `claims` (`claim_id`, `document_id`, `user_id`, `claim`, `can_reproduce`, `source_code`, `datasets`, `experiments_and_results`, `claim_date`) VALUES
(2, 23159, 'sthir004', 'This is a sample claim', 'Yes', 'https://stackoverflow.com/', 'dataset1', 'Some experiments and results go here', '2021-04-19 00:52:00'),
(3, 23159, 'sthir004', 'This is a sample claim 2', 'Yes', 'https://stackoverflow.com/2', 'dataset2', 'Some experiments and results go here 2', '2021-04-19 00:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `claim_votes`
--

CREATE TABLE `claim_votes` (
  `claim_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `up_down` tinyint(4) NOT NULL,
  `activity_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `claim_votes`
--

INSERT INTO `claim_votes` (`claim_id`, `user_id`, `up_down`, `activity_date`) VALUES
(2, 'sreehari', 1, '2021-04-19 14:20:00'),
(2, 'sthir004', -1, '2021-04-19 14:19:25'),
(3, 'sreehari', -1, '2021-04-19 14:20:06'),
(3, 'sthir004', -1, '2021-04-19 13:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `document_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `activity_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`document_id`, `user_id`, `activity_date`) VALUES
(26220, 'sthir004', '2021-04-18 20:58:51'),
(23224, 'sthir004', '2021-04-18 21:50:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`claim_id`);

--
-- Indexes for table `claim_votes`
--
ALTER TABLE `claim_votes`
  ADD UNIQUE KEY `claim_id` (`claim_id`,`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
