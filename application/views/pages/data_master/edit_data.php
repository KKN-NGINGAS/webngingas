<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'AdminBumdes/data_master' ?>">Data Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail IKM</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Detail IKM</h1>
        <!-- <span data-feather="bell"></span> -->
    </div>

    <!-- <div class="container-fluid centered"> -->
        <!-- <div class="card"> -->
            <div class="card-content">
                <div class="col-10 mx-auto">
                    <form class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;" action="<?= base_url().'AdminBumdes/update_ikm' ?>" method="POST">
                <p style="color: red; font-size: 1.3rem; text-align: center; font-weight: bold;"><?= $msg ?></p>
                <div>
                    <h2>Informasi IKM</h2>
                </div>
                <?php foreach ($ikm as $row) { ?>
                    <input type="text" id="id_ikm" name="id_ikm" value="<?= $row->id_ikm?>" disabled hidden>
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
                <div>
                    <h2>Informasi Ketua</h2>
                </div>
                <?php foreach ($pimpinan as $row) { ?>
                    <input type="text" id="id_ikm" name="id_ikm" value="<?= $row->id_karyawan?>" disabled hidden>
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="nama_ketua" class="form-label">Nama Ketua</label>
                            <input type="text" class="form-control input-field" id="nama_ketua" name="nama_ketua" placeholder="Contoh: Bambang Pamungkas" minlength="4" maxlength="80" value="<?= $row->nama_karyawan ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="nik_ketua" class="form-label">NIK</label>
                            <input type="text" class="form-control input-field" id="nik_ketua" name="nik_ketua" placeholder="Contoh: 3304XXXXXXXXXXXX" minlength="4" maxlength="16" value="<?= $row->nik ?>" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="gender_ketua" class="form-label">Jenis Kelamin</label>
                            <select name="gender_ketua" id="gender_ketua" class="form-control input-field" required>
                                <option class="dropdown-item disabled" value="">Pilih Jenis Kelamin</option>
                                <option value="Pria" <?php echo ($row->kelamin == 'Pria') ? 'selected' : '' ?> >Pria</option>
                                <option value="Wanita" <?php echo ($row->kelamin == 'Wanita') ? 'selected' : '' ?> >Wanita</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="no_telp_ketua" class="form-label">No. Telepon Ketua</label>
                            <input type="text" class="form-control input-field" id="no_telp_ketua" name="no_telp_ketua" placeholder="Format Nomor: +628XXXXXXXXXX" minlength="4" maxlength="16" value="<?= $row->no_telp ?>" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="email_ketua" class="form-label">Alamat Email Ketua</label>
                            <input type="email" class="form-control input-field" id="email_ketua" name="email_ketua" placeholder="Contoh: email@gmail.com" value="<?= $row->email ?>" required>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="alamat_ketua" class="form-label">Alamat Ketua</label>
                            <textarea class="form-control input-field" id="alamat_ketua" name="alamat_ketua" placeholder="Contoh: Jl. Suryajana no. 51 RT/RW 01/03 Kec. Malioboro Yogyakarta" value="<?= $row->alamat ?>" required><?= $row->alamat ?></textarea>
                        </div>
                    </div>
                <?php } ?>
                <div>
                    <h2>Informasi Admin</h2>
                </div>
                <?php foreach ($admin as $row) { ?>
                    <input type="text" id="id_ikm" name="id_ikm" value="<?= $row->id_karyawan?>" disabled hidden>
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="nama_admin" class="form-label">Nama Admin</label>
                            <input type="text" class="form-control input-field" id="nama_admin" name="nama_admin" placeholder="Contoh: Bambang Pamungkas" minlength="4" maxlength="80" value="<?= $row->nama_karyawan ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="nik_admin" class="form-label">NIK</label>
                            <input type="text" class="form-control input-field" id="nik_admin" name="nik_admin" placeholder="Contoh: 3304XXXXXXXXXXXX" minlength="4" maxlength="16" value="<?= $row->nik ?>" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="gender_admin" class="form-label">Jenis Kelamin</label>
                            <select name="gender_admin" id="gender_admin" class="form-control input-field" required>
                                <option class="dropdown-item disabled" value="">Pilih Jenis Kelamin</option>
                                <option value="Pria" <?php echo ($row->kelamin == 'Pria') ? 'selected' : '' ?> >Pria</option>
                                <option value="Wanita" <?php echo ($row->kelamin == 'Wanita') ? 'selected' : '' ?> >Wanita</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="no_telp_admin" class="form-label">No. Telepon Admin</label>
                            <input type="text" class="form-control input-field" id="no_telp_admin" name="no_telp_admin" placeholder="Format Nomor: +628XXXXXXXXXX" minlength="4" maxlength="16" value="<?= $row->no_telp ?>" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="email_admin" class="form-label">Alamat Email Admin</label>
                            <input type="email" class="form-control input-field" id="email_admin" name="email_admin" placeholder="Contoh: email@gmail.com" value="<?= $row->email ?>" required>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="alamat_admin" class="form-label">Alamat Admin</label>
                            <textarea class="form-control input-field" id="alamat_admin" name="alamat_admin" placeholder="Contoh: Jl. Suryajana no. 51 RT/RW 01/03 Kec. Malioboro Yogyakarta" value="<?= $row->alamat ?>" required><?= $row->alamat ?></textarea>
                        </div>
                    </div>
                <?php } ?>
                <div class="row" style="padding-top: 1rem;">
                    <!-- <div class="col mb-3">
                        <input class="form-control button-red" style="justify-content: center;" type="reset" name="reset" value="Reset">
                    </div> -->
                    <div class="col-6 mb-3">
                        <input class="form-control button-yellow" style="justify-content: center;" type="submit" name="submit" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- </div> -->
    <!-- </div> -->

</main>