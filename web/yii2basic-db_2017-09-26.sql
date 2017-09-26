-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2017 at 01:57 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `b_user`
--

CREATE TABLE `b_user` (
  `id` int(10) NOT NULL,
  `firstName` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `authKey` int(50) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `mail` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `b_user`
--

INSERT INTO `b_user` (`id`, `firstName`, `lastName`, `username`, `password`, `authKey`, `role`, `mail`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 1234, 1, '11.11@11.11'),
(2, 'test', 'test', 'test', 'test', 1234, 0, ''),
(3, 't1', 't1', 't1', 't1', 0, 0, ''),
(4, 't2', 't2', 't2', 't2', 0, 0, ''),
(5, 't3', 't3', 't3', 't3', 0, 0, ''),
(15, 't3', 't3', 't4', 't4', 0, 0, ''),
(16, 'q1', 'q1', 'q1', 'q1', 0, 0, ''),
(17, 'a1', 'a1', 'a1', 'a1', 0, 0, ''),
(18, 'h1', 'h1', 'h1', 'h1', 0, 0, 'l190944@mvrht.net'),
(19, '1', '1', '1', '1', 0, 0, 'l202215@mvrht.net'),
(20, '1', '1', '2', '2', 0, 0, 'l202215@mvrht.net'),
(21, 'q', 'q', 'q', 'q', 0, 0, 'q@q.q'),
(22, 'm', 'm', 'm', 'm', 0, 0, 'm@m.m'),
(23, 'v', 'v', 'v', 'v', 0, 0, 'v@v.v'),
(24, 'k', 'k', 'k', 'k', 0, 0, 'k@k.k'),
(25, 'n', 'n', 'n', 'n', 0, 0, 'n@n.n'),
(26, 'as', 'as', 'as', 'as', 0, 0, 'as@as.as'),
(27, 'll', 'll', 'll', 'll', 0, 0, 'll@ll.ll'),
(28, 'mm', 'mm', 'mm', 'mm', 0, 0, 'mm@mm.mm'),
(29, 'pp', 'pp', 'pp', 'pp', 0, 0, 'pp@pp.pp'),
(30, 'nn', 'nn', 'nn', 'nn', 0, 0, 'nn@nn.sm'),
(31, 'bb', 'bb', 'bb', 'bb', 0, 0, 'bb@bb.bb'),
(32, 'bbb', 'bbb', 'bbb', 'bbb', 0, 0, 'bbb@bbb.bbb'),
(33, 'll', 'll', 'lll', 'll;', 0, 0, 'll@ll.ll'),
(34, 'gerds', 'fbds', 'qwer', 'qwer', 0, 0, 'll@ll.ll'),
(35, 'cdefaefed', 'def3eddesf', 'dfde', 'dseffffs', 0, 0, 'dfdsf@cd.s'),
(36, 'aa', 'aa', 'aa', 'aa', 0, 0, 'aa@aa.aa'),
(37, 'nn', 'nn', 'nnn', 'nnn', 0, 0, 'nn@nn.nn'),
(38, 'ss', 'ss', 'ss', 'ss', 0, 0, 'ss@ss.ss'),
(39, 'kkkk', 'kkkk', 'kkkk', 'kkkk', 0, 0, 'kkkk@kkkk.kkkk'),
(40, 'asdf', 'asdf', 'asdf', 'asdf', 0, 0, 'asdf@asdf.asdf'),
(41, 'zxc', 'zxc', 'zxc', 'zxc', 0, 0, 'zxc@zxc.zxc'),
(42, 'Jan', 'Kowalski', 'jan', 'kowalski', 0, 0, 'jan@kowalski.pl'),
(43, 'ji', 'ji', 'ji', 'ji', 0, 0, 'ji@ji.ji'),
(44, 'aaaa', 'aaa', 'zaza', 'asas', 0, 0, 'sasa'),
(45, 'ugbhknl', 'gyihjnlkm', 'ka', 'ka', 0, 0, 'ka@ka.ka');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `choices_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `study_id` smallint(6) NOT NULL,
  `points` int(11) NOT NULL,
  `result` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choices_id`, `user_id`, `study_id`, `points`, `result`) VALUES
(14, 26, 16, 96, 0),
(15, 26, 18, 96, 0),
(16, 26, 4, 96, 2),
(17, 26, 57, 96, 0),
(18, 27, 67, 409, 1),
(19, 28, 1, 380, 1),
(21, 24, 1, 321, 1),
(22, 24, 1, 321, 1),
(23, 24, 1, 321, 1),
(24, 41, 17, 363, 1),
(25, 41, 17, 363, 1),
(26, 41, 1, 363, 1),
(27, 41, 1, 363, 1),
(28, 41, 1, 363, 1),
(29, 41, 19, 363, 0),
(30, 41, 20, 363, 0),
(31, 41, 67, 363, 0),
(32, 41, 68, 363, 0),
(33, 41, 69, 363, 0),
(34, 41, 2, 363, 0),
(35, 2, 1, 290, 1),
(36, 2, 17, 290, 1),
(37, 2, 18, 290, 0),
(38, 42, 1, 174, 1),
(39, 42, 2, 174, 0),
(40, 42, 3, 174, 0),
(41, 42, 5, 174, 0),
(42, 42, 20, 174, 0),
(43, 42, 17, 174, 2),
(44, 42, 13, 174, 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`code`, `name`, `population`) VALUES
('BR', 'Brazilnhbgfdfghjjjn', 205722000),
('CA', 'Canada', 35985751),
('CN', 'China', 1375210000),
('DE', 'Germany', 81459000),
('FR', 'France', 64513242),
('GB', 'United Kingdom', 65097000),
('IN', 'India', 2147483647),
('PL', 'Poland', 3900000),
('QQ', 'qqqqqq', 1),
('RU', 'Russia', 146519759),
('US', 'United States', 322976000);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `surname` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `second_name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `PESEL` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `surname`, `first_name`, `second_name`, `PESEL`, `date_of_birth`, `place_of_birth`, `sex`, `email`) VALUES
(1, 'admin', 'admin', 'admin', '12345678912', '2017-08-09', 'admin', 'man', 'dasd@sd.ds'),
(2, 'test', 'test', 'test', '43576879809', '0000-00-00', 'test', 'man', 'bufv@bhgglv.ds'),
(15, 'a', 'a', 'a', '12332122311', '2002-10-10', 'asa', '1', '3232.s@da.sa'),
(20, 'w11', 'w1', 'w1', '31241321232', '0000-00-00', 'fuv', '1', 'dyftghkj@drfgjhkj.pl'),
(21, 'q', 'q', 'q', '34567890987', '0000-00-00', 'qq', '2', 'hukfs@fdfsd.fd'),
(23, 'v', 'v', 'v', '34567898765', '0000-00-00', 'v', '1', 'v@v.v'),
(24, 'g', 'g', 'g', '65456788765', '0000-00-00', 'hghj', '1', 'a@a.a'),
(25, 'n', 'n', 'n', '12121323432', '2012-12-12', 'nn', '2', 'n@n.n'),
(26, 'as', 'as', 'as', '34567890876', '0000-00-00', 'as', '1', 'as@as.as'),
(27, 'll', 'll', 'll', '34567898765', '2002-10-10', 'll', '1', 'll@ll.ll'),
(28, 'mm', 'mm', 'mm', '34568786754', '2001-08-31', 'mm', '1', 'mm@mm.mm'),
(41, 'zxc', 'zxc', 'zxc', '45678543214', '2017-08-01', 'zxc', '1', 'zxc@zxc.zxc'),
(42, 'Kowalski', 'Jan', '-', '56432344567', '1995-09-20', 'Lublin', '1', 'jan@kowalski.pl');

-- --------------------------------------------------------

--
-- Table structure for table `recover_passwords`
--

CREATE TABLE `recover_passwords` (
  `user_id` int(11) NOT NULL,
  `token` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `recover_passwords`
--

INSERT INTO `recover_passwords` (`user_id`, `token`) VALUES
(24, '85DqK9GHRGoHI2V9uoc_u1D9dTIE41RH');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `user_id` int(11) NOT NULL,
  `polish` tinyint(4) DEFAULT '0',
  `matematic` tinyint(4) DEFAULT '0',
  `english` tinyint(4) NOT NULL DEFAULT '0',
  `geography` tinyint(4) NOT NULL DEFAULT '0',
  `physics` tinyint(4) NOT NULL DEFAULT '0',
  `chemistry` tinyint(4) NOT NULL DEFAULT '0',
  `biology` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`user_id`, `polish`, `matematic`, `english`, `geography`, `physics`, `chemistry`, `biology`) VALUES
(1, 43, 48, 32, 43, 43, 53, 43),
(2, 65, 43, 32, 98, 43, 43, 67),
(20, 32, 54, 43, 89, 56, 98, 48),
(21, 43, 34, 53, 34, 34, 97, 33),
(23, 56, 45, 35, 45, 76, 32, 21),
(24, 76, 76, 45, 98, 45, 34, 65),
(25, 65, 65, 87, 56, 45, 76, 98),
(26, 21, 32, 64, 32, 4, 2, 2),
(27, 67, 43, 98, 76, 56, 98, 56),
(28, 32, 78, 67, 56, 45, 87, 65),
(41, 43, 87, 56, 45, 87, 44, 33),
(42, 30, 30, 30, 30, 30, 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `study`
--

CREATE TABLE `study` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `study`
--

INSERT INTO `study` (`id`, `name`) VALUES
(1, 'Administracja'),
(2, 'Aktorstwo'),
(3, 'Akustyka'),
(4, 'Akwakultura i bezpieczenstwo zywnosci'),
(5, 'Amerykanistyka'),
(6, 'Analityka gospodarcza'),
(7, 'Analityka medyczna'),
(8, 'Analityka zywnosci i srodowiska wodnego'),
(9, 'Analiza i zarzadzanie w biznesie'),
(10, 'Andragogika'),
(11, 'Animacja kultury'),
(12, 'Antropologia mniejszosci narodowych'),
(13, 'Archeologia'),
(14, 'Architektura'),
(15, 'Architektura i urbanistyka'),
(16, 'Architektura krajobrazu'),
(17, 'Architektura wnetrz'),
(18, 'Archiwistyka i zarzadzanie dokumentacja'),
(19, 'Artystyczna grafika komputerowa'),
(20, 'Astrofizyka i kosmologia'),
(21, 'Astronomia'),
(22, 'Audiofonologia'),
(23, 'Automatyka i robotyka'),
(24, 'Bezpieczenstwo i higiena pracy'),
(25, 'Bezpieczenstwo narodowe'),
(26, 'Bezpieczenstwo w biznesie'),
(27, 'Bezpieczenstwo wewnetrzne'),
(28, 'Bezpieczenstwo zywnosci'),
(29, 'Biochemia'),
(30, 'Biofizyka'),
(31, 'Bioinformatyka'),
(32, 'Bioinzynieria'),
(33, 'Bioinzynieria produkcji zywnosci'),
(34, 'Bioinzynieria w produkcji zwierzecej'),
(35, 'Bioinzynieria zywnosci i srodowiska wodnego'),
(36, 'Biologia'),
(37, 'Biotechnologia'),
(38, 'Biotechnologia medyczna'),
(39, 'Budownictwo'),
(40, 'Ceramika'),
(41, 'Chemia'),
(42, 'Chemia budowlana'),
(43, 'Coaching'),
(44, 'Dietetyka'),
(45, 'Doradztwo filozoficzne i coaching'),
(46, 'Doradztwo i coaching'),
(47, 'Dyplomacja europejska'),
(48, 'Dyplomacja i stosunki konsularne'),
(49, 'Dyrygentura'),
(50, 'Dziennikarstwo i komunikacja spoleczna'),
(51, 'Edukacja artystyczna w zakresie sztuki muzycznej'),
(52, 'Edukacja artystyczna w zakresie sztuki plastycznej'),
(53, 'Edukacja techniczno-informatyczna'),
(54, 'Edytorstwo'),
(55, 'Ekoenergetyka'),
(56, 'Ekonometria'),
(57, 'Ekonomia'),
(58, 'Eksploatacja morz i oceanow'),
(59, 'Elektronika'),
(60, 'Elektronika i telekomunikacja'),
(61, 'Elektroradiologia'),
(62, 'Elektrotechnika'),
(63, 'Energetyka'),
(64, 'Energetyka i chemia jadrowa'),
(65, 'Etnologia'),
(66, 'Etyka'),
(67, 'Europeistyka'),
(68, 'Farmacja'),
(69, 'Farmerstwo'),
(70, 'Film i sztuki audiowizualne'),
(71, 'Filmoznawstwo');

-- --------------------------------------------------------

--
-- Table structure for table `user_photo`
--

CREATE TABLE `user_photo` (
  `user_id` int(11) NOT NULL,
  `path` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `user_photo`
--

INSERT INTO `user_photo` (`user_id`, `path`) VALUES
(1, 'uploads/1506430532qNxfBUt.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b_user`
--
ALTER TABLE `b_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`choices_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `recover_passwords`
--
ALTER TABLE `recover_passwords`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_photo`
--
ALTER TABLE `user_photo`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `b_user`
--
ALTER TABLE `b_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `choices_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `b_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
