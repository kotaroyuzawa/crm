-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Erstellungszeit: 05. Jul 2023 um 07:31
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
-- Tabellenstruktur für Tabelle `offers`
--

CREATE TABLE `offers` (
                          `offer_id` int(11) NOT NULL,
                          `customer_id` int(11) DEFAULT NULL,
                          `created_at` datetime NOT NULL DEFAULT current_timestamp(),
                          `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
                          `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
                          `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
                          `sum` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `offers`
--

INSERT INTO `offers` (`offer_id`, `customer_id`, `created_at`, `deleted_at`, `updated_at`, `status`, `sum`) VALUES
    (2, 1, '2023-06-26 17:06:16', '2023-06-26 17:06:16', '2023-06-26 17:06:16', 'Inactive', 10000);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `offers`
--
ALTER TABLE `offers`
    ADD PRIMARY KEY (`offer_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `offers`
--
ALTER TABLE `offers`
    MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
