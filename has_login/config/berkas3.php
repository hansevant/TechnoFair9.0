<?php
session_start();
require_once('../../config/koneksi.php');

if (isset($_POST['submit_berkas'])) {

    $id_user = mysqli_real_escape_string($con, $_POST['id_user']);

    $nomor_acak = round(microtime(true));
    $berkas = $_FILES['berkas']['name'];
    $tipe_file_berkas = $_FILES['berkas']['type'];
    $file_tmp_berkas = $_FILES['berkas']['tmp_name'];

    $berkas_baru = $nomor_acak . '_' . $berkas;
    $a = mysqli_query($con, "SELECT `berkas` FROM `user_berkas` WHERE `id_user` = '$id_user' ");
    $cek = mysqli_fetch_assoc($a);

    if ($cek['berkas'] != NULL) {
        $folder = "../folder/berkas/$cek[berkas]";
        unlink($folder);
        $del = mysqli_query($con, "DELETE `berkas` FROM `user_berkas` WHERE `id_user` = '$id_user' ");

        if ($tipe_file_berkas == "application/x-zip-compressed") {
            $update_berkas = mysqli_query($con, "UPDATE `user_berkas` 
                                                  SET `berkas` = '$berkas_baru',
                                                      `stat_berkas` = 1
                                                  WHERE `id_user` = '$id_user' ");
            @move_uploaded_file($file_tmp_berkas, "../folder/berkas/" . $berkas_baru);

            if ($update_berkas) {
                echo "<script>alert('berkas berhasil upload');
                        location.href='../leader/berkas.php';</script>";
            } else {
                echo "<script>alert('berkas gagal di upload');
                        location.href='../leader/berkas.php';</script>";
            }
        } else {
            echo "<script>alert('Maaf format file berkas selain ZIP tidak di dukung');
                    location.href='../leader/berkas.php';</script>";
        }
    } else {
        if ($tipe_file_berkas == "application/x-zip-compressed") {
            $update_berkas = mysqli_query($con, "UPDATE `user_berkas` 
                                                  SET `berkas` = '$berkas_baru',
                                                  `stat_berkas` = 1 
                                                  WHERE `id_user` = '$id_user' ");
            @move_uploaded_file($file_tmp_berkas, "../folder/berkas/" . $berkas_baru);

            if ($update_berkas) {
                echo "<script>alert('Berkas berhasil upload');
                        location.href='../leader/berkas.php';</script>";
            } else {
                echo "<script>alert('Berkas gagal di upload');
                        location.href='../leader/berkas.php';</script>";
            }
        } else {
            echo "<script>alert('Maaf format file berkas selain ZIP tidak di dukung');
                    location.href='../leader/berkas.php';</script>";
        }
    }
}
