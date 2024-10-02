<?php
    include_once("model/model.php");
    class controller{
        public function getselectallsan($diachi){
            $p = new model();
            $con = $p->selectallsan($diachi);
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }
        }

        public function getselectsandistinctmasan($diachi){
            $p = new model();
            $con = $p->selectsandistinctmasan($diachi);
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }
        }
        public function getselectsanbykhunggio_san_thu($khunggio,$san,$thu){
            $p = new model();
            $con = $p->selectsanbykhunggio_san_thu($khunggio,$san,$thu);
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    while($r = $con->fetch_assoc()){
                        $gia = $r["GiaTheoKhungGio"];
                    }
                    return $gia;
                }else{
                    return 0;
                }
            }
        }

        public function getselectdiachisan(){
            $p = new model();
            $con = $p->selectdiachisan();
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }
        }

        public function getdatsan($masan,$khunggio){
            $p = new model();
            $con = $p->selectdatsan($masan,$khunggio,);
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }
        }
    }

    class cnguoidung{
        public function getselectallnguoidung(){
            $p = new mnguoidung();
            $con = $p->selectallnguoidung();
            if(!$con){
                return -1;
            }else{
                if($con->num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }
        }
    }

    class cdatsan{
        public function insertdatsan($manguoidung,$masan,$ngay,$khunggio,$trangthai,$tongtien){
            $ngay = date('Y-m-d', strtotime($ngay));
            $p = new mdatsan();
            $con = $p->themdatsan($manguoidung,$masan,$ngay,$khunggio,$trangthai,$tongtien);
            if ($con) {
                return true;
            } else {
                return false;
            }
        }
    }
?>