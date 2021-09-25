<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Master</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Data Master</h1>
        <div>
            <a class="btn btn-success" href="<?= base_url().'AdminBumdes/tambah_ikm' ?>" style="text-decoration: none; color: white;">Tambah Data</a>
            <!-- <span data-feather="bell"></span> -->
        </div>
    </div>

    <div class="data-user">
        <table class="table" id="myTable">
            <thead>
                <tr class="bg-green">
                    <th scope="col" width="5%">No</th>
                    <th scope="col">Nama IKM</th>
                    <th scope="col">Nama Ketua</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($data_ikm as $row) { ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= ucwords($row->nama_ikm) ?></td>
                        <td><?= ucwords($row->nama_karyawan) ?></td>
                        <td><?= $row->no_telp_ikm ?></td>
                        <td><a class="btn btn-warning" href="<?= base_url().'AdminBumdes/detail_ikm/'.$row->id_ikm ?>" style="text-decoration: none; color: white;">Info Detail</a></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

</main>