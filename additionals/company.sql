-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Erstellungszeit: 28. Jun 2023 um 07:35
-- Server-Version: 10.11.2-MariaDB-1:10.11.2+maria~ubu2204
-- PHP-Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Datenbank: `crm`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `companies`
--

CREATE TABLE `companies` (
                             `company_id` int(11) NOT NULL,
                             `name` varchar(255) NOT NULL,
                             `street` varchar(255) NOT NULL,
                             `street_additional` varchar(255) NOT NULL,
                             `zip` int(11) NOT NULL,
                             `city` varchar(255) NOT NULL,
                             `country` varchar(255) NOT NULL,
                             `email` varchar(255) NOT NULL,
                             `phone` varchar(255) NOT NULL,
                             `description` varchar(1600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `companies`
--

INSERT INTO `companies` (`company_id`, `name`, `street`, `street_additional`, `zip`, `city`, `country`, `email`, `phone`, `description`) VALUES
    (1, 'Test-GmbH', 'Süderstraße 77', 'c', 22175, 'Hamburg', 'Deutschland', 'test@company.de', '015252888135', 'Ich bin eine tolle company');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `companies`
--
ALTER TABLE `companies`
    ADD PRIMARY KEY (`company_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `companies`
--
ALTER TABLE `companies`
    MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;