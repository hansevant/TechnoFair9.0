<!--Smart FIKTI GRATISS jadi jangan dikasih akses masuk ke sini-->
<!--Buat kondisi akun kalo udah tutup pendaftaran if di bagian form, biar ga bisa input lagi-->
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
  $stat_acc = $datas['stat_acc'];
  $id_user = $datas['id_user'];
}
// var_dump($id_comp);
// die

if ($id_comp == "3") {
  echo "<script>alert('Maaf Smart FIKTI tidak dapat mengakses pembayaran karena gratis'); 
      location.href='./';</script>";
  die;
}

$payments = mysqli_query($con, "SELECT * FROM user_payment WHERE id_user = '$_SESSION[id_user]' ");
while ($bayar = mysqli_fetch_array($payments)) {
  $stat_payment = $bayar['stat_payment'];
  $payment = $bayar['payment'];
}
if ($payment != NULL) {
  $array = explode("_", $payment);
  $nomor_acak = $array[0];
  $nama_file = $array[1];
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- partial:partials/head.php -->

<head>
  <title>Pembayaran</title>
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
            <!--Status pembayaran-->

            <?php
            if ($stat_payment == 0) { ?>
              <!--jika belum bayar --- stat_payment = 0-->
              <div class="col-md-6 mb-4 transparent">
                <div class="card card-light-blue" style="border-radius: 10px;">
                  <div class="card-body">
                    <p class="mb-4">Status Pembayaran</p>
                    <p class="h3 mb-2">Belum upload bukti pembayaran</p>
                  </div>
                </div>
              </div>
            <?php
            } else if ($stat_payment == 1) { ?>
              <!--jika sudah input berhasil dan tunggu konfirmasi --- stat_payment = 1-->
              <div class="col-md-6 mb-4 transparent">
                <div class="card card-dark-blue" style="border-radius: 10px;">
                  <div class="card-body">
                    <p class="mb-4">Status Pembayaran</p>
                    <p class="h3 mb-2">Bukti pembayaran telah di upload</p>
                    <p class="mt-3">Silahkan tunggu konfirmasi melalui email terdaftar</p>
                  </div>
                </div>
              </div>
            <?php
            } else if ($stat_payment == 2) { ?>
              <!--jika sudah input berhasil direject dari admin --- stat_payment = 2-->
              <div class="col-md-6 mb-4 transparent">
                <div class="card card-light-danger" style="border-radius: 10px;">
                  <div class="card-body">
                    <p class="mb-4">Status Pembayaran</p>
                    <p class="h3 mb-4">Maaf, pembayaran gagal. Silahkan hubungi admin yang tertera jika mengalami kendala.</p>
                    <div class="row">
                      <p class="mb-2 col-md-6">
                        Narabuhung 1: Erika<br>
                        Line : raisazka28<br>
                        WA : 0857-7815-7111
                      </p>
                      <p class="mb-2 col-md-6 mt-lg-0">
                        Narabuhung 2: Marcel<br>
                        Line : mcngb25<br>
                        WA : 0851-5698-4781
                      </p>
                    </div>

                  </div>
                </div>
              </div>
            <?php
            } else { ?>
              <div class="col-md-6 mb-4 transparent">
                <div class="card card-dark-blue" style="border-radius: 10px;">
                  <div class="card-body">
                    <p class="mb-4">Status Pembayaran</p>
                    <p class="h3 mb-2">Bukti pembayaran telah di approve</p>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
            <!--untuk --- stat_payment = 3 -> Approve(dikirim lewat email) , tapi tidak ada informasinya di web-->


            <!--Upload bukti pembayaran-->
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                  <h4 class="card-title">Upload Bukti Pembayaran</h4>

                  <!--ini kasih jika masih open regist-->
                  <?php if ($stat_acc == 0) { ?>
                    <ul class="card-description ">

                      <!--Biaya pendaftaran menggunakan if-->
                      <?php
                      if ($id_comp == 2 || $id_comp == 4) :
                      ?>
                        <!--UX Design/ CTF-->
                        <li>Biaya pendaftaran sebesar Rp. 80.000,-/Tim</li>
                      <?php
                      endif;
                      if ($id_comp == 1) :
                      ?>
                        <!--Infographic-->
                        <li>
                          Biaya pendaftaran sebesar <br>
                          Rp. 30.000,-/Karya <br>
                          Rp. 55.000,-/2 Karya
                        </li>
                      <?php
                      endif;
                      ?>
                      <!--ini kayanya general tapi crosscheck lagi di rulebooknya yaa-->
                      <li>Untuk pembayaran bisa dilakukan melalui BCA : 1082413418 a.n Miselia Filiani</li>
                      <li>Format file berupa JPG/JPEG/PNG</li>
                      <li>Format nama file [NamaTim_PilihanKompetisi]</li>
                      <li>Contoh : EVOS_UXDesign</li>
                    </ul>

                    <form class="forms-sample" action="../config/payment2.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
                      <div class="form-group">
                        <label>
                          <?php
                          if ($payment != NULL) {
                            echo $nama_file;
                          } else {
                            echo "Belum ada file yang di upload";
                          }
                          ?>
                        </label>
                        <div class="input-group col-xs-12">
                          <input type="file" name="payments" class="form-control file-upload-info" placeholder="Upload Bukti Pembayaran">
                        </div>
                      </div>
                      <button type="submit" name="submit_bayar" class="btn btn-primary mr-2">Submit</button>
                    </form>

                  <?php
                  } else {
                  ?>
                    <!--ini kasih jika close regist-->
                    <h5 class="card-description ">Maaf, Pendaftaran Telah Ditutup</h5>
                  <?php } ?>

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