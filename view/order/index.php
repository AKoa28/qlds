<?php
    // $thongtin = $_REQUEST["tt"];
    // $parts = explode("_",$thongtin);
    // $diachi = $parts[0];
    // $partsMS = explode("-", $parts[2]);
    // $ms = $partsMS[0];
    // $khunggio = $parts[1];
    // $tensan = $partsMS[1];
    // $ngay = $parts[3];
    // $gia = $parts[4];

    // $p = new controller();
    // $pn = new cnguoidung();
    // $tbldiachi = $p->getselectallsan($diachi);
    // $tblnguoidung = $pn->getselectallnguoidung();
    // echo $khunggio ."<br>";
    // echo $tensan ."<br>";
    // echo $ngay ."<br>";
    // echo $gia ."<br>";

    
?>
                <table class="table"  style="text-align:center;">
                    <thead>
                        <th>Mã sân</th>
                        <th>Khung giờ</th>
                        <th>Tên sân</th>
                        <th>Ngày đặt</th>
                        <th>Giá</th>
                    </thead>
                    <tbody id="DaChon">

                    </tbody>
                    <tr>
                        <td colspan="4" >
                            Thành tiền:
                        </td>
                        <td id="tongtien">

                        </td>
                    </tr>
                </table>
<script>
    $(document).ready(function () {
        const storedData = JSON.parse(localStorage.getItem('datachecked')) || [];
        const total = localStorage.getItem('tongtien') || '0';

        storedData.forEach(item => {
            $('#DaChon').append(
                '<tr>' +
                '<td>' + item.diachi + '</td>' +
                '<td>' + item.khunggio + '</td>' +
                '<td>' + item.tensan + '</td>' +
                '<td>' + item.ngay + '</td>' +
                '<td>' + item.gia.toLocaleString() + ' đ</td>' +
                '</tr>'
            );
        });

        $('#tongtien').text(total.toLocaleString() + ' đ');
    });

</script>
<?php
    if(isset($_REQUEST["suborder"])){
        $pds = new cdatsan();
        $manguoidung = "2";
        $trangthai = "Chờ duyệt";
        // echo $manguoidung . $ms . $ngay . $khunggio . $trangthai .  $gia;
        $tbldatsan = $pds->insertdatsan($manguoidung,$ms,$ngay,$khunggio,$trangthai, $gia);
        if($tbldatsan){
            echo "<script>alert('Gửi yêu cầu đặt sân thành công. Chờ xét duyệt');</script>";
            header("refresh:0; url='?page=lichdatsan&masan=$diachi'");
        }else{
            echo "<script>alert('Gửi yêu cầu đặt sân thất bại');</script>";
            header("refresh:0;");
        }
    }
    

?>