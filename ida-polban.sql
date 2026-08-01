-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table idakom_polban.anggotas
CREATE TABLE IF NOT EXISTS `anggotas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_rumah` text COLLATE utf8mb4_unicode_ci,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_mulai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_selesai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.anggotas: ~4 rows (approximately)
INSERT INTO `anggotas` (`id`, `nama_lengkap`, `nama_panggilan`, `nomor_hp`, `asal_sekolah`, `jurusan`, `program_studi`, `angkatan`, `alamat_rumah`, `jabatan`, `divisi`, `periode`, `tahun_mulai`, `tahun_selesai`, `email`, `no_wa`, `created_at`, `updated_at`) VALUES
	(1, 'Abiem Rey Rahman', 'Abim', '082120384027', 'SMA Prakarya Santi Asromo Majalengka', 'Teknik Refrigerasi dan Tata Udara', 'D4 - Teknik Pendingin dan Tata Udara', '2023', 'Ds. Eretan Wetan, Kec. Kandanghaur, Kab. Indramayu', 'Anggota Bidang Eksternal', 'Bidang Eksternal', '2024/2025', NULL, NULL, NULL, NULL, '2026-07-30 14:20:31', '2026-07-30 16:06:12'),
	(2, 'Muhammad Fawwaz Aydin', 'Aydin', '089664354198', 'SMAN 1 SINDANG', 'TEKNIK ELEKTRO', 'D3-TEKNIK TELEKOMUNIKASI', '2023', 'Kel. Margadadi, Kec. Indramayu, Kab. Indramayu', 'Ketua Bidang Eksternal', 'Bidang Eksternal', '2024/2025', NULL, NULL, NULL, NULL, '2026-07-30 16:08:25', '2026-07-30 16:09:41'),
	(3, 'Mohammad Kevin', 'Kevin', NULL, 'SMAN 1 INDRAMAYU', 'Teknik Mesin', 'D3 - Teknik Mesin', '2023', 'Kel. Margadadi, Kec. Indramayu, Kab. Indramayu', 'Ketua Umum', 'Pimpinan', '2024/2025', NULL, NULL, NULL, NULL, '2026-07-30 16:13:03', '2026-07-30 16:13:03'),
	(5, 'Abdul Gani Amin', 'Abdul', '082120433354', 'SMKN 1 Indramayu', 'Jurusan Akuntansi', 'D4 Keuangan Syariah', '2022', 'Ds. Langut, Kec. Lohbener', NULL, NULL, '2022/2023', NULL, NULL, NULL, NULL, '2026-07-30 16:22:23', '2026-07-30 16:22:23');

-- Dumping structure for table idakom_polban.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.cache: ~0 rows (approximately)

-- Dumping structure for table idakom_polban.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.cache_locks: ~0 rows (approximately)

-- Dumping structure for table idakom_polban.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table idakom_polban.galeris
CREATE TABLE IF NOT EXISTS `galeris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.galeris: ~0 rows (approximately)
INSERT INTO `galeris` (`id`, `judul`, `deskripsi`, `kategori`, `periode`, `gambar`, `created_at`, `updated_at`) VALUES
	(1, 'Foto Bersama', NULL, 'Cover', '2024/2025', NULL, '2026-07-30 14:16:27', '2026-07-30 14:16:27');

-- Dumping structure for table idakom_polban.galeri_images
CREATE TABLE IF NOT EXISTS `galeri_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `galeri_id` bigint unsigned NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galeri_images_galeri_id_foreign` (`galeri_id`),
  CONSTRAINT `galeri_images_galeri_id_foreign` FOREIGN KEY (`galeri_id`) REFERENCES `galeris` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.galeri_images: ~0 rows (approximately)
INSERT INTO `galeri_images` (`id`, `galeri_id`, `gambar`, `created_at`, `updated_at`) VALUES
	(1, 1, 'galeri/f3TUzY66dnfAsxcrfc3RejlmoD3NRecZp39hZlkQ.jpg', '2026-07-30 14:16:28', '2026-07-30 14:16:28');

-- Dumping structure for table idakom_polban.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.jobs: ~0 rows (approximately)

-- Dumping structure for table idakom_polban.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.job_batches: ~0 rows (approximately)

-- Dumping structure for table idakom_polban.lowongans
CREATE TABLE IF NOT EXISTS `lowongans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kualifikasi` text COLLATE utf8mb4_unicode_ci,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `badge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_posting` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.lowongans: ~0 rows (approximately)

-- Dumping structure for table idakom_polban.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_07_24_095444_create_anggotas_table', 1),
	(5, '2026_07_24_095445_create_strukturs_table', 1),
	(6, '2026_07_24_095446_create_lowongans_table', 1),
	(7, '2026_07_24_095447_create_galeris_table', 1),
	(8, '2026_07_24_095447_create_pendaftarans_table', 1),
	(9, '2026_07_24_115332_create_galeri_images_table', 1),
	(10, '2026_07_24_120000_add_fields_to_pendaftarans_table', 1),
	(11, '2026_07_24_120536_add_username_to_users_table', 1),
	(12, '2026_07_24_125638_add_kategori_to_galeris_table', 1),
	(13, '2026_07_24_140930_add_periode_to_pendaftarans_table', 1),
	(14, '2026_07_25_081247_add_periode_to_galeris_table', 1),
	(15, '2026_07_26_000000_add_decision_timestamps_to_pendaftarans_table', 1),
	(16, '2026_07_27_000000_add_alamat_rumah_to_pendaftarans_table', 1),
	(17, '2026_07_28_000001_add_angkatan_to_pendaftarans_table', 1),
	(18, '2026_07_29_000001_create_wa_groups_table', 1),
	(19, '2026_07_30_000000_add_email_to_pendaftarans_table', 1),
	(20, '2026_07_30_000001_add_angkatan_to_anggotas_table', 1);

-- Dumping structure for table idakom_polban.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table idakom_polban.pendaftarans
CREATE TABLE IF NOT EXISTS `pendaftarans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_rumah` text COLLATE utf8mb4_unicode_ci,
  `bukti_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'baru',
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.pendaftarans: ~3 rows (approximately)
INSERT INTO `pendaftarans` (`id`, `nama_lengkap`, `nama_panggilan`, `tempat_lahir`, `tanggal_lahir`, `nomor_hp`, `email`, `instagram`, `asal_sekolah`, `jurusan`, `program_studi`, `angkatan`, `alamat_rumah`, `bukti_file`, `status`, `approved_at`, `rejected_at`, `periode`, `created_at`, `updated_at`) VALUES
	(1, 'Abiem Rey Rahman', 'Abim', 'Indramayu', '2004-05-16', '082120384027', 'abiemrey@gmail.com', '@abiemrey_', 'SMA Prakarya Santi Asromo Majalengka', 'Teknik Refrigerasi dan Tata Udara', 'D4 - Teknik Pendingin dan Tata Udara', '2023', 'Ds. Eretan Wetan, Kec. Kandanghaur, Kab. Indramayu', 'uploads/bukti/fKoKF9FMp9dT9RCQRmIV1EZPLBliR66691ddufXE.jpg', 'approved', '2026-07-30 14:20:31', NULL, '2024/2025', '2026-07-30 14:18:43', '2026-07-30 14:20:31'),
	(2, 'Muhammad Fawwaz Aydin', 'Aydin', 'Indramayu', '2005-05-29', '089664354198', 'fawwazaydin42@gmail.com', '@m_f_aydin', 'SMAN 1 SINDANG', 'TEKNIK ELEKTRO', 'D3-TEKNIK TELEKOMUNIKASI', '2023', 'Kel. Margadadi, Kec. Indramayu, Kab. Indramayu', NULL, 'approved', '2026-07-30 16:08:25', NULL, '2024/2025', '2026-07-30 16:08:02', '2026-07-30 16:08:25'),
	(3, 'Abdul Gani Amin', 'Abdul', 'Indramayu', '2005-07-02', '082120433354', 'abdul.gani.ksy22@polban.ac.id', '@abdl.ga', 'SMKN 1 Indramayu', 'Jurusan Akuntansi', 'D4 Keuangan Syariah', '2022', 'Ds. Langut, Kec. Lohbener', NULL, 'approved', '2026-07-30 16:22:23', NULL, '2022/2023', '2026-07-30 16:21:00', '2026-07-30 16:22:23');

-- Dumping structure for table idakom_polban.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.sessions: ~0 rows (approximately)

-- Dumping structure for table idakom_polban.strukturs
CREATE TABLE IF NOT EXISTS `strukturs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint unsigned NOT NULL DEFAULT '3',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.strukturs: ~0 rows (approximately)

-- Dumping structure for table idakom_polban.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin', 'admin@admin.com', NULL, '$2y$12$QslVEvgXcN1SGsEHTuR/i.d/IW8uABfTX9mqvt98bRX1mQ.Zab5e.', NULL, '2026-07-30 13:52:55', '2026-07-30 13:52:55');

-- Dumping structure for table idakom_polban.wa_groups
CREATE TABLE IF NOT EXISTS `wa_groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `angkatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wa_groups_angkatan_unique` (`angkatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table idakom_polban.wa_groups: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
