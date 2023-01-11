<?php
    include '../koneksi.php';

    $id = $_GET['id'];

    $query = "DELETE from tb_user WHERE id = '$id'";
$query2 = "DELETE from tb_admin WHERE id = '$id'";

if (mysqli_query($conn, $query) && mysqli_query($conn, $query2))
    {
        header("Location:../pages/Admin/account.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil dihapus");
        header("Location:../pages/Admin/account.php?error=$error");
    }

    mysqli_close($conn);