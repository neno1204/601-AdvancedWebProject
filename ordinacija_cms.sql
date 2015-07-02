-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2015 at 03:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ordinacija_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(2, 'nikola', 'ae2b1fca515949e5d54fb22b8ed95575');

-- --------------------------------------------------------

--
-- Table structure for table `cenovnik`
--

CREATE TABLE IF NOT EXISTS `cenovnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `popravka_id` int(5) NOT NULL,
  `user_id` int(10) NOT NULL,
  `motor_id` int(10) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `cena` int(10) NOT NULL,
  `placeno` int(1) NOT NULL,
  `valuta` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cenovnik`
--

INSERT INTO `cenovnik` (`id`, `popravka_id`, `user_id`, `motor_id`, `opis`, `cena`, `placeno`, `valuta`) VALUES
(26, 11, 1, 1, 'f.ulja', 740, 1, 'din'),
(27, 11, 1, 1, 'ulje-motul 7100 10.40', 1440, 1, 'din');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `popravka_id` int(6) NOT NULL,
  `post_user_id` int(5) NOT NULL,
  `date` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` int(30) NOT NULL,
  `broj_telefona` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`, `date`, `broj_telefona`, `email`) VALUES
(1, 'Nemanja Pribilovic', 'ae2b1fca515949e5d54fb22b8ed95575', 0, '0643708792', 'neno1204@gmail.com'),
(2, 'Nebojsa Pribilovic', 'ae2b1fca515949e5d54fb22b8ed95575', 0, '0654412309', 'nebojsa.pribilovic@yahoo.com'),
(3, 'Nikola Vuckovic', 'ae2b1fca515949e5d54fb22b8ed95575', 0, '565454545', 'asd5asdasd'),
(5, 'Jug Vujasinovic', 'ae2b1fca515949e5d54fb22b8ed95575', 0, '123456', 'jug@gmail.com'),
(49, 'marko markovic', '', 0, '98079', 'anedjklasdlk'),
(50, 'ivan maksimovic', '', 0, '641235479867354', 'nedwcjnkwsn');

-- --------------------------------------------------------

--
-- Table structure for table `motori`
--

CREATE TABLE IF NOT EXISTS `motori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motor` varchar(50) NOT NULL,
  `godiste` int(5) NOT NULL,
  `serijski_broj` varchar(50) NOT NULL,
  `dimenzija_guma` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `motori`
--

INSERT INTO `motori` (`id`, `motor`, `godiste`, `serijski_broj`, `dimenzija_guma`, `user_id`) VALUES
(1, 'KTM SMC 625', 2006, '212312', '70/1029/12/32', 1),
(2, 'malaguti', 2003, 'kjbkbnm', 'l;km;l', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trenutne_popravke`
--

CREATE TABLE IF NOT EXISTS `trenutne_popravke` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `motor_id` int(5) NOT NULL,
  `kvar` text NOT NULL,
  `datum` int(12) NOT NULL,
  `kilometraza` int(6) NOT NULL,
  `trenutna` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `trenutne_popravke`
--

INSERT INTO `trenutne_popravke` (`id`, `user_id`, `motor_id`, `kvar`, `datum`, `kilometraza`, `trenutna`) VALUES
(11, 1, 1, 'Menjanje ulja i guma', 1429048800, 13000, 0),
(13, 1, 2, 'kocnica zadnja', 1429567200, 423655, 1),
(14, 1, 1, 'test kalendara', 1430344800, 21000, 1),
(15, 1, 1, 'datum pre', 1427839200, 11000, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
