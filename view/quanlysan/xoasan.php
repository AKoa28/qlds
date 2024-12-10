<?php
    if(isset($_SESSION["chusan"])){
        $ps = new csan();
        $p = new controller();
        $diachi = $_REQUEST["madd"];
        $masanurl = $_REQUEST["mas"];
        $kiemtramaddcuacs = $p->getktsohuusan($diachi,$masanurl);
        if($kiemtramaddcuacs){
            
            $Ansan = $ps->getAnSan($masanurl,$diachi);
            if($Ansan){
                echo '<script>alert("Xoá sân thành công!")</script>';
                header("refresh:0;url='?page=quanlysan'");
            }else{
                echo '<script>alert("Xoá sân không thành công!")</script>';
                header("refresh:0;url='?page=quanlysan'");
            }
        }else{
            header("Location: ?page=quanlysan");
        }
    }else{
        header("Location: ?page=home");
    }

?>