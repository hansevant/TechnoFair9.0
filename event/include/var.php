<?php

date_default_timezone_set("Asia/Jakarta");

$openwb = "../../regist/wb.php";
$openws = "../../regist/ws.php";
$block = "../../block.html";

// untuk jadwal open regist wb ws

// big data 
if (new DateTime() < new DateTime("2022-05-13 00:00:00")) {
    $regBigData = $block;
} else if (new DateTime() > new DateTime("2022-05-27 23:59:59")) {
    $regBigData = $block;
} else {
    $regBigData = $openwb;
}
// smart city 
if (new DateTime() < new DateTime("2022-05-13 00:00:00")) {
    $regSmartCity = $block;
} else if (new DateTime() > new DateTime("2022-05-28 23:59:59")) {
    $regSmartCity = $block;
} else {
    $regSmartCity = $openwb;
}
// ui design
if (new DateTime() < new DateTime("2022-05-10 00:00:00")) {

    $regDigitalM = $block;
} else if (new DateTime() > new DateTime("2022-05-27 23:59:59")) {
    $regUiDesign = $block;
    $regDigitalM = $block;
} else {
    $regDigitalM = $openws;
}
// digital marketing
if (new DateTime() < new DateTime("2022-05-10 00:00:00")) {
    $regUiDesign = $block;
} else if (new DateTime() > new DateTime("2022-05-28 23:59:59")) {
    $regUiDesign = $block;
} else {
    $regUiDesign = $openws;
}

$login = "../../account/login";

//untuk testing

// $regBigData = $openwb;
// $regSmartCity = $openwb;
// $regDigitalM = $openws;
// $regUiDesign = $openws;

$compe = "../../account/register";

$tgl = 25;
