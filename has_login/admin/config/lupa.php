<?php
include "../../../config/koneksi.php";
$id = $_GET['id_user'];
$newpass = 'technofair9.0';

$query = mysqli_query($con, "UPDATE acc_user 
                    SET `password` = PASSWORD('$newpass'),
                        forgot_pass = 1
                    WHERE id_user = $id
            ");

if ($query) {
    echo "<script>alert('Fungsi Lupa Password berhasil'); 
                                            location.href='../' </script>";
} else {
    echo "<script>alert('Fungsi Lupa Password gagal'); 
                                            location.href='../' </script>";
}
