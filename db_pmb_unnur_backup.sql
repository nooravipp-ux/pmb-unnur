-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 09:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pmb_unnur_backup`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `agama` int(11) DEFAULT NULL,
  `alat_transportasi` int(11) DEFAULT NULL,
  `ds_kel` varchar(50) DEFAULT NULL,
  `file_akta` longblob DEFAULT NULL,
  `file_foto` longblob DEFAULT NULL,
  `file_ijazah` longblob DEFAULT NULL,
  `file_ket_sehat` longblob DEFAULT NULL,
  `file_kk` longblob DEFAULT NULL,
  `file_ktp` longblob DEFAULT NULL,
  `id_biodata` int(11) NOT NULL,
  `id_kota` varchar(50) DEFAULT NULL,
  `id_pendaftar` int(30) DEFAULT NULL,
  `id_prov` varchar(50) DEFAULT NULL,
  `id_wil` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `jenis_tinggal` int(11) DEFAULT NULL,
  `jln` text DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `nik_ayah` varchar(50) DEFAULT NULL,
  `nik_ibu` varchar(50) DEFAULT NULL,
  `no_telephone` varchar(50) DEFAULT NULL,
  `no_telp_ortu` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `pendidikan_ayah` varchar(50) DEFAULT NULL,
  `pendidikan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` varchar(50) DEFAULT NULL,
  `rt` varchar(50) DEFAULT NULL,
  `rw` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `warganegara` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`agama`, `alat_transportasi`, `ds_kel`, `file_akta`, `file_foto`, `file_ijazah`, `file_ket_sehat`, `file_kk`, `file_ktp`, `id_biodata`, `id_kota`, `id_pendaftar`, `id_prov`, `id_wil`, `jenis_kelamin`, `jenis_tinggal`, `jln`, `kode_pos`, `nama_ayah`, `nama_ibu`, `nik_ayah`, `nik_ibu`, `no_telephone`, `no_telp_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `rt`, `rw`, `tempat_lahir`, `tgl_lahir`, `tgl_lahir_ayah`, `tgl_lahir_ibu`, `warganegara`) VALUES
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08232', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` varchar(255) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
('ILKOM', 'ILMU KOMPUTER DAN INFORMATIKA');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(255) NOT NULL,
  `id_strata` varchar(255) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_strata`, `nama_kelas`) VALUES
('KEL001', 'STRAT001', 'Reguler pagi');

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
(4, '2020_08_31_090149_create_roles_table', 1),
(5, '2020_08_31_090233_create_role_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nim`
--

CREATE TABLE `nim` (
  `id_NIM` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_prodi` varchar(255) NOT NULL,
  `no_prodi` varchar(255) NOT NULL,
  `id_strata` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nim`
--

INSERT INTO `nim` (`id_NIM`, `tahun`, `id_prodi`, `no_prodi`, `id_strata`, `status`) VALUES
('01S22000AK-201', 2020, 'AK-201', '01', 'S2', '00'),
('02S12000IF-301', 2020, 'IF-301', '02', 'S1', '00'),
('03S12011IF-301', 2020, 'IF-301', '03', 'S1', '11');

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
-- Table structure for table `pmb`
--

CREATE TABLE `pmb` (
  `id_pmb` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `gelombang` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pmb`
--

INSERT INTO `pmb` (`id_pmb`, `tahun`, `gelombang`, `start_date`, `finish_date`, `status`) VALUES
(2010001, 2020, 1, '2020-11-02', '2020-11-16', 'OPENED');

-- --------------------------------------------------------

--
-- Table structure for table `pmb_biaya_registrasi`
--

CREATE TABLE `pmb_biaya_registrasi` (
  `id_pmb_biaya_registrasi` int(11) NOT NULL,
  `id_pmb` int(11) DEFAULT NULL,
  `id_fakultas` varchar(20) NOT NULL,
  `strata` varchar(45) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `biaya_registrasi` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pmb_biaya_registrasi`
--

INSERT INTO `pmb_biaya_registrasi` (`id_pmb_biaya_registrasi`, `id_pmb`, `id_fakultas`, `strata`, `kelas`, `biaya_registrasi`) VALUES
(8, 2010001, 'ILKOM', 'STRAT001', 'KEL001', '300000');

-- --------------------------------------------------------

--
-- Table structure for table `pmb_jadwal_ujian`
--

CREATE TABLE `pmb_jadwal_ujian` (
  `id_jadwal_ujian` int(50) NOT NULL,
  `gelombang_ujian` int(50) DEFAULT NULL,
  `id_prodi` varchar(50) DEFAULT NULL,
  `passingrade` decimal(10,0) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `tanggal_ujian` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pmb_jadwal_ujian`
--

INSERT INTO `pmb_jadwal_ujian` (`id_jadwal_ujian`, `gelombang_ujian`, `id_prodi`, `passingrade`, `tahun`, `tanggal_ujian`) VALUES
(1, 1, '55201', '60', 2020, '2020-11-23 14:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `pmb_jenjang_pendidikan`
--

CREATE TABLE `pmb_jenjang_pendidikan` (
  `id` bigint(11) NOT NULL,
  `id_prodi` varchar(11) DEFAULT NULL,
  `id_fakultas` varchar(11) DEFAULT NULL,
  `strata` varchar(20) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pmb_pendaftar`
--

CREATE TABLE `pmb_pendaftar` (
  `id_pendaftar` int(30) NOT NULL,
  `id_pmb` int(11) DEFAULT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_jenjang_pend` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pem` longblob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_pembayaran_registrasi` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'BELUM MELAKUKAN PEMBAYARAN ',
  `no_telepon` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_prodi` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_fakultas` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kelas` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_test` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jalur_masuk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pendaftar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelulusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lulus_seleksi` tinyint(4) DEFAULT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_ujian` decimal(10,0) NOT NULL DEFAULT 0,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pmb_pendaftar`
--

INSERT INTO `pmb_pendaftar` (`id_pendaftar`, `id_pmb`, `nama`, `email`, `tahun`, `id_jenjang_pend`, `bukti_pem`, `created_at`, `updated_at`, `status_pembayaran_registrasi`, `no_telepon`, `id_prodi`, `atas_nama`, `id_fakultas`, `id_kelas`, `id_test`, `jalur_masuk`, `jenis_pendaftar`, `kelulusan`, `lulus_seleksi`, `metode_pembayaran`, `nik`, `nilai_ujian`, `nim`) VALUES
(21, 2010001, 'Ahmad Sodikin', 'ahmad@gmail.com', 2020, 'STRAT001', NULL, '2020-11-01 17:00:00', NULL, 'BELUM DI KONFIRMASI', '08212312', '55201', NULL, 'ILKOM', 'KEL001', '201552010001', 'regular', 'regular', NULL, NULL, 'cash', '123456', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pmb_pengumuman`
--

CREATE TABLE `pmb_pengumuman` (
  `id` int(11) NOT NULL,
  `files` blob DEFAULT NULL,
  `header` text NOT NULL,
  `id_pmb` int(50) DEFAULT NULL,
  `isi` text NOT NULL,
  `created_at` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` varchar(255) NOT NULL,
  `id_fakultas` varchar(255) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`) VALUES
('55201', 'ILKOM', 'INFORMATIKA');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-08-31 21:21:41', '2020-08-31 21:21:41'),
(2, 'keuangan', '2020-08-31 21:21:41', '2020-08-31 21:21:41'),
(3, 'prodi', '2020-08-31 21:21:41', '2020-08-31 21:21:41'),
(4, 'calon-mhs', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(7, 4, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `strata`
--

CREATE TABLE `strata` (
  `id_strata` varchar(255) NOT NULL,
  `id_prodi` varchar(255) NOT NULL,
  `jenis_strata` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strata`
--

INSERT INTO `strata` (`id_strata`, `id_prodi`, `jenis_strata`) VALUES
('STRAT001', '55201', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_prodi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id_prodi`) VALUES
(1, 'Admin User', 'admin@admin.com', NULL, '$2y$10$LjWDqC6e6VXCkxqjq16QM.1RG4iIvt21cGgZswjcDd/6jr/koDyXO', NULL, '2020-08-31 21:21:30', '2020-08-31 21:21:30', NULL),
(2, 'Keuangan', 'keuangan@keuangan.com', NULL, '$2y$10$4nbFS9gh.d.9cfZcGEQJiubyx/d6ynpSoKqOpPCEkJOH0z7YZQQQm', NULL, '2020-08-31 21:21:30', '2020-08-31 21:21:30', NULL),
(3, 'Prodi', 'prodi@prodi.com', NULL, '$2y$10$x9WDio59bPZLap8fdPvyZ.NAfa8eVvYABVCoyNRxFXEYGh0TJf6Cm', NULL, '2020-08-31 21:21:30', '2020-08-31 21:21:30', '55201'),
(10, 'Ahmad Sodikin', 'ahmad@gmail.com', NULL, '$2y$10$D7s45tKcljvqJE37TnrNmuo//xISYPunJiTJ1eaWwysus4EbujYwS', NULL, NULL, NULL, '55201');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kelas_ibfk_1` (`id_strata`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nim`
--
ALTER TABLE `nim`
  ADD PRIMARY KEY (`id_NIM`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `pmb`
--
ALTER TABLE `pmb`
  ADD PRIMARY KEY (`id_pmb`);

--
-- Indexes for table `pmb_biaya_registrasi`
--
ALTER TABLE `pmb_biaya_registrasi`
  ADD PRIMARY KEY (`id_pmb_biaya_registrasi`);

--
-- Indexes for table `pmb_jadwal_ujian`
--
ALTER TABLE `pmb_jadwal_ujian`
  ADD PRIMARY KEY (`id_jadwal_ujian`);

--
-- Indexes for table `pmb_jenjang_pendidikan`
--
ALTER TABLE `pmb_jenjang_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmb_pendaftar`
--
ALTER TABLE `pmb_pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- Indexes for table `pmb_pengumuman`
--
ALTER TABLE `pmb_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `prodi_ibfk_1` (`id_fakultas`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strata`
--
ALTER TABLE `strata`
  ADD PRIMARY KEY (`id_strata`),
  ADD KEY `strata_ibfk_1` (`id_prodi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pmb_biaya_registrasi`
--
ALTER TABLE `pmb_biaya_registrasi`
  MODIFY `id_pmb_biaya_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pmb_jadwal_ujian`
--
ALTER TABLE `pmb_jadwal_ujian`
  MODIFY `id_jadwal_ujian` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pmb_jenjang_pendidikan`
--
ALTER TABLE `pmb_jenjang_pendidikan`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pmb_pendaftar`
--
ALTER TABLE `pmb_pendaftar`
  MODIFY `id_pendaftar` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
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
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_strata`) REFERENCES `strata` (`id_strata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `strata`
--
ALTER TABLE `strata`
  ADD CONSTRAINT `strata_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
