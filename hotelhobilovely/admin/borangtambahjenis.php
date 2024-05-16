<?php if(empty($_POST['tambah'])) {?>
	<form action="selenggarajenis.php" method="POST">
	<label>Room Type ID:</label>
	<input type="text" name="idjenis" placeholder="Eg: J10">
	<br><br>
	<label>Room Package Type:</label>
	<input type="text" name="jenisbilik" placeholder="Single/Double Bed/Family Room">
	<br><br>
	<label>Bilangan:</label>
	<input type="text" name="bilangan" placeholder="Eg: 10">
	<br><br>
	<input type="submit" name="tambah" value="ADD">
</form>
<?php }else{
	//terima data dari borang secara post
	$jenis=$_POST['idjenis'];
	$jenisbilik=$_POST['jenisbilik'];
    $bilangan=$_POST['bilangan'];
    //sambung ke pangkalan data
    include'capaian.php';
    //query panggil semua data
    $SQL="INSERT INTO jenis(idjenis,jenisbilik,bilangan)
    values('$jenis','$jenisbilik','$bilangan')";
    //laksanakan
    $tambah=mysqli_query($connect,$SQL);
    if($tambah){
    	echo "New Room Package Type Successfully Added!";
    }else{
    	echo "New Failed Room Package Type Added";
    }
    mysqli_close($connect);
}
?>