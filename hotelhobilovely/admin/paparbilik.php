<h3>List of Rooms Offered:</h3>
<table border="1">
	<tr>
		<th>No.</th>
		<th>Room No</th>
		<th>Price</th>
		<th>Type ID</th>
		<th>Room Type</th>
		<th>Delete</th>
	</tr>
	<?php
	//sambung ke pangkalan data
	include 'capaian.php';
	//query panggil semua data
	$SQL="SELECT* from room inner join jenis on room.idjenis=jenis.idjenis order by room.idbilik limit 25";
	//laksanakan
	$panggil=mysqli_query($connect,$SQL);
	$i=0;
	while($data=mysqli_fetch_array($panggil)){
		$idbilik=$data['idbilik'];
		$harga=$data['hargabilik'];
		$idjenis=$data['idjenis'];
		$jenisbilik=$data['jenisbilik'];
		$i++;
		echo "<tr><td>$i</td>
		<td>$idbilik</td>
		<td>RM$harga</td>
		<td>$idjenis</td>
		<td>$jenisbilik</td>
		<td><a href='deletebilik.php?idbilik=$idbilik'>Delete</a></td></tr>";
	}
	mysqli_close($connect);
	?>
</table>