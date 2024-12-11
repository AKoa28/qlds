<?php
    include_once("controller/controller.php");
    $ls = new cloaisan();
    $tblloaisan = $ls->getselectallloaisan();

    if (isset($_POST["subthemloaisan"])) {
        $tenLoaiSan = $_POST["ten"];
        $pp = new cloaisan();
        $kq = $pp->cInsertLoaiSan($tenLoaiSan);
    
        if ($kq === "duplicate") {
            echo "<script>alert('Tên loại sân đã tồn tại!')</script>";
        } elseif ($kq) {
            echo "<script>alert('Thêm loại sân thành công!')</script>";
            header("refresh:0; url='?page=quanlyloaisan'");
            exit;
        } else {
            echo "<script>alert('Thêm loại sân thất bại!')</script>";
            header("refresh:0; url='?page=quanlyloaisan'");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Loại Sân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .odd-row { background-color: #f2f2f2; }
        .even-row { background-color: #ffffff; }
        .fixed-button { position: fixed; bottom: 20px; right: 20px; z-index: 1000; color: #F8F8FF; background-color: #0D6EFD; }
        .error { color: red; font-size: 0.875em; }
        .search-input {
            height: 60px;
            border: 2px solid #0D6EFD; /* Màu viền nổi bật */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Hiệu ứng đổ bóng */
            }
        .search-btn {
            height: 60px;
        }
    </style>
</head>
<body>
    <div class="container section_phu">
        <h2 class="mb-4">Quản lý loại sân</h2>
        <table class="table table-bordered" id="LoaiSanTable">
            <thead>
                <tr>
                    <th>Mã Loại Sân</th>
                    <th>Tên Loại Sân</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $row_count = 0;
                    while ($r = $tblloaisan->fetch_assoc()) {
                        $row_loaisan = ($row_count % 2 == 0) ? 'even-row' : 'odd-row';
                        echo "<tr class='$row_loaisan'>";
                        echo "<td>" .$r["MaLoai"]. "</td>";
                        echo "<td>" .$r["TenLoaiSan"]. "</td>";
                        echo "<td>
                        <a href='?page=sualoaisan&maLoai=" .$r["MaLoai"]. "' class='btn btn-warning btn-sm me-2'><i class='bi bi-pencil'></i> Sửa</a>
                        <a href='?page=xoaloaisan&maLoai=" .$r["MaLoai"]. "'' class='btn btn-danger btn-sm me-2' onclick='return confirm(\"Bạn có chắc muốn xoá không?\")'><i class='bi bi-pencil'></i>Xoá</a>
                        </td>";
                        $row_count++;
                    }
                ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-success fixed-button" data-bs-toggle="modal" data-bs-target="#addLoaiSanModal"><i class="bi bi-plus"></i> Thêm Loại Sân</button>
    </div>

    <div class="modal fade" id="addLoaiSanModal" tabindex="-1" aria-labelledby="addLoaiSanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLoaiSanLabel">Thêm Loại Sân</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="addLoaiSanError" class="alert alert-danger d-none"></div>
                    <form id="addLoaiSanForm" method="POST" action="#">
                        <input type="hidden" name="action" value="addLoaiSan">
                        <div class="mb-3">
                            <label for="ten" class="form-label">Tên Loại Sân</label>
                            <input type="text" class="form-control" id="ten" name="ten" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="subthemloaisan">Thêm Loại Sân</button>
                    </form>
                </div>
                
                <!-- Kiểm tra trùng loại sân thêm vào -->
                <?php
                    
                ?>
            </div>
        </div>
         
        
 
</body>
</html>
