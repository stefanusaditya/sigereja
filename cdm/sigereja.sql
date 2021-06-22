-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Jun 2021 pada 15.19
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigereja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jemaat`
--

CREATE TABLE `jemaat` (
  `nama_jemaat` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jemaat`
--

INSERT INTO `jemaat` (`nama_jemaat`, `pass`, `id`) VALUES
('hilal', '12345', 0),
('stef', '12345', 1),
('test', 'test', 2),
('hilal', 'qweqwe', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi_1`
--

CREATE TABLE `sesi_1` (
  `nomor` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sesi_1`
--

INSERT INTO `sesi_1` (`nomor`, `nama`, `no_hp`, `jumlah`) VALUES
(1, 'Risav Uhuyop', '0258854568', 2),
(2, 'Risav Arrahman', '084652162', 3),
(3, 'Risav Arrahman Abdullah', '1894692635', 3),
(5, 'Asdjhs', '1230864', 3),
(6, 'Ceking ', '9516547', 3),
(7, 'asade', '85748574', 3),
(8, 'Bagas Anta', '8526458', 2),
(9, 'Yahya Christian', '856875', 3),
(10, 'M Millen', '0865465465', 5),
(11, 'Farhan', '65465465465', 6),
(12, 'Milen Uhasd', '6546548978', 6),
(13, 'Augy Augy', '74859614635', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi_2`
--

CREATE TABLE `sesi_2` (
  `nomor` int(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sesi_2`
--

INSERT INTO `sesi_2` (`nomor`, `nama`, `no_hp`, `jumlah`) VALUES
(2, 'Asldjalksj', '084654654', 3),
(3, 'asdasdasd', '321123123', 4),
(4, 'ASdlkalksjd', '951753654', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi_3`
--

CREATE TABLE `sesi_3` (
  `nomor` int(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sesi_3`
--

INSERT INTO `sesi_3` (`nomor`, `nama`, `no_hp`, `jumlah`) VALUES
(2, 'Au ah', '3216547', 6),
(3, 'Stefanu Aditya Ferary', '456654', 4),
(4, 'Augy', '789987', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`username`, `pass`, `id`) VALUES
('admin', 'admin', 1),
('risav', '12345', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sesi_1`
--
ALTER TABLE `sesi_1`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `sesi_2`
--
ALTER TABLE `sesi_2`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `sesi_3`
--
ALTER TABLE `sesi_3`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sesi_1`
--
ALTER TABLE `sesi_1`
  MODIFY `nomor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sesi_2`
--
ALTER TABLE `sesi_2`
  MODIFY `nomor` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sesi_3`
--
ALTER TABLE `sesi_3`
  MODIFY `nomor` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
