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
      background-color: rgba(0,0,0,0.25);
      content: "";
      position: fixed;
      top: 0px;
      right: 0px;
      bottom: 0px;
      left: 0px;
      z-index: -1;
}
</style>
<div class="container ds">
  <section class="hero-section">
    <div class="container">
      
      <div class="row justify-content-center mb-5">
        <div class="col-md-6">
          <form class="d-flex" method="POST">
            <input class="form-control bg-body-secondary me-2" name="txtTim" type="search" placeholder="Tìm kiếm tên địa điểm" aria-label="Search">
            <button class="btn btn-success w-25" type="submit" name="subTim">Tìm kiếm</button>
          </form>
        </div>
      </div>
      <!-- <h1 class="text-center">DANH SÁCH CÁC ĐỊA ĐIỂM SÂN HIỆN TẠI</h1><br> -->
      <div class="row justify-content-center">
        <div class="col-md-10" id="hienthidanhsach">
          <?php
            $p = new controller();
            if(isset($_REQUEST["trang"])){
                $trang = $_REQUEST["trang"];
                $limit = 2;
                $offset = ($trang - 1) * $limit;
                $tbldsdiachi = $p->getdiachisanPhanTrang($limit,$offset);
                if(isset($_REQUEST["subTim"])){
                  $tendiadiem = $_REQUEST["txtTim"];
                  $tbldsdiachi = $p->getdiachitheoTen($tendiadiem);
                }
            }elseif(isset($_REQUEST["subTim"])){
                $tendiadiem = $_REQUEST["txtTim"];
                $tbldsdiachi = $p->getdiachitheoTen($tendiadiem);
            }else{
                $tbldsdiachi = $p->getdiachisanPhanTrang("2","0");
            }


            if ($tbldsdiachi === -1) {
                echo "Lỗi";
            } elseif ($tbldsdiachi === 0) {
                echo "Không có địa chỉ sân";
            } else {
                while ($r = $tbldsdiachi->fetch_assoc()) {
                    echo'
                          <div class="row list-bar mb-4 g-0 position-relative">
                            <div class="col-md-6 mb-md-0 p-md-4">
                                <img src="image/'.$r["HinhDaiDien"].'" class="img-fluid rounded  " alt="...">
                            </div>
                            <div class="col-md-6 p-4 ps-md-0">
                                <h5 class="mt-0">'.$r["TenDiaDiem"].'</h5>
                                <p><i class="bi bi-geo-alt-fill">'.$r["DiaChi"].'</i></p>
                                <a href="?page=chitietdiachisan&masan='.$r["MaDiaDiem"].'"><button class="btn btn-success">Xem chi tiết</button></a>
                            </div>
                          </div>
                    ';
                }
            }
          ?>
         </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-7 text-center">
            <?php
              $tbldiachi = $p->getdemsoluongdiadiem();
              if ($tbldiachi === -1) {
                echo "Lỗi";
              } elseif ($tbldiachi === 0) {
                echo "Không có địa điểm sân";
              } else {
                if(!isset($_REQUEST["subTim"])){
                  while ($r = $tbldiachi->fetch_assoc()) {
                    $soluongdiadiem = $r["dem"];
                  }
                  $sotrang = ceil($soluongdiadiem / 2);
                  echo '
                        <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center" id="pagination">
                          <li class="page-item">
                            <a class="page-link" href="?page=home&trang=1"><<</a>
                          </li>
                  ';
                  for ($i = 1; $i <= $sotrang; $i++) {
                    echo '
                          <li class="page-item">
                            <a class="page-link" href="?page=home&trang='.$i.'">'.$i.'</a>
                          </li>
                    ';
                  }
                  echo '
                            <li class="page-item">
                              <a class="page-link" href="?page=home&trang='.$sotrang.'">>></a>
                            </li>
                          </ul>
                        </nav>
                  ';
                }
                
              }
            ?>
        </div>
      </div>
    </div>
  </section>
</div>
