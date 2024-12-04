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
        $manhanvien = $_SESSION["nhanvien"];
        $p = new cnhanvien();
        $ttnv = $p->getThongtinnhanvien($manhanvien);
        if($ttnv->num_rows>0){
            while($r = $ttnv->fetch_assoc()){
                $tennhanvien = $r["Ten"];
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
                    <li class="nav-item"><a href="?thongtinnhanvien" class="nav-link">Thông tin tài khoản</a> </li>
                </ul>
            </div>
        </div>
        <?php
                echo '
                        <div class="col-md-10 section_phu">
                            <div class="row justify-content-center mt-5">
                                <h3 class="text-center">Thông tin của bạn</h3>
                                <div class="col-md-5">
                                    <table class="table mt-3">
                                        <tr>
                                            <td>Tên:</td>
                                            <td>'.$tennhanvien.'</td>
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
                                </div>
                            </div>
                        </div>
                ';
            
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