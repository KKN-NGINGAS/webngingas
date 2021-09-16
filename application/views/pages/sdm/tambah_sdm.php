<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Sumber Daya Manusia</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Karyawan</li>
            <!-- <li class="breadcrumb-item active" aria-current="page">Edit Karyawan</li> -->
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1>Tambah Karyawan</h1> -->
        <!-- <h1>Edit Karyawan</h1> -->
        <h1>Biodata Karyawan</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-10 mx-auto">
                <form class="spacer-2">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control input-field-dashboard" id="nama" placeholder="Max. 80 Karakter" maxlength="80">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control input-field-dashboard" id="nik" placeholder="16 digit" maxlength="16">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nama_ikm" class="form-label">Nama IKM</label>
                                <input type="text" class="form-control input-field-dashboard" id="nama_ikm" placeholder="Contoh: IKM Sumber Djaya">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="jobdesk" class="form-label">Jobdesk</label>
                                <input type="text" class="form-control input-field-dashboard" id="jobdesk" placeholder="Contoh: Operator Mesin Las">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="riwayat" class="form-label">Riwayat Pekerjaan</label>
                                <input type="text" class="form-control input-field-dashboard" id="riwayat" placeholder="Contoh: Admin Support">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                                <input type="text" class="form-control input-field-dashboard" id="pendidikan" placeholder="SD/SMP/SMA/D4/S1 Dst.">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No. Telp</label>
                                <input type="text" class="form-control input-field-dashboard" id="no_telp" placeholder="Contoh: 08515281492">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control input-field-dashboard" name="alamat" placeholder="Contoh: Jl. Suryajana no. 51 RT/RW 01/03 Kec. Malioboro Yogyakarta"></textarea>
                    </div>
                    <div class="row justify-content-end">
                        <!-- <div class="col-2">
                      <div class="mb-3">
                        <input class="form-control form-rounded button-red" type="submit" name="submit" value="Hapus">
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="mb-3">
                        <input class="form-control form-rounded button-yellow" type="submit" name="submit" value="Simpan">
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="mb-3">
                        <input class="form-control form-rounded button-yellow" type="submit" name="submit" value="Tambah">
                      </div>
                    </div> -->
                        <div class="col-2">
                            <div class="mb-3">
                                <input class="form-control form-rounded button-yellow" type="submit" name="submit" value="Komentar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



</main>