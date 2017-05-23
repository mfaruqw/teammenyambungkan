-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 21. Mei 2017 jam 20:47
-- Versi Server: 5.1.33
-- Versi PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fbar`
--
CREATE DATABASE `fbar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fbar`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`, `level`) VALUES
('fbar', '746caa7604ca07d6296fe337eb03d611', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi_kami`
--

CREATE TABLE IF NOT EXISTS `hubungi_kami` (
  `id_hubungi` int(6) NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subjek` varchar(20) NOT NULL,
  `pesan` longtext NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `hubungi_kami`
--

INSERT INTO `hubungi_kami` (`id_hubungi`, `nama_pengirim`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(5, 'test', 'yusfiadil@gmail.com', 'Kesalahan', 'NII', '2017-05-14 01:48:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemain`
--

CREATE TABLE IF NOT EXISTS `pemain` (
  `id_pemain` varchar(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` char(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `posisi` varchar(15) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tgl_gabung` datetime NOT NULL,
  PRIMARY KEY (`id_pemain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemain`
--

INSERT INTO `pemain` (`id_pemain`, `nama`, `jk`, `tgl_lahir`, `alamat`, `posisi`, `no_tlp`, `email`, `password`, `tgl_gabung`) VALUES
('P20000', 'Yusfi Adil', 'L', '1997-10-11', 'Jember', 'GK', '0900008080', 'yusfiadil@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2017-05-20 06:09:12'),
('P20001', 'David S', 'L', '1985-03-10', 'Lumajang', 'CF', '(0331) 789 - 65', 'davidmufc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2017-05-20 06:14:28'),
('P20002', 'Faruq Wahyudi', 'L', '1985-02-02', 'Jember', 'GK', '0000000', 'Mfaru@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2017-05-20 06:16:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertandingan`
--

CREATE TABLE IF NOT EXISTS `pertandingan` (
  `id_pertandingan` char(6) NOT NULL,
  `id_pemain` char(6) NOT NULL,
  `id_tempat` char(6) NOT NULL,
  `no_lapangan` char(2) NOT NULL,
  `tanggal_main` date NOT NULL,
  `start_jam_main` char(5) NOT NULL,
  `end_jam_main` char(5) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pertandingan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertandingan`
--

INSERT INTO `pertandingan` (`id_pertandingan`, `id_pemain`, `id_tempat`, `no_lapangan`, `tanggal_main`, `start_jam_main`, `end_jam_main`, `total_harga`, `keterangan`) VALUES
('1', 'P23000', '1', '5', '2017-04-25', '05:00', '06:00', 10000, 'jijii'),
('2', 'P23001', '2', '5', '2017-04-25', '05:00', '06:00', 10000, 'jijii');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat`
--

CREATE TABLE IF NOT EXISTS `tempat` (
  `id_tempat` char(6) NOT NULL,
  `nama_tempat` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` longtext NOT NULL,
  PRIMARY KEY (`id_tempat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`, `alamat`, `no_tlp`, `gambar`, `deskripsi`) VALUES
('T17001', 'gfhfgh', 'Lumajang', '464643', 'file_T17001.jpg', 'fdgdf');
