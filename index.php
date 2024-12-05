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
            position: fixed;
            top: 50px;
            /* width: 220px; */
            height:100%;
            /* z-index: -1; */
        }
        /* .content {
            margin-top: 2%;
            margin-left: 5%; 
            width: 80%; 
            height: 100%;
            min-height: 100vh;
        } */
        /* nav {
            float: left;
            max-width: 160px;
            margin: 0;
            padding: 1em;
        } */
    </style>
    
</head>

<?php

    session_start();
    ob_start();
    // error_reporting(0);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include_once("model/model.php");
    include_once("controller/controller.php");
    include_once("controller/upload.php");
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

<style>
    .background{
       background-color: seagreen; 
       height:auto;
    }
    .section_phu{
        margin-top: 55px;
    }
</style>
  
        <?php
            include_once('view/giaodien/header.php');
            
        ?>
    <div class="container-fluid">
            <div class="row">
                    <?php
                   
                        if(isset($_REQUEST["page"]) && $_REQUEST["page"] == "chusan" ){
                                // $_SESSION["chusan"] = 1;
                            if(isset($_SESSION["chusan"]) && !isset($_SESSION["nhanvien"])){
                                echo '<div class="col-md-2 background" style="">';
                                include_once("view/giaodien/menuchusan.php");
                                echo "</div>";
                                echo "<div class='col-md-10'>";
                                include_once("view/chusan/index.php");
                                echo "</div>";
                            }else{
                                echo '<div class="col-md-2 background" style="">';
                                include_once("view/giaodien/menunhanvien.php");
                                echo "</div>";
                                echo "<div class='col-md-10'>";
                                include_once("view/nhanvien/index.php");
                                echo "</div>";
                            }
                        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlykhachhang"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/chusan/quanlykhachhang.php");
                            echo "</div>";
                        } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlynhanvien"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/chusan/quanlynhanvien.php");
                            echo "</div>";
                        } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlysan" && isset($_SESSION["chusan"])){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/quanlysan/index.php");
                            echo "</div>";
                        } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlysan" && isset($_SESSION["nhanvien"])){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menunhanvien.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/quanlysan/index.php");
                            echo "</div>";
                        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "danhsachkhachhang"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menunhanvien.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/nhanvien/danhsachkhachhang.php");
                            echo "</div>";
                        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlyloaisan"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/quanlyloaisan/index.php");
                            echo "</div>";
                        } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlydoanhthu"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/quanlydoanhthu/index.php");
                            echo "</div>";
                        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlylichdatsan"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/quanlylichdatsan/index.php");
                            echo "</div>";
                        } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "themdiadiem"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/themdiadiem/index.php");
                            echo "</div>";
                        } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "themsan"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/themsan/index.php");
                            echo "</div>";
                        } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "xemchitietsan"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/quanlysan/xemchitietsan.php");
                            echo "</div>";
                        } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "suagiasan"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/suagiasan/index.php");
                            echo "</div>";
                        }elseif(isset($_REQUEST['datsantheongay'])) {
                            include_once ("view/datsantheongay/index.php");
                        }elseif(isset($_REQUEST['chinhsach'])) {
                            include_once ("view/chinhsach/index.php");
                        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "datsantheongay"){
                            include_once("view/datsantheongay/index.php");
                        } elseif(isset($_REQUEST['dangky'])) {
                            include_once ("view/dangky/index.php");
                        } elseif(isset($_REQUEST['dangnhap'])) {
                            include_once ("view/dangnhap/index.php");
                        } elseif(isset($_REQUEST['chusandangnhap'])) {
                            include_once ("view/chusandangnhap/index.php");
                        } elseif(isset($_REQUEST['dangxuat'])) {
                            include_once ("view/dangxuat/index.php");
                        } elseif(isset($_REQUEST['dangnhapchochusan'])) {
                            include_once ("view/dangnhapchochusan/index.php");
                        }elseif(isset($_REQUEST['thongtinkhachhang'])) {
                            include_once ("view/thongtinkhachhang/index.php");
                        }elseif(isset($_REQUEST['lichdadatsan'])) {
                            include_once ("view/thongtinkhachhang/index.php");
                        }elseif(isset($_REQUEST['doimatkhaukhachhang'])) {
                            include_once ("view/thongtinkhachhang/index.php");
                        }elseif(isset($_REQUEST['thaydoithongtin'])) {
                            include_once ("view/thongtinkhachhang/index.php");
                        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "order"){
                            include_once("view/order/index.php");
                        } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "chitietdiachisan"){
                            include_once("view/chitietdiachisan/index.php");
                        } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "lichdatsan"){
                            include_once("view/lichdatsan/index.php");
                        } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "home") {
                            include_once("view/danhsachdiachi/index.php");
                        }elseif(isset($_REQUEST["thongtinchusan"])) {
                            include_once("view/chusan/thongtinchusan.php");
                        }elseif(isset($_REQUEST['thaydoithongtinchusan'])) {
                            include_once ("view/chusan/thongtinchusan.php");
                        }elseif(isset($_REQUEST['doimatkhauchusan'])) {
                            include_once ("view/chusan/thongtinchusan.php");
                        }elseif(isset($_REQUEST['thongtinnhanvien'])) {
                            include_once ("view/nhanvien/thongtinnhanvien.php");
                        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "quanlyloaisan"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/quanlyloaisan/quanlyloaisan.php");
                            echo "</div>";
                        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "sualoaisan"){
                            echo "<div class='col-md-10'>";
                            include_once("view/sualoaisan/sualoaisan.php");
                            echo "</div>";
                        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "themdiadiem"){
                            echo '<div class="col-md-2 background" style="">';
                            include_once("view/giaodien/menuchusan.php");
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            include_once("view/themdiadiem/index.php");
                            echo "</div>";
                        } else {
                            if(isset($_GET["page"])){
                                $page=$_GET["page"];
                            }else{
                                $page="danhsachdiachi";
                            }
                            if(file_exists("view/".$page."/index.php")){
                                include_once("view/danhsachdiachi/index.php");
                            }else{
                                echo "<img src='image/404error.jpg' style='width: 100%; height: 100%;'>";
                            }
                                
                        } 
                    ?>
            </div>
        </div>
    </div>
       <?php 
            include_once("view/giaodien/footer.php"); 
        ?>

    
</body>
</html>
