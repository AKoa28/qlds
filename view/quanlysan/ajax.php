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
                                </tr>
                            </thead>
                            <tbody>
                                ';

                while($r = $dsdatsan->fetch_assoc()){
                    $ketqua .= '<tr>
                                    <td>' . $r["MaSan"] . '</td>
                                    <td>' . $r["TenSan"] . '</td>
                                    
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