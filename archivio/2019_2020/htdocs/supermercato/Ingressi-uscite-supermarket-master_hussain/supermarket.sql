-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 18, 2020 alle 22:53
-- Versione del server: 10.4.6-MariaDB
-- Versione PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `controllo`
--

CREATE TABLE `controllo` (
  `ID` int(10) UNSIGNED NOT NULL,
  `giorno` date NOT NULL,
  `ingressi` int(11) DEFAULT NULL,
  `uscite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `controllo`
--

INSERT INTO `controllo` (`ID`, `giorno`, `ingressi`, `uscite`) VALUES
(1, '2020-05-17', 7, 5),
(2, '2020-05-18', 3, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `impiegato`
--

CREATE TABLE `impiegato` (
  `id_addetto` int(10) UNSIGNED NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `impiegato`
--

INSERT INTO `impiegato` (`id_addetto`, `username`, `password`) VALUES
(1, 'scar3054', '$2y$10$2DythoBuCB4ELaB3LbAFh.oR3vvKTj3zLvgPCmKGGgq5nQy4Sf1J.'),
(2, 'scarxxx', '$2y$10$Tyn3SC7ZGsH.b7PORq1G5.rr5n1dfwf1CpTGG0JOwn88qFkukCJE2');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `controllo`
--
ALTER TABLE `controllo`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `impiegato`
--
ALTER TABLE `impiegato`
  ADD PRIMARY KEY (`id_addetto`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `controllo`
--
ALTER TABLE `controllo`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `impiegato`
--
ALTER TABLE `impiegato`
  MODIFY `id_addetto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
