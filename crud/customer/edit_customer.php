<?php
include '../conn/conn.php';

$id_customer = $_GET["id"];

$query = "SELECT * FROM tb_customer WHERE id = '$id_customer'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    $query_update = "UPDATE tb_customer SET name='$name', address='$address', phone='$phone' WHERE id='$id_customer'";
    mysqli_query($koneksi, $query_update);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
</head>

<body>
    <h2>Edit Customer</h2>
    <form method="post">
        <label>Nama:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        <label>Alamat:</label>
        <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br>
        <label>No. Telepon:</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>