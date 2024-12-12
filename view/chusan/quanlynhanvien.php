<div class="section_phu"><form method="post">
<?php
    include_once("controller/controller.php");
    $p = new controller();
    if(isset($_SESSION["chusan"])){
        $machusan = $_SESSION["chusan"]; 
        $tbldiadiem = $p->getselectdiachisan($machusan);
    }else{
        $madiadiem = $_SESSION["madiadiem"];
        $tbldiadiem = $p->getdiadiemsantheomadiadiem($madiadiem);
    }
    if(!isset($_SESSION["chusan"]) && !isset($_SESSION["nhanvien"])){
        header("Location: ?chusandangnhap");
    }

include_once("controller/controller.php");
$p1 = new cnhanvien();
$tendiadiem = $p1->getselectalldiadiem($_SESSION['chusan']);
//$p1 = new ctaikhoan();
$errornhanvien = $p1->getselectallnhanvien($_SESSION['chusan']);

$tendiadiem1 = $p1->getselectalldiadiem($_SESSION['chusan']);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"])) {
        if ($_POST["action"] == "addnv") {
            $ten = $_POST["tennv"];
            $sdt = $_POST["sdtnv"];
            $email = $_POST["emailnv"];
            $matkhau = md5($_POST["matkhaunv"]);
            $chucvu = $_POST["chucvunv"];
            $madiadiem = $_POST["diadiemnv"];
            $p = new ctaikhoan();
                            $tbltrungsdt = $p->getselecttrungsdt($_POST["sdtnv"]);
                            $tbltrungemail = $p->getselecttrungemail($_POST["emailnv"]);
                
                            if($tbltrungsdt->num_rows > 0) {
                                echo "<script>alert('Số điện thoại đã được đăng ký!'); window.location.href='index.php?page=quanlynhanvien';</script>";
                                exit();
                            }elseif($tbltrungemail->num_rows > 0) {
                                echo "<script>alert('Email đã được đăng ký!'); window.location.href='index.php?page=quanlynhanvien';</script>";
                                exit();
                            }else{
                                $p1->themtaikhoan($ten, $sdt, $email, $matkhau);

                                // Lấy MaTaiKhoan vừa được thêm
                                $mataikhoan = $p1->layMaTaiKhoan($sdt);
                                
                                $manhanvien = $p1->layMaNhanVien($mataikhoan);
                                
                                // Thêm nhân viên vào bảng nhanvien
                                $p1->themnhanvien($mataikhoan, $chucvu, $madiadiem);
                                if($mataikhoan){
                                    echo "<script>alert('Thêm nhân viên thành công'); window.location.href='../qlds/index.php?page=quanlynhanvien';</script>";
                                } else {
                                    echo "<script>alert('Lỗi khi thêm nhân viên'); window.location.href='../qlds/index.php?page=quanlynhanvien';</script>";
                                }
                                $p2 = new ckhachhang();
                                $p2->themkhachhang($mataikhoan);
                            
                            }
                
            

           
        }elseif ($_POST["action"] == "deleteNV") {
            $manhanvien = $_POST["manhanvien"];
            $p1->xoaNhanVien($manhanvien);
        }
        exit();
    }
    if(isset($_REQUEST["submitupdatethongtinnv"])){
        $manhanvien = $_POST["MaNhanVien"];
        $ten = $_POST["tenmoi"];
        $sdt = $_POST["sdtmoi"];
        $email = $_POST["emailmoi"];
        $chucvu = $_POST["chucvumoi"];
        $madiadiem = $_POST["diadiemmoi"];
        $capnhatlancuoi = date('Y-m-d h:i:s');
        $p = new ctaikhoan();
        $tblsdtemail = $p->getthongtinnhanvien($manhanvien);
        while($r=$tblsdtemail->fetch_assoc()){
            $emailnhanvien = $r["Email"];
            $sdtnhanvien = $r["SDT"];
        }
        if($sdt == $sdtnhanvien && $email == $emailnhanvien){
            $result = $p1->updateNhanVien($manhanvien, $ten, $sdt, $email, $chucvu,$madiadiem,$capnhatlancuoi);
                                // Kiểm tra kết quả
                                if ($result) {
                                    // Chuyển hướng về trang quản lý với thông báo thành công
                                    echo "<script>alert('Sửa thành công');</script>";
                                    header("refresh:0; ");
                                    
                                } else {
                                    // Chuyển hướng về trang quản lý với thông báo lỗi
                                    echo "<script>alert('Sửa không thành công');</script>";
                                    header("refresh:0;");
                                }
        }elseif($sdt == $sdtnhanvien && $email != $emailnhanvien){
            $tbltrungemail = $p->getselecttrungemail($_POST["emailmoi"]);

            if($tbltrungemail->num_rows > 0) {
                echo "<script>alert('Email đã được đăng ký!'); window.location.href='index.php?page=quanlynhanvien';</script>";
                exit();
            }else{$result = $p1->updateNhanVien($manhanvien, $ten, $sdt, $email, $chucvu,$madiadiem,$capnhatlancuoi);
                // Kiểm tra kết quả
                if ($result) {
                    // Chuyển hướng về trang quản lý với thông báo thành công
                    echo "<script>alert('Sửa thành công');</script>";
                    header("refresh:0;");
                } else {
                    // Chuyển hướng về trang quản lý với thông báo lỗi
                    echo "<script>alert('Sửa không thành công');</script>";
                    header("refresh:0;");
                }
            }
        }elseif($email == $emailnhanvien && $sdt != $sdtnhanvien){
            $tbltrungsdt = $p->getselecttrungsdt($_POST["sdtmoi"]);
            
            if($tbltrungsdt->num_rows > 0) {
                echo "<script>alert('Số điện thoại đã được đăng ký!'); window.location.href='index.php?page=quanlynhanvien';</script>";
                exit();
            }else{$result = $p1->updateNhanVien($manhanvien, $ten, $sdt, $email, $chucvu,$madiadiem,$capnhatlancuoi);
                // Kiểm tra kết quả
                if ($result) {
                    // Chuyển hướng về trang quản lý với thông báo thành công
                    echo "<script>alert('Sửa thành công');</script>";
                    header("refresh:0;");
                } else {
                    // Chuyển hướng về trang quản lý với thông báo lỗi
                    echo "<script>alert('Sửa không thành công');</script>";
                    header("refresh:0;");
                }
            }
        }
        else{
            $tbltrungsdt = $p->getselecttrungsdt($_POST["sdtmoi"]);
            $tbltrungemail = $p->getselecttrungemail($_POST["emailmoi"]);

            if($tbltrungsdt->num_rows > 0) {
                echo "<script>alert('Số điện thoại đã được đăng ký!'); window.location.href='index.php?page=quanlykhachhang';</script>";
                exit();
            }elseif($tbltrungemail->num_rows > 0) {
                echo "<script>alert('Email đã được đăng ký!'); window.location.href='index.php?page=quanlykhachhang';</script>";
                exit();
            }else{$result = $p1->updateNhanVien($manhanvien, $ten, $sdt, $email, $chucvu,$madiadiem,$capnhatlancuoi);
                // Kiểm tra kết quả
                if ($result) {
                    // Chuyển hướng về trang quản lý với thông báo thành công
                    echo "<script>alert('Sửa thành công');</script>";
                    header("refresh:0;");
                } else {
                    // Chuyển hướng về trang quản lý với thông báo lỗi
                    echo "<script>alert('Sửa không thành công');</script>";
                    header("refresh:0;");
                }
            }
        }

    }
    if(isset($_REQUEST["doimatkhaunv"])){
            $manhanvien = $_POST["MaNhanVien1"];
            $matkhau = $_POST['MatKhau1'];
            $confirmMatkhaucu = md5($_POST['matkhaucu']);
            $matkhaumoi = md5($_POST['matkhaumoi']);
            $confirmMatkhaumoi = md5($_POST['confirmmatkhaumoi']);
            $capnhatlancuoi = date("Y-m-d H:i:s");
            if($matkhaumoi != $confirmMatkhaumoi){
                echo "<script>alert('Mật khẩu mới không trùng khớp')</script>";
                header("refresh:0");
            }elseif($confirmMatkhaucu != $matkhau){
                echo "<script>alert('Mật khẩu cũ không chính xác')</script>";
                header("refresh:0");
            }elseif($confirmMatkhaucu == $matkhaumoi){
                echo "<script>alert('Mật khẩu mới không được trùng với mật khẩu cũ')</script>";
                header("refresh:0");
            }else{
                $p5 = new cnhanvien();
                $p5->getdoimatkhaunhanvien($manhanvien,$matkhaumoi,$capnhatlancuoi);
                echo "<script>alert('Đổi mật khẩu thành công')</script>";
            }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
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
        .error input{
            border: red solid;
        }

        .error i.fa-exclamation-circle{
            visibility: visible;
            color: red;
        }

        .error .error1{
            visibility: visible;
        }

        .error1{
            display: block;
            color: red;
            font-size: 15px;
            visibility: hidden;
        }
        .success input{
            border: green solid;
        }

        .success i.fa-check-circle{
            visibility: visible;
            color: green;
        }
    </style>
</head>
<body>
    <div class="modal fade" id="updatenvModal" tabindex="-1" aria-labelledby="updatenvModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updatenvModalLabel">Sửa Thông Tin Nhân Viên</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="updatenvError" class="alert alert-danger d-none"></div>
                                    <form id="updatenvForm" method="POST" action="">
                                        <input type="hidden" name="MaNhanVien" id="MaNhanVien">
                                        <div class="mb-3">
                                            <label for="Ten" class="form-label">Tên</label>
                                            <input type="text" class="form-control" id="Ten" name="tenmoi" value=""  required>
                                            <div class="error1">error</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="SDT" class="form-label">Số Điện Thoại</label>
                                            <input type="text" class="form-control" id="SDT" name="sdtmoi" required>
                                            <span id = "errSDT1" class="err1 text-danger"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="Email" name="emailmoi" required>
                                            <div class="error1">error</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ChucVu" class="form-label">Chức Vụ</label>
                                            <select class="form-control" id="ChucVu" name="chucvumoi" required>
                                                <option value="Nhân viên">Nhân viên</option>
                                                <option value="Quản lý">Quản lý</option>
                                            </select>                                    
                                        </div>
                                        <div class="mb-3">
                                            <label for="diadiem" class="form-label">Địa điểm</label>
                                            <select name="diadiemmoi" id="diadiemnv" class="form-control" required>
                                                <?php
                                                    while ($r = $tendiadiem1->fetch_assoc()){    
                                                        echo "<option value = ".$r['MaDiaDiem'].">".$r['TenDiaDiem']."</option>";
                                                    }
                                                ?>
                                            </select>
                                            <div class="error1">error</div>
                                        </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-primary" name='submitupdatethongtinnv' onclick="return confirm('Bạn có chắc muốn thay đổi?')">Lưu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                function ktSDT1() {
                    let sdtmoi = $('#SDT').val()
                    let btcq = /^(03|09|08|07)[0-9]\d{7}$/;
                    if (sdtmoi == "") {
                        $('#errSDT1').html("Số điện thoại không được để trống")
                        $('#errSDT1').addClass('err1');
                        return false;
                    }
                    else if (btcq.test(sdtmoi)) {
                        $('#errSDT1').html("")
                        $('#errSDT1').addClass('err1');
                        return true;
                    }
                    else if(sdtmoi.trim().length != 10){
                            $("#errSDT1").html('Số điện thoại phải bao gồm 10 số');
                            $('#errSDT1').addClass('err1');
                            return false;
                        }
                    else {
                        $("#errSDT1").html("Số điện thoại bắt đầu là 09,03,07,08");
                        $('#errSDT1').addClass('err1');   
                        return false;
                    }
                }
                $('#SDT').blur(function (e) {
                    ktSDT1();
                })
                </script>
    <div class="container mt-5">
        
        <h2 class="mb-4">Quản lý nhân viên</h2>

        <!-- Form tìm kiếm -->
        <class="d-flex mb-4" method="GET" action="index.php">
            <input type="hidden" name="page" value="xemnhanvien">
        </form>

        <table class="table table-bordered" id="NVTable">
            <thead>
                <tr>
                    <th>Mã Nhân viên</th>
                    <th>Mã tài khoản</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Chức vụ</th>
                    <th>Địa Điểm</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($errornhanvien === -1) {
                    echo "<tr><td colspan='7'>Lỗi kết nối cơ sở dữ liệu!</td></tr>";
                }
                else {
                    $row_count = 0;
                    while ($r = $errornhanvien->fetch_assoc()) {
                        if($r["HienThi"] == 1){
                        echo "<tr>";
                        echo "<td>" . $r["MaNhanVien"] . "</td>";
                        echo "<td>" . $r["MaTaiKhoan"] . "</td>";
                        echo "<td>" . $r["Ten"] . "</td>";
                        echo "<td>" . $r["SDT"] . "</td>";
                        echo "<td>" . $r["Email"] . "</td>";
                        echo "<td>" . $r["ChucVu"] . "</td>";
                        echo "<td>" . $r["TenDiaDiem"] . "</td>";
                        echo "<td>
                                    <button type='button' class='btn btn-warning btn-sm me-2' data-bs-toggle='modal' data-bs-target='#updatenvModal' name='update&manv=".$r['MaNhanVien']."'  onclick='loadUpdateData(\"{$r["MaNhanVien"]}\", \"{$r["Ten"]}\", \"{$r["SDT"]}\", \"{$r["Email"]}\", \"{$r["ChucVu"]}\",\"{$r["TenDiaDiem"]}\")'><i class='bi bi-pencil'></i> Sửa</button><br>
                                    <button type='button' class='btn btn-primary btn-sm me-2' data-bs-toggle='modal' data-bs-target='#dmknvModal' name='dmk&manv=".$r['MaNhanVien']."' onclick='loadmk(\"{$r["MaNhanVien"]}\",\"{$r["MatKhau"]}\")'><i class='bi bi-file-person'></i> Đổi mật khẩu</button><br>                                
                                    <form method='POST' action='' style='display:inline;' onsubmit='return confirmDeleteNV()'>
                                    <input type='hidden' name='action' value='deleteNV'>
                                    <input type='hidden' name='manhanvien' value='" . $r["MaNhanVien"] . "'>
                                    <button type='submit' onclick='return confirm ('Bạn có chắc muốn xóa nhân viên không')' class='btn btn-danger btn-sm me-2'><i class='bi bi-trash'></i> Xóa</button><br>
                                </form>
                                    
                                ";

                        echo "</tr>";
                        $row_count++;
                    }
                    }
                }
                ?>
                <script>
                    function loadUpdateData(maNhanVien, ten, sdt, email, chucVu, tenDiaDiem) {
                        document.getElementById('MaNhanVien').value = maNhanVien;
                        document.getElementById('Ten').value = ten;
                        document.getElementById('SDT').value = sdt;
                        document.getElementById('Email').value = email;
                        document.getElementById('ChucVu').value = chucVu;
                        document.getElementById('TenDiaDiem').value = tenDiemDiem;
                    }
                    function loadmk(maNhanvien,matKhau){
                        document.getElementById('MaNhanVien1').value = maNhanvien;
                        document.getElementById('MatKhau1').value = matKhau;
                    }
                </script>
            </tbody>
        </table>
        <button type="button" class="btn btn-success fixed-button" data-bs-toggle="modal" data-bs-target="#addnvModal"><i class="bi bi-plus"></i> Thêm nhân viên</button>
    </div>
    <div class="modal fade" id="dmknvModal" tabindex="-1" aria-labelledby="dmknvModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dmknvModalLabel">Đổi mật khẩu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="dmknvError" class="alert alert-danger d-none"></div>
                    <form id="dmknvForm" method="POST" action="">
                        <input type="hidden" name="MaNhanVien1" id="MaNhanVien1">
                        <input type="hidden" name="MatKhau1" id="MatKhau1">
                        <div class="mb-3">
                            <label for="matkhaucu" class="form-label">Mật khẩu cũ</label>
                            <input type="password" name="matkhaucu" class="form-control" id="matkhaucu" required>
                            <div class="error1">error</div>
                        </div>
                        <div class="mb-3">
                            <label for="matkhaumoi" class="form-label">Mật khẩu mới</label>
                            <input type="password" name="matkhaumoi" class="form-control" id="matkhaumoi" required>
                            <div class="error1">error</div>
                        </div>
                        <div class="mb-3">
                            <label for="confirmmatkhaumoi" class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" name="confirmmatkhaumoi" class="form-control" id="confirmmatkhaumoi" required>
                            <div class="error1">error</div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name='doimatkhaunv' class="btn btn-info" >Đổi mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addnvModal" tabindex="-1" aria-labelledby="addnvModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnvModalLabel">Thêm nhân viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="addnvError" class="alert alert-danger d-none"></div>
                    <form id="addnvForm" method="POST" action="">
                        <input type="hidden" name="action" value="addnv">
                        <div class="mb-3">
                            <label for="tennv" class="form-label">Tên nhân viên</label>
                            <input type="text" class="form-control" id="tennv" name="tennv" required>
                            <div class="error1">error</div>
                        </div>
                        <div class="mb-3">
                            <label for="sdtnv" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="sdtnv" name="sdtnv" required>
                            <span id = "errSDT" class="err text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailnv" name="emailnv" required>
                            <div class="error1">error</div>
                        </div>
                        <div class="mb-3">
                            <label for="matkhau" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="matkhaunv" name="matkhaunv" required>
                            <div class="error1">error</div>
                        </div>
                        <div class="mb-3">
                            <label for="chucvu" class="form-label">Chức Vụ</label>
                            <select name="chucvunv" id="chucvunv" class="form-control">
                                <option value="Nhân viên">Nhân viên</option>
                                <option value="Quản lý">Quản lý</option>
                            </select>
                            <div class="error1">error</div>
                        </div>
                        <div class="mb-3">
                            <label for="diadiem" class="form-label">Địa điểm</label>
                            <select name="diadiemnv" id="diadiemnv" class="form-control">
                                <?php
                                    while ($r = $tendiadiem->fetch_assoc()){    
                                        echo "<option value = ".$r['MaDiaDiem'].">".$r['TenDiaDiem']."</option>";
                                    }
                                ?>
                            </select>
                            <div class="error1">error</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm nhân viên</button>
                    </form>
                </div>
            </div>
        </div>
    </div>       
                <!-- Kiểm tra email và số điện thoại tồn tại -->
            <script>   
                function confirmDeleteNV() {
                    return confirm('Bạn có chắc chắn muốn xóa nhân viên này không?');
                }
                function ktSDT() {
                    let sdtnv = $('#sdtnv').val()
                    let btcq = /^(03|09|08|07)[0-9]\d{7}$/;
                    if (sdtnv == "") {
                        $('#errSDT').html("Số điện thoại không được để trống")
                        $('#errSDT').addClass('err');
                        return false;
                    }
                    else if (btcq.test(sdtnv)) {
                        $('#errSDT').html("")
                        $('#errSDT').addClass('err');
                        return true;
                    }
                    else if(sdtnv.trim().length != 10){
                            $("#errSDT").html('Số điện thoại phải bao gồm 10 số');
                            $('#errSDT').addClass('err');
                            return false;
                        }
                    else {
                        $("#errSDT").html("Số điện thoại bắt đầu là 09,03,07,08");
                        $('#errSDT').addClass('err');   
                        return false;
                    }
                }
                $('#sdtnv').blur(function (e) {
                    ktSDT();
                })
                    /*document.getElementById('addnvForm').addEventListener('submit', function(event) {
                        event.preventDefault(); // Ngăn chặn form submit mặc định
        
                        let tennv = document.getElementById('tennv');
                        let sdtnv = document.getElementById('sdtnv');
                        let emailnv = document.getElementById('emailnv');
                        let pwnv = document.getElementById('matkhaunv');
            
        
                        // Clear previous errors
                        document.getElementById('addnvError').classList.add('d-none');
                        document.getElementById('addnvError').textContent = '';
        
                        let error1 = 0;
                        let error2 = 0;
                        let error3 = 0;
                        let error4 = 0;

                        //Tên nhân viên
                        if(tennv.value.length < 5 || tennv.value.length > 50){
                            error1 = 1;
                            setError(tennv,'Tên nhân viên phải từ 5 đến 50 ký tự');
                             // Reset email field
                        }else{
                            setSuccess(tennv); error1 = 0;
                        }
                        

                        // Validate email
                        if(isEmailValid(emailnv.value)){
                            setSuccess(emailnv); error2 = 0;
                        }
                        else{
                            setError(emailnv, 'Email không hợp lệ'); error2 = 1; 
                        }

                        // SDT
                        if(isNaN(sdtnv.value)){
                            setError(sdtnv,'Số điện thoại phải là số');
                            error3 = 1;
                        }
                        else if(sdtnv.value.trim().length != 10){
                            setError(sdtnv, 'Số điện thoại phải bao gồm 10 số');
                            error3 = 1;
                        }
                        else{
                            setSuccess(sdtnv); error3 = 0;
                        }

                        //Mật khẩu
                        if(pwnv.value.trim().length<6 || pwnv.value.trim().length>30){
                            setError(pwnv, 'Password phải từ 6 đển 30 ký tự'); let error4 = 1;
                        }
                        else{
                            setSuccess(pwnv); let error4 = 0;
                        }
                        if (error1 > 0 || error2 > 0 || error3 > 0 || error4 > 0) {
                            document.getElementById('addnvError').textContent = errors.join('. ');
                            document.getElementById('addnvError').classList.remove('d-none');
                            return;
                        }
                        
        
                        // Submit the form if no errors
                        this.submit();
                    });
                function setError(element,errorMessage){
                    const parent = element.parentElement;
                    if(parent.classList.contains('success')){
                        parent.classList.remove('success');
                    }
                    parent.classList.add('error');
                    const paragraph = parent.querySelector('.error1');
                    paragraph.textContent = errorMessage;
                }
                function setSuccess(element){
                    const parent = element.parentElement;
                    if(parent.classList.contains('error')){
                        parent.classList.remove('error');
                    }
                    parent.classList.add('success');
                }
                function isEmailValid(email){
                    const reg =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

                    return reg.test(email);
                }*/
                 
                   
                        /*let tenmoi = document.getElementById('Ten');
                        let sdtmoi = document.getElementById('SDT');
                        let emailmoi = document.getElementById('Email');
            
        
                        // Clear previous errors
                        document.getElementById('updatenvError').classList.add('d-none');
                        document.getElementById('updatenvError').textContent = '';
        
                        let error1 = 0;
                        let error2 = 0;
                        let error3 = 0;

                        //Tên nhân viên
                        if(tenmoi.value.length < 5 || tenmoi.value.length > 50){
                            error1 = 1;
                            setError(tenmoi,'Tên nhân viên phải từ 5 đến 50 ký tự');
                             // Reset email field
                        }else{
                            setSuccess(tenmoi); error1 = 0;
                        }
                        

                        // Validate email
                        if(isEmailValid(emailmoi.value)){
                            setSuccess(emailmoi); error2 = 0;
                        }
                        else{
                            setError(emailmoi, 'Email không hợp lệ'); error2 = 1; 
                        }

                        // SDT
                        if(isNaN(sdtmoi.value)){
                            setError(sdtmoi,'Số điện thoại phải là số');
                            error3 = 1;
                        }
                        else if(sdtmoi.value.trim().length != 10){
                            setError(sdtmoi, 'Số điện thoại phải bao gồm 10 số');
                            error3 = 1;
                        }
                        else{
                            setSuccess(sdtmoi); error3 = 0;
                        }

                        if (error1 > 0 || error2 > 0 || error3 > 0) {
                            document.getElementById('updatenvError').textContent = errors.join('. ');
                            document.getElementById('updatenvError').classList.remove('d-none');
                            return;
                        }
                        
        
                        // Submit the form if no errors
                        this.submit();*/
            </script>
            
    </body>
</html>
