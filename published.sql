-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Kwi 2020, 21:59
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bitart`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `published`
--

CREATE TABLE `published` (
  `map_id` int(11) NOT NULL,
  `author` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `map_code` text COLLATE utf8_polish_ci NOT NULL,
  `map_rows` int(11) NOT NULL,
  `bit_rate` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `published`
--

INSERT INTO `published` (`map_id`, `author`, `description`, `map_code`, `map_rows`, `bit_rate`, `ip`, `timestamp`) VALUES
(4, '<b style=\"color: red\">Szymon Miłkowski</b>', 'Historia powstania', '{\"addrArr\":[\"::\",\"786:1086:e1e:789e:3e0d:8000::\",\"89:1089:1020:4491:81e:4000::\",\"89:1089:1020:4491:81f:4000::\",\"90:9090:8e20:789e:81f:c000::\",\"9f:891f:8120:5090:80f:8000::\",\"90:8910:8120:4890:807::\",\"710:8610:8e1e:4490:802::\",\"::\"],\"bitRate\":128,\"rows\":9,\"author\":\"Szymon Mi\\u0142kowski\",\"description\":\"Historia powstania\",\"ip\":\"::1\"}', 9, 128, '::1', '2020-04-09 19:06:08'),
(5, 'awdawddwa', 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '{\"addrArr\":[\"0.0.0.0\",\"0.8.0.0\",\"0.12.0.0\",\"0.6.0.0\",\"0.2.0.0\",\"0.1.0.0\",\"0.1.128.0\",\"0.1.0.0\",\"0.1.0.0\",\"0.6.0.0\",\"3.248.0.0\",\"1.255.0.0\",\"0.0.0.0\",\"0.0.0.0\",\"1.128.0.0\",\"5.0.0.0\",\"25.3.128.0\",\"96.129.192.0\",\"0.128.64.0\",\"0.128.32.236\",\"0.135.192.1\",\"0.0.0.5\",\"0.0.0.0\",\"0.0.0.136\",\"0.0.0.224\",\"0.0.1.48\",\"0.0.0.4\",\"0.0.0.0\",\"0.0.0.0\",\"0.0.0.0\",\"0.0.0.0\",\"0.0.0.0\"],\"bitRate\":32,\"rows\":32,\"author\":\"awdawddwa\",\"description\":\"WWWWWWWWWWWWWWWWWWWWWWWWWWWWwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww\",\"ip\":\"::1\"}', 32, 32, '::1', '2020-04-09 19:10:19');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `published`
--
ALTER TABLE `published`
  ADD PRIMARY KEY (`map_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `published`
--
ALTER TABLE `published`
  MODIFY `map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
