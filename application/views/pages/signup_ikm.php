<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/css/main.css">

    <title>Bumdes Ngingas</title>
</head>

<body id="loginPage">
    <div class="container-fluid centered">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card-form">
                    <div class="card-content">
                        <div class="row center-item">
                            <div class="col-3 ms-auto">
                                <img class="logo" src="<?php echo base_url()?>/assets/img/Logo.png">
                            </div>
                            <div class="col-8">
                                <h2>NGINGAS DASHBOARD <br>Daftar untuk IKM</h2>
                            </div>
                            <div class="col-10 mx-auto">
                                <form class="spacer-2">
                                    <div class="row">
                                        <div class="col mb-1">
                                            <label for="email" class="form-label label-rounded">Email Ketua</label>
                                            <input type="email" class="form-control form-rounded input-field" id="email" placeholder="Masukkan Email Ketua">
                                        </div>
                                        <div class="col mb-1">
                                            <label for="telpon" class="form-label label-rounded">No. Telpon IKM</label>
                                            <input type="text" class="form-control form-rounded input-field" id="telpon" placeholder="Masukkan Nomor Telpon IKM">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-1">
                                            <label for="namaketua" class="form-label label-rounded">Nama Ketua</label>
                                            <input type="text" class="form-control form-rounded input-field" id="namaketua" placeholder="Masukkan Nama Ketua">
                                        </div>
                                        <div class="col mb-1">
                                            <label for="namaikm" class="form-label label-rounded">Nama IKM</label>
                                            <input type="text" class="form-control form-rounded input-field" id="namaikm" placeholder="Masukkan Nama IKM">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label label-rounded">Alamat</label>
                                        <input type="text" class="form-control form-rounded input-field" id="alamat" placeholder="Masukkan Alamat IKM">
                                    </div>
                                    <div class="row">
                                        <div class="col mb-1">
                                            <label for="username" class="form-label label-rounded">Username</label>
                                            <input type="text" class="form-control form-rounded input-field" id="username" placeholder="Masukkan Username Baru">
                                        </div>
                                        <div class="col mb-1">
                                            <label for="katasandi" class="form-label label-rounded">Kata Sandi</label>
                                            <input type="text" class="form-control form-rounded input-field" id="katasandi" placeholder="Masukkan Kata Sandi">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-1">
                                            <div style="font-family: inter; font-size: 12px;">
                                                <ul>
                                                    <li>
                                                        <p>Dengan mengklik Daftar, Anda menyetujui Ketentuan, Kebijakan Data pada IKM Dashboard</p>
                                                    </li>
                                                    <li>
                                                        <p>password terdiri dari minimal 8 karakter yang berisi huruf besar(A-Z), huruf kecil (a-z), dan angka</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col mb-1">
                                            <label for="verif" class="form-label label-rounded">Verifikasi Kata Sandi</label>
                                            <input type="text" class="form-control form-rounded input-field" id="verif" placeholder="Ulangi Kata Sandi">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control form-rounded button-yellow" type="submit" name="submit" value="Login">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>

</html>