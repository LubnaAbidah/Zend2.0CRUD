-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Mar 2017 pada 07.36
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id_customer` int(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jenkel` enum('P','L') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `kota` varchar(10) NOT NULL,
  `kode_pos` int(8) NOT NULL,
  `no_telfon` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nama`, `jenkel`, `tgl_lahir`, `alamat`, `kota`, `kode_pos`, `no_telfon`) VALUES
(1, 'Lubna Abidah', 'P', '1996-02-17', 'Way Mengaku Liwa', 'Liwa lia', 4333, 23333333),
(2, 'Reni', 'P', '2017-03-01', 'fsfsfsf', 'liwa', 93484, 42432434),
(3, 'Wayan', 'P', '2017-03-01', 'Banjit', 'Banjit', 423232, 2147483647),
(4, 'tulus', 'P', '1996-03-27', 'jl.soekarnohatta', 'lampung', 13766, 87767565);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `nm_kota_asal` varchar(20) NOT NULL,
  `nm_kota_tujuan` varchar(20) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `harga` int(20) NOT NULL,
  `kursi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `nm_kota_asal`, `nm_kota_tujuan`, `tgl_berangkat`, `jam_berangkat`, `harga`, `kursi`) VALUES
(1, 'Bandar Lampung', 'Liwa', '2017-03-16', '06:00:00', 90000, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE IF NOT EXISTS `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `id_jadwal`, `id_customer`, `qty`, `status`, `total`) VALUES
(1, 1, 1, 1, 'Lunas', 90000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
