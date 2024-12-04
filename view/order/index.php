
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
        if(isset($_SESSION["dangnhap"])){
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
    }elseif(isset($_REQUEST["subdatsantheongay"])){// đặt sân theo ngày
        $_SESSION["TTDS"]=[];
        $_SESSION["total"]=0;
        $psgtkg = new csan_gia_thu_khunggio();
        $mangsan = $_REQUEST["chonsan"]; 
        // print_r($mangsan);
        foreach($mangsan as $arrsan){
            if(isset($_REQUEST["ngay"])){ //Đặt sân 1 ngày
                // echo $arrsan;
                // $ngaythue = $_REQUEST["ngay"];
                $tongtien = 0;
                $makhunggio = [];
                $tenkhunggio = [];
                // $giobatdau_gioketthuc="";
                $catsan = explode("_",$arrsan);
                $ngaydat = date("Y-m-d H:i:s");
                $chuyensang_mathu = [
                    "Sunday" => "7",
                    "Monday" => "1",
                    "Tuesday" => "2",
                    "Wednesday" => "3",
                    "Thursday" => "4",
                    "Friday" => "5",
                    "Saturday" => "6"
                ];
                $ngaythue  = strtotime($_REQUEST["ngay"]);                 // Chuyển đổi ngày thành timestamp
                $ngaythue_chuyensangthu = date("l",$ngaythue);   // Lấy tên thứ bằng tiếng Anh
                $chuyensangmathu  = $chuyensang_mathu[$ngaythue_chuyensangthu];    // Tra cứu tên thứ bằng bảng mã
                $tblgiatheothuvsmasan = $psgtkg->getgiatheothuvsmasan($catsan[0],$chuyensangmathu);
                $tblkhunggiotheothuvsmasan = $psgtkg->getkhunggiotheothuvsmasan($catsan[0],$chuyensangmathu);
                if($tblgiatheothuvsmasan){
                    while($r = $tblgiatheothuvsmasan->fetch_assoc()){
                        if($r["Ngay"]==""){ // Nếu cột ngày là rỗng
                            $tongtien += $r["Gia"]; 
                        }else{ // nếu cột ngày có giá trị
                            $kiemtratrunggia = $pdc->getselectsanbykhunggio_san_thu($catsan[0],$chuyensangmathu,$r["KhungGio"]); //Kiểm tra trùng mã sân, thứ, khung giờ. Vì nó có 2 giá tiền khác nhau cộng vào sẽ sai giá
                            if($kiemtratrunggia){
                                while($rkttg = $kiemtratrunggia->fetch_assoc()){
                                    if($rkttg["Ngay"] == ""){ // Nếu cột ngày là rỗng thì trừ giá tiền đó ra
                                        $tongtien -= $rkttg["Gia"];
                                    }else{ // ngược lại thì cộng giá đó vào
                                        $tongtien += $rkttg["Gia"]; 
                                    }
                                }
                            }else{
                                echo "Lỗi kiem tra trùng giá 275";
                            }
                        }
                    }
                }else{
                    echo "error";
                }
                if($tblkhunggiotheothuvsmasan){
                    while($r = $tblkhunggiotheothuvsmasan->fetch_assoc()){
                        $makhunggio[] = $r["KhungGio"];
                    }
                    foreach($makhunggio as $rmakg){
                        $tbltenkhunggio = $pdc->getselectkhunggiotheomakg($rmakg);
                        if($tbltenkhunggio){
                            while($rtkg = $tbltenkhunggio->fetch_assoc()){
                                $tenkhunggio[] = $rtkg["TenKhungGio"];
                            }
                        } 
                    }
                    for($i =0;$i < count($tenkhunggio);$i++){
                        $catthoigian = explode("-",$tenkhunggio[$i]);
                        if($i==0){
                            $giobatdau = $catthoigian[0];
                        }else{
                            $gioketthuc = $catthoigian[1];
                        }
                    }
                    //Array ( [0] => Mã sân [1] => Mã khách hàng [2] => Ngày lập hoá đơn [3] => Tổng tiền [4] => Mã địa điểm [5] => Ngày thuê  [6] => Giờ bắt đầu [7] => Giờ kết thúc  [8] => Tên sân ) 
                    if(isset($_SESSION["dangnhap"])){
                        $_SESSION["TTDS"][] = [$catsan[0],$_SESSION["dangnhap"],$ngaydat,$tongtien,$madiadiem,$_REQUEST["ngay"],$giobatdau,$gioketthuc,$catsan[1]];
                    }else{
                        $_SESSION["TTDS"][] = [$catsan[0],"",$ngaydat,$tongtien,$madiadiem,$_REQUEST["ngay"],$giobatdau,$gioketthuc,$catsan[1]];
                    }
                }else{
                    echo "error";
                }
            }else{ //Đặt sân nhiều ngày
                $arrngaythue = [];
                $ngaybatdat = $_REQUEST["ngaybatdau"];
                $ngayketthuc = $_REQUEST["ngayketthuc"];
                $batdau = strtotime($ngaybatdat);
                $ketthuc = strtotime($ngayketthuc);
                while ($batdau <= $ketthuc) {
                    $arrngaythue[] =  date('Y-m-d', $batdau);
                    $batdau = strtotime('+1 day', $batdau); //Lặp qua từng ngày bằng cách tăng timestamp mỗi lần 1 ngày (+1 day).
                }
                // print_r($arrngaythue);
                
                $makhunggio = [];
                $tenkhunggio = [];
                
                // $giobatdau_gioketthuc="";
                $catsan = explode("_",$arrsan);
                $ngaydat = date("Y-m-d H:i:s");
                $chuyensang_mathu = [
                    "Sunday" => "7",
                    "Monday" => "1",
                    "Tuesday" => "2",
                    "Wednesday" => "3",
                    "Thursday" => "4",
                    "Friday" => "5",
                    "Saturday" => "6"
                ];
                $arrgia = [];
                $arrgbtgkt = [];
                foreach($arrngaythue as $nt){
                    $tongtien = 0;
                    $ngaythue  = strtotime($nt);                 // Chuyển đổi ngày thành timestamp
                    $ngaythue_chuyensangthu = date("l",$ngaythue);   // Lấy tên thứ bằng tiếng Anh
                    $chuyensangmathu  = $chuyensang_mathu[$ngaythue_chuyensangthu];    // Tra cứu tên thứ bằng bảng mã
                    $tblgiatheothuvsmasan = $psgtkg->getgiatheothuvsmasan($catsan[0],$chuyensangmathu);// mảng gia theo thứ va mã sân trong bảng san_gia_thu_khunggio, để tính tổng tiền
                    $tblkhunggiotheothuvsmasan = $psgtkg->getkhunggiotheothuvsmasan($catsan[0],$chuyensangmathu);// lấy mã khung giờ đầu tiên và cuối cùng trong bảng san_gia_thu_khunggio, để lấy giờ bắt đầu và giờ kết thúc
                    if($tblgiatheothuvsmasan){
                        while($r = $tblgiatheothuvsmasan->fetch_assoc()){
                            if($r["Ngay"]==""){ // Nếu cột ngày là rỗng
                                $tongtien += $r["Gia"]; 
                            }else{ // nếu cột ngày có giá trị
                                $kiemtratrunggia = $pdc->getselectsanbykhunggio_san_thu($catsan[0],$chuyensangmathu,$r["KhungGio"]); //Kiểm tra trùng mã sân, thứ, khung giờ. Vì nó có 2 giá tiền khác nhau cộng vào sẽ sai giá
                                if($kiemtratrunggia){
                                    while($rkttg = $kiemtratrunggia->fetch_assoc()){
                                        if($rkttg["Ngay"] == ""){ // Nếu cột ngày là rỗng thì trừ giá tiền đó ra
                                            $tongtien -= $rkttg["Gia"];
                                        }else{ // ngược lại thì cộng giá đó vào
                                            $tongtien += $rkttg["Gia"]; 
                                        }
                                    }
                                }else{
                                    echo "Lỗi kiem tra trùng giá 275";
                                }
                            }
                        }
                    }else{
                        echo "error";
                    }
                    if($tblkhunggiotheothuvsmasan){
                        while($r = $tblkhunggiotheothuvsmasan->fetch_assoc()){
                            $makhunggio[] = $r["KhungGio"];
                        }
                        foreach($makhunggio as $rmakg){
                            $tbltenkhunggio = $pdc->getselectkhunggiotheomakg($rmakg);// lấy tên khung giờ theo mã khung giờ
                            if($tbltenkhunggio){
                                while($rtkg = $tbltenkhunggio->fetch_assoc()){
                                    $tenkhunggio[] = $rtkg["TenKhungGio"];
                                }
                            } 
                        }
                        for($i = 0;$i < count($tenkhunggio);$i++){ //duyệt mảng tên khung giờ
                            $catthoigian = explode("-",$tenkhunggio[$i]); // cắt khung giờ
                            if($i==0){
                                $giobatdau = $catthoigian[0];
                            }else{
                                $gioketthuc = $catthoigian[1];
                            }
                        }
                    }else{
                        echo "error";
                    }
                     //Array ( [0] => Mã sân [1] => Mã khách hàng [2] => Ngày lập hoá đơn [3] => Tổng tiền [4] => Mã địa điểm [5] => Ngày thuê  [6] => Giờ bắt đầu [7] => Giờ kết thúc  [8] => Tên sân ) 
                    if(isset($_SESSION["dangnhap"])){
                        $_SESSION["TTDS"][] = [$catsan[0],$_SESSION["dangnhap"],$ngaydat,$tongtien,$madiadiem,$nt,$giobatdau,$gioketthuc,$catsan[1]];
                    }else{
                        $_SESSION["TTDS"][] = [$catsan[0],"",$ngaydat,$tongtien,$madiadiem,$nt,$giobatdau,$gioketthuc,$catsan[1]];
                    }
                }
            }
        }
        // print_r($_SESSION["TTDS"]);
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
                                    </tr>
                                </thead>
                                <tbody>
                                    '; 
                                    $total = 0;
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
                                        </tr> ';
                                    $total += $pt[3];
                                }
                                    
                                
        // print_r($tenkhunggio);
        // echo $giobatdau;
        // echo $gioketthuc;
        echo '                        
                                </tbody>  
                                <tfoot>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td colspan=""><button type="submit" name="subdstn" class="btn btn-info">Đặt sân</button></td>
                                        <td colspan=""><b>Thành tiền</b></td>
                                        <td colspan=""><b>'.number_format($total,0,".",",").' đ</b></td>           
                                    </tr>
                                </tfoot>
                            </table>
                        </form> 
                    </div>
                </div>
            </div>
            ';
        $_SESSION["total"] = $total;
        
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
        $total = $_SESSION["total"] ;
        $tblthemdatsan = $themdatsan->getinsertdatsantheongay($total);
        //Array ( 
        //[0] => Array ( [0] => 1 [1] => [2] => 2024-11-25 18:10:33 [3] => 2400000 [4] => 1 [5] => 2024-11-26 [6] => 7:00 [7] => 22:30 [8] => Sân số 1 ) 
        //[1] => Array ( [0] => 2 [1] => [2] => 2024-11-25 18:10:33 [3] => 900015 [4] => 1 [5] => 2024-11-26 [6] => 7:00 [7] => 22:30 [8] => Sân số 2 ) )
        if($tblthemdatsan){
            // $mail = new sendmail();
            // if(isset($_SESSION["emailnhanvien"])){
            //     $mail -> guithongtindatsan($_SESSION["emailkhachhang"],$_SESSION["tenkhachhang"], $_SESSION["TTHD"], $ngaydat, $tendiadiem, $diachidd);
            // }elseif(isset($_SESSION["emailchusan"])){
            //     $mail -> guithongtindatsan($_SESSION["emailkhachhang"],$_SESSION["tenkhachhang"], $_SESSION["TTHD"], $ngaydat, $tendiadiem, $diachidd);
            // }else{
            //     $mail -> guithongtindatsan($_SESSION["emailkhachhang"],$_SESSION["tenkhachhang"], $_SESSION["TTDS"], $ngaydat, $tendiadiem, $diachidd);
            // }
            unset($_SESSION["TTDS"]);
            unset($_SESSION["total"]);
            echo "<script>alert('Yêu cầu đặt sân thành công, Chờ xét duyệt.');</script>";
            header("refresh:0 url ='?page=lichdatsan&masan=$madiadiem'");
            ob_end_flush();
            exit();
        }else{
            echo "<script>alert('thất bại');</script>";
        }
    }
?>
               
<script>
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
    
</script>
