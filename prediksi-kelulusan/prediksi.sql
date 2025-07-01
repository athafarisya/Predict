-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2025 pada 10.35
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prediksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatans`
--

CREATE TABLE `catatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hasil_prediksi` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `catatans`
--

INSERT INTO `catatans` (`id`, `nim`, `nama`, `hasil_prediksi`, `catatan`, `created_at`, `updated_at`) VALUES
(1, '21090039', 'Athafarisya', 'Tidak tepat waktu', 'Tingkatkan fokus, manajemen waktu dan semangat belajar untuk mengejar ketertinggalan', '2025-06-29 22:53:50', '2025-06-29 22:53:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `umur` int(11) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `kegiatan_organisasi` varchar(50) NOT NULL,
  `ips1` decimal(5,2) DEFAULT NULL,
  `ips2` decimal(5,2) DEFAULT NULL,
  `ips3` decimal(5,2) DEFAULT NULL,
  `ips4` decimal(5,2) DEFAULT NULL,
  `ips5` decimal(5,2) DEFAULT NULL,
  `ips6` decimal(5,2) DEFAULT NULL,
  `ips7` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_bekerja` varchar(50) DEFAULT NULL,
  `masa_studi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`id`, `nama`, `nim`, `umur`, `jk`, `kegiatan_organisasi`, `ips1`, `ips2`, `ips3`, `ips4`, `ips5`, `ips6`, `ips7`, `created_at`, `updated_at`, `status_bekerja`, `masa_studi`) VALUES
(19, 'Syaharani', '21090004', 20, 'Perempuan', 'ikut', 4.00, 4.00, 4.00, 4.00, 4.00, 4.00, 4.00, '2025-06-25 20:29:00', '2025-06-26 01:03:23', 'ya', 3),
(20, 'Athafarisya', '21090039', 20, 'Perempuan', 'ya', 3.50, 3.50, 3.50, 3.50, 3.50, 3.50, 3.50, '2025-06-25 20:30:36', '2025-06-26 01:03:44', 'ya', 4),
(21, 'Kartika', '21090097', 24, 'Perempuan', 'ikut', 3.00, 3.75, 3.90, 3.89, 3.67, 3.00, 3.00, '2025-06-30 06:00:38', '2025-06-30 06:00:38', 'tidak', 3),
(22, 'Hasnita', '21090070', 22, 'Perempuan', 'Ikut', 3.90, 4.00, 3.00, 3.96, 3.85, 4.00, 3.78, '2025-06-30 23:42:39', '2025-07-01 01:05:02', 'Tidak', 4),
(23, 'Fadia Nufinikita', '21090033', 22, 'Perempuan', 'Ikut', 2.50, 3.10, 2.00, 2.90, 3.00, 3.90, 4.00, '2025-07-01 00:15:42', '2025-07-01 00:18:13', 'Tidak', 4),
(24, 'Feby', '21090034', 22, 'Perempuan', 'Ikut', 3.00, 2.40, 3.00, 3.89, NULL, NULL, NULL, '2025-07-01 00:19:22', '2025-07-01 00:19:22', 'Tidak', 4),
(25, 'Idham', '21090065', 22, 'Laki-laki', 'Ikut', 3.90, 3.85, 3.70, 4.00, NULL, NULL, NULL, '2025-07-01 01:33:50', '2025-07-01 01:33:50', 'Tidak', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_predict`
--

CREATE TABLE `history_predict` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `status_kegiatan` tinyint(1) DEFAULT NULL,
  `ips1` float DEFAULT NULL,
  `ips2` float DEFAULT NULL,
  `ips3` float DEFAULT NULL,
  `ips4` float DEFAULT NULL,
  `ips5` float DEFAULT NULL,
  `ips6` float DEFAULT NULL,
  `ips7` float DEFAULT NULL,
  `hasil_prediksi` varchar(50) NOT NULL,
  `catatan` text DEFAULT NULL,
  `tanggal_prediksi` timestamp NULL DEFAULT current_timestamp(),
  `status_bekerja` int(11) DEFAULT NULL,
  `masa_studi` int(11) DEFAULT NULL,
  `probability` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `history_predict`
--

INSERT INTO `history_predict` (`id`, `nama`, `nim`, `umur`, `status_kegiatan`, `ips1`, `ips2`, `ips3`, `ips4`, `ips5`, `ips6`, `ips7`, `hasil_prediksi`, `catatan`, `tanggal_prediksi`, `status_bekerja`, `masa_studi`, `probability`) VALUES
(4, 'Athafarisya', '21090039', 22, 0, 2.85, 3, 2.8, 2.5, 3, 2.95, 3, 'Tidak tepat waktu', 'Prediksi Anda belum lulus tepat waktu. Tingkatkan fokus, manajemen waktu, dan semangat belajar untuk mengejra ketertinggalan!', '2025-06-29 22:52:08', 0, 4, 0.25),
(5, 'Kartika', '21090097', 24, 1, 2.65, 2.45, 3, 3.4, 2, 2.9, 2.1, 'Tidak tepat waktu', 'Prediksi Anda belum lulus tepat waktu. Tingkatkan fokus, manajemen waktu, dan semangat belajar untuk mengejra ketertinggalan!', '2025-06-30 06:05:11', 0, 5, 0),
(6, 'Hasnita', '21090070', 22, 1, 2.2, 2.4, 3.9, 3.4, 3.85, 4, 3.75, 'Tidak tepat waktu', 'Prediksi Anda belum lulus tepat waktu. Tingkatkan fokus, manajemen waktu, dan semangat belajar untuk mengejra ketertinggalan!', '2025-06-30 23:44:27', 0, 4, 0),
(7, 'Feby', '21090034', 22, 1, 3, 2.4, 3, 3.89, 3.95, 3.8, 3.98, 'Tepat waktu', 'Prediksi Anda lulus tepat waktu. Pertahankan semangat dan kedisplinan agar hasil akhir tetap sesuai harapan', '2025-07-01 01:18:34', 1, 4, 0.8),
(8, 'Fadia Nufinikita', '21090033', 22, 1, 2.5, 3.1, 2, 2.9, 3, 3.9, 4, 'Tidak tepat waktu', 'Prediksi Anda belum lulus tepat waktu. Tingkatkan fokus, manajemen waktu, dan semangat belajar untuk mengejra ketertinggalan!', '2025-07-01 00:49:44', 1, 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_12_11_094250_create_users_table', 1),
(4, '2024_12_13_053635_create_roles_table', 1),
(5, '2024_12_13_060751_add_role_id_column_to_users_table', 1),
(10, '2024_12_13_061348_create_sessions_table', 2),
(11, '2024_12_13_063503_drop_role_id', 2),
(12, '2024_12_13_064104_remove_role_id_from_users_table', 2),
(13, '2024_12_14_115429_create_mahasiswa_table', 3),
(14, '2024_12_31_071719_create_solusi_table', 4),
(15, '2025_02_11_035547_create_data_mahasiswas_table', 5),
(16, '2025_04_14_064537_create_catatans_table', 6),
(17, '0001_01_01_000000_create_users_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `nim` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prediksi_kelulusan`
--

CREATE TABLE `prediksi_kelulusan` (
  `prediksi_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `hasil_prediksi` varchar(50) NOT NULL,
  `tanggal_prediksi` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prediksi_kelulusan`
--

INSERT INTO `prediksi_kelulusan` (`prediksi_id`, `mahasiswa_id`, `hasil_prediksi`, `tanggal_prediksi`) VALUES
(44, 19, 'Tidak tepat waktu', '2025-06-26 03:31:02'),
(45, 20, 'Tepat waktu', '2025-06-26 03:31:02'),
(46, 19, 'Tepat waktu', '2025-06-26 03:31:26'),
(47, 20, 'Tepat waktu', '2025-06-26 03:31:26'),
(48, 19, 'Tepat waktu', '2025-07-01 06:37:42'),
(49, 20, 'Tepat waktu', '2025-07-01 06:37:42'),
(50, 21, 'Tepat waktu', '2025-07-01 06:37:42'),
(51, 19, 'Tepat waktu', '2025-07-01 07:07:00'),
(52, 20, 'Tepat waktu', '2025-07-01 07:07:00'),
(53, 21, 'Tepat waktu', '2025-07-01 07:07:00'),
(54, 22, 'Tidak tepat waktu', '2025-07-01 07:07:00'),
(55, 19, 'Tepat waktu', '2025-07-01 07:16:14'),
(56, 20, 'Tepat waktu', '2025-07-01 07:16:14'),
(57, 21, 'Tepat waktu', '2025-07-01 07:16:14'),
(58, 22, 'Tidak tepat waktu', '2025-07-01 07:16:14'),
(59, 23, 'Tidak tepat waktu', '2025-07-01 07:16:14'),
(60, 19, 'Tepat waktu', '2025-07-01 07:16:39'),
(61, 20, 'Tepat waktu', '2025-07-01 07:16:39'),
(62, 21, 'Tepat waktu', '2025-07-01 07:16:39'),
(63, 22, 'Tidak tepat waktu', '2025-07-01 07:16:39'),
(64, 23, 'Tidak tepat waktu', '2025-07-01 07:16:39'),
(65, 19, 'Tepat waktu', '2025-07-01 07:17:10'),
(66, 20, 'Tepat waktu', '2025-07-01 07:17:10'),
(67, 21, 'Tepat waktu', '2025-07-01 07:17:10'),
(68, 22, 'Tidak tepat waktu', '2025-07-01 07:17:10'),
(69, 23, 'Tidak tepat waktu', '2025-07-01 07:17:10'),
(70, 19, 'Tepat waktu', '2025-07-01 07:17:40'),
(71, 20, 'Tepat waktu', '2025-07-01 07:17:40'),
(72, 21, 'Tepat waktu', '2025-07-01 07:17:40'),
(73, 22, 'Tidak tepat waktu', '2025-07-01 07:17:40'),
(74, 23, 'Tepat waktu', '2025-07-01 07:17:40'),
(75, 19, 'Tepat waktu', '2025-07-01 07:18:18'),
(76, 20, 'Tepat waktu', '2025-07-01 07:18:18'),
(77, 21, 'Tepat waktu', '2025-07-01 07:18:18'),
(78, 22, 'Tidak tepat waktu', '2025-07-01 07:18:18'),
(79, 23, 'Tidak tepat waktu', '2025-07-01 07:18:18'),
(80, 19, 'Tepat waktu', '2025-07-01 08:04:33'),
(81, 20, 'Tepat waktu', '2025-07-01 08:04:33'),
(82, 21, 'Tepat waktu', '2025-07-01 08:04:33'),
(83, 22, 'Tidak tepat waktu', '2025-07-01 08:04:33'),
(84, 23, 'Tidak tepat waktu', '2025-07-01 08:04:33'),
(85, 24, 'Tidak tepat waktu', '2025-07-01 08:04:33'),
(86, 19, 'Tepat waktu', '2025-07-01 08:05:08'),
(87, 20, 'Tepat waktu', '2025-07-01 08:05:08'),
(88, 21, 'Tepat waktu', '2025-07-01 08:05:08'),
(89, 22, 'Tepat waktu', '2025-07-01 08:05:08'),
(90, 23, 'Tidak tepat waktu', '2025-07-01 08:05:08'),
(91, 24, 'Tidak tepat waktu', '2025-07-01 08:05:08'),
(92, 19, 'Tepat waktu', '2025-07-01 08:05:28'),
(93, 20, 'Tepat waktu', '2025-07-01 08:05:28'),
(94, 21, 'Tepat waktu', '2025-07-01 08:05:28'),
(95, 22, 'Tepat waktu', '2025-07-01 08:05:28'),
(96, 23, 'Tidak tepat waktu', '2025-07-01 08:05:28'),
(97, 24, 'Tidak tepat waktu', '2025-07-01 08:05:28'),
(98, 19, 'Tepat waktu', '2025-07-01 08:11:49'),
(99, 20, 'Tepat waktu', '2025-07-01 08:11:49'),
(100, 21, 'Tepat waktu', '2025-07-01 08:11:49'),
(101, 22, 'Tepat waktu', '2025-07-01 08:11:49'),
(102, 23, 'Tidak tepat waktu', '2025-07-01 08:11:49'),
(103, 19, 'Tepat waktu', '2025-07-01 08:15:01'),
(104, 20, 'Tepat waktu', '2025-07-01 08:15:02'),
(105, 21, 'Tepat waktu', '2025-07-01 08:15:02'),
(106, 22, 'Tepat waktu', '2025-07-01 08:15:02'),
(107, 23, 'Tidak tepat waktu', '2025-07-01 08:15:02'),
(108, 24, 'Tidak tepat waktu', '2025-07-01 08:15:02'),
(109, 19, 'Tepat waktu', '2025-07-01 08:18:50'),
(110, 20, 'Tepat waktu', '2025-07-01 08:18:50'),
(111, 21, 'Tepat waktu', '2025-07-01 08:18:50'),
(112, 22, 'Tepat waktu', '2025-07-01 08:18:50'),
(113, 23, 'Tidak tepat waktu', '2025-07-01 08:18:50'),
(114, 24, 'Tidak tepat waktu', '2025-07-01 08:18:50'),
(115, 19, 'Tepat waktu', '2025-07-01 08:34:42'),
(116, 20, 'Tepat waktu', '2025-07-01 08:34:42'),
(117, 21, 'Tepat waktu', '2025-07-01 08:34:42'),
(118, 22, 'Tepat waktu', '2025-07-01 08:34:42'),
(119, 23, 'Tidak tepat waktu', '2025-07-01 08:34:42'),
(120, 24, 'Tidak tepat waktu', '2025-07-01 08:34:42'),
(121, 25, 'Tidak tepat waktu', '2025-07-01 08:34:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'mahasiswa', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1Hgx0XL06ilPRkbhTpEqqP8WMGzmunbz8c4BVaGV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiazAxOVA0RXRBWXpSZFZoYUdES3pnS2dzRzJEalkzYVo2QmdFOHFnMyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXRhLW1haGFzaXN3YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo3OiJ1c2VyX2lkIjtpOjE7czo4OiJ1c2VybmFtZSI7czo1OiJhZG1pbiI7czo0OiJyb2xlIjtzOjU6ImFkbWluIjtzOjY6InN0YXR1cyI7czo1OiJha3RpZiI7fQ==', 1751358883),
('ZDaUlXq6MvjbGVd3eE7WjwduCS7qzMI0nUGKOmmR', 40, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:127.0) Gecko/20100101 Firefox/127.0', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiYVhXUjc3WjZaSDE1MlhlQURHUENFb1MyeUN2SXcya2k4NHpuVkVJUyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9oYXNpbC8yMTA5MDAzNCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQwO3M6NzoidXNlcl9pZCI7aTo0MDtzOjg6InVzZXJuYW1lIjtzOjg6IjIxMDkwMDM0IjtzOjQ6InJvbGUiO3M6OToibWFoYXNpc3dhIjtzOjY6InN0YXR1cyI7czo1OiJha3RpZiI7fQ==', 1751357915);

-- --------------------------------------------------------

--
-- Struktur dari tabel `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` bigint(20) UNSIGNED NOT NULL,
  `waktu_kelulusan` varchar(50) NOT NULL,
  `solusi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `waktu_kelulusan`, `solusi`, `created_at`, `updated_at`) VALUES
(16, 'Tepat Waktu', 'Prediksi Anda lulus tepat waktu. Pertahankan semangat dan kedisplinan agar hasil akhir tetap sesuai harapan', '2025-02-16 02:30:58', '2025-06-29 22:49:07'),
(18, 'Tidak Tepat Waktu', 'Prediksi Anda belum lulus tepat waktu. Tingkatkan fokus, manajemen waktu, dan semangat belajar untuk mengejra ketertinggalan!', '2025-06-25 18:03:28', '2025-06-29 22:49:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','mahasiswa') NOT NULL DEFAULT 'admin',
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$2KWdkM8A2mjP3CMal.ujNezcVp5N48UCs8MZVEWeJTh./47GIB4uS', 'admin', 'aktif', NULL, '2025-05-15 22:24:42', '2025-05-15 22:24:42'),
(2, '21090039', '$2y$12$fCbQ7lUc9mt1xlB2Z7xEPeCKkzq40fkcltgPttLsyiEQ77qc74VWW', 'mahasiswa', 'aktif', NULL, '2025-05-15 22:37:48', '2025-05-15 22:37:48'),
(9, '21090004', '$2y$12$deh.df7qSAZZrHkAfdpM6.g6CB69papKWBK0TG6eyaNKU3WBVi6my', 'mahasiswa', 'aktif', NULL, '2025-06-14 01:46:29', '2025-06-14 01:46:29'),
(38, '21090097', '$2y$12$zvGDLWGxvxpfBasDfDgAzuINWAoOe5C6W9lMVwMvP2xfApJw.tnIi', 'mahasiswa', 'aktif', NULL, '2025-06-30 05:58:08', '2025-06-30 05:58:08'),
(39, '21090070', '$2y$12$SMnJLOcwcuojadNrffLXneYnIFznwc/bJ7hYe7dfEVJzvmHv1/7v2', 'mahasiswa', 'aktif', NULL, '2025-06-30 23:38:19', '2025-06-30 23:38:19'),
(40, '21090034', '$2y$12$86Ur2cQqIjO3bXfT2VO9J.R00vOIKnR.pNaRsxv4SFXA0NyuPLBVW', 'mahasiswa', 'aktif', NULL, '2025-07-01 00:30:24', '2025-07-01 00:30:24'),
(41, '21090033', '$2y$12$cRhHXvxR22MaP/VQSwjCEOmrf.AusWmxrcp/zvBDrbNSWk60992Iq', 'mahasiswa', 'aktif', NULL, '2025-07-01 00:49:27', '2025-07-01 00:49:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `catatans`
--
ALTER TABLE `catatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `history_predict`
--
ALTER TABLE `history_predict`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `prediksi_kelulusan`
--
ALTER TABLE `prediksi_kelulusan`
  ADD PRIMARY KEY (`prediksi_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `catatans`
--
ALTER TABLE `catatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_predict`
--
ALTER TABLE `history_predict`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `prediksi_kelulusan`
--
ALTER TABLE `prediksi_kelulusan`
  MODIFY `prediksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `prediksi_kelulusan`
--
ALTER TABLE `prediksi_kelulusan`
  ADD CONSTRAINT `prediksi_kelulusan_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `data_mahasiswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
