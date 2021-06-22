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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php
        include "koneksi.php";
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
                        <a  href="admin_test3.php"><i class="fa fa-desktop fa-3x"></i> List Hadir Jemaat Sesi 3</a>
                    </li>
                    <li>
                        <a class="active-menu"  href="grafik.php"><i class="fa fa-dashboard fa-3x"></i> Grafik Jumlah Pendaftar</a>
                    </li>	
				</ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Grafik Perbandingan Jumlah Pendaftar Tiap Sesi</h2>   
                        <h5></h5>
                        <br>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12 col-sm-0">
                    <div class="panel">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- tampil tabel -->
                        <div class="panel-body">
                            <div style="width: 400px;margin: 0px auto;">
                                <canvas id="myChart"></canvas>
                            </div>
                            <script>
                                var ctx = document.getElementById("myChart").getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: ["Sesi 1", "Sesi 2", "Sesi 3"],
                                        datasets: [{
                                            label: '',
                                            data: [
                                            <?php 
                                            $jumlah_sesi1 = mysqli_query($koneksi,"SELECT SUM(jumlah) AS total FROM sesi_1");
                                            $data1 = mysqli_fetch_array($jumlah_sesi1);
                                            echo $data1['total'];
                                            ?>, 
                                            <?php 
                                            $jumlah_sesi2 = mysqli_query($koneksi,"SELECT SUM(jumlah) AS total FROM sesi_2");
                                            $data2 = mysqli_fetch_array($jumlah_sesi2);
                                            echo $data2['total'];
                                            ?>, 
                                            <?php 
                                            $jumlah_sesi3 = mysqli_query($koneksi,"SELECT SUM(jumlah) AS total FROM sesi_3");
                                            $data3 = mysqli_fetch_array($jumlah_sesi3);
                                            echo $data3['total'];
                                            ?>, 
                                            ],
                                            backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            ],
                                            borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
             </div>
             </div>
            </div>
        </div>
</body>
</html>