<?php
include 'koneksi.php';

// menyimpan data id kedalam variabel
$id = $_GET['id'];

// query SQL untuk insert data
$sql="delete from sesi_1 where nomor='$id'";
mysqli_query($koneksi, $sql);

//mengalihkan kehalaman utama
header ("location:admin.php");
?>