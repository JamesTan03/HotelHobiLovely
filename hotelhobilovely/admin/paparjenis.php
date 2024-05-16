<h3>List of Room Package Types:</h3>
<table border="1">
	<tr>
		<th>No.</th>
		<th>Type ID</th>
		<th>Number</th>
		<th>Room Type</th>
	</tr>
	<?php
	//sambung ke pangkalan data
	include 'capaian.php';
	//query panggil semua data
	$SQL="SELECT* from jenis";
	//laksanakan
	$panggil=mysqli_query($connect,$SQL);
	$i=0;
	while ($data=mysqli_fetch_array($panggil)) {
		$jenis=$data['idjenis'];
		$bilangan=$data['bilangan'];
		$jenisbilik=$data['jenisbilik'];
		$i++;
		echo "<tr><td>$i</td>
		<td>$jenis</td>
		<td>$bilangan</td>
		<td>$jenisbilik</td>";
	}
	mysqli_close($connect);
	?>
</table>