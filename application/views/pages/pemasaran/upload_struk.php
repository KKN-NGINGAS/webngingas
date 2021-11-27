<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Halaman Utama</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url().'MainController/pemasaran' ?>">Pemasaran dan Periklanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Upload Bukti Transaksi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Upload Bukti Transaksi</h1>
    </div>

    <?php if ($msg != '') { ?>
        <div class="alert alert-<?= $alert ?>" role="alert">
            <?= $msg ?>
        </div>
    <?php } ?>

    <div class="card-content">
        <div class="col-11 mx-auto">
            <!-- <button onclick="clearImage()" class="btn btn-primary mt-3">Click me</button> -->
            <form action="<?php echo base_url() . 'MainController/input_struk/'.$id_transaksi; ?>" method="post" class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;" enctype="multipart/form-data">
                <div class="row">
                    <div class="container col-md-8">
                        <div class="mb-5">
                            <!-- <label for="Image" class="form-label">Bootstrap 5 image Upload with Preview</label> -->
                            <input class="form-control" type="file" id="formfile" name="formfile" onchange="preview()">
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-6 mb-3">
                        <input class="form-control button-red" style="justify-content: center;" type="reset" name="reset" value="Reset" onclick="clearImage()">
                    </div>
                    <div class="col-6 mb-3">
                        <input class="form-control button-yellow" style="justify-content: center;" type="submit" name="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 mx-auto">
            <img id="frame" src="" class="img-fluid" width="100%" />
        </div>
    </div>

</main>

<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    function clearImage() {
        document.getElementById('formfile').value = null;
        frame.src = "";
    }
</script>