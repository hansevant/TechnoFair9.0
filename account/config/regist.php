<?php
require_once("../../config/koneksi.php");

$nama_tim = mysqli_real_escape_string($con, $_POST['nama_tim']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$instansi = mysqli_real_escape_string($con, $_POST['instansi']);
$id_comp  = mysqli_real_escape_string($con, $_POST['id_comp']);

$select_id = mysqli_query($con, "SELECT MAX(id_user) AS idTerbesar FROM acc_user");

if ($select_id == FALSE) {
    $id_user = 1;
} else {
    $cek = mysqli_fetch_array($select_id);
    $id_user = $cek['idTerbesar'];
    $id_user++;
}

$insert  = "INSERT INTO `acc_user`(`id_user`, `id_comp`, `nama_tim`, `username`, `password`, `instansi`, `stat_acc`, `stat_final`) 
            VALUES ('$id_user', '$id_comp', '$nama_tim', '$username', PASSWORD('$password'), '$instansi', 0, 0);";
$insert .= "INSERT INTO `user_payment`(`id_user`, `payment`, `stat_payment`) 
            VALUES ('$id_user', NULL, 0);";
$insert .= "INSERT INTO `user_berkas`(`id_user`, `berkas`, `stat_berkas`) 
            VALUES ('$id_user', NULL, 0)";

$query = mysqli_multi_query($con, $insert);

if ($query) {
    echo "<script>alert('Berhasil mendaftar, silakan login'); 
                location.href='../login/' </script>";
} else {
    echo "<script>alert('Gagal mendaftar, username sudah terpakai'); 
                location.href='../login/' </script>";
}
