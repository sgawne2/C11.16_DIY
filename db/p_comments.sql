-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2017 at 02:46 AM
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
-- Table structure for table `p_comments`
--

CREATE TABLE IF NOT EXISTS `p_comments` (
  `comment_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `comment_text` varchar(1000) NOT NULL,
  `rating` tinyint(3) unsigned NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

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
(24, 234, 'shine the shoes', 9, '2017-02-02 01:50:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p_comments`
--
ALTER TABLE `p_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p_comments`
--
ALTER TABLE `p_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
