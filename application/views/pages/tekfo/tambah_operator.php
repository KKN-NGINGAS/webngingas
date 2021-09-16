<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Halaman Utama</li>
            <li class="breadcrumb-item active" aria-current="page">Teknologi Informasi</li>
        </ol>
    </nav>

    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Teknologi Informasi</h1>
        </div>
        <p>Tambah Data Teknologi Informasi berupa inventaris IKM</p>
    </div class="">

    <div class="card-content">
        <div class="col-11 mx-auto">
            <form class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;">
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control input-field" id="tanggal" placeholder="">
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="namabarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control input-field" id="namabarang" placeholder="Contoh : Meja">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="label" class="form-label">Tipe/Merk/Label</label>
                        <input type="text" class="form-control input-field" id="label" placeholder="Contoh : Philips e series no 21">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="jumlahkondisi" class="form-label">Jumlah dan Kondisi</label>
                        <div class="dropdown">
                            <button class="form-control input-field dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Masukkan Jumlah
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -40px);padding-left: 10px;">
                                <li class="row" style="padding-bottom: 5px;">
                                    <a class="col-lg-5">Baik</a>
                                    <input class="col-lg-2" type="text" class="form-control input-field" id="baik" placeholder="">
                                </li>
                                <li class="row" style="padding-bottom: 5px;">
                                    <a class="col-lg-5">Rusak Ringan</a>
                                    <input class="col-lg-2" type="text" class="form-control input-field" id="rusakringan" placeholder="">
                                </li>
                                <li class="row" style="padding-bottom: 5px;">
                                    <a class="col-lg-5">Rusak Berat</a>
                                    <input class="col-lg-2" type="text" class="form-control input-field" id="rusakberat" placeholder="">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="sumberdana" class="form-label">Sumber Dana</label>
                        <input type="text" class="form-control input-field" id="sumberdana" placeholder="Contoh : Anggaran Tahunan">
                    </div>
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

</main>