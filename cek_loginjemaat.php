<?php
include "koneksi.php";
$username = $_POST['username'];
$pass = $_POST['pass'];
$sql = mysqli_query($koneksi, "SELECT * FROM jemaat WHERE nama_jemaat='$username' AND pass='$pass'");

$data = mysqli_fetch_assoc($sql);
if($data != false){
	session_start();
	$_SESSION['username'] = $data['nama_jemaat'];
	header ("location:daftaribadah.php");
}else{

	header("location:loginjemaat.php?pesan=gagal");
}
?>