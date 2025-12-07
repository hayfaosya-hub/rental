<?php
    include '../koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_nama = $_POST['user_nama'];
    $user_alamat = $_POST['user_alamat'];
    mysqli_query($koneksi,"insert into user values('', '$username', '$password', '$user_nama','$user_alamat','2')");
    header("location:user.php");
?>