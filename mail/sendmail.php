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

    public function guithongtindatsan($maildangky,$ten,$thongtin,$ngaydat,$tendiadiem, $diachidd, $trangthaikhach=""){
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
            $mail->Subject = 'Thông tin đặt sân ngày '.$ngaydat;
            $tongtien=0;
            $str = "";
            $str .= '
                        <table class="table" border="1" width="100%"  style="border-collapse: collapse; text-align:center;">
                                <thead class="table-success">
                                    <tr>
                                    <th>Mã sân</th>
                                    <th>Khung giờ</th>
                                    <th>Tên sân</th>
                                    <th>Ngày đặt</th>
                                    <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
            ';
            for ($i = 0; $i < sizeof($thongtin); $i++) {
                $tt = $thongtin[$i];
                $parts = explode("_", $tt);
                $diachi = $parts[0];
                $partsMS = explode("-", $parts[2]);
                $ms = $partsMS[0];
                $khunggio = $parts[1];
                $tensan = $partsMS[1];
                $ngay = $parts[3];
                $gia = (int)$parts[4];
        
                $str .= '<tr><td>' . $ms . '</td>
                    <td>' . $khunggio . '</td>
                    <td>' . $tensan . '</td>
                    <td>' . $ngay . '</td>
                    <td class="gia">' . number_format($gia, 0, ".", ",") . ' đ</td><tr>';
                $tongtien += $gia;
            }
            $str .= '
                            </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="table-Warning"><b>Thành tiền:</b> </td>
                                        <td class="table-Warning"><b id="capnhatgia">'.number_format($tongtien, 0, ".", ",").' đ</b></td>
                                        
                                        </tr>
                                    </tfoot>
                                </table>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            ';
            if($trangthaikhach==""){
                $mail->Body    = '<p>Chào <i>'.$ten.'<i>,</p><p>Bạn đã thực hiện đặt sân tại DatSanNhom9 và đây là thông tin bạn đã đặt. <br>Địa điểm: '.$tendiadiem.'<br>Địa chỉ: '.$diachidd.'<br>'. $str.'</p><p style="color: red"><i>Lưu ý: Hiện tại đơn chưa được nhân viên xác nhận bạn vui lòng chú ý <b>điện thoại</b>, nhân viên của chúng tôi sẽ gọi điện để xác nhận.<i></p>';
            }else{
                $mail->Body    = '<p>Chào <i>'.$ten.'<i>,</p><p>Bạn đã thực hiện đặt sân tại DatSanNhom9 và đây là thông tin bạn đã đặt. <br>Địa điểm: '.$tendiadiem.'<br>Địa chỉ: '.$diachidd.'<br>'. $str.'</p><p style="color: red">Lưu ý: Bạn đang là khách <b>VÃNG LAI</b> chưa tạo tài khoản trên website của chúng tôi nên sân bạn đặt có thể sẽ bị những khách hàng đã đăng ký tài khoản đặt trùng và tất nhiên <b><i>chúng tôi sẽ ưu tiên duyệt đơn đặt sân của những khách hàng đã đăng ký tài khoản</i><b>
                .Để tránh trường hợp này bạn vui lòng tạo tài khoản trên website của chúng tôi để bảo đảm quyền lợi của mình.</p>';
            }
            // $mail->AltBody = $str;
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo} Mất mạng";
        }
    }

    public function guithongtindatsantheongay($maildangky,$ten,$thongtin,$ngaydat,$tendiadiem, $diachidd){
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
            $mail->Subject = 'Thông tin đặt sân ngày '.$ngaydat;
            $tongtien=0;
            $str = "";
            $str .= '
                        <table class="table" border="1" width="100%"  style="border-collapse: collapse; text-align:center;">
                                <thead class="table-success">
                                    <tr>
                                    <th>Mã sân</th>
                                    <th>Giờ bắt đầu</th>
                                    <th>Giờ kết thúc</th>
                                    <th>Tên sân</th>
                                    <th>Ngày đặt</th>
                                    <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
            ';
            //Array ( [0] => Mã sân [1] => Mã khách hàng [2] => Ngày lập hoá đơn [3] => Tổng tiền [4] => Mã địa điểm [5] => Ngày thuê  [6] => Giờ bắt đầu [7] => Giờ kết thúc  [8] => Tên sân ) 
            for ($i = 0; $i < sizeof($thongtin); $i++) {
                $pt = $thongtin[$i];
                $masan = $pt[0];
                $gia = $pt[3];
                $ngaythue = $pt[5];
                $giobatdau = $pt[6];
                $gioketthuc = $pt[7];
                $tensan = $pt[8];
        
                $str .= '<tr><td>' . $masan . '</td>
                    <td>' . $giobatdau . '</td>
                    <td>' . $gioketthuc . '</td>
                    <td>' . $tensan . '</td>
                    <td>' . $ngaythue . '</td>
                    <td class="gia">' . number_format($gia, 0, ".", ",") . ' đ</td><tr>';
                $tongtien += $gia;
            }
            $str .= '
                            </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td class="table-Warning"><b>Thành tiền:</b> </td>
                                        <td class="table-Warning"><b id="capnhatgia">'.number_format($tongtien, 0, ".", ",").' đ</b></td>
                                        </tr>
                                </tfoot>
                                </table>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            ';
            
            $mail->Body    = '<p>Chào <i>'.$ten.'<i>,</p><p>Bạn đã thực hiện đặt sân theo ngày tại DatSanNhom9 và đây là thông tin bạn đã đặt. <br>Địa điểm: '.$tendiadiem.'<br>Địa chỉ: '.$diachidd.'<br>'. $str.'</p><p style="color: red"><i>Lưu ý: Vì bạn đặt sân theo ngày cho nên hãy đến địa chỉ '.$diachidd.' để tiến hành đặt cọc tiền trước khi được duyệt đặt sân. Nếu bạn không thực hiện đặt cọc thì sân bạn yêu cầu đặt sẽ <b>tự động huỷ sau 3 ngày kể từ ngày hôm nay</b>.</p>';
            
            // $mail->AltBody = $str;
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo} Mất mạng";
        }
    }

    public function guithongtinthaydoidatsan($maildangky,$ten,$thongtin,$maxacnhan,$thongtinthaydoi){
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
            $mail->Subject = 'Yêu cầu thay đổi thời gian đặt sân từ Chủ sân';
            $str = "";
            $str .= '   <h3 class="mb-5" style="text-align:center;">Thông tin bạn đặt</h3>
                        <table class="table" border="1" width="100%"  style="border-collapse: collapse; text-align:center;">
                                <thead class="table-success">
                                    <tr>
                                    <th>Khung giờ</th>
                                    <th>Tên sân</th>
                                    <th>Ngày đặt</th>
                                    <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                            <td>'.$_SESSION["arrtt"][3].'</td>
                                            <td>'.$_SESSION["arrtt"][1].'</td>
                                            <td>'.$_SESSION["arrtt"][2].'</td>
                                            <td>'.number_format($_SESSION["arrtt"][4], 0, ".", ",").' đ</td>
                                        </tr>
                            </tbody>
                                </table>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            ';
            
            $catchuoi = explode("_",$thongtinthaydoi);
            $catmasan = explode("-",$catchuoi[2]);
            $cattensan = explode("(",$catmasan[1]);
            $str .= '   <h3 class="mb-5" style="text-align:center;">Thông tin yêu cầu thay đổi</h3>
                        <table class="table" border="1" width="100%"  style="border-collapse: collapse; text-align:center;">
                                <thead class="table-success">
                                    <tr>
                                        <th>Khung giờ</th>
                                        <th>Tên sân</th>
                                        <th>Ngày đặt</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>'.$catchuoi[1].'</td>
                                    <td>'.$cattensan[0].'</td>
                                    <td>'.$catchuoi[3].'</td>
                                    <td>'.number_format($catchuoi[4], 0, ".", ",") .' đ</td>
                                </tr>
                                </tbody>
                                </table>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            ';
            //$_SESSION["arrtt"] = [$mads,$tensan,$nd,$khunggio,$dongia,$tendiadiem,$mdd,$ms1];
            $mail->Body    = '<p>Chào <i>'.$ten.'<i>,</p><p>Bạn được chủ sân nơi bạn đặt sân yêu cầu thay đổi thời gian đặt sân. <br>Địa điểm: '.$_SESSION["arrtt"][5].' <br>'. $str.'</p><p>Nếu bạn đồng ý thay đổi hãy cung cấp mã xác nhận sau cho nhân viên <i style="color: red">'.$maxacnhan.'</i></p>';
            
            // $mail->AltBody = $str;
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo} Mất mạng";
        }
    }
}   
    
?>

                                
                