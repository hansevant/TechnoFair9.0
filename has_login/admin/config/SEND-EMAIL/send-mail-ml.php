<?php
include "../koneksi.php";
 
// use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require "vendor/phpmailer/phpmailer/src/PHPMailer.php"; 
require "vendor/phpmailer/phpmailer/src/SMTP.php"; 
require "vendor/phpmailer/phpmailer/src/Exception.php";
require "vendor/autoload.php";

$nama_tujuan = mysqli_escape_string($connn, $_POST['nama_tujuan']);
$email_tujuan = mysqli_escape_string($connn, $_POST['email_tujuan']);
$id_u = mysqli_real_escape_string($connn, $_POST['id_u']);

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->SMTPDebug = 3;                               

$mail->isSMTP();                                   

$mail->Host = "fex2021.com";
$mail->SMTPAuth = true;                            
$mail->Username = "_mainaccount@fex2021.com";                 
$mail->Password = "6n7n16cUQp";                           
$mail->SMTPSecure = "ssl";                           
$mail->Port = 465;                                   
$mail->From = "_mainaccount@fex2021.com";
$mail->FromName = "FIKTI E-SPORTS EXPERIENCE 2021";
$mail->addAddress($email_tujuan, $nama_tujuan);
$mail->isHTML(true);

$mail->Subject = "Konfirmasi Workshop ''Be a Professional Gamers'' ";
$mail->Body = " Terima kasih telah mendaftar di Workshop Mobile Legends Be a Professional Gamers yang diselenggarakan oleh FIKTI E-Sports Experience 2021. 
                <br>
                Workshop akan dimulai pada :
                <br>

                <table>
                    <tr>
                        <td>Hari, Tanggal</td>
                        <td>:</td>
                        <td>Rabu, 10 Maret 2021</td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td>:</td>
                        <td>08.45 - Selesai</td>
                    </tr>
                    <tr>
                        <td>Tempat</td>
                        <td>:</td>
                        <td>Zoom Cloud Meetings</td>
                    </tr>
                </table>
                <br>
                
                Silahkan klik link dibawah ini untuk bergabung dengan Grup line
                <table>
                    <tr>
                        <td>Line</td>
                        <td>:</td>
                        <td>https://line.me/R/ti/g/Yu3cugYm-G</td>
                    </tr>
                </table>
                <br>

                Anda dapat menggunakan iOS, atau Android untuk bergabung dengan grup line.
                <br>

                Catatan:
                <ul>
                    <li> Link ini tidak dapat Anda bagikan pada orang lain.</li>
                    <li> Gunakan nama asli Anda yang telah terdaftar pada saat registrasi.</li>
                </ul>
                <br>

                Untuk informasi lebih lanjut dapat menghubungi contact person kami :
                <br>
                <br>
                Tsamara
                <table>
                    <tr>
                        <td>WhatsApp</td>
                        <td>:</td>
                        <td>081298650583</td>
                    </tr>
                    <tr>
                        <td>LINE</td>
                        <td>:</td>
                        <td>tsmrhsnfdyh</td>
                    </tr>
                </table>
                
                <br>
                Media sosial kami :
                <br>
                <table>
                    <tr>
                        <td>Line</td>
                        <td>:</td>
                        <td>@865ikgvt</td>
                    </tr>
                    <tr>
                        <td>Instagram</td>
                        <td>:</td>
                        <td>@fosc_ug</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>:</td>
                        <td>fosc.bemfikti@gmail.com</td>
                    </tr>
                </table>

                <br>

                Website Kami :
                <br>
                https://fex2021.com/
                <br>
                <br>

                FEX 2021
                <br>
                Presented by FOSC
                <br>
                <br>
                
                Bergerak Maju,
                <br>
                Semangat Baru.
                <br>
                <br>
                
                Departemen Olahraga
                <br>
                BEM FIKTI UG 2020/2021
                <br>
                fikti.bem.gunadarma.ac.id";

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{

    $queries = mysqli_query($connn, "UPDATE users SET stat = 1 WHERE id_u = $id_u ");

    echo "<script>alert('Has Been Approved'); 
    location.href='../../page/workshop/ml.php';</script>";
}