<style>
    .menukhach{
        text-decoration: none;
        font-size: larger;
        margin-bottom: 100px;
    }
</style>
<?php
    if(!isset($_SESSION["dangnhap"])){
        header("Location: index.php");
    }else{
        $makhachhang = $_SESSION["dangnhap"];
        $p = new ctaikhoan();
        $ttkh = $p->getThongtinkhachhang($makhachhang);
        if($ttkh->num_rows>0){
            while($r = $ttkh->fetch_assoc()){
                $tenkhachhang = $r["Ten"];
                $email = $r["Email"];
                $sdt = $r["SDT"];
                $xacnhan = $r["XacNhan"];
            }
        }else{
            echo "Không có kết quả";
        }
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-2 pt-3 bg-body-secondary">
            <a href="?thongtinkhachhang" class="menukhach">Thông tin tài khoản</a> <br>
            <a href="?doimatkhaukhachhang" class="menukhach">Đổi mật khẩu</a> <br>
            <a href="?lichdadatsan" class="menukhach">Lịch đã đặt</a> <br>
        </div>
        <?php
            if(isset($_REQUEST["lichdadatsan"])){
                $array = [];
                $today = date('Y-m-d');
                $time = date('H:i:s');
                $pttds = new cdatsan();
                $tttds = $pttds->getXemdslichdattheokhachhang($makhachhang);
                if($tttds->num_rows>0){
                    echo '
                        <div class="col-md-10 pt-3">
                            <h3>Sắp diễn ra</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-borderless table-success align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Địa điểm</th>
                                            <th>Tên sân</th>
                                            <th>Ngày đặt sân</th>
                                            <th>Bắt đầu</th>
                                            <th>Kết thúc</th>
                                            <th>Giá</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                    ';
                    while($r = $tttds->fetch_assoc()){
                        $diadiem = $r["TenDiaDiem"];
                        $tensan = $r["TenSan"];
                        $khunggio = $r["KhungGio"];
                        $dongia = $r["DonGia"];
                        $trangthai = $r["TrangThai"];
                        $ngaydatsan = $r["NgayDatSan"];
                        $catkg = explode("-",$khunggio);

                        if(strtotime($today) > strtotime($ngaydatsan)){
                            $array[] = [$diadiem,$tensan,$ngaydatsan,$catkg[0],$catkg[1],$dongia,$trangthai];
                        }else{
                            if(strtotime($today) == strtotime($ngaydatsan) && strtotime($time) > strtotime($catkg[0])){
                                $array[] = [$diadiem,$tensan,$ngaydatsan,$catkg[0],$catkg[1],$dongia,$trangthai];
                            }else{
                                echo '
                                    <tr >
                                        <td class="col-2">'.$diadiem.'</td>
                                        <td class="col-2">'.$tensan.'</td>
                                        <td class="col-2"> '.$ngaydatsan.'</td>
                                        <td class="col-1">'.$catkg[0].'</td>
                                        <td class="col-1">'.$catkg[1].'</td>
                                        <td class="col-1">'.number_format($dongia,0,".",",").' đ</td>
                                        <td class="col-1">'.$trangthai.'</td>';
                                if($trangthai == "Đã duyệt"){
                                    echo '
                                            <td class="col-1"></td>
                                        </tr>
                                    ';
                                }else{
                                    echo '
                                            <td class="col-1"><button class="btn btn-danger">Huỷ đặt</button></td>
                                        </tr>
                                    ';
                                }
                                
                            }
                        }
                        
                    }
                    echo '
                                    </tbody>
                                </table>
                    ';
                    echo '
                           <h3>Đã kết thúc</h3>
                                <table class="table table-striped table-hover table-borderless table-danger align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Địa điểm</th>
                                            <th>Tên sân</th>
                                            <th>Ngày đặt sân</th>
                                            <th>Bắt đầu</th>
                                            <th>Kết thúc</th>
                                            <th>Giá</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                    ';
                    foreach($array as $tt){
                        if(strtotime($today) >= strtotime($tt[2])){
                            echo '
                                <tr >
                                    <td class="col-2">'.$tt[0].'</td>
                                    <td class="col-2">'.$tt[1].'</td>
                                    <td class="col-2">'.$tt[2].'</td>
                                    <td class="col-1">'.$tt[3].'</td>
                                    <td class="col-1">'.$tt[4].'</td>
                                    <td class="col-2">'.number_format($tt[5],0,".",",").' đ</td>
                                    <td class="col-2">'.$tt[6].'</td>
                                </tr>
                            ';
                        }
                        
                    }    
                    echo '
                                    </tbody>
                                </table>
                    ';
                    echo '
                        </div>
                        </div>
                    ';
                }else{
                    echo 'Không có dữ liệu';
                }
                
            }elseif(isset($_REQUEST["doimatkhaukhachhang"])){
                echo "22222";
            }else{
                echo '
                        <div class="col-md-10">
                            <h3>Thông tin khách hàng</h3>
                                <div class="row">
                                    <div class="col-md-7 bg-body-secondary">
                                        <table class="table mt-3">
                                            <tr>
                                                <td>Tên:</td>
                                                <td>'.$tenkhachhang.'</td>
                                            </tr>
                                            <tr>
                                                <td>email:</td>
                                                <td>'.$email.'</td>
                                            </tr>
                                            <tr>
                                                <td>Số điện thoại:</td>
                                                <td>'.$sdt.'</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            <button class="btn btn-info">Sửa thông tin</button>
                        </div>
                ';
            }
        ?>
        
    </div>
</div>
