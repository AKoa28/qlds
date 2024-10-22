<?php
    if (isset($_SESSION["TTHD"])) {
        $dachon = $_SESSION["TTHD"];
        $tongtien = 0;
        // print_r($dachon);
        echo '
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mb-5" style="text-align:center;">Thông tin đặt sân</h1>
                    <form method="POST">
                        <table class="table"  style="text-align:center;">
                            <tbody>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Họ tên</span>
                                    <input type="text" name="ten" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Số điện thoại</span>
                                    <input type="text" name="sdt" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                            </tbody>
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
                    echo '<td><a href="?page=order&xoa='.$i.'" class="btn btn-danger btn-xoa">Xoá</a></td></tr>';
                    $tongtien += $gia;
                }
            echo '          </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="table-Warning"><b>Thành tiền:</b> </td>
                                    <td class="table-Warning"><b id="capnhatgia">'.number_format($tongtien, 0, ".", ",").' đ</b></td>
                                    <td ><button type="submit" name="datsan" class="btn btn-Info">Đặt sân</button></td>
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </form> 
                </div>
            </div>
        </div>
        ';

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
        header("Location: ?page=order");
        exit;
    }

    if(isset($_REQUEST["datsan"])){
        echo"123213213213123213";
        echo $_REQUEST["ten"];
        echo $_REQUEST["sdt"];
        // $pds = new cdatsan();
        // $manguoidung = "2";
        // $trangthai = "Chờ duyệt";
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
<?php

    
    

?>