<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/data_laporan' ?>">Keuangan dan Akuntansi </a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Laporan</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-lg-6">
            <h2>Detail Laporan <?= $title ?></h2>
        </div>
        <div class="col-lg-3" style="border: 2px solid; border-color:#0B585A; border-radius: 10px; background: #FFFFFF;">
            <div class="card-body">
                <h5 class="card-text" style="text-align: center">
                    Laba (Rp): 
                    <?php
                    if ($total < 0) {
                        echo $total;
                    } else if ($total > 0) {
                        echo $total;
                    }
                    ?>
                </h5>
            </div>
        </div>
        <div class="col-lg-2">
            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                <a class="btn btn-success" href="<?= base_url().'MainController/tambah_data_keuangan/'.$id_laporan ?>" style="text-decoration: none; color: white;">Tambah Data</a>
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
                    <th scope="col">Keterangan</th>
                    <th scope="col">Pemasukan (Rp)</th>
                    <th scope="col">Pengeluaran (Rp)</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($keuangan as $row) { 
                    $time = strtotime($row->tanggal);
                    $tgl = date("j F Y",$time);
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $tgl ?></td>
                        <td style="text-align: left;"><?= $row->aktivitas ?></td>
                        <td><?= $row->pemasukan ?></td>
                        <td><?= $row->pengeluaran ?></td>
                        <td>
                            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                                <a class="btn btn-warning" href="<?= base_url().'MainController/ubah_keuangan/'.$row->id_laporan.'/'.$row->id_detail ?>" style="text-decoration: none; color: white;">Ubah Data</a>
                            <?php } else {
                                echo "-";
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</main>