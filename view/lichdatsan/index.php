<?php
$diachi = $_REQUEST["masan"];
// include_once("controller/controller.php");
$p = new controller();

$tbl = $p->getselectallsan($diachi);

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
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        table {
            color: #333;
        }
        th, td {
            text-align: center;
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

    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href='?page=lichdatsan&masan=<?=$diachi?>&date=<?=$currentDate?>'><button class='btn btn-primary pr'>Hôm nay</button></a>
            <h3> <?= $startOfWeek." đến ".$endOfWeek; ?></h3>
            <div>
                <a href='?page=lichdatsan&masan=<?=$diachi?>&date=<?=$prevWeek?>'><button class="btn btn-primary">Tuần trước</button></a>
                <a href='?page=lichdatsan&masan=<?=$diachi?>&date=<?=$nextWeek?>'><button class="btn btn-primary">Tuần sau</button></a>
            </div>
        </div>
        
        <table class="table table-bordered">
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
                <?php
                    // Mảng thời gian và thông tin sân (dùng để test)
                    $schedule = [
                        ["05:30", "Sân số 1 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                        ["05:30", "Sân số 2 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                        ["05:30", "Sân số 3 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                        ["05:30", "Sân số 4 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                        ["05:30", "Sân số 1 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                        ["05:30", "Sân số 2 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                        ["05:30", "Sân số 3 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                        ["05:30", "Sân số 4 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                        ["07:00", "Sân số 2 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                        ["08:30", "Sân số 1 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                        ["08:30", "Sân số 2 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                        ["10:00", "Sân số 1 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                        ["10:00", "Sân số 3 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                        ["10:00", "Sân số 2 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                        ["11:30", "Sân số 1 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                        ["11:30", "Sân số 2 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                        ["14:30", "Sân số 1 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                        ["14:30", "Sân số 2 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                        ["16:00", "Sân số 1 (Sân 7)", "700.000 đ", "700.000 đ", "700.000 đ", "700.000 đ", "700.000 đ", "700.000 đ", "700.000 đ"],
                        
                    ];
                    
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
                                }else{
                                    while($rn = $tbldatsan->fetch_assoc()){
                                        $ngaydat[] = date('d-m-Y', strtotime($rn["NgayDat"]));

                                    }
                                }
                            
                            
                            
                            // print_r($ngaydat);
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
                                    if(in_array($ngay,$ngaydat)){
                                        echo "<td></td>";
                                    }else{
                                        echo "<td><a href='?page=order&tt=".$diachi."_".$row[0]."_".$row[1]."_".$ngay."_".$row[$i]."'><button class='btn btn-custom' name='".$ngay."'>".number_format($row[$i],0,'.',',')." đ</button> </a></td>";
                                    }
                                    
                                    // print_r($ngaydat);
                                    // echo "<td><a href='?page=order&tt=".$row[0]."_".$row[1]."_".$ngay."_".$row[$i]."'><button class='btn btn-custom' name='".$ngay."'>".number_format($row[$i],0,'.',',')." đ</button> </a></td>";   
                                } 
                                
                            }
                            echo "</tr>";
                            $ngaydat=[];
                           
                        }
                    
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

