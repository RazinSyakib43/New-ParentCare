<?php
include '../koneksi.php';
session_start();

$id        = $_SESSION['id'];
$nama      = $_POST['namaLengkap'];
$alamat    = $_POST['alamat'];
$tlp       = $_POST['nomorTelepon'];
$tgl       = $_POST['tanggalLahir'];

$query = "UPDATE tb_admin SET nama = '$nama', tgl_lahir = '$tgl', alamat = '$alamat', tlp = '$tlp' WHERE id = '$id'";

if (mysqli_query($conn, $query)) {
    header("Location:../pages/Admin/users-profile.php");
} else {
    $error = urldecode("Data tidak berhasil diupdate");
    header("Location:../pages/Admin/users-profile.php?error=$error");
}

mysqli_close($conn);