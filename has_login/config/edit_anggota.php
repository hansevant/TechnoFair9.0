<?php
require_once('../../config/koneksi.php');

if (isset($_POST["edit_anggota"])) {

    $id_anggota       =  mysqli_real_escape_string($con, $_POST['id_anggota']);
    $nama_anggota     =  mysqli_real_escape_string($con, $_POST['nama_anggota']);
    $kelas_anggota    =  mysqli_real_escape_string($con, $_POST['kelas_anggota']);
    $jurusan_anggota  =  mysqli_real_escape_string($con, $_POST['jurusan_anggota']);
    $email_anggota    =  mysqli_real_escape_string($con, $_POST['email_anggota']);
    $nohp_anggota    =  mysqli_real_escape_string($con, $_POST['nohp_anggota']);

    $query = mysqli_query($con, "UPDATE user_anggota 
                                SET nama_anggota = '$nama_anggota',
                                    kelas_anggota = '$kelas_anggota',
                                    jurusan_anggota = '$jurusan_anggota',
                                    email_anggota = '$email_anggota',
                                    nohp_anggota = '$nohp_anggota'
                                WHERE id_anggota = '$id_anggota'");
}
if ($query) {
    echo "<script>alert('Data anggota berhasil diubah'); 
            location.href='../leader/tim.php' </script>";
} else {
    echo "<script>alert('Data anggota gagal diubah'); 
            location.href='../leader/tim.php' </script>";
}
