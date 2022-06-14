<?php
session_start();
require_once("../../config/koneksi.php");
header("X-XSS-Protection: 1; mode=block");

if (!isset($_SESSION['username']) > 0) {
    echo "<script>alert('Login Dulu ya'); 
      location.href='../../account/login/';</script>";
}
$select = mysqli_query($con, "SELECT * FROM acc_user WHERE id_user = '$_SESSION[id_user]' ");
while ($datas = mysqli_fetch_array($select)) {
    $id_comp = $datas['id_comp'];
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- partial:partials/head.php -->

<head>
    <title>Dashboard</title>
    <?php include_once "partials/head.php"; ?>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>

<body>
    <div class="container-scroller">

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <!-- partial:partials/navbar.php -->
            <?php include_once "partials/navbar.php"; ?>

            <!-- partial:partials/sidebar.php -->
            <?php include_once "partials/sidebar.php"; ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- INI CONTENT -->
                    <div class="card" style="border-radius: 10px !important;">
                        <div class="card-body">
                            <div class="mb-5">
                                <img src="../assets/img/logo.png" alt="" class="logo-images">
                                <div>
                                    <h1 class="title_welcome mt-4" style="color: black; text-align:center;">Welcome to TechnoFair 9.0 <br> Dashboard</h1>
                                    <br>
                                    <p style="color: black; text-align:center;">*Silahkan lengkapi data pada tab Tim Saya, Pembayaran & Berkas</p>
                                    <center> <br>
                                        <a href="template.php" class="btn btn-primary" style="color: light; text-align:center;">Template Berkas</a>
                                    </center>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- content-wrapper ends -->

                <!-- partial:partials/footer.php -->
                <?php include_once "partials/footer.php"; ?>

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- partial:partials/script.php -->
    <?php include_once "partials/script.php"; ?>
</body>

</html>