<?php
    class ketnoi{
        public function moketnoi(){
            return mysqli_connect("localhost","root","","qlds");
        }
        public function dongketnoi($con){
            mysqli_close($con);
        }
    }
?>