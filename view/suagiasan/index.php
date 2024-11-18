<style>
    .btn-custom {
        width: 100%;
        color: #fff;
        background-color: #6c757d;
        border: none;
    }
    .btn-custom:hover {
        background-color: aliceblue;
        color:#333;
    }
    tr:hover{
        background-color: darkcyan;
    }
</style>
<div class="section_phu">
    <div class="col-md-12">
        <div class="row justify-content-center mt-5">
            <h3 class="text-center">Thay đổi giá sân</h3>
            <div class="col-md-7 text-center">
                <form action="" method="post" id="formsuathongtin">
                
    <?php
    $chuoids = implode(' | ', $_SESSION["TTHD"]);
    if (!isset($_SESSION["chusan"])) {
        header("Location: ?page=chusan");
    }
    if(sizeof($_SESSION["TTHD"])==1){
        for ($i = 0; $i < sizeof($_SESSION["TTHD"]); $i++) {
            $thongtin = $_SESSION["TTHD"][$i];
            $catTTTD = explode("_",$thongtin);
            echo  '
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="tensan" class="form-control" id="disabledTextInput" placeholder="" value="'.$catTTTD[4].'">
                            <label for="disabledTextInput">Tên sân - Loại sân</label>
                        </div>
                    </fieldset>
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="khunggio" class="form-control" id="disabledTextInput" placeholder="" value="'.$catTTTD[2].'">
                            <label for="disabledTextInput">Khung Giờ</label>
                        </div>
                    </fieldset>
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="thu" class="form-control" id="disabledTextInput" placeholder="" value="Thứ '.$catTTTD[6].'">
                            <label for="disabledTextInput">Thứ</label>
                        </div>
                    </fieldset>
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="giahientai" class="form-control" id="disabledTextInput" placeholder="" value="'.number_format($catTTTD[5],0,'.',',').' đ">
                            <label for="disabledTextInput">Giá hiện tại (VNĐ)</label>
                        </div>
                    </fieldset>
                    <div class="form-floating mb-3">
                        <input type="number" name="giamoiTD1TT" class="form-control" id="floatingInput" placeholder="" min="0" required>
                        <label for="floatingInput">Giá Mới (VNĐ)</label>
                    </div>
                    <button type="submit" name="subTD1TT" class="btn btn-info mb-3">Lưu thông tin</button>
            ';
        }
    }else{
        $soluongmang = sizeof($_SESSION["TTHD"]);
        echo '
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onchange="getChinhGiaRieng(this.value),getChinhGiaChung()" value="'.$chuoids.'" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Chỉnh giá riêng
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onchange="getChinhGiaChung(this.value),getChinhGiaRieng()" value="'.$chuoids.'" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                    <label class="form-check-label" for="flexRadioDefault2">
                        Chỉnh giá cho tất cả
                    </label>
                </div>
        ';
    }
    echo '<div id="showchinhgiarieng"></div>';
    print_r($_SESSION["TTHD"]);
    // echo "<br>".$chuoids;
    echo '<div id="showchinhgiachung"></div>';
    
    ?>     
            </form>
        </div>
    </div>
</div>

<script>
    function getChinhGiaRieng(giatri){
        $.ajax({
            url: 'view/suagiasan/chinhgiarieng.php',
            type: 'POST',
            data: {giatri: giatri},
            success: function(ketqua){
                $("#showchinhgiarieng").html(ketqua);
            },
            error: function(xhr, status, error){
                alert("Lỗi"+error);
            }
        });
    }
    function getChinhGiaChung(giatri){
        $.ajax({
            url: "view/suagiasan/chinhgiachung.php",
            type: "POST",
            data: {giatri: giatri},
            success: function(ketqua){
                $("#showchinhgiachung").html(ketqua);
            },
            error: function(xhr, status, error){
                alert("Lỗi"+error);
            }
        });
    }
</script>
<?php
    $p = new csan_gia_thu_khunggio();
    if(isset($_REQUEST["subTDTTC"])){//chỉnh giá chung
        for($i=0;$i<sizeof($_SESSION["TTHD"]);$i++){
            $tt = $_SESSION["TTHD"][$i];
            $catmangtt = explode("_",$tt);
            $makhunggio = $catmangtt[1];
            $masan = $catmangtt[3];
            $gia = $_REQUEST["giamoi"];
            $mathu = $catmangtt[6]-1;
            $tblthaydoigiasan = $p -> getthaydoigiasan($masan,$gia,$makhunggio,$mathu);
            if(!$tblthaydoigiasan){
                echo "Lỗi ở vị trí số".$i;
            }
        }
        header("Location: ?page=xemchitietsan&madd=".$_REQUEST['madd']."&mas=".$_REQUEST['mas']);
    }elseif(isset($_REQUEST["subTDTTR"])){//chỉnh giá riêng
        for($i=0;$i<sizeof($_SESSION["TTHD"]);$i++){
            echo $_REQUEST["giamoi$i"];
        }
    }else{//chỉnh giá 1 thông tin

    }
?>
