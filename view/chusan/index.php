<?php
    if(!isset($_SESSION["chusan"])){
        header("Location: ?chusandangnhap");
    }

?>
<div style="margin-top: 55px;" align="center">
    <h1>DASBOARH DÀNH CHO CHỦ SÂN</h1>
    <?php echo $_SESSION["chusan"] ?>
    
</div>