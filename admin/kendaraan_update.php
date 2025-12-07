<?php
include '../koneksi.php';

$kendaraan_nomor = $_POST['kendaraan_nomor'];
$kendaraan_nama = $_POST['kendaraan_nama'];
$kendaraan_type = $_POST['kendaraan_type'];
$kendaraan_harga_perhari = $_POST['kendaraan_harga_perhari'];

mysqli_query($koneksi,"UPDATE kendaraan 
    SET kendaraan_nama='$kendaraan_nama',
        kendaraan_type='$kendaraan_type',
        kendaraan_harga_perhari='$kendaraan_harga_perhari'
    WHERE kendaraan_nomor='$kendaraan_nomor'");

echo "<script>alert('Data telah diubah'); window.location.href='kendaraan.php'</script>";
?>
