<!--Buat kondisi akun kalo udah tutup pendaftaran pake if di bagian form, biar ga bisa input lagi -->
<?php
session_start();
require_once("../../config/koneksi.php");
header("X-XSS-Protection: 1; mode=block");

if (!isset($_SESSION['username']) > 0) {
    echo "<script>alert('Login Dulu ya'); 
      location.href='../../account/login/';</script>";
}

$select = mysqli_query($con, "SELECT * FROM acc_user INNER JOIN user_berkas USING(id_user) WHERE acc_user.id_user = '$_SESSION[id_user]' ");
while ($datas = mysqli_fetch_array($select)) {
    $id_comp = $datas['id_comp'];
    $stat_acc = $datas['stat_acc'];
    $stat_berkas = $datas['stat_berkas'];
    $id_user = $datas['id_user'];
    $berkas = $datas['berkas'];
}
if ($berkas != NULL) {
    $array = explode("_", $berkas);
    $nomor_acak = $array[0];
    $nama_file = $array[1];
}


?>
<!DOCTYPE html>
<html lang="en">
<!-- partial:partials/head.php -->

<head>
    <title>Berkas</title>
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
                        <!--Status berkas-->
                        <?php
                        switch ($stat_berkas):
                            case 0:
                        ?>
                                <!--jika belum upload berkas ---- stat_berkas = 0 -->
                                <div class="col-md-6 mb-4 transparent">
                                    <div class="card card-light-blue" style="border-radius: 10px;">
                                        <div class="card-body">
                                            <p class="mb-4">Status Berkas
                                                <?php
                                                if ($id_comp != 3) {
                                                    echo "<b>*selesaikan pembayaran terlebih dahulu, jika sudah silahkan upload berkas</b>";
                                                }
                                                ?>
                                            </p>
                                            <p class="h3 mb-2">Belum upload berkas</p>
                                        </div>
                                    </div>
                                </div>

                            <?php
                                break;
                            case 1:
                            ?>
                                <!--jika sudah input berhasil ----- stat_berkas = 1 -->
                                <div class="col-md-6 mb-4 transparent">
                                    <div class="card card-dark-blue" style="border-radius: 10px;">
                                        <div class="card-body">
                                            <p class="mb-4">Status Berkas</p>
                                            <p class="h3 mb-2">Berkas berhasil diupload</p>
                                        </div>
                                    </div>
                                </div>

                            <?php
                                break;
                            case 2:
                            ?>
                                <!--jika berkas di reject ----- stat_berkas = 2 -->
                                <div class="col-md-6 mb-4 transparent">
                                    <div class="card bg-danger" style="border-radius: 10px;">
                                        <div class="card-body">
                                            <p class="mb-4 text-white">Status Berkas</p>
                                            <p class="h3 mb-2 text-white">Berkas tidak valid</p>
                                        </div>
                                    </div>
                                </div>

                            <?php
                                break;
                            case 3:
                            ?>
                                <!--jika berkas di upload ----- stat_berkas = 3 -->
                                <div class="col-md-6 mb-4 transparent">
                                    <div class="card bg-success" style="border-radius: 10px;">
                                        <div class="card-body">
                                            <p class="mb-4 text-white">Status Berkas</p>
                                            <p class="h3 mb-2 text-white">Berkas Valid</p>
                                        </div>
                                    </div>
                                </div>

                        <?php
                                break;
                            default:
                                echo "Terjadi Kesalahan";
                        endswitch;
                        ?>

                        <!--Upload bukti pembayaran-->
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card" style="border-radius: 10px;">
                                <div class="card-body">
                                    <h4 class="card-title">Upload Berkas</h4>

                                    <?php if ($stat_acc == 0) { ?>
                                        <!--ini kasih jika masih open regist-->
                                        <p class="card-description ">Data yang dibutuhkan :</p>

                                        <ul class="card-description ">
                                            <!--ini kayanya general tapi crosscheck lagi di rulebooknya yaa-->
                                            <li>KTM/KRS/Kartu Pelajar/Surat Keterangan Mahasiswa Aktif dari semua anggota tim</li>

                                            <!--Informasi berkas menggunakan if-->
                                            <?php
                                            if ($id_comp == 1) :
                                            ?>
                                                <!--Infographic-->
                                                <li>Karya, Narasi Singkat dan Lembar Orisinalitas</li>
                                            <?php
                                            endif;
                                            if ($id_comp == 4) :
                                            ?>
                                                <!--UX Design-->
                                                <li>Proposal</li>
                                            <?php endif; ?>
                                            <!--ini general-->
                                            <li>Format file berupa ZIP</li>
                                            <li>Format nama file [Berkas_NamaTim_PilihanKompetisi]</li>
                                            <li>Contoh : Berkas_EVOS_UXDesign.ZIP</li>
                                        </ul>

                                        <form class="form-sample" action="../config/berkas3.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                                            <div class="form-group">
                                                <label>
                                                    <?php
                                                    if ($berkas != NULL) {
                                                        echo $nama_file;
                                                    } else {
                                                        echo "Belum ada file yang di upload";
                                                    }
                                                    ?>
                                                </label>
                                                <div class="input-group col-xs-12">
                                                    <input type="file" name="berkas" class="form-control" placeholder="Upload ZIP">
                                                </div>
                                            </div>
                                            <button type="submit" name="submit_berkas" class="btn btn-primary mr-2">Submit</button>
                                        </form>

                                    <?php
                                    } else {
                                    ?>
                                        <!--ini kasih jika  close regist-->
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