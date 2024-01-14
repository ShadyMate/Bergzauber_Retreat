-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Jan 2024 um 13:46
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
-- Tabellenstruktur für Tabelle `newsbeiträge`
--

CREATE TABLE `newsbeiträge` (
  `newsid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `Datum` datetime DEFAULT NULL,
  `Bilddatei` varchar(128) NOT NULL,
  `Text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `newsbeiträge`
--

INSERT INTO `newsbeiträge` (`newsid`, `userid`, `Datum`, `Bilddatei`, `Text`) VALUES
(3010, 1509, NULL, '../uploads/thumbnails/Studen.jpg', 'Dies ist ein Text'),
(3017, 1518, '2024-01-13 17:32:52', '../uploads/thumbnails/Studen.jpg', 'sfdsdghdfghfgfg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userid` int(32) NOT NULL,
  `Aktiviert` tinyint(4) NOT NULL,
  `Rechte` varchar(32) NOT NULL,
  `Vorname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Nachname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Username` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Passwort` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userid`, `Aktiviert`, `Rechte`, `Vorname`, `Nachname`, `Email`, `Username`, `Passwort`) VALUES
(1509, 1, 'admin', 'Admin', 'Hotel', 'Hoteladmin@gmail.com', 'admin', '$2y$10$bCXzN5Vk..M7vHBEnqNCBeAdKsf1zzmautORGhJ1nBlkZUNtC1HWm'),
(1511, 1, 'registriert', 'sdf', 'f', 'tomi2002@gmx.atdsd', 'asds', '$2y$10$b9et.JitVE14PasmHuqeRuQSLVArZnLxe8DqvlFBkkGASqrNor.Tm'),
(1512, 0, 'registriert', 'fff', 'fffff', 'tomi2002@gmx.atffff', 'fff', '$2y$10$.9neugG.aUAoOqlHq3Ii8OYceFR4dTuNPubTlNo846sFFlv8QgRIm'),
(1518, 1, 'registriert', 'd', 'f', 'tomi2ddd002@gmx.at', 'asdffffff', '$2y$10$2BVKmfAqhCm4yUX.yB5lau4G4kI4IjB.qPRlOQQNmJj5nsqmXygNi'),
(1519, 1, 'registriert', 'Thomas', 'Trost', 'tomi20df02@gmx.at', 'asdfffff', '$2y$10$Zt3JLTBurOQlZGKjzRP.MON3fU2dkJLy2YPiwWMon0DEEgHJvGEPe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_zimmer`
--

CREATE TABLE `user_zimmer` (
  `userid` int(11) DEFAULT NULL,
  `zimmer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user_zimmer`
--

INSERT INTO `user_zimmer` (`userid`, `zimmer_id`) VALUES
(1496, 2506),
(1496, 2506),
(1496, 2506),
(1496, 2506),
(1496, 2506),
(1496, 2506),
(1496, 2507),
(1496, 2507),
(1496, 2507),
(1496, 2507),
(1496, 2508),
(1496, 2509),
(1496, 2510),
(1496, 2511),
(1496, 2511),
(1496, 2511),
(1496, 2511),
(1496, 2515),
(1496, 2515),
(1496, 2495),
(1496, 2518),
(1496, 2519),
(1496, 2520),
(1496, 2520),
(1496, 2520),
(1497, 2533),
(1497, 2534),
(1497, 2535),
(1497, 2537),
(1497, 2538),
(1497, 2539),
(1497, 2540),
(1497, 2541),
(1497, 2542),
(1497, 2543),
(1499, 2544),
(1499, 2545),
(1499, 2546),
(1501, 2547),
(1501, 2548),
(1508, 2549),
(1508, 2550),
(1508, 2551),
(1508, 2552),
(1508, 2553),
(1509, 2554),
(1509, 2558),
(1519, 2562),
(1519, 2563);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zimmer`
--

CREATE TABLE `zimmer` (
  `zimmer_id` int(11) NOT NULL,
  `Kosten` int(32) NOT NULL,
  `Status` varchar(32) NOT NULL,
  `Anreise` date NOT NULL,
  `Abreise` date NOT NULL,
  `Frühstück` tinyint(4) NOT NULL,
  `Parkplatz` tinyint(4) NOT NULL,
  `Haustiere` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `zimmer`
--

INSERT INTO `zimmer` (`zimmer_id`, `Kosten`, `Status`, `Anreise`, `Abreise`, `Frühstück`, `Parkplatz`, `Haustiere`) VALUES
(2533, 76, '', '2024-01-12', '2024-01-13', 1, 0, 0),
(2534, 76, '', '2024-01-12', '2024-01-13', 1, 0, 0),
(2535, 103, '', '2024-01-26', '2024-01-27', 1, 1, 1),
(2537, 78, '', '2024-01-11', '2024-01-12', 1, 1, 1),
(2538, 76, '', '2024-01-12', '2024-01-13', 1, 0, 0),
(2539, 0, '', '2024-01-12', '2024-01-20', 1, 1, 1),
(2540, 0, '', '2024-01-11', '2024-01-12', 1, 1, 1),
(2541, 0, '', '2024-01-12', '2024-01-13', 1, 0, 1),
(2542, 0, '', '2024-01-12', '2024-01-13', 1, 1, 0),
(2543, 101, '', '2024-01-12', '2024-01-13', 1, 0, 1),
(2544, 0, '', '2024-01-12', '2024-01-13', 1, 0, 0),
(2545, 76, '', '2024-01-12', '2024-01-13', 1, 1, 1),
(2546, 121, '', '2024-01-12', '2024-01-20', 1, 1, 1),
(2547, 0, '', '2024-01-12', '2024-01-13', 1, 1, 1),
(2548, 121, '', '2024-01-19', '2024-01-20', 1, 0, 0),
(2549, 0, '', '2024-01-12', '2024-01-13', 1, 1, 1),
(2550, 121, '', '2024-01-12', '2024-01-13', 1, 0, 0),
(2551, 76, '', '2024-01-12', '2024-01-13', 1, 1, 0),
(2552, 77, '', '2024-01-12', '2024-01-13', 1, 1, 0),
(2553, 110, '', '2024-01-20', '2024-01-21', 1, 1, 0),
(2554, 130, 'Storniert', '2024-01-12', '2024-01-13', 1, 1, 1),
(2558, 70, 'Bestätigt', '2024-01-13', '2024-01-15', 1, 0, 0),
(2559, 100, 'Neu', '2024-01-13', '2024-01-14', 0, 1, 0),
(2560, 85, 'Neu', '2024-01-14', '2024-01-15', 1, 0, 0),
(2562, 110, 'Neu', '2024-01-13', '2024-01-19', 1, 1, 0),
(2563, 70, 'Neu', '2024-01-20', '2024-01-21', 1, 0, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `newsbeiträge`
--
ALTER TABLE `newsbeiträge`
  ADD PRIMARY KEY (`newsid`),
  ADD KEY `user_id` (`userid`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indizes für die Tabelle `user_zimmer`
--
ALTER TABLE `user_zimmer`
  ADD KEY `userid` (`userid`),
  ADD KEY `zimmer_id` (`zimmer_id`);

--
-- Indizes für die Tabelle `zimmer`
--
ALTER TABLE `zimmer`
  ADD PRIMARY KEY (`zimmer_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `newsbeiträge`
--
ALTER TABLE `newsbeiträge`
  MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3018;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1520;

--
-- AUTO_INCREMENT für Tabelle `zimmer`
--
ALTER TABLE `zimmer`
  MODIFY `zimmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2564;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `newsbeiträge`
--
ALTER TABLE `newsbeiträge`
  ADD CONSTRAINT `newsbeiträge_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `user_zimmer`
--
ALTER TABLE `user_zimmer`
  ADD CONSTRAINT `user_zimmer_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `user_zimmer_ibfk_2` FOREIGN KEY (`zimmer_id`) REFERENCES `zimmer` (`zimmer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
