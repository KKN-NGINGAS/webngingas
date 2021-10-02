<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'AdminBumdes/data_master' ?>">Data Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah IKM</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Tambah IKM</h1>
        <!-- <span data-feather="bell"></span> -->
    </div>

    <!-- <div class="container-fluid centered"> -->
        <!-- <div class="card"> -->
            <div class="card-content">
                <div class="col-10 mx-auto">
                    <form class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;" action="<?= base_url().'AdminBumdes/input_ikm' ?>" method="POST">
                <!-- <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control input-field" id="tanggal" placeholder="Contoh: 15/09/20">
                </div> -->
                <p style="color: red; font-size: 1.3rem; text-align: center; font-weight: bold;"><?= $msg ?></p>
                <div>
                    <h2>Informasi IKM</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <label for="nama_ikm" class="form-label">Nama IKM</label>
                        <input type="text" class="form-control input-field" id="nama_ikm" name="nama_ikm" placeholder="Contoh: Sumber Baru" minlength="4" maxlength="80" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="no_telp_ikm" class="form-label">No. Telepon IKM</label>
                        <input type="text" class="form-control input-field" id="no_telp_ikm" name="no_telp_ikm" placeholder="Format Nomor: +628XXXXXXXXXX" minlength="4" maxlength="16" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="email_ikm" class="form-label">Alamat Email IKM</label>
                        <input type="email" class="form-control input-field" id="email" name="email_ikm" placeholder="Contoh: email@gmail.com" required>
                    </div>
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="alamat_ikm" class="form-label">Alamat IKM</label>
                    <textarea class="form-control input-field" id="alamat_ikm" name="alamat_ikm" placeholder="Contoh: Jl. Suryajana no. 51 RT/RW 01/03 Kec. Malioboro Yogyakarta" required></textarea>
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
    <!-- </div> -->
    <!-- </div> -->

</main>