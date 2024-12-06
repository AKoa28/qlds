<div class="section_phu"><form method="post">
<?php

    if(!isset($_SESSION["chusan"]) && !isset($_SESSION["nhanvien"])){
        header("Location: ?chusandangnhap");
    }

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

    //Phê duyệt
    if(isset($_REQUEST["cate"]) && $_REQUEST["cate"]=="pheduyet"){
        /* code duyệt viết ở đây */
        
        // header("Location: ?page=quanlylichdatsan"); // sau khi chạy thành công thì mở cmt header này ra
    }

?>
</form></div>
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