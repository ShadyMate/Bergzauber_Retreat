-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Jan 2024 um 16:03
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hoteluser`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zimmer`
--

CREATE TABLE `zimmer` (
  `zimmer_id` int(11) NOT NULL,
  `Kosten` int(32) NOT NULL,
  `Anreise` date NOT NULL,
  `Abreise` date NOT NULL,
  `Frühstück` tinyint(4) NOT NULL,
  `Parkplatz` tinyint(4) NOT NULL,
  `Haustiere` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `zimmer`
--

INSERT INTO `zimmer` (`zimmer_id`, `Kosten`, `Anreise`, `Abreise`, `Frühstück`, `Parkplatz`, `Haustiere`) VALUES
(2521, 76, '2024-01-12', '2024-01-27', 1, 0, 0),
(2528, 78, '2024-01-12', '2024-01-20', 1, 1, 1),
(2530, 76, '2024-01-12', '2024-01-27', 1, 0, 0),
(2531, 76, '2024-01-12', '2024-01-27', 1, 0, 0),
(2532, 76, '2024-01-12', '2024-01-27', 1, 0, 0),
(2533, 76, '2024-01-12', '2024-01-13', 1, 0, 0),
(2534, 76, '2024-01-12', '2024-01-13', 1, 0, 0),
(2535, 103, '2024-01-26', '2024-01-27', 1, 1, 1),
(2536, 77, '2024-01-19', '2024-01-22', 1, 1, 0),
(2537, 78, '2024-01-11', '2024-01-12', 1, 1, 1),
(2538, 76, '2024-01-12', '2024-01-13', 1, 0, 0),
(2539, 0, '2024-01-12', '2024-01-20', 1, 1, 1),
(2540, 0, '2024-01-11', '2024-01-12', 1, 1, 1),
(2541, 0, '2024-01-12', '2024-01-13', 1, 0, 1),
(2542, 0, '2024-01-12', '2024-01-13', 1, 1, 0),
(2543, 101, '2024-01-12', '2024-01-13', 1, 0, 1),
(2544, 0, '2024-01-12', '2024-01-13', 1, 0, 0),
(2545, 76, '2024-01-12', '2024-01-13', 1, 1, 1),
(2546, 121, '2024-01-12', '2024-01-20', 1, 1, 1),
(2547, 0, '2024-01-12', '2024-01-13', 1, 1, 1),
(2548, 121, '2024-01-19', '2024-01-20', 1, 0, 0),
(2549, 0, '2024-01-12', '2024-01-13', 1, 1, 1),
(2550, 121, '2024-01-12', '2024-01-13', 1, 0, 0),
(2551, 76, '2024-01-12', '2024-01-13', 1, 1, 0),
(2552, 77, '2024-01-12', '2024-01-13', 1, 1, 0),
(2553, 110, '2024-01-20', '2024-01-21', 1, 1, 0),
(2554, 130, '2024-01-12', '2024-01-13', 1, 1, 1),
(2555, 110, '2024-01-11', '2024-01-12', 1, 1, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `zimmer`
--
ALTER TABLE `zimmer`
  ADD PRIMARY KEY (`zimmer_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `zimmer`
--
ALTER TABLE `zimmer`
  MODIFY `zimmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2556;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
