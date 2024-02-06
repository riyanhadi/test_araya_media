<?php
include '../conn/conn.php';

$id_booking = $_GET["id"];

$query_booking = "SELECT * FROM tb_booking WHERE id = '$id_booking'";
$result_booking = mysqli_query($koneksi, $query_booking);
$row_booking = mysqli_fetch_assoc($result_booking);

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

    $query_update = "UPDATE tb_booking SET customer_id='$customer_id', tanggal='$tanggal', nopol='$nopol', jenis_kendaraan_id='$jenis_kendaraan_id', tahun='$tahun', bahan_bakar='$bahan_bakar', keluhan='$keluhan' WHERE id='$id_booking'";
    mysqli_query($koneksi, $query_update);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
</head>

<body>
    <h2>Edit Booking</h2>
    <form method="post">
        <input type="hidden" name="id_booking" value="<?php echo $id_booking; ?>">
        <label>Customer:</label>
        <select name="customer_id" required>
            <option value="">Pilih Customer</option>
            <?php while ($row_customer = mysqli_fetch_assoc($result_customer)) { ?>
                <option value="<?php echo $row_customer['id']; ?>" <?php if ($row_customer['id'] == $row_booking['customer_id']) echo "selected"; ?>><?php echo $row_customer['name']; ?></option>
            <?php } ?>
        </select><br>
        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?php echo $row_booking['tanggal']; ?>" required><br>
        <label>No. Polisi:</label>
        <input type="text" name="nopol" value="<?php echo $row_booking['nopol']; ?>" required><br>
        <label>Jenis Kendaraan:</label>
        <select name="jenis_kendaraan_id" required>
            <option value="">Pilih Jenis Kendaraan</option>
            <?php while ($row_jenis_kendaraan = mysqli_fetch_assoc($result_jenis_kendaraan)) { ?>
                <option value="<?php echo $row_jenis_kendaraan['id']; ?>" <?php if ($row_jenis_kendaraan['id'] == $row_booking['jenis_kendaraan_id']) echo "selected"; ?>><?php echo $row_jenis_kendaraan['name']; ?></option>
            <?php } ?>
        </select><br>
        <label>Tahun:</label>
        <input type="text" name="tahun" value="<?php echo $row_booking['tahun']; ?>" required><br>
        <label>Bahan Bakar:</label>
        <input type="text" name="bahan_bakar" value="<?php echo $row_booking['bahan_bakar']; ?>" required><br>
        <label>Keluhan:</label>
        <textarea name="keluhan" rows="5" required><?php echo $row_booking['keluhan']; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>