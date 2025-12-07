<?php
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT kendaraan_nomor FROM pinjam WHERE pinjam_id='$id'");
$d = mysqli_fetch_assoc($data);
$kendaraan_nomor = $d['kendaraan_nomor'];

mysqli_query($koneksi, "DELETE FROM pinjam WHERE pinjam_id='$id'");

mysqli_query($koneksi, "
    UPDATE kendaraan 
    SET kendaraan_status='1'
    WHERE kendaraan_nomor='$kendaraan_nomor'
");

echo "<script>alert('Pinjaman dibatalkan'); window.location.href='pinjam.php'</script>";
?>
