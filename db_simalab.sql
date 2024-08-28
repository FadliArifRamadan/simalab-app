-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 09:08 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simalab`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coordinators_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity_type`, `coordinators_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Konsultasi', 2, 'Melakukan Kosultasi', '2024-07-23 10:43:29', '2024-07-23 13:14:29'),
(2, 'Student Business Corner', 2, 'Menjual Produk Diempat', '2024-07-23 12:50:12', '2024-07-23 12:50:12'),
(3, 'CIC HUB Store', 2, 'Menjual Produk Secara Online', '2024-07-23 12:51:22', '2024-07-23 12:51:22'),
(4, 'Konsultasi', 3, 'Melakukan Konsultasi', '2024-07-23 13:14:14', '2024-07-23 13:14:14'),
(5, 'Membuat Nomor Induk Berusaha (NIB)', 3, 'Melakukan Pembuatan NIB', '2024-07-23 13:17:23', '2024-07-23 13:17:23'),
(6, 'Membuat Sertifikat Halal', 3, 'Melakukan Pembuatan Sertifikat Halal', '2024-07-23 13:17:46', '2024-07-23 13:17:46'),
(7, 'Pelatihan Dasar (Pemrograman Web, Pemrograman App, Design Figma, Scratch)', 4, 'Melakukan Pelatihan', '2024-07-23 13:26:42', '2024-07-23 13:26:42'),
(10, 'Pembuatan Foto Produk', 9, 'Melakukan Pembuatan Foto Produk', '2024-07-23 13:29:20', '2024-07-23 13:29:20'),
(11, 'Pembuatan Video Promosi', 9, 'Melakukan Pembuatan Video', '2024-07-23 13:29:58', '2024-07-23 13:29:58'),
(12, 'Pembuatan Company Profile', 9, 'Melakukan Pembuatan Company Profile', '2024-07-23 13:31:08', '2024-07-23 13:31:08'),
(13, 'Konsultasi', 10, 'Melakukan Konsultasi', '2024-07-23 13:31:48', '2024-07-23 13:31:48'),
(14, 'Pembuatan Cash Flow', 10, 'Melakukan Pembuatan Cash Flow', '2024-07-23 13:32:18', '2024-07-23 13:32:18'),
(15, 'Pembuatan Nomor Pokok Wajib Pajak (NPWP)', 10, 'Melakukan Pembuatan NPWP', '2024-07-23 13:32:57', '2024-07-23 13:32:57'),
(18, 'Konsultasi', 8, 'Melakukan Konsultasi', '2024-07-25 09:55:55', '2024-07-25 09:55:55'),
(19, 'Konsultasi', 11, 'Melakukan Konsultasi', '2024-07-25 09:56:19', '2024-07-25 09:56:19'),
(20, 'Konsultasi', 9, 'Melakukan Konsultasi', '2024-07-30 04:17:39', '2024-07-30 04:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `activity_submissions`
--

CREATE TABLE `activity_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coordinators_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activities_id` bigint(20) UNSIGNED NOT NULL,
  `submission_date` date DEFAULT NULL,
  `submission_time` time DEFAULT NULL,
  `status` enum('Pending','Approved','Progress','Rejected','Done') COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_submissions`
--

INSERT INTO `activity_submissions` (`id`, `users_id`, `coordinators_id`, `activities_id`, `submission_date`, `submission_time`, `status`, `created_at`, `updated_at`) VALUES
(3, 15, 2, 1, '2024-07-31', '13:00:00', 'Done', '2024-07-29 22:26:29', '2024-07-30 03:33:00'),
(5, 15, 9, 10, '2024-07-31', '13:30:00', 'Done', '2024-07-30 04:14:54', '2024-08-03 06:34:38'),
(7, 14, 3, 6, '2024-08-08', '13:30:00', 'Done', '2024-08-04 19:00:16', '2024-08-04 19:02:56'),
(8, 14, 2, 1, '2024-08-08', '13:00:00', 'Done', '2024-08-04 19:46:31', '2024-08-04 19:59:19'),
(9, 18, 2, 1, '2024-08-10', '14:00:00', 'Done', '2024-08-04 19:54:59', '2024-08-08 08:00:10'),
(12, 15, 10, 15, '2024-08-09', '13:00:00', 'Done', '2024-08-07 23:35:27', '2024-08-08 08:17:04'),
(13, 14, 3, 6, '2024-08-12', '13:00:00', 'Done', '2024-08-08 00:43:32', '2024-08-08 08:08:51'),
(14, 13, 3, 5, '2024-08-12', '14:30:00', 'Done', '2024-08-08 01:14:21', '2024-08-08 08:10:03'),
(15, 17, 10, 14, '2024-08-23', '13:00:00', 'Done', '2024-08-08 01:25:46', '2024-08-08 08:19:15'),
(19, 16, 11, 19, '2024-08-15', '13:00:00', 'Progress', '2024-08-08 15:15:12', '2024-08-13 07:31:10'),
(20, 17, 11, 19, '2024-08-15', '13:30:00', 'Approved', '2024-08-08 15:15:59', '2024-08-08 15:20:44'),
(21, 18, 11, 19, '2024-08-15', '14:00:00', 'Approved', '2024-08-08 15:19:41', '2024-08-08 15:20:49'),
(22, 15, 8, 18, NULL, NULL, 'Pending', '2024-08-18 08:50:54', '2024-08-18 08:50:54'),
(23, 21, 3, 5, '2024-08-21', '13:00:00', 'Progress', '2024-08-18 08:54:10', '2024-08-18 08:59:05'),
(24, 22, 2, 1, '2024-08-26', '13:00:00', 'Approved', '2024-08-20 20:32:20', '2024-08-20 20:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_submissions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `visitors_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activities_id` bigint(20) UNSIGNED DEFAULT NULL,
  `documents_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `activity_submissions_id`, `users_id`, `visitors_id`, `activities_id`, `documents_id`, `description`, `file_path`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 15, 1, 2, 'upload files', 'docs/sample.pdf', '2024-07-30 03:34:31', '2024-07-30 03:58:15'),
(3, NULL, 9, 15, 10, 1, 'upload file', 'docs/sample.pdf', '2024-08-03 06:36:31', '2024-08-03 06:36:31'),
(4, NULL, 9, 15, 10, 2, 'upload file', 'docs/sample.pdf', '2024-08-03 06:36:32', '2024-08-03 06:36:32'),
(5, NULL, 9, 15, 10, 3, 'upload file', 'docs/ucic-cirebon-64a4f611e1a1670ab4179522.jpg', '2024-08-03 06:36:32', '2024-08-03 06:36:32'),
(6, NULL, 3, 14, 6, 1, 'upload file', 'docs/sample.pdf', '2024-08-04 19:05:18', '2024-08-04 19:05:18'),
(7, NULL, 2, 14, 1, 1, 'upload file', 'docs/sample.pdf', '2024-08-04 20:01:22', '2024-08-04 20:01:22'),
(8, NULL, 2, 14, 1, 3, 'upload file', 'docs/ucic-cirebon-64a4f611e1a1670ab4179522.jpg', '2024-08-04 20:01:22', '2024-08-04 20:01:22'),
(9, NULL, 2, 18, 1, 1, 'upload file', 'docs/sample.pdf', '2024-08-08 08:02:29', '2024-08-08 08:02:29'),
(10, NULL, 2, 18, 1, 2, 'upload file', 'docs/sample.pdf', '2024-08-08 08:02:29', '2024-08-08 08:02:29'),
(11, NULL, 3, 14, 6, 1, 'upload file', 'docs/sample.pdf', '2024-08-08 08:09:39', '2024-08-08 08:09:39'),
(12, NULL, 3, 13, 5, 2, 'upload file', 'docs/sample.pdf', '2024-08-08 08:10:43', '2024-08-08 08:10:43'),
(13, NULL, 10, 15, 15, 1, 'upload file', 'docs/sample.pdf', '2024-08-08 08:18:56', '2024-08-08 08:18:56'),
(14, NULL, 10, 15, 15, 2, 'upload file', 'docs/sample.pdf', '2024-08-08 08:18:56', '2024-08-08 08:18:56'),
(15, NULL, 10, 17, 14, 1, 'upload file', 'docs/sample.pdf', '2024-08-08 08:20:28', '2024-08-08 08:20:28'),
(16, NULL, 3, 21, 5, 1, 'upload file', 'docs/sample.pdf', '2024-08-18 09:00:12', '2024-08-18 09:00:12'),
(18, NULL, 3, 21, 5, 2, 'upload file', 'docs/sample (1).pdf', '2024-08-18 09:18:49', '2024-08-18 09:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Berita Acara', 'Penambahan Dokumen Berita Acara', '2024-07-02 14:46:04', '2024-07-02 14:46:04'),
(2, 'Perjanjian Kerja Sama', 'Penambahan Dokumen Perjanjian Kerja Sama', '2024-07-02 14:46:22', '2024-07-02 14:46:22'),
(3, 'Dokumentasi Kegiatan', 'Penambahan Dokumentasi Kegiatan', '2024-07-02 20:54:02', '2024-07-02 20:54:02'),
(4, 'Absen Pengunjung', 'Penambahan Absen Pengunjung', '2024-07-09 18:03:54', '2024-07-09 18:03:54');

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
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lab_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_06_21_001518_create_activities_table', 2),
(10, '2024_06_21_002754_add_description_column_to_activities_table', 2),
(11, '2024_06_21_004359_create_labs_table', 2),
(13, '2024_06_21_005946_add_labs_id_to_activities_table', 3),
(18, '2024_06_22_132114_add_unique_rule_in_labs_table', 4),
(19, '2024_06_24_010854_add_description_column_in_labs_table', 5),
(41, '2024_07_01_233505_create_documents_table', 6),
(64, '2024_07_02_200240_create_roles_table', 7),
(65, '2024_07_08_094659_add_roles_id_column_to_users_table', 8),
(66, '2024_07_08_100306_create_docs_table', 9),
(67, '2024_07_08_100800_add_documents_id_to_docs_table', 10),
(69, '2024_07_08_101244_add_users_id_to_docs_table', 11),
(70, '2024_07_08_102642_change_file_name_and_file_path_attributes_in_docs_table', 12),
(90, '2024_07_10_150351_create_activity_submissions_table', 13),
(91, '2024_07_14_144824_add_users_id_to_activity_submissions_table', 14),
(92, '2024_07_15_084019_add_coordinators_id_to_activity_submissions_table', 15),
(93, '2024_07_15_094902_add_labs_id_to_activity_submissions_table', 16),
(94, '2024_07_15_101922_add_activities_id_to_activity_submissions_table', 17),
(96, '2024_07_16_132933_add_visitors_id_to_docs_table', 18),
(97, '2024_07_16_133703_add_activities_id_to_docs_table', 19),
(98, '2024_07_16_162100_change_activity_type_attributes_in_activities_table', 20),
(99, '2024_07_16_183727_add_business_name_column_in_users_table', 21),
(101, '2024_07_21_184343_remove_description_in_labs_table', 22),
(102, '2024_07_21_185227_remove_unique_rule_in_labs_table', 23),
(103, '2024_07_21_185955_remove_labs_id_from_activities_table', 24),
(104, '2024_07_21_190307_remove_labs_id_from_activity_submissions_table', 25),
(111, '2024_07_23_171944_add_coordinators_id_to_activities_table', 26),
(114, '2024_07_29_024441_add_activity_submissions_id_to_docs_table', 27),
(115, '2024_08_13_144135_add_identities_column_to_users_table', 28);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Lab Head', '2024-07-08 02:44:59', '2024-07-08 02:44:59'),
(2, 'Lab Coordinator', '2024-07-08 02:44:59', '2024-07-08 02:44:59'),
(3, 'Lab Visitor', '2024-07-08 02:45:00', '2024-07-08 02:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_id` bigint(20) UNSIGNED DEFAULT NULL,
  `identities` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `business_name`, `email`, `roles_id`, `identities`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Lab', NULL, 'kepalalab@gmail.com', 1, NULL, NULL, '$2y$10$Tti/1ic9W9MGWcd8LBHiSO7WKSRs88hpnKJb4o0J6VkQ40apKX4O.', NULL, NULL, '2024-07-23 07:26:01'),
(2, 'Koor Lab Kewirausahaan', NULL, 'koorlabkwu@gmail.com', 2, NULL, NULL, '$2y$10$0CKzeOhPeLyxYqE9gtgmauk6dm5IjGthvFqaycunCtRs.q5RyYB1K', NULL, '2024-07-08 02:57:21', '2024-07-23 06:31:55'),
(3, 'Koor Lab Halal Center', NULL, 'koorlabhc@gmail.com', 2, NULL, NULL, '$2y$10$Hx97lrfLsCoN6vbvWp0Xi.At7xqtDwRm2hULpExSk6iWCR5ESJyka', NULL, '2024-07-08 02:59:16', '2024-07-25 16:08:04'),
(4, 'Koor Lab Programming', NULL, 'koorlabprg@gmail.com', 2, NULL, NULL, '$2y$10$KTXdW3RXtIH1j2OF3pD01Ohm8xc4r8mX3vTQQ2nZ1uSPLBaFr.QEu', NULL, '2024-07-08 02:59:51', '2024-07-08 02:59:51'),
(8, 'Koor Lab Bisnis dan Properti', NULL, 'koorlabbdp@gmail.com', 2, NULL, NULL, '$2y$10$lsJqkQ1QHDTTHloMpihZ1ePK4Umz62VpHDJYNFggztzEsW.akb4ea', NULL, '2024-07-16 08:38:56', '2024-07-16 08:38:56'),
(9, 'Koor Lab Multimedia dan Digital marketing', NULL, 'koorlabmddm@gmail.com', 2, NULL, NULL, '$2y$10$7TKIy2qySjRgWmaQeiyfEOEJ0gzsZ22etaAXVci5Cq.H6cjvCLX2e', NULL, '2024-07-16 08:40:17', '2024-07-25 07:21:24'),
(10, 'Koor Lab Perpajakan', NULL, 'koorlabpjk@gmail.com', 2, NULL, NULL, '$2y$10$IuyVUkOu7OaSLamOASE.g.Jsfwa3FtIZqkD4yhrUmbnqJmlyTa95i', NULL, '2024-07-16 08:50:33', '2024-07-16 08:50:33'),
(11, 'Koor Lab Ekspor dan Impor', NULL, 'koorlabedi@gmail.com', 2, NULL, NULL, '$2y$10$02f1BIXFsYVFJbCJTsagK.emoLvr1Mb/HqCf4z0YdZjQJWSb4Pl1q', NULL, '2024-07-16 08:51:13', '2024-07-16 08:51:13'),
(13, 'Safari', 'UMKM Safari', 'safari@gmail.com', 3, NULL, NULL, '$2y$10$tPA1ES6s/JBK3osaTardEe5fZoH4g6HQgz7ZqA0suEFTB69cLSZXK', NULL, '2024-07-16 11:53:45', '2024-07-23 06:37:34'),
(14, 'Bahari', 'UMKM Bahari', 'bahari@gmail.com', 3, NULL, NULL, '$2y$10$E0eST4xVM32CpZSZcvgU7O8bOjNBp/O/CWcFfULcpn2Cs06tG6.Ia', NULL, '2024-07-16 17:48:11', '2024-07-23 06:39:33'),
(15, 'Fadli', 'SMK Jaya Selalu', 'fadli@gmail.com', 3, 181729271827, NULL, '$2y$10$JgpJm3qVbYMfUOuu9ZHgH.oz1NSXZLXCDTQ0ky6O7QZzaJus5rbGG', NULL, '2024-07-16 17:49:17', '2024-08-13 08:42:15'),
(16, 'Bima', 'Universitas Islam Negeri Siber', 'bima@gmail.com', 3, NULL, NULL, '$2y$10$HfV9K90pFgaWWdu8FqPMqOwfCqF8P.s4CG/f50uGi/aZlD31tz1uK', NULL, '2024-07-16 17:51:31', '2024-07-16 17:51:31'),
(17, 'Arif Udin', 'UCIC', 'arif@gmail.com', 3, NULL, NULL, '$2y$10$PFLBwp3qfeOZU2xDcbda/OXUVcY1Eq561Eks9xQLU4fG5a4Di2.lm', NULL, '2024-07-23 06:44:33', '2024-07-23 06:44:33'),
(18, 'Ramadan', 'Universitas Catur Insan Cendekia', 'ramadan@gmail.com', 3, NULL, NULL, '$2y$10$wAAD5xAsnzfNg9JOOCV53.9OqybNXwiCcLONzSBsVGESENd97jdBm', NULL, '2024-07-23 07:21:28', '2024-07-23 07:23:55'),
(21, 'Ovi', 'UGJ', 'ovi@gmail.com', 3, 3322992819283, NULL, '$2y$10$pegOmgfbPxXkRpZh9b.Sk.gtTZzchk8HGGrmtH130ZtBPkHGfg44a', NULL, '2024-08-13 08:29:21', '2024-08-13 08:29:21'),
(22, 'Arif Ramadan', 'Sawit Ketan', 'ariframadan@gmail.com', 3, 1829182819, NULL, '$2y$10$Oq4d0FhexTjTdMUAxQo8jObItRB1gtQHhGUXx05W1etLt94n2tPnC', NULL, '2024-08-20 20:30:51', '2024-08-20 20:30:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_coordinators_id_foreign` (`coordinators_id`);

--
-- Indexes for table `activity_submissions`
--
ALTER TABLE `activity_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_submissions_users_id_foreign` (`users_id`),
  ADD KEY `activity_submissions_coordinators_id_foreign` (`coordinators_id`),
  ADD KEY `activity_submissions_activities_id_foreign` (`activities_id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docs_documents_id_foreign` (`documents_id`),
  ADD KEY `docs_users_id_foreign` (`users_id`),
  ADD KEY `docs_visitors_id_foreign` (`visitors_id`),
  ADD KEY `docs_activities_id_foreign` (`activities_id`),
  ADD KEY `docs_activity_submissions_id_foreign` (`activity_submissions_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documents_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_roles_id_foreign` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `activity_submissions`
--
ALTER TABLE `activity_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_coordinators_id_foreign` FOREIGN KEY (`coordinators_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `activity_submissions`
--
ALTER TABLE `activity_submissions`
  ADD CONSTRAINT `activity_submissions_activities_id_foreign` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`),
  ADD CONSTRAINT `activity_submissions_coordinators_id_foreign` FOREIGN KEY (`coordinators_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `activity_submissions_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `docs`
--
ALTER TABLE `docs`
  ADD CONSTRAINT `docs_activities_id_foreign` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`),
  ADD CONSTRAINT `docs_activity_submissions_id_foreign` FOREIGN KEY (`activity_submissions_id`) REFERENCES `activity_submissions` (`id`),
  ADD CONSTRAINT `docs_documents_id_foreign` FOREIGN KEY (`documents_id`) REFERENCES `documents` (`id`),
  ADD CONSTRAINT `docs_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `docs_visitors_id_foreign` FOREIGN KEY (`visitors_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
