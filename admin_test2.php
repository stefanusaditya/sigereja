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
        include "koneksi.php";
    ?>
</head>
<body>
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
                        <a  class="active-menu"  href="admin_test2.php"><i class="fa fa-desktop fa-3x"></i> List Hadir Jemaat Sesi 2</a>
                    </li>	
                    <li>
                        <a  href="admin_test3.php"><i class="fa fa-desktop fa-3x"></i> List Hadir Jemaat Sesi 3</a>
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
                     <h2>Daftar Jemaat Sesi 2</h2>   
                        <h5></h5>
                        <br>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12 col-sm-0">
                    <div class="panel">
                        <div class="panel-heading">
                           
                        </div>
                        <div class="panel-body">
                        <table align="left" border="2" cellpadding="2" cellspacing="2">
                            <tr> <!--Print : HeaderTable, No., nama, dst.-->
                                <th style="text-align:center;" width="40">No.</th> 
                                <th style="text-align:center;" width="25%">Nama</th>
                                <th style="text-align:center;" width="150">Nomor Handphone</th>
                                <th style="text-align:center;" width="150">Jumlah</th>
                                <th style="text-align:center;" width="15%">Aksi</th>
                            </tr>
                            <?php
                            include 'koneksi.php'; //koneksi ke database
                            $sql = mysqli_query($koneksi, "select * from sesi_2"); //query select
                            foreach ($sql as $row) { //Print : data
                                echo"<tr> 
                                <td>".$row['nomor']."</td>
                                <td>".$row['nama']."</td>
                                <td>".$row['no_hp']."</td>
                                <td>".$row['jumlah']."</td>
                                <td>
                                    <a href='update2.php?id=$row[nomor]'>Edit</a> 
                                    <a href='delete2.php?id=$row[nomor]'>Hapus</a>
                                </td>
                                </tr>";              
                                }
                            ?>
                        </table>
                                <!-- button cetak -->
                                <button onclick="location.href='reportpdf2.php';" id="reportpdf" type="button" class="btn btn-info">Cetak PDF</button>
                                <button onclick="location.href='reportexcel2.php';" id="reportexcel" type="button" class="btn btn-success">Export Excel</button>
                                <br><br>
                                <!-- button delete -->
                                <form method="POST" action="admin_test2.php">
                                    <table align="center">
                                        
                                            Nomor Pendaftaran : 
                                            <input type="text" name="nomor">
                                            <input type="submit" name="Submit" value="Hapus Data"><br>
                                            <text class="text-danger">* Hapus data berdasarkan nomor pendaftaran</text>
                                        
                                    </table>
                                </form>
                                <!-- source code untuk hapus -->
                                <?php
                                    if (isset($_POST['Submit'])) {
                                        $no=$_POST['nomor'];
                                        $sql="DELETE FROM sesi_2 WHERE nomor = '$no'";
                                        if (mysqli_query($koneksi, $sql)) {
                                            echo "<script>alert('Data Berhasil Dihapus!');history.go(-1);</script>";
                                        } else {
                                            echo "Error: ".$sql."<br>".mysqli_error($koneksi);
                                        }
                                    }
                                    mysqli_close($koneksi);
                                ?>
                        </div>
                    </div>
                </div>
             </div>
             </div>
            </div>
        </div>
</body>
</html>