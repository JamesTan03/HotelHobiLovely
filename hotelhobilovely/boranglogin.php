<?php if (empty($_GET['login'])) {?>
    <h3>Existing Customer Login at Hotel Hobi Lovely</h3>
    <form action="login.php" method="GET">
        Identification Card Number: <input type="text" name="noic" placeholder="000000-00-0000"><br><br>
        E-mail: <input type="email" name="email" placeholder="email@mail.com"><br><br>
        <input type="submit" name="login" value="LOGIN">
        <input type="reset" name="padam" value="CLEAR">
    </form>
    <p>You are not a registered member? Click <a href="register.php">here</a>.</p>
<?php }else {
    $noic=$_GET['noic'];
    $email=$_GET['email'];
    include 'capaian.php';
    $SQL="SELECT* FROM client WHERE '$noic'=noic and '$email'=email";
    $semak= mysqli_query($connect,$SQL);
    $data= mysqli_fetch_array($semak);
    $noic= $data['noic'];
    $nama= $data['nama'];
    $alamat= $data['alamat'];
    $email= $data['email'];
    if (empty ($nama)) {
        echo "Sorry, You Have Failed to Log in :(";
        echo "<br><br>Please login again <a href='login.php'>here.</a>";
        }else{
            echo "<br>Congratulations ".$nama.", you successfully Login!<br>";
            include 'statistikpelanggan.php';
            echo "<br><br><span style='color: red;'>Please click <a href='tempahan.php?noic=".$noic."&nama=".$nama."'>here</a> to <b>BOOK A ROOM</b></span>";
        }
} ?>