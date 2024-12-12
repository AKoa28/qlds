<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $today = date('Y-m-d');
    session_start();
    include_once("../../controller/controller.php");
    include_once("../../model/model.php");
    require_once("../../mail/sendmail.php");
    if($_REQUEST["madiadiem"] != 0){
        if($_REQUEST["tencbx"]=="cbxdiadiem" ){
            $ketqua = "";
            $madiadiem = $_REQUEST["madiadiem"];
            $p = new cdatsan();
            $dsdatsan = $p -> getXemdslichdat($madiadiem);
            if($dsdatsan->num_rows > 0){
                $ketqua .='<table class="table table-striped align-middle" id="customerTable">
                            <thead class="table-success">
                                <tr>
                                    <th>Mã Đặt Sân</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Mã Nhân Viên</th>
                                    <th>Ngày Đặt</th>
                                    <th>Trạng Thái</th>
                                    <th>Tổng Tiền</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                ';

                while($r = $dsdatsan->fetch_assoc()){
                    $ketqua .= '<tr>
                                    <td>' . $r["MaDatSan"] . '</td>
                                    <td>' . $r["Ten"] . '</td>
                                    <td>' . $r["MaNhanVien"] . '</td>
                                    <td>' . $r["NgayDat"] . '</td>
                    ';
                    if($r["TrangThai"] == "Ưu tiên"){
                        $ketqua.='<td style="color: green"><b>' . $r["TrangThai"] . '</b></td>';
                    }elseif($r["TrangThai"] == "Không duyệt"){
                        $ketqua.='<td style="color: red">' . $r["TrangThai"] . '</td>';
                    }else{
                        $ketqua.='<td>' . $r["TrangThai"] . '</td>';
                    }
                    
                    $ketqua .= '
                                    <td>' . number_format($r["TongTien"],0,".",",") . ' đ</td>
                    ';
                    if($r["TrangThai"] == "Đã duyệt" || $r["TrangThai"] == "Không duyệt"){
                        $ketqua .=  '
                                    <td>
                                        <a href="?page=quanlylichdatsan&cate=chitietdatsan&mads='.$r["MaDatSan"].'"><button type="button" class="btn btn-primary" >Chi tiết</button></a>
                                    </td></tr>
                        ';
                    }else{
                        $ketqua .=  '
                                    <td>
                                        <a href="?page=quanlylichdatsan&cate=chitietdatsan&mads='.$r["MaDatSan"].'"><button type="button" class="btn btn-primary" >Chi tiết</button></a>
                                        <a href="?page=quanlylichdatsan&cate=pheduyet&mads='.$r["MaDatSan"].'"><button type="button" class="btn btn-success" name="pheduyetds" onclick="return confirm(\'Bạn có đồng ý phê duyệt không? \')">Phê duyệt</button></a> 
                                <a href="?page=quanlylichdatsan&cate=khongduyet&mads='.$r["MaDatSan"].'"><button type="button" class="btn btn-warning" name="koduyetds" onclick="return confirm(\'Bạn có chắc không phê duyệt? \')">Không duyệt</button></a> 
                                        
                                    </td></tr>
                        ';
                    }
                }
                $ketqua .= '
                                
                            </tbody>
                        </table>
                ';
                
                echo $ketqua;
            }else{
                echo "Không có ai đặt lịch sân";
            }
            
            
        }
    }else{
        echo "";
    }

?>
