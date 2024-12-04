<?php
if(isset($_SESSION["TTHD"])){
    unset($_SESSION["TTHD"]);
}
$masan = $_REQUEST["masan"];
$p = new controller();
$tbldiachi = $p->getselectdiachisan();
while ($r = $tbldiachi->fetch_assoc()) {
    $arraydiachi[] = $r["MaDiaDiem"];
    if ($r["MaDiaDiem"] == $masan) {
        $tendiachi = $r["TenDiaDiem"];
        $diadiem = $r["DiaChi"];
        $hinhdaidien = $r["HinhDaiDien"];
        $mota = $r["MoTa"];
    }
}
if (isset($_REQUEST["masan"]) && !in_array($_REQUEST["masan"], $arraydiachi)) {
    echo "<script> alert('Địa chỉ sân không tồn tại hoặc ngưng hoạt động'); </script>";
    header("refresh: 0; url='index.php'");
} elseif (!isset($_SESSION["dangnhap"]) && !isset($_SESSION["chusan"]) && !isset($_SESSION["nhanvien"])) {
    echo "<script> alert('Vui lòng đăng nhập tài khoản'); </script>";
    header("refresh: 0; url='?dangnhap'");
}else{
    $madiadiem = $_REQUEST["masan"];
    $dsdatsan = $p -> getselectallsan($madiadiem);
}


?>
<style>
    body {
        background-color: #f8f9fa;
        color: #333;
    }
    table {
        color: #333;
    }
    th, td {
        vertical-align: middle;
    }
    .table th, .table td {
        border: 1px solid #ddd;
    }
    .table-container {
        max-height: 600px;
        overflow-y: auto;
    }
    .table thead th {
        position: sticky;
        top: 55px;
        background-color:cadetblue;
        z-index: 10;
    }
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
    .table tr td{
        background-color: gray;
    }

</style>

<div class="container section_phu">

    <section class="hero-section">
        <div class="list-bar container">
            <h2><?= $tendiachi ?></h2><br>
            
            <form action="?page=order&masan=<?=$masan?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <img src="image/<?= $hinhdaidien ?>" class="image-chitiet" alt="">
                    </div>
                    <div class="col-md-6">
                        <?php
                
                            echo '
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" onchange="getkieuorder(this.value,'.$madiadiem.')" value="1" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Thuê 1 ngày
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" onchange="getkieuorder(this.value,'.$madiadiem.')" value="2" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Thuê nhiều ngày
                                        </label>
                                    </div>
                            ';
                            echo '<div id="showkieuorder"></div>';
                            
                        ?>
                        <div class="mt-2" id="div3">
                            <!-- <button class="btn btn-success" type="submit" name="subdatsan1ngay">Đặt sân</button> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<script>
    function getkieuorder(giatri, madiadiem){
        $.ajax({
            url: 'view/datsantheongay/kieuorder.php',
            type: 'POST',
            data: {giatri: giatri, madiadiem: madiadiem},
            success: function(ketqua){
                $("#showkieuorder").html(ketqua);
            },
            error: function(xhr, status, error){
                alert("Lỗi"+error);
            }
        });
    }

</script>

