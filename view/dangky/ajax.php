<?php
include_once("../../controller/controller.php");
include_once("../../model/model.php");
include_once("../../mail/PHPMailer/sendmail.php");
$p = new ctaikhoan();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];

    if ($password === $confirmPassword) {
        $tbltrungsdt = $p->getselecttrungsdt($sdt);
        if($tbltrungsdt->num_rows>0){
            while($rtt = $tbltrungsdt->fetch_assoc()){
                $remail = $rtt["Email"];
            }
            if($remail === NULL){
                $tbltrungemail = $p->getselecttrungemail($email);
                if($tbltrungemail->num_rows>0){
                    echo "Email đã được đăng ký";
                }else{
                    //thêm gửi mail
                    $updatetaikhoan = $p->getupdatetaikhoan($username,$sdt,$email,$password);
                    if($updatetaikhoan){
                        echo "success";
                        // header("refresh:0 url = '?dangnhap'");
                    }else{
                        echo "Đăng ký thất bại";
                    }
                }
            }else{
               echo "Số điện thoại đã được đăng ký"; 
            }
        }else{
            //thêm gửi mail
            $tbltrungemail = $p->getselecttrungemail($email);
            if($tbltrungemail->num_rows>0){
                echo "Email đã được đăng ký";
            }else{
                $inserttaikhoan = $p->getinserttaikhoan($username,$sdt,$email,$password);
                if($inserttaikhoan){
                    echo "success";
                }else{
                    echo "Đăng ký thất bại";
                }
            }
        }
    } else {
        echo "Mật khẩu không khớp!";
    }
} else {
    echo "Lỗi !!!!!!!";
}
?>