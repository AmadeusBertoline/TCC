<?php
    require_once '../../Global.php';

    class Secretary{
        private $id;
        private $username;
        private $password;
        private $logo;
        private $name;

        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }

        public function setUsername($username){
            $this->username = $username;
        }
        public function getUsername(){
            return $this->username;
        }

        public function setPassword($password){
            $this->password = $password;
        }
        public function getPassword(){
            return $this->password;
        }

        public function setLogo($logo){
            $this->logo = $logo;
        }
        public function getLogo(){
            return $this->logo;
        }

        public function setName($name){
            $this->name = $name;
        }
        public function getName(){
            return $this->name;
        }
    }
    
    
?>