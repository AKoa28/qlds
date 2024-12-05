<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $today = date('Y-m-d');
    session_start();
    include_once("../../controller/controller.php");
    include_once("../../model/model.php");
    require_once("../../mail/sendmail.php");
    if(isset($_REQUEST["value"])){
        if(isset($_REQUEST["teninput"]) && $_REQUEST["teninput"]=="ngay"){
            echo "111";
        }
    }

?>