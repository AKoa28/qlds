<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class sendmail{
    public function xacnhandangkytaikhoan($maildangky,$ten,$maxacnhan){
        $mail = new PHPMailer(true);
        $mail -> CharSet = 'UTF-8';
        try {
            //Server settings
            $mail->SMTPDebug = 0;                     
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'nhom9.ptud.2024@gmail.com';                     
            $mail->Password   = 'efrp slzb shpp zeqc';                              
            $mail->SMTPSecure = 'tls';            
            $mail->Port       = 587;       
            //Recipients
            $mail->setFrom('nhom9.ptud.2024@gmail.com', 'DatSanNhom9');

            $mail->addAddress($maildangky, $ten);    
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('nhom9.ptud.2024@gmail.com');
            // $mail->addBCC('bcc@example.com');
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Xác nhận đăng ký';
            $mail->Body    = '<p>Chào <i>'.$ten.'<i>,</p><p>Bạn đã đăng ký tài khoản tại DatSanNhom9 và đây là mã xác nhận của bạn <b>'.$maxacnhan.'</b></p><p style="color: red"><i>Lưu ý: Mã xác nhận có hiệu lực trong vòng 1 phút<i></p>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo} Mất mạng";
        }
    }

    public function thaydoithongtinkhachhang($maildangky,$ten,$maxacnhan){
        $mail = new PHPMailer(true);
        $mail -> CharSet = 'UTF-8';
        try {
            //Server settings
            $mail->SMTPDebug = 0;                     
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'nhom9.ptud.2024@gmail.com';                     
            $mail->Password   = 'efrp slzb shpp zeqc';                              
            $mail->SMTPSecure = 'tls';            
            $mail->Port       = 587;       
            //Recipients
            $mail->setFrom('nhom9.ptud.2024@gmail.com', 'DatSanNhom9');

            $mail->addAddress($maildangky, $ten);    
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('nhom9.ptud.2024@gmail.com');
            // $mail->addBCC('bcc@example.com');
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Xác nhận thay đổi thông tin';
            $mail->Body    = '<p>Chào <i>'.$ten.'<i>,</p><p>Bạn đã thực hiện thay đổi thông tin cá nhân tại DatSanNhom9 và đây là mã xác nhận của bạn <b>'.$maxacnhan.'</b></p><p style="color: red"><i>Lưu ý: Mã xác nhận có hiệu lực trong vòng 1 phút<i></p>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo} Mất mạng";
        }
    }
}
    
?>