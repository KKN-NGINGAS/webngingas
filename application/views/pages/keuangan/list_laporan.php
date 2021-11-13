<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keuangan dan Akuntansi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Data Keuangan dan Akuntansi</h1>
        <div>
            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                <a class="btn btn-success" href="<?= base_url().'MainController/tambah_laporan' ?>" style="text-decoration: none; color: white;">Tambah Laporan</a>
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
                    <th scope="col">Bulan</th>
                    <?php if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) { ?>
                        <th scope="col">Nama Ikm</th>
                    <?php } ?>
                    <th scope="col">Total Keuntungan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($keuangan as $row) { 
                    // $time=strtotime($row->tanggal);
                    // $month=date("F Y",$time);
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->tanggal ?></td>
                        <?php if (in_array($this->session->userdata('role'), array('admin_bumdes','pimpinan_bumdes'))) { ?>
                            <td><?= $row->nama_ikm ?></td>
                        <?php } ?>
                        <td><?= (is_null($row->total)) ? 'Rp 0,00' : 'Rp ' . number_format($row->total,2,',','.') ?></td>
                        <td><a class="btn btn-info" href="<?= base_url().'MainController/detail_laporan/'.$row->id_laporan ?>" style="text-decoration: none; color: white;">Detail Laporan</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</main>