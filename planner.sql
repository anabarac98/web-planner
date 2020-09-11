-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 05:41 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `dairy`
--

CREATE TABLE `dairy` (
  `id_diary` int(11) NOT NULL,
  `diary` longtext NOT NULL,
  `id_korisnik` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dairy`
--

INSERT INTO `dairy` (`id_diary`, `diary`, `id_korisnik`) VALUES
(2, 'Ja sam Ana, a ovo je moj tajni dnevnik.\r\n\r\n-11.rujna 2020.g\r\nDanas sam završila prvi dio svog završnog rada.\r\n\r\n', 2);

-- --------------------------------------------------------

--
-- Table structure for table `habits`
--

CREATE TABLE `habits` (
  `id` int(255) NOT NULL,
  `habit` varchar(255) NOT NULL,
  `mon` varchar(255) NOT NULL,
  `tue` varchar(255) NOT NULL,
  `wed` varchar(255) NOT NULL,
  `thu` varchar(255) NOT NULL,
  `fri` varchar(255) NOT NULL,
  `sat` varchar(255) NOT NULL,
  `sun` varchar(255) NOT NULL,
  `id_korisnk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `habits`
--

INSERT INTO `habits` (`id`, `habit`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`, `id_korisnk`) VALUES
(33, 'trenirati', '40min', '12min', '18min', '15min', '19min', '', '', 2),
(42, 'šetati', '12min', '13min', '', '', '', '', '', 2),
(43, 'spavanje', '8 sati', '10 sati ', '', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lozinka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `email`, `lozinka`) VALUES
(2, 'anabarac12@gmail.com', '1f89043949037cc54501c0af8fbff694'),
(3, 'kristijan.mihaljevic@gmail.com', 'aeb7fd704f7145557eea0ac03f9c47b6'),
(4, 'matej@gmail.com', '865962302031371dce9dbbeb5322cc8c'),
(9, 'admin@gmail.com', 'ef58e63e14b33fd6d9bfc0addd62108f');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `id` int(255) NOT NULL,
  `monthh` varchar(30) NOT NULL,
  `notes` mediumtext NOT NULL,
  `bday` mediumtext NOT NULL,
  `mon1` mediumtext NOT NULL,
  `mon2` mediumtext NOT NULL,
  `mon3` mediumtext NOT NULL,
  `mon4` mediumtext NOT NULL,
  `mon5` mediumtext NOT NULL,
  `tue1` mediumtext NOT NULL,
  `tue2` mediumtext NOT NULL,
  `tue3` mediumtext NOT NULL,
  `tue4` mediumtext NOT NULL,
  `tue5` mediumtext NOT NULL,
  `wed1` mediumtext NOT NULL,
  `wed2` mediumtext NOT NULL,
  `wed3` mediumtext NOT NULL,
  `wed4` mediumtext NOT NULL,
  `wed5` mediumtext NOT NULL,
  `thu1` mediumtext NOT NULL,
  `thu2` mediumtext NOT NULL,
  `thu3` mediumtext NOT NULL,
  `thu4` mediumtext NOT NULL,
  `thu5` mediumtext NOT NULL,
  `fri1` mediumtext NOT NULL,
  `fri2` mediumtext NOT NULL,
  `fri3` mediumtext NOT NULL,
  `fri4` mediumtext NOT NULL,
  `fri5` mediumtext NOT NULL,
  `sat1` mediumtext NOT NULL,
  `sat2` mediumtext NOT NULL,
  `sat3` mediumtext NOT NULL,
  `sat4` mediumtext NOT NULL,
  `sat5` mediumtext NOT NULL,
  `sun1` mediumtext NOT NULL,
  `sun2` mediumtext NOT NULL,
  `sun3` mediumtext NOT NULL,
  `sun4` mediumtext NOT NULL,
  `sun5` mediumtext NOT NULL,
  `id_korisnikk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id`, `monthh`, `notes`, `bday`, `mon1`, `mon2`, `mon3`, `mon4`, `mon5`, `tue1`, `tue2`, `tue3`, `tue4`, `tue5`, `wed1`, `wed2`, `wed3`, `wed4`, `wed5`, `thu1`, `thu2`, `thu3`, `thu4`, `thu5`, `fri1`, `fri2`, `fri3`, `fri4`, `fri5`, `sat1`, `sat2`, `sat3`, `sat4`, `sat5`, `sun1`, `sun2`, `sun3`, `sun4`, `sun5`, `id_korisnikk`) VALUES
(2, 'septembar', '- završiti fakss', '- 10.9. brat', ' ', ' 7.', ' 14.', ' 21.', ' 28.', ' 1. hello septembar ', ' 8.', ' 15.', ' 22.', ' 29.', ' 2.', ' 9.', ' 16.', ' 23.', ' 30.', ' 3.', ' 10.\r\nbratu rođendan\r\n', ' 17.', ' 24.', ' ', ' 4.', ' 11.\r\npredati završni na pregled.', ' 18.', ' 25.', ' ', ' 5.', ' 12.', ' 19.', ' 26.', ' ', ' 6.', ' 13.', ' 20.', ' 27.', ' ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(255) NOT NULL,
  `dayp` varchar(100) NOT NULL,
  `wnotep` varchar(100) NOT NULL,
  `weekp` varchar(100) NOT NULL,
  `momentsp` varchar(100) NOT NULL,
  `placesp` varchar(100) NOT NULL,
  `quotep` varchar(100) NOT NULL,
  `todop` varchar(100) NOT NULL,
  `monthp` varchar(100) NOT NULL,
  `mnotep` varchar(100) NOT NULL,
  `bdayp` varchar(100) NOT NULL,
  `daysmp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `dayp`, `wnotep`, `weekp`, `momentsp`, `placesp`, `quotep`, `todop`, `monthp`, `mnotep`, `bdayp`, `daysmp`) VALUES
(1, 'monday.jpg   ', 'bday.jpg   ', 'week.jpg   ', 'romantic.jpg   ', 'song.jpg   ', 'book.jpg   ', 'todo.jpg   ', 'month.jpg   ', 'todo.jpg   ', 'bday.jpg   ', 'monday.jpg   ');

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id` int(255) NOT NULL,
  `monday` varchar(500) NOT NULL,
  `tuesday` varchar(500) NOT NULL,
  `wednesday` varchar(500) NOT NULL,
  `thursday` varchar(500) NOT NULL,
  `friday` varchar(500) NOT NULL,
  `saturday` varchar(500) NOT NULL,
  `sunday` varchar(500) NOT NULL,
  `note` mediumtext NOT NULL,
  `weeek` varchar(255) NOT NULL,
  `moments` varchar(255) NOT NULL,
  `places` text NOT NULL,
  `book` varchar(255) NOT NULL,
  `todo` mediumtext NOT NULL,
  `id_korisnik` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `note`, `weeek`, `moments`, `places`, `book`, `todo`, `id_korisnik`) VALUES
(13, '   predati završni rad na pregled  ', '  obaviti šoping  ', '   predati index na pregled  ', '  dan za odmor  ', '  girls night  ', '  Roštilj na jezeru.  ', '   dan za obitelj  ', '-završni rad', '14.rujna 2020.-\r\n21.rujna 2020.\r\n', 'druženje u prirodi. ', 'Mostar\r\nMandek', '\"Talent \r\nbez rada\r\nje ništa.\"', '-kupiti hlače\r\n\r\n-postjetit baku\r\n\r\n\r\n', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dairy`
--
ALTER TABLE `dairy`
  ADD PRIMARY KEY (`id_diary`),
  ADD KEY `id_korisnik` (`id_korisnik`);

--
-- Indexes for table `habits`
--
ALTER TABLE `habits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_korisnk` (`id_korisnk`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_korisnikk` (`id_korisnikk`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_korisnik` (`id_korisnik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dairy`
--
ALTER TABLE `dairy`
  MODIFY `id_diary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `habits`
--
ALTER TABLE `habits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dairy`
--
ALTER TABLE `dairy`
  ADD CONSTRAINT `dairy_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `habits`
--
ALTER TABLE `habits`
  ADD CONSTRAINT `id_korisnk` FOREIGN KEY (`id_korisnk`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `month`
--
ALTER TABLE `month`
  ADD CONSTRAINT `id_korisnikk` FOREIGN KEY (`id_korisnikk`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `week`
--
ALTER TABLE `week`
  ADD CONSTRAINT `id_korisnik` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
