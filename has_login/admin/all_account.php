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

            <?php
            echo "<script>alert('Hati Hati jangan sembarangan menggunakan halaman ini')</script>";
            ?>
            <div class="main-panel">
                <div class="content-wrapper">


                    <h3>All Account</h3>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered display">
                                    <thead>
                                        <tr>
                                            <th class="bg-cyan text-center">Instansi</th>
                                            <th class="bg-cyan text-center">Username</th>
                                            <th class="bg-cyan text-center">Status</th>
                                            <th class="bg-cyan text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mt-5">
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($con, "SELECT *
                                        FROM acc_user ");

                                        while ($data = mysqli_fetch_array($query)) {
                                            $nama_tim = $data['username'];
                                            $instansi = $data['instansi'];
                                            $id_user = $data['id_user'];
                                            $forgot_pass = $data['forgot_pass'];
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $instansi; ?></td>
                                                <td class="text-center"><?= $nama_tim; ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($forgot_pass) { ?>
                                                        <label class="badge badge-danger"><i class="mdi mdi-close"></i> Password Lupa</label>
                                                    <?php } else { ?>
                                                        <label class="badge badge-success"><i class="mdi mdi-check"></i> Password Aman</label>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="config/lupa.php?id_user=<?= $id_user; ?>" class="btn p-2 btn-warning">Lupa Password</a>
                                                </td>
                                            <?php
                                        }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-primary p-4 text-light" style="font-weight: bold; line-height:1.5;">
                                Lakukan Aksi Lupa Password bila ada yang lupa passwordnya dan
                                statusnya akan berubah menjadi
                                <label class="badge badge-danger"><i class="mdi mdi-close"></i> Password Lupa</label>
                                maka user tersebut harus login dengan password baru
                                yaitu dibawah ini<mark>technofair9.0</mark> dan mengganti passwordnya ditab panel
                                <mark><i class="mdi mdi-key"></i> Lupa Password</mark>
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