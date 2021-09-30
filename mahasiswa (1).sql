-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Sep 2021 pada 19.59
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `nim` varchar(100) NOT NULL,
  `status` enum('s','a','i','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `tgl`, `nim`, `status`) VALUES
(1, '2021-09-30', 'RPM10001', 'a'),
(7, '2021-09-30', 'RPM159', 's');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `nim` varchar(10) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jk` varchar(9) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `tmp_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hp` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`nim`, `nama_siswa`, `jk`, `jurusan`, `tmp_lahir`, `tgl_lahir`, `alamat`, `nama_ibu`, `email`, `hp`) VALUES
('RPM10001', 'tes', 'Laki-laki', 'T-Informatika', 'surabaya', '2004-06-30', 'sdcds', 'Febriana C', 'admin@app.com', '0985676543'),
('RPM159', 'Rinra Febriani', 'Perempuan', 'T-Komputer', 'cdscdscds', '2021-10-01', '', 'sdsds', 'admin@admin.com', '0985676543');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `nama`, `password`, `hak_akses`) VALUES
('admin', 'admin', 'admin', 'Admin'),
('RPM10001', 'tes', 'RPM10001', 'Siswa'),
('RPM159', 'Rinra Febriani', 'RPM159', 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
('MAPEL00002', 'Sistem Informasi'),
('MAPEL00004', 'Algoritma Pemrograman'),
('MAPEL00006', 'Sistem Keamanan Komputer'),
('MAPEL00010', 'Pemrograman Terstruktur'),
('MAPEL218', 'vdvf'),
('MAPEL626', 'gdfgdfgfdg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` varchar(8) NOT NULL,
  `nim_siswa` varchar(10) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `nilai_mapel` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim_siswa`, `mapel`, `nilai_mapel`) VALUES
('N-000001', 'RPM0000001', 'Sistem Keamanan Komputer', 6),
('N-000002', 'RPM0000001', 'Sistem Informasi', 7),
('N-000003', 'RPM0000002', 'Pemrograman Internet', 8),
('N-000004', 'RPM0000001', 'Arsitektur Komputer', 5),
('N-000005', 'RPM0000002', 'Troubleshoot Komputer', 6),
('N-000006', 'RPM0000003', 'Troubleshoot Komputer', 7),
('N-290', 'RPM0000002', 'Sistem Informasi', 5),
('N-523', 'RPM305', 'Arsitektur Komputer', 10),
('N-646', 'RPM305', 'Bahasa Rakitan', 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
