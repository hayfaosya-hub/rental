<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($query);
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['status'] = "login";
    $_SESSION['user_status'] = $data['user_status'];

    if ($data['user_status'] == 1) {
        header("location:admin/index.php");
        exit();
    }

    if ($data['user_status'] == 2) {
        header("location:user/index.php");
        exit();
    }

} else {
    header("location:index.php?pesan=gagal");
}
?>
