-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 18, 2020 alle 23:47
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ingressi_uscite_supermercato`
--
CREATE DATABASE IF NOT EXISTS `ingressi_uscite_supermercato` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ingressi_uscite_supermercato`;

-- --------------------------------------------------------

--
-- Struttura della tabella `dipendente`
--

CREATE TABLE `dipendente` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dipendente`
--

INSERT INTO `dipendente` (`id`, `nome`, `cognome`, `email`, `telefono`, `username`, `password`) VALUES
(1, 'Andrea', 'Begni', 'andrea.begni@gmail.com', '3925463456', 'brain', '$2y$10$Q.fAb.LcMrOQ/FL0S8wUluz9JVLlfNI1L30YR1XvEd/zR6g254lAS'),
(2, 'Michele', 'Astori', 'michele.astori@gmail.com', '3924335613', 'icarus', '$2y$10$fiL/nT1QkSgnQbNFBS4QkOorIwW8YBZg44Q6xFhWzBNHy.IZ3dejG'),
(3, 'Isabella', 'Bacci', 'isabella.bacci@gmail.com', '3928754975', 'isabllix', '$2y$10$khYSMsfBFOs6E0BVy50KwefGGP/DXu07bLD8tPnlaY0YApcEgJlHW'),
(4, 'Alessandro', 'Bugatti', 'alessandro.bugatti@gmail.com', '3927689245', 'alex', '$2y$10$dOvTRrwl4UHKTbrN0Iob8eIdJAdv4u3SVvb7gVJROMJmqKfAr21ZO');

-- --------------------------------------------------------

--
-- Struttura della tabella `ingresso`
--

CREATE TABLE `ingresso` (
  `id` int(10) UNSIGNED NOT NULL,
  `dataOra` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_dipendente` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ingresso`
--

INSERT INTO `ingresso` (`id`, `dataOra`, `id_dipendente`) VALUES
(1, '2020-05-17 23:41:41', 1),
(2, '2020-05-17 23:41:42', 1),
(3, '2020-05-17 23:41:44', 1),
(4, '2020-05-17 23:42:00', 1),
(5, '2020-05-17 23:42:02', 1),
(6, '2020-05-17 23:42:03', 1),
(7, '2020-05-18 13:21:21', 1),
(8, '2020-05-18 13:21:23', 1),
(9, '2020-05-18 13:21:23', 1),
(10, '2020-05-18 13:21:56', 2),
(11, '2020-05-18 13:22:00', 2),
(12, '2020-05-18 13:22:01', 2),
(13, '2020-05-18 13:23:38', 3),
(14, '2020-05-18 13:23:39', 3),
(15, '2020-05-18 13:23:40', 3),
(16, '2020-05-18 14:03:40', 2),
(17, '2020-05-18 14:03:41', 2),
(18, '2020-05-18 14:03:43', 2),
(19, '2020-05-18 14:03:45', 2),
(20, '2020-05-18 14:03:46', 2),
(21, '2020-05-18 14:50:50', 2),
(22, '2020-05-18 14:50:53', 2),
(23, '2020-05-18 14:51:04', 2),
(24, '2020-05-18 15:07:08', 2),
(25, '2020-05-18 15:07:10', 2),
(26, '2020-05-18 15:07:11', 2),
(27, '2020-05-18 15:07:12', 2),
(28, '2020-05-18 16:40:06', 2),
(29, '2020-05-18 16:42:13', 2),
(30, '2020-05-18 16:42:20', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `stato`
--

CREATE TABLE `stato` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero_persone` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `stato`
--

INSERT INTO `stato` (`id`, `numero_persone`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `uscita`
--

CREATE TABLE `uscita` (
  `id` int(10) UNSIGNED NOT NULL,
  `dataOra` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_dipendente` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `uscita`
--

INSERT INTO `uscita` (`id`, `dataOra`, `id_dipendente`) VALUES
(1, '2020-05-17 23:41:43', 1),
(2, '2020-05-17 23:41:44', 1),
(3, '2020-05-17 23:41:45', 1),
(4, '2020-05-17 23:42:06', 1),
(5, '2020-05-17 23:42:08', 1),
(6, '2020-05-17 23:42:09', 1),
(7, '2020-05-18 13:21:22', 1),
(8, '2020-05-18 13:21:24', 1),
(9, '2020-05-18 13:21:24', 1),
(10, '2020-05-18 13:21:59', 2),
(11, '2020-05-18 13:22:02', 2),
(12, '2020-05-18 13:22:02', 2),
(13, '2020-05-18 13:23:56', 2),
(14, '2020-05-18 13:23:57', 2),
(15, '2020-05-18 13:23:57', 2),
(16, '2020-05-18 14:16:30', 2),
(17, '2020-05-18 14:18:04', 2),
(18, '2020-05-18 14:18:11', 2),
(19, '2020-05-18 14:18:18', 2),
(20, '2020-05-18 14:18:30', 2),
(21, '2020-05-18 15:04:56', 2),
(22, '2020-05-18 15:05:23', 2),
(23, '2020-05-18 15:23:47', 2),
(24, '2020-05-18 15:32:48', 2),
(25, '2020-05-18 16:40:01', 2),
(26, '2020-05-18 16:40:02', 2),
(27, '2020-05-18 16:40:05', 2),
(28, '2020-05-18 18:59:07', 2),
(29, '2020-05-18 18:59:10', 2),
(30, '2020-05-18 18:59:15', 2);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dipendente`
--
ALTER TABLE `dipendente`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ingresso`
--
ALTER TABLE `ingresso`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `stato`
--
ALTER TABLE `stato`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `uscita`
--
ALTER TABLE `uscita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `dipendente`
--
ALTER TABLE `dipendente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `ingresso`
--
ALTER TABLE `ingresso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la tabella `stato`
--
ALTER TABLE `stato`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `uscita`
--
ALTER TABLE `uscita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
