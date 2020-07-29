-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2020 pada 06.56
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbnq`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbadmin`
--

CREATE TABLE `tbadmin` (
  `username` varchar(25) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbadmin`
--

INSERT INTO `tbadmin` (`username`, `nama_lengkap`, `email`, `no_telp`, `password`) VALUES
('admin', 'administrator', 'administrator@gmail.com', '082333778862', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbasrama`
--

CREATE TABLE `tbasrama` (
  `id_asrama` int(5) NOT NULL,
  `nama_asrama` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbasrama`
--

INSERT INTO `tbasrama` (`id_asrama`, `nama_asrama`) VALUES
(1, 'Sunan Ampel'),
(2, 'Sunan Bonang'),
(4, 'Sunan Gunung Jati'),
(5, 'Sunan Giri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjenisizin`
--

CREATE TABLE `tbjenisizin` (
  `id_jenisizin` int(5) NOT NULL,
  `nama_jenisizin` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbjenisizin`
--

INSERT INTO `tbjenisizin` (`id_jenisizin`, `nama_jenisizin`) VALUES
(1, 'Sakit'),
(2, 'Berobat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjenispelanggaran`
--

CREATE TABLE `tbjenispelanggaran` (
  `id_jenispelanggaran` int(5) NOT NULL,
  `nama_jenispelanggaran` varchar(35) NOT NULL,
  `bobot_pelanggaran` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbjenispelanggaran`
--

INSERT INTO `tbjenispelanggaran` (`id_jenispelanggaran`, `nama_jenispelanggaran`, `bobot_pelanggaran`) VALUES
(1, 'Merokok', '40'),
(2, 'Minum Minuman Keras', '70'),
(3, 'Pulang Tanpa Izin', '80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkamar`
--

CREATE TABLE `tbkamar` (
  `id_kamar` int(5) NOT NULL,
  `id_asrama` int(5) NOT NULL,
  `nama_kamar` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbkamar`
--

INSERT INTO `tbkamar` (`id_kamar`, `id_asrama`, `nama_kamar`) VALUES
(2, 1, 'A.1'),
(3, 1, 'A.2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpelanggaran`
--

CREATE TABLE `tbpelanggaran` (
  `id_pelanggaran` int(5) NOT NULL,
  `tgl_pelanggaran` date NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `id_jenispelanggaran` int(5) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `sanksi` varchar(35) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpelanggaran`
--

INSERT INTO `tbpelanggaran` (`id_pelanggaran`, `tgl_pelanggaran`, `NIS`, `id_jenispelanggaran`, `keterangan`, `sanksi`, `aktif`) VALUES
(8, '2020-03-09', '0820292828', 2, 'Pulang Ke Rumah', 'Di Gundul', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbperizinan`
--

CREATE TABLE `tbperizinan` (
  `id_perizinan` int(5) NOT NULL,
  `tgl_izin` date NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `id_jenisizin` int(5) NOT NULL,
  `lama` varchar(12) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbperizinan`
--

INSERT INTO `tbperizinan` (`id_perizinan`, `tgl_izin`, `NIS`, `id_jenisizin`, `lama`, `keterangan`) VALUES
(24, '2020-03-09', '0820292828', 1, '2', 'Pulang Ke Rumah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbsantri`
--

CREATE TABLE `tbsantri` (
  `NIS` varchar(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `id_kamar` int(5) NOT NULL,
  `id_telegram` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbsantri`
--

INSERT INTO `tbsantri` (`NIS`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `jenis_kelamin`, `id_kamar`, `id_telegram`) VALUES
('0820292828', 'MUHAMMAD RIDWAN', 'PROBOLINGGO', '0000-00-00', 'PAITON PROBOLINGGO', 'Laki-Laki', 2, '403574296');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbasrama`
--
ALTER TABLE `tbasrama`
  ADD PRIMARY KEY (`id_asrama`);

--
-- Indeks untuk tabel `tbjenisizin`
--
ALTER TABLE `tbjenisizin`
  ADD PRIMARY KEY (`id_jenisizin`);

--
-- Indeks untuk tabel `tbjenispelanggaran`
--
ALTER TABLE `tbjenispelanggaran`
  ADD PRIMARY KEY (`id_jenispelanggaran`);

--
-- Indeks untuk tabel `tbkamar`
--
ALTER TABLE `tbkamar`
  ADD PRIMARY KEY (`id_kamar`,`id_asrama`);

--
-- Indeks untuk tabel `tbpelanggaran`
--
ALTER TABLE `tbpelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`,`NIS`,`id_jenispelanggaran`);

--
-- Indeks untuk tabel `tbperizinan`
--
ALTER TABLE `tbperizinan`
  ADD PRIMARY KEY (`id_perizinan`,`NIS`,`id_jenisizin`);

--
-- Indeks untuk tabel `tbsantri`
--
ALTER TABLE `tbsantri`
  ADD PRIMARY KEY (`NIS`,`id_kamar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbasrama`
--
ALTER TABLE `tbasrama`
  MODIFY `id_asrama` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbjenisizin`
--
ALTER TABLE `tbjenisizin`
  MODIFY `id_jenisizin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbjenispelanggaran`
--
ALTER TABLE `tbjenispelanggaran`
  MODIFY `id_jenispelanggaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbkamar`
--
ALTER TABLE `tbkamar`
  MODIFY `id_kamar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbpelanggaran`
--
ALTER TABLE `tbpelanggaran`
  MODIFY `id_pelanggaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbperizinan`
--
ALTER TABLE `tbperizinan`
  MODIFY `id_perizinan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
