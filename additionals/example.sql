-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Erstellungszeit: 22. Jun 2023 um 18:08
-- Server-Version: 10.10.3-MariaDB-1:10.10.3+maria~ubu2204
-- PHP-Version: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Datenbank: `crm`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `positions`
--

CREATE TABLE `positions` (
                             `position_id` int(11) NOT NULL,
                             `offer_id` int(11) NOT NULL,
                             `name` varchar(255) NOT NULL,
                             `details` varchar(16000) NOT NULL,
                             `price` float NOT NULL,
                             `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `positions`
--

INSERT INTO `positions` (`position_id`, `offer_id`, `name`, `details`, `price`, `amount`) VALUES
    (1, 1, 'Erste Position', 'Ich bin die erste Position auf Gute zusammenarbeit', 5, 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `positions`
--
ALTER TABLE `positions`
    ADD PRIMARY KEY (`position_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `positions`
--
ALTER TABLE `positions`
    MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
