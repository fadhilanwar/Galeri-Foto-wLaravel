-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 18, 2024 at 03:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_fadhilawnar_galeri`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_dibuat` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `nama_album`, `deskripsi`, `tanggal_dibuat`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'My Fantasies', 'I wish i was a Cat :)', '2024-02-16', 2, '2024-02-16 00:01:35', '2024-02-16 00:01:35'),
(2, 'Lifewise', 'Life is not about Chill and Sleep', '2024-02-16', 1, '2024-02-16 00:04:52', '2024-02-16 00:04:52'),
(3, 'Nature Energy', 'Natural is Mirror of Beautifullness...', '2024-02-16', 3, '2024-02-16 00:08:57', '2024-02-16 00:10:59'),
(4, 'Just Myself :)', 'I have two Sides hahaha :v', '2024-02-16', 3, '2024-02-16 00:13:10', '2024-02-16 00:13:10'),
(5, 'Panorama', 'Cool Panaroma inside this Realms', '2024-02-16', 1, '2024-02-16 01:18:47', '2024-02-16 01:18:47'),
(6, 'Apa saja', 'Semua Ada disini', '2024-02-16', 4, '2024-02-16 03:37:55', '2024-02-16 03:37:55'),
(7, 'The Cars', 'Fast and Furious', '2024-02-18', 1, '2024-02-17 17:42:13', '2024-02-17 17:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `tanggal_unggah` date NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `judul_foto`, `deskripsi`, `tanggal_unggah`, `lokasi_file`, `album_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'A Lake of Heaven.', 'I Found it on Google Pic! #purenatural #bestwaytoexplore', '2024-02-16', '1708066972.jpg', 1, 2, '2024-02-16 00:02:52', '2024-02-16 00:02:52'),
(2, 'Arabian Skyscrapper', '617ft From the Lake! Can you believe that??', '2024-02-16', '1708067143.jpg', 2, 1, '2024-02-16 00:05:43', '2024-02-16 00:05:43'),
(3, 'Nature Green', 'Look out this Presence! you must be Liked it...', '2024-02-16', '1708067535.jpg', 3, 3, '2024-02-16 00:12:15', '2024-02-16 00:12:15'),
(4, 'Gojo pake Peci', 'Aku membeli Peci ini seharga 200ribu !', '2024-02-16', '1708067684.jpg', 4, 3, '2024-02-16 00:14:44', '2024-02-16 00:14:44'),
(5, 'Jalan Raya', 'Jalan di California saat musim Hujan', '2024-02-16', '1708069267.jpg', 2, 1, '2024-02-16 00:41:07', '2024-02-16 00:41:26'),
(6, 'Japan Trip', 'Japan on the Evening Sunset....', '2024-02-16', '1708069426.jpg', 2, 1, '2024-02-16 00:43:46', '2024-02-16 00:43:46'),
(8, 'Matahari Tenggelam', 'Cuma Sunset biasa.', '2024-02-16', '1708071614.jpg', 5, 1, '2024-02-16 01:20:14', '2024-02-16 01:20:14'),
(10, 'Earth is Rectangle?', 'Earth is Rectang;le', '2024-02-16', '1708079960.jpg', 6, 4, '2024-02-16 03:39:20', '2024-02-16 03:39:20'),
(11, 'Paul Walker Car (Nissan Skyline)', 'This is my Favourite Cars from Films...! #nissan #skyline', '2024-02-18', '1708217063.jpg', 7, 1, '2024-02-17 17:44:26', '2024-02-17 17:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_foto`
--

CREATE TABLE `keranjang_foto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `tanggal_unggah` date NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_foto`
--

CREATE TABLE `komentar_foto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar_foto`
--

INSERT INTO `komentar_foto` (`id`, `foto_id`, `user_id`, `isi_komentar`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 'Salam Kenal broku...', '2024-02-16 00:15:24', '2024-02-16 00:15:24'),
(3, 4, 2, 'mahal juga peci nya joooo', '2024-02-16 00:17:28', '2024-02-16 00:17:28'),
(4, 6, 1, 'Halo aku lagi di Jepang ~nagisa', '2024-02-16 01:21:12', '2024-02-16 01:21:12'),
(5, 3, 1, 'keeren', '2024-02-16 03:23:51', '2024-02-16 03:23:51'),
(7, 10, 4, 'Halo', '2024-02-16 03:40:17', '2024-02-16 03:40:17'),
(8, 11, 2, 'Burik amat dah bwang... grafik majapahit', '2024-02-17 17:45:28', '2024-02-17 17:45:28'),
(9, 11, 3, 'Buset bang, motonya pake hp nokia ya?', '2024-02-17 17:47:10', '2024-02-17 17:47:10'),
(10, 11, 1, 'hehehe, nyolong bang di Google...', '2024-02-17 17:48:02', '2024-02-17 17:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `like_foto`
--

CREATE TABLE `like_foto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_like` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_foto`
--

INSERT INTO `like_foto` (`id`, `foto_id`, `user_id`, `tanggal_like`, `created_at`, `updated_at`) VALUES
(1, 4, 3, '2024-02-16', '2024-02-16 00:14:58', '2024-02-16 00:14:58'),
(2, 4, 1, '2024-02-16', '2024-02-16 00:16:21', '2024-02-16 00:16:21'),
(4, 4, 2, '2024-02-16', '2024-02-16 00:17:33', '2024-02-16 00:17:33'),
(7, 3, 3, '2024-02-16', '2024-02-16 00:37:12', '2024-02-16 00:37:12'),
(9, 2, 3, '2024-02-16', '2024-02-16 00:37:36', '2024-02-16 00:37:36'),
(11, 2, 1, '2024-02-16', '2024-02-16 01:47:17', '2024-02-16 01:47:17'),
(12, 10, 4, '2024-02-16', '2024-02-16 03:41:13', '2024-02-16 03:41:13'),
(14, 8, 4, '2024-02-16', '2024-02-16 03:48:06', '2024-02-16 03:48:06'),
(15, 11, 2, '2024-02-18', '2024-02-17 17:45:40', '2024-02-17 17:45:40'),
(16, 11, 3, '2024-02-18', '2024-02-17 17:47:27', '2024-02-17 17:47:27'),
(17, 11, 1, '2024-02-18', '2024-02-17 17:48:06', '2024-02-17 17:48:06'),
(18, 1, 1, '2024-02-18', '2024-02-17 18:42:43', '2024-02-17 18:42:43'),
(19, 6, 1, '2024-02-18', '2024-02-17 19:05:56', '2024-02-17 19:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_03_042643_create_fotos_table', 1),
(6, '2024_02_03_045101_create_albums_table', 1),
(7, '2024_02_03_074329_create_keranjang_fotos_table', 1),
(8, '2024_02_09_060122_create_like_fotos_table', 1),
(9, '2024_02_12_020911_create_komentar_fotos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `no_tlp` varchar(255) DEFAULT NULL,
  `foto_profile` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nama_lengkap`, `no_tlp`, `foto_profile`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'nagisa_fuyutsuki_', 'nagisa@gmail.com', '$2y$12$qhQnTfDx.Ky0jiP0spHGbuw80WcyIexm9DFvdTVKjzJuSnT83oPzu', 'Nagisa Fuyutsuki', '081222326765', 'user-images/0cNuh0xbW7jppjaDUsebYTNiv5a2M4Xd4lrrDN5x.jpg', 'You got to be yourself... You can\'t be no one else', '2024-02-15 23:52:00', '2024-02-16 00:07:17'),
(2, 'keizo_zero07', 'keizo@gmail.com', '$2y$12$vUKv9FbVw.amhMs2Brsqq.wCrRyxBoP7TiYU5Ww2DPIjCOO8BBFve', 'Keizo Zero', NULL, 'user-images/OwH56Wo5kYGc7hb8cIDaBY8u1DwNIeybcrPbaykI.jpg', 'Life is but A Dream, but die is not a choice', '2024-02-15 23:54:53', '2024-02-15 23:59:51'),
(3, 'im_gojooo', 'gojo@gmail.com', '$2y$12$inuvdUqmPB9FdNxF1fX8P.sTzOCniMRaPOyjhBgMAcekTR0qHFgJu', 'Gojo Satoru', NULL, 'user-images/1shqRRK4XrkDjwc9PTI3I64Al8xcZcA214b30Tq3.jpg', 'Yare yaree...', '2024-02-15 23:57:00', '2024-02-16 00:09:10'),
(4, 'haidar_18', 'haidar@gmail.com', '$2y$12$kU9qS.Ap0kS7SEkvX5EPPeVZPHjEHdRf3BYChrQn5XwtWwDMgNIX2', 'Haidar A', NULL, 'user-images/rHiza3u2RhhBo68MGlnrgDmMx5C9HRaGDadnZCrz.jpg', NULL, '2024-02-16 03:35:56', '2024-02-16 03:37:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang_foto`
--
ALTER TABLE `keranjang_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_foto`
--
ALTER TABLE `like_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keranjang_foto`
--
ALTER TABLE `keranjang_foto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `like_foto`
--
ALTER TABLE `like_foto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
