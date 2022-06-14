<?php
session_start();
require_once('../../config/koneksi.php');
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$sql = mysqli_query($con, "SELECT * FROM `admin_acc` WHERE `username` = '$username' AND `password` = PASSWORD('$password') ");

$cek = mysqli_num_rows($sql);
$data = mysqli_fetch_array($sql);

if ($cek > 0) {
    if ($data['id'] != 1) {
        echo "<script>alert('gagal'); 
        location.href='./' </script>";
    } else {
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];

        echo "<script>alert('Berhasil Login, Selamat datang admin '); 
                location.href='../../has_login/admin/' </script>";
    }
} else {
    echo "<script>alert('Gagal login, akun tidak ditemukan '); 
            location.href='./' </script>";
}
