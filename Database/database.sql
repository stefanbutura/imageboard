-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Feb 2017 la 14:31
-- Versiune server: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bacefook`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `comentarii`
--

CREATE TABLE `comentarii` (
  `username` varchar(25) NOT NULL,
  `IDPoza` int(11) NOT NULL,
  `comentariu` varchar(255) NOT NULL,
  `IDComentariu` int(11) NOT NULL,
  `Data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `comentarii`
--

INSERT INTO `comentarii` (`username`, `IDPoza`, `comentariu`, `IDComentariu`, `Data`) VALUES
('stefi', 10, 'asdf', 14, '2017-01-08 00:00:00'),
('stefi', 10, 'asdf', 15, '2017-01-08 00:00:00'),
('stefi', 10, 'asdf', 16, '2017-01-08 00:00:00'),
('stefi', 13, 'hey', 18, '2017-02-09 09:46:41'),
('stefi', 13, 'hey', 19, '2017-02-09 09:47:56'),
('stefi', 13, ':D', 20, '2017-02-09 09:48:06'),
('stefi', 13, 'z', 21, '2017-02-09 09:48:40'),
('stefi', 13, 'asdff', 22, '2017-02-09 09:49:09'),
('stefi', 13, 'comentariu', 23, '2017-02-09 13:54:10'),
('stefi', 21, 'xD', 24, '2017-02-11 14:48:22'),
('stefi', 21, '$xD', 25, '2017-02-11 14:48:37');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `likeuripoze`
--

CREATE TABLE `likeuripoze` (
  `IDPoza` int(11) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `likeuripoze`
--

INSERT INTO `likeuripoze` (`IDPoza`, `username`) VALUES
(13, 'stefi');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `poze`
--

CREATE TABLE `poze` (
  `IDPoza` int(11) NOT NULL,
  `Adresa` text NOT NULL,
  `Data` datetime NOT NULL,
  `username` varchar(25) NOT NULL,
  `titlu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `poze`
--

INSERT INTO `poze` (`IDPoza`, `Adresa`, `Data`, `username`, `titlu`) VALUES
(9, 'https://www.surf.co/images/y-tho.jpg?image=cdn', '2017-01-08 00:00:00', 'stefi', 'Yey'),
(10, 'http://i1.kym-cdn.com/entries/icons/facebook/000/016/911/mcmahongif.jpg', '2017-01-08 00:00:00', 'stefi', 'MFW merge tot'),
(11, 'https://68.media.tumblr.com/1d5b1a2ba94ef9c431b20cd00f7ea941/tumblr_inline_og5pq4EM5m1s4cbqc_540.jpg', '2017-01-08 14:13:55', 'stefi', 'n'),
(13, 'https://scontent.fotp3-2.fna.fbcdn.net/v/t1.0-9/15940599_1194338033949454_1003308370701427374_n.jpg?oh=e8eee849863f93260d3aafc1947cddf8&oe=58D801D2', '2017-01-08 14:22:01', 'stefi', 'test'),
(16, 'http://pbs.twimg.com/profile_images/818990934587109377/bCUswiTA_400x400.jpg', '2017-02-09 09:50:29', 'stefi', 'xD'),
(18, 'http://hugelolcdn.com/comments/2028188.gif', '2017-02-09 11:11:26', 'stefi', 'xD'),
(19, 'http://www.cozonaculdolofan.ro/wp-content/uploads/2015/11/cozonac-incepatori-final_4.jpg', '2017-02-09 11:11:41', 'stefi', 'zz'),
(20, 'http://i.ytimg.com/vi/qHCrR3g0Zwg/maxresdefault.jpg', '2017-02-09 11:12:02', 'stefi', 'adv'),
(21, 'http://media.tenor.co/images/0d1c9f9e617afdabc0bc385a35b48e36/raw', '2017-02-09 11:17:28', 'stefi', 'z'),
(23, 'uploads/stefi/pizzi.jpg', '2017-02-09 12:00:12', 'stefi', 'nye'),
(27, 'uploads/stefi/Unztitled-1.png', '2017-02-09 13:54:32', 'stefi', '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `utilizatori`
--

CREATE TABLE `utilizatori` (
  `Nume` varchar(25) NOT NULL,
  `Prenume` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`Nume`, `Prenume`, `username`, `password`) VALUES
('Stefan', 'Butura', 'stefi', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarii`
--
ALTER TABLE `comentarii`
  ADD PRIMARY KEY (`IDComentariu`,`IDPoza`),
  ADD KEY `IDPoza` (`IDPoza`);

--
-- Indexes for table `likeuripoze`
--
ALTER TABLE `likeuripoze`
  ADD PRIMARY KEY (`IDPoza`,`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `poze`
--
ALTER TABLE `poze`
  ADD PRIMARY KEY (`IDPoza`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarii`
--
ALTER TABLE `comentarii`
  MODIFY `IDComentariu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `poze`
--
ALTER TABLE `poze`
  MODIFY `IDPoza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `comentarii`
--
ALTER TABLE `comentarii`
  ADD CONSTRAINT `comentarii_ibfk_1` FOREIGN KEY (`IDPoza`) REFERENCES `poze` (`IDPoza`) ON DELETE CASCADE;

--
-- Restrictii pentru tabele `likeuripoze`
--
ALTER TABLE `likeuripoze`
  ADD CONSTRAINT `likeuripoze_ibfk_1` FOREIGN KEY (`IDPoza`) REFERENCES `poze` (`IDPoza`) ON DELETE CASCADE,
  ADD CONSTRAINT `likeuripoze_ibfk_2` FOREIGN KEY (`username`) REFERENCES `utilizatori` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
