<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $today = date('Y-m-d');
    session_start();
    include_once("../../controller/controller.php");
    include_once("../../model/model.php");
    require_once("../../mail/sendmail.php");
    if($_REQUEST["madiadiem"] != null){
        if($_REQUEST["tencbx"]=="cbxdiadiem" ){
            $ketqua = "";
            $madiadiem = $_REQUEST["madiadiem"];
            $p = new controller();
            $dsdatsan = $p -> getselectallsan($madiadiem);
            if($dsdatsan){
                $ketqua .='<table class="table table-striped align-middle" id="customerTable">
                            <thead class="table-success">
                                <tr>
                                    <th>Mã Sân</th>
                                    <th>Tên Sân</th>
                                    <th>Loại sân</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                ';

                while($r = $dsdatsan->fetch_assoc()){
                    if($r["HienThi"] != 0){
                        $ketqua .= '<tr>
                                    <td>' . $r["MaSan"] . '</td>
                                    <td>' . $r["TenSan"] . '</td>
                                    <td>' . $r["TenLoaiSan"] . '</td>
                                    <td><a type="button" class="btn btn-primary" href="?page=xemchitietsan&madd='.$madiadiem.'&mas='.$r["MaSan"].'">Xem chi tiết</a>
                                        <a type="button" class="btn btn-warning" href="?page=suathongtinsan&madd='.$madiadiem.'&mas='.$r["MaSan"].'">Sửa thông tin</a></td>
                                    <td><a type="button" class="btn btn-danger" href="?page=xoasan&madd='.$madiadiem.'&mas='.$r["MaSan"].'" onclick="return confirm(\'Bạn có chắc chắn muốn Xoá?\')">Xoá sân</a></td>
                        ';
                    }
                }
                $ketqua .= '
                                
                            </tbody>
                        </table>
                ';
                
                echo $ketqua;
            }else{
                $ketqua .='<table class="table table-striped align-middle" id="customerTable">
                            <thead class="table-success">
                                <tr>
                                    <th>Mã Sân</th>
                                    <th>Tên Sân</th>
                                    <th>Loại sân</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                        </table>
                                ';
                echo $ketqua;
            }
            
            
        }
    }else{
        echo "";
    }

?>