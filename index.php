<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Quản lý chủ sân</title>
    <style>
        .fix-header { 
            width: 100%;
            z-index: 1000;
        }
        .fixed-menu { 
            margin-top: 2%;
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
<body>
<?php
    session_start();
    ob_start();
    error_reporting(0);
    include_once("model/model.php");
    include_once("controller/controller.php");
    
?>

<div class="wrapper">
    <div class="d-flex fixed-header" style="z-index:1000">
        <?php
            include_once('view/giaodien/header.php')
        ?>
    </div>
    <div class="d-flex fixed-menu">
        <?php
            if(isset($_REQUEST["page"]) && $_REQUEST["page"] == "chusan"){
                include_once("view/giaodien/menuchusan.php");
                echo "<div class='content'>";
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
                include_once("view/chusan/quanlynhanvien.php");
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
                } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "order"){
                    include_once("view/order/index.php");
                } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "chitietdiachisan"){
                    include_once("view/chitietdiachisan/index.php");
                } elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "lichdatsan"){
                    include_once("view/lichdatsan/index.php");
                } else {
                    include_once("view/danhsachdiachi/index.php");
                }
                echo "</div>";
            }
        ?>
    </div>
        <?php include_once("view/giaodien/footer.php"); ?>
    </div>
</body>
</html>