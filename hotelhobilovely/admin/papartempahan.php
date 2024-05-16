<h3>Customer Booking Report</h3>
<table border="1">
<tr>
    <th>No.</th>
    <th>Room</th>
    <th>Service</th>
    <th>Check In</th>
    <th>Check Out</th>
    <th>Number of Days</th>
    <th>Customer</th>
    <th>Deposit</th>
    <th>Room Price</th>
    <th>Service Price</th>
    <th>Balance</th>
    <th>Payment Update</th>
</tr>
<?php
    //sambung ke pangkalan data
    include 'capaian.php';
    //query panggil semua data
    $SQL = "SELECT *, DAY(registration.tarikhmasuk), DAY(registration.tarikhkeluar),
            services.servicename, services.price AS service_price
            FROM client
            INNER JOIN registration ON client.noic = registration.noic
            INNER JOIN room ON room.idbilik = registration.idbilik
            LEFT JOIN services ON registration.idservice = services.idservice
            ORDER BY registration.tarikhmasuk";
    //pembilang
    $i = 0;
    $semak = mysqli_query($connect, $SQL);
    while ($hasil = mysqli_fetch_array($semak)) {
        $noic = $hasil['noic'];
        $tarikhmasuk = $hasil['tarikhmasuk'];
        $tarikhkeluar = $hasil['tarikhkeluar'];
        $idbilik = $hasil['idbilik'];
        $client = $hasil['nama'];
        $deposit = $hasil['deposit'];
        $hargabilik = $hasil['hargabilik'];
        $service_name = $hasil['servicename'];
        $service_price = $hasil['service_price'];
        $bayaranakhir = $hasil['bayaranakhir'];
        //tambah jumlah hari
        $jumhari = ($hasil['DAY(registration.tarikhkeluar)'] - $hasil['DAY(registration.tarikhmasuk)']);
        $deposit = $hasil['deposit'];
        //tambah jum harga
        $jumharga = $hargabilik * $jumhari;
        $baki = ($jumharga - ($deposit + $bayaranakhir));
        $i++;
        echo "<tr>
            <td>$i</td>
            <td>$idbilik - RM$hargabilik</td>
            <td>$service_name - RM$service_price</td>
            <td>$tarikhmasuk</td>
            <td>$tarikhkeluar</td>
            <td>$jumhari</td>
            <td>$client</td>
            <td>RM$deposit</td>
            <td>RM$jumharga</td>
            <td>RM$service_price</td>
            <td>RM$baki</td>
            <td><a href='edittempahan.php?noic=$noic&idbilik=$idbilik&tarikhmasuk=$tarikhmasuk'>Edit Payment</a></td>
        </tr>";
    }
    echo "</table>";
    mysqli_close($connect)
?>
