<form method="post">
<?php
    $machusan = "1";
    include_once("controller/controller.php");
    $p = new controller();
    $tbldiadiem = $p->getselectdiachisan($machusan);//sau này thay thế bằng $_SESSION["quanly"] lưu mã chủ sân khi đăng nhập
    if(!$tbldiadiem){
        echo "Lỗi";
    }elseif($tbldiadiem===0){
        echo "Không có địa điểm";
    }else{
        echo '<div class="container-fluid bg-body-secondary ">
                <div class="row pt-3 pb-3 justify-content-center">
                    <div class="col-md-12" align="center">
                        <h3>Quản lý lịch đặt sân của địa chỉ</h3>
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

?>
</form>
<script>
    
    function getdiachi(madiadiem,tencbx){
        $.ajax({
            url: 'view/quanlylichdatsan/ajax.php',
            type: 'POST',
            data: {madiadiem: madiadiem, tencbx: tencbx},
            success: function(ketqua){
                $('#div1').html(ketqua);
            }
        });
    }

</script>