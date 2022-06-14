<?php
require('../include/head.php')
?>

<?php
require('../include/navbar.php')
?>

<main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
    <section id="speakers-details">
        <div class="container">
            <div class="section-header">
                <h2>Webinar</h2>
                <p>“How Smart City is Changing the World”</p>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <img src="../../assets/img/event/smartcity.png" alt="Speaker 1" class="img-fluid">
                </div>

                <div class="col-md-8 my-auto">
                    <div class="details">
                        <h2>Smart City</h2>

                        <p>Webinar ini akan mengangkat topik smart city. Smart city adalah sebuah konsep kota yang memanfaatkan teknologi informasi untuk
                            mengintegrasikan seluruh infrastruktur dan pelayanan dari pemerintah
                            kepada warga masyarakat. Penerapan konsep smart city dalam sebuah
                            perencanaan kota untuk mewujudkan pembangunan berkelanjutan
                            dengan meningkatkan layanan masyarakat dengan mengintegrasikan
                            beberapa elemen yang ada di perkotaan seperti pemerintahan, ekonomi,
                            kualitas hidup, lingkungan, sumber daya manusia, dan transportasi.
                        </p>

                        <!-- <p>CP : 082298944933 (Aldi Taher) </p> -->

                        <div class="speakers mt-3">

                            <div class="row" id="benefits">
                                <div class="col-md-5">
                                    <h3>Benefits</h3>
                                    <div class="icon-box ">
                                        <i class="bi bi-check-circle"></i>
                                        <p>E-Certificate</p>
                                        <!-- <br> -->
                                    </div>
                                    <div class="icon-box ">
                                        <i class="bi bi-check-circle"></i>
                                        <p>Ilmu Bermanfaat</p>
                                        <!-- <br> -->
                                    </div>
                                    <div class="icon-box ">
                                        <i class="bi bi-check-circle"></i>
                                        <p>Doorprize</p>

                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="regist">

                                        <h3>Register Form</h3>
                                        <p>
                                            Contact Person:<br>
                                        <p></p>
                                        <i class="bi bi-whatsapp" style="font-size: 18px;"></i>&nbsp; 082279680734 (Rizki via WhatsApp)<br>
                                        <i class="bi bi-line" style="font-size: 18px;"></i>&nbsp; fajarugh (Rizki via LINE)</p><br>

                                        <a href="<?= $regSmartCity; ?>" class="btn btn-dark" style="width: auto; padding: 8px 15px;">Regist Now !</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>

    <section id="benefit">
        <div class="container">
            <!-- <div class="section-header">
          <h2>Benefits</h2>
        </div> -->
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="card">
                        <!-- <i class="bi bi-calendar-event"></i> -->
                        <lord-icon src="https://cdn.lordicon.com/kbtmbyzy.json" trigger="loop" colors="primary:#f6f5f6,secondary:#fd5286" style="width:65px;height:65px">
                        </lord-icon>
                        <h4 class="card-title mt-2">Waktu dan Tanggal</h4>
                        <p>09.00 - 12.00 & 29 Mei 2022</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <!-- <i class="bi bi-broadcast"></i> -->
                        <lord-icon src="https://cdn.lordicon.com/tclnsjgx.json" trigger="loop" colors="primary:#f6f5f6,secondary:#fd5286" style="width:65px;height:65px">
                        </lord-icon>
                        <h4 class="card-title mt-2">Tempat</h4>
                        <p>Zoom Clouds Meetings & Live Streaming Youtube</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <!-- <i class="bi bi-ticket-detailed"></i> -->
                        <img src="../../assets/img/icon/759-ticket-coupon-outline.svg" width="65">
                        <h4 class="card-title mt-2">Harga Tiket</h4>
                        <p>Free</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section id="benefits" class="mt-5"> -->

    <section id="speakers" class="mt-5">

        <div class="container">
            <div class="section-header">
                <h2>Speakers</h2>
            </div>

            <div class="row text-center mt-1">
                <div class="col-md-6">

                    <img src="../../assets/img/speakers/WEB.3@300x.png" alt="" width="350">
                    <p class="text-title">Teddy Oswari, SE., MM., MIKom., C.LMA</p>
                    <p class="text-body">Dosen Universitas Gunadarma</p>
                </div>
                <div class="col-md-6">

                    <img src="../../assets/img/speakers/WEB.2@300x.png" alt="" width="350">
                    <p class="text-title">Dr. rer.nat Avinanta Tarigan</p>
                    <p class="text-body">Tim Peneliti Universitas Gunadarma Center for Smart and Sustainable City (UG-CSCC)</p>
                </div>
            </div>
        </div>

    </section>

</main><!-- End #main -->

<?php
require('../include/footer.php')
?>