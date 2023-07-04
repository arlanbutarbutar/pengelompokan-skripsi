-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2023 pada 17.09
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
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'Soft'),
(2, 'Mobile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `id_testing` int(11) NOT NULL,
  `nilai_akhir` char(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `id_testing`, `nilai_akhir`, `created_at`, `updated_at`) VALUES
(358, 1, '0.16', '2023-06-20 05:28:59', '2023-06-20 05:28:59'),
(359, 2, '0.18', '2023-06-20 05:56:21', '2023-06-20 05:56:21'),
(360, 3, '0.18', '2023-06-20 08:06:29', '2023-06-20 08:06:29'),
(361, 4, '0.18', '2023-06-20 08:19:39', '2023-06-20 08:19:39'),
(362, 5, '0.18', '2023-07-04 17:15:19', '2023-07-04 17:15:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `abstrak` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jenis_perangkat` varchar(35) NOT NULL,
  `bahasa_pemrograman` varchar(20) NOT NULL,
  `pembimbing_satu` varchar(150) NOT NULL,
  `pembimbing_dua` varchar(150) NOT NULL,
  `penguji_satu` varchar(150) NOT NULL,
  `penguji_dua` varchar(150) NOT NULL,
  `tahun` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`id_skripsi`, `nim`, `nama`, `judul`, `abstrak`, `kategori`, `jenis_perangkat`, `bahasa_pemrograman`, `pembimbing_satu`, `pembimbing_dua`, `penguji_satu`, `penguji_dua`, `tahun`) VALUES
(15, 23108108, 'Ronald  Tualaka', 'Analisis dan Perancangan Sistem Informasi Manajemen Pergudangan', '', 'Sistem Informasi', 'Software', 'Java', '', '', '', '', 2023),
(16, 23109012, 'Ambrosius A. oro gare', 'Analisis Big Data untuk Prediksi Cuaca', '', 'Analisis Data', 'Software', 'Python', '', '', '', '', 2023),
(17, 23111036, 'Juaquim da costa pinto', 'Analisis Big Data untuk Prediksi Perilaku Pengguna E-commerce', '', 'Analisis Data', 'Software', 'Python', '', '', '', '', 2023),
(18, 23111013, 'Adventrihard M.D ully weo', 'Analisis Data Penjualan Menggunakan Metode Regresi Linier', '', 'Analisis Data', 'Software', 'Python', '', '', '', '', 2023),
(19, 23109024, 'Blasius nuhan', 'Analisis Data Penjualan Online untuk Peningkatan Konversi Penjualan', '', 'Analisis Data', 'Software', 'Python', '', '', '', '', 2023),
(20, 23109099, 'Paulus Aprimus nitbani', 'Analisis Klasifikasi Citra Medis dengan Metode Naive Bayes', '', 'Pengolahan Citra', 'Software', 'Python', '', '', '', '', 2023),
(21, 23107093, 'Maria boli', 'Analisis Performa Jaringan 5G untuk Aplikasi Multimedia', '', 'Analisis Data', 'Software', 'PHP', '', '', '', '', 2023),
(22, 23108077, 'Maritilogorium bani', 'Analisis Sentimen Produk Menggunakan Metode Naive Bayes', '', 'Analisis Data', 'Software', 'Python', '', '', '', '', 2023),
(23, 23107081, 'Eusebio da conceicao de waynira', 'Analisis Sentimen Twitter untuk Prediksi Perilaku Konsumen', '', 'Analisis Data', 'Software', 'Python', '', '', '', '', 2023),
(24, 23112012, 'Yuventus Fransiskus leto', 'Analisis Data Sensor untuk Pemantauan Lingkungan dengan Metode Naive Bayes', '', 'Analisis Data', 'Software', 'Python', '', '', '', '', 2023),
(25, 23110102, 'San made suastawan', 'Analisis Data Twitter untuk Prediksi Hasil Pemilihan Umum', '', 'Analisis Data', 'Software', 'Python', '', '', '', '', 2023),
(26, 23110138, 'Yohanes deberito bego', 'Aplikasi Mobile Monitoring Suhu dan Kelembaban pada Ruangan', '', 'Aplikasi Mobile', 'Software', 'Java', '', '', '', '', 2023),
(27, 23110097, 'Rinif viranda haumeny', 'Aplikasi Mobile Pemantauan Kebakaran Hutan dengan Teknologi Sensor', '', 'Aplikasi Mobile', 'Software', 'Java', '', '', '', '', 2023),
(28, 23110101, 'Roy santos bana ', 'Aplikasi Mobile Pemantauan Kesehatan Berbasis Internet of Things', '', 'Aplikasi Mobile', 'Software', 'Java', '', '', '', '', 2023),
(29, 23113035, 'Radegunda bana ', 'Aplikasi Mobile Pemantauan Kualitas Air Sungai', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(30, 23106067, 'Yohanes stiven ndapa', 'Aplikasi Mobile untuk Pemesanan Makanan dengan Metode Hybrid Recommender System', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(31, 23109022, 'Benediktus paskalis bitin ', 'Aplikasi Mobile untuk Pemesanan Tiket Kereta Api', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(32, 23111085, 'Arnaldo paskalis bere', 'Aplikasi Mobile untuk Pemesanan Tiket Pesawat', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(33, 23112031, 'Monika suares ', 'Aplikasi Mobile untuk Pelacakan Pengiriman Barang', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(34, 23111081, 'Juliaberto dosreis', 'Aplikasi Mobile untuk Pencarian Tempat Parkir', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(35, 23110083, 'Muhamad wawan suwandi ', 'Deteksi Anomali pada Data Jaringan Menggunakan Algoritma Naive Bayes', '', 'Keamanan Informasi', 'Hardware', 'PHP', '', '', '', '', 2023),
(36, 23111012, 'Oseias octereni Ximenes baros', 'Deteksi Intrusi pada Jaringan Komputer Menggunakan Naive Bayes', '', 'Keamanan Informasi', 'Hardware', 'PHP', '', '', '', '', 2023),
(37, 23111098, 'Yohanes klaudius ria biru', 'Deteksi Serangan DDoS pada Jaringan Komputer Menggunakan Naive Bayes', '', 'Keamanan Informasi', 'Hardware', 'PHP', '', '', '', '', 2023),
(38, 23113003, 'Christianto dedy diong', 'Deteksi Spam Email dengan Algoritma Naive Bayes', '', 'Keamanan Informasi', 'Hardware', 'PHP', '', '', '', '', 2023),
(39, 23111011, 'Christoforus M.A baga', 'Implementasi Algoritma Genetika dalam Optimasi Rute Distribusi Barang', '', 'Optimasi', 'Software', 'PHP', '', '', '', '', 2023),
(40, 23112043, 'Arza andronikus bano', 'Implementasi Teknologi Blockchain dalam Sistem Manajemen Logistik', '', 'Optimasi', 'Software', 'Solidity', '', '', '', '', 2023),
(41, 23111029, 'Maria Christine L wuran ', 'Perancangan Aplikasi Mobile Pemantau Kualitas Air Sungai', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(42, 23111071, 'Yuventus harianto bere eli ', 'Perancangan Aplikasi Mobile untuk Pemesanan Tiket Online', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(43, 23111066, 'Ariel laba ', 'Perancangan Aplikasi Mobile untuk Pemesanan Tiket Pesawat', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(44, 23111059, 'Oscar lopes ', 'Perancangan Aplikasi Mobile untuk Pencarian Tempat Parkir', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(45, 23112032, 'Yohanes renoldus nua ', 'Perancangan Aplikasi Mobile untuk Pelacakan Pengiriman Barang', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(46, 23113017, 'Maria yunita hoar ', 'Perancangan Aplikasi Mobile untuk Monitoring Konsumsi Energi Listrik', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(47, 23112091, 'Asaria s langasa', 'Perancangan Aplikasi Mobile untuk Pelaporan Kejadian Kriminal', '', 'Aplikasi Mobile', 'Software', 'PHP', '', '', '', '', 2023),
(48, 23113090, 'Tiffany a antonius ', 'Perancangan Sistem Informasi Akademik dengan Fitur Pembayaran Online', '', 'Sistem Informasi', 'Software', 'Java', '', '', '', '', 2023),
(49, 23113062, 'Osvaldus Yusditira R. Akoit', 'Perancangan Sistem Informasi Geografis Berbasis Mobile untuk Pemetaan Bencana', '', 'Sistem Informasi', 'Software', 'Java', '', '', '', '', 2023),
(50, 23112104, 'Kritoforus m suku', 'Perancangan Sistem Informasi Geografis untuk Pemetaan Wisata Kota', '', 'Sistem Informasi', 'Software', 'Java', '', '', '', '', 2023),
(51, 23114068, 'Olganius kepa sena', 'Perancangan Sistem Informasi Manajemen Kepegawaian dengan Metode Decision Tree', '', 'Sistem Informasi', 'Software', 'Java', '', '', '', '', 2023),
(52, 23113025, 'Hendrikus b nenomnua ', 'Perancangan Sistem Informasi Manajemen Manajemen Penjualan dengan Metode Fuzzy', '', 'Sistem Informasi', 'Software', 'Java', '', '', '', '', 2023),
(53, 23113079, 'Eric septian kristanto dasilva', 'Perancangan Sistem Informasi Manajemen Pergudangan', '', 'Sistem Informasi', 'Software', 'Java', '', '', '', '', 2023),
(54, 23113109, 'Indra evalindo tamoes ', 'Perancangan Sistem Informasi Manajemen Proyek dengan Metode Agile', '', 'Sistem Informasi', 'Software', 'Java', '', '', '', '', 2023),
(55, 23115011, 'Estefanus ulu bere ', 'Perancangan Sistem Informasi Manajemen Restoran dengan Fitur Reservasi Online', '', 'Sistem Informasi', 'Software', 'Java', '', '', '', '', 2023),
(56, 23113103, 'Alfeu santo viktorino ', 'Perancangan Sistem Informasi Manajemen Keuangan dengan Metode Analisis Fundamental', '', 'Sistem Informasi', 'Software', 'Java', '', '', '', '', 2023),
(57, 23113105, 'Michael  minggus', 'Pengembangan Aplikasi E-learning dengan Fitur Chatbot', '', 'Aplikasi Mobile', 'Software', 'Java', '', '', '', '', 2023),
(58, 23112069, 'Nourberth andry yusuf maga', 'Pengembangan Aplikasi Mobile untuk Pelaporan Kejadian Kriminal', '', 'Aplikasi Mobile', 'Software', 'Java', '', '', '', '', 2023),
(59, 23114072, 'Azaryos y topan ', 'Pengembangan Aplikasi Mobile untuk Pemesanan Makanan dengan Metode Collaborative Filtering', '', 'Aplikasi Mobile', 'Software', 'Java', '', '', '', '', 2023),
(60, 23113049, 'Ayub umbu ngedo ndamalero', 'Pengembangan Aplikasi Mobile untuk Pelacakan Pengiriman Barang', '', 'Aplikasi Mobile', 'Software', 'Java', '', '', '', '', 2023),
(61, 23114096, 'Laura Felisa mangngi', 'Pengembangan Aplikasi Mobile untuk Pemesanan Tiket Pesawat', '', 'Aplikasi Mobile', 'Software', 'Java', '', '', '', '', 2023),
(62, 23113047, 'Ambrosius suni tnopo', 'Pengembangan Aplikasi Mobile untuk Monitoring Konsumsi Energi Listrik', '', 'Aplikasi Mobile', 'Software', 'Java', '', '', '', '', 2023),
(63, 23114115, 'Martinus robinson sumitro', 'Pengembangan Aplikasi Mobile untuk Monitoring Konsumsi Energi Listrik', '', 'Aplikasi Mobile', 'Software', 'Java', '', '', '', '', 2023),
(64, 23114065, 'Karolina yunita solle ', 'Pengembangan Aplikasi Mobile untuk Pencarian Tempat Parkir', '', 'Aplikasi Mobile', 'Software', 'Java', '', '', '', '', 2023),
(65, 23114077, 'Mario cristyanto lelang aya', 'Penerapan Metode Naive Bayes untuk Analisis Sentimen pada Aplikasi Media Sosial Mobile', 'tes', 'Analisis Data', 'Software', 'Python', 'Paulina Aliandu, ST,M.Cs', 'Emiliana Meolbatak,ST.MT', 'Patrisius Batarius,ST,MT', 'Frengky Teddy, ST,MT', 2023),
(66, 23118036, 'Arlan Butar Butar', 'tes', 'tes', 'Sistem Informasi', 'Software', 'PHP', 'Emiliana Meolbatak,ST.MT', 'Ignatius P.A.N. Samane S.Si,M.Eng', 'Sisilia D.B Mau,S.Kom,MT', 'Frengky Teddy, ST,MT', 2023),
(67, 24224, 'tes', 'ege', 'ee', 'Sistem Informasi', 'Hardware', 'Python', 'Paulus irsan dardana ST,MT', 'Yulianti P, Bria Seran ST,MM', 'Emanuel jando,S.Kom,MTI', 'Natalia M.R. Mamulak, ST,MM', 2023),
(68, 23114025, 'Amandus juan diego mite', 'Analisis dan Implementasi Sistem Informasi Penjualan Online', 'tes', 'Sistem Informasi', 'Software', 'PHP', 'Donatus J. Manehat, S.Si,M.Kom', 'Frengky Teddy, ST,MT', 'Sisilia D.B Mau,S.Kom,MT', 'Frengky Teddy, ST,MT', 2023),
(69, 123456789, '123456789', '123456789', '123456789', 'Sistem Informasi', 'Software', 'PHP', 'Emiliana Meolbatak,ST.MT', 'Ignatius P.A.N. Samane S.Si,M.Eng', 'Patrisius Batarius,ST,MT', 'Natalia M.R. Mamulak, ST,MM', 2023);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testing`
--

CREATE TABLE `testing` (
  `id_testing` int(11) NOT NULL,
  `id_skripsi` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testing`
--

INSERT INTO `testing` (`id_testing`, `id_skripsi`, `id_kelas`) VALUES
(1, 65, 1),
(2, 66, 1),
(3, 67, 1),
(4, 68, 1),
(5, 69, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
--

CREATE TABLE `training` (
  `id_training` int(11) NOT NULL,
  `id_skripsi` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `training`
--

INSERT INTO `training` (`id_training`, `id_skripsi`, `id_kelas`) VALUES
(4, 15, 2),
(5, 16, 1),
(6, 17, 1),
(7, 18, 1),
(8, 19, 1),
(9, 20, 1),
(10, 21, 2),
(11, 22, 1),
(12, 23, 1),
(13, 24, 1),
(14, 25, 1),
(15, 26, 2),
(16, 27, 2),
(17, 28, 2),
(18, 29, 2),
(19, 30, 2),
(20, 31, 2),
(21, 32, 2),
(22, 33, 2),
(23, 34, 2),
(24, 35, 2),
(25, 36, 2),
(26, 37, 2),
(27, 38, 2),
(28, 39, 2),
(29, 40, 2),
(30, 41, 2),
(31, 42, 2),
(32, 43, 2),
(33, 44, 2),
(34, 45, 2),
(35, 46, 2),
(36, 47, 2),
(37, 48, 2),
(38, 49, 2),
(39, 50, 2),
(40, 51, 2),
(41, 52, 2),
(42, 53, 2),
(43, 54, 2),
(44, 55, 2),
(45, 56, 2),
(46, 57, 2),
(47, 58, 2),
(48, 59, 2),
(49, 60, 2),
(50, 61, 2),
(51, 62, 2),
(52, 63, 2),
(53, 64, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) DEFAULT 2,
  `id_status` int(11) NOT NULL DEFAULT 2,
  `en_user` varchar(75) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `id_status`, `en_user`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', 'admin', 'admin@gmail.com', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', '2023-03-27 15:14:01', '2023-03-27 15:14:01');

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
(2, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`),
  ADD KEY `id_testing` (`id_testing`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi`);

--
-- Indeks untuk tabel `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id_testing`),
  ADD KEY `id_skripsi` (`id_skripsi`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_training`),
  ADD KEY `id_skripsi` (`id_skripsi`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id_skripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `testing`
--
ALTER TABLE `testing`
  MODIFY `id_testing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `training`
--
ALTER TABLE `training`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `klasifikasi_ibfk_1` FOREIGN KEY (`id_testing`) REFERENCES `testing` (`id_testing`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `testing`
--
ALTER TABLE `testing`
  ADD CONSTRAINT `testing_ibfk_1` FOREIGN KEY (`id_skripsi`) REFERENCES `skripsi` (`id_skripsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testing_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`id_skripsi`) REFERENCES `skripsi` (`id_skripsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `training_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
