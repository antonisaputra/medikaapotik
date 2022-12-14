-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Nov 2022 pada 06.23
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotikmedika`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `id_satuan` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `id_supplier`, `nama`, `qty`, `id_satuan`, `harga`) VALUES
(19, 10, 7, 'Bodrex', 0, 6, 1000),
(21, 10, 2, 'Sutra', 45, 3, 23000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `total_harga` int(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `id_user`, `waktu`, `total_harga`) VALUES
(23, 7, '2022-11-15 18:48:11', 4000),
(24, 7, '2022-11-15 18:48:11', 3000),
(25, 7, '2022-11-15 18:48:11', 1000),
(26, 7, '2022-11-15 18:52:14', 1000),
(27, 7, '2022-11-15 20:16:38', 1000),
(28, 7, '2022-11-15 20:16:38', 1000),
(29, 7, '2022-11-15 20:16:44', 1000),
(30, 7, '2022-11-15 20:16:44', 1000),
(31, 7, '2022-11-24 22:42:48', 1000),
(32, 7, '2022-11-24 22:42:48', 1000),
(33, 7, '2022-11-24 22:42:48', 1000),
(34, 7, '2022-11-24 23:31:57', 1000),
(35, 7, '2022-11-24 23:35:25', 1000),
(36, 7, '2022-11-24 23:35:25', 1000),
(37, 7, '2022-11-24 23:46:30', 1000),
(38, 7, '2022-11-24 23:48:42', 1000),
(39, 7, '2022-11-25 00:12:13', 1000),
(40, 7, '2022-11-25 00:12:31', 1000),
(41, 7, '2022-11-25 00:14:31', 1000),
(42, 7, '2022-11-25 00:14:49', 1000),
(43, 7, '2022-11-25 00:15:31', 1000),
(44, 7, '2022-11-25 00:17:20', 1000),
(45, 7, '2022-11-25 00:18:05', 1000),
(46, 7, '2022-11-25 00:25:38', 1000),
(47, 7, '2022-11-25 00:27:28', 1000),
(48, 7, '2022-11-25 00:27:39', 1000),
(49, 7, '2022-11-25 00:27:56', 1000),
(50, 7, '2022-11-25 00:28:19', 1000),
(51, 7, '2022-11-25 00:28:33', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar_detail`
--

CREATE TABLE `barang_keluar_detail` (
  `id` int(11) NOT NULL,
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_keluar_detail`
--

INSERT INTO `barang_keluar_detail` (`id`, `id_barang_keluar`, `id_barang`, `qty`, `subtotal`) VALUES
(15, 13, 19, 1, 0),
(16, 14, 19, 2, 0),
(17, 18, 21, 25, 115000),
(18, 19, 21, 1, 0),
(19, 20, 21, 1, 0),
(20, 21, 21, 1, 0),
(21, 22, 21, 1, 0),
(22, 23, 21, 4, 4000),
(23, 23, 21, 3, 3000),
(24, 23, 21, 1, 1000),
(25, 26, 21, 1, 1000),
(26, 27, 21, 1, 1000),
(27, 27, 21, 1, 1000),
(28, 29, 21, 1, 1000),
(29, 29, 21, 1, 1000),
(30, 31, 21, 1, 1000),
(31, 31, 21, 1, 1000),
(32, 31, 19, 1, 1000),
(33, 34, 19, 1, 1000),
(34, 35, 19, 1, 1000),
(35, 35, 21, 1, 1000),
(36, 37, 19, 1, 1000),
(37, 38, 19, 1, 1000),
(38, 39, 19, 1, 1000),
(39, 39, 21, 1, 1000),
(40, 41, 21, 1, 1000),
(41, 42, 21, 1, 1000),
(42, 43, 21, 1, 1000),
(43, 44, 21, 1, 1000),
(44, 44, 21, 1, 1000),
(45, 44, 19, 1, 1000),
(46, 47, 21, 1, 1000),
(47, 47, 19, 1, 1000),
(48, 47, 21, 1, 1000),
(49, 50, 21, 1, 1000),
(50, 46, 19, 1, 1000),
(51, 46, 21, 1, 1000),
(52, 47, 19, 1, 1000),
(53, 48, 19, 1, 1000),
(54, 49, 21, 1, 1000),
(55, 49, 19, 1, 1000),
(56, 50, 21, 1, 1000),
(57, 51, 21, 1, 1000);

--
-- Trigger `barang_keluar_detail`
--
DELIMITER $$
CREATE TRIGGER `kurangi_barang` BEFORE INSERT ON `barang_keluar_detail` FOR EACH ROW BEGIN
	UPDATE barang
	SET qty = qty - NEW.qty
	WHERE id = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `total_harga` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_user`, `waktu`, `total_harga`) VALUES
(26, 7, '2022-10-31 18:56:20', 1000),
(27, 7, '2022-10-31 19:38:56', 1000),
(28, 7, '2022-11-15 14:16:51', 1000),
(29, 7, '2022-11-15 14:17:05', 1000),
(30, 7, '2022-11-15 08:35:10', 2301000),
(31, 7, '2022-11-15 18:39:04', 46000),
(32, 7, '2022-11-15 20:17:48', 23000),
(33, 7, '2022-11-25 00:15:11', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk_detail`
--

CREATE TABLE `barang_masuk_detail` (
  `id` int(11) NOT NULL,
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_masuk_detail`
--

INSERT INTO `barang_masuk_detail` (`id`, `id_barang_masuk`, `id_barang`, `qty`, `subtotal`) VALUES
(30, 26, 19, 1, 1000),
(31, 27, 19, 1, 1000),
(32, 28, 19, 1, 1000),
(33, 29, 19, 1, 1000),
(34, 30, 19, 1, 1000),
(35, 30, 21, 100, 2300000),
(36, 31, 21, 2, 46000),
(37, 32, 21, 1, 23000),
(38, 33, 19, 10, 10000);

--
-- Trigger `barang_masuk_detail`
--
DELIMITER $$
CREATE TRIGGER `tambah_barang` AFTER INSERT ON `barang_masuk_detail` FOR EACH ROW UPDATE barang
SET qty = qty + NEW.qty
WHERE id = NEW.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_harga_masuk` AFTER INSERT ON `barang_masuk_detail` FOR EACH ROW BEGIN
	UPDATE barang_masuk
	SET total_harga = total_harga + NEW.subtotal
	WHERE id = NEW.id_barang_masuk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_barang_keluar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_barang_keluar` (
`id` int(11)
,`id_user` int(11)
,`waktu` datetime
,`total_harga` int(101)
,`id_barang` int(11)
,`qty` int(11)
,`subtotal` int(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_barang_masuk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_barang_masuk` (
`id` int(11)
,`id_user` int(11)
,`waktu` datetime
,`total_harga` int(11)
,`id_barang` int(11)
,`qty` int(11)
,`subtotal` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `tgldibuat` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('valid','invalid') NOT NULL DEFAULT 'valid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `tgldibuat`, `status`) VALUES
(2, 'Obat luar', '2022-09-27', 'valid'),
(10, 'Obat Dalam', '2022-10-31', 'valid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_keluar`
--

CREATE TABLE `keranjang_keluar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_masuk`
--

CREATE TABLE `keranjang_masuk` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keranjang_masuk`
--

INSERT INTO `keranjang_masuk` (`id`, `id_user`, `id_barang`, `qty`, `subtotal`) VALUES
(15, 7, 19, 2, 2000);

--
-- Trigger `keranjang_masuk`
--
DELIMITER $$
CREATE TRIGGER `subtotal_keranjang_masuk` BEFORE INSERT ON `keranjang_masuk` FOR EACH ROW BEGIN
	
	DECLARE harga_barang INT DEFAULT 0;
	SET harga_barang = (SELECT harga FROM barang WHERE id = NEW.id_barang LIMIT 1);

	SET NEW.subtotal = NEW.qty * harga_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` enum('valid','invalid') NOT NULL DEFAULT 'valid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `nama`, `status`) VALUES
(3, 'ons', 'valid'),
(4, 'kilo gram', 'valid'),
(5, 'bungkus', 'valid'),
(6, 'Kaplet', 'valid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status` enum('aktif','non-aktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `email`, `telefon`, `alamat`, `status`) VALUES
(2, 'PT Maju Mundur', 'maju.mundur@korporat.com', '08484844332', 'Jl. Medokan Asri Barat No. 42', 'aktif'),
(7, 'Apotik Seberang Jalan', 'zarkasi@gmail.com', '09999948594', 'Masbagik, Pratoh', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `ktp` varchar(30) NOT NULL,
  `role` enum('admin','staff') NOT NULL DEFAULT 'staff',
  `status` enum('aktif','non-aktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `telefon`, `ktp`, `role`, `status`) VALUES
(7, 'Medika Admin', 'medika@gmail.com', '$2y$10$rQQFIfRC8/Etqd9V9Kks8uMxaOihfeK3lQ00197YB43MBDtm55HZ6', '087743329301', '2243456345634563456', 'admin', 'aktif'),
(9, 'test', 'email@gmail.com', '$2y$10$pwOy.AHHEJDh4uxXjp0UBOaAtlI.6pu8CXqq3KrMGuNeRDR7PAgwC', '0812345678', '92827373831', 'staff', 'aktif');

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_barang_keluar`
--
DROP TABLE IF EXISTS `detail_barang_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_barang_keluar`  AS   (select `barang_keluar`.`id` AS `id`,`barang_keluar`.`id_user` AS `id_user`,`barang_keluar`.`waktu` AS `waktu`,`barang_keluar`.`total_harga` AS `total_harga`,`barang_keluar_detail`.`id_barang` AS `id_barang`,`barang_keluar_detail`.`qty` AS `qty`,`barang_keluar_detail`.`subtotal` AS `subtotal` from (`barang_keluar_detail` join `barang_keluar`) where `barang_keluar_detail`.`id_barang_keluar` = `barang_keluar`.`id`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_barang_masuk`
--
DROP TABLE IF EXISTS `detail_barang_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_barang_masuk`  AS   (select `barang_masuk`.`id` AS `id`,`barang_masuk`.`id_user` AS `id_user`,`barang_masuk`.`waktu` AS `waktu`,`barang_masuk`.`total_harga` AS `total_harga`,`barang_masuk_detail`.`id_barang` AS `id_barang`,`barang_masuk_detail`.`qty` AS `qty`,`barang_masuk_detail`.`subtotal` AS `subtotal` from (`barang_masuk_detail` join `barang_masuk`) where `barang_masuk_detail`.`id_barang_masuk` = `barang_masuk`.`id`)  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_keluar_detail`
--
ALTER TABLE `barang_keluar_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang_keluar`
--
ALTER TABLE `keranjang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang_masuk`
--
ALTER TABLE `keranjang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar_detail`
--
ALTER TABLE `barang_keluar_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `keranjang_keluar`
--
ALTER TABLE `keranjang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `keranjang_masuk`
--
ALTER TABLE `keranjang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
