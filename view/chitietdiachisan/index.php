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
</style>
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
<div class="container section_phu ds">
<section class="hero-section">
    <div class="list-bar container">
      <h2><?= $tendiachi ?></h2><br>
      <div class="row">
        <div class="col-md-7">
            <img src="image/<?= $hinhdaidien ?>" class="image-chitiet" alt="">
        </div>
        <div class="col-md-5">
            <a href="?page=lichdatsan&masan=<?=$masan?>"><button class="btn btn-success">Đặt Lịch</button></a>
            <a href="?page=datsantheongay&masan=<?=$masan?>"><button class="btn btn-success">Đặt lịch ngày</button></a>
            <h4 class="mt-5">Các sân đang có</h4>
            <table width="50%" >
                <thead>
                    <tr>
                        <th>Tên sân</th>
                        <th>Loại sân</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $dsdatsan = $p -> getselectallsan($masan);
                        while($r = $dsdatsan->fetch_assoc()){
                            if($r["HienThi"]==1){
                                echo '  <tr>
                                            <td>'.$r["TenSan"].'</td>
                                            <td>'.$r["TenLoaiSan"].'</td>
                                        </tr>
                                ';
                                
                            }
                            
                        }
                    ?>
                </tbody>
            </table>
        </div>
       </div>      
    </div>
</section>
</div>