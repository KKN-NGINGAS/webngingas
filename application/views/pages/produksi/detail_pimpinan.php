<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Home</li>
      <li class="breadcrumb-item active" aria-current="page">Produksi</li>
      <li class="breadcrumb-item active" aria-current="page">Informasi Detail</li>
    </ol>
  </nav>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Informasi Detail</h1>
    <div>
      <!-- <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" id="tambahkomen"><a href="#" style="text-decoration: none; color: white;">Tambahkan Komentar</button> -->
      <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambahkan Komentar</button>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="box-shadow: 0px 1px 33px #56E7E0;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Beri Komentar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Judul:</label>
                  <input type="text" class="form-control input input-field" id="judulkomen">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Keterangan:</label>
                  <textarea class="form-control input-field" id="ketkomen"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                Batal
              </button>
              <button type="button" class="btn btn-success" type="submit" name="submit" value="Submit" data-bs-target="#berhasil" data-bs-toggle="modal" data-bs-dismiss="modal">
                Ajukan
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="berhasil" tabindex="-1" aria-labelledby="berhasil" aria-hidden="true">
        <div class="modal-dialog" style="box-shadow: 0px 1px 33px #56E7E0; border-radius: 20px;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <p class="col-form-label">Pengajuan komentar anda berhasil</p>
              </div>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="row" style="margin-bottom: 20px;">
    <div class="col-lg-3">
      <label class="card-title">ID</label>
      <div class="card-reg" style="margin: 0em;">
        <div class="card-body">
          <h5 class="card-text">69420</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <label class="card-title">Metode Pengisian</label>
      <div class="card-reg" style="margin: 0em;">
        <div class="card-body">
          <h5 class="card-text">Excel</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <label class="card-title">Bulan</label>
      <div class="card-reg" style="margin: 0em;">
        <div class="card-body">
          <h5 class="card-text">September</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <label class="card-title">Tahun</label>
      <div class="card-reg" style="margin: 0em;">
        <div class="card-body">
          <h5 class="card-text">2021</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 style="font-size: 30px;">IKM Sumber Djaya Rahayu</h1 style="font-size: 50px;">
  </div>

  <div class="data-user">
    <p>
      <a class="btn btn-success btn-focus" data-bs-toggle="collapse" href="#multiCollapseExample1" autocomplete="off" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">Laporan Debit/Kredit</a>
      <button class="btn btn-success btn-focus" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Diagram</button>
      <!-- <button class="btn btn-success btn-focus" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Semua</button> -->
    </p>
    <div class="row">
      <div class="">
        <div class="collapse multi-collapse" id="multiCollapseExample1">
          <table class="table table-striped" id="myTable">
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

      <div class="">
        <div class="collapse multi-collapse" id="multiCollapseExample2">
          <div class="card-body">
            <img src="assets/img/rekap.png">
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