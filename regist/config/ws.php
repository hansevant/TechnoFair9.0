<?php
include "../../config/koneksi.php";

if (isset($_POST["daftar"])) {

    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $asal = mysqli_real_escape_string($con, $_POST['asal']);
    $instansi = mysqli_real_escape_string($con, $_POST['instansi']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $nohp  = mysqli_real_escape_string($con, $_POST['nohp']);
    $idline = mysqli_real_escape_string($con, $_POST['idline']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $event  = mysqli_real_escape_string($con, $_POST['event']);

    $nomor_acak = round(microtime(true));
    $foto = $_FILES['payment']['name'];
    $tipe_foto = $_FILES['payment']['type'];
    $file_tmp = $_FILES['payment']['tmp_name'];
    $file_size = $_FILES['payment']['size'];
    $foto_baru = $nomor_acak . '_' . $foto;


    // $query = mysqli_query($con, "INSERT INTO workshop (nama, asal, instansi, `status`, nohp, idline, email,`event`,payment) 
    //                         VALUES ('$nama','$asal','$instansi','$status','$nohp', '$idline','$email','$event','$payment)
    //                         ");

    if ($file_size < 5000000) {
        if ($tipe_foto == "image/jpeg" || $tipe_foto == "image/jpg" || $tipe_foto == "image/png") {
            @move_uploaded_file($file_tmp, "../payment/" . $foto_baru);

            $query = mysqli_query($con, "INSERT INTO `workshop` (`nama`, `asal`, `instansi`, `status`, `nohp`, `idline`, `email`,`event`,`payment`) 
                                        VALUES ('$nama','$asal','$instansi','$status','$nohp', '$idline','$email','$event','$foto_baru')
                                        ");

            echo "<script>alert('Berhasil....!!!');
            location.href='../link/workshop.html';</script>";
        } else {
            echo "<script>alert('Maaf format file berkas selain JPG/JPEG tidak di dukung');
            location.href='../ws.php';</script>";
        }
    } else {
        echo "<script>alert('size terlalu besar');
            location.href='../ws.php';</script>";
    }


    // if ($query) {
    //     echo "<script>alert('Berhasil mendaftar'); 
    //             location.href='../link/workshop.html' </script>";
    // } else {
    //     echo "<script>alert('Gagal mendaftar'); 
    //             location.href='../ws.php' </script>";
    // }
}
