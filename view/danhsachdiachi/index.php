
<section class="hero-section text-center">
    <div class="list-bar container">
      <h1 >DANH SÁCH CÁC ĐỊA CHỈ SÂN HIỆN TẠI</h1><br>
      <div class="row">
        <?php
            // include_once("controller/controller.php");
            $p = new controller();
            $tbldiachi = $p -> getselectdiachisan();
            if($tbldiachi===-1){
                echo "Lỗi";
            }elseif($tbldiachi==0){
                echo "Không có địa chỉ sân";
            }else{
                while($r = $tbldiachi->fetch_assoc()){
                   echo '
                       <div class="col-md-4 "><a href="?page=chitietdiachisan&masan='.$r["MaDiaDiem"].'">
                        <figure class=" figure  p-2 ">
                            <img src="image/'.$r["HinhDaiDien"].'" class="figure-img img-fluid rounded  " alt="">
                            <figcaption class=" figure-caption single-line-ellipsis limited-text"><h6>'.$r["TenDiaDiem"].'</h6><br><i class="bi bi-geo-alt-fill">'.$r["DiaChi"].'</i></figcaption>
                            <button class="btn btn-success">Xem chi tiết</button>
                        </figure></a></div>
                   ';
                }
            }
        ?>
            <div class="col-md-4">
                <a href="?page=chitietsan&masan=">
                    <figure class="figure p-2">
                        <img src="image/diachi1.jpg" class="figure-img img-fluid rounded " alt="">
                        <figcaption class="figure-caption single-line-ellipsis limited-text"><h6>Sân 1Sân 1Sân 1Sân 1Sân 1Sân 1Sân 1Sân 1Sân 1Sân 1Sân 1</h6><br><i class="bi bi-geo-alt-fill">123 nguyễn văn nghi p4 go vấp tp hồ chí minh</i></figcaption>
                        <button class="btn btn-success">Xem chi tiết</button>
                    </figure>
                </a>
            </div>

            <div class="col-md-4">
                <a href="?page=chitietsan&masan=">
                    <figure class="figure p-2">
                        <img src="image/diachi1.jpg" class="figure-img img-fluid rounded " alt="">
                        <figcaption class="figure-caption"><h6>Sân 1</h6></figcaption>
                        <button class="btn btn-primary">Xem chi tiết</button>
                    </figure>
                </a>
            </div>
       </div>      
    </div>
  </section>

  <!-- <section class="cta-section text-center">
    <h2>Bạn có muốn đăng ký tài khoản để hưởng được những quyền lợi tốt nhất khi đặt sân</h2>
    <div class="container">
      <form class="row justify-content-center" method="POST">
        <div class="col-md-3">
          <input type="text" class="form-control m-1" placeholder="Họ & tên *" name="txtname">
        </div>
        <div class="col-md-3">
          <input type="text" class="form-control m-1" placeholder="Số điện thoại *" name="txtpass">
        </div>
        <div class="col-md-3">
          <input type="email" class="form-control m-1" placeholder="Email" name="txtemail">
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary w-100 m-1" name="subregister">Gửi</button>
        </div>
      </form>
    </div>
  </section> -->