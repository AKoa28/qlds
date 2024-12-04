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
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                ';

                while($r = $dsdatsan->fetch_assoc()){
                    $ketqua .= '<tr>
                                    <td>' . $r["MaSan"] . '</td>
                                    <td>' . $r["TenSan"] . '</td>
                                    <td>' . $r["TenLoaiSan"] . '</td>
                                    <td><a type="button" class="btn btn-primary" href="?page=xemchitietsan&madd='.$madiadiem.'&mas='.$r["MaSan"].'">Xem chi tiết</a></td>
                    ';
                    
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