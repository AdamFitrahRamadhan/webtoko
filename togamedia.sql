-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Mei 2018 pada 14.57
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `togamedia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(15) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `tahun` int(9) NOT NULL,
  `kode_kategori` varchar(15) DEFAULT NULL,
  `harga` int(25) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul_buku`, `tahun`, `kode_kategori`, `harga`, `penerbit`, `penulis`, `stok`) VALUES
('1A', 'Rantau Satu Muara', 2017, 'H', 70000, 'PT Gramedia', 'Ahmad Fuadi', 17),
('2A', 'Ranah 3 Warna', 2011, 'B', 75000, 'PT Gramedia', 'Ahmad Fuadi', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `kode_kasir` int(11) NOT NULL,
  `nama_kasir` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`kode_kasir`, `nama_kasir`, `password`, `level`) VALUES
(2, 'Dian F. Arif', 'dian', 'Admin'),
(3, 'farhan', 'far', 'Kasir'),
(4, 'iqbal', 'bal', 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(15) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('B', 'Biografi'),
('H', 'Horor'),
('K', 'Komedi'),
('R', 'Romantis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `kode_nota` int(11) NOT NULL,
  `kode_transaksi` int(11) DEFAULT NULL,
  `kode_buku` varchar(15) DEFAULT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`kode_nota`, `kode_transaksi`, `kode_buku`, `jumlah`) VALUES
(1, 2, '2A', 3),
(2, 2, '1A', 2),
(3, 3, '2A', 1),
(4, 3, '1A', 2),
(5, 4, '1A', 1),
(6, 5, '1A', 1),
(7, 5, '2A', 2),
(10, 7, '2A', 1),
(11, 8, '1A', 1),
(12, 9, '1A', 1),
(13, 10, '1A', 1),
(16, 12, '2A', 1),
(17, 13, '1A', 2),
(18, 14, '1A', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `total` int(20) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `nama_pembeli`, `total`, `tgl_beli`) VALUES
(2, 'Iqbal', 355000, '2018-05-05'),
(3, 'Boss', 205000, '2018-05-05'),
(4, 'Bisma', 65000, '2018-05-05'),
(5, 'Farhan', 215000, '2018-05-06'),
(7, 'Farhan', 75000, '2018-05-06'),
(8, 'Rauf', 65000, '2018-05-06'),
(9, 'Rauf', 65000, '2018-05-06'),
(10, 'Adrian', 65000, '2018-05-06'),
(12, '', 75000, '2018-05-06'),
(13, 'DIAN', 130000, '2018-05-06'),
(14, 'DANDY', 134000, '2018-05-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`kode_kasir`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`kode_nota`),
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `kode_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `kode_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
