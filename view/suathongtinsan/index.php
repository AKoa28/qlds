<style>
    .btn-custom {
        width: 100%;
        color: #fff;
        background-color: #6c757d;
        border: none;
    }
    .btn-custom:hover {
        background-color: aliceblue;
        color:#333;
    }
    tr:hover{
        background-color: darkcyan;
    }
</style>
<div class="section_phu">
    <div class="col-md-12">
        <div class="row justify-content-center mt-5">
            <h3 class="text-center">Thay đổi thông tin sân</h3>
            <div class="col-md-7 text-center">
                <form action="" method="post" id="formsuathongtin" enctype="multipart/form-data">
                
    <?php
    
    if (!isset($_SESSION["chusan"])) {
        header("Location: ?page=chusan");
    }else{
        $pc = new controller();
        $diachi = $_REQUEST["madd"];
        $masanurl = $_REQUEST["mas"];
        $kiemtramaddcuacs = $pc->getktsohuusan($diachi,$masanurl);
        if($kiemtramaddcuacs){
            $tts = $pc->getselectsan($masanurl);
            $tblloaisan = $pc -> getselectloaisan();
            if($tts){
                while($r = $tts->fetch_assoc()){
                    $tensanhientai = $r["TenSan"];
                    $maloaisanhientai = $r["MaLoaiSan"];
                    $tenloaisanhientai = $r["TenLoaiSan"];
                    $hinhhientai = $r["Hinh"];
                }
                echo '
                        <div class="form-floating mb-3">
                            <input type="text" name="txttensan" class="form-control" id="disabledTextInput" placeholder="" value="'.$tensanhientai.'">
                            <label for="disabledTextInput">Tên sân</label>
                        </div>
                        <div class="form-label mb-3">
                            <label class="form-label" for="cbx">Loại sân</label>
                            <select name="cbxloai" id="cbxloai" class="form-select" id="cbx" aria-label="Default select example" required>
                ';
                    if($tblloaisan){
                        while($rls=$tblloaisan->fetch_assoc()){
                            if($rls["MaLoai"]==$maloaisanhientai){
                                echo '<option value="'.$rls["MaLoai"].'" selected>'.$rls["TenLoaiSan"].'</option>';
                            }else{
                                echo '<option value="'.$rls["MaLoai"].'">'.$rls["TenLoaiSan"].'</option>';
                            }
                            
                        }
                    }
                echo '
                            </select>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-6">
                                <label for="formFile" class="form-label">Hình Đại diện</label>
                                <input class="form-control" type="file" name="hinhanh" id="formFile">
                            </div>
                            <div class="col-md-6">
                                <img src="image/'.$hinhhientai.'" alt="" width="100%">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="subts" class="btn btn-info mb-3" >Sửa sân</button>
                        </div>
                    </div>
                ';
            }else{
                echo 'Sân không tồn tại';
            }
            
            
            if(isset($_REQUEST["subts"])){
                $tensan = $_REQUEST["txttensan"];
                $maloaisan = $_REQUEST["cbxloai"];
                // $filehinh = $_FILES["hinhanh"];
                $madiadiem = $_REQUEST["madd"];
                if($tensan==$tensanhientai && $maloaisan==$maloaisanhientai && $_FILES["hinhanh"]==""){
                    header("refresh:0");
                }else{
                    $ps = new csan();
                    if($tensan==$tensanhientai && $maloaisan==$maloaisanhientai && $_FILES["hinhanh"]!=""){
                        $tblcapnhatsan = $ps->getupdatesan($tensan, $maloaisan, $_FILES["hinhanh"], $hinhhientai, $masanurl);
                        if(!$tblcapnhatsan){
                            echo '<script>alert("Lỗi!")</script>';
                        }else{
                            echo '<script>alert("Sửa thành công!")</script>';
                            header("refresh: 0;");
                        }
                    }else{
                        
                        $kiemtratrung = $ps->getKiemTraTrungSan($tensan,$maloaisan,$madiadiem);
                        if($kiemtratrung===0){
                            $tblcapnhatsan = $ps->getupdatesan($tensan, $maloaisan, $_FILES["hinhanh"], $hinhhientai, $masanurl);
                            if(!$tblcapnhatsan){
                                echo '<script>alert("Lỗi!")</script>';
                            }else{
                                echo '<script>alert("Sửa thành công!")</script>';
                                header("refresh: 0;");
                            }
                        }else{
                            echo '<script>alert("Trùng thông tin!")</script>';
                        }
                    }
                    
                }
                
            }
        }else{
            header("Location: ?page=quanlysan");
        }
    }
    
    ?>     
            </form>
        </div>
    </div>
</div>


<?php
    $p = new csan_gia_thu_khunggio();
    if(isset($_REQUEST["subTDTTC"])){//chỉnh giá chung
        for($i=0;$i<sizeof($_SESSION["TTHD"]);$i++){
            $tt = $_SESSION["TTHD"][$i];
            $catmangtt = explode("_",$tt);
            $makhunggio = $catmangtt[1];
            $masan = $catmangtt[3];
            $gia = $_REQUEST["giamoi"];
            $mathu = $catmangtt[6]-1;
            $tblthaydoigiasan = $p -> getthaydoigiasan($masan,$gia,$makhunggio,$mathu);
            if(!$tblthaydoigiasan){
                echo "Lỗi ở vị trí số".$i;
            }
        }
        header("Location: ?page=xemchitietsan&madd=".$_REQUEST['madd']."&mas=".$_REQUEST['mas']);
    }elseif(isset($_REQUEST["subTDTTR"])){//chỉnh giá riêng
        for($i=0;$i<sizeof($_SESSION["TTHD"]);$i++){
            $tt = $_SESSION["TTHD"][$i];
            $catmangtt = explode("_",$tt);
            $makhunggio = $catmangtt[1];
            $masan = $catmangtt[3];
            $gia = $_REQUEST["giamoi$i"];;
            $mathu = $catmangtt[6]-1;
            $tblthaydoigiasan = $p -> getthaydoigiasan($masan,$gia,$makhunggio,$mathu);
            if(!$tblthaydoigiasan){
                echo "Lỗi ở vị trí số".$i;
            }
        }
        header("Location: ?page=xemchitietsan&madd=".$_REQUEST['madd']."&mas=".$_REQUEST['mas']);
    }elseif(isset($_REQUEST["subTD1TT"])){//chỉnh giá 1 thông tin
            $tt = $_SESSION["TTHD"][0];
            $catmangtt = explode("_",$tt);
            $makhunggio = $catmangtt[1];
            $masan = $catmangtt[3];
            $gia = $_REQUEST["giamoiTD1TT"];;
            $mathu = $catmangtt[6]-1;
            $tblthaydoigiasan = $p -> getthaydoigiasan($masan,$gia,$makhunggio,$mathu);
            if($tblthaydoigiasan){
                header("Location: ?page=xemchitietsan&madd=".$_REQUEST['madd']."&mas=".$_REQUEST['mas']);
            }else{
                echo "Thất bại";
            }
        
    }
?>
