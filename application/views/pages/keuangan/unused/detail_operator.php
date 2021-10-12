<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Halaman Utama</li>
            <li class="breadcrumb-item active" aria-current="page">Keuangan dan Akuntansi</li>
            <li class="breadcrumb-item active" aria-current="page">Informasi Detail</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Informasi Detail</h1>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
        <h1 style="font-size: 30px;"><?= $data_ikm[0]->nama_ikm ?></h1 style="font-size: 50px;">
    </div>

    <div class="data-user">
        <div class="row">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">ID Detail</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aktivitas/Keterangan</th>
                        <th scope="col">Pemasukan (Rp)</th>
                        <th scope="col">Pengeluaran (Rp)</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $laba = 0;
                    foreach ($detail_laporan_keuangan as $detail) {
                    ?>
                        <tr>
                            <td><?= $detail->id_detail?></td>
                            <td><?= $detail->tanggal ?></td>
                            <td><?= $detail->aktivitas ?></td>
                            <td>
                                <?php
                                echo $detail->pemasukan;
                                $laba = $laba + $detail->pemasukan;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $detail->pengeluaran;
                                $laba = $laba - $detail->pengeluaran;
                                ?>
                            </td>
                            <td>
                                <div>
                                    <a href="<?= base_url('keuangan/edit_detail_operator/'.$laporan_keuangan[0]->id_laporan.'/'.$detail->id_detail)?>">
                                        <img src="<?php echo base_url() ?>assets/img/edit.png" alt="Edit" style="width: 30px; height: 30x">
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a href="<?= base_url('keuangan/delete_detail_operator/'.$laporan_keuangan[0]->id_laporan.'/'.$detail->id_detail)?>">
                                        <img src="<?php echo base_url() ?>assets/img/delete.png" alt="Delete" style="width: 30px; height: 30x">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>            

            <div class="d-flex justify-content-between">
                <div class="col-lg-3 col-sm" style="margin-top: 10px;">
                    <div id="button-tambah">
                        <button type="button" class="btn btn-success">
                            <span data-feather="plus"></span>
                            <a href="<?= base_url('keuangan/tambah_detail_operator/'.$laporan_keuangan[0]->id_laporan) ?>">
                                <span style="color: white;">Tambah Detail Laporan</span>

                            </a>
                        </button>
                    </div>
                </div>
                <div class="col-lg-3 col-sm" style="border: 2px solid; border-color:#0B585A; border-radius: 10px; background: #FFFFFF;">
                    <div class="card-body">
                        <h5 class="card-text" style="text-align: center">
                            Laba (Rp): &nbsp;
                            <?php
                            if ($laba) {
                                echo $laba;
                            }
                            ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="">
    $(document).ready(function() {
        let i = 0;
        $(".btn-focus").click(function() {
            i += 1;
            if (i % 2 == 1)
                $(".btn-focus").css('background', 'green');
            else {
                $(".btn-focus").css('background', 'red');
            }
        });
    });
</script>