<?php 
	$cari = isset($_GET['noic']) ? $_GET['noic'] : '';
	
    include 'capaian.php';

    $SQLkira = "SELECT 
                    client.nama AS customer_name,
                    COUNT(registration.noic) AS jumtempah, 
                    SUM(registration.deposit) AS jumdeposit, 
                    SUM(registration.bayaranakhir) AS telahbayar, 
                    SUM(services.price) AS servicesprice
                FROM registration
                INNER JOIN client ON client.noic = registration.noic 
                INNER JOIN room ON room.idbilik = registration.idbilik 
                LEFT JOIN services ON services.idservice = registration.idservice
                WHERE client.noic = '$cari'";

    $kira = mysqli_query($connect, $SQLkira); 
    $rekod = mysqli_fetch_array($kira); 

    //kiraan
    $customerName = $rekod['customer_name'];
    $jumtempah = $rekod['jumtempah'];
    $jumdeposit = $rekod['jumdeposit'];
    $telahbayar = $rekod['telahbayar'];
    $servicesprice = $rekod['servicesprice'];
    
    $jumbayaran = $jumdeposit + $telahbayar + $servicesprice;

    echo "<h1><b><i><u>Customer Info for $customerName:</u></i></b></h1>";
    echo "Your Booking Amount: ".$jumtempah." bilik";
    echo "<br>Total Deposit: RM".$jumdeposit." ";
    echo "<br>Amount Paid: RM".$telahbayar." ";
    echo "<br>Service Price: RM".$servicesprice." ";
    echo "<br>Total Payment Amount: RM".$jumbayaran." <br>";
?>
