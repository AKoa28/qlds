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
    .ds {
    /* background-image: url('https://thuthuatnhanh.com/wp-content/uploads/2022/06/Anh-bong-da-sieu-dep.jpg'); */
    background-image: url('image/bg4.jpg');
    background-repeat: round;
    background-attachment: fixed;
    z-index: 0;
    margin-top: 55px;
  }
  .ds::before {
      background-color: rgba(0,0,0,0.3);
      content: "";
      position: fixed;
      top: 0px;
      right: 0px;
      bottom: 0px;
      left: 0px;
      z-index: -1;
  }
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

<div class="container section_phu ds">

    <section class="hero-section">
        <div class="list-bar container">
            <h2><?= $tendiachi ?></h2><br>
            
            <form action="?page=order&masan=<?=$masan?>" id="formdatsantheongay" method="post">
            <!-- <form action="" id="formdatsantheongay" method="post"> -->
                <div class="row">
                    <div class="col-md-6">
                        <img src="image/<?= $hinhdaidien ?>" class="image-chitiet" alt="">
                    </div>
                    <div class="col-md-6">
                        <?php
                
                            echo '
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" onchange="getkieuorder(this.value,'.$madiadiem.'),getkiemtrangay()" value="1" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Thuê 1 ngày
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" onchange="getkieuorder(this.value,'.$madiadiem.'),getkiemtrangay()" value="2" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Thuê nhiều ngày
                                        </label>
                                    </div>
                            ';
                            echo '<div id="showkieuorder"></div>';
                            echo '<div id="loingay"></div>';
                            
                        ?>
                        <div class="mt-2" id="div3">
                            <p><i>Lưu ý: Đặt sân theo ngày phải được <b>đặt cọc</b> trước khi duyệt. Nếu không sẽ bị huỷ yêu cầu đặt sân sau 3 ngày kể từ ngày yêu cầu đặt sân.</i></p>
                            <p>Sau khi đặt sân tại website này và nhận được email thì hãy đến địa chỉ bên dưới để thanh toán tiền cọc.<br><i style="color: #99FF66"><?=$diadiem?>.</i> </p>
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

    $('#formdatsantheongay').on('submit', function(e) {
        e.preventDefault();
        if ($("#ngay").length) {
            var chonsan = [];
            var ngaydatsan = $("#ngay").val().trim();
            $("input[name='chonsan[]']:checked").each(function() {
                chonsan.push($(this).val());
            });
            // alert("Selected Values: " + chonsan.join(", ") + ngaydatsan);
            $.ajax({
                url: 'view/datsantheongay/kiemtrangay.php',
                type: 'POST',
                data: {chonsan: chonsan, ngaydatsan: ngaydatsan},
                success: function(ketqua){
                    if(ketqua.trim() === "thanhcong"){
                        e.target.submit(); // Gửi form hiện tại
                        $("#loingay").html("");
                    }else{
                        $("#loingay").html(ketqua);
                    }
                },
                error: function(xhr, status, error){
                    alert("Lỗi"+error);
                }
            });
        }else{
            var chonsan = [];
            var ngaybatdau = $("#ngaybatdau").val().trim();
            var ngayketthuc = $("#ngayketthuc").val().trim();
            $("input[name='chonsan[]']:checked").each(function() {
                chonsan.push($(this).val());
            });
            // alert("Selected Values: " + chonsan.join(", ") + ngaydatsan);
            $.ajax({
                url: 'view/datsantheongay/kiemtrangay.php',
                type: 'POST',
                data: {chonsan: chonsan,ngaybatdau: ngaybatdau, ngayketthuc: ngayketthuc},
                success: function(ketqua){
                    if(ketqua.trim() === "thanhcong"){
                        $("#loingay").html("");
                        e.target.submit(); // Gửi form hiện tại
                    }else{
                        $("#loingay").html(ketqua);
                    }
                },
                error: function(xhr, status, error){
                    alert("Lỗi"+error);
                }
            });
        }
    });
</script>

<?php
    header("Cache-Control: no-cache, must-revalidate"); // Khi từ trang order "click to go back" về trang lichdatsan thì form đã chọn vẫn còn
?>