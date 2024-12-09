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

        public function getselectsan($masan){
            $p = new model();
            $con = $p->selectsan($masan);
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

        public function getselectkhunggio($maloaikhunggio=''){ //có lỗi là ở đây
            $p = new model();
            $con = $p->selectkhunggio($maloaikhunggio);
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
        public function getselectkhunggiotheomakg($makhunggio=''){ //có lỗi là ở đây
            $p = new model();
            $con = $p->selectkhunggiotheomakg($makhunggio);
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

        public function getselectthutrongtuan(){ //có lỗi là ở đây
            $p = new model();
            $con = $p->selectthutrongtuan();
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

        public function getselectloaisan(){
            $p = new model();
            $con = $p->selectloaisan();
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
        // public function getselectsanbykhunggio_san_thu($khunggio,$san,$thu){
        //     $p = new model();
        //     $con = $p->selectsanbykhunggio_san_thu($khunggio,$san,$thu);
        //     if(!$con){
        //         return -1;
        //     }else{
        //         if($con->num_rows > 0){
        //             while($r = $con->fetch_assoc()){
        //                 // $gia = $r["gia"];
        //                 $gia = $r["Gia"];
        //             }
        //             return $gia;
        //         }else{
        //             return 0;
        //         }
        //     }
        // }

        public function getselectsanbykhunggio_san_thu($khunggio,$san,$thu){
            $p = new model();
            $con = $p->selectsanbykhunggio_san_thu($khunggio,$san,$thu);
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
        public function getselectdiachisan($machusan=''){
            $p = new model();
            $con = $p->selectdiachisan($machusan);
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
        public function getdiadiemsantheomadiadiem($madiadiem){
            $p = new model();
            $con = $p->diadiemsantheomadiadiem($madiadiem);
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
        public function getdemsoluongdiadiem(){
            $p = new model();
            $con = $p->demsoluongdiadiem();
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
        public function getdiachisanPhanTrang($limit,$offset){
            $p = new model();
            $con = $p->diachisanPhanTrang($limit,$offset);
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
        public function getdiachitheoTen($ten){
            $p = new model();
            $con = $p->diachitheoTen($ten);
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
            $con = $p->selectdatsan($masan,$khunggio);
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

        public function getdatsanbyngay($ngay,$madiachi, $ms){
            $p = new model();
            $con = $p->selectdatsanbyngay($ngay,$madiachi, $ms);
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

        public function getinsertkhachvanglai($ten,$sdt,$email,$trangthaikhach){
            $capnhatlancuoi = date("Y-m-d H:i:s");
            $p = new mnguoidung();
            $con = $p->insertkhachvanglai($ten,$sdt,$email,$trangthaikhach,$capnhatlancuoi);
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
                    $_SESSION["emailkhachhang"] = $r["Email"];
                }
                return $con;
            }else{
                return 0;
            }
        }

        public function getquanlysanDANGNHAP($sdt,$pass){
            $pass = md5($pass);
            $p = new mtaikhoan();
            $con = $p->quanlysanDANGNHAP($sdt,$pass);
            if($con->num_rows > 0){
                while($r = $con->fetch_assoc()){
                    if($r["MaNhanVien"] == "" && $r["MaChuSan"] == ""){
                        return 0;
                    }elseif($r["MaNhanVien"] == ""){
                        $_SESSION["chusan"] = $r["MaChuSan"];
                        $_SESSION["ten"] = $r["Ten"];
                        $_SESSION["emailchusan"] = $r["Email"];
                    }else{
                        if($r["HienThi"] == "1"){
                            $_SESSION["nhanvien"] = $r["MaNhanVien"];
                            $_SESSION["ten"] = $r["Ten"];
                            $_SESSION["madiadiem"] = $r["MaDiaDiem"];
                            $_SESSION["emailnhanvien"] = $r["Email"];
                        }else{
                            return 0;
                        }
                    }
                    
                }
                return $con;
            }else{
                return 0;
            }
        }

        public function getThongtinkhachhang($makhachhang){
            $p = new mtaikhoan();
            $con = $p->Thongtinkhachhang($makhachhang);
            if($con->num_rows > 0){
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
        public function getsuathongtinkhachhang($makhachhang,$ten,$sdt,$email){
            $capnhatlancuoi = date("Y-m-d H:i:s");
            $p = new mtaikhoan();
            $con = $p->suathongtinkhachhang($makhachhang,$ten,$sdt,$email, $capnhatlancuoi);
            if(!$con){
                return false;
            }else{
                return $con;
            }
        }

        public function getmakhachhangcuachusan($machusan){
            $p = new mtaikhoan();
            $con = $p->makhachhangcuachusan($machusan);
            if($con->num_rows > 0){
                while($r = $con->fetch_assoc()){
                    return $r['MaKhachHang'];
                }
            }else{
                return 0;
            }
        }

        public function getmakhachhangcuanhanvien($manhanvien){
            $p = new mtaikhoan();
            $con = $p->makhachhangcuanhanvien($manhanvien);
            if($con->num_rows > 0){
                while($r = $con->fetch_assoc()){
                    return $r['MaKhachHang'];
                }
            }else{
                return 0;
            }
        }

    }

    class cdatsan{
        public function getinsertdatsankhachvl($makh,$ngaydat,$trangthai,$tongtien,$diadiem){
            $p = new mdatsan();
            $con = $p->insertdatsankhachvl($makh,$ngaydat,$trangthai,$tongtien,$diadiem);
            return $con;
        }
        public function getinsertdatsantheongay($total){
            $p = new mdatsan();
            $con = $p->insertdatsantheongay($total);
            return $con;
        }
        public function getXemdoanhthutheongay($ngay,$madd){
            $p = new mdatsan();
            $con = $p->Xemdoanhthutheongay($ngay,$madd);
            if(!$con){
                return 0;
            }else{
                return $con;
            }
        }

        public function getXemdslichdat($madiadiem){ 
            $p = new mdatsan();
            $con = $p->Xemdslichdat($madiadiem);
            if(!$con){
                return 0;
            }else{
                return $con;
            }
        }

        public function getXemdslichdattheokhachhang($makhachhang){ 
            $p = new mdatsan();
            $con = $p->Xemdslichdattheokhachhang($makhachhang);
            if(!$con){
                return 0;
            }else{
                return $con;
            }
        }
        public function getdatsanvsctds($masan,$ngaydatsan){ 
            $p = new mdatsan();
            $con = $p->datsanvsctds($masan,$ngaydatsan);
            if(!$con){
                return false;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
                
            }
        }

        public function getchitietdatsan($madatsan){ 
            $p = new mdatsan();
            $con = $p->chitietdatsan($madatsan);
            if(!$con){
                return false;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
                
            }
        }

        public function getchitietdatsanbymactds($mactds){ 
            $p = new mdatsan();
            $con = $p->chitietdatsanbymactds($mactds);
            if(!$con){
                return false;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
                
            }
        }

        public function getlaydondatsanlonhonngayhientai($diachi,$ngayhomnay){ 
            $p = new mdatsan();
            $con = $p->laydondatsanlonhonngayhientai($diachi,$ngayhomnay);
            if(!$con){
                return false;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
                
            }
        }

        public function getcapnhatdatsankhongduyet($madatsan){ 
            $p = new mdatsan();
            $con = $p->capnhatdatsankhongduyet($madatsan);
            if(!$con){
                return false;
            }else{
                return $con;
            }
        }
        public function getupdateChitietdatsan($madds){ 
            if(!empty($_SESSION["chonthaydoi"]) && !empty($_SESSION["arrtt"])){
                $catchuoi = explode("_",$_SESSION["chonthaydoi"]); //1_7:00-8:30_2-Sân số 2 (Sân 7)_13-12-2024_100000
                $catmasan = explode("-",$catchuoi[2]);
                $ngaydat = date("Y-m-d",strtotime($catchuoi[3]));
                $p = new mdatsan();
                $con = $p->updateChitietdatsan($_SESSION["arrtt"][0],$catmasan[0],$ngaydat,$catchuoi[1],$catchuoi[4],$madds);
                if(!$con){
                    return false;
                }else{
                    unset($_SESSION["chonthaydoi"]);
                    unset($_SESSION["arrtt"]);
                    return $con;
                }
            }else{
                return false;
            }
            
        }

        public function getkiemtratrungdatsan($madds,$chondatsan){ 
            
            $catchuoi = explode("_",$chondatsan); //1_7:00-8:30_2-Sân số 2 (Sân 7)_13-12-2024_100000
            $catmasan = explode("-",$catchuoi[2]);
            $ngaydat = date("Y-m-d",strtotime($catchuoi[3]));
            $p = new mdatsan();
            $con = $p->kiemtratrungdatsan($madds);
            if($con->num_rows>0){
                while($r = $con->fetch_assoc()){
                    if($catmasan[0]==$r["MaSan"] && strtotime($ngaydat)==strtotime($r["NgayDatSan"]) && $catchuoi[1]==$r["KhungGio"]){
                        return false;
                    }
                }
                return $con;
            }else{
                return $con;
            }
            
            
        }

    }

    class ckhachhang {
        public function getselectallkhachhang($machusan) {
            $p = new mkhachhang();
            $con = $p->xemkhachhang($machusan);
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
        public function themtaikhoan($ten, $sdt, $email, $matkhau, $capnhatlancuoi) {
            $p = new mkhachhang();
            return $p->themtaikhoan($ten, $sdt, $email, $matkhau, $capnhatlancuoi);
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
                echo "<script>alert('Xóa khách hàng thành công'); window.location.href='../qlds/index.php?page=quanlykhachhang';</script>";
            } else {
                echo "<script>alert('Lỗi khi xóa khách hàng'); window.location.href='../qlds/index.php?page=quanlykhachhang';</script>";
            }
        }

        
        public function timKiemKhachHang($keyword,$machusan) {
            $p = new mkhachhang();
            return $p->timKiemKhachHang($keyword,$machusan);
        }
        public function getdoimatkhaukhachhang($makhachhang, $matkhaumoi, $capnhatlancuoi) {
            $p = new mkhachhang();
            $con = $p->doimatkhaukhachhang($makhachhang,$matkhaumoi, $capnhatlancuoi);
            
            if (!$con) {
                echo "<script>alert('Đổi mật khẩu thất bại! Vui lòng kiểm tra lại thông tin.'); window.location.href='index.php?thongtinkhachhang';</script>";
                return false;
            } else {
                echo "<script>alert('Đổi mật khẩu thành công!'); window.location.href='index.php?thongtinkhachhang';</script>";
                return true;
            }
        }
        public function getlaymailkhachhang ($makhachhang){
            $p = new mkhachhang();
            $con = $p->laymailkhachhang($makhachhang);
            if(!$con){
                return false;
            }else{
                if ($con->num_rows > 0) {
                    $row = $con->fetch_assoc();
                    return $row['Email'];
                } else {
                    return false;
                }
            }
         }
         public function getXacNhanKhachHang($makhachhang) {
            $p = new mkhachhang();
            return $p->xacNhanKhachHang($makhachhang);
        }
       
    }
    class cnhanvien{
        public function getxemdanhsachkhachhang($madiadiem){
            $p = new mnhanvien();
            $con = $p->xemdskhachhang($madiadiem);
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

        public function getThongtinnhanvien($manhanvien){
            $p = new mnhanvien();
            $con = $p->thongtinnhanvien($manhanvien);
            if($con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }
        public function gettimKiemKhachHang($keyword, $madiadiem) {
            $p = new mkhachhang();
            return $p->timKiemKhachHang($keyword, $madiadiem);
        }
        public function xoaKhachHang($makhachhang) {
            $p = new mnhanvien();
            $con = $p->xoaKhachHang($makhachhang);
            if ($con) {
                echo "<script>alert('Xóa khách hàng thành công'); window.location.href='../qlds/index.php?page=danhsachkhachhang';</script>";
            } else {
                echo "<script>alert('Lỗi khi xóa khách hàng'); window.location.href='../qlds/index.php?page=danhsachkhachhang';</script>";
            }
        }
    }
    class cchusan{
        public function getThongtinchusan($machusan){
            $p = new mchusan();
            $con = $p->thongtinchusan($machusan);
            if($con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }
        public function getsuathongtinchusan($machusan,$ten,$sdt,$email){
            $capnhatlancuoi = date("Y-m-d H:i:s");
            $p = new mchusan();
            $con = $p->suathongtinchusan($machusan,$ten,$sdt,$email, $capnhatlancuoi);
            if(!$con){
                return false;
            }else{
                echo "<script>alert('Cập nhật thông tin chủ sân thành công!'); window.location.href='index.php?thongtinchusan';</script>";
                return $con;
            }
        }
        public function getdoimatkhauchusan($machusan, $matkhaumoi, $capnhatlancuoi) {
            $p = new mchusan();
            $con = $p->doimatkhauchusan($machusan,$matkhaumoi, $capnhatlancuoi);
            
            if (!$con) {
                echo "<script>alert('Đổi mật khẩu chủ sân thất bại! Vui lòng kiểm tra lại thông tin.'); window.location.href='index.php?thongtinchusan';</script>";
                return false;
            } else {
                echo "<script>alert('Đổi mật khẩu chủ sân thành công!'); window.location.href='index.php?thongtinchusan';</script>";
                return true;
            }
        }
         public function getlaymailchusan ($machusan){
            $p = new mchusan();
            $con = $p->laymailchusan($machusan);
            if(!$con){
                return false;
            }else{
                if ($con->num_rows > 0) {
                    $row = $con->fetch_assoc();
                    return $row['Email'];
                } else {
                    return false;
                }
            }
         }
    }
    class cloaisan {
        public function getselectallloaisan() {
            $p = new mloaisan();
            $con = $p->getAllloaisan();
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
        public function cInsertLoaiSan($tenloaisan) {
            // Kiểm tra trùng tên loại sân trước khi thêm
            if ($this->cCheckDuplicateLoaiSan($tenloaisan)) {
                return "duplicate"; // Trả về thông báo trùng
            }
    
            $p = new mloaisan();
            $kq = $p->mInsertLoaiSan($tenloaisan);
            return $kq;
        }
    
        public function cCheckDuplicateLoaiSan($tenloaisan) {
            $p = new mloaisan();
            return $p->checkDuplicateLoaiSan($tenloaisan);
        }
        public function cUpdateLoaiSan($maLoai, $tenLoaiSan) {
            // Kiểm tra trùng tên loại sân trước khi cập nhật
            if ($this->cCheckDuplicateLoaiSan($tenLoaiSan)) {
                return "duplicate"; // Trả về thông báo trùng
            }
            $p = new mloaisan();
            $kq = $p->mUpdateLoaiSan($maLoai, $tenLoaiSan);
            return $kq;
        }
        
    }

    class cDiaDiem {
        // Hàm xử lý thêm địa điểm
            public function cThemDiaDiem($maChuSan, $ten, $diachi, $hinh, $mota, $loaiKhungGio) {
                $model = new mDiaDiem();
                return $model->themDiaDiem($maChuSan, $ten, $diachi, $hinh, $mota, $loaiKhungGio);
        }
    }

    class csan_gia_thu_khunggio{
        public function getthaydoigiasan($masan,$gia,$makhunggio,$mathu){
            $p = new msan_gia_thu_khunggio();
            $con = $p->thaydoigiasan($masan,$gia,$makhunggio,$mathu);
            if(!$con){
                return -1;
            }else{
                return $con;
            }
        }
        public function getgiatheothuvsmasan($masan,$mathu){
            $p = new msan_gia_thu_khunggio();
            $con = $p->giatheothuvsmasan($masan,$mathu);
            if(!$con){
                return false;
            }else{
                return $con;
            }
        }

        public function getkhunggiotheothuvsmasan($masan,$mathu){
            $p = new msan_gia_thu_khunggio();
            $con = $p->khunggiotheothuvsmasan($masan,$mathu);
            if(!$con){
                return false;
            }else{
                return $con;
            }
        }
    }

    class csan{
        public function getinsertsan($tensan, $maloaisan, $filehinh, $khunggio, $madiadiem){
            if($filehinh["tmp_name"]!=""){
                $p = new clskiemtraupload();
                $kq = $p->uploadhinh($filehinh, $tensan,$filehinh);
                if(!$kq){
                    return 0;
                }
            }else{
                $filehinh = implode($filehinh);
                $filehinh = "";
            }
            $p = new msan();
            $kq = $p->insertsan($tensan, $maloaisan, $filehinh, $khunggio, $madiadiem);
            if($kq){
                return $kq;
            }else{
                return false;
            }
        }
    }
?>