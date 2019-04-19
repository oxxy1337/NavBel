-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Apr 19, 2019 at 10:06 AM
-- Server version: 8.0.15
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(1, 'm.slamat@esi-sba.dz', 'SLAMAT', 'MOHAMED SOUHAIB', 5),
(2, 's.hasbellaoui@esi-sba.dz', 'sara', 'sara', 5),
(5, 'd.benahmed@esi-sba.dz', 'sakura', 'chan', 69);

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
(2, 131, 'harwala2', '3', 'https://ichef.bbci.co.uk/news/320/cpsprodpb/37B5/production/_89716241_thinkstockphotos-523060154.jpg', 3, 'hello welcome', '[{\"url\": \"https://i.ebayimg.com/images/g/k5cAAOSwNSxVeEJv/s-l300.jpg\", \"name\": \"helloworld\"}]', 5, 100);

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
  `opt` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `challengeid`, `opt`, `point`) VALUES
(2, 'a', 2, 7, 54),
(4, 'u got root ?', 2, 3, 77);

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
-- Table structure for table `userbannedtmp`
--

CREATE TABLE `userbannedtmp` (
  `id` int(11) NOT NULL,
  `userid` text NOT NULL,
  `challengeid` int(11) NOT NULL,
  `date` text NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userbannedtmp`
--

INSERT INTO `userbannedtmp` (`id`, `userid`, `challengeid`, `date`, `ip`) VALUES
(5, '170', 2, '2019/04/18 20:13:45', '127.0.0.1'),
(6, '170', 2, '2019/04/18 20:14:36', '127.0.0.1'),
(7, '170', 2, '2019/04/18 20:14:56', '127.0.0.1'),
(8, '170', 2, '2019/04/18 20:15:43', '127.0.0.1'),
(9, '170', 2, '2019/04/18 20:16:49', '127.0.0.1');

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
  `ispublic` int(11) DEFAULT NULL,
  `ranks` text,
  `year` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `salt`, `picture`, `date`, `nbsolved`, `point`, `currentrank`, `solvedperday`, `ispublic`, `ranks`, `year`) VALUES
(170, 'michael', 'lauvain', 'm.slamat@esi-sba.dz', 'pr9n8p65no58s5rqs9ns726rn2snqr8r', '$RiOTAyODg3YzU=$', 'http://35.203.0.205:2019/./images/5cb8fabc71b0c.jpg', '2019/04/10 09:33:35', 27, 1075, NULL, 27, NULL, NULL, '5'),
(171, 'med', 'med', 'd.benahmed@esi-sba.dz', '84117s50n79o1o4s30nn87son2077o4s', '$hmYzQ4ZjMzMWM=$', '', '2019/04/18 16:37:42', NULL, NULL, NULL, NULL, NULL, NULL, '1 CS');

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
-- Indexes for table `userbannedever`
--
ALTER TABLE `userbannedever`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userbannedtmp`
--
ALTER TABLE `userbannedtmp`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `userbannedtmp`
--
ALTER TABLE `userbannedtmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;