<?php 
    //statistik bilik
    echo "<i><u>Admin Statistics</u></i><br>";
    include 'capaian.php';
    $SQLkira="SELECT COUNT(idbilik) from room";
    $kira=mysqli_query($connect,$SQLkira); 
    $rekod = mysqli_fetch_array($kira); 
    //kiraan
    $jumbilik=$rekod['COUNT(idbilik)'];
    echo "<br>Number of Rooms: $jumbilik";
   ?>