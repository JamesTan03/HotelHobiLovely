<?php if (empty($_POST['daftar'])) {
	# kawasan borang(hantar data)
 ?>
    <h3>Customer Registration At Hotel Hobi Lovely</h3>
    <form action="daftar.php" method="POST">
        Identification Card Number: <input type="text" name="noic" placeholder="000000-00-0000"><br><br>
        Name: <input type="text" name="nama" placeholder="Full Name"><br><br>
        Address: <textarea name="alamat" rows="1" cols="50" placeholder="Home Address"></textarea><br><br>
        E-mail: <input type="email" name="email" placeholder="email@mail.com"><br><br>
        <input type="submit" name="daftar" value="SUBMIT">
        <input type="reset" name="padam" value="CLEAR">
    </form>
    <p>Have you already registered as a member? Click <a href="login.php">here</a> to Log in.</p>
	
<?php }else {
    # kawasan proses data(terima data)
        $noic=$_POST['noic'];
        $nama=$_POST['nama'];
        $alamat=$_POST['alamat'];
        $email=$_POST['email'];

        if(strlen($noic)!=14 or !is_string($noic))
        {
            die("<script>alert('Error on Identification Card Number');
                window.history.back();</script>");
        }

        include 'capaian.php';
        $SQL="INSERT INTO client(noic,nama,alamat,email) values('$noic','$nama','$alamat','$email');";
        $run= mysqli_query($connect,$SQL);
        if ($run) {
            echo "<script type='text/javascript'>
            window.alert('Congratulations, Your Registration Was Successful!');
            </script>";
        	echo "You Have Successfully Registered";
            echo "<br><br>Use your Identity Card Number (<b>$noic</b>) and Email Address(<b>$email</b>) to Login <a href='login.php'>here.</a>";
        }else{
            echo "<script type='text/javascript'>
            window.alert('There Is An Error On Your IC Number');
            </script>";
        	echo "Sorry, You Have Failed to Register :(";
        }
	} ?>