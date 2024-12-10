<?php
    if(!isset($_SESSION["chusan"])){
        header("Location: ?page=chusan");
    }else{
        $diachi = $_REQUEST["madd"];
        $masanurl = $_REQUEST["mas"];
        $p = new csan_gia_thu_khunggio;
        $pc = new controller();
        $kiemtramaddcuacs = $pc->getktsohuusan($diachi,$masanurl);
        if($kiemtramaddcuacs){
            $tbltt = $p->getKhungGiotheoMaSan($masanurl);
            $lts = $pc->getselectsan($masanurl);
            if($lts){
                while($r = $lts->fetch_assoc()){
                    $tensan = $r["TenSan"];
                    $tenloaisan = $r["TenLoaiSan"];
                }
            }else{
                echo "không có thông tin";
            }
            
            echo '
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 section_phu bg-body-secondary">
                                <div class="row justify-content-center mt-5">
                                    <h3 class="text-center">Thêm Giá Theo Ngày</h3>
                                        <form action="" method="post" id="formsuathongtin" class="row justify-content-center" enctype="multipart/form-data">
                                        <div class="col-md-7">
                                            <input type="hidden" name="txtmasan" value="'.$masanurl.'">
                                            <fieldset disabled>
                                                <div class="form-floating mb-3">
                                                    
                                                    <input type="text" name="tensan" class="form-control" id="disabledTextInput" placeholder="" value="'.$tensan.' - '.$tenloaisan.'">
                                                    <label for="disabledTextInput">Tên sân - Loại sân</label>
                                                </div>
                                            </fieldset>
                                            <div class="form-floating mb-3">
                                                <input type="number" name="giamoi" class="form-control" id="floatingInput" placeholder="" min="0" required>
                                                <label for="floatingInput">Giá Mới (VNĐ)</label>
                                            </div>
            ';             
            echo '                              
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Chọn Ngày</label>
                                                <input class="form-control" type="date" name="ngay" id="ngay" onchange="getkiemtrangay(this.value,this.name)" id="formFile">
                                                <div id="loingay" style="color:red"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 text-center" id="checkbox"><h6 class="">Khung giờ</h6>';
                        if($tbltt){
                            $checkbox=0;
                            while($r=$tbltt->fetch_assoc()){
                                echo '  <input type="checkbox" name="chonkhunggio[]" value="'.$r["KhungGio"].'" width="auto" class="checkbox-input d-none" id="'.$checkbox.'">
                                        <label for="'.$checkbox.'" class="checkbox-label mb-2">'.$r["TenKhungGio"].'</label>';
                                $checkbox++;
                            
                            }
                        }else{
                            echo "Không có khung giờ";
                        }
                                
            echo'                       
                                        </div>
                                        <div class="col-md-7 text-center" id="order"></div>
                                        </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            ';

            if(isset($_REQUEST["subts"])){
                $mas = $_REQUEST["txtmasan"];
                $giamoi = $_REQUEST["giamoi"];
                $ngay = $_REQUEST["ngay"];
                $khunggio = $_REQUEST["chonkhunggio"];
                $chuyensang_mathu = [
                    "Sunday" => "7",
                    "Monday" => "1",
                    "Tuesday" => "2",
                    "Wednesday" => "3",
                    "Thursday" => "4",
                    "Friday" => "5",
                    "Saturday" => "6"
                ];
                $ngaythaydoi  = strtotime($ngay);                 // Chuyển đổi ngày thành timestamp
                $ngaythaydoi_chuyensangthu = date("l",$ngaythaydoi);   // Lấy tên thứ bằng tiếng Anh
                $chuyensangmathu  = $chuyensang_mathu[$ngaythaydoi_chuyensangthu];    // Tra cứu tên thứ bằng bảng mã
                $kiemtrat = true;
                if(!empty($khunggio)){
                    foreach($khunggio as $kg){
                        $kiemtratrung = $p->getkiemtratrungthongtin($mas,$kg,$chuyensangmathu,$ngay);
                        if($kiemtratrung){
                            $kiemtrat = false;
                            
                        }
                    }
                    if($kiemtrat==true){
                        foreach($khunggio as $kg){
                            $tblthemsangiathukhunggio_ngay = $p->getinsertsangiathukhunggio_ngay($mas, $giamoi, $kg, $chuyensangmathu, $ngay);
                            if(!$tblthemsangiathukhunggio_ngay){
                                echo '<script>alert("Lỗi ở khung giờ '.$kg.'!")</script>';
                            }
                        }
                        if($tblthemsangiathukhunggio_ngay){
                            echo '<script>alert("Thêm thành công!")</script>';
                            header("refresh:0;url='?page=xemchitietsan&madd=".$diachi."&mas=".$masanurl."'");
                        }else{
                            echo '<script>alert("Lỗi!")</script>';
                        }
                    }else{
                        echo '<script>alert("Trùng thông tin với một giá theo ngày khác")</script>';
                    }
                }else{
                    echo "Khung Giờ chưa chọn";
                }
            }
        }else{
            header("Location: ?page=quanlysan");
        }
    }
    
?>
<script>
    
    $(".checkbox-input").change(function() {
        const ngayinput = new Date($("#ngay").val());
        const ngayhomnay = new Date();
        // Đặt giờ, phút, giây của ngày hiện tại về 0 để so sánh chính xác
        ngayhomnay.setHours(0, 0, 0, 0);
        
        // Kiểm tra khi checkbox được chọn
        if ($(this).is(":checked")) {
            if ($("#ngay").val() === "" || ngayinput < ngayhomnay) {
                // Hiển thị lỗi nếu ngày không hợp lệ
                $("#loingay").text("Ngày được chọn đã qua!");
                $(this).prop("checked", false); // Bỏ chọn checkbox
            } else {
                // Xóa lỗi nếu ngày hợp lệ
                $("#loingay").text("");
                // Thêm nút nếu chưa tồn tại
                if ($("#order").find("button").length === 0) {
                    $('#order').append('<button type="submit" name="subts" class="btn btn-info mb-3">Thêm</button>');
                }
            }
        } else {
            // Nếu checkbox bị bỏ chọn và không còn checkbox nào được chọn, xóa nút
            if ($(".checkbox-input:checked").length === 0) {
                $('#order').find('button').remove();
            }
        }
    });
    // function getkiemtrangay(value,name){
    //         // var chonsan = [];
    //         // var ngaybatdau = $("#ngaybatdau").val().trim();
    //         // var ngayketthuc = $("#ngayketthuc").val().trim();
    //         // $("input[name='chonsan[]']:checked").each(function() {
    //         //     chonsan.push($(this).val());
    //         // });
    //         // alert("Selected Values: " + chonsan.join(", ") + ngaydatsan);
    //         $.ajax({
    //             url: 'view/themngaycogiakhac/ajaxkiemtrangay.php',
    //             type: 'POST',
    //             data: {value: value,name: name},
    //             success: function(ketqua){
    //                 if(ketqua=="loi"){
    //                     $("#loingay").html("<p style='color:red'>Ngày này đã qua</p>");
    //                 }else{
    //                     $("#loingay").html("");
    //                 }
    //             },
    //             error: function(xhr, status, error){
    //                 alert("Lỗi"+error);
    //             }
    //         });
    // }
</script>