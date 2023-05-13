-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2023 pada 09.59
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
  `nim` int(11) NOT NULL,
  `nama_mahasiswa` varchar(75) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `abstrak` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pembimbing_satu` varchar(150) NOT NULL,
  `pembimbing_dua` varchar(150) NOT NULL,
  `penguji_satu` varchar(150) NOT NULL,
  `penguji_dua` varchar(150) NOT NULL,
  `tahun` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_skripsi`
--

INSERT INTO `data_skripsi` (`id_skripsi`, `nim`, `nama_mahasiswa`, `judul`, `abstrak`, `kategori`, `pembimbing_satu`, `pembimbing_dua`, `penguji_satu`, `penguji_dua`, `tahun`) VALUES
(2, 23108108, 'Ronald  Tualaka', 'Sistem pendukung keputusan penetuan siswa penerima beasiswa di sman 2 kupang', 'Kebutuhan terbsar teknologi informasi sekarang ini adalah kebutuhan akan sistem informasi. Berkembangnya teknologi informasi dan sistem informasi yang demikian pesat di era globalisasi sekarang ini telah membuat hampir semua aspek kehidupan tidak dapat terhindar dari penggunaan perangkat komputer. Penggunaan komputer yang umum adalah penggunaan komputer di suatu sekolah. Sekolah Menengah Atas Negeri (SMAN) 2 Kota Kupang merupakan sekolah negeri yang berada di bawah Dinas Pendidikan Kota Kupang. Seiring dengan banyaknya  siswa kurang mampu dan siswa berprestasi , maka diadakan beasiswa oleh Dinas Pendidikan. Pembagian beasiswa dilakukan untuk membantu siswa yang tidak mampu ataupun berprestasi selama menempuh studinya. Maka diperlukan sebuah sistem pendukung keputusan yang mampu memberikan prioritas yang sesuai dengan keinginan.\n Berdasarkan uraian d atas maka dibuat sebuah Sistem pendukung keputusan dalam menggunakan metode penelitian yang digunakan dalam penelitian itu adalah  metode waterfall dengan tahap permulaan digunakan beberapa teknik pengumpulan data seperti, observasi, wawancara dan studi literatur. Pengembangan sistem ini menggunakan metode SAW (Simple additive weighting) dan diimplementasikan menggunakan bahasa pemograman PHP ( Personal home page) dengan menggunakan database MySQL ( My Sructure Query Language ).Hasil akhir penelitian ini adalah sistem pendukung keputusan  penerimaan beasiswa menggunakan metode SAW yang dibangun mampu memberika prioritas bagi pegawai tata usaha dalam pengambilan keputusan penerimaan beasiswa.', 'Software', 'Paulus irsan dardana ST,MT', 'Yulianti P, Bria Seran ST,MM', 'Donatus J. Manehat, S.Si,M.Kom', 'Natalia M.R. Mamulak, ST,MM', 2016),
(3, 23109012, 'Ambrosius A. oro gare', 'Sistem pendukung keputusan untuk proses kenaikan jabatan pada kantor dinas pendidikan pemuda dan ola', 'Kenaikan jabatan merupakan suatu faktor yang sangat penting bagi perencanaan karir pegawai dan juga untuk meremajakan suatu posisi jabatan agar diduduki oleh seseorang yang mempunyai kriteria-kriteria yang cocok. Kenaikan jabatan dan perencanaan karir pada Dinas Pendidikan Pemuda dan Olahraga tidak mempertimbangkan faktor pengetahuan, ketrampilan, sikap dan perilaku yang dimiliki pegawai. \nSistem pendukung keputusan menjadi suatu alternatif yang dipakai untuk mendukung pengambilan keputusan proses kenaikan jabatan pada dinas PPO kabupaten sikks dengan menggunakan metode pencocokan profile ', 'Software', 'Paulina Aliandu, ST,M.Cs', 'Natalia M.R. Mamulak, ST,MM', 'Sisilia D.B Mau,S.Kom,MT', 'Frengky Teddy, ST,MT', 2016),
(4, 23111039, 'Maryon yahmin helmi tuy', 'Sistem informasi barang pada pt citra van titipan kilat kupang berbasis web', 'Pt citra van titipan kilat (tiki) kupang merupakan sebuah perusahaan yang bergerak di bidang jasa pengiriman barang baik domestik maupun mancanegara. Perusahaan tersebut melakukan proses bisnisnya seringkali terjadi beberapa masalah diantaranya terjadi antrian saat melakukan registrasi pengiriman dan keterlambatan dalam pengambilan keputusan untuk mengoptimalkan pelayanan tergadap pelanggan. Metode yang digunakan dalam membangun sistem ini adalah metode system development life cycle (sdlc). Teknik pengembangan sistem model waterfakk terdri dari tahapan planing, analisis, desain.nimplementasi, dan test. Dengan alat bantu pengembangan sistem berupa diagram konteks, DFD, dan ERD. Sedangkan pembuatan perangkat lunak menggunakan PHP dan Macromedia Dreamweaver dan database menggunakan mysql. Hasil dari pembangunan sistem tersebut diperoleh sistem informasi pengiriman barang berbasis website sebagai salah satu alternatif tambahan agar menampilkan informasi dan status pengiriman.', 'Software', 'Emanuel jando,S.Kom,MTI', 'Emiliana Meolbatak,ST.MT', 'Paulina Aliandu, ST,M.Cs', 'Natalia M.R. Mamulak, ST,MM', 2016),
(5, 23111036, 'Juaquim da costa pinto', 'Perancangan implementasi website tim penggerak pemberdayaan dan kesejahtraann keluarga kota kupang', 'Tim pengerak pemberdayaan dan kesejahtraan keluarga kota kupang (tppkk) merupakan mitra kerja pemerintah kota kupang berfungsi sebagai fasilitator, perencana, pelaksana, pengendali dan penggerak demi terlaksananya program kerja PPKK Kota Kupang. Salah satu cara yang sering digunakanuntuk memberikan informasi kepada masyarakat tentang jadwal kegiatab TPPKK Kota Kupang yaitu dengan cara memberikan surat yang diantar pegawai langsung ke masyarakat di RT, RW maupun di kelurahan. Kendala yang dirasakan oleh masyarakat saat ini adalah sulitnya untuk mendapatkan informasi mengenai TPPKK, karena surat yang diantar pegawai TPPKK sering tidak sampai tujuan. Oleh karena itu dipelukan sebuah sistem informasi untuk mengatasi permasalahan di atas, maka akan dirancang bangun suatu “perancangan dan impllementasi website tim penggerak pemberdayaan dan kesejahteraan keluarga kota kupang”. Metode yang digunakan untuk perancangan sistem ini yaitu Unified process (UP) serta bahasa pemograman yang digunakan yaitu php dan menggunakan mysql sebagai databasenya. Hasil yang diharapkan dari sistem ini adalah untuk meningkatkan pelayanan dalam memberikan informasi mengenai data-data jadwal kegiatan bagi masyarakat dan pihak-pihak yang membutuhkan informasi dari TPPKK.', 'Mobile', 'Donatus J. Manehat, S.Si,M.Kom', 'rengky Teddy, ST,MT', 'Emanuel jando,S.Kom,MTI', 'Emerensiana Ngaga,ST.MT', 2016),
(6, 23111010, 'Adventrihard M.D ully weo', 'Pengenalan atribut pramuka serta sandi morse dan sandi semaphore berbasis multimedia pada siswa sd i', 'Permasalahan umum yang dihadapi oleh anggota pramuka saat ini yaitu kurang memahami arti dari masing-masing atribut serta sandi morse dan semaphore  yang ada dalam kegiatan kepramukaan. Untuk menjawab permasalahan yang sedang dihadapi saat ini maka perlu dikembangkan media pembelajaran ”Pengenalam Atribut Pramuka Serta Sandi Morse dan Sandi Semaphore Berbasis Multimedia Pada Siswa SD Inpres Oepoi Kota Kupang” yang bertujuan agar setiap calon ataupun anggota pramuka dapat mengetahui arti dari setiap atribut-atribut serta sandi morse dan sandi semaphore yang ada pada kegiatan kepramukaan. Untuk menyelesaikan permasalahan yang ada maka motode yang digunakan dalam penelitian ini adalah metode pengembangan multimedia. Metode tersebut meliputi tahap concept (pengonsepan), design (perancangan), material collecting (pengumpulan bahan), assembly (pembuatan), testing (pengujian),  distribution (distribusi). Bahasa pemograman yang digunakan untuk mengembangkan multimedia pengenalan atribut ini menggunakan Macromedia Flash 8.\nHasi akhir yang diperoleh dari aplikasi ini yakni dapat membantu anggota pramuka siaga dalam mempelajari arti masing-masing atribut pramuka siaga serta sandi morse dan sandi semaphore dalam kegiatan kepramukaan. Hal ini dapat dilihat dari jawaban responden yang terdiri dari anggota pramuka siaga dan pembina pramuka terhadap pengujian aplikasi tersebut yaitu sebesar 84% responden memberikan penilaian “Baik” terhadap aplikasi tersebut dan hanya 16%responden yang memberikan menilaian “Kurang” terhadap aplikasi tersebut, sehingga tidak menutup kemungkinan bahwa aplikasi ini dapat diterapkan dalam pembelajaran kepramukaan siaga. ', 'Mobile', 'Yulianti P. bria&lt;ST.MT', 'Frengky Teddy, ST,MT', 'Paulina Aliandu, ST,M.Cs', 'Paulus irsan dardana ST,MT', 2016),
(7, 23109024, 'Blasius nuhan', 'Aplikasi pengolahan data pajak rumah makan pada dinas pendapatan pengelolohan keuangan dan aset daer', 'Pendapatan Asli Daerah (PAD) adalah pendapatan yang diperoleh daerah yang dipungut berdasarkan peraturan daerah sesuai dengan peraturan perundang-undangan. Pajak rumah merupakan salah satu PAD untuk daerah. Pehitungan pajak rumah makan merupakan salah satu fator yang sangat penting agar dapat tercapainya suatu perhitungan yang efisiensi dan efektif, sehingga memberikan informasi yang akurat kepada pemilik rumah makan. Perhitungan pajak rumah makan pada Dinas Pendapatan, Pengolahan Keuangan dan Aset Daerah Kabupaten Flores Timus belumoptimal karena masih menggunakan sistem manual sehingga berdampak pada keterlambatan pemberi informasu kepada pemilik rumah makan.\r\nSolusi dari permasalahan di atas adalah perlu dibangun sebuah aplikasi perhitungan pajak rumah makan untuk mendukung perhitungan pajak pada Dinas Pendapatan, Pengelolaan Keuangan dan Aset Daerah Kabupaten Flores Timur. Pengembangan perangkat lunak ini menggunakan model waterfall dengan bahasa pemogramannPHP dan Mysql sebagai database-nya.\r\nAplikasi perhitungan pajak rumah makan ini dapat menambah kinerja kerja yang lebih baik dan membantu memudahkan para pemilik rumah makan untuk memperolehh informasu besarnya pajak yang harus dibayar.', 'Mobile', 'Sisilia D.B Mau,S.Kom,MT', 'Ignatius P.A.N. Samane S.Si,M.Eng', 'Donatus J. Manehat, S.Si,M.Kom', 'Paulina Aliandu, ST,M.Cs', 2016),
(8, 23109099, 'Paulus aprimus nitbani', 'Rancang bangun pemilihan ketua himpunan mahasiswa program studi (hmps) berbasis web', 'Himpunan Mahasiswa Program Studi (HMPS) adalah organisasi kemanusiaan yang berfungsi merencanakan dan melaksanakan kegiatan ekstrakulikuler di tingkat jurusan. Oleh sebab itu semua program kerja yang ada didalamnya harus benar-benar terealisasi dan dikembangkan secara nyata dan mnyeuruh. Salayh satu program kerja HMPS adalah melakukan pemilihan kepengurusan HMPS. Dalam kurun waktu satu tahun selalu diadakan proses pemilihan untuk menggantikan ketua HMPS.  Kendala yang biasa dihadapi pada saat pemilihan adalah kurangnya partisipasi mahasiswa untuk datang mengikuti proses pemilihan Ketua HMPS sehingga sangat berpengaruh pada saat pemilihan. Berdasarkan kendala yang terjadi, maka dibuatlah aplikasi pemilihan berbasis Web yang bisa membantu mahasiswa yang tidak bisa berpartisipasi langsung untuk memilih ketua HMPS secara cepat, efektif dan efisien.\r\nAplikasi Pemilihan Ketua Himpunan Program Studi(HMPS) ini menggunakan tools  pemograman PHP dengan database MySQL dan metode waterfall.\r\nKeunggulan yang dimilik oleh sistem ini adalah pembauatan Aplikasi pemilihan ketua HMPS memberikan kemudahan bagi mahasiswa untuk memilih ketua HMPS, menambah minat mahasiswa untuk berpartisipasi dalam proses pemilihan ketua HMPS, menghemt biaya, mempermudah dan mempercepat proses pemilihan ketua HMPS.', 'Mobile', 'Donatus J. Manehat, S.Si,M.Kom', 'Ignatius P.A.N. Samane S.Si,M.Eng', 'Emiliana Meolbatak,ST.MT', 'Natalia M.R. Mamulak, ST,MM', 2016),
(9, 23107093, 'Maria boli', 'Sistem informasi pengiriman barang pada pt dehla lontar exspres berbasis web', 'PT. delha Lontar Express Kupang merupakan perusahaan yang bergerak dibidang pengiriman barang melalui jalur darat, lau dan udara di seluruh Nusa Tenggara Timur (NTT). Saat ini proses pengiriman barang yang dilakukan sudah terkomputerisasi tetapi belum dapat menampilkan informasi secara detail yang dibutuhkan user seperti tidak adanya penentuan harga pengiriman barang dan juga tracking pengiriman barang. Demi meningkatkan kinerja perusahaan, PT. Delha Lontar Express membutuhkan aplikasi  sistem informasi berbasis web sehingga memudahkan pelanggan untuk melakukan pengiriman ataupun pengecekan status barang tanpa harus datang ke tempat pengiriman barang tersebut.\r\nDalam penyelesaian masalah ini metode yang digunakan adalah model Clasic Life Cycle(waterfall Model) dengan tahapan pengembangan antara lain, terdiri dari:tHp persiapan, tahap analisis, desain sistem, pengkodean (coding), tahap pengujian(testing). Sedangka pembuatan aplikasinya menggunakan database MySql dan bahasa pemograman PHP yang dapat membantu mengatasi kelemahan pada sistem.\r\nSistem akan menyimpan data pengiriman dan penerimaan barang, selain itu sistem ini akan dibuat dalam bentu website, sehingga data dan informasi yang dibutuhkan dapat diperoleh dengan cepat. Kemampuan dan kehandalan sistem ini, dapat diakses dengan mudah karena bersifat online.', 'Mobile', 'Emiliana Meolbatak,ST.MT', 'Natalia M.R. Mamulak, ST,MM', 'Sisilia D.B Mau,S.Kom,MT', 'Emerensiana Ngaga,ST.MT', 2016),
(10, 23107081, 'Eusebio da conceicao de waynira', 'Pengembangan aplikasi surat keterangan catatan kepolisisan (skck) pada kantor kepolisian resort kupa', 'Perkembangan teknologi yang semakin maju pada saat ini, memacu manusia untuk berpikir lebih maju pula. Teknologi Informasi nerupakan teknologi yang dibangun dengan basis utama teknologi komputer. Untuk mempermudah kegiatan Polisi Resort Kupang Kota (POLRESTA) maka menerbitkan Surat Keterangan Catatan Kepolisian (SKCK) lebih cepat, serta dapat menghasilkan laporan yang valid dan terjamin. \r\nTujuan dari penelitian ini yaitu merancang dan membangun aplikasi penerbitan SKCK yang dapat meningkatkan kinerja para staf bagian pembuatan SKCK untuk melayani masyarakat yang ingin membuat SKCK, sehingga masyarakat pun akan merasa lebih mudah, nyaman dan dapat menghemat waktu. \r\nMetode yang digunakan dalam penelitian ini adalah linear sequential model, merupakan suatu metodologi pengembangan perangkat yang melakukan pendekatan secara sistemmatis dan urutan mulai dari level kebutuhan sistem ke tahap analisi, desain, coding, dan pengujian atau testing. \r\nHasil dari aplikasi yang dikembangkan ini menghasilkan laporan erupa SKCK dan register SKCK berdasarkan Bulan dan Tahun, serta mempermudah pihak operator pada Kepolisian Resort Kupang Kota khususnya pada bagian intelkam untuk membuat SKCK.', 'Software', 'Paulina Aliandu, ST,M.Cs', 'Ignatius P.A.N. Samane S.Si,M.Eng', 'Emanuel jando,S.Kom,MTI', 'Patrisius Batarius,ST,MT', 2016),
(11, 23112012, 'Yuventus fransiskus leto', 'Aplikasi pengenalan fasilitas hotel pelangi kupang berbasis multimedia', 'Hotel pelangi merupakan salah satu hotel di kota kupang yang sangat ramai oleh banyaknya pengunjung, hal menjadi kendala bagi resepsionis yang hanya berjumlah 3 orang dan kurangnya alat bantu pengenalan informasi mengenai fasilitas-fasilitas hotel, sehingga resepaionis berperan secara langsung dalam mengantar pengunjung untuk melihat fasilitas hotel. Metode yang digunakan dalam penelitian ini adalah tahapan pengembangan multimedia dengan langkah-langkah berupa: concept, design, material collection, assembly, testing dan distribuion. Aplikasi yang dihasilkan bisa menjadi media promosi hotel dan alat bantu bagi resepsionis untuk mengenalkan fasilitas yang tersedia pada hotel sehingga menjadi lebih interaktif dan efiesien tanpa harus mengantar secara langsung untuk melihat fasilitas.', 'Software', 'Emiliana Meolbatak,ST.MT', 'Ignatius P.A.N. Samane S.Si,M.Eng', 'Patrisius Batarius,ST,MT', 'Emerensiana Ngaga,ST.MT', 2017),
(12, 23110102, 'San made suastawan', 'Aplikasi multimedia profil universitas katolik widya mandira kupang', 'Penyampaian informasi profil Universitas Katolik Widya mandira selama ini masih konvensional, kurang menarik minat masyarakat dan penyampaian informasi membutuhkan waktu yang lama, sehingga kurang efektif. Maka dibuatkanlah sebuah aplikasi multimedia profil Universitas Katolik Widya Mandira yang merupakan sebuah media penyimpanan informasi secara visual yangberada di dalamnya akan  berisi informasi mengenai visi dan misi dari universitas juga program studi yang ada pada universitas dengan animasi yang menarik sehingga menambah daya tarik calon mahasiswauntuk mendaftar pada Universitas Katolik Widya Mandira dan juga sebagai pelayanan ata jasa dari universitas katolik widya mandira. Multimedia yang dibuat menggunakan metodelogi pengembangan multimedia versi Sutopo-Luther yang meliputi: concept,design,material collection,assembly, testing, dan distribution. Hasil dari perancangan ini adalah menghasilkan sebuah aplikasi multimedia yang berisi animasi profil, fakultas dan program studi, unit-unit pembantu, dan informasi kontak universitas katolik widya mandira kupang. ', 'Software', 'Emiliana Meolbatak,ST.MT', 'Yulianti P. Bria,ST,MT', 'Patrisius Batarius,ST,MT', 'Sisilia D.B Mau,S.Kom,MT', 2017),
(13, 23110138, 'Yohanes deberito beggo', 'Media pembelajaran interaktif latihan soal ujian nasional mata pelajaran ipa untuk anak sekolah dasa', 'Latihan soal dan pebahasan materi ujian nasional penting dilaksanakan untuk membantu dan melatih belajar murid dalam mempersiapkan diri menghadapi un. Berdasarkan data yang diambil pada SDI Perumnas 2 kupang, terdapat beberapa masalah yang dialami murid, yaitu menurunya nilai UN murid pada mata pelajaran IPA dan meningkatnya rasa jenuh muris saat mengerjakan latihan soal UN. Dengan adanya multimedia pembelajaran interaktif latihan soal UN mampu mengatasi permasalahan belajar yang dialami murid SDI Perumnas 2 Kupang. Metode yang digunakan adalah model pengembangan meltimedia dengan menetapkan tahapan-tahapan sebagai berikut: analisis data, menentukan konsep desain, melakukan pengembangan, mengimplementasikan hasil desain, malakukan pengujian dan mengevaluasi hasil dengan tols yang diimplementasikan menggunakan aplikasi macromedia flash 8. Hasil dari penelitian ini adalah terciptanya suatu media pembelajaran latihan soal UN berbasi multimedia, yang didalamnya terdapat animasi, teks, dan gambar yang dapat meningkatkan pola pikir dari murid sehingga dapat nerpikir lebih kritis dan mandiri dalam mengikuti UN.', 'Software', 'Emiliana Meolbatak,ST.MT', 'Sisilia D.B Mau,S.Kom,MT', 'Patrisius Batarius,ST,MT', 'Natalia M.R. Mamulak, ST,MM', 2017),
(14, 23110097, 'Rinif viranda haumeny', 'Desain dan implementasi multimedia dalam pengenalan profesi pekerjaan pada taman kanak-kanak tunas h', 'Taman Kanak-Kanak Tunas Harapan Emaus Liliba Kupang merupakan Leembaga Yayasan Kristen. Kurikulum yang digunakan adalah kurikulum 2013 yakni penggunaan media belajar lebih dominan dalam proses pembelajaran salah satu faktor penyebab rendahnya hasil belajar diduga karena kurangnya penggunaan mendia dalam proses belajar mengajar dan keterbatasan media belajar yang hanya menggunakan poster, foto, dan gambar sehingga belajar siswa menjadi monoton dan kurang menarik. Oleh karena itu perlu dibuat desain dan implementasi multimedia pembelajaran interaktif pengenalan profesi pekerjaan. Metode perancangan yang digunakan adalah model pengembangan multimedia dengan menetapkan langkah-lanhkah yang harus diikuti untuk menghasilkan produk yang berupa rancangan aplikasi multimedia. Metode perancangan meliputi : konsep aplikasi, perancangan aplikasi, pengumpulan data, pembuatan, pengujian, dan distribusi. Aplikasi yang dibangun diimplementasikan menggunakan adobe flash cs6. Pembuatan media pembelajran yang lebih interaktif akan lebih menarik minat belajar siswa sehingga dapat meningkatkan pengetahuan siswa tentang pengenalan profesi pekerjaan serta fungsinya.', 'Mobile', 'Yulianti P. Bria,ST,MT', 'Ignatius P.A.N. Samane S.Si,M.Eng', 'Emiliana Meolbatak,ST.MT', 'Frengky Teddy, ST,MT', 2017);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Software'),
(2, 'Mobile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `id_skripsi` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `id_skripsi`, `kategori`, `created_at`, `updated_at`) VALUES
(334, 2, 'Mobile', '2023-05-11 11:51:09', '2023-05-11 11:51:09'),
(335, 3, 'Software', '2023-05-11 11:51:10', '2023-05-11 11:51:10'),
(336, 4, 'Software', '2023-05-11 11:51:10', '2023-05-11 11:51:10'),
(337, 5, 'Software', '2023-05-11 11:51:10', '2023-05-11 11:51:10'),
(338, 6, 'Software', '2023-05-11 11:51:10', '2023-05-11 11:51:10'),
(339, 7, 'Software', '2023-05-11 11:51:10', '2023-05-11 11:51:10'),
(340, 8, 'Software', '2023-05-11 11:51:10', '2023-05-11 11:51:10'),
(341, 9, 'Software', '2023-05-11 11:51:10', '2023-05-11 11:51:10'),
(342, 10, 'Mobile', '2023-05-11 11:51:10', '2023-05-11 11:51:10'),
(343, 11, 'Mobile', '2023-05-11 12:18:16', '2023-05-11 12:18:16'),
(344, 12, 'Mobile', '2023-05-11 12:18:16', '2023-05-11 12:18:16'),
(345, 13, 'Mobile', '2023-05-11 12:18:16', '2023-05-11 12:18:16'),
(346, 14, 'Mobile', '2023-05-11 12:18:17', '2023-05-11 12:18:17');

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
  ADD KEY `klasifikasi_ibfk_2` (`id_skripsi`),
  ADD KEY `klasifikasi_ibfk_1` (`kategori`);

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
-- AUTO_INCREMENT untuk tabel `data_skripsi`
--
ALTER TABLE `data_skripsi`
  MODIFY `id_skripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

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
  ADD CONSTRAINT `klasifikasi_ibfk_2` FOREIGN KEY (`id_skripsi`) REFERENCES `data_skripsi` (`id_skripsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
