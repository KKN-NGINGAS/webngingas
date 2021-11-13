<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/data_master' ?>">Data Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail IKM</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Detail IKM</h1>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-<?= $alert ?>" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

            <div class="card-content">
                <div class="col-10 mx-auto">
                    <form class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;" action="<?= base_url().'MainController/update_ikm' ?>" method="POST">
                        <?php foreach ($ikm as $row) { ?>
                            <input type="text" id="id_ikm" name="id_ikm" value="<?= $row->id_ikm?>" readonly hidden>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="nama_ikm" class="form-label">Nama IKM</label>
                                    <input type="text" class="form-control input-field" id="nama_ikm" name="nama_ikm" placeholder="Contoh: Sumber Baru" minlength="4" maxlength="80" value="<?= $row->nama_ikm?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="no_telp_ikm" class="form-label">No. Telepon IKM</label>
                                    <input type="text" class="form-control input-field" id="no_telp_ikm" name="no_telp_ikm" placeholder="Format Nomor: +628XXXXXXXXXX" minlength="4" maxlength="16" value="<?= $row->no_telp_ikm ?>" required>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="email_ikm" class="form-label">Alamat Email IKM</label>
                                    <input type="email" class="form-control input-field" id="email" name="email_ikm" placeholder="Contoh: email@gmail.com" value="<?= $row->email_ikm ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="alamat_ikm" class="form-label">Alamat IKM</label>
                                <textarea class="form-control input-field" id="alamat_ikm" name="alamat_ikm" placeholder="Contoh: Jl. Suryajana no. 51 RT/RW 01/03 Kec. Malioboro Yogyakarta" value="<?= $row->alamat_ikm ?>" required><?= $row->alamat_ikm ?></textarea>
                            </div>
                        <?php } ?>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col-12 mb-3">
                                <input class="form-control button-yellow" style="justify-content: center;" type="submit" name="submit" value="Perbarui Informasi IKM">
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-4 mx-auto">
                            <h2>Informasi Ketua</h2>
                            <?php 
                            if ($pimpinan) {
                                foreach ($pimpinan as $row) { ?>
                                    <table style="text-align: left;">
                                        <tr>
                                            <td width="15%">Nama</td>
                                            <td width="5%">:</td>
                                            <td width="60%"><?= $row->nama_karyawan ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nik</td>
                                            <td>:</td>
                                            <td><?= $row->nik ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td><?= $row->kelamin ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Telp</td>
                                            <td>:</td>
                                            <td><?= $row->no_telp ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td><?= $row->email ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $row->alamat ?></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td><?= $row->username ?></td>
                                        </tr>
                                    </table>
                                    <div class="row" style="padding-top:1rem;">
                                        <div class="col mb-3">
                                            <a href="<?= base_url('MainController/reset_user/'.$row->id_user.'/'.$row->id_ikm) ?>" class="form-control button-yellow" style="justify-content: center;">Reset Akun</a>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="row" style="padding-top:1rem;">
                                    <div class="col mb-3">
                                        <a href="<?= base_url('MainController/tambah_user/ketua/'.$row->id_ikm) ?>" class="form-control button-yellow" style="justify-content: center;">Tambah Ketua</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-4 mx-auto">
                            <h2>Informasi Admin</h2>
                            <?php 
                            if ($admin) {
                                foreach ($admin as $row) { ?>
                                    <table style="text-align: left;">
                                        <tr>
                                            <td width="15%">Nama</td>
                                            <td width="5%">:</td>
                                            <td width="60%"><?= $row->nama_karyawan ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nik</td>
                                            <td>:</td>
                                            <td><?= $row->nik ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td><?= $row->kelamin ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Telp</td>
                                            <td>:</td>
                                            <td><?= $row->no_telp ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td><?= $row->email ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $row->alamat ?></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td><?= $row->username ?></td>
                                        </tr>
                                    </table>
                                    <div class="row" style="padding-top:1rem;">
                                        <div class="col mb-3">
                                            <a href="<?= base_url('MainController/reset_user/'.$row->id_user.'/'.$row->id_ikm) ?>" class="form-control button-yellow" style="justify-content: center;">Reset Akun</a>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="row" style="padding-top:1rem;">
                                    <div class="col mb-3">
                                        <a href="<?= base_url('MainController/tambah_user/admin/'.$row->id_ikm) ?>" class="form-control button-yellow" style="justify-content: center;">Tambah Admin</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </main>