
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đặt Sân Đá Banh</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Đặt Sân Đá Banh</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Giới thiệu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Chính sách</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Điều khoản</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Dành cho chủ sân</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Liên hệ</a>
          </li>
        </ul>
        <?php
          if(isset($_SESSION["dangnhap"])){
              echo '<a href="#" style="text-decoration: none; color: white"><i class="bi bi-person-circle"> </i>'.$_SESSION["tenkhachhang"].'</a>&nbsp;&nbsp;&nbsp;';
              echo '<a href="?dangxuat" ><button class="btn btn-danger">Đăng xuất</button></a>';
          }else{
            
              echo '<a href="?dangnhap"><button class="btn btn-warning">Đăng nhập</button></a>';
          }
        ?>
      </div>
    </div>
  </nav>

  

