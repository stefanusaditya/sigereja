<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/css5.css"/>
    <?php
       include 'koneksi.php'; //koneksi ke database
       $id = $_GET['id']; //inisialisasi id
       $sql = mysqli_query($koneksi, "select * from sesi_3 where nomor='$id'");
       $row = mysqli_fetch_array($sql);
       //membuat function untuk set active radio button
       function active_radio_button($value,$input){
           //apabila value dari button sama dengan yang diinput 
           $result = $value==$input?'checked':'';
           return $result;
       } 
    ?>
</head>
<body>
    
    <!-- <a href="logout.php"><button type="button" class="btn btn-danger">ANJAY</button></a>"> -->

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> SiGereja</a> 
            </div>
    <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"><?php date_default_timezone_set('Asia/Jakarta'); echo date("d F Y")."&nbsp; &nbsp; &nbsp;"; ?><a href="logout.php" class="btn btn-danger square-btn-adjust">Keluar</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="resource/image/logogereja.png" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a href="admin.php"><i class="fa fa-dashboard fa-3x"></i> List Hadir Jemaat Sesi 1</a>
                    </li>
                    <li>
                        <a  href="admin_test2.php"><i class="fa fa-desktop fa-3x"></i> List Hadir Jemaat Sesi 2</a>
                    </li>	
                    <li>
                        <a  class="active-menu" href="admin_test3.php"><i class="fa fa-desktop fa-3x"></i> List Hadir Jemaat Sesi 3</a>
                    </li>	
                    <li>
                        <a href="grafik.php"><i class="fa fa-dashboard fa-3x"></i> Grafik Jumlah Pendaftar</a>
                    </li>	
				</ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Daftar Jemaat Sesi 1</h2>   
                        <h5></h5>
                        <br>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12 col-sm-0">
                    <div class="panel">
                        <div class="panel-heading">
                            Sunting Pendaftar
                            
                        </div>
                        <!-- tampil tabel -->
                        <div class="panel-body">
                        
                        <form method="POST" action="updateAct3.php"> <!--form dengan method post-->
                                <input type="hidden" value="<?php echo $row['nomor'];?>" name="id">
                                <table>
                                    <tr>
                                        <td>Nama Pendaftar</td> 
                                        <td><input type="text" value="<?php echo $row['nama'];?>" name="nama"></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Hp Pendaftar </td> 
                                        <td><input type="text" value="<?php echo $row['no_hp'];?>" name="no_hp"></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah orang yang ikut ibadah</td> 
                                        <td><input type="text" value="<?php echo $row['jumlah'];?>" name="jumlah"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" value="Submit"> <!--Submit-->
                                            <a href="admin_test3.php">Kembali</a> <!--Kembali ke admin.php-->
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
             </div>
            </div>
        </div>
</body>
</html>