<?php
session_start();
require_once("../../config/koneksi.php");
header("X-XSS-Protection: 1; mode=block");

if (!isset($_SESSION['id']) > 0) {
    echo "<script>alert('Login Dulu ya'); 
      location.href='../../account/login/';</script>";
}
// $select = mysqli_query($con, "SELECT * FROM acc_user WHERE id_user = '$_SESSION[id_user]' ");
// while ($datas = mysqli_fetch_array($select)) {
//   $id_comp = $datas['id_comp'];
// }
?>

<!DOCTYPE html>
<html lang="en">
<!-- partial:partials/head.php -->

<head>
    <title>Smart FIKTI Admin</title>
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
                    <h3>Smart Fikti</h3>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pending</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">All Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Reject</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered display">
                                    <thead>
                                        <tr>
                                            <th class="bg-cyan text-center">Nama Tim</th>
                                            <th class="bg-cyan text-center">Ketua</th>
                                            <th class="bg-cyan text-center">Kelas</th>
                                            <th class="bg-cyan text-center">Jurusan</th>
                                            <th class="bg-cyan text-center">Id Line</th>
                                            <th class="bg-cyan text-center">No Hp</th>
                                            <th class="bg-cyan text-center">Email</th>
                                            <th class="bg-cyan text-center">Berkas</th>
                                            <th class="bg-cyan text-center">Status</th>
                                            <th class="bg-cyan text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mt-5">
                                        <?php
                                        $queries = mysqli_query($con, "SELECT acc_user.*, user_ketua.*, competition.*, user_berkas.*
                                                    FROM acc_user
                                                    JOIN user_ketua ON acc_user.id_user = user_ketua.id_user
                                                    JOIN competition ON acc_user.id_comp = competition.id_comp
                                                    JOIN user_berkas ON acc_user.id_user = user_berkas.id_user
                                                    WHERE acc_user.id_comp = 3 ");
                                        while ($data = mysqli_fetch_array($queries)) {
                                            $id_user = $data['id_user'];
                                            $nama_tim = $data['nama_tim'];
                                            $kelas_ketua = $data['kelas_ketua'];
                                            $jurusan_ketua = $data['jurusan_ketua'];
                                            $nama_ketua = $data['nama_ketua'];
                                            $idline_ketua = $data['idline_ketua'];
                                            $nohp_ketua = $data['nohp_ketua'];
                                            $email_ketua = $data['email_ketua'];
                                            $berkas = $data['berkas'];
                                            $stat_berkas = $data['stat_berkas'];
                                            if ($berkas != NULL) {
                                                $array = explode("_", $berkas);
                                                $nomor_acak = $array[0];
                                                $nama_berkas = $array[1];
                                            }
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <a href="detail.php?id_user=<?= $id_user ?>">
                                                        <?= $nama_tim; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center"><?= $nama_ketua; ?></td>
                                                <td class="text-center"><?= $kelas_ketua; ?></td>
                                                <td class="text-center"><?= $jurusan_ketua; ?></td>
                                                <td class="text-center"><?= $idline_ketua; ?></td>
                                                <td class="text-center"><?= $nohp_ketua; ?></td>
                                                <td class="text-cente"><?= $email_ketua; ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($berkas == NULL) { ?>
                                                        <label class="badge badge-danger"><i class="mdi mdi-close"></i> Belum ada berkas</label>
                                                    <?php } else { ?>
                                                        <a href="../folder/berkas/<?= $berkas; ?>"><?= $nama_berkas; ?> </a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($stat_berkas == 3) { ?>
                                                        <label class="badge badge-success"><i class="mdi mdi-check"></i> Akun</label>
                                                    <?php
                                                    } else { ?>
                                                        <label class="badge badge-secondary"><i class="mdi mdi-reload"></i> Akun</label>
                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    switch ($stat_berkas) {
                                                        case 1:
                                                            echo "<label class='badge badge-secondary'><i class='mdi mdi-reload'></i> Berkas</label>";
                                                            break;
                                                        case 2:
                                                            echo "<label class='badge badge-danger'><i class='mdi mdi-close'></i> Berkas</label>";
                                                            break;
                                                        case 3:
                                                            echo "<label class='badge badge-success'><i class='mdi mdi-check'></i> Berkas</label>";
                                                            break;
                                                        default:
                                                            echo "<label class='badge badge-secondary'><i class='mdi mdi-reload'></i> Berkas</label>";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-info btn-sm dropdown-toggle py-2" type="button" id="dropdownMenuSizeButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Berkas
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton1">
                                                            <form action="config/approve/berkas/smart.php" method="post">
                                                                <input type="text" name="id_user" value="<?= $id_user ?>" hidden>
                                                                <input type="text" name="nama_ketua" value="<?= $nama_ketua ?>" hidden>
                                                                <input type="text" name="email_tujuan" value="<?= $email_ketua ?>" hidden>
                                                                <button type="submit" class="dropdown-item" name="submit">Approve</button>
                                                            </form>
                                                            <br>
                                                            <form action="config/reject/berkas/smart.php" method="post">
                                                                <input type="text" name="id_user" value="<?= $id_user ?>" hidden>
                                                                <input type="text" name="nama_ketua" value="<?= $nama_ketua ?>" hidden>
                                                                <input type="text" name="email_tujuan" value="<?= $email_ketua ?>" hidden>
                                                                <button type="submit" class="dropdown-item" name="submit">Reject</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php
                                        }
                                            ?>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered display">
                                    <thead>
                                        <tr>
                                            <th class="bg-cyan text-center">No</th>
                                            <th class="bg-cyan text-center">Nama Tim</th>
                                            <th class="bg-cyan text-center">Username</th>
                                            <th class="bg-cyan text-center">Jurusan</th>
                                            <th class="bg-cyan text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mt-5">
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($con, "SELECT acc_user.*, competition.*, user_berkas.*
                                                                FROM acc_user
                                                                JOIN competition ON acc_user.id_comp = competition.id_comp
                                                                JOIN user_berkas ON acc_user.id_user = user_berkas.id_user
                                                                WHERE acc_user.id_comp = 3 ");
                                        while ($data = mysqli_fetch_array($query)) {
                                            $id_user = $data['id_user'];
                                            $nama_tim = $data['nama_tim'];
                                            $username = $data['username'];
                                            $instansi = $data['instansi'];
                                            $stat_berkas = $data['stat_berkas'];
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $nama_tim; ?></td>
                                                <td class="text-center"><?= $username; ?></td>
                                                <td class="text-center"><?= $instansi; ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($stat_berkas == 3) { ?>
                                                        <label class="badge badge-success"><i class="mdi mdi-check"></i> Akun</label>
                                                    <?php
                                                    } else { ?>
                                                        <label class="badge badge-secondary"><i class="mdi mdi-reload"></i> Akun</label>
                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    switch ($stat_berkas) {
                                                        case 1:
                                                            echo "<label class='badge badge-secondary'><i class='mdi mdi-reload'></i> Berkas</label>";
                                                            break;
                                                        case 2:
                                                            echo "<label class='badge badge-danger'><i class='mdi mdi-close'></i> Berkas</label>";
                                                            break;
                                                        case 3:
                                                            echo "<label class='badge badge-success'><i class='mdi mdi-check'></i> Berkas</label>";
                                                            break;
                                                        default:
                                                            echo "<label class='badge badge-secondary'><i class='mdi mdi-reload'></i> Berkas</label>";
                                                    }
                                                    ?>
                                                </td>
                                            <?php
                                        }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
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