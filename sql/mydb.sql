-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 sep 2017 om 08:27
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `artikel` varchar(45) NOT NULL,
  `omschrijving` text NOT NULL,
  `groep` int(11) NOT NULL,
  `artikelcode` varchar(45) NOT NULL,
  `avdd` int(11) NOT NULL,
  `foto_locatie` text NOT NULL,
  `beoordeling` float DEFAULT NULL,
  `voorraad` int(11) NOT NULL,
  `prijs` float NOT NULL,
  `start_datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `artikel`
--

INSERT INTO `artikel` (`id`, `artikel`, `omschrijving`, `groep`, `artikelcode`, `avdd`, `foto_locatie`, `beoordeling`, `voorraad`, `prijs`, `start_datum`) VALUES
(1, 'kleine bonsai boom', 'Dit is een kleine bonsai boompje die bij ons speciaal is getrimd. ', 2, '335', 0, 'images/bonsai/bonsai_small.jpg', NULL, 23, 12.55, '2017-06-08'),
(2, 'grote bonsai boom', 'Dit is een van onze grote bonsai bomen die bij ons kunt laten trimmen. ', 1, '233', 1, 'images/bonsai/bonsai_large.jpg', NULL, 12, 23.95, '2017-06-14'),
(3, 'tweeling bonsai ', 'Deze bonsai boom is heel speciaal natuurlijk omdat uit een stam twee boompjes komen. Deze kunt u ook bij ons laten trimmen.', 3, '221', 0, 'images/bonsai/bonsai_twin.jpg', NULL, 7, 18.35, '2017-06-16');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `id` int(11) NOT NULL,
  `klant` int(11) NOT NULL,
  `opmerking` varchar(45) DEFAULT NULL,
  `totaal_prijs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `bestelling`
--

INSERT INTO `bestelling` (`id`, `klant`, `opmerking`, `totaal_prijs`) VALUES
(310, 265, 'dsd', 42.87),
(311, 266, 'sdas', 23.95),
(312, 267, 'goede boompjes', 54.85),
(313, 268, 'ASD', 49.25),
(314, 269, 'ik zou ze graag in een zak willen hebben.', 67.4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestel_regel`
--

CREATE TABLE `bestel_regel` (
  `bestelling` int(11) NOT NULL,
  `artikel` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `prijs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `bestel_regel`
--

INSERT INTO `bestel_regel` (`bestelling`, `artikel`, `aantal`, `prijs`) VALUES
(310, 1, 1, 12.55),
(310, 3, 1, 18.35),
(310, 2, 1, 11.98),
(311, 2, 1, 11.98),
(312, 2, 1, 11.98),
(312, 1, 1, 12.55),
(312, 3, 1, 18.35),
(313, 3, 2, 36.7),
(313, 1, 1, 12.55),
(314, 1, 2, 25.1),
(314, 2, 1, 23.95),
(314, 3, 1, 18.35);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `favoriet`
--

CREATE TABLE `favoriet` (
  `klant` int(11) NOT NULL,
  `artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `groep`
--

CREATE TABLE `groep` (
  `id` int(11) NOT NULL,
  `groep` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `groep`
--

INSERT INTO `groep` (`id`, `groep`) VALUES
(1, 'bonsai groot'),
(2, 'bonsai klein'),
(3, 'bonsai tweeling');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `achternaam` varchar(45) NOT NULL,
  `adres` varchar(45) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `verzendwijze` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`id`, `naam`, `achternaam`, `adres`, `postcode`, `email`, `wachtwoord`, `verzendwijze`) VALUES
(194, 'Amin Razzak', 'a', 'aa', 'aaa', 'amin_razzak@outlook.com', NULL, 'Verzenden na betaling'),
(247, 'piet', 'peter', 'pan', '1232sl', 'asa@gmail.com', NULL, 'Verzenden na betaling'),
(250, 'admin', 'admin', 'admin', '23qal', 'admin@bonsai.com', '$2y$10$ONcksyMIqCRhBF107ntSWuPK0AMtoH68lyzwm/48iuXCz8rK0o19S', 'ophalen'),
(265, 'd', 'dsds', 'sds', 'sds', 'SDS@GMAIL.COM', NULL, 'Verzenden na betaling'),
(266, 'ew`wwwwwwwwww', 'wdqw', 'ew', 'wd', 'wd@sd.d', NULL, 'Verzenden na betaling'),
(267, 'Amin', 'Razzak', 'kanaalstraat 29', '1094sl', 'Amin@gmail.com', NULL, 'Verzenden na betaling'),
(268, 'dss', 'aDS', 'ASD', 'ASDAS', 'dSS@d.d', NULL, 'Verzenden na betaling'),
(269, 'amin', 'Razzak', 'Javastraat 29', '1094SL', 'Amin_razzak@outlook.nl', NULL, 'Verzenden na betaling');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_14_225504_create_test_table', 1),
(4, '2017_06_14_233850_create_tests_table', 2),
(5, '2017_06_14_234920_create_tasks_table', 3),
(6, '2017_06_15_172647_create_posts_table', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('amin_razzak@outlook.com', '$2y$10$06F6.2XuwA6mhW2rtMvIOOweG6ExKJOHNkZIogXMfk2ZmlTP1qiVu', '2017-06-16 05:48:05');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `resensie`
--

CREATE TABLE `resensie` (
  `id` int(11) NOT NULL,
  `klant` int(11) NOT NULL,
  `artikel` int(11) NOT NULL,
  `beoordeling` varchar(1) NOT NULL,
  `omschrijving` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tasks`
--

INSERT INTO `tasks` (`id`, `body`, `completed`, `created_at`, `updated_at`) VALUES
(1, 'kenker', 0, '2017-06-14 22:02:10', '2017-06-14 22:02:10'),
(2, 'ugh', 0, '2017-06-14 22:02:10', '2017-06-14 22:02:10'),
(3, 'laravel', 1, '2017-06-14 22:02:10', '2017-06-14 22:02:10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'amin', 'amin_razzak@outlook.com', '$2y$10$WCdu3dBLlxBdZ7XYdvitxemTwGJaIhtfm2htEJrJXcIR1iJOi1SB6', 'LPAMfGyICB6hmzcicXxqk8FINPj0KhLhchu7f8jzZFlIwhcG7vuriU2gtrEz', '2017-06-15 20:52:46', '2017-06-15 20:52:46'),
(2, 'jan', 'jan@gmail.com', '$2y$10$HO6LbnWP1uJfXgEoBqIeIefUCbyqJDDhkTNMPpbwr25.iGARYR0mq', 'SiCDJiuhZQQHFi6ZF11NBEtqfx8vezTOLomLirgZyvpt2il3UHBlviUhkP3v', '2017-06-16 07:17:31', '2017-06-16 07:17:31'),
(3, 'kees', 'kees@gmail.com', '$2y$10$0zbVV9eTGY5MorP7RHJu0uENyDh1iuODcjcWWDOiNNcAtNge00xx2', '9CEdsIP1J8MXA7IQ3H0kNpTf3U74NOPMprFLG1CFwnqgWStcFykMzNsstJw6', '2017-06-16 07:19:37', '2017-06-16 07:19:37'),
(4, 'TEST', 'test@test.nl', '$2y$10$t12S2WAMID/VrgFyLGaWa.xIcMzJ.1LT4ezmdxmSZzMBJF4dUxwOq', '6K5aR5gkR2v8OM79i6zCVLwLleicASlw2dOEZjHtFbUPlfI0dPMCOE6o5L7u', '2017-06-16 09:54:12', '2017-06-16 09:54:12'),
(5, 'Amin', 'hoiiii@test.nl', '$2y$10$zgQg5rbScIfLQHiN6eGFdeUmQErlRAzH33Z86IvYLV6A95T64wuPG', NULL, '2017-06-26 17:40:08', '2017-06-26 17:40:08'),
(6, 'Amin', 'heyyy@test.nl', '$2y$10$FcA31UBd8WDMWPRinigXbOcH1PoFtv6CyOTDayIuWkdmyddklGT.u', 'DZ42CwR8aJu88bWMz2qtKhNvwGng3ahox2AKxl4Q75BqiTj56LVa7d5EsJmd', '2017-06-26 17:42:14', '2017-06-26 17:42:14'),
(7, 'test2', '123@live.com', '$2y$10$VjZ.Kf9qt.HnCl5SyftQXO7NQ0Xgb1z9/AmWfugNnkGiLQ.XNq1aW', NULL, '2017-06-26 17:45:33', '2017-06-26 17:45:33'),
(8, '1234', '321@live.com', '$2y$10$4Cp5H5PqFXTypEz6zvtsHesack5LcL.IE.amAL.l7gychRYTn26fG', 'xW1EAeQF4R7xRUgTjTuJzhtNhALbUtYbZWlCPsGYr75LDjpMa3SCj1RnurZm', '2017-06-26 17:48:57', '2017-06-26 17:48:57'),
(10, 'YOO', 'YOO@YOO.YOO', '$2y$10$FPgZO6PMi1WAVxqBf3IamuRgTADEdA5WkQK6oBoE2DgzuqtmpYl2q', 'yyp92fTZIinpEz1GTAm7lfumgWWs2kKzgmostO9wF6h5ISmu7x1qA7wyPVzl', '2017-06-26 17:59:38', '2017-06-26 17:59:38'),
(11, 'admin', 'admin@bonsai.com', '$2y$10$Ojc.SwcTwsFlL8nEM.NJYun4K1TnwIoTY8sJ1j4ac.5vcH2HzQGdC', 'HA3zAacfG8fgF9wPVnztfAwIPSyyTrQ1N4SwlyNa8sQGmGrof6KYkUWo3mtX', '2017-08-20 22:41:53', '2017-08-20 22:41:53');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Artikel_Groep1_idx` (`groep`);

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bestelling_klant_idx` (`klant`);

--
-- Indexen voor tabel `bestel_regel`
--
ALTER TABLE `bestel_regel`
  ADD KEY `regel_artikel_idx` (`artikel`),
  ADD KEY `regel_bestelling_idx` (`bestelling`);

--
-- Indexen voor tabel `favoriet`
--
ALTER TABLE `favoriet`
  ADD KEY `klant_favoriet_idx` (`klant`),
  ADD KEY `artikel_favoriet_idx` (`artikel`);

--
-- Indexen voor tabel `groep`
--
ALTER TABLE `groep`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `resensie`
--
ALTER TABLE `resensie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resensie_artikel_idx` (`artikel`),
  ADD KEY `resensie_klant_idx` (`klant`);

--
-- Indexen voor tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;
--
-- AUTO_INCREMENT voor een tabel `groep`
--
ALTER TABLE `groep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;
--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `resensie`
--
ALTER TABLE `resensie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_groep` FOREIGN KEY (`groep`) REFERENCES `groep` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_klant` FOREIGN KEY (`klant`) REFERENCES `klant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `bestel_regel`
--
ALTER TABLE `bestel_regel`
  ADD CONSTRAINT `regel_artikel` FOREIGN KEY (`artikel`) REFERENCES `artikel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `regel_bestelling` FOREIGN KEY (`bestelling`) REFERENCES `bestelling` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `favoriet`
--
ALTER TABLE `favoriet`
  ADD CONSTRAINT `artikel_favoriet` FOREIGN KEY (`artikel`) REFERENCES `artikel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `klant_favoriet` FOREIGN KEY (`klant`) REFERENCES `klant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `resensie`
--
ALTER TABLE `resensie`
  ADD CONSTRAINT `resensie_artikel` FOREIGN KEY (`artikel`) REFERENCES `artikel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `resensie_klant` FOREIGN KEY (`klant`) REFERENCES `klant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
