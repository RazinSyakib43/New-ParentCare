<?php
    include '../koneksi.php';

    $id        = $_POST['id'];
    $nama      = $_POST['inputNama'];
    $gender        = $_POST['inputGender'];
    $alamat      = $_POST['inputAddress'];
    $tlp      = $_POST['inputNumber'];
    $foto      = $_POST['inputFoto'];
    $tgl_lahir      = $_POST['inputDate'];
    $username      = $_POST['inputUsername'];
    $pass      = $_POST['inputPassword'];
    $email      = $_POST['inputEmail'];

    $query = "INSERT INTO tb_admin VALUES ('$id','$nama','$gender','$tgl_lahir','$foto','$alamat','$tlp')";
    $query2 = "INSERT INTO tb_user VALUES ('$id','$username','$pass','$email')";

    if (mysqli_query($conn, $query))
    {
        header("Location:../pages/Admin/addAkunAdmin.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil ditambahkan");
    header("Location:../pages/Admin/addAkunAdmin.php?error=$error");
    }

    mysqli_close($conn);
?>