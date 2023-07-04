-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Erstellungszeit: 04. Jul 2023 um 19:15
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
-- Tabellenstruktur für Tabelle `customers`
--

CREATE TABLE `customers` (
                             `customerId` int(11) NOT NULL,
                             `customerName` varchar(30) NOT NULL,
                             `customerStreet` varchar(50) NOT NULL,
                             `customerStreetNr` int(5) NOT NULL,
                             `customerStreetAdditional` varchar(30) DEFAULT NULL,
                             `customerZip` int(6) NOT NULL,
                             `customerCity` varchar(30) NOT NULL,
                             `customerEmail` varchar(50) NOT NULL,
                             `customerPhone` varchar(20) NOT NULL,
                             `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `customers`
--

INSERT INTO `customers` (`customerId`, `customerName`, `customerStreet`, `customerStreetNr`, `customerStreetAdditional`, `customerZip`, `customerCity`, `customerEmail`, `customerPhone`, `active`) VALUES
                                                                                                                                                                                                        (1, 'Daniel Müller', 'Burmesterstraße ', 25, '', 22305, 'Hamburg', 'muellerdaniel@gmail.com', '01756270292', 1),
                                                                                                                                                                                                        (2, 'Jonas Schmidt', 'Hafenstraße', 31, 'c/o Müller', 20212, 'Hamburg', 'schmidt@hotmail.com', '01569230234', 1),
                                                                                                                                                                                                        (3, 'Kotaro Yuzawa', 'Hohenzollernring', 142, 'bei Schmidt', 20702, 'Hamburg', 'ktr.yzw@gmail.com', '017626121463', 1),
                                                                                                                                                                                                        (5, 'Thomas Müller', 'Georg-Wilheml-Straße', 15, '', 20594, 'Hamburg', 't.mueller@gmail.com', '0404021492', 1),
                                                                                                                                                                                                        (9, 'Jan', 'Tolle-straße', 7, '', 22175, 'hamburg', 'test@web.de', '018437382', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `customers`
--
ALTER TABLE `customers`
    ADD PRIMARY KEY (`customerId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `customers`
--
ALTER TABLE `customers`
    MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;