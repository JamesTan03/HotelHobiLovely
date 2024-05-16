<?php
  //panggil data dari URL
  $noic=$_GET['noic'];
  $idbilik=$_GET['idbilik'];
  $tarikhmasuk=$_GET['tarikhmasuk'];
  //sambung ke pangkalan
  include 'capaian.php';
  //query panggil semua data
  $SQL="SELECT*,DAY(registration.tarikhmasuk),DAY(registration.tarikhkeluar) from registration inner join room where registration.noic='$noic' AND room.idbilik='$idbilik' AND registration.tarikhmasuk='$tarikhmasuk'";
  //laksanakan
  $kemaskini=mysqli_query($connect,$SQL);
  $data=mysqli_fetch_array($kemaskini);
  $noic=$data['noic'];
  $idbilik=$data['idbilik'];
  $tarikhmasuk=$data['tarikhmasuk'];
  $akhir=$data['tarikhkeluar'];
  $hargabilik=$data['hargabilik'];
  //jumlah hari
  $jumhari=($data['DAY(registration.tarikhkeluar)']-$data['DAY(registration.tarikhmasuk)']);
  $jumtempahan=$jumhari*$hargabilik;
  $deposit=$data['deposit'];
  //jumlah baki belum bayar
  $bayaranakhir=$data['bayaranakhir'];
  $baki=$jumtempahan-($deposit+$bayaranakhir);
  $jumlahdibayar=$bayaranakhir+$deposit;
  if($jumlahdibayar!=$jumtempahan){
  	echo'<form action="kemaskini.php" method="GET">
  	    Customer: <b>'.$noic.' (Room: '.$idbilik.')</b><br><br>
  	    From: <b>'.$tarikhmasuk.'</b><br><br>
  	    Until: <b>'.$akhir.'</b><br><br>
  	    Total Days & Bookings: <b>'.$jumhari.' Day(s) x RM'.$hargabilik.'</b><br><br>
  	    Total Booking Price: <b>RM'.$jumtempahan.'</b><br><br>
  	    Balance Due: <b>RM'.$baki.'</b><br><br>

  	    <input type="hidden" name="noic" value="'.$noic.'">
  	    <input type="hidden" name="idbilik" value="'.$idbilik.'">
  	    <input type="hidden" name="tarikhmasuk" value="'.$tarikhmasuk.'">
  	    <label>Final payment:</label> <b>RM</b>
  	    <input type="text" name="bayaranakhir">
  	    <input type="submit" name="submit" value="kemaskini">
  	    </form><br>';
  	}else{
  		echo "Your Payment Has Been Completed";
  	}
  	mysqli_close($connect);
?>
</table>