<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/pemasaran' ?>">Pemasaran dan Periklanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Transaksi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Tambah Transaksi</h1>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="card-content">
        <div class="col-11 mx-auto">
          <form action="<?php echo base_url() . 'MainController/input_transaksi'; ?>" method="post" class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control input-field" name="tanggal" id="tanggal" required>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="pelanggan" class="form-label">Pelanggan</label>
                    <select name="pelanggan" id="pelanggan" class="form-control input-field" required>
                        <option class="dropdown-item disabled" value="">Pilih Pelanggan</option>
                        <?php foreach ($pelanggan as $row) { ?>
                            <option value="<?= $row->id_perusahaan ?>"><?= $row->nama_perusahaan.' - '.$row->nama_pemilik ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem;">
                <div class="col mb-3">
                    <input class="form-control button-red" style="justify-content: center;" type="reset" name="reset" value="Reset">
                </div>
                <div class="col mb-3">
                    <input class="form-control button-yellow" style="justify-content: center;" type="submit" name="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>

</main>