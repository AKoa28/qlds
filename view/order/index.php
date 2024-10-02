<?php
    $thongtin = $_REQUEST["tt"];
    $parts = explode("_",$thongtin);
    $diachi = $parts[0];
    $partsMS = explode("-", $parts[2]);
    $ms = $partsMS[0];
    $khunggio = $parts[1];
    $tensan = $partsMS[1];
    $ngay = $parts[3];
    $gia = $parts[4];

    $p = new controller();
    $pn = new cnguoidung();
    $tbldiachi = $p->getselectallsan($diachi);
    $tblnguoidung = $pn->getselectallnguoidung();
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
                    <button type="submit" class="btn btn-primary w-100 m-1" name="suborder">Gửi</button>
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
<?php
    if(isset($_REQUEST["suborder"])){
        $pds = new cdatsan();
        $manguoidung = "2";
        $trangthai = "Chờ duyệt";
        // echo $manguoidung . $ms . $ngay . $khunggio . $trangthai .  $gia;
        $tbldatsan = $pds->insertdatsan($manguoidung,$ms,$ngay,$khunggio,$trangthai, $gia);
        if($tbldatsan){
            echo "<script>alert('Gửi yêu cầu đặt sân thành công. Chờ xét duyệt');</script>";
            header("refresh:0; url='?page=lichdatsan&masan=$diachi'");
        }else{
            echo "<script>alert('Gửi yêu cầu đặt sân thất bại');</script>";
            header("refresh:0;");
        }
    }
    

?>