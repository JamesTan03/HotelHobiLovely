<?php
$noic = isset($_GET['noic']) ? $_GET['noic'] : '';
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';

if (empty($_POST['tempahan'])) {
    include 'capaian.php';
?>
    <h3>Hotel Hobi Lovely Reservation</h3>
    <form action="tempahan.php?noic=$noic&nama=$nama" method="POST">
        <p>Your IC No: <?php echo $noic ?> (<?php echo $nama ?>)</p>
        <input type="hidden" name="noic" value="<?php echo $noic ?>">
		
        <label>Choose Check In Date:</label>
        <input type="date" name="tarikhmasuk"><br><br>
        <label>Choose Check Out Date:</label>
        <input type="date" name="tarikhkeluar"><br><br>

        <input type="submit" name="tempahan" value="SUBMIT">
        <input type="reset" name="padam" value="CLEAR">
    </form>
	
    <br><p style="color:red;"><b>Make sure you have <a href="login.php">logged in</a> first before making a reservation!</b></p>
	
<?php
}else {
    # kawasan proses data(terima data)
    $noic=$_POST['noic'];
    $tarikhmasuk=$_POST['tarikhmasuk'];
    $tarikhkeluar=$_POST['tarikhkeluar'];
	
    $connect=mysqli_connect('localhost','root','','hotelhobilovely');
    
    include 'capaian.php';
    //query semak unit kosong
    $SQL="SELECT* from registration where tarikhmasuk>='$tarikhmasuk'AND tarikhkeluar<='$tarikhkeluar'";
	
    echo "<b>Non-Reservable Hotel Rooms:</b><br>";
    $panggil= mysqli_query($connect,$SQL);
	
    while ($data= mysqli_fetch_array($panggil)){
            $idbilik=$data['idbilik'];
            //papar tarikh format d-m-y
            $tarikhmasuk=date('Y-m-d',strtotime($data['tarikhmasuk']));
            $tarikhkeluar=date('Y-m-d',strtotime($data['tarikhkeluar']));
            echo "<br><b style='color:red;'>$idbilik</b> ($tarikhmasuk until $tarikhkeluar)";
        }
		echo "<br>All the hotel rooms here are not available to book.";
    ?>
	
	<script>
		function validateForm() {
			var deposit = document.forms["tempahanForm"]["deposit"].value;

			// Check if the deposit is less than 50.00 or null
			if (parseFloat(deposit) < 50.00 || deposit === null || deposit === "") {
				alert("Please input a deposit of at least RM50.00");
				return false;
			}
		}
	</script>

	
        <!--fail pemproses tempahan: prosestempahan.php-->
<form action="prosestempahan.php?noic=$noic&nama=$nama" method="GET" name="tempahanForm" onsubmit="return validateForm()">
    <input type="hidden" name="noic" value="<?php echo $noic ?>">
	<input type="hidden" name="nama" value="<?php echo $nama ?>">
	
        <br><label><b>Date of Your Choice:</b></label><br>
        <label>Check In Date: </label><?php echo $tarikhmasuk ?>
        <input type="hidden" name="tarikhmasuk" value="<?php echo $tarikhmasuk ?>"><br>
        <label>Check Out Date: </label><?php echo $tarikhkeluar ?>
        <input type="hidden" name="tarikhkeluar" value="<?php echo $tarikhkeluar ?>"><br><br>
		
		<label>Select Service:</label>
		<select name="idservice">
			<?php
			include 'capaian.php';
			$SQLservices = "SELECT * FROM services";
			$panggilservices = mysqli_query($connect, $SQLservices);
			while ($dataservice = mysqli_fetch_array($panggilservices)) {
				$idservice = $dataservice['idservice'];
				$servicename = $dataservice['servicename'];
				$price = $dataservice['price'];
				echo "<option value='$idservice'>$servicename (RM$price)</option>";
			}
			?>
		</select><br>
		
        <br><label>Choose Your Room No: </label>
        <select name="idbilik">
        <!--guna data dari database-->
        <?php
            include 'capaian.php';
            $SQLbilik= "SELECT* from room";
            $panggilbilik= mysqli_query($connect,$SQLbilik);
            while ($databilik=mysqli_fetch_array($panggilbilik)){
                $idbilik= $databilik['idbilik'];
                $idjenis= $databilik['idjenis'];
                $hargabilik= $databilik['hargabilik'];
                echo "<OPTION VALUE ='$idbilik'> $idbilik ($idjenis - RM$hargabilik)</option>";
            }
            ?>
            </select>
			<p style="color:red;">Avoid Room No That Are Already Reserved.<br>
			Refer To The List Above.</p>
            <label>Deposit: </label>RM
			<input type="text" name="deposit" placeholder="Minimum 50.00"><br><br>
			<input type="submit" name="prosestempahan" value="BOOK">
    </form>
        <br><br>
        <button onclick='halamanSebelum()'>Change Booking Date</button>
        <script>
                function halamanSebelum() {
                    window.history.back();
                }
            </script>
        <?php
    }?>