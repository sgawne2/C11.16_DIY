-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2017 at 12:23 AM
-- Server version: 5.5.49-log
-- PHP Version: 5.6.24

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_tp`
--

INSERT INTO `map_tp` (`map_tp_id`, `project_id`, `tool_id`, `tool_qty`, `tool_notes`, `project_category`) VALUES
(1, 2, 1, 0, NULL, 'art'),
(2, 2, 2, 0, NULL, 'art'),
(3, 2, 3, 0, NULL, 'art'),
(4, 3, 4, NULL, NULL, 'tech'),
(5, 3, 5, NULL, NULL, 'tech'),
(6, 5, 6, NULL, NULL, ''),
(7, 5, 7, NULL, NULL, ''),
(8, 6, 7, NULL, NULL, ''),
(9, 6, 8, NULL, NULL, ''),
(10, 6, 9, NULL, NULL, ''),
(11, 7, 10, NULL, NULL, ''),
(12, 7, 11, NULL, NULL, ''),
(13, 4, 5, NULL, NULL, ''),
(14, 6, 12, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(10) unsigned NOT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `project_description` varchar(100) NOT NULL,
  `tool_count` smallint(5) unsigned DEFAULT NULL COMMENT 'number of tools that the project uses',
  `project_photo` varchar(1000) DEFAULT NULL COMMENT 'a url to a photo showing the finished project',
  `author_id` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_description`, `tool_count`, `project_photo`, `author_id`) VALUES
(2, 'Tissue Ghost', 'make terrifying ghosts out of tissue', 3, 'db/photos/project-id-2.jpg', 0),
(3, 'drone made from garbage', 'bother cats with this robot made from trash', 2, 'db/photos/project-id-99.jpg', 0),
(4, 'CPU Fan Drone', 'seems legit', 700, 'images/drone.jpg', 0),
(5, 'Industrial Pipe Lamp', 'This is a pipe lamp thing.', 2, 'images/lamp.jpg', 0),
(6, 'Homemade Lava Lamp', 'Aww yeaaa.', 3, 'images/lava_lamp.jpg', 0),
(7, 'Broken Glass Mural', 'Please buy my broken glass.\n', 2, 'images/broken_glass.jpg', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_instructions`
--

INSERT INTO `p_instructions` (`p_instructions_id`, `project_id`, `step_number`, `step_name`, `step_text`, `step_photo`) VALUES
(1, 2, 1, NULL, 'make a ball of tissue, place in single tissue', NULL),
(2, 2, 2, NULL, 'tie with string', NULL),
(3, 2, 3, NULL, 'draw ghost on tissue', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE IF NOT EXISTS `tools` (
  `tool_id` int(10) unsigned NOT NULL,
  `tool_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tool_id`, `tool_name`) VALUES
(10, 'broken glass'),
(5, 'cpu fan'),
(12, 'jar'),
(7, 'lightbulb'),
(2, 'marker'),
(9, 'oil'),
(4, 'paper plate'),
(11, 'picture frame'),
(6, 'pipe'),
(3, 'string'),
(1, 'tissue'),
(8, 'wax');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL,
  `provider_name` enum('google','facebook','','') NOT NULL COMMENT 'the google-provided id',
  `provider_id` varchar(200) NOT NULL COMMENT 'the big unhuman readable id from google or facebook',
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_premium` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `provider_name`, `provider_id`, `user_name`, `email`, `is_premium`) VALUES
(1, 'google', 'dddddddddd', 'test', 'sgawne2@gmail.com', 1),
(2, 'facebook', '', '', '', 0),
(3, '', 'ggggggggggg', '', '', 0);

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
  MODIFY `map_tp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `p_instructions`
--
ALTER TABLE `p_instructions`
  MODIFY `p_instructions_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `tool_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
