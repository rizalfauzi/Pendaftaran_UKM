-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jun 2015 pada 04.23
-- Versi Server: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_user`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ukm`
--

CREATE TABLE IF NOT EXISTS `tbl_ukm` (
  `id_ukm` int(11) NOT NULL,
  `nama_ukm` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_ukm`
--

INSERT INTO `tbl_ukm` (`id_ukm`, `nama_ukm`) VALUES
(5, 'futsal'),
(6, 'batminton'),
(7, 'renang'),
(8, 'voli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL,
  `id_ukm` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_ukm`, `username`, `password`) VALUES
(3, 5, 'ekky', '12'),
(4, 6, 'dimas', '12'),
(5, 7, 'rial', '13'),
(6, 5, 'aan', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ukm`
--
ALTER TABLE `tbl_ukm`
  ADD PRIMARY KEY (`id_ukm`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`,`id_ukm`), ADD KEY `fk_tbl_user_tbl_role_idx` (`id_ukm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ukm`
--
ALTER TABLE `tbl_ukm`
  MODIFY `id_ukm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
