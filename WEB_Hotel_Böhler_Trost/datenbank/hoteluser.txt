-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Jan 2024 um 18:59
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
(3021, 1524, '2024-01-14 18:38:32', '../uploads/thumbnails/cow-431729_640.jpg', 'Das ist unsere Kuh namens Hilda.'),
(3022, 1524, '2024-01-14 18:41:10', '../uploads/thumbnails/animal-1867125_640.jpg', 'Das ist zwar nicht unser Pinguin, aber dafür ein Bild von einem.');

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
(1524, 1, 'admin', 'Admin', 'Hotel', 'Hotel@gmail.com', 'Hoteladmin', '$2y$10$jZIbM.GrnNF70b3wMf3pSOPESkYR6hkFHX3nvXUexeo9OCfsCemMu'),
(1525, 1, 'registriert', 'Thomas', 'Trost', 'tomi2002@gmx.at', 'tomt', '$2y$10$z2wqmtNgVYmrcOZgFCOP6uAkYRIdNGdI8va6dpGQujX62j4.1J5/i');

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
(1524, 2566),
(1525, 2569);

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
(2566, 135, 'Neu', '2024-01-16', '2024-01-17', 1, 1, 0),
(2569, 455, 'Neu', '2024-01-14', '2024-01-15', 1, 1, 1);

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
  MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3023;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1527;

--
-- AUTO_INCREMENT für Tabelle `zimmer`
--
ALTER TABLE `zimmer`
  MODIFY `zimmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2570;

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
