<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="css/style.css">
    <title>Quản lý chủ sân</title>
    <style>
        .fix-header { 
            width: 100%;
            z-index: 1000;
        }
        .fixed-menu { 
            /* margin-top: 0; */
            width: 100%;
        }
        .content {
            margin-top: 2%;
            margin-left: 20%; /* Khoảng trống cho menu cố định */
            width: 80%; /* Chiếm 85% màn hình */
            height: 100%;
            min-height: 100vh;
        }
    </style>
</head>
<style>
    body{
        /* background-image: url('image/nen1.jpg'), url('image/nen1.jpg');
        background-size: 100%; */
    }
</style>
<?php

    session_start();
    ob_start();
    error_reporting(0);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include_once("model/model.php");
    include_once("controller/controller.php");
    require_once("mail/sendmail.php");
    // include_once("view/lichdatsan/index.php");
    // include_once("view/giaodien/header.php");
    //     if(isset($_REQUEST['dangky'])) {
    //         include_once ("view/dangky/index.php");
    //     }elseif(isset($_REQUEST['dangnhap'])) {
    //         include_once ("view/dangnhap/index.php");
    //     }elseif(isset($_REQUEST['dangxuat'])) {
    //         include_once ("view/dangxuat/index.php");
    //     }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "order"){
    //         include_once("view/order/index.php");
    //     }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "chitietdiachisan"){
    //         include_once("view/chitietdiachisan/index.php");
    //     }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "lichdatsan"){
    //         include_once("view/lichdatsan/index.php");
    //     }else {
    //         include_once("view/danhsachdiachi/index.php");
    //     }
    //     include_once("view/giaodien/footer.php");
?>



<div class="">
  
        <?php
            include_once('view/giaodien/header.php');
        ?>
    <!-- <div class="d-flex fixed-menu"> -->
        <div class="container-flex">
            <div class="row">
        <?php
            if(isset($_REQUEST["page"]) && $_REQUEST["page"] == "chusan"){
                $_SESSION["chusan"] = 1;
                echo '<div class="col-md-4">';
                include_once("view/giaodien/menuchusan.php");
                echo "</div>";
                echo "<div class='col-md-8'>";
                include_once("view/chusan/index.php");
                echo "</div>";
            } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlykhachhang"){
                include_once("view/giaodien/menuchusan.php");
                echo "<div class='content'>";
                include_once("view/chusan/quanlykhachhang.php");
                echo "</div>";
            } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlynhanvien"){
                include_once("view/giaodien/menuchusan.php");
                echo "<div class='content'>";
                include_once("view/quanlynhanvien/index.php");
                echo "</div>";
            } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlysan"){
                include_once("view/giaodien/menuchusan.php");
                echo "<div class='content'>";
                include_once("view/quanlysan/index.php");
                echo "</div>";
            } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlyloaisan"){
                include_once("view/giaodien/menuchusan.php");
                echo "<div class='content'>";
                include_once("view/quanlyloaisan/index.php");
                echo "</div>";
            } else {
                echo "<div class='container-fluid'>";
                if(isset($_REQUEST['dangky'])) {
                    include_once ("view/dangky/index.php");
                } elseif(isset($_REQUEST['dangnhap'])) {
                    include_once ("view/dangnhap/index.php");
                } elseif(isset($_REQUEST['dangxuat'])) {
                    include_once ("view/dangxuat/index.php");
                } elseif(isset($_REQUEST['dangnhapchochusan'])) {
                    include_once ("view/dangnhapchochusan/index.php");
                }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "order"){
                    include_once("view/order/index.php");
                } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "chitietdiachisan"){
                    include_once("view/chitietdiachisan/index.php");
                } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "lichdatsan"){
                    include_once("view/lichdatsan/index.php");
                } else {
                    include_once("view/danhsachdiachi/index.php");
                }
                // echo "</div>";
            }
        ?>
        </div>
        </div>
    </div>
        <?php include_once("view/giaodien/footer.php"); ?>
    </div>
</body>
</html>