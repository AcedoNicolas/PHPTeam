-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 mei 2017 om 21:58
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imdterest`
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
(48, '94e5c8f8a38382c6750f26a2467ad670.jpg', 'Sketch', 'Bowdy Heyens', 'Willebroek', '2017-05-15 19:54:56'),
(49, 'd39f1e4d3f635dd7b72ad73f4ae5f7de.jpg', 'Polygon', 'Sharon Bellens', 'Willebroek', '2017-05-15 19:55:43'),
(50, 'download.png', 'Logo design', 'Sharon Bellens', 'Willebroek', '2017-05-15 19:56:15'),
(51, 'design-header.jpg', 'Wallpaper', 'Sharon Bellens', 'Willebroek', '2017-05-15 19:56:31'),
(52, 'images.png', 'Strak', 'Sharon Bellens', 'Willebroek', '2017-05-15 19:56:56'),
(53, 'soundoftravel.png', 'Logo design', 'Sharon Bellens', 'Willebroek', '2017-05-15 19:57:42');

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
(35, 2, 10, 'cool !', '2017-04-30 15:20:58'),
(36, 14, 24, 'mooi', '2017-05-14 13:05:15');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `avatar` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`ID`, `fullname`, `email`, `password`, `avatar`) VALUES
(1, 'joris', 'joris@joris.be', '$2y$12$ez91rE7RI./Q251tQZf.muxWhbe1TLHRq.fa3wcDjcu/8IfTzWPyq', 'https://s3.amazonaws.com/uifaces/faces/twitter/whale/128.jpg'),
(2, 'bert van hoorn', 'bert@bert.be', '$2y$12$1jp8/VMXHNVtPaNTF0AIkOf53YcOgFCjkc0kcb2FrF93qdDU.Q3EO', 'https://s3.amazonaws.com/uifaces/faces/twitter/abinav_t/128.jpg'),
(3, 'jojo', 'jojo@jojo.com', '$2y$12$iol.kqdzkotYfasmn1E5xe.8fBIOY0QtUuOl.ZYZd85P.D0DCr/5C', 'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg'),
(4, 'bertinus', 'bert@bert.be', '$2y$12$S531S.A.YJl1.OTIwlPwSOAO7vvN0yRC.p94K/07So3/FHeb8rmbu', 'https://s3.amazonaws.com/uifaces/faces/twitter/ritu/128.jpg'),
(5, 'bert', 'bert@bert.be', '$2y$12$C/w4GElmvewoiG6BOAvCq.mE2hLm3C95bHcFtGBYR1sccPC2iOND6', 'https://s3.amazonaws.com/uifaces/faces/twitter/towhidzaman/128.jpg'),
(6, 'bertio', 'bert@bert.be', '$2y$12$T5la/7t3DrQGvToiT4KLXOIqdqqoKxsXtFLDFDQSdCdNQyG2WkkxG', 'https://s3.amazonaws.com/uifaces/faces/twitter/enda/128.jpg'),
(11, 'Boris', 'boris@boris.be', '$2y$12$T5la/7t3DrQGvToiT4KLXOIqdqqoKxsXtFLDFDQSdCdNQyG2WkkxG', 'https://s3.amazonaws.com/uifaces/faces/twitter/andyvitale/128.jpg'),
(12, 'an van steel', 'an@an.be', '$2y$12$v5BTVXf.yR.xh.neCvXzjurOL4641Tb5.Gkw9zOQ8bVv95JuuLF9G', 'https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/128.jpg'),
(13, 'John', 'john@john.be', '$2y$12$AMJm656X9A6/VxM0kgesXe4Yb6qLPOkrf5JxBq31RWF2xJeRCYFse', ''),
(14, 'Bowdy Heyens', 'bowdy@hotmail.be', '$2y$12$CYUBAmgsV3zeoLpUy0Q4P.6uFC/vlbA1i5o7dfpIxKorGwDr6OaKS', ''),
(15, 'Albert Bellens', 'albertbellens@hotmail.be', '$2y$12$l4eYrHDSacJew4I.3WPi3.imZhrNLnW3ZgqaHragpYTsHzTkgdDj.', ''),
(16, 'Sharon Bellens', 'sharonbellens@hotmail.be', '$2y$12$JvqVd5bVLWl4hAXrCK07COT0X9GvXSfyW80VqjYWXDLkVKZCwFWk.', 'avatar.png'),
(17, 'Bowdy Heyens', 'bowdy@hotmail.be', '$2y$12$KOVCU0yhzzI6BWNhKOqh0O/IYpryNxgdgvLtrWQ7GJUgOi2/gj5N6', 'avatar.png');

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
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT voor een tabel `tblactivities`
--
ALTER TABLE `tblactivities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
