<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Halaman Utama</li>
            <li class="breadcrumb-item active" aria-current="page">Data User</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Data User</h1>
        <span data-feather="bell"></span>
    </div>

    <!-- <div class="container-fluid centered"> -->
    <!-- <div class="card"> -->
    <div class="card-content">
        <div class="col-11 mx-auto">
            <form class="spacer-2" style="padding-top: 50px;padding-bottom: 50px;">
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control input-field" id="tanggal" placeholder="Contoh: 15/09/20">
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="namadepan" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control input-field" id="namadepan" placeholder="Contoh: Robert">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="namabelakang" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control input-field" id="namabelakang" placeholder="Contoh: Harnold">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control input-field" id="username" placeholder="Contoh: Robert1">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="peranjabatan" class="form-label">Peran/Jabatan</label>
                        <select name="Pilih Peran/Jabatan" id="peranjabatan" class="form-control input-field" placeholder="Confirm Password">
                            <option class="dropdown-item disabled" value="Kosong">Pilih Peran/Jabatan</option>
                            <option value="Saab">Saab</option>
                            <option value="Mercedes">Mercedes</option>
                            <option value="Audi">Audi</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="namaikm" class="form-label">Nama IKM</label>
                    <input type="text" class="form-control input-field" id="namaikm" placeholder="Contoh: Sugih Waras">
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <input class="form-control button-red" style="justify-content: center;" type="reset" name="reset" value="Reset">
                    </div>
                    <div class="col mb-3">
                        <input class="form-control button-yellow" style="justify-content: center;" type="submit" name="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- </div> -->
    <!-- </div> -->

</main>