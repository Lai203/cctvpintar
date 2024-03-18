-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Mar 2024 pada 04.04
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cctv_pintar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `password`, `nama_admin`) VALUES
(4, 'mama', 'mama@gmail.com', '$2y$10$nOrIbMB69hLUXEpbNCDrIeYz1atjPDlC1pJ2IOZTPdO01YGhVl0wy', 'mama'),
(5, 'polsub123', 'polsub@gmail.com', '$2y$10$iDELxNUPrP6dBtVHKPLXUOdfTo.ynMJ8yAyazqlj4bPgv9l/iM18i', 'Polsub');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) UNSIGNED NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `deskripsi_artikel` text NOT NULL,
  `thumbnail_artikel` varchar(255) NOT NULL,
  `isi_artikel` longtext NOT NULL,
  `keyword_artikel` varchar(255) NOT NULL,
  `status_artikel` varchar(255) NOT NULL,
  `tags_artikel` varchar(255) NOT NULL,
  `slug_artikel` varchar(255) NOT NULL,
  `tanggal_dibuat_artikel` date DEFAULT NULL,
  `tanggal_update_artikel` date DEFAULT NULL,
  `id_kategori_artikel` int(11) UNSIGNED NOT NULL,
  `last_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `deskripsi_artikel`, `thumbnail_artikel`, `isi_artikel`, `keyword_artikel`, `status_artikel`, `tags_artikel`, `slug_artikel`, `tanggal_dibuat_artikel`, `tanggal_update_artikel`, `id_kategori_artikel`, `last_updated`) VALUES
(9, '123123', '12313', 'ff21b76a878480bd00473f44f0d8e486.jpg', '<p>123123</p>', '13123', 'Review', '123123', '123123-2', '0123-03-12', NULL, 1, NULL),
(11, 'ini adalah judul smart article', 'ini adalah deskripsi', '816ea64d1985b5967fe4b337d3f47647.jpg', '<p>Ini adalah kontan</p>', 'contoh keyword', 'Review', 'tags1, tags2', 'ini-adalah-judul-smart-article-2', '2024-03-18', '0000-00-00', 3, '2024-03-18 09:51:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) UNSIGNED NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `deskripsi_berita` text NOT NULL,
  `isi_berita` longtext NOT NULL,
  `thumbnail_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `jenis_berita` varchar(255) NOT NULL,
  `tanggal_dibuat_berita` date DEFAULT NULL,
  `tanggal_update_berita` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `deskripsi_berita`, `isi_berita`, `thumbnail_berita`, `slug_berita`, `jenis_berita`, `tanggal_dibuat_berita`, `tanggal_update_berita`) VALUES
(7, 'yaya 545', '123', '<p>123</p>', 'd905f57934061079ea98a556222ab61f.jpg', 'yaya-545', 'Produk', '1234-03-12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id_event` int(11) UNSIGNED NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `deskripsi_event` text NOT NULL,
  `tanggal_event` date NOT NULL,
  `waktu_event` time NOT NULL,
  `lokasi_event` text NOT NULL,
  `kontak_event` varchar(255) NOT NULL,
  `slug_event` varchar(255) NOT NULL,
  `thumbnail_event` varchar(255) NOT NULL,
  `status_event` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id_event`, `nama_event`, `deskripsi_event`, `tanggal_event`, `waktu_event`, `lokasi_event`, `kontak_event`, `slug_event`, `thumbnail_event`, `status_event`) VALUES
(1, '1231231', '231321231', '1111-11-11', '01:59:00', '123123', '123123', '1231231-2', '88e0e6a026cbe5618abe35dde5375983.jpg', 'Upcoming');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kontak`
--

CREATE TABLE `jenis_kontak` (
  `id_jenis_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(255) NOT NULL,
  `gambar_kontak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kontak`
--

INSERT INTO `jenis_kontak` (`id_jenis_kontak`, `nama_kontak`, `gambar_kontak`) VALUES
(1, 'website', ''),
(2, 'telepon', ''),
(3, 'whatsapp', ''),
(4, 'twitter', ''),
(5, 'instagram', ''),
(6, 'linkedin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenis_produk` int(11) NOT NULL,
  `nama_jenis_produk` varchar(255) NOT NULL,
  `deskripsi_jenis_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenis_produk`, `nama_jenis_produk`, `deskripsi_jenis_produk`) VALUES
(1, 'Alarm', 'Ini adalah Alarm'),
(2, 'GPS Tracker', 'Ini adalah GPS Tracker'),
(3, 'Smart Home', 'Ini Adalah Smart Home');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id_kategori_artikel` int(11) UNSIGNED NOT NULL,
  `nama_kategori_artikel` varchar(255) NOT NULL,
  `deskripsi_kategori_artikel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_kategori_artikel`, `nama_kategori_artikel`, `deskripsi_kategori_artikel`) VALUES
(1, 'Digital Security', 'Ini adalah digital Security'),
(2, 'Cyber Crime', 'Ini adalah cyber crime'),
(3, 'Smart Technology', 'Ini adalah smart technology');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `id_jenis_kontak` int(11) NOT NULL,
  `informasi_kontak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `id_jenis_kontak`, `informasi_kontak`) VALUES
(1, 1, '123123123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi_produk` longtext NOT NULL,
  `spesifikasi_produk` text NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `id_jenis_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `spesifikasi_produk`, `gambar_produk`, `harga_produk`, `slug_produk`, `id_jenis_produk`) VALUES
(3, '123', '<p>123</p>\r\n', '<p>123</p>', 'd09fcc70bb9ba0cfab47ece8d8617a4c.jpg', 1111, '123', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `profil` longtext NOT NULL,
  `sejarah` longtext DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text NOT NULL,
  `pencapaian` longtext NOT NULL,
  `last_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `profil`, `sejarah`, `visi`, `misi`, `pencapaian`, `last_updated`) VALUES
(1, '<p>123</p>', '<p>123</p>\r\n', '<p>123</p>\r\n', '<p>123</p>\r\n', '<p>123</p>\r\n', '2024-03-15 21:55:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekan_perusahaan`
--

CREATE TABLE `rekan_perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekan_perusahaan`
--

INSERT INTO `rekan_perusahaan` (`id`, `nama`, `logo`) VALUES
(3, '123', '174af4c25415a2a03785866d4afbcdd2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_kategori_artikel` (`id_kategori_artikel`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `jenis_kontak`
--
ALTER TABLE `jenis_kontak`
  ADD PRIMARY KEY (`id_jenis_kontak`);

--
-- Indeks untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id_jenis_produk`);

--
-- Indeks untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id_kategori_artikel`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`),
  ADD KEY `id_jenis_kontak` (`id_jenis_kontak`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_jenis_produk` (`id_jenis_produk`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekan_perusahaan`
--
ALTER TABLE `rekan_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_kontak`
--
ALTER TABLE `jenis_kontak`
  MODIFY `id_jenis_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id_jenis_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id_kategori_artikel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekan_perusahaan`
--
ALTER TABLE `rekan_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_kategori_artikel`) REFERENCES `kategori_artikel` (`id_kategori_artikel`);

--
-- Ketidakleluasaan untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD CONSTRAINT `kontak_ibfk_1` FOREIGN KEY (`id_jenis_kontak`) REFERENCES `jenis_kontak` (`id_jenis_kontak`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_jenis_produk`) REFERENCES `jenis_produk` (`id_jenis_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
