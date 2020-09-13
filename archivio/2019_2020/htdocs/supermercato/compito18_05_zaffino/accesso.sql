-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 03, 2020 alle 17:44
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



CREATE TABLE utenti (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_supermercato` int(10) UNSIGNED NOT NULL
)

CREATE TABLE supermercato (
  `id` int(10) UNSIGNED NOT NULL,
  `n_clienti` int(10) UNSIGNED NOT NULL
)

INSERT INTO `utenti` (`id`, `username`, `password`, `id_supermercato`) VALUES
(1, 'Alessandro', '$2y$10$4nwadIApKwq6WmU4jKhQiO6GdGd.H.HCxiEsWBuv/qrbxuPJu5Z0K', 1),
(2, 'Cristina', '$2y$10$4nwadIApKwq6WmU4jKhQiO6GdGd.H.HCxiEsWBuv/qrbxuPJu5Z0K', 2),
(3, 'Manfredo', '$2y$10$4nwadIApKwq6WmU4jKhQiO6GdGd.H.HCxiEsWBuv/qrbxuPJu5Z0K', 3),
(4, 'Alonso', '$2y$10$4nwadIApKwq6WmU4jKhQiO6GdGd.H.HCxiEsWBuv/qrbxuPJu5Z0K', 2),
(5, 'Francesco', '$2y$10$4nwadIApKwq6WmU4jKhQiO6GdGd.H.HCxiEsWBuv/qrbxuPJu5Z0K', 1);


INSERT INTO `supermercato` (`id`, `n_clienti`) VALUES
(1, 0),
(2, 5),
(3, 8);


ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_unique` (`username`);



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
