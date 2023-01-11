<?php
include '../koneksi.php';
session_start();

$id        = $_SESSION['id'];
$nama      = $_POST['nama'];
$alamat    = $_POST['address'];
$tlp       = $_POST['phoneNumber'];
$email       = $_POST['email'];

$query = "UPDATE tb_user SET email = '$email' WHERE id = '$id'";
$query2 = "UPDATE tb_customer SET nama = '$nama', alamat = '$alamat', tlp = '$tlp' WHERE id = '$id'";

if (mysqli_query($conn, $query) && mysqli_query($conn, $query2)) {
    header("Location:../pages/User/edit-profile.php");
} else {
    $error = urldecode("Data tidak berhasil diupdate");
    header("Location:../pages/User/edit-profile.php?error=$error");
}

mysqli_close($conn);