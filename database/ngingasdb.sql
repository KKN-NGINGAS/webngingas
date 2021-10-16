-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 11:10 AM
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
-- Database: `ngingasdb`
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_ikm`
--

INSERT INTO `data_ikm` (`id_ikm`, `nama_ikm`, `alamat_ikm`, `no_telp_ikm`, `email_ikm`, `tanggal_terdaftar`, `tanggal_update`) VALUES
(1, 'Untung Dadi', 'Alamatnya masih sama disitu kok, nomer 15', '+62816683193', 'dida@dida.dida', '2021-09-26 01:28:01', '2021-09-26 01:28:01'),
(2, 'Lha Kok Iso', 'Disana, pokoknya disana lah', '+62816683193', 'ikmku@ikm.ikm', '2021-09-30 12:56:42', '2021-09-30 12:56:42'),
(3, 'uwuk', 'ga punya kantor, miskin soalnya ehe', '+62916683193', 'dida@dida.dida', '2021-10-01 04:21:46', '2021-10-01 04:21:46'),
(4, 'haii', 'sadfdgfhghjdsf', '+62916683193', 'dida@dida.dida', '2021-10-01 04:22:35', '2021-10-01 04:22:35'),
(5, 'Nama IKM kelima', 'Jauh nan disana', '+628XXXXXXXXXX', 'hehe@gmail.com', '2021-10-03 20:56:05', '2021-10-03 20:56:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `kelamin`, `jabatan`, `pendidikan`, `alamat`, `email`, `no_telp`, `id_ikm`, `tanggal_terdaftar`, `tanggal_update`) VALUES
(1, 3304222222222222, 'Dida Prasetyo', 'Pria', 'Ketua', '', 'Dirumahku tercinta, ga dimana mana', 'didapras@yahoo.co.id', '+62916683193', 1, '2021-09-26 01:28:01', '2021-09-26 01:28:01'),
(2, 3304222222222244, 'Yae-sama', 'Pria', 'Karyawan', 'D4/S1', 'Numpang dirumah dida', 'dida@dida.dida', '+62916683193', 1, '2021-09-26 01:28:01', '2021-10-09 17:53:42'),
(3, 3304222222222111, 'Raiden-sama', 'Wanita', 'Karyawan', '', 'Tenshukaku', 'raiden@gmail.com', '+62816683193', 1, '2021-09-26 09:17:36', '2021-09-26 09:17:36'),
(4, 3304022408333333, 'Bambang', 'Pria', 'Karyawan', '', 'YUK JADI YUKK', 'admin@admin.admin', '+6285123456789', 1, '2021-09-30 01:35:17', '2021-09-30 01:35:17'),
(5, 3304022408333322, 'Coba', 'Pria', 'Karyawan', '', 'sdafghkjljdsfaffcghyjutgdf', 'admin@admin', '+6285123456789', 1, '2021-09-30 12:08:14', '2021-09-30 12:08:14'),
(6, 3304222222231231, 'Iso Babat', 'Pria', 'Ketua', '', 'Sama kek alamat ikm, ga punya rumah, tidur di kantor, sad kan', 'daads@sa.daa', '+62916683193', 2, '2021-09-30 13:04:37', '2021-09-30 13:04:37'),
(7, 3304022408333622, 'heheboi', 'Pria', 'Ketua', 'D3', 'ga apal', 'admin@admin.admin', '+6285123456789', 4, '2021-10-12 13:37:30', '2021-10-12 13:37:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id_perusahaan`, `id_ikm`, `nama_perusahaan`, `nama_pemilik`, `nama_pic`, `alamat_perusahaan`, `telp_pemilik`, `telp_pic`, `telp_perusahaan`, `email_perusahaan`, `tanggal_terdaftar`, `tanggal_update`) VALUES
(1, 1, 'Google', 'Mbah Gugel', 'Zulfikar', 'London', '+62816683193', '+6283141680637', '+6283141680631', 'abc@def.com', '2021-02-02 00:00:00', '2021-10-09 04:02:43'),
(2, 2, 'Microsoft', 'Pak Windows', 'Donny', 'Amsterdam', '+62816683193', '+6283655194408', '+6283655194401', 'abc@def.com', '2021-02-03 00:00:00', '2021-10-09 04:02:43'),
(3, 3, 'Amazon', 'Bu Aws', 'Fachrizal', 'Berlin', '+62816683193', '+6283131499501', '+6283131499500', 'abc@def.com', '2021-02-04 00:00:00', '2021-10-09 04:02:43'),
(4, 1, 'Gojek', 'Neng Driver', 'Faza', 'Malang', '+62816683193', '+6283479042760', '+6283479042761', 'abc@def.com', '2021-02-05 00:00:00', '2021-10-09 04:02:43'),
(5, 1, 'Untung Dadi Corp', 'Dida', 'Sekertarisnya Dida', 'Untung ndue alamat', '+62816683193', '+62816683193', '+62816683193', 'email@untung.dadi', '2021-10-09 17:30:18', '2021-10-09 17:37:31');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_produk`
--

INSERT INTO `data_produk` (`id_data_produk`, `id_ikm`, `nama_produk`, `harga_satuan`, `stok`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 1, 'Barang Berat 1', 50000, 20, '2021-10-03 02:36:04', '2021-10-03 02:36:04'),
(2, 1, 'Barang Berat 2', 2000000, 15, '2021-10-03 02:36:04', '2021-10-03 02:36:04'),
(3, 2, 'Barang Berat 3', 500000, 15, '2021-10-03 02:36:04', '2021-10-03 02:36:04'),
(4, 3, 'Barang Berat 4', 1500000, 15, '2021-10-03 02:36:04', '2021-10-03 02:36:04'),
(5, 1, 'barang Berat 5', 1750000, 15, '2021-10-03 02:36:04', '2021-10-03 02:36:04'),
(6, 2, 'Barang Berat 6', 560000, 15, '2021-10-03 02:36:04', '2021-10-03 02:36:04'),
(7, 3, 'Barang Berat 7', 22500000, 15, '2021-10-03 02:36:04', '2021-10-03 02:36:04'),
(8, 1, 'Mesin Berat 1', 0, 0, '2021-10-03 03:03:49', '2021-10-03 03:03:49'),
(9, 1, 'Mesin Pencincang', 0, 0, '2021-10-03 03:06:15', '2021-10-03 03:06:15'),
(10, 1, 'Mesin Pencincang 2', 0, 0, '2021-10-03 03:06:50', '2021-10-03 03:06:50');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_produksi`
--

INSERT INTO `data_produksi` (`id_data_produksi`, `id_ikm`, `tanggal`, `id_produk`, `jenis_bahan_mentah`, `jumlah_produksi`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 1, '2021-09-23', 1, 'Besi', 10, '2021-10-16 15:58:50', '2021-10-16 15:58:50'),
(2, 1, '2021-09-01', 2, 'Batu Bata, Apa lagi ya', 111, '2021-10-16 15:58:50', '2021-10-16 15:58:50'),
(3, 2, '2021-06-09', 3, 'Hehe', 0, '2021-10-16 15:58:50', '2021-10-16 15:58:50'),
(4, 1, '2021-10-03', 9, 'Paku 2 kg, Kayu 2 buah', 12, '2021-10-16 15:58:50', '2021-10-16 15:58:50'),
(5, 1, '2021-10-11', 8, 'Pipa besi 5 lonjor', 12, '2021-10-16 15:58:50', '2021-10-16 15:58:50');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `id_karyawan`, `username`, `user_pwd`, `role`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 0, 'admin', 'ed2b1f468c5f915f3f1cf75d7068baae', 'admin_bumdes', '2021-09-25 14:18:23', '2021-09-25 14:18:23'),
(2, 0, 'pimpinan', 'ed2b1f468c5f915f3f1cf75d7068baae', 'pimpinan_bumdes', '2021-09-25 14:18:54', '2021-09-25 14:18:54'),
(3, 1, 'dida', 'ed2b1f468c5f915f3f1cf75d7068baae', 'pimpinan_ikm', '2021-09-26 01:28:01', '2021-09-26 01:28:01'),
(4, 2, 'yae', 'ed2b1f468c5f915f3f1cf75d7068baae', 'admin_ikm', '2021-09-26 01:28:01', '2021-09-26 01:28:01'),
(5, 6, 'iso', 'ed2b1f468c5f915f3f1cf75d7068baae', 'pimpinan_ikm', '2021-09-30 12:56:42', '2021-09-30 12:56:42'),
(6, 4, 'bambang', 'ed2b1f468c5f915f3f1cf75d7068baae', 'operator_ikm', '2021-10-07 17:18:31', '2021-10-07 17:18:31'),
(13, 7, '20211012162322', '20211012162322', 'pimpinan_ikm', '2021-10-12 13:37:30', '2021-10-12 13:37:30');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_laporan_keuangan`
--

INSERT INTO `detail_laporan_keuangan` (`id_detail`, `id_laporan`, `tanggal`, `aktivitas`, `pemasukan`, `pengeluaran`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 1, '2021-01-01', 'Pembalian Panci Baru', 0, 20000, '2021-10-12 19:36:28', '2021-10-12 19:36:28'),
(2, 1, '2021-01-02', 'Penjualan Panci Lama', 10000, 0, '2021-10-12 19:47:12', '2021-10-12 19:47:12'),
(3, 1, '2021-10-16', 'Penjualan Alat Tambang', 200000, 0, '2021-10-16 01:40:21', '2021-10-16 01:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

DROP TABLE IF EXISTS `laporan_keuangan`;
CREATE TABLE IF NOT EXISTS `laporan_keuangan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  `id_ikm` int(11) DEFAULT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id_laporan`, `tanggal`, `id_ikm`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, '2020-01-01 00:00:00', 1, '0000-00-00 00:00:00', '2021-10-09 00:00:00'),
(2, '2020-02-01 00:00:00', 2, '0000-00-00 00:00:00', '2021-10-04 00:00:00'),
(3, '2020-03-01 00:00:00', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '2020-04-01 00:00:00', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '2020-05-01 00:00:00', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '2020-06-01 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '2020-07-01 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '2020-08-01 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '2020-09-20 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '2020-09-21 00:00:00', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '2021-10-07 00:00:00', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '2021-10-01 00:00:00', 1, '2021-10-03 00:00:00', '2021-10-03 00:00:00'),
(14, '2021-11-10 00:00:00', 1, '2021-10-12 19:11:50', '2021-10-12 19:11:50'),
(15, '2021-12-09 00:00:00', 1, '2021-10-12 19:13:45', '2021-10-12 19:13:45');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teknologi_informasi`
--

INSERT INTO `teknologi_informasi` (`id_tekfo`, `id_ikm`, `nama_barang`, `tipe_merk`, `sumber_dana`, `kondisi_baik`, `kondisi_kurang`, `kondisi_buruk`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 1, 'Komputer', '330/Lenovo', 'Pengadaan Barang 2021', 4, 3, 2, '2021-10-16 15:11:51', '2021-10-16 16:06:41'),
(2, 1, 'Printer', 'Ink Jet/Canon', 'Sumbangan Maret 2021', 2, 1, 0, '2021-10-16 15:51:23', '2021-10-16 15:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

DROP TABLE IF EXISTS `transaksi_penjualan`;
CREATE TABLE IF NOT EXISTS `transaksi_penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nama_ikm` varchar(80) DEFAULT NULL,
  `pelanggan` varchar(80) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `id_data_produk` int(11) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `harga_satuan_x_kuantitas` int(11) DEFAULT NULL,
  `harga_total` int(11) DEFAULT NULL,
  `nama_penerima_brg` varchar(80) DEFAULT NULL,
  `no_telp_pelanggan` varchar(15) DEFAULT NULL,
  `keterangan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id_penjualan`, `no_transaksi`, `tanggal`, `nama_ikm`, `pelanggan`, `id_perusahaan`, `id_data_produk`, `kuantitas`, `harga_satuan`, `harga_satuan_x_kuantitas`, `harga_total`, `nama_penerima_brg`, `no_telp_pelanggan`, `keterangan`) VALUES
(1, 212, '2020-09-01 00:00:00', 'Sumber Kencana', 'Fachrizal', 3, 2, 3, 2000000, 6000000, 6600000, 'kasino', '+85234628233', 'berhasil'),
(2, 215, '2020-09-10 00:00:00', 'Harimau Selatan', 'Donny', 2, 2, 5, 2000000, 10000000, 11000000, 'sule sutisna', '+85234628625', 'berhasil'),
(3, 217, '2020-09-12 00:00:00', 'Mertua Galak', 'Donny', 2, 3, 2, 500000, 1000000, 1100000, 'cak sun', '+85234655533', 'berhasil'),
(4, 214, '2020-09-17 00:00:00', 'Mertua Galak', 'Faza', 4, 1, 5, 10000000, 50000000, 55000000, 'makmur sugemi', '+85234234233', 'berhasil'),
(5, 213, '2020-09-19 00:00:00', 'Sumber Kencana', 'Zulfikar', 1, 1, 3, 10000000, 30000000, 33000000, 'slamet riyadi', '+85234624433', 'berhasil'),
(6, 216, '2020-09-20 00:00:00', 'Abang Jago', 'Fachrizal', 3, 2, 6, 2000000, 12000000, 13200000, 'daddy corbuzier', '+85234999233', 'berhasil'),
(7, 211, '2020-09-22 00:00:00', 'Abang Jago', 'Donny', 2, 1, 2, 10000000, 20000000, 22000000, 'dono', '+85232228233', 'berhasil'),
(8, 223, '2020-09-23 00:00:00', 'Sumber Kencana', 'Zulfikar', 1, 4, 3, 10000000, 30000000, 33000000, 'duni', '+85228233232', 'berhasil'),
(9, 224, '2020-09-24 00:00:00', 'Sumber Kencana', 'Faza', 4, 5, 4, 1750000, 7000000, 7700000, 'danu', '+85235553346', 'berhasil'),
(10, 225, '2020-09-25 00:00:00', 'Sumber Kencana', 'Fachrizal', 3, 3, 2, 500000, 1000000, 1100000, 'dena', '+85234233999', 'berhasil');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
