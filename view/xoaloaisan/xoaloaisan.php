<?php
    if(isset($_SESSION["chusan"])){
        $p = new cloaisan();
        $maLoai = $_REQUEST["maLoai"];
        $xoaloaisan = $p->getXoaLoaiSan($maLoai);
        if($xoaloaisan){
            echo '<script>alert("Xoá loại sân thành công!")</script>';
            header("refresh:0;url='?page=quanlyloaisan'");
        }else{
            echo '<script>alert("Xoá loại sân không thành công!")</script>';
            header("refresh:0;url='?page=quanlyloaisan'");
        }
    }else{
        header("Location: ?page=chusan");
    }
   

?>