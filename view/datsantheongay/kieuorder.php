<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $today = date('Y-m-d');
    session_start();
    include_once("../../controller/controller.php");
    include_once("../../model/model.php");
    require_once("../../mail/sendmail.php");
    if(isset($_REQUEST["giatri"])){
        $p = new controller();
        $madiadiem = $_REQUEST["madiadiem"];
        $dsdatsan = $p -> getselectallsan($madiadiem);
        if($_REQUEST["giatri"] == 1){
            echo '<div class="row">
                            <h3>Chọn Sân</h3>
                            <table class="col-md-12 table table-hover " style="text-align:center;">
                                <tbody>
                                    <tr>';
                                        
                                            $checkbox = 0;
                                            $dem = 0;
                                            while($r = $dsdatsan->fetch_assoc()){
                                                echo '<td><input type="checkbox" name="chonsan[]" value="'.$r["MaSan"].'_'.$r["TenSan"].'_'.$madiadiem.'" class="checkbox-input d-none" id="'.$checkbox.'" data-masan="'.$r["MaSan"].'" data-tensan="'.$r["TenSan"].'"><label for="'.$checkbox.'" class="checkbox-label">'.$r["TenSan"].'</label></td>';
                                                $checkbox++;
                                                $dem++;  
                                                if($dem%4==0){
                                                    echo '</tr><tr>';
                                                    $dem = 0;
                                                }  
                                            }
            echo '                            
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                <h3>Chọn ngày</h3>
                <input type="date" name="ngay" id="ngay" onchange="getkiemtrangay(this.value,this.name)" class="form-control" required>
                
            ';
        }else{
            echo '<div class="row">
                            <h3>Chọn Sân</h3>
                            <table class="col-md-12 table table-hover " style="text-align:center;">
                                <tbody>
                                    <tr>';
                                        
                                            $checkbox = 0;
                                            $dem = 0;
                                            while($r = $dsdatsan->fetch_assoc()){
                                                echo '<td><input type="checkbox" name="chonsan[]" value="'.$r["MaSan"].'_'.$r["TenSan"].'_'.$madiadiem.'" class="checkbox-input d-none" id="'.$checkbox.'" data-masan="'.$r["MaSan"].'" data-tensan="'.$r["TenSan"].'" data-madiadiem="'.$madiadiem.'"><label for="'.$checkbox.'" class="checkbox-label">'.$r["TenSan"].'</label></td>';
                                                $checkbox++;
                                                $dem++;  
                                                if($dem%4==0){
                                                    echo '</tr><tr>';
                                                    $dem = 0;
                                                }  
                                            }
            echo '
                                </tr>
                                </tbody>
                            </table>
                        </div>
                <h3>Chọn ngày bắt đầu</h3>
                <input type="date" name="ngaybatdau" id="ngaybatdau" onchange="getkiemtrangay(this.value,this.name,'.$madiadiem.')" class="form-control" required>
                <h3>Chọn ngày kết thúc</h3>
                <input type="date" name="ngayketthuc" id="ngayketthuc" onchange="getkiemtrangay(this.value,this.name,'.$madiadiem.')" class="form-control" required>
                
            ';
        }
    }else{
        echo "";
    }
    
?>

<script>
    $(".checkbox-input").change(function(){
        if($(this).is(":checked")){
            if($("#div3").find("button").length===0){//kiểm tra có nút buuton chưa
                $('#div3').append('<button class="btn btn-success" type="submit" name="subdatsantheongay" id="getGiaTri">Đặt sân</button>');
            }
        }else{
            if($(".checkbox-input:checked").length===0){// Kiểm tra không có checkbox nào được chọn
                $('#div3').find('button').remove(); // Xóa nút thay đổi
            }
        }
            
    });
    
</script>