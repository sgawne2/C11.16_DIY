-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2017 at 10:20 AM
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
-- Table structure for table `projectinstructions`
--

CREATE TABLE IF NOT EXISTS `projectinstructions` (
  `ID` int(10) unsigned NOT NULL,
  `projectID` int(11) NOT NULL,
  `step` int(11) NOT NULL COMMENT 'step number of the project instructions',
  `stepText` varchar(500) NOT NULL COMMENT 'the instructional text for each step',
  `photo` varchar(300) NOT NULL COMMENT 'url of photo showing progress of step'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectinstructions`
--

INSERT INTO `projectinstructions` (`ID`, `projectID`, `step`, `stepText`, `photo`) VALUES
(1, 1, 1, 'Wrap TP rolls in colored foil.', ''),
(2, 1, 2, 'Glue TP rolls to cardboard.', ''),
(3, 1, 3, 'Add macaroni as decoration.', ''),
(4, 2, 1, 'Place tissue over top of TP roll.', ''),
(5, 2, 2, 'Fasten tissue to TP roll with rubber band.', ''),
(6, 2, 3, 'Place stuffing into "head" of ghost through the TP roll.', ''),
(7, 2, 4, 'Draw face on ghost with black marker.', ''),
(8, 2, 5, 'Remove TP roll and keep rubber band in place.', '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `ID` int(10) unsigned NOT NULL,
  `Name` varchar(200) NOT NULL,
  `toolCount` int(11) NOT NULL,
  `photo` varchar(150) NOT NULL COMMENT 'a url to a photo showing the finished project',
  `AuthorID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ID`, `Name`, `toolCount`, `photo`, `AuthorID`) VALUES
(1, 'Toilet Paper Roll Art', 4, '', 1),
(2, 'Tissue Ghost', 4, '', 2),
(3, 'tissue mask', 2, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE IF NOT EXISTS `tools` (
  `ID` int(10) unsigned NOT NULL,
  `Name` varchar(100) NOT NULL,
  `category` enum('art','home','tech','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`ID`, `Name`, `category`) VALUES
(1, 'toilet paper roll', 'art'),
(2, 'glue', 'art'),
(3, 'macaroni', 'art'),
(4, 'tissue', 'art'),
(5, 'rubber band', 'art'),
(6, 'foil', 'art'),
(7, 'marker', 'art');

-- --------------------------------------------------------

--
-- Table structure for table `tools_projectsmap`
--

CREATE TABLE IF NOT EXISTS `tools_projectsmap` (
  `ID` int(10) unsigned NOT NULL,
  `toolsID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools_projectsmap`
--

INSERT INTO `tools_projectsmap` (`ID`, `toolsID`, `projectID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 3, 1),
(5, 4, 2),
(6, 5, 2),
(7, 6, 1),
(8, 7, 2),
(9, 4, 3),
(10, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(10) unsigned NOT NULL,
  `providerID` varchar(200) NOT NULL,
  `provider` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projectinstructions`
--
ALTER TABLE `projectinstructions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tools_projectsmap`
--
ALTER TABLE `tools_projectsmap`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projectinstructions`
--
ALTER TABLE `projectinstructions`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tools_projectsmap`
--
ALTER TABLE `tools_projectsmap`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
