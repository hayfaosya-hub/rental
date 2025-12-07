<?php
include '../koneksi.php';

$pinjam_id      = $_POST['pinjam_id'];
$kendaraan_baru = $_POST['kendaraan_nomor'];
$user_id        = $_POST['user_id'];
$tgl_pinjam     = $_POST['tgl_pinjam'];
$tgl_kembali    = $_POST['tgl_kembali'];

// Ambil kendaraan lama
$cek = mysqli_query($koneksi, "SELECT kendaraan_nomor FROM pinjam WHERE pinjam_id='$pinjam_id'");
$dataLama = mysqli_fetch_assoc($cek);
$kendaraan_lama = $dataLama['kendaraan_nomor'];

// Kembalikan kendaraan lama menjadi READY (1)
mysqli_query($koneksi, "UPDATE kendaraan SET kendaraan_status=1 
                        WHERE kendaraan_nomor='$kendaraan_lama'");

// Update data pinjam
mysqli_query($koneksi, "UPDATE pinjam SET 
        kendaraan_nomor='$kendaraan_baru',
        user_id='$user_id',
        tgl_pinjam='$tgl_pinjam',
        tgl_kembali='$tgl_kembali'
    WHERE pinjam_id='$pinjam_id'");

// Kendaraan baru jadi DIPINJAM (2)
mysqli_query($koneksi, "UPDATE kendaraan SET kendaraan_status=2 
                        WHERE kendaraan_nomor='$kendaraan_baru'");

header("location:pinjam.php");
?>
