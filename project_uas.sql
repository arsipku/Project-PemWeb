-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Mar 2019 pada 07.42
-- Versi server: 5.7.19
-- Versi PHP: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `username` varchar(100) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_comment` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`username`, `comment`, `time`, `id_comment`) VALUES
('lala', 'lala', '2019-03-14 01:40:34', 1),
('lala', '', '2019-03-14 01:41:46', 2),
('lala', 'hihih', '2019-03-14 01:45:11', 3),
('Sasuke', 'hai', '2019-03-14 02:01:48', 4),
('Sasuke', 'lala', '2019-03-14 02:12:26', 5),
('Sasuke', 'anjing', '2019-03-14 16:30:19', 6),
('Sasuke', 'joiajoij', '2019-03-15 01:00:03', 7),
('Sasuke', 'mata lu', '2019-03-15 07:45:54', 8),
('rndrew', 'jgosjgoij', '2019-03-23 07:01:15', 9),
('l', '', '2019-03-23 07:03:34', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`username`, `password`, `nama_depan`, `nama_belakang`, `email`, `jenis_kelamin`) VALUES
('l', '2db95e8e1a9267b7a1188556b2013b33', 'lapet', 'combro', 'ahsanulqalbi@yahoo.co.id', 'LakiLaki'),
('lala', 'd6581d542c7eaf801284f084478b5fcc', 'Madara', 'uchiha', 'ahsanulqalbi@gmail.com', 'LakiLaki'),
('rndrew', 'a3622ca65e74a73963541ccce73fb02f', 'richard', 'andrew', 'richard.andrew811@gmail.com', 'LakiLaki'),
('Sasuke', 'c36a3b04e10209374f2bc3a1f006d6bd', 'Sasuke', 'Uchiha', 'A@gmail.com', 'LakiLaki'),
('sv', '743541121c12a113af807d1582c74bea', 'madara', 'dhdhd', 'ahsanulqalbi@gmail.com', 'LakiLaki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user_lanjutan`
--

CREATE TABLE `data_user_lanjutan` (
  `username` varchar(50) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `motto` varchar(200) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user_lanjutan`
--

INSERT INTO `data_user_lanjutan` (`username`, `profile_pic`, `alamat`, `motto`, `tempat_lahir`, `tanggal_lahir`, `bio`) VALUES
('l', 'profil_bawaan.jpg', NULL, NULL, NULL, NULL, NULL),
('lala', 'profil_bawaan.jpg', NULL, NULL, NULL, NULL, NULL),
('rndrew', 'profil_bawaan.jpg', NULL, NULL, NULL, NULL, NULL),
('Sasuke', 'sasuke.png', NULL, NULL, NULL, NULL, NULL),
('sv', 'hiler.jpg', 'Jerman', 'HeiLLLLL', 'jerman', '2018-05-14', 'Gatau');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `data_user_lanjutan`
--
ALTER TABLE `data_user_lanjutan`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
