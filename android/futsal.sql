-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2017 at 12:34 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan`
--

CREATE TABLE IF NOT EXISTS `pertandingan` (
  `id_pertandingan` int(100) NOT NULL AUTO_INCREMENT,
  `nama_match` varchar(250) NOT NULL,
  `pilih_tempat` varchar(250) NOT NULL,
  `max_pemain` int(100) NOT NULL,
  PRIMARY KEY (`id_pertandingan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pertandingan`
--

INSERT INTO `pertandingan` (`id_pertandingan`, `nama_match`, `pilih_tempat`, `max_pemain`) VALUES
(1, 'ZERO1', 'ZONA FUTSAL', 0),
(2, 'zora', 'zona', 0),
(3, 'zora', 'zona', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tempat_futsal`
--

CREATE TABLE IF NOT EXISTS `tempat_futsal` (
  `id_tempat` int(20) NOT NULL AUTO_INCREMENT,
  `nama_tempat` varchar(100) NOT NULL,
  `detail` longtext NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_tempat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tempat_futsal`
--

INSERT INTO `tempat_futsal` (`id_tempat`, `nama_tempat`, `detail`, `gambar`, `tanggal`) VALUES
(1, 'ZONA FUTSAL', 'Zona Futsal\r\n\r\nAlamat    : Jalan Tidar Jember\r\n\r\nPhone    : 082 13 888 868', '1.jpg', '2017-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'a', 'aa'),
(3, 'david', '11'),
(5, 'saya', 'a'),
(6, 'aki', 'aki'),
(8, 'dav', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
