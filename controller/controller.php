<?php
    include_once("model/model.php");
    class controller{
        public function selectallsan(){
            $p = new model();
            $con = $p->selectallsan();
            if($con){
                return $con;
            }else{
                return 0;
            }
        }
    }
?>