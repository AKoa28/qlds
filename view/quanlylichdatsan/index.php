<div class="section_phu"><form method="post">
<?php

    if(!isset($_SESSION["chusan"]) && !isset($_SESSION["nhanvien"])){
        header("Location: ?chusandangnhap");
    }

    include_once("controller/controller.php");
    $p = new controller();
    $_SESSION["arrtt"] = [];
    if(isset($_SESSION["chusan"])){
        $machusan = $_SESSION["chusan"]; 
        $tbldiadiem = $p->getselectdiachisan($machusan);
        $ma = 'Chủ sân';
    }else{
        $madiadiem = $_SESSION["madiadiem"];
        $tbldiadiem = $p->getdiadiemsantheomadiadiem($madiadiem);
        $ma = 'Nhân viên';
    }
    
   
    if(!$tbldiadiem){
        echo "Lỗi";
    }elseif($tbldiadiem===0){
        echo "Không có địa điểm";
    }else{
        echo '<div class="container-fluid bg-body-secondary ">
                <div class="row pt-3 pb-3 justify-content-center">
                    <div class="col-md-12" align="center">
                        <h3>Quản lý lịch đặt sân của địa chỉ</h3>
                    </div>
                

                    <div class="col-md-6">
                            <select name="cbxdiadiem" id="cbxdiadiem"  onclick="getdiachi(this.value,this.name)" class="form-select" aria-label="Default select example">
                                <option value="0" selected>Chọn địa chỉ</option>';
        while($r = $tbldiadiem->fetch_assoc()){
            echo '<option value="'.$r["MaDiaDiem"].'">'.$r["TenDiaDiem"].'</option>';
        }
        echo                '</select>
                    </div>
                </div>';
        echo '<div id="div1"></div>';
        echo '<div id="div2"></div>';
        echo '';
    }

    //Phê duyệt
    if($ma == "Nhân viên"){
        if(isset($_REQUEST["cate"]) && $_REQUEST["cate"]=="pheduyet")
        {
                $madatsan = $_REQUEST["mads"]; 
                $p = new cdatsan();
                $result = $p->updateTrangThai($madatsan, "Đã duyệt",$_SESSION['nhanvien']); 
            
                if ($result) {
                    echo "<script>
                            alert('Trạng thái mã đặt sân $madatsan đã được duyệt.')
                        </script>";
                        header("refresh:0; Location: ?page=quanlylichdatsan");
                } else {    
                    echo "Lỗi: Không thể duyệt trạng thái mã đặt sân $madatsan.";
                }
                //exit; // Dừng xử lý tiếp
                /*header("Location: ?page=quanlylichdatsan");*/
        }elseif(isset($_REQUEST["cate"]) && $_REQUEST["cate"]=="khongduyet"){
                $madatsan = $_REQUEST["mads"];
                $p = new cdatsan();
                $result = $p->updateTrangThai($madatsan, "Không duyệt",$_SESSION['nhanvien']); 
            
                if ($result) {
                    echo "<script>
                            alert('Trạng thái mã đặt sân $madatsan không được duyệt.')
                        </script>";
                        header("refresh:0; Location: ?page=quanlylichdatsan");
                } else {    
                    echo "Lỗi: Không thể duyệt trạng thái mã đặt sân $madatsan.";
                }
        }
    }else{
        if(isset($_REQUEST["cate"]) && $_REQUEST["cate"]=="pheduyet")
        {
                $madatsan = $_REQUEST["mads"]; 
                $p = new cdatsan();
                $result = $p->updateTrangThai($madatsan, "Đã duyệt","NULL"); 
            
                if ($result) {
                    echo "<script>
                            alert('Trạng thái mã đặt sân $madatsan đã được duyệt.')
                        </script>";
                        header("refresh:0; Location: ?page=quanlylichdatsan");
                } else {    
                    echo "Lỗi: Không thể duyệt trạng thái mã đặt sân $madatsan.";
                }
                //exit; // Dừng xử lý tiếp
                /*header("Location: ?page=quanlylichdatsan");*/
        }elseif(isset($_REQUEST["cate"]) && $_REQUEST["cate"]=="khongduyet"){
                $madatsan = $_REQUEST["mads"];
                $p = new cdatsan();
                $result = $p->updateTrangThai($madatsan, "Không duyệt","NULL"); 
            
                if ($result) {
                    echo "<script>
                            alert('Trạng thái mã đặt sân $madatsan không được duyệt.')
                        </script>";
                        header("refresh:0; Location: ?page=quanlylichdatsan");
                } else {    
                    echo "Lỗi: Không thể duyệt trạng thái mã đặt sân $madatsan.";
                }
        }

    }

    if(isset($_REQUEST["cate"]) && $_REQUEST["cate"]=="chitietdatsan"){
        $pds = new cdatsan();
        $madatsan = $_REQUEST["mads"];
        $tblctds = $pds -> getchitietdatsan($madatsan);
        if($tblctds){
            echo '<table class="table table-striped align-middle" id="customerTable">
                            <thead class="table-success">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Sân</th>
                                    <th>Ngày Đặt Sân</th>
                                    <th>Khung Giờ</th>
                                    <th>Giờ Bắt Đầu</th>
                                    <th>Giờ kết thúc</th>
                                    <th>Đơn Giá</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                ';
            $dem = 1;
            while($r=$tblctds->fetch_assoc()){
                        echo '  <tr>
                                    <td>'.$dem.'</td>
                                    <td>'.$r["TenSan"].'</td>
                                    <td>'.$r["NgayDatSan"].'</td>
                                    <td>'.$r["KhungGio"].'</td>
                                    <td>'.$r["GioBatDau"].'</td>
                                    <td>'.$r["GioKetThuc"].'</td>
                                    <td>'.number_format($r["DonGia"],0,".",",").' đ</td>
                                
                        ';
                        if($r["KhungGio"] == "" || $r["TrangThai"] == "Không duyệt"){
                            echo "<td></td></tr>";
                        }else{
                            $chinhformatngay = date("d-m-Y", strtotime($r["NgayDatSan"]));
                            echo '<td><a href="?page=quanlylichdatsan&cate=thaydoithoigiands&mactds='.$r["MaChiTiet"].'&makh='.$r["MaKhachHang"].'&mads='.$madatsan.'&date='.$chinhformatngay.'"><button type="button" class="btn btn-success" name="pheduyetds" onclick="return confirm(\'Lưu ý: Để đổi thông tin khách đã đặt, bạn phải nhập mã xác nhận được gửi về mail khách hàng. Nhấn OK để tiếp tục\')">Thay đổi</button></a></td></tr>';
                        }
                        
                $dem++;
            }
            echo '
                            </tbody>
                        </table>
                ';
        }else{
            echo "Khônng có kết quả";
        }
    }

?>
</form>
</div>
<script>
    
    function getdiachi(madiadiem,tencbx){
        $.ajax({
            url: 'view/quanlylichdatsan/ajax.php',
            type: 'POST',
            data: {madiadiem: madiadiem, tencbx: tencbx},
            success: function(ketqua){
                $('#div1').html(ketqua);
            }
        });
    }

</script>