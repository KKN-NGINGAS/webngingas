<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Halaman Utama</li>
      <li class="breadcrumb-item active" aria-current="page">Keuangan dan Akuntansi</li>
    </ol>
  </nav>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Keuangan dan Akuntansi</h1>

    <!-- <div id="button-tambah">                      
            <button type="button" class="btn btn-success">
              <span data-feather="plus"></span>
              Tambah
            </button>
          </div>
          <span data-feather="bell"></span> -->
  </div>

  <div class="data-user">

    <div class="alert alert-success align-items-center" role="alert">
      <div class="row justify-content-center">
        <!-- <p class="col" style="margin-bottom: 0px;">A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.</p> -->
        <p class="col text-center" style="margin-bottom: 0px;">Sebelum mengisi/merevisi laporan keuangan, DIMOHON untuk klik & melihat petunjuk di bawah ini</p>
        <a href="#" class="alert-link text-center" style="color: red;">Membuat laporan keuangan</a>
        <a href="#" class="alert-link text-center" style="color: red;">Merevisi laporan keuangan</a>
        <button type="button" class="col btn-close align-items-center" data-bs-dismiss="alert" aria-label="Close" style="right: 1%; position: absolute;"></button>
      </div>
    </div>

    <table class="table table-striped" id="myTable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Bulan</th>
          <th scope="col">Tahun</th>
          <th scope="col">Jenis Produk</th>
          <th scope="col">Jumlah Produksi</th>
          <th scope="col">Total Produksi (Rp)</th>
          <th scope="col">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Januari</td>
          <td>2021</td>
          <td>Mesin Sampah</td>
          <td>5</td>
          <td>10.000.000</td>
          <td>
            <div>
              <a href="#">
                <img src="<?php echo base_url() ?>assets/img/edit.png" alt="Edit" style="width: 30px; height: 30x">
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Januari</td>
          <td>2020</td>
          <td>Mesin Sampah</td>
          <td>69</td>
          <td>10.000.000</td>
          <td>
            <div>
              <a href="#">
                <img src="<?php echo base_url() ?>assets/img/edit.png" alt="Edit" style="width: 30px; height: 30x">
              </a>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Februari</td>
          <td>2021</td>
          <td>Mesin Sampah</td>
          <td>420</td>
          <td>10.000.000</td>
          <td>
            <div>
              <a href="#">
                <img src="<?php echo base_url() ?>assets/img/edit.png" alt="Edit" style="width: 30px; height: 30x">
              </a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</main>