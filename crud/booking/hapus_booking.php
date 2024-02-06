<?php
include '../conn/conn.php';

$id_booking = $_GET["id"];

$query_delete = "DELETE FROM tb_booking WHERE id='$id_booking'";
mysqli_query($koneksi, $query_delete);

header("Location: index.php");
exit();
