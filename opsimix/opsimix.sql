-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2021 pada 16.26
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opsimix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barcode` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenisMenu` enum('minuman','makanan','topping') NOT NULL,
  `harga` int(11) NOT NULL,
  `ukuran` enum('L','M','-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barcode`, `nama_barang`, `jenisMenu`, `harga`, `ukuran`) VALUES
('1.1', 'Thai Tea', 'minuman', 13000, 'M'),
('1.2', 'Thai Tea', 'minuman', 15000, 'L'),
('10', 'Strawberry Squash', 'minuman', 17000, 'M'),
('11', 'Lime Squash', 'minuman', 15000, 'M'),
('12', 'Blue Ocean', 'minuman', 18000, 'M'),
('13', 'Sunrise', 'minuman', 17000, 'M'),
('14', 'V60 ', 'minuman', 17000, 'M'),
('15', 'Vietnam Drip', 'minuman', 13000, 'M'),
('16', 'French Press', 'minuman', 10000, 'M'),
('17', 'Tubruk', 'minuman', 10000, 'M'),
('18.1', 'Cappucino', 'minuman', 20000, 'M'),
('18.2', 'Cappucino', 'minuman', 23000, 'L'),
('19.1', 'Mochacino', 'minuman', 21000, 'M'),
('19.2', 'Mochacino', 'minuman', 24000, 'L'),
('2.1', 'Matcha Latte', 'minuman', 20000, 'M'),
('2.2', 'Matcha Latte', 'minuman', 23000, 'L'),
('20.1', 'Matcha Blend', 'minuman', 22000, 'M'),
('20.2', 'Matcha Blend', 'minuman', 25000, 'L'),
('21.1', 'Tiramissu', 'minuman', 22000, 'M'),
('21.2', 'Tiramissu', 'minuman', 25000, 'L'),
('22.1', 'Red Velvet Blend', 'minuman', 22000, 'M'),
('22.2', 'Red Velvet Blend', 'minuman', 25000, 'L'),
('23.1', 'Taro', 'minuman', 22000, 'M'),
('23.2', 'Taro', 'minuman', 25000, 'L'),
('24.1', 'Chocolate Blend', 'minuman', 22000, 'M'),
('24.2', 'Chocolate Blend', 'minuman', 25000, 'L'),
('25.1', 'Cookies', 'minuman', 21000, 'M'),
('25.2', 'Cookies', 'minuman', 24000, 'L'),
('26', 'Keju', 'topping', 3000, '-'),
('27', 'Boba', 'topping', 3000, '-'),
('28', 'Sauce Caramel', 'topping', 3000, '-'),
('29', 'Sauce Chocolate', 'topping', 3000, '-'),
('3.1', 'Red Velvet Latte', 'minuman', 20000, 'M'),
('3.2', 'Red Velvet Latte', 'minuman', 23000, 'L'),
('30', 'Es Cream', 'topping', 3000, '-'),
('31', 'Es Cream', 'topping', 3000, '-'),
('32', 'Sosis', 'makanan', 8000, '-'),
('33', 'Nugget', 'makanan', 8000, '-'),
('34', 'Gorengan Mendoan', 'makanan', 5000, '-'),
('35', 'Indomie Goreng/Rebus', 'makanan', 8000, '-'),
('36', 'Roti Bakar Coklat', 'makanan', 10000, '-'),
('37', 'Roti Bakar Keju', 'makanan', 11000, '-'),
('4.1', 'Taro Latte', 'minuman', 20000, 'M'),
('4.2', 'Taro Latte', 'minuman', 23000, 'L'),
('5.1', 'Strawberry Tea', 'minuman', 13000, 'M'),
('5.2', 'Strawberry Tea', 'minuman', 15000, 'L'),
('6.1', 'Lychee Tea', 'minuman', 13000, 'M'),
('6.2', 'Lychee Tea', 'minuman', 15000, 'L'),
('7.1', 'Chocolate Original', 'minuman', 20000, 'M'),
('7.2', 'Chocolate Original', 'minuman', 23000, 'L'),
('8.1', 'Cookies Latte', 'minuman', 19000, 'M'),
('8.2', 'Cookies Latte', 'minuman', 22000, 'L'),
('9', 'Rainbow ', 'minuman', 17000, 'M');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konsumen`
--

CREATE TABLE `tb_konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(12) NOT NULL DEFAULT 'Unkown',
  `telpon` varchar(12) NOT NULL DEFAULT 'Unkown',
  `email` varchar(50) NOT NULL DEFAULT 'Unkown'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `kode_penjualan` varchar(20) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `kode_penjualan` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `kode_barcode` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `password`, `level`) VALUES
(1, 'Seulgi', 'Seulgi', '12345', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barcode`);

--
-- Indeks untuk tabel `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_barcode` (`kode_barcode`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  ADD CONSTRAINT `tb_penjualan_detail_ibfk_1` FOREIGN KEY (`kode_barcode`) REFERENCES `tb_barang` (`kode_barcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
