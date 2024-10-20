<?php
    include_once("ketnoi.php");
    class model{
        // select bảng san liên kết với sanvsgiavskhunggio, gia, khunggio, diachi, loaisan, trangthai
        public function selectallsan($diachi){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="select s.*, TenLoaiSan, tt.TrangThai, TenKhungGio, k.MaKhungGio  from san s join san_gia_thu_khunggio t on s.MaSan = t.MaSan join gia g on t.MaGia = g.MaGia join khunggio k on t.KhungGio = k.MaKhungGio join diadiem c on s.MaDiaDiem = c.MaDiaDiem join loaisan l on l.MaLoai = s.MaLoaiSan where s.MaDiaDiem = '$diachi'";
                // $sql = "select * from san s join loaisan l on s.MaLoaiSan = l.MaLoai";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function selectkhunggio(){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM KhungGio";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        // select MaSan, TenSan, TenLoaiSan của bảng sanvsgiavskhunggio lấy ra các giá trị duy nhất từ cột Mã Sân
        public function selectsandistinctmasan($diachi){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="select DISTINCT t.MaSan, TenSan, TenLoaiSan  from san_gia_thu_khunggio t join san s on t.MaSan = s.MaSan join loaisan l on s.MaLoaiSan = l.MaLoai join diadiem c on s.MaDiaDiem = c.MaDiaDiem  where s.MaDiaDiem = '$diachi'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        //select GiaTheoKhungGio của bảng sân liên kết với gia, khunggio điều kiện where Mã Sân, Khung Giờ, Mã Thứ
        public function selectsanbykhunggio_san_thu($khunggio,$san,$thu){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="select gia from san s join san_gia_thu_khunggio t on s.MaSan = t.MaSan join gia g on t.MaGia = g.MaGia join khunggio k on t.KhungGio = k.MaKhungGio where t.MaSan = '$san' and t.KhungGio = '$khunggio' and t.MaThu = '$thu'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }

        //select bảng địa chỉ
        public function selectdiachisan(){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="select * from diadiem";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }

        public function selectdatsan($masan,$khunggio){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="select NgayDatSan from datsan d join chitietdatsan ct on d.MaDatSan=ct.MaDatSan  where MaSan = '$masan' and KhungGio = '$khunggio'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
    }

    class mnguoidung{
        public function selectallnguoidung(){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="select * from nguoidung";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
    }
    class mdatsan{
        public function themdatsan($manguoidung,$masan,$ngay,$khunggio,$trangthai,$tongtien){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="INSERT INTO `datsan`(`MaKhachHang`, `MaSan`, `NgayDat`, `KhungGio`, `TrangThai`, `TongTien`) VALUES ('$manguoidung','$masan','$ngay','$khunggio','$trangthai','$tongtien')";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                if($kq){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    }
?>