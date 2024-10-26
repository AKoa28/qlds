<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
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
    include_once("model/model.php");
    include_once("controller/controller.php");
    require_once("mail/sendmail.php");
    // include_once("view/lichdatsan/index.php");
    include_once("view/giaodien/header.php");
        if(isset($_REQUEST['dangky'])) {
            include_once ("view/dangky/index.php");
        }elseif(isset($_REQUEST['dangnhap'])) {
            include_once ("view/dangnhap/index.php");
        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "order"){
            include_once("view/order/index.php");
        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "chitietdiachisan"){
            include_once("view/chitietdiachisan/index.php");
        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"] == "lichdatsan"){
            include_once("view/lichdatsan/index.php");
        }else {
            include_once("view/danhsachdiachi/index.php");
        }
        include_once("view/giaodien/footer.php");
?>