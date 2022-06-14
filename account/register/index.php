<?php
require_once("../../config/koneksi.php");

$competitions = mysqli_query($con, "SELECT * FROM competition");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../assets/regis.css">
    <title>Competition Registration</title>
    <link href="../../assets/img/logo/logo.png" rel="icon">
    <link href="../../assets/img/logo/logo.png" rel="apple-touch-icon">
</head>

<body>

    <div class="container" style="max-width: 700px !important;">
        <div class="title">Registration</div>
        <div class="content">
            <form action="../config/regist.php" method="post">
                <div class="row user-details" style="flex-direction: row;">
                    <div class="input-box col-lg-12 col-md-12 col-sm-12">
                        <span class="details">Nama Tim</span>
                        <input name="nama_tim" type="text" placeholder="Nama Tim" required>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details">Username</span>
                        <input name="username" type="text" placeholder="Username" required>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details">Password</span>
                        <input name="password" type="password" placeholder="Password" required>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details">Instansi</span>
                        <input name="instansi" type="text" placeholder="Instansi" required>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details" style="display: inline;">Pilih Lomba</span>
                        <select class="col-lg-12 col-md-12 col-sm-12" name="id_comp" required>
                            <option disabled selected value>...</option>
                            <?php
                            while ($data = mysqli_fetch_array($competitions)) {
                            ?>
                                <option value="<?= $data['id_comp']; ?>"><?= $data['jenis_comp']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="button">
                    <input name="daftar" type="submit" value="Register">
                    <!-- <button style="
                    height: 100%;
                    width: 100%;
                    border-radius: 5px;
                    border: none;
                    color: #ccc;
                    font-size: 18px;
                    font-weight: 500;
                    letter-spacing: 1px;
                    transition: all 0.3s ease;
                    background: linear-gradient(135deg, #fc5186, #58c3ca);
                    " type="submit" disabled>Sudah ditutup</button> -->
                    <div class="d-flex justify-content-center">
                        I have an account
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="mx-1" href="../login/">Login</a> | <a class="mx-1" href="../../">Home</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>