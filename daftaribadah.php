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
    ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Ibadah</title>
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
    
    <?php
        $error_nama = "";
        $error_no_hp = "";
        $error_jumlah = "";
        $error_sesi = "";

        $nama = "";
        $no_hp = "";
        $jumlah = "";
        $sesi = "";

        //Cek apakah inputan sudah sesuai dengan permintaan
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            //Nama
            if(empty($_POST["nama"])){
                $error_nama = "Nama tidak boleh kosong";
            }
            else {
                $nama = cek_input($_POST["nama"]);
                if(!preg_match("/^[a-z A-Z]*$/",$nama)){
                    $error_nama = "Inputan hanya boleh huruf dan spasi";
                }
            }
            //Nomor HP
            if(empty($_POST["no_hp"])){
                $error_no_hp = "No HP tidak boleh kosong";
            }
            else {
                $no_hp = cek_input($_POST["no_hp"]);
                if(!is_numeric($no_hp)){
                    $error_no_hp = "Nomor HP hanya boleh angka";
                }
            }
            //jumlah
            if(empty($_POST["jumlah"])){
                $error_jumlah = "Jumlah tidak boleh kosong";
            }
            else {
                $jumlah = cek_input($_POST["jumlah"]);
                if(!is_numeric($jumlah)){
                    $error_jumlah = "Jumlah hanya boleh angka";
                }
            }
            //Sesi
            if(empty($_POST["sesi"])){
                $error_sesi = "Inputan tidak boleh kosong";
            }
            else {
                $sesi = cek_input($_POST["sesi"]);
            }
        }
        //Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function cek_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        if(isset($_POST['daftar'])){
            if($error_nama !="" OR $error_no_hp !="" OR $error_jumlah !="" OR $error_sesi !="" ){
                $Message = "Pendaftaran Gagal. Terdapat kesalahan pada inputan";
            
            }
            else {
                include('koneksi.php');
                $nama = $_POST['nama'];
                $no_hp = $_POST['no_hp'];
                $jumlah = $_POST['jumlah'];
                $sesi = $_POST['sesi']; 
                switch($sesi){
                    case "1":
                        mysqli_query($koneksi,"INSERT INTO sesi_1 (nomor, nama, no_hp, jumlah) values ('', '$nama', '$no_hp', '$jumlah')");
                        break;
                    case "2" :
                        mysqli_query($koneksi,"INSERT INTO sesi_2 (nomor, nama, no_hp, jumlah) values ('', '$nama', '$no_hp', '$jumlah')");
                        break;
                    case '3' :
                        mysqli_query($koneksi,"INSERT INTO sesi_3 (nomor, nama, no_hp, jumlah) values ('', '$nama', '$no_hp', '$jumlah')");
                        break;
                    default :
                        echo "Pilih salah satu sesi";
                        break;
                }

                //setelahberhasil mendaftar mengarah ke ..
                $_SESSION['berhasil_sesi'] = $sesi;
                $_SESSION['berhasil_nama'] = $nama;
                $_SESSION['berhasil_nohp'] = $no_hp;
                $_SESSION['berhasil_jumlah'] = $jumlah;
               
                $Message = "Pendaftaran Berhasil!"; 
                header("location:berhasil.php");
            }
        }
    ?>
    
    <div class="navbar-wrapper">
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
                            <a class="nav-link" aria-current="page" href="index.html">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jadwal.html">Jadwal Ibadah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="daftaribadah.html">Pendaftaran Ibadah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="narahubung.html">Nara Hubung</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a href="./logout_jemaat.php" class="btn btn-warning">Logout Pengguna</a>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="wrapper-content d-flex flex-column align-items-center p-5">
                <div class="image-content mb-3">
                    <img src="./resource/image/logogereja.png" alt="">
                </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-dark">Jam ibadah yang dipilih :</label>
                        <select name="sesi" class="form-select" aria-label="Default select example" id="sesi_ibadah">
                            <option value="" disabled selected hidden>Pilih Jam Sesi Ibadah</option>
                            <option value="1">Ibadah Umum 1 (Pukul 07.00)</option>
                            <option value="2">Ibadah Umum 2 (Pukul 09.00)</option>
                            <option value="3">Ibadah Umum 3 (Pukul 11.00)</option>
                        </select>
                        <span class="warning"><?php echo $error_sesi;?></span>
                        <div id="emailHelp" class="form-text text-dark"> 
                             Jumlah Kursi yang tersedia :<b><span id="sisa_kursi"></span></b>
                            <?php
                                // include('koneksi.php');
                                // $sesi = 'sesi';
                                // switch($sesi){
                                //     case '1' :
                                //         $jumlahkan = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total FROM sesi_1");
                                //         $total = mysqli_fetch_array($jumlahkan);
                                //         echo "<pre>";
                                //         print_r($total);
                                //         echo "</pre>";
                                //         //echo "<b>" .number_format($total['total'])."</b>";
                                //         break;
                                // }
                                
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-dark">Nama Pendaftar (Ketua Grup) :</label>
                        <input type="text" class="form-control <?php echo ($error_nama !="" ? "is=invalid" : "");?>"  
                        id="nama" name="nama" aria-describedby="emailHelp" value="<?php echo $nama;?>">
                        <span class="warning"><?php echo $error_nama;?></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-dark">Nomor HP Pendaftar (Ketua Grup) :</label>
                        <input type="text" class="form-control <?php echo ($error_no_hp !="" ? "is=invalid" : "");?>" 
                        id="no_hp" name="no_hp" aria-describedby="emailHelp" value="<?php echo $no_hp;?>">
                        <span class="warning"><?php echo $error_no_hp;?></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-dark">Jumlah Orang yang ikut ibadah (termasuk pendaftar) (maks. 5) :</label>
                        <input type="text" class="form-control <?php echo ($error_jumlah !="" ? "is=invalid" : "");?>" 
                        id="jumlah" name="jumlah" aria-describedby="emailHelp" value="<?php echo $jumlah;?>">
                        <span class="warning"><?php echo $error_jumlah;?></span>
                    </div>
                    <p class="text-center">
                        Apabila jumlah anggota yang ingin didaftarkan lebih dari 5 orang.
                        Anda dapat mendaftar dengan nama pendaftar (ketua grup) dan nomor HP berbeda, setelah
                        Anda menyelesaikan pendaftaran ini
                    </p>
                    <button type="submit" name="daftar" class="btn btn-secondary w-100 text-center">Daftar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- cek kesediaan kursi -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $("#sesi_ibadah").on("change", function(){
    var sesi = $("#sesi_ibadah").val();
    $.ajax({
        url:'ajax.php',
        method : "POST",
        data: {sesi : sesi, cek_jemaat : 1},
        dataType:"text",
        success:function(data){
        $("#sisa_kursi").html(data);
        }
    });
    });


    </script>
</body>
