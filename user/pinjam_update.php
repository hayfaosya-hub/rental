<?php
include '../koneksi.php';

$id = $_POST['id_lama'];

$kendaraan_nomor = $_POST['kendaraan_nomor'];
$tgl_pinjam      = $_POST['tgl_pinjam'];
$tgl_kembali     = $_POST['tgl_kembali'];

mysqli_query($koneksi, "
    UPDATE pinjam SET
        kendaraan_nomor='$kendaraan_nomor',
        tgl_pinjam='$tgl_pinjam',
        tgl_kembali='$tgl_kembali'
    WHERE pinjam_id='$id'
");

header("location: pinjam.php");
?>
