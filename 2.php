<?php

$tanggal1 = "2023-03-20";
$tanggal2 = "2023-12-13";

$format_tanggal1 = strtotime($tanggal1);
$format_tanggal2 = strtotime($tanggal2);

$selisih_hari = abs($format_tanggal1 - $format_tanggal2) / (60 * 60 * 24);

echo "Selisih hari antara $tanggal1 dan $tanggal2 adalah: $selisih_hari hari";
