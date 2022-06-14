<?php
session_start();
require_once('../../config/koneksi.php');
header("X-XSS-Protection: 1; mode=block");

if (isset($_POST["submit_cp"])) {

    $newpass    =  mysqli_real_escape_string($con, $_POST['newpass']);
    $cpass    =  mysqli_real_escape_string($con, $_POST['cpass']);

    if ($newpass == $cpass) {

        $query = mysqli_query($con, "UPDATE acc_user 
                                SET `password` = PASSWORD('$newpass'),
                                    forgot_pass = 0
                                WHERE id_user = '$_SESSION[id_user]' ");
        if ($query) {
            echo "<script>alert('Password berhasil diubah'); 
                                            location.href='../leader/index.php' </script>";
        } else {
            echo "<script>alert('Password gagal diubah'); 
                                            location.href='../leader/changepass.php' </script>";
        }
    } else {
        echo "<script>alert('Password tidak sama mohon ulangi'); 
                    location.href='../leader/changepass.php' </script>";
    }
}
