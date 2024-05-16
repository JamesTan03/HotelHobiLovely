<?php if(empty($_POST['semakan'])) {?>
<h2>Check Reservation</h2>
<p><u>Please Enter: -</u></p>
<form action="semakan.php" method="POST">
    Your E-mail:
    <input type="email" name="email" placeholder="email@mail.com"><br><br>
	Check In Date:
	<input type="date" name="tarikhmasuk"><br><br>
	Check Out Date:
	<input type="date" name="tarikhkeluar"><br><br>
	<input type="submit" name="semakan" value="CHECK"><br><br>
</form>
<p style="color:red;"><b>Make sure you have <a href="daftar.php">registered</a> first before checking!</b></p>

<?php } else {
    $id = $_POST['email'];
    $tarikhmasuk = $_POST['tarikhmasuk'];
    $tarikhkeluar = $_POST['tarikhkeluar'];

    //sambung ke pangkalan data
    include 'capaian.php';
    echo "<h3>Booking Schedule For $id <br> From $tarikhmasuk Until $tarikhkeluar:</h3>";

    //query
    $SQL = "SELECT *, DAY(registration.tarikhmasuk), DAY(registration.tarikhkeluar), services.price AS serviceprice
            FROM client
            INNER JOIN registration ON client.noic = registration.noic
            INNER JOIN room ON room.idbilik = registration.idbilik
            LEFT JOIN services ON services.idservice = registration.idservice
            WHERE email = '$id' AND (tarikhmasuk BETWEEN '$tarikhmasuk' AND '$tarikhkeluar' OR tarikhkeluar BETWEEN '$tarikhmasuk' AND '$tarikhkeluar')";

    $x = 0;
    //pembilang
    $semak = mysqli_query($connect, $SQL) or die(mysqli_error($connect));
    while ($hasil = mysqli_fetch_array($semak)) {
        $noic = $hasil['noic'];
        $tarikhmasuk = $hasil['tarikhmasuk'];
        $tarikhkeluar = $hasil['tarikhkeluar'];
        $idbilik = $hasil['idbilik'];
        $deposit = $hasil['deposit'];
        $client = $hasil['nama'];
        $hargabilik = $hasil['hargabilik'];
        $serviceprice = $hasil['serviceprice']; // Added line

        //tambah jumlah hari
        $jumhari = ($hasil['DAY(registration.tarikhkeluar)'] - $hasil['DAY(registration.tarikhmasuk)']);
        $deposit = $hasil['deposit'];
        $bayaranakhir = $hasil['bayaranakhir'];

        //tambah jumlah harga
        $jumharga = $hargabilik * $jumhari;
        $baki = ($jumharga + $serviceprice - ($deposit + $bayaranakhir)); // Updated line
        $x++;

        echo "<table border='3'>";
        echo "<th>CONTENT</th><th>INFORMATION</th>
          <tr><td>Name:</td><td>$client</td></tr>
          <tr><td>Check In & Out Date: </td><td>$tarikhmasuk until $tarikhkeluar</td></tr>
          <tr><td>Room No:</td><td>$idbilik</td></tr>
          <tr><td>Number of Days Booked:</td><td>$jumhari</td></tr>
          <tr><td>Booked Hotel Price:</td><td>RM$jumharga</td></tr>
          <tr><td>Selected Service Price:</td><td>RM$serviceprice</td></tr> <!-- Added line -->
          <tr><td>Deposit:</td><td>RM$deposit</td></tr>
          <tr><td>Outstanding Balance:</td><td>RM$baki</td></tr>";
        echo "</table><br>";
        echo "<button onclick='printBooking()'>Print Booking</button>";
		echo "<script>function printBooking() { window.print(); }</script>"; 
        echo "<button onclick='goBack()'>BACK</button>";
		echo "<script>function goBack() { window.history.back(); }</script>";
        echo "<br><br>";
    }
    mysqli_close($connect);
}
?>
<br>
<script type="text/javascript">
    function fungsiCetak() {
        window.print();
    }

    function fungsiBack() {
        window.open("semakan.php");
    }

    function fungsiEdit() {
        <?php
		// Include the database connection file
		include 'capaian.php';

		// Check if the form is submitted
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Process the form data and update the booking details in the database
			$noic = $_POST['noic'];
			$idbilik = $_POST['idbilik'];
			$tarikhmasuk = $_POST['tarikhmasuk'];
			$tarikhkeluar = $_POST['tarikhkeluar'];
			// Add more fields as needed

			// Perform the update query
			$updateQuery = "UPDATE registration 
							SET tarikhmasuk = '$tarikhmasuk', tarikhkeluar = '$tarikhkeluar' 
							WHERE noic = '$noic' AND idbilik = '$idbilik'";

			$result = mysqli_query($connect, $updateQuery);

			if ($result) {
				// Update successful
				echo "Booking details updated successfully!";
			} else {
				// Update failed
				echo "Error updating booking details: " . mysqli_error($connect);
			}

			// Close the database connection
			mysqli_close($connect);
		} else {
			?>
			// Display the form for editing the booking details
			<form action="editbook.php" method="post">
				<!-- Input fields for editing booking information -->
				<input type="hidden" name="noic" value="<?php echo $noic; ?>">
				<input type="hidden" name="idbilik" value="<?php echo $idbilik; ?>">
				<label for="newCheckInDate">New Check-In Date:</label>
				<input type="date" name="newCheckInDate" required>
				<label for="newCheckOutDate">New Check-Out Date:</label>
				<input type="date" name="newCheckOutDate" required>
				<button type="submit">Update Booking</button>
			</form>
			<?php
			echo "Include the form elements for editing here";
		}
		?>
    }

    function fungsiCancel() {
        <?php
		// Include the database connection file
		include 'capaian.php';

		// Check if the form is submitted
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Process the form data and delete the booking from the database
			$noic = $_POST['noic'];
			$idbilik = $_POST['idbilik'];
			// Add more fields as needed

			// Perform the delete query
			$deleteQuery = "DELETE FROM registration WHERE noic = '$noic' AND idbilik = '$idbilik'";

			$result = mysqli_query($connect, $deleteQuery);

			if ($result) {
				// Deletion successful
				echo "Booking deleted successfully!";
			} else {
				// Deletion failed
				echo "Error deleting booking: " . mysqli_error($connect);
			}

			// Close the database connection
			mysqli_close($connect);
		} else {
			?>
			// Display the confirmation form for deleting the booking
			<form action="deletebook.php" method="post">
				<!-- Input fields for confirmation -->
				<input type="hidden" name="noic" value="<?php echo $noic; ?>">
				<input type="hidden" name="idbilik" value="<?php echo $idbilik; ?>">
				<p>Are you sure you want to cancel the booking?</p>
				<button type="submit">Confirm Cancellation</button>
				<button type="button" onclick="fungsiBack()">Cancel</button>
			</form>
			<?php
			echo "Include the confirmation form elements for deleting here";
		}
		?>
    }
</script>