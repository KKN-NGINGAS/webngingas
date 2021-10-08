<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Produksi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Data Produksi</h1>
        <div>
            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                <a class="btn btn-success" href="<?= base_url().'MainController/tambah_produksi' ?>" style="text-decoration: none; color: white;">Tambah Data Produksi</a>
            <?php } ?>
        </div>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-success" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="data-user">
        <table class="table" id="myTable">
            <thead>
                <tr class="bg-green">
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah Produksi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($produksi as $row) { 
                    $time=strtotime($row->tanggal);
                    $month=date("j F Y",$time);
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $month ?></td>
                        <td><?= $row->nama_produk ?></td>
                        <td><?= $row->jumlah_produksi ?></td>
                        <td><a class="btn btn-warning" href="<?= base_url().'MainController/detail_produksi/'.$row->id_data_produksi ?>" style="text-decoration: none; color: white;">Info Detail</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</main>