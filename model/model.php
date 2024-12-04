<?php
    include_once("ketnoi.php");
    class model{
        // select bảng san liên kết với sanvsgiavskhunggio, gia, khunggio, diachi, loaisan, trangthai
        public function selectallsan($diachi){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                // $sql="select s.*, TenLoaiSan, tt.TrangThai, TenKhungGio, k.MaKhungGio  from san s join san_gia_thu_khunggio t on s.MaSan = t.MaSan join gia g on t.MaGia = g.MaGia join khunggio k on t.KhungGio = k.MaKhungGio join diadiem c on s.MaDiaDiem = c.MaDiaDiem join loaisan l on l.MaLoai = s.MaLoaiSan where s.MaDiaDiem = '$diachi'";
                $sql = "select * from san s join loaisan l on s.MaLoaiSan = l.MaLoai where MaDiaDiem = '$diachi'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }

        public function selectsan($masan){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                // $sql="select s.*, TenLoaiSan, tt.TrangThai, TenKhungGio, k.MaKhungGio  from san s join san_gia_thu_khunggio t on s.MaSan = t.MaSan join gia g on t.MaGia = g.MaGia join khunggio k on t.KhungGio = k.MaKhungGio join diadiem c on s.MaDiaDiem = c.MaDiaDiem join loaisan l on l.MaLoai = s.MaLoaiSan where s.MaDiaDiem = '$diachi'";
                $sql = "select * from san s join loaisan l on s.MaLoaiSan = l.MaLoai where MaSan = '$masan'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function selectkhunggio($maloaikhunggio){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                if($maloaikhunggio){
                    $sql="SELECT * FROM KhungGio where MaLoaiKhungGio='$maloaikhunggio'";
                }else{
                    $sql="SELECT * FROM KhungGio";
                }
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function selectkhunggiotheomakg($makhunggio){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM KhungGio where MaKhungGio='$makhunggio'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function selectthutrongtuan(){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM thutrongtuan";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function selectloaisan(){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM LoaiSan";
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
                // $sql="select gia from san s join san_gia_thu_khunggio t on s.MaSan = t.MaSan join gia g on t.MaGia = g.MaGia join khunggio k on t.KhungGio = k.MaKhungGio where t.MaSan = '$san' and t.KhungGio = '$khunggio' and t.MaThu = '$thu'";
                $sql="select t.*, k.TenKhungGio, s.TenSan from san s join san_gia_thu_khunggio t on s.MaSan = t.MaSan join khunggio k on t.KhungGio = k.MaKhungGio where t.MaSan = '$san' and t.KhungGio = '$khunggio' and t.MaThu = '$thu'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }

        //select bảng địa chỉ
        public function selectdiachisan($machusan){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                if($machusan){
                    $sql="select * from diadiem where MaChuSan = '$machusan'";
                }else{
                    $sql="select * from diadiem";
                }
                
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function diadiemsantheomadiadiem($madiadiem){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="select * from diadiem where MaDiaDiem = '$madiadiem'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function demsoluongdiadiem(){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT COUNT(*) as dem FROM `diadiem`";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function diachisanPhanTrang($limit,$offset){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM diadiem LIMIT $limit OFFSET $offset";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function diachitheoTen($ten){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM diadiem where TenDiaDiem like '%$ten%'";
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
                $sql="select NgayDatSan, TrangThai from datsan d join chitietdatsan ct on d.MaDatSan=ct.MaDatSan  where MaSan = '$masan' and KhungGio = '$khunggio'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }

        public function selectdatsanbyngay($ngay){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="select * from datsan d join chitietdatsan ct on d.MaDatSan=ct.MaDatSan  where NgayDatSan = '$ngay'";
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
        public function insertkhachvanglai($ten,$sdt,$email,$trangthai,$capnhatlancuoi){
            $p = new ketnoi();
            $con = $p->moketnoi();
            $sql= "INSERT INTO `taikhoan`(`Ten`, `SDT`,`Email`,`CapNhatLanCuoi`) VALUES ('$ten','$sdt','$email','$capnhatlancuoi')";
            $kq = $con->query($sql);
            // $p->dongketnoi($con);
            if($kq){
                // $sql1 = "select MaTaiKhoan from taikhoan where Ten='$ten' and SDT='$sdt'";
                // $kq1 = $con->query($sql1);
                $makhachmoi = mysqli_insert_id($con);
                if($makhachmoi){
                    // if($kq1->num_rows > 0){
                    //     while($r = $kq1->fetch_assoc()){
                    //         $matk = $r['MaTaiKhoan'];
                    //     }
                        $sql2 = "INSERT INTO `khachhang`(`MaTaiKhoan`, `TrangThai`) VALUES ('$makhachmoi','$trangthai')";
                        $kq2 = $con->query($sql2);
                        if($kq2){
                            $sql3 = "select MaKhachHang from khachhang where MaTaiKhoan='$makhachmoi'";
                            $kq3 = $con->query($sql3);
                            $p->dongketnoi($con);
                            return $kq3;
                        }
                    // }else{
                    //     return 0;
                    // } 
                }else{
                    return false;
                }
            }else{
                    return false;
            }
        }
    }

    class mtaikhoan{
        public function KhachDANGNHAP($sdt,$pass){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM `taikhoan` tk  JOIN khachhang kh on tk.MaTaiKhoan = kh.MaTaiKhoan WHERE SDT = '$sdt' and MatKhau = '$pass'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }

        public function quanlysanDANGNHAP($sdt,$pass){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM `taikhoan` tk LEFT OUTER JOIN nhanvien nv on tk.MaTaiKhoan = nv.MaTaiKhoan LEFT OUTER JOIN chusan cs on cs.MaTaiKhoan = tk.MaTaiKhoan WHERE SDT = '$sdt' and MatKhau = '$pass'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }

        public function Thongtinkhachhang($makhachhang){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM `taikhoan` tk  JOIN khachhang kh on tk.MaTaiKhoan = kh.MaTaiKhoan WHERE MaKhachHang = '$makhachhang'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function selecttrungsdt($sdt){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM `taikhoan` tk LEFT OUTER JOIN khachhang kh on tk.MaTaiKhoan = kh.MaTaiKhoan LEFT OUTER JOIN nhanvien nv on tk.MaTaiKhoan = nv.MaTaiKhoan LEFT OUTER JOIN chusan cs on cs.MaTaiKhoan = tk.MaTaiKhoan WHERE SDT = '$sdt'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function selecttrungemail($email){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM `taikhoan` tk LEFT OUTER JOIN khachhang kh on tk.MaTaiKhoan = kh.MaTaiKhoan LEFT OUTER JOIN nhanvien nv on tk.MaTaiKhoan = nv.MaTaiKhoan LEFT OUTER JOIN chusan cs on cs.MaTaiKhoan = tk.MaTaiKhoan WHERE Email = '$email'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }

        public function inserttaikhoan($ten,$sdt,$email,$pass,$capnhatlancuoi){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="INSERT INTO `taikhoan`(`Ten`, `SDT`, `Email`, `MatKhau`, `CapNhatLanCuoi`) 
                            VALUES ('$ten','$sdt','$email','$pass','$capnhatlancuoi')";
                $kq = $con->query($sql);
                if($kq){
                    $mataikhoan = $con->insert_id;
                    $sql1="INSERT INTO `khachhang`(`MaTaiKhoan`,`TrangThai`,`XacNhan`) VALUES ('$mataikhoan',N'Có tài khoản',N'Chưa xác nhận')";
                    $kq1 = $con->query($sql1);
                    $p->dongketnoi($con);
                    if($kq1){
                        return $kq1;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function updatetaikhoan($ten,$sdt,$email,$pass,$capnhatlancuoi){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="UPDATE `taikhoan` SET `Ten`='$ten',`MatKhau`='$pass',CapNhatLanCuoi='$capnhatlancuoi' WHERE SDT='$sdt' and `Email`='$email'";
                $kq = $con->query($sql);
                if($kq){
                    $sql1 = "select MaTaiKhoan from taikhoan where Email='$email' and SDT='$sdt'";
                    $kq1 = $con->query($sql1);
                    if($kq1){
                        if($kq1->num_rows > 0){
                            while($r = $kq1->fetch_assoc()){
                                $matk = $r['MaTaiKhoan'];
                            }
                            $sql2="UPDATE `khachhang` SET `TrangThai`= N'Có tài khoản',`XacNhan`='Chưa xác nhận' WHERE `MaTaiKhoan` = '$matk'";
                            $kq2 = $con->query($sql2);
                            if($kq2){
                                $sql3="SELECT ds.* FROM `datsan` ds join khachhang kh on ds.MaKhachHang = kh.MaKhachHang join taikhoan tk on tk.MaTaiKhoan = kh.MaTaiKhoan where kh.MaTaiKhoan = '$matk'";
                                $kq3 = $con->query($sql3);
                                if($kq3){
                                    while($r = $kq3->fetch_assoc()){
                                        $trangthai = $r["TrangThai"];
                                        $madatsan = $r["MaDatSan"];
                                        if($trangthai=="Chờ duyệt"){
                                            $sql4="UPDATE `datsan` SET `TrangThai`='Ưu tiên' WHERE MaDatSan = '$madatsan'";
                                            $kq4 = $con->query($sql4);
                                        }
                                    }
                                    $p->dongketnoi($con);
                                    if($kq4){
                                        return $kq4;
                                    }else{
                                        return false;
                                    }
                                }else{
                                    return false;
                                }
                            }else{
                                return false;
                            }
                            
                        }else{
                            return false;
                        }
                    }
                }else{
                    return false;
                }
                // $p->dongketnoi($con);
                // return $kq;
            }else{
                return false;
            }
        }
        public function suathongtinkhachhang($makhachhang,$ten,$sdt,$email,$capnhatlancuoi){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                
                $sql = "UPDATE `taikhoan` tk join khachhang kh on tk.MaTaiKhoan = kh.MaTaiKhoan SET `Ten`='$ten',`SDT`='$sdt',`Email`='$email',`CapNhatLanCuoi`='$capnhatlancuoi',`XacNhan`='Chưa xác nhận' WHERE MaKhachHang = '$makhachhang'";
                
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                if($kq){
                    return $kq;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    }
    
    class mdatsan{
        public function insertdatsankhachvl($makh,$ngaydat,$trangthai,$tongtien,$diadiem){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="INSERT INTO `datsan`(`MaKhachHang`,`NgayDat`, `TrangThai`, `TongTien`, `MaDiaDiem`) 
                                     VALUES ('$makh','$ngaydat','$trangthai','$tongtien','$diadiem')";
                // $kq = $con->query($sql);
                // $p->dongketnoi($con);
                if ($con->query($sql) === TRUE) {
                    
                    if(empty($_SESSION["TTHD"]) && !isset($_SESSION["TTHD"])){
                        return 0;
                    }else{
                        // Lấy ID của bản ghi vừa chèn
                        $madatsan = mysqli_insert_id($con);
                        for ($i = 0; $i < sizeof($_SESSION["TTHD"]); $i++) {
                            $thongtin = $_SESSION["TTHD"][$i];
                            $parts = explode("_", $thongtin);
                            $partsMS = explode("-", $parts[2]);
                            $ms = $partsMS[0];
                            $khunggio = $parts[1];
                            $tensan = $partsMS[1];
                            $ngay = $parts[3];
                            $ngay = date('Y-m-d', strtotime($ngay));
                            $gia = (int)$parts[4];

                            $sql1 = "INSERT INTO `chitietdatsan`(`MaSan`, `MaDatSan`, `NgayDatSan`, `KhungGio`,`DonGia`) 
                                                VALUES ('$ms','$madatsan','$ngay','$khunggio','$gia')";
                            $kq1 = $con->query($sql1);
                            if($con==false){
                                return false;
                            }
                        }
                        return $kq1; 
                    }
                } else {
                    echo "Lỗi: " . $sql . "<br>" . $con->error;
                }
            }else{
                return false;
            }
        }

        public function insertdatsantheongay($total){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                if(empty($_SESSION["TTDS"]) && !isset($_SESSION["TTDS"])){
                    return 0;
                }else{
                    $trangthai = "Chờ duyệt";
                    $makhachhang = $_SESSION["TTDS"][0][1];
                    $ngaylap = $_SESSION["TTDS"][0][2];
                    $madiadiem = $_SESSION["TTDS"][0][4];
                    //Array ( [0] => Mã sân [1] => Mã khách hàng [2] => Ngày lập hoá đơn [3] => Tổng tiền [4] => Mã địa điểm [5] => Ngày thuê  [6] => Giờ bắt đầu [7] => Giờ kết thúc ) 
                    
                    if($makhachhang==""){
                        $sql="INSERT INTO `datsan`(`NgayDat`, `TrangThai`, `TongTien`, `MaDiaDiem`) 
                                     VALUES ('$ngaylap','$trangthai','$total','$madiadiem')";
                    }else{
                        $sql="INSERT INTO `datsan`(`MaKhachHang`,`NgayDat`, `TrangThai`, `TongTien`, `MaDiaDiem`) 
                                     VALUES ('$makhachhang','$ngaylap','$trangthai','$total','$madiadiem')";
                    }
                    if ($con->query($sql) === TRUE) {
                        // Lấy ID của bản ghi vừa chèn
                        $madatsan = mysqli_insert_id($con);
                        foreach($_SESSION["TTDS"] as $ttds => $pt){
                            $masan = $pt[0];
                            $tongtien = $pt[3];
                            $ngaythue = $pt[5];
                            $giobatdau = $pt[6];
                            $gioketthuc = $pt[7];
                            $sql1 = "INSERT INTO `chitietdatsan`(`MaSan`, `MaDatSan`, `NgayDatSan`, `GioBatDau`, `GioKetThuc` ,`DonGia`) 
                                            VALUES ('$masan','$madatsan','$ngaythue','$giobatdau','$gioketthuc','$tongtien')";
                            $kq1 = $con->query($sql1);
                            
                        }
                        $p->dongketnoi($con);
                        if($kq1){
                            return $kq1; 
                        }else{   
                            return false;                 
                        }
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $con->error;
                    }
                }
            }else{
                return false;
            }
        }
        public function Xemdoanhthutheongay($ngay) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT * FROM datsan ds join chitietdatsan ctds on ds.MaDatSan = ctds.MaDatSan where NgayDatSan = '$ngay'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            } else {
                return false;
            }
        }

        public function Xemdslichdat($madiadiem) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT ds.*, tk.Ten FROM datsan ds join khachhang kh on ds.MaKhachHang = kh.MaKhachHang join taikhoan tk on kh.MaTaiKhoan = tk.MaTaiKhoan where MaDiaDiem = '$madiadiem'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            } else {
                return false;
            }
        }

        public function Xemdslichdattheokhachhang($makhachhang) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT ds.*, ctds.*, s.TenSan, dd.TenDiaDiem FROM `datsan` ds join chitietdatsan ctds on ds.MaDatSan = ctds.MaDatSan join san s on ctds.MaSan = s.MaSan join diadiem dd on ds.MaDiaDiem = dd.MaDiaDiem where MaKhachHang = '$makhachhang'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            } else {
                return false;
            }
        }

        
    }
    
    class mkhachhang {
        public function xemkhachhang($machusan) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT * FROM khachhang kh JOIN datsan ds on kh.MaKhachHang = ds.MaKhachHang 
                        JOIN diadiem dd on ds.MaDiaDiem = dd.MaDiaDiem 
                        JOIN taikhoan tk on tk.MaTaiKhoan = kh.MaTaiKhoan 
                        JOIN chusan cs on cs.MaChuSan = dd.MaChuSan 
                        where kh.HienThi = 1 and cs.MaChuSan = '$machusan' 
                        GROUP BY kh.MaKhachHang";
                $result = $con->query($sql);
                $p->dongketnoi($con);
                return $result;
            } else {
                return false;
            }
        }
        public function themtaikhoan($ten, $sdt, $email, $matkhau) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            $matkhau = md5($matkhau);
            $sql = "INSERT INTO taikhoan (Ten, SDT, Email, MatKhau) VALUES ('$ten', '$sdt', '$email', '$matkhau')";
            $result = $con->query($sql);
            $p->dongketnoi($con);
            if($result){
                return $result;
            }else{
                return false;
            }
            
        }
    
        public function layMaTaiKhoan($sdt) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            $sql = "SELECT MaTaiKhoan FROM taikhoan WHERE SDT = '$sdt'";
            $result = $con->query($sql);
            $p->dongketnoi($con);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['MaTaiKhoan'];
            } else {
                return false;
            }
        }
        public function themkhachhang($mataikhoan) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            $sql = "INSERT INTO khachhang (MaTaiKhoan, XacNhan) VALUES ('$mataikhoan', 'Đã xác nhận')";
            $result = $con->query($sql);
            $p->dongketnoi($con);
            return $result;
        }

        public function xoaKhachHang($makhachhang) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            
            if ($con) {
                $sql = "UPDATE khachhang SET HienThi = 0 WHERE MaKhachHang = '$makhachhang'";
                $con->query($sql);
                $p->dongketnoi($con);
                
                return $con;
            } else {
                return false;
            }
        }
    
        public function xacNhanKhachHang($makhachhang) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "UPDATE khachhang SET XacNhan = N'Đã xác nhận' WHERE MaKhachHang = '$makhachhang'";
                $result = $con->query($sql);
                $p->dongketnoi($con);
                return $result;
            } else {
                return false;
            }
        }
        public function timKiemKhachHang($keyword ,$machusan) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT * FROM khachhang kh JOIN datsan ds on kh.MaKhachHang = ds.MaKhachHang 
                        JOIN diadiem dd on ds.MaDiaDiem = dd.MaDiaDiem 
                        JOIN taikhoan tk on tk.MaTaiKhoan = kh.MaTaiKhoan 
                        JOIN chusan cs on cs.MaChuSan = dd.MaChuSan 
                        WHERE kh.HienThi = 1 
                        AND cs.MaChuSan = $machusan 
                        AND (tk.Ten LIKE '%$keyword%' OR tk.SDT LIKE '%$keyword%' OR tk.Email LIKE '%$keyword%' OR dd.TenDiaDiem LIKE '%$keyword%')
                        GROUP BY kh.MaKhachHang";
                $result = $con->query($sql);
                $p->dongketnoi($con);
                return $result;
            } else {
                return false;
            }
        }
        public function doimatkhaukhachhang($makhachhang, $matkhaumoi, $capnhatlancuoi) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                            $sql2 = "UPDATE `taikhoan` tk JOIN khachhang kh ON tk.MaTaiKhoan = kh.MaTaiKhoan SET tk.MatKhau = '$matkhaumoi',tk.CapNhatLanCuoi = '$capnhatlancuoi' WHERE kh.MaKhachHang = '$makhachhang'";
                            $result2 = $con->query($sql2);
                            $p->dongketnoi($con);
                            if ($result2) {
                                // Thành công
                                return $result2;
                            } else {
                                // Update thất bại
                                $con->rollback();
                                return false;
                            }
                        } else {
                            // Email hoặc mật khẩu cũ không đúng
                            $con->rollback();
                            return false;
                        }
                    
            } 
            public function laymailkhachhang($makhachhang){
                $p = new ketnoi();
                $con = $p->moketnoi();
                if($con){
                    $sql = "SELECT tk.Email FROM `taikhoan` tk JOIN khachhang kh ON tk.MaTaiKhoan = kh.MaTaiKhoan WHERE kh.MaKhachHang = '$makhachhang'";
                    $result = $con->query($sql);
                    $p->dongketnoi($con);
                    return $result;
                } else {
                    return false;
                }
            }

            public function xacNhanKhachHang($makhachhang) {
                $p = new ketnoi();
                $con = $p->moketnoi();
                if ($con) {
                    $sql = "UPDATE khachhang SET XacNhan = N'Đã xác nhận' WHERE MaKhachHang = '$makhachhang'";
                    $result = $con->query($sql);
                    $p->dongketnoi($con);
                    return $result;
                } else {
                    return false;
                }
            }
    }


    class mnhanvien{
        public function xemdskhachhang($madiadiem){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql = "SELECT * FROM datsan ds join khachhang kh on ds.MaKhachHang = kh.MaKhachHang 
                join taikhoan tk on kh.MaTaiKhoan = tk.MaTaiKhoan 
                where kh.HienThi = 1 and MaDiaDiem = $madiadiem 
                group by kh.MaKhachHang";
                $result = $con->query($sql);
                $p->dongketnoi($con);
                return $result;
            }else{
                return false;
            }
        }
        public function thongtinnhanvien($manhanvien){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM `taikhoan` tk  JOIN nhanvien nv on tk.MaTaiKhoan = nv.MaTaiKhoan WHERE MaNhanVien = '$manhanvien'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function timKiemKhachHang($keyword ,$madiadiem) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT * FROM datsan ds join khachhang kh on ds.MaKhachHang = kh.MaKhachHang 
                        join taikhoan tk on kh.MaTaiKhoan = tk.MaTaiKhoan 
                        where kh.HienThi = 1 and MaDiaDiem = $madiadiem 
                        and (tk.Ten LIKE '%$keyword%' OR tk.SDT LIKE '%$keyword%' OR tk.Email LIKE '%$keyword%')
                        GROUP BY kh.MaKhachHang";
                $result = $con->query($sql);
                $p->dongketnoi($con);
                return $result;
            } else {
                return false;
            }
        }
        public function xoaKhachHang($makhachhang) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            
            if ($con) {
                $sql = "UPDATE khachhang SET HienThi = 0 WHERE MaKhachHang = '$makhachhang'";
                $con->query($sql);
                $p->dongketnoi($con);
                
                return $con;
            } else {
                return false;
            }
        }
    }
    class mchusan{
        public function thongtinchusan($machusan){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql="SELECT * FROM `taikhoan` tk  JOIN chusan cs on tk.MaTaiKhoan = cs.MaTaiKhoan WHERE MaChuSan = '$machusan'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                return $kq;
            }else{
                return false;
            }
        }
        public function suathongtinchusan($machusan,$ten,$sdt,$email,$capnhatlancuoi){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                
                $sql = "UPDATE `taikhoan` tk join chusan cs on tk.MaTaiKhoan = cs.MaTaiKhoan SET `Ten`='$ten',`SDT`='$sdt',`Email`='$email',`CapNhatLanCuoi`='$capnhatlancuoi' WHERE MaChuSan = '$machusan'";
                
                $kq = $con->query($sql);
                if($kq){
                    return $kq;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        public function doimatkhauchusan($machusan, $matkhaumoi, $capnhatlancuoi) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                            $sql2 = "UPDATE `taikhoan` tk JOIN chusan cs ON tk.MaTaiKhoan = cs.MaTaiKhoan SET tk.MatKhau = '$matkhaumoi',tk.CapNhatLanCuoi = '$capnhatlancuoi' WHERE cs.MaChuSan = '$machusan'";
                            $result2 = $con->query($sql2);
                            $p->dongketnoi($con);
                            if ($result2) {
                                // Thành công
                                return $result2;
                            } else {
                                // Update thất bại
                                $con->rollback();
                                return false;
                            }
                        } else {
                            // Email hoặc mật khẩu cũ không đúng
                            $con->rollback();
                            return false;
                        }
                    
            } 
        
        public function laymailchusan($machusan){
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql = "SELECT tk.Email FROM `taikhoan` tk JOIN chusan cs ON tk.MaTaiKhoan = cs.MaTaiKhoan WHERE cs.MaChuSan = '$machusan'";
                $result = $con->query($sql);
                $p->dongketnoi($con);
                return $result;
            } else {
                return false;
            }
        }
    }

    class msan_gia_thu_khunggio{
        public function thaydoigiasan($masan,$gia,$makhunggio,$mathu) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){   
                $sql = "UPDATE `san_gia_thu_khunggio` SET `Gia`='$gia' WHERE `MaSan`='$masan' and `KhungGio`='$makhunggio' and `MaThu`='$mathu'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                if($kq){
                    return $kq;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function giatheothuvsmasan($masan,$mathu) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){   
                $sql = "SELECT * FROM `san_gia_thu_khunggio` WHERE MaSan = '$masan' and MaThu = '$mathu'";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                if($kq){
                    return $kq;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function khunggiotheothuvsmasan($masan,$mathu) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if($con){   
                $sql = "(SELECT KhungGio FROM `san_gia_thu_khunggio` WHERE MaSan = '$masan' and MaThu = '$mathu' ORDER BY KhungGio ASC LIMIT 1) 
                        UNION ALL 
                        (SELECT KhungGio FROM `san_gia_thu_khunggio` WHERE MaSan = '$masan' and MaThu = '$mathu' ORDER BY KhungGio DESC LIMIT 1)";
                $kq = $con->query($sql);
                $p->dongketnoi($con);
                if($kq){
                    return $kq;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    }

    class msan{
        public function insertsan($tensan, $maloaisan, $filehinh, $khunggio, $madiadiem){
            $p = new ketnoi();
            $con = $p->moketnoi();
            $sql = "INSERT INTO `san`(`TenSan`, `MaLoaiSan`, `Hinh`, `MaDiaDiem`) 
                            VALUES ('$tensan','$maloaisan','$filehinh','$madiadiem')";
            $kq = $con->query($sql);
            if($kq){
                $masan = $con->insert_id;
                $mangkhunggio =explode("-",$khunggio);
                for($i=0;$i<sizeof($mangkhunggio);$i++){
                    $makhunggio = $mangkhunggio[$i];
                    for($j=1;$j<=7;$j++){
                        $sql1 = "INSERT INTO `san_gia_thu_khunggio`(`MaSan`, `KhungGio`, `MaThu`) VALUES ('$masan','$makhunggio','$j')";
                        $kq1 = $con->query($sql1);
                    }
                }
                $p->dongketnoi($con);
                if($kq1){
                    return $masan;
                }else{
                    return false;
                }
                
            }
        }
    }
    class mloaisan {
        public function getAllloaisan() {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT * FROM loaisan";
                $result = $con->query($sql);
                $p->dongketnoi($con);
                return $result;
            } else {
                return false;
            }
        }
        public function mInsertLoaiSan($tenloaisan){
            $p=new ketnoi();
            $query="insert into loaisan(TenLoaiSan) values(N'$tenloaisan')";
            $con=$p->MoKetNoi();
            $kq=mysqli_query($con,$query);
            $p->dongKetNoi($con);
            return $kq;
        }
        public function checkDuplicateLoaiSan($tenloaisan) {
            $p = new ketnoi();
            $con = $p->MoKetNoi();
            if ($con) {
                $query = "SELECT COUNT(*) as count FROM loaisan WHERE TenLoaiSan = N'$tenloaisan'";
                $result = mysqli_query($con, $query);
    
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $p->dongKetNoi($con);
                    return $row['count'] > 0; // Trả về true nếu đã tồn tại
                } else {
                    $p->dongKetNoi($con);
                    return false;
                }
            } else {
                return false; // Kết nối thất bại
            }
        }
        public function mUpdateLoaiSan($maLoai, $tenLoaiSan) {
            $p = new ketnoi();
            $query = "UPDATE loaisan SET TenLoaiSan = N'$tenLoaiSan' WHERE MaLoai = $maLoai";
            $con = $p->MoKetNoi();
            $kq = mysqli_query($con, $query);
            $p->dongKetNoi($con);
            return $kq;
        }
        
    }

    class mDiaDiem {
        // Hàm thêm địa điểm vào cơ sở dữ liệu
        public function themDiaDiem($maChuSan, $ten, $diachi, $hinh, $mota, $loaiKhungGio) {
            $p = new ketnoi();
            $con = $p->moketnoi();
    
            if ($con) {
                // Thực hiện câu lệnh INSERT để thêm địa điểm vào bảng diadiem
                $query = "INSERT INTO diadiem (MaChuSan, TenDiaDiem, DiaChi, HinhDaiDien, MoTa, LoaiKhungGio) 
                          VALUES (N'$maChuSan', N'$ten', N'$diachi', N'$hinh', N'$mota', N'$loaiKhungGio')";
                $result = mysqli_query($con, $query);
    
                $p->dongketnoi($con);
    
                return $result; // Trả về kết quả (thành công hoặc thất bại)
            } else {
                return false; // Nếu kết nối cơ sở dữ liệu thất bại
            }
        }
    }
?>