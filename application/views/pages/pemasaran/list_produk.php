<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/pemasaran' ?>">Pemasaran dan Periklanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Data Produk</h1>
        <div>
            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                <a class="btn btn-success" href="<?= base_url().'MainController/tambah_produk' ?>" style="text-decoration: none; color: white;">Tambah Produk</a>
            <?php } ?>
        </div>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-warning" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="data-user">
        <table class="table" id="myTable">
            <thead>
                <tr class="bg-green">
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($data_produk as $row) { ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->nama_produk ?></td>
                        <td><?= "Rp " . number_format($row->harga_satuan,2,',','.'); ?></td>
                        <td><?= $row->stok ?></td>
                        <td><a class="btn btn-info" href="<?= base_url().'MainController/detail_produk/'.$row->id_data_produk ?>" style="text-decoration: none; color: white;">Info Detail</a>
                            <a class="btn btn-danger" href="<?= base_url().'MainController/delete_produk/'.$row->id_data_produk ?>" style="text-decoration: none; color: white;">Hapus Data</a>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

</main>