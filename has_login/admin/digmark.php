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
                    $queries = mysqli_query($con, "SELECT * FROM workshop WHERE `event` = 'Digital Marketing' ");
                    ?>


                    <h3>Data Pendaftar Workshop Digital Marketing</h3>

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

                                            <th class="bg-cyan text-center">Payment</th>

                                            <th class="bg-cyan text-center">Status</th>

                                            <th class="bg-cyan text-center">Opsi</th>



                                        </tr>

                                    </thead>

                                    <tbody class="mt-5">

                                        <?php

                                        // echo $id_user;
                                        $no = 1;

                                        while ($data = mysqli_fetch_array($queries)) {
                                            $stat_payment = $data['stat_payment'];
                                            $email = $data['email'];
                                            $id = $data['id'];


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

                                                <td class="text-center"><a href="../../regist/payment/<?= $data['payment'] ?>" target="_blank">CLICK</a></td>

                                                <td class="text-center">
                                                    <?php
                                                    if ($stat_payment == 3) { ?>
                                                        <label class="badge badge-success"><i class="mdi mdi-check"></i></label>
                                                    <?php
                                                    } else { ?>
                                                        <label class="badge badge-secondary"><i class="mdi mdi-reload"></i> </label>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    switch ($stat_payment) {
                                                        case 1:
                                                            echo "<label class='badge badge-secondary'><i class='mdi mdi-reload'></i> Payment</label>";
                                                            break;
                                                        case 2:
                                                            echo "<label class='badge badge-danger'><i class='mdi mdi-close'></i> Payment</label>";
                                                            break;
                                                        case 3:
                                                            echo "<label class='badge badge-success'><i class='mdi mdi-check'></i> Payment</label>";
                                                            break;
                                                        default:
                                                            echo "<label class='badge badge-secondary'><i class='mdi mdi-reload'></i> Payment</label>";
                                                    }
                                                    ?>

                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-info btn-sm dropdown-toggle py-2" type="button" id="dropdownMenuSizeButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Payment
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton1">
                                                            <form action="config/approve/payment/digmark.php" method="post">
                                                                <input type="text" name="id" value="<?= $id ?>" hidden>
                                                                <input type="text" name="nama" value="<?= $nama ?>" hidden>
                                                                <input type="text" name="email" value="<?= $email ?>" hidden>
                                                                <button type="submit" class="dropdown-item" name="submit">Approve</button>
                                                            </form>
                                                            <br>
                                                            <form action="config/reject/payment/digmark.php" method="post">
                                                                <input type="text" name="id" value="<?= $id ?>" hidden>
                                                                <input type="text" name="nama" value="<?= $nama ?>" hidden>
                                                                <input type="text" name="email" value="<?= $email ?>" hidden>
                                                                <button type="submit" class="dropdown-item" name="submit">Reject</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>


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