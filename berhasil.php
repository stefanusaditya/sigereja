<?php
    session_start();
    //mengatasi jika user langsung masuk menggunakan link, tanpa login
    if(empty($_SESSION['username']))
    {
    echo "<script>
        alert('Maaf, untuk mengakses halaman ini, silahkan Login terlebih dahulu..!!');
        document.location='index.php';
        </script>";
    }
    require "koneksi.php";
    // include "daftaribadah.php";
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nara Hubung</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
        crossorigin="anonymous"
    >
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>
<body>
    <!-- <div class="navbar-wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jadwal.html">Jadwal Ibadah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="loginjemaat.php">Pendaftaran Ibadah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="narahubung.html">Nara Hubung</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a href="login.php" class="btn btn-warning">Login Admin</a>
                    </form>
                </div>
            </div>
        </nav>
    </div> -->
    <div class="container">
      <div class="d-flex justify-content-center">
          <div class="wrapper-content d-flex flex-column align-items-center p-5">
                <div class="image-content mb-3">
                  <img src="./resource/image/logogereja.png" alt="">
                </div>
                <div class="berhasil w-100" value="Pendaftaran Berhasil">
                    <p>Pendaftaran Berhasil</p>
                </div>
                <br>
                <p class="text-center" style="font-size:90%;">
                  Sebelum keluar dari halaman ini, pastikan Anda sudah
                  <b> Screenshoot</b> nomor dibawah untuk ditunjukkan saat akan memasuki
                  gedung gereja.
                </p>
                <p class="text-center" style="font-size:90%;">
                    Nomor Pendaftaran
                </p>
               <!--Panggil Nomor Disini--> 
              <p class="text-center" >
                  <?php
                    $s = $_SESSION['berhasil_sesi'];
                    $query = mysqli_query($koneksi,"SELECT nomor FROM sesi_$s ORDER BY nomor");
                    $result = mysqli_num_rows($query);
                    $_SESSION['sesi_tampil'] = $result;
                  ?>
                  <b style="font-size:200%; background-color:White; "><?=$_SESSION['sesi_tampil']?></b>
              </p>
              <p class="text-center" style="font-size:90%;"
              >
                Jam Ibadah: <span><b>Sesi <?= $_SESSION['berhasil_sesi'] ?></b></span><br>
                Nama Lengkap Pendaftar: <span><b><?= $_SESSION['berhasil_nama'] ?></b></span><br>
                Nomor Handphone Pendaftar: <span><b><?= $_SESSION['berhasil_nohp'] ?></b></span><br>
                Jumlah Orang yang Ikut Ibadah: <span><b><?= $_SESSION['berhasil_jumlah'] ?></b></span><br>
              </p>
            <p class="text-center" style="font-size:90%;">
            Apabila Anda batal hadir, harap segera lapor ke call center<b> 08208208</b> agar tempat
            Anda bisa diisi oleh orang lain.
            </p>
            <div class="text-center">
                <a href="logout_jemaat.php" class="btn btn-danger">Keluar</a>
            </div>
          </div>
      </div>
  </div>
</body>
