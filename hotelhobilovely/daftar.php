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
				<li><a href="tempahan.php">Book Now˖✧</a></li>
				<li><a href="semakan.php">Check Reservation˖✧</a></li>
				<li><a href="hubungi.php">Contact Us˖✧</a></li>
				<li><a href="admin/admin.php">Admin page˖✧</a></li>
				<li><a href="login.php">Log In˖✧</a></li>
				<li><a href="daftar.php" class="active">Sign Up˖✧</a></li>
				<li><a href="logoutpelanggan.php">Log Out˖✧</a></li>
			</ul>
		</nav>
			<section>
			    <article>
					<?php include 'borangdaftar.php'; ?>
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
