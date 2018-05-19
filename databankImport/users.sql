-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 19 mei 2018 om 11:03
-- Serverversie: 10.1.24-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thomas1q_space`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screenName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileCover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `following` int(11) NOT NULL,
  `followers` int(11) NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` int(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `full name`, `email`, `password`, `screenName`, `profileImage`, `profileCover`, `following`, `followers`, `bio`, `country`, `website`) VALUES
(38, 'Nicolas', '', 'acedo_nicolas@hotmail.com', '$2y$10$TqSA669Ws89kn7jNt0OlEungRrfwl59Bv4ft2euavggY2GNAlfwGO', 'Acedo nicolas', 'assets/images/defaultProfileImage.png', 'assets/images/defaultCoverImage.png', 0, 5, '', '', 0),
(40, 'SarahvanO', '', 'sarahvanoers@icloud.com', '$2y$10$PXPuO.sCKdAfJ85QFcCqdeQncICnxTlMz7z/BypgPZ.gGv/XzmAUO', 'VOS', 'assets/images/defaultProfileImage.png', 'assets/images/defaultCoverImage.png', 3, 5, '', '', 0),
(41, 'Thomas', '', 'thomasdebelder95@gmail.com', '$2y$10$Pyl1w5IaQw3O.cROndo09OC.hoWpd4QviLGMm/tYTSINso4feJy0W', 'thomas', 'assets/images/defaultProfileImage.png', 'assets/images/defaultCoverImage.png', 3, 2, '', '', 0),
(42, 'tes', '', 'test@test123.com', '$2y$10$qBEJn9w2OOlMpmobLqZOS.i8RrIvQv5IB4CJL4VNPkp9dhhMhHIp.', 'Acedo Nicolas', 'assets/images/defaultProfileImage.png', 'assets/images/defaultCoverImage.png', 0, 1, '', '', 0),
(43, 'tester', '', 'tester@test.test', '$2y$10$TlS8GiTE80tvf0T2TKKRJOIvzXSh3qjFdoi/Bv6eK6nAIs4hUTHY2', 'Acedo Nicolas', 'assets/images/defaultProfileImage.png', 'assets/images/defaultCoverImage.png', 4, 1, '', '', 0),
(44, 'thomas', '', 'thomas3@hotmail.com', '$2y$10$r1iTZLi3c0u9df2JtrThme5QsZiccpIpJ2cgBGZUthZBcWXyqCera', 'thomas@hotmail.com', 'assets/images/defaultProfileImage.png', 'assets/images/defaultCoverImage.png', 2, 0, '', '', 0),
(45, 'Jeanine', '', 'Jeaninnen.Jeaninnen@Jeaninnen', '$2y$10$u7tzsrbhcKW68/f41BS3tOEhxP3a0H8VWsW0lpgmPIEsHmyO3TmiW', 'Jeaninnen', 'assets/images/defaultProfileImage.png', 'assets/images/defaultCoverImage.png', 1, 0, '', '', 0),
(46, 'Thomas Debelder', '', 'thomasdebelder@yahoo.com', '$2y$10$DXAB0VAEx.V2YMyr.62T4e0da4T4JP8wC/2auPP0wcEo3lYdJFlSW', 'Thomas Debelder', 'assets/images/defaultProfileImage.png', 'assets/images/defaultCoverImage.png', 0, 0, '', '', 0),
(47, 'sarahvo', '', 'sarahvanoers@gmail.com', '$2y$10$6FOwzQAQXO.K2QOkGiPOyOelHi3trrF5kJq9..Cz/HCW5AvRgs2tO', 'sarahvanoers', 'assets/images/defaultProfileImage.png', 'assets/images/defaultCoverImage.png', 0, 0, '', '', 0),
(48, 'testsearch', '', 'thomasdebeldersearch@gmail.com', '$2y$10$D1C06Wc66t4.jl7KI94Kr.f0Uj/h5z80YRa/DHEd5A7.VV57wE472', 'Thomas Debelder', 'assets/images/defaultProfileImage.png', 'assets/images/defaultCoverImage.png', 0, 0, '', '', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
