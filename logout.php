<?php
	//hapus session yang sudah di set
    session_start();
	unset($_SESSION['username']);
	// unset($_SESSION['']);

	session_destroy();
	echo "<script>
			alert('Anda telah keluar dari Halaman Administrator');
			document.location='index.php';
		  </script>";
?>