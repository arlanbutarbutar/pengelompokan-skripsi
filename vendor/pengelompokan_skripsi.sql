-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2023 pada 12.19
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
-- Database: `pengelompokan_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_skripsi`
--

CREATE TABLE `data_skripsi` (
  `id_skripsi` int(11) NOT NULL,
  `nama_mahasiswa` varchar(75) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `abstrak` text NOT NULL,
  `pembimbing` varchar(75) NOT NULL,
  `penguji` varchar(75) NOT NULL,
  `tahun` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `id_skripsi` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) DEFAULT 2,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', '2023-03-27 15:14:01', '2023-03-27 15:14:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_skripsi`
--
ALTER TABLE `data_skripsi`
  ADD PRIMARY KEY (`id_skripsi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_skripsi` (`id_skripsi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_skripsi`
--
ALTER TABLE `data_skripsi`
  MODIFY `id_skripsi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD CONSTRAINT `klasifikasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `klasifikasi_ibfk_2` FOREIGN KEY (`id_skripsi`) REFERENCES `data_skripsi` (`id_skripsi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
