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
                            $p->dongketnoi($con);
                            if($kq2){
                                return $kq2;
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
        public function xemkhachhang() {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT * FROM khachhang kh JOIN taikhoan tk ON kh.MaTaiKhoan = tk.MaTaiKhoan";
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
            $sql = "INSERT INTO khachhang (MaTaiKhoan, TrangThai) VALUES ('$mataikhoan', 'Chưa xác thực')";
            $result = $con->query($sql);
            $p->dongketnoi($con);
            return $result;
        }
        // public function themkhachhang($ten, $sdt, $email, $matkhau) {
        //     $p = new ketnoi();
        //     $con = $p->moketnoi();
        //     $sql = "INSERT INTO khachhang (Ten, SDT, Email, MatKhau) VALUES ('$ten', '$sdt', '$email', '$matkhau')";
        //     $result = $con->query($sql);
        //     if ($result) {
        //         $sql1 = "select MaTaiKhoan from taikhoan where Ten='$ten' and SDT='$sdt'";
    
        //         //$p->dongketnoi($con);
        //         return $result;
        //     } else {
        //         return false;
        //     }
        // }
        public function xoaKhachHang($makhachhang) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            
            if ($con) {
                $sql = "DELETE FROM khachhang WHERE MaKhachHang = $makhachhang";
                $con->query($sql);
                $p->dongketnoi($con);
                
                return $con;
            } else {
                return false;
            }
        }
        
    
    
        // public function kiemtraEmailSDT($email, $sdt) {
        //     $p = new ketnoi();
        //     $con = $p->moketnoi();
        //     if ($con) {
        //         $sql = "SELECT * FROM khachhang WHERE Email = '$email' OR SDT = '$sdt'";
        //         $result = $con->query($sql);
        //         $p->dongketnoi($con);
        //         return $result->num_rows > 0;
        //     } else {
        //         return false;
        //     }
        // }
    
        public function xacThucKhachHang($makhachhang) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "UPDATE khachhang SET TrangThai = N'Đã xác thực' WHERE MaKhachHang = '$makhachhang'";
                $result = $con->query($sql);
                $p->dongketnoi($con);
                return $result;
            } else {
                return false;
            }
        }
        public function timKiemKhachHang($keyword) {
            $p = new ketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "SELECT * FROM khachhang kh 
                        JOIN taikhoan tk ON kh.MaTaiKhoan = tk.MaTaiKhoan 
                        WHERE tk.Ten LIKE '%$keyword%' 
                        OR tk.SDT LIKE '%$keyword%' 
                        OR tk.Email LIKE '%$keyword%'";
                $result = $con->query($sql);
                $p->dongketnoi($con);
                return $result;
            } else {
                return false;
            }
        }
    }