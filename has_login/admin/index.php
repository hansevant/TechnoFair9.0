<?php
session_start();
require_once("../../config/koneksi.php");
header("X-XSS-Protection: 1; mode=block");

if (!isset($_SESSION['id']) > 0) {
    echo "<script>alert('Login Dulu ya'); 
      location.href='../../account/login/';</script>";
}

$select_comp = mysqli_query($con, "SELECT count(*) FROM acc_user");
$select_ctf = mysqli_query($con, "SELECT count(*) FROM acc_user WHERE id_comp = 2");
$select_info = mysqli_query($con, "SELECT count(*) FROM acc_user WHERE id_comp = 1");
$select_smart = mysqli_query($con, "SELECT count(*) FROM acc_user WHERE id_comp = 3");
$select_ux = mysqli_query($con, "SELECT count(*) FROM acc_user WHERE id_comp = 4");
$select_wb = mysqli_query($con, "SELECT count(*) FROM webinar");
$select_bd = mysqli_query($con, "SELECT count(*) FROM webinar WHERE `event` = 'Big Data'");
$select_sm = mysqli_query($con, "SELECT count(*) FROM webinar WHERE `event` = 'Smart City'");
$select_ws = mysqli_query($con, "SELECT count(*) FROM workshop");
$select_dm = mysqli_query($con, "SELECT count(*) FROM workshop WHERE `event` = 'Digital Marketing'");
$select_ui = mysqli_query($con, "SELECT count(*) FROM workshop WHERE `event` = 'UI Design'");


$user = mysqli_query($con, "SELECT * FROM acc_user");
$account = mysqli_fetch_array($user);
$status = $account['stat_acc'];

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
                    <div class="row">
                        <div class="col-md-4 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">Competition</p>
                                    <?php
                                    while ($countallcp = mysqli_fetch_array($select_comp)) { ?>
                                        <p class="fs-30 mb-2"><?php echo $countallcp[0]; ?> </p>
                                    <?php } ?>
                                    </p>
                                </div>

                                <div class="card-footer">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownCompetition" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Selengkapnya
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownCompetition">
                                            <span class="dropdown-item">
                                                <p class="float left font-weight-bold">Capture The Flag
                                                </p>
                                                <?php
                                                while ($countctf = mysqli_fetch_array($select_ctf)) { ?>
                                                    <p class="float right">
                                                        <?php echo $countctf[0]; ?> tim
                                                    </p>
                                                <?php } ?>
                                            </span>
                                            <span class="dropdown-item">
                                                <p class="float left font-weight-bold">Infographic
                                                </p>
                                                <?php
                                                while ($countinfo = mysqli_fetch_array($select_info)) { ?>
                                                    <p class="float right">
                                                        <?php echo $countinfo[0]; ?> tim
                                                    <p>
                                                    <?php } ?>
                                            </span>
                                            <span class="dropdown-item">
                                                <p class="float left font-weight-bold">Smart FIKTI
                                                </p>
                                                <?php
                                                while ($countsmart = mysqli_fetch_array($select_smart)) { ?>
                                                    <p class="float right">
                                                        <?php echo $countsmart[0]; ?> tim
                                                    <p>
                                                    <?php } ?>
                                            </span>
                                            <span class="dropdown-item">
                                                <p class="float left font-weight-bold">UX Design
                                                </p>
                                                <?php
                                                while ($countux = mysqli_fetch_array($select_ux)) { ?>
                                                    <p class="float right">
                                                        <?php echo $countux[0]; ?> tim
                                                    <p>
                                                    <?php } ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4 mb-4 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Webinar</p>
                                    <?php
                                    while ($countallwb = mysqli_fetch_array($select_wb)) { ?>
                                        <p class="fs-30 mb-2"><?php echo $countallwb[0]; ?> </p>
                                    <?php } ?>
                                </div>

                                <div class="card-footer">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownWebinar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Selengkapnya
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownWebinar">
                                            <span class="dropdown-item">
                                                <p class="float left font-weight-bold">Big Data
                                                <p>
                                                    <?php
                                                    while ($countbd = mysqli_fetch_array($select_bd)) { ?>
                                                <p class="float right">
                                                    <?php echo $countbd[0]; ?> peserta
                                                </p>
                                            <?php } ?>
                                            </span>
                                            <span class="dropdown-item">
                                                <p class="float left font-weight-bold">Smart City
                                                <p>
                                                    <?php
                                                    while ($countsm = mysqli_fetch_array($select_sm)) { ?>
                                                <p class="float right">
                                                    <?php echo $countsm[0]; ?> peserta
                                                </p>
                                            <?php } ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">

                                <div class="card-body">
                                    <p class="mb-4">Workshop</p>
                                    <?php
                                    while ($countallws = mysqli_fetch_array($select_ws)) { ?>
                                        <p class="fs-30 mb-2"><?php echo $countallws[0]; ?> </p>
                                    <?php } ?>
                                </div>

                                <div class="card-footer">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownWorkshop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Selengkapnya
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownWorkshop">
                                            <span class="dropdown-item">
                                                <p class="float left font-weight-bold">Digital Marketing
                                                <p>
                                                    <?php
                                                    while ($countdm = mysqli_fetch_array($select_dm)) { ?>
                                                <p class="float right">
                                                    <?php echo $countdm[0]; ?> peserta
                                                </p>
                                            <?php } ?>
                                            </span>
                                            <span class="dropdown-item">
                                                <p class="float left font-weight-bold">UI Design
                                                <p>
                                                    <?php
                                                    while ($countui = mysqli_fetch_array($select_ui)) { ?>
                                                <p class="float right">
                                                    <?php echo $countui[0]; ?> peserta
                                                </p>
                                            <?php } ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <!--status alur pendaftaran-->
                        <div class="col-md-6 grid-margin grid-margin-md-0">
                            <div class="card bg-dark">
                                <div class="card-body">
                                    <p class="card-title text-white">Status Pendaftaran</p>
                                    <div class="row">
                                        <div class="col-12 text-white">
                                            <?php
                                            switch ($status) {
                                                case 0:
                                                    echo "<div class='badge badge-success px-4 pb-2 pt-3'><h6>Open Registrasi</h6></div>";
                                                    break;
                                                case 1:
                                                    echo "<div class='badge badge-danger px-4 pb-2 pt-3'><h6>Close Registrasi</h6></div>";
                                                    break;
                                                case 2:
                                                    echo "<div class='badge badge-warning px-4 pb-2 pt-3'><h6>Pengumuman Finalis</h6></div>";
                                                    break;
                                                default:
                                                    echo "Terjadi Kesalahan";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownAlur" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pilih Status Pendaftaran
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownAlur">
                                            <form action="config/status.php" method="post">
                                                <input type="text" name="stat_acc" value="0" hidden>
                                                <button type="submit" class="dropdown-item" name="submit">Open Registrasi</button>
                                            </form>
                                            <br>
                                            <form action="config/status.php" method="post">
                                                <input type="text" name="stat_acc" value="1" hidden>
                                                <button type="submit" class="dropdown-item" name="submit">Close Registrasi</button>
                                            </form>
                                            <br>
                                            <form action="config/status.php" method="post">
                                                <input type="text" name="stat_acc" value="2" hidden>
                                                <button type="submit" class="dropdown-item" name="submit">Pengumuman Finalis</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Export Excel</h4>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <a href="export/bigdata.php" class="btn btn-block btn-warning">Webinar Big Data</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="export/smartcity.php" class="btn btn-block btn-success">Webinar Smart City</a>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <a href="export/workshop.php" class="btn btn-block btn-info">Workshop</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- total pengunjung website
            <div class="col-md-6 grid-margin grid-margin-md-0">
              <div class="card bg-secondary">
                <div class="card-body">
                  <p class="card-title">Pengunjung</p>                      
                  <div class="row">
                    <div class="col-11">
                      <h3>34040</h3>
                      <p class="text-white font-weight-500 mb-0">The total number of sessions within the date range.It is calculated as the sum . </p>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->


                    </div>

                    <div class="row mt-4">
                        <div class="ml-3 card bg-dark" style="height: 66px; font-weight:bold;">
                            <div class="card-body text-light">
                                <a class="text-danger" href="all_account.php" style="text-decoration: none;">Lupa Password</a>
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