<?php
    if(!isset($_SESSION["chusan"]) && !isset($_SESSION["nhanvien"])){
        header("Location: ?chusandangnhap");
    }

    include_once("controller/controller.php");
    $pK = new ckhachhang();
    $p = new ctaikhoan();
    $machusan = $_SESSION["chusan"];
    $tblkhachhang = $pK->getselectallkhachhang($machusan);

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     if (isset($_POST["action"])) {
    //         if ($_POST["action"] == "addCustomer") {
    //             if(isset($_REQUEST["subthemkh"])){
    //                 $ten = $_POST["ten"];
    //                 $sdt = $_POST["sdt"];
    //                 $email = $_POST["email"];
    //                 $password = $_POST["matkhau"];

    //                 $tbltrungsdt = $p->getselecttrungsdt($sdt);
    //                 if($tbltrungsdt->num_rows>0){
    //                     while($rtt = $tbltrungsdt->fetch_assoc()){
    //                         $remail = $rtt["Email"];
    //                     }
    //                     if($remail == NULL){
    //                         $tbltrungemail = $p->getselecttrungemail($email);
    //                         if($tbltrungemail->num_rows>0){
    //                             echo "<script>alert('Email đã được đăng ký')</script>";
    //                             header("refresh:0; url='?page=quanlykhachhang'");
    //                         }else{
                            
        
    //                             $updatetaikhoan = $p->getupdatetaikhoan($ten,$sdt,$email,$password);
    //                             if($updatetaikhoan){
    //                                 echo "<script>alert('Thêm tài khoản thành công')</script>";
    //                                 header("refresh:0; url='?page=quanlykhachhang'");
    //                             }else{
    //                                 echo "<script>alert('Đăng ký thất bại')</script>";
    //                                 header("refresh:0; url='?page=quanlykhachhang'");
    //                             }  
    //                         }
    //                     }else{
    //                     echo "<script>alert('Số điện thoại đã được đăng ký')</script>"; 
    //                     header("refresh:0; url='?page=quanlykhachhang'");
    //                     }
    //                 }else{
    //                     //thêm gửi mail
    //                     $tbltrungemail = $p->getselecttrungemail($email);
    //                     if($tbltrungemail->num_rows>0){
    //                         echo "<script>alert('Email đã được đăng ký')</script>";
    //                         header("refresh:0; url='?page=quanlykhachhang'");
    //                     }else{
    //                             $inserttaikhoan = $p->getinserttaikhoan($ten,$sdt,$email,$password);
    //                             if($inserttaikhoan){
    //                                 echo "<script>alert('Thêm tài khoản thành công')</script>";
    //                                 header("refresh:0; url='?page=quanlykhachhang'");
    //                             }else{
    //                                 echo "<script>alert('Đăng ký thất bại')</script>";
    //                                 header("refresh:0; url='?page=quanlykhachhang'");
    //                             }
    //                         }
    //                 }
    //             }
    //         } elseif ($_POST["action"] == "verifyCustomer") {
    //             $makhachhang = $_POST["makhachhang"];
    //             $result = $pK->getXacNhanKhachHang($makhachhang);
    //             if ($result) {
    //                 echo "<script>alert('Xác nhận thông tin khách hàng thành công'); window.location.href='../qlds/index.php?page=quanlykhachhang';</script>";
    //             } else {
    //                 echo "<script>alert('Xác nhận thông tin khách hàng thất bại'); window.location.href='../qlds/index.php?page=quanlykhachhang';</script>";
    //             }
    //         } elseif ($_POST["action"] == "deleteCustomer") {
    //             $makhachhang = $_POST["makhachhang"];
    //             $pK->xoaKhachHang($makhachhang);
    //         }
    //         exit();
    //     }
    // }
    if(isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $keyword = mb_convert_encoding($keyword, 'UTF-8', 'auto');
        $tblkhachhang = $pK->timKiemKhachHang($keyword, $machusan);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng</title>
    <link rel="stylesheet" href="../css/style.css">
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
    </style>
</head>
<body>
    <div class="container section_phu">
        <h2 class="mb-4">Quản lý khách hàng</h2>

        <!-- Form tìm kiếm -->
        <form class="d-flex mb-4" method="GET" action="">
            <input type="hidden" name="page" value="quanlykhachhang">
            <input class="form-control mb-1 search-input" type="search" name="keyword" placeholder="Tìm kiếm khách hàng" aria-label="Search" required>
            <button class="btn btn-info search-btn" type="submit"><i class="bi bi-search"></i>Tìm Kiếm</button>
        </form>

        <!-- Nút trở lại -->
         <?php
            //echo $machusan;
         ?>
        <?php if (isset($_GET['keyword'])): ?>
            <a href="index.php?page=quanlykhachhang" class="btn btn-primary mb-4"><i class="bi bi-arrow-left"></i> Trở lại</a>
        <?php endif; ?>

        <table class="table table-bordered" id="customerTable">
            <thead>
                <tr style="text-align: center">
                    <th>Mã khách hàng</th>
                    <th>Địa điểm</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Xác nhận</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($tblkhachhang === -1) {
                    echo "<tr><td colspan='7'>Lỗi kết nối cơ sở dữ liệu!</td></tr>";
                } elseif ($tblkhachhang === 0) {
                        echo "<tr style='text-align: center'><td colspan='7'><h5>Không có khách hàng nào!</h5></td></tr>";
                } else {
                    $row_count = 0;
                    while ($r = $tblkhachhang->fetch_assoc()) {
                        $row_class = ($row_count % 2 == 0) ? 'even-row' : 'odd-row';
                        $isVerified = $r["XacNhan"] === "Đã xác nhận";
                        echo "<tr style='text-align:center' class='$row_class'>";
                        echo "<td>" . $r["MaKhachHang"] . "</td>";
                        echo "<td>" . $r["TenDiaDiem"] . "</td>";
                        echo "<td>" . $r["Ten"] . "</td>";
                        echo "<td>" . $r["SDT"] . "</td>";
                        echo "<td>" . $r["Email"] . "</td>";
                        echo "<td>" . $r["XacNhan"] . "</td>";
                        echo "<td>
                                <a style='width:95px' href='?page=editkhachhang&makhachhang=" . $r["MaKhachHang"] . "' class='btn btn-warning btn-sm'><i class='bi bi-pencil'></i> Sửa</a><br>
                                <form method='POST' action='' style='display:inline;' onsubmit='return confirmDeleteCustomer()'>
                                    <input type='hidden' name='action' value='deleteCustomer'>
                                    <input type='hidden' name='makhachhang' value='" . $r["MaKhachHang"] . "'>
                                    <button style='width:95px' type='submit' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Xóa</button><br>
                                </form>";
                        echo "  <form method='POST' action='' style='display:inline;' onsubmit='return confirmVerifyCustomer()'>
                                    <input type='hidden' name='action' value='verifyCustomer'>
                                    <input type='hidden' name='makhachhang' value='" . $r["MaKhachHang"] . "'>
                                    <button style='width:95px' type='submit' class='btn btn-success btn-sm' " . ($isVerified ? 'disabled' : '') . "><i class='bi bi-check'></i> Xác Nhận</button>
                                </form>
                            </td>";
                        echo "</tr>";
                        $row_count++;
                    }
                }
                ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-success fixed-button" data-bs-toggle="modal" data-bs-target="#addCustomerModal"><i class="bi bi-plus"></i> Thêm khách hàng</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Thêm khách hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="addCustomerError" class="alert alert-danger d-none"></div>
                    <form id="addCustomerForm" method="POST" action="#">
                        <input type="hidden" name="action" value="addCustomer">
                        <div class="mb-3">
                            <label for="ten" class="form-label">Tên</label>
                            <input type="text" class="form-control" id="ten" name="tenkhachhang" required>
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
                        <button type="submit" class="btn btn-primary" name="subthemkh">Thêm khách hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        function confirmDeleteCustomer() {
            return confirm('Bạn có chắc chắn muốn xóa khách hàng này không?');
        }
        function confirmVerifyCustomer() {
            return confirm('Bạn có chắc chắn muốn xác nhận thông tin tài khoản cho khách hàng này không?');
        }
    </script>
</body>
</html>
<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["action"])) {
                    if ($_POST["action"] == "addCustomer") {
                        if(isset($_POST["subthemkh"])) {
                            // Validate phone number format first
                            if (!preg_match("/^(03|09|08|07)[0-9]\d{7}$/", $_POST["sdt"])) {
                                echo "<script>alert('Số điện thoại không hợp lệ!'); window.location.href='index.php?page=quanlykhachhang';</script>";
                                exit();
                            }
                
                            // Check for duplicate phone and email
                            $p = new ctaikhoan();
                            $tbltrungsdt = $p->getselecttrungsdt($_POST["sdt"]);
                            $tbltrungemail = $p->getselecttrungemail($_POST["email"]);
                
                            if($tbltrungsdt->num_rows > 0) {
                                echo "<script>alert('Số điện thoại đã được đăng ký!'); window.location.href='index.php?page=quanlykhachhang';</script>";
                                exit();
                            }
                
                            if($tbltrungemail->num_rows > 0) {
                                echo "<script>alert('Email đã được đăng ký!'); window.location.href='index.php?page=quanlykhachhang';</script>";
                                exit();
                            }
                
                            // If no duplicates, store data and send verification code
                            $_SESSION['tenkhachhang'] = $_POST["tenkhachhang"];
                            $_SESSION['sdt'] = $_POST["sdt"]; 
                            $_SESSION['email'] = $_POST["email"];
                            $_SESSION['matkhaukhachhang'] = $_POST["matkhaukhachhang"];
                
                            // Generate verification code
                            $_SESSION["maxacnhan"] = rand(1000,9999);
                            $_SESSION["giotao"] = date("H:i:s", strtotime("+1 minutes"));
                
                            // Send verification email
                            $mail = new sendmail();
                            $mail->thaydoithongtinkhachhang($_POST["email"], $_POST["tenkhachhang"], $_SESSION["maxacnhan"]);
                            
                            if($mail) {
                                echo '<script>alert("Gửi mã xác nhận thành công!");</script>';
                                echo '
                                <div class="modal fade show section_phu bg-dark" id="verificationModal" tabindex="-1" aria-labelledby="verificationModalLabel" style="display: block;">
                                    <div class="modal-dialog row justify-content-center">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xác nhận email</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post">
                                                    <input type="hidden" name="action" value="addCustomer">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="maxacnhan" class="form-control" required>
                                                        <label>Nhập mã xác nhận đã gửi đến email của bạn</label>
                                                    </div>
                                                    <button type="submit" name="xacnhanmail" class="btn btn-success">Xác nhận</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            } else {
                                echo "<script>alert('Gửi mã xác nhận thất bại!'); window.location.href='index.php?page=quanlykhachhang';</script>";
                            }
                        }
                
                        if(isset($_POST["xacnhanmail"])) {
                            if($_POST["maxacnhan"] == $_SESSION["maxacnhan"]) {
                                $p = new ctaikhoan();
                                $inserttaikhoan = $p->getinserttaikhoan(
                                    $_SESSION['tenkhachhang'],
                                    $_SESSION['sdt'],
                                    $_SESSION['email'],
                                    $_SESSION['matkhaukhachhang'] // Already hashed
                                );
                
                                if($inserttaikhoan) {
                                    // Clear session data
                                    unset($_SESSION['tenkhachhang']);
                                    unset($_SESSION['sdt']);
                                    unset($_SESSION['email']);
                                    unset($_SESSION['matkhaukhachhang']);
                                    unset($_SESSION['maxacnhan']);
                                    unset($_SESSION['giotao']);
                
                                    echo "<script>alert('Thêm tài khoản thành công'); window.location.href='index.php?page=quanlykhachhang';</script>";
                                } else {
                                    echo "<script>alert('Thêm tài khoản thất bại'); window.location.href='index.php?page=quanlykhachhang';</script>";
                                }
                            } else {
                                echo "<script>alert('Mã xác nhận không đúng!'); window.location.href='index.php?page=quanlykhachhang';</script>";
                            }
                        }
                    } elseif ($_POST["action"] == "verifyCustomer") {
                        $makhachhang = $_POST["makhachhang"];
                        $result = $pK->getXacNhanKhachHang($makhachhang);
                        if ($result) {
                            echo "<script>alert('Xác nhận thông tin khách hàng thành công'); window.location.href='../qlds/index.php?page=quanlykhachhang';</script>";
                        } else {
                            echo "<script>alert('Xác nhận thông tin khách hàng thất bại'); window.location.href='../qlds/index.php?page=quanlykhachhang';</script>";
                        }
                    } elseif ($_POST["action"] == "deleteCustomer") {
                        $makhachhang = $_POST["makhachhang"];
                        $pK->xoaKhachHang($makhachhang);
                    }
                    exit();
                }
            }

    ?>