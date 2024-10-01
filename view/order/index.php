<?php
    $thongtin = $_REQUEST["tt"];
    $parts = explode("_",$thongtin);
    $khunggio = $parts[1];
    $tensan = $parts[2];
    $ngay = $parts[3];
    $gia = $parts[4];

    $p = new controller();
    $tbl = $p->getselectallsan($diachi);

    // echo $khunggio ."<br>";
    // echo $tensan ."<br>";
    // echo $ngay ."<br>";
    // echo $gia ."<br>";

    
?>
<section class="hero-section ">
    <div class="list-bar container">
        <h1 >Thông Tin Đặt Lịch </h1><br>
        <div class="row justify-content-between">
            <div class="col-md-5">
                <form class="row justify-content-center" method="POST">
                    <div class="col-md-12">
                    <input type="text" class="form-control m-1" placeholder="Họ & tên *" name="txtname">
                    </div>
                    <div class="col-md-12">
                    <input type="text" class="form-control m-1" placeholder="Số điện thoại *" name="txtpass">
                    </div>
                    <div class="col-md-12">
                    <input type="email" class="form-control m-1" placeholder="Email" name="txtemail">
                    </div>
                    <div class="col-md-12">
                    <button type="submit" class="btn btn-primary w-100 m-1" name="subregister">Gửi</button>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <p>Khung Giờ: <?=$khunggio?></p>
                <p>Tên sân: <?=$tensan?></p>
                <p>Ngày: <?=$ngay?></p>
                <p>Giá: <?=number_format($gia,0,'.',',') . " đ"?></p>
            </div>
        </div>
    </div>
</section>