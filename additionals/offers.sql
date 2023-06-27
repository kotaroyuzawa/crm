--
-- Tabellenstruktur für Tabelle `offers`
--
CREATE TABLE `crm`.`offers` (
                             `offer_id` INT NOT NULL AUTO_INCREMENT,
                             `customer_id` INT,
                             `created_at` DATETIME NOT NULL,
                             `deleted_at` DATETIME NOT NULL,
                             `updated_at` DATETIME NOT NULL,,
                             `status` ENUM('Active','Inactive') NOT NULL DEFAULT 'Active',
                             `sum` INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `offers`
--
INSERT INTO `offers` (`offer_id`, `customer_id`, `created_at`, `deleted_at`, `updated_at`, `status`, `sum`) VALUES ('2', '1', '2023-06-26 17:06:16.000000', '2023-06-26 17:06:16.000000', '2023-06-26 17:06:16.000000', 'Inactive', '10000');

