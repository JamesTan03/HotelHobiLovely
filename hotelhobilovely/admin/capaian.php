<?php 
	$host = 'localhost';
	$user = 'root';
	$pswd = ''; 
	$dbase= 'hotelhobilovely';
	$connect= mysqli_connect($host,$user,$pswd,$dbase);
	if (!$connect) {
		echo "Maaf! Capaian Gagal";
	}else{
		echo "";
	}
?>