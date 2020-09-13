-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Mag 17, 2020 alle 22:30
-- Versione del server: 10.3.22-MariaDB-1ubuntu1
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
-- Database: `supermercato`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `azione` enum('ENTRATO','USCITO') NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(10) UNSIGNED NOT NULL,
  `dipendente_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`azione`, `data`, `id`, `dipendente_id`) VALUES
('ENTRATO', '2020-05-16 19:23:08', 93, 2),
('ENTRATO', '2020-05-16 19:23:09', 94, 2),
('USCITO', '2020-05-16 19:23:12', 95, 2),
('USCITO', '2020-05-16 19:23:13', 96, 2),
('ENTRATO', '2020-05-16 19:24:03', 97, 2),
('ENTRATO', '2020-05-16 19:24:03', 98, 2),
('ENTRATO', '2020-05-16 19:24:03', 99, 2),
('ENTRATO', '2020-05-16 19:24:04', 100, 2),
('ENTRATO', '2020-05-16 19:24:04', 101, 2),
('USCITO', '2020-05-16 19:24:06', 102, 2),
('USCITO', '2020-05-16 19:24:07', 103, 2),
('USCITO', '2020-05-16 19:29:15', 104, 2),
('USCITO', '2020-05-16 19:29:15', 105, 2),
('USCITO', '2020-05-16 19:29:16', 106, 2),
('ENTRATO', '2020-05-16 19:29:22', 107, 2),
('ENTRATO', '2020-05-16 19:29:22', 108, 2),
('ENTRATO', '2020-05-16 19:29:23', 109, 2),
('USCITO', '2020-05-16 19:35:16', 110, 2),
('USCITO', '2020-05-16 19:35:16', 111, 2),
('USCITO', '2020-05-16 19:35:17', 112, 2),
('ENTRATO', '2020-05-16 22:31:05', 113, 1),
('ENTRATO', '2020-05-16 22:31:05', 114, 1),
('USCITO', '2020-05-16 22:31:11', 115, 1),
('USCITO', '2020-05-16 22:31:14', 116, 1),
('ENTRATO', '2020-05-17 20:28:01', 117, 1),
('ENTRATO', '2020-05-17 20:28:02', 118, 1),
('USCITO', '2020-05-17 20:29:01', 119, 2),
('USCITO', '2020-05-17 20:29:01', 120, 2),
('ENTRATO', '2020-05-17 20:29:12', 121, 2),
('USCITO', '2020-05-17 20:29:20', 122, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `dipendenti`
--

CREATE TABLE `dipendenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dipendenti`
--

INSERT INTO `dipendenti` (`id`, `nome`, `cognome`, `username`, `password`) VALUES
(1, 'Andrea', 'Coradi', 'acoradi', '$2y$10$2hIVxjaX2Sn1F6t4UcZTuetziu5sluTCBbJf/SB.UjgSAnzOd/JRm'),
(2, 'Alessio', 'Abeni', 'abe', '$2y$10$w0nhfOjGCjqT.8o4RB9TUOa7WJYTEM6h97jaW7tCqy895Vc7I7eHO');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `dipendenti`
--
ALTER TABLE `dipendenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `clienti`
--
ALTER TABLE `clienti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT per la tabella `dipendenti`
--
ALTER TABLE `dipendenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
