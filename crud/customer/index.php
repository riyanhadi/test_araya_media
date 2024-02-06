<?php
include '../conn/conn.php';

$query = "SELECT * FROM tb_customer";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Customer</title>
</head>

<body>
    <h2>Daftar Customer</h2>
    <br>
    <a href="tambah_customer.php">Tambah Customer</a>
    <br><br>
    <table border="1">
        <tr>
            <th>Aksi</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td>
                    <a href="edit_customer.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="hapus_customer.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus customer ini?')">Hapus</a>
                </td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['phone']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="../booking/index.php">Kembali ke Daftar Booking</a>
</body>

</html>