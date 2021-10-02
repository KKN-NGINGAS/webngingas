<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'AdminBumdes/data_user' ?>">Data User</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $breadcrumb ?></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1><?= $breadcrumb ?></h1>
        <!-- <span data-feather="bell"></span> -->
    </div>

    <!-- <div class="container-fluid centered"> -->
    <!-- <div class="card"> -->
    <div class="card-content">
        <div class="col-10 mx-auto">
            <form class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;" action="<?= base_url().'AdminBumdes/proses_tambah_user' ?>" method="POST">
                <!-- <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control input-field" id="tanggal" placeholder="Contoh: 15/09/20">
                </div> -->
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control input-field" id="nama" name="nama" placeholder="Contoh: Robert" minlength="4" maxlength="80" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control input-field" id="username" name="username" placeholder="Contoh: Robert1" minlength="4" maxlength="15" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="peranjabatan" class="form-label">Peran/Jabatan</label>
                        <select name="peranjabatan" id="peranjabatan" class="form-control input-field" required>
                            <option class="dropdown-item disabled" value="">Pilih Peran/Jabatan</option>
                            <option value="2">Pimpinan IKM</option>
                            <option value="4">Operator IKM</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="ikm" class="form-label">IKM</label>
                    <select name="ikm" id="ikm" class="form-control input-field" required>
                        <option class="dropdown-item disabled" value="">Pilih IKM</option>
                        <?php foreach ($ikm as $row) { ?>
                            <option value="<?= $row->id_ikm ?>"><?= $row->nama_ikm ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row">
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
    <!-- </div> -->
    <!-- </div> -->

</main>