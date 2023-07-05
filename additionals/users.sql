-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Erstellungszeit: 05. Jul 2023 um 15:22
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
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `first_name` varchar(255) NOT NULL,
                         `last_name` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `created_at`) VALUES
    (1, 'jan@web.de', 'Jan', 'von Pirch', '$2a$12$BFF2rUzuChLyXhsF9dYY..cTHsBP6mJj8Mv6TbqwEAU0DH6luid/a', '2023-07-05 14:41:10');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;