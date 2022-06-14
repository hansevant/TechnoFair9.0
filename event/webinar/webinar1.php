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
        <p>“Kickstart Your Career in Big Data”</p>
      </div>

      <div class="row mt-3">
        <div class="col-md-4">
          <img src="../../assets/img/event/bigdata.png" alt="Speaker 1" class="img-fluid">
        </div>

        <div class="col-md-8 my-auto">
          <div class="details">
            <h2>Big Data</h2>

            <p>Webinar ini akan mengangkat topik big data. Big data adalah kumpulan
              data yang sangat besar, kompleks dan terus bertambah setiap waktu. Data ini
              dihasilkan dari aktivitas internet yang makin rutin dilakukan, baik untuk
              tujuan pribadi maupun bisnis. Webinar ini bermaksud memperkenalkan big
              data yang merupakan bagian dari dunia teknologi yang sedang trend saat ini
              dan mengimplementasikan big data kepada para peserta.
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

                    <a href="<?= $regBigData; ?>" class="btn btn-dark" style="width: auto; padding: 8px 15px;">Regist Now !</a>

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
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <!-- <i class="bi bi-calendar-event"></i> -->
            <lord-icon src="https://cdn.lordicon.com/kbtmbyzy.json" trigger="loop" colors="primary:#f6f5f6,secondary:#fd5286" style="width:65px;height:65px">
            </lord-icon>
            <h4 class="card-title mt-2">Waktu dan Tanggal</h4>
            <p>13.00 - 16.00 & 28 Mei 2022</p>
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
          <img src="../../assets/img/speakers/s2.svg" width="400" class="img-fluid">

          <p class="text-title">Dr. Dea Adlina, ST.MMSI.MSc</p>
          <p class="text-body">Dosen Universitas Gunadarma</p>
        </div>
        <div class="col-md-6">
          <img src="../../assets/img/speakers/s1.svg" width="400" class="img-fluid">

          <p class="text-title">Bagus Rully Mutaqien</p>
          <p class="text-body">Head Of Corporate Communications at PT. Dua Empat Tujuh <br> dan Co-Founder at idBigdata</p>
        </div>
      </div>
    </div>

  </section>

</main><!-- End #main -->

<?php
require('../include/footer.php')
?>