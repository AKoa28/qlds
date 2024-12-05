<?php
    if(isset($_SESSION["dangnhap"])){
        echo '<script>alert("Đã đăng nhập")</script>';
        header("refresh:0 url='?page=home&trang=1'");
    }
?>
<div class="register-login-section spad section_phu">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Đăng Nhập</h2>
                    <form action="#" method="post" id="formdangnhap">
                        <div class="group-input">
                            <label for="sdt">Số điện thoại *</label>
                            <input type="text" id="sdt" name="txtphone" required>
                            <span id="errSDT" class="err text-danger"> </span>
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
                        if(ketqua.trim() === "thatbai"){
                            alert("Đăng nhập thất bại");
                        }else{
                            alert(ketqua.trim());
                            // $("#formdangnhap").html(ketqua);
                            window.location.href = "?page=home&trang=1";
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