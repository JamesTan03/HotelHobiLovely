<?php
// Bahagian pemprosesan data carian
// Data dari borang carian
$cari = $_GET['noic'];
include 'capaian.php';
$SQL = "SELECT *, DAY(registration.tarikhmasuk), DAY(registration.tarikhkeluar), services.price as service_price 
        FROM client 
        INNER JOIN registration ON client.noic = registration.noic 
        INNER JOIN room ON room.idbilik = registration.idbilik 
        INNER JOIN jenis ON jenis.idjenis = room.idjenis 
        INNER JOIN services ON services.idservice = registration.idservice
        WHERE client.noic = '$cari'";
$x = 0; // x adalah pembilang
$panggil = mysqli_query($connect, $SQL);
while ($data = mysqli_fetch_array($panggil)) {
    $noic = $data['noic'];
    $idbilik = $data['idbilik'];
    $jenisbilik = $data['jenisbilik'];
    $hargabilik = $data['hargabilik'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $email = $data['email'];
    $tarikhmasuk = $data['tarikhmasuk'];
    $tarikhkeluar = $data['tarikhkeluar'];
    $deposit = $data['deposit'];
    $bayaranakhir = $data['bayaranakhir'];
    $service_price = $data['service_price'];
    $harimasuk = $data['DAY(registration.tarikhmasuk)'];
    $harikeluar = $data['DAY(registration.tarikhkeluar)'];
    $jumhari = $harikeluar - $harimasuk;
    $jumharga = ($hargabilik + $service_price) * $jumhari;
    $baki = $jumharga - ($deposit + $bayaranakhir);
    $x++;

    echo "<table border='3'>";
    echo "<tr><td>Booking: </td><td>$x</td></tr>
    <tr><td>Name: </td><td>$nama-($alamat)</td></tr>
    <tr><td>Check In & Out Date: </td><td>$tarikhmasuk-$tarikhkeluar</td></tr>
    <tr><td>Booked Room: </td><td>$idbilik($jenisbilik)</td></tr>
    <tr><td>Room Price: </td><td>RM$hargabilik</td></tr>
    <tr><td>Service Price: </td><td>RM$service_price</td></tr>
    <tr><td>Deposit:</td><td>RM$deposit</td></tr>
    <tr><td>Number of Days: </td><td>$jumhari hari</td></tr>
    <tr><td>Total Price: </td><td>RM$jumharga</td></tr>
    <tr><td>Unpaid Balance: </td><td>RM$baki</td></tr>";
    echo "</table><br>";
}
?>
