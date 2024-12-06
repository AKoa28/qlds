<div class="section_phu"><form method="post">
    <?php
        if(!isset($_SESSION["chusan"]) && !isset($_SESSION["nhanvien"])){
            header("Location: ?chusandangnhap");

            
        }else{
            include_once("controller/controller.php");
            $p = new controller();
            if(isset($_SESSION["chusan"])){
                $machusan = $_SESSION["chusan"]; 
                $tbldiadiem = $p->getselectdiachisan($machusan);
            }else{
                $madiadiem = $_SESSION["madiadiem"];
                $tbldiadiem = $p->getdiadiemsantheomadiadiem($madiadiem);
            }
        }
    ?>
</form>
</div>