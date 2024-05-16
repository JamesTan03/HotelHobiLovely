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
		<?php include 'header.php';?>
	</header>
	<nav>
		<?php include 'navadmin.php';?>
	</nav>
	<section>
		<article>
			<?php
			//ambil data dari url
			$noic=$_GET['noic'];
			$idbilik=$_GET['idbilik'];
			$tarikhmasuk=$_GET['tarikhmasuk'];
			//sambung ke pangkalan data
			include 'capaian.php';
			//query arahan padam
			$SQL="DELETE from registration where noic='$noic'AND idbilik='$idbilik' AND tarikhmasuk='$tarikhmasuk'";
			if (mysqli_query($connect,$SQL)) {
				echo "Record Deleted Successfully";
				echo "<br><br><button onclick='halamanSebelum()'> Previous Page</button>";
			}else{
				echo "Record Failed to Delete";
				echo "<br><br><button onclick='halamanSebelum()'> Previous Page</button>";
			}
			mysqli_close($connect);
			?>
			<script>
				function halamanSebelum() {
					window.history.back();
				}
			</script>
		</article>
		<aside>
			<?php include 'sidenavadmin.php';?>
		</aside>
	</section>
	<footer>
		<?php include 'footer.php';?>
	</footer>
</body>
</html>