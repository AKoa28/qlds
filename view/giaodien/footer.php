<style>
  html, body {
      height: 100%;
      margin: 0;
  }

  .wrapper {
      min-height: 100%;
      display: flex;
      flex-direction: column;
  }

  .content {
      flex: 1;
  }

  footer {
      background-color: #f8f9fa;
      padding: 20px 0;
      position: relative;
      width: 100%;
      bottom: 0;
  }
  
</style>
<?php
  if(isset($_REQUEST["dangky"])){
    echo ''; 
  }elseif(isset($_REQUEST["chusandangnhap"])){
    echo '';
  }elseif(isset($_SESSION["chusan"]) || isset($_SESSION["nhanvien"])){
    echo '';
  }elseif(isset($_SESSION["dangnhap"])){
    echo '';
  }else{
    echo '
    
      <section class="cta-section text-center">
          <h2>Đăng ký tài khoản để hưởng được những quyền lợi tốt nhất khi đặt sân</h2>
          <h4>Bạn sẽ được ưu tiên xét duyệt đặt sân khi đặt sân bằng tài khoản của bạn</h4>
          <div class="z-3 container">
            <div class="row justify-content-center">
              <div class="col-md-2">
                <a href="?dangky"><button type="submit" class="btn btn-primary w-100 m-1" name="subregister">Đăng ký ngay</button></a>
              </div>
            </div>
          </div>
      </section>
    </div>
    ';
  }
?>
  <footer class="text-center text-md-start bg-success">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>GIỚI THIỆU</h5>
          <p>Đặt sân đá banh giúp cho bạn đặt sân một cách hiệu quả nhất.</p>
          <ul class="list-unstyled">
            <li><a href="#">Chính sách bảo mật</a></li>
            <li><a href="#">Chính sách huỷ (đổi trả)</a></li>
            <li><a href="#">Chính sách kiểm hàng</a></li>
            <li><a href="#">Chính sách thanh toán</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>THÔNG TIN</h5>
          <p><i class="bi bi-buildings"></i> Nhóm 9 - Phát triển ứng dụng</p>
          <ul class="list-unstyled">
            <li><i class="bi bi-envelope"></i> <b>Mail:</b> <a href="#">nhom9@gmail.com</a></li>
            <li><i class="bi bi-geo-alt"></i> <b>Địa chỉ:</b> <a href="#"> H4.2.1, 12 Nguyễn Văn Bảo, Phường 4, Gò Vấp, TP.Hồ Chí Minh</a></li>
            <li><i class="bi bi-telephone"></i> <b>Điện thoại:</b> <a href="#">0123456789</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>LIÊN HỆ</h5>
          <ul class="list-unstyled">
            <li>Chăm sóc khách hàng: <a href="#">Lý Anh Khoa</a></li>
            <li>Chăm sóc khách hàng: <a href="#">Trần Lê Trường Vũ</a></li>
            <li>Chăm sóc khách hàng: <a href="#">Nguyễn Ngọc Khánh</a></li>
            <li>Chăm sóc khách hàng: <a href="#">Vũ Lê Kha</a></li>
            <li>Chăm sóc khách hàng: <a href="#">Trần Thị Diễm Phương</a></li>
            <li>Chăm sóc khách hàng: <a href="#">Nguyễn Phi Thiên</a></li>
          </ul>
          
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </nav>
</body>
</html>