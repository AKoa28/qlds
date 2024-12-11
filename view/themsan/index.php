<?php
    if(!isset($_SESSION["chusan"])){
        header("Location: ?page=chusan");
    }else{
        
        $p = new controller();
        $kiemtramaddcuacs = $p->getktsohuusan($_REQUEST["madd"]);
        if($kiemtramaddcuacs){
            $tblloaisan = $p -> getselectloaisan();
            $tblloaikhunggio = $p ->getdiadiemsantheomadiadiem($_REQUEST["madd"]);
            if($tblloaikhunggio){
                while($r=$tblloaikhunggio->fetch_assoc()){
                    $maloaikhunggio = $r["LoaiKhungGio"];
                }
            }
            echo '
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 section_phu bg-body-secondary">
                                <div class="row justify-content-center mt-5">
                                    <h3 class="text-center">Thêm Sân</h3>
                                        <form action="" method="post" id="formsuathongtin" class="row justify-content-center" enctype="multipart/form-data">
                                        <div class="col-md-7">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="txttensan" class="form-control" id="floatingInput" placeholder="" required>
                                                <label for="floatingInput">Tên Sân</label>
                                            </div> 
                                            <div class="form-label mb-3">
                                                <select name="cbxloai" id="cbxloai" class="form-select" aria-label="Default select example" required>
                                                    <option value="" selected disabled>Chọn loại sân</option>        
            ';
                                    if($tblloaisan){
                                        while($rls=$tblloaisan->fetch_assoc()){
                                            echo '<option value="'.$rls["MaLoai"].'">'.$rls["TenLoaiSan"].'</option>';
                                        }
                                    }
            echo '                              </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Hình Đại diện</label>
                                                <input class="form-control" type="file" name="hinhanh" id="formFile">
                                            </div>
                                        </div>
                                        <div class="col-md-8 text-center" id="checkbox"><h6 class="">Khung giờ mở sân</h6>';
                                        
                        if($tblloaikhunggio){
                            $checkbox=0;
                            $tbllkg = $p->getselectkhunggio($maloaikhunggio);
                            if($tbllkg){
                                while($r=$tbllkg->fetch_assoc()){
                                    echo '  <input type="checkbox" name="chonkhunggio[]" value="'.$r["MaKhungGio"].'" width="auto" class="checkbox-input d-none" id="'.$checkbox.'">
                                            <label for="'.$checkbox.'" class="checkbox-label mb-2">'.$r["TenKhungGio"].'</label>';
                                    $checkbox++;
                                
                                }
                            }
                        }
                                   
            echo'                       
                                        </div>
                                        <div class="col-md-7 text-center" id="order"></div>
                                        </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            ';
            if(isset($_REQUEST["subts"])){
                $tensan = $_REQUEST["txttensan"];
                $maloaisan = $_REQUEST["cbxloai"];
                $filehinh = $_FILES["hinhanh"];
                $madiadiem = $_REQUEST["madd"];
                $khunggio = implode("-",$_REQUEST["chonkhunggio"]);
                $ps = new csan();
                $kiemtratrung = $ps->getKiemTraTrungSan($tensan,$maloaisan,$madiadiem);
                if($kiemtratrung===0){
                    $tblthemsan = $ps->getinsertsan($tensan, $maloaisan, $filehinh, $khunggio, $madiadiem);
                    if(!$tblthemsan){
                        echo '<script>alert("Lỗi!")</script>';
                    }elseif($tblthemsan===0){
                        echo '<script>alert("Lỗi hình!")</script>';
                    }else{
                        echo '<script>alert("Thêm sân thành công!")</script>';
                        header("refresh: 0.5; url='?page=xemchitietsan&madd=$madiadiem&mas=$tblthemsan'");
                    }
                }else{
                    echo '<script>alert("Sân đã được thêm rồi!")</script>';
                }
            }
        }else{
            header("Location: ?page=quanlysan");
        }
        
        
    }
    
?>
<script>
    $(".checkbox-input").change(function(){
        if($(this).is(":checked")){
            if($("#order").find("button").length===0){//kiểm tra có nút buuton chưa
                $('#order').append('<button type="submit" name="subts" class="btn btn-info mb-3" >Thêm sân</button>');
            }
        }else{
            if($(".checkbox-input:checked").length===0){// Kiểm tra không có checkbox nào được chọn
                $('#order').find('button').remove(); // Xóa nút thay đổi
            }
        }
            
    });
</script>