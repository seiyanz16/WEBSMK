-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 06:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsija`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_studis`
--

CREATE TABLE `bidang_studis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bidangstudi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidang_studis`
--

INSERT INTO `bidang_studis` (`id`, `bidangstudi`, `created_at`, `updated_at`) VALUES
(2, 'Sistem Informasi', '2023-01-12 01:12:37', '2023-01-17 23:42:54'),
(4, 'Desain Komunikasi Visual', '2023-01-17 18:26:45', '2023-04-07 20:32:55'),
(6, 'Teknik Mesin', '2023-02-07 18:45:13', '2023-04-07 20:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `dkelas`
--

CREATE TABLE `dkelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kdkelas` bigint(20) UNSIGNED NOT NULL,
  `idsiswa` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip_nuptk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaguru` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('I','H','B','K','P','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelardepan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelarbelakang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namapt` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahunlulus` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatlahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllahir` date NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip_nuptk`, `namaguru`, `notelp`, `jk`, `alamat`, `agama`, `gelardepan`, `gelarbelakang`, `namapt`, `tahunlulus`, `tempatlahir`, `tgllahir`, `foto`, `created_at`, `updated_at`) VALUES
(1, '12', 'Leo Tsukinaga', '12345', 'L', 'Kp. Pos Citayam', 'I', 'Hj.', 'S. Pd. I', 'Universitas Islampedia', '2020', 'Bogor', '1996-05-05', 'Foto Guru/D7iLJYgj49g81kRdIG0YQT57yns08z17QEjoaZ9X.jpg', '2023-05-23 18:42:52', '2023-05-23 18:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namakelas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `walas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ta` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdkompkeahlian` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komptensikeahlian`
--

CREATE TABLE `komptensikeahlian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `komptensikeahlian` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdstandkomp` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komptensikeahlian`
--

INSERT INTO `komptensikeahlian` (`id`, `komptensikeahlian`, `kdstandkomp`, `created_at`, `updated_at`) VALUES
(8, 'Jaringan dan Software', 5, '2023-04-07 20:34:14', '2023-04-07 20:34:14'),
(9, 'Software Editor', 6, '2023-04-07 20:35:30', '2023-04-07 20:35:30'),
(10, 'Pemesinan', 7, '2023-04-07 20:36:16', '2023-04-07 20:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapel` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdkompkeahlian` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `mapel`, `kdkompkeahlian`, `created_at`, `updated_at`) VALUES
(4, 'Komputasi Awan', 8, '2023-04-07 20:38:10', '2023-04-07 20:38:10'),
(5, 'Desain Grafis', 9, '2023-04-07 20:38:29', '2023-04-07 20:38:29'),
(6, 'Mengelas', 10, '2023-04-07 20:38:50', '2023-04-07 20:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_09_043048_create_bidangstudi_table', 1),
(6, '2022_11_09_043945_create_standarkompetensi_table', 1),
(7, '2022_11_09_050151_create_komptensikeahlian_table', 1),
(8, '2022_11_09_063220_create_mapel_table', 1),
(9, '2022_11_09_064321_create_siswa_table', 1),
(10, '2022_11_09_070039_create_guru_table', 1),
(11, '2022_11_09_185735_create_kelas_table', 1),
(12, '2022_11_09_190217_create_dkelas_table', 1),
(13, '2022_11_09_190532_create_nilai_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idsiswa` bigint(20) UNSIGNED NOT NULL,
  `kdguru` bigint(20) UNSIGNED NOT NULL,
  `kdmapel` bigint(20) UNSIGNED NOT NULL,
  `namates` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namasiswa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatsiswa` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpsiswa` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agamasiswa` enum('I','H','B','K','P','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `asalsekolah` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jksiswa` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatlahirsiswa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllahirsiswa` date NOT NULL,
  `statanak` enum('K','A') COLLATE utf8mb4_unicode_ci NOT NULL,
  `anakke` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglditerima` date NOT NULL,
  `dikelas` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ayah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ibu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaanayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaanibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpayah` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpibu` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatayah` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatibu` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agamaayah` enum('I','H','B','K','P','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agamaibu` enum('I','H','B','K','P','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `standarkompetensi`
--

CREATE TABLE `standarkompetensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `standarkompetensi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdbidstudi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standarkompetensi`
--

INSERT INTO `standarkompetensi` (`id`, `standarkompetensi`, `kdbidstudi`, `created_at`, `updated_at`) VALUES
(5, 'Sistem Informatika Jaringan dan Aplikasi', 2, '2023-04-07 20:30:48', '2023-04-07 20:30:48'),
(6, 'Multimedia', 4, '2023-04-07 20:33:15', '2023-04-07 20:33:15'),
(7, 'Teknik Fabrikasi Logam dan Manufaktur', 6, '2023-04-07 20:33:41', '2023-04-07 20:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','bendahara','guru','kepsek','siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa',
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nis`, `name`, `email`, `email_verified_at`, `password`, `level`, `aktif`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '1234567890121', 'Kohaku Oukawa', 'oukohaku@gmail.com', NULL, '$2y$10$bakzhWDF7ekAf1r7VNzdme2rPFfGvTQWa5iu/8P2r1e3UHLNv7Qhe', 'admin', 1, 'Q8wedQjz8gi91SqJU9EOwfzBm8gQRcElLoHmqKrOYU4s4zLmYEVxK0S8QFEP', '2023-01-10 23:36:49', '2023-04-04 18:08:03'),
(4, '0983122412', 'Leo Tsukinaga', 'leoleo@gmail.com', NULL, '$2y$10$og.J8NQrKPi2f2/Eb4ngk.eJLF.2zcS.3SC7HTJktW3Rg0F1R4Yxe', 'kepsek', 1, NULL, '2023-01-13 20:17:11', '2023-01-13 20:17:11'),
(7, '74829203103841', 'Lee Siyoon', 'yoonyoonie@gmail.com', NULL, '$2y$10$kiAWvzmEKw4Ebmszr/1/gOxStzJoB/CEKNlqWAnqZyPIHGEA82RIO', 'admin', 1, NULL, '2023-04-04 18:02:16', '2023-04-04 18:02:16'),
(8, '3412512341231', 'admin', 'admin@gmail.com', NULL, '$2y$10$bCNdNYLmopwNx..6gmmqceUpgGvsXJUUAbgtYCwHEmK15tBVXXCTG', 'admin', 1, NULL, '2023-04-07 20:12:18', '2023-04-07 20:12:18'),
(9, '145', 'Kuroo Tetsuro', 'kurkuroo@gmail.com', NULL, '$2y$10$AYDO5OIg.deNj3luTpUvP.1Qlkta9O43z6xJpRGTYGWWEHjcbBYOq', 'siswa', 1, NULL, '2023-05-23 18:59:00', '2023-05-23 18:59:00'),
(10, '123', 'Arthur Pendragon', 'saberarthur@gmail.com', NULL, '$2y$10$URMDpbYOWGUhEu2az0lGCeTy..hijxF4Jk.C7ssKkfnVVOtfMOzma', 'guru', 1, NULL, '2023-05-23 19:06:22', '2023-05-23 19:06:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_studis`
--
ALTER TABLE `bidang_studis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dkelas`
--
ALTER TABLE `dkelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dkelas_kdkelas_foreign` (`kdkelas`),
  ADD KEY `dkelas_idsiswa_foreign` (`idsiswa`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_kdkompkeahlian_foreign` (`kdkompkeahlian`);

--
-- Indexes for table `komptensikeahlian`
--
ALTER TABLE `komptensikeahlian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komptensikeahlian_kdstandkomp_foreign` (`kdstandkomp`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_kdkompkeahlian_foreign` (`kdkompkeahlian`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_idsiswa_foreign` (`idsiswa`),
  ADD KEY `nilai_kdguru_foreign` (`kdguru`),
  ADD KEY `nilai_kdmapel_foreign` (`kdmapel`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`);

--
-- Indexes for table `standarkompetensi`
--
ALTER TABLE `standarkompetensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standarkompetensi_kdbidstudi_foreign` (`kdbidstudi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nis_unique` (`nis`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_studis`
--
ALTER TABLE `bidang_studis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dkelas`
--
ALTER TABLE `dkelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komptensikeahlian`
--
ALTER TABLE `komptensikeahlian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standarkompetensi`
--
ALTER TABLE `standarkompetensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dkelas`
--
ALTER TABLE `dkelas`
  ADD CONSTRAINT `dkelas_idsiswa_foreign` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dkelas_kdkelas_foreign` FOREIGN KEY (`kdkelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_kdkompkeahlian_foreign` FOREIGN KEY (`kdkompkeahlian`) REFERENCES `komptensikeahlian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komptensikeahlian`
--
ALTER TABLE `komptensikeahlian`
  ADD CONSTRAINT `komptensikeahlian_kdstandkomp_foreign` FOREIGN KEY (`kdstandkomp`) REFERENCES `standarkompetensi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_kdkompkeahlian_foreign` FOREIGN KEY (`kdkompkeahlian`) REFERENCES `komptensikeahlian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_idsiswa_foreign` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_kdguru_foreign` FOREIGN KEY (`kdguru`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_kdmapel_foreign` FOREIGN KEY (`kdmapel`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `standarkompetensi`
--
ALTER TABLE `standarkompetensi`
  ADD CONSTRAINT `standarkompetensi_kdbidstudi_foreign` FOREIGN KEY (`kdbidstudi`) REFERENCES `bidang_studis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
