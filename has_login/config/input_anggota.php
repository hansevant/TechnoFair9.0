<?php
require_once('../../config/koneksi.php');

if (isset($_POST["input_anggota"])) {

    $id_user          =  mysqli_real_escape_string($con, $_POST['id_user']);
    $nama_anggota     =  mysqli_real_escape_string($con, $_POST['nama_anggota']);
    $kelas_anggota    =  mysqli_real_escape_string($con, $_POST['kelas_anggota']);
    $jurusan_anggota  =  mysqli_real_escape_string($con, $_POST['jurusan_anggota']);
    $email_anggota    =  mysqli_real_escape_string($con, $_POST['email_anggota']);
    $nohp_anggota    =  mysqli_real_escape_string($con, $_POST['nohp_anggota']);

    $query = mysqli_query($con, "INSERT INTO user_anggota
                    (id_user, nama_anggota, kelas_anggota, jurusan_anggota, email_anggota, nohp_anggota) 
                    VALUES ('$id_user','$nama_anggota','$kelas_anggota','$jurusan_anggota','$email_anggota','$nohp_anggota')");

    if ($query) {
        echo "<script>alert('Data anggota berhasil dimasukkan'); 
                location.href='../leader/tim.php' </script>";
    } else {
        echo "<script>alert('Data anggota gagal dimasukkan'); 
                location.href='../leader/tim.php' </script>";
    }
}
