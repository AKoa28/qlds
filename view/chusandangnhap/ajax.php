<?php
session_start();
include_once("../../controller/controller.php");
include_once("../../model/model.php");
require_once("../../mail/sendmail.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sdt = $_POST["sdt"];
        $pass = $_POST["pass"];
        $p = new ctaikhoan();
        $tblchusandangnhap = $p->getquanlysanDANGNHAP($sdt,$pass);
        if(!$tblchusandangnhap){
            echo "thatbai";
        }else{
            if(isset($_SESSION["chusan"])){
                echo "Xin chào Chủ sân " . $_SESSION["ten"];
            }else{
                echo "Xin chào Nhân viên " . $_SESSION["ten"];
            }
            
        }

    }
?>