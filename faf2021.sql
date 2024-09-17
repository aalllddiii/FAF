-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2021 pada 14.26
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faf2021`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_tim`
--

CREATE TABLE `anggota_tim` (
  `id_a` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `nama_a` varchar(50) NOT NULL,
  `npm_a` varchar(50) NOT NULL,
  `email_a` varchar(70) NOT NULL,
  `nohp_a` varchar(20) NOT NULL,
  `idline_a` varchar(30) NOT NULL,
  `foto_a` varchar(100) NOT NULL,
  `ktm_a` varchar(100) NOT NULL,
  `stat_a` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota_tim`
--

INSERT INTO `anggota_tim` (`id_a`, `id_tim`, `nama_a`, `npm_a`, `email_a`, `nohp_a`, `idline_a`, `foto_a`, `ktm_a`, `stat_a`) VALUES
(8, 4, 'qwe', '4568', 'qwe@gmail.com', '757', 'asd', '6798.Dance Cover.dance.Screenshot_3.jpg', '9679.Dance Cover.dance.Screenshot_4.jpg', 0),
(9, 4, 'qrt', 'qwe', 'apa@gmail.com', '757', 'asd', '8098.Dance Cover.dance.Pas Foto.jpg', '9495.Dance Cover.dance.logogundar.png', 0),
(10, 3, 'akus', 'tik', 'silfi', 'dsfjs', 'ksdfj', '8790.Acoustic.akustik.Screenshot_6.jpg', '5590.Acoustic.akustik.Screenshot_7.jpg', 0),
(11, 8, 'hdfh', 'hdf', 'hdf', '654611', 'hdfgf', '1697.Dance Cover.cobaCTF`.Screenshot_2.jpg', '2870.Dance Cover.cobaCTF`.Screenshot_7.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompetisi`
--

CREATE TABLE `kompetisi` (
  `id` int(11) NOT NULL,
  `lomba` varchar(30) NOT NULL,
  `nama_tim` varchar(50) NOT NULL,
  `instansi` varchar(60) NOT NULL,
  `stat_k` int(5) NOT NULL,
  `nama_k` varchar(50) NOT NULL,
  `npm_k` varchar(50) NOT NULL,
  `email_k` varchar(80) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `nohp_k` varchar(20) NOT NULL,
  `idline_k` varchar(30) NOT NULL,
  `foto_k` varchar(100) DEFAULT NULL,
  `stat_foto_k` int(5) NOT NULL,
  `ktm_k` varchar(100) DEFAULT NULL,
  `stat_ktm_k` int(5) NOT NULL,
  `bukti` varchar(100) DEFAULT NULL,
  `stat_bukti` int(5) NOT NULL,
  `stat_tim` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kompetisi`
--

INSERT INTO `kompetisi` (`id`, `lomba`, `nama_tim`, `instansi`, `stat_k`, `nama_k`, `npm_k`, `email_k`, `pass`, `nohp_k`, `idline_k`, `foto_k`, `stat_foto_k`, `ktm_k`, `stat_ktm_k`, `bukti`, `stat_bukti`, `stat_tim`) VALUES
(2, 'Comic Strip', 'azab', 'aneh', 0, 'au', '7384274', 'au@gmail.com', 'au123', '1245', 'auah gelap', '9066.Comic Strip.au.Screenshot_1.jpg', 1, '6723.Comic Strip.au.Screenshot_7.jpg', 1, '3813.Comic Strip.au.Screenshot_3.jpg', 1, 1),
(3, 'Acoustic', 'akustik', 'gundar', 0, 'anisa', '43242', 'ada@gmail.com', 'ada', 'ada', 'ada', '419.Acoustic.anisa.logogundar.png', 1, '9793.Acoustic.anisa.Pas Foto.jpg', 1, '9297.Acoustic.anisa.Screenshot_7.jpg', 1, 0),
(4, 'Dance Cover', 'dance', 'ako', 0, 'ako', '732892', 'dance@gmail.com', 'dance123', '1354', 'dance', '7893.Dance Cover.ako.logogundar.png', 1, '3935.Dance Cover.ako.Screenshot_23.jpg', 1, '9372.Dance Cover.dance.Screenshot_19.jpg', 1, 1),
(5, 'Solo Vocal', 'solo', 'solo', 0, 'solo', '42342', 'solo@gmail.com', 'solo', 'solo', 'solo', '1080.Solo Vocal.solo.Pas Foto.jpg', 1, '2181.Solo Vocal.solo.Screenshot_15.jpg', 1, '6389.Solo Vocal.solo.Screenshot_4.jpg', 1, 1),
(7, 'Comic Strip', 'comics', '23324', 0, '4324', '4234', 'comic@gmail.com', 'comic', '764', '48', NULL, 0, NULL, 0, NULL, 0, 0),
(8, 'Dance Cover', 'cobaCTF`', 'gundar', 0, 'asa', '4465fgd', 'dance2@gmail.com', 'ac', 'dsf', 'fsdf', '106.Dance Cover.asa.Screenshot_7.jpg', 1, '2381.Dance Cover.asa.Pas Foto.jpg', 1, '9022.Dance Cover.asa.Screenshot_2.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panitia`
--

CREATE TABLE `panitia` (
  `username` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `panitia`
--

INSERT INTO `panitia` (`username`, `pass`) VALUES
('AdminFaF', 'FiktiaF2k21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_tim`
--
ALTER TABLE `anggota_tim`
  ADD PRIMARY KEY (`id_a`);

--
-- Indeks untuk tabel `kompetisi`
--
ALTER TABLE `kompetisi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email_k`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_tim`
--
ALTER TABLE `anggota_tim`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kompetisi`
--
ALTER TABLE `kompetisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
