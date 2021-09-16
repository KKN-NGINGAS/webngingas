<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.87.0">
  <title>Dashboard Template · Bootstrap v5.1</title>
  
  <script src="//code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
  <script src="/js/jquery-ui.min.js" type="text/javascript"></script>    
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" type="text/javascript"></script>    
  <link href="/css/jquery-ui.css" rel="stylesheet">    
  <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

  <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
  </script>
  
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url()?>/assets/css/main.css" rel="stylesheet">    


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
            <img class="logo-sidebar" src="<?php echo base_url()?>/assets/img/Logo.png">
          </div>
        </div>
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">
                <span data-feather="home"></span>
                Halaman Utama
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Data User
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Data Master
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Pemasaran dan Periklanan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Pelayanan Konsumen
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Keuangan dan Akuntansi
              </a>
            </li>
          </ul>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Sumber Daya Manusia
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="file-text"></span>
                Produksi
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Teknologi Informasi
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Pengaturan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Keluar
              </a>
            </li>
          </ul>
        </div>
      </nav>