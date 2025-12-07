<?php
include '../koneksi.php';
session_start();

$kendaraan_nomor = $_POST['kendaraan_nomor'];
$user_id         = $_SESSION['user_id'];
$tgl_pinjam      = $_POST['tgl_pinjam'];
$tgl_kembali     = $_POST['tgl_kembali'];

mysqli_query($koneksi, "
    INSERT INTO pinjam 
    (kendaraan_nomor, user_id, tgl_pinjam, tgl_kembali, pinjam_status)
    VALUES('$kendaraan_nomor', '$user_id', '$tgl_pinjam', '$tgl_kembali', '2')
");

mysqli_query($koneksi, "
    UPDATE kendaraan SET 
        kendaraan_status = 2
    WHERE kendaraan_nomor = '$kendaraan_nomor'
");

header("location: pinjam.php");
?>
