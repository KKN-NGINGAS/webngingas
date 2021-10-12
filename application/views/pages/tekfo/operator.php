

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
                <a style="text-decoration:none;color: white;" href="<?= base_url('tekfo/tambah_operator')?>">
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
                    <th scope="col">Total Barang</th>
                    <th scope="col">Sumber Dana</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    foreach($teknologi_informasi as $ti)
                    {                                            
                ?>
                        <tr>
                            <th scope="row"><?= $i + 1?></th>
                            <td><?= $ti->nama_barang?></td>
                            <td><?= $ti->tipe_barang?></td>
                            <td><?= $teknologi_informasi_join[$i]->total_barang?></td>
                            <td><?= $ti->sumber_dana?></td>
                            <td>
                                <div>
                                    <a href="<?= base_url('tekfo/edit_operator/'.$ti->id_ti)?>">
                                        <img src="<?php echo base_url()?>/assets/img/edit.png" alt="Edit" style="width: 30px; height: 30x">
                                    </a>
                                </div>
                            </td>                            
                            <td>
                                <div>
                                    <a href="<?= base_url('tekfo/delete_operator/'.$ti->id_ti)?>">
                                        <img src="<?php echo base_url() ?>assets/img/delete.png" alt="Delete" style="width: 30px; height: 30x">
                                    </a>
                                </div>
                            </td>
                        </tr>
                <?php
                    $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>

</main>