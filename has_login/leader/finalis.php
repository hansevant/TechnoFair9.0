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
  $stat_final = $datas['stat_final'];
  $stat_acc = $datas['stat_acc'];
  $nama_tim = $datas['nama_tim'];
}

if ($stat_acc == "1") { // close regist
  echo "<script>alert('Maaf, Pengumuman finalis belum tersedia'); 
        location.href='./';</script>";
  die;
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- partial:partials/head.php -->

<head>
  <title>Pengumuman Finalis</title>
  <?php include_once "partials/head.php"; ?>
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

            <div class="col-12 grid-margin stretch-card">
              <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                  <h2 class="pt-3">Pengumuman Finalis</h2>
                </div>
                <?php
                switch ($stat_final):
                  case 0:
                ?>
                    <!-- Belum dilakukan pemilihan --- stat_finalis = 0 -->
                    <div class="card-body">
                      <blockquote class="blockquote blockquote-info" style="border-radius: 6px;">
                        <h4>Pengumuman finalis belum berlangsung. Silahkan kembali saat telah diumumkan.</h4>
                      </blockquote>
                    </div>

                  <?php
                    break;
                  case 1:
                  ?>
                    <!-- Tidak masuk babak final --- stat_finalis = 1 -->
                    <div class="card-body">
                      <blockquote class="blockquote blockquote-danger" style="border-radius: 6px;">
                        <h4>Maaf, <?= $nama_tim; ?> tidak lulus babak final.</h4>
                      </blockquote>
                    </div>

                  <?php
                    break;
                  case 2:
                  ?>
                    <!-- Masuk babak final --- stat_finalis = 2 -->
                    <div class="card-body">
                      <blockquote class="blockquote blockquote-success" style="border-radius: 6px;">
                        <h4>Selamat, <?= $nama_tim; ?> lulus babak final.</h4>
                      </blockquote>
                    </div>
                <?php
                    break;
                  default:
                    echo "Terjadi Kesalahan";
                endswitch;
                ?>

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