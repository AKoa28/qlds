<?php
    if (!isset($_SESSION["chusan"])) {
        header("Location: ?page=chusan");
        exit;
    }

    // Bao gồm tệp chứa lớp upload
    require_once 'controller/upload.php'; 

    // Xử lý form khi người dùng submit
    if (isset($_POST['subTDTT'])) {
        // Lấy thông tin từ form
        $maChuSan = $_SESSION["chusan"]; // Mã chủ sân
        $ten = $_POST['ten']; // Tên địa điểm
        $diachi = $_POST['diachi']; // Địa chỉ
        $mota = $_POST['xacnhanmk']; // Mô tả
        $loaiKhungGio = $_POST['loaiKhungGio']; // Loại khung giờ
        $file = $_FILES['formFile']; // Tệp hình đại diện

        // Khởi tạo đối tượng clskiemtraupload
        $upload = new clskiemtraupload();

        // Tạo tên tệp ngẫu nhiên
        $filename = uniqid('', true);  // Hoặc tên riêng mà bạn muốn

        // Biến để lưu tên tệp hình ảnh
        $hinh = "";

        // Gọi phương thức uploadhinh để xử lý upload
        $result = $upload->uploadhinh($file, $filename, $hinh);

        if ($result) {
            // Sau khi upload thành công, lưu vào cơ sở dữ liệu
            $controller = new cDiaDiem();
            $result = $controller->cThemDiaDiem($maChuSan, $ten, $diachi, $hinh, $mota, $loaiKhungGio);

            if ($result) {
                echo "<script>alert('Thêm địa điểm thành công!');</script>";
            } else {
                echo "<script>alert('Có lỗi xảy ra khi thêm địa điểm!');</script>";
            }
        } else {
            echo "<script>alert('Không thể tải lên tệp.');</script>";
        }
    }
?>


<div class="container">
    <div class="row">
        <div class="col-md-12 section_phu bg-body-secondary">
            <div class="row justify-content-center mt-5">
                <h3 class="text-center">Thêm Địa Điểm</h3>
                <div class="col-md-7">
                    <form action="" method="post" id="formsuathongtin" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" name="ten" class="form-control" id="floatingInput" placeholder="" required>
                            <label for="floatingInput">Tên địa điểm</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="diachi" class="form-control" id="floatingInput" placeholder="" required>
                            <label for="floatingInput">Địa chỉ</label>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Hình Đại diện</label>
                            <input class="form-control" type="file" name="formFile" id="formFile" required>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea name="xacnhanmk" class="form-control" id="floatingInput" placeholder="" required></textarea>
                            <label for="floatingInput">Mô tả</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="loaiKhungGio" class="form-control" id="floatingInput" required>
                                <option value="1" >1 tiếng</option>
                                <option value="2" selected>1 tiếng 30 phút</option>
                            </select>
                            <label for="floatingInput">Loại Khung Giờ</label>
                        </div>


                        <button type="submit" name="subTDTT" class="btn btn-info mb-3">Thêm địa điểm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
