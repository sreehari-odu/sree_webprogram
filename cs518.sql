-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 07:20 PM
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
('s1thiriv', 'Sree', 'Thiriveedhi', 's1thiriv@odu.edu', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-03-03 19:18:28'),
('sreehari', 'Hari', 'Thiriveedhi', 'sreeharithiriveedhi03@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-03-03 19:19:30'),
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
