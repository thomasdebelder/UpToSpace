-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 14 mei 2018 om 17:27
-- Serverversie: 5.6.35
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `space`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `follow`
--

CREATE TABLE `follow` (
  `followID` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `followOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`followID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `follow`
--
ALTER TABLE `follow`
  MODIFY `followID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;