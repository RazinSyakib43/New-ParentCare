<?php
    include('../koneksi.php');

    $id                  = $_POST['id'];
    $nama_customer       = $_POST['nama'];
    $email_customer      = $_POST['email'];

    $password = md5($_POST['password']);

$query = "INSERT INTO tb_customer VALUES ('$id','$nama_customer','','','','')";
    $query2 = "INSERT INTO tb_user VALUES ('$id', '','$password','$email_customer','User')";

    // menjalankan query isi data
    if (mysqli_query($conn, $query) && mysqli_query($conn, $query2))
    {
    header("Location:../pages/login.php");
    }
    else
    {
        echo "<script type='text/javascript'>
	    alert('Sign Up Gagal!')
	    </script>";
    header("Location:../pages/User/register.php");
    }

    mysqli_close($conn);

?>