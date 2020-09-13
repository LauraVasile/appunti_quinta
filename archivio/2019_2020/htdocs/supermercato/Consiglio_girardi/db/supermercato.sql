-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2020 at 07:52 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermercato`
--

-- --------------------------------------------------------

--
-- Table structure for table `dipendenti`
--

CREATE TABLE `dipendenti` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `HashedPW` varchar(200) NOT NULL,
  `matricola` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dipendenti`
--

INSERT INTO `dipendenti` (`ID`, `Nome`, `Cognome`, `HashedPW`, `matricola`) VALUES
(1, 'Gianluca', 'Consiglio', '$2y$10$DDzHq/i9Hex9W0vI4bBhI.DHi84DG0Gt85BMsia1NbVvp7A.DDpgW', 'dipendente1'),
(2, 'Luigi', 'Pirandello', '$2y$10$5W4S5M1aQ2tJmERImct/teJ3zQyrWsR/42EiCshBlsFI5sNxR7jy.', 'dipendente2'),
(3, 'Pinco', 'Pallo', '$2y$10$NK56TZVNHi4rG6nqijJeI.GSE5VsBEXb2xobowLnL.beiX3YAfYlS', 'dipendente3'),
(4, 'Matteo', 'Girardi', '$2y$10$vhSSR/WfDFO.WOsKllUX3urzkYn5QIb5yQ6Y0T6aisNm4diGuAdnu', 'dipendente4');

-- --------------------------------------------------------

--
-- Table structure for table `presenti`
--

CREATE TABLE `presenti` (
  `ID` char(1) NOT NULL,
  `n_presenti` int(10) UNSIGNED NOT NULL,
  constraint PK_T1 PRIMARY KEY (`ID`),
  constraint CK_T1_Locked CHECK (`ID`='X')
) ;

--
-- Dumping data for table `presenti`
--

INSERT INTO `presenti` (`ID`, `n_presenti`) VALUES
('X', 8);

-- --------------------------------------------------------

--
-- Table structure for table `registro_azioni`
--

CREATE TABLE `registro_azioni` (
  `ID` int(10) UNSIGNED NOT NULL,
  `dipendente_ID` int(10) UNSIGNED NOT NULL,
  `azione` enum('+','-') DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registro_azioni`
--

INSERT INTO `registro_azioni` (`ID`, `dipendente_ID`, `azione`, `log`) VALUES
(3, 1, '+', '2020-05-17 12:52:23'),
(4, 1, '+', '2020-05-17 12:58:27'),
(5, 1, '+', '2020-05-17 12:58:43'),
(6, 1, '-', '2020-05-17 13:00:25'),
(7, 1, '-', '2020-05-17 13:00:33'),
(8, 1, '-', '2020-05-17 13:00:39'),
(9, 1, '+', '2020-05-17 13:04:38'),
(10, 1, '+', '2020-05-17 13:04:39'),
(11, 1, '+', '2020-05-17 13:04:39'),
(12, 1, '-', '2020-05-17 13:04:54'),
(13, 1, '-', '2020-05-17 13:07:31'),
(14, 1, '-', '2020-05-17 13:08:48'),
(15, 1, '+', '2020-05-17 13:11:08'),
(16, 1, '+', '2020-05-17 13:11:09'),
(17, 1, '+', '2020-05-17 13:11:10'),
(18, 1, '-', '2020-05-17 13:11:23'),
(19, 1, '-', '2020-05-17 13:11:29'),
(20, 1, '-', '2020-05-17 13:11:30'),
(21, 1, '+', '2020-05-17 13:20:19'),
(22, 1, '+', '2020-05-17 13:20:21'),
(23, 1, '+', '2020-05-17 13:20:22'),
(24, 1, '-', '2020-05-17 13:20:29'),
(25, 1, '-', '2020-05-17 13:20:29'),
(26, 1, '-', '2020-05-17 13:20:30'),
(27, 1, '+', '2020-05-17 13:21:06'),
(28, 1, '+', '2020-05-17 13:21:07'),
(29, 1, '+', '2020-05-17 13:21:07'),
(30, 1, '-', '2020-05-17 13:21:09'),
(31, 1, '-', '2020-05-17 13:21:09'),
(32, 1, '+', '2020-05-17 13:21:12'),
(33, 1, '+', '2020-05-17 13:21:12'),
(34, 1, '+', '2020-05-17 13:21:12'),
(35, 1, '-', '2020-05-17 13:21:13'),
(36, 1, '-', '2020-05-17 13:21:14'),
(37, 1, '-', '2020-05-17 13:21:14'),
(38, 1, '-', '2020-05-17 13:21:15'),
(39, 1, '+', '2020-05-17 13:30:03'),
(40, 1, '+', '2020-05-17 13:30:03'),
(41, 1, '+', '2020-05-17 13:30:04'),
(42, 1, '+', '2020-05-17 13:30:13'),
(43, 1, '+', '2020-05-17 13:30:13'),
(44, 1, '+', '2020-05-17 13:30:23'),
(45, 2, '+', '2020-05-17 13:30:35'),
(46, 2, '+', '2020-05-17 13:30:45'),
(47, 2, '+', '2020-05-17 13:30:55'),
(48, 2, '+', '2020-05-17 13:31:06'),
(49, 2, '+', '2020-05-17 13:31:16'),
(50, 2, '+', '2020-05-17 13:31:26'),
(51, 2, '+', '2020-05-17 13:31:37'),
(52, 2, '+', '2020-05-17 13:31:48'),
(53, 2, '-', '2020-05-17 13:31:52'),
(54, 2, '-', '2020-05-17 13:31:52'),
(55, 2, '-', '2020-05-17 13:31:53'),
(56, 2, '-', '2020-05-17 13:31:53'),
(57, 2, '-', '2020-05-17 13:31:53'),
(58, 2, '-', '2020-05-17 13:31:54'),
(59, 1, '+', '2020-05-17 13:32:29'),
(60, 1, '+', '2020-05-17 13:32:29'),
(61, 1, '-', '2020-05-17 13:32:30'),
(62, 1, '-', '2020-05-17 13:32:31'),
(63, 1, '+', '2020-05-17 13:32:54'),
(64, 1, '-', '2020-05-17 13:33:17'),
(65, 1, '-', '2020-05-17 13:33:17'),
(66, 1, '-', '2020-05-17 13:33:17'),
(67, 1, '+', '2020-05-17 18:17:29'),
(68, 1, '+', '2020-05-17 18:17:29'),
(69, 1, '+', '2020-05-17 18:17:30'),
(70, 1, '-', '2020-05-17 18:17:31'),
(71, 1, '-', '2020-05-17 18:17:32'),
(72, 1, '+', '2020-05-17 18:17:32'),
(73, 1, '-', '2020-05-17 18:17:33'),
(74, 1, '-', '2020-05-17 18:17:33'),
(75, 1, '-', '2020-05-17 18:17:34'),
(76, 1, '+', '2020-05-17 18:17:34'),
(77, 1, '+', '2020-05-17 18:17:35'),
(78, 1, '+', '2020-05-17 18:17:35'),
(79, 1, '+', '2020-05-17 18:17:35'),
(80, 1, '-', '2020-05-17 18:17:36'),
(81, 1, '-', '2020-05-17 18:17:36'),
(82, 1, '-', '2020-05-17 18:17:36'),
(83, 1, '+', '2020-05-17 18:17:37'),
(84, 1, '-', '2020-05-17 18:17:37'),
(85, 1, '+', '2020-05-17 18:17:38'),
(86, 1, '+', '2020-05-17 18:17:38'),
(87, 1, '-', '2020-05-17 18:17:39'),
(88, 1, '+', '2020-05-17 18:17:39'),
(89, 1, '+', '2020-05-17 18:17:39'),
(90, 1, '+', '2020-05-17 18:17:40'),
(91, 1, '+', '2020-05-17 18:17:40'),
(92, 1, '+', '2020-05-17 18:17:40'),
(93, 1, '+', '2020-05-17 18:17:40'),
(94, 1, '-', '2020-05-17 18:17:41'),
(95, 1, '-', '2020-05-17 18:17:41'),
(96, 1, '+', '2020-05-17 18:17:41'),
(97, 1, '+', '2020-05-17 18:17:41'),
(98, 1, '+', '2020-05-17 18:17:42'),
(99, 1, '+', '2020-05-17 18:17:42'),
(100, 1, '+', '2020-05-17 18:17:42'),
(101, 1, '-', '2020-05-17 18:17:42'),
(102, 1, '-', '2020-05-17 18:17:43'),
(103, 1, '-', '2020-05-17 18:17:43'),
(104, 1, '+', '2020-05-17 18:17:43'),
(105, 1, '-', '2020-05-17 18:17:44'),
(106, 1, '+', '2020-05-17 18:30:57'),
(107, 1, '+', '2020-05-17 18:30:57'),
(108, 1, '-', '2020-05-17 18:31:01'),
(109, 1, '-', '2020-05-17 18:31:04'),
(110, 1, '-', '2020-05-17 18:31:10'),
(111, 1, '+', '2020-05-17 18:38:54'),
(112, 1, '+', '2020-05-17 18:38:54'),
(113, 1, '-', '2020-05-17 18:38:55'),
(114, 1, '-', '2020-05-17 18:38:55'),
(115, 1, '-', '2020-05-17 19:01:46'),
(116, 1, '-', '2020-05-17 19:01:47'),
(117, 1, '-', '2020-05-17 19:01:47'),
(118, 1, '+', '2020-05-17 19:01:48'),
(119, 1, '-', '2020-05-17 19:01:49'),
(120, 1, '-', '2020-05-17 19:01:49'),
(121, 1, '-', '2020-05-17 19:01:50'),
(122, 1, '+', '2020-05-17 19:01:50'),
(123, 1, '-', '2020-05-17 19:01:51'),
(124, 1, '-', '2020-05-17 19:01:51'),
(125, 1, '+', '2020-05-17 19:01:52'),
(126, 1, '+', '2020-05-17 19:01:52'),
(127, 1, '-', '2020-05-17 19:01:53'),
(128, 1, '-', '2020-05-17 19:01:53'),
(129, 1, '-', '2020-05-17 19:01:53'),
(130, 1, '+', '2020-05-17 19:01:53'),
(131, 1, '+', '2020-05-17 19:01:54'),
(132, 1, '+', '2020-05-17 19:01:54'),
(133, 1, '+', '2020-05-17 19:01:54'),
(134, 1, '-', '2020-05-17 19:01:55'),
(135, 1, '-', '2020-05-17 19:01:55'),
(136, 1, '-', '2020-05-17 19:01:55'),
(137, 1, '-', '2020-05-17 19:01:55'),
(138, 1, '+', '2020-05-17 19:01:56'),
(139, 1, '-', '2020-05-17 19:01:56'),
(140, 1, '+', '2020-05-17 19:01:56'),
(141, 1, '-', '2020-05-17 19:01:57'),
(142, 1, '+', '2020-05-17 19:01:57'),
(143, 1, '+', '2020-05-17 19:01:57'),
(144, 1, '+', '2020-05-17 19:01:57'),
(145, 1, '-', '2020-05-17 19:01:58'),
(146, 1, '-', '2020-05-17 19:01:58'),
(147, 1, '+', '2020-05-17 19:01:58'),
(148, 1, '-', '2020-05-17 19:01:59'),
(149, 1, '+', '2020-05-17 19:01:59'),
(150, 1, '-', '2020-05-17 19:01:59'),
(151, 1, '-', '2020-05-17 19:01:59'),
(152, 1, '-', '2020-05-17 19:02:00'),
(153, 1, '+', '2020-05-17 19:02:00'),
(154, 1, '+', '2020-05-17 19:02:00'),
(155, 1, '+', '2020-05-17 19:31:46'),
(156, 1, '+', '2020-05-17 19:31:47'),
(157, 1, '-', '2020-05-17 19:31:50'),
(158, 1, '+', '2020-05-17 19:31:51'),
(159, 1, '+', '2020-05-17 19:31:51'),
(160, 1, '+', '2020-05-17 19:31:52'),
(161, 1, '-', '2020-05-17 19:31:53'),
(162, 1, '+', '2020-05-17 19:31:53'),
(163, 1, '+', '2020-05-17 19:31:54'),
(164, 1, '-', '2020-05-17 19:31:54'),
(165, 1, '+', '2020-05-17 19:31:55'),
(166, 1, '-', '2020-05-17 19:31:55'),
(167, 1, '-', '2020-05-17 19:31:55'),
(168, 1, '-', '2020-05-17 19:31:55'),
(169, 1, '+', '2020-05-17 19:31:56'),
(170, 1, '-', '2020-05-17 19:31:56'),
(171, 1, '-', '2020-05-17 19:31:57'),
(172, 1, '+', '2020-05-17 19:31:57'),
(173, 1, '+', '2020-05-17 19:31:57'),
(174, 1, '+', '2020-05-17 19:31:58'),
(175, 1, '+', '2020-05-17 19:31:58'),
(176, 1, '-', '2020-05-17 19:31:58'),
(177, 1, '+', '2020-05-17 19:31:59'),
(178, 1, '+', '2020-05-17 19:31:59'),
(179, 1, '+', '2020-05-17 19:31:59'),
(180, 1, '+', '2020-05-17 19:31:59'),
(181, 1, '-', '2020-05-17 19:32:00'),
(182, 1, '-', '2020-05-17 19:32:00'),
(183, 1, '-', '2020-05-17 19:32:00'),
(184, 1, '-', '2020-05-17 19:32:01'),
(185, 1, '+', '2020-05-17 19:32:01'),
(186, 1, '+', '2020-05-17 19:32:01'),
(187, 1, '-', '2020-05-17 19:32:02'),
(188, 1, '-', '2020-05-17 19:32:02'),
(189, 1, '-', '2020-05-17 19:32:02'),
(190, 1, '+', '2020-05-17 19:32:02'),
(191, 1, '+', '2020-05-17 19:32:03'),
(192, 1, '+', '2020-05-17 19:46:40'),
(193, 1, '+', '2020-05-17 19:46:41'),
(194, 1, '-', '2020-05-17 19:46:41'),
(195, 1, '+', '2020-05-17 19:46:42'),
(196, 1, '+', '2020-05-17 19:46:42'),
(197, 1, '+', '2020-05-17 19:46:43'),
(198, 1, '-', '2020-05-17 19:46:44'),
(199, 1, '-', '2020-05-17 19:46:44'),
(200, 1, '+', '2020-05-17 19:46:45'),
(201, 1, '-', '2020-05-17 19:46:45'),
(202, 1, '+', '2020-05-17 19:46:46'),
(203, 1, '+', '2020-05-17 19:46:46'),
(204, 1, '-', '2020-05-17 19:46:47'),
(205, 1, '-', '2020-05-17 19:46:47'),
(206, 1, '-', '2020-05-17 19:46:48'),
(207, 1, '-', '2020-05-17 19:46:48'),
(208, 1, '-', '2020-05-17 19:46:48'),
(209, 1, '+', '2020-05-17 19:46:50'),
(210, 1, '-', '2020-05-17 19:46:50'),
(211, 1, '-', '2020-05-17 19:46:50'),
(212, 1, '-', '2020-05-17 19:46:51'),
(213, 1, '-', '2020-05-17 19:46:51'),
(214, 1, '+', '2020-05-17 19:46:52'),
(215, 1, '+', '2020-05-17 19:46:52'),
(216, 1, '-', '2020-05-17 19:46:53'),
(217, 1, '+', '2020-05-17 19:46:53'),
(218, 1, '-', '2020-05-17 19:46:54'),
(219, 1, '-', '2020-05-17 19:46:54'),
(220, 1, '-', '2020-05-17 19:46:54'),
(221, 1, '+', '2020-05-17 19:46:55'),
(222, 1, '+', '2020-05-17 19:46:55'),
(223, 1, '-', '2020-05-17 19:46:56'),
(224, 1, '+', '2020-05-17 19:46:56'),
(225, 1, '-', '2020-05-17 19:46:57'),
(226, 1, '-', '2020-05-17 19:46:57'),
(227, 1, '-', '2020-05-17 19:50:31'),
(228, 1, '-', '2020-05-17 19:50:31'),
(229, 1, '+', '2020-05-17 19:50:32'),
(230, 1, '+', '2020-05-17 19:50:32'),
(231, 1, '+', '2020-05-17 19:50:32'),
(232, 1, '+', '2020-05-17 20:09:34'),
(233, 1, '+', '2020-05-17 20:09:35'),
(234, 1, '-', '2020-05-17 20:09:35'),
(235, 1, '-', '2020-05-17 20:09:36'),
(236, 1, '+', '2020-05-17 20:09:37'),
(237, 1, '-', '2020-05-17 20:09:37'),
(238, 1, '+', '2020-05-17 20:09:38'),
(239, 1, '+', '2020-05-17 20:09:38'),
(240, 1, '-', '2020-05-17 20:09:39'),
(241, 1, '-', '2020-05-17 20:09:40'),
(242, 1, '+', '2020-05-17 20:16:20'),
(243, 1, '-', '2020-05-17 20:16:21'),
(244, 1, '-', '2020-05-17 20:16:21'),
(245, 1, '-', '2020-05-17 20:25:50'),
(246, 1, '-', '2020-05-17 20:25:50'),
(247, 1, '+', '2020-05-17 20:25:51'),
(248, 1, '+', '2020-05-17 20:25:51'),
(249, 1, '+', '2020-05-17 20:25:52'),
(250, 1, '+', '2020-05-17 20:25:52'),
(251, 1, '+', '2020-05-17 20:25:53'),
(252, 1, '+', '2020-05-17 20:25:53'),
(253, 1, '-', '2020-05-17 20:25:54'),
(254, 1, '+', '2020-05-17 20:25:55'),
(255, 1, '-', '2020-05-17 20:25:55'),
(256, 1, '-', '2020-05-17 20:25:56'),
(257, 1, '-', '2020-05-17 20:25:56'),
(258, 1, '+', '2020-05-17 20:25:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dipendenti`
--
ALTER TABLE `dipendenti`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `matricola` (`matricola`);

--
-- Indexes for table `presenti`
--
ALTER TABLE `presenti`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registro_azioni`
--
ALTER TABLE `registro_azioni`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `dipendente_ID` (`dipendente_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dipendenti`
--
ALTER TABLE `dipendenti`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registro_azioni`
--
ALTER TABLE `registro_azioni`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registro_azioni`
--
ALTER TABLE `registro_azioni`
  ADD CONSTRAINT `registro_azioni_ibfk_1` FOREIGN KEY (`dipendente_ID`) REFERENCES `dipendenti` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
