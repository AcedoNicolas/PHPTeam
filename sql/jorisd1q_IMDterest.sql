-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 15 mei 2017 om 21:36
-- Serverversie: 5.6.35-log
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jorisd1q_IMDterest`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `text` varchar(300) NOT NULL,
  `eigenaar` varchar(300) NOT NULL,
  `locatie` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `images`
--

INSERT INTO `images` (`id`, `image`, `text`, `eigenaar`, `locatie`, `time`) VALUES
(46, '001_logo+design.jpg', 'Bramer photography logo', 'joris delvaux', 'Diest', '2017-05-10 20:13:57'),
(47, '002_logo+design.jpg', 'easy card logo\r\n', 'jojo', 'Kortenaken', '2017-05-10 20:14:14'),
(48, '9b5f3d3af901633c1fea0c06af7ccb24.png', 'logo design', 'bert', 'Deinze', '2017-05-10 20:14:33'),
(50, '0011_logo+design.jpg', 'Logo Finista', 'jojo', 'Kortenaken', '2017-05-10 20:15:05'),
(52, '61b63f5e7e146d39526013401a451dea.jpg', 'logo voor alto', 'nico', 'leuven', '2017-05-10 20:15:53'),
(53, '_7597197_orig.jpg', 'website interface cities', 'joris delvaux', 'Kortenaken', '2017-05-10 20:20:43'),
(54, 'AAEAAQAAAAAAAAgaAAAAJDc4NDE3YzY1LTJjOWQtNGU1YS1iMmU4LWNjNjkzMzAyNzYyZA.jpg', 'interface responsive awesome design', 'jojo', 'Diest', '2017-05-10 20:21:19'),
(55, 'afa33a6ae77bca5b63c8efe3dff21731.jpg', 'design voorwerp', 'bertus', 'hasselt', '2017-05-10 20:21:42'),
(56, 'Tips-To-Design-Mobile-Apps.jpg', 'mobile design interface', 'david G.', 'Kortenaken', '2017-05-10 20:22:25'),
(57, 'bromo-free-design-app.jpg', 'bromo free design', 'jowis P', 'Gent', '2017-05-10 20:22:40'),
(58, 'logo-2015-1.jpg', 'cool logo ', 'nico', 'Mechelen', '2017-05-10 20:23:13'),
(59, 'awwwards-loveclip.jpg', 'loveclip logo, awards winner !', 'ann', 'Kortenaken', '2017-05-10 20:23:58'),
(60, 'Best-Logo-designs-for-Inspiration-4.jpg', 'logo: looking glass', 'steffie', 'Hasselt', '2017-05-10 20:24:37'),
(61, 'web-design-services-page.png', 'web design interface', 'george', 'Kortenaken', '2017-05-10 20:25:08'),
(62, 'wally_app_design_3_up.jpg', 'mobile design interface wally', 'joris', 'Aarschot', '2017-05-10 20:25:39'),
(63, 'images.jpg', 'Logo R', 'bert', 'Kortenaken', '2017-05-10 20:26:03'),
(64, 'praguezoo.jpg', 'mobile interface for cool app', 'bert', 'Antwerpen', '2017-05-10 20:26:24'),
(65, 'Web-Design-Kedah4.png', 'responsive interface for web application', 'michel', 'Mechelen', '2017-05-10 20:27:01');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `idUser` int(30) NOT NULL,
  `idPost` int(30) NOT NULL,
  `actie` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `likes`
--

INSERT INTO `likes` (`id`, `idUser`, `idPost`, `actie`) VALUES
(304, 1, 61, 1),
(306, 1, 65, 1),
(309, 1, 58, 1),
(313, 1, 59, 0),
(319, 1, 62, 0),
(324, 1, 46, 1),
(326, 1, 56, 0),
(333, 1, 60, 1),
(334, 1, 53, 1),
(336, 1, 64, 0),
(338, 1, 62, 0),
(341, 1, 65, 0),
(342, 1, 58, 0),
(343, 1, 53, 1),
(345, 3, 65, 0),
(347, 3, 64, 0),
(348, 3, 63, 1),
(350, 12, 63, 0),
(351, 12, 59, 1),
(352, 12, 58, 1),
(353, 12, 54, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblactivities`
--

CREATE TABLE `tblactivities` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `comment_des` varchar(300) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tblactivities`
--

INSERT INTO `tblactivities` (`id`, `idUser`, `idPost`, `comment_des`, `time`) VALUES
(44, 13, 58, 'cool', '2017-05-10 22:56:11'),
(54, 2, 62, 'mooie interface', '2017-05-10 23:18:52'),
(55, 3, 66, 'cool !', '2017-05-12 17:13:43'),
(84, 3, 66, 'mooi', '2017-05-13 21:22:56'),
(115, 13, 62, 'klopt bert !', '2017-05-13 23:49:46'),
(116, 13, 59, 'goed gevonden !', '2017-05-13 23:50:09'),
(174, 13, 65, 'mooi', '2017-05-14 15:48:41'),
(175, 2, 52, 'cool\n', '2017-05-14 22:03:46'),
(176, 2, 52, 'nice\n', '2017-05-14 22:03:56'),
(177, 3, 58, 'ja he\n', '2017-05-14 22:26:41'),
(178, 3, 65, 'cool toch', '2017-05-15 16:46:43'),
(180, 12, 63, 'leuk logo', '2017-05-15 21:29:08'),
(181, 12, 58, 'Nice ! dit is mijn stlijl wel. love it', '2017-05-15 21:29:53'),
(182, 12, 54, 'knap werk !', '2017-05-15 21:30:29');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `avatar` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://trial26.github.io/Project-2/img/avatar-empty.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Users`
--

INSERT INTO `Users` (`ID`, `fullname`, `email`, `password`, `avatar`) VALUES
(1, 'joris', 'joris@joris.be', '$2y$12$ez91rE7RI./Q251tQZf.muxWhbe1TLHRq.fa3wcDjcu/8IfTzWPyq', 'https://s3.amazonaws.com/uifaces/faces/twitter/whale/128.jpg'),
(2, 'bert van hoorn', 'bert@bert.be', '$2y$12$1jp8/VMXHNVtPaNTF0AIkOf53YcOgFCjkc0kcb2FrF93qdDU.Q3EO', 'https://s3.amazonaws.com/uifaces/faces/twitter/abinav_t/128.jpg'),
(3, 'jojo', 'jojo@jojo.com', '$2y$12$iol.kqdzkotYfasmn1E5xe.8fBIOY0QtUuOl.ZYZd85P.D0DCr/5C', 'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg'),
(11, 'Boris', 'boris@boris.be', '$2y$12$T5la/7t3DrQGvToiT4KLXOIqdqqoKxsXtFLDFDQSdCdNQyG2WkkxG', 'https://s3.amazonaws.com/uifaces/faces/twitter/andyvitale/128.jpg'),
(12, 'an van steel', 'an@an.be', '$2y$12$v5BTVXf.yR.xh.neCvXzjurOL4641Tb5.Gkw9zOQ8bVv95JuuLF9G', 'https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/128.jpg'),
(13, 'nico', 'nico@nico.be', '$2y$12$3VWz1w8ZE4YISFtrzIOy0u4sfbjwVGZYjfVezUSLj39rjLKdfIbuO', 'https://trial26.github.io/Project-2/img/avatar-empty.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tblactivities`
--
ALTER TABLE `tblactivities`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT voor een tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;
--
-- AUTO_INCREMENT voor een tabel `tblactivities`
--
ALTER TABLE `tblactivities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
