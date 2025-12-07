<?php
include '../koneksi.php';
$kendaraan_nomor = $_POST['kendaraan_nomor'];
$kendaraan_nama = $_POST['kendaraan_nama'];
$kendaraan_type = $_POST['kendaraan_type'];
$kendaraan_harga_perhari = $_POST['kendaraan_harga_perhari'];
mysqli_query($koneksi, "INSERT INTO kendaraan
(kendaraan_nomor, kendaraan_nama, kendaraan_type, kendaraan_harga_perhari)
VALUES
('$kendaraan_nomor', '$kendaraan_nama', '$kendaraan_type', '$kendaraan_harga_perhari')");
header("location:kendaraan.php");
?>
