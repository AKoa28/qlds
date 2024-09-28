<?php
    $thongtin = $_REQUEST["tt"];
    $parts = explode("_",$thongtin);
    $khunggio = $parts[0];
    $tensan = $parts[1];
    $ngay = $parts[2];
    $gia = $parts[3];

    echo $khunggio ."<br>";
    echo $tensan ."<br>";
    echo $ngay ."<br>";
    echo $gia ."<br>";

    
?>
