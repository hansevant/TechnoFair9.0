<?php
include "../../../config/koneksi.php";
if (isset($_POST['submit'])) {
    $stat_acc = mysqli_real_escape_string($con, $_POST['stat_acc']);

    $queries = mysqli_query($con, "UPDATE acc_user SET stat_acc = '$stat_acc' ");

    echo "<script>alert('Status pendaftaran berhasil diubah'); 
    location.href='../';</script>";
}