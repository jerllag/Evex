-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 05:14 PM
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
(1, 'jeromellaguno', 'c2j7oj', 'Programming Clinic', 'New Era University', '2015-10-15', '07:00:00', '10:00:00', 'Programming Clinic', 'Academic'),
(1, 'jeromellaguno', '3lio6x', 'Programming Clinic', 'New Era University', '2015-10-15', '08:00:00', '11:00:00', 'Programming Clinic', 'Academic'),
(1, 'jeromellaguno', 'bc19rp', 'Programming Clinic', 'New Era University', '2015-10-15', '09:00:00', '00:00:00', 'Programming Clinic', 'Academic'),
(1, 'jeromellaguno', 'g37iir', 'Programming Clinic', 'New Era University', '2015-10-15', '09:00:00', '12:00:00', 'Programming Clinic', 'Academic'),
(3, 'jeromellaguno', 'xq8cth', 'Quizzardry', 'New Era University', '2015-10-15', '07:00:00', '10:00:00', 'Quizzardy', 'Academic'),
(3, 'jeromellaguno', 'ouidkh', 'Quizzardry', 'New Era University', '2015-10-15', '08:00:00', '11:00:00', 'Quizzardy', 'Academic'),
(3, 'jeromellaguno', 'inbkd4', 'Quizzardry', 'New Era University', '2015-10-15', '09:00:00', '12:00:00', 'Quizzardy', 'Academic'),
(3, 'jeromellaguno', 'uderer', 'Quizzardry', 'New Era University', '2015-10-15', '10:00:00', '13:00:00', 'Quizzardy', 'Academic'),
(3, 'jeromellaguno', 'ke0dwv', 'Quizzardry', 'New Era University', '2015-10-15', '11:00:00', '14:00:00', 'Quizzardy', 'Academic'),
(3, 'jeromellaguno', 'dfhvwo', 'Quizzardry', 'New Era University', '2015-10-15', '12:00:00', '15:00:00', 'Quizzardy', 'Academic'),
(3, 'jeromellaguno', 'w3g9rh', 'Quizzardry', 'New Era University', '2015-10-15', '13:00:00', '16:00:00', 'Quizzardy', 'Academic'),
(3, 'jeromellaguno', 'w6nhtf', 'Quizzardry', 'New Era University', '2015-10-15', '14:00:00', '17:00:00', 'Quizzardy', 'Academic'),
(3, 'jeromellaguno', 'kc8nxh', 'Quizzardry', 'New Era University', '2015-10-16', '14:00:00', '17:00:00', 'Quizzardy', 'Academic'),
(3, 'jeromellaguno', 'ecqjpw', 'Quizzardry', 'New Era University', '2015-10-17', '14:00:00', '17:00:00', 'Quizzardy', 'Academic'),
(3, 'jeromellaguno', 'oqbmkd', 'Quizzardry', 'New Era University', '2015-10-18', '14:00:00', '17:00:00', 'Quizzardy', 'Academic'),
(2, 'jeromellaguno', 'mqbcng', 'Senpai', 'New Era University', '2015-10-15', '07:00:00', '22:00:00', 'Programming Clinic', 'Academic'),
(2, 'jeromellaguno', 'xj06ly', 'Senpai', 'New Era University', '2015-10-15', '08:00:00', '11:00:00', 'Programming Clinic', 'Academic'),
(2, 'jeromellaguno', 'ezmrgh', 'Senpai', 'New Era University', '2015-10-16', '08:00:00', '11:00:00', 'Programming Clinic', 'Academic');

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
('c2j7oj', 'Jerome', 'Llaguno', '2015-10-10', 123465789, 'jicllaguno@yahoo.com', 1, 0);

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
(0, 'asd', '0.00'),
(0, 'qwe', '0.00'),
(1, 'Interaction or Audience Rapport', '0.00'),
(1, 'Organization', '0.00'),
(1, 'Reasonable Time Allotment', '0.00'),
(1, 'Relevance to the Theme', '0.00'),
(1, 'Utilization of Devices or Visual Aids', '0.00'),
(1, 'Venue', '0.00'),
(2, 'Interaction or Audience Rapport', '0.00'),
(2, 'Organization', '0.00'),
(2, 'Reasonable Time Allotment', '0.00'),
(2, 'Relevance to the Theme', '0.00'),
(2, 'Utilization of Devices or Visual Aids', '0.00'),
(2, 'Venue', '0.00'),
(3, 'Interaction or Audience Rapport', '0.00'),
(3, 'Organization', '0.00'),
(3, 'Reasonable Time Allotment', '0.00'),
(3, 'Relevance to the Theme', '0.00'),
(3, 'testing', '0.00'),
(3, 'Utilization of Devices or Visual Aids', '0.00'),
(3, 'Venue', '0.00'),
(14, 'asd', '0.00'),
(14, 'Interaction or Audie', '0.00'),
(14, 'Organization', '0.00'),
(14, 'qwe', '0.00'),
(14, 'Reasonable Time Allo', '0.00'),
(14, 'Relevance to the The', '0.00'),
(14, 'Utilization of Devic', '0.00'),
(14, 'Venue', '0.00'),
(15, 'asd', '0.00'),
(15, 'Interaction or Audie', '0.00'),
(15, 'Organization', '0.00'),
(15, 'qwe', '0.00'),
(15, 'Reasonable Time Allo', '0.00'),
(15, 'Relevance to the The', '0.00'),
(15, 'Utilization of Devic', '0.00'),
(15, 'Venue', '0.00');

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
