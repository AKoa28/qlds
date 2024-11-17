<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<?php
    if(isset($_SESSION["dangnhap"]) || isset($_SESSION["chusan"])){
        echo '<script>alert("Đã đăng nhập")</script>';
        header("refresh:0 url='?danhsachdiachi'");
    }
?>
<style>
    /* #khongchobam {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); 
    display: none; 
    z-index: 1000;
  } */
</style>
<div id="khongchobam">

</div>
<div class="register-login-section spad section_phu">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Đăng Ký</h2>
                    <form action="#" method="post" id="registerForm">
                        <div class="group-input">
                            <label for="username">Họ và tên *</label>
                            <input type="text" id="username"  name="txthovaten" required>
                        </div>
                        <div class="group-input">
                            <label for="sdt">Số điện thoại *</label>
                            <input type="text" id="sdt" name="txtphone" required>
                            <span id="errSDT" class="err text-danger"> </span>
                        </div>
                        <div class="group-input">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="txtname" required>
                            <span id="errEmail" class="err text-danger"> </span>
                        </div>
                        
                        <div class="group-input">
                            <label for="pass">Mật khẩu *</label>
                            <input type="password" id="pass"  name="txtpass" required>
                        </div>
                        
                        <div class="group-input">
                            <label for="con-pass">Nhập lại mật khẩu *</label>
                            <input type="password" id="con-pass" name="txtconfirmpass" required>
                            <span id="errPass" class="err text-danger"></span>
                        </div>
                        <button type="submit" class="site-btn register-btn" name="subregister" >Đăng ký</button>
                    </form>
                    <div class="switch-login">
                        <a href="?dangnhap" class="or-login">Đăng nhập</a>
                    </div>
                    <div id="show">

                    </div>
                </div>
                
            </div>
        </div>
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

    function ktMK() {
        let conpass = $('#con-pass').val();
        let pass = $("#pass").val();
        if (conpass == pass) {
            $('#errPass').html(" ");
            $('#errPass').addClass('err');
            return true;
        } else {
            $("#errPass").html("Xác nhận mật khẩu không đúng");
            $('#errPass').addClass('err');
            return false;
        }
    }
    $('#con-pass').blur(function (e) {
        ktMK();
    })
    
    $(document).ready(function() {
        function hienthi() {
            // Hiển thị lớp phủ để chặn tương tác
            document.getElementById("khongchobam").style.display = "block";
        }

        function andi() {
            // Ẩn lớp phủ để kích hoạt lại trang
            document.getElementById("khongchobam").style.display = "none";
        }
        $('#registerForm').on('submit', function(e) {
            
            e.preventDefault();  // Ngăn chặn form gửi đi thông thường
            const password = $('#pass').val();
            const confirmPassword = $('#con-pass').val();
            const username = $('#username').val();
            const sdt = $('#sdt').val();
            const email = $('#email').val();
            hienthi();
            // Kiểm tra xem mật khẩu có khớp hay không
           
                $('#error-message').hide();  // Ẩn thông báo lỗi nếu mật khẩu khớp
                $.ajax({
                    url: "view/dangky/ajax.php",
                    type: "POST",
                    data: {
                        password: password,
                        confirmPassword: confirmPassword,
                        username: username,
                        sdt: sdt,
                        email: email
                    },
                    success: function(ketqua){
                        // $('#show').html(ketqua);
                        // Xử lý phản hồi từ server
                        if (ketqua.trim() === "successmail") {
                            let xacnhanmail = prompt("Nhập mã xác nhận đã gửi qua mail của bạn", '');
                            if(xacnhanmail !== null){
                                $.ajax({
                                    url: "view/dangky/ajax.php",
                                    type: "POST",
                                    data: {
                                        password: password,
                                        confirmPassword: confirmPassword,
                                        username: username,
                                        sdt: sdt,
                                        email: email,
                                        xacnhanmail: xacnhanmail},
                                    success: function(ketqua){
                                        if(ketqua.trim() === "thanhcongroi") {
                                            alert("Đăng ký thành công!");
                                            window.location.href = '?dangnhap';
                                        }else{
                                            alert("Lỗi mã xác nhận: " + ketqua.trim());
                                        } 
                                    }
                                });
                            }else{
                                alert("Bạn không nhập mã xác nhận");
                            }
                            
                        } else {
                            alert("Có lỗi xảy ra: " + ketqua);
                        }
                        andi();
                    },
                    error: function(xhr, status, error){
                        alert("Lỗi: " + error);
                        andi();
                    }
                });
            
        });
        
    });
</script>