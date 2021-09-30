<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data User</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Data User</h1>
        <div>
            <a class="btn btn-success" href="<?= base_url().'MainController/tambah_user' ?>" style="text-decoration: none; color: white;">Buat User</a>
            <!-- <span data-feather="bell"></span> -->
        </div>
    </div>

    <div class="data-user">
        <table class="table" id="myTable">
            <thead>
                <tr class="bg-green">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Nama IKM</th>
                    <th scope="col">Akun</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($listUser as $row) { ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->nama_karyawan ?></td>
                        <td><?= $row->username ?></td>
                        <td>
                            <?php echo ($row->role == 'pimpinan_ikm') ? 'Pimpinan IKM' : (($row->role == 'admin_ikm') ? 'Admin IKM' : (($row->role == 'operator_ikm') ? 'Operator IKM' : '-')) ?>
                        </td>
                        <td><?= $row->id_ikm ?></td>
                        <td><a class="btn btn-warning" href="<?= base_url().'MainController/detail_user/'.$row->id_user ?>" style="text-decoration: none; color: white;">Info Detail</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</main>