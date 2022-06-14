<?php
include "../../../../../config/koneksi.php";

// use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require "../../SEND-EMAIL/vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "../../SEND-EMAIL/vendor/phpmailer/phpmailer/src/SMTP.php";
require "../../SEND-EMAIL/vendor/phpmailer/phpmailer/src/Exception.php";
require "../../SEND-EMAIL/vendor/autoload.php";

$nama_ketua = mysqli_escape_string($con, $_POST['nama_ketua']);
$email_tujuan = mysqli_escape_string($con, $_POST['email_tujuan']);
$id_user = mysqli_real_escape_string($con, $_POST['id_user']);

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->SMTPDebug = 2;

$mail->isSMTP();

$mail->Host = "www.technofair.id";
$mail->SMTPAuth = true;
$mail->Username = "_admin@technofair.id";
$mail->Password = "s7Ey}bs*Qz!M";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->From = "admin@technofair.id";
$mail->FromName = "TECHNOFAIR 9.0";
$mail->addAddress($email_tujuan, $nama_ketua);
$mail->isHTML(true);

$mail->Subject = "Konfirmasi Status Pendaftaran TechnoFair";
$mail->Body = "Halo, Technoers!!
<br>
Terima kasih telah mendaftar di Kompetisi yang diselenggarakan oleh TechnoFair 9.0 ''Concrete Actions In Implementing Technological Developments In The Disruptive Era'' 
<br>
<br>

<b>Selamat pembayaran anda telah diterima silahkan periksa halaman user anda</b>
<br>
<br>
1. Silahkan join grup untuk informasi selanjutnya melalui link berikut : 
<br>
https://bit.ly/GroupPesertaCTF_TF9
<br>
<br>

2. Lengkapi berkas kompetisi dengan mengunggah dokumen yang dibutuhkan dari semua anggota dan disatukan menjadi file .zip pada halaman user anda
<br>
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

    $queries = mysqli_query($con, "UPDATE user_payment SET stat_payment = 3 WHERE id_user = '$id_user' ");

    echo "<script>alert('Payment Has Been Approved'); 
    location.href='../../../ctf.php';</script>";
}
