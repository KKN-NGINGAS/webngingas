<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/data_produksi' ?>">Data Produksi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data Produksi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Ubah Data Produksi</h1>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="card-content">
        <div class="col-10 mx-auto">
            <?php foreach ($data_produksi as $row) { ?>
                <form action="<?php echo base_url() . 'MainController/update_produksi/'.$row->id_data_produksi; ?>" method="post" class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="tanggal_produksi" class="form-label">Tanggal</label>
                        <input type="date" class="form-control input-field" name="tanggal_produksi" id="tanggal_produksi" value="<?= $row->tanggal ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="produk" class="form-label">Produk</label>
                        <select name="produk" id="produk" class="form-control input-field">
                            <option class="dropdown-item disabled" value="" disabled>Pilih Produk</option>
                            <?php foreach ($produk as $options) { ?>
                                <option value="<?= $options->id_data_produk ?>" <?= ($row->id_produk == $options->id_data_produk) ? 'selected' : 'disabled' ?>><?= $options->nama_produk ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="jumlah_produksi" class="form-label">Jumlah Produksi</label>
                        <input type="number" class="form-control input-field" name="jumlah_produksi" id="jumlah_produksi" value="<?= $row->jumlah_produksi ?>" placeholder="Default: 0">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="bahan_mentah" class="form-label">Bahan Mentah</label>
                        <textarea class="form-control input-field" id="bahan_mentah" name="bahan_mentah" placeholder="Contoh: Besi 2 buah, pasir 1 kg"><?= $row->jenis_bahan_mentah ?></textarea>
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
    </div>
</div>

</main>