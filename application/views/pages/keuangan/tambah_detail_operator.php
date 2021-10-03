<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Home</li>
      <li class="breadcrumb-item active" aria-current="page">Keuangan</li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Detail Laporan Keuangan</li>
    </ol>
  </nav>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Tambah Detail Laporan Keuangan</h1>
    <span data-feather="bell"></span>
  </div>

  <!-- <div class="container-fluid centered"> -->
  <!-- <div class="card"> -->
  <div class="card-content">
    <div class="col-11 mx-auto">
      <form action="<?php echo base_url() . 'keuangan/tambah_detail_operator_insert/'.$laporan_keuangan[0]->id_laporan; ?>" method="post" class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;">
        <div class="mb-3">
          <label for="aktivitas" class="form-label">Kegiatan/Aktivitas</label>
          <input type="text" class="form-control input-field" name="aktivitas" id="aktivitas" placeholder="Input Kegiatan/Aktivitas">
        </div>
        <div class="mb-3">
          <label for="tanggal_detail_keuangan" class="form-label">Tanggal Detail Laporan</label>
          <input type="date" class="form-control input-field" name="tanggal_detail_keuangan" id="tanggal_detail_keuangan">
        </div>        
        <div class="row">
          <div class="col-lg-6 mb-3">
            <label for="pemasukan" class="form-label">Pemasukan</label>
            <input type="text" class="form-control input-field" name="pemasukan" id="pemasukan" placeholder="Contoh: 69.000">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="pengeluaran" class="form-label">Pengeluaran</label>
            <input type="text" class="form-control input-field" name="pengeluaran" id="pengeluaran" placeholder="Contoh: 69.000">
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
  <!-- </div> -->
  <!-- </div> -->

</main>