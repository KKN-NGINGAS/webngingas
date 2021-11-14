<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/data_user' ?>">Data User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Operator</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Edit Operator</h1>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-<?= $alert ?>" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="card-content">
        <div class="col-11 mx-auto">
            <?php foreach ($user as $key) { ?>
                <form action="<?php echo base_url() . 'MainController/update_operator/'.$key->id_user; ?>" method="post" class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="karyawan" class="form-label">Karyawan</label>
                        <select name="karyawan" id="karyawan" class="form-control input-field" required>
                            <option class="dropdown-item disabled" value="" disabled>Pilih Karyawan</option>
                            <?php foreach ($karyawan as $row) { ?>
                                <option value="<?= $row->id_karyawan ?>" selected><?= $row->nama_karyawan." - ".$row->nik ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control input-field" name="username" id="username" pattern="[A-Za-z0-9]{8,15}" title="Hanya diperbolehkan kombinasi huruf besar, huruf kecil dan angka" placeholder="Masukkan Username" value="<?= $key->username ?>" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control input-field" name="password" id="password" pattern="[A-Za-z0-9]{8,15}" title="Hanya diperbolehkan kombinasi huruf besar, huruf kecil dan angka" placeholder="Masukkan Password" required>
                    </div>
                    <span>* Username dan Passward berisikan minimal 8 karakter dan maksimal 15 karakter. </span>
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
            <?php } ?>
        </div>
    </div>

</main>