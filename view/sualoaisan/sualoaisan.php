<?php
    include_once("controller/controller.php");

    // Kiểm tra xem có tham số maLoai không, nếu có thì lấy thông tin loại sân từ cơ sở dữ liệu
    if (isset($_GET['maLoai'])) {
        $maLoai = $_GET['maLoai'];
        $ls = new cloaisan();
        // Lấy thông tin loại sân theo maLoai
        $result = $ls->getselectallloaisan();
        $loaisan = null;
        
        while ($r = $result->fetch_assoc()) {
            if ($r["MaLoai"] == $maLoai) {
                $loaisan = $r;
                break;
            }
        }
    }

    // Nếu có yêu cầu cập nhật thông tin
    if (isset($_POST["subsualoaisan"])) {
        $tenLoaiSan = $_POST["ten"];
        $maLoai = $_POST["maLoai"];

        $pc = new cloaisan();
        $kq = $pc->cUpdateLoaiSan($maLoai, $tenLoaiSan); // Gọi phương thức sửa thay vì thêm mới

        if ($kq === "duplicate") {
            echo "<script>alert('Tên loại sân đã tồn tại!')</script>";
        } elseif ($kq) {
            echo "<script>alert('Sửa loại sân thành công!')</script>";
            header("refresh:0; url='?page=quanlyloaisan'");
            exit;
        } else {
            echo "<script>alert('Sửa loại sân thất bại!')</script>";
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
    <title>Sửa Loại Sân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Sửa Loại Sân</h2>
        <?php if ($loaisan): ?>
            <form method="POST" action="">
                <input type="hidden" name="maLoai" value="<?php echo $loaisan['MaLoai']; ?>">
                <div class="mb-3">
                    <label for="ten" class="form-label">Tên Loại Sân</label>
                    <input type="text" class="form-control" id="ten" name="ten" value="<?php echo $loaisan['TenLoaiSan']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="subsualoaisan">Lưu thay đổi</button>
                <a href="?page=quanlyloaisan" class="btn btn-secondary">Hủy bỏ</a>
            </form>
        <?php else: ?>
            <p>Loại sân không tồn tại!</p>
        <?php endif; ?>
    </div>
</body>
</html>
