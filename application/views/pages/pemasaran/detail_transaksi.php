<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/pemasaran' ?>">Pemasaran dan Periklanan</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/data_transaksi' ?>">Data Transaksi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Detail Transaksi</h1>
        <div>
            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                <a class="btn btn-success" href="<?= base_url().'MainController/tambah_detail_transaksi/'.$id_transaksi ?>" style="text-decoration: none; color: white;">Tambah Data</a>
            <?php } ?>
        </div>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-<?= $alert ?>" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="services">
        <div class="card-body">
            <?php 
            foreach ($transaksi as $row) { 
                $time = strtotime($row->tanggal);
                $tgl = date("j F Y",$time);
                ?>
                <table width="100%">
                    <tr>
                        <td class="align-middle" width="15%">
                            <label>Nama IKM:</label><br>
                            <?= $row->nama_ikm ?>
                        </td>
                        <td class="align-middle" width="15%">
                            <label>Tanggal Transaksi:</label><br>
                            <?= $tgl ?>
                        </td>
                        <td class="align-middle" width="15%">
                            <label>No Transaksi:</label><br>
                            <?= $row->no_transaksi ?>
                        </td>
                        <td class="align-middle" width="15%">
                            <label>Nama Perusahaan:</label><br>
                            <?= $row->nama_perusahaan ?>
                        </td>
                        <td class="align-middle" width="15%">
                            <label>Total:</label><br>
                            <?= "Rp " . number_format($row->total,2,',','.'); ?>
                        </td>
                        <td class="align-bottom" width="20%">
                            <div class="row" style="padding-bottom: 1rem;">
                                <a class="btn btn-info" href="#" style="text-decoration: none; color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Bukti Pembayaran</a>
                            </div>
                            <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title">Bukti Pembayaran</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php if ($row->pict != '') { ?>
                                                <img src="<?= base_url().'uploads/struk/'.$row->pict ?>" alt="Bukti Pembayaran" class="img-fluid mb-5">
                                                <a class="btn btn-warning" href="<?= base_url().'MainController/upload_struk/'.$id_transaksi ?>" style="text-decoration: none; color: white;">Unggah Ulang Bukti Pembayaran</a>
                                            <?php } else { ?>
                                                <img src="<?= base_url().'uploads/no_image.jpg' ?>" alt="No Image" class="img-fluid mb-5">
                                                <a class="btn btn-success" href="<?= base_url().'MainController/upload_struk/'.$id_transaksi ?>" style="text-decoration: none; color: white;">Unggah Bukti Pembayaran</a>
                                            <?php } ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>

            <?php } ?>
        </div>
    </div>

    <div class="data-user">
        <table class="table" id="myTable">
            <thead>
                <tr class="bg-green">
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($detail_transaksi as $row) { ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->nama_produk ?></td>
                        <td><?= "Rp " . number_format($row->harga_satuan_transaksi,2,',','.'); ?></td>
                        <td><?= $row->jumlah_barang ?></td>
                        <td><?= "Rp " . number_format($row->harga_satuan_transaksi * $row->jumlah_barang,2,',','.'); ?></td>
                        <td>
                            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                                <a class="btn btn-danger" href="<?= base_url().'MainController/delete_detail_transaksi/'.$row->id_det_transaksi ?>" style="text-decoration: none; color: white;">Hapus</a>
                            <?php } else { echo "-"; } ?>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        
    </div>

</main>