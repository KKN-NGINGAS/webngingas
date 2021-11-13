<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/data_tekfo' ?>">Data Teknologi Informasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data Teknologi Informasi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Detail Data Teknologi Informasi</h1>
        <span data-feather="bell"></span>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-<?= $alert ?>" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="card-content">
        <div class="col-11 mx-auto">
            <?php foreach ($teknologi as $row) { ?>
                <form action="<?php echo base_url() . 'MainController/update_tekfo/'.$row->id_tekfo; ?>" method="post" class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control input-field" id="nama_barang" name="nama_barang" placeholder="Contoh: Komputer" minlength="4" maxlength="80" value="<?= $row->nama_barang ?>" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="tipe_merk" class="form-label">Tipe/Merk</label>
                        <input type="text" class="form-control input-field" id="tipe_merk" name="tipe_merk" placeholder="Contoh: 330/Lenovo" minlength="4" maxlength="80" value="<?= $row->tipe_merk ?>" required>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="dana" class="form-label">Sumber Dana</label>
                        <input type="text" class="form-control input-field" id="dana" name="dana" placeholder="Contoh: Pengadaan Barang Maret 2021" minlength="4" maxlength="80" value="<?= $row->sumber_dana ?>" required>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="jumlah_baik" class="form-label">Jumlah Kondisi Baik</label>
                        <input type="number" class="form-control input-field" name="jumlah_baik" id="jumlah_baik" placeholder="Default: 0" value="<?= $row->kondisi_baik ?>">
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="jumlah_kurang" class="form-label">Jumlah Kondisi Kurang Baik</label>
                        <input type="number" class="form-control input-field" name="jumlah_kurang" id="jumlah_kurang" placeholder="Default: 0" value="<?= $row->kondisi_kurang ?>">
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="jumlah_buruk" class="form-label">Jumlah Kondisi Buruk</label>
                        <input type="number" class="form-control input-field" name="jumlah_buruk" id="jumlah_buruk" placeholder="Default: 0" value="<?= $row->kondisi_buruk ?>">
                    </div>
                </div>
                <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                    <div class="row" style="padding-top: 1rem;">
                        <div class="col mb-3">
                            <input class="form-control button-red" style="justify-content: center;" type="reset" name="reset" value="Reset">
                        </div>
                        <div class="col mb-3">
                            <input class="form-control button-yellow" style="justify-content: center;" type="submit" name="submit" value="Submit">
                        </div>
                    </div>
                <?php } ?>
                
            </form>
        <?php } ?>
    </div>
</div>

</main>