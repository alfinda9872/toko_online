-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2018 at 12:12 AM
-- Server version: 5.5.59-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonli_10116172_AplikasiTokoOnline`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `kode_pos` varchar(7) NOT NULL,
  `status` enum('admin','penjual','pembeli') NOT NULL DEFAULT 'pembeli',
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama`, `jk`, `tgl_lahir`, `email`, `alamat`, `no_hp`, `kode_pos`, `status`, `gambar`) VALUES
(1, 'adrian', 'adrian', 'Makise Kurisu', 'P', '2018-07-10', 'kurumi@gmail.com', 'qwertyasdfgh', '8123123', '45141', 'admin', 'makise.jpg'),
(2, 'pet', 'pet', 'Petrarca Kurdrayavka', 'P', '2018-07-05', 'petrarca@emai.com', 'oakdwoakdoawkdo', '083820131925', '40291', 'admin', 'albedo.jpg'),
(5, 'tania', 'tania', 'Tania', 'P', '2018-07-03', 'joviani98@gmail.com', 'jl. sekeloa 1', '08900999873', '45013', 'admin', 'akatsukii.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cek_pembelian`
--

CREATE TABLE `tb_cek_pembelian` (
  `id_pengguna` int(5) NOT NULL,
  `kode_pakaian` varchar(10) NOT NULL,
  `tgl_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cek_pembelian`
--

INSERT INTO `tb_cek_pembelian` (`id_pengguna`, `kode_pakaian`, `tgl_pembelian`) VALUES
(3, '54', '2018-07-21'),
(3, '49', '2018-07-21'),
(3, '49', '2018-07-21'),
(3, '49', '2018-07-21'),
(3, '49', '2018-07-21'),
(3, '49', '2018-07-21'),
(3, '49', '2018-07-21'),
(3, '49', '2018-07-21'),
(3, '49', '2018-07-21'),
(1, '51', '2018-07-21'),
(3, '49', '2018-07-21'),
(1, '51', '2018-07-21'),
(3, '49', '2018-07-21'),
(1, '55', '2018-07-22'),
(1, '55', '2018-07-24'),
(3, '57', '2018-07-24'),
(3, '57', '2018-07-24'),
(4, '65', '2018-07-29'),
(4, '65', '2018-07-29'),
(3, '61', '2018-07-29'),
(3, '60', '2018-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_memiliki_merk`
--

CREATE TABLE `tb_jenis_memiliki_merk` (
  `id_merk` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `nama_bahan` varchar(30) NOT NULL,
  `kode_jenis` int(10) NOT NULL,
  `merk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_memiliki_merk`
--

INSERT INTO `tb_jenis_memiliki_merk` (`id_merk`, `id_pengguna`, `nama_bahan`, `kode_jenis`, `merk`) VALUES
(10, 3, 'Trombosit', 2, 'polo'),
(11, 3, 'kuncup', 2, 'asdas'),
(14, 3, 'Rompi Band', 2, 'Aduhdas'),
(16, 4, 'nadeshiko', 2, 'asdas'),
(17, 3, 'Baju Pendek Kaos Wanita', 2, 'Gajah Duduk'),
(18, 3, 'Baju Uwak Doyok Logo', 1, 'Doyok Ku'),
(19, 4, 'Avenger Tshirt', 1, 'Avenger'),
(20, 4, 'Wakanda Outfit', 1, 'Wakanda'),
(21, 4, 'Kaos Olahraga', 1, 'ShuttleCock'),
(22, 4, 'Baju Madrid', 1, 'Madrid'),
(23, 3, 'Juventus Jersey', 2, 'Jerman'),
(24, 3, 'Baju BTS', 2, 'BTS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_pakaian`
--

CREATE TABLE `tb_jenis_pakaian` (
  `kode_jenis` int(10) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `jenis` enum('T-shirt','Celana','Kemeja','Kaos','Jas','Tidak Ada Jenis') NOT NULL DEFAULT 'Tidak Ada Jenis'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_pakaian`
--

INSERT INTO `tb_jenis_pakaian` (`kode_jenis`, `id_admin`, `jenis`) VALUES
(1, 1, 'T-shirt'),
(2, 1, 'Kaos');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pakaian`
--

CREATE TABLE `tb_pakaian` (
  `kode_pakaian` int(10) NOT NULL,
  `kode_jenis` int(10) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `nama_bahan` varchar(30) NOT NULL,
  `bahan` varchar(20) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `kondisi` enum('Baru','Bekas','Tidak Diketahui') DEFAULT 'Tidak Diketahui',
  `harga` int(10) NOT NULL,
  `stok` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pakaian`
--

INSERT INTO `tb_pakaian` (`kode_pakaian`, `kode_jenis`, `id_pengguna`, `nama_bahan`, `bahan`, `ukuran`, `kondisi`, `harga`, `stok`, `tanggal`, `gambar`, `merk`, `deskripsi`) VALUES
(58, 2, 3, 'Baju Pendek Wanita', 'serat kain', 'xl', 'Baru', 80000, 40, '2018-07-27', '20273101_B.jpg', 'Gajah Duduk', '- Memiliki Serat yang nyaman di kulit <br>\r\n- Sangat Bagus di Gunakan Untuk Jalan- Jalan <br>\r\n- Khusus di Gunakan Untuk Wanita'),
(59, 1, 3, 'Baju Uwak Doyok', 'kain', 'L', 'Baru', 100000, 20, '2018-07-27', '45-324x414.png', 'Doyok Ku', '- Polos <br>\r\n- Putih <br>\r\n- Berstyle'),
(60, 1, 4, 'Avenger Tshirt', 'Katun', 'XL', 'Baru', 120000, 49, '2018-07-27', 'baju avenger.jpg', 'Avenger', '- Berdasarkan Design Marverl <br>\r\n- Warna Hitam <br>\r\n- Bagus di Pakai Untuk Jalan-Jalan'),
(61, 1, 4, 'Wakanda Outfit', 'Vibranium', 'XL', 'Baru', 180000, 14, '2018-07-27', 'Baju-Black-Phanter.jpg', 'Wakanda', '- Berbehaan Vibranium <br>\r\n- Aeorodinamic <br>\r\n- Tahan Air'),
(62, 1, 4, 'Kaos Olahraga', 'Serat Karet', 'XXL', 'Baru', 140000, 30, '2018-07-27', 'bb.jpg', 'ShuttleCock', '- Tahan Di Bawah Terik Matahari <br>\r\n- Menyerap Keringat <br>\r\n- Berkerah Tapi Tidak Geli'),
(63, 1, 4, 'Baju Madrid', 'Katun', 'L', 'Baru', 400000, 50, '2018-07-27', 'madrid.jpg', 'Madrid', '- Jersey yang di Gunakan Untuk Main Bola <br>\r\n- Sangat Nyaman Di Pakai <br>\r\n- Tersedia di Toko Terpisah'),
(64, 2, 3, 'Juventus Jersey', 'Kaca', 'XXL', 'Bekas', 500000, 20, '2018-07-27', 'juventus.jpg', 'Jerman', '- Bagus <br>\r\n- Hanga <br>\r\n- Nyaman deh\r\n'),
(65, 2, 3, 'Baju BTS', 'Kain', 'S', 'Baru', 70000, 89, '2018-07-27', '2018_04_06T15_04_43_07_00.jpg', 'BTS', '- Warna Pink <br>\r\n- Lengan Panjang <br>\r\n- Tidak Bikin Kantuk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `kode_pembelian` int(5) NOT NULL,
  `kode_pakaian` varchar(10) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total_harga` int(15) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`kode_pembelian`, `kode_pakaian`, `id_pengguna`, `jumlah`, `total_harga`, `tgl_beli`) VALUES
(1, '49', 3, 2, 100000, '2018-07-21'),
(2, '49', 3, 3, 150000, '2018-07-21'),
(3, '49', 3, 1, 50000, '2018-07-21'),
(4, '54', 3, 2, 200000, '2018-07-21'),
(5, '49', 3, 1, 50000, '2018-07-21'),
(6, '49', 3, 1, 50000, '2018-07-21'),
(7, '49', 3, 1, 50000, '2018-07-21'),
(8, '49', 3, 1, 50000, '2018-07-21'),
(9, '49', 3, 249, 12450000, '2018-07-21'),
(10, '49', 3, 1, 50000, '2018-07-21'),
(11, '49', 3, 1, 50000, '2018-07-21'),
(12, '49', 3, 1, 50000, '2018-07-21'),
(13, '51', 1, 1, 100000, '2018-07-21'),
(14, '49', 3, 1, 51000, '2018-07-21'),
(15, '51', 1, 1, 100000, '2018-07-21'),
(16, '49', 3, 1, 51000, '2018-07-21'),
(17, '55', 1, 1, 100000, '2018-07-22'),
(18, '55', 1, 2, 200000, '2018-07-24'),
(19, '57', 3, 1, 20000, '2018-07-24'),
(20, '57', 3, 3, 60000, '2018-07-24'),
(21, '65', 4, 1, 70000, '2018-07-29'),
(22, '65', 4, 0, 0, '2018-07-29'),
(23, '61', 3, 1, 180000, '2018-07-29'),
(24, '60', 3, 1, 120000, '2018-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `kode_pos` varchar(7) NOT NULL,
  `status` enum('Pengguna') NOT NULL DEFAULT 'Pengguna',
  `saldo` varchar(15) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `nama`, `jk`, `tgl_lahir`, `email`, `alamat`, `no_hp`, `kode_pos`, `status`, `saldo`) VALUES
(3, 'myucel', 'Myucel', 'Miu Celio', 'P', '2018-07-12', 'tadakun@email.com', 'jalan kawali raya no.10', '083820131925', '40291', 'Pengguna', '418750'),
(4, 'nades', 'nades', 'Kak Rose', 'P', '2018-07-04', 'adrian@gmail.com', 'asdoakwodkawodko', '083820131925', '40291', 'Pengguna', '130000'),
(5, 'ferian', 'ferian10', 'Ferian Ezra Lisandro', 'L', '1999-07-08', 'ferian@gmail.com', 'Ciwastra', '081222423737', '40292', 'Pengguna', NULL),
(6, 'tokisaki', 'kurumi', 'Tokisaki Kurumi', 'L', '1998-10-10', 'kurumi@gmail.com', 'Jl. Date a Live No.1', '081071154711', '12345', 'Pengguna', NULL),
(7, 'pengguna1', 'pengguna1', 'Rio', 'L', '1998-09-04', 'rio@gmail.com', 'Jl. Elang Raya No. 02', '09883232138', '45143', 'Pengguna', '1500000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_saldo`
--

CREATE TABLE `tb_saldo` (
  `id_saldo` int(10) NOT NULL,
  `kode_saldo` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_saldo`
--

INSERT INTO `tb_saldo` (`id_saldo`, `kode_saldo`, `jumlah`) VALUES
(6, '2002', 300000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_jenis_memiliki_merk`
--
ALTER TABLE `tb_jenis_memiliki_merk`
  ADD PRIMARY KEY (`id_merk`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `kode_jenis` (`kode_jenis`);

--
-- Indexes for table `tb_jenis_pakaian`
--
ALTER TABLE `tb_jenis_pakaian`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `tb_pakaian`
--
ALTER TABLE `tb_pakaian`
  ADD PRIMARY KEY (`kode_pakaian`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_saldo`
--
ALTER TABLE `tb_saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jenis_memiliki_merk`
--
ALTER TABLE `tb_jenis_memiliki_merk`
  MODIFY `id_merk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_jenis_pakaian`
--
ALTER TABLE `tb_jenis_pakaian`
  MODIFY `kode_jenis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pakaian`
--
ALTER TABLE `tb_pakaian`
  MODIFY `kode_pakaian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `kode_pembelian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_saldo`
--
ALTER TABLE `tb_saldo`
  MODIFY `id_saldo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jenis_memiliki_merk`
--
ALTER TABLE `tb_jenis_memiliki_merk`
  ADD CONSTRAINT `tb_jenis_memiliki_merk_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jenis_memiliki_merk_ibfk_2` FOREIGN KEY (`kode_jenis`) REFERENCES `tb_jenis_pakaian` (`kode_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pakaian`
--
ALTER TABLE `tb_pakaian`
  ADD CONSTRAINT `tb_pakaian_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
