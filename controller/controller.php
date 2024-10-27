<?php
    // session_start();
    // include_once("model/model.php");
    class controller{
        public function getselectallsan($diachi){
            $p = new model();
            $con = $p->selectallsan($diachi);
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }
        }

        public function getselectkhunggio(){
            $p = new model();
            $con = $p->selectkhunggio();
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }
        }
        public function getselectsandistinctmasan($diachi){
            $p = new model();
            $con = $p->selectsandistinctmasan($diachi);
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }
        }
        public function getselectsanbykhunggio_san_thu($khunggio,$san,$thu){
            $p = new model();
            $con = $p->selectsanbykhunggio_san_thu($khunggio,$san,$thu);
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    while($r = $con->fetch_assoc()){
                        $gia = $r["gia"];
                    }
                    return $gia;
                }else{
                    return 0;
                }
            }
        }

        public function getselectdiachisan(){
            $p = new model();
            $con = $p->selectdiachisan();
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }
        }

        public function getdatsan($masan,$khunggio){
            $p = new model();
            $con = $p->selectdatsan($masan,$khunggio,);
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }
        }
    }

    class cnguoidung{
        public function getselectallnguoidung(){
            $p = new mnguoidung();
            $con = $p->selectallnguoidung();
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }
        }

        public function getinsertkhachvanglai($ten,$sdt,$trangthai){
            $capnhatlancuoi = date("Y-m-d H:i:s");
            $p = new mnguoidung();
            $con = $p->insertkhachvanglai($ten,$sdt,$trangthai,$capnhatlancuoi);
            if(!$con){
                return false;
            }else{
                if($con->num_rows > 0){
                    while($r = $con->fetch_assoc()){
                        $makh = $r["MaKhachHang"];
                    }
                    return $makh;
                }
            }
        }
    }

    class ctaikhoan{
        public function getkhachDANGNHAP($sdt,$pass){
            $pass = md5($pass);
            $p = new mtaikhoan();
            $con = $p->khachDANGNHAP($sdt,$pass);
            if($con->num_rows > 0){
                while($r = $con->fetch_assoc()){
                    $_SESSION["dangnhap"] = $r["MaKhachHang"];
                    $_SESSION["tenkhachhang"] = $r["Ten"];
                }
                return $con;
            }else{
                return 0;
            }
        }
        public function getselecttrungsdt($sdt){
            $p = new mtaikhoan();
            $con = $p->selecttrungsdt($sdt);
            if(!$con){
                return false;
            }else{
                return $con;
            }
        }
        public function getselecttrungemail($email){
            $p = new mtaikhoan();
            $con = $p->selecttrungemail($email);
            if(!$con){
                return false;
            }else{
                return $con;
            }
        }

        public function getinserttaikhoan($ten,$sdt,$email,$pass){
            $pass = md5($pass);
            $capnhatlancuoi = date("Y-m-d H:i:s");
            $p = new mtaikhoan();
            $con = $p->inserttaikhoan($ten,$sdt,$email,$pass,$capnhatlancuoi);
            if(!$con){
                return false;
            }else{
                return $con;
            }
        }

        public function getupdatetaikhoan($ten,$sdt,$email,$pass){
            $pass = md5($pass);
            $capnhatlancuoi = date("Y-m-d H:i:s");
            $p = new mtaikhoan();
            $con = $p->updatetaikhoan($ten,$sdt,$email,$pass, $capnhatlancuoi);
            if(!$con){
                return false;
            }else{
                return $con;
            }
        }

    }

    class cdatsan{
        public function getinsertdatsankhachvl($makh,$ngaydat,$trangthai,$tongtien,$diadiem){
            $p = new mdatsan();
            $con = $p->insertdatsankhachvl($makh,$ngaydat,$trangthai,$tongtien,$diadiem);
            return $con;
        }
    }

    class ckhachhang {
        public function getselectallkhachhang() {
            $p = new mkhachhang();
            $con = $p->xemkhachhang();
            if (!$con) {
                return -1;
            } else {
                if ($con->num_rows > 0) {
                    return $con;
                } else {
                    return 0;
                }
            }
        }
        public function themtaikhoan($ten, $sdt, $email, $matkhau) {
            $p = new mkhachhang();
            return $p->themtaikhoan($ten, $sdt, $email, $matkhau);
        }
    
        public function layMaTaiKhoan($sdt) {
            $p = new mkhachhang();
            return $p->layMaTaiKhoan($sdt);
        }
    
        public function themkhachhang($mataikhoan) {
            $p = new mkhachhang();
            return $p->themkhachhang($mataikhoan);
        }
    
        public function xoaKhachHang($makhachhang) {
            $p = new mkhachhang();
            $con = $p->xoaKhachHang($makhachhang);
            if ($con) {
                echo "<script>alert('Xóa khách hàng thành công'); window.location.href='../qlds/index.php?page=xemkhachhang';</script>";
            } else {
                echo "<script>alert('Lỗi khi xóa khách hàng'); window.location.href='../qlds/index.php?page=xemkhachhang';</script>";
            }
        }
    
        // public function kiemtraEmailSDT($email, $sdt) {
        //     $p = new mkhachhang();
        //     $con = $p->kiemtraEmailSDT($email, $sdt);
        //     if ($con) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }
    
        public function xacThucKhachHang($makhachhang) {
            $p = new mkhachhang();
            return $p->xacThucKhachHang($makhachhang);
        }
        public function timKiemKhachHang($keyword) {
            $p = new mkhachhang();
            return $p->timKiemKhachHang($keyword);
        }
    }
?>