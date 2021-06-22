<?php
include 'koneksi.php';

//menyimpan data kedalam variable
$id = $_POST['id'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$jumlah = $_POST['jumlah'];

//update table
$sql = "update sesi_2 set nama='$nama', no_hp='$no_hp', jumlah='$jumlah' where nomor='$id'";
mysqli_query($koneksi, $sql);

//mengalihkan kehalaman utama
header ("location:admin_test2.php");
?>