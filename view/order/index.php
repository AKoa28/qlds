
<div id="khongchobam">

</div>
<?php

    $madiadiem = $_REQUEST["masan"];
    $pdc = new controller();
    $tbldc = $pdc->getdiadiemsantheomadiadiem($madiadiem);
    if($tbldc){
        while($r=$tbldc->fetch_assoc()){
            $tendiadiem = $r["TenDiaDiem"];
            $diachidd= $r["DiaChi"];
        }
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if (isset($_SESSION["TTHD"])) {
        $dachon = $_SESSION["TTHD"];
        $tongtien = 0;
        // print_r($dachon);
        if(isset($_SESSION["dangnhap"]) || isset($_SESSION["chusan"]) || isset($_SESSION["nhanvien"])){
            echo '
            <div class="container p-5 section_phu">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mb-5" style="text-align:center;">Thông tin đặt sân</h1>
                        <form method="POST">
                            <table class="table"  style="text-align:center;">
                                <thead class="table-success">
                                    <tr>
                                    <th>Mã sân</th>
                                    <th>Khung giờ</th>
                                    <th>Tên sân</th>
                                    <th>Ngày đặt</th>
                                    <th>Giá</th>
                                    <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
            ';
        
            for ($i = 0; $i < sizeof($dachon); $i++) {
                        $thongtin = $dachon[$i];
                        $parts = explode("_", $thongtin);
                        $diachi = $parts[0];
                        $partsMS = explode("-", $parts[2]);
                        $ms = $partsMS[0];
                        $khunggio = $parts[1];
                        $tensan = $partsMS[1];
                        $ngay = $parts[3];
                        $gia = (int)$parts[4];
                
                        echo '<tr><td>' . $ms . '</td>';
                        echo '<td>' . $khunggio . '</td>';
                        echo '<td>' . $tensan . '</td>';
                        echo '<td>' . $ngay . '</td>';
                        echo '<td class="gia">' . number_format($gia, 0, ".", ",") . ' đ</td>';
                        echo '<td><a href="?page=order&masan='.$madiadiem.'&xoa='.$i.'" class="btn btn-danger btn-xoa">Xoá</a></td></tr>';
                        $tongtien += $gia;
                    }
                echo '          </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="table-Warning"><b>Thành tiền:</b> </td>
                                        <td class="table-Warning"><b id="capnhatgia">'.number_format($tongtien, 0, ".", ",").' đ</b></td>
                                        <td>';
                //Kiểm tra array session rỗng hay không
                if(empty($_SESSION["TTHD"])){
                    echo '<a href="?page=lichdatsan&masan='.$madiadiem.'"><button type="button" class="btn btn-danger">Quay lại trang lịch sân</button></a>';
                }else{
                    echo '<button type="submit" name="datsan" class="btn btn-info">Đặt sân</button>';
                }
                
                echo '                  </td>
                                        
                                    </tr>
                                </tfoot>
                            </table>
                        </form> 
                    </div>
                </div>
            </div>
            ';
        }else{
            echo '
            <div class="container section_phu">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mb-5" style="text-align:center;">Thông tin đặt sân</h1>
                        <form method="POST" class="row justify-content-center" id="datsan">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="ten" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Tên</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="sdt" id="sdt" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Số điện thoại</label>
                                <span id="errSDT" class="err text-danger"> </span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Email</label>
                            </div>
                        </div> 
                        <div class="col-md-10">
                            <table class="table"  style="text-align:center;">
                                <thead class="table-success">
                                    <tr>
                                    <th>Mã sân</th>
                                    <th>Khung giờ</th>
                                    <th>Tên sân</th>
                                    <th>Ngày đặt</th>
                                    <th>Giá</th>
                                    <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
            ';
        
            for ($i = 0; $i < sizeof($dachon); $i++) {
                        $thongtin = $dachon[$i];
                        $parts = explode("_", $thongtin);
                        $diachi = $parts[0];
                        $partsMS = explode("-", $parts[2]);
                        $ms = $partsMS[0];
                        $khunggio = $parts[1];
                        $tensan = $partsMS[1];
                        $ngay = $parts[3];
                        $gia = (int)$parts[4];
                
                        echo '<tr><td>' . $ms . '</td>';
                        echo '<td>' . $khunggio . '</td>';
                        echo '<td>' . $tensan . '</td>';
                        echo '<td>' . $ngay . '</td>';
                        echo '<td class="gia">' . number_format($gia, 0, ".", ",") . ' đ</td>';
                        echo '<td><a href="?page=order&masan='.$madiadiem.'&xoa='.$i.'" class="btn btn-danger btn-xoa">Xoá</a></td></tr>';
                        $tongtien += $gia;
                    }
                echo '          </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="table-Warning"><b>Thành tiền:</b> </td>
                                        <td class="table-Warning"><b id="capnhatgia">'.number_format($tongtien, 0, ".", ",").' đ</b></td>
                                        <td>';
                //Kiểm tra array session rỗng hay không
                if(empty($_SESSION["TTHD"])){
                    echo '<a href="?page=lichdatsan&masan='.$madiadiem.'"><button type="button" class="btn btn-danger">Quay lại trang lịch sân</button></a>';
                }else{
                    echo '<button type="submit" name="datsan" class="btn btn-info">Đặt sân</button>';
                }
                
                echo '                  </td>
                                        
                                    </tr>
                                </tfoot>
                            </table>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            ';
        }

    // print_r($_SESSION["TTHD"]);
    }elseif(isset($_SESSION["TTDS"])){ //trường hợp xoá
        echo '
            <div class="container p-5 section_phu">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mb-5" style="text-align:center;">Thông tin đặt sân</h1>
                        <form method="POST">
                            <table class="table"  style="text-align:center;">
                                <thead class="table-success">
                                    <tr>
                                        <th>Mã sân</th>
                                        <th>Tên sân</th>
                                        <th>Ngày thuê</th>
                                        <th>Ngày đặt</th>
                                        <th>Giờ bắt đầu</th>
                                        <th>Giờ kết thúc</th>
                                        <th>Giá</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    '; 
                                    $total = 0;
                                    $tongtien = 0;
                                    $dem =0;
                                //Array ( [0] => Mã sân [1] => Mã khách hàng [2] => Ngày lập hoá đơn [3] => Tổng tiền [4] => Mã địa điểm [5] => Ngày thuê  [6] => Giờ bắt đầu [7] => Giờ kết thúc [8] => Tên sân ) 
                                foreach($_SESSION["TTDS"] as $ttds => $pt){
                                    
                                    echo'<tr>
                                            <td>'.$pt[0].'</td>
                                            <td>'.$pt[8].'</td>
                                            <td>'.$pt[5].'</td>
                                            <td>'.$pt[2].'</td>
                                            <td>'.$pt[6].'</td>
                                            <td>'.$pt[7].'</td>
                                            <td>'.number_format($pt[3],0,".",",").' đ</td>
                                            <td><a href="?page=order&masan='.$madiadiem.'&xoatheongay='.$dem.'" class="btn btn-danger btn-xoa">Xoá</a></td></tr>
                                            </tr> ';
                                    $dem++;
                                    $tongtien += $pt[3];
                                }
                                    
                                
        // print_r($tenkhunggio);
        // echo $giobatdau;
        // echo $gioketthuc;
        echo '                        
                                </tbody>  
                                <tfoot>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan=""><b>Thành tiền</b></td>
                                        <td colspan=""><b>'.number_format($tongtien,0,".",",").' đ</b></td> ';          
                                if(empty($_SESSION["TTDS"])){
                                    echo '<td colspan=""><a href="?page=datsantheongay&masan='.$madiadiem.'"><button type="button" class="btn btn-danger">Quay lại trang lịch sân</button></a></td>';
                                }else{
                                    echo '<td colspan=""><button type="submit" name="subdstn" class="btn btn-info">Đặt sân</button></td>';
                                }
        echo '                      </tr>
                                </tfoot>
                            </table>
                        </form> 
                    </div>
                </div>
            </div>
            ';
        $_SESSION["total"] = $tongtien;
        // print_r($_SESSION["TTDS"]);
    }
    
    // bấm nút xoá thì sẽ tiến hành xoá phần tử tương ứng trong mảng session["TTHD"] 
    if (isset($_GET['xoa'])) { 
        $id = $_GET['xoa'];
        // Kiểm tra chỉ số hợp lệ trước khi xóa
        if (isset($_SESSION["TTHD"][$id])) {
            unset($_SESSION["TTHD"][$id]);
            // Cập nhật lại mảng sau khi xóa
            $_SESSION["TTHD"] = array_values($_SESSION["TTHD"]);
            
        }
        // Chuyển hướng để làm mới trang và tránh việc gửi lại form
        header("Location: ?page=order&masan=$madiadiem");
        exit;
    }
    if (isset($_GET['xoatheongay'])) { 
        // echo "<script>alert('tới day')</script>";
        // print_r($_SESSION["TTDS"]);
        $id = $_GET['xoatheongay'];
        // print_r($_SESSION["TTDS"][$id]);
        // Kiểm tra chỉ số hợp lệ trước khi xóa
        if (isset($_SESSION["TTDS"][$id])) {
            unset($_SESSION["TTDS"][$id]);
            // Cập nhật lại mảng sau khi xóa
            $_SESSION["TTDS"] = array_values($_SESSION["TTDS"]);
            
        }
        // Chuyển hướng để làm mới trang và tránh việc gửi lại form
        header("Location: ?page=order&masan=$madiadiem");
        exit;
    }
    if(isset($_REQUEST["datsan"])){
        if(isset($_SESSION["dangnhap"])){//đặt sân cho có tài khoản
            $makhachhang = $_SESSION["dangnhap"];
            $ngaydat = date("Y-m-d H:i:s");
            $trangthai = "Ưu tiên";
            $total = $tongtien;
            $diadiem = $madiadiem;
            $themdatsan = new cdatsan();
            $tblthemdatsan = $themdatsan->getinsertdatsankhachvl($makhachhang,$ngaydat,$trangthai,$tongtien,$diadiem);
            if($tblthemdatsan){
                $mail = new sendmail();
                $mail -> guithongtindatsan($_SESSION["emailkhachhang"],$_SESSION["tenkhachhang"], $_SESSION["TTHD"], $ngaydat, $tendiadiem, $diachidd);
                unset($_SESSION["TTHD"]);
                echo "<script>alert('Yêu cầu đặt sân thành công, Chờ xét duyệt.');</script>";
                header("refresh:0 url ='?page=lichdatsan&masan=$diadiem'");
                ob_end_flush();
                exit();
            }else{
                echo "<script>alert('thất bại');</script>";
            }
        }elseif(isset($_SESSION["chusan"])){//đặt sân cho có tài khoản
            $machusan = $_SESSION["chusan"];
            $ptk = new ctaikhoan(); 
            $tblmakhachhang = $ptk->getmakhachhangcuachusan($machusan);
            $ngaydat = date("Y-m-d H:i:s");
            $trangthai = "Ưu tiên";
            $total = $tongtien;
            $diadiem = $madiadiem;
            $themdatsan = new cdatsan();
            $tblthemdatsan = $themdatsan->getinsertdatsankhachvl($tblmakhachhang,$ngaydat,$trangthai,$tongtien,$diadiem);
            if($tblthemdatsan){
                $mail = new sendmail();
                $mail -> guithongtindatsan($_SESSION["emailchusan"],$_SESSION["ten"], $_SESSION["TTHD"], $ngaydat, $tendiadiem, $diachidd);
                unset($_SESSION["TTHD"]);
                echo "<script>alert('Yêu cầu đặt sân thành công, Chờ xét duyệt.');</script>";
                header("refresh:0 url ='?page=lichdatsan&masan=$diadiem'");
                ob_end_flush();
                exit();
            }else{
                echo "<script>alert('thất bại');</script>";
            }
        }elseif(isset($_SESSION["nhanvien"])){//đặt sân cho có tài khoản
            $manhanvien = $_SESSION["nhanvien"];
            $ptk = new ctaikhoan(); 
            $tblmakhachhang = $ptk->getmakhachhangcuanhanvien($manhanvien);
            $ngaydat = date("Y-m-d H:i:s");
            $trangthai = "Ưu tiên";
            $total = $tongtien;
            $diadiem = $madiadiem;
            $themdatsan = new cdatsan();
            $tblthemdatsan = $themdatsan->getinsertdatsankhachvl($tblmakhachhang,$ngaydat,$trangthai,$tongtien,$diadiem);
            if($tblthemdatsan){
                $mail = new sendmail();
                $mail -> guithongtindatsan($_SESSION["emailnhanvien"],$_SESSION["ten"], $_SESSION["TTHD"], $ngaydat, $tendiadiem, $diachidd);
                unset($_SESSION["TTHD"]);
                echo "<script>alert('Yêu cầu đặt sân thành công, Chờ xét duyệt.');</script>";
                header("refresh:0 url ='?page=lichdatsan&masan=$diadiem'");
                ob_end_flush();
                exit();
            }else{
                echo "<script>alert('thất bại');</script>";
            }
        }else{//đặt sân khách vãng lai
            $ten = $_REQUEST["ten"];
            $sdt = $_REQUEST["sdt"];
            $email = $_REQUEST["email"];
            $trung = new ctaikhoan;
            $tbltrungsdt = $trung -> getselecttrungsdt($sdt);
            $tbltrungemail = $trung -> getselecttrungemail($email);
            if($tbltrungsdt->num_rows > 0 && $tbltrungemail->num_rows > 0){ // trường hợp trùng sdt và trùng email đều trả về có kết quả 
                while($ro1 = $tbltrungsdt->fetch_assoc()){
                    $pass1 = $ro1["MatKhau"];
                    $email1 = $ro1["Email"]; // lấy ra email của sdt được kiểm tra (@)
                    $makhachhangcosan = $ro1["MaKhachHang"];
                }
                if($email == $email1){ //trường hợp nếu email của khách nhập == (@)
                    if($pass1 != ""){ // trường hợp pass có giá trị là khách có tài khoản
                        echo "<script>alert('Số điện thoại và Email đã đăng ký vui lòng đăng nhập');</script>";
                        header("refresh:0 url ='?dangnhap'");
                        ob_end_flush();
                        exit();
                    }else{ // trường hợp pass rỗng là khách vãng lai
                        // echo "<script>alert('thanhcong');</script>";
                        $ngaydat = date("Y-m-d H:i:s");
                        $trangthai = "Chờ duyệt";
                        $trangthaikhach = "Vãng lai";
                        $total = $tongtien;
                        $diadiem = $madiadiem;
                        $themdatsan = new cdatsan();
                        $tblthemdatsan = $themdatsan->getinsertdatsankhachvl($makhachhangcosan,$ngaydat,$trangthai,$tongtien,$diadiem);
                        if($tblthemdatsan){
                            $mail = new sendmail();
                            $mail -> guithongtindatsan($email,$ten, $_SESSION["TTHD"], $ngaydat, $tendiadiem, $diachidd, $trangthaikhach);
                            unset($_SESSION["TTHD"]);
                            echo "<script>alert('Yêu cầu đặt sân thành công, Chờ xét duyệt.');</script>";
                            header("refresh:0 url ='?page=lichdatsan&masan=$diadiem'");
                            ob_end_flush();
                            exit();
                        }else{
                            echo "<script>alert('thất bại');</script>";
                        }
                        
                    }
                }else{ //trường hợp nếu sdt khách nhập != (*) && email của khách nhập != (@)
                    echo "<script>alert('Số điện thoại và Email đã tồn tại');</script>";
                }
            }elseif($tbltrungsdt->num_rows > 0 && $tbltrungemail->num_rows == 0){ // trường hợp trùng sdt trả về có kết quả và trùng email không có kết quả 
                echo "<script>alert('Số điện thoại đã được đăng ký.');</script>";
            }elseif($tbltrungsdt->num_rows == 0 && $tbltrungemail->num_rows > 0){ // trường hợp trùng sdt không có kết quả và trùng email trả về có kết quả
                echo "<script>alert('Email đã được đăng ký.');</script>";
            }else{ //Trường hợp không trùng sdt và email
                // echo "<script>alert('thanhcong');</script>";
                $ngaydat = date("Y-m-d H:i:s");
                $trangthai = "Chờ duyệt";
                $trangthaikhach = "Vãng lai";
                $total = $tongtien;
                $diadiem = $madiadiem;
                $TK_khachvanglai = new cnguoidung();
                $tblkhachvanglai = $TK_khachvanglai->getinsertkhachvanglai($ten,$sdt,$email,$trangthaikhach);
                if($tblkhachvanglai){
                    $makh = $tblkhachvanglai;
                    $themdatsan = new cdatsan();
                    $tblthemdatsan = $themdatsan->getinsertdatsankhachvl($makh,$ngaydat,$trangthai,$tongtien,$diadiem);
                    if($tblthemdatsan){
                        $mail = new sendmail();
                        $mail -> guithongtindatsan($email,$ten, $_SESSION["TTHD"], $ngaydat, $tendiadiem, $diachidd, $trangthaikhach);
                        echo "<script>alert('Yêu cầu đặt sân thành công, Chờ xét duyệt');</script>";
                        header("refresh:0 url ='?page=lichdatsan&masan=$diadiem'");
                    }else{
                        echo "<script>alert('thất bại');</script>";
                    }
                }else{
                    echo "<script>alert('error');</script>";
                }
            }
        }
    }elseif(isset($_REQUEST["subdstn"])){
        //Array ( [0] => Mã sân [1] => Mã khách hàng [2] => Ngày lập hoá đơn [3] => Tổng tiền [4] => Mã địa điểm [5] => Ngày thuê  [6] => Giờ bắt đầu [7] => Giờ kết thúc  [8] => Tên sân ) 
        $themdatsan = new cdatsan();
        if($_SESSION["total"]!=0){
            $total = $_SESSION["total"] ;
            $ngaydat = date("Y-m-d H:i:s");
            $tblthemdatsan = $themdatsan->getinsertdatsantheongay($total);
            //Array ( 
            //[0] => Array ( [0] => 1 [1] => [2] => 2024-11-25 18:10:33 [3] => 2400000 [4] => 1 [5] => 2024-11-26 [6] => 7:00 [7] => 22:30 [8] => Sân số 1 ) 
            //[1] => Array ( [0] => 2 [1] => [2] => 2024-11-25 18:10:33 [3] => 900015 [4] => 1 [5] => 2024-11-26 [6] => 7:00 [7] => 22:30 [8] => Sân số 2 ) )
            if($tblthemdatsan){
                $mail = new sendmail();
                if(isset($_SESSION["emailnhanvien"])){
                    $mail -> guithongtindatsantheongay($_SESSION["emailnhanvien"],$_SESSION["ten"], $_SESSION["TTDS"], $ngaydat, $tendiadiem, $diachidd);
                }elseif(isset($_SESSION["emailchusan"])){
                    $mail -> guithongtindatsantheongay($_SESSION["emailchusan"],$_SESSION["ten"], $_SESSION["TTDS"], $ngaydat, $tendiadiem, $diachidd);
                }else{
                    $mail -> guithongtindatsantheongay($_SESSION["emailkhachhang"],$_SESSION["tenkhachhang"], $_SESSION["TTDS"], $ngaydat, $tendiadiem, $diachidd);
                }
                unset($_SESSION["TTDS"]);
                unset($_SESSION["total"]);
                echo "<script>alert('Yêu cầu đặt sân thành công, Chờ xét duyệt.');</script>";
                header("refresh:0 url ='?page=lichdatsan&masan=$madiadiem'");
                ob_end_flush();
                exit();
            }else{
                echo "<script>alert('thất bại');</script>";
            }
        }else{
            echo "<script>alert('Yêu cầu đặt sân thất bại, Sân này chưa được mở.');</script>";
            header("refresh:0 url ='?page=chitietdiachisan&masan=$madiadiem'");
        }
        
    }
?>
               
<script>
    function hienthi() {
            // Hiển thị lớp phủ để chặn tương tác
        document.getElementById("khongchobam").style.display = "block";
    }

    function andi() {
        // Ẩn lớp phủ để kích hoạt lại trang
        document.getElementById("khongchobam").style.display = "none";
    }
    function ktSDT() {
        let sdt = $('#sdt').val();
        let btcq = /^(03|09|08|07|05)[0-9]\d{7}$/;
        if (btcq.test(sdt) || sdt == "") {
            $('#errSDT').html(" ");
            $('#errSDT').addClass('err');
            return true;
        } else {
            $("#errSDT").html("Số điện thoại gồm 10 con số trong đó bắt đầu là 03,05,07,08,09");
            $('#errSDT').addClass('err');
            return false;
        }
    }
    $('#sdt').blur(function (e) {
        ktSDT();
    })
    $(document).ready(function() {
        
    // click nút "Xoá"
        $('.btn-xoa').click(function() {
            $(this).closest('tr').xoa();
            // Cập nhật tổng số tiền sau khi xóa
            capnhatgia();
        });

        function capnhatgia() {
            let total = 0;
            // Lặp qua tất cả các ô chứa giá và tính tổng
            $('td.gia').each(function() {
                total += parseInt($(this).text().replace(',', '').replace('đ', ''));
            });

            // Cập nhật số tiền tổng hiển thị
            $('#capnhatgia').text(total.toLocaleString('vi-VN') + ' đ');
        }

    });
    $('form').on('submit', function(){
        hienthi();
    });
</script>
