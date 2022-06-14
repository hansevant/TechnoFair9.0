<?php
session_start();
require_once('../../config/koneksi.php');

if (isset($_POST['submit_bayar'])) {

    $id_user = mysqli_real_escape_string($con, $_POST['id_user']);

    $nomor_acak = round(microtime(true));
    $payment = $_FILES['payments']['name'];
    $tipe_file_payment = $_FILES['payments']['type'];
    $file_tmp_payment = $_FILES['payments']['tmp_name'];

    $payment_baru = $nomor_acak . '_' . $payment;
    $a = mysqli_query($con, "SELECT `payment` FROM `user_payment` WHERE `id_user` = '$id_user' ");
    $cek = mysqli_fetch_assoc($a);

    if ($cek['payment'] != NULL) {
        $folder = "../folder/payment/$cek[payment]";
        unlink($folder);
        $del = mysqli_query($con, "DELETE `payment` FROM `user_payment` WHERE `id_user` = '$id_user' ");

        if ($tipe_file_payment == "image/jpeg" || $tipe_file_payment == "image/png" || $tipe_file_payment == "image/jpg") {
            $update_payment = mysqli_query($con, "UPDATE `user_payment` 
                                                  SET `payment` = '$payment_baru',
                                                      `stat_payment` = 1
                                                  WHERE `id_user` = '$id_user' ");
            @move_uploaded_file($file_tmp_payment, "../folder/payment/" . $payment_baru);

            if ($update_payment) {
                echo "<script>alert('payment berhasil upload');
                        location.href='../leader/pembayaran.php';</script>";
            } else {
                echo "<script>alert('payment gagal di upload');
                        location.href='../leader/pembayaran.php';</script>";
            }
        } else {
            echo "<script>alert('Maaf format file payment selain JPG/PNG/JPEG tidak di dukung');
                    location.href='../leader/pembayaran.php';</script>";
        }
    } else {
        if ($tipe_file_payment == "image/jpeg" || $tipe_file_payment == "image/png" || $tipe_file_payment == "image/jpg") {
            $update_payment = mysqli_query($con, "UPDATE `user_payment` 
                                                  SET `payment` = '$payment_baru',
                                                  `stat_payment` = 1 
                                                  WHERE `id_user` = '$id_user' ");
            @move_uploaded_file($file_tmp_payment, "../folder/payment/" . $payment_baru);

            if ($update_payment) {
                echo "<script>alert('payment berhasil upload');
                        location.href='../leader/pembayaran.php';</script>";
            } else {
                echo "<script>alert('payment gagal di upload');
                        location.href='../leader/pembayaran.php';</script>";
            }
        } else {
            echo "<script>alert('Maaf format file Foto formal selain JPG/PNG/JPEG tidak di dukung');
                    location.href='../leader/pembayaran.php';</script>";
        }
    }
}
