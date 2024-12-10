<?php
    if(!isset($_SESSION["chusan"])){
        header("Location: ?page=chusan");
    }

$diachi = $_REQUEST["madd"];
$masanurl = $_REQUEST["mas"];
$p = new controller();
    $kiemtramaddcuacs = $p->getktsohuusan($diachi,$masanurl);
    if($kiemtramaddcuacs){
        $tbl = $p->getselectkhunggio();
        $dsdatsan = $p -> getselectsan($masanurl);
        if($dsdatsan){
            while($r = $dsdatsan->fetch_assoc()){
                $tensan1 = $r["TenSan"];
                $tenloaisan = $r["TenLoaiSan"];
            }
        }else{
            echo "error";
        }
        if($tbl===-1){
            echo "Không có";
        }elseif(!$tbl){
            echo "Hiện tại địa chỉ sân chưa mở cửa hoạt động";
        }else{
            $d = 0;
            $dem = 0;
            $lich = [];
            $giatheothu = [];
            $giatheongay = [];
            echo "<table width='100%' align='center'>";
            while($r = $tbl->fetch_assoc()){
                $makhunggio = $r["MaKhungGio"];
                
                // $makhunggio = $r["KhungGio"];
                if($makhunggio > $d ){
                    $d = $makhunggio;
                    $khunggio = $makhunggio."_".$r["TenKhungGio"];
                    // $khunggio = $d. "_" .$r["TenKhungGio"];
                    for($i=1; $i<8; $i++){
                        $tblgia = $p->getselectsanbykhunggio_san_thu($makhunggio,$masanurl ,$i); 
                        // $giatheothu[] = $tblgia;
                        if($tblgia){
                            while($rn=$tblgia->fetch_assoc()){
                                if($rn["Ngay"]==NULL){
                                    $giatheothu[] = $rn["Gia"];
                                }else{
                                    $giatheongay[] = [$rn["MaSan"],$rn["TenSan"],$rn["Gia"],$rn["KhungGio"],$rn["TenKhungGio"],$rn["Ngay"],$i];
                                }
                            }
                        }
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
                            // $tensan = $masanurl;
                            $tensan = $tensan1 . " - (".$tenloaisan.")";
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
            };
            
            echo "</table>";
            
        }
    }else{
        header("Location: ?page=quanlysan");
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

    
    //xử lý tự động xoá những ngày đã qua
    $psgk  = new csan_gia_thu_khunggio();
    $ngayhomnayDATETIME = date('Y-m-d H:i:s');
    $ngayhomnayDATE = date('Y-m-d');
    // $ngaykiemtrahuy = date('Y-m-d H:i:s', strtotime('+3 days', strtotime($ngayhomnayDATETIME)));
    $sgtktheon = $psgk->getthongtinsan_gia_thu_khunggiotheongay($masanurl);
    if($sgtktheon){
        if($sgtktheon->num_rows>0){
            while($rldds = $sgtktheon->fetch_assoc()){
                // echo $rldds["Ngay"];
                if(strtotime($ngayhomnayDATE) > strtotime($rldds["Ngay"])){
                    foreach($giatheongay as $gtn => $dong){ //[$rn["MaSan"],$rn["TenSan"],$rn["Gia"],$rn["KhungGio"],$rn["TenKhungGio"],$rn["Ngay"],$i];
                        if(strtotime($dong[5])==strtotime($rldds["Ngay"])){
                            $xoasgtktheon = $psgk->getdeletesgtktheon($dong[0],$dong[2],$dong[3],$dong[6],$dong[5]);//MaSan,Gia,KhungGio,MaThu,Ngay
                        }
                    }
                }
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
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
            top: 55px;
            background-color:cadetblue;
            z-index: 10;
        }
        .table, .lichkhac thead th {
            /* position: sticky; */
            /* top: 55px; */
            background-color:maroon;
            z-index: 1;
            color:#fff;
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
        /* tr:hover{
            background-color: darkcyan;
        } */
    </style>
</head>
<body>
<div class="section_phu">
<form action="" method="post">
    <div class="container mt-5 mb-5 p-3">
        <div class="row justify-content-center">
            <div class="col-md-6" >
                <table class="table lichkhac"  style="text-align:center;">
                    <h4>Những ngày có giá khác</h4>
                    <thead>
                        <th>Khung giờ</th>
                        <th>Tên sân</th>
                        <th>Ngày</th>
                        <th>Giá</th>
                        <th>Giá</th>
                    </thead>
                    <tbody>
                        <?php
                        if(sizeof($giatheongay)>0){
                             // print_r($giatheongay);
                            foreach($giatheongay as $gtn => $dong){//[$rn["MaSan"],$rn["TenSan"],$rn["Gia"],$rn["KhungGio"],$rn["TenKhungGio"],$rn["Ngay"],$i];
                                $formatngay = date("d-m-Y",strtotime($dong[5]));//MaSan,Gia,KhungGio,MaThu,Ngay
                                echo '<form method="post">
                                        <input type="hidden" name="txtMaSan" value="'.$dong[0].'">
                                        <input type="hidden" name="txtGia" value="'.$dong[2].'">
                                        <input type="hidden" name="txtKhungGio" value="'.$dong[3].'">
                                        <input type="hidden" name="txtMaThu" value="'.$dong[6].'">
                                        <input type="hidden" name="txtNgay" value="'.$dong[5].'">
                                        <tr>
                                            <td>'.$dong[4].'</td>
                                            <td>'.$dong[1].'</td>
                                            <td>'.$formatngay.'</td>
                                            <td>'.number_format($dong[2],0,".",",").' đ</td>
                                            <td><button type="submit" name="XoaNgayCoGiaKhac" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn Xoá?\')">Xoá</button></td>
                                        </tr>
                                    </form>
                                ';
                            }
                            // print_r($giatheongay);
                        }else{
                            echo "";
                        }
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>
            <div class="col-md-6" >
                <table class="table"  style="text-align:center;">
                    <h4>Giá bạn đã chọn</h4>
                    <thead>
                        <th>STT</th>
                        <th>Khung giờ</th>
                        <th>Tên sân</th>
                        <th>Thứ</th>
                        <th>Giá</th>
                    </thead>
                    <tbody id="DaChon">

                 </tbody>
                    <tr>
                        <td colspan="5" id="order">
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="container mt-5">
        <?php
            echo '<div class="row d-flex align-items-center mb-1"><h2 >Chọn giá bạn muốn thay đổi</h2>
            <i >Giá này sẽ mặc định cho các tuần sau đó. Nếu bạn muốn thay đổi giá theo ngày thì bấm <a class="btn btn-success" href="?page=themngaycogiakhac&madd='.$diachi.'&mas='.$masanurl.'">vào đây</a></i></div>';
           
        ?>
        <table class="table table-hover table-bordered" style="text-align:center;">
            <thead>
                <tr>
                    <th>Giờ</th>
                    <th>Sân</th>
                    <!-- Vòng lặp để tự động hiển thị các thứ trong tuần -->
                    <?php 
                        $j = 0;
                        foreach ($weekDays as $day) {
                            echo "<th>" . $thu[$j] . "</th>";
                            $j++;
                        }
                    ?>
                    
                </tr>
            </thead>
            <tbody>
                <div id="ketqua"></div>
                <?php
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
                                
                            // mảng 2 chiều $lich như sau
                            //Array ( 
                                    // [0] => Array ( [0] => 7h-8h30    [1] => 1-Sân số 1 (Sân 5)   [2] => 100000   [3] => 100000   [4] => 100000   [5] => 100000   [6] => 100000   [7] => 200000   [8] => 200000 ) 
                                    // [1] => Array ( [0] => 7h-8h30    [1] => 2-Sân số 2 (Sân 7)   [2] => 100000   [3] => 100000   [4] => 100000   [5] => 100000   [6] => 100000   [7] => 200000   [8] => 200000 ) 
                                    // [2] => Array ( [0] => 7h-8h30    [1] => 3-Sân số 3 (Sân 11)  [2] => 100000   [3] => 100000   [4] => 100000   [5] => 100000   [6] => 100000   [7] => 200000   [8] => 200000 ) 
                                    // [3] => Array ( [0] => 7h-8h30    [1] => 4-Sân số 4 (Sân 5)   [2] => 100000   [3] => 100000   [4] => 100000   [5] => 100000   [6] => 100000   [7] => 200000   [8] => 200000 ) 
                                    // [4] => Array ( [0] => 7h-8h30    [1] => 5-Sân số 5 (Sân 11)  [2] => 100000   [3] => 100000   [4] => 100000   [5] => 100000   [6] => 100000   [7] => 200000   [8] => 200000 ) 
                                    // [5] => Array ( [0] => 9h-10h30   [1] => 1-Sân số 1 (Sân 5)   [2] => 100000   [3] => 100000   [4] => 100000   [5] => 100000   [6] => 100000   [7] => 200000   [8] => 200000 )  
                                // )
                            $time_counts = array_count_values($duplicate_times);
                            $tam = [];
                            $mausac = 0;
                            foreach ($lich as $index => $row) { 
                                $catkhunggio = explode("_", $row[0]);
                                echo "<tr>";
                                // Kiểm tra nếu thời gian của hàng này khác với thời gian của hàng trước
                                if (in_array($catkhunggio[1],$duplicate_times) && !in_array($catkhunggio[1],$tam)) {
                                    foreach($time_counts as $timecount => $dem1){
                                        if($catkhunggio[1]==$timecount){
                                            $dem = $dem1;
                                        }
                                    }
                                    // Màu sắc cho column giờ
                                    if($mausac==0){
                                        echo "<td rowspan='".$dem + 1 ."' style='background-color: #ddd;'>{$catkhunggio[1]}</td>";
                                        $mausac++;
                                    }else{
                                        echo "<td rowspan='".$dem + 1 ."' style='background-color: silver;'>{$catkhunggio[1]}</td>";
                                        $mausac = 0;
                                    }
                                    $tam[] = $catkhunggio[1];
                                }elseif(in_array($catkhunggio[1],$tam)){
                                    echo "";
                                }else{
                                    // Màu sắc cho column giờ
                                    if($mausac==0){
                                        echo "<td style='background-color: #ddd;'>{$catkhunggio[1]}</td>";
                                        $mausac++;
                                    }else{
                                        echo "<td style='background-color: silver;'>{$catkhunggio[1]}</td>";
                                        $mausac = 0;
                                    }
                                }
                                // Second column: Field
                                $parts = explode("-", $row[1]);
                                // $parts1 = explode("_", $row[0]);
                                $ms = $parts[0];
                                // $mkg = $parts1[0];
                                // echo "<td>{$parts[1]}</td>";
                                echo "<td>{$row[1]}</td>";
                                for ($i = 2; $i < count($row); $i++) {// duyệt mảng bắt đầu từ phần tử thứ 2 trở về sau để lấy giá
                                    echo '<td><input type="checkbox" name="chondatsan[]" value="'.$diachi.'_'.$row[0].'_'.$masanurl.'_'.$row[1].'_'.$row[$i].'_'.$i.'" class="checkbox-input d-none" id="'.$checkbox.'"  data-dc="'.$diachi.'" data-kg="'.$catkhunggio[1].'" data-ts="'.$row[1].'" data-gia="'.$row[$i].'" data-thu="'.$i.'"><label for="'.$checkbox.'" class="checkbox-label">'.number_format($row[$i],0,'.',',').' đ</label></td>';
                                    $checkbox++;
                                }
                                echo "</tr>";
                            }
                            
                    header("Cache-Control: no-cache, must-revalidate"); // Khi từ trang order "click to go back" về trang lichdatsan thì dữ liệu đã chọn vẫn còn
                ?>
            </tbody>
        </table>
        
    </div>
</form>
</div>
</body>
</html>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->
<script>
    // window.onload = function() {
    //     var checkbox = document.getElementById('yourCheckboxId');
    //     checkbox.checked = false;
    // };
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
                    thu: cells.eq(3).text().trim(),
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
            var thu = $(this).data('thu').toString().trim(); // Lấy thời gian
            var gia = parseInt($(this).data('gia')); // Lấy giá

            if ($(this).is(':checked')) {
                tongtien += gia;
                // Nếu checkbox được chọn, thêm thông tin vào bảng
                $('#DaChon').append(
                    '<tr>' +
                    '<td>' + stt + '</td>' +
                    '<td>' + khunggio + '</td>' +
                    '<td>' + tensan + ' </td>' +
                    '<td>' + thu + '</td>' +
                    '<td>' + gia.toLocaleString() + ' đ</td>' +
                    '</tr>'
                    
                );
                stt++;
                if ($('#order').find('button').length === 0) { // Kiểm tra nút chưa tồn tại
                    $('#order').append(
                        "<button type='submit' class='btn btn-info' name='sub' >Thay đổi</button>"
                    );
                }
            } else {
                tongtien -= gia;
                // Nếu bỏ chọn checkbox, xóa thông tin tương ứng
                $('#DaChon tr').filter(function () {
                    return $(this).find('td').eq(1).text().trim() === khunggio &&
                        $(this).find('td').eq(2).text().trim() === tensan &&
                        $(this).find('td').eq(3).text().trim() === thu &&
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
            header("Location: ?page=suagiasan&madd=$diachi&mas=$masanurl");
            ob_end_flush();
            exit();
        }
    }

    if(isset($_REQUEST["XoaNgayCoGiaKhac"])){
        $txtMaSan = $_REQUEST["txtMaSan"];
        $txtGia = $_REQUEST["txtGia"];
        $txtKhungGio = $_REQUEST["txtKhungGio"];
        $txtMaThu = $_REQUEST["txtMaThu"];
        $txtNgay = $_REQUEST["txtNgay"];
        $xoadachon = $psgk->getdeletesgtktheon($txtMaSan,$txtGia,$txtKhungGio,$txtMaThu,$txtNgay);//MaSan,Gia,KhungGio,MaThu,Ngay
        if($xoadachon){
            header("Location: ?page=xemchitietsan&madd=".$diachi."&mas=".$masanurl."");
        }else{
            echo "<script>alert('Xoá không thành công');</script>";
        }
        
    }

?>
