<?php
require('../../koneksi.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta dicoding -->
    <meta name="dicoding:email" content="muhammadrazin14@gmail.com">
    <title>Register ParentCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles/style.css">
</head>

<body>
    <section class="article mt-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-once="true">
                    <h2 class="section-heading">Register</h2>
                </div>
            </div>
            <div class="row mt-4 question-list">
                <div class="col-1"></div>
                <div class="col-10">
                    <form role="form" method="POST" action="../../process/addUser.php">
                        <?php
                        $tampilkan_isi = "select count(id) as jumlah from tb_customer;";
                        $tampilkan_isi_sql = mysqli_query($conn, $tampilkan_isi);
                        $no = 1;

                        while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                            $jumlah = $isi['jumlah'];
                        ?>

                        <input type="hidden" name="id" value="C00<?php echo $no + $jumlah; ?>">

                        <?php } ?>

                        <div class="card">
                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="add-topic-title" name="nama"
                                    placeholder="Masukan Nama Lengkap">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="add-topic-title" placeholder="Masukan Email" id="inputEmail"
                                    name="email">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="add-topic-title" name="password"
                                    placeholder="Masukan Password">
                            </div>
                            <div class="col-3"> <input type="submit" class="btn btn-send" value="Register"
                                    name="register"></div>
                            <p class="mt-4 text-sm text-center">
                                Sudah punya akun?
                                <a href="../login.php"
                                    class="text-primary text-gradient font-weight-bold">Login</a>
                            </p>
                        </div>
                    </form>
                    <div class="col-1"></div>
                </div>
            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>