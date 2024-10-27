<?php
    if(isset($_SESSION["dangnhap"])){
        echo '<script>alert("Đã đăng nhập")</script>';
        header("refresh:0 url='?danhsachdiachi'");
    }
?>
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Đăng Nhập</h2>
                    <form action="#" method="post" id="formdangnhap">
                        <div class="group-input">
                            <label for="sdt">Số điện thoại *</label>
                            <input type="text" id="sdt" name="txtphone" required>
                        </div>
                        <div class="group-input">
                            <label for="pass">Mật khẩu *</label>
                            <input type="password" id="pass"  name="txtpass" required>
                        </div>
                        <button type="submit" class="site-btn register-btn" name="subregister" >Đăng Nhập</button>
                    </form>
                    <div class="switch-login">
                        <a href="?dangky" class="or-login">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('form').on('submit', function (e){
            e.preventDefault();

            const sdt = $("#sdt").val();
            const pass = $("#pass").val();

            if(sdt !== null && pass !== null){
                $.ajax({
                    url: "view/dangnhap/ajax.php",
                    type: "POST",
                    data: {sdt: sdt, pass: pass},
                    success: function(ketqua){
                        if(ketqua == "thatbai"){
                            alert("Đăng nhập thất bại");
                        }else{
                            alert(ketqua);
                            window.location.href = "?danhsachdiachi";
                        }
                    },
                    error: function(xhr, status, error){
                        alert("Lỗi: " + error);
                    }
                });
            }else{
                alert("loi");
            }
            
        });
    });

</script>