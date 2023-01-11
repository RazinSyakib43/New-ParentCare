<?php

include '../../koneksi.php';
session_start();

$id = $_SESSION['id'];

$query_user = "SELECT * FROM tb_customer INNER JOIN
tb_user ON tb_user.id = tb_customer.id WHERE tb_customer.id = '$id'";

$result_user = mysqli_query($conn, $query_user);
$row_user = mysqli_fetch_assoc($result_user);

$queryTr = "SELECT * FROM tb_customer LEFT JOIN tb_transaksi
ON tb_customer.id = tb_transaksi.id LEFT JOIN tb_detail
ON tb_detail.id_trans = tb_transaksi.id LEFT JOIN tb_paket
ON tb_detail.id_paket = tb_paket.id_paket
WHERE tb_customer.id = '$id'";

$resultTr = mysqli_query($conn, $queryTr);
$rowTr = mysqli_fetch_assoc($resultTr);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta dicoding -->
    <meta name="dicoding:email" content="muhammadrazin14@gmail.com">
    <title>ParentCare - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                        <a class="nav-link active" aria-current="page" href="../User/dashboard.php">Home</a>
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
                        <a class="nav-link" href="../Forum Discussion/forum.php">Discuss</a>
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
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="article mt-5">
        <div class="container mt-5">
            <div class="row"></div>

            <div class="row mt-4 question-list">
                <div class="col-3">
                    <div class="profile">
                        <a class="navbar-brand mb-3 titleProfile text-center" href="#"><?php echo $row_user['nama'] ?></a>
                        <div class="col-12 fotoProfile">
                            <img src="../../asset/image/user/<?php echo $row_user['foto'] ?>" class="rounded-circle">
                        </div>
                        <div class="col-12 profile-description mt-2">
                            <p><?php echo $row_user['email'] ?></p>
                            <p><?php echo $row_user['gender'] ?></p>
                            <p><?php echo $row_user['tlp'] ?></p>
                            <p><?php echo $row_user['alamat'] ?></p>
                        </div>
                        <div class="col-3 mt-3"> <a href="edit-profile.php" class="btn btnEdit">Edit Profile</a>
                        </div>
                        <div class="col-3 mt-3"> <a href="edit-profile-history.php" class="btn btnHistory">History
                                Purchase</a>
                        </div>
                    </div>


                </div>

                <div class="col-9">
                    <div class="card">
                        <a class="navbar-brand mb-3 titleEdit" href="#">History Purchase</a>
                        <div class="history-card">
                            <?php
                            if ($rowTr > 0) {
                                foreach ($resultTr as $rowTrans) {
                                    $no = 1;
                                    $id = $rowTr['id'];
                                    echo '
                            <div class="row col-12 mb-3">

                                <div class="col-sm-3 d-flex align-items-center">
                                    <h1 class="namaPaket">' . $rowTrans['paket'] . '</h1>
                                </div>

                                <div class="col-sm-1">
                                    <div class="vl"></div>
                                </div>

                                <div class="col-sm-4">
                                    <p><b>Tanggal</b>: ' . $rowTrans['tglReservasi'] . '</p>
                                    <p><b>Harga</b>: Rp. ' . $rowTrans['harga'] . '</p>
                                </div>

                                <div class="col-sm-1">
                                    <div class="vl"></div>
                                </div>

                                <div class="col-sm-3 d-flex align-items-center">
                                    <h1 class="statusPending">' . $rowTrans['status'] . '</h1>
                                </div>
                            </div>
                            ';
                                }
                            }

                            if (isset($no)) {
                                $no++;
                            }                                         ?>
                        </div>
                    </div>

                    <div class="col-1"></div>
                </div>
            </div>

    </section>


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

    </section>



</body>

</html>