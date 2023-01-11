<?php
include '../koneksi.php';
session_start();

$id = $_SESSION['id'];

$date = $_POST['Date'];
$time = $_POST['time'];

$query = "UPDATE tb_keranjang SET jadwal = (SELECT DAYNAME('$date')), waktu = '$time', tglReservasi='$date' 
WHERE id_cust = '$id' AND insertedAt = (SELECT CURDATE())";

if (mysqli_query($conn, $query)) {
    header("Location:../pages/Transaksi/konsultasi.php");
} else {
    $error = urldecode("Data tidak berhasil disimpan");
    header("Location:../pages/Transaksi/pilih-tanggal.php?error=$error");
}

mysqli_close($conn);