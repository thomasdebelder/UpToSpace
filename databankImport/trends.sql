-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 14 mei 2018 om 17:26
-- Serverversie: 5.6.35
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `space`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trends`
--

CREATE TABLE `trends` (
  `trendID` int(11) NOT NULL,
  `hashtag` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `trends`
--

INSERT INTO `trends` (`trendID`, `hashtag`, `createdOn`) VALUES
(1, 'php', '2018-05-10 22:34:57'),
(2, 'design', '2018-05-12 17:11:35');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `trends`
--
ALTER TABLE `trends`
  ADD PRIMARY KEY (`trendID`),
  ADD UNIQUE KEY `hashtag` (`hashtag`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `trends`
--
ALTER TABLE `trends`
  MODIFY `trendID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;