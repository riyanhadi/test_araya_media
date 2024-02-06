<?php
include '../conn/conn.php';

$id_booking = $_GET["id"];

$query = "SELECT b.*, c.name AS customer_name, j.name AS jenis_kendaraan_name FROM tb_booking b LEFT JOIN tb_customer c ON b.customer_id = c.id LEFT JOIN tb_jenis_kendaraan j ON b.jenis_kendaraan_id = j.id WHERE b.id = '$id_booking'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Booking</title>
</head>

<body>
    <h2>Detail Booking</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <td><?php echo $row['id']; ?></td>
        </tr>
        <tr>
            <th>Customer</th>
            <td><?php echo $row['customer_name']; ?></td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td><?php echo $row['tanggal']; ?></td>
        </tr>
        <tr>
            <th>No. Polisi</th>
            <td><?php echo $row['nopol']; ?></td>
        </tr>
        <tr>
            <th>Jenis Kendaraan</th>
            <td><?php echo $row['jenis_kendaraan_name']; ?></td>
        </tr>
        <tr>
            <th>Tahun</th>
            <td><?php echo $row['tahun']; ?></td>
        </tr>
        <tr>
            <th>Bahan Bakar</th>
            <td><?php echo $row['bahan_bakar']; ?></td>
        </tr>
        <tr>
            <th>Keluhan</th>
            <td><?php echo $row['keluhan']; ?></td>
        </tr>
    </table>
    <br>
    <a href="index.php">Kembali ke Daftar Booking</a>
</body>

</html>