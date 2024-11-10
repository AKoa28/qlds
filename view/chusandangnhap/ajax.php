<?php
session_start();
include_once("../../controller/controller.php");
include_once("../../model/model.php");
require_once("../../mail/sendmail.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sdt = $_POST["sdt"];
        $pass = $_POST["pass"];
        $p = new ctaikhoan();
        $tbldangnhap = $p->getkhachDANGNHAP($sdt,$pass);
        if(!$tbldangnhap){
            echo "thatbai";
        }else{
            echo "Xin chào quý khách " . $_SESSION["tenkhachhang"] . ". Bạn đã đăng nhập thành công";
        }

    }
?>