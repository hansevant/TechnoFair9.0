<?php

include "./../../../../config/koneksi.php"; // ubah file path konekso



// use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;



require "../../SEND-EMAIL/vendor/phpmailer/phpmailer/src/PHPMailer.php";

require "../../SEND-EMAIL/vendor/phpmailer/phpmailer/src/SMTP.php";

require "../../SEND-EMAIL/vendor/phpmailer/phpmailer/src/Exception.php";

require "../../SEND-EMAIL/vendor/autoload.php";



$nama = mysqli_escape_string($con, $_POST['nama']);

$email = mysqli_escape_string($con, $_POST['email']);

$id = mysqli_real_escape_string($con, $_POST['id']);



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

$mail->Body = "Terima kasih telah mendaftar di Kompetisi yang diselenggarakan oleh TechnoFair 9.0 ''Concrete Actions In Implementing Technological Developments In The Disruptive Era'' 

<br>

<br>



<b>Mohon maaf pembayaran anda ditolak silahkan ikuti langkah berikut:</b>



<br>

1. Silahkan unggah kembali data anda sesuai dengan format yang ditentukan.

<br>

2. Konfirmasi Via WhatsApp <a href='wa.me/6285778157111'>Whatsapp Contact 1</a> atau <a href='wa.me/6285156984781'>Whatsapp Contact 2</a>



<br>



Untuk informasi lebih lanjut dapat menghubungi contact person kami :

<br>

<br>

Erika

<table>

    <tr>

        <td>WhatsApp</td>

        <td>:</td>

        <td>085778157111</td>

    </tr>

    <tr>

        <td>LINE</td>

        <td>:</td>

        <td>raisazka28 </td>

    </tr>

</table>



<br>

Marcel

<table>

    <tr>

        <td>WhatsApp</td>

        <td>:</td>

        <td>085156984781</td>

    </tr>

    <tr>

        <td>LINE</td>

        <td>:</td>

        <td>mcngb25  </td>

    </tr>

</table>



<br>

Media sosial kami :

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



    $queries = mysqli_query($con, "UPDATE workshop SET stat_payment = 2 WHERE id = '$id' ");



    echo "<script>alert('Payment Has Been Rejected'); 

    location.href='../../../ctf.php';</script>";

}

