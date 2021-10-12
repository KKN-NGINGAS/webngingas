<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Halaman Utama</li>
            <li class="breadcrumb-item active" aria-current="page">Produksi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Produksi</h1>

        <div id="button-tambah">
            <a style="text-decoration:none;color: white;" href="<?= base_url('produksi/tambah_operator');?>">
                <button type="button" class="btn btn-success">
                    <span data-feather="plus"></span>
                    Tambah
                </button>
            </a>
        </div>
        <!-- <span data-feather="bell"></span> -->
    </div>

    <div class="data-user">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Jenis Produk</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Jumlah Produksi</th>
                    <th scope="col">Total Produksi (Rp)</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    foreach($data_produksi as $row){
                    $i = $i + 1;
                    $time=strtotime($row->tanggal);
                    $month=date("F",$time);
                    $year=date("Y",$time);
                ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $month?></td>
                        <td><?= $year?></td>
                        <td><?= $row->jenis_produk?></td>
                        <td><?= $row->harga_satuan?></td>
                        <td><?= $row->jumlah_produksi?></td>
                        <td><?= $row->harga_satuan*$row->jumlah_produksi?></td>
                        <td>
                            <div>
                                <a href="<?= base_url('produksi/edit_operator/'.$row->id_data_produksi)?>">
                                    <img src="<?php echo base_url() ?>/assets/img/edit.png" alt="Edit" style="width: 30px; height: 30x">
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php
                    }              
                ?>
            </tbody>
        </table>
    </div>

</main>