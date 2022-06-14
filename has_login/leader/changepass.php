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
    <title>Change Password</title>
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
                    <!-- INI CONTENT -->
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card" style="border-radius: 10px !important;">
                                <div class="card-body">
                                    <form class="form-sample" action="../config/changepass.php" method="post">
                                        <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                                        <div class="form-group">
                                            <h4>Password Baru</h4>
                                            <div class="input-group col-xs-12">
                                                <input type="password" name="newpass" class="form-control" placeholder="Masukkan Password lama">
                                            </div> <br>
                                            <h4>Konfirmasi Password Baru</h4>
                                            <div class="input-group col-xs-12">
                                                <input type="password" name="cpass" class="form-control" placeholder="Masukkan Password lama">
                                            </div>
                                        </div>
                                        <button type="submit" name="submit_cp" class="btn btn-primary">Submit</button>
                                    </form>
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