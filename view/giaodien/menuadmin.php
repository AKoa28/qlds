
<style>
    .menu_ph {
        position: sticky;
        margin-top: 55px;
        top: 55px;
        z-index: 9;
        height: auto;
    }
    .menu_ph a{
        color: aliceblue;
        font-size: medium;
        font-weight: 700;
    }
    .menu_ph ul li{
        margin: 4px;
        /* border-bottom: 1px solid green; */
    }
    .menu_ph ul li:hover a{
        background-color: rgba(66, 214, 52, 0.75);
        color: black;
        border-radius: 10px;
        height: auto;
    }
    .menu_ph ul .active-a{
        background-color: rgba(66, 214, 52, 0.75);
        color: black;
        border-radius: 10px;
        height: auto;
    }
</style>
<div class="menu_ph text-center text-md-start">
        
        <ul class="nav flex-column">
            <?php
                if(isset($_REQUEST["page"]) && $_REQUEST["page"]=="quanlychusan" ){
                    echo '<li class="nav-item">
                            <a class="nav-link active-a" href="index.php?page=quanlychusan">Quản lý chủ sân</a>
                        </li>';
                }else{
                    echo '  <li class="nav-item">
                                <a class="nav-link" href="index.php?page=quanlychusan">Quản lý Chủ sân</a>
                            </li>
                            ';
                }
            ?>
        </ul>
</div>
