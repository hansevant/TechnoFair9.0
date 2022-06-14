<?php
include "../../config/koneksi.php";

// use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;

require "SEND-EMAIL/vendor/phpmailer/phpmailer/src/PHPMailer.php";

require "SEND-EMAIL/vendor/phpmailer/phpmailer/src/SMTP.php";

require "SEND-EMAIL/vendor/phpmailer/phpmailer/src/Exception.php";

require "SEND-EMAIL/vendor/autoload.php";

include "blank.php"; //untuk nutupin script dibalik layar

include "bigdataemail.php";

include "smartcityemail.php";

if (isset($_POST["daftar"])) {

    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $asal = mysqli_real_escape_string($con, $_POST['asal']);
    $instansi = mysqli_real_escape_string($con, $_POST['instansi']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $nohp  = mysqli_real_escape_string($con, $_POST['nohp']);
    $idline = mysqli_real_escape_string($con, $_POST['idline']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $event  = mysqli_real_escape_string($con, $_POST['event']);


    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->SMTPDebug = 3;

    $mail->isSMTP();

    $mail->Host = "www.technofair.id";

    $mail->SMTPAuth = true;

    $mail->Username = "_admin@technofair.id";

    $mail->Password = "s7Ey}bs*Qz!M";

    $mail->SMTPSecure = "ssl";

    $mail->Port = 465;

    $mail->From = "admin@technofair.id";

    $mail->FromName = "TECHNOFAIR 9.0";

    $mail->addAddress($email, $nama);

    $mail->isHTML(true);

    $mail->Subject = "Konfirmasi Status Pendaftaran TechnoFair";



    $query = mysqli_query($con, "INSERT INTO webinar (nama, asal, instansi, `status`, nohp, idline, email,`event`) 
                            VALUES ('$nama','$asal','$instansi','$status','$nohp', '$idline','$email','$event')
                            ");

    if ($event == 'Big Data') {

        $mail->Body = $bodybigdata;

        if (!$mail->send()) {

            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {

            echo "<script>alert('Berhasil Mendaftar');
            location.href='../link/bigdata.html' </script>";
        }
    } else {

        $mail->Body = $bodysmartcity;

        if (!$mail->send()) {

            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {

            echo "<script>alert('Berhasil Mendaftar'); 
                location.href='../link/smartcity.html' </script>";
        }
    }
}
