<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/data_sdm' ?>">Sumber Daya Manusia</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Sumber Daya Manusia</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Detail Karyawan</h1>
        <!-- <span data-feather="bell"></span> -->
    </div>
    <div class="card-content" style="padding-top:2rem;">
        <?php foreach ($sdm as $row) { ?>
            <table style="text-align: left;">
                <tr>
                    <td width="15%">Nama</td>
                    <td width="5%">:</td>
                    <td width="60%"><?= $row->nama_karyawan ?></td>
                </tr>
                <tr>
                    <td>Nik</td>
                    <td>:</td>
                    <td><?= $row->nik ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $row->kelamin ?></td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td>:</td>
                    <td><?= $row->no_telp ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?= $row->email ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $row->alamat ?></td>
                </tr>
            </table>
            <?php if (in_array($this->session->userdata('role'), array('admin_ikm', 'operator_ikm'))) { ?>
                <div class="row" style="padding-top:3rem;">
                    <div class="col-3 mb-3">
                        <a href="<?= base_url('edit/').$row->id_karyawan ?>" class="form-control button-yellow" style="justify-content: center;">Ubah Informasi</a>
                    </div>
                    <!-- <div class="col-3 mb-3">
                        <a href="<?= base_url('edit/').$row->id_karyawan ?>" class="form-control button-yellow" style="justify-content: center;">Reset Password</a>
                    </div> -->
                </div>
                <?php 
            }
        } ?>
    </div>

</main>