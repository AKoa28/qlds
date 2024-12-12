<?php
include_once("controller/controller.php");
$ps = new cchusan();
$p = new ctaikhoan();
// $p1 = new ctaikhoan();
$tblchusan = $ps->getselectallchusan();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"])) {
        if ($_POST["action"] == "addChusan") { //form
            if(isset($_REQUEST["subthemcs"])){ // nut submit 
                $ten = $_POST["ten"];
                $sdt = $_POST["sdt"];
                $email = $_POST["email"];
                $matkhau = md5($_POST["matkhau"]);

                $tbltrungsdt = $p->getselecttrungsdt($sdt);
                if($tbltrungsdt->num_rows>0){
                    while($rtt = $tbltrungsdt->fetch_assoc()){
                        $remail = $rtt["Email"];
                    }
                    if($remail == NULL){
                        $tbltrungemail = $p->getselecttrungemail($email);
                        if($tbltrungemail->num_rows>0){
                            echo "<script>alert('Email đã được đăng ký')</script>";
                            header("refresh:0; url='?page=quanlychusan'");
                        }else{
                        
    
                            $updatetaikhoan = $ps->getupdatechusan($ten,$sdt,$email,$password);
                            if($updatetaikhoan){
                                echo "<script>alert('Thêm tài khoản thành công')</script>";
                                header("refresh:0; url='?page=quanlychusan'");
                            }else{
                                echo "<script>alert('Đăng ký thất bại')</script>";
                                header("refresh:0; url='?page=quanlychusan'");
                            }  
                        }
                    }else{
                       echo "<script>alert('Số điện thoại đã được đăng ký')</script>"; 
                       header("refresh:0; url='?page=quanlychusan'");
                    }
                }else{
                    //thêm gửi mail
                    $tbltrungemail = $p->getselecttrungemail($email);
                    if($tbltrungemail->num_rows>0){
                        echo "<script>alert('Email đã được đăng ký')</script>";
                        header("refresh:0; url='?page=quanlychusan'");
                    }else{
                            $inserttaikhoan = $ps->getinsertchusan($ten,$sdt,$email,$password);
                            if($inserttaikhoan){
                                echo "<script>alert('Thêm tài khoản thành công')</script>";
                                header("refresh:0; url='?page=quanlychusan'");
                            }else{
                                echo "<script>alert('Đăng ký thất bại')</script>";
                                header("refresh:0; url='?page=quanlychusan'");
                            }
                        }
                }
            }
        } elseif ($_POST["action"] == "deleteChusan") {
            $machusan = $_POST["machusan"];
            $ps->xoachusan($machusan);
        }
        exit();
    }
}
// if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["keyword"])) {
//     $keyword = $_GET["keyword"];
//     $tblkhachhang = $p->timKiemKhachHang($keyword);
// }
if(isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $tblchusan = $ps->timkiemchusan($keyword);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .odd-row { background-color: #f2f2f2; }
        .even-row { background-color: #ffffff; }
        .fixed-button { position: fixed; bottom: 20px; right: 20px; z-index: 1000; color: #F8F8FF; background-color: #0D6EFD; }
        .error { color: red; font-size: 0.875em; }
        .search-input {
            height: 60px;
            border: 2px solid #0D6EFD; /* Màu viền nổi bật */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Hiệu ứng đổ bóng */
            }
        .search-btn {
            height: 60px;
        }
    </style>
</head>
<body>
    <div class="container section_phu">
        <h2 class="mb-4">Quản lý khách hàng</h2>


        <!-- Nút trở lại -->
       

        <table class="table table-bordered" id="chusanTable">
            <thead>
                <tr>
                    <th>Mã chủ sân</th>
                    <th>Mã tài khoản</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($tblchusan === -1) {
                    echo "<tr><td colspan='7'>Lỗi kết nối cơ sở dữ liệu!</td></tr>";
                } elseif ($tblchusan === 0) {
                    if (isset($_GET['keyword'])) {
                        echo "<tr><td colspan='7'>Không tìm thấy chủ sân nào!</td></tr>";
                    } else {
                        echo "<tr><td colspan='7'>Không có chủ sân nào!</td></tr>";
                    }
                } else {
                    $row_count = 0;
                    while ($r = $tblchusan->fetch_assoc()) {
                        $row_class = ($row_count % 2 == 0) ? 'even-row' : 'odd-row';
                        $isVerified = $r["TrangThai"] === 'Đã xác thực';
                        $hasEmail = !empty($r["Email"]);
                        echo "<tr class='$row_class'>";
                        echo "<td>" . $r["MaChuSan"] . "</td>";
                        echo "<td>" . $r["MaTaiKhoan"] . "</td>";
                        echo "<td>" . $r["Ten"] . "</td>";
                        echo "<td>" . $r["SDT"] . "</td>";
                        echo "<td>" . $r["Email"] . "</td>";
                        echo "<td>" . $r["TrangThai"] . "</td>";
                        echo "<td>
                                <a href='?page=quanlychusan&cate=pheduyetchusan&machusan=".$r["MaChuSan"]."'><button class='btn btn-success btn-sm me-2'>Duyệt</button></a>
                                <form method='POST' action='' style='display:inline;' onsubmit='return confirmDeleteChusan()'>
                                    <input type='hidden' name='action' value='deleteChusan'>
                                    <input type='hidden' name='machusan' value='" . $r["MaChuSan"] . "'>
                                    
                                    <button type='submit' class='btn btn-danger btn-sm me-2'><i class='bi bi-trash'></i> Xóa</button>
                                    
                                </form>
                            </td>";
                        echo "</tr>";
                        $row_count++;
                    }
                }
                ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-success fixed-button" data-bs-toggle="modal" data-bs-target="#addChusanModal"><i class="bi bi-plus"></i> Thêm chủ sân</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addChusanModal" tabindex="-1" aria-labelledby="addChusanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addChusanModalLabel">Thêm Chủ Sân</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="addChusanError" class="alert alert-danger d-none"></div>
                    <form id="addChusanForm" method="POST" action="#">
                        <input type="hidden" name="action" value="addChusan">
                        <div class="mb-3">
                            <label for="ten" class="form-label">Tên</label>
                            <input type="text" class="form-control" id="ten" name="ten" required>
                        </div>
                        <div class="mb-3">
                            <label for="sdt" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="sdt" name="sdt" required>
                            <span id="errSDT" class="err text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="matkhau" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="matkhau" name="matkhau" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="subthemcs">Thêm chủ sân</button>
                    </form>
                </div>
                
                <!-- Kiểm tra email và số điện thoại tồn tại -->
                <?php

                ?>
            </div>
        </div>
    </div>
    <?php
        if(isset($_REQUEST["cate"]) && $_REQUEST["cate"] ="pheduyetchusan"){
            $macs = $_REQUEST["machusan"];
            $pheduyetcs = $ps->pheduyetchusan($macs);
            if($pheduyetcs){
                echo "<script>alert('Duyệt thành công')</script>";
                header("refresh:0 url='?page=quanlychusan'");
            }else{
                echo "<script>alert('Duyệt thất bại')</script>";
                header("refresh:0 url='?page=quanlychusan'");
            }
        }

?>
            <script>
               function ktSDT() {
                    let sdt = $('#sdt').val();
                    let btcq = /^(03|09|08|07)[0-9]\d{7}$/;
                    if (sdt == "") {
                        $('#errSDT').html("Số điện thoại không được để trống")
                        $('#errSDT').addClass('err');
                        return false;
                    }
                    else if (btcq.test(sdt)) {
                        $('#errSDT').html("")
                        $('#errSDT').addClass('err');
                        return true;
                    } else {
                        $("#errSDT").html("Số điện thoại có định dạng gồm 10 con số trong đó bắt đầu là 09,03,07,08");
                        $('#errSDT').addClass('err');
                        return false;
                    }
                }
                $('#sdt').blur(function (e) {
                    ktSDT();
                })
            </script>
        
    <script>
        // document.getElementById('addCustomerForm').addEventListener('submit', function(event) {
        //         event.preventDefault();

        //         let ten = document.getElementById('ten').value;
        //         let sdt = document.getElementById('sdt').value;
        //         let email = document.getElementById('email').value;
        //         let matkhau = document.getElementById('matkhau').value;

        //         // Clear previous errors
        //         document.getElementById('addCustomerError').classList.add('d-none');
        //         document.getElementById('addCustomerError').textContent = '';

        //         let errors = [];
        //         // Validate phone number
        //         if (!/^(0|\\+84)[3|5|7|8|9][0-9]{8}$/.test(sdt)) {
        //             errors.push('Số điện thoại không đúng định dạng');
        //             document.getElementById('sdt').value = ''; // Reset phone number field
        //         }

        //         // If there are errors, display them and stop form submission
        //         if (errors.length > 0) {
        //             document.getElementById('addCustomerError').textContent = errors.join('. ');
        //             document.getElementById('addCustomerError').classList.remove('d-none');
        //             return;
        //         }
                    
                

        //         // Submit the form if no errors
        //         this.submit();
        // });
        
    

    function confirmDeleteChusan() {
        return confirm('Bạn có chắc chắn muốn xóa chủ sân này không?');
    }
    
</script>
</body>
</html>
