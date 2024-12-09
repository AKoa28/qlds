<?php
    if(!isset($_SESSION["chusan"]) && !isset($_REQUEST["nhanvien"])){
        header("Location: ?page=home");
    }else{
        if(!empty($_SESSION["chonthaydoi"]) && !empty($_SESSION["arrtt"])){ //$_SESSION["arrtt"] = [$mads,$tensan,$nd,$khunggio,$dongia,$tendiadiem,$mdd,$ms1];
            $catchuoi = explode("_",$_SESSION["chonthaydoi"]);
            $catmasan = explode("-",$catchuoi[2]);
            echo $_SESSION["arrtt"][0];
            echo '
                <div class="container p-5 section_phu">
                    <div class="row">
                        <div class="col-md-12">';

            echo'            <form method="POST">
                                <h1 class="mb-5" style="text-align:center;">Thông tin ban đầu</h1>
                           
                                <table class="table"  style="text-align:center;">
                                    <thead class="table-success">
                                        <tr>
                                        <th>Mã sân</th>
                                        <th>Khung giờ</th>
                                        <th>Tên sân</th>
                                        <th>Ngày đặt</th>
                                        <th>Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$_SESSION["arrtt"][7].'</td>
                                            <td>'.$_SESSION["arrtt"][3].'</td>
                                            <td>'.$_SESSION["arrtt"][1].'</td>
                                            <td>'.$_SESSION["arrtt"][2].'</td>
                                            <td>'.number_format($_SESSION["arrtt"][4], 0, ".", ",").' đ</td>
                                        </tr>
                                    </tbody>
                                </table>
                             ';
            echo'
                            <h1 class="mb-5" style="text-align:center;">Thông tin thay đổi</h1>
                            
                                <table class="table"  style="text-align:center;">
                                    <thead class="table-success">
                                        <tr>
                                        <th>Mã sân</th>
                                        <th>Khung giờ</th>
                                        <th>Tên sân</th>
                                        <th>Ngày đặt</th>
                                        <th>Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>'.$catmasan[0].'</td>
                                            <td>'.$catchuoi[1].'</td>
                                            <td>'.$catmasan[1].'</td>
                                            <td>'.$catchuoi[3].'</td>
                                            <td>'.number_format($catchuoi[4], 0, ".", ",") .' đ</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-info" name="subguiyeucau" >Gửi yêu cầu</button>
                            </form> 
            ';

            echo'       </div>
                    </div>
                </div>
            '; 
            
        }

        if(isset($_REQUEST["subguiyeucau"])){
            $makhachhang = $_REQUEST["makh"];
            $ptk = new ctaikhoan();
            $tblttkh = $ptk -> getThongtinkhachhang($makhachhang);
            if($tblttkh){
                while($rttkh = $tblttkh->fetch_assoc()){
                    $tenkh = $rttkh["Ten"];
                    $emailkh = $rttkh["Email"];
                }
            
            }
            // print_r($_SESSION["arrtt"]);
            $_SESSION["maxacnhan"] = rand(10000,99999);
            $_SESSION["giotao"] = date("H:i:s", strtotime("+5 minutes"));
            $mail = new sendmail();
            $mail -> guithongtinthaydoidatsan($emailkh,$tenkh,$_SESSION["arrtt"],$_SESSION["maxacnhan"],$_SESSION["chonthaydoi"]);
            echo '
                <div class="modal fade show section_phu bg-dark" id="verificationModal" tabindex="-1" aria-labelledby="verificationModalLabel" style="display: block;">
                <div class="row justify-content-center">
                    <div class = "col-md-5">
                    <h3 class="mt-5 text-primary" >Mã xác nhận</h3>
                    <form method="post" id="formxacnhan" align="center" >
                        <div class="form-floating mb-3">
                            <input type="text" name="maxacnhan" class="form-control" id="floatingInput" placeholder="" required>
                            <label for="floatingInput">Mã xác nhận</label>
                        </div>
                        <button type="submit" name="xacnhanmail" class="btn btn-success mb-3" >Xác nhận</button>
                    </form>
                </div>
                </div>
                </div>
            ';
        }
        
        if(isset($_REQUEST["xacnhanmail"])){
            $giohientai = date("H:i:s"); // giờ hiện tại
            if(strtotime($_SESSION['giotao']) > strtotime($giohientai)){ // Nếu giờ hiện tại bé hơn giờ tạo + 5 phút thì thực hiện tiếp;
                $xacnhan = $_POST["maxacnhan"];
                $madds = $_REQUEST["mads"];
                if($_SESSION["maxacnhan"] == $xacnhan){
                    unset($_SESSION["maxacnhan"]);
                    unset($_SESSION["giotao"]);
                    $p = new cdatsan();
                    $updateChitietdatsan = $p->getupdateChitietdatsan($madds);
                    if($updateChitietdatsan){
                        echo "<script>alert('Cập nhật thành công')</script>";
                        header("refresh:0; url='?page=quanlylichdatsan&cate=thaydoithoigiands&mactds=".$_REQUEST["mactds"]."&makh=".$_REQUEST["makh"]."&mads=".$_REQUEST["mads"]."&date=".$catchuoi[3]."'");
                    }else{
                        echo "<script>alert('Cập nhật thất bại')</script>";
                    }
                    
                }else{
                    unset($_SESSION["maxacnhan"]);
                    unset($_SESSION["giotao"]);
                    echo "<script>alert('Mã xác nhận sai')</script>";
                    header("refresh:0; url='?page=quanlylichdatsan&cate=guixacnhanthongtinthaydoi&mactds=".$_REQUEST["mactds"]."&makh=".$_REQUEST["makh"]."&mads=".$_REQUEST["mads"]."'");
                }
            }else{ // nếu giờ hiện tại lớn hơn giờ tạo + 1 phút thì thông báo;
                unset($_SESSION["maxacnhan"]);
                unset($_SESSION["giotao"]);
                echo "Mã quá hiệu lực";
            }
        }
        
    }

?>
