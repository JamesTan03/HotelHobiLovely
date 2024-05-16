<?php if(empty($_POST['tambah'])){?>
	<form action="selenggarabilik.php" method="POST">
	<label>Room ID:</label>
	<input type="text" name="idbilik" placeholder="Eg: A10"><br><br>
	<label>Room Type:</label>
	<select name="idjenis">
		<?php
		include 'capaian.php';
		$SQLjenis="SELECT* from jenis";
		$panggil=mysqli_query($connect,$SQLjenis);
		while ($data=mysqli_fetch_array($panggil)) {
			$idjenis=$data['idjenis'];
			$jenisbilik=$data['jenisbilik'];
			echo "<option value='$idjenis'> $jenisbilik</option>";
		}?>
	</select><br><br>
	<label>Price:</label>
	<input type="text" name="hargabilik" placeholder="Eg: 100.00"><br><br>
	<input type="submit" name="tambah" value="ADD">
</form>
<?php }else{
	//terima data dari borang secara POST
	$idbilik=$_POST['idbilik'];
	$idjenis=$_POST['idjenis'];
    $hargabilik=$_POST['hargabilik'];
    //sambung ke pangkalan data
    include 'capaian.php';
    //query panggil semua data
    $SQL="INSERT into room(idbilik,idjenis,hargabilik) values('$idbilik','$idjenis','$hargabilik')";
    //laksanakan
    $tambah=mysqli_query($connect,$SQL);
    if($tambah){
    	echo "New Room ID Added Successfully";
    	echo "<br><a href='selenggarabilik.php'>Add more</a>";
    }else{
    	echo "New Room ID Failed to be Added";
    }
    mysqli_close($connect);
}
?>
</table>