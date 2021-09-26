-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 06:48 AM
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

CREATE TABLE `data_ikm` (
  `id_ikm` int(11) NOT NULL,
  `nama_ikm` varchar(80) NOT NULL,
  `alamat_ikm` varchar(255) NOT NULL,
  `no_telp_ikm` varchar(15) NOT NULL DEFAULT '+628XXXXXXXXXX',
  `email_ikm` varchar(80) NOT NULL,
  `tanggal_terdaftar` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_ikm`
--

INSERT INTO `data_ikm` (`id_ikm`, `nama_ikm`, `alamat_ikm`, `no_telp_ikm`, `email_ikm`, `tanggal_terdaftar`, `tanggal_update`) VALUES
(1, 'Untung Dadi', 'Alamatnya masih sama disitu kok, nomer 15', '+62816683193', 'dida@dida.dida', '2021-09-26 01:28:01', '2021-09-26 01:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `nama_karyawan` varchar(80) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_ikm` int(11) NOT NULL,
  `tanggal_terdaftar` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `kelamin`, `jabatan`, `alamat`, `email`, `no_telp`, `id_ikm`, `tanggal_terdaftar`, `tanggal_update`) VALUES
(1, 3304222222222222, 'Dida', 'Pria', 'Ketua', 'Kan aku tinggal di kantor, jadi alamatnya sama kek kantor', 'dida@dida.dida', '+62916683193', 1, '2021-09-26 01:28:01', '2021-09-26 01:28:01'),
(2, 3304222222222244, 'Yae-sama', 'Pria', 'Karyawan', 'Numpang dirumah dida', 'dida@dida.dida', '+62916683193', 1, '2021-09-26 01:28:01', '2021-09-26 01:28:01'),
(3, 3304222222222111, 'Raiden-sama', 'Wanita', 'Karyawan', 'Tenshukaku', 'raiden@gmail.com', '+62816683193', 1, '2021-09-26 09:17:36', '2021-09-26 09:17:36');

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

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `id_karyawan`, `username`, `user_pwd`, `role`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 0, 'admin', 'ed2b1f468c5f915f3f1cf75d7068baae', 'admin_bumdes', '2021-09-25 14:18:23', '2021-09-25 14:18:23'),
(2, 0, 'pimpinan', 'ed2b1f468c5f915f3f1cf75d7068baae', 'pimpinan_bumdes', '2021-09-25 14:18:54', '2021-09-25 14:18:54'),
(3, 1, '330422222222222', '12698ebab394c4d7cf5fa0eb17970844', 'pimpinan_ikm', '2021-09-26 01:28:01', '2021-09-26 01:28:01'),
(4, 2, '330422222222224', '6d631971c6eef149a3546d17dbd42cf3', 'admin_ikm', '2021-09-26 01:28:01', '2021-09-26 01:28:01');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `data_ikm`
--
ALTER TABLE `data_ikm`
  ADD PRIMARY KEY (`id_ikm`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `nik` (`nik`);

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
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

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
  MODIFY `id_ikm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id_data_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teknologi_informasi`
--
ALTER TABLE `teknologi_informasi`
  MODIFY `id_ti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
