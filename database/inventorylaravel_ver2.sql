-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2022 pada 17.04
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorylaravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) NOT NULL,
  `id_kategori` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` float NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `nama`, `harga`, `stock`, `created_at`, `updated_at`) VALUES
(0, 0, 'Datah telah Di hapus', 0, 0, '2022-05-07 17:06:42', '2022-05-07 17:06:42'),
(2, 3, 'Pupuk NPK', 150000, 4, '2022-05-20 13:37:18', '2022-05-31 19:48:46'),
(3, 3, 'Pupuk Cair', 25000, 2, '2022-05-31 19:46:09', '0000-00-00 00:00:00'),
(4, 3, 'Pupuk Urea', 20000, 6, '2022-05-31 19:49:01', '0000-00-00 00:00:00'),
(5, 5, 'Bibit Jagung', 20000, 10, '2022-05-31 19:49:46', '0000-00-00 00:00:00'),
(6, 6, 'Obat Unggas', 20000, 6, '2022-05-31 20:08:35', '0000-00-00 00:00:00'),
(7, 6, 'Obat Kambing', 65000, 7, '2022-05-31 20:08:57', '0000-00-00 00:00:00'),
(8, 7, 'Gas LP Ungu', 70000, 2, '2022-06-01 16:51:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_stock`
--

CREATE TABLE `barang_stock` (
  `id` bigint(20) NOT NULL,
  `id_barang` bigint(20) NOT NULL,
  `id_transaksi` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `type` char(1) NOT NULL COMMENT 'm = masuk, k = keluar',
  `qty` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_stock`
--

INSERT INTO `barang_stock` (`id`, `id_barang`, `id_transaksi`, `id_user`, `type`, `qty`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 'm', 5, '2022-05-31', '2022-05-31 20:13:16', NULL),
(2, 2, 1, 1, 'm', 15, '2022-05-31', '2022-05-31 20:13:16', NULL),
(3, 4, 2, 1, 'm', 4, '2022-06-01', '2022-06-01 16:06:15', NULL),
(4, 4, 2, 1, 'm', 2, '2022-06-01', '2022-06-01 16:06:15', NULL),
(5, 7, 2, 1, 'm', 7, '2022-06-01', '2022-06-01 16:06:15', NULL),
(6, 6, 2, 1, 'm', 1, '2022-06-01', '2022-06-01 16:06:15', NULL),
(7, 4, 3, 1, 'm', 3, '2022-03-05', '2022-06-01 16:20:42', NULL),
(8, 5, 3, 1, 'm', 4, '2022-03-05', '2022-06-01 16:20:42', NULL),
(9, 6, 3, 1, 'm', 6, '2022-03-05', '2022-06-01 16:20:42', NULL),
(10, 6, 3, 1, 'm', 7, '2022-03-05', '2022-06-01 16:20:42', NULL),
(11, 5, 4, 1, 'm', 1, '2022-06-03', '2022-06-03 16:00:58', NULL),
(12, 4, 4, 1, 'm', 1, '2022-06-03', '2022-06-03 16:00:58', NULL),
(13, 4, 4, 1, 'm', 1, '2022-06-03', '2022-06-03 16:00:58', NULL),
(14, 6, 4, 1, 'm', 1, '2022-06-03', '2022-06-03 16:00:58', NULL),
(15, 7, 4, 1, 'm', 1, '2022-06-03', '2022-06-03 16:00:58', NULL),
(16, 3, 4, 1, 'm', 1, '2022-06-03', '2022-06-03 16:00:58', NULL),
(17, 2, 5, 1, 'k', 1, '2022-06-03', '2022-06-03 16:01:40', NULL),
(18, 3, 5, 1, 'k', 1, '2022-06-03', '2022-06-03 16:01:40', NULL),
(19, 7, 6, 1, 'm', 5, '2022-06-07', '2022-06-07 16:56:49', NULL),
(20, 8, 6, 1, 'm', 5, '2022-06-07', '2022-06-07 16:56:49', NULL),
(21, 5, 6, 1, 'm', 5, '2022-06-07', '2022-06-07 16:56:49', NULL),
(22, 3, 6, 1, 'm', 5, '2022-06-07', '2022-06-07 16:56:49', NULL),
(23, 2, 7, 1, 'k', 10, '2022-06-07', '2022-06-07 16:58:00', NULL),
(24, 8, 7, 1, 'k', 3, '2022-06-07', '2022-06-07 16:58:00', NULL),
(25, 3, 7, 1, 'k', 3, '2022-06-07', '2022-06-07 16:58:00', NULL),
(26, 6, 7, 1, 'k', 9, '2022-06-07', '2022-06-07 16:58:00', NULL),
(27, 3, 8, 1, 'k', 6, '2022-06-10', '2022-06-10 11:34:05', NULL),
(28, 4, 9, 1, 'k', 5, '2022-06-10', '2022-06-10 12:04:20', NULL),
(29, 7, 10, 1, 'k', 6, '2022-06-10', '2022-06-10 12:11:13', NULL),
(30, 3, 11, 1, 'm', 1, '2022-06-12', '2022-06-12 22:02:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(0, 'Datah telah Di hapus', '2022-05-07 17:05:33', '2022-05-07 17:05:33'),
(3, 'Pupuk', '2022-05-20 13:10:54', NULL),
(5, 'Bibit', '2022-05-31 19:46:49', NULL),
(6, 'Obat', '2022-05-31 19:48:09', NULL),
(7, 'Gas LPG', '2022-06-01 16:50:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `no_tlp`, `created_at`, `updated_at`) VALUES
(0, 'Datah telah Di hapus', 'Datah telah Di hapus', 'Datah telah Di hapus', '2022-05-07 17:07:21', '2022-05-07 17:07:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id`, `nama`, `alamat`, `no_tlp`, `created_at`, `updated_at`) VALUES
(0, 'Datah telah Di hapus', 'Datah telah Di hapus', 'Datah telah Di hapus', '2022-05-07 17:07:43', '2022-05-07 17:07:43'),
(2, 'PT Sumber Jaya', 'Jl. Elang', '08123456789', '2022-05-20 13:17:20', NULL),
(3, 'PT Sumber Makmur', 'Jl. Kambing', '081234566543', '2022-05-31 20:09:30', '2022-05-31 20:09:44'),
(4, 'PT Sumber Air', 'jl. kembar', '08123456760', '2022-05-31 20:10:14', NULL),
(5, 'PT Sumber Abadi', 'Jl. Samit', '08123456799', '2022-05-31 20:11:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) NOT NULL,
  `no_transaksi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_pemasok` bigint(20) DEFAULT NULL,
  `id_user` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `grandtotal` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_transaksi`, `keterangan`, `id_pemasok`, `id_user`, `tanggal`, `grandtotal`, `created_at`, `updated_at`) VALUES
(1, '1654002796', 'Stock', 3, 1, '2022-05-31', 2375000, '2022-05-31 20:13:16', NULL),
(2, '1654074375', 'Entry Data', 2, 1, '2022-06-01', 595000, '2022-06-01 16:06:15', NULL),
(3, '1654075242', 'Test', 2, 1, '2022-03-05', 400000, '2022-06-01 16:20:42', NULL),
(4, '1654246858', 'Keluar', 2, 1, '2022-06-03', 170000, '2022-06-03 16:00:58', NULL),
(5, '1654246900', 'keluar', NULL, 1, '2022-06-03', 175000, '2022-06-03 16:01:40', NULL),
(6, '1654595809', 'Bulanan', 3, 1, '2022-06-07', 900000, '2022-06-07 16:56:49', NULL),
(7, '1654595880', 'Keluar', NULL, 1, '2022-06-07', 1965000, '2022-06-07 16:58:00', NULL),
(8, '1654835645', 'Keluar', NULL, 1, '2022-06-10', 150000, '2022-06-10 11:34:05', NULL),
(9, '1654837460', 'Keluar', NULL, 1, '2022-06-10', 100000, '2022-06-10 12:04:20', NULL),
(10, '1654837873', 'Keluar', NULL, 1, '2022-06-10', 390000, '2022-06-10 12:11:13', NULL),
(11, '1655046179', 'cxcxc', 3, 1, '2022-06-12', 25000, '2022-06-12 22:02:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_item`
--

CREATE TABLE `transaksi_item` (
  `id` bigint(20) NOT NULL,
  `id_transaksi` bigint(20) NOT NULL,
  `id_barang` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` float NOT NULL,
  `grandtotal` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_item`
--

INSERT INTO `transaksi_item` (`id`, `id_transaksi`, `id_barang`, `qty`, `harga`, `grandtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 5, 25000, 125000, '2022-05-31 20:13:16', NULL),
(2, 1, 2, 15, 150000, 2250000, '2022-05-31 20:13:16', NULL),
(3, 2, 4, 4, 20000, 80000, '2022-06-01 16:06:15', NULL),
(4, 2, 4, 2, 20000, 40000, '2022-06-01 16:06:15', NULL),
(5, 2, 7, 7, 65000, 455000, '2022-06-01 16:06:15', NULL),
(6, 2, 6, 1, 20000, 20000, '2022-06-01 16:06:15', NULL),
(7, 3, 4, 3, 20000, 60000, '2022-06-01 16:20:42', NULL),
(8, 3, 5, 4, 20000, 80000, '2022-06-01 16:20:42', NULL),
(9, 3, 6, 6, 20000, 120000, '2022-06-01 16:20:42', NULL),
(10, 3, 6, 7, 20000, 140000, '2022-06-01 16:20:42', NULL),
(11, 4, 5, 1, 20000, 20000, '2022-06-03 16:00:58', NULL),
(12, 4, 4, 1, 20000, 20000, '2022-06-03 16:00:58', NULL),
(13, 4, 4, 1, 20000, 20000, '2022-06-03 16:00:58', NULL),
(14, 4, 6, 1, 20000, 20000, '2022-06-03 16:00:58', NULL),
(15, 4, 7, 1, 65000, 65000, '2022-06-03 16:00:58', NULL),
(16, 4, 3, 1, 25000, 25000, '2022-06-03 16:00:58', NULL),
(17, 5, 2, 1, 150000, 150000, '2022-06-03 16:01:40', NULL),
(18, 5, 3, 1, 25000, 25000, '2022-06-03 16:01:40', NULL),
(19, 6, 7, 5, 65000, 325000, '2022-06-07 16:56:49', NULL),
(20, 6, 8, 5, 70000, 350000, '2022-06-07 16:56:49', NULL),
(21, 6, 5, 5, 20000, 100000, '2022-06-07 16:56:49', NULL),
(22, 6, 3, 5, 25000, 125000, '2022-06-07 16:56:49', NULL),
(23, 7, 2, 10, 150000, 1500000, '2022-06-07 16:58:00', NULL),
(24, 7, 8, 3, 70000, 210000, '2022-06-07 16:58:00', NULL),
(25, 7, 3, 3, 25000, 75000, '2022-06-07 16:58:00', NULL),
(26, 7, 6, 9, 20000, 180000, '2022-06-07 16:58:00', NULL),
(27, 8, 3, 6, 25000, 150000, '2022-06-10 11:34:05', NULL),
(28, 9, 4, 5, 20000, 100000, '2022-06-10 12:04:20', NULL),
(29, 10, 7, 6, 65000, 390000, '2022-06-10 12:11:13', NULL),
(30, 11, 3, 1, 25000, 25000, '2022-06-12 22:02:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'admin,pengurus',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_id` bigint(20) DEFAULT NULL,
  `username_telegram` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `chat_id`, `username_telegram`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, '0', 'Data was deleted!', 'Data was deleted!', NULL, NULL, NULL, 'Data was deleted!', NULL, NULL, NULL),
(1, 'admin', 'Sabrina Malakumalam sari', 'admin@inventory.com', 1883724643, 'aqilitc', NULL, '$2y$10$7nIwF3vdYrVzRktFqFe0suPcrF33V0G4NFzpFWam4sfNx4zToFE2y', NULL, '2022-03-02 15:21:33', '2022-06-12 15:02:05'),
(2, 'pengurus', 'pengurus', 'pengurus@inventory.com', NULL, NULL, NULL, '$2y$10$7nIwF3vdYrVzRktFqFe0suPcrF33V0G4NFzpFWam4sfNx4zToFE2y', NULL, '2022-03-02 15:21:33', '2021-06-02 13:57:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_stock`
--
ALTER TABLE `barang_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_item`
--
ALTER TABLE `transaksi_item`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `barang_stock`
--
ALTER TABLE `barang_stock`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi_item`
--
ALTER TABLE `transaksi_item`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
