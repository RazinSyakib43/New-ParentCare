<?php
include '../koneksi.php';
session_start();

$id = $_SESSION['id'];
$nama = $_FILES['file']['name'];


$queryUpdate = "UPDATE tb_keranjang SET buktiBayar = '$nama'  WHERE id_cust = '$id' AND insertedAt = (SELECT CURDATE())";

$queryInsert = "SELECT * FROM tb_keranjang  WHERE id_cust = '$id' AND insertedAt = (SELECT CURDATE())";

$result = mysqli_query($conn, $queryInsert);
$row = mysqli_fetch_assoc($result);

$idCust = $row['id_cust'];
$tgl = $row['tglReservasi'];
$total = $row['harga_paket'];
$jadwal = $row['jadwal'];
$waktu = $row['waktu'];
$paket = $row['paket'];
$harga = $row['harga_paket'];
$noRek = $row['no_rek'];

$queryCekJadwal = "SELECT tb_dokter.id as idDokter FROM tb_dokter INNER JOIN tb_detail_dokter
ON tb_dokter.id = tb_detail_dokter.id_dokter
INNER JOIN tb_jadwal ON tb_jadwal.id = tb_detail_dokter.id_jadwal
WHERE tb_jadwal.hari = '$jadwal' AND tb_jadwal.waktu = '$waktu' GROUP BY idDokter";

$resultCek = mysqli_query($conn, $queryCekJadwal);
$rowCek = mysqli_fetch_assoc($resultCek);

$id_dokter = $rowCek['idDokter'];

$queryInsertTrans = "INSERT INTO tb_transaksi VALUES ('','$id_dokter','$idCust','$total','$tgl', 'pending')";

$querycekPaket = "SELECT * FROM tb_paket WHERE paket = '$paket'";

$resultCekPaket = mysqli_query($conn, $querycekPaket);
$rowCekPaket = mysqli_fetch_assoc($resultCekPaket);

$idPaket = $rowCekPaket['id_paket'];

$querycekTr = "SELECT * FROM tb_transaksi WHERE id_cust = '$idCust' AND tglReservasi = '$tgl'";

$resultCekTr = mysqli_query($conn, $querycekTr);
$rowCekTr = mysqli_fetch_assoc($resultCekTr);

$tr = $rowCekTr['id'];

$queryInsertDetail = "INSERT INTO tb_detail VALUES ('', '$tr','$idPaket','$harga','$noRek')";

if (mysqli_query($conn, $queryUpdate) && mysqli_query($conn, $queryInsert) && mysqli_query($conn, $queryInsertTrans) && mysqli_query($conn, $queryInsertDetail)) {

    header("Location:../pages/User/dashboard.php");
} else {
    $error = urldecode("Data tidak berhasil disimpan");
    header("Location:../pages/Transaksi/konfirmasi pembayaran.php?error=$error");
}

mysqli_close($conn);