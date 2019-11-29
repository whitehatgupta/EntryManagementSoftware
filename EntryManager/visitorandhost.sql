-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 03:59 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitorhost`
--

-- --------------------------------------------------------

--
-- Table structure for table `visitorandhost`
--

CREATE TABLE `visitorandhost` (
  `id` int(11) NOT NULL,
  `H_Name` text NOT NULL,
  `H_email` text NOT NULL,
  `H_number` text NOT NULL,
  `V_Name` text NOT NULL,
  `V_email` text NOT NULL,
  `V_number` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitorandhost`
--

INSERT INTO `visitorandhost` (`id`, `H_Name`, `H_email`, `H_number`, `V_Name`, `V_email`, `V_number`, `time`) VALUES
(47, 'Sharma', 'sharma@lnmiit.com', '382345', 'Snehal', 'misd@19.com', '9434012348', '08:00:38pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visitorandhost`
--
ALTER TABLE `visitorandhost`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitorandhost`
--
ALTER TABLE `visitorandhost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
