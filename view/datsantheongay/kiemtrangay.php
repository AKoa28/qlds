<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $today = date('Y-m-d');
    session_start();
    include_once("../../controller/controller.php");
    include_once("../../model/model.php");
    require_once("../../mail/sendmail.php");
    if(isset($_REQUEST["ngaydatsan"]) && isset($_REQUEST["chonsan"])){
        $ps = new cdatsan();
        $pdc = new controller();
        $psgtkg = new csan_gia_thu_khunggio();
        $today = date('Y-m-d');
        $ngayyeucau = date('Y-m-d', strtotime($today . ' +7 days'));
        if(strtotime($_REQUEST["ngaydatsan"]) >= strtotime($ngayyeucau)){ // Ngày đặt phải lớn hơn ngày hiện tại và ngày đặt phải cách ngày hiện tại 7 ngày  
            $_SESSION["TTDS"]=[];
            $_SESSION["total"]=0;
            $mangsan = $_REQUEST["chonsan"];  // [0]=> mã sân,[1]=> tên sân,[0]=> mã địa điểm
            // echo count($_REQUEST["chonsan"]);
            // for($i=0;$i<count($_REQUEST["chonsan"]);$i++){ // lấy ra các sân khách chọn
            //     $catsan = explode("_",$_REQUEST["chonsan"][$i]); // cắt chuỗi - [0] là mã sân, [1] là tên sân
            //     $tblkiemtrangay = $ps->getdatsanvsctds($catsan[0],$_REQUEST["ngaydatsan"]);// gọi hàm kiểm tra ngày đó có người đặt chưa
            //     if($tblkiemtrangay){ // nếu có kết quả trả về
            //         while($r = $tblkiemtrangay->fetch_assoc()){
            //             if($r["TrangThai"]=="Đã duyệt"){ // nếu khung giờ 
            //                 echo "<p style='color: tomato;'>Ngày này sân đã được đặt</p>";
            //                 // break;
            //             }
            //         }
            //     }  
            // }
            
            foreach($mangsan as $arrsan){
                 // echo $arrsan;
                // $ngaythue = $_REQUEST["ngay"];
                $tongtien = 0;
                $makhunggio = [];
                $tenkhunggio = [];
                // $giobatdau_gioketthuc="";
                $catsan = explode("_",$arrsan);
                $tblkiemtrangay = $ps->getdatsanvsctds($catsan[0],$_REQUEST["ngaydatsan"]);// gọi hàm kiểm tra ngày đó có người đặt chưa
                if($tblkiemtrangay){ // nếu có kết quả trả về
                    while($r = $tblkiemtrangay->fetch_assoc()){
                        if($r["TrangThai"]=="Đã duyệt"){ // nếu khung giờ 
                            echo "<p style='color: #99FF66;'>Ngày này sân: ".$catsan[1]." đã được đặt</p>";
                            break;
                        }
                    }
                }  
                $ngaydat = date("Y-m-d H:i:s");
                $chuyensang_mathu = [
                    "Sunday" => "7",
                    "Monday" => "1",
                    "Tuesday" => "2",
                    "Wednesday" => "3",
                    "Thursday" => "4",
                    "Friday" => "5",
                    "Saturday" => "6"
                ];
                $ngaythue  = strtotime($_REQUEST["ngaydatsan"]);                 // Chuyển đổi ngày thành timestamp
                $ngaythue_chuyensangthu = date("l",$ngaythue);   // Lấy tên thứ bằng tiếng Anh
                $chuyensangmathu  = $chuyensang_mathu[$ngaythue_chuyensangthu];    // Tra cứu tên thứ bằng bảng mã
                $tblgiatheothuvsmasan = $psgtkg->getgiatheothuvsmasan($catsan[0],$chuyensangmathu);
                $tblkhunggiotheothuvsmasan = $psgtkg->getkhunggiotheothuvsmasan($catsan[0],$chuyensangmathu);
                if($tblgiatheothuvsmasan){
                    while($r = $tblgiatheothuvsmasan->fetch_assoc()){
                        if($r["Ngay"]==""){ // Nếu cột ngày là rỗng
                            $tongtien += $r["Gia"]; 
                        }else{ // nếu cột ngày có giá trị
                            $kiemtratrunggia = $pdc->getselectsanbykhunggio_san_thu($catsan[0],$chuyensangmathu,$r["KhungGio"]); //Kiểm tra trùng mã sân, thứ, khung giờ. Vì nó có 2 giá tiền khác nhau cộng vào sẽ sai giá
                            if($kiemtratrunggia){
                                while($rkttg = $kiemtratrunggia->fetch_assoc()){
                                    if($rkttg["Ngay"] == ""){ // Nếu cột ngày là rỗng thì trừ giá tiền đó ra
                                        $tongtien -= $rkttg["Gia"];
                                    }else{ // ngược lại thì cộng giá đó vào
                                        $tongtien += $rkttg["Gia"]; 
                                    }
                                }
                            }else{
                                echo "Lỗi kiem tra trùng giá 275";
                            }
                        }
                    }
                }else{
                    echo "error";
                }
                if($tblkhunggiotheothuvsmasan){
                    while($r = $tblkhunggiotheothuvsmasan->fetch_assoc()){
                        $makhunggio[] = $r["KhungGio"];
                    }
                    foreach($makhunggio as $rmakg){
                        $tbltenkhunggio = $pdc->getselectkhunggiotheomakg($rmakg);
                        if($tbltenkhunggio){
                            while($rtkg = $tbltenkhunggio->fetch_assoc()){
                                $tenkhunggio[] = $rtkg["TenKhungGio"];
                            }
                        } 
                    }
                    for($i =0;$i < count($tenkhunggio);$i++){
                        $catthoigian = explode("-",$tenkhunggio[$i]);
                        if($i==0){
                            $giobatdau = $catthoigian[0];
                        }else{
                            $gioketthuc = $catthoigian[1];
                        }
                    }
                    //Array ( [0] => Mã sân [1] => Mã khách hàng [2] => Ngày lập hoá đơn [3] => Tổng tiền [4] => Mã địa điểm [5] => Ngày thuê  [6] => Giờ bắt đầu [7] => Giờ kết thúc  [8] => Tên sân ) 
                    if(isset($_SESSION["dangnhap"])){
                        $_SESSION["TTDS"][] = [$catsan[0],$_SESSION["dangnhap"],$ngaydat,$tongtien,$catsan[2],$_REQUEST["ngaydatsan"],$giobatdau,$gioketthuc,$catsan[1]];
                    }else{
                        $_SESSION["TTDS"][] = [$catsan[0],"",$ngaydat,$tongtien,$catsan[2],$_REQUEST["ngaydatsan"],$giobatdau,$gioketthuc,$catsan[1]]; 
                    }
                }else{
                    echo "error";
                }
            }
            if(!empty($_SESSION["TTDS"])){ // nếu mảng không rỗng
                echo "thanhcong";
            }
        }else{
            echo "<p style='color: #FF9933;'>Ngày đặt phải được đặt trước 7 ngày</p>";
        }
    }else{
        $ps = new cdatsan();
        $pdc = new controller();
        $psgtkg = new csan_gia_thu_khunggio();
        $today = date('Y-m-d');
        $ngayyeucau = date('Y-m-d', strtotime($today . ' +7 days'));
        if(strtotime($_REQUEST["ngaybatdau"]) < strtotime($_REQUEST["ngayketthuc"]) && strtotime($_REQUEST["ngaybatdau"]) >= strtotime($ngayyeucau)){ // Ngày đặt phải lớn hơn ngày hiện tại và ngày đặt phải cách ngày hiện tại 7 ngày  
            $_SESSION["TTDS"]=[];
            $_SESSION["total"]=0;
            $mangsan = $_REQUEST["chonsan"];  // [0]=> mã sân,[1]=> tên sân,[0]=> mã địa điểm
            foreach($mangsan as $arrsan){
                
                $arrngaythue = [];
                $ngaybatdat = $_REQUEST["ngaybatdau"];
                $ngayketthuc = $_REQUEST["ngayketthuc"];
                $batdau = strtotime($ngaybatdat);
                $ketthuc = strtotime($ngayketthuc);
                while ($batdau <= $ketthuc) {
                    $arrngaythue[] =  date('Y-m-d', $batdau);
                    $batdau = strtotime('+1 day', $batdau); //Lặp qua từng ngày bằng cách tăng timestamp mỗi lần 1 ngày (+1 day).
                }
                // print_r($arrngaythue);
                
                $makhunggio = [];
                $tenkhunggio = [];
                
                // $giobatdau_gioketthuc="";
                $catsan = explode("_",$arrsan);
                $ngaydat = date("Y-m-d H:i:s");
                $chuyensang_mathu = [
                    "Sunday" => "7",
                    "Monday" => "1",
                    "Tuesday" => "2",
                    "Wednesday" => "3",
                    "Thursday" => "4",
                    "Friday" => "5",
                    "Saturday" => "6"
                ];
                $arrgia = [];
                $arrgbtgkt = [];
                foreach($arrngaythue as $nt){
                    $tongtien = 0;
                    $ngaythue  = strtotime($nt);                 // Chuyển đổi ngày thành timestamp
                    $ngaythue_chuyensangthu = date("l",$ngaythue);   // Lấy tên thứ bằng tiếng Anh
                    $chuyensangmathu  = $chuyensang_mathu[$ngaythue_chuyensangthu];    // Tra cứu tên thứ bằng bảng mã
                    $tblgiatheothuvsmasan = $psgtkg->getgiatheothuvsmasan($catsan[0],$chuyensangmathu);// mảng gia theo thứ va mã sân trong bảng san_gia_thu_khunggio, để tính tổng tiền
                    $tblkhunggiotheothuvsmasan = $psgtkg->getkhunggiotheothuvsmasan($catsan[0],$chuyensangmathu);// lấy mã khung giờ đầu tiên và cuối cùng trong bảng san_gia_thu_khunggio, để lấy giờ bắt đầu và giờ kết thúc
                    if($tblgiatheothuvsmasan){
                        while($r = $tblgiatheothuvsmasan->fetch_assoc()){
                            if($r["Ngay"]==""){ // Nếu cột ngày là rỗng
                                $tongtien += $r["Gia"]; 
                            }else{ // nếu cột ngày có giá trị
                                $kiemtratrunggia = $pdc->getselectsanbykhunggio_san_thu($catsan[0],$chuyensangmathu,$r["KhungGio"]); //Kiểm tra trùng mã sân, thứ, khung giờ. Vì nó có 2 giá tiền khác nhau cộng vào sẽ sai giá
                                if($kiemtratrunggia){
                                    while($rkttg = $kiemtratrunggia->fetch_assoc()){
                                        if($rkttg["Ngay"] == ""){ // Nếu cột ngày là rỗng thì trừ giá tiền đó ra
                                            $tongtien -= $rkttg["Gia"];
                                        }else{ // ngược lại thì cộng giá đó vào
                                            $tongtien += $rkttg["Gia"]; 
                                        }
                                    }
                                }else{
                                    echo "Lỗi kiem tra trùng giá 275";
                                }
                            }
                        }
                    }else{
                        echo "error";
                    }
                    if($tblkhunggiotheothuvsmasan){
                        while($r = $tblkhunggiotheothuvsmasan->fetch_assoc()){
                            $makhunggio[] = $r["KhungGio"];
                        }
                        foreach($makhunggio as $rmakg){
                            $tbltenkhunggio = $pdc->getselectkhunggiotheomakg($rmakg);// lấy tên khung giờ theo mã khung giờ
                            if($tbltenkhunggio){
                                while($rtkg = $tbltenkhunggio->fetch_assoc()){
                                    $tenkhunggio[] = $rtkg["TenKhungGio"];
                                }
                            } 
                        }
                        for($i = 0;$i < count($tenkhunggio);$i++){ //duyệt mảng tên khung giờ
                            $catthoigian = explode("-",$tenkhunggio[$i]); // cắt khung giờ
                            if($i==0){
                                $giobatdau = $catthoigian[0];
                            }else{
                                $gioketthuc = $catthoigian[1];
                            }
                        }
                    }else{
                        echo "error";
                    }
                    //Array ( [0] => Mã sân [1] => Mã khách hàng [2] => Ngày lập hoá đơn [3] => Tổng tiền [4] => Mã địa điểm [5] => Ngày thuê  [6] => Giờ bắt đầu [7] => Giờ kết thúc  [8] => Tên sân ) 
                    if(isset($_SESSION["dangnhap"])){
                        $_SESSION["TTDS"][] = [$catsan[0],$_SESSION["dangnhap"],$ngaydat,$tongtien,$catsan[2],$nt,$giobatdau,$gioketthuc,$catsan[1]];
                    }else{
                        $_SESSION["TTDS"][] = [$catsan[0],"",$ngaydat,$tongtien,$catsan[2],$nt,$giobatdau,$gioketthuc,$catsan[1]];
                    }
                }
            }
            if(!empty($_SESSION["TTDS"])){ // nếu mảng không rỗng
                echo "thanhcong";
            }
        }else{
            echo "<p style='color: #FF9933;'>Ngày đặt phải được đặt trước 7 và ngày kết thúc phải lớn hơn và không trùng ngày bắt đầu</p>";
        }
    }

?>
