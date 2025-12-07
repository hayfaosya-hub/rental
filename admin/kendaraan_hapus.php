<?php
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM kendaraan WHERE kendaraan_nomor='$id'");
echo "<script>alert('Data akan dihapus?'); window.location.href='kendaraan.php'</script>";
?>
