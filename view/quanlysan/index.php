<div class="section_phu">
    <form method="post" action="?page=themsan">
        <?php
        // header("refresh:0");
        include_once("controller/controller.php");
        $p = new controller();
        if (isset($_SESSION["chusan"])) {
            $machusan = $_SESSION["chusan"];
            $tbldiadiem = $p->getselectdiachisan($machusan);
        } else {
            $madiadiem = $_SESSION["madiadiem"];
            $tbldiadiem = $p->getdiadiemsantheomadiadiem($madiadiem);
        }


        if (!$tbldiadiem) {
            echo "Lỗi";
        } elseif ($tbldiadiem === 0) {
            echo "Không có địa điểm";
        } else {
            echo '<div class="container-fluid bg-body-secondary ">
                <div class="row pt-3 pb-3 justify-content-center">
                    <div class="col-md-12" align="center">
                        <h3>Quản lý lịch sân của địa chỉ</h3>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-6 pt-3 pb-3">
                            <select name="cbxdiadiem" id="cbxdiadiem"  onclick="getdiachi(this.value,this.name)" class="form-select" aria-label="Default select example" required>
                                <option value="" selected disabled>Chọn địa chỉ</option>';
            while ($r = $tbldiadiem->fetch_assoc()) {
                echo '<option value="' . $r["MaDiaDiem"] . '">' . $r["TenDiaDiem"] . '</option>';
            }
            echo '</select>
                    </div>
                    <div class="col-md-3 pt-3 pb-3">';

            if(isset($_SESSION["chusan"])){
                echo '<button type="submit" class="btn btn-success "><i class="bi bi-plus"></i>Thêm sân</button>';
            }
            
            echo  '</div></div>
                ';
            echo '<div id="div1"></div>';
            echo '<div id="div2"></div>';
            echo '';
        }

        ?>
        
    </form>
</div>
<script>

    function getdiachi(madiadiem, tencbx) {
        $.ajax({
            url: 'view/quanlysan/ajax.php',
            type: 'POST',
            data: { madiadiem: madiadiem, tencbx: tencbx },
            success: function (ketqua) {
                $('#div1').html(ketqua);
            }
        });
    }

</script>
