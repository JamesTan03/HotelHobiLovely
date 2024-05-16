<?php if(empty($_POST['semak'])) {?>
<h2>Check Customer Orders</h2>
<p><u>Enter the Date</u></p>
<form action="semak.php" method="POST">
	Check In Date:
	<input type="date" name="tarikhmasuk"><br><br>
	Check Out Date:
	<input type="date" name="tarikhkeluar"><br><br>

	<p><u>Choose the Client's IC No</u></p>
	<label>Client's IC:</label>

	<select name="selectnokpklien">
		<option value='0'>Please Choose</option>
	<?php
	include '../capaian.php';
	$SQLklien="SELECT* FROM client";
	$panggil=mysqli_query($connect,$SQLklien) OR die(mysqli_error($connect));
	while ($data=mysqli_fetch_array($panggil)) {
		$noic=$data['noic'];
		$nama=$data['nama'];
		echo "<option value='$noic'>$noic - $nama</option>";
	} ?>
	</select>

	<input type="submit" name="semak" value="CHECK">
</form>
<?php }else{
	//pindahkan data secara POST ke sini
	$tarikhmasuk=$_POST['tarikhmasuk'];
	$tarikhkeluar=$_POST['tarikhkeluar'];

	$selectnokpklien=$_POST['selectnokpklien'];
	//papar jadual tempahan
	echo "<table border='1'>
        <tr>
            <th>No.</th>
            <th>Unit - Price</th>
            <th>Service</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>No. of Days</th>
            <th>Customer</th>
            <th>Deposit</th>
            <th>Room Price</th>
            <th>Service Price</th>
            <th>Balance of Payment</th>
            <th>Delete</th>
        </tr>";
	//sambung ke pangkalan data
	include '../capaian.php';
	//query
	$SQL = "SELECT *, DAY(registration.tarikhmasuk), DAY(registration.tarikhkeluar)
    FROM client
    INNER JOIN registration ON client.noic = registration.noic
    INNER JOIN room ON room.idbilik = registration.idbilik
    WHERE (tarikhmasuk BETWEEN '$tarikhmasuk' AND '$tarikhkeluar'
        OR tarikhkeluar BETWEEN '$tarikhmasuk' AND '$tarikhkeluar')
        OR '$selectnokpklien' = client.noic";
		
	if ($selectnokpklien != "0") {
		if (($tarikhmasuk != null) && ($tarikhkeluar != null)) {
			//$SQL = $SQL . " AND ";
			}
		//$SQL= $SQL."client.noic='$selectnokpklien'";
	}
	
	$SQL = $SQL . " ORDER BY registration.tarikhmasuk";
	
	//pembilang
	$i=0;
	$semak=mysqli_query($connect,$SQL) OR die(mysqli_error ($connect));
	echo "<h3>Booking Table: ";
	if (($tarikhmasuk !=null) && ($tarikhkeluar !=null)) {
		echo "$tarikhmasuk until $tarikhkeluar ";
	}
	if ($selectnokpklien !="0") {
		echo $selectnokpklien;
	}
	echo "</h3>";
	
	while($hasil=mysqli_fetch_array($semak)){
		$tarikhmasuk=$hasil['tarikhmasuk'];
		$tarikhkeluar=$hasil['tarikhkeluar'];
		$idbilik=$hasil['idbilik'];
		$deposit=$hasil['deposit'];
		$client=$hasil['nama'];
		$noic=$hasil['noic'];
		$hargabilik=$hasil['hargabilik'];
		//tambah jumlah hari
		$jumhari=($hasil['DAY(registration.tarikhkeluar)']-$hasil['DAY(registration.tarikhmasuk)']);
		$deposit=$hasil['deposit'];
		
		$idservice = $hasil['idservice'];
		$serviceQuery = "SELECT servicename, price FROM services WHERE idservice = '$idservice'";
        $serviceResult = mysqli_query($connect, $serviceQuery);
        $serviceData = mysqli_fetch_array($serviceResult);
        $serviceName = $serviceData['servicename'];
        $servicePrice = $serviceData['price'];
		
		$bayaranakhir=$hasil['bayaranakhir'];
		//tambah jumlah harga
		$jumharga=$hargabilik*$jumhari;
		$baki=($jumharga-($deposit+$bayaranakhir));
		$i++;
		echo "<tr>
            <td>$i</td>
            <td>$idbilik - RM$hargabilik</td>
            <td>$serviceName - RM$servicePrice</td>
            <td>$tarikhmasuk</td>
            <td>$tarikhkeluar</td>
            <td>$jumhari</td>
            <td>$client</td>
            <td>RM$deposit</td>
            <td>RM$jumharga</td>
            <td>RM$servicePrice</td>
            <td>RM$baki</td>
            <td><a href='deletetempahan.php?noic=$noic&&idbilik=$idbilik&&tarikhmasuk=$tarikhmasuk'>Delete</a></td>
        </tr>";
	}
	echo "</table>";
	echo "<p><a href='semak.php'>Check Again</a></p>";
	mysqli_close($connect);
}
?>