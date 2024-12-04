<?php
    class clskiemtraupload{
        public function uploadhinh($file,$filename, & $hinh){
            $tmp = $file["tmp_name"];
            $type = $file["type"];
            if(!$this->chktype($type)){
                return false;
            }
            $folder = "image/";
            $name_arr = explode(".",$file["name"]);
            $ext = ".".$name_arr[count($name_arr) - 1];
            $hinh = $this->chkname($filename).$ext;
            $des = $folder.$hinh;
            if(move_uploaded_file($tmp,$des)){
                return true;
            }else{
                return false;
            }

        }

        public function chktype($type){
            $arrtype = array("image/jpeg","image/jpg","image/png");
            if(in_array($type,$arrtype) === false){
                return false;
            }else{
                return true;
            }
        }
        public function chkname($name){
            $unicode = array(
 
                'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
                 
                'd'=>'đ',
                 
                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
                 
                'i'=>'í|ì|ỉ|ĩ|ị',
                 
                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
                 
                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
                 
                'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
                 
                'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                 
                'D'=>'Đ',
                 
                'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                 
                'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
                 
                'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                 
                'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                 
                'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
                 
                );
                 
                foreach($unicode as $nonUnicode=>$uni){
                 
                $name = preg_replace("/($uni)/i", $nonUnicode, $name);
                 
                }
                $name = str_replace(' ','_',$name);
                return $name;
        }

    }
?>