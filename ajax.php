<?php  
    require "koneksi.php";
    if (isset($_POST['cek_jemaat'])) {
    $sesi = $_POST['sesi'];
    $sql = "SELECT SUM(jumlah) AS total FROM sesi_".$sesi;
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($result);
    $sisa = 150 - $data['total'];
    echo $sisa;
  }
?>