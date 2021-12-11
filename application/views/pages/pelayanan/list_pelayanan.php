<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pelayanan Konsumen</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Data Pelanggan</h1>
        <div>
            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                <a class="btn btn-success" href="<?= base_url().'MainController/tambah_konsumen' ?>" style="text-decoration: none; color: white;">Tambah Data Pelanggan</a>
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
                    <?php if (!in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm', 'pimpinan_ikm'))) { ?>
                        <th scope="col">Nama IKM</th>
                    <?php } ?>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Nama Pemilik</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Email/No. Telp</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($pelayanan as $row) { ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <?php if (!in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm', 'pimpinan_ikm'))) { ?>
                            <td><?= $row->nama_ikm ?></td>
                        <?php } ?>
                        <td><?= ucwords($row->nama_perusahaan) ?></td>
                        <td><?= ucwords($row->nama_pemilik) ?></td>
                        <td><?= ucwords($row->alamat_perusahaan) ?></td>
                        <td><?= $row->email_perusahaan.' / '.$row->telp_perusahaan ?></td>
                        <td><a class="btn btn-info" href="<?= base_url().'MainController/detail_konsumen/'.$row->id_perusahaan ?>" style="text-decoration: none; color: white;">Info Detail</a>
                            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                                <a class="btn btn-danger" href="<?= base_url().'MainController/delete_konsumen/'.$row->id_perusahaan ?>" style="text-decoration: none; color: white;">Hapus Data</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

</main>