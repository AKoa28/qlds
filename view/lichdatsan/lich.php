<?php
    $p = new controller();
    $str = "<h1>".$_POST["prevWeek"]."</h1>" ;
    echo $str;
                $timestamp1 = strtotime($prevWeek);
                $timestamp2 = strtotime($currentDate);
                $timestamp3 = strtotime($startOfWeek);
                if($timestamp3 >= $timestamp2 || in_array($currentDate, $weekDays)){
                    // Mảng thời gian và thông tin sân (dùng để test)
                    // $schedule = [
                    //     ["05:30", "Sân số 1 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                    //     ["05:30", "Sân số 2 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                    //     ["05:30", "Sân số 3 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                    //     ["05:30", "Sân số 4 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                    //     ["05:30", "Sân số 1 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                    //     ["05:30", "Sân số 2 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                    //     ["05:30", "Sân số 3 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                    //     ["05:30", "Sân số 4 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                    //     ["07:00", "Sân số 2 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                    //     ["08:30", "Sân số 1 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                    //     ["08:30", "Sân số 2 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                    //     ["10:00", "Sân số 1 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                    //     ["10:00", "Sân số 3 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                    //     ["10:00", "Sân số 2 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                    //     ["11:30", "Sân số 1 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                    //     ["11:30", "Sân số 2 (Sân 7)", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ", "300.000 đ"],
                    //     ["14:30", "Sân số 1 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                    //     ["14:30", "Sân số 2 (Sân 7)", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ", "500.000 đ"],
                    //     ["16:00", "Sân số 1 (Sân 7)", "700.000 đ", "700.000 đ", "700.000 đ", "700.000 đ", "700.000 đ", "700.000 đ", "700.000 đ"],
                        
                    // ];
                    
                        $times_checked = [];
                        $duplicate_times = [];
                        // Lặp qua mảng schedule để kiểm tra thời gian trùng
                        foreach ($lich as $item) {
                            $time = $item[0]; // Lấy thời gian (giá trị ở vị trí đầu tiên của mỗi phần tử)
                            // Kiểm tra xem thời gian này đã xuất hiện trước đó chưa
                            if (in_array($time, $times_checked) ) {
                                $duplicate_times[] = $time; // Nếu trùng, thêm vào mảng trùng
                            } else {
                                $times_checked[] = $time; // Nếu chưa trùng, thêm vào mảng kiểm tra
                            }
                        }
                        // In kết quả (dùng để test)
                        // if (!empty($duplicate_times)) {
                        //     echo "Các thời gian trùng lặp là: " . implode(", ", $duplicate_times);
                        //     echo "<br>Các thời gian trong mảng kiểm tra là: " . implode(", ", $times_checked);
                        // } else {
                        //     echo "Không có thời gian nào trùng lặp.";
                        //} 
                        $time_counts = array_count_values($duplicate_times);
                        $tam = [];
                        $mausac = 0;
                        foreach ($lich as $index => $row) {
                            echo "<tr>";
                            // Kiểm tra nếu thời gian của hàng này khác với thời gian của hàng trước
                            if (in_array($row[0],$duplicate_times) && !in_array($row[0],$tam)) {
                                foreach($time_counts as $timecount => $dem1){
                                    if($row[0]==$timecount){
                                        $dem = $dem1;
                                    }
                                }
                                // Màu sắc cho column giờ
                                if($mausac==0){
                                    echo "<td rowspan='".$dem + 1 ."' style='background-color: #ddd;'>{$row[0]}</td>";
                                    $mausac++;
                                }else{
                                    echo "<td rowspan='".$dem + 1 ."' style='background-color: silver;'>{$row[0]}</td>";
                                    $mausac = 0;
                                }
                                $tam[] = $row[0];
                            }elseif(in_array($row[0],$tam)){
                                echo "";
                            }else{
                                // Màu sắc cho column giờ
                                if($mausac==0){
                                    echo "<td style='background-color: #ddd;'>{$row[0]}</td>";
                                    $mausac++;
                                }else{
                                    echo "<td style='background-color: silver;'>{$row[0]}</td>";
                                    $mausac = 0;
                                }
                            }
                            // Second column: Field

                            $parts = explode("-", $row[1]);
                            // $parts1 = explode("_", $row[0]);
                            $ms = $parts[0];
                            // $mkg = $parts1[0];
                            echo "<td>{$parts[1]}</td>";
                            // echo "<td>{$row[1]}</td>";
                                
// Kiểm tra xem đã có người đặt chưa
                                $tbldatsan = $p->getdatsan($ms,$row[0]);
                                if($tbldatsan===-1){
                                    echo "Không có";
                                }elseif(!$tbldatsan){
                                    $ngaydat = [];
                                }else{
                                    while($rn = $tbldatsan->fetch_assoc()){
                                        $ngaydat[] = date('d-m-Y', strtotime($rn["NgayDat"]));

                                    }
                                }
                            
                            
                            
                            // print_r($ngaydat);
                            for ($i = 2; $i < count($row); $i++) {
                                // echo "<td><button class='btn btn-custom'>".number_format($row[$i],0,'.',',')." đ</button></td>";
                                
                                if($row[$i]==0){
                                    echo "<td></td>";
                                }else{
                                    if($i == 2){
                                        $t = $row[$i];
                                        $t -= $t;
                                        $ngay = $weekDays[$t];
                                    }else{
                                        $t += 1;
                                        $ngay = $weekDays[$t];
                                    } 
                                        // echo $ngay;
                                        // print_r($ngaydat);
                                    if(in_array($ngay,$ngaydat)){
                                        echo "<td></td>";
                                    }else{
                                        echo "<td><a href='?page=order&tt=".$diachi."_".$row[0]."_".$row[1]."_".$ngay."_".$row[$i]."'><button class='btn btn-custom' name='".$ngay."'>".number_format($row[$i],0,'.',',')." đ</button> </a></td>";
                                    }
                                    
                                    // print_r($ngaydat);
                                    // echo "<td><a href='?page=order&tt=".$row[0]."_".$row[1]."_".$ngay."_".$row[$i]."'><button class='btn btn-custom' name='".$ngay."'>".number_format($row[$i],0,'.',',')." đ</button> </a></td>";   
                                } 
                                
                            }
                            echo "</tr>";
                            $ngaydat=[];
                           
                        }
                }else{
                    echo "<tr><td colspan = '9'>Tuần này đã qua</td></tr>";
                }
?>
