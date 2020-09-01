-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gostitelj: localhost:3306
-- Čas nastanka: 31. maj 2020 ob 16.06
-- Različica strežnika: 8.0.18
-- Različica PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Struktura tabele `coments`
--

CREATE TABLE `coments` (
  `comentId` int(11) NOT NULL,
  `posterId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `coment` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `coments`
--

INSERT INTO `coments` (`comentId`, `posterId`, `postId`, `coment`) VALUES
(8, 0, 41, 'Nice meme'),
(9, 0, 40, 'My car is better :P');

-- --------------------------------------------------------

--
-- Struktura tabele `post`
--

CREATE TABLE `post` (
  `postId` int(11) NOT NULL,
  `posterId` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_general_ci NOT NULL,
  `idType` int(11) NOT NULL,
  `postContent` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `pictureName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `post`
--

INSERT INTO `post` (`postId`, `posterId`, `title`, `idType`, `postContent`, `date`, `pictureName`) VALUES
(14, 0, 'testn', 1, 'test', '2020-05-28', NULL),
(39, 0, 'testna slika', 2, 'slika', '2020-05-30', 'testna slika-0.png'),
(40, 16, 'Check out my car', 6, '', '2020-05-31', 'Check out my car-16.jpg'),
(41, 16, 'meme', 1, '', '2020-05-31', 'meme-16.webp'),
(42, 0, 'Jokes', 9, ' What\'s red and bad for your teeth? A brick\r\nI was going to tell a dead baby joke. But I decided to abort.\r\nWhy does Dr. Pepper come in a bottle? His wife is dead.\r\nWhy does Helen Keller hate porcupines? They\'re painful to look at.\r\nWhy can\'t orphans play baseball? They don\'t know where home is.', '2020-05-31', NULL);

-- --------------------------------------------------------

--
-- Struktura tabele `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type name` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `type`
--

INSERT INTO `type` (`id`, `type name`) VALUES
(1, 'Funny'),
(2, 'NSFW'),
(3, 'Smart'),
(4, 'Tech'),
(5, 'Animal'),
(6, 'Car'),
(7, 'Anime'),
(8, 'Games'),
(9, 'Dark humor');

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(0, 'root', '63a9f0ea7bb98050796b649e85481845', 'z.ostroznik@gmail.com'),
(16, 'miha', 'b12fe84c942fb07623a20fb005ec0841', 'zanostroznik@hotmail.com');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`comentId`),
  ADD KEY `posterId` (`posterId`,`postId`),
  ADD KEY `postId` (`postId`);

--
-- Indeksi tabele `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `idType` (`idType`),
  ADD KEY `posterId` (`posterId`);

--
-- Indeksi tabele `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `coments`
--
ALTER TABLE `coments`
  MODIFY `comentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT tabele `post`
--
ALTER TABLE `post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT tabele `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `coments`
--
ALTER TABLE `coments`
  ADD CONSTRAINT `coments_ibfk_1` FOREIGN KEY (`posterId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `coments_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`);

--
-- Omejitve za tabelo `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`posterId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
