<?php

function hitung_voucher($voucher, $total_belanja)
{
    $potongan_harga = 0;
    $uang_harus_dibayar = 0;
    $cashback = 0;

    if ($voucher == "PROMO20") {
        // Potongan 20%
        if ($total_belanja >= 150000) {
            $potongan_harga = $total_belanja * 0.20;
            if ($potongan_harga > 30000) {
                $potongan_harga = 30000;
            }
            $uang_harus_dibayar = $total_belanja - $potongan_harga;
            $cashback = $potongan_harga;
        } else {
            echo "Minimal belanja untuk voucher PROMO20 adalah 150000";
            return;
        }
    } elseif ($voucher == "PROMOCEPAT") {
        // Potongan 28%
        $potongan_harga = $total_belanja * 0.28;
        if ($potongan_harga > 25000) {
            $potongan_harga = 25000;
        }
        $uang_harus_dibayar = $total_belanja - $potongan_harga;
        $cashback = $potongan_harga;
    } else {
        echo "Voucher tidak valid";
        return;
    }

    echo "Uang harus dibayar: " . number_format($uang_harus_dibayar, 0, ',', '.') . PHP_EOL;
    echo "Cashback: " . number_format($cashback, 0, ',', '.') . PHP_EOL;
}


hitung_voucher("PROMO20", 160000);
