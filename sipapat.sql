-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 25 Jul 2019 pada 18.24
-- Versi Server: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipapat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `author` varchar(256) NOT NULL,
  `status` int(5) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`id`, `title`, `slug`, `deskripsi`, `start_at`, `end_at`, `created_at`, `updated_at`, `gambar`, `author`, `status`, `kategori`) VALUES
(1, 'Selametan lapangan voli RT 05/04.', 'selametan-lapangan-voli-rt-05/04.', '<p>Lorem ipsum dolor sit amet, consectetur <b>adipisicing</b> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud <b>exercitation ullamco</b>.<br></p>', '2019-07-22 00:00:00', '2019-07-24 00:00:00', '2019-07-21 13:42:36', '2019-07-21 20:42:36', 'sunset3.jpg', 'Salung Prastyo', 1, 'Olahraga'),
(2, 'Gotong royong membuat selokan untuk menanggulangi banjir', 'gotong-royong-membuat-selokan-untuk-menanggulangi-banjir', '<p>Lorem ipsum <i>dolor</i> sit amet, <b>consectetur adipisicing</b> elit, sed do eiusmod&nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&nbsp;quis nostrud exercitation ullamco.<br></p>', '2019-07-30 00:00:00', '2019-07-31 00:00:00', '2019-07-21 13:45:20', '2019-07-21 20:45:20', 'default.jpg', 'Salung Prastyo', 1, 'Pertanian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `author` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar` varchar(128) NOT NULL,
  `author_id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `jumlah_pembaca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `title`, `slug`, `deskripsi`, `author`, `created_at`, `updated_at`, `gambar`, `author_id`, `kategori`, `jumlah_pembaca`) VALUES
(3, 'Cara membuat program upload file dengan php', 'cara-membuat-program-upload-file-dengan-php', '<p>Ini adalah tutorial cara membuat prgram file upload dengan php.Oke langsung saja.</p>', 'Salung Prastyo', '2019-07-13 05:51:02', '2019-07-13 05:51:02', 'sunset2.jpg', 1, '', 0),
(4, 'Tutorial laravel part 1', 'tutorial-laravel-part-1', '<p>Ini adalah tutorial laravel part 1 oleh <b>taylor otwell</b>.</p>', 'Salung Prastyo', '2019-07-13 05:53:50', '2019-07-13 05:53:50', 'sunset9.jpg', 11, 'Pertanian', 0),
(5, 'Panen padi melimpah ruah', 'panen-padi-melimpah-ruah', '<p>Hasil dari panen padi sangat <b>mencengangkan.</b></p>', 'Salung Prastyo', '2019-07-14 05:05:43', '2019-07-14 05:05:43', 'sunset8.jpg', 11, 'Pertanian', 0),
(6, 'Cara membuat kue dengan kentang', 'cara-membuat-kue-dengan-kentang', '<p>ini adalah tutorial cara membuat kue dengan kentang pertama tama.</p>', 'Kevin alvaro', '2019-07-14 05:26:45', '2019-07-14 05:26:45', 'sunset5.jpg', 4, 'Peternakan', 0),
(7, 'Hallo kali ini kita akan belajar vue js', 'hallo-kali-ini-kita-akan-belajar-vue-js', '<p>Pertama tama&nbsp;<b>vue js&nbsp;</b>dibuat oleh <b>Evan You&nbsp;</b>dengan melihat beberapa framework seperti angular dan react js.</p>', 'Salung Prastyo', '2019-07-20 11:42:03', '2019-07-20 11:42:03', 'sunset7.jpg', 11, 'Teknologi', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `pesan`, `created_at`) VALUES
(1, 'Salung Prastyo', 'salungprastyo@gmail.com', 'Website yang bagus!', '2019-07-17 11:56:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_login`
--

CREATE TABLE `log_login` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_login`
--

INSERT INTO `log_login` (`id`, `username`, `password`, `created_at`, `type`) VALUES
(3, 'salungprastyo@gmail.com', 'admin', '2019-07-10 02:03:25', 'success'),
(4, 'salungprastyo@gmail.com', 'admin', '2019-07-10 02:13:42', 'success'),
(5, 'kevinalvaro@gmail.com', 'salung', '2019-07-10 04:03:16', 'failed email'),
(6, 'salungprastyo99@gmail.com', 'salung', '2019-07-10 04:08:28', 'success'),
(7, 'salungprastyo@gmail.com', 'admin', '2019-07-10 17:08:59', 'success'),
(8, 'fahrul@gmail.com', 'fahrul', '2019-07-11 05:31:20', 'wrong password'),
(9, 'fahrul@gmail.com', 'admin', '2019-07-11 05:31:26', 'wrong password'),
(10, 'kevinalvaro@gmail.com', 'admin', '2019-07-11 05:31:37', 'wrong password'),
(11, 'salungprastyo@gmail.com', 'admin', '2019-07-11 05:31:45', 'success'),
(12, 'taylorotwell@laravel.com', 'taylorow', '2019-07-11 05:52:38', 'success'),
(13, 'taylorotwell@laravel.com', 'taylorow', '2019-07-11 05:55:34', 'success'),
(14, 'salungprastyo@gmail.com', 'admin', '2019-07-11 05:56:20', 'success'),
(15, 'taylorotwell@laravel.com', 'taylorow', '2019-07-11 06:23:58', 'success'),
(16, 'fahrul@gmail.com', 'fahrul', '2019-07-11 06:33:08', 'wrong password'),
(17, 'salungprastyo@gmail.com', 'admin\'', '2019-07-11 06:33:27', 'wrong password'),
(18, 'salungprastyo@gmail.com', 'admin', '2019-07-11 06:33:33', 'success'),
(19, 'salungprastyo@gmail.com', 'admin', '2019-07-11 15:19:12', 'success'),
(20, 'taylorotwell@laravel.com', 'taylorow', '2019-07-11 17:29:45', 'success'),
(21, 'salungprastyo@gmail.com', 'salung', '2019-07-13 05:44:36', 'wrong password'),
(22, 'salungprastyo@gmail.com', 'admin', '2019-07-13 05:44:42', 'success'),
(23, 'taylorotwell@laravel.com', 'taylorow', '2019-07-13 05:53:01', 'success'),
(24, 'salungprastyo@gmail.com', 'admin', '2019-07-13 11:42:51', 'success'),
(25, 'taylorotwell@laravel.com', 'taylorow', '2019-07-13 12:19:53', 'success'),
(26, 'salungprastyo@gmail.com', 'admin', '2019-07-13 12:20:51', 'success'),
(27, 'salungprastyo@gmail.com', 'admin', '2019-07-13 16:49:58', 'failed email'),
(28, 'kevinalvaro@gmail.com', 'kevin', '2019-07-13 16:50:05', 'success'),
(29, 'kevinalvaro@gmail.com', 'kevin', '2019-07-14 05:03:55', 'success'),
(30, 'salungprastyo@gmail.com', 'admin', '2019-07-16 08:27:52', 'failed email'),
(31, 'kevinalvaro@gmail.com', 'kevin', '2019-07-16 08:28:00', 'success'),
(32, 'salungprastyo@gmail.com', 'admin', '2019-07-16 08:38:15', 'wrong password'),
(33, 'salungprastyo@gmail.com', 'admin', '2019-07-16 08:38:20', 'wrong password'),
(34, 'salungprastyo@gmail.com', 'salung', '2019-07-16 08:38:27', 'wrong password'),
(35, 'kevinalvaro@gmail.com', 'kevin', '2019-07-16 08:39:41', 'success'),
(36, 'kevinalvaro@gmail.com', 'kevin', '2019-07-16 11:23:07', 'success'),
(37, 'kevinalvaro@gmail.com', 'kevin', '2019-07-17 11:57:38', 'wrong password'),
(38, 'kevinalvaro@gmail.com', 'admin', '2019-07-17 11:57:44', 'wrong password'),
(39, 'salungprastyo@gmail.com', 'admin', '2019-07-17 11:57:50', 'wrong password'),
(40, 'johndoe@gmail.com', 'admin', '2019-07-17 11:58:24', 'failed email'),
(41, 'salungprastyo@gmail.com', 'admin', '2019-07-17 11:58:37', 'wrong password'),
(42, 'salungprastyo@gmail.com', 'admin', '2019-07-17 11:58:50', 'success'),
(43, 'salungprastyo@gmail.com', 'admin', '2019-07-18 05:10:49', 'success'),
(44, 'salungprastyo@gmail.com', 'admin', '2019-07-19 14:08:12', 'success'),
(45, 'salungprastyo@gmail.com', 'admin', '2019-07-20 05:35:45', 'success'),
(46, 'salungprastyo@gmail.com', 'admin', '2019-07-20 05:39:19', 'success'),
(47, 'kevinalvaro@gmail.com', 'kevin', '2019-07-20 05:40:14', 'wrong password'),
(48, 'kevinalvaro@gmail.com', 'admin', '2019-07-20 05:40:19', 'wrong password'),
(49, 'salungprastyo@gmail.com', 'admin', '2019-07-20 05:40:23', 'success'),
(50, 'salungprastyo@gmail.com', 'admin', '2019-07-20 05:47:52', 'success'),
(51, 'salungprastyo@gmail.com', 'admin', '2019-07-20 05:54:04', 'success'),
(52, 'kevinalvaro@gmail.com', 'admin', '2019-07-20 05:54:54', 'success'),
(53, 'salungprastyo@gmail.com', 'ADMIN', '2019-07-20 05:57:14', 'wrong password'),
(54, 'salungprastyo@gmail.com', 'ADMIN', '2019-07-20 05:57:19', 'wrong password'),
(55, 'salungprastyo@gmail.com', 'NAMA', '2019-07-20 05:57:30', 'wrong password'),
(56, 'salungprastyo@gmail.com', 'ADMIN', '2019-07-20 05:57:36', 'wrong password'),
(57, 'kevinalvaro@gmail.com', 'ADMIN', '2019-07-20 05:57:43', 'wrong password'),
(58, 'salungprastyo@gmail.com', 'ADMIN', '2019-07-20 05:57:53', 'wrong password'),
(59, 'salungprastyo@gmail.com', 'SALUNG', '2019-07-20 05:59:51', 'wrong password'),
(60, 'salungprastyo@gmail.com', '$2y$10$ZaCm2DQLCpOBPH925GTWXeG4E1SGNC7USoEzLr.3MYkaWUDaug.LK', '2019-07-20 06:00:02', 'wrong password'),
(61, 'kevinalvaro@gmail.com', '$2y$10$ZaCm2DQLCpOBPH925GTWXeG4E1SGNC7USoEzLr.3MYkaWUDaug.LK', '2019-07-20 06:00:29', 'wrong password'),
(62, 'kevinalvaro@gmail.com', 'ADMIN', '2019-07-20 06:00:35', 'wrong password'),
(63, 'salungprastyo@gmail.com', 'admin', '2019-07-20 06:01:55', 'wrong password'),
(64, 'salungprastyo@gmail.com', 'salung', '2019-07-20 06:02:02', 'success'),
(65, 'salungprastyo@gmail.com', 'admin', '2019-07-20 11:35:36', 'success'),
(66, 'salungprastyo@gmail.com', 'admin', '2019-07-20 17:04:10', 'success'),
(67, 'salungprastyo@gmail.com', 'admin', '2019-07-20 22:59:19', 'success'),
(68, 'salungprastyo@gmail.com', 'admin', '2019-07-21 13:23:28', 'success'),
(69, 'salungprastyo@gmail.com', 'admin', '2019-07-22 02:54:10', 'success'),
(70, 'salungprastyo@gmail.com', 'admin', '2019-07-25 06:24:16', 'success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`, `created_at`) VALUES
(1, 'salungprastyo@gmail.com', '2019-07-19 13:57:27'),
(2, 'kevinalvaro@gmail.com', '2019-07-19 14:59:15'),
(4, 'salungprastyo@gmail.com', '2019-07-21 15:19:17'),
(5, 'salungprastyo@gmail.com', '2019-07-21 15:19:24'),
(6, 'taylorotwell@laravel.com', '2019-07-25 06:25:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar` varchar(256) NOT NULL,
  `token_id` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `username`, `email`, `password`, `role_id`, `created_at`, `updated_at`, `gambar`, `token_id`) VALUES
(11, 'Salung Prastyo', 'john-doe', 'salung', 'salungprastyo@gmail.com', '$2y$10$Yc/s181iunJVoJLnG/eUpO6j2wRhYNYQ2u9eBipv1lrxo.rJBXvxK', 1, '2019-07-16 12:16:04', '2019-07-16 12:16:04', 'apple-logo.png', '$2y$10$raLpJOPGXxNDn2bIve8xcO/0CCj47kLMe2Qy3z/WJxSS813oG1JGe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
