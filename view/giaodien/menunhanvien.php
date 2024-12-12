
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
        <ul class="nav flex-column">
        <?php
    if(isset($_SESSION["nhanvien"])){
        if(isset($_REQUEST["page"]) && $_REQUEST["page"]=="danhsachkhachhang" ){
            echo '<li class="nav-item">
                    <a class="nav-link active-a" href="index.php?page=danhsachkhachhang">Danh sách khách hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=quanlylichdatsannhanvien">Quản lý lịch đặt sân</a>
                </li>';
        }elseif(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlylichdatsannhanvien" ){
            echo '<li class="nav-item">
                    <a class="nav-link " href="index.php?page=danhsachkhachhang">Danh sách khách hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active-a" href="?page=quanlylichdatsannhanvien">Quản lý lịch đặt sân</a>
                </li>';
        }else{
            echo '<li class="nav-item">
                    <a class="nav-link" href="index.php?page=danhsachkhachhang">Danh sách khách hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=quanlylichdatsannhanvien">Quản lý lịch đặt sân</a>
                </li>';
        }
    }
?>
        </ul>
</div>

