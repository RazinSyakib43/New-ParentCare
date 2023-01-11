<?php
include '../koneksi.php';
session_start();

$id = $_SESSION['id'];

$paket = $_POST['paket'];
$harga = $_POST['harga'];

$query = "UPDATE tb_keranjang SET paket = '$paket', harga_paket = '$harga' 
WHERE id_cust = '$id' AND insertedAt = (SELECT CURDATE())";

if (mysqli_query($conn, $query)) {
    header("Location:../pages/Transaksi/pembayaran.php");
} else {
    $error = urldecode("Data tidak berhasil disimpan");
    header("Location:../pages/Transaksi/konsultasi.php?error=$error");
}

mysqli_close($conn);