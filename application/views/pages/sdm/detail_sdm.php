<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/data_sdm' ?>">Sumber Daya Manusia</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Sumber Daya Manusia</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Detail Karyawan</h1>
    </div>
    
    <?php if ($msg != '') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="card-content">
        <?php foreach ($sdm as $row) { ?>
            <form class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;" action="<?= base_url().'MainController/update_sdm/'.$row->id_karyawan ?>" method="POST">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control input-field" id="nama" name="nama" placeholder="<?= $row->nama_karyawan ?>" value="<?= $row->nama_karyawan ?>" minlength="4" maxlength="80" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control input-field" id="nik" name="nik" placeholder="<?= $row->nik ?>" disabled>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control input-field" required>
                            <option class="dropdown-item disabled" value="">Pilih Jenis Kelamin</option>
                            <option value="Pria" <?= ($row->kelamin == 'Pria') ? 'selected' : '' ?>>Pria</option>
                            <option value="Wanita" <?= ($row->kelamin == 'Wanita') ? 'selected' : '' ?>>Wanita</option>
                        </select>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="no_telp" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control input-field" id="no_telp" name="no_telp" placeholder="<?= $row->no_telp ?>" value="<?= $row->no_telp ?>" minlength="4" maxlength="16" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control input-field" id="email" name="email" placeholder="<?= $row->email ?>" value="<?= $row->email ?>" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                        <select name="pendidikan" id="pendidikan" class="form-control input-field" required>
                            <option class="dropdown-item disabled" value="">Pilih Pendidikan Terakhir</option>
                            <option value="SD" <?= ($row->pendidikan == 'SD') ? 'selected' : '' ?>>SD</option>
                            <option value="SMP" <?= ($row->pendidikan == 'SMP') ? 'selected' : '' ?>>SMP</option>
                            <option value="SMA" <?= ($row->pendidikan == 'SMA') ? 'selected' : '' ?>>SMA</option>
                            <option value="D3" <?= ($row->pendidikan == 'D3') ? 'selected' : '' ?>>D3</option>
                            <option value="D4/S1" <?= ($row->pendidikan == 'D4/S1') ? 'selected' : '' ?>>D4/S1</option>
                            <option value="S2" <?= ($row->pendidikan == 'S2') ? 'selected' : '' ?>>S2</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="ikm" class="form-label">Nama IKM</label>
                        <input type="text" class="form-control input-field" id="ikm" name="ikm" placeholder="<?= $row->nama_ikm ?>" disabled>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control input-field" id="alamat" name="alamat" placeholder="<?= $row->alamat ?>" value="<?= $row->alamat ?>" required><?= $row->alamat ?></textarea>
                    </div>
                </div>
                <?php if ((in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm')) && $row->jabatan != 'Ketua') || $this->session->userdata('role') == 'pimpinan_ikm' && $row->jabatan == 'Ketua') { ?>
                    <div class="row" style="padding-top: 1rem;">
                        <div class="col mb-3">
                            <input class="form-control button-yellow" style="justify-content: center;" type="submit" name="submit" value="Simpan Perubahan">
                        </div>
                    </div>
                </form>
            <?php }
        } ?>
    </div>

</main>