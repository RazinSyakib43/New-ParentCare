<?php
    include "../koneksi.php";
    
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    else {
        ?>
<script language="JavaScript">
alert('No ID Selected!');
document.location = '../pages/Admin/users-profile.php';
</script>

<?php    }
    
    //proses ganti password
    if (isset($_POST['email'])) {
        
    $password_lama    = md5($_POST['currentPassword']);
    $password_baru    = md5($_POST['newPassword']);
    $konf_password    = md5($_POST['renewPassword']);

	if ($_POST['currentPassword'] == "" || empty($_POST['currentPassword']) ) {
        ?>
<script language="JavaScript">
alert('Current Password tidak sesuai!');
window.location = '../pages/Admin/users-profile.php';
</script>

<?php
    }else if (empty($_POST['newPassword']) || empty($_POST['renewPassword'])) {
        ?>
<script language="JavaScript">
alert('Password Gagal Diubah! Data tidak boleh kosong');
window.location = '../pages/Admin/users-profile.php';
</script>
<?php    }
    else if ($_POST['newPassword'] != $_POST['renewPassword']) {
        ?>
<script language="JavaScript">
alert('Password Gagal Diubah! Password Baru dan Konfirmasi Password Harus Sama');
window.location = '../pages/Admin/users-profile.php';
</script>
<?php    }
    
    else {
        $login = "SELECT * from tb_user where email='$email' AND pass='$password_lama'";

        $login_query = mysqli_query($conn,$login);
    	$data = mysqli_fetch_array($login_query);

	    $row = mysqli_fetch_assoc($login_query);

        if($data > 0)
	    {
	        $query = "UPDATE tb_user SET pass='$password_baru' WHERE email='$email'";
            $sql = mysqli_query($conn, $query);
        
            if ($sql) {
?>
<script language="JavaScript">
alert('Password Berhasil Diubah!');
window.location = '../pages/Admin/users-profile.php';
</script>
<?php
} else {
    ?>
<script language="JavaScript">
alert('Password Gagal Diubah!');
window.location = '../pages/Admin/users-profile.php';
</script>
<?php    }
    
    }
     
    }
    }
	
?>