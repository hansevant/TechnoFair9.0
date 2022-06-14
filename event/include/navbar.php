<?php
include "var.php"
?>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center header-inner">
        <div class="container-fluid container-xxl d-flex align-items-center">

            <div id="logo" class="me-auto">
                <!-- Uncomment below if you prefer to use a text logo -->
                <!-- <h1><a href="index.html">TECHNOFAIR<span> 9.0</span></a></h1> -->
                <a href="../../" class="scrollto"><img src="../../assets/img/logo/logo.png" alt="" title="">
                    <span class="logo"> TechnoFair <span style="color: #40C0C9;">9.0</span></span>
                </a>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="../../">Home</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#about">About</a></li> -->

                    <li class="dropdown"><a href="#"><span>Webinar</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="../webinar/webinar1.php">Big Data</a></li>
                            <li><a href="../webinar/webinar2.php">Smart City</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Competition</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="../compe/compe1.php">Infographic</a></li>
                            <li><a href="../compe/compe2.php">Smart FIKTI</a></li>
                            <li><a href="../compe/compe3.php">Capture The Flag</a></li>
                            <li><a href="../compe/compe4.php">UX Design</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Workshop</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="../workshop/workshop1.php">Digital Marketing</a></li>
                            <li><a href="../workshop/workshop2.php">UI Design</a></li>
                        </ul>
                    </li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

            <a class="buy-tickets scrollto" href="<?= $login ?>">Login</a>

        </div>
    </header> <!-- End Header -->