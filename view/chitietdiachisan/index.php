<?php
    $masan = $_REQUEST["masan"];
    $p = new controller();
    $tbldiachi = $p->getselectdiachisan();
    while($r = $tbldiachi->fetch_assoc()){
        $arraydiachi [] = $r["MaDiaDiem"];
        if($r["MaDiaDiem"] == $masan){
            $tendiachi = $r["TenDiaDiem"];
            $diadiem = $r["DiaChi"];
            $hinhdaidien = $r["HinhDaiDien"];
            $mota = $r["MoTa"];
        }
    }
    if(isset($_REQUEST["masan"]) && !in_array($_REQUEST["masan"],$arraydiachi)){
            echo "<script> alert('Địa chỉ sân không tồn tại hoặc ngưng hoạt động'); </script>";
            header("refresh: 0; url='index.php'");
        }
?>
<div class="container section_phu">
<section class="hero-section">
    <div class="list-bar container">
      <h2><?= $tendiachi ?></h2><br>
      <div class="row">
        <div class="col-md-7">
            <img src="image/<?= $hinhdaidien ?>" class="image-chitiet" alt="">
        </div>
        <div class="col-md-5">
            <a href="?page=lichdatsan&masan=<?=$masan?>"><button class="btn btn-success">Đặt Lịch</button></a>
            <a href="?page=lichdatsan&masan=<?=$masan?>"><button class="btn btn-success">Đặt lịch ngày</button></a>
        </div>
       </div>      
    </div>
</section>
</div>