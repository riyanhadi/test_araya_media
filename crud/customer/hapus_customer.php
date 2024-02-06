<?php
include '../conn/conn.php';

$id_customer = $_GET["id"];

$query_delete = "DELETE FROM tb_customer WHERE id='$id_customer'";
mysqli_query($koneksi, $query_delete);

header("Location: index.php");
exit();
