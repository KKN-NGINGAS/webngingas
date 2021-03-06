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


    <p><i>Pastikan memilih tanggal 1 ketika melakukan filter</i></p>
    <p><i>Lakukan refresh setiap kali melakukan filter pencarian tanggal</i></p>
    <table cellspacing="5" cellpadding="5" border="0">
        <tbody>
            <tr>
                <td>Minimum date:</td>
                <td><input type="text" id="min_keuangan" name="min_keuangan"></td>
                <td>Maximum date:</td>
                <td><input type="text" id="max_keuangan" name="max_keuangan"></td>
            </tr>
        </tbody>
    </table>

    <div class="data-user">
        <table class="table" id="myTable_keuangan">
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
                        <td>15 <?= $row->tanggal ?></td>
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