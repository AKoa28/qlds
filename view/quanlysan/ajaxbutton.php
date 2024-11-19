<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $today = date('Y-m-d');
    session_start();
    include_once("../../controller/controller.php");
    include_once("../../model/model.php");
    require_once("../../mail/sendmail.php");
    if($_REQUEST["madiadiem"] != null){
        if($_REQUEST["tencbx"]=="cbxdiadiem"){
            $madiadiem = $_REQUEST["madiadiem"];
            if(isset($_SESSION["chusan"])){
                echo '<a type="submit" class="btn btn-success" href="?page=themsan&madd='.$madiadiem.'"><i class="bi bi-plus"></i>Thêm sân</a>';
            }else{
                echo "";
            }
        }
    }else{
        echo "";
    }

?>