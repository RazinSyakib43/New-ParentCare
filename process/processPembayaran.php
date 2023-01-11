<?php
include '../koneksi.php';
session_start();

$id = $_SESSION['id'];

$no_rek = $_POST['rek'];

$query = "UPDATE tb_keranjang SET no_rek = '$no_rek' 
WHERE id_cust = '$id' AND insertedAt = (SELECT CURDATE())";

if (mysqli_query($conn, $query)) {
    header("Location:../pages/Transaksi/konfirmasi pembayaran.php");
} else {
    $error = urldecode("Data tidak berhasil disimpan");
    header("Location:../pages/Transaksi/pembayaran.php?error=$error");
}

mysqli_close($conn);