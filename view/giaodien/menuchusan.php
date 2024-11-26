
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
</style>
<div class="menu_phu text-center text-md-start">
        <!-- <h4 class="p-3">Menu_phu Quản Lý</h4> -->
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
                <a class="nav-link" href="?page=quanlylichdatsan">Quản lý lịch đặt sân</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=quanlydoanhthu">Xem doanh thu</a>
            </li>
        </ul>
</div>