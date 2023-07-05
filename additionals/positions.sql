-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Erstellungszeit: 05. Jul 2023 um 14:59
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
-- Tabellenstruktur für Tabelle `positions`
--

CREATE TABLE `positions` (
                             `position_id` int(11) NOT NULL,
                             `offer_id` int(11) NOT NULL,
                             `name` varchar(255) NOT NULL,
                             `details` varchar(16000) NOT NULL,
                             `price` float NOT NULL,
                             `amount` float NOT NULL,
                             `handle_cost` float NOT NULL DEFAULT 0,
                             `profit` float NOT NULL DEFAULT 0,
                             `tax` float NOT NULL DEFAULT 0,
                             `skonto` float NOT NULL DEFAULT 0,
                             `discount` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `positions`
--

INSERT INTO `positions` (`position_id`, `offer_id`, `name`, `details`, `price`, `amount`, `handle_cost`, `profit`, `tax`, `skonto`, `discount`) VALUES
                                                                                                                                                    (10, 1, 'test', '1', 1, 1, 0.15, 0.3, 0.19, 0, 0),
                                                                                                                                                    (11, 1, '1', '1', 1, 1, 0, 0, 0.19, 0, 0),
                                                                                                                                                    (12, 1, 'test', '1', 1, 1, 0, 0, 0.19, 0, 0),
                                                                                                                                                    (13, 1, 'test', '1', 1, 1, 0, 0, 0.19, 0, 0),
                                                                                                                                                    (14, 1, 'Tolle beschreibung', '123', 1, 1, 0, 0, 0.19, 0, 0),
                                                                                                                                                    (15, 1, 'Acer Laptop', 'Das Acer Swift 3 SF314-43-R2LH zeichnet sich durch folgende spezifische Produkteigenschaften aus:\r\n\r\nDisplay: 35,56cm (14 Zoll)mattes Display/Acer ComfyView™ Full-HD IPS Display mit LED-Backlight\r\nAuflösung: 1.920 x 1.080 Auflösung (FHD)\r\nProzessor: AMD Ryzen5 (5000 Serie) 5500U\r\nGrafikkarte: AMD Radeon Graphics \r\nArbeitsspeicher: 8 GB LPDDR4X (keine Erweiterung möglich)\r\nSpeicher: 256 GB SSD (PCIe)\r\nNezwerk: Bluetooth 5.0 / WiFi 6 (802.11ax)\r\nAbmessung: 323,4 x 218,9 x 16,55 mm (B x T x H)\r\nGewicht: 1,2 kg\r\nSound: Stereo-Lautsprecher, 3,5 mm-Anschluss\r\nKamera: HD-Webcam\r\nBetriebssystem: Windows 11 Home (64 Bit)', 5, 2, 0, 0, 0.19, 0, 0),
                                                                                                                                                    (16, 1, 'ThinkPad E15 Gen 4 (15\" AMD)', 'Ausgezeichnete Leistung für unterwegs, überall und jederzeit\r\n\r\nLeistungsstarkes 39,6 cm (15,6\") Business-Notebook, perfekt für professionelles Arbeiten\r\nMit AMD Ryzen™ Mobilprozessoren der 5000 Serie und bis zu Windows 11 Pro\r\nErweiterte Sicherheits-, Navigations- und Konferenzfunktionen\r\nHervorragende Konnektivität mit optionalem WiFi 6E und USB-C mit vollem Funktionsumfang', 887.89, 1, 0, 0, 0.19, 0, 0);

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
    MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;