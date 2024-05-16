<h3>List of Registered Customers:</h3>
<table border="1">
	<tr>
		<th>No.</th>
		<th>IC No.</th>
		<th>Name</th>
		<th>E-mail</th>
		<th>Address</th>
		<th>Delete</th>
	<tr>
<?php
//sambung ke pangkalan data
include 'capaian.php';
//query panggil semua data
$SQL="SELECT* FROM client ORDER BY noic LIMIT 25";
//laksanakan
$panggil=mysqli_query($connect,$SQL);
$i=0;
while($data=mysqli_fetch_array($panggil)){
	$noic=$data['noic'];
	$nama=$data['nama'];
	$email=$data['email'];
	$alamat=$data['alamat'];
	$i++;
	echo "<tr>
		<td>$i</td>
		<td>$noic</td>
		<td>$nama</td>
		<td>$email</td>
		<td>$alamat</td>
		<td><a href='deletepelanggan.php?noic=$noic'>Delete</a></td>
	<tr>";
}
mysqli_close($connect);
?>
</table>