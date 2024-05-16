<?php 
    //statistik pelanggan
    echo "<i><u>Admin's Statistics</u></i><br>";
    include 'capaian.php';
    $SQLkira="SELECT COUNT(registration.noic),SUM(registration.deposit),SUM(registration.bayaranakhir) from client inner join registration on client.noic=registration.noic";
    $kira=mysqli_query($connect,$SQLkira); 
    $rekod= mysqli_fetch_array($kira); 
    //kiraan
    $jumtempahan=$rekod['COUNT(registration.noic)'];
    $jumdeposit=$rekod['SUM(registration.deposit)'];
    $jumbayaranakhir=$rekod['SUM(registration.bayaranakhir)'];
    $jumkutipan=$jumdeposit+$jumbayaranakhir;
    echo "<h3>Sales Statistics:</h3>Number of Bookings: $jumtempahan";
    echo "<br>Total Deposit Collection: RM$jumdeposit";
    echo "<br>Collection Amount (From Cust): RM$jumbayaranakhir";
    echo "<br>Final Collection Amount: RM$jumkutipan <br>";
   ?>