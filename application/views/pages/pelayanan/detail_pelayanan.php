<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/pelayanan_konsumen' ?>">Pelayanan Konsumen</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Konsumen</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Detail Data Konsumen 
            <?php if (!in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm', 'pimpinan_ikm'))) { ?>
                <?= $nama_ikm ?>
            <?php } ?>
        </h1>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-<?= $alert ?>" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="card-content">
        <div class="col-10 mx-auto">
            <?php foreach ($konsumen as $row) { ?>
                <form class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;" action="<?= base_url().'MainController/update_konsumen/'.$row->id_perusahaan ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control input-field" id="nama_perusahaan" name="nama_perusahaan" placeholder="Contoh: Bambang Pamungkas" minlength="4" maxlength="80" value="<?= $row->nama_perusahaan ?>" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="telp_perusahaan" class="form-label">No. Telepon Perusahaan</label>
                            <input type="text" class="form-control input-field" id="telp_perusahaan" name="telp_perusahaan" placeholder="Format Nomor: +628XXXXXXXXXX" minlength="4" maxlength="16" value="<?= $row->telp_perusahaan ?>" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="email" class="form-label">Alamat Email Perusahaan</label>
                            <input type="email" class="form-control input-field" id="email" name="email" placeholder="Contoh: email@gmail.com" value="<?= $row->email_perusahaan ?>" required>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="alamat" class="form-label">Alamat Perusahaan</label>
                            <textarea class="form-control input-field" id="alamat" name="alamat" placeholder="Contoh: Jl. Suryajana no. 51 RT/RW 01/03 Kec. Malioboro Yogyakarta" value="<?= $row->alamat_perusahaan ?>" required><?= $row->alamat_perusahaan ?></textarea>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control input-field" id="nama_pemilik" name="nama_pemilik" placeholder="Contoh: Bambang Pamungkas" minlength="4" maxlength="80" value="<?= $row->nama_pemilik ?>" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="telp_pemilik" class="form-label">No. Telepon Pemilik Perusahaan</label>
                            <input type="text" class="form-control input-field" id="telp_pemilik" name="telp_pemilik" placeholder="Format Nomor: +628XXXXXXXXXX" minlength="4" maxlength="16" value="<?= $row->telp_pemilik ?>" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="nama_pic" class="form-label">Nama PIC Perusahaan</label>
                            <input type="text" class="form-control input-field" id="nama_pic" name="nama_pic" placeholder="Contoh: Bambang Pamungkas" minlength="4" maxlength="80" value="<?= $row->nama_pic ?>" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="telp_pic" class="form-label">No. Telepon PIC Perusahaan</label>
                            <input type="text" class="form-control input-field" id="telp_pic" name="telp_pic" placeholder="Format Nomor: +628XXXXXXXXXX" minlength="4" maxlength="16" value="<?= $row->telp_pic ?>" required>
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