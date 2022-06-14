<?php
session_start();
require_once("../../config/koneksi.php");
header("X-XSS-Protection: 1; mode=block");

if (!isset($_SESSION['id']) > 0) {
    echo "<script>alert('Login Dulu ya'); 
      location.href='../../account/login/';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- partial:partials/head.php -->

<head>
    <title>Capture The Flag Admin</title>
    <?php include_once "partials/head.php"; ?>
    <link rel="stylesheet" href="assets/css/dashboard.css">
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

                    404 NOT FOUND


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