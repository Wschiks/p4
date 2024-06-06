-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 mei 2024 om 13:13
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flieg.com`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE `contact` (
  `contactID` int(11) NOT NULL,
  `e-mail` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `bericht` text NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` int(11) NOT NULL,
  `land` varchar(255) NOT NULL,
  `stad` varchar(255) NOT NULL,
  `prijs` int(11) NOT NULL,
  `kamer_nummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nieuwsbrief`
--

CREATE TABLE `nieuwsbrief` (
  `nieuwbriefID` int(11) NOT NULL,
  `e-mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `ordersID` int(11) NOT NULL,
  `usersID` int(11) NOT NULL,
  `tripID` int(11) NOT NULL,
  `prijs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trip`
--

CREATE TABLE `trip` (
  `tripID` int(11) NOT NULL,
  `land` varchar(255) NOT NULL,
  `stad` varchar(255) NOT NULL,
  `prijs` int(11) NOT NULL,
  `vertrek_datum` int(11) NOT NULL,
  `eind_datum` int(11) NOT NULL,
  `personen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `usersID` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `e-mail` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vlucht`
--

CREATE TABLE `vlucht` (
  `vluchtID` int(11) NOT NULL,
  `land` varchar(255) NOT NULL,
  `stad` varchar(255) NOT NULL,
  `prijs` int(11) NOT NULL,
  `vertrek_luchthaven` varchar(255) NOT NULL,
  `besteming_luchthaven` varchar(255) NOT NULL,
  `vluchttijd` int(11) NOT NULL,
  `luchtvaartmaatschappij` varchar(255) NOT NULL,
  `afstand` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexen voor tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexen voor tabel `nieuwsbrief`
--
ALTER TABLE `nieuwsbrief`
  ADD PRIMARY KEY (`nieuwbriefID`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordersID`);

--
-- Indexen voor tabel `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`tripID`);

--
-- Indexen voor tabel `vlucht`
--
ALTER TABLE `vlucht`
  ADD PRIMARY KEY (`vluchtID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotelID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `nieuwsbrief`
--
ALTER TABLE `nieuwsbrief`
  MODIFY `nieuwbriefID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `ordersID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `trip`
--
ALTER TABLE `trip`
  MODIFY `tripID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `vlucht`
--
ALTER TABLE `vlucht`
  MODIFY `vluchtID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
