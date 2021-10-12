<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Home</li>
      <li class="breadcrumb-item active" aria-current="page">Produksi</li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Data Produksi</li>
    </ol>
  </nav>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Tambah Data Produksi</h1>
    <span data-feather="bell"></span>
  </div>

  <!-- <div class="container-fluid centered"> -->
  <!-- <div class="card"> -->
  <div class="card-content">
    <div class="col-11 mx-auto">
      <form action="<?php echo base_url() . 'produksi/tambah_operator/insert'; ?>" method="post" class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;">
        <div class="mb-3">
          <label for="tanggal_produksi" class="form-label">Tanggal</label>
          <input type="date" class="form-control input-field" name="tanggal_produksi" id="tanggal_produksi" placeholder="Contoh: 15/09/20">
        </div>
        <div class="row">
          <div class="col-lg-6 mb-3">
            <!-- <label for="jenis_produksi" class="form-label">Jenis Produk</label>
            <select name="Pilih Jenis Produk" id="jenis_produksi" class="form-control input-field" placeholder="Confirm Password">
              <option class="dropdown-item disabled" value="Kosong">Pilih Jenis Produk</option>
              <option value="Mesin Kasir">Mesin Kasir</option>
              <option value="Mesin Pemanggang">Mesin Pemanggang</option>
              <option value="Mesin Sampah">Mesin Sampah</option>
            </select> -->

            <label for="harga_satuan_produksi" class="form-label">Jenis Produk</label>
            <input type="text" class="form-control input-field" name="jenis_produk" id="jenis_produk" placeholder="Contoh: Mesin Kasir, Mesin Sampah">


          </div>
          <div class="col-lg-6 mb-3">
            <!-- <label for="jenis_bahan_mentah_produksi" class="form-label">Jenis Bahan Mentah</label>
            <select name="Pilih Jenis Bahan Mentah" id="jenis_bahan_mentah_produksi" class="form-control input-field" placeholder="Confirm Password">
              <option class="dropdown-item disabled" value="Kosong">Pilih Jenis Bahan Mentah</option>
              <option value="Besi">Besi</option>
              <option value="Pasir">Pasir</option>
              <option value="Tanah">Tanah</option>
            </select> -->

            <label for="harga_satuan_produksi" class="form-label">Jenis Bahan Mentah</label>
            <input type="text" class="form-control input-field" name="jenis_bahan_mentah" id="jenis_bahan_mentah" placeholder="Sisipkan tanda koma jika lebih dari satu bahan">

          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-3">
            <label for="harga_satuan_produksi" class="form-label">Harga Satuan</label>
            <input type="text" class="form-control input-field" name="harga_satuan_produksi" id="harga_satuan_produksi" placeholder="Contoh: 69.000">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="jumlah_produksi" class="form-label">Jumlah Produksi</label>
            <input type="text" class="form-control input-field" name="jumlah_produksi" id="jumlah_produksi" placeholder="Contoh: 10">
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