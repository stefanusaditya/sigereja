<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Masuk Jemaat</title>
        <!-- css dan library css -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
            crossorigin="anonymous"
        >
        <link rel="stylesheet" href="./style.css">

        <!-- cek -->
        <?php
        if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "gagal"){
            echo "<div align='center'><font color='#ff0000'>Login gagal! username dan password salah!</div></font>";
          }else if($_GET['pesan'] == "logout"){
            echo "Anda telah berhasil logout";
          }else if($_GET['pesan'] == "belum_login"){
            echo "Anda harus login untuk mengakses halaman Admin";
          }
        }
        ?>
    </head>

    <body>
      <div class="container login-wrapper">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card">
              <div class="card-header pt-4 px-4">
                <h4 class="text-dark">LOGIN JEMAAT</h4>
                <div class="d-flex justify-content-end">
                  <a href="./logout_jemaat.php" class="btn text-primary button-back ">Kembali</a>
                </div>
              </div>
              <div class="card-body pb-4 mb-4">

              <!-- Fungsi Login -->
                <form method="POST" action="cek_loginjemaat.php">
                  <div class="mb-3"> 
                  <!-- method="post" action="cek_login.php"> -->
                    <label for="exampleInputEmail1" class="form-label text-dark">Nama Pengguna</label>
                    <input type="text" name="username" class="form-control form-login" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label text-dark">Kata Sandi</label>
                    <input type="password" name="pass" class="form-control form-login" id="exampleInputPassword1">
                  </div>
                  <p class="text-center text-danger">Untuk mencoba masukkan nama pengguna "jemaat" dan kata sandi "jemaat".</p>
                  <div class="text-center mt-4">
                  <button type="submit" class="btn btn-warning button-masuk">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
