-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220623.a68b47d354
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 apr 2023 om 15:47
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerechten`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorieen`
--

CREATE TABLE `categorieen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categorieen`
--

INSERT INTO `categorieen` (`id`, `naam`) VALUES
(1, 'Vis'),
(2, 'Vlees'),
(3, 'Vegetarisch'),
(4, 'Pasta'),
(5, 'Pizza'),
(6, 'Soep'),
(7, 'Wok'),
(8, 'Barbecue'),
(9, 'Afhaal'),
(10, 'Restaurant'),
(11, 'Dessert'),
(12, 'Kaas'),
(13, 'Ovenschotel'),
(15, 'Broodje / Sandwich'),
(16, 'Ontbijt\r\n');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechten`
--

CREATE TABLE `gerechten` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `categorieId` int(11) NOT NULL,
  `datum` date NOT NULL,
  `waardering` int(11) NOT NULL,
  `bron` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gerechten`
--

INSERT INTO `gerechten` (`id`, `naam`, `categorieId`, `datum`, `waardering`, `bron`, `info`) VALUES
(24, 'Kaasschotel', 12, '2022-01-31', 5, '', 'Oudejaarsavond 22.'),
(25, 'Chinees Wang\'s Garden', 10, '2023-01-01', 5, 'https://wangsgardenzedelgem.be/', 'Nieuwjaarsdag 2023. '),
(26, 'Grill-Gourmet', 2, '2023-01-02', 5, '', ''),
(27, 'Hertenragout. Veenbessen, champignons en kroketten', 2, '2023-01-03', 5, '', ''),
(28, 'Spaghetti Bolognaise', 4, '2023-01-04', 4, '', ''),
(29, 'Gevulde kalkoen', 2, '2023-01-05', 4, '', 'Vooraf gemaakte kalkoenrollade, gekocht aan halve prijs bij het sluiten van de Colruyt in Zedelgem voor renoveringen.'),
(30, 'Gevulde kalkoen', 2, '2023-01-06', 4, '', 'Vooraf gemaakte kalkoenrollade, gekocht aan halve prijs bij het sluiten van de Colruyt in Zedelgem voor renoveringen.\r\n'),
(31, 'Frieten van frietkot Sano', 9, '2023-01-07', 4, '', ''),
(32, 'Frieten van frietkot Sano', 9, '2023-01-07', 4, '', ''),
(33, 'Witloof in hesp met kaassaus en patatten', 13, '2023-01-08', 4, '', ''),
(34, 'Spaghetti Putanesca', 4, '2023-01-09', 4, '', ''),
(35, 'Konijn met wintergroenten en aardappelen', 2, '2023-01-10', 3, '', ''),
(36, 'Konijn met wintergroenten en aardappelen', 2, '2023-01-10', 3, '', ''),
(37, 'Croques madame', 15, '2023-01-11', 3, '', ''),
(38, 'Runds hamburgers met bonen in tomatensaus', 2, '2023-01-12', 4, '', ''),
(39, 'Pizzahut: Hot \'n\' Spicy, Super Supreme, BBQ en Pepper', 9, '2023-01-13', 4, '', ''),
(40, 'Pizzahut: Hot \'n\' Spicy, Super Supreme, BBQ en Pepper', 9, '2023-01-13', 4, '', ''),
(41, 'Vispannetje met roomsaus en frieten', 1, '2023-01-14', 4, '', ''),
(42, 'Ribbetjes - Kazak', 2, '2023-01-15', 3, '', ''),
(43, 'Gegrilde Kip met appelmoes en patat', 2, '2023-01-16', 3, '', ''),
(44, 'Wok', 2, '2023-01-17', 3, '', ''),
(45, 'Steak au poivre met tomaat en frieten', 2, '2023-01-18', 4, '', ''),
(46, 'Balletjes in tomatensaus met puree', 2, '2023-01-19', 3, '', ''),
(49, 'Raclette', 12, '2023-01-21', 4, '', ''),
(50, 'Hamburgers', 15, '2023-01-22', 3, '', ''),
(51, 'Pappardelle met vis', 1, '2023-01-23', 3, '', ''),
(52, 'Erwtensoep', 6, '2023-01-25', 3, '', ''),
(53, 'Hutsepot met blinde vink', 2, '2023-01-26', 3, '', ''),
(55, 'Vol-au-vent met frieten en sla', 2, '2023-01-29', 5, '', ''),
(56, 'Vol-au-vent met bladerdeeg en patat', 2, '2023-01-30', 4, '', ''),
(57, 'Zurkelpatatten met worst', 2, '2023-01-31', 4, '', ''),
(58, 'Pensen met appelmoes en ajuinkonfijt', 2, '2023-02-04', 3, '', ''),
(59, 'Tomatensoep', 6, '2023-02-01', 5, '', ''),
(60, 'Chili con carne met rijst', 2, '2023-02-02', 5, '', ''),
(61, 'Kippebouten met gebakken aardappel en salade', 2, '2023-02-05', 3, '', ''),
(62, 'Babi pangang met rijst', 2, '2023-02-06', 3, '', 'Verjaardag Bert.'),
(63, 'Schnitzels met butternut en patat', 2, '2023-02-07', 3, '', ''),
(64, 'Pasta met groene pesto en kipfilet', 4, '2023-02-08', 4, '', ''),
(65, 'Ardeens gebraad met patat', 2, '2023-02-09', 3, '', ''),
(66, 'Steak met zoete aardappelen, warme tomaten en mais', 2, '2023-02-10', 3, '', ''),
(67, 'Ribbetjes met kazakken en koolsla', 2, '2023-02-11', 3, '', ''),
(68, 'Potje - Gehakt Parmentier', 13, '2023-02-12', 4, '', ''),
(69, 'Potje - Gehakt Parmentier', 13, '2023-02-13', 4, '', ''),
(70, 'Gegrilde Kipfilet met appelmoes', 2, '2023-02-14', 3, '', ''),
(71, 'Kalkoenstovers in peperroomsaus en patat', 2, '2023-02-15', 3, '', ''),
(72, 'Hamburgers met guacamole', 15, '2023-02-16', 4, '', ''),
(74, 'Verse kabeljouw (Oostende) in de boter met frietjes en sla', 1, '2023-02-18', 4, '', ''),
(75, 'Vispizza met kabeljauw', 1, '2023-02-19', 3, '', ''),
(76, 'Karnemelkpap met eieren en patat', 3, '2023-02-20', 5, '', 'Verjaardag Thijs.'),
(77, 'Zurkelpatten met worst', 2, '2023-02-21', 4, '', ''),
(78, 'Kip met Mexicaanse rijst', 2, '2023-02-22', 3, '', ''),
(79, 'Kip met Mexicaanse rijst', 2, '2023-02-23', 3, '', ''),
(80, 'Ardeens gebraad met groene boontjes en patat', 2, '2023-02-24', 3, '', ''),
(81, 'Albondigas met gebakken patat', 2, '2023-02-25', 4, '', ''),
(82, 'Kalkoenfilet met sinaasappelsaus en rijst', 2, '2023-02-26', 3, '', 'Markt St Michiels.'),
(83, 'Albondigas', 2, '2023-02-27', 4, '', ''),
(84, 'Huevos Rancheros', 3, '2023-01-20', 4, '', ''),
(85, 'Groentenlasagna', 3, '2023-02-17', 5, 'https://dagelijksekost.een.be/gerechten/lasagne-met-gegrilde-groenten', 'Molto Bueno!!'),
(87, 'Pasta met garnalen', 4, '2023-01-28', 3, '', ''),
(88, 'Kotelet met pickelssaus en rosti', 2, '2023-03-01', 3, '', ''),
(89, 'Spaghetti Bolognaise', 4, '2023-03-02', 4, '', ''),
(90, 'Witloof in hesp met kaassaus', 13, '2023-03-03', 5, '', ''),
(91, 'Frietje delle', 2, '2023-03-04', 3, '', ''),
(92, 'Scampi in \'t groen en puree', 1, '2023-03-05', 5, '', 'Bert zegt: heel lekker.'),
(93, 'Boeuf Bourguignon met pasta', 4, '2023-03-06', 3, '', ''),
(94, 'Konijn met pruimen en patat', 2, '2023-03-07', 3, '', ''),
(95, 'Rundsvlees met broccoli en noedels', 7, '2023-03-08', 3, '', ''),
(96, 'Toscaanse burgers met bonen in tomatensaus en patat', 2, '2023-03-09', 3, '', ''),
(97, 'Fishburgers tussen een broodje met verse tartaatsaus', 15, '2023-03-10', 3, '', ''),
(98, 'Pizza: scampi - peperoni - super supreme', 5, '2023-03-12', 3, '', ''),
(99, 'Pizza: scampi - pperoni - BBQ chicken', 5, '2023-03-13', 3, '', ''),
(100, 'Gehaktbrood met ei, wortelen en aardappelen', 2, '2023-03-14', 5, '', 'Bert\'s world famous meatloaf!\r\n\r\n'),
(101, 'Pitta', 15, '2023-03-15', 3, '', ''),
(102, 'Dorade in papillot met aardappelpuree', 1, '2023-03-16', 3, '', ''),
(103, 'Huevos Rancheros', 3, '2023-03-17', 4, '', ''),
(104, 'Orloff gebraad met gestoofde witloof en kroketten', 2, '2023-03-18', 3, '', ''),
(105, 'Asperge Flamande met aardappelpuree', 3, '2023-03-19', 4, '', ''),
(106, 'Chinees - Jade Loppem', 9, '2023-03-23', 3, 'https://www.jade-loppem.be/', 'Verjaardag Mama. Afhaalchinees Jade in Loppem. '),
(107, 'Croque monsieur', 15, '2023-03-24', 3, '', ''),
(108, 'Gegrilde steaks met frietjes', 2, '2023-03-25', 3, '', ''),
(109, 'Gegrilde steaks met frietjes', 2, '2023-03-25', 3, '', ''),
(110, 'Brunch', 16, '2023-03-26', 4, '', 'Boterkoeken, pistolets van Bakkerij Gerdy. Bloedworst, witte pens en gebakken chorizo. Gebakken ei. Paté. Vers fruitsap.'),
(111, 'Moussaka', 13, '2023-03-26', 3, '', ''),
(112, 'Stoofvlees met patatten en witloof', 2, '2023-03-27', 3, '', ''),
(113, 'Kip curry met rijs', 2, '2023-03-28', 3, '', ''),
(114, 'Tagliatelli met gehaktballen met prei in kaassaus', 4, '2023-03-29', 4, '', ''),
(115, 'Kippenboutjes met stoofgroenten en patat', 2, '2023-03-30', 3, '', ''),
(116, 'Forel in Ricardsaus met frietjes en venkel en sla', 1, '2023-04-01', 4, '', ''),
(117, 'Tajine van lamsbout', 2, '2023-04-02', 3, '', ''),
(118, 'Piepkuikens', 2, '2023-04-03', 3, '', ''),
(119, 'Varkenshaasje met krieken en aardappel', 2, '2023-04-04', 3, '', ''),
(120, 'Spaghetti Bolognaise', 4, '2023-04-05', 3, '', ''),
(121, 'Steak natuur met aardappelen', 2, '2023-04-06', 3, '', ''),
(122, 'Steak natuur met corn bread', 2, '2023-04-07', 4, '', 'Club Brugge - Seraing'),
(123, 'Gourmet met ciabatta', 2, '2023-04-08', 3, '', ''),
(124, 'Zeetong met frieten, witloof en sla', 1, '2023-04-09', 4, '', ''),
(125, 'Rundstong in Madeirasaus en puree', 2, '2023-04-10', 3, '', ''),
(126, 'Rundstong in Madeira en spirelli', 2, '2023-01-11', 3, '', ''),
(127, 'Zoete tajine met kip en gekarameliseerde peren ', 2, '2023-04-16', 1, 'https://njam.tv/recepten/zoete-tajine-met-kip-en-gekarameliseerde-peren', 'Gezien op njam.'),
(128, 'Zoute tajine met kip en gekonfijte citroen', 2, '2023-04-15', 4, 'https://njam.tv/recepten/zoute-tajine-met-kip-en-gekonfijte-citroen', 'Gezien op njam'),
(129, 'Macaroni met kaas en hesp', 4, '2023-04-14', 3, '', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categorieen`
--
ALTER TABLE `categorieen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gerechten`
--
ALTER TABLE `gerechten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categorieen`
--
ALTER TABLE `categorieen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `gerechten`
--
ALTER TABLE `gerechten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



