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
					<?php include 'borangtempahan.php'; ?>
				</article>
				<aside>
					<?php include 'statistikpelanggan.php'; ?>
					<?php include 'roomdetail.php'; ?>
				</aside>
			</section>
	<footer>
		<?php include 'footer.php'; ?>
	</footer>
</body>
</html>