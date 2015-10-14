-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2015 at 04:55 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evex`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_num` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `event_code` varchar(10) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `description` varchar(100) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_num`, `username`, `event_code`, `event_name`, `venue`, `date`, `start_time`, `end_time`, `description`, `category`) VALUES
(1, 'jeromellaguno', '0g4pbx', 'SENPAI', 'New Era University', '2015-10-15', '07:00:00', '10:00:00', 'SENPAI', 'Academic'),
(2, 'jeromellaguno', 'g3d2xp', 'SENPAI', 'New Era University', '2015-10-15', '08:00:00', '11:00:00', 'SENPAI', 'Academic'),
(3, 'jeromellaguno', 'oxp15j', 'SENPAI', 'New Era University', '2015-10-15', '09:00:00', '00:00:00', 'SENPAI', 'Academic'),
(4, 'jeromellaguno', 'haojtp', 'SENPAI', 'New Era University', '2015-10-15', '10:00:00', '01:00:00', 'SENPAI', 'Academic'),
(5, 'jeromellaguno', 'uma9lr', 'SENPAI', 'New Era University', '2015-10-15', '13:00:00', '17:00:00', 'SENPAI', 'Academic'),
(6, 'jeromellaguno', 'ugepri', 'SENPAI', 'New Era University', '2015-10-16', '13:00:00', '17:00:00', 'SENPAI', 'Academic'),
(7, 'jeromellaguno', 'mddrno', 'SENPAI', 'New Era University', '2015-10-17', '13:00:00', '17:00:00', 'SENPAI', 'Academic'),
(8, 'jeromellaguno', '82qu4g', 'SENPAI', 'New Era University', '2015-10-18', '13:00:00', '17:00:00', 'SENPAI', 'Academic'),
(9, 'jeromellaguno', 'b71ftd', 'SENPAI', 'New Era University', '2015-10-19', '13:00:00', '17:00:00', 'SENPAI', 'Academic'),
(10, 'jeromellaguno', 'oinyzh', 'SENPAI', 'New Era University', '2015-10-20', '13:00:00', '17:00:00', 'SENPAI', 'Academic'),
(11, 'jeromellaguno', 'jfvyfz', 'SENPAI', 'New Era University', '2015-10-21', '13:00:00', '17:00:00', 'SENPAI', 'Academic'),
(12, 'jeromellaguno', 'r4bnrl', 'Programming Clinic', 'New Era University', '2015-10-14', '13:00:00', '17:00:00', 'PROGRAMING CLINIC TO THE MAX!!!', 'Academic');

-- --------------------------------------------------------

--
-- Table structure for table `event_attendee`
--

CREATE TABLE IF NOT EXISTS `event_attendee` (
  `event_num` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `contact_num` int(11) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `valid_user` tinyint(1) NOT NULL DEFAULT '0',
  `given_feedback` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_attendee`
--

INSERT INTO `event_attendee` (`event_num`, `fname`, `lname`, `birthday`, `contact_num`, `email_address`, `valid_user`, `given_feedback`) VALUES
(1, 'Jerome', 'Jerome', '2015-10-14', 123456789, 'jeromellaguno@yahoo.com', 1, 0),
(12, 'Jerome', 'Jerome', '2015-10-10', 123456798, 'jeromellaguno@yahoo.com', 1, 0),
(12, 'Marnie', 'Marnie', '2015-10-17', 123456789, 'mpalapar@yahoo.com', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_criteria`
--

CREATE TABLE IF NOT EXISTS `event_criteria` (
  `event_num` int(11) NOT NULL,
  `criteria` varchar(20) NOT NULL,
  `score` decimal(2,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE IF NOT EXISTS `organizer` (
  `username` varchar(30) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `contact_num` int(11) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_address` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `valid_user` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`username`, `fname`, `lname`, `birthday`, `contact_num`, `email_address`, `org_name`, `org_address`, `password`, `valid_user`) VALUES
('briancaldona', 'Brian', 'Caldona', '2015-10-10', 2147483647, 'bcaldona@yahoo.com', 'New Era University', 'New Era, Quezon City', 'briancaldona', 1),
('jeromellaguno', 'Jerome', 'Llaguno', '1996-06-07', 123456789, 'jeromellaguno@yahoo.com', 'New Era Univeristy', 'aksmdksam dkmasdm asmdasmdkasm', 'jerome', 1),
('marniebright', 'Marnie', 'Bright', '2015-10-10', 156156161, 'marniepalapar@yahoo.com', 'kjnajsnd jsandjk nsalkdn', 'kasnd asndnaskdn sandkasnd klanskdjnasjdn asjkdnkjasnk dl', 'qwert', 1),
('mikklebondoc', 'Mikkle', 'Bondoc', '2015-10-10', 12161615, 'mbondoc@yahoo.com', 'New Era University', 'New Era, Quezon City', 'mikkle', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_num`,`event_name`,`venue`,`date`,`start_time`,`end_time`),
  ADD UNIQUE KEY `event_code` (`event_code`);

--
-- Indexes for table `event_attendee`
--
ALTER TABLE `event_attendee`
  ADD PRIMARY KEY (`event_num`,`email_address`);

--
-- Indexes for table `event_criteria`
--
ALTER TABLE `event_criteria`
  ADD PRIMARY KEY (`event_num`,`criteria`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`email_address`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_num` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
