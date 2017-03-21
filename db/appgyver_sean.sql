-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2017 at 07:04 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

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
(14, 6, 12, NULL, NULL, ''),
(15, 8, 13, 1, NULL, 'art'),
(16, 8, 14, 1, NULL, 'art'),
(19, 10, 32, 1, NULL, 'art'),
(20, 10, 33, 1, NULL, 'art'),
(21, 11, 32, 1, NULL, 'art'),
(22, 11, 33, 1, NULL, 'art'),
(23, 12, 32, 1, NULL, 'art'),
(24, 12, 33, 1, NULL, 'art'),
(25, 13, 32, 1, NULL, 'art'),
(26, 13, 33, 1, NULL, 'art'),
(27, 16, 13, 1, NULL, 'art'),
(28, 17, 38, 1, NULL, 'art'),
(29, 18, 39, 1, NULL, 'art'),
(30, 19, 39, 1, NULL, 'art'),
(31, 20, 39, 1, NULL, 'art'),
(32, 21, 39, 1, NULL, 'art'),
(33, 22, 39, 1, NULL, 'art'),
(34, 23, 39, 1, NULL, 'art'),
(35, 24, 39, 1, NULL, 'art'),
(36, 25, 39, 1, NULL, 'art'),
(37, 26, 39, 1, NULL, 'art'),
(38, 27, 39, 1, NULL, 'art'),
(39, 36, 57, 1, NULL, 'art'),
(40, 37, 57, 1, NULL, 'art'),
(41, 38, 57, 1, NULL, 'art'),
(42, 39, 57, 1, NULL, 'art'),
(43, 40, 57, 1, NULL, 'art'),
(44, 41, 57, 1, NULL, 'art'),
(45, 42, 57, 1, NULL, 'art'),
(46, 43, 57, 1, NULL, 'art'),
(47, 44, 65, 1, NULL, 'art'),
(48, 18, 66, 1, NULL, 'art'),
(49, 19, 67, 2, NULL, 'art'),
(50, 19, 68, 1, NULL, 'art'),
(51, 19, 69, 50, NULL, 'art'),
(52, 19, 70, 1, NULL, 'art'),
(53, 20, 71, 8, NULL, 'art'),
(54, 20, 72, 1, NULL, 'art'),
(55, 20, 73, 1, NULL, 'art'),
(56, 21, 71, 8, NULL, 'art'),
(57, 21, 72, 1, NULL, 'art'),
(58, 21, 73, 1, NULL, 'art'),
(59, 22, 57, 1, NULL, 'art');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(10) unsigned NOT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `project_description` varchar(100) NOT NULL,
  `tool_count` smallint(5) unsigned DEFAULT NULL COMMENT 'number of tools that the project uses',
  `project_photo` varchar(1000) DEFAULT 'images/default.jpg' COMMENT 'a url to a photo showing the finished project',
  `author_id` int(11) unsigned DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_description`, `tool_count`, `project_photo`, `author_id`, `is_featured`) VALUES
(2, 'Tissue Ghost', 'make terrifying ghosts out of tissue', 3, 'db/photos/project-id-2.jpg', 0, 1),
(3, 'drone made from garbage', 'bother cats with this robot made from trash', 2, 'db/photos/project-id-99.jpg', 0, 1),
(4, 'CPU Fan Drone', 'seems legit', 700, 'images/drone.jpg', 0, 0),
(5, 'Industrial Pipe Lamp', 'This is a pipe lamp thing.', 2, 'images/lamp.jpg', 0, 0),
(6, 'Homemade Lava Lamp', 'Aww yeaaa.', 4, 'images/lava_lamp.jpg', 0, 0),
(7, 'Broken Glass Mural', 'Please buy my broken glass.\n', 2, 'images/broken_glass.jpg', 0, 0),
(8, 'DIY ice cream', 'i''m sure this will work', 2, 'db/photos/ice-cream.jpeg', 0, 0),
(10, 'test name', 'test info', 2, 'images/default.jpg', NULL, 0),
(11, 'test name', 'test info', 2, 'images/default.jpg', NULL, 0),
(12, 'test name', 'test info', 2, 'images/default.jpg', NULL, 0),
(13, 'test name', 'test info', 2, 'images/default.jpg', NULL, 0),
(14, 'test ice cream', 'its ice cream', 2, 'db/photos/1486431682_test ice cream.jpeg', NULL, 0),
(15, 'test', 'ice cream', 1, 'db/photos/1486431802_test.jpeg', NULL, 0),
(16, 'test', 'ice cream', 1, 'db/photos/1486431961_test.jpeg', NULL, 0),
(17, 'test 2', 'its ghosts', 1, 'db/photos/1486432361_test 2.jpeg', NULL, 0),
(18, 'TEST', 'TEST', 1, 'db/photos/1486581213_TEST.jpeg', 6, 0),
(19, 'sick phone speakers', 'everyone will like you', 4, 'db/photos/1486594869_sick phone speakers.jpeg', 6, 1),
(20, 'diy roomba', 'never clean you house again', 3, 'db/photos/1486595704_diy roomba.jpeg', 6, 1),
(21, 'diy roomba', 'never clean you house again', 3, 'db/photos/1486595706_diy roomba.jpeg', 6, 0),
(22, 'test', 'test', 1, 'db/photos/1486614216_test.jpeg', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `p_comments`
--

CREATE TABLE IF NOT EXISTS `p_comments` (
  `comment_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `comment_text` varchar(1000) NOT NULL,
  `rating` tinyint(3) unsigned NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_comments`
--

INSERT INTO `p_comments` (`comment_id`, `project_id`, `comment_text`, `rating`, `comment_date`, `user_id`) VALUES
(1, 7, 'the best of times!', 0, '2017-02-01 02:57:50', NULL),
(2, 226, 'macgyver is the best', 0, '2017-02-01 03:17:16', NULL),
(3, 226, 'no tj hooker was the bomb!', 0, '2017-02-01 03:18:32', NULL),
(4, 226, 'star wars is good', 0, '2017-02-01 03:59:37', NULL),
(5, 226, 'join the navy', 0, '2017-02-01 04:08:08', NULL),
(6, 226, 'no, join the army', 0, '2017-02-01 20:24:23', NULL),
(7, 234, 'join the air force!!', 0, '2017-02-01 23:43:06', NULL),
(11, 235, 'this is a dangerous toy!', 0, '2017-02-02 00:19:40', NULL),
(12, 235, 'it''s very safe', 0, '2017-02-02 00:21:29', NULL),
(13, 234, 'i flagged this project!!', 0, '2017-02-02 00:35:10', NULL),
(20, 234, 'cold turkey', 4, '2017-02-02 01:20:26', NULL),
(21, 234, 'feel good', 1, '2017-02-02 01:21:44', NULL),
(22, 234, 'shoot the dog', 0, '2017-02-02 01:42:14', NULL),
(23, 234, 'fine tune', 2, '2017-02-02 01:50:21', NULL),
(24, 234, 'shine the shoes', 9, '2017-02-02 01:50:59', NULL),
(25, 5, 'test', 0, '2017-02-08 20:06:09', NULL),
(26, 5, 'test', 0, '2017-02-08 20:14:53', 6),
(27, 7, 'test', 0, '2017-02-08 20:55:14', 6),
(28, 5, 'cool', 0, '2017-02-08 20:58:03', 6),
(29, 5, 'hi', 0, '2017-02-08 21:01:55', 6),
(30, 5, 'hey', 0, '2017-02-08 21:02:08', 6),
(31, 5, 'woo', 0, '2017-02-08 21:03:35', 6),
(32, 5, 'asd', 0, '2017-02-08 21:07:31', 6),
(33, 5, 'test', 0, '2017-02-08 21:12:15', 6),
(34, 5, 'test', 0, '2017-02-08 21:16:57', 6),
(35, 5, 'SDF', 0, '2017-02-08 21:17:14', 6),
(36, 5, 'hey', 0, '2017-02-08 21:19:58', 6),
(37, 5, 'hi', 0, '2017-02-08 21:21:22', 6),
(38, 5, 'hi', 0, '2017-02-08 21:22:19', 6),
(39, 7, 'hello', 0, '2017-02-08 22:09:26', 6),
(40, 19, 'nice project', 0, '2017-02-08 23:02:16', 1),
(41, 19, 'cool project', 0, '2017-02-08 23:11:04', 6),
(42, 20, 'hi', 0, '2017-02-08 23:16:56', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_instructions`
--

INSERT INTO `p_instructions` (`p_instructions_id`, `project_id`, `step_number`, `step_name`, `step_text`, `step_photo`) VALUES
(1, 2, 1, NULL, 'make a ball of tissue, place in single tissue', NULL),
(2, 2, 2, NULL, 'tie with string', NULL),
(3, 2, 3, NULL, 'draw ghost on tissue', NULL),
(4, 8, 1, NULL, 'ice', NULL),
(5, 8, 2, '', 'cream', NULL),
(6, 8, 3, '', '????????????', NULL),
(8, 10, 1, NULL, 'test step info', NULL),
(9, 11, 1, NULL, 'test step info', NULL),
(10, 12, 1, NULL, 'test step info', NULL),
(11, 13, 1, NULL, 'test step info', NULL),
(12, 14, 1, NULL, 'just ice and cream', NULL),
(13, 15, 1, NULL, 'test', NULL),
(14, 16, 1, NULL, 'test', NULL),
(15, 17, 1, NULL, 'test', NULL),
(16, 18, 1, NULL, 'plates', NULL),
(17, 19, 1, NULL, 'plates', NULL),
(18, 20, 1, NULL, 'plates', NULL),
(19, 21, 1, NULL, 'plates', NULL),
(20, 22, 1, NULL, 'plates', NULL),
(21, 23, 1, NULL, 'plates', NULL),
(22, 24, 1, NULL, 'plates', NULL),
(23, 25, 1, NULL, 'plates', NULL),
(24, 26, 1, NULL, 'plates', NULL),
(25, 27, 1, NULL, 'plates', NULL),
(26, 36, 1, NULL, 'test', NULL),
(27, 37, 1, NULL, 'test', NULL),
(28, 38, 1, NULL, 'test', NULL),
(29, 39, 1, NULL, 'test', NULL),
(30, 40, 1, NULL, 'test', NULL),
(31, 41, 1, NULL, 'test', NULL),
(32, 41, 2, NULL, 'test 2', NULL),
(33, 41, 3, NULL, 'test 3', NULL),
(34, 42, 1, NULL, 'test', NULL),
(35, 43, 1, NULL, 'test', NULL),
(36, 44, 1, NULL, 'ghost', NULL),
(37, 18, 1, NULL, 'Te', NULL),
(38, 19, 1, NULL, 'tape two cups', NULL),
(39, 19, 2, NULL, 'cut a hole in the cups', NULL),
(40, 19, 3, NULL, 'put your phone in the hole', NULL),
(41, 20, 1, NULL, 'glue plates to cpu fans', NULL),
(42, 21, 1, NULL, 'glue plates to cpu fans', NULL),
(43, 22, 1, NULL, 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_ratings`
--

CREATE TABLE IF NOT EXISTS `p_ratings` (
  `rating_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `rating` tinyint(3) unsigned NOT NULL COMMENT 'should be between 1 and 5 inclusive'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_ratings`
--

INSERT INTO `p_ratings` (`rating_id`, `project_id`, `user_id`, `rating`) VALUES
(1, 234, 56, 1),
(2, 234, 68, 5),
(3, 234, 8, 4),
(5, 235, 8, 4),
(9, 234, 42, 4),
(11, 7, 42, 2),
(12, 4, 6, 3),
(18, 19, 1, 5),
(19, 19, 6, 3),
(22, 20, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE IF NOT EXISTS `tools` (
  `tool_id` int(10) unsigned NOT NULL,
  `tool_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tool_id`, `tool_name`) VALUES
(21, ''),
(10, 'broken glass'),
(5, 'cpu fan'),
(72, 'cpu fans'),
(14, 'cream'),
(65, 'ghost'),
(13, 'ice'),
(12, 'jar'),
(7, 'light bulb'),
(2, 'marker'),
(9, 'oil'),
(67, 'paper cup'),
(4, 'paper plate'),
(68, 'phone'),
(11, 'picture frame'),
(6, 'pipe'),
(39, 'plate'),
(71, 'plates'),
(70, 'scissors'),
(73, 'some wires??'),
(3, 'string'),
(69, 'tape'),
(57, 'test'),
(38, 'test 77'),
(32, 'test tool 1'),
(33, 'test tool 2'),
(66, 'TESTTESTETST'),
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
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_premium` tinyint(1) NOT NULL DEFAULT '0',
  `street_address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` mediumint(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `provider_name`, `provider_id`, `user_name`, `name`, `surname`, `email`, `is_premium`, `street_address`, `city`, `state`, `zip_code`) VALUES
(1, 'google', '', 'test', '', '', 'sgawne2@gmail.com', 1, '', '', '', 0),
(2, 'facebook', '', '', '', '', '', 0, '', '', '', 0),
(3, '', 'ggggggggggg', '', '', '', '', 0, '', '', '', 0),
(6, 'google', '108068589688077116494', 'Sean', 'Sean', 'Gawne', 'sgawne2@gmail.com', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `u_profiles`
--

CREATE TABLE IF NOT EXISTS `u_profiles` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_photo` varchar(1000) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal` varchar(50) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `p_comments`
--
ALTER TABLE `p_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `p_instructions`
--
ALTER TABLE `p_instructions`
  ADD PRIMARY KEY (`p_instructions_id`);

--
-- Indexes for table `p_ratings`
--
ALTER TABLE `p_ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD UNIQUE KEY `project_user_id` (`user_id`,`project_id`);

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
-- Indexes for table `u_profiles`
--
ALTER TABLE `u_profiles`
  ADD PRIMARY KEY (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `map_tp`
--
ALTER TABLE `map_tp`
  MODIFY `map_tp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `p_comments`
--
ALTER TABLE `p_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `p_instructions`
--
ALTER TABLE `p_instructions`
  MODIFY `p_instructions_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `p_ratings`
--
ALTER TABLE `p_ratings`
  MODIFY `rating_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `tool_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `u_profiles`
--
ALTER TABLE `u_profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
