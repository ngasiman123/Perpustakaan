-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2019 at 07:11 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `les_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `kode_anggota` varchar(12) NOT NULL,
  `npm` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `kode_anggota`, `npm`, `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `jurusan`, `created_by`, `updated_by`, `created_date`, `updated_date`, `is_active`) VALUES
(1, 'A1', '2018308208', 'NURAHMAN', 'L', 'BITUNG', '0988888888', 'SISFO', 1, 1, '2018-10-01 00:00:00', '2018-10-04 00:00:00', 1),
(2, 'A2', '2018999999', 'ABAS ', 'L', 'TIGARAKSA', '0988888888', 'SI', 1, 1, '2018-11-11 00:00:00', '2018-11-11 00:00:00', 1),
(3, 'A3', '200000', 'AMANAH', 'P', 'CIKUPA', '088888888', 'SISFO', 1, 1, '2018-11-11 00:00:00', '2018-11-11 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk_header`
--

CREATE TABLE `tb_barang_masuk_header` (
  `id_barang_masuk` int(11) NOT NULL,
  `tgl_barang_masuk` date NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `penerbit`, `pengarang`, `tahun_terbit`, `isbn`, `photo`, `qty`, `created_by`, `updated_by`, `created_date`, `updated_date`, `is_active`) VALUES
(23, 'Membaca itu Cerdas', 'ERLANGGA', 'Nurahman', 2018, 'ASFG111', '1.png', 3, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(24, 'Belajar PHP Pemula', 'YUDISHTIRA', 'Nur Basari', 2000, 'HOUUU333', '3.jpg', 2, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman_detail`
--

CREATE TABLE `tb_peminjaman_detail` (
  `id_pinjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman_detail`
--

INSERT INTO `tb_peminjaman_detail` (`id_pinjam`, `id_buku`, `qty`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman_header`
--

CREATE TABLE `tb_peminjaman_header` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman_header`
--

INSERT INTO `tb_peminjaman_header` (`id_pinjam`, `tgl_pinjam`, `tgl_jatuh_tempo`, `id_anggota`, `created_by`, `updated_by`, `created_date`, `updated_date`, `status`) VALUES
(1, '2018-10-25', '2018-10-29', 1, 1, 1, '2018-10-23 00:00:00', '2018-10-23 00:00:00', 1),
(2, '2018-10-21', '2018-10-30', 1, 1, 1, '2018-10-25 00:00:00', '2018-10-25 00:00:00', 0),
(3, '2018-11-11', '2018-11-17', 2, 1, 1, '2018-11-11 00:00:00', '2018-11-11 00:00:00', 1),
(4, '2018-11-11', '2018-11-18', 2, 1, 1, '2018-11-11 00:00:00', '2018-11-11 00:00:00', 1),
(5, '2018-11-04', '2018-11-11', 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, '2018-11-04', '2018-11-11', 3, 1, 1, '2018-11-11 00:00:00', '2018-11-11 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian_detail`
--

CREATE TABLE `tb_pengembalian_detail` (
  `id_kembali` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian_header`
--

CREATE TABLE `tb_pengembalian_header` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_barang_masuk_header`
--
ALTER TABLE `tb_barang_masuk_header`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_peminjaman_detail`
--
ALTER TABLE `tb_peminjaman_detail`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_pinjam` (`id_pinjam`);

--
-- Indexes for table `tb_peminjaman_header`
--
ALTER TABLE `tb_peminjaman_header`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tb_pengembalian_detail`
--
ALTER TABLE `tb_pengembalian_detail`
  ADD PRIMARY KEY (`id_kembali`,`id_buku`);

--
-- Indexes for table `tb_pengembalian_header`
--
ALTER TABLE `tb_pengembalian_header`
  ADD PRIMARY KEY (`id_kembali`,`id_pinjam`),
  ADD KEY `id_pinjam` (`id_pinjam`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang_masuk_header`
--
ALTER TABLE `tb_barang_masuk_header`
  ADD CONSTRAINT `tb_barang_masuk_header_ibfk_1` FOREIGN KEY (`id_barang_masuk`) REFERENCES `tb_barang_masuk_detail` (`id_barang_masuk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
