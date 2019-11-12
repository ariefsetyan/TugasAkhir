-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2019 pada 01.56
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumens`
--

CREATE TABLE `dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dokumen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kurun_waktu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_perkembangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_arsip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_takah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_dok_jra` bigint(20) UNSIGNED NOT NULL,
  `tgl_upload` date DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi_dokumen` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumens`
--

INSERT INTO `dokumens` (`id`, `nama_dokumen`, `diskripsi`, `kurun_waktu`, `tingkat_perkembangan`, `media_arsip`, `kondisi`, `file`, `no_takah`, `jenis_dok_jra`, `tgl_upload`, `status`, `kondisi_dokumen`, `created_at`, `updated_at`) VALUES
(1, 'arief setya', 'coba', '2019', 'Asli', 'Kertas', 'baik', '5d9dab1967f6a.pdf', '1', 1, '2019-10-21', 'aktif', 0, '2019-10-09 02:40:44', '2019-10-09 02:40:44'),
(2, 'arief setyanungata', 'coba', '2019', 'Asli', 'Kertas', 'baik', '5d9dacb96023f.pdf', '1', 1, '2019-10-21', 'aktif', 0, '2019-10-09 02:47:40', '2019-10-09 02:47:40'),
(3, 'arief setyanungata', 'coba', '2019', 'Asli', 'Kertas', 'baik', '5d9dad1e792c1.pdf', '1', 1, '2018-10-28', 'inaktif', 0, '2018-10-09 02:49:21', '2018-10-09 02:49:21'),
(4, 'surat peringatan', 'asdadacads', '2016', 'Asli', 'Kertas', 'baik', '5db683c5e6b3f.pdf', '1', 1, '2016-10-28', 'musnah', 2, '2019-10-27 22:59:37', '2019-10-27 22:59:37'),
(5, 'arief setya', 'ssss', '2016', 'Asli', 'Asli', 'baik', '5db7c8c6417a0.pdf', '1', 1, '2016-10-29', 'ditinjau ulang', 2, '2019-10-28 22:06:17', '2019-10-28 22:06:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_dokumens`
--

CREATE TABLE `jenis_dokumens` (
  `no_takah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lokasi` bigint(20) UNSIGNED NOT NULL,
  `kode_jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_dokumens`
--

INSERT INTO `jenis_dokumens` (`no_takah`, `id_lokasi`, `kode_jenis`, `nama_jenis`, `created_at`, `updated_at`) VALUES
('1', 1, 'PR.01.00', 'arief setya', '2019-10-09 02:26:41', '2019-10-09 02:26:41'),
('2', 1, 'PR.01.01', 'setya', '2019-10-09 02:31:33', '2019-10-09 02:31:33'),
('3', 4, 'PR.01.00', 'arief setyaugraha', '2019-10-13 20:37:17', '2019-10-13 20:37:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_r_a_s`
--

CREATE TABLE `j_r_a_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_jenis_jra` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inaktif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat_dokumen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `j_r_a_s`
--

INSERT INTO `j_r_a_s` (`id`, `nm_jenis_jra`, `aktif`, `inaktif`, `sifat_dokumen`, `kode_jenis`, `created_at`, `updated_at`) VALUES
(1, 'setya arief', '1', '1', 'Musnah', '1', '2019-10-09 02:32:36', '2019-10-09 02:32:36'),
(2, 'setyan', '1', '1', 'Ditinjau Ulang', '1', '2019-10-09 02:33:21', '2019-10-09 02:33:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_simpans`
--

CREATE TABLE `lokasi_simpans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gedung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baris` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bok` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasi_simpans`
--

INSERT INTO `lokasi_simpans` (`id`, `gedung`, `rak`, `baris`, `bok`, `folder`, `created_at`, `updated_at`) VALUES
(1, '1', '100', '1000', '10', '1', '2019-10-08 22:19:59', '2019-10-08 22:19:59'),
(2, '1', '100', '1001', '1', '2', '2019-10-09 02:15:24', '2019-10-09 02:15:24'),
(4, '2', '100', '1000', 'a', '2', '2019-10-13 20:36:34', '2019-10-13 20:36:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_07_19_064317_create_lokasi_simpans_table', 2),
(5, '2019_07_19_064242_create_jenis_dokumens_table', 3),
(6, '2019_07_28_040543_create_j_r_a_s_table', 4),
(7, '2019_07_30_001716_create_dokumens_table', 5),
(8, '2019_08_04_113854_create_peminjamen_table', 6),
(10, '2019_10_17_153418_create_pengembalians_table', 7),
(11, '2019_10_17_151258_create_status_peminjamans_table', 8),
(12, '2019_10_28_175359_create_status_dokumens_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjamen`
--

CREATE TABLE `peminjamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diskripsi_peminjaman` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_karyawan` bigint(20) UNSIGNED NOT NULL,
  `id_dokumen` bigint(20) UNSIGNED NOT NULL,
  `id_status` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjamen`
--

INSERT INTO `peminjamen` (`id`, `diskripsi_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `id_karyawan`, `id_dokumen`, `id_status`, `created_at`, `updated_at`) VALUES
(4, 'tes', '2019-10-18', '2019-10-19', 2, 1, 2, '2019-10-18 02:36:56', '2019-10-18 02:36:56'),
(6, 'asdada', '2019-10-18', '2019-10-21', 1, 3, 2, '2019-10-18 02:38:20', '2019-10-18 02:38:20'),
(7, 'dadasdgdfjhgfagfjgfsgfshjgfysgebshjgf', '2019-10-21', '2019-10-22', 2, 1, 2, '2019-10-21 01:21:56', '2019-10-21 01:21:56'),
(8, 'teman ku', '2019-10-24', '2019-10-25', 1, 3, 2, '2019-10-23 12:19:31', '2019-10-23 12:19:31'),
(9, 'ggfsdg5rdfg', '2019-10-25', '2019-10-26', 2, 2, 2, '2019-10-25 00:11:43', '2019-10-25 00:11:43'),
(10, 'keperluan mencoba', '2019-10-28', '2019-10-29', 2, 1, 2, '2019-10-27 23:53:50', '2019-10-27 23:53:50'),
(11, 'coba pendiing', '2019-10-28', '2019-10-30', 2, 1, 2, '2019-10-27 23:55:39', '2019-10-27 23:55:39'),
(12, 'tadfaf', '2019-11-08', '2019-11-09', 2, 1, 3, '2019-11-07 18:28:52', '2019-11-07 18:28:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalians`
--

CREATE TABLE `pengembalians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_peminjaman` bigint(20) UNSIGNED NOT NULL,
  `id_dokumen` bigint(20) UNSIGNED NOT NULL,
  `id_pegawai` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_dokumens`
--

CREATE TABLE `status_dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_dokumens`
--

INSERT INTO `status_dokumens` (`id`, `status`, `created_at`, `updated_at`) VALUES
(0, 'null', NULL, NULL),
(1, 'ajukan', NULL, NULL),
(2, 'setujui', NULL, NULL),
(3, 'telah musnah', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_peminjamans`
--

CREATE TABLE `status_peminjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_peminjamans`
--

INSERT INTO `status_peminjamans` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pinjam', NULL, NULL),
(2, 'kemabali', NULL, NULL),
(3, 'permohonan', NULL, NULL),
(4, 'tolak', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `address`, `gender`, `email`, `email_verified_at`, `isAdmin`, `password`, `tlp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1234', 'arief setya', 'Ngunut, Tulungagung', 'pria', 'ariefsetyan@gmail.com', NULL, 1, '$2y$10$Af6qVaytJwpL.kdRNoaqxOY2ky25kKpfa/XGsv31m8BQSzUYkwrju', '089679187576', NULL, '2019-10-08 22:13:21', '2019-10-08 22:13:21'),
(2, '321', 'setyan', 'Ngunut, Tulungagung', 'pria', 'arief.setya57@gmail.com', NULL, NULL, '$2y$10$Xs8YrEmWRyfCAC9MavB4ve2qroyrQPMXh5u8dLvfHTuj8bYky8Giq', '089679186576', NULL, '2019-10-09 01:50:02', '2019-10-09 01:50:02'),
(3, '412313', 'agung pramono', 'Ngunut, Tulungagung', 'pria', 'pramono.agung@gmail.com', NULL, 2, '$2y$10$Tn.Gx7PeVRIqaebOJ.2bdO4dFRq8v3f1SV1/wAwiIM1LSY4G3B4p2', '089679189576', NULL, '2019-10-13 20:30:51', '2019-10-13 20:30:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumens_no_takah_foreign` (`no_takah`),
  ADD KEY `dokumens_jenis_dok_jra_foreign` (`jenis_dok_jra`),
  ADD KEY `dokumen_status` (`status`),
  ADD KEY `dokumens_kondisi_foraing` (`kondisi_dokumen`);

--
-- Indeks untuk tabel `jenis_dokumens`
--
ALTER TABLE `jenis_dokumens`
  ADD PRIMARY KEY (`no_takah`),
  ADD KEY `jenis_dokumens_id_lokasi_foreign` (`id_lokasi`);

--
-- Indeks untuk tabel `j_r_a_s`
--
ALTER TABLE `j_r_a_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `j_r_a_s_kode_jenis_foreign` (`kode_jenis`);

--
-- Indeks untuk tabel `lokasi_simpans`
--
ALTER TABLE `lokasi_simpans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id_karyawan_foreign` (`id_karyawan`),
  ADD KEY `peminjaman_id_dokumen_foreign` (`id_dokumen`),
  ADD KEY `peminjaman_id_status` (`id_status`);

--
-- Indeks untuk tabel `pengembalians`
--
ALTER TABLE `pengembalians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengembalians_id_peminjaman_foreign` (`id_peminjaman`),
  ADD KEY `pengembalians_id_dokumen_foreign` (`id_dokumen`),
  ADD KEY `pengembalians_id_pegawai_foreign` (`id_pegawai`);

--
-- Indeks untuk tabel `status_dokumens`
--
ALTER TABLE `status_dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_peminjamans`
--
ALTER TABLE `status_peminjamans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `j_r_a_s`
--
ALTER TABLE `j_r_a_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lokasi_simpans`
--
ALTER TABLE `lokasi_simpans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengembalians`
--
ALTER TABLE `pengembalians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `status_dokumens`
--
ALTER TABLE `status_dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `status_peminjamans`
--
ALTER TABLE `status_peminjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  ADD CONSTRAINT `dokumens_jenis_dok_jra_foreign` FOREIGN KEY (`jenis_dok_jra`) REFERENCES `j_r_a_s` (`id`),
  ADD CONSTRAINT `dokumens_kondisi_foraing` FOREIGN KEY (`kondisi_dokumen`) REFERENCES `status_dokumens` (`id`),
  ADD CONSTRAINT `dokumens_no_takah_foreign` FOREIGN KEY (`no_takah`) REFERENCES `jenis_dokumens` (`no_takah`);

--
-- Ketidakleluasaan untuk tabel `jenis_dokumens`
--
ALTER TABLE `jenis_dokumens`
  ADD CONSTRAINT `jenis_dokumens_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_simpans` (`id`);

--
-- Ketidakleluasaan untuk tabel `j_r_a_s`
--
ALTER TABLE `j_r_a_s`
  ADD CONSTRAINT `j_r_a_s_kode_jenis_foreign` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_dokumens` (`no_takah`);

--
-- Ketidakleluasaan untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD CONSTRAINT `peminjaman_id_dokumen_foreign` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumens` (`id`),
  ADD CONSTRAINT `peminjaman_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `peminjaman_id_status` FOREIGN KEY (`id_status`) REFERENCES `status_peminjamans` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengembalians`
--
ALTER TABLE `pengembalians`
  ADD CONSTRAINT `pengembalians_id_dokumen_foreign` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumens` (`id`),
  ADD CONSTRAINT `pengembalians_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pengembalians_id_peminjaman_foreign` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjamen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
