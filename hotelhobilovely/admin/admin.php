<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hotel Hobi Lovely: Admin</title> 
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
			<?php include 'navadmin.php'; ?>
		</nav>
			<section>
			    <article>
			    	<?php if(!empty($_COOKIE['idadmin'])) { ?>
					<h1>Admin Site</h1>
					<p><?php include'statistikadmin.php'?></p>
					<p><img src="hotel.jpg" width="80%"></p>
					
					<?php } else{ 
							echo "Sorry Login Session Has Ended";
							echo "<br><br>Please click <a href='index.php'>here </a> to Login again.";
						} ?>
				</article>
				<aside> 
					<?php include 'sideadmin.php'; ?>
				</aside>
			</section>
	<footer>
		<?php include 'footer.php'; ?>
	</footer>
</body>
</html>