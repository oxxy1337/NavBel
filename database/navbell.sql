-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Sep 15, 2019 at 01:20 AM
-- Server version: 8.0.17
-- PHP Version: 7.2.22

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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `Module` text NOT NULL,
  `date` text NOT NULL,
  `fname` text NOT NULL,
  `salt` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL,
  `isAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `Module`, `date`, `fname`, `salt`, `email`, `password`, `image`, `isAdmin`) VALUES
(1, 'BDD', '2014', 'Mohamed', '$Y5MjRkNzk4MjQ=$', 'm.slamat@esi-sba.dz', '4qq07no932763q657n1n4p811738p123', 'http://23.101.131.75:2019/./images/5d7c125160bba.jpg', 1),
(2, 'Linux 2', '2017', 'BADSI', '$E4NmQyNGRlMmE=$', 'medxmed@bk.ru', '6pn236ooo14r4p3o44129psp4q6q4808', '', 1);

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
(25, 'm.slamat@esi-sba.dz', 'mohamed', 'slamat', 2),
(26, 'a.boutouchent@esi-sba.dz', 'boutouchent', 'akram', 2),
(30, 's.hasnaoui@esi-sba.dz', 'seyfeddine', 'hasnaoui', 2),
(31, 'm.khodja@esi-sba.dz', 'moussa', 'khodja', 2),
(32, 'roiacult27@gmail.com', 'djawed', 'benahmed', 2),
(33, 'd.benahmed@esi-sba.dz', 'benahmed', 'djawed', 2),
(34, 'roiacult0794@gmail.com', 'benahmed', 'djawed', 2);

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
  `isAproved` int(11) NOT NULL,
  `date` text,
  `createdby` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `point`, `module`, `nbPersonSolved`, `url`, `nbOfQuestions`, `story`, `resource`, `year`, `isAproved`, `date`, `createdby`) VALUES
(57, 40, 'Electronique', '0', 'http://23.101.131.75:2019/./images/5d7d79064e2ef.jpg', 4, 'Test Electronique ', '[{\"url\": \"http://mach.elec.free.fr/divers/poly_diodes.pdf\", \"name\": \"Diode \"}]', 2, 1, '2019-09-14 11:34:30pm', 'Aced'),
(58, 30, 'ISI', '0', 'http://23.101.131.75:2019/./images/5d7d7ce797ad6.jpg', 3, 'System d information', '[{\"url\": \"http://www.univ-tebessa.dz/fichiers/master/master_2200.pdf\", \"name\": \"Introduction system information\"}]', 2, 1, '2019-09-14 11:51:03pm', 'Mohamed'),
(59, 40, 'Linux ', '0', 'http://23.101.131.75:2019/./images/5d7d7ef69982e.jpg', 4, 'Les commandes de LINUX – Partie 1', '[{\"url\": \"https://wiki.lib.sun.ac.za/images/c/ca/TLCL-13.07.pdf\", \"name\": \"Linux command\"}]', 2, 1, '2019-09-14 11:59:50pm', 'Mohamed'),
(60, 30, 'POO', '0', 'http://23.101.131.75:2019/./images/5d7d81b2eed1a.jpg', 3, 'Test de poo', '[{\"url\": \"https://www.irif.fr/~hf/verif/ens/an11-12/poo/courscomplet.pdf\", \"name\": \"Cour poo\"}]', 2, 1, '2019-09-15 12:11:30am', 'Mohamed');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `content` text,
  `postid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(250, 'non linéaire non polarisé', 46),
(251, 'linéaire non polarisé', 46),
(252, 'non-linéaire polarisé', 46),
(253, 'linéaire polarisé', 46),
(254, 'accun reponse', 46),
(255, 'plus de 20 kHz', 47),
(256, 'entre 10 et 20 kHz', 47),
(257, 'de 1 à 10 kHz', 47),
(258, 'entre 500 Hz et 1 kHz', 47),
(259, 'plus de 50 Hz', 47),
(260, 'régulateur de tension +5V', 48),
(261, 'régulateur de tension -5V', 48),
(262, 'compteur synchrone', 48),
(263, 'compteur asynchrone', 48),
(264, 'accun reponse', 48),
(265, 'ohm', 49),
(266, 'volte', 49),
(267, 'henry', 49),
(268, 'siemens', 49),
(269, 'ampère', 49),
(270, ' Des données chiffrées', 50),
(271, 'Des informations', 50),
(272, 'Des statistiques', 50),
(273, ' Des commandes', 50),
(274, ' Des valeurs', 50),
(275, '2', 51),
(276, '3', 51),
(277, '4', 51),
(278, '5', 51),
(279, '6', 51),
(280, 'Salariés', 52),
(281, 'Banques', 52),
(282, ' Clients', 52),
(283, 'Fournisseurs', 52),
(284, 'accun reponse', 52),
(285, 'unix', 53),
(286, 'uname', 53),
(287, 'os', 53),
(288, 'whoami', 53),
(289, 'system', 53),
(290, 'script', 54),
(291, 'macro', 54),
(292, 'read', 54),
(293, 'ps', 54),
(294, 'accune reponse', 54),
(295, 'Va créer un périphérique en mode bloc si l’utilisateur est root', 55),
(296, 'Créera un périphérique en mode bloc pour tous les utilisateurs', 55),
(297, 'Créer une FIFO si l’utilisateur n’est pas root', 55),
(298, 'Aucune de ces réponses', 55),
(299, 'Créera un périphérique en mode bloc pour courrant l’utilisateur ', 55),
(300, 'Affiche les tentatives de déconnexion et de connexion utilisateur', 56),
(301, 'Affiche le fichier syslog pour les messages d’information', 56),
(302, 'Affiche les messages du journal du noyau', 56),
(303, 'Affiche les messages du journal du démon', 56),
(304, 'Aucune de ces réponses', 56),
(305, 'accélérer les traitements', 57),
(306, 'protéger l\'intégrité des objets', 57),
(307, 'économiser la mémoire', 57),
(308, 'étiqueter des objets', 57),
(309, 'accune reponse', 57),
(310, 'surcharge', 58),
(311, 'implémentation', 58),
(312, 'instanciation', 58),
(313, 'construction', 58),
(314, 'accune reponse', 58),
(315, 'global', 59),
(316, 'static', 59),
(317, 'public', 59),
(318, 'private', 59),
(319, 'accune reponse', 59);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `postimg` text,
  `description` text,
  `userid` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `challengeid` int(11) DEFAULT NULL,
  `opt` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `challengeid`, `opt`, `time`, `point`) VALUES
(46, 'La diode est un dipôle', 57, 252, 25, 10),
(47, 'A quelle fréquence est hachée la tension dans une alimentation à découpage ?', 57, 255, 15, 10),
(48, 'Quel est l\'utilité d\'un LM7905 ?', 57, 260, 15, 10),
(49, 'Quelle est l\'unité de mesure de l\'inductance ?', 57, 267, 19, 10),
(50, 'Le SI permet d’apporter aux dirigeants des organisations :\r\n', 58, 271, 20, 10),
(51, 'Combien de fonctions possède le système d\'information ?', 58, 277, 15, 10),
(52, 'Parmi ces parties prenantes externes qui sont en relation avec le SI, laquelle n’en est pas une ?', 58, 280, 15, 10),
(53, 'Quelle commande est utilisée pour afficher le nom de votre système d’exploitation ?', 59, 286, 15, 10),
(54, 'Quelle commande est utilisée pour enregistrer une session d’une connexion utilisateur dans un fichier ?', 59, 290, 17, 10),
(55, '$ mknod myfifo b 4 16', 59, 295, 30, 10),
(56, 'La commande « dmesg »', 59, 302, 20, 10),
(57, 'L\'encapsulation est utile pour', 60, 306, 20, 10),
(58, 'Comment appelle t-on le fait d\'utiliser une \"classe\" pour créer un \"objet\"', 60, 312, 20, 10),
(59, 'Une variable de classe, commune à toutes les instances d\'une classe doit être déclarée', 60, 316, 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `id` int(11) NOT NULL,
  `image` text,
  `point` int(11) DEFAULT NULL,
  `description` text,
  `html` text,
  `optional` int(11) DEFAULT NULL,
  `takenby` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `image`, `point`, `description`, `html`, `optional`, `takenby`) VALUES
(29, 'http://23.101.131.75:2019/./images/5d7d855417e56.jpg', 50, 'Netflix Account ', '44DN3m8kg2E9CieVI/NWjRgadv944jF4zDabQYyH+QavKXoH0/RzIOkhlsZPrI1xtIxf09l4tlG6lC/IJ+CfrR5mA1jBsNgUmpw1fpqlrXTaUTkguHgbU/WK7G+RVBMl0QAlNt8HdMkW7a3NFufpuNWuKwRojuNpmNf3lQNHYrlrEIWjJgx1hlBnDFTynX3kS+G17NaUoYggR6atQL2zizcp7fiPG2r8gCEqZssg0Z5+1IXmweHydjkPKV1Cvul0vgPTaVzBAaNgq7APpBwzAth3OyBeNNu1PMA+r0APfgy6fV0Y4ere8e6iILrY1T+sodPSWSgfjSzhFX7PhVgiowSvcVgAfja50CWvxmxi8Lui5kJMQMzbv9wqfUZzZrHrSRPzbYK90JYbe5PIIp/8VJwyb0bf6X5S0rlBK7H80x39vKo7dMMCNq6qU5o3lIjgHQnlnx2sWuIi7SPiz91MbLZuz47lqPF5ypKZB+X5CKBnnH7hebq1LtcWGYaIUyjpqqiQUrSXH7sDJWaGBNUcee4N45W9/pSgrS6sJOIJqkrhDUjHxpSj7HbTm4MtlsI0zNU67La8rbCzCmsDcJlnGBxF4OTntob/cJI5VjKJOJvm2eKQFZmOpiGJRGakfsBpgWQ1CmqsDmAbbLzkiHDtOEU5nOjQRrXuUktaJ3fAheDjLd0NFMxIw1ZEHWaZZJReSYUmOGzbg3WgAzUYacKTvZjqrjVzgPjQfOdHqsB35psxi71mecN0NT1hNuJLruDCHAsOo3UvifRDK4f9DemuPurga51XTqpjlzKlH39edvXqxU57D/i2aVkQsRbuWIiX5hBMEII0cX1Xe85EjUiacM35JuHglkPTmgY7hqazWj4=', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `solvedchallenge`
--

CREATE TABLE `solvedchallenge` (
  `id` int(11) NOT NULL,
  `challengeid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `challengepts` int(11) DEFAULT NULL,
  `resultpts` int(11) DEFAULT NULL,
  `mdl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `solvedchallenge`
--

INSERT INTO `solvedchallenge` (`id`, `challengeid`, `userid`, `challengepts`, `resultpts`, `mdl`) VALUES
(68, 60, 3, 30, 20, 'POO'),
(69, 58, 3, 30, 20, 'ISI');

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
(178, 3, 59),
(179, 3, 60),
(180, 3, 58);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` text,
  `lname` text,
  `salt` text,
  `password` text,
  `ispublic` tinyint(1) DEFAULT NULL,
  `picture` text,
  `date` text,
  `nbsolved` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `currentrank` text,
  `solvedperday` int(11) DEFAULT NULL,
  `ranks` json DEFAULT NULL,
  `bio` text,
  `year` int(11) DEFAULT NULL,
  `email` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `salt`, `password`, `ispublic`, `picture`, `date`, `nbsolved`, `point`, `currentrank`, `solvedperday`, `ranks`, `bio`, `year`, `email`) VALUES
(3, 'Slamat', 'Mohamed', '$dmOTU2MzljZDY=$', '86r644on782o70n3189446q05o6o5s8o', 1, 'http://23.101.131.75:2019/./images/5d7d8680589d2.jpg', '2019/09/15 00:32:00', 4, 40, '0', 9, '[0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]', 'Etudiant 2 year', 2, 'm.slamat@esi-sba.dz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solvedchallenge`
--
ALTER TABLE `solvedchallenge`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `allstudents`
--
ALTER TABLE `allstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `solvedchallenge`
--
ALTER TABLE `solvedchallenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `triedchallenges`
--
ALTER TABLE `triedchallenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `userbannedever`
--
ALTER TABLE `userbannedever`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `userbannedtmp`
--
ALTER TABLE `userbannedtmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;