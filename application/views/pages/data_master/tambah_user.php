<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/data_master' ?>">Data Master</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/detail_ikm/'.$id_ikm ?>">Data Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah <?= $level ?></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Tambah <?= $level ?></h1>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="card-content">
        <div class="col-10 mx-auto">
            <form class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;" action="<?= base_url().'MainController/input_user' ?>" method="POST">
                <input type="text" id="id_ikm" name="id_ikm" value="<?= $id_ikm?>" readonly hidden>
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control input-field" id="nama" name="nama" placeholder="Contoh: Bambang Pamungkas" minlength="4" maxlength="80" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-control input-field">
                            <?php if ($level == 'Ketua IKM') { ?>
                                <option value="pimpinan_ikm" selected readonly>Ketua IKM</option>
                            <?php } elseif ($level == 'Admin IKM') { ?>
                                <option value="admin_ikm" selected readonly>Admin IKM</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control input-field" id="nik" name="nik" placeholder="Contoh: 3304XXXXXXXXXXXX" minlength="4" maxlength="16" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control input-field" required>
                            <option class="dropdown-item disabled" value="">Pilih Jenis Kelamin</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="no_telp" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control input-field" id="no_telp" name="no_telp" placeholder="Format Nomor: +628XXXXXXXXXX" minlength="4" maxlength="16" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control input-field" id="email" name="email" placeholder="Contoh: email@gmail.com" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                        <select name="pendidikan" id="pendidikan" class="form-control input-field" required>
                            <option class="dropdown-item disabled" value="">Pilih Pendidikan Terakhir</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D3">D3</option>
                            <option value="D4/S1">D4/S1</option>
                            <option value="S2">S2</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control input-field" id="alamat" name="alamat" placeholder="Contoh: Jl. Suryajana no. 51 RT/RW 01/03 Kec. Malioboro Yogyakarta" required></textarea>
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