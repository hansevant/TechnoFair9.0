<?php

session_start();

require_once("../../config/koneksi.php");

header("X-XSS-Protection: 1; mode=block");



if (!isset($_SESSION['username']) > 0) {

    echo "<script>alert('Login Dulu ya'); 

      location.href='../../account/login/';</script>";
}



?>



<!DOCTYPE html>

<html lang="en">

<!-- partial:partials/head.php -->



<head>

    <title>Admin</title>

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

                    <?php
                    $queries = mysqli_query($con, "SELECT * FROM webinar WHERE `event` = 'Big Data' ");
                    ?>


                    <h3 class="d-inline mr-3">Data Pendaftar Webinar Big Data</h3> <a href="export/bigdata.php" class="btn btn-success">export sini gan</a>

                    <!-- INI CONTENT -->

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">

                            <div class="table-responsive">

                                <table class="table table-hover table-bordered display">

                                    <thead>

                                        <tr>
                                            <th class="bg-cyan text-center">No</th>

                                            <th class="bg-cyan text-center">Nama</th>

                                            <th class="bg-cyan text-center">Asal</th>

                                            <th class="bg-cyan text-center">Instansi</th>

                                            <th class="bg-cyan text-center">status</th>

                                            <th class="bg-cyan text-center">Handphone</th>

                                            <th class="bg-cyan text-center">Alasan</th>

                                            <th class="bg-cyan text-center">Email</th>

                                        </tr>

                                    </thead>

                                    <tbody class="mt-5">

                                        <?php

                                        // echo $id_user;
                                        $no = 1;

                                        while ($data = mysqli_fetch_array($queries)) {


                                        ?>

                                            <tr>

                                                <td class="text-center"><?= $no ?></td>

                                                <td class="text-center"><?= $data['nama'] ?></td>

                                                <td class="text-center"><?= $data['asal'] ?></td>

                                                <td class="text-center"><?= $data['instansi'] ?></td>

                                                <td class="text-center"><?= $data['status'] ?></td>

                                                <td class="text-center"><?= $data['nohp'] ?></td>

                                                <td class="text-center"><?= $data['idline'] ?></td>

                                                <td class="text-center"><?= $data['email'] ?></td>

                                            <?php
                                            $no++;
                                        }


                                            ?>

                                            </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="pills-approve" role="tabpanel" aria-labelledby="pills-approve-tab">...</div>

                        <div class="tab-pane fade" id="pills-reject" role="tabpanel" aria-labelledby="pills-reject-tab">...</div>

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