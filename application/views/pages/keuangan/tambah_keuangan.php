<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/data_laporan' ?>">Keuangan dan Akuntansi </a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/detail_laporan/'.$id_laporan ?>">Detail Laporan </a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Keuangan</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Tambah Data Keuangan</h1>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="card-content">
        <div class="col-11 mx-auto">
          <form action="<?php echo base_url() . 'MainController/input_data_keuangan/'.$id_laporan; ?>" method="post" class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="tanggal_laporan" class="form-label">Tanggal Laporan</label>
                    <input type="date" class="form-control input-field" name="tanggal_laporan" id="tanggal_laporan">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control input-field" id="keterangan" name="keterangan" placeholder="Contoh: Pembelian Bahan Baku" minlength="4" maxlength="80" required>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="pemasukan" class="form-label">Pemasukan</label>
                    <input type="number" class="form-control input-field" id="pemasukan" name="pemasukan" placeholder="Default: 0">
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="pengeluaran" class="form-label">Pengeluaran</label>
                    <input type="number" class="form-control input-field" id="pengeluaran" name="pengeluaran" placeholder="Default: 0">
                </div>
            </div>
            <div class="row" style="padding-top: 1rem;">
                <div class="col mb-6">
                    <input class="form-control button-yellow" style="justify-content: center;" type="submit" name="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>

</main>