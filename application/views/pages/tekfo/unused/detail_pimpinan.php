<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Halaman Utama</li>
            <li class="breadcrumb-item active" aria-current="page">Teknologi Informasi</li>
            <li class="breadcrumb-item active" aria-current="page">Informasi Detail</li>
        </ol>
    </nav>

    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Teknologi Informasi</h1>
            <!-- <span data-feather="bell"></span> -->
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
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
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
        <p>Berisi data inventaris yang dimiliki oleh masing-masing IKM</p>
    </div class="">

    <!-- <div class="container-fluid centered"> -->
    <!-- <div class="card"> -->
    <div class="card-content">
        <div class="col-11 mx-auto">

            <div class="col-6 mx-auto" style="float: left;">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>Tanggal</td>
                            <td>: 17/09/2021</td>
                        </tr>
                        <tr>
                            <td>Jenis Produk</td>
                            <td>: Mesin Sampah</td>
                        </tr>
                        <tr>
                            <td>Jenis Bahan Mentah</td>
                            <td>: Tanah</td>
                        </tr>
                        <tr>
                            <td>Harga Satuan</td>
                            <td>: 100.000</td>
                        </tr>
                        <tr>
                            <td>Kuantitas (Kg)</td>
                            <td>: 6</td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <!-- </div> -->
    <!-- </div> -->

</main>