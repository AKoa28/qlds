
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <title>Nhóm 9</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Đặt sân Nhóm 9</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
            if(isset($_REQUEST["page"]) && $_REQUEST["page"]=="chusan" || isset($_REQUEST["chusandangnhap"])){
              echo '
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?chinhsach">Chính sách</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="?page=chusan">Dành cho chủ sân</a>
                </li>
              ';
            }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlykhachhang"){
              echo '
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?chinhsach">Chính sách</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="?page=chusan">Dành cho chủ sân</a>
                </li>
              ';
            }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlynhanvien"){
              echo '
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?chinhsach">Chính sách</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="?page=chusan">Dành cho chủ sân</a>
                </li>
              ';
            }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlysan"){
              echo '
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?chinhsach">Chính sách</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="?page=chusan">Dành cho chủ sân</a>
                </li>
              ';
            }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlyloaisan"){
              echo '
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?chinhsach">Chính sách</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="?page=chusan">Dành cho chủ sân</a>
                </li>
              ';
            }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlylichdatsan"){
              echo '
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?chinhsach">Chính sách</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="?page=chusan">Dành cho chủ sân</a>
                </li>
              ';
            }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlydoanhthu"){
              echo '
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?chinhsach">Chính sách</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="?page=chusan">Dành cho chủ sân</a>
                </li>
              ';
            }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="themdiadiem"){
              echo '
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?chinhsach">Chính sách</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="?page=chusan">Dành cho chủ sân</a>
                </li>
              ';
            }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="nhanvienhethong" || isset($_REQUEST["dangnhapnvht"])){
              echo '
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?chinhsach">Chính sách</a>
                </li>
               <li class="nav-item">
                  <a class="nav-link active" href="?page=nhanvienhethong">Nhân viên hệ thống</a>
                </li>
              ';
            }
            
            elseif(isset($_REQUEST["dangnhap"]) || isset($_REQUEST["dangky"])){
              echo '
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?chinhsach">Chính sách</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?page=chusan">Dành cho chủ sân</a>
                </li>
              ';
            }elseif(isset($_REQUEST["chinhsach"]) && !isset($_SESSION["dangnhap"]) && !isset($_SESSION["nhanvienhethong"]) && !isset($_SESSION["chusan"]) && !isset($_SESSION["nhanvien"])){
              echo '
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="?chinhsach">Chính sách</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?page=chusan">Dành cho chủ sân</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link " href="?page=nhanvienhethong">Nhân viên hệ thống</a>
                </li>
              ';
            }elseif(isset($_SESSION["dangnhap"])){
                echo '
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?chinhsach">Chính sách</a>
                  </li>
                ';
            }else{
              if(isset($_SESSION["nhanvienhethong"])){
                echo '
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?chinhsach">Chính sách</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link " href="?page=nhanvienhethong">Nhân viên hệ thống</a>
                </li>
                ';
              }elseif(isset($_SESSION["chusan"]) || isset($_SESSION["nhanvien"])){
                echo '
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?chinhsach">Chính sách</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?page=chusan">Dành cho chủ sân</a>
                  </li>
                ';
              }else{
                echo '
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?chinhsach">Chính sách</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?page=chusan">Dành cho chủ sân</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link " href="?page=nhanvienhethong">Nhân viên hệ thống</a>
                </li>
                ';
              }
                
            }
          ?>
          
        </ul>
        <?php
          if(isset($_SESSION["dangnhap"])){
              echo '<a href="?thongtinkhachhang" style="text-decoration: none; color: white"><i class="bi bi-person-circle"> </i>'.$_SESSION["tenkhachhang"].'</a>&nbsp;&nbsp;&nbsp;';
              echo '<a href="?dangxuat" ><button class="btn btn-danger">Đăng xuất</button></a>';
          }elseif(isset($_SESSION["chusan"])){
              echo '<a href="?thongtinchusan" style="text-decoration: none; color: white"><i class="bi bi-person-circle"> </i>'.$_SESSION["ten"].'</a>&nbsp;&nbsp;&nbsp;';
              echo '<a href="?dangxuat" ><button class="btn btn-danger">Đăng xuất</button></a>';
          }elseif(isset($_SESSION["nhanvienhethong"]) ){
            echo '<a href="?thongtinkhachhang" style="text-decoration: none; color: white"><i class="bi bi-person-circle"> </i>'.$_SESSION["tennhanvienhethong"].'</a>&nbsp;&nbsp;&nbsp;';
            echo '<a href="?dangxuat" ><button class="btn btn-danger">Đăng xuất</button></a>';
          }elseif(isset($_SESSION["nhanvien"])){
            echo '<a href="?thongtinnhanvien" style="text-decoration: none; color: white"><i class="bi bi-person-circle"> </i>'.$_SESSION["ten"].'</a>&nbsp;&nbsp;&nbsp;';
            echo '<a href="?dangxuat" ><button class="btn btn-danger">Đăng xuất</button></a>';
        }else{
              echo '<a href="?dangnhap"><button class="btn btn-warning">Đăng nhập</button></a>';
          }
        ?>
      </div>
    </div>
  </nav>
  <!-- <li class="nav-item">
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
    <a class="nav-link" href="?page=chusan">Dành cho chủ sân</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="">Liên hệ</a>
  </li> -->