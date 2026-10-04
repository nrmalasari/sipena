-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Okt 2026 pada 13.01
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lan`
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
-- Struktur dari tabel `login_pengujis`
--

CREATE TABLE `login_pengujis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('penguji','admin') NOT NULL DEFAULT 'penguji',
  `tipe_penguji` enum('wawancara','tertulis','none') NOT NULL DEFAULT 'none',
  `nip` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `kelompok` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `login_pengujis`
--

INSERT INTO `login_pengujis` (`id`, `nama`, `email`, `username`, `password`, `role`, `tipe_penguji`, `nip`, `no_hp`, `jabatan`, `instansi`, `kelompok`, `is_active`, `last_login_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator LAN RI', 'admin@lanri.go.id', 'admin', '$2y$12$GjCqi4RqRVPslW0ngzoFNOqzre12mYE.ajckUF98BiIi.ejIMCBC6', 'admin', 'none', NULL, NULL, 'Administrator Sistem', 'LAN RI', NULL, 1, '2026-09-27 00:09:55', NULL, '2026-09-25 00:20:54', '2026-09-27 00:09:55'),
(11, 'Dr. Muhammad Aswad, M.Si', 'muhammad.aswad@lanri.go.id', 'm.aswad', '$2y$12$IVnEYI77sMhrC9xHy5HLmOP1K/DGm.eixCyf4J/gVHd2A/C7plnZy', 'penguji', 'wawancara', NULL, NULL, 'Kepala PUSJAR SKMP', 'LAN PUSJAR SKMP', NULL, 1, NULL, NULL, '2026-09-28 17:33:02', '2026-09-28 17:33:02'),
(12, 'Zulchaidir, S.Sos., MPA', 'zulchaidir@lanri.go.id', 'zulchaidir', '$2y$12$Qlt4xb8.C9ije76gWkkCiOIeyExVczSLjpzm.fUnxv4nw9GsNIjqS', 'penguji', 'wawancara', NULL, NULL, 'Kepala Bagian Umum PUSJAR SKMP', 'LAN PUSJAR SKMP', NULL, 1, NULL, NULL, '2026-09-28 17:34:56', '2026-09-28 17:34:56'),
(13, 'Satria Eka Tri Laksana, S.IP., M.AP', 'satria.laksana@lanri.go.id', 'satria.laksana', '$2y$12$Z4kLgN3Wsgr6EeRZQfV00e7HuQ99ijsR8.kdkS/LUVdlzyF.P.c.W', 'penguji', 'wawancara', NULL, NULL, 'Analis Kebijakan Ahli Muda', 'LAN PUSJAR SKMP', NULL, 1, NULL, NULL, '2026-09-28 17:38:31', '2026-09-28 18:14:01'),
(14, 'Wahyuni Fajaruddin, S.H., M.H.', 'wahyuni.fajaruddin@lanri.go.id', 'wahyuni.f', '$2y$12$BZKJbiqQ5IXwoSpTZ9oT2eNQSaYPcTI40Kmxw6DqJ6h8CgWFWRtfO', 'penguji', 'wawancara', NULL, NULL, 'Analis Kebijakan Ahli Muda', 'LAN PUSJAR SKMP', NULL, 1, NULL, NULL, '2026-09-28 17:40:11', '2026-09-28 18:13:33'),
(15, 'Ayun Sri Damayanti, S.H., M.H.', 'ayun.damayanti@lanri.go.id', 'ayun.damayanti', '$2y$12$rU0fEJHkNYKa1hTD3hIiPOeiBWURNP6VvjOhnNxh.gMESiZQ2V112', 'penguji', 'wawancara', NULL, NULL, 'Analis Kebijakan Ahli Muda', 'LAN PUSJAR SKMP', NULL, 1, NULL, NULL, '2026-09-28 17:43:16', '2026-09-28 18:13:22'),
(16, 'Muhamad Ikbal Thola, S.Si., M.Si', 'muhamad.ikbal@lanri.go.id', 'muhamad.ikbal', '$2y$12$pHyyqsfbx35XdNB8ipHhqujAOfTtDOagFcmyFTRh21BJX4hCwnCcS', 'penguji', 'wawancara', NULL, NULL, 'Analis Kebijakan Ahli Muda', 'LAN PUSJAR SKMP', NULL, 1, NULL, NULL, '2026-09-28 17:44:33', '2026-09-28 18:13:10'),
(18, 'Dr. Novayanti Sopia Rukmana, S.Sos., M.Si', 'novayanti.sopia@lanri.go.id', 'novayanti.s', '$2y$12$Alu264thMrlQQt1yfKJ9Re5J9HISGA2SBshVK2qoQpmwB7zMwwAzq', 'penguji', 'tertulis', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2026-10-01 22:09:19', '2026-10-01 22:09:19'),
(19, 'Dr. Didik Iskandar, S.Sos., M.Si', 'didik.iskandar@lanri.go.id', 'didik.i', '$2y$12$C47gQyLh7UWkeF3F3S1INuDndXIjBmbRObaln6xLSOsjHyeV6klTe', 'penguji', 'tertulis', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2026-10-01 22:10:31', '2026-10-01 22:10:31'),
(20, 'Dr. Muh Tang Abdullah, S.Sos., M.AP', 'muh.tang@lanri.go.id', 'muh.tang', '$2y$12$nzYoszW1Thz9Z5Z0oJj/Levo/kqXeEpEgYahHXXGAl/wEocgoJ79.', 'penguji', 'tertulis', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2026-10-01 22:12:27', '2026-10-01 22:12:27');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_23_040441_create_login_pengujis_table', 1),
(5, '2026_09_24_070821_add_columns_to_login_pengujis_table', 1),
(6, '2026_09_25_035005_create_pesertas_table', 1),
(7, '2026_09_25_035026_create_penilais_table', 1),
(8, '2026_09_25_035043_create_penugasan_penilais_table', 1),
(9, '2026_09_25_060626_add_kelompok_to_pesertas_table', 1),
(10, '2026_09_25_063239_change_tipe_to_boolean_on_penilais_table', 1),
(11, '2026_09_25_065340_add_login_info_to_penilais_table', 1),
(12, '2026_09_25_070340_add_login_penguji_id_to_penugasan_penilais_table', 1),
(13, '2026_09_27_033303_drop_kelompok_from_pesertas_table', 2),
(15, '2026_09_27_051725_create_penilaians_table', 3),
(16, '2026_09_27_053106_create_penilaian_details_table', 3),
(17, '2026_09_27_053321_add_unique_to_penilaians_table', 3),
(18, '2026_09_27_061741_create_nilai_finals_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_finals`
--

CREATE TABLE `nilai_finals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peserta_id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `judul_unit` varchar(255) NOT NULL,
  `jenis_kompetensi` varchar(255) NOT NULL,
  `rata_rata_override` decimal(5,2) DEFAULT NULL,
  `nilai_final_override` decimal(5,2) DEFAULT NULL,
  `catatan_admin` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai_finals`
--

INSERT INTO `nilai_finals` (`id`, `peserta_id`, `tipe`, `judul_unit`, `jenis_kompetensi`, `rata_rata_override`, `nilai_final_override`, `catatan_admin`, `created_at`, `updated_at`) VALUES
(16, 13, 'wawancara', 'Kemampuan Analisis', 'Kompetensi Inti', 84.75, 63.56, NULL, '2026-09-28 18:52:38', '2026-09-28 18:53:30'),
(17, 13, 'wawancara', 'Kemampuan Analisis', 'Kompetensi Dasar', 86.25, 21.56, NULL, '2026-09-28 18:52:38', '2026-09-28 18:53:30'),
(18, 13, 'wawancara', 'Kemampuan Politis', 'Kompetensi Inti+Spesialis', 81.43, 61.07, NULL, '2026-09-28 18:52:38', '2026-09-28 18:53:30'),
(19, 13, 'wawancara', 'Kemampuan Politis', 'Kompetensi Dasar', 86.25, 21.56, NULL, '2026-09-28 18:52:38', '2026-09-28 18:53:30'),
(20, 35, 'wawancara', 'Kemampuan Analisis', 'Kompetensi Inti', 82.38, 45.31, NULL, '2026-09-30 19:33:01', '2026-10-01 22:58:16'),
(21, 35, 'wawancara', 'Kemampuan Analisis', 'Kompetensi Dasar', 83.25, 4.16, NULL, '2026-09-30 19:33:01', '2026-10-01 22:58:16'),
(22, 35, 'wawancara', 'Kemampuan Politis', 'Kompetensi Inti+Spesialis', 84.57, 46.51, NULL, '2026-09-30 19:33:01', '2026-10-01 22:58:16'),
(23, 35, 'wawancara', 'Kemampuan Politis', 'Kompetensi Dasar', 83.25, 4.16, NULL, '2026-09-30 19:33:01', '2026-10-01 22:58:16'),
(24, 35, 'tertulis', 'Kemampuan Analisis', 'Kompetensi Inti', 84.00, 33.20, NULL, '2026-09-30 19:36:30', '2026-10-01 22:07:24'),
(25, 35, 'tertulis', 'Kemampuan Analisis', 'Kompetensi Spesialis', 80.00, 33.20, NULL, '2026-09-30 19:36:30', '2026-10-01 22:07:24'),
(26, 35, 'tertulis', 'Kemampuan Politis', 'Kompetensi Inti', 80.00, 32.00, NULL, '2026-09-30 19:36:30', '2026-10-01 22:07:24'),
(27, 12, 'wawancara', 'Kemampuan Analisis', 'Kompetensi Inti', 84.50, 63.38, NULL, '2026-09-30 19:50:03', '2026-09-30 23:44:59'),
(28, 12, 'wawancara', 'Kemampuan Analisis', 'Kompetensi Dasar', 83.25, 20.81, NULL, '2026-09-30 19:50:03', '2026-09-30 23:44:59'),
(29, 12, 'wawancara', 'Kemampuan Politis', 'Kompetensi Inti+Spesialis', 76.86, 57.64, NULL, '2026-09-30 19:50:03', '2026-09-30 23:44:59'),
(30, 12, 'wawancara', 'Kemampuan Politis', 'Kompetensi Dasar', 83.25, 20.81, NULL, '2026-09-30 19:50:03', '2026-09-30 23:44:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaians`
--

CREATE TABLE `penilaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peserta_id` bigint(20) UNSIGNED NOT NULL,
  `penilai_id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `nilai` decimal(5,2) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilaians`
--

INSERT INTO `penilaians` (`id`, `peserta_id`, `penilai_id`, `tipe`, `nilai`, `catatan`, `status`, `created_at`, `updated_at`) VALUES
(9, 13, 12, 'wawancara', NULL, NULL, 'draft', '2026-09-28 18:46:19', '2026-09-28 18:54:16'),
(10, 13, 13, 'wawancara', NULL, NULL, 'draft', '2026-09-28 18:46:28', '2026-09-28 18:54:40'),
(11, 35, 17, 'wawancara', 82.32, 'terimakasih', 'selesai', '2026-09-29 19:10:07', '2026-09-30 19:32:43'),
(12, 35, 16, 'wawancara', 85.55, 'oke', 'selesai', '2026-09-29 19:33:00', '2026-09-30 19:33:36'),
(14, 12, 12, 'wawancara', 81.36, 'oke', 'selesai', '2026-09-30 19:47:37', '2026-09-30 19:48:30'),
(15, 12, 13, 'wawancara', 77.45, 'bagus', 'selesai', '2026-09-30 19:49:12', '2026-09-30 19:49:44'),
(16, 30, 20, 'tertulis', 46.00, NULL, 'draft', '2026-10-01 22:28:57', '2026-10-01 22:28:57'),
(17, 35, 20, 'tertulis', 82.40, 'bagus', 'selesai', '2026-10-01 22:31:05', '2026-10-01 22:33:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_details`
--

CREATE TABLE `penilaian_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peserta_id` bigint(20) UNSIGNED NOT NULL,
  `penilai_id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nilai` decimal(5,2) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilaian_details`
--

INSERT INTO `penilaian_details` (`id`, `peserta_id`, `penilai_id`, `tipe`, `urutan`, `nilai`, `catatan`, `created_at`, `updated_at`) VALUES
(77, 13, 12, 'wawancara', 0, NULL, NULL, '2026-09-28 18:46:19', '2026-09-28 18:53:54'),
(78, 13, 13, 'wawancara', 0, NULL, NULL, '2026-09-28 18:46:28', '2026-09-28 18:54:35'),
(79, 13, 12, 'wawancara', 1, NULL, NULL, '2026-09-28 18:46:52', '2026-09-28 18:53:57'),
(80, 13, 12, 'wawancara', 2, NULL, NULL, '2026-09-28 18:51:45', '2026-09-28 18:53:58'),
(81, 13, 12, 'wawancara', 3, NULL, NULL, '2026-09-28 18:51:47', '2026-09-28 18:54:01'),
(82, 13, 12, 'wawancara', 4, NULL, NULL, '2026-09-28 18:51:51', '2026-09-28 18:54:03'),
(83, 13, 12, 'wawancara', 5, NULL, NULL, '2026-09-28 18:51:56', '2026-09-28 18:54:04'),
(84, 13, 12, 'wawancara', 6, NULL, NULL, '2026-09-28 18:51:59', '2026-09-28 18:54:07'),
(85, 13, 12, 'wawancara', 7, NULL, NULL, '2026-09-28 18:52:00', '2026-09-28 18:54:08'),
(86, 13, 12, 'wawancara', 8, NULL, NULL, '2026-09-28 18:52:02', '2026-09-28 18:54:10'),
(87, 13, 12, 'wawancara', 9, NULL, NULL, '2026-09-28 18:52:05', '2026-09-28 18:54:11'),
(88, 13, 12, 'wawancara', 10, NULL, NULL, '2026-09-28 18:52:06', '2026-09-28 18:54:13'),
(89, 13, 13, 'wawancara', 1, NULL, NULL, '2026-09-28 18:53:01', '2026-09-28 18:54:34'),
(90, 13, 13, 'wawancara', 2, NULL, NULL, '2026-09-28 18:53:05', '2026-09-28 18:54:31'),
(91, 13, 13, 'wawancara', 3, NULL, NULL, '2026-09-28 18:53:06', '2026-09-28 18:54:30'),
(92, 13, 13, 'wawancara', 4, NULL, NULL, '2026-09-28 18:53:08', '2026-09-28 18:54:29'),
(93, 13, 13, 'wawancara', 5, NULL, NULL, '2026-09-28 18:53:10', '2026-09-28 18:54:28'),
(94, 13, 13, 'wawancara', 6, NULL, NULL, '2026-09-28 18:53:11', '2026-09-28 18:54:26'),
(95, 13, 13, 'wawancara', 7, NULL, NULL, '2026-09-28 18:53:13', '2026-09-28 18:54:24'),
(96, 13, 13, 'wawancara', 8, NULL, NULL, '2026-09-28 18:53:14', '2026-09-28 18:54:23'),
(97, 13, 13, 'wawancara', 9, NULL, NULL, '2026-09-28 18:53:17', '2026-09-28 18:54:22'),
(98, 13, 13, 'wawancara', 10, NULL, NULL, '2026-09-28 18:53:19', '2026-09-28 18:54:21'),
(99, 35, 17, 'wawancara', 0, 80.00, NULL, '2026-09-29 19:10:07', '2026-09-30 19:25:12'),
(100, 35, 16, 'wawancara', 0, 85.00, NULL, '2026-09-29 19:33:00', '2026-09-30 19:27:05'),
(101, 35, 17, 'wawancara', 1, 75.50, NULL, '2026-09-30 19:25:32', '2026-09-30 19:25:44'),
(102, 35, 16, 'wawancara', 1, 89.00, NULL, '2026-09-30 19:27:12', '2026-09-30 19:27:24'),
(103, 35, 17, 'wawancara', 2, 90.00, NULL, '2026-09-30 19:28:46', '2026-09-30 19:28:46'),
(104, 35, 16, 'wawancara', 2, 78.00, NULL, '2026-09-30 19:28:49', '2026-09-30 19:28:49'),
(105, 35, 17, 'wawancara', 3, 86.00, NULL, '2026-09-30 19:28:59', '2026-09-30 19:29:01'),
(106, 35, 16, 'wawancara', 3, 75.00, NULL, '2026-09-30 19:29:04', '2026-09-30 19:29:04'),
(107, 35, 17, 'wawancara', 4, 90.00, NULL, '2026-09-30 19:29:09', '2026-09-30 19:29:09'),
(108, 35, 16, 'wawancara', 4, 90.00, NULL, '2026-09-30 19:29:12', '2026-09-30 19:29:12'),
(109, 35, 17, 'wawancara', 5, 74.00, NULL, '2026-09-30 19:29:19', '2026-09-30 19:29:19'),
(110, 35, 16, 'wawancara', 5, 87.00, NULL, '2026-09-30 19:29:22', '2026-09-30 19:29:23'),
(111, 35, 17, 'wawancara', 6, 86.00, NULL, '2026-09-30 19:29:26', '2026-09-30 19:30:08'),
(112, 35, 16, 'wawancara', 6, 90.00, NULL, '2026-09-30 19:29:48', '2026-09-30 19:30:04'),
(113, 35, 17, 'wawancara', 7, 78.00, NULL, '2026-09-30 19:30:12', '2026-09-30 19:30:12'),
(114, 35, 16, 'wawancara', 7, 87.00, NULL, '2026-09-30 19:30:16', '2026-09-30 19:30:16'),
(115, 35, 17, 'wawancara', 8, 89.00, NULL, '2026-09-30 19:30:19', '2026-09-30 19:30:19'),
(116, 35, 16, 'wawancara', 8, 84.00, NULL, '2026-09-30 19:30:22', '2026-09-30 19:30:26'),
(117, 35, 17, 'wawancara', 9, 68.00, NULL, '2026-09-30 19:30:29', '2026-09-30 19:30:29'),
(118, 35, 16, 'wawancara', 9, 98.00, NULL, '2026-09-30 19:30:31', '2026-09-30 19:30:31'),
(119, 35, 17, 'wawancara', 10, 89.00, NULL, '2026-09-30 19:30:36', '2026-09-30 19:30:36'),
(120, 35, 16, 'wawancara', 10, 78.00, NULL, '2026-09-30 19:30:38', '2026-09-30 19:30:38'),
(121, 35, 12, 'tertulis', 0, 90.00, NULL, '2026-09-30 19:35:34', '2026-10-01 22:06:39'),
(122, 35, 12, 'tertulis', 1, 75.00, NULL, '2026-09-30 19:35:36', '2026-10-01 22:06:47'),
(123, 35, 12, 'tertulis', 2, 87.00, NULL, '2026-09-30 19:35:39', '2026-10-01 22:06:55'),
(124, 35, 12, 'tertulis', 3, 80.00, NULL, '2026-09-30 19:35:43', '2026-10-01 22:07:01'),
(125, 35, 12, 'tertulis', 4, 80.00, NULL, '2026-09-30 19:35:45', '2026-10-01 22:07:07'),
(126, 12, 12, 'wawancara', 0, 87.00, NULL, '2026-09-30 19:47:37', '2026-09-30 19:47:45'),
(127, 12, 12, 'wawancara', 1, 98.00, NULL, '2026-09-30 19:47:48', '2026-09-30 19:47:48'),
(128, 12, 12, 'wawancara', 2, 78.00, NULL, '2026-09-30 19:47:50', '2026-09-30 19:47:52'),
(129, 12, 12, 'wawancara', 3, 90.00, NULL, '2026-09-30 19:47:55', '2026-09-30 19:48:04'),
(130, 12, 12, 'wawancara', 4, 76.00, NULL, '2026-09-30 19:48:07', '2026-09-30 19:48:07'),
(131, 12, 12, 'wawancara', 5, 84.00, NULL, '2026-09-30 19:48:09', '2026-09-30 19:48:10'),
(132, 12, 12, 'wawancara', 6, 78.00, NULL, '2026-09-30 19:48:12', '2026-09-30 19:48:12'),
(133, 12, 12, 'wawancara', 7, 98.00, NULL, '2026-09-30 19:48:16', '2026-09-30 19:48:16'),
(134, 12, 12, 'wawancara', 8, 66.00, NULL, '2026-09-30 19:48:18', '2026-09-30 19:48:18'),
(135, 12, 12, 'wawancara', 9, 70.00, NULL, '2026-09-30 19:48:20', '2026-09-30 19:48:20'),
(136, 12, 12, 'wawancara', 10, 70.00, NULL, '2026-09-30 19:48:24', '2026-09-30 19:48:24'),
(137, 12, 13, 'wawancara', 0, 98.00, NULL, '2026-09-30 19:49:12', '2026-09-30 19:49:12'),
(138, 12, 13, 'wawancara', 1, 55.00, NULL, '2026-09-30 19:49:14', '2026-09-30 19:49:14'),
(139, 12, 13, 'wawancara', 2, 60.00, NULL, '2026-09-30 19:49:16', '2026-09-30 19:49:16'),
(140, 12, 13, 'wawancara', 3, 70.00, NULL, '2026-09-30 19:49:18', '2026-09-30 19:49:18'),
(141, 12, 13, 'wawancara', 4, 88.00, NULL, '2026-09-30 19:49:19', '2026-09-30 19:49:19'),
(142, 12, 13, 'wawancara', 5, 69.00, NULL, '2026-09-30 19:49:23', '2026-09-30 19:49:23'),
(143, 12, 13, 'wawancara', 6, 77.00, NULL, '2026-09-30 19:49:24', '2026-09-30 19:49:24'),
(144, 12, 13, 'wawancara', 7, 86.00, NULL, '2026-09-30 19:49:27', '2026-09-30 19:49:28'),
(145, 12, 13, 'wawancara', 8, 56.00, NULL, '2026-09-30 19:49:30', '2026-09-30 19:49:30'),
(146, 12, 13, 'wawancara', 9, 98.00, NULL, '2026-09-30 19:49:32', '2026-09-30 19:49:32'),
(147, 12, 13, 'wawancara', 10, 95.00, NULL, '2026-09-30 19:49:36', '2026-09-30 19:49:38'),
(148, 30, 20, 'tertulis', 4, 46.00, NULL, '2026-10-01 22:28:57', '2026-10-01 22:28:57'),
(149, 35, 20, 'tertulis', 0, 90.00, NULL, '2026-10-01 22:31:05', '2026-10-01 22:31:05'),
(150, 35, 20, 'tertulis', 1, 75.00, NULL, '2026-10-01 22:31:09', '2026-10-01 22:31:10'),
(151, 35, 20, 'tertulis', 2, 87.00, NULL, '2026-10-01 22:31:22', '2026-10-01 22:31:22'),
(152, 35, 20, 'tertulis', 3, 80.00, NULL, '2026-10-01 22:31:25', '2026-10-01 22:31:25'),
(153, 35, 20, 'tertulis', 4, 80.00, NULL, '2026-10-01 22:31:28', '2026-10-01 22:31:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilais`
--

CREATE TABLE `penilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_penguji_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `is_wawancara` tinyint(1) NOT NULL DEFAULT 0,
  `is_tertulis` tinyint(1) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilais`
--

INSERT INTO `penilais` (`id`, `login_penguji_id`, `nama`, `email`, `username`, `password`, `nip`, `jabatan`, `instansi`, `is_wawancara`, `is_tertulis`, `keterangan`, `is_active`, `created_at`, `updated_at`) VALUES
(12, 11, 'Dr. Muhammad Aswad, M.Si', 'muhammad.aswad@lanri.go.id', 'm.aswad', '$2y$12$IVnEYI77sMhrC9xHy5HLmOP1K/DGm.eixCyf4J/gVHd2A/C7plnZy', NULL, 'Kepala PUSJAR SKMP', 'LAN PUSJAR SKMP', 1, 0, NULL, 1, '2026-09-28 17:33:02', '2026-10-01 22:24:13'),
(13, 12, 'Zulchaidir, S.Sos., MPA', 'zulchaidir@lanri.go.id', 'zulchaidir', '$2y$12$Qlt4xb8.C9ije76gWkkCiOIeyExVczSLjpzm.fUnxv4nw9GsNIjqS', NULL, 'Kepala Bagian Umum PUSJAR SKMP', 'LAN PUSJAR SKMP', 1, 0, NULL, 1, '2026-09-28 17:34:56', '2026-10-01 22:01:59'),
(14, 13, 'Satria Eka Tri Laksana, S.IP., M.AP', 'satria.laksana@lanri.go.id', 'satria.laksana', '$2y$12$Z4kLgN3Wsgr6EeRZQfV00e7HuQ99ijsR8.kdkS/LUVdlzyF.P.c.W', NULL, 'Analis Kebijakan Ahli Muda', 'LAN PUSJAR SKMP', 1, 0, NULL, 1, '2026-09-28 17:38:31', '2026-09-28 18:14:01'),
(15, 14, 'Wahyuni Fajaruddin, S.H., M.H.', 'wahyuni.fajaruddin@lanri.go.id', 'wahyuni.f', '$2y$12$BZKJbiqQ5IXwoSpTZ9oT2eNQSaYPcTI40Kmxw6DqJ6h8CgWFWRtfO', NULL, 'Analis Kebijakan Ahli Muda', 'LAN PUSJAR SKMP', 1, 0, NULL, 1, '2026-09-28 17:40:11', '2026-09-28 18:13:33'),
(16, 15, 'Ayun Sri Damayanti, S.H., M.H.', 'ayun.damayanti@lanri.go.id', 'ayun.damayanti', '$2y$12$rU0fEJHkNYKa1hTD3hIiPOeiBWURNP6VvjOhnNxh.gMESiZQ2V112', NULL, 'Analis Kebijakan Ahli Muda', 'LAN PUSJAR SKMP', 1, 0, NULL, 1, '2026-09-28 17:43:16', '2026-09-28 18:13:22'),
(17, 16, 'Muhamad Ikbal Thola, S.Si., M.Si', 'muhamad.ikbal@lanri.go.id', 'muhamad.ikbal', '$2y$12$pHyyqsfbx35XdNB8ipHhqujAOfTtDOagFcmyFTRh21BJX4hCwnCcS', NULL, 'Analis Kebijakan Ahli Muda', 'LAN PUSJAR SKMP', 1, 0, NULL, 1, '2026-09-28 17:44:33', '2026-09-28 18:13:10'),
(19, 18, 'Dr. Novayanti Sopia Rukmana, S.Sos., M.Si', 'novayanti.sopia@lanri.go.id', 'novayanti.s', '$2y$12$Alu264thMrlQQt1yfKJ9Re5J9HISGA2SBshVK2qoQpmwB7zMwwAzq', NULL, NULL, NULL, 0, 1, NULL, 1, '2026-10-01 22:09:19', '2026-10-01 22:09:19'),
(20, 19, 'Dr. Didik Iskandar, S.Sos., M.Si', 'didik.iskandar@lanri.go.id', 'didik.i', '$2y$12$C47gQyLh7UWkeF3F3S1INuDndXIjBmbRObaln6xLSOsjHyeV6klTe', NULL, NULL, NULL, 0, 1, NULL, 1, '2026-10-01 22:10:31', '2026-10-01 22:10:31'),
(21, 20, 'Dr. Muh Tang Abdullah, S.Sos., M.AP', 'muh.tang@lanri.go.id', 'muh.tang', '$2y$12$nzYoszW1Thz9Z5Z0oJj/Levo/kqXeEpEgYahHXXGAl/wEocgoJ79.', NULL, NULL, NULL, 0, 1, NULL, 1, '2026-10-01 22:12:28', '2026-10-01 22:12:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penugasan_penilais`
--

CREATE TABLE `penugasan_penilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peserta_id` bigint(20) UNSIGNED NOT NULL,
  `penilai_id` bigint(20) UNSIGNED NOT NULL,
  `login_penguji_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipe` enum('wawancara','tertulis') NOT NULL,
  `urutan` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penugasan_penilais`
--

INSERT INTO `penugasan_penilais` (`id`, `peserta_id`, `penilai_id`, `login_penguji_id`, `tipe`, `urutan`, `created_at`, `updated_at`) VALUES
(138, 12, 12, 11, 'wawancara', 1, '2026-09-29 16:26:11', '2026-09-29 16:26:11'),
(139, 12, 13, 12, 'wawancara', 2, '2026-09-29 16:26:11', '2026-09-29 16:26:11'),
(140, 13, 12, 11, 'wawancara', 1, '2026-09-29 16:26:47', '2026-09-29 16:26:47'),
(141, 13, 13, 12, 'wawancara', 2, '2026-09-29 16:26:47', '2026-09-29 16:26:47'),
(142, 14, 12, 11, 'wawancara', 1, '2026-09-29 16:27:14', '2026-09-29 16:27:14'),
(143, 14, 13, 12, 'wawancara', 2, '2026-09-29 16:27:14', '2026-09-29 16:27:14'),
(144, 15, 12, 11, 'wawancara', 1, '2026-09-29 16:27:45', '2026-09-29 16:27:45'),
(145, 15, 13, 12, 'wawancara', 2, '2026-09-29 16:27:45', '2026-09-29 16:27:45'),
(146, 16, 12, 11, 'wawancara', 1, '2026-09-29 16:28:46', '2026-09-29 16:28:46'),
(147, 16, 13, 12, 'wawancara', 2, '2026-09-29 16:28:46', '2026-09-29 16:28:46'),
(148, 17, 12, 11, 'wawancara', 1, '2026-09-29 16:29:58', '2026-09-29 16:29:58'),
(149, 17, 13, 12, 'wawancara', 2, '2026-09-29 16:29:58', '2026-09-29 16:29:58'),
(150, 19, 12, 11, 'wawancara', 1, '2026-09-29 16:30:28', '2026-09-29 16:30:28'),
(151, 19, 13, 12, 'wawancara', 2, '2026-09-29 16:30:28', '2026-09-29 16:30:28'),
(158, 18, 12, 11, 'wawancara', 1, '2026-09-29 16:35:06', '2026-09-29 16:35:06'),
(159, 18, 13, 12, 'wawancara', 2, '2026-09-29 16:35:06', '2026-09-29 16:35:06'),
(163, 23, 14, 13, 'wawancara', 1, '2026-10-01 22:14:02', '2026-10-01 22:14:02'),
(164, 23, 15, 14, 'wawancara', 2, '2026-10-01 22:14:02', '2026-10-01 22:14:02'),
(165, 23, 19, 18, 'tertulis', 1, '2026-10-01 22:14:02', '2026-10-01 22:14:02'),
(169, 25, 14, 13, 'wawancara', 1, '2026-10-01 22:15:04', '2026-10-01 22:15:04'),
(170, 25, 15, 14, 'wawancara', 2, '2026-10-01 22:15:04', '2026-10-01 22:15:04'),
(171, 25, 19, 18, 'tertulis', 1, '2026-10-01 22:15:04', '2026-10-01 22:15:04'),
(172, 26, 14, 13, 'wawancara', 1, '2026-10-01 22:15:26', '2026-10-01 22:15:26'),
(173, 26, 15, 14, 'wawancara', 2, '2026-10-01 22:15:26', '2026-10-01 22:15:26'),
(174, 26, 19, 18, 'tertulis', 1, '2026-10-01 22:15:26', '2026-10-01 22:15:26'),
(175, 27, 14, 13, 'wawancara', 1, '2026-10-01 22:15:56', '2026-10-01 22:15:56'),
(176, 27, 15, 14, 'wawancara', 2, '2026-10-01 22:15:56', '2026-10-01 22:15:56'),
(177, 27, 19, 18, 'tertulis', 1, '2026-10-01 22:15:56', '2026-10-01 22:15:56'),
(181, 29, 14, 13, 'wawancara', 1, '2026-10-01 22:16:37', '2026-10-01 22:16:37'),
(182, 29, 15, 14, 'wawancara', 2, '2026-10-01 22:16:37', '2026-10-01 22:16:37'),
(183, 29, 19, 18, 'tertulis', 1, '2026-10-01 22:16:37', '2026-10-01 22:16:37'),
(184, 42, 14, 13, 'wawancara', 1, '2026-10-01 22:16:57', '2026-10-01 22:16:57'),
(185, 42, 15, 14, 'wawancara', 2, '2026-10-01 22:16:57', '2026-10-01 22:16:57'),
(186, 42, 19, 18, 'tertulis', 1, '2026-10-01 22:16:57', '2026-10-01 22:16:57'),
(187, 30, 14, 13, 'wawancara', 1, '2026-10-01 22:17:39', '2026-10-01 22:17:39'),
(188, 30, 15, 14, 'wawancara', 2, '2026-10-01 22:17:39', '2026-10-01 22:17:39'),
(189, 30, 20, 19, 'tertulis', 1, '2026-10-01 22:17:39', '2026-10-01 22:17:39'),
(190, 31, 14, 13, 'wawancara', 1, '2026-10-01 22:17:55', '2026-10-01 22:17:55'),
(191, 31, 15, 14, 'wawancara', 2, '2026-10-01 22:17:55', '2026-10-01 22:17:55'),
(192, 31, 20, 19, 'tertulis', 1, '2026-10-01 22:17:55', '2026-10-01 22:17:55'),
(193, 28, 14, 13, 'wawancara', 1, '2026-10-01 22:18:12', '2026-10-01 22:18:12'),
(194, 28, 15, 14, 'wawancara', 2, '2026-10-01 22:18:12', '2026-10-01 22:18:12'),
(195, 28, 20, 19, 'tertulis', 1, '2026-10-01 22:18:12', '2026-10-01 22:18:12'),
(202, 35, 17, 16, 'wawancara', 1, '2026-10-01 22:19:20', '2026-10-01 22:19:20'),
(203, 35, 16, 15, 'wawancara', 2, '2026-10-01 22:19:20', '2026-10-01 22:19:20'),
(204, 35, 20, 19, 'tertulis', 1, '2026-10-01 22:19:20', '2026-10-01 22:19:20'),
(205, 20, 12, 11, 'wawancara', 1, '2026-10-01 22:19:40', '2026-10-01 22:19:40'),
(206, 20, 13, 12, 'wawancara', 2, '2026-10-01 22:19:40', '2026-10-01 22:19:40'),
(207, 20, 20, 19, 'tertulis', 1, '2026-10-01 22:19:40', '2026-10-01 22:19:40'),
(208, 21, 12, 11, 'wawancara', 1, '2026-10-01 22:20:11', '2026-10-01 22:20:11'),
(209, 21, 13, 12, 'wawancara', 2, '2026-10-01 22:20:11', '2026-10-01 22:20:11'),
(210, 21, 20, 19, 'tertulis', 1, '2026-10-01 22:20:11', '2026-10-01 22:20:11'),
(217, 24, 14, 13, 'wawancara', 1, '2026-10-01 22:21:43', '2026-10-01 22:21:43'),
(218, 24, 15, 14, 'wawancara', 2, '2026-10-01 22:21:43', '2026-10-01 22:21:43'),
(219, 24, 21, 20, 'tertulis', 1, '2026-10-01 22:21:43', '2026-10-01 22:21:43'),
(220, 39, 17, 16, 'wawancara', 1, '2026-10-01 22:22:16', '2026-10-01 22:22:16'),
(221, 39, 16, 15, 'wawancara', 2, '2026-10-01 22:22:16', '2026-10-01 22:22:16'),
(222, 39, 21, 20, 'tertulis', 1, '2026-10-01 22:22:16', '2026-10-01 22:22:16'),
(223, 40, 17, 16, 'wawancara', 1, '2026-10-01 22:22:50', '2026-10-01 22:22:50'),
(224, 40, 16, 15, 'wawancara', 2, '2026-10-01 22:22:50', '2026-10-01 22:22:50'),
(225, 40, 21, 20, 'tertulis', 1, '2026-10-01 22:22:50', '2026-10-01 22:22:50'),
(226, 41, 17, 16, 'wawancara', 1, '2026-10-01 22:23:16', '2026-10-01 22:23:16'),
(227, 41, 16, 15, 'wawancara', 2, '2026-10-01 22:23:16', '2026-10-01 22:23:16'),
(228, 41, 21, 20, 'tertulis', 1, '2026-10-01 22:23:16', '2026-10-01 22:23:16'),
(229, 22, 12, 11, 'wawancara', 1, '2026-10-01 22:23:48', '2026-10-01 22:23:48'),
(230, 22, 13, 12, 'wawancara', 2, '2026-10-01 22:23:48', '2026-10-01 22:23:48'),
(231, 22, 21, 20, 'tertulis', 1, '2026-10-01 22:23:48', '2026-10-01 22:23:48'),
(232, 38, 17, 16, 'wawancara', 1, '2026-10-01 22:24:52', '2026-10-01 22:24:52'),
(233, 38, 16, 15, 'wawancara', 2, '2026-10-01 22:24:52', '2026-10-01 22:24:52'),
(234, 38, 19, 18, 'tertulis', 1, '2026-10-01 22:24:52', '2026-10-01 22:24:52'),
(235, 37, 17, 16, 'wawancara', 1, '2026-10-01 22:25:10', '2026-10-01 22:25:10'),
(236, 37, 16, 15, 'wawancara', 2, '2026-10-01 22:25:10', '2026-10-01 22:25:10'),
(237, 37, 21, 20, 'tertulis', 1, '2026-10-01 22:25:10', '2026-10-01 22:25:10'),
(238, 36, 17, 16, 'wawancara', 1, '2026-10-01 22:25:29', '2026-10-01 22:25:29'),
(239, 36, 16, 15, 'wawancara', 2, '2026-10-01 22:25:29', '2026-10-01 22:25:29'),
(240, 36, 21, 20, 'tertulis', 1, '2026-10-01 22:25:29', '2026-10-01 22:25:29'),
(241, 34, 17, 16, 'wawancara', 1, '2026-10-01 22:25:53', '2026-10-01 22:25:53'),
(242, 34, 16, 15, 'wawancara', 2, '2026-10-01 22:25:53', '2026-10-01 22:25:53'),
(243, 34, 20, 19, 'tertulis', 1, '2026-10-01 22:25:53', '2026-10-01 22:25:53'),
(247, 33, 17, 16, 'wawancara', 1, '2026-10-01 22:26:08', '2026-10-01 22:26:08'),
(248, 33, 16, 15, 'wawancara', 2, '2026-10-01 22:26:08', '2026-10-01 22:26:08'),
(249, 33, 20, 19, 'tertulis', 1, '2026-10-01 22:26:08', '2026-10-01 22:26:08'),
(250, 32, 17, 16, 'wawancara', 1, '2026-10-01 22:26:25', '2026-10-01 22:26:25'),
(251, 32, 16, 15, 'wawancara', 2, '2026-10-01 22:26:25', '2026-10-01 22:26:25'),
(252, 32, 19, 18, 'tertulis', 1, '2026-10-01 22:26:25', '2026-10-01 22:26:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesertas`
--

CREATE TABLE `pesertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `jenis_penilaian` enum('kenaikan_jenjang','perpindahan_jabatan') NOT NULL,
  `status` enum('belum_dinilai','sedang_dinilai','selesai') NOT NULL DEFAULT 'belum_dinilai',
  `link_berkas` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesertas`
--

INSERT INTO `pesertas` (`id`, `nama`, `nip`, `jabatan`, `instansi`, `jenis_penilaian`, `status`, `link_berkas`, `created_at`, `updated_at`) VALUES
(12, 'Putu Marini, S.STP., M.A.P', NULL, 'Analis Kebijakan Ahli Muda', 'Pemerintah Kabupaten Badung', 'kenaikan_jenjang', 'selesai', 'https://bit.ly/BerkasKelengkapanUjiKompetensiJFAKTahun20261', '2026-09-28 17:55:07', '2026-09-30 19:49:44'),
(13, 'Arman Syam, S.Sos., M.M', NULL, 'Analis Kebijakan Ahli Muda', 'Pemerintah Kabupaten Luwu Timur', 'kenaikan_jenjang', 'belum_dinilai', 'https://drive.google.com/drive/folders/1mXktAoyq-guXHz-4BLGhPLfPMt-x-bIZ', '2026-09-28 18:05:45', '2026-09-29 16:26:47'),
(14, 'Nieke Roslina Dewi,SE.,M.Si', NULL, 'Analis Kebijakan Ahli Pertama', 'Pemerintah Provinsi Bali', 'kenaikan_jenjang', 'belum_dinilai', 'https://drive.google.com/drive/folders/1GW7nKBbx4LZHg-gg4CPNPryWxHK8uP_n?usp=drive_link', '2026-09-28 18:06:57', '2026-09-29 16:27:14'),
(15, 'Putu Harry Krisnawan, ST, M.Si', NULL, 'Analis Kebijakan Ahli Pertama', 'Pemerintah Provinsi Bali', 'kenaikan_jenjang', 'belum_dinilai', 'https://bit.ly/FormulirUKOM_AKMuda', '2026-09-28 18:08:08', '2026-09-29 16:27:45'),
(16, 'I Gede Arsadana, ST', NULL, 'Analis Kebijakan Ahli Pertama', 'Pemerintah Provinsi Bali', 'kenaikan_jenjang', 'belum_dinilai', 'https://balikom.info/FormulirUjikom_Arsadana', '2026-09-28 18:15:53', '2026-09-29 16:28:46'),
(17, 'M Ridwan Radief, S.AP.,M.Tr.AP', NULL, 'Analis Kebijakan Ahli Pertama', 'Pemerintah Kabupaten Gowa', 'kenaikan_jenjang', 'belum_dinilai', 'https://drive.google.com/drive/folders/1oXKqrNoW9EyFZMFhsGqe0wAS5JiPg90l?usp=sharing', '2026-09-28 18:18:02', '2026-09-29 16:29:58'),
(18, 'Sari Damayanti, SH.,MH', NULL, 'Analis Kebijakan Ahli Pertama', 'Kementerian Agama', 'kenaikan_jenjang', 'belum_dinilai', 'https://drive.google.com/drive/folders/1Lz1OniarEGeuwe4LlE_rvJl2MflesGk5?usp=drive_link', '2026-09-28 18:18:54', '2026-09-29 16:35:06'),
(19, 'Fajar Lingga Prasetya, SAB', NULL, 'Analis Kebijakan Ahli Pertama', 'Lembaga Administrasi Negara RI', 'kenaikan_jenjang', 'belum_dinilai', 'https://drive.google.com/drive/folders/1hLfxSvpvIO8OdyD0t1AIC1lrGGi-q6t1?usp=sharing', '2026-09-28 18:20:12', '2026-09-29 16:30:28'),
(20, 'Hudyawati Laonu, ST', NULL, 'Analis Keuangan Pusat dan Daerah Ahli Muda', 'Pemerintah Daerah Kabupaten Morowali', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1biPsNgOOODFMG_RDVFhAYD6KIBf2niDw?usp=sharing', '2026-09-28 22:09:30', '2026-09-29 16:25:00'),
(21, 'Ayu Wulandari, S.STP.,M.AP', NULL, 'Kasi Kemitraan Organisasi Kepemudaan dan Olahraga', 'Pemerintah Provinsi Sulawesi Tenggara', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1hue7wgcaU1A1QwqD9BC_yo9GEurAjoLP?usp=share_link', '2026-09-28 22:10:40', '2026-09-29 16:25:24'),
(22, 'Irhan, S.E., M.M', NULL, 'Kepala Seksi Penyelesaian Perselisihan Hubungan Industrial', 'Pemerintah Provinsi Sulawesi Tenggara', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1I7hXzbi0INI-ogo-gU9Q5nPi6F3COV5z?usp=drive_link', '2026-09-28 22:11:40', '2026-09-29 16:34:08'),
(23, 'Aidil Kurniawan, SH', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Provinsi Sulawesi Selatan', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1ZB4R2QjzkFKU6OFs0J8P0s-b8PCdQe19?usp=sharing', '2026-09-28 22:12:33', '2026-09-29 15:42:20'),
(24, 'Shella Wahyuning Tyas, S.STP', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Kabupaten Badung', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/18kdV-tcZ2L9XSJ_KDXsQgJsGZqfZjUIv?usp=drive_link', '2026-09-28 22:14:52', '2026-09-29 16:32:33'),
(25, 'Ilham Ardiansyah, S.Tr.IP', NULL, 'Analis Batas Wilayah', 'Pemerintah Daerah Kabupaten Morowali', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1U6gNRZQcnOy5Vmtg4W6_j_8MeA-RF17T?usp=drive_link', '2026-09-28 22:18:55', '2026-09-29 16:08:05'),
(26, 'Sulqifli, SE, M.M', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Provinsi Sulawesi Tenggara', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/136VcK0k4kjdlYQvAl3Uu1S7b1zEDrPkY?usp=sharing', '2026-09-28 22:20:27', '2026-09-29 16:08:43'),
(27, 'Viky Hasri Gayatri, S.Psi', NULL, 'Analis Informasi Pengembangan Sumber Daya Manusia Aparatur', 'Pemerintah Daerah Kabupaten Morowali', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1P5uGwQ8s3jwOraVdafxpHa465x8xYoi3?usp=sharing', '2026-09-28 22:21:23', '2026-09-29 16:09:16'),
(28, 'Eko Aryono, S.IP', NULL, 'Penata Kelola Pemerintahan', 'Pemerintah Kabupaten Luwu Timur', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1FgWKriQk3fUREX6ECi_bUqx3Mj9hTDHr?usp=sharing', '2026-09-28 22:22:26', '2026-09-29 16:23:18'),
(29, 'Yossi Adi Yan, S.STP, M.M.', NULL, 'Penata Keprotokolan', 'Pemerintah Provinsi Sulawesi Tenggara', 'perpindahan_jabatan', 'belum_dinilai', 'https://bit.ly/BerkasUjikomYossi2026', '2026-09-28 22:36:15', '2026-09-29 16:10:41'),
(30, 'Wa Rachmah, S.STP., M.A', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Provinsi Sulawesi Tenggara', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1ApdDkx1B8PKdjcwLEp-pLQarj5vT0mSr?usp=sharing', '2026-09-28 22:37:18', '2026-09-29 16:16:04'),
(31, 'Muhammad Risal, S.Si., M.A.P', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Provinsi Sulawesi Tenggara', 'perpindahan_jabatan', 'belum_dinilai', 'https://bit.ly/BerkasAKMR', '2026-09-28 22:38:47', '2026-09-29 16:22:38'),
(32, 'Idham Chalik, S.STP', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Provinsi Sulawesi Tenggara', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1hIRCEDNHAWUMoA-9H7gMDhCHJsRcqZdM?usp=drive_link', '2026-09-28 22:39:54', '2026-09-29 16:10:06'),
(33, 'Wira Setyawan Rahman, S.A.P', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Kabupaten Luwu Timur', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1zL_JT2QzJteSnwqamauoJNtGaZxMsBEV?usp=sharing', '2026-09-28 22:59:47', '2026-09-29 16:23:44'),
(34, 'Mila Karmila, S.IP', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Provinsi Sulawesi Tenggara', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1E2ydLSwg4wpfuZEIuGwsOGMM7nbHEc4v?usp=drive_link', '2026-09-28 23:02:33', '2026-09-29 16:24:09'),
(35, 'Tito Saputra, S.STP,.M.E', NULL, 'Pelaksana', 'Pemerintah Kota Kotamobagu', 'perpindahan_jabatan', 'selesai', 'https://drive.google.com/drive/folders/1r8zyDMHyf7PEpVp9hw9VsVIIfERgpC0P', '2026-09-29 15:46:43', '2026-10-01 22:33:55'),
(36, 'Almira Dhamara Tyasari, S.S.T (TD), M.Sc.', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Provinsi Nusa Tenggara Barat', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1OcEgg_M8c9ECQM-vadIPNTUjIu1hhEPn?usp=drive_link', '2026-09-29 15:49:47', '2026-09-29 15:49:47'),
(37, 'Hijriah Y, S.IP.,M.M', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Kabupaten Gowa', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1IgeBUdbLn2GV9eDAsM6rrIBQMfF7agOp?usp=drive_link', '2026-09-29 15:50:55', '2026-09-29 15:50:55'),
(38, 'Reinard Alsius, S.STP, M.Adm.SDA', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Provinsi Sulawesi Selatan', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1CcJkxoI1WIgHiBk8T0Gw9PgYuaAuMDOX', '2026-09-29 15:52:13', '2026-09-29 15:52:13'),
(39, 'Ni Putu Putri Arista Dewi, S.Sos., M.A.P', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Kabupaten Badung', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1JWFFplI9r5wvk_cra1eVdsKIUTWl55Rc?usp=drive_link', '2026-09-29 16:04:04', '2026-09-29 16:04:04'),
(40, 'Ida Ayu Agung Cintya Avitri, S.S', NULL, 'Penelaah Teknis Kebijakan', 'Pemerintah Provinsi Bali', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1uNMtaCzrnJymnc8LiIeI4yzEQtdZE3HM?usp=drive_link', '2026-09-29 16:05:29', '2026-09-29 16:05:29'),
(41, 'Benny Richard Sitanaya, S.Sos., M.Si', NULL, 'Analis Perencanaan Evaluasi Dan Pelaporan', 'Pemerintah Kota Kupang', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/drive/folders/1HU8PvfMzSvFznzktYAAzrxHt291XQ7G7?usp=drive_link', '2026-09-29 16:06:37', '2026-09-29 16:06:37'),
(42, 'La Ode Muhammad Dadan Al Qusairy, S.Tr.IP', NULL, 'Pengelola Layanan Operasional', 'Pemerintah Provinsi Sulawesi Tenggara', 'perpindahan_jabatan', 'belum_dinilai', 'https://bit.ly/BerkasUjikomDadan2026', '2026-09-29 16:15:21', '2026-09-29 16:15:21');

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
('GEtxB27VEc6DOYoZ6iZ348ricTVBNQtTYOF2IR0F', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6IlFiM3ZYVUtQRm1zallXaEV1TVF5RDl2TkxPazBXM213QnhMejl1ek8iO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vcGVuaWxhaWFuIjtzOjU6InJvdXRlIjtzOjE1OiJhZG1pbi5wZW5pbGFpYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6InVzZXJfaWQiO2k6MTtzOjEyOiJuYW1hX3Blbmd1amkiO3M6MjA6IkFkbWluaXN0cmF0b3IgTEFOIFJJIjtzOjQ6InJvbGUiO3M6NToiYWRtaW4iO3M6MTI6InRpcGVfcGVuZ3VqaSI7czo0OiJub25lIjtzOjEwOiJwZW5pbGFpX2lkIjtOO3M6MTI6ImlzX3dhd2FuY2FyYSI7YjowO3M6MTE6ImlzX3RlcnR1bGlzIjtiOjA7fQ==', 1790928453),
('s4yVg8PjULCoJj1zNc1luijLjkgdJIn1QpjS3v5z', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'YToxMDp7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6InBBa0RLNk1aMFB1TGpqbmlrSkR4eTlPUVdSb2Y3cG4zemFManZibksiO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcGVzZXJ0YS1wZW5pbGFpYW4iO3M6NToicm91dGUiO3M6MTc6InBlc2VydGEucGVuaWxhaWFuIjt9czo3OiJ1c2VyX2lkIjtpOjE5O3M6MTI6Im5hbWFfcGVuZ3VqaSI7czozMjoiRHIuIERpZGlrIElza2FuZGFyLCBTLlNvcy4sIE0uU2kiO3M6NDoicm9sZSI7czo3OiJwZW5ndWppIjtzOjEyOiJ0aXBlX3Blbmd1amkiO3M6ODoidGVydHVsaXMiO3M6MTA6InBlbmlsYWlfaWQiO2k6MjA7czoxMjoiaXNfd2F3YW5jYXJhIjtiOjA7czoxMToiaXNfdGVydHVsaXMiO2I6MTt9', 1790923812);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `login_pengujis`
--
ALTER TABLE `login_pengujis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_pengujis_email_unique` (`email`),
  ADD UNIQUE KEY `login_pengujis_username_unique` (`username`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_finals`
--
ALTER TABLE `nilai_finals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_nilai_final` (`peserta_id`,`tipe`,`judul_unit`,`jenis_kompetensi`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_penilaian` (`peserta_id`,`penilai_id`,`tipe`),
  ADD KEY `penilaians_penilai_id_foreign` (`penilai_id`);

--
-- Indeks untuk tabel `penilaian_details`
--
ALTER TABLE `penilaian_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_detail` (`peserta_id`,`penilai_id`,`tipe`,`urutan`),
  ADD KEY `penilaian_details_penilai_id_foreign` (`penilai_id`),
  ADD KEY `idx_peserta_tipe` (`peserta_id`,`tipe`);

--
-- Indeks untuk tabel `penilais`
--
ALTER TABLE `penilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilais_login_penguji_id_foreign` (`login_penguji_id`);

--
-- Indeks untuk tabel `penugasan_penilais`
--
ALTER TABLE `penugasan_penilais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penugasan_penilais_peserta_id_tipe_urutan_unique` (`peserta_id`,`tipe`,`urutan`),
  ADD KEY `penugasan_penilais_penilai_id_foreign` (`penilai_id`),
  ADD KEY `penugasan_penilais_login_penguji_id_foreign` (`login_penguji_id`);

--
-- Indeks untuk tabel `pesertas`
--
ALTER TABLE `pesertas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login_pengujis`
--
ALTER TABLE `login_pengujis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `nilai_finals`
--
ALTER TABLE `nilai_finals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `penilaian_details`
--
ALTER TABLE `penilaian_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT untuk tabel `penilais`
--
ALTER TABLE `penilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `penugasan_penilais`
--
ALTER TABLE `penugasan_penilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT untuk tabel `pesertas`
--
ALTER TABLE `pesertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai_finals`
--
ALTER TABLE `nilai_finals`
  ADD CONSTRAINT `nilai_finals_peserta_id_foreign` FOREIGN KEY (`peserta_id`) REFERENCES `pesertas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  ADD CONSTRAINT `penilaians_penilai_id_foreign` FOREIGN KEY (`penilai_id`) REFERENCES `penilais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaians_peserta_id_foreign` FOREIGN KEY (`peserta_id`) REFERENCES `pesertas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian_details`
--
ALTER TABLE `penilaian_details`
  ADD CONSTRAINT `penilaian_details_penilai_id_foreign` FOREIGN KEY (`penilai_id`) REFERENCES `penilais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_details_peserta_id_foreign` FOREIGN KEY (`peserta_id`) REFERENCES `pesertas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilais`
--
ALTER TABLE `penilais`
  ADD CONSTRAINT `penilais_login_penguji_id_foreign` FOREIGN KEY (`login_penguji_id`) REFERENCES `login_pengujis` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `penugasan_penilais`
--
ALTER TABLE `penugasan_penilais`
  ADD CONSTRAINT `penugasan_penilais_login_penguji_id_foreign` FOREIGN KEY (`login_penguji_id`) REFERENCES `login_pengujis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penugasan_penilais_penilai_id_foreign` FOREIGN KEY (`penilai_id`) REFERENCES `penilais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penugasan_penilais_peserta_id_foreign` FOREIGN KEY (`peserta_id`) REFERENCES `pesertas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
