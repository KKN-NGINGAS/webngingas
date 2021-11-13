<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title><?= $title ?></title>

    <!-- <link href="/css/jquery-ui.css" rel="stylesheet"> -->
    
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Datepicker -->
    <link href="<?= base_url() ?>assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">

    <link href="<?= base_url() ?>assets/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
  </head>
  <body>

    <header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
      <button class="navbar-toggler position-absolute d-md-none collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
          <div class="row">
            <div class="col-lg-6 col-sm-4 mx-auto">
              <img class="logo-sidebar" src="<?= base_url()?>/assets/img/Logo.png">
            </div>
          </div>
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?= ($page == 'dashboard') ? 'active' : '' ?>" aria-current="page" href="<?= base_url() ?>">
                  <span data-feather="home"></span>
                  Halaman Utama
                </a>
              </li>
              <?php if (in_array($this->session->userdata('role'), array('admin_ikm'))) { ?>
                <li class="nav-item">
                  <a class="nav-link <?= ($page == 'data user') ? 'active' : '' ?>" href="<?= base_url().'MainController/data_user' ?>">
                    <span data-feather="user"></span>
                    Data User
                  </a>
                </li>
              <?php } ?>
              <?php if ($this->session->userdata('role') == 'admin_bumdes') { ?>
                <li class="nav-item">
                  <a class="nav-link <?= ($page == 'data master') ? 'active' : '' ?>" href="<?= base_url().'MainController/data_master' ?>">
                    <span data-feather="database"></span>
                    Data Master
                  </a>
                </li>
              <?php } ?>
              <li class="nav-item">
                <a class="nav-link <?= ($page == 'pemasaran') ? 'active' : '' ?>" href="<?= base_url().'MainController/pemasaran' ?>">
                  <span data-feather="shopping-bag"></span>
                  Pemasaran dan Periklanan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($page == 'pelayanan') ? 'active' : '' ?>" href="<?= base_url().'MainController/pelayanan_konsumen' ?>">
                  <span data-feather="heart"></span>
                  Pelayanan Konsumen
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($page == 'keuangan') ? 'active' : '' ?>" href="<?= base_url('MainController/data_laporan')?>">
                  <span data-feather="dollar-sign"></span>
                  Keuangan dan Akuntansi
                </a>
              </li>
            </ul>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link <?= ($page == 'sdm') ? 'active' : '' ?>" href="<?= base_url().'MainController/data_sdm' ?>">
                  <span data-feather="users"></span>
                  Sumber Daya Manusia
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($page == 'produksi') ? 'active' : '' ?>" href="<?= base_url().'MainController/data_produksi' ?>">
                  <span data-feather="package"></span>
                  Produksi
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($page == 'tekfo') ? 'active' : '' ?>" href="<?= base_url().'MainController/data_tekfo' ?>">
                  <span data-feather="monitor"></span>
                  Teknologi Informasi
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($page == 'pengaturan') ? 'active' : '' ?>" href="<?= base_url().'MainController/pengaturan' ?>">
                  <span data-feather="settings"></span>
                  Pengaturan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url().'Logout' ?>">
                  <span data-feather="power"></span>
                  Keluar
                </a>
              </li>
            </ul>
          </div>
        </nav>