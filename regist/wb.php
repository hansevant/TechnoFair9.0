<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Webinar Registration</title>
    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">
</head>

<body>

    <div class="container" style="max-width: 700px !important;">
        <div class="title">Webinar Registration</div>
        <div class="content">
            <form action="config/wb.php" method="post">
                <div class="row user-details" style="flex-direction: row;">

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details">Nama Lengkap</span>
                        <input name="nama" type="text" placeholder="Nama Lengkap" required>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details">Kota</span>
                        <input name="asal" type="text" placeholder="Kota" required>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details">Instansi</span>
                        <input name="instansi" type="text" placeholder="Asal Instansi/Institusi/Universitas" required>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details">Status</span>
                        <input name="status" type="text" placeholder="Status Pekerjaan" required>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details">Email</span>
                        <input name="email" type="email" placeholder="Email" required>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details">Nomor WhatsApp</span>
                        <input name="nohp" type="number" placeholder="Nomor WhatsApp" required>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details" style="display: inline;">Pilih Webinar</span>
                        <select class="col-lg-12 col-md-12 col-sm-12" name="event" required>
                            <option disabled selected value>...</option>

                            <option value="Big Data">Big Data</option>
                            <option value="Smart City">Smart City</option>

                        </select>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details">Alasan Mengikuti Webinar</span>
                        <input name="idline" type="text" placeholder="Alasan" required>
                    </div>

                </div>
                <div class="button">
                    <input name="daftar" type="submit" value="Register">
                    <!-- <button class=button type="submit" name="submit">daftar</button> -->
                    <div class="d-flex justify-content-center">
                        <a class="mx-1 mt-3" href="javascript:window.history.go(-1);">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>