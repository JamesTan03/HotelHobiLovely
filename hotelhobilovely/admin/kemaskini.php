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
			    	<?php if(!empty($_COOKIE['idadmin'])){
			    		//panggil data dari URL
			    		$noic=$_GET['noic'];
			    		$idbilik=$_GET['idbilik'];
			    		$tarikhmasuk=$_GET['tarikhmasuk'];
			    		$bayaranakhir=$_GET['bayaranakhir'];
			    		//sambung ke pangkalan data
			    		include 'capaian.php';
			    		//query panggil semua data
			    		$SQL="UPDATE registration SET bayaranakhir='$bayaranakhir' WHERE noic='$noic' AND idbilik='$idbilik' AND tarikhmasuk='$tarikhmasuk'";
			    		//laksanakan
			    		$kemaskini=mysqli_query($connect,$SQL);
			    		if($kemaskini){
			    			echo "Payment has been updated";
			    		}else{
			    			echo "Payment failed to update";
			    	    }
			    	    mysqli_close($connect);
			    	    }else{
			    		    echo "Sorry Login Session Has Ended";
			    		    echo "<br><br>Click <a href='index.php'>here</a> to Login again.";
			    	    }
			    	    ?>
				</article>
				<aside> 
					<?php include 'sidenavadmin.php'; ?>
				</aside>
			</section>
	<footer>
		<?php include 'footer.php'; ?>
	</footer>
</body>
</html>