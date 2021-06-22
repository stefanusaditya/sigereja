<?php
include 'koneksi.php';

// menyimpan data id kedalam variabel
$id = $_GET['id'];

// query SQL untuk insert data
$sql="delete from sesi_3 where nomor='$id'";
mysqli_query($koneksi, $sql);

//mengalihkan kehalaman utama
header ("location:admin_test3.php");
?>