
<style>
    .menu_phu {
        position: sticky;
        margin-top: 55px;
        top: 55px;
        z-index: 9;
        height: auto;
    }
    .menu_phu a{
        color: aliceblue;
        font-size: medium;
        font-weight: 700;
    }
    .menu_phu ul li{
        margin: 4px;
        /* border-bottom: 1px solid green; */
    }
    .menu_phu ul li:hover a{
        background-color: rgba(66, 214, 52, 0.75);
        color: black;
        border-radius: 10px;
        height: auto;
    }
    .menu_phu ul .active-a{
        background-color: rgba(66, 214, 52, 0.75);
        color: black;
        border-radius: 10px;
        height: auto;
    }
</style>
<div class="menu_phu text-center text-md-start">
        <!-- <h4 class="p-3">Menu_phu Quản Lý</h4> -->
        <ul class="nav flex-column">
            <?php
                if(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlykhachhang" ){
                    echo '<li class="nav-item">
                            <a class="nav-link active-a" href="index.php?page=quanlykhachhang">Quản lý khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlynhanvien">Quản lý nhân viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlysan">Quản lý sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlyloaisan">Quản lý loại sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=quanlylichdatsan">Quản lý lịch đặt sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=quanlydoanhthu">Xem doanh thu</a>
                        </li>';
                }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlynhanvien" ){
                    echo '<li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlykhachhang">Quản lý khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-a" href="index.php?page=quanlynhanvien">Quản lý nhân viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlysan">Quản lý sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlyloaisan">Quản lý loại sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=quanlylichdatsan">Quản lý lịch đặt sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=quanlydoanhthu">Xem doanh thu</a>
                        </li>';
                }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlysan" ){
                    echo '<li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlykhachhang">Quản lý khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlynhanvien">Quản lý nhân viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-a" href="index.php?page=quanlysan">Quản lý sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlyloaisan">Quản lý loại sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=quanlylichdatsan">Quản lý lịch đặt sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=quanlydoanhthu">Xem doanh thu</a>
                        </li>';
                }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlyloaisan" ){
                    echo '<li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlykhachhang">Quản lý khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlynhanvien">Quản lý nhân viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlysan">Quản lý sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-a" href="index.php?page=quanlyloaisan">Quản lý loại sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=quanlylichdatsan">Quản lý lịch đặt sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=quanlydoanhthu">Xem doanh thu</a>
                        </li>';
                }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlylichdatsan" ){
                    echo '<li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlykhachhang">Quản lý khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlynhanvien">Quản lý nhân viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlysan">Quản lý sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=quanlyloaisan">Quản lý loại sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-a" href="?page=quanlylichdatsan">Quản lý lịch đặt sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=quanlydoanhthu">Xem doanh thu</a>
                        </li>';
                }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlydoanhthu" ){
                    echo '  <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlykhachhang">Quản lý khách hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlynhanvien">Quản lý nhân viên</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlysan">Quản lý sân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlyloaisan">Quản lý loại sân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=quanlylichdatsan">Quản lý lịch đặt sân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active-a" href="?page=quanlydoanhthu">Xem doanh thu</a>
                            </li>';
                }elseif(isset($_SESSION["chusan"])){
                    echo '
                            <li class="nav-item">
                                <a class="nav-link d-flex justify-content-between align-items-center" href="index.php?page=quanlykhachhang">Quản lý khách hàng <span class="badge bg-primary rounded-pill">14</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlynhanvien">Quản lý nhân viên</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlysan">Quản lý sân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlyloaisan">Quản lý loại sân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=quanlylichdatsan">Quản lý lịch đặt sân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=quanlydoanhthu">Xem doanh thu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=themdiadiem">Thêm địa điểm</a>
                            </li>';
                }elseif(isset($_SESSION["chusan"]) && isset($_REQUEST["page"]) && $_REQUEST["page"]=="themdiadiem"){
                    echo '
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlykhachhang">Quản lý khách hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlynhanvien">Quản lý nhân viên</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlysan">Quản lý sân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlyloaisan">Quản lý loại sân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=quanlylichdatsan">Quản lý lịch đặt sân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=quanlydoanhthu">Xem doanh thu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active-a" href="?page=themdiadiem">Thêm địa điểm</a>
                            </li>';
                }else{
                    echo '  <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlykhachhang">Quản lý khách hàng</a>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlynhanvien">Quản lý nhân viên</a>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlysan">Quản lý sân</a>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlyloaisan">Quản lý loại sân</a>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=quanlylichdatsan">Quản lý lịch đặt sân</a>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=quanlydoanhthu">Xem doanh thu</a>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </li> 
                    ';
                }
            ?>
        </ul>
</div>
<!-- <nav>
<h4 class="p-3">Menu_phu Chủ Sân</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=quanlykhachhang">Quản lý khách hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=quanlynhanvien">Quản lý nhân viên</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=quanlysan">Quản lý sân</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=quanlyloaisan">Quản lý loại sân</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?page=quanlydoanhthu">Xem doanh thu</a>
        </li>
    </ul>
</nav> -->
