<?php
    $madiadiem = $_REQUEST["masan"];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if (isset($_SESSION["TTHD"])) {
        $dachon = $_SESSION["TTHD"];
        $tongtien = 0;
        // print_r($dachon);
        if(isset($_SESSION["dangnhap"])){
            echo '
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mb-5" style="text-align:center;">Thông tin đặt sân</h1>
                        <form method="POST">
                            <table class="table"  style="text-align:center;">
                                <thead class="table-Success">
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
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mb-5" style="text-align:center;">Thông tin đặt sân</h1>
                        <form method="POST">
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
        }

        // Hiển thị nút hoàn tác nếu có dữ liệu đã bị xóa;
    }else{
        echo "lỗi";
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
            $trungsdt = new ctaikhoan;
            $tbltrungsdt = $trungsdt -> getselecttrungsdt($sdt);
            if($tbltrungsdt->num_rows > 0){
                while($remail = $tbltrungsdt->fetch_assoc()){
                    $email = $remail["Email"];
                    $makhachhangcosan = $remail["MaKhachHang"];
                }
                if($email != ""){
                    echo "<script>alert('Số điện thoại đã đăng ký vui lòng đăng nhập');</script>";
                    header("refresh:0 url ='?dangnhap'");
                    ob_end_flush();
                    exit();
                }else{
                    $ngaydat = date("Y-m-d H:i:s");
                    $trangthai = "Chờ duyệt";
                    $trangthaikhach = "Vãng lai";
                    $total = $tongtien;
                    $diadiem = $madiadiem;
                    $themdatsan = new cdatsan();
                    $tblthemdatsan = $themdatsan->getinsertdatsankhachvl($makhachhangcosan,$ngaydat,$trangthai,$tongtien,$diadiem);
                    if($tblthemdatsan){
                        unset($_SESSION["TTHD"]);
                        echo "<script>alert('Yêu cầu đặt sân thành công, Chờ xét duyệt.');</script>";
                        header("refresh:0 url ='?page=lichdatsan&masan=$diadiem'");
                        ob_end_flush();
                        exit();
                    }else{
                        echo "<script>alert('thất bại');</script>";
                    }
                    
                }
            }else{
                $ngaydat = date("Y-m-d H:i:s");
                $trangthai = "Chờ duyệt";
                $trangthaikhach = "Vãng lai";
                $total = $tongtien;
                $diadiem = $madiadiem;
                $TK_khachvanglai = new cnguoidung();
                $tblkhachvanglai = $TK_khachvanglai->getinsertkhachvanglai($ten,$sdt,$trangthaikhach);
                if($tblkhachvanglai){
                    $makh = $tblkhachvanglai;
                    $themdatsan = new cdatsan();
                    $tblthemdatsan = $themdatsan->getinsertdatsankhachvl($makh,$ngaydat,$trangthai,$tongtien,$diadiem);
                    if($tblthemdatsan){
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
        // $pds = new cdatsan();
        // $manguoidung = "2";
        // 
        // // echo $manguoidung . $ms . $ngay . $khunggio . $trangthai .  $gia;
        // $tbldatsan = $pds->insertdatsan($manguoidung,$ms,$ngay,$khunggio,$trangthai, $gia);
        // if($tbldatsan){
        //     echo "<script>alert('Gửi yêu cầu đặt sân thành công. Chờ xét duyệt');</script>";
        //     header("refresh:0; url='?page=lichdatsan&masan=$diachi'");
        // }else{
        //     echo "<script>alert('Gửi yêu cầu đặt sân thất bại');</script>";
        //     header("refresh:0;");
        // }
    }
?>
               
<script>
    function ktSDT() {
        let sdt = $('#sdt').val();
        let btcq = /^(03|09|08|07)[0-9]\d{7}$/;
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
    // $(document).ready(function () {
    //     const storedData = JSON.parse(localStorage.getItem('datachecked')) || [];
    //     const total = localStorage.getItem('tongtien') || '0';

    //     storedData.forEach(item => {
    //         $('#DaChon').append(
    //             '<tr>' +
    //             '<td>' + item.diachi + '</td>' +
    //             '<td>' + item.khunggio + '</td>' +
    //             '<td>' + item.tensan + '</td>' +
    //             '<td>' + item.ngay + '</td>' +
    //             '<td>' + item.gia.toLocaleString() + ' đ</td>' +
    //             '</tr>'
    //         );
    //     });

    //     $('#tongtien').text(total.toLocaleString() + ' đ');
    // });
</script>
