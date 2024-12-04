<?php
    if(isset($_REQUEST["giatri"])){
        $mangds = explode("|",$_REQUEST["giatri"]);
        $str = "";
        for ($i = 0; $i < sizeof($mangds); $i++) {
            $thongtin = $mangds[$i];
            $catTTTD = explode("_",$thongtin);
            if($catTTTD[6]=="8"){
                $str .= '
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="tensan" class="form-control" id="disabledTextInput" placeholder="" value="'.$catTTTD[4].'">
                            <label for="disabledTextInput">Tên sân - Loại sân</label>
                        </div>
                    </fieldset>
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="khunggio" class="form-control" id="disabledTextInput" placeholder="" value="'.$catTTTD[2].'">
                            <label for="disabledTextInput">Khung Giờ</label>
                        </div>
                    </fieldset>
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="thu" class="form-control" id="disabledTextInput" placeholder="" value="Chủ nhật">
                            <label for="disabledTextInput">Thứ</label>
                        </div>
                    </fieldset>
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="giahientai" class="form-control" id="disabledTextInput" placeholder="" value="'.number_format($catTTTD[5],0,'.',',').' đ">
                            <label for="disabledTextInput">Giá hiện tại (VNĐ)</label>
                        </div>
                    </fieldset>
                    <div class="form-floating border-bottom border-danger border-5 mb-3 pb-2">
                        <input type="number" name="giamoi'.$i.'" class="form-control" id="floatingInput" placeholder="" min="0" required>
                        <label for="floatingInput">Giá Mới (VNĐ)</label>
                    </div>
                ';
            }else{
                $str .= '
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="tensan" class="form-control" id="disabledTextInput" placeholder="" value="'.$catTTTD[4].'">
                            <label for="disabledTextInput">Tên sân - Loại sân</label>
                        </div>
                    </fieldset>
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="khunggio" class="form-control" id="disabledTextInput" placeholder="" value="'.$catTTTD[2].'">
                            <label for="disabledTextInput">Khung Giờ</label>
                        </div>
                    </fieldset>
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="thu" class="form-control" id="disabledTextInput" placeholder="" value="Thứ '.$catTTTD[6].'">
                            <label for="disabledTextInput">Thứ</label>
                        </div>
                    </fieldset>
                    <fieldset disabled>
                        <div class="form-floating mb-3">
                            <input type="text" name="giahientai" class="form-control" id="disabledTextInput" placeholder="" value="'.number_format($catTTTD[5],0,'.',',').' đ">
                            <label for="disabledTextInput">Giá hiện tại (VNĐ)</label>
                        </div>
                    </fieldset>
                    <div class="form-floating border-bottom border-danger border-5 mb-3 pb-2">
                        <input type="number" name="giamoi'.$i.'" class="form-control" id="floatingInput" placeholder="" min="0" required>
                        <label for="floatingInput">Giá Mới (VNĐ)</label>
                    </div>
                ';
            }

            
        }
        $str .= '<button type="submit" name="subTDTTR" class="btn btn-info mb-3">Lưu thông tin</button>';
        echo $str;
    }else{
        echo "";
    }
    
?>