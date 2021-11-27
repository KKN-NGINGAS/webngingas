-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 08:37 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngingasfix`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_ikm`
--

DROP TABLE IF EXISTS `data_ikm`;
CREATE TABLE IF NOT EXISTS `data_ikm` (
  `id_ikm` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ikm` varchar(80) NOT NULL,
  `alamat_ikm` varchar(255) NOT NULL,
  `no_telp_ikm` varchar(15) NOT NULL DEFAULT '+628XXXXXXXXXX',
  `email_ikm` varchar(80) NOT NULL,
  `tanggal_terdaftar` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_ikm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_ikm`
--

INSERT INTO `data_ikm` (`id_ikm`, `nama_ikm`, `alamat_ikm`, `no_telp_ikm`, `email_ikm`, `tanggal_terdaftar`, `tanggal_update`) VALUES
(1, 'Bumdes Ngingas', 'Sidoarjo, Jawa Timur', '+628XXXXXXXXXX', 'bumdes@ngingas.com', '2021-11-15 01:50:22', '2021-11-15 01:50:22'),
(2, 'IKM Baru', 'Alamat IKM', '+628XXXXXXXXXX', 'ikmku@ikm.ikm', '2021-11-15 02:28:37', '2021-11-15 02:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

DROP TABLE IF EXISTS `data_karyawan`;
CREATE TABLE IF NOT EXISTS `data_karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nik` bigint(20) NOT NULL,
  `nama_karyawan` varchar(80) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_ikm` int(11) NOT NULL,
  `tanggal_terdaftar` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_karyawan`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `kelamin`, `jabatan`, `pendidikan`, `alamat`, `email`, `no_telp`, `id_ikm`, `tanggal_terdaftar`, `tanggal_update`) VALUES
(1, 3300000000000000, 'Ketua Bumdes', 'Pria', 'Ketua', 'S2', 'Alamat Rumah Ketua Bumdes', 'ketua@bumdes.com', '+628XXXXXXXXXX', 1, '2021-11-15 01:52:06', '2021-11-15 01:52:06'),
(2, 3300000000000001, 'Admin Bumdes', 'Pria', 'Karyawan', 'S2', 'Alamat Rumah Admin Bumdes', 'admin@bumdes.com', '+628XXXXXXXXXX', 1, '2021-11-15 02:01:38', '2021-11-15 02:01:38'),
(3, 3300000000000002, 'Ketua IKM', 'Pria', 'Ketua', 'S2', 'Alamat Rumah Ketua IKM', 'ketua@ikm.com', '+628XXXXXXXXXX', 2, '2021-11-15 02:30:04', '2021-11-15 02:30:04'),
(4, 3300000000000003, 'Admin IKM', 'Pria', 'Karyawan', 'S2', 'Alamat Rumah Admin IKM', 'admin@ikm.com', '+628XXXXXXXXXX', 2, '2021-11-15 02:31:04', '2021-11-15 02:31:04'),
(5, 3300000000000005, 'Karyawan 1', 'Pria', 'Karyawan', 'S2', 'Alamat Rumah Karyawan 1', 'karyawan1@bumdes.com', '+628XXXXXXXXXX', 1, '2021-11-15 02:33:56', '2021-11-15 02:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggan`
--

DROP TABLE IF EXISTS `data_pelanggan`;
CREATE TABLE IF NOT EXISTS `data_pelanggan` (
  `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_ikm` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `nama_pemilik` varchar(80) NOT NULL,
  `nama_pic` varchar(50) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL,
  `telp_pemilik` varchar(15) NOT NULL,
  `telp_pic` varchar(15) NOT NULL,
  `telp_perusahaan` varchar(15) NOT NULL,
  `email_perusahaan` varchar(80) NOT NULL,
  `tanggal_terdaftar` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id_perusahaan`, `id_ikm`, `nama_perusahaan`, `nama_pemilik`, `nama_pic`, `alamat_perusahaan`, `telp_pemilik`, `telp_pic`, `telp_perusahaan`, `email_perusahaan`, `tanggal_terdaftar`, `tanggal_update`) VALUES
(1, 1, 'Untung Dadi Corp', 'Untung Dadi', 'Pak Untung Dadi 2', 'Alamat Untung Dadi', '+62816683193', '+62816683193', '+62816683193', 'email@untung.dadi', '2021-11-15 02:38:35', '2021-11-15 02:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `data_produk`
--

DROP TABLE IF EXISTS `data_produk`;
CREATE TABLE IF NOT EXISTS `data_produk` (
  `id_data_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_ikm` int(11) NOT NULL,
  `nama_produk` varchar(80) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT 0,
  `stok` int(11) DEFAULT 0,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_data_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_produk`
--

INSERT INTO `data_produk` (`id_data_produk`, `id_ikm`, `nama_produk`, `harga_satuan`, `stok`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 1, 'Mesin Berat 1', 17000000, 5, '2021-11-15 02:35:57', '2021-11-15 02:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `data_produksi`
--

DROP TABLE IF EXISTS `data_produksi`;
CREATE TABLE IF NOT EXISTS `data_produksi` (
  `id_data_produksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_ikm` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jenis_bahan_mentah` varchar(128) NOT NULL,
  `jumlah_produksi` int(11) NOT NULL DEFAULT 0,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_data_produksi`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_produksi`
--

INSERT INTO `data_produksi` (`id_data_produksi`, `id_ikm`, `tanggal`, `id_produk`, `jenis_bahan_mentah`, `jumlah_produksi`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 1, '2021-11-15', 1, 'Besi 2 kg', 15, '2021-11-15 02:36:58', '2021-11-15 02:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

DROP TABLE IF EXISTS `data_transaksi`;
CREATE TABLE IF NOT EXISTS `data_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_ikm` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_transaksi` varchar(25) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `pict` varchar(255) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`id_transaksi`, `id_ikm`, `tanggal`, `no_transaksi`, `id_pelanggan`, `total`, `pict`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 1, '2021-11-15', '1511/21/001/00001', 1, 255000000, '', '2021-11-15 02:38:56', '2021-11-15 02:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

DROP TABLE IF EXISTS `data_user`;
CREATE TABLE IF NOT EXISTS `data_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `id_karyawan`, `username`, `user_pwd`, `role`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 0, 'admin', 'ed2b1f468c5f915f3f1cf75d7068baae', 'admin_bumdes', '2021-09-25 14:18:23', '2021-09-25 14:18:23'),
(2, 0, 'pimpinan', 'ed2b1f468c5f915f3f1cf75d7068baae', 'pimpinan_bumdes', '2021-09-25 14:18:54', '2021-09-25 14:18:54'),
(3, 1, 'ketuabumdes', 'ed2b1f468c5f915f3f1cf75d7068baae', 'pimpinan_ikm', '2021-11-15 01:52:06', '2021-11-15 01:52:06'),
(4, 2, 'adminbumdes', 'ed2b1f468c5f915f3f1cf75d7068baae', 'admin_ikm', '2021-11-15 02:01:38', '2021-11-15 02:01:38'),
(5, 3, 'ketuaikm', 'ed2b1f468c5f915f3f1cf75d7068baae', 'pimpinan_ikm', '2021-11-15 02:30:04', '2021-11-15 02:30:04'),
(6, 4, 'adminikm', 'ed2b1f468c5f915f3f1cf75d7068baae', 'admin_ikm', '2021-11-15 02:31:04', '2021-11-15 02:31:04'),
(7, 5, 'karyawan1', 'ed2b1f468c5f915f3f1cf75d7068baae', 'operator_ikm', '2021-11-15 02:34:22', '2021-11-15 02:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `detail_laporan_keuangan`
--

DROP TABLE IF EXISTS `detail_laporan_keuangan`;
CREATE TABLE IF NOT EXISTS `detail_laporan_keuangan` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_laporan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `pemasukan` double NOT NULL DEFAULT 0,
  `pengeluaran` double NOT NULL DEFAULT 0,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_detail`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_laporan_keuangan`
--

INSERT INTO `detail_laporan_keuangan` (`id_detail`, `id_laporan`, `tanggal`, `aktivitas`, `pemasukan`, `pengeluaran`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 1, '0000-00-00', 'Pembalian Panci Baru', 0, 50000, '2021-11-15 02:40:33', '2021-11-15 02:40:33'),
(2, 1, '0000-00-00', 'Penjualan Alat Tambang', 150000, 0, '2021-11-15 02:40:55', '2021-11-15 02:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

DROP TABLE IF EXISTS `detail_transaksi`;
CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_det_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_satuan_transaksi` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_det_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_det_transaksi`, `id_transaksi`, `id_produk`, `harga_satuan_transaksi`, `jumlah_barang`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 1, 1, 17000000, 15, '2021-11-15 02:39:38', '2021-11-15 02:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

DROP TABLE IF EXISTS `laporan_keuangan`;
CREATE TABLE IF NOT EXISTS `laporan_keuangan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(30) NOT NULL,
  `id_ikm` int(11) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id_laporan`, `tanggal`, `id_ikm`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 'November 2021', 1, '2021-11-15 02:40:05', '2021-11-15 02:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `teknologi_informasi`
--

DROP TABLE IF EXISTS `teknologi_informasi`;
CREATE TABLE IF NOT EXISTS `teknologi_informasi` (
  `id_tekfo` int(11) NOT NULL AUTO_INCREMENT,
  `id_ikm` int(11) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `tipe_merk` varchar(80) NOT NULL,
  `sumber_dana` varchar(80) NOT NULL,
  `kondisi_baik` int(11) NOT NULL,
  `kondisi_kurang` int(11) NOT NULL,
  `kondisi_buruk` int(11) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_tekfo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teknologi_informasi`
--

INSERT INTO `teknologi_informasi` (`id_tekfo`, `id_ikm`, `nama_barang`, `tipe_merk`, `sumber_dana`, `kondisi_baik`, `kondisi_kurang`, `kondisi_buruk`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 1, 'Komputer', 'Asus', 'Pengadaan Barang November 2021', 3, 2, 0, '2021-11-15 02:42:09', '2021-11-15 02:42:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
