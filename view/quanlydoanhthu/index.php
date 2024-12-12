<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý doanh thu</title>
</head>
<body>
<div  class="section_phu"><form method="post">
<?php
    // if(!isset($_SESSION["quanly"])){
    //     echo "<script>alert('Bạn không có quyền truy cập');</script>";
    //     header("Location: index.php");
    // }else{
        include_once("controller/controller.php");
        $p = new controller();
        if(isset($_SESSION["chusan"])){
            $machusan = $_SESSION["chusan"]; 
            $tbldiadiem = $p->getselectdiachisan($machusan);
        }else{
            $madiadiem = $_SESSION["madiadiem"];
            $tbldiadiem = $p->getdiadiemsantheomadiadiem($madiadiem);
        }
        
        if(!$tbldiadiem){
            echo "Lỗi";
        }elseif($tbldiadiem===0){
            echo "Không có địa điểm";
        }else{
            echo '<div class="container-fluid bg-body-secondary ">
                    <div class="row pt-3 pb-3 justify-content-center">
                        <div class="col-md-12" align="center">
                            <h3>Xem doanh thu địa chỉ</h3>
                        </div>
                    

                        <div class="col-md-6">
                                <select name="cbxdiadiem" id="cbxdiadiem"  onchange="getdiachi(this.value,this.name)" class="form-select" aria-label="Default select example">
                                    <option value="0" selected>Chọn địa chỉ</option>';
            while($r = $tbldiadiem->fetch_assoc()){
                echo '<option value="'.$r["MaDiaDiem"].'">'.$r["TenDiaDiem"].'</option>';
            }
            echo                '</select>
                        </div>
                    </div>';
            echo '<div id="div1"></div>';
            echo '<div id="div2"></div>';
            echo '';
        }

    // }
?>
    <div id="div3">     
    </div>
</form></div>
<script>
    function getdiachi(giatri,tencbx){
        $.ajax({
            url: 'view/quanlydoanhthu/ajax.php',
            type: 'POST',
            data: {giatri: giatri, tencbx: tencbx},
            success: function(ketqua){
                $('#div1').html(ketqua);
            }
        });
    }
    
    function getloaithoigian(giatri,tencbx){
        $.ajax({
            url: 'view/quanlydoanhthu/ajax.php',
            type: 'POST',
            data: {giatri: giatri, tencbx: tencbx},
            success: function(ketqua){
                $('#div2').html(ketqua);
            }
        });
    }

    function getngay(giatri,tencbx){
        $.ajax({
            url: 'view/quanlydoanhthu/ajax.php',
            type: 'POST',
            data: {giatri: giatri, tencbx: tencbx},
            success: function(ketqua){
                $('#div3').html(ketqua);
            }
        });
    }

    function getthang(giatri,tencbx){
        $.ajax({
            url: 'view/quanlydoanhthu/ajax.php',
            type: 'POST',
            data: {giatri: giatri, tencbx: tencbx},
            success: function(ketqua){
                $('#div3').html(ketqua);
            }
        });
    }
</script>