<?php
    require_once '../../Global.php';

    class Missed extends Person{
        private $features = array();
        private $reasons = array();
        private $reference;
        private $companion;
        private $picturePath;
        private $dateDisappearance;
        private $hourDisappearance;
    
        // Métodos para adicionar e obter características
        public function addFeature($type, $description) {
            $this->features[] = array(
                'type' => $type,
                'description' => $description
            );
        }
        
        public function getFeatures() {
            return $this->features;
        }
    
        // Métodos para adicionar e obter razões do desaparecimento
        public function addReason($type, $description) {
            $this->reasons[] = array(
                'type' => $type,
                'description' => $description
            );
        }


        public function setDateDisappearance($dateDisappearance){
            $this->dateDisappearance = $dateDisappearance;
        }
        public function getDateDisappearance(){
            return $this->dateDisappearance;
        }

        public function setHourDisappearance($hourDisappearance){
            $this->hourDisappearance = $hourDisappearance;
        }
        public function getHourDisappearance(){
            return $this->hourDisappearance;
        }
        
        public function getReasons() {
            return $this->reasons;
        }

        public function setCompanion($companion){
            $this->companion = $companion;
        }
        public function getCompanion(){
            return $this->companion;
        }

        public function setReference($reference){
            $this->reference = $reference;
        }
        public function getReference(){
            return $this->reference;
        }
        
        public function setPicturePath($picturePath){
            $this->picturePath = $picturePath;
        }
        public function getPicturePath(){
            return $this->picturePath;
        }
    }
    
    
?>