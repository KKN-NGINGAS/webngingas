<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Halaman Utama</li>
            <li class="breadcrumb-item active" aria-current="page">Teknologi Informasi</li>
        </ol>
    </nav>

    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Teknologi Informasi</h1>
            <div id="button-tambah">
                <a style="text-decoration:none;color: white;" href="#">
                    <button type="button" class="btn btn-success">
                        <span data-feather="plus"></span>
                        Tambah Data
                    </button>
                </a>
            </div>
            <!-- <span data-feather="bell"></span> -->
        </div>
        <p>Berisi data inventaris yang dimiliki oleh masing-masing IKM</p>
    </div class="">

    <div class="data-user">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tipe/Merk/Label</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Sumber Dana</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>IMK</td>
                    <td></td>
                    <td>
                        <div>
                            <a href="#">
                                <img src="<?php echo base_url()?>/assets/img/edit.png" alt="Edit" style="width: 30px; height: 30x">
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>IMK</td>
                    <td></td>
                    <td>
                        <div>
                            <a href="#">
                                <img src="<?php echo base_url()?>/assets/img/edit.png" alt="Edit" style="width: 30px; height: 30x">
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>tes</td>
                    <td>@twitter</td>
                    <td>IMK</td>
                    <td></td>
                    <td>
                        <div>
                            <a href="#">
                                <img src="<?php echo base_url()?>/assets/img/edit.png" alt="Edit" style="width: 30px; height: 30x">
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</main>