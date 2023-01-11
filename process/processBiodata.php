<?php
include '../koneksi.php';
session_start();

$id = $_SESSION['id'];

$query = "INSERT INTO tb_keranjang (id_cust, insertedAt) VALUES ('$id', (SELECT CURDATE()))";
$query2 = "UPDATE tb_keranjang SET id_cust = $id WHERE id_cust = $id";

if (mysqli_query($conn, $query) || mysqli_query($conn, $query2)) {
    header("Location:../pages/Transaksi/pilih-tanggal.php");
} else {
    $error = urldecode("Data tidak berhasil disimpan");
    header("Location:../pages/Transaksi/isi-biodata.php?error=$error");
}

mysqli_close($conn);