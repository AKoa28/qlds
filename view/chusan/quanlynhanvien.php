<?php
include_once("controller/controller.php");
$p = new cnhanvien();
//$p1 = new ctaikhoan();
$errornhanvien = $p->getselectallnhanvien();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"])) {
        if ($_POST["action"] == "addnv") {
            $ten = $_POST["tennv"];
            $sdt = $_POST["sdtnv"];
            $email = $_POST["emailnv"];
            $matkhau = md5($_POST["matkhaunv"]);
            $chucvu = $_POST["chucvunv"];
            $madiadiem = $_POST["diadiemnv"];
            
            $p->themtaikhoan($ten, $sdt, $email, $matkhau);

            // Lấy MaTaiKhoan vừa được thêm
            $mataikhoan = $p->layMaTaiKhoan($sdt);

            // Thêm nhân viên vào bảng nhanvien
            $p->themnhanvien($mataikhoan, $chucvu, $madiadiem);
            if($mataikhoan){
                echo "<script>alert('Thêm nhân viên thành công'); window.location.href='../qlds/index.php?page=quanlynhanvien';</script>";
            } else {
                echo "<script>alert('Lỗi khi thêm nhân viên'); window.location.href='../qlds/index.php?page=quanlynhanvien';</script>";
            }
            echo "<script>alert('Thêm nhân viên thành công'); window.location.href='../qlds/index.php?page=quanlynhanvien';</script>";
        
        }elseif ($_POST["action"] == "deleteNV") {
            $manhanvien = $_POST["manhanvien"];
            $p->xoaNhanVien($manhanvien);
        }
        exit();
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
    <div class="container mt-5">
        <h2 class="mb-4">Quản lý nhân viên</h2>

        <!-- Form tìm kiếm -->
        <class="d-flex mb-4" method="GET" action="index.php">
            <input type="hidden" name="page" value="xemnhanvien">
        </form>

        <table class="table table-bordered" id="customerTable">
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
                        echo "<tr class='$row_class'>";
                        echo "<td>" . $r["MaNhanVien"] . "</td>";
                        echo "<td>" . $r["MaTaiKhoan"] . "</td>";
                        echo "<td>" . $r["Ten"] . "</td>";
                        echo "<td>" . $r["SDT"] . "</td>";
                        echo "<td>" . $r["Email"] . "</td>";
                        echo "<td>" . $r["ChucVu"] . "</td>";
                        echo "<td>" . $r["TenDiaDiem"] . "</td>";
                        echo "<td>
                                <a href='?page=editnhanvien&manhanvien=" . $r["MaNhanVien"] . "' class='btn btn-warning btn-sm me-2'><i class='bi bi-pencil'></i> Sửa</a><br>
                                <form method='POST' action='' style='display:inline;' onsubmit='return confirmDeleteNV()'>
                                    <input type='hidden' name='action' value='deleteNV'>
                                    <input type='hidden' name='manhanvien' value='" . $r["MaNhanVien"] . "'>
                                    <button type='submit' onclick='return confirm ('Bạn có chắc muốn xóa nhân viên không')' class='btn btn-danger btn-sm me-2'><i class='bi bi-trash'></i>Xóa</button><br>
                                </form>";
                        echo "</tr>";
                        $row_count++;
                    }
                }
                ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-success fixed-button" data-bs-toggle="modal" data-bs-target="#addnvModal"><i class="bi bi-plus"></i> Thêm nhân viên</button>
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
                            <label for="sdt" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="sdtnv" name="sdtnv" required>
                            <div class="error1">error</div>
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
                            <select name="chucvunv" id="chucvunv">
                                <option value="Nhân viên">Nhân viên</option>
                                <option value="Quản lý">Quản lý</option>
                            </select>
                            <div class="error1">error</div>
                        </div>
                        <div class="mb-3">
                            <label for="diadiem" class="form-label">Địa điểm</label>
                            <select name="diadiemnv" id="diadiemnv">
                                <option value="1">Sân Bóng Nguyễn Văn Bảo<?php echo $_POST['TenDiaDiem'] ?></php></option>
                                <option value="2">Sân Bóng IUH</option>
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
                    document.getElementById('addnvForm').addEventListener('submit', function(event) {
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
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "controller/controller.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.status === "error") {
                                    document.getElementById('addnvError').textContent = response.message;
                                    document.getElementById('addnvError').classList.remove('d-none');
                                    if (response.message.includes("Email")) {
                                        document.getElementById('emailnv').value = '';
                                    }
                                    if (response.message.includes("Số điện thoại")) {
                                        document.getElementById('sdtnv').value = '';
                                    }
                                } else {
                                    // Submit the form if no errors
                                    document.getElementById('addnvForm').submit();
                                }
                            }
                        };
                        xhr.send("action=checkDuplicate&email=" + emailnv + "&sdt=" + sdtnv);
                
                        // If there are errors, display them and stop form submission
                        if (error1 > 0 || error2 > 0 || error3 > 0 || error4 > 0) {
                            document.getElementById('addCustomerError').textContent = errors.join('. ');
                            document.getElementById('addCustomerError').classList.remove('d-none');
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
                }
                function confirmDeleteNV() {
                    return confirm('Bạn có chắc chắn muốn xóa nhân viên này không?');
                }
            </script>  

<div class="modal fade" id="updatenvModal" tabindex="-1" aria-labelledby="updatenvModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnvModalLabel">Sửa nhân viên</h5>
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
                            <label for="sdt" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="sdtnv" name="sdtnv" required>
                            <div class="error1">error</div>
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
                            <select name="chucvunv" id="chucvunv">
                                <option value="Nhân viên">Nhân viên</option>
                                <option value="Quản lý">Quản lý</option>
                            </select>
                            <div class="error1">error</div>
                        </div>
                        <div class="mb-3">
                            <label for="diadiem" class="form-label">Địa điểm</label>
                            <select name="diadiemnv" id="diadiemnv">
                                <option value="1"><?php echo $_POST['TenDiaDiem'] ?></php></option>
                                <option value="2"></option>
                            </select>
                            <div class="error1">error</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm nhân viên</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    </body>
</html>