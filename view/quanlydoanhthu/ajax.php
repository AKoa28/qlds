<?php
    // Thiết lập múi giờ
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $today = date('Y-m-d');
    session_start();
    include_once("../../controller/controller.php");
    include_once("../../model/model.php");
    require_once("../../mail/sendmail.php");

    if($_REQUEST["giatri"] > 0){
       if($_REQUEST["tencbx"]=="cbxdiadiem" ){
            $ketqua = '';
            $ketqua .= '
            <table class="table align-middle">
                    <tbody>
                        <tr class="justify-content-start">
                            <td class="col-md-2">
                                <b>Loại thời gian</b>
                            </td>
                            <td class="col-md-4">
                                <select name="cbxloaithoigian" id="cbxloaithoigian"  onchange="getloaithoigian(this.value,this.name,'.$_REQUEST["giatri"].')" class="form-select" aria-label="Default select example">
                                    <option value="0" selected>Chọn loại thời gian</option>
                                    <option value="1">Báo cáo theo ngày</option>
                                    <option value="2">Báo cáo theo tháng</option>
                                    <option value="3">Báo cáo theo quý</option>
                                    <option value="1">Báo cáo theo năm</option>
                                </select> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            ';
            echo $ketqua;
        }elseif($_REQUEST["tencbx"]=="cbxloaithoigian"){
            if($_REQUEST["giatri"] == 1){
                echo '<table class="table align-middle">
                        <tbody>
                            <tr class="justify-content-start">
                                <td class="col-md-2">
                                    <b>Chọn ngày</b>
                                </td>
                                <td class="col-md-4">
                                    <input type="date" name="ngay" class="form-control" onchange="getngay(this.value,this.name,'.$_REQUEST["madd"].')">
                                </td>
                            </tr>
                        </tbody>
                    </table>';
            }elseif($_REQUEST["giatri"] == 2){
                echo '<table class="table align-middle">
                        <tbody>
                            <tr align="center">
                                <td class="col-md-12">
                                    <button type="button" class="btn btn-outline-success">Tháng 1</button>
                                    <button type="button" class="btn btn-outline-success">Tháng 2</button>
                                    <button type="button" class="btn btn-outline-success">Tháng 3</button>
                                    <button type="button" class="btn btn-outline-success">Tháng 4</button>
                                    <button type="button" class="btn btn-outline-success">Tháng 5</button>
                                    <button type="button" class="btn btn-outline-success">Tháng 6</button>
                                    <button type="button" class="btn btn-outline-success">Tháng 7</button>
                                    <button type="button" class="btn btn-outline-success">Tháng 8</button>
                                    <button type="button" class="btn btn-outline-success">Tháng 9</button>
                                    <button type="button" class="btn btn-outline-success">Tháng 10</button>
                                    <button type="button" class="btn btn-outline-success">Tháng 11</button>
                                    <button type="button" class="btn btn-outline-success">Tháng 12</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>';
            }elseif($_REQUEST["giatri"] == 3){
                echo '<table class="table align-middle">
                        <tbody>
                            <tr align="center">
                                <td class="col-md-12">
                                    <button type="button" value="1" class="btn btn-outline-success">Quý 1</button>
                                    <button type="button" value="2" class="btn btn-outline-success">Quý 2</button>
                                    <button type="button" value="3" class="btn btn-outline-success">Quý 3</button>
                                    <button type="button" value="4" class="btn btn-outline-success">Quý 4</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>';
            }elseif($_REQUEST["giatri"] == 4){
                
            }
        }elseif($_REQUEST["tencbx"]=="ngay"){
            $ngayxemdt = $_REQUEST["giatri"];
            $madd = $_REQUEST["madd"];
            $pngayxemdt = new cdatsan();
            $tblngayxemdt = $pngayxemdt->getXemdoanhthutheongay($ngayxemdt, $madd);
            if(!$tblngayxemdt){
                echo 'error';
            }elseif($tblngayxemdt===0){
                echo 'Trong ngày chưa có doanh thu';
            }else{
                $tongtien = 0;
                echo '
                            <table class="table"  style="text-align:center;">
                                <thead>
                                    <th>Khung giờ</th>
                                    <th>Tên sân</th>
                                    <th>Ngày đặt sân</th>
                                    
                                    <th>Giá</th>
                                </thead>
                                <tbody id="DaChon">';
                while($r=$tblngayxemdt->fetch_assoc()){
                        $tongtien += $r["DonGia"];
                        
                        echo'       <tr>
                                        <td>'.$r["MaKhachHang"].'</td>
                                        <td>'.$r["TenSan"].'</td>
                                        <td>'.$r["NgayDatSan"].'</td>
                                        <td>'.number_format($r["DonGia"],0,".",",").' đ</td>
                                    </tr>';
                        
                        // echo $r["NgayDat"] . "<br>";
                }
                echo'   </tbody>
                                    <tr>
                                        <td colspan="2" id="order">
                                            
                                        </td>
                                        <td colspan="2">
                                            Thành tiền:
                                        </td>
                                        <td id="tongtien">

                                        </td>
                                    </tr>
                            </table>
                        ';
                if($_REQUEST["tencbx"]=="cbxloaithoigian" && $_REQUEST["giatri"] == 0){
                    echo '';
                }else{
                    echo "<h2>Doanh thu: <i class='bi bi-coin'></i> ".number_format($tongtien,0,".",",") . " đ</h2>";
                }
                
            }

        }
         
    }else{
        
    }

?>
