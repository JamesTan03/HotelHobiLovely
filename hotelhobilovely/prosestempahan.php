<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel Hobi Lovely</title>
	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home˖✧</a></li>
            <li><a href="service.php">Services˖✧</a></li>
            <li><a href="tempahan.php" class="active">Book Now˖✧</a></li>
            <li><a href="semakan.php">Check Reservation˖✧</a></li>
            <li><a href="hubungi.php">Contact Us˖✧</a></li>
            <li><a href="admin/admin.php">Admin page˖✧</a></li>
            <li><a href="login.php">Log In˖✧</a></li>
            <li><a href="daftar.php">Sign Up˖✧</a></li>
            <li><a href="logoutpelanggan.php">Log Out˖✧</a></li>
        </ul>
    </nav>
    <section>
        <article>
            <?php
            $tarikhmasuk = $_GET['tarikhmasuk'];
            $tarikhkeluar = $_GET['tarikhkeluar'];
            $bayaranakhir = 0;
            $noic = $_GET['noic'];
            $deposit = $_GET['deposit'];
            $idbilik = $_GET['idbilik'];
            $idservice = $_GET['idservice'];

            include 'capaian.php';

            $SQLbilik = "SELECT hargabilik FROM room WHERE idbilik='$idbilik'";
            $panggilbilik = mysqli_query($connect, $SQLbilik);
            $databilik = mysqli_fetch_array($panggilbilik);
            $hargabilik = $databilik['hargabilik'];

            $SQLservice = "SELECT price FROM services WHERE idservice='$idservice'";
            $panggilservice = mysqli_query($connect, $SQLservice);

            if ($panggilservice) {
				$dataservice = mysqli_fetch_array($panggilservice);

				if ($dataservice) {
					$serviceprice = $dataservice['price'];
					$totalprice = $hargabilik + $serviceprice;

					// Check for duplicate booking
					$checkDuplicateSQL = "SELECT * FROM registration WHERE idbilik='$idbilik' AND tarikhmasuk='$tarikhmasuk'";
					$duplicateResult = mysqli_query($connect, $checkDuplicateSQL);

					if (mysqli_num_rows($duplicateResult) > 0) {
						echo "<h2>Booking Failed</h2>";
						echo "<p>Duplicate booking for the same room on the same date.</p>";
						echo "<br><button onclick='goBack()'>Go Back to Edit Booking</button>";
						echo "<script>function goBack() { window.history.back(); }</script>";
					} else {
						// Retrieve user's name
						$getNameSQL = "SELECT nama FROM client WHERE noic='$noic'";
						$nameResult = mysqli_query($connect, $getNameSQL);
						$nameData = mysqli_fetch_array($nameResult);
						$nama = $nameData['nama'];

						//query SIMPAN data
						$SQL = "INSERT INTO registration(tarikhmasuk, tarikhkeluar, bayaranakhir, deposit, noic, idbilik, idservice) VALUES ('$tarikhmasuk', '$tarikhkeluar', '$bayaranakhir', '$deposit', '$noic', '$idbilik', '$idservice')";
						$simpan = mysqli_query($connect, $SQL);

						if ($simpan) {
							// Calculate balance
							$balance = $totalprice - $deposit;

							echo "<h2>Your Booking Has Succeeded!</h2>";
							echo "<table border='1'>";
							echo "<tr><td colspan='2'><b>User Information:</b></td></tr>";
							echo "<tr><td><b>IC Number:</b></td><td>$noic</td></tr>";
							echo "<tr><td><b>Name:</b></td><td>$nama</td></tr>";

							echo "<tr><td colspan='2'><b>Booking Information:</b></td></tr>";
							echo "<tr><td><b>Check-In Date:</b></td><td>$tarikhmasuk</td></tr>";
							echo "<tr><td><b>Check-Out Date:</b></td><td>$tarikhkeluar</td></tr>";
							echo "<tr><td><b>Room Number:</b></td><td>$idbilik</td></tr>";
							echo "<tr><td><b>Service ID:</b></td><td>$idservice</td></tr>";
							echo "<tr><td><b>Total Price:</b></td><td>RM$totalprice</td></tr>";
							
							// Additional row for deposit
							echo "<tr><td><b>Deposit:</b></td><td>RM$deposit</td></tr>";
							
							// Calculate and display balance
							echo "<tr><td><b>Balance:</b></td><td>RM$balance</td></tr>";
							
							echo "</table>";

							// Print button
							echo "<br><button onclick='printBooking()'>Print Booking</button>";
							echo "<script>function printBooking() { window.print(); }</script>";
						} else {
							echo "<h2>Your Booking Failed</h2>";
							echo "<p>Please Re-Fill The Reservation Form.</p>";
							echo "<br><button onclick='goBack()'>Go Back to Edit Booking</button>";
							echo "<script>function goBack() { window.history.back(); }</script>";
						}
					}
				}
			}
            ?>
        </article>
        <aside>
            <?php include 'sidenav.php'; ?>
        </aside>
    </section>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
