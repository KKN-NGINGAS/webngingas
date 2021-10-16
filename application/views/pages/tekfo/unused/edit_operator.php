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
            <form method="post" action="<?= base_url('tekfo/edit_operator_insert/'.$teknologi_informasi_join[0]->id_ti)?>" class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;">
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <?php
                    $new_date_format = date('Y-m-d', strtotime($teknologi_informasi_join[0]->tanggal));
                    ?>
                    <input type="date" class="form-control input-field" id="tanggal" name="tanggal" value="<?= $new_date_format?>">
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="namabarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control input-field" id="namabarang" name="nama_barang" value="<?= $teknologi_informasi_join[0]->nama_barang?>">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="label" class="form-label">Tipe/Merk/Label</label>
                        <input type="text" class="form-control input-field" id="label" name="tipe_barang" value="<?= $teknologi_informasi_join[0]->tipe_barang?>">
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
                                    <input class="col-lg-3" type="number" name="baik" class="form-control input-field" id="baik" value="<?= $teknologi_informasi_join[0]->baik?>">
                                </li>
                                <li class="row" style="padding-bottom: 5px;">
                                    <a class="col-lg-5">Rusak Ringan</a>
                                    <input class="col-lg-3" type="number" name="rusak_ringan" class="form-control input-field" id="rusakringan" value="<?= $teknologi_informasi_join[0]->rusak_ringan?>">
                                </li>
                                <li class="row" style="padding-bottom: 5px;">
                                    <a class="col-lg-5">Rusak Berat</a>
                                    <input class="col-lg-3" type="number" name="rusak_berat" class="form-control input-field" id="rusakberat" value="<?= $teknologi_informasi_join[0]->rusak_berat?>">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="sumberdana" class="form-label">Sumber Dana</label>
                        <input type="text" class="form-control input-field" id="sumberdana" name="sumber_dana" value="<?= $teknologi_informasi_join[0]->sumber_dana?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <input class="form-control button-red" style="justify-content: center;" type="reset" name="reset" value="Reset">
                    </div>
                    <div class="col mb-3">
                        <input class="form-control button-yellow" style="justify-content: center;" type="submit" name="submit" value="Edit">
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>