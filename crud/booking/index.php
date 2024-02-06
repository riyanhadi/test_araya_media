<?php
include '../conn/conn.php';

$query = "SELECT b.*, c.name AS customer_name, j.name AS jenis_kendaraan_name FROM tb_booking b LEFT JOIN tb_customer c ON b.customer_id = c.id LEFT JOIN tb_jenis_kendaraan j ON b.jenis_kendaraan_id = j.id";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Booking</title>
</head>

<body>
    <h2>Daftar Booking</h2>
    <br>
    <a href="tambah_booking.php">Tambah Booking</a> | <a href="../customer/index.php">Customer</a>
    <br><br>
    <table border="1">
        <tr>
            <th>Aksi</th>
            <th>ID</th>
            <th>Customer</th>
            <th>Tanggal</th>
            <th>No. Polisi</th>
            <th>Jenis Kendaraan</th>
            <th>Tahun</th>
            <th>Bahan Bakar</th>
            <th>Keluhan</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td>
                    <a href="edit_booking.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="hapus_booking.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus booking ini?')">Hapus</a>
                    <a href="detail_booking.php?id=<?php echo $row['id']; ?>">Detail</a>
                </td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['nopol']; ?></td>
                <td><?php echo $row['jenis_kendaraan_name']; ?></td>
                <td><?php echo $row['tahun']; ?></td>
                <td><?php echo $row['bahan_bakar']; ?></td>
                <td><?php echo $row['keluhan']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>