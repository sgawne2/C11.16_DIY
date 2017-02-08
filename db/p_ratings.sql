-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2017 at 08:17 PM
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
-- Table structure for table `p_ratings`
--

CREATE TABLE IF NOT EXISTS `p_ratings` (
  `rating_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `rating` tinyint(3) unsigned NOT NULL COMMENT 'should be between 1 and 5 inclusive'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_ratings`
--

INSERT INTO `p_ratings` (`rating_id`, `project_id`, `user_id`, `rating`) VALUES
(1, 234, 56, 1),
(2, 234, 68, 5),
(3, 234, 8, 4),
(5, 235, 8, 4),
(9, 234, 42, 4),
(11, 7, 42, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p_ratings`
--
ALTER TABLE `p_ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD UNIQUE KEY `project_user_id` (`user_id`,`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p_ratings`
--
ALTER TABLE `p_ratings`
  MODIFY `rating_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
