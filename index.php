<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
    error_reporting(0);
    include_once("model/model.php");
    include_once("controller/controller.php");
    // include_once("view/lichdatsan/index.php");
    include_once("view/giaodien/header.php");
        if(isset($_GET['login'])) {
            include_once ("view/login.php");
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