<?php

include "../../../../../config/koneksi.php"; // ubah file path koneksi



// use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;



require "../../SEND-EMAIL/vendor/phpmailer/phpmailer/src/PHPMailer.php";

require "../../SEND-EMAIL/vendor/phpmailer/phpmailer/src/SMTP.php";

require "../../SEND-EMAIL/vendor/phpmailer/phpmailer/src/Exception.php";

require "../../SEND-EMAIL/vendor/autoload.php";



$nama = mysqli_escape_string($con, $_POST['nama']); // ubah nama

$email = mysqli_escape_string($con, $_POST['email']); /// ubah email

$id = mysqli_real_escape_string($con, $_POST['id']);  // ubah id
 


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

$mail->Body = "Halo, Technoers!!<br>



Terimakasih telah mendaftar untuk acara Workshop UI Design ''Exploring UI Design Using Figma'' TechnoFair 9.0, yang dilaksanakan pada :

<br>


Hari, Tanggal : Minggu, 29 Mei 2022
Pukul : 13.00 - 16.00 WIB

<br>

<br>

Untuk informasi selanjutnya mengenai workshop akan dilanjutkan melalui grup WhatsApp.

<br>
Silahkan join grup melalui link berikut : https://chat.whatsapp.com/IDwGU6pxqjY3654ugAweIs .

<br>
Jika mengalami kendala dapat menghubungi contact person dibawah ini:

<br>

<br>

Husein

<table>

    <tr>

        <td>WhatsApp</td>

        <td>:</td>

        <td>082113322317</td>

    </tr>

    <tr>

        <td>LINE</td>

        <td>:</td>

        <td>ab_Roid </td>

    </tr>

</table>

<br>
Serta dapat mengikuti media sosial kami :

<br>

<table>

    <tr>

        <td>Line</td>

        <td>:</td>

        <td>@imx2464t</td>

    </tr>

    <tr>

        <td>Instagram</td>

        <td>:</td>

        <td>@technofair</td>

    </tr>

    <tr>

        <td>Twitter</td>

        <td>:</td>

        <td>technofair</td>

    </tr>

    <tr>

        <td>Facebook</td>

        <td>:</td>

        <td>TechnoFair</td>

    </tr>

    <tr>

        <td>Linkedin</td>

        <td>:</td>

        <td>TechnoFair</td>

    </tr>

    <tr>

        <td>Youtube</td>

        <td>:</td>

        <td>TechnoFair</td>

    </tr>

    <tr>

        <td>Website</td>

        <td>:</td>

        <td>www.technofair.id </td>

    </tr>

</table>



<br>



TechnoFair 9.0

<br>

Presented by TechnoFair

<br>

<br>
Kami tunggu kehadiran kalian yaa!!
<br>

Kolaborasi,

<br>

Satukan Asa,

<br>

Wujudkan Bersama. 

<br>

<br>









Departemen Akademik

<br>

KABINET SATU FIKTI

<br>

BEM FIKTI UG 2021/2022

<br>

fikti.bem.gunadarma.ac.id";



if (!$mail->send()) {

    echo "Mailer Error: " . $mail->ErrorInfo;

} else {



    $queries = mysqli_query($con, "UPDATE workshop SET stat_payment = 3 WHERE id = '$id' "); // ubah nama payment



    echo "<script>alert('Payment Has Been Approved'); 

    location.href='../../../ux_design.php';</script>";

}

