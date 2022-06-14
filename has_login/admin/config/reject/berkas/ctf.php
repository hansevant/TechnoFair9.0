<?php
include "../../../../../config/koneksi.php";
if (isset($_POST['submit'])) {
    $id_user = mysqli_real_escape_string($con, $_POST['id_user']);

    $queries = mysqli_query($con, "UPDATE user_berkas SET stat_berkas = 2 WHERE id_user = '$id_user' ");

    echo "<script>alert('Berkas Has Been Rejected'); 
    location.href='../../../ctf.php';</script>";
}
