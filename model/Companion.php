<?php

    require_once '../../Global.php';
    class Companion extends Person {
        
        private $picturePath;
        
        public function setPicturePath($picturePath){
            $this->picturePath = $picturePath;
        }
        public function getPicturePath(){
            return $this->picturePath;
        }
    }

?>