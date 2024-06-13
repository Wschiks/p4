-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 07 jun 2024 om 12:30
-- Serverversie: 5.7.26
-- PHP-versie: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Flieg`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `info`
--

CREATE TABLE `info` (
  `tripID` int(11) NOT NULL,
  `infoIMG` varchar(255) NOT NULL,
  `informatiestuk` text NOT NULL,
  `luchthavenaankomst` varchar(255) NOT NULL,
  `luchthavenvertek` varchar(255) NOT NULL,
  `Luchtvaartmaaschappij` varchar(255) NOT NULL,
  `Afstand` int(11) NOT NULL,
  `Vluchttijd` int(11) NOT NULL,
  `infoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `info`
--

INSERT INTO `info` (`tripID`, `infoIMG`, `informatiestuk`, `luchthavenaankomst`, `luchthavenvertek`, `Luchtvaartmaaschappij`, `Afstand`, `Vluchttijd`, `infoID`) VALUES
(1, 'infoimg/madridinfo.jpg', 'Madrid is een stad vol met bekende highlights, attracties en bezienswaardigheden, zoals het Palacio Real, de museumdriehoek met het wereldberoemde Prado Museum en het stadion Bernabeu van Real Madrid. De koninklijke hoofdstad van Spanje ligt op twee uur vliegen van Nederland en is zodoende een perfecte locatie voor een stedentrip in Spanje. Van kunst en cultuur in de vele musea, historische pleinen, groene parken, heerlijk te winkelen of tapas te eten in een van de goede restaurants. U zult zich in de wereldstad Madrid geen moment vervelen!', 'Madrid Airport (MAD)', 'Amsterdam (AMS)', 'FliegAirline (FAL)', 1460, 3, 1),
(2, 'infoimg/hawaiiinfo.jpg', 'Hawaï is een paradijselijk eiland in de Stille Oceaan, bekend om zijn prachtige stranden, weelderige regenwouden, vulkanen en unieke cultuur. Geniet van de adembenemende natuur, ga snorkelen, duiken of surfen in de helderblauwe wateren, of maak een wandeling door de weelderige tropische landschappen. Hawaï is een ideale bestemming voor een ontspannen vakantie onder de zon.', 'Honolulu International Airport (HNL)', 'Amsterdam Airport Schiphol (AMS)', 'FliegAirline (FAL)', 11300, 18, 2),
(3, 'infoimg/icelandinfo.jpg', 'IJsland is een land van adembenemende natuurlijke schoonheid, met majestueuze watervallen, gletsjers, vulkanen en geothermische warmwaterbronnen. Verken de unieke landschappen, maak een ritje op een ijsberg of ga walvissen spotten in de wateren rondom het eiland. IJsland biedt een onvergetelijke ervaring voor avontuurlijke reizigers.', 'Keflavik International Airport (KEF)', 'Amsterdam Airport Schiphol (AMS)', 'FliegAirline (FAL)', 2240, 3, 3),
(4, 'infoimg/druteninfo.jpg', 'Druten is een charmante stad gelegen in Nederland, met schilderachtige grachten, historische gebouwen en een ontspannen sfeer. Verken de gezellige straatjes, bezoek lokale markten en geniet van heerlijke Nederlandse gerechten in de plaatselijke restaurants. Druten biedt een authentieke Nederlandse ervaring weg van de drukte van de grote steden.', 'Amsterdam Airport Schiphol (AMS)', 'Druten Airport (DRT)', ' Flieg Heteluchtballon (FHB)', 75, 3, 4),
(5, 'infoimg/austria.jpg', 'Oostenrijk is een land van adembenemende bergen, prachtige meren en pittoreske dorpjes. Geniet van het buitenleven door te wandelen, skiën of snowboarden in de Alpen, of ontspan aan de oevers van een van de vele kristalheldere meren. Oostenrijk biedt een perfecte combinatie van natuurlijke schoonheid en culturele rijkdom.', 'Vienna International Airport (VIE)', 'Amsterdam Airport Schiphol (AMS)', 'FliegAirline (FAL)', 980, 2, 5),
(6, 'infoimg/morocco.jpg', 'Marokko is een land van rijke culturele tradities, betoverende steden en adembenemende landschappen. Verken de kleurrijke souks, bewonder de prachtige architectuur van de medina\'s en geniet van de heerlijke Marokkaanse keuken. Maak een ritje door de Sahara, bezoek historische bezienswaardigheden of ontspan aan de kust. Marokko biedt een onvergetelijke reiservaring.', 'Mohammed V International Airport (CMN)', 'Amsterdam Airport Schiphol (AMS)', 'FliegAirline (FAL)', 2300, 3, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nieuwsbrief`
--

CREATE TABLE `nieuwsbrief` (
  `nieuwbriefID` int(11) NOT NULL,
  `e-mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `ordersID` int(11) NOT NULL,
  `usersID` int(11) NOT NULL,
  `tripID` int(11) NOT NULL,
  `prijs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `personen` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `trip`
--

INSERT INTO `trip` (`tripID`, `land`, `stad`, `prijs`, `vertrek_datum`, `eind_datum`, `personen`, `img`) VALUES
(1, 'Spanje', 'Madrid', 800, 1717192800, 1717970400, 2, 'img/madrid.png'),
(2, 'Verenigde Staten', 'Hawaii', 1200, 1720994400, 1721858400, 4, 'img/hawaii.png'),
(3, 'IJsland', 'Reykjavik', 950, 1722808800, 1723672800, 2, 'img/ijsland.png'),
(4, 'Nederland', 'Druten', 300, 1725919200, 1726783200, 3, 'img/druten.png'),
(5, 'Oostenrijk', 'Wenen', 700, 1727733600, 1728338400, 1, 'img/osstenrijk.png'),
(6, 'Marokko', 'Marrakech', 650, 1730415600, 1731193200, 2, 'img/marrokko.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `usersID` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `naam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexen voor tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`infoID`),
  ADD KEY `fk_info` (`tripID`);

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
-- AUTO_INCREMENT voor een tabel `info`
--
ALTER TABLE `info`
  MODIFY `infoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `tripID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `vlucht`
--
ALTER TABLE `vlucht`
  MODIFY `vluchtID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `fk_info` FOREIGN KEY (`tripID`) REFERENCES `trip` (`tripID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
