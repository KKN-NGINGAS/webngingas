<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pendataan Aset</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Pendataan Aset</h1>
        <div>
            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                <a class="btn btn-success" href="<?= base_url().'MainController/tambah_tekfo' ?>" style="text-decoration: none; color: white;">Tambah Data</a>
            <?php } ?>
        </div>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-<?= $alert ?>" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="data-user">
        <table class="table" id="myTable">
            <thead>
                <tr class="bg-green">
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tipe/Merk</th>
                    <th scope="col">Sumber Dana</th>
                    <th scope="col">Kondisi Barang</th>
                    <th scope="col">Total Barang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($teknologi as $row) { 
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->nama_barang ?></td>
                        <td><?= $row->tipe_merk ?></td>
                        <td><?= $row->sumber_dana ?></td>
                        <td style="text-align: left;"><?= $row->kondisi_baik.' Baik</br>'.$row->kondisi_kurang.' Kurang Baik</br>'.$row->kondisi_buruk.' Buruk' ?></td>
                        <td><?= $row->kondisi_baik + $row->kondisi_kurang + $row->kondisi_buruk ?></td>
                        <td>
                            <a class="btn btn-info" href="<?= base_url().'MainController/detail_tekfo/'.$row->id_tekfo ?>" style="text-decoration: none; color: white;">Info Detail</a>
                            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                                <a class="btn btn-danger" href="<?= base_url().'MainController/delete_tekfo/'.$row->id_tekfo ?>" style="text-decoration: none; color: white;">Hapus Data</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</main>