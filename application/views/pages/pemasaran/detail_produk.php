<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/pemasaran' ?>">Pemasaran dan Periklanan</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/data_produk' ?>">Data Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Detail Produk</h1>
        <!-- <span data-feather="bell"></span> -->
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-<?= $alert ?>" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="card-content">
        <div class="col-10 mx-auto">
            <?php foreach ($data_produk as $row) { ?>
                <form class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;" action="<?= base_url().'MainController/update_produk/'.$row->id_data_produk ?>" method="POST">
                    <?php if (!in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="stok" class="form-label">Nama IKM: <?= $row->nama_ikm ?></label>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control input-field" id="nama_produk" name="nama_produk" placeholder="<?= $row->nama_produk ?>" value="<?= $row->nama_produk ?>" minlength="4" maxlength="80" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="harga_satuan" class="form-label">Harga Satuan</label>
                            <input type="number" class="form-control input-field" id="harga_satuan" name="harga_satuan" placeholder="<?= $row->harga_satuan ?>" value="<?= $row->harga_satuan ?>">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <div class=""><?= $row->stok ?></div>
                        </div>
                    </div>
                    <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col mb-3">
                                <input class="form-control button-yellow" style="justify-content: center;" type="submit" name="submit" value="Simpan Perubahan">
                            </div>
                        </div>
                    </form>
                <?php }
            } ?>
        </form>
    </div>
</div>

</main>