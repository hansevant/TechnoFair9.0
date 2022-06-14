<?php
require_once('../../config/koneksi.php');

if (isset($_POST["edit_ketua"])) {

    $id_ketua       =  mysqli_real_escape_string($con, $_POST['id_ketua']);
    $nama_ketua     =  mysqli_real_escape_string($con, $_POST['nama_ketua']);
    $kelas_ketua    =  mysqli_real_escape_string($con, $_POST['kelas_ketua']);
    $jurusan_ketua  =  mysqli_real_escape_string($con, $_POST['jurusan_ketua']);
    $idline_ketua   =  mysqli_real_escape_string($con, $_POST['idline_ketua']);
    $nohp_ketua     =  mysqli_real_escape_string($con, $_POST['nohp_ketua']);
    $email_ketua    =  mysqli_real_escape_string($con, $_POST['email_ketua']);

    $query = mysqli_query($con, "UPDATE user_ketua 
                                 SET    nama_ketua    = '$nama_ketua',
                                        kelas_ketua   = '$kelas_ketua',
                                        jurusan_ketua = '$jurusan_ketua',
                                        idline_ketua  = '$idline_ketua',
                                        nohp_ketua    = '$nohp_ketua',
                                        email_ketua   = '$email_ketua'
                                 WHERE  id_ketua      = '$id_ketua' ");


    if ($query) {
        echo "<script>alert('Data ketua berhasil diubah'); 
            location.href='../leader/tim.php' </script>";
    } else {
        echo "<script>alert('Data Ketua gagal diubah'); 
             location.href='../leader/tim.php' </script>";

    }
}
