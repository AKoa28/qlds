<?php
    if(isset($_SESSION["dangnhap"]) || isset($_SESSION["nhanvienhethong"])){
        echo '<script>alert("Đã đăng nhập")</script>';
        header("refresh:0 url='?nhanvienhethong'");
    }
?>
<style>
    .err{
        background-color: rgba(0,0,0,0.5);
    }
</style>
<div class="nhanvienhethong-section spad section_phu">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" >
                <h2 style="color:white;">Đăng Nhập Nhân Viên Hệ Thống</h2>
                <h4 style="color:white;"><i>(Dành cho ADMIN quản trị hệ thống)</i></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    
                    <form action="#" method="post" id="formdangnhap">
                        <div class="group-input">
                            <label for="username">User Name *</label>
                            <input type="text" id="username" name="txtusername" required>   
                        </div>
                        <div class="group-input">
                            <label for="pass">Mật khẩu *</label>
                            <input type="password" id="pass"  name="txtpass" required>
                        </div>
                        <button type="submit" class="site-btn register-btn" name="subregister" >Đăng Nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('form').on('submit', function (e){
            e.preventDefault();

            const username = $("#username").val();
            const pass = $("#pass").val();

            if(username !== null && pass !== null){
                $.ajax({
                    url: "view/dangnhapnvht/ajax.php",
                    type: "POST",
                    data: {username: username, pass: pass},
                    success: function(ketqua){
                        if(ketqua.trim() == "thatbai"){
                            alert("Đăng nhập thất bại");
                        }else{
                            alert(ketqua.trim());
                            window.location.href = "?page=nhanvienhethong";
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