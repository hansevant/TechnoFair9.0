<?php
session_start();
require_once("../../config/koneksi.php");
header("X-XSS-Protection: 1; mode=block");

if (!isset($_SESSION['id']) > 0) {
    echo "<script>alert('Login Dulu ya'); 
      location.href='../../account/login/';</script>";
}

$id_user = $_GET['id_user'];

$queries = mysqli_query($con, "SELECT acc_user.*, competition.* 
FROM acc_user
JOIN competition ON acc_user.id_comp = competition.id_comp
WHERE id_user = $id_user ");
while ($data = mysqli_fetch_array($queries)) {
    $nama_tim = $data['nama_tim'];
    $competition = $data['jenis_comp'];
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- partial:partials/head.php -->

<head>
    <title>Detail Tim</title>
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
                    <h2><?= $competition; ?></h2> <br>
                    <h3 class="mb-3">Anggota TIM <?= $nama_tim; ?></h3>
                    <!-- INI CONTENT -->

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered display">
                            <thead>
                                <tr>
                                    <th class="bg-cyan text-center">Anggota</th>
                                    <th class="bg-cyan text-center">No Hp</th>
                                    <th class="bg-cyan text-center">Email</th>
                                </tr>
                            </thead>
                            <tbody class="mt-5">
                                <?php
                                $id_user = $_GET['id_user'];
                                // echo $id_user;
                                $queries = mysqli_query($con, "SELECT * FROM user_anggota
                                                   WHERE id_user = $id_user ");
                                while ($data = mysqli_fetch_array($queries)) {
                                    $nama_anggota = $data['nama_anggota'];
                                    $nohp_anggota = $data['nohp_anggota'];
                                    $email_anggota = $data['email_anggota'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $nama_anggota; ?></td>
                                        <td class="text-center"><?= $nohp_anggota; ?></td>
                                        <td class="text-center"><?= $email_anggota; ?></td>
                                    <?php
                                }
                                    ?>
                                    </tr>
                            </tbody>
                        </table>
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