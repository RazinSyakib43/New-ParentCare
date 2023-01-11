<?php

include '../../koneksi.php';
session_start();

if (!isset($_SESSION['id'])) {

    //Penggunaan javascript
    echo "<script>var elm = document.getElementById('login');
elm.style.display = 'none';</script>";

    //Penggunaan tag style pada head
    echo '<style>button {display:none;}</style>';
}

$query =
    "SELECT * from tb_dokter";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$query_test =
    "SELECT * FROM tb_testimoni LEFT JOIN tb_user
    ON tb_testimoni.id_user = tb_user.id WHERE tb_testimoni.id_user = tb_user.id";

$result_test = mysqli_query($conn, $query_test);
$row_test = mysqli_fetch_assoc($result_test);

$id = $_SESSION['id'];

$query_user = "SELECT * FROM tb_customer INNER JOIN tb_user
ON tb_user.id = tb_customer.id where tb_user.id = '$id'";

$result_user = mysqli_query($conn, $query_user);
$row_user = mysqli_fetch_assoc($result_user);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta dicoding -->
    <meta name="dicoding:email" content="muhammadrazin14@gmail.com">
    <title>ParentCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-4 bgcolor" data-aos="fade-down">
            <div class="container-xl">
                <a class="navbar-brand" href="#">Parent<span>Care</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                        <a class="nav-link" href="../Article/article.php">Artikel</a>
                        <a class="nav-link" href="../FAQ/faq.php">FAQ</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Layanan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../Transaksi/konsultasi.php">Konsultasi</a></li>
                                <li><a class="dropdown-item" href="../Tes Mental Health/tes-mental-health.php">Tes Kesehatan Mental</a></li>
                            </ul>
                        </li>
                        <a class="nav-link" href="pages/Forum Discussion/forum.php">Discuss</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img width="40px" src="../../asset/image/user/<?php echo $row_user['foto'] ?>" alt="Profile">

                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="edit-profile.php">
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

                            </ul><!-- End Profile Dropdown Items -->
                        </li><!-- End Profile Nav -->

                        </ul>
                        </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Home -->
    <section class="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" id="home1" data-aos="fade-right" data-aos-delay="300">
                    <h1 class="heading-home">ParentCare.</h1>
                    <p class="subheading-home">Apa yang kita lihat mengubah apa yang kita ketahui. Apa yang kita ketahui
                        mengubah apa yang kita lihat.
                        <strong>Stay healthy and happy with your child expertly</strong>
                    <div class="btn-home mt-5 mb-5">
                        <a href="../Transaksi/isi-biodata.php" class="button">Book Now</a>
                    </div>
                </div>
                <div class="col-lg-6" id="img" data-aos="fade-left" data-aos-delay="300">
                    <img src="../../asset/image/Hero/Hero Image.png" class="img-fluid home-hero" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Home -->
    <section class="psychologists mt-5" id="psychologists">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-once="true">
                    <h2 class="section-heading">Meet Our Psychologists</h2>
                    <p class="subheading">Cari jadwal dokter psikolog
                    </p>
                </div>
            </div>
            <div class="row mt-4">
                <?php
                if ($row > 0) {
                    foreach ($result as $rowDokter) {
                        $no = 1;
                        $id = $row['id'];
                        echo '
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-once="true" data-aos-delay="100">
                    <div class="card">

                        <img src="../../asset/image/dokter/' . $rowDokter['foto'] . '" alt="Gambar Dokter">
                        <h5 class="tittle-ptoduct mt-3">' . $rowDokter['nama'] . '</h5>
                        <div class="tittle-card mt-1">
                            <p class="price m-0"><img src="../../asset/image/icon/icons8-stetoscope-icon-32.png">' .
                            $rowDokter['keahlian'] . ' </p>
                        </div>
                    </div>
                </div>
                    ';
                    }
                } else {
                    echo '<div class="row mt-4">

                            <div class="tittle-card mt-1">
                                <p class="price m-0">Tidak ada data yang ditemukan
                                </p>
                            </div>';
                }

                if (isset($no)) {
                    $no++;
                } ?>

            </div>

    </section>
    <!-- Home -->

    <!-- Article -->
    <section class=" article">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-once="true">
                    <h2 class="section-heading">LATEST ARTICLE</h2>
                    <p class="subheading">Artikel kesehatan terkini untuk Anda
                    </p>
                </div>
            </div>
            <div class="row">
                <div id="news-container" class="row" data-aos="fade-up" data-aos-once="true" data-aos-delay="200">
                </div>
            </div>
            <div class="row">
                <div class="col-12 see-more" data-aos="fade-up" data-aos-once="true" data-aos-delay="100">
                    <div class="btn-detail mt-5 text-center">
                        <a href="pages/Article/article.php"><button type="button" class="btn btn-second">More
                                Article</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Article -->

    <!-- Testimoni -->
    <section class="article">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-once="true">
                    <h2 class="section-heading">Testimoni</h2>
                    <p class="subheading">Apa kata mereka tentang ParentCare?
                    </p>
                </div>
            </div>
            <div class="row">
                <?php
                if ($row_test > 0) {
                    foreach ($result_test as $rowTest) {
                        $no = 1;
                        $id = $row['id'];
                        echo '
                <div class="col-12 col-md-6 col-lg-4 mt-4" data-aos="fade-up" data-aos-once="true" data-aos-delay="100">
                    <div class="card">
                        <div class="testi">
                            <p>"' . $rowTest['deskripsi'] . '" </p>
                <h6 class="article-categories">' . $rowTest['username'] . '</h6>
                <p class="article-time">' . $row_test['tgl'] . '</p>

            </div>
        </div>
        </div>';
                    }
                } else {
                    echo '<div class="row mt-4">

            <div class="tittle-card mt-1">
                <p class="price m-0">Tidak ada data yang ditemukan
                </p>
            </div>';
                }

                if (isset($no)) {
                    $no++;
                } ?>

            </div>
        </div>
    </section>
    <!-- Article -->
    <!-- Footer -->
    <section class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3 mt-3">
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
                    <div class="sosmed mt-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <a href="https://wa.me/6281393015244" target="_blank" class="infotxt"><i class="bx bxl-whatsapp pe-2"></i></a>
                                <a href="#"><i class='bx bxl-instagram px-2'></i></a>
                                <a href="#"><i class='bx bxl-facebook-circle ps-2'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-1">

                </div>
                <div class="col-12 col-md-4 col-lg-2">
                    <div class="info mt-4">
                        <h3>About ParentCare</h3>
                        <div class="footer-list mt-lg-3">
                            <li><a class="nav-footer" href="#">Tentang Kami</a></li>
                            <li><a class="nav-footer" href="#">Hubungi Kami</a></li>
                            <li><a class="nav-footer" href="#">ParentCare Happy</a></li>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-2">
                    <div class="info mt-4">
                        <h3>More</h3>
                        <div class="footer-list mt-lg-3">
                            <li><a class="nav-footer" href="#">Syarat & Ketentuan</a></li>
                            <li><a class="nav-footer" href="#">Privasi</a></li>
                            <li><a class="nav-footer" href="#">Iklan</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="../../scripts/fetch news API index.js"></script>
</body>

</html>