<?php
include "koneksi.php";
$username = $_POST['username'];
$pass = $_POST['pass'];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$username' AND pass='$pass'");

$data = mysqli_fetch_array($sql);

if($data){
	session_start();
	$_SESSION['username'] = $data['username'];
	header ("location:admin.php");
}else{
	header("location:login.php?pesan=gagal");
}
?>