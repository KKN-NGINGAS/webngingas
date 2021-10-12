<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Home</li>
      <li class="breadcrumb-item active" aria-current="page">Keuangan</li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Data Keuangan</li>
    </ol>
  </nav>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Tambah Data Keuangan</h1>
    <span data-feather="bell"></span>
  </div>

  <!-- <div class="container-fluid centered"> -->
  <!-- <div class="card"> -->
  <div class="card-content">
    <div class="col-11 mx-auto">
      <form action="<?php echo base_url() . 'keuangan/tambah_operator_insert'; ?>" method="post" class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;">
        <div class="mb-3">
          <label for="id_ikm" class="form-label">Nama IKM</label>
          <!-- <input type="text" class="form-control input-field" name="nama_ikm_keuangan" id="nama_ikm_keuangan" placeholder="Input Nama IKM"> -->
          <select id="id_ikm" name="id_ikm" class="form-control input-field">
              <?php
                foreach($data_ikm as $ikm){
              ?>
                <option value=<?= $ikm->id_ikm?>><?= $ikm->nama_ikm?></option>
              <?php
                }
              ?>              
            </select>
        </div>
        <div class="mb-3">
          <label for="tanggal_keuangan" class="form-label">Tanggal Pembuatan Laporan</label>
          <input type="date" class="form-control input-field" name="tanggal_keuangan" id="tanggal_keuangan">
        </div>
        <!-- <div class="row">
          <div class="col-lg-6 mb-3">
            <label for="bulan_keuangan" class="form-label">Bulan</label>
            <select id="bulan_keuangan" name="bulan_keuangan" class="form-control input-field">
              <option value="Januari">Januari</option>
              <option value="Februari">Februari</option>
              <option value="Maret">Maret</option>
              <option value="April">April</option>
              <option value="Mei">Mei</option>
              <option value="Juni">Juni</option>
              <option value="Juli">Juli</option>
              <option value="Agustus">Agustus</option>
              <option value="September">September</option>
              <option value="Oktober">Oktober</option>
              <option value="Nopember">Nopember</option>
              <option value="Desember">Desember</option>
            </select>
          </div>
          <div class="col-lg-6 mb-3">

            <label for="tahun_keuangan" class="form-label">Tahun</label>
            <input type="number" id="tahun_keuangan" name="tahun_keuangan" class="form-control input-field" min="1900" max="2099" step="1" value="2021" />

          </div>
        </div> -->
        <!-- <div class="row">
          <div class="col-lg-6 mb-3">
            <label for="harga_satuan_produksi" class="form-label">Harga Satuan</label>
            <input type="text" class="form-control input-field" name="harga_satuan_produksi" id="harga_satuan_produksi" placeholder="Contoh: 69.000">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="jumlah_produksi" class="form-label">Jumlah Produksi</label>
            <input type="text" class="form-control input-field" name="jumlah_produksi" id="jumlah_produksi" placeholder="Contoh: 10">
          </div>
        </div> -->
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