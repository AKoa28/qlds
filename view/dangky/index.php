<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="register-login-section spad ">
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
                        </div>
                        <div class="group-input">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="txtname" required>
                        </div>
                        
                        <div class="group-input">
                            <label for="pass">Mật khẩu *</label>
                            <input type="password" id="pass"  name="txtpass" required>
                        </div>
                        
                        <div class="group-input">
                            <label for="con-pass">Nhập lại mật khẩu *</label>
                            <input type="password" id="con-pass" name="txtconfirmpass" required>
                        </div>
                        <span id="error-message" style="color:red; display:none;">Mật khẩu nhập lại không khớp</span>
                        <button type="submit" class="site-btn register-btn" name="subregister" >Đăng ký</button>
                    </form>
                    <div class="switch-login">
                        <a href="?dangnhap" class="or-login">Đăng nhập</a>
                    </div>
                </div>
                <div id="show">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#registerForm').on('submit', function(e) {
            e.preventDefault();  // Ngăn chặn form gửi đi thông thường
            const password = $('#pass').val();
            const confirmPassword = $('#con-pass').val();
            const username = $('#username').val();
            const sdt = $('#sdt').val();
            const email = $('#email').val();
            // Kiểm tra xem mật khẩu có khớp hay không
            if (password !== confirmPassword) {
                $('#error-message').show();  // Hiển thị thông báo lỗi
            } else {
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
                        // Xử lý phản hồi từ server
                        if(ketqua === "success") {
                            alert("Đăng ký thành công!");
                        } else {
                            alert("Có lỗi xảy ra: " + ketqua);
                        }
                    },
                    error: function(xhr, status, error){
                        alert("Lỗi: " + error);
                    }
                });
            }
        });
    });
</script>