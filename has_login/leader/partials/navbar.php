<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-4" href="index.html"><img src="../assets/img/title.png" class="ml-3" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets/img/logo.png" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link pt-2" href="#">
          <?php
          $select = mysqli_query($con, "SELECT acc_user.*, competition.* 
          FROM acc_user 
          JOIN competition ON acc_user.id_comp = competition.id_comp
          WHERE acc_user.username = '$_SESSION[username]' ");

          while ($datas = mysqli_fetch_array($select)) {
            $nama_comp = $datas['jenis_comp'];
          }
          ?>
          <span class="h4"> <?= $nama_comp; ?> </span>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>