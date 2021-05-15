-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 07:03 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barcode` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barcode`, `nama_barang`, `satuan`, `harga_beli`, `stok`, `harga_jual`, `profit`) VALUES
('0999871445289', 'Buku', 'PACK', 12000, 7, 20000, 8000),
('23467045658768', 'Pepsodent', 'LUSIN', 10000, 2, 20000, 10000),
('2366528905', 'test1234', 'LUSIN', 50000, 6, 200000, 150000),
('554389002457', 'Galon', 'PCS', 25000, 4, 50000, 25000),
('76981039475822', 'Roti', 'PACK', 12000, 0, 15000, 3000),
('8995757412003', 'ENVELOPE', 'PACK', 8000, 5, 12000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsumen`
--

CREATE TABLE `tb_konsumen` (
  `kode_konsumen` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konsumen`
--

INSERT INTO `tb_konsumen` (`kode_konsumen`, `nama`, `alamat`, `telpon`, `email`) VALUES
(1, 'Lutri', 'Villa Sentosa', '08536555920', 'lutriveflina@gmail.com'),
(2, 'Ayunda', 'jakarta selatan', '376800455787', 'ayunda@gmail.com'),
(3, 'Bejo', 'padang', '098765432567', 'bejo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id` int(11) NOT NULL,
  `nofaktur` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_supplier` varchar(20) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id`, `nofaktur`, `tanggal`, `nama_supplier`, `kode_barcode`, `stok`) VALUES
(5, 'TP001', '2019-03-29', 'PT. Cemilan Sentosa', 'ENVELOPE', 3),
(7, 'TP002', '2019-03-29', 'PT. Jaya Sentosa', 'SAMBAL ABC 123', 1),
(8, 'TP003', '2019-03-28', 'PT. Jaya Sentosa', 'SAMBAL ABC ', 1),
(9, 'TP005', '2019-03-15', 'PT. Cemilan Sentosa', 'Roti', 1),
(10, 'TP004', '2019-03-13', 'PT. Jaya Sentosa', 'ENVELOPE', 1),
(11, 'TP006', '2019-04-01', 'PT.Bahagia Selalu', 'Buku', 1),
(12, 'TP007', '2019-04-01', 'PT. Jaya Sentosa', '23467045658768', 1),
(13, 'TP0011', '2019-04-25', 'PT. Cemilan Sentosa', '23467045658768', 3),
(14, 'TP006', '2019-04-29', 'PT. Cemilan Sentosa', '8995757412003', 5),
(15, 'TP008', '2019-05-02', 'PT. Cemilan Sentosa', '0999871445289', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `kode_penjualan` varchar(20) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `kode_penjualan`, `tgl_penjualan`, `id_konsumen`, `bayar`, `kembali`) VALUES
(42, 'PJ-5332429854', '2019-03-28', 2, 80000, 8803),
(43, 'PJ-6516901876', '2019-03-28', 1, 100000, 36000),
(44, 'PJ-3262260082', '2019-03-28', 1, 150000, 19500),
(45, 'PJ-3262260082', '2019-04-29', 2, 877777, 747277),
(46, 'PJ-3262260082', '2019-04-29', 2, 400000, 269500),
(47, 'PJ-4288556993', '2019-04-29', 1, 55000, 3000),
(48, 'PJ-0385721628', '2019-04-29', 1, 100000, 5000),
(49, 'PJ-4163053924', '2019-05-02', 1, 109998, 1000),
(50, 'PJ-9646382369', '2019-05-04', 1, 70000, 9200);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `kode_penjualan` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `kode_barcode` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`kode_penjualan`, `id`, `kode_barcode`, `jumlah`, `diskon`, `potongan`, `total`) VALUES
('PJ-0338409229', 12, '76981039475822', 3, 20, 9000, 36000),
('PJ-3407961500', 13, '8995757412003', 4, 10, 4800, 43200),
('PJ-5332429854', 14, '', 0, 0, 0, 0),
('PJ-5332429854', 16, '0999871445289', 2, 20, 7999, 31997),
('PJ-5332429854', 17, '23467045658768', 2, 2, 800, 39200),
('PJ-3262260082', 19, '554389002457', 2, 10, 10000, 90000),
('PJ-3262260082', 20, '76981039475822', 3, 10, 4500, 40500),
('PJ-1206706183', 21, '23467045658768', 5, 10, 10000, 90000),
('PJ-4288556993', 22, '23467045658768', 2, 0, 0, 40000),
('PJ-4288556993', 23, '8995757412003', 1, 0, 0, 12000),
('PJ-0385721628', 24, '23467045658768', 2, 5, 2000, 38000),
('PJ-0385721628', 25, '0999871445289', 3, 5, 3000, 57000),
('PJ-4163053924', 26, '8995757412003', 2, 0, 0, 24000),
('PJ-4163053924', 27, '', 0, 0, 0, 0),
('PJ-4163053924', 28, '76981039475822', 2, 0, 0, 30000),
('PJ-4163053924', 29, '', 0, 0, 0, 0),
('PJ-4163053924', 30, '76981039475822', 1, 0, 0, 15000),
('PJ-4163053924', 31, '0999871445289', 2, 0, 0, 40000),
('PJ-3797940174', 32, '76981039475822', 2, 0, 0, 0),
('PJ-3797940174', 33, '76981039475822', 0, 0, 0, 0),
('PJ-9646382369', 34, '0999871445289', 1, 5, 1000, 19000),
('PJ-9646382369', 35, '0999871445289', 1, 5, 1000, 19000),
('PJ-9646382369', 36, '8995757412003', 2, 5, 1200, 22800);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(20) NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id`, `nama_supplier`, `tlp`, `alamat`) VALUES
(1, 'PT. Cemilan Sentosa', '-', 'Bandung'),
(2, 'PT.Bahagia Selalu', '-', 'padang'),
(3, 'PT. Jaya Sentosa', '-', 'padang barat'),
(4, 'PT. Indonesia', '-', 'padang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `password`, `level`) VALUES
(1, 'maudy', 'maudy', '12345', 'kasir'),
(2, 'lutri', 'lutri', '12345', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barcode`);

--
-- Indexes for table `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  ADD PRIMARY KEY (`kode_konsumen`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  MODIFY `kode_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
