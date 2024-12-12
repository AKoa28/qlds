<?php
    class ketnoi{
        public function moketnoi(){
            $con = mysqli_connect("localhost","root","","qldstest");
            $con->set_charset("utf8");
            return $con;
        }
        public function dongketnoi($conn){
            return mysqli_close($conn);
        }
    }
?>