-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 05:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk_muthia`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkatans`
--

CREATE TABLE `angkatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_angkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `angkatans`
--

INSERT INTO `angkatans` (`id`, `nama_angkatan`, `created_at`, `updated_at`) VALUES
(1, '2020', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `judul_banner`, `path`, `deleted_at`) VALUES
(1, 'JUARA 1 LKS TINGKAT KABUPATEN BANDUNG', '20220819062009.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_berita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_berita` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `id_user`, `judul_berita`, `isi_berita`, `path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'QURBAN SMK MUTHIA HARAPAN CICALENGKA', 'test', '20220820024838.jpeg', '2022-08-19 19:03:47', '2022-08-19 19:48:38', NULL);

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
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `id_card`, `id_mapel`, `nama`, `jenis_kelamin`, `nip`, `path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'G3760', 1, 'Rizki Fahrezi Maulana', 'L', 41200562, '20220819024808.jpg', '2022-08-18 19:48:08', '2022-08-18 19:48:08', NULL),
(2, 'G5473', 1, 'Hafshoh Habiballoh', 'P', 41200563, '20220819033039.jpeg', '2022-08-18 19:49:23', '2022-08-18 20:30:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_jurusan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `id_user`, `judul_jurusan`, `isi_jurusan`, `path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'REKAYASA PERANGKAT LUNAK', '<p style=\"margin-top: 10px; margin-bottom: 0px; padding: 0px 0px 15px; font-family: Lato, sans-serif; line-height: 2em; color: rgb(51, 51, 51);\">Rekayasa Perangkat Lunak atau biasa disingkat dengan RPL adalah salah satu bidang profesi dan juga mata pelajaran yang mempelajari tentang pengembangan perangkat-perangkat lunak termasuk dalam hal pembuatannya, pemeliharaan hingga manajemen organisasi dan manajemen kualitasnya. Bisa dikatakan RPL ini merupakan sebuah perubahan yang terjadi pada perangkat lunak guna melakukan pengembangan, pemeliharaan, dan pembangunan kembali dengan menerapkan prinsip rekayasa sehingga memperoleh perangkat lunak yang bisa bekerja secara lebih efisien dan efektif pada user nantinya.</p><p style=\"margin-top: 10px; margin-bottom: 0px; padding: 0px 0px 15px; font-family: Lato, sans-serif; line-height: 2em; color: rgb(51, 51, 51);\">Perangkat lunak sendiri merupakan sekumpulan data yang tersimpan dan terprogram oleh sistem komputer, istilah ini cukup umum dengan sebutan software. Merupakan elemen dari komputer, software menjadi elemen yang tidak tampak secara fisik. Ia berisi instruksi-instruksi yang diprogram dan bisa berada di perangkat keras manapun, software pada mulanya adalah sebuah kode mesin atau machine code yang dibuat oleh seorang ilmuwan. Berisi angka-angka biner yang dapat dikenali oleh komputer, terkhusus prosesor. Software bekerja dengan membuat instruksi tertentu dalam melakukan perhitungan, logika, input-output, dan aritmatika pada prosesor.</p>', '20220819062130.png', '2022-08-18 20:29:03', '2022-08-18 23:21:30', NULL),
(2, 1, 'TEKNIK BISNIS SPEDA MOTOR', '<p style=\"margin-bottom: 15px; padding: 0px; outline: 0px; border-style: initial; border-color: initial; font-size: 14px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: Poppins, Arial, sans-serif;\">Hallo Akademia,</p><p style=\"margin-bottom: 15px; padding: 0px; outline: 0px; border-style: initial; border-color: initial; font-size: 14px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: Poppins, Arial, sans-serif;\">Selamat Datang di website nya SMK Boedi Oetomo 2 Gandrungmangu yang pastinya akan selalu memberikan informasi-informasi menarik&nbsp; yang ter update&nbsp;<img draggable=\"false\" role=\"img\" class=\"emoji\" alt=\"🙂\" src=\"https://s.w.org/images/core/emoji/14.0.0/svg/1f642.svg\" style=\"margin: 0px 0px 20px; outline: 0px; pointer-events: none; padding: 0px !important; border-width: initial !important; border-color: initial !important; vertical-align: -0.1em !important; display: inline !important; box-shadow: none !important; width: 1em !important; background: none !important;\"></p><p style=\"margin-bottom: 15px; padding: 0px; outline: 0px; border-style: initial; border-color: initial; font-size: 14px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: Poppins, Arial, sans-serif;\">Tau engga sih? Belakangan ini Jurusan Teknik Bisnis Sepeda Motor atau yang kita kenal dengan sebutan (TBSM)&nbsp; menjadi trending dan sangat Populer sekali dikalangan SMK. Dilihat dari jumlah peminat yang ingin masuk ke jurusan ini selalu berbondong-bondong karena iklim industri otomotif sedang naik daun sehingga sangat terbuka luasnya lapangan pekerjaan untuk jurusan ini.</p><p style=\"margin-bottom: 15px; padding: 0px; outline: 0px; border-style: initial; border-color: initial; font-size: 14px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: Poppins, Arial, sans-serif;\">Jurusan TBSM Ini memiliki perbedaan tersendiri dengan jurusan TKR Lho, Walaupun keduanya memang sama-sama di bidang Otomotif. Yuk Mari simak penjelasan nya dibawah ini ya..&nbsp;<img draggable=\"false\" role=\"img\" class=\"emoji\" alt=\"🙂\" src=\"https://s.w.org/images/core/emoji/14.0.0/svg/1f642.svg\" style=\"margin: 0px 0px 20px; outline: 0px; pointer-events: none; padding: 0px !important; border-width: initial !important; border-color: initial !important; vertical-align: -0.1em !important; display: inline !important; box-shadow: none !important; width: 1em !important; background: none !important;\"></p>', '20220819062501.png', '2022-08-18 23:25:01', '2022-08-18 23:25:01', NULL),
(3, 1, 'TEKNIK BISNIS SPEDA MOTOR', '<p style=\"margin-bottom: 15px; padding: 0px; outline: 0px; border-style: initial; border-color: initial; font-size: 14px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: Poppins, Arial, sans-serif;\">Hallo Akademia,</p><p style=\"margin-bottom: 15px; padding: 0px; outline: 0px; border-style: initial; border-color: initial; font-size: 14px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: Poppins, Arial, sans-serif;\">Selamat Datang di website nya SMK Boedi Oetomo 2 Gandrungmangu yang pastinya akan selalu memberikan informasi-informasi menarik&nbsp; yang ter update&nbsp;<img draggable=\"false\" role=\"img\" class=\"emoji\" alt=\"🙂\" src=\"https://s.w.org/images/core/emoji/14.0.0/svg/1f642.svg\" style=\"margin: 0px 0px 20px; outline: 0px; pointer-events: none; padding: 0px !important; border-width: initial !important; border-color: initial !important; vertical-align: -0.1em !important; display: inline !important; box-shadow: none !important; width: 1em !important; background: none !important;\"></p><p style=\"margin-bottom: 15px; padding: 0px; outline: 0px; border-style: initial; border-color: initial; font-size: 14px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: Poppins, Arial, sans-serif;\">Tau engga sih? Belakangan ini Jurusan Teknik Bisnis Sepeda Motor atau yang kita kenal dengan sebutan (TBSM)&nbsp; menjadi trending dan sangat Populer sekali dikalangan SMK. Dilihat dari jumlah peminat yang ingin masuk ke jurusan ini selalu berbondong-bondong karena iklim industri otomotif sedang naik daun sehingga sangat terbuka luasnya lapangan pekerjaan untuk jurusan ini.</p><p style=\"margin-bottom: 15px; padding: 0px; outline: 0px; border-style: initial; border-color: initial; font-size: 14px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: Poppins, Arial, sans-serif;\">Jurusan TBSM Ini memiliki perbedaan tersendiri dengan jurusan TKR Lho, Walaupun keduanya memang sama-sama di bidang Otomotif. Yuk Mari simak penjelasan nya dibawah ini ya..&nbsp;<img draggable=\"false\" role=\"img\" class=\"emoji\" alt=\"🙂\" src=\"https://s.w.org/images/core/emoji/14.0.0/svg/1f642.svg\" style=\"margin: 0px 0px 20px; outline: 0px; pointer-events: none; padding: 0px !important; border-width: initial !important; border-color: initial !important; vertical-align: -0.1em !important; display: inline !important; box-shadow: none !important; width: 1em !important; background: none !important;\"></p>', '20220819062502.png', '2022-08-18 23:25:02', '2022-08-18 23:25:17', '2022-08-18 23:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_angkatan` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `id_jurusan`, `id_angkatan`, `id_guru`, `created_at`, `updated_at`) VALUES
(1, 'RPL 1', 1, 1, 2, '2022-08-18 20:29:25', '2022-08-18 20:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `kategori_mapel`, `nama_mapel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kejuruan', 'Pemrograman Web', '2022-08-18 19:46:26', '2022-08-18 19:46:26', NULL),
(2, 'Umum', 'Bahasa Indonesia', '2022-08-18 19:48:47', '2022-08-18 20:31:00', '2022-08-18 20:31:00');

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
(5, '2022_08_12_055017_banner', 1),
(6, '2022_08_17_070814_create_beritas_table', 1),
(7, '2022_08_17_090153_create_prestasis_table', 1),
(8, '2022_08_17_095355_create_jurusans_table', 1),
(9, '2022_08_17_144807_create_gurus_table', 1),
(10, '2022_08_17_145753_create_mapels_table', 1),
(11, '2022_08_18_165808_create_kelas_table', 1),
(12, '2022_08_18_170507_create_angkatans_table', 1),
(13, '2022_08_19_034745_create_siswas_table', 2);

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
-- Table structure for table `prestasis`
--

CREATE TABLE `prestasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_prestasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_prestasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prestasis`
--

INSERT INTO `prestasis` (`id`, `id_user`, `judul_prestasi`, `isi_prestasi`, `path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'test', 'test', '20220820025225.jpeg', '2022-08-19 19:52:25', '2022-08-19 19:52:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nis`, `nisn`, `nama`, `no_telp`, `path`, `id_kelas`, `created_at`, `updated_at`) VALUES
(5, '41200563', '0046528893', 'Kipaw GantengS', '083153444251', '20220819061442.webp', 1, '2022-08-18 23:03:15', '2022-08-18 23:14:42'),
(6, '41200563', '0046528893', 'Kipaw Ganteng', '083153444251', '20220819060936.webp', 1, '2022-08-18 23:09:36', '2022-08-18 23:09:36');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rizki Fahrezi Maulana', 'rizkifahrezi990@gmail.com', NULL, '$2y$10$GTiN/2E/y.FmT9KGiJ8GY.10yehgMKCvbPRh/zL4Afg6je6Hu8DU2', NULL, '2022-08-18 19:45:50', '2022-08-18 19:45:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkatans`
--
ALTER TABLE `angkatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
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
-- Indexes for table `prestasis`
--
ALTER TABLE `prestasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
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
-- AUTO_INCREMENT for table `angkatans`
--
ALTER TABLE `angkatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestasis`
--
ALTER TABLE `prestasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
