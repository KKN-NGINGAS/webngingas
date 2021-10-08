-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 10:16 PM
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
  `alamat` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_ikm` int(11) NOT NULL,
  `tanggal_terdaftar` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_karyawan`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `kelamin`, `jabatan`, `alamat`, `email`, `no_telp`, `id_ikm`, `tanggal_terdaftar`, `tanggal_update`) VALUES
(1, 3304222222222222, 'Dida Prasetyo', 'Pria', 'Ketua', 'Dirumahku tercinta, ga dimana mana', 'didapras@yahoo.co.id', '+62916683193', 1, '2021-09-26 01:28:01', '2021-09-26 01:28:01'),
(2, 3304222222222244, 'Yae-sama', 'Pria', 'Karyawan', 'Numpang dirumah dida', 'dida@dida.dida', '+62916683193', 1, '2021-09-26 01:28:01', '2021-09-26 01:28:01'),
(3, 3304222222222111, 'Raiden-sama', 'Wanita', 'Karyawan', 'Tenshukaku', 'raiden@gmail.com', '+62816683193', 1, '2021-09-26 09:17:36', '2021-09-26 09:17:36'),
(4, 3304022408333333, 'Bambang', 'Pria', 'Karyawan', 'YUK JADI YUKK', 'admin@admin.admin', '+6285123456789', 1, '2021-09-30 01:35:17', '2021-09-30 01:35:17'),
(5, 3304022408333322, 'Coba', 'Pria', 'Karyawan', 'sdafghkjljdsfaffcghyjutgdf', 'admin@admin', '+6285123456789', 1, '2021-09-30 12:08:14', '2021-09-30 12:08:14'),
(6, 3304222222231231, 'Iso Babat', 'Pria', 'Ketua', 'Sama kek alamat ikm, ga punya rumah, tidur di kantor, sad kan', 'daads@sa.daa', '+62916683193', 2, '2021-09-30 13:04:37', '2021-09-30 13:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggan`
--

DROP TABLE IF EXISTS `data_pelanggan`;
CREATE TABLE IF NOT EXISTS `data_pelanggan` (
  `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `nama_kontak_perusahaan` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` varchar(255) DEFAULT NULL,
  `no_telp_kontak_perusahaan` varchar(15) DEFAULT NULL,
  `no_telp_perusahaan` varchar(15) DEFAULT NULL,
  `jenis_perusahaan` varchar(20) DEFAULT NULL,
  `tanggal_terdaftar` datetime DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id_perusahaan`, `nama_perusahaan`, `nama_kontak_perusahaan`, `alamat_perusahaan`, `no_telp_kontak_perusahaan`, `no_telp_perusahaan`, `jenis_perusahaan`, `tanggal_terdaftar`) VALUES
(1, 'Google', 'Zulfikar', 'London', '+6283141680637', '+6283141680631', 'Barang dan Jasa', '2021-02-02 00:00:00'),
(2, 'Microsoft', 'Donny', 'Amsterdam', '+6283655194408', '+6283655194401', 'Barang dan Jasa', '2021-02-03 00:00:00'),
(3, 'Amazon', 'Fachrizal', 'Berlin', '+6283131499501', '+6283131499500', 'Barang dan Jasa', '2021-02-04 00:00:00'),
(4, 'Gojek', 'Faza', 'Malang', '+6283479042760', '+6283479042761', 'Jasa', '2021-02-05 00:00:00');

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
  PRIMARY KEY (`id_data_produksi`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_produksi`
--

INSERT INTO `data_produksi` (`id_data_produksi`, `id_ikm`, `tanggal`, `id_produk`, `jenis_bahan_mentah`, `jumlah_produksi`) VALUES
(1, 1, '2021-09-23', 1, 'Besi', 10),
(2, 1, '2021-09-01', 2, 'Batu Bata, Apa lagi ya', 111),
(3, 2, '2021-06-09', 3, 'Hehe', 0),
(4, 1, '2021-10-03', 9, 'Paku 2 kg, Kayu 2 buah', 12);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `id_karyawan`, `username`, `user_pwd`, `role`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 0, 'admin', 'ed2b1f468c5f915f3f1cf75d7068baae', 'admin_bumdes', '2021-09-25 14:18:23', '2021-09-25 14:18:23'),
(2, 0, 'pimpinan', 'ed2b1f468c5f915f3f1cf75d7068baae', 'pimpinan_bumdes', '2021-09-25 14:18:54', '2021-09-25 14:18:54'),
(3, 1, '330422222222222', 'ed2b1f468c5f915f3f1cf75d7068baae', 'pimpinan_ikm', '2021-09-26 01:28:01', '2021-09-26 01:28:01'),
(4, 2, '330422222222224', 'ed2b1f468c5f915f3f1cf75d7068baae', 'admin_ikm', '2021-09-26 01:28:01', '2021-09-26 01:28:01'),
(5, 6, '330422222223123', '8d6de21508d06bfc0047fe9799437502', 'pimpinan_ikm', '2021-09-30 12:56:42', '2021-09-30 12:56:42'),
(6, 4, 'bambang', 'ed2b1f468c5f915f3f1cf75d7068baae', 'operator_ikm', '2021-10-07 17:18:31', '2021-10-07 17:18:31');

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
  `pemasukan` double NOT NULL,
  `pengeluaran` double NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_laporan_keuangan`
--

INSERT INTO `detail_laporan_keuangan` (`id_detail`, `id_laporan`, `tanggal`, `aktivitas`, `pemasukan`, `pengeluaran`, `created_at`, `updated_at`) VALUES
(2, 1, '2021-10-03', 'tambah DB lagi', 69000, 10000, '2021-10-03', '2021-10-03'),
(3, 2, '2021-10-03', 'aktivitas orang 2', 100000, 40232, '2021-10-03', '2021-10-03'),
(4, 1, '2021-10-03', 'Coba tambah laporan', 69000, 10000, '2021-10-03', '2021-10-03'),
(5, 1, '2021-10-01', 'hehe coba lagi', 1111, 2312, '2021-10-03', '2021-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

DROP TABLE IF EXISTS `laporan_keuangan`;
CREATE TABLE IF NOT EXISTS `laporan_keuangan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  `id_ikm` int(11) DEFAULT NULL,
  `laba` int(11) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id_laporan`, `tanggal`, `id_ikm`, `laba`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2020-09-07 00:00:00', 1, 116799, 'Barang Rusak', NULL, '2021-10-07'),
(2, '2020-09-07 00:00:00', 2, 59768, 'Penjualan laku', NULL, '2021-10-04'),
(3, '2020-09-09 00:00:00', 3, 4550000, 'Penjualan laku', NULL, NULL),
(4, '2020-09-12 00:00:00', 4, -120000, 'Barang Hilang', NULL, NULL),
(5, '2020-09-16 00:00:00', 5, 450000, 'Penjualan laku', NULL, NULL),
(6, '2020-09-17 00:00:00', 1, -500000, 'Barang Rusak', NULL, NULL),
(7, '2020-09-18 00:00:00', 1, 150000, 'Penjualan laku', NULL, NULL),
(8, '2020-09-19 00:00:00', 1, 455000, 'Penjualan laku', NULL, NULL),
(9, '2020-09-20 00:00:00', 1, -120000, 'Barang Hilang', NULL, NULL),
(10, '2020-09-21 00:00:00', 1, 450000, 'Penjualan laku', NULL, NULL),
(11, '2021-10-07 00:00:00', 2, NULL, NULL, NULL, NULL),
(12, '2021-10-01 00:00:00', 1, NULL, NULL, '2021-10-03', '2021-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `teknologi_informasi`
--

DROP TABLE IF EXISTS `teknologi_informasi`;
CREATE TABLE IF NOT EXISTS `teknologi_informasi` (
  `id_ti` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `tipe_barang` varchar(15) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `kondisi` varchar(10) DEFAULT NULL,
  `sumber_dana` varchar(30) DEFAULT NULL,
  `id_ikm` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ti`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teknologi_informasi`
--

INSERT INTO `teknologi_informasi` (`id_ti`, `tanggal`, `nama_barang`, `tipe_barang`, `jumlah_barang`, `kondisi`, `sumber_dana`, `id_ikm`) VALUES
(1, '2020-09-07 00:00:00', 'Komputer Asus', 'komputer', 55, 'Bagus', 'kas', 3),
(2, '2020-09-07 00:00:00', 'Komputer Lenovo', 'komputer', 51, 'Bagus', 'kas', 2),
(3, '2020-09-09 00:00:00', 'Komputer Huawei', 'komputer', 13, 'Bagus', 'sumbangan Google', 4),
(4, '2020-09-12 00:00:00', 'Komputer HP', 'komputer', 7, 'Bagus', 'kas', 1),
(5, '2020-09-16 00:00:00', 'Komputer Lek Di', 'komputer', 8, 'Jelek', 'kas', 5),
(6, '2020-09-12 00:00:00', 'Meja', 'komputer', 7, 'Bagus', 'kas', 1),
(7, '2020-09-12 00:00:00', 'Kursi', 'komputer', 7, 'Bagus', 'kas', 1),
(8, '2020-09-12 00:00:00', 'Server', 'komputer', 7, 'Bagus', 'kas', 1);

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
