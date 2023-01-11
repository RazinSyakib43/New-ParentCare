<?php
include '../koneksi.php';
session_start();

$date       = $_POST['date'];
$time       = $_POST['time'];

$query = "SELECT * FROM tb_dokter INNER JOIN tb_detail_dokter
ON tb_dokter.id = tb_detail_dokter.id_dokter
INNER JOIN tb_jadwal ON tb_jadwal.id = tb_detail_dokter.id_jadwal
WHERE tb_jadwal.hari = 'DAYNAME($date)' AND tb_jadwal.waktu = '$time'";


if (mysqli_query($conn, $query)) {
    header("Location:../pages/Transaksi/pilih-tanggal.php");
} else {
    $error = urldecode("Data tidak berhasil diupdate");
    header("Location:../pages/Transaksi/pilih-tanggal.php?error=$error");
}

mysqli_close($conn);