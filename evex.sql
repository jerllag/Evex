-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 06:55 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_num`, `username`, `event_code`, `event_name`, `venue`, `date`, `start_time`, `end_time`, `description`, `category`) VALUES
(1, 'jeromellaguno', 'ubisoq', 'Programming Clinic', 'New Era University', '2015-10-10', '07:00:00', '10:00:00', 'Programming Clinic', 'Academic'),
(1, 'jeromellaguno', 'ku4wbb', 'Programming Clinic', 'New Era University', '2015-10-16', '07:00:00', '10:00:00', 'Programming Clinic', 'Academic');

-- --------------------------------------------------------

--
-- Table structure for table `event_attendee`
--

CREATE TABLE IF NOT EXISTS `event_attendee` (
  `event_code` varchar(10) NOT NULL,
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

INSERT INTO `event_attendee` (`event_code`, `fname`, `lname`, `birthday`, `contact_num`, `email_address`, `valid_user`, `given_feedback`) VALUES
('ubisoq', 'Jerome', 'Llaguno', '2015-10-10', 123456, 'jicllaguno@yahoo.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_criteria`
--

CREATE TABLE IF NOT EXISTS `event_criteria` (
  `event_num` int(11) NOT NULL,
  `criteria` varchar(75) NOT NULL,
  `score` decimal(2,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_criteria`
--

INSERT INTO `event_criteria` (`event_num`, `criteria`, `score`) VALUES
(1, 'Interaction or Audience Rapport', '0.77'),
(1, 'Organization', '0.77'),
(1, 'Reasonable Time Allotment', '0.77'),
(1, 'Relevance to the Theme', '0.77'),
(1, 'testing', '0.77'),
(1, 'Utilization of Devices or Visual Aids', '0.77'),
(1, 'Venue', '0.77');

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
  ADD PRIMARY KEY (`event_name`,`venue`,`date`,`start_time`,`end_time`),
  ADD UNIQUE KEY `event_code` (`event_code`);

--
-- Indexes for table `event_attendee`
--
ALTER TABLE `event_attendee`
  ADD PRIMARY KEY (`event_code`,`email_address`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
