-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 10:23 PM
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
-- Table structure for table `admin_bumdes`
--

CREATE TABLE `admin_bumdes` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_bumdes`
--

INSERT INTO `admin_bumdes` (`id_admin`, `id_user`, `nama`, `no_telp`, `alamat`, `email`) VALUES
(1, 1, 'Suparno', '+6282882228745', 'Jl. Sama Mantan Kepergok Pacar no. 52', 'Suparnochan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `data_ikm`
--

CREATE TABLE `data_ikm` (
  `id_ikm` int(11) NOT NULL,
  `nama_ikm` varchar(80) NOT NULL,
  `no_telp_ikm` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tanggal_terdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_ikm`
--

INSERT INTO `data_ikm` (`id_ikm`, `nama_ikm`, `no_telp_ikm`, `status`, `tanggal_terdaftar`) VALUES
(1, 'Sumber Kencana', '+6285376678977', 'aktif', '2021-01-01 00:00:00'),
(2, 'Mertua Galak', '+6285376678966', 'aktif', '2021-01-02 00:00:00'),
(3, 'Cuci Tangan', '+6285376678955', 'aktif', '2021-01-03 00:00:00'),
(4, 'Harimau Selatan', '+6285376678944', 'aktif', '2021-01-04 00:00:00'),
(5, 'Abang Jago', '+6285376678933', 'aktif', '2021-01-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` bigint(20) DEFAULT NULL,
  `nama_karyawan` varchar(80) DEFAULT NULL,
  `Kelamin` varchar(10) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `pendidikan_terakhir` varchar(5) DEFAULT NULL,
  `riwayat_pekerjaan` varchar(50) DEFAULT NULL,
  `id_ikm` int(11) DEFAULT NULL,
  `jobdesk` varchar(25) DEFAULT NULL,
  `tanggal_terdaftar` datetime DEFAULT NULL,
  `pas_foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `Kelamin`, `alamat`, `no_telp`, `pendidikan_terakhir`, `riwayat_pekerjaan`, `id_ikm`, `jobdesk`, `tanggal_terdaftar`, `pas_foto`) VALUES
(1, 8888909468744740, 'raiden baal', 'Wanita', 'Jl Deplu Raya 37 RTv 05/004, Dki Jakarta', '+6285236631530', 'S3', 'Joki Akun Genshin', 1, 'ketua ikm', '2021-01-01 00:00:00', '1raiden baalid_ikm'),
(2, 9582399383148280, 'ganyu fauzi', 'Wanita', 'Jl Majapahit 24, Jawa Tengah', '+6285634054158', 'S3', 'Joki Akun Valorant', 1, 'pekerja', '2021-01-01 00:00:00', '2ganyu fauzi1'),
(3, 8866001093212270, 'yae fauzi', 'Wanita', 'Jl Jend Sudirman Kav 9 Ratu Plaza Office Tower, Dki Jakarta', '+6285774083741', 'S3', 'Akuntansi', 2, 'ketua ikm', '2021-01-01 00:00:00', '3yae fauzi1'),
(4, 7638774788762660, 'muslim pardede', 'Pria', 'Jl Raya Kaligawe Km 5-6 Kawasan Industri Terboyo Bl C-10, Jawa Tengah', '+6285773401317', 'S3', 'Doktor Bedah', 2, 'pekerja', '2021-01-01 00:00:00', '4muslim pardede2'),
(5, 3903004201732020, 'fu hua', 'Wanita', 'Jl Cempaka Putih Brt 9 A/3, Dki Jakarta', '+6285635148205', 'S3', 'Programmer Google', 1, 'pekerja', '2021-01-01 00:00:00', '5fu hua2'),
(6, 1160176973663270, 'andri kurnia', 'Pria', 'Jl Madu 276, Dki Jakarta', '+6285602318013', 'S3', 'Stockholder Amazon', 3, 'ketua ikm', '2021-01-01 00:00:00', '6andri kurnia1'),
(7, 1862288378129970, 'yojima rahmadi', 'Wanita', 'Jl Pucang Anom 17-33, Jawa Timur', '+6285333296851', 'S3', 'Founder GoITS', 3, 'pekerja', '2021-01-01 00:00:00', '7yojima rahmadi3'),
(8, 8221411791766500, 'dimas budiman', 'Pria', 'Jl Gading Raya 1, Dki Jakarta', '+6285126500712', 'S3', 'CEO Aku Sehat', 4, 'ketua ikm', '2021-01-01 00:00:00', '8dimas budiman3'),
(9, 8307136949547460, 'justin christoper', 'Pria', 'Jl Kp Melayu Besar 19 Ged Sandipura, Dki Jakarta', '+6285185943402', 'S3', 'Penggulat Profesional', 4, 'pekerja', '2021-01-01 00:00:00', '9justin christoper4'),
(10, 7336248965277550, 'ujang setyadharma', 'Pria', 'Jl Flamboyan 11 A, Dki Jakarta', '+6285994958261', 'S3', 'Data Scientist', 4, 'pekerja', '2021-01-01 00:00:00', '10ujang setyadharma4'),
(11, 9160964298054520, 'donny rahmadi', 'Pria', 'Jl Mangga Dua Raya Hotel Duzit 20, Dki Jakarta', '+6285337980394', 'S3', 'Data Scientist', 5, 'ketua ikm', '2021-01-01 00:00:00', '11donny rahmadi4'),
(12, 5046386740492680, 'hanro hartanto', 'Pria', 'Jl MH Thamrin 78, Sumatera Utara', '+6285557897807', 'S3', 'Data Scientist', 5, 'pekerja', '2021-01-01 00:00:00', '12hanro hartanto5'),
(13, 2723873733277600, 'joko susilo', 'Pria', 'Jl Budi Rahayu Raya 3 RT 008/09, Dki Jakarta', '+6285535921008', 'S3', 'CEO Mari Belajar', 5, 'pekerja', '2021-01-01 00:00:00', '13joko susilo5'),
(14, 8744740888890940, 'Kaneki Fauzi', 'Pria', 'Jl Budi Rahayu Raya 4 RT 008/09, Dki Jakarta', '+6285531008592', 'SD', 'Pemimpin bangsa Ghoul', 1, 'pekerja', '2021-01-01 00:00:00', '14Kaneki Fauzi5'),
(15, 2020390300420170, 'Kasino Sudirman', 'Pria', 'Jl Budi Rahayu Raya 5 RT 008/09, Dki Jakarta', '+6285210085359', 'S1', 'Gambler auto menang', 1, 'pekerja', '2021-01-01 00:00:00', '15Kasino Sudirman1');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `nama_kontak_perusahaan` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` varchar(255) DEFAULT NULL,
  `no_telp_kontak_perusahaan` varchar(15) DEFAULT NULL,
  `no_telp_perusahaan` varchar(15) DEFAULT NULL,
  `jenis_perusahaan` varchar(20) DEFAULT NULL,
  `tanggal_terdaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `data_produk` (
  `id_data_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `stok_akhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_produk`
--

INSERT INTO `data_produk` (`id_data_produk`, `nama_produk`, `harga_satuan`, `stok_awal`, `stok_akhir`) VALUES
(1, 'Barang Berat 1', 10000000, 15, 12),
(2, 'Barang Berat 2', 2000000, 15, 5),
(3, 'Barang Berat 3', 500000, 15, 13),
(4, 'Barang Berat 4', 1500000, 15, 15),
(5, 'barang Berat 5', 1750000, 15, 15),
(6, 'Barang Berat 6', 560000, 15, 15),
(7, 'Barang Berat 7', 22500000, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id_laporan` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_ikm` int(11) DEFAULT NULL,
  `laba` int(11) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id_laporan`, `tanggal`, `id_ikm`, `laba`, `keterangan`) VALUES
(1, '2020-09-07 00:00:00', 1, -500000, 'Barang Rusak'),
(2, '2020-09-07 00:00:00', 2, 150000, 'Penjualan laku'),
(3, '2020-09-09 00:00:00', 3, 4550000, 'Penjualan laku'),
(4, '2020-09-12 00:00:00', 4, -120000, 'Barang Hilang'),
(5, '2020-09-16 00:00:00', 5, 450000, 'Penjualan laku'),
(6, '2020-09-17 00:00:00', 1, -500000, 'Barang Rusak'),
(7, '2020-09-18 00:00:00', 1, 150000, 'Penjualan laku'),
(8, '2020-09-19 00:00:00', 1, 455000, 'Penjualan laku'),
(9, '2020-09-20 00:00:00', 1, -120000, 'Barang Hilang'),
(10, '2020-09-21 00:00:00', 1, 450000, 'Penjualan laku');

-- --------------------------------------------------------

--
-- Table structure for table `operator_ikm`
--

CREATE TABLE `operator_ikm` (
  `id_operator` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_ikm` int(11) DEFAULT NULL,
  `id_ketua` int(11) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator_ikm`
--

INSERT INTO `operator_ikm` (`id_operator`, `id_user`, `id_ikm`, `id_ketua`, `nama`, `no_telp`, `alamat`, `email`) VALUES
(1, 4, 1, 1, 'Sugeng Sutrisno', '+6281234567890', 'Jl. Cinta Kasih Sesama Umat Manusia no. 28, Surga', 'sugengkun@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan_ikm_bumdes`
--

CREATE TABLE `pimpinan_ikm_bumdes` (
  `id_pimpinan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_ikm` int(11) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pimpinan_ikm_bumdes`
--

INSERT INTO `pimpinan_ikm_bumdes` (`id_pimpinan`, `id_user`, `id_ikm`, `nama`, `no_telp`, `alamat`, `email`) VALUES
(1, 2, 1, 'Sukijan', '6282882228745', 'Jl. Cinta Kita Kandas no. 22, Hatimu', 'sukijansama@gmail.com'),
(2, 3, 0, 'Superman', '6281234567890', 'Jl. Cape jadinya terbang no 99. Langit ke 7', 'supramannnn@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(11) NOT NULL,
  `tanggal_produksi` datetime DEFAULT NULL,
  `jumlah_produksi` int(11) DEFAULT NULL,
  `id_data_produk` int(11) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `id_ikm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `tanggal_produksi`, `jumlah_produksi`, `id_data_produk`, `kuantitas`, `status`, `id_ikm`) VALUES
(1, '2020-09-01 00:00:00', 1, 1, 3, 'berhasil', 1),
(2, '2020-09-01 00:00:00', 1, 2, 4, 'berhasil', 2),
(3, '2020-09-01 00:00:00', 1, 3, 3, 'gagal', 4),
(4, '2020-09-02 00:00:00', 1, 4, 2, 'gagal', 5),
(5, '2020-09-02 00:00:00', 1, 1, 3, 'berhasil', 1),
(6, '2020-09-02 00:00:00', 1, 2, 2, 'gagal', 3),
(7, '2020-09-02 00:00:00', 1, 3, 4, 'gagal', 2),
(8, '2020-09-02 00:00:00', 1, 2, 3, 'gagal', 1),
(9, '2020-09-02 00:00:00', 1, 3, 1, 'gagal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `tanggal_dibuat`) VALUES
(1, 'admin', NULL, '2020-09-07 00:00:00'),
(2, 'pimpinan1', NULL, '2020-09-08 00:00:00'),
(3, 'pimpinan2', NULL, '2020-09-09 00:00:00'),
(4, 'operator', NULL, '2020-09-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teknologi_informasi`
--

CREATE TABLE `teknologi_informasi` (
  `id_ti` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `tipe_barang` varchar(15) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `kondisi` varchar(10) DEFAULT NULL,
  `sumber_dana` varchar(30) DEFAULT NULL,
  `id_ikm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `transaksi_penjualan` (
  `id_penjualan` int(11) NOT NULL,
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
  `keterangan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_bumdes`
--
ALTER TABLE `admin_bumdes`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_ikm`
--
ALTER TABLE `data_ikm`
  ADD PRIMARY KEY (`id_ikm`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id_data_produk`);

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `operator_ikm`
--
ALTER TABLE `operator_ikm`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `pimpinan_ikm_bumdes`
--
ALTER TABLE `pimpinan_ikm_bumdes`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `teknologi_informasi`
--
ALTER TABLE `teknologi_informasi`
  ADD PRIMARY KEY (`id_ti`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_ikm`
--
ALTER TABLE `data_ikm`
  MODIFY `id_ikm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
