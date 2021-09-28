<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Halaman Utama</li>
            <li class="breadcrumb-item active" aria-current="page">Keuangan dan Akuntansi</li>
            <li class="breadcrumb-item active" aria-current="page">Informasi Detail</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Informasi Detail</h1>
    </div>

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-6">
            <label class="card-title">Nama IKM</label>
            <div class="card-reg" style="margin: 0em;">
                <div class="card-body">
                    <!-- <h5 class="card-text">69420</h5> -->
                    <input type="text" class="form-control input-field" name="jenis_bahan_mentah" id="jenis_bahan_mentah" value="<?= $keuangan[0]->nama_ikm?>">
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <label class="card-title">Bulan</label>
            <div class="card-reg" style="margin: 0em;">
                <div class="card-body">
                <!-- <input type="text" class="form-control input-field" name="jenis_bahan_mentah" id="jenis_bahan_mentah" placeholder="Sisipkan tanda koma jika lebih dari satu bahan"> -->
                <select id="cars" name="cars" class="form-control input-field">
                    <option value="Januari" <?= ($keuangan[0]->bulan == "Januari")?"selected":"";?>>Januari</option>
                    <option value="Februari" <?= ($keuangan[0]->bulan == "Februari")?"selected":"";?>>Februari</option>
                    <option value="Maret" <?= ($keuangan[0]->bulan == "Maret")?"selected":"";?>>Maret</option>
                    <option value="April" <?= ($keuangan[0]->bulan == "April")?"selected":"";?>>April</option>
                    <option value="Mei" <?= ($keuangan[0]->bulan == "Mei")?"selected":"";?>>Mei</option>
                    <option value="Juni" <?= ($keuangan[0]->bulan == "Juni")?"selected":"";?>>Juni</option>
                    <option value="Juli" <?= ($keuangan[0]->bulan == "Juli")?"selected":"";?>>Juli</option>
                    <option value="Agustus" <?= ($keuangan[0]->bulan == "Agustus")?"selected":"";?>>Agustus</option>
                    <option value="September" <?= ($keuangan[0]->bulan == "September")?"selected":"";?>>September</option>
                    <option value="Oktober" <?= ($keuangan[0]->bulan == "Oktober")?"selected":"";?>>Oktober</option>
                    <option value="Nopember" <?= ($keuangan[0]->bulan == "Nopember")?"selected":"";?>>Nopember</option>
                    <option value="Desember" <?= ($keuangan[0]->bulan == "Desember")?"selected":"";?>>Desember</option>
                </select>                
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <label class="card-title">Tahun</label>
            <div class="card-reg" style="margin: 0em;">
                <div class="card-body">
                <input type="number" class="form-control input-field" min="1900" max="2099" step="1" value="<?= $keuangan[0]->tahun?>" />
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
        <h1 style="font-size: 30px;">IKM Sumber Djaya Rahayu</h1 style="font-size: 50px;">
    </div>

    <div class="data-user">
        <div class="row">                        
            <table class="table table-striped" id="myTable-keuangan">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aktivitas/Keterangan</th>
                        <th scope="col">Debit (Rp)</th>
                        <th scope="col">Kredit (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry the Bird</td>
                        <td>tes</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <div class="col-lg-3 col-sm" style="border: 2px solid; border-color:#0B585A; border-radius: 10px; background: #FFFFFF;">
                    <div class="card-body">
                        <h5 class="card-text" style="text-align: center">Total Debit/Kredit (Rp): &nbsp; 10.400.200</h5>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
</main>

<script src="">
    $(document).ready(function() {
        let i = 0;
        $(".btn-focus").click(function() {
            i += 1;
            if (i % 2 == 1)
                $(".btn-focus").css('background', 'green');
            else {
                $(".btn-focus").css('background', 'red');
            }
        });
    });
</script>