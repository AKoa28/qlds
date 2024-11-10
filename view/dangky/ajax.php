<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include_once("../../controller/controller.php");
include_once("../../model/model.php");
require_once("../../mail/sendmail.php");
$p = new ctaikhoan();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    
    if ($password === $confirmPassword) {
        $tbltrungemail = $p -> getselecttrungemail($email);
        $tbltrungsdt = $p->getselecttrungsdt($sdt);
        if($tbltrungsdt->num_rows > 0 && $tbltrungemail->num_rows > 0){ 
            while($rtt = $tbltrungsdt->fetch_assoc()){
                $rmatkhau = $rtt["MatKhau"];
                $remail = $rtt["Email"];
            }
            if($email == $remail){
                if($rmatkhau == NULL){
                    if (!isset($_POST["xacnhanmail"])){
                        $_SESSION["maxacnhan"] = rand(1000,9999);
                        $_SESSION["giotao"] = date("H:i:s", strtotime("+1 minutes")); // giờ lúc tạo mã xác nhận cộng thêm 1 phút
                        $mail = new sendmail();
                        $mail -> xacnhandangkytaikhoan($email,$username,$_SESSION["maxacnhan"]);
                        echo "successmail";
                    } else{
                        $giohientai = date("H:i:s"); // giờ hiện tại
                        if(strtotime($_SESSION['giotao']) > strtotime($giohientai)){ // Nếu giờ hiện tại bé hơn giờ tạo + 1 phút thì thực hiện tiếp;
                            $xacnhan = $_POST["xacnhanmail"];
                            if($_SESSION["maxacnhan"] == $xacnhan){
                                unset($_SESSION["maxacnhan"]);
                                unset($_SESSION["giotao"]);
                                $updatetaikhoan = $p->getupdatetaikhoan($username,$sdt,$email,$password);
                                if($updatetaikhoan){
                                    echo "thanhcongroi";
                                }else{
                                    echo "Đăng ký thất bại";
                                }
                            }else{
                                unset($_SESSION["maxacnhan"]);
                                unset($_SESSION["giotao"]);
                                echo "Mã xác nhận sai, vui lòng chọn 'Đăng ký' để được gửi mã lại";
                            }
                        }else{ // nếu giờ hiện tại lớn hơn giờ tạo + 1 phút thì thông báo;
                            unset($_SESSION["maxacnhan"]);
                            unset($_SESSION["giotao"]);
                            // echo "Mã quá hiệu lực giờ quy định ".$_SESSION["giotao"]."<br>"." - giờ hiện tại ".$giohientai;
                            echo "Mã quá hiệu lực";
                        }
                        
                    }
                }else{
                    echo "Số điện thoại và Email đã đăng ký"; 
                }
            }else{ //trường hợp nếu sdt khách nhập != (*) && email của khách nhập != (@)
                // echo "Số điện thoại và Email đã tồn tại";
                echo "Số điện thoại và Email đã tồn tại";
            }

        }elseif($tbltrungsdt->num_rows > 0 && $tbltrungemail->num_rows == 0){ // trường hợp trùng sdt trả về có kết quả và trùng email không có kết quả 
            echo "Số điện thoại đã được sử dụng.";
        }elseif($tbltrungsdt->num_rows == 0 && $tbltrungemail->num_rows > 0){ // trường hợp trùng sdt không có kết quả và trùng email trả về có kết quả
            echo "Email đã được sử dụng.";
        }else{
            if (!isset($_POST["xacnhanmail"])){
                $_SESSION["maxacnhan"] = rand(1000,9999);
                $_SESSION["giotao"] = date("H:i:s", strtotime("+1 minutes")); // giờ lúc tạo mã xác nhận cộng thêm 1 phút
                $mail = new sendmail();
                $mail -> xacnhandangkytaikhoan($email,$username,$_SESSION["maxacnhan"]);
                echo "successmail";
            } else{
                $giohientai = date("H:i:s"); // giờ hiện tại
                    if(strtotime($_SESSION['giotao']) > strtotime($giohientai)){ // Nếu giờ hiện tại bé hơn giờ tạo + 1 phút thì thực hiện tiếp;
                        $xacnhan = $_POST["xacnhanmail"];
                        if($_SESSION["maxacnhan"] == $xacnhan){
                            unset($_SESSION["maxacnhan"]);
                            unset($_SESSION["giotao"]);
                            $inserttaikhoan = $p->getinserttaikhoan($username,$sdt,$email,$password);
                            if($inserttaikhoan){
                                echo "thanhcongroi";
                            }else{
                                echo "Đăng ký thất bại";
                            }
                        }else{
                            unset($_SESSION["maxacnhan"]);
                            unset($_SESSION["giotao"]);
                            echo "Mã xác nhận sai, vui lòng chọn 'Đăng ký' để được gửi mã lại";
                        }
                    }else{ // nếu giờ hiện tại lớn hơn giờ tạo + 1 phút thì thông báo;
                        unset($_SESSION["maxacnhan"]);
                        unset($_SESSION["giotao"]);
                        echo "Mã quá hiệu lực";
                    }
            }
        }
    }else {
        echo "Mật khẩu không khớp!";
    }
} else {
    echo "Lỗi !!!!!!!";
}
?>