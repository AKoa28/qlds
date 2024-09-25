<?php
    include_once("ketnoi.php");
    class model{
        public function selectallsan(){
            $p = new ketnoi();
            $con = $p->moketnoi();

            $sql="select * from san s join ngaythue t on s.MaSan = t.MaSan join gia g on t.MaGia = g.MaGia join khunggio k on t.KhungGio = k.MaKhungGio";

            $kq = mysqli_query($sql);
            if($kq){
                return true;
            }else{
                return false;
            }
        }
    }
?>