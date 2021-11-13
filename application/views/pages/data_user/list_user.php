<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data User</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Data User</h1>
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
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($data_sdm as $row) { ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= ucwords($row->nik) ?></td>
                        <td><?= ucwords($row->nama_karyawan) ?></td>
                        <td><?= $row->username ?></td>
                        <?php if ($row->id_user == $this->session->userdata('id_user')) { ?>
                            <td>
                                <a class="btn btn-info" href="<?= base_url().'MainController/pengaturan' ?>" style="text-decoration: none; color: white;">Pengaturan Akun</a>                                
                            </td>
                        <?php } else if ($row->username == '') { ?>
                            <td>
                                <a class="btn btn-success" href="<?= base_url().'MainController/add_user/'.$row->id_karyawan ?>" style="text-decoration: none; color: white;">Buat Akun</a>
                            </td>
                        <?php } elseif (in_array($row->role, array('pimpinan_ikm', 'admin_ikm'))) { ?>
                            <td>
                                Hanya bisa diatur oleh pemilik akun
                            </td>
                        <?php } else { ?>
                            <td>
                                <a class="btn btn-warning" href="<?= base_url().'MainController/reset_user/'.$row->id_user ?>" style="text-decoration: none; color: white;">Reset Password</a>
                                <a class="btn btn-danger" href="<?= base_url().'MainController/delete_user/'.$row->id_user ?>" style="text-decoration: none; color: white;">Hapus Akun</a>
                            </td>
                        <?php } ?>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

</main>