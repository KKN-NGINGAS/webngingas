<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/pemasaran' ?>">Pemasaran dan Periklanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Data Transaksi</h1>
        <div>
            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                <a class="btn btn-success" href="<?= base_url().'MainController/tambah_transaksi' ?>" style="text-decoration: none; color: white;">Tambah Transaksi</a>
            <?php } ?>
        </div>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-<?= $alert ?>" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <table cellspacing="5" cellpadding="5" border="0">
        <tbody>
            <tr>
                <td>Minimum date:</td>
                <td><input type="text" id="min" name="min"></td>
                <td>Maximum date:</td>
                <td><input type="text" id="max" name="max"></td>
            </tr>
        </tbody>
    </table>

    <div class="data-user">
        <table class="table" id="myTable">
            <thead>
                <tr class="bg-green">
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">No. Transaksi</th>
                    <?php if (!in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                        <th scope="col">Nama IKM</th>
                    <?php } ?>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($transaksi as $row) {
                    $time = strtotime($row->tanggal);
                    $tgl = date("j F Y",$time); ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $tgl ?></td>
                        <td><?= $row->no_transaksi ?></td>
                        <?php if (!in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                        <td><?= $row->nama_ikm ?></td>
                    <?php } ?>
                        <td><?= $row->nama_perusahaan ?></td>
                        <td><?= "Rp " . number_format($row->total,2,',','.'); ?></td>
                        <td><a class="btn btn-info" href="<?= base_url().'MainController/detail_transaksi/'.$row->id_transaksi ?>" style="text-decoration: none; color: white;">Info Detail</a>
                            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                                <a class="btn btn-danger" href="<?= base_url().'MainController/delete_transaksi/'.$row->id_transaksi ?>" style="text-decoration: none; color: white;">Hapus Transaksi</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

</main>