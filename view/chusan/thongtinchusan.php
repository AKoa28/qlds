<style>
    .menu_phu {
        position: sticky;
        margin-top: 55px;
        top: 55px;
        z-index: 9;
        height: auto;
    }
    .menu_phu a{
        color: aliceblue;
        font-size: medium;
        font-weight: 700;
    }
    .menu_phu ul li{
        margin: 4px;
        /* border-bottom: 1px solid green; */
    }
    .menu_phu ul li:hover a{
        background-color: rgba(66, 214, 52, 0.75);
        color: black;
        border-radius: 10px;
        height: auto;
    }

    .section_phu{
        margin-top: 55px;
    }
</style>
<div id="khongchobam">
    
</div>
<?php
    if(!isset($_SESSION["chusan"]) && !isset($_SESSION["nhanvien"])){
        header("Location: ?chusandangnhap");
    }else{
        $machusan = $_SESSION["chusan"];
        $p = new cchusan();
        $ttcs = $p->getThongtinchusan($machusan);
        if($ttcs->num_rows>0){
            while($r = $ttcs->fetch_assoc()){
                $tenchusan = $r["Ten"];
                $email = $r["Email"];
                $sdt = $r["SDT"];
                $matkhau = $r["MatKhau"];
            }
        }else{
            echo "Không có kết quả";
        }
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-2 pt-3 background">
            <div class="menu_phu">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="?thongtinchusan" class="nav-link">Thông tin tài khoản</a> </li>
                    <li><a href="?doimatkhauchusan" class="nav-link">Đổi mật khẩu</a> </li>
                </ul>
            </div>
        </div>
        <?php
            if(isset($_REQUEST["doimatkhauchusan"])){
                $pM = new cchusan();
                if(!isset($_POST['subDMK'])){
                    echo '
                        <div class="col-md-10 section_phu">
                            <div class="row justify-content-center mt-5">
                                <h3 class="text-center">Thay đổi mật khẩu</h3>
                                <div class="col-md-7">
                                    <form action="" method="post" id="formdoimatkhau">
                                        <div class="form-floating mb-3">
                                            <input type="password" name="confirmMatkhaucu" class="form-control" id="floatingInput" placeholder="" required>
                                            <label for="floatingInput">Mật khẩu cũ</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="matkhaumoi" class="form-control" id="floatingInput" placeholder="" required>
                                            <label for="floatingInput">Mật khẩu mới</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="confirmMatkhaumoi" class="form-control" id="floatingInput" placeholder="" required>
                                            <label for="floatingInput">Xác nhận mật khẩu mới</label>
                                        </div>
                                        
                                        <button type="submit" name="subDMK" class="btn btn-info mb-3" onclick="return confirm(\'Bạn chắc chắn muốn thay đổi mật khẩu?\')">Đổi mật khẩu</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                }
                if (isset($_POST["subDMK"])) {
                    $machusan = $_SESSION["chusan"];
                    $tenTD = $_SESSION["ten"];
                    $confirmMatkhaucu = md5($_POST['confirmMatkhaucu']);
                    $matkhaumoi = md5($_POST['matkhaumoi']);
                    $_SESSION["matkhaumoi"] = $matkhaumoi;
                    $confirmMatkhaumoi = md5($_POST['confirmMatkhaumoi']);
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
                        //$pM->getdoimatkhauchusan($machusan, $confirmMatkhaucu, $confirmEmail, $confirmMatkhaumoi, $capnhatlancuoi);
                        $_SESSION["maxacnhan"] = rand(1000,9999);
                        $_SESSION["giotao"] = date("H:i:s", strtotime("+1 minutes")); // giờ lúc tạo mã xác nhận cộng thêm 1 phút
                        $mail = new sendmail();
                        $laymail = $pM -> getlaymailchusan($machusan);
                        $mail -> thaydoithongtinkhachhang($laymail,$tenTD,$_SESSION["maxacnhan"]);
                        if($mail){
                            if(!isset($_POST['xacnhanmail'])){
                                echo "<script>alert('Gửi mã xác nhận thành công')</script>";
                                echo '
                                    <div class="col-md-10 section_phu">
                                        <div class="row justify-content-center mt-5">
                                            <h3 class="text-center">Nhập mã xác nhận</h3>
                                            <div class="col-md-7">
                                                <form method="post" id="formxacnhan">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="maxacnhan" class="form-control" id="floatingInput" placeholder="" required>
                                                        <label for="floatingInput">Mã xác nhận</label>
                                                    </div>
                                                    <button type="submit" name="xacnhanmail" class="btn btn-success mb-3" >Xác nhận</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        }else{
                            echo "<script>alert('Gửi mã xác nhận thất bại')</script>";
                            header("refresh:1");
                        }
                    }
                }elseif(isset($_REQUEST["xacnhanmail"])){
                    
                    $giohientai = date("H:i:s"); // giờ hiện tại
                                    if(strtotime($_SESSION['giotao']) > strtotime($giohientai)){ // Nếu giờ hiện tại bé hơn giờ tạo + 1 phút thì thực hiện tiếp;
                                        $xacnhan = $_POST["maxacnhan"];
                                        $capnhatlancuoi = date("Y-m-d H:i:s");
                                        if($_SESSION["maxacnhan"] == $xacnhan){
                                            unset($_SESSION["maxacnhan"]);
                                            unset($_SESSION["giotao"]);
                                            $doimatkhauchusan = $pM->getdoimatkhauchusan($machusan, $_SESSION["matkhaumoi"], $capnhatlancuoi);
                                            unset ($_SESSION["matkhaumoi"]);
                                         }else{
                                            unset($_SESSION["maxacnhan"]);
                                            unset($_SESSION["giotao"]);
                                            echo "<script>alert('Mã xác nhận sai')</script>";
                                            unset ($_SESSION["matkhaumoi"]);
                                        }
                                    }else{ // nếu giờ hiện tại lớn hơn giờ tạo + 1 phút thì thông báo;
                                        unset($_SESSION["maxacnhan"]);
                                        unset($_SESSION["giotao"]);
                                        // echo "Mã quá hiệu lực giờ quy định ".$_SESSION["giotao"]."<br>"." - giờ hiện tại ".$giohientai;
                                        echo "<script>alert('Mã quá hiệu lực')</script>";
                                        unset ($_SESSION["matkhaumoi"]);
                                    }
                                    //echo "toi day roi";
                                
                                
                            
                }
            }elseif(isset($_REQUEST["thaydoithongtinchusan"])){
                
                echo '
                        <div class="col-md-10 section_phu">
                            <div class="row justify-content-center mt-5">
                                <h3 class="text-center">Thay đổi thông tin</h3>
                                <div class="col-md-7">
                                    <form action="" method="post" id="formsuathongtin">
                                                   
                ';
                // echo $makhachhang;
                    if(!isset($_REQUEST["subTDTT"])){

                        echo ' 
                                    <div class="form-floating mb-3">
                                            <input type="text" name="ten" class="form-control" id="floatingInput" placeholder="" value="'.$tenchusan.'" required>
                                            <label for="floatingInput">Tên</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder=""  value="'.$email.'" required>
                                            <label for="floatingInput">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="sdt" id="sdt" class="form-control" id="floatingInput" placeholder="" value="'.$sdt.'" required>
                                            <label for="floatingInput">Số điện thoại</label>
                                            <span id="errSDT" class="err text-danger"> </span>
                                        </div>
                                <button type="submit" name="subTDTT" class="btn btn-info mb-3" onclick="return confirm(\'Bạn chắc chắn muốn thay đổi thông tin. Vì khi thay đổi thông tin của bạn cần được xác nhận lại\')">Lưu thông tin</button>
                            </form>
                        ';
                    }else{
                        echo '</form>';
                        $tenTD = $_POST["ten"];
                        $emailTD = $_POST["email"];
                        $sdtTD = $_POST["sdt"];
                        $_SESSION["tenTD"] = $tenTD;
                        $_SESSION["emailTD"] = $emailTD;
                        $_SESSION["sdtTD"] = $sdtTD;

                        if($tenTD=="" || $emailTD=="" || $sdtTD=="" ){ //Một trong 3 nếu có cái nào để trống thì không cần cập nhật csdl
                            header("refresh:0");
                        }elseif($tenTD==$tenchusan && $emailTD==$email && $sdtTD==$sdt ){ //Cả 3 đều không được thay đổi
                            header("refresh:0");
                        }else{
                            if($emailTD != $email && $sdtTD==$sdt){            //Nếu thay đổi là email                    
                                $pt = new ctaikhoan();
                                $tbltrungemail = $pt -> getselecttrungemail($emailTD);
                                // $tbltrungsdt = $pt ->getselecttrungsdt($sdtTD);
                                if($tbltrungemail->num_rows > 0){  // Nếu email có kết quả trả về
                                    echo "<script>alert('Email đã đăng ký')</script>"; 
                                    header("refresh:1");
                                }else{
                                    if(!isset($_POST["xacnhanmail"])){
                                        $_SESSION["maxacnhan"] = rand(1000,9999);
                                        $_SESSION["giotao"] = date("H:i:s", strtotime("+1 minutes")); // giờ lúc tạo mã xác nhận cộng thêm 1 phút
                                        $mail = new sendmail();
                                        $mail -> thaydoithongtinkhachhang($emailTD,$tenTD,$_SESSION["maxacnhan"]);
                                        echo '
                                                <form method="post" id="formxacnhan">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="maxacnhan" class="form-control" id="floatingInput" placeholder="" required>
                                                        <label for="floatingInput">Mã xác nhận</label>
                                                    </div>
                                                    <button type="submit" name="xacnhanmail" class="btn btn-success mb-3" >Xác nhận</button>
                                                </form>
                                        ';
                                    }
                                }
                            }elseif($sdtTD != $sdt && $emailTD == $email){            //Nếu thay đổi là sdt                   
                                $pt = new ctaikhoan();
                                // $tbltrungemail = $pt -> getselecttrungemail($emailTD);
                                $tbltrungsdt = $pt ->getselecttrungsdt($sdtTD);
                                if($tbltrungsdt->num_rows > 0){  // Nếu email có kết quả trả về
                                    
                                    echo "<script>alert('Số điện thoại đã đăng ký')</script>"; 
                                    header("refresh:1");
                    
                                }else{
                                    if(!isset($_POST["xacnhanmail"])){
                                        $_SESSION["maxacnhan"] = rand(1000,9999);
                                        $_SESSION["giotao"] = date("H:i:s", strtotime("+1 minutes")); // giờ lúc tạo mã xác nhận cộng thêm 1 phút
                                        $mail = new sendmail();
                                        $mail -> thaydoithongtinkhachhang($emailTD,$tenTD,$_SESSION["maxacnhan"]);
                                        echo '
                                                <form method="post" id="formxacnhan">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="maxacnhan" class="form-control" id="floatingInput" placeholder="" required>
                                                        <label for="floatingInput">Mã xác nhận</label>
                                                    </div>
                                                    <button type="submit" name="xacnhanmail" class="btn btn-success mb-3" >Xác nhận</button>
                                                </form>
                                        ';
                                    }
                                }
                            }elseif($tenTD != $tenchusan && $sdtTD == $sdt && $emailTD == $email){           //Nếu thay đổi là Tên. Không cần gửi mail xác nhận                 
                                $pt = new ctaikhoan();
                                $updatetaikhoan = $p->getsuathongtinchusan($machusan, $tenTD, $sdtTD,$emailTD);
                                if($updatetaikhoan){
                                    header("refresh:0");
                                }else{
                                    echo "<script>alert('Sửa thông tin thất bại')</script>";
                                    header("refresh:1");
                                }
                            }else{
                                $tbltrungemail = $p -> getselecttrungemail($emailTD);
                                $tbltrungsdt = $p->getselecttrungsdt($sdtTD);
                                if($tbltrungsdt->num_rows > 0 && $tbltrungemail->num_rows > 0){ 
                                    echo "<script>alert('Số điện thoại và Email đã tồn tại')</script>";
                                    header("refresh:1");
                                }elseif($tbltrungsdt->num_rows > 0 && $tbltrungemail->num_rows == 0){ // trường hợp trùng sdt trả về có kết quả và trùng email không có kết quả 
                                    echo "<script>alert('Số điện thoại đã được sử dụng.')</script>";
                                    header("refresh:1");
                                }elseif($tbltrungsdt->num_rows == 0 && $tbltrungemail->num_rows > 0){ // trường hợp trùng sdt không có kết quả và trùng email trả về có kết quả
                                    echo "<script>alert('Email đã được sử dụng.')</script>";
                                    header("refresh:1");
                                }else{
                                    if(!isset($_POST["xacnhanmail"])){
                                        $_SESSION["maxacnhan"] = rand(1000,9999);
                                        $_SESSION["giotao"] = date("H:i:s", strtotime("+1 minutes")); // giờ lúc tạo mã xác nhận cộng thêm 1 phút
                                        $mail = new sendmail();
                                        $mail -> thaydoithongtinkhachhang($emailTD,$tenTD,$_SESSION["maxacnhan"]);
                                        echo '
                                                <form method="post" id="formxacnhan">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="maxacnhan" class="form-control" id="floatingInput" placeholder="" required>
                                                        <label for="floatingInput">Mã xác nhận</label>
                                                    </div>
                                                    <button type="submit" name="xacnhanmail" class="btn btn-success mb-3" >Xác nhận</button>
                                                </form>
                                        ';
                                    }
                                }
                            }    
                        }   
                    }
            // Sau khi gửi mail
                    if(isset($_REQUEST["xacnhanmail"])){
                        // echo "<script>alert('tới đây rồi')</script>"; // Ý TƯỞNG LÀ LƯU BẰNG SESSION
                        // echo $_SESSION["tenTD"] ;
                        // echo $_SESSION["emailTD"] ;
                        // echo $_SESSION["emailTD"];
                        if( $_SESSION["emailTD"] != $email){            //Nếu thay đổi là email                    
                            $pt = new ctaikhoan();
                            $tbltrungemail = $pt -> getselecttrungemail( $_SESSION["emailTD"]);
                            // $tbltrungsdt = $pt ->getselecttrungsdt($sdtTD);
                            if($tbltrungemail->num_rows > 0){  // Nếu email có kết quả trả về
                                echo "<script>alert('Email đã đăng ký')</script>";
                                header("refresh:1"); 
                            }else{ //Trường hợp kiểm tra email mới không có kết quả tar về tức không trùng email
                                $giohientai = date("H:i:s"); // giờ hiện tại
                                if(strtotime($_SESSION['giotao']) > strtotime($giohientai)){ // Nếu giờ hiện tại bé hơn giờ tạo + 1 phút thì thực hiện tiếp;
                                    $xacnhan = $_REQUEST["maxacnhan"];
                                    if($_SESSION["maxacnhan"] == $xacnhan){
                                        unset($_SESSION["maxacnhan"]);
                                        unset($_SESSION["giotao"]);
                                        $updatetaikhoan = $p->getsuathongtinchusan($machusan, $_SESSION["tenTD"],$_SESSION["sdtTD"],$_SESSION["emailTD"]);
                                        if($updatetaikhoan){
                                            unset($_SESSION["tenTD"]);
                                            unset($_SESSION["emailTD"]);
                                            unset($_SESSION["sdtTD"]);
                                            header("refresh:0");
                                        }else{
                                            echo "<script>alert('Đăng ký thất bại')</script>";
                                            header("refresh:1");
                                        }
                                    }else{
                                        unset($_SESSION["maxacnhan"]);
                                        unset($_SESSION["giotao"]);
                                        echo "<script>alert('Mã xác nhận sai')</script>";
                                        header("refresh:1");
                                    }
                                }else{ // nếu giờ hiện tại lớn hơn giờ tạo + 1 phút thì thông báo;
                                    unset($_SESSION["maxacnhan"]);
                                    unset($_SESSION["giotao"]);
                                    // echo "Mã quá hiệu lực giờ quy định ".$_SESSION["giotao"]."<br>"." - giờ hiện tại ".$giohientai;
                                    echo "<script>alert('Mã quá hiệu lực')</script>";
                                    header("refresh:1");
                                }
                            }
            
                        }elseif( $_SESSION["sdtTD"] != $sdt){            //Nếu thay đổi là sdt                    
                            $pt = new ctaikhoan();
                            // $tbltrungemail = $pt -> getselecttrungemail( $_SESSION["emailTD"]);
                            $tbltrungsdt = $pt ->getselecttrungsdt($_SESSION["sdtTD"]);
                            if($tbltrungsdt->num_rows > 0){  // Nếu email có kết quả trả về
                                echo "<script>alert('Số điện thoại đã đăng ký')</script>"; 
                                header("refresh:1");
                            }else{ 
                                $giohientai = date("H:i:s"); // giờ hiện tại
                                if(strtotime($_SESSION['giotao']) > strtotime($giohientai)){ // Nếu giờ hiện tại bé hơn giờ tạo + 1 phút thì thực hiện tiếp;
                                    $xacnhan = $_REQUEST["maxacnhan"];
                                    if($_SESSION["maxacnhan"] == $xacnhan){
                                        unset($_SESSION["maxacnhan"]);
                                        unset($_SESSION["giotao"]);
                                        $updatetaikhoan = $p->getsuathongtinchusan($machusan, $_SESSION["tenTD"],$_SESSION["sdtTD"],$_SESSION["emailTD"]);
                                        if($updatetaikhoan){
                                            unset($_SESSION["tenTD"]);
                                            unset($_SESSION["emailTD"]);
                                            unset($_SESSION["sdtTD"]);
                                            header("refresh:0");
                                        }else{
                                            echo "<script>alert('Đăng ký thất bại')</script>";
                                            header("refresh:1");
                                        }
                                    }else{
                                        unset($_SESSION["maxacnhan"]);
                                        unset($_SESSION["giotao"]);
                                        echo "<script>alert('Mã xác nhận sai')</script>";
                                        header("refresh:1");
                                    }
                                }else{ // nếu giờ hiện tại lớn hơn giờ tạo + 1 phút thì thông báo;
                                    unset($_SESSION["maxacnhan"]);
                                    unset($_SESSION["giotao"]);
                                    // echo "Mã quá hiệu lực giờ quy định ".$_SESSION["giotao"]."<br>"." - giờ hiện tại ".$giohientai;
                                    echo "<script>alert('Mã quá hiệu lực')</script>";
                                    header("refresh:1");
                                }
                            }
            
                        }else{
                            $pt = new ctaikhoan();
                            $tbltrungemail = $pt -> getselecttrungemail($_SESSION["emailTD"]);
                            $tbltrungsdt = $pt->getselecttrungsdt($_SESSION["sdtTD"]);
                            if($tbltrungsdt->num_rows > 0 && $tbltrungemail->num_rows > 0){ 
                                    echo "<script>alert('Số điện thoại và Email đã tồn tại')</script>";
                                    header("refresh:1");
                            }elseif($tbltrungsdt->num_rows > 0 && $tbltrungemail->num_rows == 0){ // trường hợp trùng sdt trả về có kết quả và trùng email không có kết quả 
                                echo "<script>alert('Số điện thoại đã được sử dụng.')</script>";
                                header("refresh:1");
                            }elseif($tbltrungsdt->num_rows == 0 && $tbltrungemail->num_rows > 0){ // trường hợp trùng sdt không có kết quả và trùng email trả về có kết quả
                                echo "<script>alert('Email đã được sử dụng.')</script>";
                                header("refresh:1");
                            }else{
                                $giohientai = date("H:i:s"); // giờ hiện tại
                                if(strtotime($_SESSION['giotao']) > strtotime($giohientai)){ // Nếu giờ hiện tại bé hơn giờ tạo + 1 phút thì thực hiện tiếp;
                                    $xacnhan = $_REQUEST["maxacnhan"];
                                    if($_SESSION["maxacnhan"] == $xacnhan){
                                        unset($_SESSION["maxacnhan"]);
                                        unset($_SESSION["giotao"]);
                                        $updatetaikhoan = $p->getsuathongtinchusan($machusan, $_SESSION["tenTD"],$_SESSION["sdtTD"],$_SESSION["emailTD"]);
                                        if($updatetaikhoan){
                                            unset($_SESSION["tenTD"]);
                                            unset($_SESSION["emailTD"]);
                                            unset($_SESSION["sdtTD"]);
                                            header("refresh:0");
                                        }else{
                                            echo "<script>alert('Đăng ký thất bại')</script>";
                                            header("refresh:1");
                                        }
                                    }else{
                                        unset($_SESSION["maxacnhan"]);
                                        unset($_SESSION["giotao"]);
                                        echo "<script>alert('Mã xác nhận sai')</script>";
                                        header("refresh:1");
                                    }
                                }else{ // nếu giờ hiện tại lớn hơn giờ tạo + 1 phút thì thông báo;
                                    unset($_SESSION["maxacnhan"]);
                                    unset($_SESSION["giotao"]);
                                    // echo "Mã quá hiệu lực giờ quy định ".$_SESSION["giotao"]."<br>"." - giờ hiện tại ".$giohientai;
                                    echo "<script>alert('Mã quá hiệu lực')</script>";
                                    header("refresh:1");
                                }
                            }
                        }
                    }
                
                echo '                  
                                </div>
                            </div>
                        </div>        ';
            }else{
                echo '
                        <div class="col-md-10 section_phu">
                            <div class="row justify-content-center mt-5">
                                <h3 class="text-center">Thông tin của bạn</h3>
                                <div class="col-md-5">
                                    <table class="table mt-3">
                                        <tr>
                                            <td>Tên:</td>
                                            <td>'.$tenchusan.'</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>'.$email.'</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại:</td>
                                            <td>'.$sdt.'</td>
                                        </tr>
                                    </table>
                                    <a class="btn btn-info mt-3 mb-5" href="?thaydoithongtinchusan" >Sửa thông tin</a>
                                </div>
                            </div>
                        </div>
                ';
            }
        ?>
    </div>
</div>

<script>
    function ktSDT() {
        let sdt = $('#sdt').val();
        let btcq = /^(03|09|08|07|05)[0-9]\d{7}$/;
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
</script>