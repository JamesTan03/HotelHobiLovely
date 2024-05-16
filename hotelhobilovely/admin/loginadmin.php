<?php if(empty($_POST['loginadmin'])) { ?>
<h2>Admin Log In</h2>
<p>Only Admins Are Allowed to Access This Page!</p>
<form action="index.php" method="POST">
	<input type="text" name="idadmin" placeholder="Admin ID">
	<input type="password" name="katalaluan" placeholder="Password">
	<br><br><input type="submit" name="loginadmin" value="LOG IN">
</form>
<p>If you are not an admin click <a href="../index.php"> here.</a></p>
<!--Bahagian Kedua: Pemprosesan Data -->
<?php }else{
	// semakkan data yang dihantar tidak kosong
	if((!empty($_POST['idadmin'])) and (!empty($_POST['katalaluan'])) ) {
	//pindahkan data secara POST ke sini
	$idadmin=$_POST['idadmin'];
	$katalaluan=$_POST['katalaluan'];
	//Sambung ke pangkalan data
	include 'capaian.php';
	//Query
	$SQL="SELECT * from admin where idadmin='$idadmin' AND katalaluan='$katalaluan' ";
	//Semak
	$semak=mysqli_query($connect,$SQL);
	$hasil=mysqli_fetch_array($semak);
	$idadmin=$hasil['idadmin'];
	$nama=$hasil['nama'];
	if(!empty($idadmin)){
		//membina cookie bagi 86400 saat(24 jam)
    	$tamat= time() + (86400 * 30);
    	setcookie('idadmin',$idadmin,$tamat);
		echo "Greetings $nama visit";
		echo "<br><br>Click <a href='admin.php'>here</a> now.";
	}else{
		echo "Sorry! You are not an Admin of Hotel Hobi Lovely";
		echo "<br><br>Please click <a href='../index.php'>here</a> to Login as a Customer.";
	}
  } else {
  		echo "Please Enter the correct ID and Password as Admin.";
  }
  mysqli_close($connect);
}
?>