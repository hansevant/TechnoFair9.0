<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Workshop Registration</title> <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">
</head>

<body>

    <div class="container" style="max-width: 700px !important;">
        <div class="title">Workshop Registration</div>
        <div class="content">
            <form action="config/ws.php" method="post" enctype="multipart/form-data">
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
                        <span class="details" style="display: inline;">Pilih Workshop</span>
                        <select class="col-lg-12 col-md-12 col-sm-12" name="event" required>
                            <option disabled selected value>...</option>

                            <option value="UI Design">UI Design</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Both">Keduanya</option>

                        </select>
                    </div>

                    <div class="input-box col-lg-6 col-md-6 col-sm-12">
                        <span class="details">Alasan mengikuti Workshop</span>
                        <input name="idline" type="text" placeholder="Alasan" required>
                    </div>


                    <div class="input-box col-lg-12 col-md-12 col-sm-12">
                        <span class="details">Upload Bukti Pembayaran <br>
                            <span style="color: #aaa;">*Dengan format nama_namaworkshop dan berupa JPG/JPEG/PNG</span>
                        </span>
                        <input name="payment" class="form-control" type="file" required>


                    </div>



                    <div class="input-box col-lg-6 col-md-6 col-sm-12 text-c">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info text-center" data-toggle="modal" data-target="#exampleModal" style="background-color: #37506c;">
                            Cara Pembayaran
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <span class="details">Harga : 20.000/tiket 💰 <br> <br> Pembayaran bisa dilakukan melalui <br>Bank BCA : 1082413418 a.n Miselia Filiani <br> <br>
                                        <!-- <span style="font-size:16px;">*Peserta dapat memesan 2 tiket untuk jenis workshop yang sama atau berbeda. silahkan hubungi CP terlebih dahulu sebelum memesan.</span> -->
                                        <!-- <br><br> -->
                                        <span>Contact Person : <br>
                                            082113322317 (Husein via WhatsApp) <br>
                                            ab_Roid (Husein via LINE)</span>
                                    </span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
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

    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>