<?php
include '../conn/conn.php';

$query_customer = "SELECT * FROM tb_customer";
$result_customer = mysqli_query($koneksi, $query_customer);

$query_jenis_kendaraan = "SELECT * FROM tb_jenis_kendaraan";
$result_jenis_kendaraan = mysqli_query($koneksi, $query_jenis_kendaraan);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST["customer_id"];
    $tanggal = $_POST["tanggal"];
    $nopol = $_POST["nopol"];
    $jenis_kendaraan_id = $_POST["jenis_kendaraan_id"];
    $tahun = $_POST["tahun"];
    $bahan_bakar = $_POST["bahan_bakar"];
    $keluhan = $_POST["keluhan"];

    $query = "INSERT INTO tb_booking (customer_id, tanggal, nopol, jenis_kendaraan_id, tahun, bahan_bakar, keluhan) VALUES ('$customer_id', '$tanggal', '$nopol', '$jenis_kendaraan_id', '$tahun', '$bahan_bakar', '$keluhan')";
    mysqli_query($koneksi, $query);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Booking</title>
</head>

<body>
    <h2>Tambah Booking</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Customer:</label>
        <select name="customer_id" required>
            <option value="">Pilih Customer</option>
            <?php while ($row_customer = mysqli_fetch_assoc($result_customer)) { ?>
                <option value="<?php echo $row_customer['id']; ?>"><?php echo $row_customer['name']; ?></option>
            <?php } ?>
        </select><br>
        <label>Tanggal:</label>
        <input type="date" name="tanggal" required><br>
        <label>No. Polisi:</label>
        <input type="text" name="nopol" required><br>
        <label>Jenis Kendaraan:</label>
        <select name="jenis_kendaraan_id" required>
            <option value="">Pilih Jenis Kendaraan</option>
            <?php while ($row_jenis_kendaraan = mysqli_fetch_assoc($result_jenis_kendaraan)) { ?>
                <option value="<?php echo $row_jenis_kendaraan['id']; ?>"><?php echo $row_jenis_kendaraan['name']; ?></option>
            <?php } ?>
        </select><br>
        <label>Tahun:</label>
        <input type="text" name="tahun" required><br>
        <label>Bahan Bakar:</label>
        <input type="text" name="bahan_bakar" required><br>
        <label>Keluhan:</label>
        <textarea name="keluhan" rows="5" required></textarea><br>
        <input type="submit" value="Tambah">
    </form>
</body>

</html>