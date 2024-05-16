<?php if (empty($_POST['import'])) {?>
<h2>Ease of Importing Room No, Price And Type ID</h2>
<p><b>WARNING: </b>Before you add rooms and set prices by import, please first add the room types in the Data Maintenance menu. Only then you can add excel rooms here.</p>
<form action="import.php" method="POST" name="upload_excel" enctype="multipart/form-data">
	<label>Enter CSV Type Data To Add Rooms</label>
	<fieldset>
		<input type="file" name="file" id="file">
		<input type="submit" name="import" value="Upload CSV File">
	</fieldset>
</form>
<?php }else{
	//terima kiriman fail dari borang import
	$faildata=$_FILES['file']['tmp_name'];
	$bukafail=fopen($faildata,"r");
	//banyak data-data yang tersimpan hendak dibuka
	while (($GETdata=fgetcsv($bukafail,1000,","))!==FALSE) {
		//sambung ke pangkalan data dbms
		include '../capaian.php';
		//query masukkan data
		$SQL="INSERT INTO room(idbilik,hargabilik,idjenis) values('".$GETdata[0]."','".$GETdata[1]."','".$GETdata[2]."');";
		$simpan=mysqli_query($connect,$SQL);
		if ($simpan) {
			echo "New Room Successfully Imported.";
		}else{
			echo "New Room Failed to Import.";
		}
	}
	fclose($bukafail);
}
?>