-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Okt 2018 pada 18.14
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_mcs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `checker`
--

CREATE TABLE `checker` (
  `id` int(11) NOT NULL,
  `nama_maker` varchar(50) NOT NULL,
  `request` varchar(500) NOT NULL,
  `tanggal_request` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `maker`
--

CREATE TABLE `maker` (
  `id_maker` int(11) NOT NULL,
  `nama_maker` varchar(50) NOT NULL,
  `request` varchar(500) NOT NULL,
  `harga` int(10) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tanggal_request` date NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `status` enum('-','Checked','Reject') NOT NULL,
  `approvement` enum('-','Approved','Unapproved') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `maker`
--

INSERT INTO `maker` (`id_maker`, `nama_maker`, `request`, `harga`, `jumlah`, `tanggal_request`, `keterangan`, `status`, `approvement`) VALUES
(12, 'humam', 'jok', 100000, 10, '2018-07-12', 'bolong', 'Checked', 'Approved'),
(25, 'humam', 'aw', 12, 11, '2018-07-10', 'mantap', 'Checked', 'Unapproved'),
(26, 'admin', 'sad', 213, 4214, '2018-07-17', 'sadasd', 'Reject', '-'),
(27, 'humam', 'laptop', 900000, 1, '2018-07-17', 'BARU', 'Checked', 'Unapproved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `signer`
--

CREATE TABLE `signer` (
  `id` int(11) NOT NULL,
  `nama_maker` varchar(50) NOT NULL,
  `request` varchar(500) NOT NULL,
  `harga` int(10) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tanggal_request` date NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `approvement` varchar(50) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id_level` varchar(10) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_level`
--

INSERT INTO `tbl_level` (`id_level`, `level`) VALUES
('ADM', 'Admin'),
('CKR', 'Checker'),
('MKR', 'Maker'),
('SGR', 'Signer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `email`, `level`) VALUES
(28, 'Humam Huwaidi Al-Marzuq', 'humam', '6f99cd6a204c61990e0abbe993988efe', 'humamham14@gmail.com', 'MKR'),
(33, 'Humam Huwaidi A', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'ADM'),
(34, 'faydl', 'fay', '5bc45960fb2067f6b569db892c5056f9', 'fay@gmail.com', 'CKR'),
(35, 'Alif Reyhan', 'alifr', '099a147c0c6bcd34009896b2cc88633c', 'alif@gmail.com', 'SGR'),
(36, 'faydl', 'faydl', '3025b0eead96cefde30d891f8a15a52d', 'faydL@gmail.com', 'ADM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checker`
--
ALTER TABLE `checker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`id_maker`);

--
-- Indexes for table `signer`
--
ALTER TABLE `signer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`nama`,`username`,`password`,`email`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checker`
--
ALTER TABLE `checker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maker`
--
ALTER TABLE `maker`
  MODIFY `id_maker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `signer`
--
ALTER TABLE `signer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
