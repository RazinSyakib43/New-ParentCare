<?php

include '../../koneksi.php';
session_start();

$id = $_SESSION['id'];

$query_user = "SELECT * FROM tb_customer INNER JOIN
tb_user ON tb_user.id = tb_customer.id WHERE tb_customer.id = '$id'";

$result_user = mysqli_query($conn, $query_user);
$row_user = mysqli_fetch_assoc($result_user);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta dicoding -->
    <meta name="dicoding:email" content="muhammadrazin14@gmail.com">
    <title>ParentCare - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-4 bgcolor" data-aos="fade-down">
            <div class="container-xl">
                <a class="navbar-brand" href="#">Parent<span>Care</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                        <a class="nav-link" href="../Forum Discussion/forum.php">Discuss</a>
                        <a class="nav-link" href="#">Discuss</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img width="40px" src="../../asset/image/user/<?php echo $row_user['foto'] ?>"
                                    alt="Profile">

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
                        <a class="navbar-brand mb-3 titleProfile text-center"
                            href="#"><?php echo $row_user['nama'] ?></a>
                        <div class="col-12 fotoProfile">
                            <img src="../../asset/image/user/<?php echo $row_user['foto'] ?>">
                        </div>
                        <div class="col-12 profile-description mt-2">
                            <p><?php echo $row_user['email'] ?></p>
                            <p><?php echo $row_user['gender'] ?></p>
                            <p><?php echo $row_user['tlp'] ?></p>
                            <p><?php echo $row_user['alamat'] ?></p>
                        </div>
                        <div class="col-3 mt-3"> <a href="#editProfile" class="btn btnEdit">Edit Profile</a></div>
                        <div class="col-3 mt-3"> <a href="edit-profile-history.php" class="btn btnHistory">History
                                Purchase</a>
                        </div>
                    </div>
                </div>

                <div class="col-9">
                    <div class="card">
                        <a class="navbar-brand mb-3 titleEdit" id="editProfile">Edit Profile</a>
                        <form action="../../process/editUser.php" method="post">
                            <div class="row col-12 mb-3">
                                <div class="col-sm">
                                    <label for="" class="form-label">Name</label>
                                    <input date class="add-topic-title" value="<?php echo $row_user['nama'] ?>"
                                        name="nama">
                                </div>
                                <!-- <div class="col-lg-4">
                                    <label for="" class="form-label">Gender</label>
                                    <div class="genderRadio d-flex">
                                        <div class="form-checks me-4">
                                            <div class="cardGender">
                                                <input class="form-check-inputs" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-checks me-4">
                                            <div class="cardGender">
                                                <input class="form-check-inputs" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>

                                    </div> -->

                            </div>
                            <div class="row col-12 mb-3">
                                <div class="row col-12 mb-3">
                                    <label for="" class="form-label">Phone Number</label>
                                    <input type="text" class="add-topic-title" value="<?php echo $row_user['tlp'] ?>"
                                        name="phoneNumber">
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="add-topic-title" value="<?php echo $row_user['email'] ?>"
                                        name="email">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="" class="form-label">Home Address</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"
                                        name="address"
                                        placeholder="Input Your Address"><?php echo $row_user['alamat'] ?></textarea>
                                </div>

                                <div class="col-3"> <button type="submit" class="btn btn-send">Save</button></div>

                            </div>

                        </form>
                    </div>

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
                                <a href="https://wa.me/6281393015244" target="_blank" class="infotxt"><i
                                        class="bx bxl-whatsapp pe-2"></i></a>
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
                            <li><a class="nav-footer" href="#"><img src="../../asset/image/icon/icons8-instagram-30.png"
                                        alt="Logo Instagram">
                                    Instagram</a></li>
                            <li><a class="nav-footer" href="#"><img src="../../asset/image/icon/icons8-facebook-30.png"
                                        alt="Logo Instagram"> Facebook</a></li>
                            <li><a class="nav-footer" href="#"><img src="../../asset/image/icon/icons8-twitter-30.png"
                                        alt="Logo Instagram"> Twitter</a></li>
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
