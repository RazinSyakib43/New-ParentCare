<?php
include '../../koneksi.php';
session_start();

$id = $_SESSION['id'];
$query = "SELECT * FROM tb_customer WHERE id = '$id'";

$result = mysqli_query($conn, $query);
$hasil = mysqli_fetch_assoc($result);

$row = '';

$query_rek = "SELECT * FROM tb_rekening";

$result_rek = mysqli_query($conn, $query_rek);
$hasil_rek = mysqli_fetch_assoc($result_rek);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
}

if (!$_SESSION['email'] && !$_SESSION['password'] && $_SESSION['level'] != "Admin") {
    echo "
		<script type='text/javascript'>
		alert('Anda harus login terlebih dahulu!')
		window.location='../login.php';
		</script>";
} else {
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- meta dicoding -->
        <meta name="dicoding:email" content="muhammadrazin14@gmail.com">
    <title>Transaksi - ParentCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500;700&family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-4 bgcolor" data-aos="fade-down">
            <div class="container">
                <a class="navbar-brand" href="#">Parent<span>Care</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" aria-current="page" href="../User/dashboard.php">Home</a>
                        <a class="nav-link" href="#">Artikel</a>
                        <a class="nav-link" href="#">FAQ</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Layanan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Konsultasi</a></li>
                                <li><a class="dropdown-item" href="#">Tes Minat Bakat</a></li>
                            </ul>
                        </li>
                        <a class="nav-link" href="#">Discuss</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img width="40px" src="../../asset/image/user/<?php echo $hasil['foto'] ?>"
                                    alt="Profile" class="rounded-circle">

                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="../User/edit-profile.php">
                                        <i class="bi bi-gear"></i>
                                        <span>Account Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="../../logout.php">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Sign Out</span>
                                    </a>
                                </li>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Article -->
    <section class="article">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12 col-md-6 col-lg-3 mt-4" data-aos="fade-up" data-aos-once="true" data-aos-delay="100">
                    <div class="step d-flex align-items-center">
                        <div class="circle text-center">
                            1
                        </div>
                        <div class="stepCenter">
                            <h6>Isi Biodata</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mt-4" data-aos="fade-up" data-aos-once="true" data-aos-delay="100">
                    <div class="step d-flex align-items-center">
                        <div class="circle text-center">
                            2
                        </div>
                        <div class="stepCenter">
                            <h6>Pilih Tanggal</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mt-4" data-aos="fade-up" data-aos-once="true" data-aos-delay="100">
                    <div class="step d-flex align-items-center">
                        <div class="circle text-center">
                            3
                        </div>
                        <div class="stepCenter">
                            <h6>Pembayaran</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mt-4" data-aos="fade-up" data-aos-once="true" data-aos-delay="100">
                    <div class="step d-flex align-items-center">
                        <div class="circle text-center">
                            4
                        </div>
                        <div class="stepCenter">
                            <h6>Konfirmasi</h6>
                        </div>
                    </div>
                </div>
            </div>
            <form action="../../process/processPembayaran.php" method="post">
                <div class="row mt-4">
                    <div class="col-sm-12 col-lg-5">
                        <?php
                            foreach ($result_rek as $row_rek) {
                                $no = 1;
                            ?>

                        <div class="col-12 mb-3">
                            <div class="paidCard">
                                <div class="col-1"> <input type="radio" name="rek"
                                        value="<?php echo $row_rek['no_rek'] ?>" id="paidCard1"></div>
                                <div class="col-7 infoRekening">
                                    <p class="noRekening"><?php echo $row_rek['bank'] ?></p>
                                    <p class="noRekening"><?php echo $row_rek['no_rek'] ?></p>
                                    <p class="anRekening"><?php echo $row_rek['atas_nama'] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-sm-12 col-lg-5 mt-2">
                            <div class="col-12">
                                <div class="col-3"> <a href="pilih-tanggal.php" class="btn btn-send">Back</a></div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-5 mt-2">
                            <div class="col-12">
                                <div class="col-3"> <button type="submit" class="btn btn-send">Next</button>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                        </div>
                    </div>
                </div>
            </form>
    </section>
    <!-- Article -->
    <!-- Footer -->
    <section class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 mt-3">
                    <div class="logo-footer">
                        <a class="navbar-brand" href="#">ParentCare.</a>
                    </div>
                    <div class="info mt-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <a href="" class=" infotxt">Layanan
                                    konsultasi anak terbaik untuk anda</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1">

                </div>
                <div class="col-12 col-md-4 col-lg-2">
                    <div class="info mt-4">
                        <h3>About ParentCare</h3>
                        <div class="footer-list mt-lg-3">
                            <li><a class="nav-footer" href="../Another pages/Tentang kami.php">Tentang Kami</a></li>
                            <li><a class="nav-footer" href="../Another pages/Hubungi kami.php">Hubungi Kami</a></li>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-2">
                    <div class="info mt-4">
                        <h3>More</h3>
                        <div class="footer-list mt-lg-3">
                            <li><a class="nav-footer" href="../Another pages/syarat dan ketentuan.php">Syarat & Ketentuan</a></li>
                            <li><a class="nav-footer" href="../Another pages/privasi.php">Privasi</a></li>
                            <li><a class="nav-footer" href="../FAQ/faq.php">FAQ</a></li>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-2">
                    <div class="info mt-4">
                        <h3>Media Sosial</h3>
                        <div class="footer-list mt-lg-3">
                            <li><a class="nav-footer" href="#"><img src="../../asset/image/icon/icons8-instagram-30.png" alt="Logo Instagram">
                                    Instagram</a></li>
                            <li><a class="nav-footer" href="#"><img src="../../asset/image/icon/icons8-facebook-30.png" alt="Logo Instagram"> Facebook</a></li>
                            <li><a class="nav-footer" href="#"><img src="../../asset/image/icon/icons8-twitter-30.png" alt="Logo Instagram"> Twitter</a></li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <p class="copyright">Copyright © 2022 ParentCare | All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>
<?php } ?>

</html>