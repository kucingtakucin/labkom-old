-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2020 at 03:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labkom2`
--

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
(4, '2020_02_16_083920_create_peminjaman_alat_models_table', 1),
(5, '2020_02_17_013117_create_peminjaman_studio_models_table', 1),
(6, '2020_02_17_053335_create_peminjaman_lab_di_dalam_models_table', 1),
(7, '2020_02_17_055909_create_peminjaman_lab_di_luar_models_table', 1),
(8, '2020_02_17_134729_create_surat_bebas_labkom_models_table', 1);

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
-- Table structure for table `peminjaman_alat_models`
--

CREATE TABLE `peminjaman_alat_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` int(11) NOT NULL,
  `hari` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alat` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` tinyint(4) NOT NULL,
  `lama_peminjaman` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_lab_di_dalam_models`
--

CREATE TABLE `peminjaman_lab_di_dalam_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` int(11) NOT NULL,
  `hari` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_pinjam` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_kembali` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosen_pengampu` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_kuliah` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_lab_di_luar_models`
--

CREATE TABLE `peminjaman_lab_di_luar_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` int(11) NOT NULL,
  `hari` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_pinjam` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_kembali` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosen_pengampu` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_kuliah` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_studio_models`
--

CREATE TABLE `peminjaman_studio_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` int(11) NOT NULL,
  `hari` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosen_pengampu` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_bebas_labkom_models`
--

CREATE TABLE `surat_bebas_labkom_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` int(11) NOT NULL,
  `hari` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_status` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adam', 'adam.faizal.af6@gmail.com', '$2y$10$8aP4BU7kBLeMxnWsrr7SLOTUL6xPn/WlYrmfKd4bnm5vzPgHPiNii', 0, '2020-02-18 02:16:01', 'gy67QEUO3WD9lQeqtsBVDUPpgqegHztXamwEM46vc1vmcVbE7VeSJo0pEYIW', '2020-02-18 02:05:38', '2020-02-18 02:32:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peminjaman_alat_models`
--
ALTER TABLE `peminjaman_alat_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman_lab_di_dalam_models`
--
ALTER TABLE `peminjaman_lab_di_dalam_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman_lab_di_luar_models`
--
ALTER TABLE `peminjaman_lab_di_luar_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman_studio_models`
--
ALTER TABLE `peminjaman_studio_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_bebas_labkom_models`
--
ALTER TABLE `surat_bebas_labkom_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman_alat_models`
--
ALTER TABLE `peminjaman_alat_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_lab_di_dalam_models`
--
ALTER TABLE `peminjaman_lab_di_dalam_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_lab_di_luar_models`
--
ALTER TABLE `peminjaman_lab_di_luar_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_studio_models`
--
ALTER TABLE `peminjaman_studio_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_bebas_labkom_models`
--
ALTER TABLE `surat_bebas_labkom_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
