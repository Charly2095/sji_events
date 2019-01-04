-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 09:56 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eid` int(11) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `image` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eid`, `ename`, `description`, `date`, `image`, `category_id`, `is_featured`, `status`) VALUES
(23, 'ISL', 'indian super league', '2019-04-25', '1546591387-multiple_sports_large[1].jpg', 1, 1, 1),
(24, 'Fifa', 'Football World Cup', '2019-03-14', '1546591933-multi-sport-stack[1].jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`cid`, `cname`) VALUES
(1, 'Football'),
(4, 'Cricket');

-- --------------------------------------------------------

--
-- Stand-in structure for view `searching`
-- (See below for the actual view)
--
CREATE TABLE `searching` (
`ename` varchar(255)
,`image` varchar(1000)
,`cname` varchar(255)
,`eid` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `searching`
--
DROP TABLE IF EXISTS `searching`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `searching`  AS  select `event`.`ename` AS `ename`,`event`.`image` AS `image`,`event_categories`.`cname` AS `cname`,`event`.`eid` AS `eid` from (`event` join `event_categories`) where ((`event`.`category_id` = `event_categories`.`cid`) and (`event`.`status` = '1')) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
