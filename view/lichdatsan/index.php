<?php
$diachi = $_REQUEST["masan"];
include_once("controller/controller.php");
$p = new controller();

// $tbl = $p->getselectallsan($diachi);
$tbl = $p->getselectkhunggio();
// $tbl = $p->getselectallsan("1");

if($tbl===-1){
    echo "Không có";
}elseif(!$tbl){
    echo "Hiện tại địa chỉ sân chưa mở cửa hoạt động";
}else{
    $d = 0;
    $dem = 0;
    $lich = [];
    $giatheothu = [];
    echo "<table width='100%' align='center' >";
    while($r = $tbl->fetch_assoc()){
        $makhunggio = $r["MaKhungGio"];
        
        // $makhunggio = $r["KhungGio"];
        if($makhunggio > $d ){
            $tblmasan = $p->getselectsandistinctmasan($diachi);
            $d = $makhunggio;
            $khunggio = $r["TenKhungGio"];
            // $khunggio = $d. "_" .$r["TenKhungGio"];
            while($r1 = $tblmasan->fetch_assoc()){

                $masan = $r1["MaSan"];
                
                for($i=1; $i<8; $i++){
                    $tblgia = $p->getselectsanbykhunggio_san_thu($makhunggio,$masan ,$i); 
                    $giatheothu[] = $tblgia;
                } 
                // print_r($giatheothu);
                // Kiểm tra nếu Sân đó có mở theo khung giờ chưa
                $all_zero = true; // Giả định ban đầu là tất cả đều bằng 0
                foreach ($giatheothu as $value) {
                    if ($value !== 0) {
                        $all_zero = false; // Nếu có phần tử nào không phải 0, gán false
                        break; // Thoát khỏi vòng lặp vì không cần kiểm tra tiếp
                    }
                }
                if(!$all_zero){
                    $dem++;
                    if($dem==1){

                        $tensan = $r1["MaSan"] . "-" . $r1["TenSan"] . " (".$r1["TenLoaiSan"].")";
                        // $tensan = $r1["TenSan"] . " (".$r1["TenLoaiSan"].")";
                        $array1= [$khunggio,$tensan];
                        $row1 = array_merge($array1,$giatheothu);
                        $lich[] = $row1;
                        $array1 = [];
                        $giatheothu = [];
                        $dem=0;
                    }
                }else{
                    $giatheothu = [];
                }
            } 
        }
    };
    
    echo "</table>";
    //(dùng để test)
    // print_r($lich);
    // for($i = 0; $i < sizeof($lich); $i++){
    //     echo "<br>".$lich[$i][0] ."<br>";
    //     echo $lich[$i][1] ."<br>";
    //     echo $lich[$i][2] ."<br>";
    //     echo $lich[$i][3] ."<br>";
    //     echo $lich[$i][4] ."<br>";
    //     echo $lich[$i][5] ."<br>";
    //     echo $lich[$i][6] ."<br>";
    //     echo $lich[$i][7] ."<br>";
    //     echo $lich[$i][8] ."<br>";
    // }
}
    $thu = ["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"];
    // Thiết lập múi giờ
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // Lấy ngày hiện tại hoặc từ tham số URL
    $today = isset($_GET['date']) ? $_GET['date'] : date('d-m-Y');
    // Lấy ngày hôm nay
    $currentDate = date('d-m-Y');
    // Tính toán ngày đầu tiên của tuần hiện tại (Thứ 2)
    $startOfWeek = date('d-m-Y', strtotime('monday this week', strtotime($today)));
    // Tính toán ngày cuối cùng của tuần (Chủ nhật)
    $endOfWeek = date('d-m-Y', strtotime('sunday this week', strtotime($today)));
    // Tạo mảng cho các ngày trong tuần
    $weekDays = [];
    for ($i = 0; $i < 7; $i++) {
        $weekDays[] = date('d-m-Y', strtotime("$startOfWeek +$i day"));
    }

    // Hiển thị các nút điều hướng tuần trước, hôm nay và tuần sau
    $prevWeek = date('d-m-Y', strtotime("$startOfWeek -7 days"));
    $nextWeek = date('d-m-Y', strtotime("$startOfWeek +7 days"));
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        table {
            color: #333;
        }
        th, td {
            vertical-align: middle;
        }
        .table th, .table td {
            border: 1px solid #ddd;
        }
        .table-container {
            max-height: 600px;
            overflow-y: auto;
        }
        .table thead th {
            position: sticky;
            top: 0;
            background-color:cadetblue;
            z-index: 10;
        }
        .btn-custom {
            width: 100%;
            color: #fff;
            background-color: #6c757d;
            border: none;
        }
        .btn-custom:hover {
            background-color: aliceblue;
            color:#333;
        }
        tr:hover{
            background-color: darkcyan;
        }

        /* .checkbox-label {
            display: inline-block;
            width: 100px;
            padding: 10px;
            background-color: #ddd;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkbox-label:hover {
            background-color: #ccc;
        }

        .checkbox-input:checked + .checkbox-label {
            background-color: darkslategray;
            color: white;
        }

        .checkbox-label-choduyet {
            display: inline-block;
            width: 100px;
            padding: 10px;
            background-color: palegreen;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkbox-label-choduyet:hover {
            background-color: #ccc;
        }

        .checkbox-input:checked + .checkbox-label-choduyet {
            background-color: darkslategray;
            color: white;
        }

        .checkbox-label-uutien {
            display: inline-block;
            width: 100px;
            padding: 10px;
            background-color: gold;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkbox-label-uutien:hover {
            background-color: #ccc;
        }

        .checkbox-input:checked + .checkbox-label-uutien {
            background-color: darkslategray;
            color: white;
        } */
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container mt-3">
        <div align="center">
                <h3><?= $startOfWeek." đến ".$endOfWeek; ?></h3>
        </div>
        <div class="d-flex justify-content-around align-items-center mb-3">
            <a href='?page=lichdatsan&masan=<?=$diachi?>&date=<?=$prevWeek?>'><button class="btn btn-primary">Tuần trước</button></a>
            <a href='?page=lichdatsan&masan=<?=$diachi?>&date=<?=$currentDate?>'><button class='btn btn-primary pr'>Hôm nay</button></a>
            <a href='?page=lichdatsan&masan=<?=$diachi?>&date=<?=$nextWeek?>'><button class="btn btn-primary">Tuần sau</button></a>
        </div>
    </div>
    <form action="" method="post">
    <div class="container mt-5 mb-5 p-3">
        <div class="row justify-content-between">
            <div class="col-md-5">
                <div class="row">
                    <p style="background-color: #ddd;width:20px; height:20px;"></p>&nbsp;Chưa có người chọn, bạn có thể chọn.
                </div>
                <div class="row">
                    <p style="background-color: darkslategray;width:20px; height:20px;"></p>&nbsp;Lựa chọn của bạn.
                </div>
                <div class="row">
                    <p style="background-color: gold;width:20px; height:20px;"></p>&nbsp;Người có tài khoản được ưu tiên duyệt, bạn không chọn được.
                </div>
                <div class="row">
                    <p style="background-color: palegreen;width:20px; height:20px;"></p>&nbsp;Đã có người chọn nhưng chưa được duyệt, bạn có thể chọn.
                </div>
            </div>
            <div class="col-md-6" >
                
                <table class="table"  style="text-align:center;">
                    <thead>
                        <th>STT</th>
                        <th>Khung giờ</th>
                        <th>Tên sân</th>
                        <th>Ngày đặt</th>
                        <th>Giá</th>
                    </thead>
                    <tbody id="DaChon">

                    </tbody>
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
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered" style="text-align:center;">
            <thead>
                <tr>
                    <th>Giờ</th>
                    <th>Sân</th>
                    <!-- Vòng lặp để tự động hiển thị các thứ trong tuần -->
                    <?php 
                        $j = 0;
                        foreach ($weekDays as $day) {
                            echo "<th>" . $thu[$j] . "<br>" . date('d/m/Y', strtotime($day)) . "</th>";
                            $j++;
                        }
                    ?>
                    
                </tr>
            </thead>
            <tbody>
                <div id="ketqua">

                </div>
                <?php
                    $timestamp1 = strtotime($prevWeek);
                    $timestamp2 = strtotime($currentDate);
                    $timestamp3 = strtotime($startOfWeek);
                    if($timestamp3 >= $timestamp2 || in_array($currentDate, $weekDays)){
                            $checkbox = 1;
                            $times_checked = [];
                            $duplicate_times = [];
                            // Lặp qua mảng schedule để kiểm tra thời gian trùng
                            foreach ($lich as $item) {
                                $time = $item[0]; // Lấy thời gian (giá trị ở vị trí đầu tiên của mỗi phần tử)
                                // Kiểm tra xem thời gian này đã xuất hiện trước đó chưa
                                if (in_array($time, $times_checked) ) {
                                    $duplicate_times[] = $time; // Nếu trùng, thêm vào mảng trùng
                                } else {
                                    $times_checked[] = $time; // Nếu chưa trùng, thêm vào mảng kiểm tra
                                }
                            }
                            // In kết quả (dùng để test)
                            // if (!empty($duplicate_times)) {
                            //     echo "Các thời gian trùng lặp là: " . implode(", ", $duplicate_times);
                            //     echo "<br>Các thời gian trong mảng kiểm tra là: " . implode(", ", $times_checked);
                            // } else {
                            //     echo "Không có thời gian nào trùng lặp.";
                            //} 
                            $time_counts = array_count_values($duplicate_times);
                            $tam = [];
                            $mausac = 0;
                            foreach ($lich as $index => $row) {
                                echo "<tr>";
                                // Kiểm tra nếu thời gian của hàng này khác với thời gian của hàng trước
                                if (in_array($row[0],$duplicate_times) && !in_array($row[0],$tam)) {
                                    foreach($time_counts as $timecount => $dem1){
                                        if($row[0]==$timecount){
                                            $dem = $dem1;
                                        }
                                    }
                                    // Màu sắc cho column giờ
                                    if($mausac==0){
                                        echo "<td rowspan='".$dem + 1 ."' style='background-color: #ddd;'>{$row[0]}</td>";
                                        $mausac++;
                                    }else{
                                        echo "<td rowspan='".$dem + 1 ."' style='background-color: silver;'>{$row[0]}</td>";
                                        $mausac = 0;
                                    }
                                    $tam[] = $row[0];
                                }elseif(in_array($row[0],$tam)){
                                    echo "";
                                }else{
                                    // Màu sắc cho column giờ
                                    if($mausac==0){
                                        echo "<td style='background-color: #ddd;'>{$row[0]}</td>";
                                        $mausac++;
                                    }else{
                                        echo "<td style='background-color: silver;'>{$row[0]}</td>";
                                        $mausac = 0;
                                    }
                                }
                                // Second column: Field
    
                                $parts = explode("-", $row[1]);
                                // $parts1 = explode("_", $row[0]);
                                $ms = $parts[0];
                                // $mkg = $parts1[0];
                                echo "<td>{$parts[1]}</td>";
                                // echo "<td>{$row[1]}</td>";
                                    
    // Kiểm tra xem đã có người đặt chưa
                                    
                                    $tbldatsan = $p->getdatsan($ms,$row[0]);
                                    if($tbldatsan===-1){
                                        echo "Không có";
                                    }elseif(!$tbldatsan){
                                        $ngaydat = [];
                                        $trangthai = [];
                                    }else{
                                        while($rn = $tbldatsan->fetch_assoc()){
                                            $ngaydat[] = date('d-m-Y', strtotime($rn["NgayDatSan"]));
                                            $trangthai[] = [date('d-m-Y', strtotime($rn["NgayDatSan"])),$rn["TrangThai"]];
                                        }
                                    }
                                
                                
                                
                                // print_r($ngaydat); 
                                // print_r($trangthai);
                                // print_r($trangthai);
                                for ($i = 2; $i < count($row); $i++) {
                                    // echo "<td><button class='btn btn-custom'>".number_format($row[$i],0,'.',',')." đ</button></td>";
                                    
                                    if($row[$i]==0){
                                        echo "<td></td>";
                                    }else{
                                        if($i == 2){
                                            $t = $row[$i];
                                            $t -= $t;
                                            $ngay = $weekDays[$t];
                                        }else{
                                            $t += 1;
                                            $ngay = $weekDays[$t];
                                        } 
                                            // echo $ngay;
                                            // print_r($ngaydat);
                                        foreach ($trangthai as $NDTT) {
                                            if($ngay==$NDTT[0]){
                                                $laytrangthai = $NDTT[1];
                                            }
                                        }// Lấy trạng thái của Ngày đặt 
                                            if(in_array($ngay,$ngaydat) && $laytrangthai == "Chờ duyệt"){
                                                echo '<td><input type="checkbox" name="chondatsan[]" value="'.$diachi.'_'.$row[0].'_'.$row[1].'_'.$ngay.'_'.$row[$i].'" class="checkbox-input d-none" id="'.$checkbox.'" data-dc="'.$diachi.'" data-kg="'.$row[0].'" data-ts="'.$row[1].'" data-ngay="'.$ngay.'" data-gia="'.$row[$i].'"><label for="'.$checkbox.'" class="checkbox-label-choduyet">'.number_format($row[$i],0,'.',',').' đ</label></td>';
                                                $checkbox++;
                                            }elseif(in_array($ngay,$ngaydat) && $laytrangthai == "Ưu tiên"){
                                                echo '<td><input type="checkbox" name="chondatsan[]" class="checkbox-input d-none"><label class="checkbox-label-uutien">'.number_format($row[$i],0,'.',',').' đ</label></td>';
                                               
                                            }elseif(in_array($ngay,$ngaydat) && $laytrangthai == "Đã duyệt"){
                                                echo '<td></td>';
                                               
                                            }else{
                                                // echo "<td><a href='?page=order&tt=".$diachi."_".$row[0]."_".$row[1]."_".$ngay."_".$row[$i]."'><button class='btn btn-custom' name='".$ngay."'>".number_format($row[$i],0,'.',',')." đ</button> </a></td>";
                                                echo '<td><input type="checkbox" name="chondatsan[]" value="'.$diachi.'_'.$row[0].'_'.$row[1].'_'.$ngay.'_'.$row[$i].'" class="checkbox-input d-none" id="'.$checkbox.'"  data-dc="'.$diachi.'" data-kg="'.$row[0].'" data-ts="'.$row[1].'" data-ngay="'.$ngay.'" data-gia="'.$row[$i].'"><label for="'.$checkbox.'" class="checkbox-label">'.number_format($row[$i],0,'.',',').' đ</label></td>';
                                                $checkbox++;
                                            }
                                            
                                            // print_r($ngaydat);
                                            // echo "<td><a href='?page=order&tt=".$row[0]."_".$row[1]."_".$ngay."_".$row[$i]."'><button class='btn btn-custom' name='".$ngay."'>".number_format($row[$i],0,'.',',')." đ</button> </a></td>";   
                                        
                                    } 
                                    
                                }
                                echo "</tr>";
                                $ngaydat=[];
                               
                            }
                    }else{
                        echo "<tr><td colspan = '9'>Tuần này đã qua</td></tr>";
                    }
                    header("Cache-Control: no-cache, must-revalidate"); // Khi từ trang order "click to go back" về trang lichdatsan thì dữ liệu đã chọn vẫn còn
                    
                ?>
                
            </tbody>
        </table>
        
    </div>
</form>
    
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.onload = function() {
        var checkbox = document.getElementById('yourCheckboxId');
        checkbox.checked = false;
    };
$(document).ready(function () {
        var tongtien = 0;
        var stt = 1;
        function updateLocalStorage() {
            const rows = [];
            $('#DaChon tr').each(function () {
                const cells = $(this).find('td');
                rows.push({
                    diachi: cells.eq(0).text().trim(),
                    khunggio: cells.eq(1).text().trim(),
                    tensan: cells.eq(2).text().trim(),
                    ngay: cells.eq(3).text().trim(),
                    gia: parseInt(cells.eq(4).text().replace(/\D/g, '')) // Chuyển giá trị tiền thành số nguyên
                });
            });
            localStorage.setItem('datachecked', JSON.stringify(rows));
            localStorage.setItem('tongtien', tongtien);
        }
        
        $('.checkbox-input').change(function () {
            var diachi = $(this).data('dc').toString().trim();   // Lấy địa chỉ và loại bỏ khoảng trắng
            var khunggio = $(this).data('kg').toString().trim();   // Lấy khung giờ và loại bỏ khoảng trắng
            var tensan = $(this).data('ts').toString().trim();   // Lấy tên sân
            var ngay = $(this).data('ngay').toString().trim(); // Lấy thời gian
            var gia = parseInt($(this).data('gia')); // Lấy giá

            if ($(this).is(':checked')) {
                tongtien += gia;
                // Nếu checkbox được chọn, thêm thông tin vào bảng
                $('#DaChon').append(
                    '<tr>' +
                    '<td>' + stt + '</td>' +
                    '<td>' + khunggio + '</td>' +
                    '<td>' + tensan + ' </td>' +
                    '<td>' + ngay + '</td>' +
                    '<td>' + gia.toLocaleString() + ' đ</td>' +
                    '</tr>'
                    
                );
                stt++;
                if ($('#order').find('button').length === 0) { // Kiểm tra nút chưa tồn tại
                    $('#order').append(
                        "<button type='submit' class='btn btn-info' name='sub' >Đặt sân</button>"
                    );
                }
            } else {
                tongtien -= gia;
                // Nếu bỏ chọn checkbox, xóa thông tin tương ứng
                $('#DaChon tr').filter(function () {
                    return $(this).find('td').eq(1).text().trim() === khunggio &&
                        $(this).find('td').eq(2).text().trim() === tensan &&
                        $(this).find('td').eq(3).text().trim() === ngay &&
                        parseInt($(this).find('td').eq(4).text().replace(/\D/g, '')) === gia; // Chuyển giá trị tiền thành số nguyên
                }).remove();
                
                if ($('#DaChon tr').length === 0) { // Nếu không còn hàng nào trong bảng
                    $('#order').find('button').remove(); // Xóa nút Order
                    stt = 1;
                }
            }
            

            
            // Cập nhật tổng tiền
            $('#tongtien').text(tongtien.toLocaleString() + ' đ');
            updateLocalStorage();
        });
});

</script>
<?php
    if(isset($_REQUEST["sub"])){
        $_SESSION["TTHD"] = [];
        if(isset($_REQUEST["chondatsan"])){
            $_SESSION["TTHD"] = $_REQUEST["chondatsan"];
            header("Location: ?page=order&masan=$diachi");
            ob_end_flush();
            exit();
        }
    }
?>