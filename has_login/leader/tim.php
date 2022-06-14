<?php
session_start();
require_once("../../config/koneksi.php");
header("X-XSS-Protection: 1; mode=block");

if (!isset($_SESSION['username']) > 0) {
  echo "<script>alert('Login Dulu ya'); 
      location.href='../../account/login/';</script>";
}
//panggil tabel acc_user
$select = mysqli_query($con, "SELECT * FROM acc_user WHERE id_user = '$_SESSION[id_user]' ");
while ($datas = mysqli_fetch_array($select)) {
  $id_comp = $datas['id_comp'];
  $instansi = $datas['instansi'];
  $stat_acc = $datas['stat_acc'];
}

//panggil tabel user_ketua
$user_ketua = mysqli_query($con, "SELECT * FROM user_ketua WHERE id_user = '$_SESSION[id_user]' ");
$jumlah_ketua = mysqli_num_rows($user_ketua);


//panggil tabel user_anggota
$user_anggota = mysqli_query($con, "SELECT * FROM user_anggota WHERE id_user = '$_SESSION[id_user]' ");
$jumlah_anggota = mysqli_num_rows($user_anggota);
?>
<!DOCTYPE html>
<html lang="en">
<!-- partial:partials/head.php -->

<head>
  <title>Tim Saya</title>
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
          <!--ini data ketua-->
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card" style="border-radius: 7px;">
                <div class="card-body">
                  <p class="card-title mb-3">Data Ketua</p>

                  <!--jika ketua lebih dari 1 atau close regist, button nya menghilang -->
                  <?php if ($jumlah_ketua == 0 || $stat_acc == 1) { ?>
                    <button type="button" class="btn btn-inverse-primary btn-fw py-2" data-toggle="modal" data-target="#input_ketua">Input Ketua</button>
                  <?php } ?>

                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <?php if ($id_comp == 3) { ?>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>ID Line</th>
                            <th>No Hp</th>
                            <th>Email</th>
                            <th width="80px">Edit</th>
                          <?php
                          } else { ?>
                            <th>Nama Lengkap</th>
                            <th>ID Line</th>
                            <th>No Hp</th>
                            <th>Instansi</th>
                            <th>Email</th>
                            <th width="80px">Edit</th>
                          <?php
                          }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($ketua = mysqli_fetch_array($user_ketua)) : ?>
                          <tr>
                            <?php if ($id_comp == 3) { ?>
                              <td><?= $ketua['nama_ketua']; ?></td>
                              <td><?= $ketua['kelas_ketua']; ?></td>
                              <td><?= $ketua['jurusan_ketua']; ?></td>
                              <td><?= $ketua['idline_ketua']; ?></td>
                              <td><?= $ketua['nohp_ketua']; ?></td>
                              <td><?= $ketua['email_ketua']; ?></td>
                              <td>
                                <?php if ($stat_acc == 0) { //open regist
                                ?>
                                  <button type="button" class="btn btn-inverse-dark btn-icon" data-toggle="modal" data-target="#edit_ketua<?= $ketua['id_ketua']; ?>">
                                    <i class="mdi mdi-lead-pencil"></i>
                                  </button>
                                <?php } ?>
                              </td>
                            <?php } else { ?>
                              <td><?= $ketua['nama_ketua']; ?></td>
                              <td><?= $ketua['idline_ketua']; ?></td>
                              <td><?= $ketua['nohp_ketua']; ?></td>
                              <td><?= $instansi; ?></td>
                              <td><?= $ketua['email_ketua']; ?></td>
                              <td>
                                <?php if ($stat_acc == 0) { //open regist
                                ?>
                                  <button type="button" class="btn btn-inverse-dark btn-icon" data-toggle="modal" data-target="#edit_ketua<?= $ketua['id_ketua']; ?>">
                                    <i class="mdi mdi-lead-pencil"></i>
                                  </button>
                                <?php } ?>
                              </td>
                            <?php } ?>

                            <!--modal edit ketua-->
                            <div class="modal fade" id="edit_ketua<?= $ketua['id_ketua']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">

                                  <div class="modal-header border-bottom-0">
                                    <h3 class="modal-title" id="exampleModalLabel">Edit Ketua</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                  <div class="container">
                                    <form class="forms-sample mx-3" action="../config/edit_ketua.php" method="post">
                                      <div class="form-group">
                                        <input type="hidden" name="id_ketua" value="<?= $ketua['id_ketua']; ?>" required>
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama_ketua" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?= $ketua['nama_ketua']; ?>" required>
                                      </div>
                                      <?php if ($id_comp == 3) { ?>
                                        <div class="form-group">
                                          <label for="kelas">Kelas</label>
                                          <input type="text" name="kelas_ketua" class="form-control" id="kelas" placeholder="Kelas" value="<?= $ketua['kelas_ketua']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="jurusan">Jurusan</label>
                                          <input type="text" name="jurusan_ketua" class="form-control" id="jurusan" placeholder="Jurusan" value="<?= $ketua['jurusan_ketua']; ?>" required>
                                        </div>
                                      <?php } else { ?>
                                        <input type="text" name="kelas_ketua" id="kelas" value="-" hidden>
                                        <input type="text" name="jurusan_ketua" id="jurusan" value="-" hidden>
                                      <?php
                                      } ?>
                                      <div class="form-group">
                                        <label for="idline">ID Line</label>
                                        <input type="text" name="idline_ketua" class="form-control" id="idline" placeholder="ID Line" value="<?= $ketua['idline_ketua']; ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="nohp">No Handphone</label>
                                        <input type="text" name="nohp_ketua" class="form-control" id="nohp" placeholder="08xx-xxxx-xxxx" value="<?= $ketua['nohp_ketua']; ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email_ketua" class="form-control" id="email" placeholder="Email" value="<?= $ketua['email_ketua']; ?>" required>
                                      </div>

                                      <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" name="edit_ketua" class="btn btn-inverse-success btn-fw">Submit</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </tr>
                        <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--Ini data anggota-->
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card" style="border-radius: 7px;">
                <div class="card-body">
                  <p class="card-title mb-3">Data Anggota</p>
                  <!--jika anggota lebih dari 2 atau close regist, button menghilang-->
                  <?php if ($jumlah_anggota < 2 || $stat_acc == 1) { ?>
                    <button type="button" class="btn btn-inverse-primary btn-fw py-2" data-toggle="modal" data-target="#input_anggota">Input Anggota</button>
                  <?php } ?>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <?php if ($id_comp == 3) { ?>
                            
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th width="80px">Edit</th>
                          <?php
                          } else { ?>
                            
                            <th>Nama Lengkap</th>
                            <th>No HP</th>
                            <th>Instansi</th>
                            <th>Email</th>
                            <th width="80px">Edit</th>
                          <?php
                          }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        while ($anggota = mysqli_fetch_array($user_anggota)) :
                        ?>

                          <tr>
                            <?php if ($id_comp == 3) { ?>
                              
                              <td><?= $anggota['nama_anggota']; ?></td>
                              <td><?= $anggota['kelas_anggota']; ?></td>
                              <td><?= $anggota['jurusan_anggota']; ?></td>
                              <td><?= $anggota['nohp_anggota']; ?></td>
                              <td><?= $anggota['email_anggota']; ?></td>
                              <td>
                                <?php if ($stat_acc == 0) { //open regist
                                ?>
                                  <button type="button" class="btn btn-inverse-dark btn-icon" data-toggle="modal" data-target="#edit_anggota<?= $anggota['id_anggota']; ?>">
                                    <i class="mdi mdi-lead-pencil"></i>
                                  </button>
                                <?php } ?>
                              </td>
                            <?php } else { ?>

                              <td><?= $anggota['nama_anggota']; ?></td>
                              <td><?= $anggota['nohp_anggota']; ?></td>
                              <td><?= $instansi; ?></td>
                              <td><?= $anggota['email_anggota']; ?></td>
                              <td>
                                <?php if ($stat_acc == 0) { //open regist
                                ?>
                                  <button type="button" class="btn btn-inverse-dark btn-icon" data-toggle="modal" data-target="#edit_anggota<?= $anggota['id_anggota']; ?>">
                                    <i class="mdi mdi-lead-pencil"></i>
                                  </button>
                                <?php } ?>
                              </td>
                            <?php } ?>

                            <!--modal edit anggota-->
                            <div class="modal fade" id="edit_anggota<?= $anggota['id_anggota']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">

                                  <div class="modal-header border-bottom-0">
                                    <h3 class="modal-title" id="exampleModalLabel">Edit Anggota</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                  <div class="container">
                                    <form class="forms-sample mx-3" action="../config/edit_anggota.php" method="post">
                                      <input type="hidden" name="id_anggota" value="<?= $anggota['id_anggota']; ?>" required>
                                      <input type="hidden" name="id_user" value="<?= $anggota['id_user']; ?>" required>

                                      <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama_anggota" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?= $anggota['nama_anggota']; ?>" required>
                                      </div>
                                      <?php if ($id_comp == 3) { ?>
                                        <div class="form-group">
                                          <label for="kelas">Kelas</label>
                                          <input type="text" name="kelas_anggota" class="form-control" id="kelas" placeholder="Kelas" value="<?= $anggota['kelas_anggota']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="jurusan">Jurusan</label>
                                          <input type="text" name="jurusan_anggota" class="form-control" id="jurusan" placeholder="Jurusan" value="<?= $anggota['jurusan_anggota']; ?>" required>
                                        </div>
                                      <?php } else { ?>
                                        <input type="text" name="kelas_anggota" id="kelas" value="-" hidden>
                                        <input type="text" name="jurusan_anggota" id="jurusan" value="-" hidden>
                                      <?php } ?>
                                      <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email_anggota" class="form-control" id="email" placeholder="Email" value=" <?= $anggota['email_anggota']; ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="nohp_anggota">Nomor HP</label>
                                        <input type="text" name="nohp_anggota" class="form-control" id="nohp_anggota" placeholder="Nomor HP" value=" <?= $anggota['nohp_anggota']; ?>" required>
                                      </div>

                                      <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" name="edit_anggota" class="btn btn-inverse-success btn-fw">Submit</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </tr>
                        <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
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

      <!--modal input ketua-->
      <div class="modal fade" id="input_ketua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

            <div class="modal-header border-bottom-0">
              <h3 class="modal-title" id="exampleModalLabel">Input Ketua</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="container">
              <form class="forms-sample mx-3" action="../config/input_ketua.php" method="post">
                <div class="form-group">
                  <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>" required>
                  <label for="nama">Nama</label>
                  <input type="text" name="nama_ketua" class="form-control" id="nama" placeholder="Nama Lengkap" required>
                </div>
                <?php if ($id_comp == 3) { ?>
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas_ketua" class="form-control" id="kelas" placeholder="Kelas" required>
                  </div>
                  <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan_ketua" class="form-control" id="jurusan" placeholder="Jurusan" required>
                  </div>
                <?php } else { ?>
                  <input type="text" name="kelas_ketua" id="kelas" value="-" hidden>
                  <input type="text" name="jurusan_ketua" id="jurusan" value="-" hidden>
                <?php
                } ?>
                <div class="form-group">
                  <label for="idline">ID Line</label>
                  <input type="text" name="idline_ketua" class="form-control" id="idline" placeholder="ID Line" required>
                </div>
                <div class="form-group">
                  <label for="nohp">No Handphone</label>
                  <input type="text" name="nohp_ketua" class="form-control" id="nohp" placeholder="08xx-xxxx-xxxx" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email_ketua" class="form-control" id="email" placeholder="Email" required>
                </div>

                <div class="modal-footer border-top-0 d-flex justify-content-center">
                  <button type="submit" name="input_ketua" class="btn btn-inverse-success btn-fw">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>



      <!--modal input anggota-->
      <div class="modal fade" id="input_anggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

            <div class="modal-header border-bottom-0">
              <h3 class="modal-title" id="exampleModalLabel">Input Anggota</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="container">
              <form class="forms-sample mx-3" action="../config/input_anggota.php" method="post">
                <div class="form-group">
                  <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>" required>
                  <label for="nama">Nama</label>
                  <input type="text" name="nama_anggota" class="form-control" id="nama" placeholder="Nama Lengkap" required>
                </div>
                <?php if ($id_comp == 3) { ?>
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas_anggota" class="form-control" id="kelas" placeholder="Kelas" required>
                  </div>
                  <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan_anggota" class="form-control" id="jurusan" placeholder="Jurusan" required>
                  </div>
                <?php } else { ?>
                  <input type="text" name="kelas_anggota" id="kelas" value="-" hidden>
                  <input type="text" name="jurusan_anggota" id="jurusan" value="-" hidden>
                <?php } ?>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email_anggota" class="form-control" id="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label for="nohp">No HP</label>
                  <input type="text" name="nohp_anggota" class="form-control" id="nohp" placeholder="Nomor HP" required>
                </div>

                <div class="modal-footer border-top-0 d-flex justify-content-center">
                  <button type="submit" name="input_anggota" class="btn btn-inverse-success btn-fw">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>



    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- partial:partials/script.php -->
  <?php include_once "partials/script.php"; ?>
</body>

</html>