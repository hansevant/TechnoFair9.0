<?php
session_start();
require_once('../../config/koneksi.php');
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$sql = mysqli_query($con, "SELECT * FROM `acc_user` WHERE `username` = '$username' AND `password` = PASSWORD('$password') ");

$cek = mysqli_num_rows($sql);
$data = mysqli_fetch_array($sql);

if ($cek > 0) {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama_tim'] = $data['nama_tim'];

    echo "<script>alert('Berhasil Login, Selamat datang $_SESSION[username] '); 
            location.href='../../has_login/leader/' </script>";
} else {
    echo "<script>alert('Gagal login, akun tidak ditemukan '); 
            location.href='../login' </script>";
}
