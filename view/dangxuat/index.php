<?php
    session_start();
    session_destroy();
    // unset($_SESSION["dangnhap"]);
    header("Location: index.php?page=home&trang=1");
?>