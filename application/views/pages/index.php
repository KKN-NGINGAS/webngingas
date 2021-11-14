<!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url() ?>/assets/img/Logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/main.css">

    <title>Bumdes Ngingas</title>
  </head>

  <body id="loginPage">
    <div class="container-fluid centered">
      <div class="row">
        <div class="col-lg-4 mx-auto">
          <div class="card-form">
            <div class="card-content">
              <div class="row center-item">
                <div class="col-3 ms-auto">
                  <img class="logo" src="<?php echo base_url()?>/assets/img/Logo.png">
                </div>
                <div class="col-8">
                  <h2>NGINGAS DASHBOARD <br>Masuk</h2>
                </div>
                <?php if ($msg != '') { ?>
                  <div class="alert alert-danger" style="margin-top: 1rem;" role="alert">
                    <?= $msg ?>
                  </div>
                <?php } ?>
                <div class="col-10 mx-auto">
                  <form class="spacer-2" action="<?= base_url().'Login' ?>" method="POST">
                    <div class="mb-3">
                      <label for="username" class="form-label label-rounded">Username</label>
                      <input type="text" class="form-control form-rounded input-field" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label label-rounded">Password</label>
                      <input type="password" class="form-control form-rounded input-field" id="password" name="password" placeholder="Password" required>
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