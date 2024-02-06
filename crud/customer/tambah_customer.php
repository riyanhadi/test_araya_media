<?php
include '../conn/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    $query = "INSERT INTO tb_customer (name, address, phone) VALUES ('$name', '$address', '$phone')";
    mysqli_query($koneksi, $query);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Customer</title>
</head>

<body>
    <h2>Tambah Customer</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Nama:</label>
        <input type="text" name="name" required><br>
        <label>Alamat:</label>
        <input type="text" name="address" required><br>
        <label>No. Telepon:</label>
        <input type="text" name="phone" required><br>
        <input type="submit" value="Tambah">
    </form>
</body>

</html>