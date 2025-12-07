<?php
    include '../koneksi.php';

$kendaraan_nomor  = $_POST['kendaraan_nomor'];
$user_id = $_POST['user_id'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali= $_POST['tgl_kembali'];
$status = 2;

mysqli_query($koneksi, "INSERT INTO pinjam VALUES('', '$kendaraan_nomor', '$user_id', '$tgl_pinjam', '$tgl_kembali', '$status')");

mysqli_query($koneksi, "UPDATE kendaraan SET kendaraan_status = 2 WHERE kendaraan_nomor='$kendaraan_nomor'");

header("location:pinjam.php");
?>