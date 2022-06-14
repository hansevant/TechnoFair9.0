<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item pb-3">
            <span class="h4 font-weight-bold text-secondary px-3"><?= $_SESSION['nama_tim']; ?></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tim.php">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Tim Saya</span>
            </a>
        </li>
        <?php
        $select = mysqli_query($con, "SELECT * FROM acc_user WHERE id_user = '$_SESSION[id_user]' ");
        while ($datas = mysqli_fetch_array($select)) {
            $id_comp = $datas['id_comp'];
            $stat_acc = $datas['stat_acc'];
            $forgot_pass = $datas['forgot_pass'];
        }
        if ($id_comp == 3) {
        } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="pembayaran.php">
                    <i class="mdi mdi-cash menu-icon"></i>
                    <span class="menu-title">Pembayaran</span>
                </a>
            </li>
        <?php
        }
        ?>
        <li class="nav-item">
            <a class="nav-link" href="berkas.php">
                <i class="mdi mdi-file-document-box menu-icon"></i>
                <span class="menu-title">Berkas</span>
            </a>
        </li>
        <?php if ($stat_acc == 0 || $stat_acc == 2) {
            //0 = open regis, nanti akan dibuka saat pengumuman finalis (stat_acc =2) di admin
        ?>
            <li class="nav-item">
                <a class="nav-link" href="finalis.php">
                    <i class="mdi mdi-bell menu-icon"></i>
                    <span class="menu-title">Pengumuman Finalis</span>
                </a>
            </li>
        <?php } ?>
        <?php
        if ($forgot_pass) {
            echo '
        <li class="nav-item">
        <a class="nav-link" href="changepass.php">
          <i class="mdi mdi-key menu-icon"></i>
          <span class="menu-title">Lupa Password</span>
        </a>
      </li>
        ';
        }
        ?>
        <li class="nav-item">
            <a class="nav-link" href="../config/logout.php">
                <i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->