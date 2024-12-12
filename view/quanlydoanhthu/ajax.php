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
                                <select name="cbxloaithoigian" id="cbxloaithoigian"  onchange="getloaithoigian(this.value,this.name)" class="form-select" aria-label="Default select example">
                                    <option value="0" selected>Chọn loại thời gian</option>
                                    <option value="1">Báo cáo theo ngày</option>
                                    <option value="2">Báo cáo theo tháng</option>
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
                                    <input type="date" name="ngay" class="form-control" onchange="getngay(this.value,this.name)">
                                </td>
                            </tr>
                        </tbody>
                    </table>';
            }elseif($_REQUEST["giatri"] == 2){
                echo '<table class="table align-middle">
                        <tbody>
                            <tr align="center">
                                <td class="col-md-12">
                                <select name="thang" id="thang"  onchange="getthang(this.value,this.name)" class="form-select" aria-label="Default select example">
                                    <option value="0" selected>Chọn tháng</option>
                                    <option value="1">Tháng 1</option>
                                    <option value="2">Tháng 2</option>
                                    <option value="3">Tháng 3</option>
                                    <option value="4">Tháng 4</option>
                                    <option value="5">Tháng 5</option>
                                    <option value="6">Tháng 6</option>
                                    <option value="7">Tháng 7</option>
                                    <option value="8">Tháng 8</option>
                                    <option value="9">Tháng 9</option>
                                    <option value="10">Tháng 10</option>
                                    <option value="11">Tháng 11</option>
                                    <option value="12">Tháng 12</option>
                            </tr>
                        </tbody>
                    </table>';
            }
        }elseif($_REQUEST["tencbx"]=="ngay"){
            $ngayxemdt = $_REQUEST["giatri"];
            $pngayxemdt = new cdatsan();
            $tblngayxemdt = $pngayxemdt->getXemdoanhthutheongay($ngayxemdt);
            $tblngayxemdt1 = $pngayxemdt->getXemdoanhthutheongay($ngayxemdt);
            if(!$tblngayxemdt){
                echo 'error';
            }else{
                $tongtien = 0;
                while($r=$tblngayxemdt->fetch_assoc()){
                    $tongtien += $r["DonGia"];
                }
                if($_REQUEST["tencbx"]=="cbxloaithoigian" && $_REQUEST["giatri"] == 0){
                    echo '';
                }elseif($tongtien == 0){
                    echo 'Trong ngày chưa có doanh thu';
                }
                else{
                echo'<table class="table table-striped align-middle" id="customerTable">
                            <thead class="table-success">
                                <tr>
                                    <th>Mã Đặt Sân</th>
                                    <th>Tên Sân</th>
                                    <th>Loại Sân</th>
                                    <th>Ngày Và Giờ Đặt</th>
                                    <th>Ngày Đá</th>
                                    <th>Thời gian</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>';
               

                while($r=$tblngayxemdt1->fetch_assoc()){
                        echo '<tr>
                                <td>'.$r["MaDatSan"].'</td>
                                <td>'.$r["TenSan"].'</td>
                                <td>'.$r["TenLoaiSan"].'</td>
                                <td>'.$r["NgayDat"].'</td>
                                <td>'.$r["NgayDatSan"].'</td>
                                <td>'.$r["KhungGio"].'</td>
                                <td>'.$r["DonGia"].'</td>
                            </tr>';
                }
                
                    echo "<h2>Doanh thu: <i class='bi bi-coin'></i> ".number_format($tongtien,0,".",",") . "đ</h2>";
                }
                
            }

        }elseif($_REQUEST["tencbx"]=="thang"){
            for($j=1;$j<=12;$j++){
                if($_REQUEST["giatri"] == $j){
                    $tongtienthang=0;
                    $date1 = date('m',$j);
                    echo '<table class="table table-striped align-middle" id="customerTable">
                                <thead class="table-success">
                                    <tr>
                                        <th>Ngày</th>
                                        <th>Doanh Thu</th>
                                    </tr>
                                </thead>
                                <tbody>';
                    if($j == 1 || $j==3 || $j==5 || $j==7 || $j==8 || $j==10 || $j==12){
                    for($i=1;$i<=31;$i++){
                        $ngayxemdt = "20".date('y')."-$j-$i";
                        $ngay = date('d/m/20y',strtotime($ngayxemdt));
                        $pngayxemdt = new cdatsan();
                        $tblngayxemdt = $pngayxemdt->getXemdoanhthutheongay($ngayxemdt);
                        $tblngayxemdt1 = $pngayxemdt->getXemdoanhthutheongay($ngayxemdt);
                        if(!$tblngayxemdt){
                            echo 'error';
                        }else{
                            $tongtien = 0;
                            while($r=$tblngayxemdt->fetch_assoc()){
                                $tongtien += $r["DonGia"];
                            }
                            echo "<td>".$ngay."</td>";
                            echo "<td>".number_format($tongtien,0,".",",") . "đ</td></tr>";
                            $tongtienthang += $tongtien;
                            
                        }
                    }
                    echo "<h2>Doanh thu tháng $j: <i class='bi bi-coin'></i> ".number_format($tongtienthang,0,".",",") . "đ</h2>";
                    }elseif($j==4||$j==6||$j==9||$j==11){
                        for($i=1;$i<=30;$i++){
                            $ngayxemdt = "20".date('y')."-$j-$i";
                            $ngay = date('d/m/20y',strtotime($ngayxemdt));
                            $pngayxemdt = new cdatsan();
                            $tblngayxemdt = $pngayxemdt->getXemdoanhthutheongay($ngayxemdt);
                            $tblngayxemdt1 = $pngayxemdt->getXemdoanhthutheongay($ngayxemdt);
                            if(!$tblngayxemdt){
                                echo 'error';
                            }else{
                                $tongtien = 0;
                                while($r=$tblngayxemdt->fetch_assoc()){
                                    $tongtien += $r["DonGia"];
                                }
                                echo "<td>".$ngay."</td>";
                                echo "<td>".number_format($tongtien,0,".",",") . "đ</td></tr>";
                                $tongtienthang += $tongtien;
                                
                            }
                        }
                        echo "<h2>Doanh thu tháng $j: <i class='bi bi-coin'></i> ".number_format($tongtienthang,0,".",",") . "đ</h2>";
                    }else{
                        for($i=1;$i<=29;$i++){
                            $ngayxemdt = "20".date('y')."-$j-$i";
                            $ngay = date('d/m/20y',strtotime($ngayxemdt));
                            $pngayxemdt = new cdatsan();
                            $tblngayxemdt = $pngayxemdt->getXemdoanhthutheongay($ngayxemdt);
                            $tblngayxemdt1 = $pngayxemdt->getXemdoanhthutheongay($ngayxemdt);
                            if(!$tblngayxemdt){
                                echo 'error';
                            }else{
                                $tongtien = 0;
                                while($r=$tblngayxemdt->fetch_assoc()){
                                    $tongtien += $r["DonGia"];
                                }
                                echo "<td>".$ngay."</td>";
                                echo "<td>".number_format($tongtien,0,".",",") . "đ</td></tr>";
                                $tongtienthang += $tongtien;
                                
                            }
                        }
                        echo "<h2>Doanh thu tháng $j: <i class='bi bi-coin'></i> ".number_format($tongtienthang,0,".",",") . "đ</h2>";
    
                    }
                }
            }
        }
         
    }else{
        
    }

?>
