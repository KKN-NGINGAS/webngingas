<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Halaman Utama</li>
      <li class="breadcrumb-item active" aria-current="page">Keuangan dan Akuntansi</li>
    </ol>
  </nav>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Keuangan dan Akuntansi</h1>

    <div id="button-tambah">                      
            <button type="button" class="btn btn-success">
              <span data-feather="plus"></span>
              <a href="<?php echo base_url('keuangan/tambah_operator') ?>">
                <span style="color: white;">Tambah Laporan</span>  
              
            </a>              
            </button>
          </div>
          <!-- <span data-feather="bell"></span> -->
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
          <th scope="col">Total Pengeluaran/Pemasukan (Rp)</th>
          <th scope="col">Nama IKM</th>
          <th scope="col">Edit</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = -1;
          foreach($laporan_keuangan as $keuangan){          
          $i++;
          $time=strtotime($keuangan->tanggal);
          $month=date("F",$time);
          $year=date("Y",$time);
        ?>
          <tr>
            <th scope="row"><?= $keuangan->id_laporan?></th>
            <td><?= $month?></td>
            <td><?= $year?></td>
            <td><?= $keuangan->laba?></td>
            <td><?= $laporan_keuangan_2[$i]->nama_ikm?></td>          
            <td>
              <div>
                <a target="_blank" href="<?= base_url('keuangan/detail_operator/'.$keuangan->id_laporan)?>">
                  <img src="<?php echo base_url() ?>assets/img/edit.png" alt="Edit" style="width: 30px; height: 30x">
                </a>
              </div>
            </td>
          </tr>
        <?php
          }        
        ?>
      </tbody>
    </table>    

    <!-- <button type="button" onclick="myFunction()">Try it</button> -->

    <!-- <script>
      function myFunction() {
        var table = document.getElementById("myTable");
        var row = table.insertRow(3);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        cell1.innerHTML = "NEW CELL1";
        cell2.innerHTML = "NEW CELL2";
        cell3.innerHTML = "NEW CELL3";
        cell4.innerHTML = "NEW CELL4";
        cell5.innerHTML = "NEW CELL5";
        cell6.innerHTML = "NEW CELL6";
      }
    </script> -->
  </div>

</main>