-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Erstellungszeit: 26. Jun 2023 um 06:06
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
                             `customerStreetAdditional` varchar(30) NOT NULL,
                             `customerCity` varchar(30) NOT NULL,
                             `customerEmail` varchar(50) NOT NULL,
                             `customerPhone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `customers`
--

INSERT INTO `customers` (`customerId`, `customerName`, `customerStreet`, `customerStreetNr`, `customerStreetAdditional`, `customerCity`, `customerEmail`, `customerPhone`) VALUES
                                                                                                                                                                               (1, 'customer1name', 'customer1Street', 1, 'customer1Additional', 'customer1Citzy', 'customer1Email', '0401111111'),
                                                                                                                                                                               (2, 'customer2Name', 'customer2Street', 2, 'customer2Additional', 'customer2City', 'customer2Email', '0402222222');

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
    MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;