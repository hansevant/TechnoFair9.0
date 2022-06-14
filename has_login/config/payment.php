<?php
require_once('../../config/koneksi.php');

if (isset($_POST["sumbit_bayar"])) {
    $id_user =  mysqli_real_escape_string($con, $_POST['id_user']);

    if ($_FILES['payment']['name']) {

        $nama_file = $_FILES['payment']['name'];
        $ukuran_file = $_FILES['payment']['size'];
        $tipe_file = $_FILES['payment']['type'];
        $tmp_file = $_FILES['payment']['tmp_name'];

        $nama_acak = round(microtime(true)) . '.';
        $nama_baru = $nama_acak . '_' . $nama_file;
        $path = "../folder/payment/" . $nama_baru;

        if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
            if (move_uploaded_file($tmp_file, $path)) {
                $query = "UPDATE user_payment 
                          SET payment       = '$nama_baru', 
                              stat_payment  = '1' 
                          WHERE id_user = '$id_user'";
                $result = mysqli_query($con, $query);

                if ($result) {
                    echo "<script>alert('Data ketua berhasil dimasukkan'); 
                            location.href='../leader/pembayaran.php' </script>";
                } else {
                     echo "<script>alert('Data ketua gagal dimasukkan'); 
                             location.href='../leader/pembayaran.php' </script>";
                }

                echo "<script>
                        alert('Suscces - Upload Pembayaran Berhasil');
                        document.location.href = '../leader/payment.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Failed - Upload Pembayaran Gagal. Harap input ulang kembali');
                        document.location.href = '../leader/payment.php';
                        <script>";
            }
        } else {
            echo "<script>
            alert('Failed - Upload Pembayaran Gagal. File tidak berupa JPG / JPEG / PNG, harap input ulang kembali');
            document.location.href = '../leader/payment.php';
            </script>";
        }
    }
}
