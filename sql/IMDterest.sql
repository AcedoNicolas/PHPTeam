-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Gegenereerd op: 01 mei 2017 om 02:17
-- Serverversie: 5.6.21
-- PHP-versie: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `IMDterest`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `text` varchar(300) NOT NULL,
  `eigenaar` varchar(300) NOT NULL,
  `locatie` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `images`
--

INSERT INTO `images` (`id`, `image`, `text`, `eigenaar`, `locatie`, `time`) VALUES
(20, 'kasteel1.jpg', 'mooi kasteel\r\n', 'an van steel', '', '2017-04-30 22:47:48'),
(22, 'tools.jpg', 'gereedschap', 'an van steel', '', '2017-04-30 22:47:48'),
(23, 'handen2.jpg', 'flat design handen', 'an van steel', '', '2017-04-30 22:47:48'),
(24, 'duikboot.jpg', 'duikboot', 'an van steel', '', '2017-04-30 22:47:48'),
(25, 'duikboot kopie.jpg', 'drfg', 'bert van hoorn', 'Kortenaken', '2017-04-30 22:47:48'),
(26, 'shop2.jpg', 'flat design', 'bert van hoorn', 'Kortenaken', '2017-04-30 22:47:48'),
(30, 'kasteel.jpg', 'jep', 'bert van hoorn', 'Kortenaken', '2017-04-30 22:54:59'),
(31, 'planten.jpg', 'jo', 'bert van hoorn', 'Kortenaken', '2017-04-30 22:59:36'),
(32, 'tools2.jpg', 'tools', 'an van steel', 'Kortenaken', '2017-04-30 23:08:19'),
(33, 'doos.jpg', 'doos', 'an van steel', 'Kortenaken', '2017-04-30 23:08:54'),
(34, 'hallo intro.png', 'typo', 'an van steel', 'Kortenaken', '2017-04-30 23:10:12'),
(35, 'zuilen.jpg', 'flat design', 'an van steel', 'Mitte', '2017-04-30 23:14:07'),
(36, 'vissen.jpg', 'l:', 'an van steel', 'Mitte', '2017-04-30 23:15:07'),
(37, 'zuilen1.jpg', 'zuil', 'joris', 'Nishishinjuku', '2017-04-30 23:17:11'),
(38, 'acties facebook.jpg', 'flat design', 'joris', 'Nishishinjuku', '2017-05-01 00:03:09');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblactivities`
--

CREATE TABLE IF NOT EXISTS `tblactivities` (
`id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `comment_des` varchar(300) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tblactivities`
--

INSERT INTO `tblactivities` (`id`, `idUser`, `idPost`, `comment_des`, `time`) VALUES
(10, 3, 0, 'mooie iphone', '2017-04-29 14:16:59'),
(11, 3, 8, 'mooie blur op de achtergrond', '2017-04-29 14:18:01'),
(12, 11, 3, 'ah nee, slechte uren !', '2017-04-29 16:08:18'),
(13, 2, 8, 'mooie vrouw', '2017-04-29 16:41:11'),
(14, 1, 2, 'saaie mensen', '2017-04-29 16:44:23'),
(20, 1, 2, 'amai', '2017-04-29 17:59:58'),
(21, 2, 1, 'mooi kop !', '2017-04-29 20:01:25'),
(22, 2, 3, 'vrijdag vrij !!', '2017-04-29 20:40:26'),
(23, 3, 1, 'iedereen kijkt boos ?', '2017-04-29 21:37:33'),
(24, 3, 1, 'ajax, waar ben je', '2017-04-29 21:37:52'),
(27, 3, 4, 'komt goed (y) ', '2017-04-29 21:44:17'),
(28, 3, 8, 'ajax, where are you', '2017-04-29 21:44:42'),
(29, 3, 2, 'lo', '2017-04-29 22:08:42'),
(30, 3, 10, 'netjes\r\n', '2017-04-29 23:30:16'),
(31, 3, 10, 'visnetjes !', '2017-04-29 23:30:22'),
(32, 2, 12, 'stomme doos\r\n', '2017-04-30 11:42:53'),
(33, 2, 4, 'ik kan hem niet verwijderen ?', '2017-04-30 11:47:02'),
(34, 2, 8, 'leuk', '2017-04-30 14:01:06'),
(35, 2, 10, 'cool !', '2017-04-30 15:20:58');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
`ID` int(11) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `avatar` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Users`
--

INSERT INTO `Users` (`ID`, `fullname`, `email`, `password`, `avatar`) VALUES
(1, 'joris', 'joris@joris.be', '$2y$12$ez91rE7RI./Q251tQZf.muxWhbe1TLHRq.fa3wcDjcu/8IfTzWPyq', 'https://s3.amazonaws.com/uifaces/faces/twitter/whale/128.jpg'),
(2, 'bert van hoorn', 'bert@bert.be', '$2y$12$1jp8/VMXHNVtPaNTF0AIkOf53YcOgFCjkc0kcb2FrF93qdDU.Q3EO', 'https://s3.amazonaws.com/uifaces/faces/twitter/abinav_t/128.jpg'),
(3, 'jojo', 'jojo@jojo.com', '$2y$12$iol.kqdzkotYfasmn1E5xe.8fBIOY0QtUuOl.ZYZd85P.D0DCr/5C', 'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg'),
(4, 'bertinus', 'bert@bert.be', '$2y$12$S531S.A.YJl1.OTIwlPwSOAO7vvN0yRC.p94K/07So3/FHeb8rmbu', 'https://s3.amazonaws.com/uifaces/faces/twitter/ritu/128.jpg'),
(5, 'bert', 'bert@bert.be', '$2y$12$C/w4GElmvewoiG6BOAvCq.mE2hLm3C95bHcFtGBYR1sccPC2iOND6', 'https://s3.amazonaws.com/uifaces/faces/twitter/towhidzaman/128.jpg'),
(6, 'bertio', 'bert@bert.be', '$2y$12$T5la/7t3DrQGvToiT4KLXOIqdqqoKxsXtFLDFDQSdCdNQyG2WkkxG', 'https://s3.amazonaws.com/uifaces/faces/twitter/enda/128.jpg'),
(11, 'Boris', 'boris@boris.be', '$2y$12$T5la/7t3DrQGvToiT4KLXOIqdqqoKxsXtFLDFDQSdCdNQyG2WkkxG', 'https://s3.amazonaws.com/uifaces/faces/twitter/andyvitale/128.jpg'),
(12, 'an van steel', 'an@an.be', '$2y$12$v5BTVXf.yR.xh.neCvXzjurOL4641Tb5.Gkw9zOQ8bVv95JuuLF9G', 'https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/128.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `images`
--
ALTER TABLE `images`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT voor een tabel `tblactivities`
--
ALTER TABLE `tblactivities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
