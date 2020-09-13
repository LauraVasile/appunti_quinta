-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 11, 2020 alle 19:53
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.2.30

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
-- Struttura della tabella `addetto`
--

CREATE TABLE `addetto` (
  `ID` int(10) UNSIGNED NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `cognome` varchar(150) DEFAULT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `addetto`
--

INSERT INTO `addetto` (`ID`, `nome`, `cognome`, `username`, `password`) VALUES
(2, 'francesco', 'Mio', 'MyFrazz', '$2y$10$9s901xDJngbKPqkoaiDCKOMHzr7KBCI0t5M4ETkD6q9NfJebDLUIC'),
(3, 'Paolo', 'Cordioli', 'IlCordio', '$2y$10$6wcUnFUZovq9NHHOhwyJgeeRRd1aATf3Kw8v2DPZlj8NQuKv/HDi2');

-- --------------------------------------------------------

--
-- Struttura della tabella `monitoraggio`
--

CREATE TABLE `monitoraggio` (
  `ID` int(10) UNSIGNED NOT NULL,
  `data_giorno` date NOT NULL,
  `ingressi` int(11) DEFAULT NULL,
  `uscite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `monitoraggio`
--

INSERT INTO `monitoraggio` (`ID`, `data_giorno`, `ingressi`, `uscite`) VALUES
(2, '2020-05-11', 5, 0),
(3, '2020-05-12', 0, 0),
(4, '2020-05-13', 2, 0),
(5, '2020-05-14', 18, 8);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `addetto`
--
ALTER TABLE `addetto`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `monitoraggio`
--
ALTER TABLE `monitoraggio`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `addetto`
--
ALTER TABLE `addetto`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `monitoraggio`
--
ALTER TABLE `monitoraggio`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
