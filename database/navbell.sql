-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2019 at 11:04 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `navbell`
--

-- --------------------------------------------------------

--
-- Table structure for table `allstudents`
--

CREATE TABLE `allstudents` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allstudents`
--

INSERT INTO `allstudents` (`id`, `email`, `fname`, `lname`, `year`) VALUES
(1, 'm.slamat@esi-sba.dz', 'SLAMAT', 'MOHAMED SOUHAIB', 2),
(2, 'a.boutouchent@esi-sba.dz', 'kahina', 'kahina2', 5),
(5, 's.hasbellaoui@esi-sba.dz', 'sara', 'sara', 69);

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` int(11) NOT NULL,
  `point` int(11) DEFAULT NULL,
  `module` text,
  `nbPersonSolved` text,
  `url` text,
  `nbOfQuestions` int(11) DEFAULT NULL,
  `story` text,
  `resource` json DEFAULT NULL,
  `year` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `point`, `module`, `nbPersonSolved`, `url`, `nbOfQuestions`, `story`, `resource`, `year`, `time`) VALUES
(1, 7, 'harwala', '2', 'https://ichef.bbci.co.uk/news/320/cpsprodpb/37B5/production/_89716241_thinkstockphotos-523060154.jpg', 5, 'hello and welcom', '{\"\": \"\"}', 5, 150),
(2, 300, 'harwala2', '3', 'https://ichef.bbci.co.uk/news/320/cpsprodpb/37B5/production/_89716241_thinkstockphotos-523060154.jpg', 3, 'hello welcome', '[{\"url\": \"https://i.ebayimg.com/images/g/k5cAAOSwNSxVeEJv/s-l300.jpg\", \"name\": \"helloworld\"}]', 5, 120);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `trueoption` text NOT NULL,
  `questionid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `trueoption`, `questionid`) VALUES
(11, 'No root', 4),
(14, 'YES , KAHINA IS LOVE', 2),
(15, 'YES , I Love hina ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `challengeid` int(11) NOT NULL,
  `option` text NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `challengeid`, `option`, `point`) VALUES
(2, 'DO U LOVE KAHINA ?', 2, '7', 187),
(4, 'u got root ?', 2, '7', 77);

-- --------------------------------------------------------

--
-- Table structure for table `triedchallenges`
--

CREATE TABLE `triedchallenges` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `challengeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `triedchallenges`
--

INSERT INTO `triedchallenges` (`id`, `userid`, `challengeid`) VALUES
(1, 13, 158),
(2, 13, 159),
(7, 4, 1337),
(8, 456, 20),
(9, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user-banned-tmp`
--

CREATE TABLE `user-banned-tmp` (
  `userid` int(11) NOT NULL,
  `reason` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userbannedever`
--

CREATE TABLE `userbannedever` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `useragent` text NOT NULL,
  `date` text NOT NULL,
  `why` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` text,
  `lname` text,
  `email` text,
  `password` text,
  `salt` text,
  `picture` text,
  `date` text,
  `nbsolved` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `currentrank` int(11) DEFAULT NULL,
  `solvedperday` int(11) DEFAULT NULL,
  `ranks` text,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `salt`, `picture`, `date`, `nbsolved`, `point`, `currentrank`, `solvedperday`, `ranks`, `year`) VALUES
(139, 'kahina', 'kahina2', 'a.boutouchent@esi-sba.dz', 's1qp85sspn68735nr6rs0507poop0487', '$gzOTVlNTQ3YzE=$', 'http://35.203.11.145/navbell-api//./images/5c9000e444818.jpg', '2019/03/18 20:34:44', NULL, NULL, NULL, NULL, NULL, 5),
(140, 'SLAMAT', 'MOHAMED SOUHAIB', 'm.slamat@esi-sba.dz', 'o919qp28ppo74qqn83585458n9s92195', '$VmOTliMjVlMTM=$', 'http://35.203.11.145/navbell-api//./images/5c900206bfb40.jpg', '2019/03/18 20:39:34', NULL, NULL, NULL, NULL, NULL, 2),
(141, 'sakura', 'chan', 'd.benahmed@esi-sba.dz', '2n341004n96p59632624q9q97r767697', '$M2OTdkMDRmNzI=$', '', '2019/03/19 00:00:42', NULL, NULL, NULL, NULL, NULL, 69);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allstudents`
--
ALTER TABLE `allstudents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `triedchallenges`
--
ALTER TABLE `triedchallenges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user-banned-tmp`
--
ALTER TABLE `user-banned-tmp`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userbannedever`
--
ALTER TABLE `userbannedever`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allstudents`
--
ALTER TABLE `allstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `triedchallenges`
--
ALTER TABLE `triedchallenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `userbannedever`
--
ALTER TABLE `userbannedever`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
