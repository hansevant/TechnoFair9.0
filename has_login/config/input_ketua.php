<?php
require_once('../../config/koneksi.php');

if (isset($_POST["input_ketua"])) {

    $id_user        =  mysqli_real_escape_string($con, $_POST['id_user']);
    $nama_ketua     =  mysqli_real_escape_string($con, $_POST['nama_ketua']);
    $kelas_ketua    =  mysqli_real_escape_string($con, $_POST['kelas_ketua']);
    $jurusan_ketua  =  mysqli_real_escape_string($con, $_POST['jurusan_ketua']);
    $idline_ketua   =  mysqli_real_escape_string($con, $_POST['idline_ketua']);
    $nohp_ketua     =  mysqli_real_escape_string($con, $_POST['nohp_ketua']);
    $email_ketua    =  mysqli_real_escape_string($con, $_POST['email_ketua']);

    $query = mysqli_query($con, "INSERT INTO user_ketua (id_user, nama_ketua, kelas_ketua, jurusan_ketua, idline_ketua, nohp_ketua, email_ketua) 
                        VALUES ('$id_user','$nama_ketua','$kelas_ketua','$jurusan_ketua','$idline_ketua', '$nohp_ketua','$email_ketua')");

    if ($query) {
        echo "<script>alert('Data ketua berhasil dimasukkan'); 
                location.href='../leader/tim.php' </script>";
    } else {
         echo "<script>alert('Data ketua gagal dimasukkan'); 
                 location.href='../leader/tim.php' </script>";
    }
}
