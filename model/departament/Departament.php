<?php

    require_once '../../Global.php';

    class Departament extends Person{

        private $picturePath;
        private $secretary;

        public function setPicturePath($picturePath){
            $this->picturePath = $picturePath;
        }
        public function getPicturePath(){
            return $this->picturePath;
        }

        public function setSecretary($secretary){
            $this->secretary = $secretary;
        }
        public function getSecretary(){
            return $this->secretary;
        }

    }

?>