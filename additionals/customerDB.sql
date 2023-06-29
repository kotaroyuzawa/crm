-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Erstellungszeit: 29. Jun 2023 um 08:45
-- Server-Version: 11.0.2-MariaDB-1:11.0.2+maria~ubu2204
-- PHP-Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
                             `customerPhone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `customers`
--

INSERT INTO `customers` (`customerId`, `customerName`, `customerStreet`, `customerStreetNr`, `customerStreetAdditional`, `customerZip`, `customerCity`, `customerEmail`, `customerPhone`) VALUES
                                                                                                                                                                                              (1, 'Max Mustermann', 'Bismarkstraße', 37, 'additional', 20554, 'Hamburg', 'mustermann@gmail.com', '0403827893'),
                                                                                                                                                                                              (2, 'Jonas Schmidt', 'Hafenstraße', 31, 'c/o Müller', 20212, 'Hamburg', 'schmidt@hotmail.com', '01569230234'),
                                                                                                                                                                                              (3, 'Kotaro Yuzawa', 'Hohenzollernring', 142, 'bei Schmidt', 20702, 'Hamburg', 'ktr.yzw@gmail.com', '017626121463'),
                                                                                                                                                                                              (5, 'Thomas Müller', 'Georg-Wilheml-Straße', 15, '', 20594, 'Hamburg', 't.mueller@gmail.com', '0404021492'),
                                                                                                                                                                                              (8, 'Daniel Müller', 'Burmesterstraße ', 25, '', 22305, 'Hamburg', 'muellerdaniel@gmail.com', '01756270292');

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
    MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
