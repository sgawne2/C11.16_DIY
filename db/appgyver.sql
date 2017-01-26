-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2017 at 11:05 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appgyver`
--

-- --------------------------------------------------------

--
-- Table structure for table `map_tp`
--

CREATE TABLE IF NOT EXISTS `map_tp` (
  `map_tp_id` int(10) unsigned NOT NULL,
  `project_id` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  `tool_qty` smallint(11) DEFAULT NULL,
  `tool_notes` varchar(200) DEFAULT NULL,
  `project_category` enum('art','home','tech','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_tp`
--

INSERT INTO `map_tp` (`map_tp_id`, `project_id`, `tool_id`, `tool_qty`, `tool_notes`, `project_category`) VALUES
(1, 1, 12, 0, NULL, 'art'),
(2, 1, 14, 0, NULL, 'art'),
(3, 1, 21, 0, NULL, 'art'),
(4, 1, 23, 0, NULL, 'art'),
(5, 2, 11, 0, NULL, 'art'),
(6, 2, 12, 0, NULL, 'art'),
(7, 2, 13, 0, NULL, 'art'),
(8, 2, 22, 0, NULL, 'art'),
(9, 4, 3, 12, 'use industrial', 'art'),
(10, 4, 5, 12, 'fffffffffffffffffffffffff', 'home'),
(11, 3, 7, 4, 'ssssssssssss', '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(10) unsigned NOT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `tool_count` smallint(5) unsigned DEFAULT NULL COMMENT 'number of tools that the project uses',
  `project_photo` varchar(1000) DEFAULT NULL COMMENT 'a url to a photo showing the finished project',
  `author_id` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `tool_count`, `project_photo`, `author_id`) VALUES
(1, 'Toilet Paper Roll Art', 0, '', 1),
(3, 'Motor Boat', 0, 'https://en.wikipedia.org/wiki/Motorboat', 12),
(7, 'Doll House', 0, 'https://en.wikipedia.org/wiki/Motorboat', 21),
(8, 'Shoe stand', 0, 'https://en.wikipedia.org/wiki/Motorboat', 13),
(19, 'jjj', 99, 'kk', 99),
(20, 'jjj', 99, 'kk', 99),
(21, 'jjj', 99, 'kk', 99),
(22, 'Ggg', 99, 'kk', 99),
(23, 'shit', NULL, 'damn', NULL),
(24, 'shit', NULL, 'damn', NULL),
(25, 'sling shot', NULL, 'www.sling.com', NULL),
(26, 'kite', NULL, 'www.kite.org', NULL),
(27, 'kite', NULL, 'www.kite.org', NULL),
(28, 'kite', 5, '', NULL),
(29, 'kite', 5, '', NULL),
(30, 'kite', 5, '', NULL),
(31, 'kite', 5, '', NULL),
(32, 'kite', 5, '', NULL),
(33, 'kite', 5, '', NULL),
(34, 'kite', 5, '', NULL),
(35, 'kite', 5, '', NULL),
(36, 'kite', 5, '', NULL),
(37, 'kite', 5, '', NULL),
(38, 'kite', 5, '', NULL),
(39, 'kite', 5, '', NULL),
(40, 'kite', 5, '', NULL),
(41, 'kite', 5, '', NULL),
(42, 'kite', 5, '', NULL),
(43, 'kite', 5, '', NULL),
(44, 'kite', 5, '', NULL),
(45, 'kite', 5, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_instructions`
--

CREATE TABLE IF NOT EXISTS `p_instructions` (
  `p_instructions_id` int(10) unsigned NOT NULL,
  `project_id` int(11) unsigned DEFAULT NULL,
  `step_number` tinyint(11) unsigned DEFAULT NULL COMMENT 'step number of the project instructions',
  `step_name` varchar(100) DEFAULT NULL COMMENT 'optional field to help clarify instructions',
  `step_text` varchar(500) DEFAULT NULL COMMENT 'the instructional text for each step',
  `step_photo` varchar(1000) DEFAULT NULL COMMENT 'url of photo showing progress of step'
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_instructions`
--

INSERT INTO `p_instructions` (`p_instructions_id`, `project_id`, `step_number`, `step_name`, `step_text`, `step_photo`) VALUES
(1, 1, 1, '', 'Wrap TP rolls in colored foil.', ''),
(2, 1, 2, '', 'Glue TP rolls to cardboard.', ''),
(3, 1, 3, '', 'Add macaroni as decoration.', ''),
(4, 2, 1, '', 'Place tissue over top of TP roll.', ''),
(5, 2, 2, '', 'Fasten tissue to TP roll with rubber band.', ''),
(6, 2, 3, '', 'Place stuffing into "head" of ghost through the TP roll.', ''),
(7, 2, 4, '', 'Draw face on ghost with black marker.', ''),
(8, 2, 5, '', 'Remove TP roll and keep rubber band in place.', ''),
(45, 25, 1, 'make a Y', 'cut sticks into a Y', 'www.y.com'),
(46, 25, 2, 'attach band', 'put rubber band on Y', 'www.x.com'),
(47, 26, 4, 'string it together', 'get the string and put it on sticks', 'www.kite.com'),
(48, 26, 5, 'fly it', 'get it into the wind', 'www.wind.com'),
(49, 27, 4, 'string it together', 'get the string and put it on sticks', 'www.kite.com'),
(50, 27, 5, 'fly it', 'get it into the wind', 'www.wind.com');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE IF NOT EXISTS `tools` (
  `tool_id` int(10) unsigned NOT NULL,
  `tool_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tool_id`, `tool_name`) VALUES
(183, 'air compressor'),
(10, 'brad nail'),
(5, 'circular saw'),
(8, 'glue gun'),
(1, 'hammer'),
(182, 'jack hammer'),
(6, 'level'),
(9, 'nail gun'),
(85, 'rock'),
(83, 'rubber bands'),
(84, 'saw'),
(2, 'screw'),
(137, 'string'),
(138, 'wind');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL,
  `provider_name` enum('google','facebook','','') NOT NULL COMMENT 'the google-provided id',
  `provider_id` varchar(200) NOT NULL COMMENT 'the big unhuman readable id from google or facebook'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `provider_name`, `provider_id`) VALUES
(1, 'google', 'dddddddddd'),
(2, 'facebook', 'fffffffffffffff'),
(3, '', 'ggggggggggg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `map_tp`
--
ALTER TABLE `map_tp`
  ADD PRIMARY KEY (`map_tp_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `p_instructions`
--
ALTER TABLE `p_instructions`
  ADD PRIMARY KEY (`p_instructions_id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`tool_id`),
  ADD UNIQUE KEY `tool_name` (`tool_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `map_tp`
--
ALTER TABLE `map_tp`
  MODIFY `map_tp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `p_instructions`
--
ALTER TABLE `p_instructions`
  MODIFY `p_instructions_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `tool_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
