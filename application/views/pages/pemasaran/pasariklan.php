<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pemasaran dan Periklanan</li>
    </ol>
  </nav>
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Pemasaran dan Periklanan</h1>
  </div>          

  <div class="row">
      <div class="col-lg-3 card" style="background: #E7F7F2;">
          <a href="<?= base_url().'MainController/data_transaksi'?>" style="position: sticky;top: 50%;"><div class="card-body">
              <img class="mx-auto d-block" src="<?= base_url()?>/assets/img/transaksi.png" style="margin-top: 20px;margin-bottom: 20px;">
              <p class="card-text text-center" style="margin-bottom: 20px;">Data Transaksi</p>
          </div></a>
      </div>
      <div class="col-lg-3 card" style="background: #E7F7F2;">
          <a href="<?= base_url().'MainController/data_produk'?>" style="position: sticky;top: 50%;"><div class="card-body">
              <img class="mx-auto d-block" src="<?= base_url()?>/assets/img/produk.png" style="margin-top: 20px;margin-bottom: 20px;">
              <p class="card-text text-center" style="margin-bottom: 20px;">Data Produk</p>
          </div></a>
      </div>
  </div>

</main>
     