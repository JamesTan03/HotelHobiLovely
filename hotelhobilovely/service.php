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
				<li><a href="service.php" class="active">Services˖✧</a></li>
				<li><a href="tempahan.php">Book Now˖✧</a></li>
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
					<p><i>Hotel Hobi Lovely</i> is an online hotel booking website that offers an easy and comfortable booking experience. With a variety of attractive accommodation options and competitive prices, Hobi Lovely Hotel ensures that customers get their dream accommodation without any difficulty.</p>
					<h2>Here are some services that we can accomodate our customers with (Fees will be included per nights): -</h2>
					
					<p>✾ Bell Man (Fees: FREE)</p><img src="bellman.jpg" width="65%"><br><br>
					
					<p>✾ Breakfast (Fees: FREE)</p><img src="food.jpg" width="65%"><br><br>
					
					<p>✾ Swimmimg Pool (Fees: FREE)</p><img src="pool.jpg" width="65%"><br><br>
					
					<p>✾ Personal Room Services (Fees: RM5)</p><img src="roomserv.jpg" width="65%"><br><br>
					
					<p>✾ Wi-Fi (Fees: RM5)</p><img src="food2.jpg" width="65%"><br><br>
					
					<p>✾ Cafe Buffet (Fees: RM20)</p><img src="food1.jpg" width="65%"><br><br>
					
					<p>✾ Gym (Fees: RM20)</p><img src="gym.jpg" width="65%"><br><br>
					
					<p><b>Please confirm your choice(s) of services at the Reception Counter later.</b></p>
					
					<button onclick="location.href='tempahan.php'">Book a Hotel Room Now</button>
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