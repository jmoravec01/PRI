-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1:3306
-- Vytvořeno: Ned 18. čen 2023, 12:33
-- Verze serveru: 8.0.31
-- Verze PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `pri_db`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `cookies_browser`
--

DROP TABLE IF EXISTS `cookies_browser`;
CREATE TABLE IF NOT EXISTS `cookies_browser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `browser` varchar(50) NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vypisuji data pro tabulku `cookies_browser`
--

INSERT INTO `cookies_browser` (`id`, `browser`, `ip_address`) VALUES
(1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', NULL),
(2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', NULL),
(3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', NULL),
(4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', NULL),
(5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', NULL),
(6, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', NULL),
(7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', NULL),
(8, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', NULL),
(9, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', NULL),
(10, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', NULL),
(11, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', NULL),
(12, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', '127.0.0.1'),
(13, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', '127.0.0.1'),
(14, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', '127.0.0.1'),
(15, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', '127.0.0.1'),
(16, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', '127.0.0.1'),
(17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', '127.0.0.1'),
(18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', '127.0.0.1'),
(19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', '127.0.0.1'),
(20, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0', '127.0.0.1');

-- --------------------------------------------------------

--
-- Struktura tabulky `formular`
--

DROP TABLE IF EXISTS `formular`;
CREATE TABLE IF NOT EXISTS `formular` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(45) NOT NULL,
  `email` varchar(320) NOT NULL,
  `zprava` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vypisuji data pro tabulku `formular`
--

INSERT INTO `formular` (`id`, `jmeno`, `email`, `zprava`) VALUES
(1, 'dfgdfg', 'dfgdfg@dfgdf.cz', 'dfghfgh'),
(2, 'dfgdfg', 'dfgdfg@dfgdf.cz', 'dfghfgh'),
(3, 'dfgdfg', 'dfgdfg@dfgdf.cz', 'dfghfgh'),
(4, 'dfgdfg', 'dfgdfg@dfgdf.cz', 'dfghfgh'),
(5, 'sdfd', 'sdfsd@sdfgsdf.cz', 'dfgdg'),
(6, 'sdfd', 'sdfsd@sdfgsdf.cz', 'dfgdg'),
(7, 'fghfgh', 'fghfgh@sdfgdfg.cz', 'dfghdfgdfg'),
(8, 'fghfgh', 'fghfgh@sdfgdfg.cz', 'dfghdfgdfg'),
(9, 'fghfgh', 'fghfgh@sdfgdfg.cz', 'dfghdfgdfg'),
(10, 'dfgdfg', 'dfgdf@fdgfdgfd.cz', 'dgfhdfg'),
(11, 'dfgdfgdfgdfg', 'dfgdfgdfg@email.cz', 'dfgdfgfd'),
(12, 'sdfgsdf', 'dfgdfgdfg@email.cz', 'sdfsd'),
(13, 'sdfgdfgdf', 'dfgdfgdfg@email.cz', 'sfdfsd'),
(14, 'fghfggggggg', 'dfgdfgdfg@email.cz', 'ghjghj'),
(15, 'nevim', 'nevim@nevim.cz', 'dfgghdfgdfgdfg'),
(16, 'jooooooo', 'nevim@nevim.cz', 'hjghj'),
(17, 'fghfghfg', 'nevim@nevim.cz', 'dfgdfg'),
(18, 'hfghfghfg', 'nevim@nevim.cz', 'dffghjfgh'),
(19, 'ahoj', 'ahoj@ahoj.cz', 'ahoj\r\n'),
(20, 'ahoj', 'ahoj@ahoj.cz', 'ahoj\r\n'),
(21, 'ahoj', 'ahoj@ahoj.cz', 'ahoj\r\n'),
(22, 'ahoj', 'ahoj@ahoj.cz', 'ahoj\r\n'),
(23, 'ahoj', 'ahoj@ahoj.cz', 'ahoj\r\n'),
(24, 'ahojkly', 'sfgdfgdf@sdfgdfg.com', 'sdfgdfgdfg'),
(25, 'dfghfghfgh', 'fgjfghhfgh@kghkgh.com', 'sfgdfgdfg'),
(26, 'ahoj', 'ahoj@ahoj.cz', 'asdasd'),
(27, 'ahoj', 'ahoj@ahoj.cz', 'asdasd'),
(28, 'ahoj', 'ahoj@ahoj.cz', 'asdasd'),
(29, 'ahoj', 'ahoj@ahoj.cz', 'asdasd'),
(30, 'ahoj', 'ahoj@ahoj.cz', 'asdasd'),
(31, 'dfgdfgfd', 'nevim@nevim.cz', 'aaaaaaaaaaa'),
(32, '', '', ''),
(33, 'Superman', 'Superman@Superman.com', 'SupermanSupermanSupermanSupermanSuperman'),
(34, '', '', ''),
(35, '', '', ''),
(36, '', '', ''),
(37, '', '', ''),
(38, '', '', ''),
(39, '', '', ''),
(40, '', '', ''),
(41, '', '', ''),
(42, '', '', ''),
(43, '', '', ''),
(44, '', '', ''),
(45, '', '', ''),
(46, '', '', ''),
(47, '', '', ''),
(48, '', '', ''),
(49, '', '', ''),
(50, '', '', ''),
(51, '', '', ''),
(52, '', '', ''),
(53, '', '', ''),
(54, '', '', ''),
(55, '', '', ''),
(56, '', '', ''),
(57, '', '', ''),
(58, '', '', ''),
(59, '', '', ''),
(60, '', '', ''),
(61, '', '', ''),
(62, '', '', ''),
(63, '', '', ''),
(64, '', '', ''),
(65, '', '', ''),
(66, '', '', ''),
(67, '', '', ''),
(68, '', '', ''),
(69, '', '', ''),
(70, '', '', ''),
(71, '', '', ''),
(72, '', '', ''),
(73, '', '', ''),
(74, '', '', ''),
(75, '', '', ''),
(76, '', '', ''),
(77, '', '', ''),
(78, '', '', ''),
(79, '', '', ''),
(80, '', '', ''),
(81, '', '', ''),
(82, '', '', ''),
(83, '', '', ''),
(84, '', '', ''),
(85, '', '', ''),
(86, '', '', ''),
(87, '', '', ''),
(88, '', '', ''),
(89, '', '', ''),
(90, '', '', ''),
(91, '', '', ''),
(92, '', '', ''),
(93, '', '', ''),
(94, '', '', ''),
(95, '', '', ''),
(96, '', '', ''),
(97, '', '', ''),
(98, '', '', ''),
(99, '', '', ''),
(100, '', '', ''),
(101, '', '', ''),
(102, '', '', ''),
(103, '', '', ''),
(104, '', '', ''),
(105, '', '', ''),
(106, '', '', ''),
(107, '', '', ''),
(108, '', '', ''),
(109, '', '', ''),
(110, '', '', ''),
(111, '', '', ''),
(112, '', '', ''),
(113, '', '', ''),
(114, '', '', ''),
(115, '', '', ''),
(116, '', '', ''),
(117, '', '', ''),
(118, '', '', ''),
(119, '', '', ''),
(120, '', '', ''),
(121, '', '', ''),
(122, '', '', ''),
(123, '', '', ''),
(124, '', '', ''),
(125, '', '', ''),
(126, '', '', ''),
(127, '', '', ''),
(128, '', '', ''),
(129, '', '', ''),
(130, '', '', ''),
(131, '', '', ''),
(132, '', '', ''),
(133, '', '', ''),
(134, 'dfghfg', 'aghoj@asdfsdd.in', 'dfgdfg'),
(135, 'dfg', 'dfg@fghfgh.cz', 'dghjmhjkuikol,');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
