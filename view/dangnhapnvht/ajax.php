<?php
session_start();
include_once("../../controller/controller.php");
include_once("../../model/model.php");
require_once("../../mail/sendmail.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $pass = $_POST["pass"];
        $p = new ctaikhoan();
        $tblnhanvienhethongdangnhap = $p->getnhanvienhethongDANGNHAP($username,$pass);
        if(!$tblnhanvienhethongdangnhap){
            echo "thatbai";
        }else{
            if(isset($_SESSION["nhanvienhethong"])){
                echo "Xin chào " . $_SESSION["tennhanvienhethong"];
            }else{
                echo "Xin chào " . $_SESSION["tennhanvienhethong"];
            }
            
        }

    }
?>