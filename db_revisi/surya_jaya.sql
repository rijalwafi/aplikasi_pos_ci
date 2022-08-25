-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2022 at 01:11 AM
-- Server version: 10.6.7-MariaDB-log
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surya_jaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_barang`
--

CREATE TABLE `ms_barang` (
  `kd_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(150) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `ket_barang` varchar(255) DEFAULT NULL,
  `harga_barang` int(10) DEFAULT NULL,
  `stok_awal` int(10) DEFAULT NULL,
  `pemakaian` int(10) DEFAULT NULL,
  `stok_akhir` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ms_barang`
--

INSERT INTO `ms_barang` (`kd_barang`, `nama_barang`, `satuan`, `ket_barang`, `harga_barang`, `stok_awal`, `pemakaian`, `stok_akhir`) VALUES
('asas', 'asas', 'box', 'asa', 1212, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_customer`
--

CREATE TABLE `ms_customer` (
  `id_customer` int(20) NOT NULL,
  `kode_customer` varchar(30) DEFAULT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `alamat_customer` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ms_customer`
--

INSERT INTO `ms_customer` (`id_customer`, `kode_customer`, `nama_customer`, `alamat_customer`, `no_hp`, `email`) VALUES
(3, 'CUST-0001', 'anton', 'askas', '0192012', 'asiaoi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ms_supplier`
--

CREATE TABLE `ms_supplier` (
  `id_supplier` int(11) NOT NULL,
  `kd_supplier` varchar(30) DEFAULT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `alamat_supplier` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `pic_supplier` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_supplier`
--

INSERT INTO `ms_supplier` (`id_supplier`, `kd_supplier`, `nama_supplier`, `alamat_supplier`, `no_hp`, `email`, `pic_supplier`) VALUES
(3, 'SUP-0001', 'somplak', 'akskla', '019828182', '191829@mail.com', 'sasa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `username`, `password`, `level`, `nama`, `foto`) VALUES
(2, 'gudang', '202446dd1d6028084426867365b0c7a1', 'Admin', 'Gudang', '54da95a73d41593c2b3a69cc7638034c.jpg'),
(3, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir', 'Kasir', NULL),
(5, 'adit', '486b6c6b267bc61677367eb6b6458764', 'Super Admin', 'adit', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `satuan`) VALUES
(2, 'pcs'),
(4, 'box');

-- --------------------------------------------------------

--
-- Table structure for table `tr_barang_keluar`
--

CREATE TABLE `tr_barang_keluar` (
  `id_tr_k` varchar(30) NOT NULL,
  `tgl_tr_k` timestamp NULL DEFAULT current_timestamp(),
  `id_login` int(11) DEFAULT NULL,
  `ket_tr_k` varchar(255) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tr_barang_keluar_beli`
--

CREATE TABLE `tr_barang_keluar_beli` (
  `id` int(11) NOT NULL,
  `id_tr_k` varchar(30) DEFAULT NULL,
  `kd_barang` varchar(20) DEFAULT NULL,
  `jumlah_beli` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tr_barang_keluar_dtl`
--

CREATE TABLE `tr_barang_keluar_dtl` (
  `id_tr_kdetail` int(11) NOT NULL,
  `kd_barang` varchar(20) DEFAULT NULL,
  `jumlah_awal` int(10) DEFAULT NULL,
  `jumlah_keluar` int(10) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `id_tr_k` varchar(30) DEFAULT NULL,
  `id_tr_m` varchar(30) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `id_tr_mdetail` int(11) DEFAULT NULL,
  `jumlah_beli` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tr_barang_masuk`
--

CREATE TABLE `tr_barang_masuk` (
  `id_tr_m` varchar(30) NOT NULL,
  `tgl_tr_m` timestamp NULL DEFAULT current_timestamp(),
  `id_login` int(11) DEFAULT NULL,
  `ket_tr_m` varchar(255) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tr_barang_masuk`
--

INSERT INTO `tr_barang_masuk` (`id_tr_m`, `tgl_tr_m`, `id_login`, `ket_tr_m`, `id_supplier`) VALUES
('BRM0907220001', '2022-07-08 19:50:49', 5, 'asas', 3),
('BRM0907220002', '2022-07-08 19:54:24', 5, 'asas', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tr_barang_masuk_dtl`
--

CREATE TABLE `tr_barang_masuk_dtl` (
  `id_tr_mdetail` int(11) NOT NULL,
  `kd_barang` varchar(20) DEFAULT NULL,
  `jumlah_masuk` decimal(19,2) DEFAULT NULL,
  `id_tr_m` varchar(30) DEFAULT NULL,
  `tgl_masuk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tr_barang_masuk_dtl`
--

INSERT INTO `tr_barang_masuk_dtl` (`id_tr_mdetail`, `kd_barang`, `jumlah_masuk`, `id_tr_m`, `tgl_masuk`) VALUES
(94, '', '12.00', 'BRM0907220001', '2022-07-09 02:07:49'),
(95, 'asas', '100.00', 'BRM0907220002', '2022-07-09 02:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `tr_barang_masuk_dtl_pakai`
--

CREATE TABLE `tr_barang_masuk_dtl_pakai` (
  `id_tr_mdetail` int(11) NOT NULL,
  `kd_barang` varchar(20) DEFAULT NULL,
  `jumlah_masuk` decimal(19,2) DEFAULT NULL,
  `id_tr_m` varchar(30) DEFAULT NULL,
  `tgl_masuk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tr_barang_masuk_dtl_pakai`
--

INSERT INTO `tr_barang_masuk_dtl_pakai` (`id_tr_mdetail`, `kd_barang`, `jumlah_masuk`, `id_tr_m`, `tgl_masuk`) VALUES
(94, '', '12.00', 'BRM0907220001', '2022-07-09 02:07:49'),
(95, 'asas', '100.00', 'BRM0907220002', '2022-07-09 02:07:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_barang`
--
ALTER TABLE `ms_barang`
  ADD PRIMARY KEY (`kd_barang`) USING BTREE;

--
-- Indexes for table `ms_customer`
--
ALTER TABLE `ms_customer`
  ADD PRIMARY KEY (`id_customer`) USING BTREE;

--
-- Indexes for table `ms_supplier`
--
ALTER TABLE `ms_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`) USING BTREE;

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tr_barang_keluar`
--
ALTER TABLE `tr_barang_keluar`
  ADD PRIMARY KEY (`id_tr_k`) USING BTREE;

--
-- Indexes for table `tr_barang_keluar_beli`
--
ALTER TABLE `tr_barang_keluar_beli`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tr_barang_keluar_dtl`
--
ALTER TABLE `tr_barang_keluar_dtl`
  ADD PRIMARY KEY (`id_tr_kdetail`) USING BTREE;

--
-- Indexes for table `tr_barang_masuk`
--
ALTER TABLE `tr_barang_masuk`
  ADD PRIMARY KEY (`id_tr_m`) USING BTREE;

--
-- Indexes for table `tr_barang_masuk_dtl`
--
ALTER TABLE `tr_barang_masuk_dtl`
  ADD PRIMARY KEY (`id_tr_mdetail`) USING BTREE;

--
-- Indexes for table `tr_barang_masuk_dtl_pakai`
--
ALTER TABLE `tr_barang_masuk_dtl_pakai`
  ADD PRIMARY KEY (`id_tr_mdetail`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_customer`
--
ALTER TABLE `ms_customer`
  MODIFY `id_customer` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ms_supplier`
--
ALTER TABLE `ms_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tr_barang_keluar_beli`
--
ALTER TABLE `tr_barang_keluar_beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tr_barang_keluar_dtl`
--
ALTER TABLE `tr_barang_keluar_dtl`
  MODIFY `id_tr_kdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tr_barang_masuk_dtl`
--
ALTER TABLE `tr_barang_masuk_dtl`
  MODIFY `id_tr_mdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tr_barang_masuk_dtl_pakai`
--
ALTER TABLE `tr_barang_masuk_dtl_pakai`
  MODIFY `id_tr_mdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
